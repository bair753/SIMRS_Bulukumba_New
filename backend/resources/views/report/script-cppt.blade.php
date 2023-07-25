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

    angular.controller('cetakCPPT', function ($scope, $http, httpService) {
        $scope.item = {
            obj: [],
            obj2: [],
			obji2: [],
			obji3: [],
			obji4: [],
			obji5: [],
			obji6: [],
			obji7: [],
			obji8: [],
			obji9: [],
			obji10: [],
			obji11: [],
			obji12: [],
			obji13: [],
			obji14: [],
			obji15: [],
			obji16: [],
			obji17: [],
			obji18: [],
			obji19: [],
			obji20: []
        }
        var dataLoad = {!! json_encode($res['d1'] )!!};
		var dataLoad2 = {!! json_encode($res['d2'] )!!};
		var dataLoad3 = {!! json_encode($res['d3'] )!!};
		var dataLoad4 = {!! json_encode($res['d4'] )!!};
		var dataLoad5 = {!! json_encode($res['d5'] )!!};
		var dataLoad6 = {!! json_encode($res['d6'] )!!};
		var dataLoad7 = {!! json_encode($res['d7'] )!!};
		var dataLoad8 = {!! json_encode($res['d8'] )!!};
		var dataLoad9 = {!! json_encode($res['d9'] )!!};
		var dataLoad10 = {!! json_encode($res['d10'] )!!};
		var dataLoad11 = {!! json_encode($res['d11'] )!!};
		var dataLoad12 = {!! json_encode($res['d12'] )!!};
		var dataLoad13 = {!! json_encode($res['d13'] )!!};
		var dataLoad14 = {!! json_encode($res['d14'] )!!};
		var dataLoad15 = {!! json_encode($res['d15'] )!!};
		var dataLoad16 = {!! json_encode($res['d16'] )!!};
		var dataLoad17 = {!! json_encode($res['d17'] )!!};
		var dataLoad18 = {!! json_encode($res['d18'] )!!};
		var dataLoad19 = {!! json_encode($res['d19'] )!!};
		var dataLoad20 = {!! json_encode($res['d20'] )!!};

        if(dataLoad.length > 0){
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
            var p1 = $scope.item.obj[423053];
            var d1 = $scope.item.obj[423057];

            var p2 = $scope.item.obj[423061];
            var d2 = $scope.item.obj[423065];

            var p3 = $scope.item.obj[423069];
            var d3 = $scope.item.obj[423073];

            var p4 = $scope.item.obj[423077];
            var d4 = $scope.item.obj[423081];

            var p5 = $scope.item.obj[423085];
            var d5 = $scope.item.obj[423089];

            var p6 = $scope.item.obj[423093];
            var d6 = $scope.item.obj[423097];

            var p7 = $scope.item.obj[423101];
            var d7 = $scope.item.obj[423105];

            var p8 = $scope.item.obj[423109];
            var d8 = $scope.item.obj[423113];

            var p9 = $scope.item.obj[423117];
            var d9 = $scope.item.obj[423121];

            var p10 = $scope.item.obj[423125];
            var d10 = $scope.item.obj[423129];

            var p11 = $scope.item.obj[423133];
            var d11 = $scope.item.obj[423137];

            var p12 = $scope.item.obj[423141];
            var d12 = $scope.item.obj[423145];

            var p13 = $scope.item.obj[423149];
            var d13 = $scope.item.obj[423153];

            var p14 = $scope.item.obj[423157];
            var d14 = $scope.item.obj[423161];

            var p15 = $scope.item.obj[423165];
            var d15 = $scope.item.obj[423169];

            var p16 = $scope.item.obj[423173];
            var d16 = $scope.item.obj[423177];

            var p17 = $scope.item.obj[423181];
            var d17 = $scope.item.obj[423185];

            var p18 = $scope.item.obj[423189];
            var d18 = $scope.item.obj[423193];

            var p19 = $scope.item.obj[423197];
            var d19 = $scope.item.obj[423201];

            var p20 = $scope.item.obj[423205];
            var d20 = $scope.item.obj[423209];

            var p21 = $scope.item.obj[423213];
            var d21 = $scope.item.obj[423217];

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

            if (p2 != undefined) {
                jQuery('#qrcodep2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p2
                });	
            }
            
            if (d2 != undefined) {
                jQuery('#qrcoded2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d2
            });
            }

            if (p3 != undefined) {
                jQuery('#qrcodep3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p3
                });	
            }
            
            if (d3 != undefined) {
                jQuery('#qrcoded3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d3
            });
            }

            if (p4 != undefined) {
                jQuery('#qrcodep4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p4
                });	
            }
            
            if (d4 != undefined) {
                jQuery('#qrcoded4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d4
            });
            }

            if (p5 != undefined) {
                jQuery('#qrcodep5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p5
                });	
            }
            
            if (d5 != undefined) {
                jQuery('#qrcoded5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d5
            });
            }

            if (p6 != undefined) {
                jQuery('#qrcodep6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p6
                });	
            }
            
            if (d6 != undefined) {
                jQuery('#qrcoded6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d6
            });
            }

            if (p7 != undefined) {
                jQuery('#qrcodep7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p7
                });	
            }
            
            if (d7 != undefined) {
                jQuery('#qrcoded7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d7
            });
            }

            if (p8 != undefined) {
                jQuery('#qrcodep8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p8
                });	
            }
            
            if (d8 != undefined) {
                jQuery('#qrcoded8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d8
            });
            }

            if (p9 != undefined) {
                jQuery('#qrcodep9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p9
                });	
            }
            
            if (d9 != undefined) {
                jQuery('#qrcoded9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d9
            });
            }

            if (p10 != undefined) {
                jQuery('#qrcodep10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p10
                });	
            }
            
            if (d10 != undefined) {
                jQuery('#qrcoded10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d10
            });
            }

            if (p11 != undefined) {
                jQuery('#qrcodep11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p11
                });	
            }
            
            if (d11 != undefined) {
                jQuery('#qrcoded11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d11
            });
            }

            if (p12 != undefined) {
                jQuery('#qrcodep12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p12
                });	
            }
            
            if (d12 != undefined) {
                jQuery('#qrcoded12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d12
            });
            }

            if (p13 != undefined) {
                jQuery('#qrcodep13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p13
                });	
            }
            
            if (d13 != undefined) {
                jQuery('#qrcoded13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d13
            });
            }

            if (p14 != undefined) {
                jQuery('#qrcodep14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p14
                });	
            }
            
            if (d14 != undefined) {
                jQuery('#qrcoded14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d14
            });
            }

            if (p15 != undefined) {
                jQuery('#qrcodep15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p15
                });	
            }
            
            if (d15 != undefined) {
                jQuery('#qrcoded15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d15
            });
            }

            if (p16 != undefined) {
                jQuery('#qrcodep16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p16
                });	
            }
            
            if (d16 != undefined) {
                jQuery('#qrcoded16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d16
            });
            }

            if (p17 != undefined) {
                jQuery('#qrcodep17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p17
                });	
            }
            
            if (d17 != undefined) {
                jQuery('#qrcoded17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d17
            });
            }

            if (p18 != undefined) {
                jQuery('#qrcodep18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p18
                });	
            }
            
            if (d18 != undefined) {
                jQuery('#qrcoded18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d18
            });
            }

            if (p19 != undefined) {
                jQuery('#qrcodep19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p19
                });	
            }
            
            if (d19 != undefined) {
                jQuery('#qrcoded19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d19
            });
            }

            if (p20 != undefined) {
                jQuery('#qrcodep20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p20
                });	
            }
            
            if (d20 != undefined) {
                jQuery('#qrcoded20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d20
            });
            }

            if (p21 != undefined) {
                jQuery('#qrcodep21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p21
                });	
            }
            
            if (d21 != undefined) {
                jQuery('#qrcoded21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d21
            });
            }
        }

        if(dataLoad2.length > 0){
            for (var i = 0; i <= dataLoad2.length - 1; i++) {
                if(dataLoad2[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad2[i].type == "textbox") {
                    $('#id_'+dataLoad2[i].emrdfk).html( dataLoad2[i].value)
                    $scope.item.obji2[dataLoad2[i].emrdfk] = dataLoad2[i].value
                }
                if (dataLoad2[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad2[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji2[dataLoad2[i].emrdfk] = chekedd
                }
                if (dataLoad2[i].type == "radio") {
                    $scope.item.obji2[dataLoad2[i].emrdfk] = dataLoad2[i].value

                }

                if (dataLoad2[i].type == "datetime") {
                    $('#id_'+dataLoad2[i].emrdfk).html( dataLoad2[i].value)
                    $scope.item.obji2[dataLoad2[i].emrdfk] = dataLoad2[i].value
                }
                if (dataLoad2[i].type == "time") {
                    $scope.item.obji2[dataLoad2[i].emrdfk] = dataLoad2[i].value
                }
                if (dataLoad2[i].type == "date") {
                    $scope.item.obji2[dataLoad2[i].emrdfk] = dataLoad2[i].value
                }

                if (dataLoad2[i].type == "checkboxtextbox") {
                    $scope.item.obji2[dataLoad2[i].emrdfk] = dataLoad2[i].value
                    $scope.item.obji2[dataLoad2[i].emrdfk] = true
                }
                if (dataLoad2[i].type == "textarea") {
                    $('#id_'+dataLoad2[i].emrdfk).html( dataLoad2[i].value)
                    $scope.item.obji2[dataLoad2[i].emrdfk] = dataLoad2[i].value
                }
                if (dataLoad2[i].type == "combobox") {
        
                    var str = dataLoad2[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji2[dataLoad2[i].emrdfk] = res[1]
                        $('#id_'+dataLoad2[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad2[i].type == "combobox2") {
                    var str = dataLoad2[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji2[dataLoad2[i].emrdfk+""+1] = res[0]
                    $scope.item.obji2[dataLoad2[i].emrdfk] = res[1]
                    $('#id_'+dataLoad2[i].emrdfk).html ( res[1])

                }

                if (dataLoad2[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad2[i].value
                }

                if (dataLoad2[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad2[i].value
                }

                if (dataLoad2[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad2[i].value
                }
                if (dataLoad2[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad2[i].value
                }
                if (dataLoad2[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad2[i].value
                }
                if (dataLoad2[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad2[i].value
                }
                if (dataLoad2[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad2[i].value
                }
                if (dataLoad2[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad2[i].value
                }
                if (dataLoad2[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad2[i].value
                }
                if (dataLoad2[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad2[i].value
                }
                if (dataLoad2[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad2[i].value
                }
                if (dataLoad2[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad2[i].value
                }
                if (dataLoad2[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad2[i].value
                }
                if (dataLoad2[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad2[i].value
                }
                if (dataLoad2[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad2[i].value
                }
                if (dataLoad2[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad2[i].value
                }
                if (dataLoad2[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad2[i].value
                }
                
                if (dataLoad2[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad2[i].value
                }

                $scope.tglemr = dataLoad2[i].tgl
                
            }

            var p2t1 = $scope.item.obji2[423053];
            var d2t1 = $scope.item.obji2[423057];

            var p2t2 = $scope.item.obji2[423061];
            var d2t2 = $scope.item.obji2[423065];

            var p2t3 = $scope.item.obji2[423069];
            var d2t3 = $scope.item.obji2[423073];

            var p2t4 = $scope.item.obji2[423077];
            var d2t4 = $scope.item.obji2[423081];

            var p2t5 = $scope.item.obji2[423085];
            var d2t5 = $scope.item.obji2[423089];

            var p2t6 = $scope.item.obji2[423093];
            var d2t6 = $scope.item.obji2[423097];

            var p2t7 = $scope.item.obji2[423101];
            var d2t7 = $scope.item.obji2[423105];

            var p2t8 = $scope.item.obji2[423109];
            var d2t8 = $scope.item.obji2[423113];

            var p2t9 = $scope.item.obji2[423117];
            var d2t9 = $scope.item.obji2[423121];

            var p2t10 = $scope.item.obji2[423125];
            var d2t10 = $scope.item.obji2[423129];

            var p2t11 = $scope.item.obji2[423133];
            var d2t11 = $scope.item.obji2[423137];

            var p2t12 = $scope.item.obji2[423141];
            var d2t12 = $scope.item.obji2[423145];

            var p2t13 = $scope.item.obji2[423149];
            var d2t13 = $scope.item.obji2[423153];

            var p2t14 = $scope.item.obji2[423157];
            var d2t14 = $scope.item.obji2[423161];

            var p2t15 = $scope.item.obji2[423165];
            var d2t15 = $scope.item.obji2[423169];

            var p2t16 = $scope.item.obji2[423173];
            var d2t16 = $scope.item.obji2[423177];

            var p2t17 = $scope.item.obji2[423181];
            var d2t17 = $scope.item.obji2[423185];

            var p2t18 = $scope.item.obji2[423189];
            var d2t18 = $scope.item.obji2[423193];

            var p2t19 = $scope.item.obji2[423197];
            var d2t19 = $scope.item.obji2[423201];

            var p2t20 = $scope.item.obji2[423205];
            var d2t20 = $scope.item.obji2[423209];

            var p2t21 = $scope.item.obji2[423213];
            var d2t21 = $scope.item.obji2[423217];

            if (p2t1 != undefined) {
                jQuery('#qrcodep2t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p2t1
                });	
            }
            
            if (d2t1 != undefined) {
                jQuery('#qrcoded2t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d2t1
            });
            }

            if (p2t2 != undefined) {
                jQuery('#qrcodep2t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p2t2
                });	
            }
            
            if (d2t2 != undefined) {
                jQuery('#qrcoded2t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d2t2
            });
            }

            if (p2t3 != undefined) {
                jQuery('#qrcodep2t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p2t3
                });	
            }
            
            if (d2t3 != undefined) {
                jQuery('#qrcoded2t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d2t3
            });
            }

            if (p2t4 != undefined) {
                jQuery('#qrcodep2t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p2t4
                });	
            }
            
            if (d2t4 != undefined) {
                jQuery('#qrcoded2t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d2t4
            });
            }

            if (p2t5 != undefined) {
                jQuery('#qrcodep2t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p2t5
                });	
            }
            
            if (d2t5 != undefined) {
                jQuery('#qrcoded2t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d2t5
            });
            }

            if (p2t6 != undefined) {
                jQuery('#qrcodep2t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p2t6
                });	
            }
            
            if (d2t6 != undefined) {
                jQuery('#qrcoded2t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d2t6
            });
            }

            if (p2t7 != undefined) {
                jQuery('#qrcodep2t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p2t7
                });	
            }
            
            if (d2t7 != undefined) {
                jQuery('#qrcoded2t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d2t7
            });
            }

            if (p2t8 != undefined) {
                jQuery('#qrcodep2t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p2t8
                });	
            }
            
            if (d2t8 != undefined) {
                jQuery('#qrcoded2t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d2t8
            });
            }

            if (p2t9 != undefined) {
                jQuery('#qrcodep2t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p2t9
                });	
            }
            
            if (d2t9 != undefined) {
                jQuery('#qrcoded2t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d2t9
            });
            }

            if (p2t10 != undefined) {
                jQuery('#qrcodep2t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p2t10
                });	
            }
            
            if (d2t10 != undefined) {
                jQuery('#qrcoded2t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d2t10
            });
            }

            if (p2t11 != undefined) {
                jQuery('#qrcodep2t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p2t11
                });	
            }
            
            if (d2t11 != undefined) {
                jQuery('#qrcoded2t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d2t11
            });
            }

            if (p2t12 != undefined) {
                jQuery('#qrcodep2t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p2t12
                });	
            }
            
            if (d2t12 != undefined) {
                jQuery('#qrcoded2t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d2t12
            });
            }

            if (p2t13 != undefined) {
                jQuery('#qrcodep2t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p2t13
                });	
            }
            
            if (d2t13 != undefined) {
                jQuery('#qrcoded2t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d2t13
            });
            }

            if (p2t14 != undefined) {
                jQuery('#qrcodep2t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p2t14
                });	
            }
            
            if (d2t14 != undefined) {
                jQuery('#qrcoded2t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d2t14
            });
            }

            if (p2t15 != undefined) {
                jQuery('#qrcodep2t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p2t15
                });	
            }
            
            if (d2t15 != undefined) {
                jQuery('#qrcoded2t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d2t15
            });
            }

            if (p2t16 != undefined) {
                jQuery('#qrcodep2t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p2t16
                });	
            }
            
            if (d2t16 != undefined) {
                jQuery('#qrcoded2t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d2t16
            });
            }

            if (p2t17 != undefined) {
                jQuery('#qrcodep2t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p2t17
                });	
            }
            
            if (d2t17 != undefined) {
                jQuery('#qrcoded2t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d2t17
            });
            }

            if (p2t18 != undefined) {
                jQuery('#qrcodep2t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p2t18
                });	
            }
            
            if (d2t18 != undefined) {
                jQuery('#qrcoded2t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d2t18
            });
            }

            if (p2t19 != undefined) {
                jQuery('#qrcodep2t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p2t19
                });	
            }
            
            if (d2t19 != undefined) {
                jQuery('#qrcoded2t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d2t19
            });
            }

            if (p2t20 != undefined) {
                jQuery('#qrcodep2t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p2t20
                });	
            }
            
            if (d2t20 != undefined) {
                jQuery('#qrcoded2t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d2t20
            });
            }

            if (p2t21 != undefined) {
                jQuery('#qrcodep2t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p2t21
                });	
            }
            
            if (d2t21 != undefined) {
                jQuery('#qrcoded2t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d2t21
            });
            }
        }

        if(dataLoad3.length > 0){
            for (var i = 0; i <= dataLoad3.length - 1; i++) {
                if(dataLoad3[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad3[i].type == "textbox") {
                    $('#id_'+dataLoad3[i].emrdfk).html( dataLoad3[i].value)
                    $scope.item.obji3[dataLoad3[i].emrdfk] = dataLoad3[i].value
                }
                if (dataLoad3[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad3[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji3[dataLoad3[i].emrdfk] = chekedd
                }
                if (dataLoad3[i].type == "radio") {
                    $scope.item.obji3[dataLoad3[i].emrdfk] = dataLoad3[i].value

                }

                if (dataLoad3[i].type == "datetime") {
                    $('#id_'+dataLoad3[i].emrdfk).html( dataLoad3[i].value)
                    $scope.item.obji3[dataLoad3[i].emrdfk] = dataLoad3[i].value
                }
                if (dataLoad3[i].type == "time") {
                    $scope.item.obji3[dataLoad3[i].emrdfk] = dataLoad3[i].value
                }
                if (dataLoad3[i].type == "date") {
                    $scope.item.obji3[dataLoad3[i].emrdfk] = dataLoad3[i].value
                }

                if (dataLoad3[i].type == "checkboxtextbox") {
                    $scope.item.obji3[dataLoad3[i].emrdfk] = dataLoad3[i].value
                    $scope.item.obji3[dataLoad3[i].emrdfk] = true
                }
                if (dataLoad3[i].type == "textarea") {
                    $('#id_'+dataLoad3[i].emrdfk).html( dataLoad3[i].value)
                    $scope.item.obji3[dataLoad3[i].emrdfk] = dataLoad3[i].value
                }
                if (dataLoad3[i].type == "combobox") {
        
                    var str = dataLoad3[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji3[dataLoad3[i].emrdfk] = res[1]
                        $('#id_'+dataLoad3[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad3[i].type == "combobox2") {
                    var str = dataLoad3[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji3[dataLoad3[i].emrdfk+""+1] = res[0]
                    $scope.item.obji3[dataLoad3[i].emrdfk] = res[1]
                    $('#id_'+dataLoad3[i].emrdfk).html ( res[1])

                }

                if (dataLoad3[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad3[i].value
                }

                if (dataLoad3[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad3[i].value
                }

                if (dataLoad3[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad3[i].value
                }
                if (dataLoad3[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad3[i].value
                }
                if (dataLoad3[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad3[i].value
                }
                if (dataLoad3[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad3[i].value
                }
                if (dataLoad3[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad3[i].value
                }
                if (dataLoad3[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad3[i].value
                }
                if (dataLoad3[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad3[i].value
                }
                if (dataLoad3[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad3[i].value
                }
                if (dataLoad3[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad3[i].value
                }
                if (dataLoad3[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad3[i].value
                }
                if (dataLoad3[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad3[i].value
                }
                if (dataLoad3[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad3[i].value
                }
                if (dataLoad3[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad3[i].value
                }
                if (dataLoad3[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad3[i].value
                }
                if (dataLoad3[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad3[i].value
                }
                
                if (dataLoad3[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad3[i].value
                }

                $scope.tglemr = dataLoad3[i].tgl
                
            }

            var p3t1 = $scope.item.obji3[423053];
            var d3t1 = $scope.item.obji3[423057];

            var p3t2 = $scope.item.obji3[423061];
            var d3t2 = $scope.item.obji3[423065];

            var p3t3 = $scope.item.obji3[423069];
            var d3t3 = $scope.item.obji3[423073];

            var p3t4 = $scope.item.obji3[423077];
            var d3t4 = $scope.item.obji3[423081];

            var p3t5 = $scope.item.obji3[423085];
            var d3t5 = $scope.item.obji3[423089];

            var p3t6 = $scope.item.obji3[423093];
            var d3t6 = $scope.item.obji3[423097];

            var p3t7 = $scope.item.obji3[423101];
            var d3t7 = $scope.item.obji3[423105];

            var p3t8 = $scope.item.obji3[423109];
            var d3t8 = $scope.item.obji3[423113];

            var p3t9 = $scope.item.obji3[423117];
            var d3t9 = $scope.item.obji3[423121];

            var p3t10 = $scope.item.obji3[423125];
            var d3t10 = $scope.item.obji3[423129];

            var p3t11 = $scope.item.obji3[423133];
            var d3t11 = $scope.item.obji3[423137];

            var p3t12 = $scope.item.obji3[423141];
            var d3t12 = $scope.item.obji3[423145];

            var p3t13 = $scope.item.obji3[423149];
            var d3t13 = $scope.item.obji3[423153];

            var p3t14 = $scope.item.obji3[423157];
            var d3t14 = $scope.item.obji3[423161];

            var p3t15 = $scope.item.obji3[423165];
            var d3t15 = $scope.item.obji3[423169];

            var p3t16 = $scope.item.obji3[423173];
            var d3t16 = $scope.item.obji3[423177];

            var p3t17 = $scope.item.obji3[423181];
            var d3t17 = $scope.item.obji3[423185];

            var p3t18 = $scope.item.obji3[423189];
            var d3t18 = $scope.item.obji3[423193];

            var p3t19 = $scope.item.obji3[423197];
            var d3t19 = $scope.item.obji3[423201];

            var p3t20 = $scope.item.obji3[423205];
            var d3t20 = $scope.item.obji3[423209];

            var p3t21 = $scope.item.obji3[423213];
            var d3t21 = $scope.item.obji3[423217];

            if (p3t1 != undefined) {
                jQuery('#qrcodep3t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p3t1
                });	
            }
            
            if (d3t1 != undefined) {
                jQuery('#qrcoded3t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d3t1
            });
            }

            if (p3t2 != undefined) {
                jQuery('#qrcodep3t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p3t2
                });	
            }
            
            if (d3t2 != undefined) {
                jQuery('#qrcoded3t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d3t2
            });
            }

            if (p3t3 != undefined) {
                jQuery('#qrcodep3t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p3t3
                });	
            }
            
            if (d3t3 != undefined) {
                jQuery('#qrcoded3t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d3t3
            });
            }

            if (p3t4 != undefined) {
                jQuery('#qrcodep3t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p3t4
                });	
            }
            
            if (d3t4 != undefined) {
                jQuery('#qrcoded3t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d3t4
            });
            }

            if (p3t5 != undefined) {
                jQuery('#qrcodep3t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p3t5
                });	
            }
            
            if (d3t5 != undefined) {
                jQuery('#qrcoded3t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d3t5
            });
            }

            if (p3t6 != undefined) {
                jQuery('#qrcodep3t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p3t6
                });	
            }
            
            if (d3t6 != undefined) {
                jQuery('#qrcoded3t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d3t6
            });
            }

            if (p3t7 != undefined) {
                jQuery('#qrcodep3t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p3t7
                });	
            }
            
            if (d3t7 != undefined) {
                jQuery('#qrcoded3t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d3t7
            });
            }

            if (p3t8 != undefined) {
                jQuery('#qrcodep3t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p3t8
                });	
            }
            
            if (d3t8 != undefined) {
                jQuery('#qrcoded3t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d3t8
            });
            }

            if (p3t9 != undefined) {
                jQuery('#qrcodep3t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p3t9
                });	
            }
            
            if (d3t9 != undefined) {
                jQuery('#qrcoded3t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d3t9
            });
            }

            if (p3t10 != undefined) {
                jQuery('#qrcodep3t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p3t10
                });	
            }
            
            if (d3t10 != undefined) {
                jQuery('#qrcoded3t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d3t10
            });
            }

            if (p3t11 != undefined) {
                jQuery('#qrcodep3t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p3t11
                });	
            }
            
            if (d3t11 != undefined) {
                jQuery('#qrcoded3t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d3t11
            });
            }

            if (p3t12 != undefined) {
                jQuery('#qrcodep3t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p3t12
                });	
            }
            
            if (d3t12 != undefined) {
                jQuery('#qrcoded3t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d3t12
            });
            }

            if (p3t13 != undefined) {
                jQuery('#qrcodep3t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p3t13
                });	
            }
            
            if (d3t13 != undefined) {
                jQuery('#qrcoded3t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d3t13
            });
            }

            if (p3t14 != undefined) {
                jQuery('#qrcodep3t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p3t14
                });	
            }
            
            if (d3t14 != undefined) {
                jQuery('#qrcoded3t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d3t14
            });
            }

            if (p3t15 != undefined) {
                jQuery('#qrcodep3t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p3t15
                });	
            }
            
            if (d3t15 != undefined) {
                jQuery('#qrcoded3t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d3t15
            });
            }

            if (p3t16 != undefined) {
                jQuery('#qrcodep3t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p3t16
                });	
            }
            
            if (d3t16 != undefined) {
                jQuery('#qrcoded3t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d3t16
            });
            }

            if (p3t17 != undefined) {
                jQuery('#qrcodep3t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p3t17
                });	
            }
            
            if (d3t17 != undefined) {
                jQuery('#qrcoded3t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d3t17
            });
            }

            if (p3t18 != undefined) {
                jQuery('#qrcodep3t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p3t18
                });	
            }
            
            if (d3t18 != undefined) {
                jQuery('#qrcoded3t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d3t18
            });
            }

            if (p3t19 != undefined) {
                jQuery('#qrcodep3t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p3t19
                });	
            }
            
            if (d3t19 != undefined) {
                jQuery('#qrcoded3t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d3t19
            });
            }

            if (p3t20 != undefined) {
                jQuery('#qrcodep3t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p3t20
                });	
            }
            
            if (d3t20 != undefined) {
                jQuery('#qrcoded3t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d3t20
            });
            }

            if (p3t21 != undefined) {
                jQuery('#qrcodep3t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p3t21
                });	
            }
            
            if (d3t21 != undefined) {
                jQuery('#qrcoded3t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d3t21
            });
            }
        }

        if(dataLoad4.length > 0){
            for (var i = 0; i <= dataLoad4.length - 1; i++) {
                if(dataLoad4[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad4[i].type == "textbox") {
                    $('#id_'+dataLoad4[i].emrdfk).html( dataLoad4[i].value)
                    $scope.item.obji4[dataLoad4[i].emrdfk] = dataLoad4[i].value
                }
                if (dataLoad4[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad4[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji4[dataLoad4[i].emrdfk] = chekedd
                }
                if (dataLoad4[i].type == "radio") {
                    $scope.item.obji4[dataLoad4[i].emrdfk] = dataLoad4[i].value

                }

                if (dataLoad4[i].type == "datetime") {
                    $('#id_'+dataLoad4[i].emrdfk).html( dataLoad4[i].value)
                    $scope.item.obji4[dataLoad4[i].emrdfk] = dataLoad4[i].value
                }
                if (dataLoad4[i].type == "time") {
                    $scope.item.obji4[dataLoad4[i].emrdfk] = dataLoad4[i].value
                }
                if (dataLoad4[i].type == "date") {
                    $scope.item.obji4[dataLoad4[i].emrdfk] = dataLoad4[i].value
                }

                if (dataLoad4[i].type == "checkboxtextbox") {
                    $scope.item.obji4[dataLoad4[i].emrdfk] = dataLoad4[i].value
                    $scope.item.obji4[dataLoad4[i].emrdfk] = true
                }
                if (dataLoad4[i].type == "textarea") {
                    $('#id_'+dataLoad4[i].emrdfk).html( dataLoad4[i].value)
                    $scope.item.obji4[dataLoad4[i].emrdfk] = dataLoad4[i].value
                }
                if (dataLoad4[i].type == "combobox") {
        
                    var str = dataLoad4[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji4[dataLoad4[i].emrdfk] = res[1]
                        $('#id_'+dataLoad4[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad4[i].type == "combobox2") {
                    var str = dataLoad4[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji4[dataLoad4[i].emrdfk+""+1] = res[0]
                    $scope.item.obji4[dataLoad4[i].emrdfk] = res[1]
                    $('#id_'+dataLoad4[i].emrdfk).html ( res[1])

                }

                if (dataLoad4[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad4[i].value
                }

                if (dataLoad4[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad4[i].value
                }

                if (dataLoad4[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad4[i].value
                }
                if (dataLoad4[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad4[i].value
                }
                if (dataLoad4[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad4[i].value
                }
                if (dataLoad4[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad4[i].value
                }
                if (dataLoad4[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad4[i].value
                }
                if (dataLoad4[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad4[i].value
                }
                if (dataLoad4[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad4[i].value
                }
                if (dataLoad4[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad4[i].value
                }
                if (dataLoad4[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad4[i].value
                }
                if (dataLoad4[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad4[i].value
                }
                if (dataLoad4[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad4[i].value
                }
                if (dataLoad4[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad4[i].value
                }
                if (dataLoad4[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad4[i].value
                }
                if (dataLoad4[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad4[i].value
                }
                if (dataLoad4[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad4[i].value
                }
                
                if (dataLoad4[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad4[i].value
                }

                $scope.tglemr = dataLoad4[i].tgl
                
            }

            var p4t1 = $scope.item.obji4[423053];
            var d4t1 = $scope.item.obji4[423057];

            var p4t2 = $scope.item.obji4[423061];
            var d4t2 = $scope.item.obji4[423065];

            var p4t3 = $scope.item.obji4[423069];
            var d4t3 = $scope.item.obji4[423073];

            var p4t4 = $scope.item.obji4[423077];
            var d4t4 = $scope.item.obji4[423081];

            var p4t5 = $scope.item.obji4[423085];
            var d4t5 = $scope.item.obji4[423089];

            var p4t6 = $scope.item.obji4[423093];
            var d4t6 = $scope.item.obji4[423097];

            var p4t7 = $scope.item.obji4[423101];
            var d4t7 = $scope.item.obji4[423105];

            var p4t8 = $scope.item.obji4[423109];
            var d4t8 = $scope.item.obji4[423113];

            var p4t9 = $scope.item.obji4[423117];
            var d4t9 = $scope.item.obji4[423121];

            var p4t10 = $scope.item.obji4[423125];
            var d4t10 = $scope.item.obji4[423129];

            var p4t11 = $scope.item.obji4[423133];
            var d4t11 = $scope.item.obji4[423137];

            var p4t12 = $scope.item.obji4[423141];
            var d4t12 = $scope.item.obji4[423145];

            var p4t13 = $scope.item.obji4[423149];
            var d4t13 = $scope.item.obji4[423153];

            var p4t14 = $scope.item.obji4[423157];
            var d4t14 = $scope.item.obji4[423161];

            var p4t15 = $scope.item.obji4[423165];
            var d4t15 = $scope.item.obji4[423169];

            var p4t16 = $scope.item.obji4[423173];
            var d4t16 = $scope.item.obji4[423177];

            var p4t17 = $scope.item.obji4[423181];
            var d4t17 = $scope.item.obji4[423185];

            var p4t18 = $scope.item.obji4[423189];
            var d4t18 = $scope.item.obji4[423193];

            var p4t19 = $scope.item.obji4[423197];
            var d4t19 = $scope.item.obji4[423201];

            var p4t20 = $scope.item.obji4[423205];
            var d4t20 = $scope.item.obji4[423209];

            var p4t21 = $scope.item.obji4[423213];
            var d4t21 = $scope.item.obji4[423217];

            if (p4t1 != undefined) {
                jQuery('#qrcodep4t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p4t1
                });	
            }
            
            if (d4t1 != undefined) {
                jQuery('#qrcoded4t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d4t1
            });
            }

            if (p4t2 != undefined) {
                jQuery('#qrcodep4t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p4t2
                });	
            }
            
            if (d4t2 != undefined) {
                jQuery('#qrcoded4t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d4t2
            });
            }

            if (p4t3 != undefined) {
                jQuery('#qrcodep4t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p4t3
                });	
            }
            
            if (d4t3 != undefined) {
                jQuery('#qrcoded4t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d4t3
            });
            }

            if (p4t4 != undefined) {
                jQuery('#qrcodep4t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p4t4
                });	
            }
            
            if (d4t4 != undefined) {
                jQuery('#qrcoded4t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d4t4
            });
            }

            if (p4t5 != undefined) {
                jQuery('#qrcodep4t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p4t5
                });	
            }
            
            if (d4t5 != undefined) {
                jQuery('#qrcoded4t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d4t5
            });
            }

            if (p4t6 != undefined) {
                jQuery('#qrcodep4t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p4t6
                });	
            }
            
            if (d4t6 != undefined) {
                jQuery('#qrcoded4t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d4t6
            });
            }

            if (p4t7 != undefined) {
                jQuery('#qrcodep4t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p4t7
                });	
            }
            
            if (d4t7 != undefined) {
                jQuery('#qrcoded4t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d4t7
            });
            }

            if (p4t8 != undefined) {
                jQuery('#qrcodep4t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p4t8
                });	
            }
            
            if (d4t8 != undefined) {
                jQuery('#qrcoded4t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d4t8
            });
            }

            if (p4t9 != undefined) {
                jQuery('#qrcodep4t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p4t9
                });	
            }
            
            if (d4t9 != undefined) {
                jQuery('#qrcoded4t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d4t9
            });
            }

            if (p4t10 != undefined) {
                jQuery('#qrcodep4t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p4t10
                });	
            }
            
            if (d4t10 != undefined) {
                jQuery('#qrcoded4t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d4t10
            });
            }

            if (p4t11 != undefined) {
                jQuery('#qrcodep4t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p4t11
                });	
            }
            
            if (d4t11 != undefined) {
                jQuery('#qrcoded4t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d4t11
            });
            }

            if (p4t12 != undefined) {
                jQuery('#qrcodep4t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p4t12
                });	
            }
            
            if (d4t12 != undefined) {
                jQuery('#qrcoded4t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d4t12
            });
            }

            if (p4t13 != undefined) {
                jQuery('#qrcodep4t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p4t13
                });	
            }
            
            if (d4t13 != undefined) {
                jQuery('#qrcoded4t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d4t13
            });
            }

            if (p4t14 != undefined) {
                jQuery('#qrcodep4t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p4t14
                });	
            }
            
            if (d4t14 != undefined) {
                jQuery('#qrcoded4t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d4t14
            });
            }

            if (p4t15 != undefined) {
                jQuery('#qrcodep4t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p4t15
                });	
            }
            
            if (d4t15 != undefined) {
                jQuery('#qrcoded4t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d4t15
            });
            }

            if (p4t16 != undefined) {
                jQuery('#qrcodep4t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p4t16
                });	
            }
            
            if (d4t16 != undefined) {
                jQuery('#qrcoded4t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d4t16
            });
            }

            if (p4t17 != undefined) {
                jQuery('#qrcodep4t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p4t17
                });	
            }
            
            if (d4t17 != undefined) {
                jQuery('#qrcoded4t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d4t17
            });
            }

            if (p4t18 != undefined) {
                jQuery('#qrcodep4t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p4t18
                });	
            }
            
            if (d4t18 != undefined) {
                jQuery('#qrcoded4t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d4t18
            });
            }

            if (p4t19 != undefined) {
                jQuery('#qrcodep4t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p4t19
                });	
            }
            
            if (d4t19 != undefined) {
                jQuery('#qrcoded4t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d4t19
            });
            }

            if (p4t20 != undefined) {
                jQuery('#qrcodep4t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p4t20
                });	
            }
            
            if (d4t20 != undefined) {
                jQuery('#qrcoded4t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d4t20
            });
            }

            if (p4t21 != undefined) {
                jQuery('#qrcodep4t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p4t21
                });	
            }
            
            if (d4t21 != undefined) {
                jQuery('#qrcoded4t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d4t21
            });
            }
        }

        if(dataLoad5.length > 0){
            for (var i = 0; i <= dataLoad5.length - 1; i++) {
                if(dataLoad5[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad5[i].type == "textbox") {
                    $('#id_'+dataLoad5[i].emrdfk).html( dataLoad5[i].value)
                    $scope.item.obji5[dataLoad5[i].emrdfk] = dataLoad5[i].value
                }
                if (dataLoad5[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad5[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji5[dataLoad5[i].emrdfk] = chekedd
                }
                if (dataLoad5[i].type == "radio") {
                    $scope.item.obji5[dataLoad5[i].emrdfk] = dataLoad5[i].value

                }

                if (dataLoad5[i].type == "datetime") {
                    $('#id_'+dataLoad5[i].emrdfk).html( dataLoad5[i].value)
                    $scope.item.obji5[dataLoad5[i].emrdfk] = dataLoad5[i].value
                }
                if (dataLoad5[i].type == "time") {
                    $scope.item.obji5[dataLoad5[i].emrdfk] = dataLoad5[i].value
                }
                if (dataLoad5[i].type == "date") {
                    $scope.item.obji5[dataLoad5[i].emrdfk] = dataLoad5[i].value
                }

                if (dataLoad5[i].type == "checkboxtextbox") {
                    $scope.item.obji5[dataLoad5[i].emrdfk] = dataLoad5[i].value
                    $scope.item.obji5[dataLoad5[i].emrdfk] = true
                }
                if (dataLoad5[i].type == "textarea") {
                    $('#id_'+dataLoad5[i].emrdfk).html( dataLoad5[i].value)
                    $scope.item.obji5[dataLoad5[i].emrdfk] = dataLoad5[i].value
                }
                if (dataLoad5[i].type == "combobox") {
        
                    var str = dataLoad5[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji5[dataLoad5[i].emrdfk] = res[1]
                        $('#id_'+dataLoad5[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad5[i].type == "combobox2") {
                    var str = dataLoad5[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji5[dataLoad5[i].emrdfk+""+1] = res[0]
                    $scope.item.obji5[dataLoad5[i].emrdfk] = res[1]
                    $('#id_'+dataLoad5[i].emrdfk).html ( res[1])

                }

                if (dataLoad5[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad5[i].value
                }

                if (dataLoad5[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad5[i].value
                }

                if (dataLoad5[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad5[i].value
                }
                if (dataLoad5[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad5[i].value
                }
                if (dataLoad5[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad5[i].value
                }
                if (dataLoad5[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad5[i].value
                }
                if (dataLoad5[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad5[i].value
                }
                if (dataLoad5[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad5[i].value
                }
                if (dataLoad5[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad5[i].value
                }
                if (dataLoad5[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad5[i].value
                }
                if (dataLoad5[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad5[i].value
                }
                if (dataLoad5[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad5[i].value
                }
                if (dataLoad5[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad5[i].value
                }
                if (dataLoad5[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad5[i].value
                }
                if (dataLoad5[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad5[i].value
                }
                if (dataLoad5[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad5[i].value
                }
                if (dataLoad5[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad5[i].value
                }
                
                if (dataLoad5[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad5[i].value
                }

                $scope.tglemr = dataLoad5[i].tgl
                
            }

            var p5t1 = $scope.item.obji5[423053];
            var d5t1 = $scope.item.obji5[423057];

            var p5t2 = $scope.item.obji5[423061];
            var d5t2 = $scope.item.obji5[423065];

            var p5t3 = $scope.item.obji5[423069];
            var d5t3 = $scope.item.obji5[423073];

            var p5t4 = $scope.item.obji5[423077];
            var d5t4 = $scope.item.obji5[423081];

            var p5t5 = $scope.item.obji5[423085];
            var d5t5 = $scope.item.obji5[423089];

            var p5t6 = $scope.item.obji5[423093];
            var d5t6 = $scope.item.obji5[423097];

            var p5t7 = $scope.item.obji5[423101];
            var d5t7 = $scope.item.obji5[423105];

            var p5t8 = $scope.item.obji5[423109];
            var d5t8 = $scope.item.obji5[423113];

            var p5t9 = $scope.item.obji5[423117];
            var d5t9 = $scope.item.obji5[423121];

            var p5t10 = $scope.item.obji5[423125];
            var d5t10 = $scope.item.obji5[423129];

            var p5t11 = $scope.item.obji5[423133];
            var d5t11 = $scope.item.obji5[423137];

            var p5t12 = $scope.item.obji5[423141];
            var d5t12 = $scope.item.obji5[423145];

            var p5t13 = $scope.item.obji5[423149];
            var d5t13 = $scope.item.obji5[423153];

            var p5t14 = $scope.item.obji5[423157];
            var d5t14 = $scope.item.obji5[423161];

            var p5t15 = $scope.item.obji5[423165];
            var d5t15 = $scope.item.obji5[423169];

            var p5t16 = $scope.item.obji5[423173];
            var d5t16 = $scope.item.obji5[423177];

            var p5t17 = $scope.item.obji5[423181];
            var d5t17 = $scope.item.obji5[423185];

            var p5t18 = $scope.item.obji5[423189];
            var d5t18 = $scope.item.obji5[423193];

            var p5t19 = $scope.item.obji5[423197];
            var d5t19 = $scope.item.obji5[423201];

            var p5t20 = $scope.item.obji5[423205];
            var d5t20 = $scope.item.obji5[423209];

            var p5t21 = $scope.item.obji5[423213];
            var d5t21 = $scope.item.obji5[423217];

            if (p5t1 != undefined) {
                jQuery('#qrcodep5t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p5t1
                });	
            }
            
            if (d5t1 != undefined) {
                jQuery('#qrcoded5t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d5t1
            });
            }

            if (p5t2 != undefined) {
                jQuery('#qrcodep5t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p5t2
                });	
            }
            
            if (d5t2 != undefined) {
                jQuery('#qrcoded5t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d5t2
            });
            }

            if (p5t3 != undefined) {
                jQuery('#qrcodep5t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p5t3
                });	
            }
            
            if (d5t3 != undefined) {
                jQuery('#qrcoded5t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d5t3
            });
            }

            if (p5t4 != undefined) {
                jQuery('#qrcodep5t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p5t4
                });	
            }
            
            if (d5t4 != undefined) {
                jQuery('#qrcoded5t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d5t4
            });
            }

            if (p5t5 != undefined) {
                jQuery('#qrcodep5t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p5t5
                });	
            }
            
            if (d5t5 != undefined) {
                jQuery('#qrcoded5t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d5t5
            });
            }

            if (p5t6 != undefined) {
                jQuery('#qrcodep5t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p5t6
                });	
            }
            
            if (d5t6 != undefined) {
                jQuery('#qrcoded5t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d5t6
            });
            }

            if (p5t7 != undefined) {
                jQuery('#qrcodep5t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p5t7
                });	
            }
            
            if (d5t7 != undefined) {
                jQuery('#qrcoded5t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d5t7
            });
            }

            if (p5t8 != undefined) {
                jQuery('#qrcodep5t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p5t8
                });	
            }
            
            if (d5t8 != undefined) {
                jQuery('#qrcoded5t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d5t8
            });
            }

            if (p5t9 != undefined) {
                jQuery('#qrcodep5t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p5t9
                });	
            }
            
            if (d5t9 != undefined) {
                jQuery('#qrcoded5t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d5t9
            });
            }

            if (p5t10 != undefined) {
                jQuery('#qrcodep5t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p5t10
                });	
            }
            
            if (d5t10 != undefined) {
                jQuery('#qrcoded5t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d5t10
            });
            }

            if (p5t11 != undefined) {
                jQuery('#qrcodep5t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p5t11
                });	
            }
            
            if (d5t11 != undefined) {
                jQuery('#qrcoded5t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d5t11
            });
            }

            if (p5t12 != undefined) {
                jQuery('#qrcodep5t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p5t12
                });	
            }
            
            if (d5t12 != undefined) {
                jQuery('#qrcoded5t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d5t12
            });
            }

            if (p5t13 != undefined) {
                jQuery('#qrcodep5t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p5t13
                });	
            }
            
            if (d5t13 != undefined) {
                jQuery('#qrcoded5t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d5t13
            });
            }

            if (p5t14 != undefined) {
                jQuery('#qrcodep5t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p5t14
                });	
            }
            
            if (d5t14 != undefined) {
                jQuery('#qrcoded5t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d5t14
            });
            }

            if (p5t15 != undefined) {
                jQuery('#qrcodep5t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p5t15
                });	
            }
            
            if (d5t15 != undefined) {
                jQuery('#qrcoded5t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d5t15
            });
            }

            if (p5t16 != undefined) {
                jQuery('#qrcodep5t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p5t16
                });	
            }
            
            if (d5t16 != undefined) {
                jQuery('#qrcoded5t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d5t16
            });
            }

            if (p5t17 != undefined) {
                jQuery('#qrcodep5t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p5t17
                });	
            }
            
            if (d5t17 != undefined) {
                jQuery('#qrcoded5t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d5t17
            });
            }

            if (p5t18 != undefined) {
                jQuery('#qrcodep5t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p5t18
                });	
            }
            
            if (d5t18 != undefined) {
                jQuery('#qrcoded5t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d5t18
            });
            }

            if (p5t19 != undefined) {
                jQuery('#qrcodep5t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p5t19
                });	
            }
            
            if (d5t19 != undefined) {
                jQuery('#qrcoded5t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d5t19
            });
            }

            if (p5t20 != undefined) {
                jQuery('#qrcodep5t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p5t20
                });	
            }
            
            if (d5t20 != undefined) {
                jQuery('#qrcoded5t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d5t20
            });
            }

            if (p5t21 != undefined) {
                jQuery('#qrcodep5t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p5t21
                });	
            }
            
            if (d5t21 != undefined) {
                jQuery('#qrcoded5t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d5t21
            });
            }
        }

        if(dataLoad6.length > 0){
            for (var i = 0; i <= dataLoad6.length - 1; i++) {
                if(dataLoad6[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad6[i].type == "textbox") {
                    $('#id_'+dataLoad6[i].emrdfk).html( dataLoad6[i].value)
                    $scope.item.obji6[dataLoad6[i].emrdfk] = dataLoad6[i].value
                }
                if (dataLoad6[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad6[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji6[dataLoad6[i].emrdfk] = chekedd
                }
                if (dataLoad6[i].type == "radio") {
                    $scope.item.obji6[dataLoad6[i].emrdfk] = dataLoad6[i].value

                }

                if (dataLoad6[i].type == "datetime") {
                    $('#id_'+dataLoad6[i].emrdfk).html( dataLoad6[i].value)
                    $scope.item.obji6[dataLoad6[i].emrdfk] = dataLoad6[i].value
                }
                if (dataLoad6[i].type == "time") {
                    $scope.item.obji6[dataLoad6[i].emrdfk] = dataLoad6[i].value
                }
                if (dataLoad6[i].type == "date") {
                    $scope.item.obji6[dataLoad6[i].emrdfk] = dataLoad6[i].value
                }

                if (dataLoad6[i].type == "checkboxtextbox") {
                    $scope.item.obji6[dataLoad6[i].emrdfk] = dataLoad6[i].value
                    $scope.item.obji6[dataLoad6[i].emrdfk] = true
                }
                if (dataLoad6[i].type == "textarea") {
                    $('#id_'+dataLoad6[i].emrdfk).html( dataLoad6[i].value)
                    $scope.item.obji6[dataLoad6[i].emrdfk] = dataLoad6[i].value
                }
                if (dataLoad6[i].type == "combobox") {
        
                    var str = dataLoad6[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji6[dataLoad6[i].emrdfk] = res[1]
                        $('#id_'+dataLoad6[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad6[i].type == "combobox2") {
                    var str = dataLoad6[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji6[dataLoad6[i].emrdfk+""+1] = res[0]
                    $scope.item.obji6[dataLoad6[i].emrdfk] = res[1]
                    $('#id_'+dataLoad6[i].emrdfk).html ( res[1])

                }

                if (dataLoad6[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad6[i].value
                }

                if (dataLoad6[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad6[i].value
                }

                if (dataLoad6[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad6[i].value
                }
                if (dataLoad6[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad6[i].value
                }
                if (dataLoad6[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad6[i].value
                }
                if (dataLoad6[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad6[i].value
                }
                if (dataLoad6[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad6[i].value
                }
                if (dataLoad6[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad6[i].value
                }
                if (dataLoad6[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad6[i].value
                }
                if (dataLoad6[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad6[i].value
                }
                if (dataLoad6[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad6[i].value
                }
                if (dataLoad6[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad6[i].value
                }
                if (dataLoad6[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad6[i].value
                }
                if (dataLoad6[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad6[i].value
                }
                if (dataLoad6[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad6[i].value
                }
                if (dataLoad6[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad6[i].value
                }
                if (dataLoad6[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad6[i].value
                }
                
                if (dataLoad6[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad6[i].value
                }

                $scope.tglemr = dataLoad6[i].tgl
                
            }

            var p6t1 = $scope.item.obji6[423053];
            var d6t1 = $scope.item.obji6[423057];

            var p6t2 = $scope.item.obji6[423061];
            var d6t2 = $scope.item.obji6[423065];

            var p6t3 = $scope.item.obji6[423069];
            var d6t3 = $scope.item.obji6[423073];

            var p6t4 = $scope.item.obji6[423077];
            var d6t4 = $scope.item.obji6[423081];

            var p6t5 = $scope.item.obji6[423085];
            var d6t5 = $scope.item.obji6[423089];

            var p6t6 = $scope.item.obji6[423093];
            var d6t6 = $scope.item.obji6[423097];

            var p6t7 = $scope.item.obji6[423101];
            var d6t7 = $scope.item.obji6[423105];

            var p6t8 = $scope.item.obji6[423109];
            var d6t8 = $scope.item.obji6[423113];

            var p6t9 = $scope.item.obji6[423117];
            var d6t9 = $scope.item.obji6[423121];

            var p6t10 = $scope.item.obji6[423125];
            var d6t10 = $scope.item.obji6[423129];

            var p6t11 = $scope.item.obji6[423133];
            var d6t11 = $scope.item.obji6[423137];

            var p6t12 = $scope.item.obji6[423141];
            var d6t12 = $scope.item.obji6[423145];

            var p6t13 = $scope.item.obji6[423149];
            var d6t13 = $scope.item.obji6[423153];

            var p6t14 = $scope.item.obji6[423157];
            var d6t14 = $scope.item.obji6[423161];

            var p6t15 = $scope.item.obji6[423165];
            var d6t15 = $scope.item.obji6[423169];

            var p6t16 = $scope.item.obji6[423173];
            var d6t16 = $scope.item.obji6[423177];

            var p6t17 = $scope.item.obji6[423181];
            var d6t17 = $scope.item.obji6[423185];

            var p6t18 = $scope.item.obji6[423189];
            var d6t18 = $scope.item.obji6[423193];

            var p6t19 = $scope.item.obji6[423197];
            var d6t19 = $scope.item.obji6[423201];

            var p6t20 = $scope.item.obji6[423205];
            var d6t20 = $scope.item.obji6[423209];

            var p6t21 = $scope.item.obji6[423213];
            var d6t21 = $scope.item.obji6[423217];

            if (p6t1 != undefined) {
                jQuery('#qrcodep6t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p6t1
                });	
            }
            
            if (d6t1 != undefined) {
                jQuery('#qrcoded6t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d6t1
            });
            }

            if (p6t2 != undefined) {
                jQuery('#qrcodep6t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p6t2
                });	
            }
            
            if (d6t2 != undefined) {
                jQuery('#qrcoded6t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d6t2
            });
            }

            if (p6t3 != undefined) {
                jQuery('#qrcodep6t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p6t3
                });	
            }
            
            if (d6t3 != undefined) {
                jQuery('#qrcoded6t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d6t3
            });
            }

            if (p6t4 != undefined) {
                jQuery('#qrcodep6t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p6t4
                });	
            }
            
            if (d6t4 != undefined) {
                jQuery('#qrcoded6t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d6t4
            });
            }

            if (p6t5 != undefined) {
                jQuery('#qrcodep6t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p6t5
                });	
            }
            
            if (d6t5 != undefined) {
                jQuery('#qrcoded6t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d6t5
            });
            }

            if (p6t6 != undefined) {
                jQuery('#qrcodep6t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p6t6
                });	
            }
            
            if (d6t6 != undefined) {
                jQuery('#qrcoded6t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d6t6
            });
            }

            if (p6t7 != undefined) {
                jQuery('#qrcodep6t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p6t7
                });	
            }
            
            if (d6t7 != undefined) {
                jQuery('#qrcoded6t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d6t7
            });
            }

            if (p6t8 != undefined) {
                jQuery('#qrcodep6t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p6t8
                });	
            }
            
            if (d6t8 != undefined) {
                jQuery('#qrcoded6t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d6t8
            });
            }

            if (p6t9 != undefined) {
                jQuery('#qrcodep6t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p6t9
                });	
            }
            
            if (d6t9 != undefined) {
                jQuery('#qrcoded6t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d6t9
            });
            }

            if (p6t10 != undefined) {
                jQuery('#qrcodep6t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p6t10
                });	
            }
            
            if (d6t10 != undefined) {
                jQuery('#qrcoded6t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d6t10
            });
            }

            if (p6t11 != undefined) {
                jQuery('#qrcodep6t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p6t11
                });	
            }
            
            if (d6t11 != undefined) {
                jQuery('#qrcoded6t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d6t11
            });
            }

            if (p6t12 != undefined) {
                jQuery('#qrcodep6t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p6t12
                });	
            }
            
            if (d6t12 != undefined) {
                jQuery('#qrcoded6t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d6t12
            });
            }

            if (p6t13 != undefined) {
                jQuery('#qrcodep6t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p6t13
                });	
            }
            
            if (d6t13 != undefined) {
                jQuery('#qrcoded6t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d6t13
            });
            }

            if (p6t14 != undefined) {
                jQuery('#qrcodep6t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p6t14
                });	
            }
            
            if (d6t14 != undefined) {
                jQuery('#qrcoded6t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d6t14
            });
            }

            if (p6t15 != undefined) {
                jQuery('#qrcodep6t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p6t15
                });	
            }
            
            if (d6t15 != undefined) {
                jQuery('#qrcoded6t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d6t15
            });
            }

            if (p6t16 != undefined) {
                jQuery('#qrcodep6t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p6t16
                });	
            }
            
            if (d6t16 != undefined) {
                jQuery('#qrcoded6t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d6t16
            });
            }

            if (p6t17 != undefined) {
                jQuery('#qrcodep6t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p6t17
                });	
            }
            
            if (d6t17 != undefined) {
                jQuery('#qrcoded6t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d6t17
            });
            }

            if (p6t18 != undefined) {
                jQuery('#qrcodep6t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p6t18
                });	
            }
            
            if (d6t18 != undefined) {
                jQuery('#qrcoded6t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d6t18
            });
            }

            if (p6t19 != undefined) {
                jQuery('#qrcodep6t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p6t19
                });	
            }
            
            if (d6t19 != undefined) {
                jQuery('#qrcoded6t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d6t19
            });
            }

            if (p6t20 != undefined) {
                jQuery('#qrcodep6t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p6t20
                });	
            }
            
            if (d6t20 != undefined) {
                jQuery('#qrcoded6t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d6t20
            });
            }

            if (p6t21 != undefined) {
                jQuery('#qrcodep6t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p6t21
                });	
            }
            
            if (d6t21 != undefined) {
                jQuery('#qrcoded6t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d6t21
            });
            }
        }

        if(dataLoad7.length > 0){
            for (var i = 0; i <= dataLoad7.length - 1; i++) {
                if(dataLoad7[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad7[i].type == "textbox") {
                    $('#id_'+dataLoad7[i].emrdfk).html( dataLoad7[i].value)
                    $scope.item.obji7[dataLoad7[i].emrdfk] = dataLoad7[i].value
                }
                if (dataLoad7[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad7[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji7[dataLoad7[i].emrdfk] = chekedd
                }
                if (dataLoad7[i].type == "radio") {
                    $scope.item.obji7[dataLoad7[i].emrdfk] = dataLoad7[i].value

                }

                if (dataLoad7[i].type == "datetime") {
                    $('#id_'+dataLoad7[i].emrdfk).html( dataLoad7[i].value)
                    $scope.item.obji7[dataLoad7[i].emrdfk] = dataLoad7[i].value
                }
                if (dataLoad7[i].type == "time") {
                    $scope.item.obji7[dataLoad7[i].emrdfk] = dataLoad7[i].value
                }
                if (dataLoad7[i].type == "date") {
                    $scope.item.obji7[dataLoad7[i].emrdfk] = dataLoad7[i].value
                }

                if (dataLoad7[i].type == "checkboxtextbox") {
                    $scope.item.obji7[dataLoad7[i].emrdfk] = dataLoad7[i].value
                    $scope.item.obji7[dataLoad7[i].emrdfk] = true
                }
                if (dataLoad7[i].type == "textarea") {
                    $('#id_'+dataLoad7[i].emrdfk).html( dataLoad7[i].value)
                    $scope.item.obji7[dataLoad7[i].emrdfk] = dataLoad7[i].value
                }
                if (dataLoad7[i].type == "combobox") {
        
                    var str = dataLoad7[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji7[dataLoad7[i].emrdfk] = res[1]
                        $('#id_'+dataLoad7[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad7[i].type == "combobox2") {
                    var str = dataLoad7[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji7[dataLoad7[i].emrdfk+""+1] = res[0]
                    $scope.item.obji7[dataLoad7[i].emrdfk] = res[1]
                    $('#id_'+dataLoad7[i].emrdfk).html ( res[1])

                }

                if (dataLoad7[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad7[i].value
                }

                if (dataLoad7[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad7[i].value
                }

                if (dataLoad7[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad7[i].value
                }
                if (dataLoad7[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad7[i].value
                }
                if (dataLoad7[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad7[i].value
                }
                if (dataLoad7[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad7[i].value
                }
                if (dataLoad7[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad7[i].value
                }
                if (dataLoad7[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad7[i].value
                }
                if (dataLoad7[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad7[i].value
                }
                if (dataLoad7[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad7[i].value
                }
                if (dataLoad7[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad7[i].value
                }
                if (dataLoad7[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad7[i].value
                }
                if (dataLoad7[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad7[i].value
                }
                if (dataLoad7[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad7[i].value
                }
                if (dataLoad7[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad7[i].value
                }
                if (dataLoad7[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad7[i].value
                }
                if (dataLoad7[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad7[i].value
                }
                
                if (dataLoad7[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad7[i].value
                }

                $scope.tglemr = dataLoad7[i].tgl
                
            }

            var p7t1 = $scope.item.obji7[423053];
            var d7t1 = $scope.item.obji7[423057];

            var p7t2 = $scope.item.obji7[423061];
            var d7t2 = $scope.item.obji7[423065];

            var p7t3 = $scope.item.obji7[423069];
            var d7t3 = $scope.item.obji7[423073];

            var p7t4 = $scope.item.obji7[423077];
            var d7t4 = $scope.item.obji7[423081];

            var p7t5 = $scope.item.obji7[423085];
            var d7t5 = $scope.item.obji7[423089];

            var p7t6 = $scope.item.obji7[423093];
            var d7t6 = $scope.item.obji7[423097];

            var p7t7 = $scope.item.obji7[423101];
            var d7t7 = $scope.item.obji7[423105];

            var p7t8 = $scope.item.obji7[423109];
            var d7t8 = $scope.item.obji7[423113];

            var p7t9 = $scope.item.obji7[423117];
            var d7t9 = $scope.item.obji7[423121];

            var p7t10 = $scope.item.obji7[423125];
            var d7t10 = $scope.item.obji7[423129];

            var p7t11 = $scope.item.obji7[423133];
            var d7t11 = $scope.item.obji7[423137];

            var p7t12 = $scope.item.obji7[423141];
            var d7t12 = $scope.item.obji7[423145];

            var p7t13 = $scope.item.obji7[423149];
            var d7t13 = $scope.item.obji7[423153];

            var p7t14 = $scope.item.obji7[423157];
            var d7t14 = $scope.item.obji7[423161];

            var p7t15 = $scope.item.obji7[423165];
            var d7t15 = $scope.item.obji7[423169];

            var p7t16 = $scope.item.obji7[423173];
            var d7t16 = $scope.item.obji7[423177];

            var p7t17 = $scope.item.obji7[423181];
            var d7t17 = $scope.item.obji7[423185];

            var p7t18 = $scope.item.obji7[423189];
            var d7t18 = $scope.item.obji7[423193];

            var p7t19 = $scope.item.obji7[423197];
            var d7t19 = $scope.item.obji7[423201];

            var p7t20 = $scope.item.obji7[423205];
            var d7t20 = $scope.item.obji7[423209];

            var p7t21 = $scope.item.obji7[423213];
            var d7t21 = $scope.item.obji7[423217];

            if (p7t1 != undefined) {
                jQuery('#qrcodep7t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p7t1
                });	
            }
            
            if (d7t1 != undefined) {
                jQuery('#qrcoded7t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d7t1
            });
            }

            if (p7t2 != undefined) {
                jQuery('#qrcodep7t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p7t2
                });	
            }
            
            if (d7t2 != undefined) {
                jQuery('#qrcoded7t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d7t2
            });
            }

            if (p7t3 != undefined) {
                jQuery('#qrcodep7t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p7t3
                });	
            }
            
            if (d7t3 != undefined) {
                jQuery('#qrcoded7t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d7t3
            });
            }

            if (p7t4 != undefined) {
                jQuery('#qrcodep7t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p7t4
                });	
            }
            
            if (d7t4 != undefined) {
                jQuery('#qrcoded7t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d7t4
            });
            }

            if (p7t5 != undefined) {
                jQuery('#qrcodep7t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p7t5
                });	
            }
            
            if (d7t5 != undefined) {
                jQuery('#qrcoded7t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d7t5
            });
            }

            if (p7t6 != undefined) {
                jQuery('#qrcodep7t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p7t6
                });	
            }
            
            if (d7t6 != undefined) {
                jQuery('#qrcoded7t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d7t6
            });
            }

            if (p7t7 != undefined) {
                jQuery('#qrcodep7t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p7t7
                });	
            }
            
            if (d7t7 != undefined) {
                jQuery('#qrcoded7t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d7t7
            });
            }

            if (p7t8 != undefined) {
                jQuery('#qrcodep7t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p7t8
                });	
            }
            
            if (d7t8 != undefined) {
                jQuery('#qrcoded7t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d7t8
            });
            }

            if (p7t9 != undefined) {
                jQuery('#qrcodep7t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p7t9
                });	
            }
            
            if (d7t9 != undefined) {
                jQuery('#qrcoded7t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d7t9
            });
            }

            if (p7t10 != undefined) {
                jQuery('#qrcodep7t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p7t10
                });	
            }
            
            if (d7t10 != undefined) {
                jQuery('#qrcoded7t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d7t10
            });
            }

            if (p7t11 != undefined) {
                jQuery('#qrcodep7t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p7t11
                });	
            }
            
            if (d7t11 != undefined) {
                jQuery('#qrcoded7t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d7t11
            });
            }

            if (p7t12 != undefined) {
                jQuery('#qrcodep7t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p7t12
                });	
            }
            
            if (d7t12 != undefined) {
                jQuery('#qrcoded7t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d7t12
            });
            }

            if (p7t13 != undefined) {
                jQuery('#qrcodep7t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p7t13
                });	
            }
            
            if (d7t13 != undefined) {
                jQuery('#qrcoded7t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d7t13
            });
            }

            if (p7t14 != undefined) {
                jQuery('#qrcodep7t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p7t14
                });	
            }
            
            if (d7t14 != undefined) {
                jQuery('#qrcoded7t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d7t14
            });
            }

            if (p7t15 != undefined) {
                jQuery('#qrcodep7t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p7t15
                });	
            }
            
            if (d7t15 != undefined) {
                jQuery('#qrcoded7t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d7t15
            });
            }

            if (p7t16 != undefined) {
                jQuery('#qrcodep7t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p7t16
                });	
            }
            
            if (d7t16 != undefined) {
                jQuery('#qrcoded7t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d7t16
            });
            }

            if (p7t17 != undefined) {
                jQuery('#qrcodep7t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p7t17
                });	
            }
            
            if (d7t17 != undefined) {
                jQuery('#qrcoded7t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d7t17
            });
            }

            if (p7t18 != undefined) {
                jQuery('#qrcodep7t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p7t18
                });	
            }
            
            if (d7t18 != undefined) {
                jQuery('#qrcoded7t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d7t18
            });
            }

            if (p7t19 != undefined) {
                jQuery('#qrcodep7t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p7t19
                });	
            }
            
            if (d7t19 != undefined) {
                jQuery('#qrcoded7t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d7t19
            });
            }

            if (p7t20 != undefined) {
                jQuery('#qrcodep7t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p7t20
                });	
            }
            
            if (d7t20 != undefined) {
                jQuery('#qrcoded7t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d7t20
            });
            }

            if (p7t21 != undefined) {
                jQuery('#qrcodep7t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p7t21
                });	
            }
            
            if (d7t21 != undefined) {
                jQuery('#qrcoded7t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d7t21
            });
            }
        }

        if(dataLoad8.length > 0){
            for (var i = 0; i <= dataLoad8.length - 1; i++) {
                if(dataLoad8[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad8[i].type == "textbox") {
                    $('#id_'+dataLoad8[i].emrdfk).html( dataLoad8[i].value)
                    $scope.item.obji8[dataLoad8[i].emrdfk] = dataLoad8[i].value
                }
                if (dataLoad8[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad8[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji8[dataLoad8[i].emrdfk] = chekedd
                }
                if (dataLoad8[i].type == "radio") {
                    $scope.item.obji8[dataLoad8[i].emrdfk] = dataLoad8[i].value

                }

                if (dataLoad8[i].type == "datetime") {
                    $('#id_'+dataLoad8[i].emrdfk).html( dataLoad8[i].value)
                    $scope.item.obji8[dataLoad8[i].emrdfk] = dataLoad8[i].value
                }
                if (dataLoad8[i].type == "time") {
                    $scope.item.obji8[dataLoad8[i].emrdfk] = dataLoad8[i].value
                }
                if (dataLoad8[i].type == "date") {
                    $scope.item.obji8[dataLoad8[i].emrdfk] = dataLoad8[i].value
                }

                if (dataLoad8[i].type == "checkboxtextbox") {
                    $scope.item.obji8[dataLoad8[i].emrdfk] = dataLoad8[i].value
                    $scope.item.obji8[dataLoad8[i].emrdfk] = true
                }
                if (dataLoad8[i].type == "textarea") {
                    $('#id_'+dataLoad8[i].emrdfk).html( dataLoad8[i].value)
                    $scope.item.obji8[dataLoad8[i].emrdfk] = dataLoad8[i].value
                }
                if (dataLoad8[i].type == "combobox") {
        
                    var str = dataLoad8[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji8[dataLoad8[i].emrdfk] = res[1]
                        $('#id_'+dataLoad8[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad8[i].type == "combobox2") {
                    var str = dataLoad8[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji8[dataLoad8[i].emrdfk+""+1] = res[0]
                    $scope.item.obji8[dataLoad8[i].emrdfk] = res[1]
                    $('#id_'+dataLoad8[i].emrdfk).html ( res[1])

                }

                if (dataLoad8[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad8[i].value
                }

                if (dataLoad8[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad8[i].value
                }

                if (dataLoad8[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad8[i].value
                }
                if (dataLoad8[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad8[i].value
                }
                if (dataLoad8[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad8[i].value
                }
                if (dataLoad8[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad8[i].value
                }
                if (dataLoad8[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad8[i].value
                }
                if (dataLoad8[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad8[i].value
                }
                if (dataLoad8[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad8[i].value
                }
                if (dataLoad8[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad8[i].value
                }
                if (dataLoad8[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad8[i].value
                }
                if (dataLoad8[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad8[i].value
                }
                if (dataLoad8[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad8[i].value
                }
                if (dataLoad8[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad8[i].value
                }
                if (dataLoad8[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad8[i].value
                }
                if (dataLoad8[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad8[i].value
                }
                if (dataLoad8[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad8[i].value
                }
                
                if (dataLoad8[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad8[i].value
                }

                $scope.tglemr = dataLoad8[i].tgl
                
            }

            var p8t1 = $scope.item.obji8[423053];
            var d8t1 = $scope.item.obji8[423057];

            var p8t2 = $scope.item.obji8[423061];
            var d8t2 = $scope.item.obji8[423065];

            var p8t3 = $scope.item.obji8[423069];
            var d8t3 = $scope.item.obji8[423073];

            var p8t4 = $scope.item.obji8[423077];
            var d8t4 = $scope.item.obji8[423081];

            var p8t5 = $scope.item.obji8[423085];
            var d8t5 = $scope.item.obji8[423089];

            var p8t6 = $scope.item.obji8[423093];
            var d8t6 = $scope.item.obji8[423097];

            var p8t7 = $scope.item.obji8[423101];
            var d8t7 = $scope.item.obji8[423105];

            var p8t8 = $scope.item.obji8[423109];
            var d8t8 = $scope.item.obji8[423113];

            var p8t9 = $scope.item.obji8[423117];
            var d8t9 = $scope.item.obji8[423121];

            var p8t10 = $scope.item.obji8[423125];
            var d8t10 = $scope.item.obji8[423129];

            var p8t11 = $scope.item.obji8[423133];
            var d8t11 = $scope.item.obji8[423137];

            var p8t12 = $scope.item.obji8[423141];
            var d8t12 = $scope.item.obji8[423145];

            var p8t13 = $scope.item.obji8[423149];
            var d8t13 = $scope.item.obji8[423153];

            var p8t14 = $scope.item.obji8[423157];
            var d8t14 = $scope.item.obji8[423161];

            var p8t15 = $scope.item.obji8[423165];
            var d8t15 = $scope.item.obji8[423169];

            var p8t16 = $scope.item.obji8[423173];
            var d8t16 = $scope.item.obji8[423177];

            var p8t17 = $scope.item.obji8[423181];
            var d8t17 = $scope.item.obji8[423185];

            var p8t18 = $scope.item.obji8[423189];
            var d8t18 = $scope.item.obji8[423193];

            var p8t19 = $scope.item.obji8[423197];
            var d8t19 = $scope.item.obji8[423201];

            var p8t20 = $scope.item.obji8[423205];
            var d8t20 = $scope.item.obji8[423209];

            var p8t21 = $scope.item.obji8[423213];
            var d8t21 = $scope.item.obji8[423217];

            if (p8t1 != undefined) {
                jQuery('#qrcodep8t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p8t1
                });	
            }
            
            if (d8t1 != undefined) {
                jQuery('#qrcoded8t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d8t1
            });
            }

            if (p8t2 != undefined) {
                jQuery('#qrcodep8t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p8t2
                });	
            }
            
            if (d8t2 != undefined) {
                jQuery('#qrcoded8t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d8t2
            });
            }

            if (p8t3 != undefined) {
                jQuery('#qrcodep8t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p8t3
                });	
            }
            
            if (d8t3 != undefined) {
                jQuery('#qrcoded8t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d8t3
            });
            }

            if (p8t4 != undefined) {
                jQuery('#qrcodep8t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p8t4
                });	
            }
            
            if (d8t4 != undefined) {
                jQuery('#qrcoded8t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d8t4
            });
            }

            if (p8t5 != undefined) {
                jQuery('#qrcodep8t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p8t5
                });	
            }
            
            if (d8t5 != undefined) {
                jQuery('#qrcoded8t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d8t5
            });
            }

            if (p8t6 != undefined) {
                jQuery('#qrcodep8t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p8t6
                });	
            }
            
            if (d8t6 != undefined) {
                jQuery('#qrcoded8t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d8t6
            });
            }

            if (p8t7 != undefined) {
                jQuery('#qrcodep8t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p8t7
                });	
            }
            
            if (d8t7 != undefined) {
                jQuery('#qrcoded8t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d8t7
            });
            }

            if (p8t8 != undefined) {
                jQuery('#qrcodep8t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p8t8
                });	
            }
            
            if (d8t8 != undefined) {
                jQuery('#qrcoded8t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d8t8
            });
            }

            if (p8t9 != undefined) {
                jQuery('#qrcodep8t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p8t9
                });	
            }
            
            if (d8t9 != undefined) {
                jQuery('#qrcoded8t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d8t9
            });
            }

            if (p8t10 != undefined) {
                jQuery('#qrcodep8t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p8t10
                });	
            }
            
            if (d8t10 != undefined) {
                jQuery('#qrcoded8t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d8t10
            });
            }

            if (p8t11 != undefined) {
                jQuery('#qrcodep8t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p8t11
                });	
            }
            
            if (d8t11 != undefined) {
                jQuery('#qrcoded8t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d8t11
            });
            }

            if (p8t12 != undefined) {
                jQuery('#qrcodep8t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p8t12
                });	
            }
            
            if (d8t12 != undefined) {
                jQuery('#qrcoded8t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d8t12
            });
            }

            if (p8t13 != undefined) {
                jQuery('#qrcodep8t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p8t13
                });	
            }
            
            if (d8t13 != undefined) {
                jQuery('#qrcoded8t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d8t13
            });
            }

            if (p8t14 != undefined) {
                jQuery('#qrcodep8t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p8t14
                });	
            }
            
            if (d8t14 != undefined) {
                jQuery('#qrcoded8t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d8t14
            });
            }

            if (p8t15 != undefined) {
                jQuery('#qrcodep8t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p8t15
                });	
            }
            
            if (d8t15 != undefined) {
                jQuery('#qrcoded8t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d8t15
            });
            }

            if (p8t16 != undefined) {
                jQuery('#qrcodep8t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p8t16
                });	
            }
            
            if (d8t16 != undefined) {
                jQuery('#qrcoded8t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d8t16
            });
            }

            if (p8t17 != undefined) {
                jQuery('#qrcodep8t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p8t17
                });	
            }
            
            if (d8t17 != undefined) {
                jQuery('#qrcoded8t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d8t17
            });
            }

            if (p8t18 != undefined) {
                jQuery('#qrcodep8t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p8t18
                });	
            }
            
            if (d8t18 != undefined) {
                jQuery('#qrcoded8t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d8t18
            });
            }

            if (p8t19 != undefined) {
                jQuery('#qrcodep8t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p8t19
                });	
            }
            
            if (d8t19 != undefined) {
                jQuery('#qrcoded8t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d8t19
            });
            }

            if (p8t20 != undefined) {
                jQuery('#qrcodep8t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p8t20
                });	
            }
            
            if (d8t20 != undefined) {
                jQuery('#qrcoded8t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d8t20
            });
            }

            if (p8t21 != undefined) {
                jQuery('#qrcodep8t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p8t21
                });	
            }
            
            if (d2t21 != undefined) {
                jQuery('#qrcoded2t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d2t21
            });
            }
        }

        if(dataLoad9.length > 0){
            for (var i = 0; i <= dataLoad9.length - 1; i++) {
                if(dataLoad9[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad9[i].type == "textbox") {
                    $('#id_'+dataLoad9[i].emrdfk).html( dataLoad9[i].value)
                    $scope.item.obji9[dataLoad9[i].emrdfk] = dataLoad9[i].value
                }
                if (dataLoad9[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad9[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji9[dataLoad9[i].emrdfk] = chekedd
                }
                if (dataLoad9[i].type == "radio") {
                    $scope.item.obji9[dataLoad9[i].emrdfk] = dataLoad9[i].value

                }

                if (dataLoad9[i].type == "datetime") {
                    $('#id_'+dataLoad9[i].emrdfk).html( dataLoad9[i].value)
                    $scope.item.obji9[dataLoad9[i].emrdfk] = dataLoad9[i].value
                }
                if (dataLoad9[i].type == "time") {
                    $scope.item.obji9[dataLoad9[i].emrdfk] = dataLoad9[i].value
                }
                if (dataLoad9[i].type == "date") {
                    $scope.item.obji9[dataLoad9[i].emrdfk] = dataLoad9[i].value
                }

                if (dataLoad9[i].type == "checkboxtextbox") {
                    $scope.item.obji9[dataLoad9[i].emrdfk] = dataLoad9[i].value
                    $scope.item.obji9[dataLoad9[i].emrdfk] = true
                }
                if (dataLoad9[i].type == "textarea") {
                    $('#id_'+dataLoad9[i].emrdfk).html( dataLoad9[i].value)
                    $scope.item.obji9[dataLoad9[i].emrdfk] = dataLoad9[i].value
                }
                if (dataLoad9[i].type == "combobox") {
        
                    var str = dataLoad9[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji9[dataLoad9[i].emrdfk] = res[1]
                        $('#id_'+dataLoad9[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad9[i].type == "combobox2") {
                    var str = dataLoad9[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji9[dataLoad9[i].emrdfk+""+1] = res[0]
                    $scope.item.obji9[dataLoad9[i].emrdfk] = res[1]
                    $('#id_'+dataLoad9[i].emrdfk).html ( res[1])

                }

                if (dataLoad9[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad9[i].value
                }

                if (dataLoad9[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad9[i].value
                }

                if (dataLoad9[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad9[i].value
                }
                if (dataLoad9[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad9[i].value
                }
                if (dataLoad9[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad9[i].value
                }
                if (dataLoad9[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad9[i].value
                }
                if (dataLoad9[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad9[i].value
                }
                if (dataLoad9[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad9[i].value
                }
                if (dataLoad9[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad9[i].value
                }
                if (dataLoad9[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad9[i].value
                }
                if (dataLoad9[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad9[i].value
                }
                if (dataLoad9[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad9[i].value
                }
                if (dataLoad9[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad9[i].value
                }
                if (dataLoad9[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad9[i].value
                }
                if (dataLoad9[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad9[i].value
                }
                if (dataLoad9[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad9[i].value
                }
                if (dataLoad9[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad9[i].value
                }
                
                if (dataLoad9[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad9[i].value
                }

                $scope.tglemr = dataLoad9[i].tgl
                
            }

            var p9t1 = $scope.item.obji9[423053];
            var d9t1 = $scope.item.obji9[423057];

            var p9t2 = $scope.item.obji9[423061];
            var d9t2 = $scope.item.obji9[423065];

            var p9t3 = $scope.item.obji9[423069];
            var d9t3 = $scope.item.obji9[423073];

            var p9t4 = $scope.item.obji9[423077];
            var d9t4 = $scope.item.obji9[423081];

            var p9t5 = $scope.item.obji9[423085];
            var d9t5 = $scope.item.obji9[423089];

            var p9t6 = $scope.item.obji9[423093];
            var d9t6 = $scope.item.obji9[423097];

            var p9t7 = $scope.item.obji9[423101];
            var d9t7 = $scope.item.obji9[423105];

            var p9t8 = $scope.item.obji9[423109];
            var d9t8 = $scope.item.obji9[423113];

            var p9t9 = $scope.item.obji9[423117];
            var d9t9 = $scope.item.obji9[423121];

            var p9t10 = $scope.item.obji9[423125];
            var d9t10 = $scope.item.obji9[423129];

            var p9t11 = $scope.item.obji9[423133];
            var d9t11 = $scope.item.obji9[423137];

            var p9t12 = $scope.item.obji9[423141];
            var d9t12 = $scope.item.obji9[423145];

            var p9t13 = $scope.item.obji9[423149];
            var d9t13 = $scope.item.obji9[423153];

            var p9t14 = $scope.item.obji9[423157];
            var d9t14 = $scope.item.obji9[423161];

            var p9t15 = $scope.item.obji9[423165];
            var d9t15 = $scope.item.obji9[423169];

            var p9t16 = $scope.item.obji9[423173];
            var d9t16 = $scope.item.obji9[423177];

            var p9t17 = $scope.item.obji9[423181];
            var d9t17 = $scope.item.obji9[423185];

            var p9t18 = $scope.item.obji9[423189];
            var d9t18 = $scope.item.obji9[423193];

            var p9t19 = $scope.item.obji9[423197];
            var d9t19 = $scope.item.obji9[423201];

            var p9t20 = $scope.item.obji9[423205];
            var d9t20 = $scope.item.obji9[423209];

            var p9t21 = $scope.item.obji9[423213];
            var d9t21 = $scope.item.obji9[423217];

            if (p9t1 != undefined) {
                jQuery('#qrcodep9t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p9t1
                });	
            }
            
            if (d9t1 != undefined) {
                jQuery('#qrcoded9t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d9t1
            });
            }

            if (p9t2 != undefined) {
                jQuery('#qrcodep9t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p9t2
                });	
            }
            
            if (d9t2 != undefined) {
                jQuery('#qrcoded9t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d9t2
            });
            }

            if (p9t3 != undefined) {
                jQuery('#qrcodep9t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p9t3
                });	
            }
            
            if (d9t3 != undefined) {
                jQuery('#qrcoded9t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d9t3
            });
            }

            if (p9t4 != undefined) {
                jQuery('#qrcodep9t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p9t4
                });	
            }
            
            if (d9t4 != undefined) {
                jQuery('#qrcoded9t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d9t4
            });
            }

            if (p9t5 != undefined) {
                jQuery('#qrcodep9t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p9t5
                });	
            }
            
            if (d9t5 != undefined) {
                jQuery('#qrcoded9t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d9t5
            });
            }

            if (p9t6 != undefined) {
                jQuery('#qrcodep9t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p9t6
                });	
            }
            
            if (d9t6 != undefined) {
                jQuery('#qrcoded9t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d9t6
            });
            }

            if (p9t7 != undefined) {
                jQuery('#qrcodep9t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p9t7
                });	
            }
            
            if (d9t7 != undefined) {
                jQuery('#qrcoded9t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d9t7
            });
            }

            if (p9t8 != undefined) {
                jQuery('#qrcodep9t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p9t8
                });	
            }
            
            if (d9t8 != undefined) {
                jQuery('#qrcoded9t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d9t8
            });
            }

            if (p9t9 != undefined) {
                jQuery('#qrcodep9t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p9t9
                });	
            }
            
            if (d9t9 != undefined) {
                jQuery('#qrcoded9t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d9t9
            });
            }

            if (p9t10 != undefined) {
                jQuery('#qrcodep9t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p9t10
                });	
            }
            
            if (d9t10 != undefined) {
                jQuery('#qrcoded9t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d9t10
            });
            }

            if (p9t11 != undefined) {
                jQuery('#qrcodep9t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p9t11
                });	
            }
            
            if (d9t11 != undefined) {
                jQuery('#qrcoded9t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d9t11
            });
            }

            if (p9t12 != undefined) {
                jQuery('#qrcodep9t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p9t12
                });	
            }
            
            if (d9t12 != undefined) {
                jQuery('#qrcoded9t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d9t12
            });
            }

            if (p9t13 != undefined) {
                jQuery('#qrcodep9t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p9t13
                });	
            }
            
            if (d9t13 != undefined) {
                jQuery('#qrcoded9t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d9t13
            });
            }

            if (p9t14 != undefined) {
                jQuery('#qrcodep9t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p9t14
                });	
            }
            
            if (d9t14 != undefined) {
                jQuery('#qrcoded9t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d9t14
            });
            }

            if (p9t15 != undefined) {
                jQuery('#qrcodep9t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p9t15
                });	
            }
            
            if (d9t15 != undefined) {
                jQuery('#qrcoded9t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d9t15
            });
            }

            if (p9t16 != undefined) {
                jQuery('#qrcodep9t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p9t16
                });	
            }
            
            if (d9t16 != undefined) {
                jQuery('#qrcoded9t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d9t16
            });
            }

            if (p9t17 != undefined) {
                jQuery('#qrcodep9t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p9t17
                });	
            }
            
            if (d9t17 != undefined) {
                jQuery('#qrcoded9t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d9t17
            });
            }

            if (p9t18 != undefined) {
                jQuery('#qrcodep9t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p9t18
                });	
            }
            
            if (d9t18 != undefined) {
                jQuery('#qrcoded9t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d9t18
            });
            }

            if (p9t19 != undefined) {
                jQuery('#qrcodep9t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p9t19
                });	
            }
            
            if (d9t19 != undefined) {
                jQuery('#qrcoded9t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d9t19
            });
            }

            if (p9t20 != undefined) {
                jQuery('#qrcodep9t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p9t20
                });	
            }
            
            if (d9t20 != undefined) {
                jQuery('#qrcoded9t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d9t20
            });
            }

            if (p9t21 != undefined) {
                jQuery('#qrcodep9t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p9t21
                });	
            }
            
            if (d9t21 != undefined) {
                jQuery('#qrcoded9t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d9t21
            });
            }
        }

        if(dataLoad10.length > 0){
            for (var i = 0; i <= dataLoad10.length - 1; i++) {
                if(dataLoad10[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad10[i].type == "textbox") {
                    $('#id_'+dataLoad10[i].emrdfk).html( dataLoad10[i].value)
                    $scope.item.obji10[dataLoad10[i].emrdfk] = dataLoad10[i].value
                }
                if (dataLoad10[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad10[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji10[dataLoad10[i].emrdfk] = chekedd
                }
                if (dataLoad10[i].type == "radio") {
                    $scope.item.obji10[dataLoad10[i].emrdfk] = dataLoad10[i].value

                }

                if (dataLoad10[i].type == "datetime") {
                    $('#id_'+dataLoad10[i].emrdfk).html( dataLoad10[i].value)
                    $scope.item.obji10[dataLoad10[i].emrdfk] = dataLoad10[i].value
                }
                if (dataLoad10[i].type == "time") {
                    $scope.item.obji10[dataLoad10[i].emrdfk] = dataLoad10[i].value
                }
                if (dataLoad10[i].type == "date") {
                    $scope.item.obji10[dataLoad10[i].emrdfk] = dataLoad10[i].value
                }

                if (dataLoad10[i].type == "checkboxtextbox") {
                    $scope.item.obji10[dataLoad10[i].emrdfk] = dataLoad10[i].value
                    $scope.item.obji10[dataLoad10[i].emrdfk] = true
                }
                if (dataLoad10[i].type == "textarea") {
                    $('#id_'+dataLoad10[i].emrdfk).html( dataLoad10[i].value)
                    $scope.item.obji10[dataLoad10[i].emrdfk] = dataLoad10[i].value
                }
                if (dataLoad10[i].type == "combobox") {
        
                    var str = dataLoad10[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji10[dataLoad10[i].emrdfk] = res[1]
                        $('#id_'+dataLoad10[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad10[i].type == "combobox2") {
                    var str = dataLoad10[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji10[dataLoad10[i].emrdfk+""+1] = res[0]
                    $scope.item.obji10[dataLoad10[i].emrdfk] = res[1]
                    $('#id_'+dataLoad10[i].emrdfk).html ( res[1])

                }

                if (dataLoad10[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad10[i].value
                }

                if (dataLoad10[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad10[i].value
                }

                if (dataLoad10[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad10[i].value
                }
                if (dataLoad10[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad10[i].value
                }
                if (dataLoad10[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad10[i].value
                }
                if (dataLoad10[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad10[i].value
                }
                if (dataLoad10[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad10[i].value
                }
                if (dataLoad10[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad10[i].value
                }
                if (dataLoad10[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad10[i].value
                }
                if (dataLoad10[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad10[i].value
                }
                if (dataLoad10[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad10[i].value
                }
                if (dataLoad10[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad10[i].value
                }
                if (dataLoad10[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad10[i].value
                }
                if (dataLoad10[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad10[i].value
                }
                if (dataLoad10[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad10[i].value
                }
                if (dataLoad10[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad10[i].value
                }
                if (dataLoad10[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad10[i].value
                }
                
                if (dataLoad10[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad10[i].value
                }

                $scope.tglemr = dataLoad10[i].tgl
                
            }

            var p10t1 = $scope.item.obji10[423053];
            var d10t1 = $scope.item.obji10[423057];

            var p10t2 = $scope.item.obji10[423061];
            var d10t2 = $scope.item.obji10[423065];

            var p10t3 = $scope.item.obji10[423069];
            var d10t3 = $scope.item.obji10[423073];

            var p10t4 = $scope.item.obji10[423077];
            var d10t4 = $scope.item.obji10[423081];

            var p10t5 = $scope.item.obji10[423085];
            var d10t5 = $scope.item.obji10[423089];

            var p10t6 = $scope.item.obji10[423093];
            var d10t6 = $scope.item.obji10[423097];

            var p10t7 = $scope.item.obji10[423101];
            var d10t7 = $scope.item.obji10[423105];

            var p10t8 = $scope.item.obji10[423109];
            var d10t8 = $scope.item.obji10[423113];

            var p10t9 = $scope.item.obji10[423117];
            var d10t9 = $scope.item.obji10[423121];

            var p10t10 = $scope.item.obji10[423125];
            var d10t10 = $scope.item.obji10[423129];

            var p10t11 = $scope.item.obji10[423133];
            var d10t11 = $scope.item.obji10[423137];

            var p10t12 = $scope.item.obji10[423141];
            var d10t12 = $scope.item.obji10[423145];

            var p10t13 = $scope.item.obji10[423149];
            var d10t13 = $scope.item.obji10[423153];

            var p10t14 = $scope.item.obji10[423157];
            var d10t14 = $scope.item.obji10[423161];

            var p10t15 = $scope.item.obji10[423165];
            var d10t15 = $scope.item.obji10[423169];

            var p10t16 = $scope.item.obji10[423173];
            var d10t16 = $scope.item.obji10[423177];

            var p10t17 = $scope.item.obji10[423181];
            var d10t17 = $scope.item.obji10[423185];

            var p10t18 = $scope.item.obji10[423189];
            var d10t18 = $scope.item.obji10[423193];

            var p10t19 = $scope.item.obji10[423197];
            var d10t19 = $scope.item.obji10[423201];

            var p10t20 = $scope.item.obji10[423205];
            var d10t20 = $scope.item.obji10[423209];

            var p10t21 = $scope.item.obji10[423213];
            var d10t21 = $scope.item.obji10[423217];

            if (p10t1 != undefined) {
                jQuery('#qrcodep10t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p10t1
                });	
            }
            
            if (d10t1 != undefined) {
                jQuery('#qrcoded10t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d10t1
            });
            }

            if (p10t2 != undefined) {
                jQuery('#qrcodep10t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p10t2
                });	
            }
            
            if (d10t2 != undefined) {
                jQuery('#qrcoded10t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d10t2
            });
            }

            if (p10t3 != undefined) {
                jQuery('#qrcodep10t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p10t3
                });	
            }
            
            if (d10t3 != undefined) {
                jQuery('#qrcoded10t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d10t3
            });
            }

            if (p10t4 != undefined) {
                jQuery('#qrcodep10t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p10t4
                });	
            }
            
            if (d10t4 != undefined) {
                jQuery('#qrcoded10t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d10t4
            });
            }

            if (p10t5 != undefined) {
                jQuery('#qrcodep10t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p10t5
                });	
            }
            
            if (d10t5 != undefined) {
                jQuery('#qrcoded10t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d10t5
            });
            }

            if (p10t6 != undefined) {
                jQuery('#qrcodep10t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p10t6
                });	
            }
            
            if (d10t6 != undefined) {
                jQuery('#qrcoded10t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d10t6
            });
            }

            if (p10t7 != undefined) {
                jQuery('#qrcodep10t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p10t7
                });	
            }
            
            if (d10t7 != undefined) {
                jQuery('#qrcoded10t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d10t7
            });
            }

            if (p10t8 != undefined) {
                jQuery('#qrcodep10t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p10t8
                });	
            }
            
            if (d10t8 != undefined) {
                jQuery('#qrcoded10t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d10t8
            });
            }

            if (p10t9 != undefined) {
                jQuery('#qrcodep10t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p10t9
                });	
            }
            
            if (d10t9 != undefined) {
                jQuery('#qrcoded10t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d10t9
            });
            }

            if (p10t10 != undefined) {
                jQuery('#qrcodep10t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p10t10
                });	
            }
            
            if (d10t10 != undefined) {
                jQuery('#qrcoded10t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d10t10
            });
            }

            if (p10t11 != undefined) {
                jQuery('#qrcodep10t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p10t11
                });	
            }
            
            if (d10t11 != undefined) {
                jQuery('#qrcoded10t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d10t11
            });
            }

            if (p10t12 != undefined) {
                jQuery('#qrcodep10t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p10t12
                });	
            }
            
            if (d10t12 != undefined) {
                jQuery('#qrcoded10t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d10t12
            });
            }

            if (p10t13 != undefined) {
                jQuery('#qrcodep10t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p10t13
                });	
            }
            
            if (d10t13 != undefined) {
                jQuery('#qrcoded10t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d10t13
            });
            }

            if (p10t14 != undefined) {
                jQuery('#qrcodep10t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p10t14
                });	
            }
            
            if (d10t14 != undefined) {
                jQuery('#qrcoded10t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d10t14
            });
            }

            if (p10t15 != undefined) {
                jQuery('#qrcodep10t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p10t15
                });	
            }
            
            if (d10t15 != undefined) {
                jQuery('#qrcoded10t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d10t15
            });
            }

            if (p10t16 != undefined) {
                jQuery('#qrcodep10t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p10t16
                });	
            }
            
            if (d10t16 != undefined) {
                jQuery('#qrcoded10t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d10t16
            });
            }

            if (p10t17 != undefined) {
                jQuery('#qrcodep10t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p10t17
                });	
            }
            
            if (d10t17 != undefined) {
                jQuery('#qrcoded10t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d10t17
            });
            }

            if (p10t18 != undefined) {
                jQuery('#qrcodep10t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p10t18
                });	
            }
            
            if (d10t18 != undefined) {
                jQuery('#qrcoded10t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d10t18
            });
            }

            if (p10t19 != undefined) {
                jQuery('#qrcodep10t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p10t19
                });	
            }
            
            if (d10t19 != undefined) {
                jQuery('#qrcoded10t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d10t19
            });
            }

            if (p10t20 != undefined) {
                jQuery('#qrcodep10t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p10t20
                });	
            }
            
            if (d10t20 != undefined) {
                jQuery('#qrcoded10t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d10t20
            });
            }

            if (p10t21 != undefined) {
                jQuery('#qrcodep10t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p10t21
                });	
            }
            
            if (d10t21 != undefined) {
                jQuery('#qrcoded10t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d10t21
            });
            }
        }

        if(dataLoad11.length > 0){
            for (var i = 0; i <= dataLoad11.length - 1; i++) {
                if(dataLoad11[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad11[i].type == "textbox") {
                    $('#id_'+dataLoad11[i].emrdfk).html( dataLoad11[i].value)
                    $scope.item.obji11[dataLoad11[i].emrdfk] = dataLoad11[i].value
                }
                if (dataLoad11[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad11[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji11[dataLoad11[i].emrdfk] = chekedd
                }
                if (dataLoad11[i].type == "radio") {
                    $scope.item.obji11[dataLoad11[i].emrdfk] = dataLoad11[i].value

                }

                if (dataLoad11[i].type == "datetime") {
                    $('#id_'+dataLoad11[i].emrdfk).html( dataLoad11[i].value)
                    $scope.item.obji11[dataLoad11[i].emrdfk] = dataLoad11[i].value
                }
                if (dataLoad11[i].type == "time") {
                    $scope.item.obji11[dataLoad11[i].emrdfk] = dataLoad11[i].value
                }
                if (dataLoad11[i].type == "date") {
                    $scope.item.obji11[dataLoad11[i].emrdfk] = dataLoad11[i].value
                }

                if (dataLoad11[i].type == "checkboxtextbox") {
                    $scope.item.obji11[dataLoad11[i].emrdfk] = dataLoad11[i].value
                    $scope.item.obji11[dataLoad11[i].emrdfk] = true
                }
                if (dataLoad11[i].type == "textarea") {
                    $('#id_'+dataLoad11[i].emrdfk).html( dataLoad11[i].value)
                    $scope.item.obji11[dataLoad11[i].emrdfk] = dataLoad11[i].value
                }
                if (dataLoad11[i].type == "combobox") {
        
                    var str = dataLoad11[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji11[dataLoad11[i].emrdfk] = res[1]
                        $('#id_'+dataLoad11[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad11[i].type == "combobox2") {
                    var str = dataLoad11[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji11[dataLoad11[i].emrdfk+""+1] = res[0]
                    $scope.item.obji11[dataLoad11[i].emrdfk] = res[1]
                    $('#id_'+dataLoad11[i].emrdfk).html ( res[1])

                }

                if (dataLoad11[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad11[i].value
                }

                if (dataLoad11[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad11[i].value
                }

                if (dataLoad11[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad11[i].value
                }
                if (dataLoad11[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad11[i].value
                }
                if (dataLoad11[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad11[i].value
                }
                if (dataLoad11[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad11[i].value
                }
                if (dataLoad11[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad11[i].value
                }
                if (dataLoad11[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad11[i].value
                }
                if (dataLoad11[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad11[i].value
                }
                if (dataLoad11[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad11[i].value
                }
                if (dataLoad11[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad11[i].value
                }
                if (dataLoad11[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad11[i].value
                }
                if (dataLoad11[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad11[i].value
                }
                if (dataLoad11[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad11[i].value
                }
                if (dataLoad11[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad11[i].value
                }
                if (dataLoad11[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad11[i].value
                }
                if (dataLoad11[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad11[i].value
                }
                
                if (dataLoad11[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad11[i].value
                }

                $scope.tglemr = dataLoad11[i].tgl
                
            }

            var p11t1 = $scope.item.obji11[423053];
            var d11t1 = $scope.item.obji11[423057];

            var p11t2 = $scope.item.obji11[423061];
            var d11t2 = $scope.item.obji11[423065];

            var p11t3 = $scope.item.obji11[423069];
            var d11t3 = $scope.item.obji11[423073];

            var p11t4 = $scope.item.obji11[423077];
            var d11t4 = $scope.item.obji11[423081];

            var p11t5 = $scope.item.obji11[423085];
            var d11t5 = $scope.item.obji11[423089];

            var p11t6 = $scope.item.obji11[423093];
            var d11t6 = $scope.item.obji11[423097];

            var p11t7 = $scope.item.obji11[423101];
            var d11t7 = $scope.item.obji11[423105];

            var p11t8 = $scope.item.obji11[423109];
            var d11t8 = $scope.item.obji11[423113];

            var p11t9 = $scope.item.obji11[423117];
            var d11t9 = $scope.item.obji11[423121];

            var p11t10 = $scope.item.obji11[423125];
            var d11t10 = $scope.item.obji11[423129];

            var p11t11 = $scope.item.obji11[423133];
            var d11t11 = $scope.item.obji11[423137];

            var p11t12 = $scope.item.obji11[423141];
            var d11t12 = $scope.item.obji11[423145];

            var p11t13 = $scope.item.obji11[423149];
            var d11t13 = $scope.item.obji11[423153];

            var p11t14 = $scope.item.obji11[423157];
            var d11t14 = $scope.item.obji11[423161];

            var p11t15 = $scope.item.obji11[423165];
            var d11t15 = $scope.item.obji11[423169];

            var p11t16 = $scope.item.obji11[423173];
            var d11t16 = $scope.item.obji11[423177];

            var p11t17 = $scope.item.obji11[423181];
            var d11t17 = $scope.item.obji11[423185];

            var p11t18 = $scope.item.obji11[423189];
            var d11t18 = $scope.item.obji11[423193];

            var p11t19 = $scope.item.obji11[423197];
            var d11t19 = $scope.item.obji11[423201];

            var p11t20 = $scope.item.obji11[423205];
            var d11t20 = $scope.item.obji11[423209];

            var p11t21 = $scope.item.obji11[423213];
            var d11t21 = $scope.item.obji11[423217];

            if (p11t1 != undefined) {
                jQuery('#qrcodep11t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p11t1
                });	
            }
            
            if (d11t1 != undefined) {
                jQuery('#qrcoded11t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d11t1
            });
            }

            if (p11t2 != undefined) {
                jQuery('#qrcodep11t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p11t2
                });	
            }
            
            if (d11t2 != undefined) {
                jQuery('#qrcoded11t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d11t2
            });
            }

            if (p11t3 != undefined) {
                jQuery('#qrcodep11t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p11t3
                });	
            }
            
            if (d11t3 != undefined) {
                jQuery('#qrcoded11t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d11t3
            });
            }

            if (p11t4 != undefined) {
                jQuery('#qrcodep11t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p11t4
                });	
            }
            
            if (d11t4 != undefined) {
                jQuery('#qrcoded11t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d11t4
            });
            }

            if (p11t5 != undefined) {
                jQuery('#qrcodep11t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p11t5
                });	
            }
            
            if (d11t5 != undefined) {
                jQuery('#qrcoded11t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d11t5
            });
            }

            if (p11t6 != undefined) {
                jQuery('#qrcodep11t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p11t6
                });	
            }
            
            if (d11t6 != undefined) {
                jQuery('#qrcoded11t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d11t6
            });
            }

            if (p11t7 != undefined) {
                jQuery('#qrcodep11t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p11t7
                });	
            }
            
            if (d11t7 != undefined) {
                jQuery('#qrcoded11t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d11t7
            });
            }

            if (p11t8 != undefined) {
                jQuery('#qrcodep11t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p11t8
                });	
            }
            
            if (d11t8 != undefined) {
                jQuery('#qrcoded11t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d11t8
            });
            }

            if (p11t9 != undefined) {
                jQuery('#qrcodep11t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p11t9
                });	
            }
            
            if (d11t9 != undefined) {
                jQuery('#qrcoded11t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d11t9
            });
            }

            if (p11t10 != undefined) {
                jQuery('#qrcodep11t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p11t10
                });	
            }
            
            if (d11t10 != undefined) {
                jQuery('#qrcoded11t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d11t10
            });
            }

            if (p11t11 != undefined) {
                jQuery('#qrcodep11t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p11t11
                });	
            }
            
            if (d11t11 != undefined) {
                jQuery('#qrcoded11t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d11t11
            });
            }

            if (p11t12 != undefined) {
                jQuery('#qrcodep11t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p11t12
                });	
            }
            
            if (d11t12 != undefined) {
                jQuery('#qrcoded11t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d11t12
            });
            }

            if (p11t13 != undefined) {
                jQuery('#qrcodep11t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p11t13
                });	
            }
            
            if (d11t13 != undefined) {
                jQuery('#qrcoded11t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d11t13
            });
            }

            if (p11t14 != undefined) {
                jQuery('#qrcodep11t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p11t14
                });	
            }
            
            if (d11t14 != undefined) {
                jQuery('#qrcoded11t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d11t14
            });
            }

            if (p11t15 != undefined) {
                jQuery('#qrcodep11t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p11t15
                });	
            }
            
            if (d11t15 != undefined) {
                jQuery('#qrcoded11t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d11t15
            });
            }

            if (p11t16 != undefined) {
                jQuery('#qrcodep11t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p11t16
                });	
            }
            
            if (d11t16 != undefined) {
                jQuery('#qrcoded11t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d11t16
            });
            }

            if (p11t17 != undefined) {
                jQuery('#qrcodep11t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p11t17
                });	
            }
            
            if (d11t17 != undefined) {
                jQuery('#qrcoded11t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d11t17
            });
            }

            if (p11t18 != undefined) {
                jQuery('#qrcodep11t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p11t18
                });	
            }
            
            if (d11t18 != undefined) {
                jQuery('#qrcoded11t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d11t18
            });
            }

            if (p11t19 != undefined) {
                jQuery('#qrcodep11t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p11t19
                });	
            }
            
            if (d11t19 != undefined) {
                jQuery('#qrcoded11t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d11t19
            });
            }

            if (p11t20 != undefined) {
                jQuery('#qrcodep11t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p11t20
                });	
            }
            
            if (d11t20 != undefined) {
                jQuery('#qrcoded11t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d11t20
            });
            }

            if (p11t21 != undefined) {
                jQuery('#qrcodep11t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p11t21
                });	
            }
            
            if (d11t21 != undefined) {
                jQuery('#qrcoded11t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d11t21
            });
            }
        }

        if(dataLoad12.length > 0){
            for (var i = 0; i <= dataLoad12.length - 1; i++) {
                if(dataLoad12[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad12[i].type == "textbox") {
                    $('#id_'+dataLoad12[i].emrdfk).html( dataLoad12[i].value)
                    $scope.item.obji12[dataLoad12[i].emrdfk] = dataLoad12[i].value
                }
                if (dataLoad12[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad12[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji12[dataLoad12[i].emrdfk] = chekedd
                }
                if (dataLoad12[i].type == "radio") {
                    $scope.item.obji12[dataLoad12[i].emrdfk] = dataLoad12[i].value

                }

                if (dataLoad12[i].type == "datetime") {
                    $('#id_'+dataLoad12[i].emrdfk).html( dataLoad12[i].value)
                    $scope.item.obji12[dataLoad12[i].emrdfk] = dataLoad12[i].value
                }
                if (dataLoad12[i].type == "time") {
                    $scope.item.obji12[dataLoad12[i].emrdfk] = dataLoad12[i].value
                }
                if (dataLoad12[i].type == "date") {
                    $scope.item.obji12[dataLoad12[i].emrdfk] = dataLoad12[i].value
                }

                if (dataLoad12[i].type == "checkboxtextbox") {
                    $scope.item.obji12[dataLoad12[i].emrdfk] = dataLoad12[i].value
                    $scope.item.obji12[dataLoad12[i].emrdfk] = true
                }
                if (dataLoad12[i].type == "textarea") {
                    $('#id_'+dataLoad12[i].emrdfk).html( dataLoad12[i].value)
                    $scope.item.obji12[dataLoad12[i].emrdfk] = dataLoad12[i].value
                }
                if (dataLoad12[i].type == "combobox") {
        
                    var str = dataLoad12[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji12[dataLoad12[i].emrdfk] = res[1]
                        $('#id_'+dataLoad12[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad12[i].type == "combobox2") {
                    var str = dataLoad12[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji12[dataLoad12[i].emrdfk+""+1] = res[0]
                    $scope.item.obji12[dataLoad12[i].emrdfk] = res[1]
                    $('#id_'+dataLoad12[i].emrdfk).html ( res[1])

                }

                if (dataLoad12[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad12[i].value
                }

                if (dataLoad12[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad12[i].value
                }

                if (dataLoad12[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad12[i].value
                }
                if (dataLoad12[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad12[i].value
                }
                if (dataLoad12[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad12[i].value
                }
                if (dataLoad12[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad12[i].value
                }
                if (dataLoad12[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad12[i].value
                }
                if (dataLoad12[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad12[i].value
                }
                if (dataLoad12[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad12[i].value
                }
                if (dataLoad12[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad12[i].value
                }
                if (dataLoad12[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad12[i].value
                }
                if (dataLoad12[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad12[i].value
                }
                if (dataLoad12[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad12[i].value
                }
                if (dataLoad12[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad12[i].value
                }
                if (dataLoad12[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad12[i].value
                }
                if (dataLoad12[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad12[i].value
                }
                if (dataLoad12[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad12[i].value
                }
                
                if (dataLoad12[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad12[i].value
                }

                $scope.tglemr = dataLoad12[i].tgl
                
            }

            var p12t1 = $scope.item.obji12[423053];
            var d12t1 = $scope.item.obji12[423057];

            var p12t2 = $scope.item.obji12[423061];
            var d12t2 = $scope.item.obji12[423065];

            var p12t3 = $scope.item.obji12[423069];
            var d12t3 = $scope.item.obji12[423073];

            var p12t4 = $scope.item.obji12[423077];
            var d12t4 = $scope.item.obji12[423081];

            var p12t5 = $scope.item.obji12[423085];
            var d12t5 = $scope.item.obji12[423089];

            var p12t6 = $scope.item.obji12[423093];
            var d12t6 = $scope.item.obji12[423097];

            var p12t7 = $scope.item.obji12[423101];
            var d12t7 = $scope.item.obji12[423105];

            var p12t8 = $scope.item.obji12[423109];
            var d12t8 = $scope.item.obji12[423113];

            var p12t9 = $scope.item.obji12[423117];
            var d12t9 = $scope.item.obji12[423121];

            var p12t10 = $scope.item.obji12[423125];
            var d12t10 = $scope.item.obji12[423129];

            var p12t11 = $scope.item.obji12[423133];
            var d12t11 = $scope.item.obji12[423137];

            var p12t12 = $scope.item.obji12[423141];
            var d12t12 = $scope.item.obji12[423145];

            var p12t13 = $scope.item.obji12[423149];
            var d12t13 = $scope.item.obji12[423153];

            var p12t14 = $scope.item.obji12[423157];
            var d12t14 = $scope.item.obji12[423161];

            var p12t15 = $scope.item.obji12[423165];
            var d12t15 = $scope.item.obji12[423169];

            var p12t16 = $scope.item.obji12[423173];
            var d12t16 = $scope.item.obji12[423177];

            var p12t17 = $scope.item.obji12[423181];
            var d12t17 = $scope.item.obji12[423185];

            var p12t18 = $scope.item.obji12[423189];
            var d12t18 = $scope.item.obji12[423193];

            var p12t19 = $scope.item.obji12[423197];
            var d12t19 = $scope.item.obji12[423201];

            var p12t20 = $scope.item.obji12[423205];
            var d12t20 = $scope.item.obji12[423209];

            var p12t21 = $scope.item.obji12[423213];
            var d12t21 = $scope.item.obji12[423217];

            if (p12t1 != undefined) {
                jQuery('#qrcodep12t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p12t1
                });	
            }
            
            if (d12t1 != undefined) {
                jQuery('#qrcoded12t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d12t1
            });
            }

            if (p12t2 != undefined) {
                jQuery('#qrcodep12t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p12t2
                });	
            }
            
            if (d12t2 != undefined) {
                jQuery('#qrcoded12t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d12t2
            });
            }

            if (p12t3 != undefined) {
                jQuery('#qrcodep12t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p12t3
                });	
            }
            
            if (d12t3 != undefined) {
                jQuery('#qrcoded12t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d12t3
            });
            }

            if (p12t4 != undefined) {
                jQuery('#qrcodep12t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p12t4
                });	
            }
            
            if (d12t4 != undefined) {
                jQuery('#qrcoded12t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d12t4
            });
            }

            if (p12t5 != undefined) {
                jQuery('#qrcodep12t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p12t5
                });	
            }
            
            if (d12t5 != undefined) {
                jQuery('#qrcoded12t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d12t5
            });
            }

            if (p12t6 != undefined) {
                jQuery('#qrcodep12t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p12t6
                });	
            }
            
            if (d12t6 != undefined) {
                jQuery('#qrcoded12t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d12t6
            });
            }

            if (p12t7 != undefined) {
                jQuery('#qrcodep12t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p12t7
                });	
            }
            
            if (d12t7 != undefined) {
                jQuery('#qrcoded12t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d12t7
            });
            }

            if (p12t8 != undefined) {
                jQuery('#qrcodep12t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p12t8
                });	
            }
            
            if (d12t8 != undefined) {
                jQuery('#qrcoded12t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d12t8
            });
            }

            if (p12t9 != undefined) {
                jQuery('#qrcodep12t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p12t9
                });	
            }
            
            if (d12t9 != undefined) {
                jQuery('#qrcoded12t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d12t9
            });
            }

            if (p12t10 != undefined) {
                jQuery('#qrcodep12t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p12t10
                });	
            }
            
            if (d12t10 != undefined) {
                jQuery('#qrcoded12t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d12t10
            });
            }

            if (p12t11 != undefined) {
                jQuery('#qrcodep12t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p12t11
                });	
            }
            
            if (d12t11 != undefined) {
                jQuery('#qrcoded12t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d12t11
            });
            }

            if (p12t12 != undefined) {
                jQuery('#qrcodep12t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p12t12
                });	
            }
            
            if (d12t12 != undefined) {
                jQuery('#qrcoded12t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d12t12
            });
            }

            if (p12t13 != undefined) {
                jQuery('#qrcodep12t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p12t13
                });	
            }
            
            if (d12t13 != undefined) {
                jQuery('#qrcoded12t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d12t13
            });
            }

            if (p12t14 != undefined) {
                jQuery('#qrcodep12t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p12t14
                });	
            }
            
            if (d12t14 != undefined) {
                jQuery('#qrcoded12t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d12t14
            });
            }

            if (p12t15 != undefined) {
                jQuery('#qrcodep12t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p12t15
                });	
            }
            
            if (d12t15 != undefined) {
                jQuery('#qrcoded12t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d12t15
            });
            }

            if (p12t16 != undefined) {
                jQuery('#qrcodep12t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p12t16
                });	
            }
            
            if (d12t16 != undefined) {
                jQuery('#qrcoded12t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d12t16
            });
            }

            if (p12t17 != undefined) {
                jQuery('#qrcodep12t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p12t17
                });	
            }
            
            if (d12t17 != undefined) {
                jQuery('#qrcoded12t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d12t17
            });
            }

            if (p12t18 != undefined) {
                jQuery('#qrcodep12t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p12t18
                });	
            }
            
            if (d12t18 != undefined) {
                jQuery('#qrcoded12t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d12t18
            });
            }

            if (p12t19 != undefined) {
                jQuery('#qrcodep12t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p12t19
                });	
            }
            
            if (d12t19 != undefined) {
                jQuery('#qrcoded12t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d12t19
            });
            }

            if (p12t20 != undefined) {
                jQuery('#qrcodep12t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p12t20
                });	
            }
            
            if (d12t20 != undefined) {
                jQuery('#qrcoded12t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d12t20
            });
            }

            if (p12t21 != undefined) {
                jQuery('#qrcodep12t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p12t21
                });	
            }
            
            if (d12t21 != undefined) {
                jQuery('#qrcoded12t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d12t21
            });
            }
        }

        if(dataLoad13.length > 0){
            for (var i = 0; i <= dataLoad13.length - 1; i++) {
                if(dataLoad13[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad13[i].type == "textbox") {
                    $('#id_'+dataLoad13[i].emrdfk).html( dataLoad13[i].value)
                    $scope.item.obji13[dataLoad13[i].emrdfk] = dataLoad13[i].value
                }
                if (dataLoad13[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad13[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji13[dataLoad13[i].emrdfk] = chekedd
                }
                if (dataLoad13[i].type == "radio") {
                    $scope.item.obji13[dataLoad13[i].emrdfk] = dataLoad13[i].value

                }

                if (dataLoad13[i].type == "datetime") {
                    $('#id_'+dataLoad13[i].emrdfk).html( dataLoad13[i].value)
                    $scope.item.obji13[dataLoad13[i].emrdfk] = dataLoad13[i].value
                }
                if (dataLoad13[i].type == "time") {
                    $scope.item.obji13[dataLoad13[i].emrdfk] = dataLoad13[i].value
                }
                if (dataLoad13[i].type == "date") {
                    $scope.item.obji13[dataLoad13[i].emrdfk] = dataLoad13[i].value
                }

                if (dataLoad13[i].type == "checkboxtextbox") {
                    $scope.item.obji13[dataLoad13[i].emrdfk] = dataLoad13[i].value
                    $scope.item.obji13[dataLoad13[i].emrdfk] = true
                }
                if (dataLoad13[i].type == "textarea") {
                    $('#id_'+dataLoad13[i].emrdfk).html( dataLoad13[i].value)
                    $scope.item.obji13[dataLoad13[i].emrdfk] = dataLoad13[i].value
                }
                if (dataLoad13[i].type == "combobox") {
        
                    var str = dataLoad13[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji13[dataLoad13[i].emrdfk] = res[1]
                        $('#id_'+dataLoad13[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad13[i].type == "combobox2") {
                    var str = dataLoad13[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji13[dataLoad13[i].emrdfk+""+1] = res[0]
                    $scope.item.obji13[dataLoad13[i].emrdfk] = res[1]
                    $('#id_'+dataLoad13[i].emrdfk).html ( res[1])

                }

                if (dataLoad13[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad13[i].value
                }

                if (dataLoad13[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad13[i].value
                }

                if (dataLoad13[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad13[i].value
                }
                if (dataLoad13[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad13[i].value
                }
                if (dataLoad13[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad13[i].value
                }
                if (dataLoad13[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad13[i].value
                }
                if (dataLoad13[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad13[i].value
                }
                if (dataLoad13[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad13[i].value
                }
                if (dataLoad13[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad13[i].value
                }
                if (dataLoad13[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad13[i].value
                }
                if (dataLoad13[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad13[i].value
                }
                if (dataLoad13[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad13[i].value
                }
                if (dataLoad13[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad13[i].value
                }
                if (dataLoad13[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad13[i].value
                }
                if (dataLoad13[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad13[i].value
                }
                if (dataLoad13[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad13[i].value
                }
                if (dataLoad13[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad13[i].value
                }
                
                if (dataLoad13[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad13[i].value
                }

                $scope.tglemr = dataLoad13[i].tgl
                
            }

            var p13t1 = $scope.item.obji13[423053];
            var d13t1 = $scope.item.obji13[423057];

            var p13t2 = $scope.item.obji13[423061];
            var d13t2 = $scope.item.obji13[423065];

            var p13t3 = $scope.item.obji13[423069];
            var d13t3 = $scope.item.obji13[423073];

            var p13t4 = $scope.item.obji13[423077];
            var d13t4 = $scope.item.obji13[423081];

            var p13t5 = $scope.item.obji13[423085];
            var d13t5 = $scope.item.obji13[423089];

            var p13t6 = $scope.item.obji13[423093];
            var d13t6 = $scope.item.obji13[423097];

            var p13t7 = $scope.item.obji13[423101];
            var d13t7 = $scope.item.obji13[423105];

            var p13t8 = $scope.item.obji13[423109];
            var d13t8 = $scope.item.obji13[423113];

            var p13t9 = $scope.item.obji13[423117];
            var d13t9 = $scope.item.obji13[423121];

            var p13t10 = $scope.item.obji13[423125];
            var d13t10 = $scope.item.obji13[423129];

            var p13t11 = $scope.item.obji13[423133];
            var d13t11 = $scope.item.obji13[423137];

            var p13t12 = $scope.item.obji13[423141];
            var d13t12 = $scope.item.obji13[423145];

            var p13t13 = $scope.item.obji13[423149];
            var d13t13 = $scope.item.obji13[423153];

            var p13t14 = $scope.item.obji13[423157];
            var d13t14 = $scope.item.obji13[423161];

            var p13t15 = $scope.item.obji13[423165];
            var d13t15 = $scope.item.obji13[423169];

            var p13t16 = $scope.item.obji13[423173];
            var d13t16 = $scope.item.obji13[423177];

            var p13t17 = $scope.item.obji13[423181];
            var d13t17 = $scope.item.obji13[423185];

            var p13t18 = $scope.item.obji13[423189];
            var d13t18 = $scope.item.obji13[423193];

            var p13t19 = $scope.item.obji13[423197];
            var d13t19 = $scope.item.obji13[423201];

            var p13t20 = $scope.item.obji13[423205];
            var d13t20 = $scope.item.obji13[423209];

            var p13t21 = $scope.item.obji13[423213];
            var d13t21 = $scope.item.obji13[423217];

            if (p13t1 != undefined) {
                jQuery('#qrcodep13t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p13t1
                });	
            }
            
            if (d13t1 != undefined) {
                jQuery('#qrcoded13t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d13t1
            });
            }

            if (p13t2 != undefined) {
                jQuery('#qrcodep13t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p13t2
                });	
            }
            
            if (d13t2 != undefined) {
                jQuery('#qrcoded13t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d13t2
            });
            }

            if (p13t3 != undefined) {
                jQuery('#qrcodep13t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p13t3
                });	
            }
            
            if (d13t3 != undefined) {
                jQuery('#qrcoded13t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d13t3
            });
            }

            if (p13t4 != undefined) {
                jQuery('#qrcodep13t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p13t4
                });	
            }
            
            if (d13t4 != undefined) {
                jQuery('#qrcoded13t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d13t4
            });
            }

            if (p13t5 != undefined) {
                jQuery('#qrcodep13t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p13t5
                });	
            }
            
            if (d13t5 != undefined) {
                jQuery('#qrcoded13t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d13t5
            });
            }

            if (p13t6 != undefined) {
                jQuery('#qrcodep13t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p13t6
                });	
            }
            
            if (d13t6 != undefined) {
                jQuery('#qrcoded13t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d13t6
            });
            }

            if (p13t7 != undefined) {
                jQuery('#qrcodep13t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p13t7
                });	
            }
            
            if (d13t7 != undefined) {
                jQuery('#qrcoded13t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d13t7
            });
            }

            if (p13t8 != undefined) {
                jQuery('#qrcodep13t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p13t8
                });	
            }
            
            if (d13t8 != undefined) {
                jQuery('#qrcoded13t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d13t8
            });
            }

            if (p13t9 != undefined) {
                jQuery('#qrcodep13t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p13t9
                });	
            }
            
            if (d13t9 != undefined) {
                jQuery('#qrcoded13t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d13t9
            });
            }

            if (p13t10 != undefined) {
                jQuery('#qrcodep13t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p13t10
                });	
            }
            
            if (d13t10 != undefined) {
                jQuery('#qrcoded13t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d13t10
            });
            }

            if (p13t11 != undefined) {
                jQuery('#qrcodep13t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p13t11
                });	
            }
            
            if (d13t11 != undefined) {
                jQuery('#qrcoded13t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d13t11
            });
            }

            if (p13t12 != undefined) {
                jQuery('#qrcodep13t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p13t12
                });	
            }
            
            if (d13t12 != undefined) {
                jQuery('#qrcoded13t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d13t12
            });
            }

            if (p13t13 != undefined) {
                jQuery('#qrcodep13t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p13t13
                });	
            }
            
            if (d13t13 != undefined) {
                jQuery('#qrcoded13t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d13t13
            });
            }

            if (p13t14 != undefined) {
                jQuery('#qrcodep13t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p13t14
                });	
            }
            
            if (d13t14 != undefined) {
                jQuery('#qrcoded13t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d13t14
            });
            }

            if (p13t15 != undefined) {
                jQuery('#qrcodep13t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p13t15
                });	
            }
            
            if (d13t15 != undefined) {
                jQuery('#qrcoded13t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d13t15
            });
            }

            if (p13t16 != undefined) {
                jQuery('#qrcodep13t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p13t16
                });	
            }
            
            if (d13t16 != undefined) {
                jQuery('#qrcoded13t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d13t16
            });
            }

            if (p13t17 != undefined) {
                jQuery('#qrcodep13t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p13t17
                });	
            }
            
            if (d13t17 != undefined) {
                jQuery('#qrcoded13t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d13t17
            });
            }

            if (p13t18 != undefined) {
                jQuery('#qrcodep13t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p13t18
                });	
            }
            
            if (d13t18 != undefined) {
                jQuery('#qrcoded13t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d13t18
            });
            }

            if (p13t19 != undefined) {
                jQuery('#qrcodep13t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p13t19
                });	
            }
            
            if (d13t19 != undefined) {
                jQuery('#qrcoded13t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d13t19
            });
            }

            if (p13t20 != undefined) {
                jQuery('#qrcodep13t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p13t20
                });	
            }
            
            if (d13t20 != undefined) {
                jQuery('#qrcoded13t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d13t20
            });
            }

            if (p13t21 != undefined) {
                jQuery('#qrcodep13t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p13t21
                });	
            }
            
            if (d13t21 != undefined) {
                jQuery('#qrcoded13t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d13t21
            });
            }
        }

        if(dataLoad14.length > 0){
            for (var i = 0; i <= dataLoad14.length - 1; i++) {
                if(dataLoad14[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad14[i].type == "textbox") {
                    $('#id_'+dataLoad14[i].emrdfk).html( dataLoad14[i].value)
                    $scope.item.obji14[dataLoad14[i].emrdfk] = dataLoad14[i].value
                }
                if (dataLoad14[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad14[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji14[dataLoad14[i].emrdfk] = chekedd
                }
                if (dataLoad14[i].type == "radio") {
                    $scope.item.obji14[dataLoad14[i].emrdfk] = dataLoad14[i].value

                }

                if (dataLoad14[i].type == "datetime") {
                    $('#id_'+dataLoad14[i].emrdfk).html( dataLoad14[i].value)
                    $scope.item.obji14[dataLoad14[i].emrdfk] = dataLoad14[i].value
                }
                if (dataLoad14[i].type == "time") {
                    $scope.item.obji14[dataLoad14[i].emrdfk] = dataLoad14[i].value
                }
                if (dataLoad14[i].type == "date") {
                    $scope.item.obji14[dataLoad14[i].emrdfk] = dataLoad14[i].value
                }

                if (dataLoad14[i].type == "checkboxtextbox") {
                    $scope.item.obji14[dataLoad14[i].emrdfk] = dataLoad14[i].value
                    $scope.item.obji14[dataLoad14[i].emrdfk] = true
                }
                if (dataLoad14[i].type == "textarea") {
                    $('#id_'+dataLoad14[i].emrdfk).html( dataLoad14[i].value)
                    $scope.item.obji14[dataLoad14[i].emrdfk] = dataLoad14[i].value
                }
                if (dataLoad14[i].type == "combobox") {
        
                    var str = dataLoad14[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji14[dataLoad14[i].emrdfk] = res[1]
                        $('#id_'+dataLoad14[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad14[i].type == "combobox2") {
                    var str = dataLoad14[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji14[dataLoad14[i].emrdfk+""+1] = res[0]
                    $scope.item.obji14[dataLoad14[i].emrdfk] = res[1]
                    $('#id_'+dataLoad14[i].emrdfk).html ( res[1])

                }

                if (dataLoad14[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad14[i].value
                }

                if (dataLoad14[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad14[i].value
                }

                if (dataLoad14[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad14[i].value
                }
                if (dataLoad14[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad14[i].value
                }
                if (dataLoad14[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad14[i].value
                }
                if (dataLoad14[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad14[i].value
                }
                if (dataLoad14[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad14[i].value
                }
                if (dataLoad14[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad14[i].value
                }
                if (dataLoad14[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad14[i].value
                }
                if (dataLoad14[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad14[i].value
                }
                if (dataLoad14[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad14[i].value
                }
                if (dataLoad14[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad14[i].value
                }
                if (dataLoad14[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad14[i].value
                }
                if (dataLoad14[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad14[i].value
                }
                if (dataLoad14[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad14[i].value
                }
                if (dataLoad14[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad14[i].value
                }
                if (dataLoad14[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad14[i].value
                }
                
                if (dataLoad14[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad14[i].value
                }

                $scope.tglemr = dataLoad14[i].tgl
                
            }

            var p14t1 = $scope.item.obji14[423053];
            var d14t1 = $scope.item.obji14[423057];

            var p14t2 = $scope.item.obji14[423061];
            var d14t2 = $scope.item.obji14[423065];

            var p14t3 = $scope.item.obji14[423069];
            var d14t3 = $scope.item.obji14[423073];

            var p14t4 = $scope.item.obji14[423077];
            var d14t4 = $scope.item.obji14[423081];

            var p14t5 = $scope.item.obji14[423085];
            var d14t5 = $scope.item.obji14[423089];

            var p14t6 = $scope.item.obji14[423093];
            var d14t6 = $scope.item.obji14[423097];

            var p14t7 = $scope.item.obji14[423101];
            var d14t7 = $scope.item.obji14[423105];

            var p14t8 = $scope.item.obji14[423109];
            var d14t8 = $scope.item.obji14[423113];

            var p14t9 = $scope.item.obji14[423117];
            var d14t9 = $scope.item.obji14[423121];

            var p14t10 = $scope.item.obji14[423125];
            var d14t10 = $scope.item.obji14[423129];

            var p14t11 = $scope.item.obji14[423133];
            var d14t11 = $scope.item.obji14[423137];

            var p14t12 = $scope.item.obji14[423141];
            var d14t12 = $scope.item.obji14[423145];

            var p14t13 = $scope.item.obji14[423149];
            var d14t13 = $scope.item.obji14[423153];

            var p14t14 = $scope.item.obji14[423157];
            var d14t14 = $scope.item.obji14[423161];

            var p14t15 = $scope.item.obji14[423165];
            var d14t15 = $scope.item.obji14[423169];

            var p14t16 = $scope.item.obji14[423173];
            var d14t16 = $scope.item.obji14[423177];

            var p14t17 = $scope.item.obji14[423181];
            var d14t17 = $scope.item.obji14[423185];

            var p14t18 = $scope.item.obji14[423189];
            var d14t18 = $scope.item.obji14[423193];

            var p14t19 = $scope.item.obji14[423197];
            var d14t19 = $scope.item.obji14[423201];

            var p14t20 = $scope.item.obji14[423205];
            var d14t20 = $scope.item.obji14[423209];

            var p14t21 = $scope.item.obji14[423213];
            var d14t21 = $scope.item.obji14[423217];

            if (p14t1 != undefined) {
                jQuery('#qrcodep14t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p14t1
                });	
            }
            
            if (d14t1 != undefined) {
                jQuery('#qrcoded14t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d14t1
            });
            }

            if (p14t2 != undefined) {
                jQuery('#qrcodep14t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p14t2
                });	
            }
            
            if (d14t2 != undefined) {
                jQuery('#qrcoded14t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d14t2
            });
            }

            if (p14t3 != undefined) {
                jQuery('#qrcodep14t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p14t3
                });	
            }
            
            if (d14t3 != undefined) {
                jQuery('#qrcoded14t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d14t3
            });
            }

            if (p14t4 != undefined) {
                jQuery('#qrcodep14t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p14t4
                });	
            }
            
            if (d14t4 != undefined) {
                jQuery('#qrcoded14t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d14t4
            });
            }

            if (p14t5 != undefined) {
                jQuery('#qrcodep14t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p14t5
                });	
            }
            
            if (d14t5 != undefined) {
                jQuery('#qrcoded14t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d14t5
            });
            }

            if (p14t6 != undefined) {
                jQuery('#qrcodep14t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p14t6
                });	
            }
            
            if (d14t6 != undefined) {
                jQuery('#qrcoded14t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d14t6
            });
            }

            if (p14t7 != undefined) {
                jQuery('#qrcodep14t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p14t7
                });	
            }
            
            if (d14t7 != undefined) {
                jQuery('#qrcoded14t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d14t7
            });
            }

            if (p14t8 != undefined) {
                jQuery('#qrcodep14t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p14t8
                });	
            }
            
            if (d14t8 != undefined) {
                jQuery('#qrcoded14t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d14t8
            });
            }

            if (p14t9 != undefined) {
                jQuery('#qrcodep14t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p14t9
                });	
            }
            
            if (d14t9 != undefined) {
                jQuery('#qrcoded14t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d14t9
            });
            }

            if (p14t10 != undefined) {
                jQuery('#qrcodep14t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p14t10
                });	
            }
            
            if (d14t10 != undefined) {
                jQuery('#qrcoded14t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d14t10
            });
            }

            if (p14t11 != undefined) {
                jQuery('#qrcodep14t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p14t11
                });	
            }
            
            if (d14t11 != undefined) {
                jQuery('#qrcoded14t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d14t11
            });
            }

            if (p14t12 != undefined) {
                jQuery('#qrcodep14t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p14t12
                });	
            }
            
            if (d14t12 != undefined) {
                jQuery('#qrcoded14t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d14t12
            });
            }

            if (p14t13 != undefined) {
                jQuery('#qrcodep14t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p14t13
                });	
            }
            
            if (d14t13 != undefined) {
                jQuery('#qrcoded14t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d14t13
            });
            }

            if (p14t14 != undefined) {
                jQuery('#qrcodep14t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p14t14
                });	
            }
            
            if (d14t14 != undefined) {
                jQuery('#qrcoded14t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d14t14
            });
            }

            if (p14t15 != undefined) {
                jQuery('#qrcodep14t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p14t15
                });	
            }
            
            if (d14t15 != undefined) {
                jQuery('#qrcoded14t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d14t15
            });
            }

            if (p14t16 != undefined) {
                jQuery('#qrcodep14t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p14t16
                });	
            }
            
            if (d14t16 != undefined) {
                jQuery('#qrcoded14t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d14t16
            });
            }

            if (p14t17 != undefined) {
                jQuery('#qrcodep14t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p14t17
                });	
            }
            
            if (d14t17 != undefined) {
                jQuery('#qrcoded14t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d14t17
            });
            }

            if (p14t18 != undefined) {
                jQuery('#qrcodep14t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p14t18
                });	
            }
            
            if (d14t18 != undefined) {
                jQuery('#qrcoded14t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d14t18
            });
            }

            if (p14t19 != undefined) {
                jQuery('#qrcodep14t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p14t19
                });	
            }
            
            if (d14t19 != undefined) {
                jQuery('#qrcoded14t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d14t19
            });
            }

            if (p14t20 != undefined) {
                jQuery('#qrcodep14t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p14t20
                });	
            }
            
            if (d14t20 != undefined) {
                jQuery('#qrcoded14t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d14t20
            });
            }

            if (p14t21 != undefined) {
                jQuery('#qrcodep14t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p14t21
                });	
            }
            
            if (d14t21 != undefined) {
                jQuery('#qrcoded14t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d14t21
            });
            }
        }

        if(dataLoad15.length > 0){
            for (var i = 0; i <= dataLoad15.length - 1; i++) {
                if(dataLoad15[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad15[i].type == "textbox") {
                    $('#id_'+dataLoad15[i].emrdfk).html( dataLoad15[i].value)
                    $scope.item.obji15[dataLoad15[i].emrdfk] = dataLoad15[i].value
                }
                if (dataLoad15[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad15[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji15[dataLoad15[i].emrdfk] = chekedd
                }
                if (dataLoad15[i].type == "radio") {
                    $scope.item.obji15[dataLoad15[i].emrdfk] = dataLoad15[i].value

                }

                if (dataLoad15[i].type == "datetime") {
                    $('#id_'+dataLoad15[i].emrdfk).html( dataLoad15[i].value)
                    $scope.item.obji15[dataLoad15[i].emrdfk] = dataLoad15[i].value
                }
                if (dataLoad15[i].type == "time") {
                    $scope.item.obji15[dataLoad15[i].emrdfk] = dataLoad15[i].value
                }
                if (dataLoad15[i].type == "date") {
                    $scope.item.obji15[dataLoad15[i].emrdfk] = dataLoad15[i].value
                }

                if (dataLoad15[i].type == "checkboxtextbox") {
                    $scope.item.obji15[dataLoad15[i].emrdfk] = dataLoad15[i].value
                    $scope.item.obji15[dataLoad15[i].emrdfk] = true
                }
                if (dataLoad15[i].type == "textarea") {
                    $('#id_'+dataLoad15[i].emrdfk).html( dataLoad15[i].value)
                    $scope.item.obji15[dataLoad15[i].emrdfk] = dataLoad15[i].value
                }
                if (dataLoad15[i].type == "combobox") {
        
                    var str = dataLoad15[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji15[dataLoad15[i].emrdfk] = res[1]
                        $('#id_'+dataLoad15[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad15[i].type == "combobox2") {
                    var str = dataLoad15[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji15[dataLoad15[i].emrdfk+""+1] = res[0]
                    $scope.item.obji15[dataLoad15[i].emrdfk] = res[1]
                    $('#id_'+dataLoad15[i].emrdfk).html ( res[1])

                }

                if (dataLoad15[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad15[i].value
                }

                if (dataLoad15[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad15[i].value
                }

                if (dataLoad15[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad15[i].value
                }
                if (dataLoad15[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad15[i].value
                }
                if (dataLoad15[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad15[i].value
                }
                if (dataLoad15[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad15[i].value
                }
                if (dataLoad15[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad15[i].value
                }
                if (dataLoad15[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad15[i].value
                }
                if (dataLoad15[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad15[i].value
                }
                if (dataLoad15[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad15[i].value
                }
                if (dataLoad15[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad15[i].value
                }
                if (dataLoad15[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad15[i].value
                }
                if (dataLoad15[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad15[i].value
                }
                if (dataLoad15[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad15[i].value
                }
                if (dataLoad15[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad15[i].value
                }
                if (dataLoad15[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad15[i].value
                }
                if (dataLoad15[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad15[i].value
                }
                
                if (dataLoad15[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad15[i].value
                }

                $scope.tglemr = dataLoad15[i].tgl
                
            }

            var p15t1 = $scope.item.obji15[423053];
            var d15t1 = $scope.item.obji15[423057];

            var p15t2 = $scope.item.obji15[423061];
            var d15t2 = $scope.item.obji15[423065];

            var p15t3 = $scope.item.obji15[423069];
            var d15t3 = $scope.item.obji15[423073];

            var p15t4 = $scope.item.obji15[423077];
            var d15t4 = $scope.item.obji15[423081];

            var p15t5 = $scope.item.obji15[423085];
            var d15t5 = $scope.item.obji15[423089];

            var p15t6 = $scope.item.obji15[423093];
            var d15t6 = $scope.item.obji15[423097];

            var p15t7 = $scope.item.obji15[423101];
            var d15t7 = $scope.item.obji15[423105];

            var p15t8 = $scope.item.obji15[423109];
            var d15t8 = $scope.item.obji15[423113];

            var p15t9 = $scope.item.obji15[423117];
            var d15t9 = $scope.item.obji15[423121];

            var p15t10 = $scope.item.obji15[423125];
            var d15t10 = $scope.item.obji15[423129];

            var p15t11 = $scope.item.obji15[423133];
            var d15t11 = $scope.item.obji15[423137];

            var p15t12 = $scope.item.obji15[423141];
            var d15t12 = $scope.item.obji15[423145];

            var p15t13 = $scope.item.obji15[423149];
            var d15t13 = $scope.item.obji15[423153];

            var p15t14 = $scope.item.obji15[423157];
            var d15t14 = $scope.item.obji15[423161];

            var p15t15 = $scope.item.obji15[423165];
            var d15t15 = $scope.item.obji15[423169];

            var p15t16 = $scope.item.obji15[423173];
            var d15t16 = $scope.item.obji15[423177];

            var p15t17 = $scope.item.obji15[423181];
            var d15t17 = $scope.item.obji15[423185];

            var p15t18 = $scope.item.obji15[423189];
            var d15t18 = $scope.item.obji15[423193];

            var p15t19 = $scope.item.obji15[423197];
            var d15t19 = $scope.item.obji15[423201];

            var p15t20 = $scope.item.obji15[423205];
            var d15t20 = $scope.item.obji15[423209];

            var p15t21 = $scope.item.obji15[423213];
            var d15t21 = $scope.item.obji15[423217];

            if (p15t1 != undefined) {
                jQuery('#qrcodep15t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p15t1
                });	
            }
            
            if (d15t1 != undefined) {
                jQuery('#qrcoded15t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d15t1
            });
            }

            if (p15t2 != undefined) {
                jQuery('#qrcodep15t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p15t2
                });	
            }
            
            if (d15t2 != undefined) {
                jQuery('#qrcoded15t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d15t2
            });
            }

            if (p15t3 != undefined) {
                jQuery('#qrcodep15t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p15t3
                });	
            }
            
            if (d15t3 != undefined) {
                jQuery('#qrcoded15t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d15t3
            });
            }

            if (p15t4 != undefined) {
                jQuery('#qrcodep15t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p15t4
                });	
            }
            
            if (d15t4 != undefined) {
                jQuery('#qrcoded15t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d15t4
            });
            }

            if (p15t5 != undefined) {
                jQuery('#qrcodep15t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p15t5
                });	
            }
            
            if (d15t5 != undefined) {
                jQuery('#qrcoded15t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d15t5
            });
            }

            if (p15t6 != undefined) {
                jQuery('#qrcodep15t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p15t6
                });	
            }
            
            if (d15t6 != undefined) {
                jQuery('#qrcoded15t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d15t6
            });
            }

            if (p15t7 != undefined) {
                jQuery('#qrcodep15t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p15t7
                });	
            }
            
            if (d15t7 != undefined) {
                jQuery('#qrcoded15t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d15t7
            });
            }

            if (p15t8 != undefined) {
                jQuery('#qrcodep15t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p15t8
                });	
            }
            
            if (d15t8 != undefined) {
                jQuery('#qrcoded15t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d15t8
            });
            }

            if (p15t9 != undefined) {
                jQuery('#qrcodep15t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p15t9
                });	
            }
            
            if (d15t9 != undefined) {
                jQuery('#qrcoded15t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d15t9
            });
            }

            if (p15t10 != undefined) {
                jQuery('#qrcodep15t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p15t10
                });	
            }
            
            if (d15t10 != undefined) {
                jQuery('#qrcoded15t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d15t10
            });
            }

            if (p15t11 != undefined) {
                jQuery('#qrcodep15t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p15t11
                });	
            }
            
            if (d15t11 != undefined) {
                jQuery('#qrcoded15t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d15t11
            });
            }

            if (p15t12 != undefined) {
                jQuery('#qrcodep15t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p15t12
                });	
            }
            
            if (d15t12 != undefined) {
                jQuery('#qrcoded15t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d15t12
            });
            }

            if (p15t13 != undefined) {
                jQuery('#qrcodep15t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p15t13
                });	
            }
            
            if (d15t13 != undefined) {
                jQuery('#qrcoded15t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d15t13
            });
            }

            if (p15t14 != undefined) {
                jQuery('#qrcodep15t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p15t14
                });	
            }
            
            if (d15t14 != undefined) {
                jQuery('#qrcoded15t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d15t14
            });
            }

            if (p15t15 != undefined) {
                jQuery('#qrcodep15t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p15t15
                });	
            }
            
            if (d15t15 != undefined) {
                jQuery('#qrcoded15t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d15t15
            });
            }

            if (p15t16 != undefined) {
                jQuery('#qrcodep15t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p15t16
                });	
            }
            
            if (d15t16 != undefined) {
                jQuery('#qrcoded15t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d15t16
            });
            }

            if (p15t17 != undefined) {
                jQuery('#qrcodep15t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p15t17
                });	
            }
            
            if (d15t17 != undefined) {
                jQuery('#qrcoded15t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d15t17
            });
            }

            if (p15t18 != undefined) {
                jQuery('#qrcodep15t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p15t18
                });	
            }
            
            if (d15t18 != undefined) {
                jQuery('#qrcoded15t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d15t18
            });
            }

            if (p15t19 != undefined) {
                jQuery('#qrcodep15t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p15t19
                });	
            }
            
            if (d15t19 != undefined) {
                jQuery('#qrcoded15t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d15t19
            });
            }

            if (p15t20 != undefined) {
                jQuery('#qrcodep15t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p15t20
                });	
            }
            
            if (d15t20 != undefined) {
                jQuery('#qrcoded15t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d15t20
            });
            }

            if (p15t21 != undefined) {
                jQuery('#qrcodep15t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p15t21
                });	
            }
            
            if (d15t21 != undefined) {
                jQuery('#qrcoded15t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d15t21
            });
            }
        }

        if(dataLoad16.length > 0){
            for (var i = 0; i <= dataLoad16.length - 1; i++) {
                if(dataLoad16[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad16[i].type == "textbox") {
                    $('#id_'+dataLoad16[i].emrdfk).html( dataLoad16[i].value)
                    $scope.item.obji16[dataLoad16[i].emrdfk] = dataLoad16[i].value
                }
                if (dataLoad16[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad16[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji16[dataLoad16[i].emrdfk] = chekedd
                }
                if (dataLoad16[i].type == "radio") {
                    $scope.item.obji16[dataLoad16[i].emrdfk] = dataLoad16[i].value

                }

                if (dataLoad16[i].type == "datetime") {
                    $('#id_'+dataLoad16[i].emrdfk).html( dataLoad16[i].value)
                    $scope.item.obji16[dataLoad16[i].emrdfk] = dataLoad16[i].value
                }
                if (dataLoad16[i].type == "time") {
                    $scope.item.obji16[dataLoad16[i].emrdfk] = dataLoad16[i].value
                }
                if (dataLoad16[i].type == "date") {
                    $scope.item.obji16[dataLoad16[i].emrdfk] = dataLoad16[i].value
                }

                if (dataLoad16[i].type == "checkboxtextbox") {
                    $scope.item.obji16[dataLoad16[i].emrdfk] = dataLoad16[i].value
                    $scope.item.obji16[dataLoad16[i].emrdfk] = true
                }
                if (dataLoad16[i].type == "textarea") {
                    $('#id_'+dataLoad16[i].emrdfk).html( dataLoad16[i].value)
                    $scope.item.obji16[dataLoad16[i].emrdfk] = dataLoad16[i].value
                }
                if (dataLoad16[i].type == "combobox") {
        
                    var str = dataLoad16[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji16[dataLoad16[i].emrdfk] = res[1]
                        $('#id_'+dataLoad16[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad16[i].type == "combobox2") {
                    var str = dataLoad16[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji16[dataLoad16[i].emrdfk+""+1] = res[0]
                    $scope.item.obji16[dataLoad16[i].emrdfk] = res[1]
                    $('#id_'+dataLoad16[i].emrdfk).html ( res[1])

                }

                if (dataLoad16[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad16[i].value
                }

                if (dataLoad16[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad16[i].value
                }

                if (dataLoad16[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad16[i].value
                }
                if (dataLoad16[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad16[i].value
                }
                if (dataLoad16[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad16[i].value
                }
                if (dataLoad16[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad16[i].value
                }
                if (dataLoad16[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad16[i].value
                }
                if (dataLoad16[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad16[i].value
                }
                if (dataLoad16[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad16[i].value
                }
                if (dataLoad16[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad16[i].value
                }
                if (dataLoad16[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad16[i].value
                }
                if (dataLoad16[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad16[i].value
                }
                if (dataLoad16[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad16[i].value
                }
                if (dataLoad16[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad16[i].value
                }
                if (dataLoad16[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad16[i].value
                }
                if (dataLoad16[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad16[i].value
                }
                if (dataLoad16[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad16[i].value
                }
                
                if (dataLoad16[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad16[i].value
                }

                $scope.tglemr = dataLoad16[i].tgl
                
            }

            var p16t1 = $scope.item.obji16[423053];
            var d16t1 = $scope.item.obji16[423057];

            var p16t2 = $scope.item.obji16[423061];
            var d16t2 = $scope.item.obji16[423065];

            var p16t3 = $scope.item.obji16[423069];
            var d16t3 = $scope.item.obji16[423073];

            var p16t4 = $scope.item.obji16[423077];
            var d16t4 = $scope.item.obji16[423081];

            var p16t5 = $scope.item.obji16[423085];
            var d16t5 = $scope.item.obji16[423089];

            var p16t6 = $scope.item.obji16[423093];
            var d16t6 = $scope.item.obji16[423097];

            var p16t7 = $scope.item.obji16[423101];
            var d16t7 = $scope.item.obji16[423105];

            var p16t8 = $scope.item.obji16[423109];
            var d16t8 = $scope.item.obji16[423113];

            var p16t9 = $scope.item.obji16[423117];
            var d16t9 = $scope.item.obji16[423121];

            var p16t10 = $scope.item.obji16[423125];
            var d16t10 = $scope.item.obji16[423129];

            var p16t11 = $scope.item.obji16[423133];
            var d16t11 = $scope.item.obji16[423137];

            var p16t12 = $scope.item.obji16[423141];
            var d16t12 = $scope.item.obji16[423145];

            var p16t13 = $scope.item.obji16[423149];
            var d16t13 = $scope.item.obji16[423153];

            var p16t14 = $scope.item.obji16[423157];
            var d16t14 = $scope.item.obji16[423161];

            var p16t15 = $scope.item.obji16[423165];
            var d16t15 = $scope.item.obji16[423169];

            var p16t16 = $scope.item.obji16[423173];
            var d16t16 = $scope.item.obji16[423177];

            var p16t17 = $scope.item.obji16[423181];
            var d16t17 = $scope.item.obji16[423185];

            var p16t18 = $scope.item.obji16[423189];
            var d16t18 = $scope.item.obji16[423193];

            var p16t19 = $scope.item.obji16[423197];
            var d16t19 = $scope.item.obji16[423201];

            var p16t20 = $scope.item.obji16[423205];
            var d16t20 = $scope.item.obji16[423209];

            var p16t21 = $scope.item.obji16[423213];
            var d16t21 = $scope.item.obji16[423217];

            if (p16t1 != undefined) {
                jQuery('#qrcodep16t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p16t1
                });	
            }
            
            if (d16t1 != undefined) {
                jQuery('#qrcoded16t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d16t1
            });
            }

            if (p16t2 != undefined) {
                jQuery('#qrcodep16t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p16t2
                });	
            }
            
            if (d16t2 != undefined) {
                jQuery('#qrcoded16t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d16t2
            });
            }

            if (p16t3 != undefined) {
                jQuery('#qrcodep16t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p16t3
                });	
            }
            
            if (d16t3 != undefined) {
                jQuery('#qrcoded16t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d16t3
            });
            }

            if (p16t4 != undefined) {
                jQuery('#qrcodep16t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p16t4
                });	
            }
            
            if (d16t4 != undefined) {
                jQuery('#qrcoded16t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d16t4
            });
            }

            if (p16t5 != undefined) {
                jQuery('#qrcodep16t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p16t5
                });	
            }
            
            if (d16t5 != undefined) {
                jQuery('#qrcoded16t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d16t5
            });
            }

            if (p16t6 != undefined) {
                jQuery('#qrcodep16t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p16t6
                });	
            }
            
            if (d16t6 != undefined) {
                jQuery('#qrcoded16t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d16t6
            });
            }

            if (p16t7 != undefined) {
                jQuery('#qrcodep16t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p16t7
                });	
            }
            
            if (d16t7 != undefined) {
                jQuery('#qrcoded16t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d16t7
            });
            }

            if (p16t8 != undefined) {
                jQuery('#qrcodep16t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p16t8
                });	
            }
            
            if (d16t8 != undefined) {
                jQuery('#qrcoded16t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d16t8
            });
            }

            if (p16t9 != undefined) {
                jQuery('#qrcodep16t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p16t9
                });	
            }
            
            if (d16t9 != undefined) {
                jQuery('#qrcoded16t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d16t9
            });
            }

            if (p16t10 != undefined) {
                jQuery('#qrcodep16t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p16t10
                });	
            }
            
            if (d16t10 != undefined) {
                jQuery('#qrcoded16t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d16t10
            });
            }

            if (p16t11 != undefined) {
                jQuery('#qrcodep16t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p16t11
                });	
            }
            
            if (d16t11 != undefined) {
                jQuery('#qrcoded16t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d16t11
            });
            }

            if (p16t12 != undefined) {
                jQuery('#qrcodep16t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p16t12
                });	
            }
            
            if (d16t12 != undefined) {
                jQuery('#qrcoded16t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d16t12
            });
            }

            if (p16t13 != undefined) {
                jQuery('#qrcodep16t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p16t13
                });	
            }
            
            if (d16t13 != undefined) {
                jQuery('#qrcoded16t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d16t13
            });
            }

            if (p16t14 != undefined) {
                jQuery('#qrcodep16t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p16t14
                });	
            }
            
            if (d16t14 != undefined) {
                jQuery('#qrcoded16t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d16t14
            });
            }

            if (p16t15 != undefined) {
                jQuery('#qrcodep16t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p16t15
                });	
            }
            
            if (d16t15 != undefined) {
                jQuery('#qrcoded16t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d16t15
            });
            }

            if (p16t16 != undefined) {
                jQuery('#qrcodep16t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p16t16
                });	
            }
            
            if (d16t16 != undefined) {
                jQuery('#qrcoded16t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d16t16
            });
            }

            if (p16t17 != undefined) {
                jQuery('#qrcodep16t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p16t17
                });	
            }
            
            if (d16t17 != undefined) {
                jQuery('#qrcoded16t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d16t17
            });
            }

            if (p16t18 != undefined) {
                jQuery('#qrcodep16t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p16t18
                });	
            }
            
            if (d16t18 != undefined) {
                jQuery('#qrcoded16t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d16t18
            });
            }

            if (p16t19 != undefined) {
                jQuery('#qrcodep16t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p16t19
                });	
            }
            
            if (d16t19 != undefined) {
                jQuery('#qrcoded16t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d16t19
            });
            }

            if (p16t20 != undefined) {
                jQuery('#qrcodep16t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p16t20
                });	
            }
            
            if (d16t20 != undefined) {
                jQuery('#qrcoded16t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d16t20
            });
            }

            if (p16t21 != undefined) {
                jQuery('#qrcodep16t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p16t21
                });	
            }
            
            if (d16t21 != undefined) {
                jQuery('#qrcoded16t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d16t21
            });
            }
        }

        if(dataLoad17.length > 0){
            for (var i = 0; i <= dataLoad17.length - 1; i++) {
                if(dataLoad17[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad17[i].type == "textbox") {
                    $('#id_'+dataLoad17[i].emrdfk).html( dataLoad17[i].value)
                    $scope.item.obji17[dataLoad17[i].emrdfk] = dataLoad17[i].value
                }
                if (dataLoad17[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad17[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji17[dataLoad17[i].emrdfk] = chekedd
                }
                if (dataLoad17[i].type == "radio") {
                    $scope.item.obji17[dataLoad17[i].emrdfk] = dataLoad17[i].value

                }

                if (dataLoad17[i].type == "datetime") {
                    $('#id_'+dataLoad17[i].emrdfk).html( dataLoad17[i].value)
                    $scope.item.obji17[dataLoad17[i].emrdfk] = dataLoad17[i].value
                }
                if (dataLoad17[i].type == "time") {
                    $scope.item.obji17[dataLoad17[i].emrdfk] = dataLoad17[i].value
                }
                if (dataLoad17[i].type == "date") {
                    $scope.item.obji17[dataLoad17[i].emrdfk] = dataLoad17[i].value
                }

                if (dataLoad17[i].type == "checkboxtextbox") {
                    $scope.item.obji17[dataLoad17[i].emrdfk] = dataLoad17[i].value
                    $scope.item.obji17[dataLoad17[i].emrdfk] = true
                }
                if (dataLoad17[i].type == "textarea") {
                    $('#id_'+dataLoad17[i].emrdfk).html( dataLoad17[i].value)
                    $scope.item.obji17[dataLoad17[i].emrdfk] = dataLoad17[i].value
                }
                if (dataLoad17[i].type == "combobox") {
        
                    var str = dataLoad17[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji17[dataLoad17[i].emrdfk] = res[1]
                        $('#id_'+dataLoad17[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad17[i].type == "combobox2") {
                    var str = dataLoad17[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji17[dataLoad17[i].emrdfk+""+1] = res[0]
                    $scope.item.obji17[dataLoad17[i].emrdfk] = res[1]
                    $('#id_'+dataLoad17[i].emrdfk).html ( res[1])

                }

                if (dataLoad17[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad17[i].value
                }

                if (dataLoad17[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad17[i].value
                }

                if (dataLoad17[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad17[i].value
                }
                if (dataLoad17[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad17[i].value
                }
                if (dataLoad17[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad17[i].value
                }
                if (dataLoad17[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad17[i].value
                }
                if (dataLoad17[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad17[i].value
                }
                if (dataLoad17[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad17[i].value
                }
                if (dataLoad17[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad17[i].value
                }
                if (dataLoad17[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad17[i].value
                }
                if (dataLoad17[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad17[i].value
                }
                if (dataLoad17[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad17[i].value
                }
                if (dataLoad17[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad17[i].value
                }
                if (dataLoad17[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad17[i].value
                }
                if (dataLoad17[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad17[i].value
                }
                if (dataLoad17[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad17[i].value
                }
                if (dataLoad17[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad17[i].value
                }
                
                if (dataLoad17[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad17[i].value
                }

                $scope.tglemr = dataLoad17[i].tgl
                
            }

            var p17t1 = $scope.item.obji17[423053];
            var d17t1 = $scope.item.obji17[423057];

            var p17t2 = $scope.item.obji17[423061];
            var d17t2 = $scope.item.obji17[423065];

            var p17t3 = $scope.item.obji17[423069];
            var d17t3 = $scope.item.obji17[423073];

            var p17t4 = $scope.item.obji17[423077];
            var d17t4 = $scope.item.obji17[423081];

            var p17t5 = $scope.item.obji17[423085];
            var d17t5 = $scope.item.obji17[423089];

            var p17t6 = $scope.item.obji17[423093];
            var d17t6 = $scope.item.obji17[423097];

            var p17t7 = $scope.item.obji17[423101];
            var d17t7 = $scope.item.obji17[423105];

            var p17t8 = $scope.item.obji17[423109];
            var d17t8 = $scope.item.obji17[423113];

            var p17t9 = $scope.item.obji17[423117];
            var d17t9 = $scope.item.obji17[423121];

            var p17t10 = $scope.item.obji17[423125];
            var d17t10 = $scope.item.obji17[423129];

            var p17t11 = $scope.item.obji17[423133];
            var d17t11 = $scope.item.obji17[423137];

            var p17t12 = $scope.item.obji17[423141];
            var d17t12 = $scope.item.obji17[423145];

            var p17t13 = $scope.item.obji17[423149];
            var d17t13 = $scope.item.obji17[423153];

            var p17t14 = $scope.item.obji17[423157];
            var d17t14 = $scope.item.obji17[423161];

            var p17t15 = $scope.item.obji17[423165];
            var d17t15 = $scope.item.obji17[423169];

            var p17t16 = $scope.item.obji17[423173];
            var d17t16 = $scope.item.obji17[423177];

            var p17t17 = $scope.item.obji17[423181];
            var d17t17 = $scope.item.obji17[423185];

            var p17t18 = $scope.item.obji17[423189];
            var d17t18 = $scope.item.obji17[423193];

            var p17t19 = $scope.item.obji17[423197];
            var d17t19 = $scope.item.obji17[423201];

            var p17t20 = $scope.item.obji17[423205];
            var d17t20 = $scope.item.obji17[423209];

            var p17t21 = $scope.item.obji17[423213];
            var d17t21 = $scope.item.obji17[423217];

            if (p17t1 != undefined) {
                jQuery('#qrcodep17t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p17t1
                });	
            }
            
            if (d17t1 != undefined) {
                jQuery('#qrcoded17t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d17t1
            });
            }

            if (p17t2 != undefined) {
                jQuery('#qrcodep17t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p17t2
                });	
            }
            
            if (d17t2 != undefined) {
                jQuery('#qrcoded17t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d17t2
            });
            }

            if (p17t3 != undefined) {
                jQuery('#qrcodep17t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p17t3
                });	
            }
            
            if (d17t3 != undefined) {
                jQuery('#qrcoded17t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d17t3
            });
            }

            if (p17t4 != undefined) {
                jQuery('#qrcodep17t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p17t4
                });	
            }
            
            if (d17t4 != undefined) {
                jQuery('#qrcoded17t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d17t4
            });
            }

            if (p17t5 != undefined) {
                jQuery('#qrcodep17t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p17t5
                });	
            }
            
            if (d17t5 != undefined) {
                jQuery('#qrcoded17t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d17t5
            });
            }

            if (p17t6 != undefined) {
                jQuery('#qrcodep17t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p17t6
                });	
            }
            
            if (d17t6 != undefined) {
                jQuery('#qrcoded17t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d17t6
            });
            }

            if (p17t7 != undefined) {
                jQuery('#qrcodep17t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p17t7
                });	
            }
            
            if (d17t7 != undefined) {
                jQuery('#qrcoded17t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d17t7
            });
            }

            if (p17t8 != undefined) {
                jQuery('#qrcodep17t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p17t8
                });	
            }
            
            if (d17t8 != undefined) {
                jQuery('#qrcoded17t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d17t8
            });
            }

            if (p17t9 != undefined) {
                jQuery('#qrcodep17t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p17t9
                });	
            }
            
            if (d17t9 != undefined) {
                jQuery('#qrcoded17t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d17t9
            });
            }

            if (p17t10 != undefined) {
                jQuery('#qrcodep17t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p17t10
                });	
            }
            
            if (d17t10 != undefined) {
                jQuery('#qrcoded17t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d17t10
            });
            }

            if (p17t11 != undefined) {
                jQuery('#qrcodep17t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p17t11
                });	
            }
            
            if (d17t11 != undefined) {
                jQuery('#qrcoded17t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d17t11
            });
            }

            if (p17t12 != undefined) {
                jQuery('#qrcodep17t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p17t12
                });	
            }
            
            if (d17t12 != undefined) {
                jQuery('#qrcoded17t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d17t12
            });
            }

            if (p17t13 != undefined) {
                jQuery('#qrcodep17t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p17t13
                });	
            }
            
            if (d17t13 != undefined) {
                jQuery('#qrcoded17t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d17t13
            });
            }

            if (p17t14 != undefined) {
                jQuery('#qrcodep17t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p17t14
                });	
            }
            
            if (d17t14 != undefined) {
                jQuery('#qrcoded17t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d17t14
            });
            }

            if (p17t15 != undefined) {
                jQuery('#qrcodep17t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p17t15
                });	
            }
            
            if (d17t15 != undefined) {
                jQuery('#qrcoded17t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d17t15
            });
            }

            if (p17t16 != undefined) {
                jQuery('#qrcodep17t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p17t16
                });	
            }
            
            if (d17t16 != undefined) {
                jQuery('#qrcoded17t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d17t16
            });
            }

            if (p17t17 != undefined) {
                jQuery('#qrcodep17t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p17t17
                });	
            }
            
            if (d17t17 != undefined) {
                jQuery('#qrcoded17t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d17t17
            });
            }

            if (p17t18 != undefined) {
                jQuery('#qrcodep17t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p17t18
                });	
            }
            
            if (d17t18 != undefined) {
                jQuery('#qrcoded17t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d17t18
            });
            }

            if (p17t19 != undefined) {
                jQuery('#qrcodep17t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p17t19
                });	
            }
            
            if (d17t19 != undefined) {
                jQuery('#qrcoded17t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d17t19
            });
            }

            if (p17t20 != undefined) {
                jQuery('#qrcodep17t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p17t20
                });	
            }
            
            if (d17t20 != undefined) {
                jQuery('#qrcoded17t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d17t20
            });
            }

            if (p17t21 != undefined) {
                jQuery('#qrcodep17t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p17t21
                });	
            }
            
            if (d17t21 != undefined) {
                jQuery('#qrcoded17t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d17t21
            });
            }
        }

        if(dataLoad18.length > 0){
            for (var i = 0; i <= dataLoad18.length - 1; i++) {
                if(dataLoad18[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad18[i].type == "textbox") {
                    $('#id_'+dataLoad18[i].emrdfk).html( dataLoad18[i].value)
                    $scope.item.obji18[dataLoad18[i].emrdfk] = dataLoad18[i].value
                }
                if (dataLoad18[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad18[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji18[dataLoad18[i].emrdfk] = chekedd
                }
                if (dataLoad18[i].type == "radio") {
                    $scope.item.obji18[dataLoad18[i].emrdfk] = dataLoad18[i].value

                }

                if (dataLoad18[i].type == "datetime") {
                    $('#id_'+dataLoad18[i].emrdfk).html( dataLoad18[i].value)
                    $scope.item.obji18[dataLoad18[i].emrdfk] = dataLoad18[i].value
                }
                if (dataLoad18[i].type == "time") {
                    $scope.item.obji18[dataLoad18[i].emrdfk] = dataLoad18[i].value
                }
                if (dataLoad18[i].type == "date") {
                    $scope.item.obji18[dataLoad18[i].emrdfk] = dataLoad18[i].value
                }

                if (dataLoad18[i].type == "checkboxtextbox") {
                    $scope.item.obji18[dataLoad18[i].emrdfk] = dataLoad18[i].value
                    $scope.item.obji18[dataLoad18[i].emrdfk] = true
                }
                if (dataLoad18[i].type == "textarea") {
                    $('#id_'+dataLoad18[i].emrdfk).html( dataLoad18[i].value)
                    $scope.item.obji18[dataLoad18[i].emrdfk] = dataLoad18[i].value
                }
                if (dataLoad18[i].type == "combobox") {
        
                    var str = dataLoad18[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji18[dataLoad18[i].emrdfk] = res[1]
                        $('#id_'+dataLoad18[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad18[i].type == "combobox2") {
                    var str = dataLoad18[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji18[dataLoad18[i].emrdfk+""+1] = res[0]
                    $scope.item.obji18[dataLoad18[i].emrdfk] = res[1]
                    $('#id_'+dataLoad18[i].emrdfk).html ( res[1])

                }

                if (dataLoad18[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad18[i].value
                }

                if (dataLoad18[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad18[i].value
                }

                if (dataLoad18[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad18[i].value
                }
                if (dataLoad18[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad18[i].value
                }
                if (dataLoad18[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad18[i].value
                }
                if (dataLoad18[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad18[i].value
                }
                if (dataLoad18[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad18[i].value
                }
                if (dataLoad18[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad18[i].value
                }
                if (dataLoad18[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad18[i].value
                }
                if (dataLoad18[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad18[i].value
                }
                if (dataLoad18[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad18[i].value
                }
                if (dataLoad18[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad18[i].value
                }
                if (dataLoad18[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad18[i].value
                }
                if (dataLoad18[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad18[i].value
                }
                if (dataLoad18[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad18[i].value
                }
                if (dataLoad18[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad18[i].value
                }
                if (dataLoad18[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad18[i].value
                }
                
                if (dataLoad18[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad18[i].value
                }

                $scope.tglemr = dataLoad18[i].tgl
                
            }

            var p18t1 = $scope.item.obji18[423053];
            var d18t1 = $scope.item.obji18[423057];

            var p18t2 = $scope.item.obji18[423061];
            var d18t2 = $scope.item.obji18[423065];

            var p18t3 = $scope.item.obji18[423069];
            var d18t3 = $scope.item.obji18[423073];

            var p18t4 = $scope.item.obji18[423077];
            var d18t4 = $scope.item.obji18[423081];

            var p18t5 = $scope.item.obji18[423085];
            var d18t5 = $scope.item.obji18[423089];

            var p18t6 = $scope.item.obji18[423093];
            var d18t6 = $scope.item.obji18[423097];

            var p18t7 = $scope.item.obji18[423101];
            var d18t7 = $scope.item.obji18[423105];

            var p18t8 = $scope.item.obji18[423109];
            var d18t8 = $scope.item.obji18[423113];

            var p18t9 = $scope.item.obji18[423117];
            var d18t9 = $scope.item.obji18[423121];

            var p18t10 = $scope.item.obji18[423125];
            var d18t10 = $scope.item.obji18[423129];

            var p18t11 = $scope.item.obji18[423133];
            var d18t11 = $scope.item.obji18[423137];

            var p18t12 = $scope.item.obji18[423141];
            var d18t12 = $scope.item.obji18[423145];

            var p18t13 = $scope.item.obji18[423149];
            var d18t13 = $scope.item.obji18[423153];

            var p18t14 = $scope.item.obji18[423157];
            var d18t14 = $scope.item.obji18[423161];

            var p18t15 = $scope.item.obji18[423165];
            var d18t15 = $scope.item.obji18[423169];

            var p18t16 = $scope.item.obji18[423173];
            var d18t16 = $scope.item.obji18[423177];

            var p18t17 = $scope.item.obji18[423181];
            var d18t17 = $scope.item.obji18[423185];

            var p18t18 = $scope.item.obji18[423189];
            var d18t18 = $scope.item.obji18[423193];

            var p18t19 = $scope.item.obji18[423197];
            var d18t19 = $scope.item.obji18[423201];

            var p18t20 = $scope.item.obji18[423205];
            var d18t20 = $scope.item.obji18[423209];

            var p18t21 = $scope.item.obji18[423213];
            var d18t21 = $scope.item.obji18[423217];

            if (p18t1 != undefined) {
                jQuery('#qrcodep18t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p18t1
                });	
            }
            
            if (d18t1 != undefined) {
                jQuery('#qrcoded18t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d18t1
            });
            }

            if (p18t2 != undefined) {
                jQuery('#qrcodep18t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p18t2
                });	
            }
            
            if (d18t2 != undefined) {
                jQuery('#qrcoded18t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d18t2
            });
            }

            if (p18t3 != undefined) {
                jQuery('#qrcodep18t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p18t3
                });	
            }
            
            if (d18t3 != undefined) {
                jQuery('#qrcoded18t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d18t3
            });
            }

            if (p18t4 != undefined) {
                jQuery('#qrcodep18t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p18t4
                });	
            }
            
            if (d18t4 != undefined) {
                jQuery('#qrcoded18t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d18t4
            });
            }

            if (p18t5 != undefined) {
                jQuery('#qrcodep18t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p18t5
                });	
            }
            
            if (d18t5 != undefined) {
                jQuery('#qrcoded18t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d18t5
            });
            }

            if (p18t6 != undefined) {
                jQuery('#qrcodep18t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p18t6
                });	
            }
            
            if (d18t6 != undefined) {
                jQuery('#qrcoded18t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d18t6
            });
            }

            if (p18t7 != undefined) {
                jQuery('#qrcodep18t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p18t7
                });	
            }
            
            if (d18t7 != undefined) {
                jQuery('#qrcoded18t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d18t7
            });
            }

            if (p18t8 != undefined) {
                jQuery('#qrcodep18t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p18t8
                });	
            }
            
            if (d18t8 != undefined) {
                jQuery('#qrcoded18t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d18t8
            });
            }

            if (p18t9 != undefined) {
                jQuery('#qrcodep18t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p18t9
                });	
            }
            
            if (d18t9 != undefined) {
                jQuery('#qrcoded18t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d18t9
            });
            }

            if (p18t10 != undefined) {
                jQuery('#qrcodep18t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p18t10
                });	
            }
            
            if (d18t10 != undefined) {
                jQuery('#qrcoded18t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d18t10
            });
            }

            if (p18t11 != undefined) {
                jQuery('#qrcodep18t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p18t11
                });	
            }
            
            if (d18t11 != undefined) {
                jQuery('#qrcoded18t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d18t11
            });
            }

            if (p18t12 != undefined) {
                jQuery('#qrcodep18t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p18t12
                });	
            }
            
            if (d18t12 != undefined) {
                jQuery('#qrcoded18t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d18t12
            });
            }

            if (p18t13 != undefined) {
                jQuery('#qrcodep18t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p18t13
                });	
            }
            
            if (d18t13 != undefined) {
                jQuery('#qrcoded18t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d18t13
            });
            }

            if (p18t14 != undefined) {
                jQuery('#qrcodep18t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p18t14
                });	
            }
            
            if (d18t14 != undefined) {
                jQuery('#qrcoded18t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d18t14
            });
            }

            if (p18t15 != undefined) {
                jQuery('#qrcodep18t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p18t15
                });	
            }
            
            if (d18t15 != undefined) {
                jQuery('#qrcoded18t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d18t15
            });
            }

            if (p18t16 != undefined) {
                jQuery('#qrcodep18t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p18t16
                });	
            }
            
            if (d18t16 != undefined) {
                jQuery('#qrcoded18t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d18t16
            });
            }

            if (p18t17 != undefined) {
                jQuery('#qrcodep18t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p18t17
                });	
            }
            
            if (d18t17 != undefined) {
                jQuery('#qrcoded18t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d18t17
            });
            }

            if (p18t18 != undefined) {
                jQuery('#qrcodep18t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p18t18
                });	
            }
            
            if (d18t18 != undefined) {
                jQuery('#qrcoded18t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d18t18
            });
            }

            if (p18t19 != undefined) {
                jQuery('#qrcodep18t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p18t19
                });	
            }
            
            if (d18t19 != undefined) {
                jQuery('#qrcoded18t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d18t19
            });
            }

            if (p18t20 != undefined) {
                jQuery('#qrcodep18t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p18t20
                });	
            }
            
            if (d18t20 != undefined) {
                jQuery('#qrcoded18t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d18t20
            });
            }

            if (p18t21 != undefined) {
                jQuery('#qrcodep18t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p18t21
                });	
            }
            
            if (d18t21 != undefined) {
                jQuery('#qrcoded18t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d18t21
            });
            }
        }

        if(dataLoad19.length > 0){
            for (var i = 0; i <= dataLoad19.length - 1; i++) {
                if(dataLoad19[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad19[i].type == "textbox") {
                    $('#id_'+dataLoad19[i].emrdfk).html( dataLoad19[i].value)
                    $scope.item.obji19[dataLoad19[i].emrdfk] = dataLoad19[i].value
                }
                if (dataLoad19[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad19[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji19[dataLoad19[i].emrdfk] = chekedd
                }
                if (dataLoad19[i].type == "radio") {
                    $scope.item.obji19[dataLoad19[i].emrdfk] = dataLoad19[i].value

                }

                if (dataLoad19[i].type == "datetime") {
                    $('#id_'+dataLoad19[i].emrdfk).html( dataLoad19[i].value)
                    $scope.item.obji19[dataLoad19[i].emrdfk] = dataLoad19[i].value
                }
                if (dataLoad19[i].type == "time") {
                    $scope.item.obji19[dataLoad19[i].emrdfk] = dataLoad19[i].value
                }
                if (dataLoad19[i].type == "date") {
                    $scope.item.obji19[dataLoad19[i].emrdfk] = dataLoad19[i].value
                }

                if (dataLoad19[i].type == "checkboxtextbox") {
                    $scope.item.obji19[dataLoad19[i].emrdfk] = dataLoad19[i].value
                    $scope.item.obji19[dataLoad19[i].emrdfk] = true
                }
                if (dataLoad19[i].type == "textarea") {
                    $('#id_'+dataLoad19[i].emrdfk).html( dataLoad19[i].value)
                    $scope.item.obji19[dataLoad19[i].emrdfk] = dataLoad19[i].value
                }
                if (dataLoad19[i].type == "combobox") {
        
                    var str = dataLoad19[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji19[dataLoad19[i].emrdfk] = res[1]
                        $('#id_'+dataLoad19[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad19[i].type == "combobox2") {
                    var str = dataLoad19[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji19[dataLoad19[i].emrdfk+""+1] = res[0]
                    $scope.item.obji19[dataLoad19[i].emrdfk] = res[1]
                    $('#id_'+dataLoad19[i].emrdfk).html ( res[1])

                }

                if (dataLoad19[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad19[i].value
                }

                if (dataLoad19[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad19[i].value
                }

                if (dataLoad19[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad19[i].value
                }
                if (dataLoad19[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad19[i].value
                }
                if (dataLoad19[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad19[i].value
                }
                if (dataLoad19[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad19[i].value
                }
                if (dataLoad19[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad19[i].value
                }
                if (dataLoad19[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad19[i].value
                }
                if (dataLoad19[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad19[i].value
                }
                if (dataLoad19[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad19[i].value
                }
                if (dataLoad19[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad19[i].value
                }
                if (dataLoad19[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad19[i].value
                }
                if (dataLoad19[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad19[i].value
                }
                if (dataLoad19[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad19[i].value
                }
                if (dataLoad19[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad19[i].value
                }
                if (dataLoad19[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad19[i].value
                }
                if (dataLoad19[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad19[i].value
                }
                
                if (dataLoad19[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad19[i].value
                }

                $scope.tglemr = dataLoad19[i].tgl
                
            }

            var p19t1 = $scope.item.obji19[423053];
            var d19t1 = $scope.item.obji19[423057];

            var p19t2 = $scope.item.obji19[423061];
            var d19t2 = $scope.item.obji19[423065];

            var p19t3 = $scope.item.obji19[423069];
            var d19t3 = $scope.item.obji19[423073];

            var p19t4 = $scope.item.obji19[423077];
            var d19t4 = $scope.item.obji19[423081];

            var p19t5 = $scope.item.obji19[423085];
            var d19t5 = $scope.item.obji19[423089];

            var p19t6 = $scope.item.obji19[423093];
            var d19t6 = $scope.item.obji19[423097];

            var p19t7 = $scope.item.obji19[423101];
            var d19t7 = $scope.item.obji19[423105];

            var p19t8 = $scope.item.obji19[423109];
            var d19t8 = $scope.item.obji19[423113];

            var p19t9 = $scope.item.obji19[423117];
            var d19t9 = $scope.item.obji19[423121];

            var p19t10 = $scope.item.obji19[423125];
            var d19t10 = $scope.item.obji19[423129];

            var p19t11 = $scope.item.obji19[423133];
            var d19t11 = $scope.item.obji19[423137];

            var p19t12 = $scope.item.obji19[423141];
            var d19t12 = $scope.item.obji19[423145];

            var p19t13 = $scope.item.obji19[423149];
            var d19t13 = $scope.item.obji19[423153];

            var p19t14 = $scope.item.obji19[423157];
            var d19t14 = $scope.item.obji19[423161];

            var p19t15 = $scope.item.obji19[423165];
            var d19t15 = $scope.item.obji19[423169];

            var p19t16 = $scope.item.obji19[423173];
            var d19t16 = $scope.item.obji19[423177];

            var p19t17 = $scope.item.obji19[423181];
            var d19t17 = $scope.item.obji19[423185];

            var p19t18 = $scope.item.obji19[423189];
            var d19t18 = $scope.item.obji19[423193];

            var p19t19 = $scope.item.obji19[423197];
            var d19t19 = $scope.item.obji19[423201];

            var p19t20 = $scope.item.obji19[423205];
            var d19t20 = $scope.item.obji19[423209];

            var p19t21 = $scope.item.obji19[423213];
            var d19t21 = $scope.item.obji19[423217];

            if (p19t1 != undefined) {
                jQuery('#qrcodep19t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p19t1
                });	
            }
            
            if (d19t1 != undefined) {
                jQuery('#qrcoded19t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d19t1
            });
            }

            if (p19t2 != undefined) {
                jQuery('#qrcodep19t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p19t2
                });	
            }
            
            if (d19t2 != undefined) {
                jQuery('#qrcoded19t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d19t2
            });
            }

            if (p19t3 != undefined) {
                jQuery('#qrcodep19t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p19t3
                });	
            }
            
            if (d19t3 != undefined) {
                jQuery('#qrcoded19t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d19t3
            });
            }

            if (p19t4 != undefined) {
                jQuery('#qrcodep19t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p19t4
                });	
            }
            
            if (d19t4 != undefined) {
                jQuery('#qrcoded19t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d19t4
            });
            }

            if (p19t5 != undefined) {
                jQuery('#qrcodep19t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p19t5
                });	
            }
            
            if (d19t5 != undefined) {
                jQuery('#qrcoded19t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d19t5
            });
            }

            if (p19t6 != undefined) {
                jQuery('#qrcodep19t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p19t6
                });	
            }
            
            if (d19t6 != undefined) {
                jQuery('#qrcoded19t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d19t6
            });
            }

            if (p19t7 != undefined) {
                jQuery('#qrcodep19t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p19t7
                });	
            }
            
            if (d19t7 != undefined) {
                jQuery('#qrcoded19t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d19t7
            });
            }

            if (p19t8 != undefined) {
                jQuery('#qrcodep19t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p19t8
                });	
            }
            
            if (d19t8 != undefined) {
                jQuery('#qrcoded19t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d19t8
            });
            }

            if (p19t9 != undefined) {
                jQuery('#qrcodep19t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p19t9
                });	
            }
            
            if (d19t9 != undefined) {
                jQuery('#qrcoded19t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d19t9
            });
            }

            if (p19t10 != undefined) {
                jQuery('#qrcodep19t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p19t10
                });	
            }
            
            if (d19t10 != undefined) {
                jQuery('#qrcoded19t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d19t10
            });
            }

            if (p19t11 != undefined) {
                jQuery('#qrcodep19t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p19t11
                });	
            }
            
            if (d19t11 != undefined) {
                jQuery('#qrcoded19t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d19t11
            });
            }

            if (p19t12 != undefined) {
                jQuery('#qrcodep19t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p19t12
                });	
            }
            
            if (d19t12 != undefined) {
                jQuery('#qrcoded19t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d19t12
            });
            }

            if (p19t13 != undefined) {
                jQuery('#qrcodep19t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p19t13
                });	
            }
            
            if (d19t13 != undefined) {
                jQuery('#qrcoded19t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d19t13
            });
            }

            if (p19t14 != undefined) {
                jQuery('#qrcodep19t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p19t14
                });	
            }
            
            if (d19t14 != undefined) {
                jQuery('#qrcoded19t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d19t14
            });
            }

            if (p19t15 != undefined) {
                jQuery('#qrcodep19t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p19t15
                });	
            }
            
            if (d19t15 != undefined) {
                jQuery('#qrcoded19t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d19t15
            });
            }

            if (p19t16 != undefined) {
                jQuery('#qrcodep19t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p19t16
                });	
            }
            
            if (d19t16 != undefined) {
                jQuery('#qrcoded19t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d19t16
            });
            }

            if (p19t17 != undefined) {
                jQuery('#qrcodep19t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p19t17
                });	
            }
            
            if (d19t17 != undefined) {
                jQuery('#qrcoded19t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d19t17
            });
            }

            if (p19t18 != undefined) {
                jQuery('#qrcodep19t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p19t18
                });	
            }
            
            if (d19t18 != undefined) {
                jQuery('#qrcoded19t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d19t18
            });
            }

            if (p19t19 != undefined) {
                jQuery('#qrcodep19t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p19t19
                });	
            }
            
            if (d19t19 != undefined) {
                jQuery('#qrcoded19t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d19t19
            });
            }

            if (p19t20 != undefined) {
                jQuery('#qrcodep19t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p19t20
                });	
            }
            
            if (d19t20 != undefined) {
                jQuery('#qrcoded19t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d19t20
            });
            }

            if (p19t21 != undefined) {
                jQuery('#qrcodep19t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p19t21
                });	
            }
            
            if (d19t21 != undefined) {
                jQuery('#qrcoded19t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d19t21
            });
            }
        }

        if(dataLoad20.length > 0){
            for (var i = 0; i <= dataLoad20.length - 1; i++) {
                if(dataLoad20[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad20[i].type == "textbox") {
                    $('#id_'+dataLoad20[i].emrdfk).html( dataLoad20[i].value)
                    $scope.item.obji20[dataLoad20[i].emrdfk] = dataLoad20[i].value
                }
                if (dataLoad20[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad20[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji20[dataLoad20[i].emrdfk] = chekedd
                }
                if (dataLoad20[i].type == "radio") {
                    $scope.item.obji20[dataLoad20[i].emrdfk] = dataLoad20[i].value

                }

                if (dataLoad20[i].type == "datetime") {
                    $('#id_'+dataLoad20[i].emrdfk).html( dataLoad20[i].value)
                    $scope.item.obji20[dataLoad20[i].emrdfk] = dataLoad20[i].value
                }
                if (dataLoad20[i].type == "time") {
                    $scope.item.obji20[dataLoad20[i].emrdfk] = dataLoad20[i].value
                }
                if (dataLoad20[i].type == "date") {
                    $scope.item.obji20[dataLoad20[i].emrdfk] = dataLoad20[i].value
                }

                if (dataLoad20[i].type == "checkboxtextbox") {
                    $scope.item.obji20[dataLoad20[i].emrdfk] = dataLoad20[i].value
                    $scope.item.obji20[dataLoad20[i].emrdfk] = true
                }
                if (dataLoad20[i].type == "textarea") {
                    $('#id_'+dataLoad20[i].emrdfk).html( dataLoad20[i].value)
                    $scope.item.obji20[dataLoad20[i].emrdfk] = dataLoad20[i].value
                }
                if (dataLoad20[i].type == "combobox") {
        
                    var str = dataLoad20[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji20[dataLoad20[i].emrdfk] = res[1]
                        $('#id_'+dataLoad20[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad20[i].type == "combobox2") {
                    var str = dataLoad20[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji20[dataLoad20[i].emrdfk+""+1] = res[0]
                    $scope.item.obji20[dataLoad20[i].emrdfk] = res[1]
                    $('#id_'+dataLoad20[i].emrdfk).html ( res[1])

                }

                if (dataLoad20[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad20[i].value
                }

                if (dataLoad20[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad20[i].value
                }

                if (dataLoad20[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad20[i].value
                }
                if (dataLoad20[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad20[i].value
                }
                if (dataLoad20[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad20[i].value
                }
                if (dataLoad20[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad20[i].value
                }
                if (dataLoad20[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad20[i].value
                }
                if (dataLoad20[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad20[i].value
                }
                if (dataLoad20[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad20[i].value
                }
                if (dataLoad20[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad20[i].value
                }
                if (dataLoad20[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad20[i].value
                }
                if (dataLoad20[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad20[i].value
                }
                if (dataLoad20[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad20[i].value
                }
                if (dataLoad20[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad20[i].value
                }
                if (dataLoad20[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad20[i].value
                }
                if (dataLoad20[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad20[i].value
                }
                if (dataLoad20[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad20[i].value
                }
                
                if (dataLoad20[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad20[i].value
                }

                $scope.tglemr = dataLoad20[i].tgl
                
            }

            var p20t1 = $scope.item.obji20[423053];
            var d20t1 = $scope.item.obji20[423057];

            var p20t2 = $scope.item.obji20[423061];
            var d20t2 = $scope.item.obji20[423065];

            var p20t3 = $scope.item.obji20[423069];
            var d20t3 = $scope.item.obji20[423073];

            var p20t4 = $scope.item.obji20[423077];
            var d20t4 = $scope.item.obji20[423081];

            var p20t5 = $scope.item.obji20[423085];
            var d20t5 = $scope.item.obji20[423089];

            var p20t6 = $scope.item.obji20[423093];
            var d20t6 = $scope.item.obji20[423097];

            var p20t7 = $scope.item.obji20[423101];
            var d20t7 = $scope.item.obji20[423105];

            var p20t8 = $scope.item.obji20[423109];
            var d20t8 = $scope.item.obji20[423113];

            var p20t9 = $scope.item.obji20[423117];
            var d20t9 = $scope.item.obji20[423121];

            var p20t10 = $scope.item.obji20[423125];
            var d20t10 = $scope.item.obji20[423129];

            var p20t11 = $scope.item.obji20[423133];
            var d20t11 = $scope.item.obji20[423137];

            var p20t12 = $scope.item.obji20[423141];
            var d20t12 = $scope.item.obji20[423145];

            var p20t13 = $scope.item.obji20[423149];
            var d20t13 = $scope.item.obji20[423153];

            var p20t14 = $scope.item.obji20[423157];
            var d20t14 = $scope.item.obji20[423161];

            var p20t15 = $scope.item.obji20[423165];
            var d20t15 = $scope.item.obji20[423169];

            var p20t16 = $scope.item.obji20[423173];
            var d20t16 = $scope.item.obji20[423177];

            var p20t17 = $scope.item.obji20[423181];
            var d20t17 = $scope.item.obji20[423185];

            var p20t18 = $scope.item.obji20[423189];
            var d20t18 = $scope.item.obji20[423193];

            var p20t19 = $scope.item.obji20[423197];
            var d20t19 = $scope.item.obji20[423201];

            var p20t20 = $scope.item.obji20[423205];
            var d20t20 = $scope.item.obji20[423209];

            var p20t21 = $scope.item.obji20[423213];
            var d20t21 = $scope.item.obji20[423217];

            if (p20t1 != undefined) {
                jQuery('#qrcodep20t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p20t1
                });	
            }
            
            if (d20t1 != undefined) {
                jQuery('#qrcoded20t1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d20t1
            });
            }

            if (p20t2 != undefined) {
                jQuery('#qrcodep20t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p20t2
                });	
            }
            
            if (d20t2 != undefined) {
                jQuery('#qrcoded20t2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d20t2
            });
            }

            if (p20t3 != undefined) {
                jQuery('#qrcodep20t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p20t3
                });	
            }
            
            if (d20t3 != undefined) {
                jQuery('#qrcoded20t3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d20t3
            });
            }

            if (p20t4 != undefined) {
                jQuery('#qrcodep20t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p20t4
                });	
            }
            
            if (d20t4 != undefined) {
                jQuery('#qrcoded20t4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d20t4
            });
            }

            if (p20t5 != undefined) {
                jQuery('#qrcodep20t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p20t5
                });	
            }
            
            if (d20t5 != undefined) {
                jQuery('#qrcoded20t5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d20t5
            });
            }

            if (p20t6 != undefined) {
                jQuery('#qrcodep20t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p20t6
                });	
            }
            
            if (d20t6 != undefined) {
                jQuery('#qrcoded20t6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d20t6
            });
            }

            if (p20t7 != undefined) {
                jQuery('#qrcodep20t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p20t7
                });	
            }
            
            if (d20t7 != undefined) {
                jQuery('#qrcoded20t7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d20t7
            });
            }

            if (p20t8 != undefined) {
                jQuery('#qrcodep20t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p20t8
                });	
            }
            
            if (d20t8 != undefined) {
                jQuery('#qrcoded20t8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d20t8
            });
            }

            if (p20t9 != undefined) {
                jQuery('#qrcodep20t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p20t9
                });	
            }
            
            if (d20t9 != undefined) {
                jQuery('#qrcoded20t9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d20t9
            });
            }

            if (p20t10 != undefined) {
                jQuery('#qrcodep20t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p20t10
                });	
            }
            
            if (d20t10 != undefined) {
                jQuery('#qrcoded20t10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d20t10
            });
            }

            if (p20t11 != undefined) {
                jQuery('#qrcodep20t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p20t11
                });	
            }
            
            if (d20t11 != undefined) {
                jQuery('#qrcoded20t11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d20t11
            });
            }

            if (p20t12 != undefined) {
                jQuery('#qrcodep20t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p20t12
                });	
            }
            
            if (d20t12 != undefined) {
                jQuery('#qrcoded20t12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d20t12
            });
            }

            if (p20t13 != undefined) {
                jQuery('#qrcodep20t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p20t13
                });	
            }
            
            if (d20t13 != undefined) {
                jQuery('#qrcoded20t13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d20t13
            });
            }

            if (p20t14 != undefined) {
                jQuery('#qrcodep20t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p20t14
                });	
            }
            
            if (d20t14 != undefined) {
                jQuery('#qrcoded20t14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d20t14
            });
            }

            if (p20t15 != undefined) {
                jQuery('#qrcodep20t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p20t15
                });	
            }
            
            if (d20t15 != undefined) {
                jQuery('#qrcoded20t15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d20t15
            });
            }

            if (p20t16 != undefined) {
                jQuery('#qrcodep20t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p20t16
                });	
            }
            
            if (d20t16 != undefined) {
                jQuery('#qrcoded20t16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d20t16
            });
            }

            if (p20t17 != undefined) {
                jQuery('#qrcodep20t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p20t17
                });	
            }
            
            if (d20t17 != undefined) {
                jQuery('#qrcoded20t17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d20t17
            });
            }

            if (p20t18 != undefined) {
                jQuery('#qrcodep20t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p20t18
                });	
            }
            
            if (d20t18 != undefined) {
                jQuery('#qrcoded20t18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d20t18
            });
            }

            if (p20t19 != undefined) {
                jQuery('#qrcodep20t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p20t19
                });	
            }
            
            if (d20t19 != undefined) {
                jQuery('#qrcoded20t19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d20t19
            });
            }

            if (p20t20 != undefined) {
                jQuery('#qrcodep20t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p20t20
                });	
            }
            
            if (d20t20 != undefined) {
                jQuery('#qrcoded20t20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d20t20
            });
            }

            if (p20t21 != undefined) {
                jQuery('#qrcodep20t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p20t21
                });	
            }
            
            if (d20t21 != undefined) {
                jQuery('#qrcoded20t21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d20t21
            });
            }
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
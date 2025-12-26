define(['initialize'], function (initialize) {
    'use strict';
    initialize.controller('PenilaianPEWSCtrl', ['$q', '$rootScope', '$scope', 'ModelItem', '$state', 'CacheHelper', 'DateHelper', 'MedifirstService',
        function ($q, $rootScope, $scope, ModelItem, $state, cacheHelper, dateHelper, medifirstService) {
            
            var paramsIndex = $state.params.index ? parseInt($state.params.index) : null
            var isNotClick = true;
            $scope.noCM = $state.params.noCM;
            $scope.tombolSimpanVis = true
            $scope.noRecPap = cacheHelper.get('noRecPap');
            $scope.totalSkor = 0;
            $scope.totalSkor2 = 0;
            $scope.cc = {};
            var nomorEMR = '-';
            $scope.cc.emrfk = 290125;
            var dataLoad = []
            $scope.listData1 = []
            $scope.listData2 = []
            $scope.listData3 = []
            $scope.listData4 = []
            $scope.listData5 = []
            $scope.listData6 = []
            $scope.listData7 = []
            $scope.listSkor = []
            $scope.listNama = []
            $scope.listParaf = []
            $scope.listGDS = []
            $scope.listSkorNyeri = []
            $scope.listUrinOutput = []
            $scope.loading = true


            medifirstService.getPart('emr/get-datacombo-part-dokter', true, true, 20).then(function (data) {
                $scope.listDokter = data
            })
            medifirstService.getPart('emr/get-datacombo-part-ruangan', true, true, 20).then(function (data) {
                $scope.listRuangan = data
            })
            medifirstService.getPart('emr/get-datacombo-part-diagnosa', true, true, 20).then(function (data) {
                $scope.listDiagnosa = data
            })
            medifirstService.get("emr/get-rekam-medis-dynamic?emrid=" + 249).then(function (e) {
                // debugger
                // $scope.isRouteLoading = false
                //   var datas = e.data.kolom1
                //     for (let i = 0; i <  datas.length; i++) {
                //         const element =datas[i];
                //         if (element.namaexternal == 'kebahayaan')
                //             $scope.listData1.push({ id: element.id, skor: element.reportdisplay, nama: element.caption })
                //         if (element.namaexternal == 'sistempendukung')
                //             $scope.listData2.push({ id: element.id, skor: element.reportdisplay, nama: element.caption })
                //         if (element.namaexternal == 'kemampuanbekerja')
                //             $scope.listData3.push({ id: element.id, skor: element.reportdisplay, nama: element.caption })
                //     }
                
            })
            var chekedd = false
            var chacePeriode = cacheHelper.get('cacheNomorEMR');
            if (chacePeriode != undefined) {
                nomorEMR = chacePeriode[0]
                $scope.cc.norec_emr = nomorEMR

              
                medifirstService.get("emr/get-emr-transaksi-detail?noemr=" + nomorEMR + "&emrfk=" + $scope.cc.emrfk, true).then(function (dat) {
                    $scope.item.obj = []
                    $scope.item.obj2 = []
                    $scope.item.obj[17419]={ text: $scope.cc.dokterdpjp, value: $scope.cc.iddpjp }
                    $scope.item.obj[17421]={text: $scope.cc.namaruangan, value: $scope.cc.objectruanganfk}
                    

                    dataLoad = dat.data.data
                    for (var i = 0; i <= dataLoad.length - 1; i++) {
                        if (parseFloat($scope.cc.emrfk) == dataLoad[i].emrfk && paramsIndex == dataLoad[i].index) {
                            if (dataLoad[i].type == "textbox") {
                                $scope.item.obj[dataLoad[i].emrdfk] = dataLoad[i].value
                                if (dataLoad[i].emrdfk=='17380') 
                                $scope.skor1 =parseFloat( dataLoad[i].value)
                                if (dataLoad[i].emrdfk=='17381') 
                                    $scope.skor2 =parseFloat( dataLoad[i].value)
                                if (dataLoad[i].emrdfk=='17382') 
                                    $scope.skor3 =parseFloat( dataLoad[i].value)
                                if (dataLoad[i].emrdfk=='17383') 
                                    $scope.skor4 =parseFloat( dataLoad[i].value)
                                if (dataLoad[i].emrdfk=='17384') 
                                    $scope.skor5 =parseFloat( dataLoad[i].value)
                                if (dataLoad[i].emrdfk=='17385') 
                                    $scope.skor6 =parseFloat( dataLoad[i].value)
                                if (dataLoad[i].emrdfk=='17386') 
                                    $scope.skor7 =parseFloat( dataLoad[i].value)
                                if (dataLoad[i].emrdfk=='17387') 
                                    $scope.skor8 =parseFloat( dataLoad[i].value)
                                if (dataLoad[i].emrdfk=='17388') 
                                    $scope.skor9 =parseFloat( dataLoad[i].value)
                                if (dataLoad[i].emrdfk=='17389') 
                                    $scope.skor10 =parseFloat( dataLoad[i].value)
                                if (dataLoad[i].emrdfk=='17390') 
                                    $scope.skor11 =parseFloat( dataLoad[i].value)
                                if (dataLoad[i].emrdfk=='17391') 
                                    $scope.skor12 =parseFloat( dataLoad[i].value)
                                if (dataLoad[i].emrdfk=='17392') 
                                    $scope.skor13 =parseFloat( dataLoad[i].value)
                            }
                            if (dataLoad[i].type == "checkbox") {
                                chekedd = false
                                if (dataLoad[i].value == '1') {
                                    chekedd = true
                                }
                                $scope.item.obj[dataLoad[i].emrdfk] = chekedd
                                // if (dataLoad[i].emrdfk >= 3122 && dataLoad[i].emrdfk <= 3148) {
                                //     var datass = { id: dataLoad[i].emrdfk, descNilai: dataLoad[i].reportdisplay }
                                //     $scope.getSkor2(datass)
                                // }
                                if (dataLoad[i].reportdisplay != null) {
                                    // var datass = { id: dataLoad[i].emrdfk, skor: dataLoad[i].reportdisplay }
                                    // $scope.getSkor(datass)
                                }


                            }

                            if (dataLoad[i].type == "datetime") {
                                $scope.item.obj[dataLoad[i].emrdfk] = new Date(dataLoad[i].value)
                            }
                            if (dataLoad[i].type == "time") {
                                $scope.item.obj[dataLoad[i].emrdfk] = new Date(dataLoad[i].value)
                            }
                            if (dataLoad[i].type == "combobox") {
                            var str = dataLoad[i].value
                            if(str != undefined){
                                    var res = str.split("~");
                                    $scope.item.obj[dataLoad[i].emrdfk] = { value: res[0], text: res[1] }        
                                }   
                                

                            }

                            // if(dataLoad[i].type == "checkboxtextbox") {
                            //     $scope.item.obj[dataLoad[i].emrdfk] = dataLoad[i].value
                            //     $scope.item.obj2[dataLoad[i].emrdfk] = true
                            // }
                            // if(dataLoad[i].type == "textarea") {
                            //     $scope.item.obj[dataLoad[i].emrdfk] = dataLoad[i].value
                            // }
                        }

                    }

                    $scope.item.obj[32104891] = 
                    Number($scope.item.obj[32104807] ?? 0) + 
                    Number($scope.item.obj[32104814] ?? 0) + 
                    Number($scope.item.obj[32104821] ?? 0) + 
                    Number($scope.item.obj[32104828] ?? 0) + 
                    Number($scope.item.obj[32104835] ?? 0) + 
                    Number($scope.item.obj[32104842] ?? 0) + 
                    Number($scope.item.obj[32104849] ?? 0) + 
                    Number($scope.item.obj[32104856] ?? 0) + 
                    Number($scope.item.obj[32104863] ?? 0) + 
                    Number($scope.item.obj[32104870] ?? 0) + 
                    Number($scope.item.obj[32104877] ?? 0) +
                    Number($scope.item.obj[32104884] ?? 0);

                    $scope.item.obj[32104892] = 
                    Number($scope.item.obj[32104808] ?? 0) +
                    Number($scope.item.obj[32104815] ?? 0) +
                    Number($scope.item.obj[32104822] ?? 0) +
                    Number($scope.item.obj[32104829] ?? 0) +
                    Number($scope.item.obj[32104836] ?? 0) +
                    Number($scope.item.obj[32104843] ?? 0) +
                    Number($scope.item.obj[32104850] ?? 0) +
                    Number($scope.item.obj[32104857] ?? 0) +
                    Number($scope.item.obj[32104864] ?? 0) +
                    Number($scope.item.obj[32104871] ?? 0) +
                    Number($scope.item.obj[32104878] ?? 0) +
                    Number($scope.item.obj[32104885] ?? 0);

                    $scope.item.obj[32104893] = 
                    Number($scope.item.obj[32104809] ?? 0) +
                    Number($scope.item.obj[32104816] ?? 0) +
                    Number($scope.item.obj[32104823] ?? 0) +
                    Number($scope.item.obj[32104830] ?? 0) +
                    Number($scope.item.obj[32104837] ?? 0) +
                    Number($scope.item.obj[32104844] ?? 0) +
                    Number($scope.item.obj[32104851] ?? 0) +
                    Number($scope.item.obj[32104858] ?? 0) +
                    Number($scope.item.obj[32104865] ?? 0) +
                    Number($scope.item.obj[32104872] ?? 0) +
                    Number($scope.item.obj[32104879] ?? 0) +
                    Number($scope.item.obj[32104886] ?? 0);

                    $scope.item.obj[32104894] = 
                    Number($scope.item.obj[32104810] ?? 0) +
                    Number($scope.item.obj[32104817] ?? 0) +
                    Number($scope.item.obj[32104824] ?? 0) +
                    Number($scope.item.obj[32104831] ?? 0) +
                    Number($scope.item.obj[32104838] ?? 0) +
                    Number($scope.item.obj[32104845] ?? 0) +
                    Number($scope.item.obj[32104852] ?? 0) +
                    Number($scope.item.obj[32104859] ?? 0) +
                    Number($scope.item.obj[32104866] ?? 0) +
                    Number($scope.item.obj[32104873] ?? 0) +
                    Number($scope.item.obj[32104880] ?? 0) +
                    Number($scope.item.obj[32104887] ?? 0);

                    $scope.item.obj[32104895] = 
                    Number($scope.item.obj[32104811] ?? 0) +
                    Number($scope.item.obj[32104818] ?? 0) +
                    Number($scope.item.obj[32104825] ?? 0) +
                    Number($scope.item.obj[32104832] ?? 0) +
                    Number($scope.item.obj[32104839] ?? 0) +
                    Number($scope.item.obj[32104846] ?? 0) +
                    Number($scope.item.obj[32104853] ?? 0) +
                    Number($scope.item.obj[32104860] ?? 0) +
                    Number($scope.item.obj[32104867] ?? 0) +
                    Number($scope.item.obj[32104874] ?? 0) +
                    Number($scope.item.obj[32104881] ?? 0) +
                    Number($scope.item.obj[32104888] ?? 0);
                    

                    $scope.item.obj[32104896] = 
                    Number($scope.item.obj[32104812] ?? 0) +
                    Number($scope.item.obj[32104819] ?? 0) +
                    Number($scope.item.obj[32104826] ?? 0) +
                    Number($scope.item.obj[32104833] ?? 0) +
                    Number($scope.item.obj[32104840] ?? 0) +
                    Number($scope.item.obj[32104847] ?? 0) +
                    Number($scope.item.obj[32104854] ?? 0) +
                    Number($scope.item.obj[32104861] ?? 0) +
                    Number($scope.item.obj[32104868] ?? 0) +
                    Number($scope.item.obj[32104875] ?? 0) +
                    Number($scope.item.obj[32104882] ?? 0) +
                    Number($scope.item.obj[32104889] ?? 0);
                    

                    $scope.item.obj[32104897] = 
                    Number($scope.item.obj[32104813] ?? 0) +
                    Number($scope.item.obj[32104820] ?? 0) +
                    Number($scope.item.obj[32104827] ?? 0) +
                    Number($scope.item.obj[32104834] ?? 0) +
                    Number($scope.item.obj[32104841] ?? 0) +
                    Number($scope.item.obj[32104848] ?? 0) +
                    Number($scope.item.obj[32104855] ?? 0) +
                    Number($scope.item.obj[32104862] ?? 0) +
                    Number($scope.item.obj[32104869] ?? 0) +
                    Number($scope.item.obj[32104876] ?? 0) +
                    Number($scope.item.obj[32104883] ?? 0) +
                    Number($scope.item.obj[32104890] ?? 0);
                    
                })
            }

            var chacePeriode = cacheHelper.get('cacheRekamMedis');
            if (chacePeriode != undefined) {
                $scope.cc.nocm = chacePeriode[0]
                $scope.cc.namapasien = chacePeriode[1]
                $scope.cc.jeniskelamin = chacePeriode[2]
                $scope.cc.noregistrasi = chacePeriode[3]
                $scope.cc.umur = chacePeriode[4]
                $scope.cc.kelompokpasien = chacePeriode[5]
                $scope.cc.tglregistrasi = chacePeriode[6]
                $scope.cc.norec = chacePeriode[7]
                $scope.cc.norec_pd = chacePeriode[8]
                $scope.cc.objectkelasfk = chacePeriode[9]
                $scope.cc.namakelas = chacePeriode[10]
                $scope.cc.objectruanganfk = chacePeriode[11]
                $scope.cc.namaruangan = chacePeriode[12]
                $scope.cc.DataNoregis = chacePeriode[12]
                $scope.cc.dokterdpjp = chacePeriode[16]
                $scope.cc.iddpjp = chacePeriode[17]
                if (nomorEMR == '-') {
                    $scope.cc.norec_emr = '-'
                } else {
                    $scope.cc.norec_emr = nomorEMR
                }
            }
            // medifirstService.get('emr/get-data-dg-primary/' + $scope.cc.noregistrasi, true, true, 20).then(function (data) {                
            //     var datas = data.data[0]
            //     $scope.item.obj[206477] = {id:datas.id, text:datas.namadiagnosa}
            // })  

            $scope.kembali = function () {
                $rootScope.showRiwayat()
            }

            $scope.Save = function () {

                var arrobj = Object.keys($scope.item.obj)
                var arrSave = []
                for (var i = arrobj.length - 1; i >= 0; i--) {
                    if ($scope.item.obj[parseInt(arrobj[i])] instanceof Date)
                        $scope.item.obj[parseInt(arrobj[i])] = moment($scope.item.obj[parseInt(arrobj[i])]).format('YYYY-MM-DD HH:mm')
                    arrSave.push({ id: arrobj[i], values: $scope.item.obj[parseInt(arrobj[i])] })
                }
                $scope.cc.jenisemr = 'asesmen'
                $scope.cc.index = $state.params.index
                var jsonSave = {
                    head: $scope.cc,
                    data: arrSave
                }
                medifirstService.post('emr/save-emr-dinamis', jsonSave).then(function (e) {
                    // $state.go("RekamMedis.OrderJadwalBedah.ProsedurKeselamatan", {
                    //     namaEMR : $scope.cc.emrfk,
                    //     nomorEMR : e.data.data.noemr 
                    // });
                    medifirstService.postLogging('EMR', 'norec emrpasien_t', e.data.data.norec,  
                    'Penilaian PEWS ' + ' dengan No EMR - ' +e.data.data.noemr +  ' pada No Registrasi ' 
                    + $scope.cc.noregistrasi).then(function (res) {
                    })

                    var arrStr = {
                        0: e.data.data.noemr
                    }
                    cacheHelper.set('cacheNomorEMR', arrStr);
                });
            }

        }
    ]);
    initialize.directive('disableContents', function() {
        return {
            compile: function(tElem, tAttrs) {
                var inputs = tElem.find('input');
                var inputsArea = tElem.find('textarea');
                inputs.attr('ng-disabled', tAttrs['disableContents']);
                inputsArea.attr('ng-disabled', tAttrs['disableContents']);
                for (var i = 0; i < inputs.length; i++) {
                }
            }
        }
    });
});
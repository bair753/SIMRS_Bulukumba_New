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
                    // $scope.item.obj[31100797] = 0;
                    // $scope.item.obj[31100798] = 0;
                    // $scope.item.obj[31100799] = 0;
                    // $scope.item.obj[31100800] = 0;
                    // $scope.item.obj[31100801] = 0;
                    // $scope.item.obj[31100802] = 0;
                    // $scope.item.obj[31100803] = 0;

                    $scope.item.obj[31100811] = 
                    Number($scope.item.obj[31100594] ?? 0) + 
                    Number($scope.item.obj[31100601] ?? 0) + 
                    Number($scope.item.obj[31100608] ?? 0) + 
                    Number($scope.item.obj[31100615] ?? 0) + 
                    Number($scope.item.obj[31100622] ?? 0) + 
                    Number($scope.item.obj[31100629] ?? 0) + 
                    Number($scope.item.obj[31100636] ?? 0) + 
                    Number($scope.item.obj[31100643] ?? 0) + 
                    Number($scope.item.obj[31100650] ?? 0) + 
                    Number($scope.item.obj[31100657] ?? 0) + 
                    Number($scope.item.obj[31100664] ?? 0) + 
                    Number($scope.item.obj[31100671] ?? 0) + 
                    Number($scope.item.obj[31100678] ?? 0) + 
                    Number($scope.item.obj[31100685] ?? 0) + 
                    Number($scope.item.obj[31100692] ?? 0) + 
                    Number($scope.item.obj[31100699] ?? 0) + 
                    Number($scope.item.obj[31100706] ?? 0) + 
                    Number($scope.item.obj[31100713] ?? 0) + 
                    Number($scope.item.obj[31100720] ?? 0) + 
                    Number($scope.item.obj[31100727] ?? 0) + 
                    Number($scope.item.obj[31100734] ?? 0) + 
                    Number($scope.item.obj[31100741] ?? 0) +
                    Number($scope.item.obj[31100748] ?? 0) +
                    Number($scope.item.obj[31100755] ?? 0) +
                    Number($scope.item.obj[31100762] ?? 0) +
                    Number($scope.item.obj[31100769] ?? 0) +
                    Number($scope.item.obj[31100776] ?? 0) +
                    Number($scope.item.obj[31100783] ?? 0) +
                    Number($scope.item.obj[31100790] ?? 0) +
                    Number($scope.item.obj[31100797] == 'A' ? 0 : 0) +
                    Number($scope.item.obj[31100804] ?? 0);

                    console.log($scope.item.obj[31100804]);

                    console.log($scope.item.obj);


                    $scope.item.obj[31100812] = 
                    Number($scope.item.obj[31100595] ?? 0) +
                    Number($scope.item.obj[31100602] ?? 0) +
                    Number($scope.item.obj[31100609] ?? 0) +
                    Number($scope.item.obj[31100615] ?? 0) +
                    Number($scope.item.obj[31100623] ?? 0) +
                    Number($scope.item.obj[31100630] ?? 0) +
                    Number($scope.item.obj[31100637] ?? 0) +
                    Number($scope.item.obj[31100644] ?? 0) +
                    Number($scope.item.obj[31100651] ?? 0) +
                    Number($scope.item.obj[31100658] ?? 0) +
                    Number($scope.item.obj[31100665] ?? 0) +
                    Number($scope.item.obj[31100672] ?? 0) +
                    Number($scope.item.obj[31100679] ?? 0) +
                    Number($scope.item.obj[31100686] ?? 0) +
                    Number($scope.item.obj[31100693] ?? 0) +
                    Number($scope.item.obj[31100700] ?? 0) +
                    Number($scope.item.obj[31100707] ?? 0) +
                    Number($scope.item.obj[31100714] ?? 0) +
                    Number($scope.item.obj[31100721] ?? 0) +
                    Number($scope.item.obj[31100728] ?? 0) +
                    Number($scope.item.obj[31100735] ?? 0) +
                    Number($scope.item.obj[31100742] ?? 0) +
                    Number($scope.item.obj[31100749] ?? 0) +
                    Number($scope.item.obj[31100756] ?? 0) +
                    Number($scope.item.obj[31100763] ?? 0) +
                    Number($scope.item.obj[31100770] ?? 0) +
                    Number($scope.item.obj[31100777] ?? 0) +
                    Number($scope.item.obj[31100784] ?? 0) +
                    Number($scope.item.obj[31100791] ?? 0) +
                    Number($scope.item.obj[31100798] == 'A' ? 0 : 0) +
                    Number($scope.item.obj[31100805] ?? 0);

                    $scope.item.obj[31100813] = 
                    Number($scope.item.obj[31100596] ?? 0) +
                    Number($scope.item.obj[31100603] ?? 0) +
                    Number($scope.item.obj[31100610] ?? 0) +
                    Number($scope.item.obj[31100617] ?? 0) +
                    Number($scope.item.obj[31100624] ?? 0) +
                    Number($scope.item.obj[31100631] ?? 0) +
                    Number($scope.item.obj[31100638] ?? 0) +
                    Number($scope.item.obj[31100645] ?? 0) +
                    Number($scope.item.obj[31100652] ?? 0) +
                    Number($scope.item.obj[31100659] ?? 0) +
                    Number($scope.item.obj[31100666] ?? 0) +
                    Number($scope.item.obj[31100673] ?? 0) +
                    Number($scope.item.obj[31100680] ?? 0) +
                    Number($scope.item.obj[31100687] ?? 0) +
                    Number($scope.item.obj[31100694] ?? 0) +
                    Number($scope.item.obj[31100701] ?? 0) +
                    Number($scope.item.obj[31100708] ?? 0) +
                    Number($scope.item.obj[31100715] ?? 0) +
                    Number($scope.item.obj[31100722] ?? 0) +
                    Number($scope.item.obj[31100729] ?? 0) +
                    Number($scope.item.obj[31100736] ?? 0) +
                    Number($scope.item.obj[31100743] ?? 0) +
                    Number($scope.item.obj[31100750] ?? 0) +
                    Number($scope.item.obj[31100757] ?? 0) +
                    Number($scope.item.obj[31100764] ?? 0) +
                    Number($scope.item.obj[31100771] ?? 0) +
                    Number($scope.item.obj[31100778] ?? 0) +
                    Number($scope.item.obj[31100785] ?? 0) +
                    Number($scope.item.obj[31100792] ?? 0) +
                    Number($scope.item.obj[31100799] == 'A' ? 0 : 0) +
                    Number($scope.item.obj[31100806] ?? 0);

                    $scope.item.obj[31100814] = 
                    Number($scope.item.obj[31100597] ?? 0) +
                    Number($scope.item.obj[31100604] ?? 0) +
                    Number($scope.item.obj[31100611] ?? 0) +
                    Number($scope.item.obj[31100618] ?? 0) +
                    Number($scope.item.obj[31100625] ?? 0) +
                    Number($scope.item.obj[31100632] ?? 0) +
                    Number($scope.item.obj[31100639] ?? 0) +
                    Number($scope.item.obj[31100646] ?? 0) +
                    Number($scope.item.obj[31100653] ?? 0) +
                    Number($scope.item.obj[31100660] ?? 0) +
                    Number($scope.item.obj[31100667] ?? 0) +
                    Number($scope.item.obj[31100674] ?? 0) +
                    Number($scope.item.obj[31100681] ?? 0) +
                    Number($scope.item.obj[31100688] ?? 0) +
                    Number($scope.item.obj[31100695] ?? 0) +
                    Number($scope.item.obj[31100702] ?? 0) +
                    Number($scope.item.obj[31100709] ?? 0) +
                    Number($scope.item.obj[31100716] ?? 0) +
                    Number($scope.item.obj[31100723] ?? 0) +
                    Number($scope.item.obj[31100730] ?? 0) +
                    Number($scope.item.obj[31100737] ?? 0) +
                    Number($scope.item.obj[31100744] ?? 0) +
                    Number($scope.item.obj[31100751] ?? 0) +
                    Number($scope.item.obj[31100758] ?? 0) +
                    Number($scope.item.obj[31100765] ?? 0) +
                    Number($scope.item.obj[31100772] ?? 0) +
                    Number($scope.item.obj[31100779] ?? 0) +
                    Number($scope.item.obj[31100786] ?? 0) +
                    Number($scope.item.obj[31100793] ?? 0) +
                    Number($scope.item.obj[31100800] == 'A' ? 0 : 0) +
                    Number($scope.item.obj[31100807] ?? 0);

                    $scope.item.obj[31100815] = 
                    Number($scope.item.obj[31100598] ?? 0) +
                    Number($scope.item.obj[31100605] ?? 0) +
                    Number($scope.item.obj[31100612] ?? 0) +
                    Number($scope.item.obj[31100619] ?? 0) +
                    Number($scope.item.obj[31100626] ?? 0) +
                    Number($scope.item.obj[31100633] ?? 0) +
                    Number($scope.item.obj[31100640] ?? 0) +
                    Number($scope.item.obj[31100647] ?? 0) +
                    Number($scope.item.obj[31100654] ?? 0) +
                    Number($scope.item.obj[31100661] ?? 0) +
                    Number($scope.item.obj[31100668] ?? 0) +
                    Number($scope.item.obj[31100675] ?? 0) +
                    Number($scope.item.obj[31100682] ?? 0) +
                    Number($scope.item.obj[31100689] ?? 0) +
                    Number($scope.item.obj[31100696] ?? 0) +
                    Number($scope.item.obj[31100703] ?? 0) +
                    Number($scope.item.obj[31100710] ?? 0) +
                    Number($scope.item.obj[31100717] ?? 0) +
                    Number($scope.item.obj[31100724] ?? 0) +
                    Number($scope.item.obj[31100731] ?? 0) +
                    Number($scope.item.obj[31100738] ?? 0) +
                    Number($scope.item.obj[31100745] ?? 0) +
                    Number($scope.item.obj[31100752] ?? 0) +
                    Number($scope.item.obj[31100759] ?? 0) +
                    Number($scope.item.obj[31100766] ?? 0) +
                    Number($scope.item.obj[31100773] ?? 0) +
                    Number($scope.item.obj[31100780] ?? 0) +
                    Number($scope.item.obj[31100787] ?? 0) +
                    Number($scope.item.obj[31100794] ?? 0) +
                    Number($scope.item.obj[31100801] == 'A' ? 0 : 0) +
                    Number($scope.item.obj[31100808] ?? 0);

                    $scope.item.obj[31100816] = 
                    Number($scope.item.obj[31100599] ?? 0) +
                    Number($scope.item.obj[31100606] ?? 0) +
                    Number($scope.item.obj[31100613] ?? 0) +
                    Number($scope.item.obj[31100620] ?? 0) +
                    Number($scope.item.obj[31100627] ?? 0) +
                    Number($scope.item.obj[31100634] ?? 0) +
                    Number($scope.item.obj[31100641] ?? 0) +
                    Number($scope.item.obj[31100648] ?? 0) +
                    Number($scope.item.obj[31100655] ?? 0) +
                    Number($scope.item.obj[31100662] ?? 0) +
                    Number($scope.item.obj[31100669] ?? 0) +
                    Number($scope.item.obj[31100676] ?? 0) +
                    Number($scope.item.obj[31100683] ?? 0) +
                    Number($scope.item.obj[31100690] ?? 0) +
                    Number($scope.item.obj[31100697] ?? 0) +
                    Number($scope.item.obj[31100704] ?? 0) +
                    Number($scope.item.obj[31100711] ?? 0) +
                    Number($scope.item.obj[31100718] ?? 0) +
                    Number($scope.item.obj[31100725] ?? 0) +
                    Number($scope.item.obj[31100732] ?? 0) +
                    Number($scope.item.obj[31100739] ?? 0) +
                    Number($scope.item.obj[31100746] ?? 0) +
                    Number($scope.item.obj[31100753] ?? 0) +
                    Number($scope.item.obj[31100760] ?? 0) +
                    Number($scope.item.obj[31100767] ?? 0) +
                    Number($scope.item.obj[31100774] ?? 0) +
                    Number($scope.item.obj[31100781] ?? 0) +
                    Number($scope.item.obj[31100788] ?? 0) +
                    Number($scope.item.obj[31100795] ?? 0) +
                    Number($scope.item.obj[31100802] == 'A' ? 0 : 0) +
                    Number($scope.item.obj[31100809] ?? 0);

                    $scope.item.obj[31100817] = 
                    Number($scope.item.obj[31100600] ?? 0) +
                    Number($scope.item.obj[31100607] ?? 0) +
                    Number($scope.item.obj[31100614] ?? 0) +
                    Number($scope.item.obj[31100621] ?? 0) +
                    Number($scope.item.obj[31100628] ?? 0) +
                    Number($scope.item.obj[31100635] ?? 0) +
                    Number($scope.item.obj[31100642] ?? 0) +
                    Number($scope.item.obj[31100649] ?? 0) +
                    Number($scope.item.obj[31100656] ?? 0) +
                    Number($scope.item.obj[31100663] ?? 0) +
                    Number($scope.item.obj[31100670] ?? 0) +
                    Number($scope.item.obj[31100677] ?? 0) +
                    Number($scope.item.obj[31100684] ?? 0) +
                    Number($scope.item.obj[31100691] ?? 0) +
                    Number($scope.item.obj[31100698] ?? 0) +
                    Number($scope.item.obj[31100705] ?? 0) +
                    Number($scope.item.obj[31100712] ?? 0) +
                    Number($scope.item.obj[31100719] ?? 0) +
                    Number($scope.item.obj[31100726] ?? 0) +
                    Number($scope.item.obj[31100733] ?? 0) +
                    Number($scope.item.obj[31100740] ?? 0) +
                    Number($scope.item.obj[31100747] ?? 0) +
                    Number($scope.item.obj[31100754] ?? 0) +
                    Number($scope.item.obj[31100761] ?? 0) +
                    Number($scope.item.obj[31100768] ?? 0) +
                    Number($scope.item.obj[31100775] ?? 0) +
                    Number($scope.item.obj[31100782] ?? 0) +
                    Number($scope.item.obj[31100789] ?? 0) +
                    Number($scope.item.obj[31100796] ?? 0) +
                    Number($scope.item.obj[31100803] == 'A' ? 0 : 0) +
                    Number($scope.item.obj[31100810] ?? 0);
                    
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
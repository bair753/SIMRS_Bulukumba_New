define(['initialize', 'Configuration'], function (initialize, config) {
    'use strict';
    initialize.controller('PenilaianDekubitusCtrl', ['$q', '$rootScope', '$scope', 'ModelItem', '$state', 'CacheHelper', 'DateHelper', 'MedifirstService',
        function ($q, $rootScope, $scope, ModelItem, $state, cacheHelper, dateHelper, medifirstService) {

            var paramsIndex = $state.params.index ? parseInt($state.params.index) : null
            $scope.noCM = $state.params.noCM;
            $scope.tombolSimpanVis = true
            $scope.noRecPap = cacheHelper.get('noRecPap');
            $scope.totalSkor = 0
            $scope.totalSkor2 = 0
            $scope.cc = {}
            var nomorEMR = '-'
            $scope.cc.emrfk = 290192;
            var dataLoad = []
            $scope.isCetak = false
            var norecEMR = ''
            var cacheNomorEMR = cacheHelper.get('cacheNomorEMR');
            var cacheNoREC = cacheHelper.get('cacheNOREC_EMR');
            if (cacheNoREC != undefined) {
                norecEMR = cacheNomorEMR[1]
            }
            if (cacheNomorEMR != undefined) {
                nomorEMR = cacheNomorEMR[0]
                norecEMR = cacheNomorEMR[1]
                $scope.cc.norec_emr = nomorEMR
            }
            var HttpClient = function () {
                this.get = function (aUrl, aCallback) {
                    var anHttpRequest = new XMLHttpRequest();
                    anHttpRequest.onreadystatechange = function () {
                        if (anHttpRequest.readyState == 4 && anHttpRequest.status == 200)
                            aCallback(anHttpRequest.responseText);
                    }

                    anHttpRequest.open("GET", aUrl, true);
                    anHttpRequest.send(null);
                }
            }
            $scope.cetakPdf = function () {
                if (norecEMR == '') return
                var local = JSON.parse(localStorage.getItem('profile'));
                var nama = medifirstService.getPegawaiLogin().namalengkap;
                window.open(config.baseApiBackend + 'report/cetak-skrining-pasien-dewasa?nocm='
                    + $scope.cc.nocm + '&norec_apd=' + $scope.cc.norec + '&emr=' + norecEMR
                    + '&emrfk=' + $scope.cc.emrfk
                    + '&kdprofile=' + local.id
                    // + '&index=' + paramsIndex
                    + '&nama=' + nama, '_blank');
            }

            medifirstService.getPart('emr/get-datacombo-part-pegawai', true, true, 20).then(function (data) {
                $scope.listPegawai = data
            })
            medifirstService.getPart('emr/get-datacombo-part-kelas', true, true, 20).then(function (data) {
                $scope.listKelas = data

            })
            medifirstService.getPart('emr/get-datacombo-part-ruangan-pelayanan', true, true, 20).then(function (data) {
                $scope.listRuang = data
            })

            $scope.listTglTable1 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 32116807, "type": "datetime" },
                        { "id": 32116808, "type": "datetime" },
                        { "id": 32116809, "type": "datetime" },
                        { "id": 32116810, "type": "datetime" },
                        { "id": 32116811, "type": "datetime" },
                        { "id": 32116812, "type": "datetime" },
                        { "id": 32116813, "type": "datetime" }
                    ]
                }
            ];

            $scope.listTotalSkor = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 32116954, "type": "textbox" },
                        { "id": 32116955, "type": "textbox" },
                        { "id": 32116956, "type": "textbox" },
                        { "id": 32116957, "type": "textbox" },
                        { "id": 32116958, "type": "textbox" },
                        { "id": 32116959, "type": "textbox" },
                        { "id": 32116960, "type": "textbox" }

                    ]
                }
            ];

            var cacheNomorEMR = cacheHelper.get('cacheNomorEMR');
            if (cacheNomorEMR != undefined) {
                nomorEMR = cacheNomorEMR[0]
                $scope.cc.norec_emr = nomorEMR
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
                if (nomorEMR == '-') {
                    $scope.cc.norec_emr = '-'
                } else {
                    $scope.cc.norec_emr = nomorEMR
                }
            }
            var chekedd = false

            
            $scope.item.obj = []
            $scope.item.obj2 = []

            if (nomorEMR == '-') {
                var nocmfk = null;
                var noregistrasifk = $state.params.noRec;
                var status = "t";
                // $scope.item.obj[423291] = $scope.now;
                medifirstService.get("emr/get-antrian-pasien-norec/" + noregistrasifk).then(function (e) {
                    var antrianPasien = e.data.result;
                    $scope.item.obj[425000] = new Date(moment(antrianPasien.tglregistrasi).format('YYYY-MM-DD HH:mm'));
                })
            }

            medifirstService.get("emr/get-emr-transaksi-detail?noemr=" + nomorEMR + "&emrfk=" + $scope.cc.emrfk, true).then(function (dat) {
                dataLoad = dat.data.data
                for (var i = 0; i <= dataLoad.length - 1; i++) {
                    if (parseFloat($scope.cc.emrfk) == dataLoad[i].emrfk  && paramsIndex == dataLoad[i].index) {

                        if (dataLoad[i].type == "textbox") {
                            $scope.item.obj[dataLoad[i].emrdfk] = dataLoad[i].value
                        }
                        if (dataLoad[i].type == "checkbox") {
                            chekedd = false
                            if (dataLoad[i].value == '1') {
                                chekedd = true
                            }
                            $scope.item.obj[dataLoad[i].emrdfk] = chekedd
                            if (dataLoad[i].emrdfk >= 7590 && dataLoad[i].emrdfk <= 7593 && chekedd) {
                                $scope.getSkalaNyeri(1, { descNilai: dataLoad[i].reportdisplay })
                            }



                        }

                        if (dataLoad[i].type == "datetime") {
                            $scope.item.obj[dataLoad[i].emrdfk] = new Date(dataLoad[i].value)
                        }
                        if (dataLoad[i].type == "time") {
                            $scope.item.obj[dataLoad[i].emrdfk] = new Date(dataLoad[i].value)
                        }
                        if (dataLoad[i].type == "date") {
                            $scope.item.obj[dataLoad[i].emrdfk] = new Date(dataLoad[i].value)
                        }

                        if (dataLoad[i].type == "checkboxtextbox") {
                            $scope.item.obj[dataLoad[i].emrdfk] = dataLoad[i].value
                            $scope.item.obj2[dataLoad[i].emrdfk] = true
                        }
                        if (dataLoad[i].type == "textarea") {
                            $scope.item.obj[dataLoad[i].emrdfk] = dataLoad[i].value
                        }
                        if (dataLoad[i].type == "combobox") {
                            var str = dataLoad[i].value
                            var res = str.split("~");
                            // $scope.item.objcbo[dataLoad[i].emrdfk]= {value:res[0],text:res[1]}
                            $scope.item.obj[dataLoad[i].emrdfk] = { value: res[0], text: res[1] }

                        }


                    }

                }
            })

            $scope.Batal = function () {
                $scope.item.obj = []
            }
            $scope.kembali = function () {
                $rootScope.showRiwayat()
            }

            $scope.Save = function () {

                var arrobj = Object.keys($scope.item.obj)
                var arrSave = []
                for (var i = arrobj.length - 1; i >= 0; i--) {
                    arrSave.push({ id: arrobj[i], values: $scope.item.obj[parseInt(arrobj[i])] })
                }
                $scope.cc.jenisemr = 'asesmen'
                $scope.cc.index = $state.params.index;
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
                        'Penilaian Dekubitus' + ' dengan No EMR - ' + e.data.data.noemr + ' pada No Registrasi '
                        + $scope.cc.noregistrasi).then(function (res) {
                        })

                    $rootScope.loadRiwayat()
                    var arrStr = {
                        0: e.data.data.noemr
                    }
                    cacheHelper.set('cacheNomorEMR', arrStr);
                });
            }

            $scope.skorParameter = 0;
            $scope.getSkorParameter = function(skor, id) {
                var arrobj = Object.keys($scope.item.obj);

                for (var i = arrobj.length - 1; i >= 0; i--) {
                    if (arrobj[i] == id) {
                        if ($scope.item.obj[parseFloat(arrobj[i])] == true) {
                            $scope.skorParameter = $scope.skorParameter + parseFloat(skor);
                            break;
                        } else {
                            $scope.skorParameter = $scope.skorParameter - parseFloat(skor);
                            break;
                        }
                    }
                }
                $scope.item.obj[32116954] = $scope.skorParameter;
            }

            $scope.skorParameter2 = 0;
            $scope.getSkorParameter2 = function (skor, id) {
                var arrobj = Object.keys($scope.item.obj);

                for (var i = arrobj.length - 1; i >= 0; i--) {
                    if (arrobj[i] == id) {
                        if ($scope.item.obj[parseFloat(arrobj[i])] == true) {
                            $scope.skorParameter2 = $scope.skorParameter2 + parseFloat(skor);
                            break;
                        } else {
                            $scope.skorParameter2 = $scope.skorParameter2 - parseFloat(skor);
                            break;
                        }
                    }
                }
                $scope.item.obj[32116955] = $scope.skorParameter2;
            }

            $scope.skorParameter3 = 0;
            $scope.getSkorParameter3 = function (skor, id) {
                var arrobj = Object.keys($scope.item.obj);

                for (var i = arrobj.length - 1; i >= 0; i--) {
                    if (arrobj[i] == id) {
                        if ($scope.item.obj[parseFloat(arrobj[i])] == true) {
                            $scope.skorParameter3 = $scope.skorParameter3 + parseFloat(skor);
                            break;
                        } else {
                            $scope.skorParameter3 = $scope.skorParameter3 - parseFloat(skor);
                            break;
                        }
                    }
                }
                $scope.item.obj[32116956] = $scope.skorParameter3;
            }

            $scope.skorParameter4 = 0;
            $scope.getSkorParameter4 = function (skor, id) {
                var arrobj = Object.keys($scope.item.obj);

                for (var i = arrobj.length - 1; i >= 0; i--) {
                    if (arrobj[i] == id) {
                        if ($scope.item.obj[parseFloat(arrobj[i])] == true) {
                            $scope.skorParameter4 = $scope.skorParameter4 + parseFloat(skor);
                            break;
                        } else {
                            $scope.skorParameter4 = $scope.skorParameter4 - parseFloat(skor);
                            break;
                        }
                    }
                }
                $scope.item.obj[32116957] = $scope.skorParameter4;
            }

            $scope.skorParameter5 = 0;
            $scope.getSkorParameter5 = function (skor, id) {
                var arrobj = Object.keys($scope.item.obj);

                for (var i = arrobj.length - 1; i >= 0; i--) {
                    if (arrobj[i] == id) {
                        if ($scope.item.obj[parseFloat(arrobj[i])] == true) {
                            $scope.skorParameter5 = $scope.skorParameter5 + parseFloat(skor);
                            break;
                        } else {
                            $scope.skorParameter5 = $scope.skorParameter5 - parseFloat(skor);
                            break;
                        }
                    }
                }
                $scope.item.obj[32116958] = $scope.skorParameter5;
            }

            $scope.skorParameter6 = 0;
            $scope.getSkorParameter6 = function (skor, id) {
                var arrobj = Object.keys($scope.item.obj);

                for (var i = arrobj.length - 1; i >= 0; i--) {
                    if (arrobj[i] == id) {
                        if ($scope.item.obj[parseFloat(arrobj[i])] == true) {
                            $scope.skorParameter6 = $scope.skorParameter6 + parseFloat(skor);
                            break;
                        } else {
                            $scope.skorParameter6 = $scope.skorParameter6 - parseFloat(skor);
                            break;
                        }
                    }
                }
                $scope.item.obj[32116959] = $scope.skorParameter6;
            }

            $scope.skorParamater7 = 0;
            $scope.getSkorParamater7 = function (skor, id) {
                var arrobj = Object.keys($scope.item.obj);

                for (var i = arrobj.length - 1; i >= 0; i--) {
                    if (arrobj[i] == id) {
                        if ($scope.item.obj[parseFloat(arrobj[i])] == true) {
                            $scope.skorParamater7 = $scope.skorParamater7 + parseFloat(skor);
                            break;
                        } else {
                            $scope.skorParamater7 = $scope.skorParamater7 - parseFloat(skor);
                            break;
                        }
                    }
                }
                $scope.item.obj[32116960] = $scope.skorParamater7;
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

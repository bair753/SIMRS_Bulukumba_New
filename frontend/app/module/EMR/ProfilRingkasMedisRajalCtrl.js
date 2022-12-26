define(['initialize'], function (initialize) {
    'use strict';
    initialize.controller('ProfilRingkasMedisRajalCtrl', ['$q', '$rootScope', '$scope', 'ModelItem', '$state', 'CacheHelper', 'DateHelper', 'MedifirstService',
        function ($q, $rootScope, $scope, ModelItem, $state, cacheHelper, dateHelper, medifirstService) {


            var isNotClick = true;
            $scope.noCM = $state.params.noCM;
            $scope.tombolSimpanVis = true;
            $scope.noRecPap = cacheHelper.get('noRecPap');
            $scope.totalSkor = 0;
            $scope.totalSkor2 = 0;
            $scope.item = {};
            $scope.cc = {};
            var nomorEMR = '-';
            var norecEMR = '';
            $scope.cc.emrfk = 290013;
            var dataLoad = [];
            $scope.isCetak = true;
            $scope.allDisabled = false;
            var pegawaiInputDetail  = '';
            var cacheNomorEMR = cacheHelper.get('cacheNomorEMR');
            var cacheNoREC = cacheHelper.get('cacheNOREC_EMR');
            if(cacheNoREC!= undefined){
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

            medifirstService.getPart('emr/get-datacombo-part-dokter', true, true, 20).then(function (data) {
                $scope.listDokter = data
            })

            medifirstService.getPart('emr/get-datacombo-part-pegawai', true, true, 20).then(function (data) {
                $scope.listPegawai = data
            })

            medifirstService.getPart('emr/get-datacombo-part-ruangan-pelayanan', true, true, 20).then(function (data) {
                $scope.listRuangan = data
            })

            medifirstService.getPart('emr/get-datacombo-part-kelas', true, true, 20).then(function (data) {
                $scope.listKelas = data
            })

            medifirstService.getPart("sysadmin/general/get-datacombo-icd10", true, true, 10).then(function (data) {
                $scope.listDiagnosa = data;
            });

            medifirstService.getPart("sysadmin/general/get-datacombo-icd10-secondary", true, true, 10).then(function (data) {
                $scope.listDiagnosaSecondary = data;
            });

            $scope.listDiagnosisTerapi = [
                {
                    "id": 1,
                    "dpjp": [
                        { "id": 421400, "nama": "", "caption": "1. DPJP", "type": "combobox", "dataList": "listPegawai", "satuan": ""}
                    ],
                    "tgljam": [
                        { "id": 421401, "nama": "", "caption": "Tanggal/Jam", "type": "datetime", "dataList": "", "satuan": "" }
                    ],
                    "diagnosis": [
                        { "id": 421402, "nama": "", "caption": "1", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421403, "nama": "", "caption": "2", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421404, "nama": "", "caption": "3", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421405, "nama": "", "caption": "4", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "terapi" : [
                        { "id": 421406, "nama": "", "caption": "1", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421407, "nama": "", "caption": "2", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421408, "nama": "", "caption": "3", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421409, "nama": "", "caption": "4", "type": "textbox", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 2,
                    "dpjp": [
                        { "id": 421410, "nama": "", "caption": "2. DPJP", "type": "combobox", "dataList": "listPegawai", "satuan": "" }
                    ],
                    "tgljam": [
                        { "id": 421411, "nama": "", "caption": "Tanggal/Jam", "type": "datetime", "dataList": "", "satuan": "" }
                    ],
                    "diagnosis": [
                        { "id": 421412, "nama": "", "caption": "1", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421413, "nama": "", "caption": "2", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421414, "nama": "", "caption": "3", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421415, "nama": "", "caption": "4", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "terapi": [
                        { "id": 421416, "nama": "", "caption": "1", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421417, "nama": "", "caption": "2", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421418, "nama": "", "caption": "3", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421419, "nama": "", "caption": "4", "type": "textbox", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 3,
                    "dpjp": [
                        { "id": 421420, "nama": "", "caption": "3. DPJP", "type": "combobox", "dataList": "listPegawai", "satuan": "" }
                    ],
                    "tgljam": [
                        { "id": 421421, "nama": "", "caption": "Tanggal/Jam", "type": "datetime", "dataList": "", "satuan": "" }
                    ],
                    "diagnosis": [
                        { "id": 421422, "nama": "", "caption": "1", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421423, "nama": "", "caption": "2", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421424, "nama": "", "caption": "3", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421425, "nama": "", "caption": "4", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "terapi": [
                        { "id": 421426, "nama": "", "caption": "1", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421427, "nama": "", "caption": "2", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421428, "nama": "", "caption": "3", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421429, "nama": "", "caption": "4", "type": "textbox", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 4,
                    "dpjp": [
                        { "id": 421430, "nama": "", "caption": "4. DPJP", "type": "combobox", "dataList": "listPegawai", "satuan": "" }
                    ],
                    "tgljam": [
                        { "id": 421431, "nama": "", "caption": "Tanggal/Jam", "type": "datetime", "dataList": "", "satuan": "" }
                    ],
                    "diagnosis": [
                        { "id": 421432, "nama": "", "caption": "1", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421433, "nama": "", "caption": "2", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421434, "nama": "", "caption": "3", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421435, "nama": "", "caption": "4", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "terapi": [
                        { "id": 421436, "nama": "", "caption": "1", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421437, "nama": "", "caption": "2", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421438, "nama": "", "caption": "3", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421439, "nama": "", "caption": "4", "type": "textbox", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 5,
                    "dpjp": [
                        { "id": 421440, "nama": "", "caption": "5. DPJP", "type": "combobox", "dataList": "listPegawai", "satuan": "" }
                    ],
                    "tgljam": [
                        { "id": 421441, "nama": "", "caption": "Tanggal/Jam", "type": "datetime", "dataList": "", "satuan": "" }
                    ],
                    "diagnosis": [
                        { "id": 421442, "nama": "", "caption": "1", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421443, "nama": "", "caption": "2", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421444, "nama": "", "caption": "3", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421445, "nama": "", "caption": "4", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "terapi": [
                        { "id": 421446, "nama": "", "caption": "1", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421447, "nama": "", "caption": "2", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421448, "nama": "", "caption": "3", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421449, "nama": "", "caption": "4", "type": "textbox", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listCatatan = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 421450, "nama": "", "caption": "", "type": "datetime", "dataList": "", "satuan": "" },
                        { "id": 421451, "nama": "", "caption": "", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 421452, "nama": "", "caption": "", "type": "datetime", "dataList": "", "satuan": "" },
                        { "id": 421453, "nama": "", "caption": "", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 421454, "nama": "", "caption": "", "type": "datetime", "dataList": "", "satuan": "" },
                        { "id": 421455, "nama": "", "caption": "", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 4,
                    "detail": [
                        { "id": 421456, "nama": "", "caption": "", "type": "datetime", "dataList": "", "satuan": "" },
                        { "id": 421457, "nama": "", "caption": "", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 5,
                    "detail": [
                        { "id": 421458, "nama": "", "caption": "", "type": "datetime", "dataList": "", "satuan": "" },
                        { "id": 421459, "nama": "", "caption": "", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.cetakPdf = function () {
                if (norecEMR == '') return
                var client = new HttpClient();
                client.get('http://127.0.0.1:1237/printvb/e-rekammedis?cetak-emr-asesmen-awal-medis-igd&id=' + $scope.cc.nocm + '&emr=' + norecEMR + '&view=true', function (response) {
                    // do something with response
                });
            }

            var cacheEMR_TRIASE_PRIMER = cacheHelper.get('cacheEMR_TRIASE_PRIMER');
            var cacheEMR_CTRS = cacheHelper.get('cacheEMR_CTRS');
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

            if (nomorEMR == '-') {
                $scope.item.obj = []
                var nocmfk = null;
                var noregistrasifk = $state.params.noRec;
                var status = "t";
                // medifirstService.get("emr/get-antrian-pasien-norec/" + noregistrasifk).then(function (e) {
                //     var antrianPasien = e.data.result;
                //     $scope.item.obj[421300] = new Date(moment(antrianPasien.tglregistrasi).format('YYYY-MM-DD HH:mm'));
                //     if (antrianPasien.objectruanganfk != null && antrianPasien.namaruangan != null) {
                //         $scope.item.obj[421299] = {
                //             value: antrianPasien.objectruanganfk,
                //             text: antrianPasien.namaruangan
                //         }
                //     }
                //     if (antrianPasien.iddpjp != null && antrianPasien.dokterdpjp != null) {
                //         $scope.item.obj[421371] = {
                //             value: antrianPasien.iddpjp,
                //             text: antrianPasien.dokterdpjp
                //         }
                //     }
                // })
                
                // medifirstService.get("emr/get-vital-sign?noregistrasi=" + $scope.cc.noregistrasi + "&objectidawal=4241&objectidakhir=4246&idemr=147", true).then(function (datas) {
                //     if (datas.data.data.length>0){
                //         $scope.item.obj[421302] = datas.data.data[1].value; // Tekanan Darah
                //         $scope.item.obj[421303] = datas.data.data[5].value; // Nadi
                //         $scope.item.obj[421304] = datas.data.data[4].value; // Suhu
                //         $scope.item.obj[421305] = datas.data.data[6].value; // Napas
                //     }
                // })
            } else {
                var chekedd = false
                //medifirstService.get("emr/get-emr-transaksi-detail?noemr="+$state.params.nomorEMR, true).then(function(dat){
                medifirstService.get("emr/get-rekam-medis-dynamic?emrid=" + $scope.cc.emrfk).then(function (e) {

                    for (var i = e.data.kolom2.length - 1; i >= 0; i--) {
                        if (e.data.kolom2[i].id == 4189 || e.data.kolom2[i].id == 4190 || e.data.kolom2[i].id == 4191 || e.data.kolom2[i].id == 4192)
                            e.data.kolom2.splice(i, 1)

                    }
                    $scope.listData = e.data
                    $scope.item.title = e.data.title
                    $scope.item.classgrid = e.data.classgrid

                    // $scope.cc.emrfk = 146

                    $scope.item.objcbo = []
                    for (var i = e.data.kolom1.length - 1; i >= 0; i--) {

                        if (e.data.kolom1[i].cbotable != null) {
                            medifirstService.getPart2(e.data.kolom1[i].id, e.data.kolom1[i].cbotable, true, true, 20).then(function (data) {
                                $scope.item.objcbo[data.options.idididid] = data
                            })
                        }
                        for (var ii = e.data.kolom1[i].child.length - 1; ii >= 0; ii--) {
                            if (e.data.kolom1[i].child[ii].cbotable != null) {
                                medifirstService.getPart2(e.data.kolom1[i].child[ii].id, e.data.kolom1[i].child[ii].cbotable, true, true, 20).then(function (data) {
                                    $scope.item.objcbo[data.options.idididid] = data
                                })
                            }
                        }
                    }
                    for (var i = e.data.kolom2.length - 1; i >= 0; i--) {
                        if (e.data.kolom2[i].cbotable != null) {
                            medifirstService.getPart2(e.data.kolom2[i].id, e.data.kolom2[i].cbotable, true, true, 20).then(function (data) {
                                $scope.item.objcbo[data.options.idididid] = data
                            })
                        }
                        for (var ii = e.data.kolom2[i].child.length - 1; ii >= 0; ii--) {
                            if (e.data.kolom2[i].child[ii].cbotable != null) {
                                medifirstService.getPart2(e.data.kolom2[i].child[ii].id, e.data.kolom2[i].child[ii].cbotable, true, true, 20).then(function (data) {
                                    $scope.item.objcbo[data.options.idididid] = data
                                })
                            }
                        }
                    }
                    for (var i = e.data.kolom3.length - 1; i >= 0; i--) {
                        if (e.data.kolom3[i].cbotable != null) {
                            medifirstService.getPart2(e.data.kolom3[i].id, e.data.kolom3[i].cbotable, true, true, 20).then(function (data) {
                                $scope.item.objcbo[data.options.idididid] = data
                            })
                        }
                        for (var ii = e.data.kolom3[i].child.length - 1; ii >= 0; ii--) {
                            if (e.data.kolom3[i].child[ii].cbotable != null) {
                                medifirstService.getPart2(e.data.kolom3[i].child[ii].id, e.data.kolom3[i].child[ii].cbotable, true, true, 20).then(function (data) {
                                    $scope.item.objcbo[data.options.idididid] = data
                                })
                            }
                        }
                    }
                    for (var i = e.data.kolom4.length - 1; i >= 0; i--) {
                        if (e.data.kolom4[i].cbotable != null) {
                            medifirstService.getPart2(e.data.kolom4[i].id, e.data.kolom4[i].cbotable, true, true, 20).then(function (data) {
                                $scope.item.objcbo[data.options.idididid] = data
                            })
                        }
                        for (var ii = e.data.kolom4[i].child.length - 1; ii >= 0; ii--) {
                            if (e.data.kolom4[i].child[ii].cbotable != null) {
                                medifirstService.getPart2(e.data.kolom4[i].child[ii].id, e.data.kolom4[i].child[ii].cbotable, true, true, 20).then(function (data) {
                                    $scope.item.objcbo[data.options.idididid] = data
                                })
                            }
                        }
                    }
                    if(nomorEMR!='-'){
                    cacheHelper.set('cacheEMR_igd', nomorEMR)
                }
                    
                    medifirstService.get("emr/get-emr-transaksi-detail?noemr=" + nomorEMR + "&emrfk=" + $scope.cc.emrfk, true).then(function (dat) {
                        $scope.item.obj = []
                        $scope.item.obj2 = []
                        if (cacheEMR_CTRS != undefined) {

                            // SET DARI SKOR CTRS
                            medifirstService.get("emr/get-emr-transaksi-detail?noemr=" + cacheEMR_CTRS + "&emrfk=" + $scope.cc.emrfk, true).then(function (datss) {
                                var dataNA = datss.data.data
                                var skorsss = 0
                                for (var i = 0; i <= dataNA.length - 1; i++) {
                                    if (dataNA[i].type == "checkbox" && dataNA[i].value == '1') {
                                        if (dataNA[i].reportdisplay != null) {
                                            skorsss = skorsss + parseFloat(dataNA[i].reportdisplay)
                                        }

                                    }

                                }
                                $scope.item.obj[4189] = skorsss
                                if (skorsss <= 10) {
                                    $scope.item.obj[4190] = true
                                }
                                if (skorsss > 10) {
                                    $scope.item.obj[4191] = true
                                }

                                   // *** disable Input *//
                                    setTimeout(function(){medifirstService.setDisableAllInputElement()  }, 3000);
                                    // *** disable Input *//

                            })
                        }
                        dataLoad = dat.data.data
                        medifirstService.get("emr/get-vital-sign?noregistrasi=" + $scope.cc.noregistrasi + "&objectidawal=4241&objectidakhir=4246&idemr=147", true).then(function (datas) {
                        if (datas.data.data.length>0){
                            // $scope.item.obj[4228]=datas.data.data[0].value
                            // $scope.item.obj[4229]=datas.data.data[3].value
                            // $scope.item.obj[4230]=datas.data.data[4].value
                            // $scope.item.obj[4231]=datas.data.data[5].value

                        }
                    })
                        
                        for (var i = 0; i <= dataLoad.length - 1; i++) {
                            if (parseFloat($scope.cc.emrfk) == dataLoad[i].emrfk) {

                                if (dataLoad[i].type == "textbox") {
                                    $scope.item.obj[dataLoad[i].emrdfk] = dataLoad[i].value
                                }
                                if (dataLoad[i].type == "checkbox") {
                                    chekedd = false
                                    if (dataLoad[i].value == '1') {
                                        chekedd = true
                                    }
                                    $scope.item.obj[dataLoad[i].emrdfk] = chekedd
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
                                pegawaiInputDetail = dataLoad[i].pegawaifk
                            }

                        }
                        // *** disable Input *//
                        //setTimeout(function(){medifirstService.setDisableAllInputElement()  }, 2000);
                        // *** disable Input *//

                        //  if( $scope.cc.norec_emr !='-' && pegawaiInputDetail !='' && pegawaiInputDetail !=null){
                        //     if(pegawaiInputDetail != medifirstService.getPegawaiLogin().id){
                        //         $scope.allDisabled =true
                        //         toastr.warning('Hanya Bisa melihat data','Peringatan')
                        //         return
                        //     }
                        // }

                    
                   
                    
                    })
                })
            }

            $scope.kembali = function () {
                $rootScope.showRiwayat()
            }
              
            $scope.Save = function () {

                
                var arrobj = Object.keys($scope.item.obj)
                var arrSave = []
                for (var i = arrobj.length - 1; i >= 0; i--) {
                    if ($scope.item.obj[parseInt(arrobj[i])] instanceof Date)
                        $scope.item.obj[parseInt(arrobj[i])] = moment($scope.item.obj[parseInt(arrobj[i])]).format('YYYY-MM-DD HH:mm')
                     // $scope.item.obj[parseInt(arrobj[i])] = moment($scope.item.obj[parseInt(arrobj[i])]).format('HH:mm')
                    arrSave.push({ id: arrobj[i], values: $scope.item.obj[parseInt(arrobj[i])] })
                }
                $scope.cc.jenisemr = 'asesmen'

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
                        'Asesmen Medis Gawat Darurat ' + ' dengan No EMR - ' + e.data.data.noemr + ' pada No Registrasi '
                        + $scope.cc.noregistrasi).then(function (res) {
                        })

                    $rootScope.loadRiwayat()
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

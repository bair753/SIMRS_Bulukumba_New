define(['initialize'], function (initialize) {
    'use strict';
    initialize.controller('PerawatanAsfiksiaCtrl', ['$q', '$rootScope', '$scope', 'ModelItem', '$state', 'CacheHelper', 'DateHelper', 'MedifirstService',
        function ($q, $rootScope, $scope, ModelItem, $state, cacheHelper, dateHelper, medifirstService) {

            var paramsIndex = $state.params.index ? parseInt($state.params.index) : null
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
            $scope.cc.emrfk = 290122;
            var dataLoad = [];
            $scope.isCetak = false;
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
                $scope.item.obj[31103133] = $scope.now; //bulukumba. tgl dan jam
                medifirstService.get("emr/get-antrian-pasien-norec/" + noregistrasifk).then(function (e) {
                    var antrianPasien = e.data.result;
                    $scope.item.obj[31103129] = $scope.cc.namapasien;
                    $scope.item.obj[31103130] = new Date(moment(antrianPasien.tgllahir).format('YYYY-MM-DD'));
                    $scope.item.obj[31103131] = antrianPasien.jeniskelamin;
                    $scope.item.obj[31103132] = antrianPasien.alamatlengkap;
                    if (antrianPasien.dokterdpjp != null && antrianPasien.iddpjp != null) {
                        $scope.item.obj[31103135] = {
                            value: antrianPasien.iddpjp,
                            text: antrianPasien.dokterdpjp
                        }
                    }
                    // if (antrianPasien.namaruangan != null && antrianPasien.objectruanganfk != null) {
                    //     $scope.item.obj[427954] = {
                    //         value: antrianPasien.objectruanganfk,
                    //         text: antrianPasien.namaruangan
                    //     }
                    // }
                })
                
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
                                }
                                if (dataLoad[i].type == "radio") {
                                    $scope.item.obj[dataLoad[i].emrdfk] = dataLoad[i].value
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

                        var arrobj = Object.keys($scope.item.obj)
                        for (let l = 0; l < $scope.listItem.length; l++) {
                            const element = $scope.listItem[l];
                            for (let m = 0; m < arrobj.length; m++) {
                                const element2 = arrobj[m];
                                if (element.id == element2) {
                                    element.inuse = true
                                }
                            }

                        } 
                    
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
                        'Penolakan Operasi / Prosedur Invasif ' + ' dengan No EMR - ' + e.data.data.noemr + ' pada No Registrasi '
                        + $scope.cc.noregistrasi).then(function (res) {
                        })

                    $rootScope.loadRiwayat()
                    var arrStr = {
                        0: e.data.data.noemr
                    }
                    cacheHelper.set('cacheNomorEMR', arrStr);
                });
            }

            $scope.listPemberiPerawatan = [
                {
                    "id": 1,
                    "jenisinfo": "Primi tua",
                    "detail": [
                        { "id": 31103453, "caption": "", "type": "checkbox" },
                        { "id": 31103454, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "jenisinfo": "Perdarahan pada trimester 2 atau 3",
                    "detail": [
                        { "id": 31103455, "caption": "", "type": "checkbox" },
                        { "id": 31103456, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "jenisinfo": "Hipertensi pada kehamilan",
                    "detail": [
                        { "id": 31103457, "caption": "", "type": "checkbox" },
                        { "id": 31103458, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 4,
                    "jenisinfo": "Konsumsi obat-obatan",
                    "detail": [
                        { "id": 31103459, "caption": "", "type": "checkbox" },
                        { "id": 31103460, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 5,
                    "jenisinfo": "Diabetes melitus",
                    "detail": [
                        { "id": 31103461, "caption": "", "type": "checkbox" },
                        { "id": 31103462, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 6,
                    "jenisinfo": "Penyakit kronis pada ibu (TB, penyakit jantung, hipertensi kronis))",
                    "detail": [
                        { "id": 31103463, "caption": "", "type": "checkbox" },
                        { "id": 31103464, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 7,
                    "jenisinfo": "Kehamilan grande multipara",
                    "detail": [
                        { "id": 31103465, "caption": "", "type": "checkbox" },
                        { "id": 31103466, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 8,
                    "jenisinfo": "Korioamnionitis (bila ada 1-2 gejala klinis seperti berikut, seperti KPD > 18 jam, lekosit > 15.000/mm3, CRP > 9, ibu ada riwayat demam suhu > 38 oC)",
                    "detail": [
                        { "id": 31103467, "caption": "", "type": "checkbox" },
                        { "id": 31103468, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 9,
                    "jenisinfo": "Riwayat kematian janin sebelumnya",
                    "detail": [
                        { "id": 31103469, "caption": "", "type": "checkbox" },
                        { "id": 31103470, "caption": "", "type": "checkbox" }
                    ]
                },
              
             
            ];

            $scope.listPemberiPerawatan2 = [
                {
                    "id": 1,
                    "jenisinfo": "Pola denyut jantung meragukan pada kardiotokografi",
                    "detail": [
                        { "id": 31103471, "caption": "", "type": "checkbox" },
                        { "id": 31103472, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "jenisinfo": "Presentasi abnormal",
                    "detail": [
                        { "id": 31103473, "caption": "", "type": "checkbox" },
                        { "id": 31103474, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "jenisinfo": "Prolaps tali pusat",
                    "detail": [
                        { "id": 31103475, "caption": "", "type": "checkbox" },
                        { "id": 31103476, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 4,
                    "jenisinfo": "Perdarahan antepartum",
                    "detail": [
                        { "id": 31103477, "caption": "", "type": "checkbox" },
                        { "id": 31103478, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 5,
                    "jenisinfo": "Kelahiran forsep",
                    "detail": [
                        { "id": 31103479, "caption": "", "type": "checkbox" },
                        { "id": 31103480, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 6,
                    "jenisinfo": "Kelahiran vakum",
                    "detail": [
                        { "id": 31103481, "caption": "", "type": "checkbox" },
                        { "id": 31103482, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 7,
                    "jenisinfo": "Penerapan anestesi umum pada ibu",
                    "detail": [
                        { "id": 31103483, "caption": "", "type": "checkbox" },
                        { "id": 31103484, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 8,
                    "jenisinfo": "Seksio sesaria emergensi",
                    "detail": [
                        { "id": 31103485, "caption": "", "type": "checkbox" },
                        { "id": 31103486, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 9,
                    "jenisinfo": "Kala 2 memanjang",
                    "detail": [
                        { "id": 31103487, "caption": "", "type": "checkbox" },
                        { "id": 31103488, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 10,
                    "jenisinfo": "Ketuban bercampur mekonium",
                    "detail": [
                        { "id": 31103489, "caption": "", "type": "checkbox" },
                        { "id": 31103490, "caption": "", "type": "checkbox" }
                    ]
                }

            ];

            $scope.listPemberiPerawatan3 = [
                {
                    "id": 1,
                    "jenisinfo": "Skor APGAR menit ke-5 adalah < 5",
                    "detail": [
                        { "id": 31103491, "caption": "", "type": "checkbox" },
                        { "id": 31103492, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "jenisinfo": "Menilai skor asfiksia dengan skor Thompson (skor terlampir)",
                    "detail": [
                        { "id": 31103493, "caption": "", "type": "checkbox" },
                        { "id": 31103494, "caption": "", "type": "checkbox" }
                    ]
                }


            ];

            $scope.listPemberiPerawatan4 = [
                {
                    "id": 1,
                    "jenisinfo": "Pemeriksaan darah lengkap, IT ratio",
                    "detail": [
                        { "id": 31103495, "caption": "", "type": "checkbox" },
                        { "id": 31103496, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "jenisinfo": "Glukosa darah",
                    "detail": [
                        { "id": 31103497, "caption": "", "type": "checkbox" },
                        { "id": 31103498, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "jenisinfo": "Marker infeksi (CRP, procalcitonin)",
                    "detail": [
                        { "id": 31103499, "caption": "", "type": "checkbox" },
                        { "id": 31103500, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 4,
                    "jenisinfo": "Analisa gas darah",
                    "detail": [
                        { "id": 31103501, "caption": "", "type": "checkbox" },
                        { "id": 31103502, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 5,
                    "jenisinfo": "Elektrolit",
                    "detail": [
                        { "id": 31103503, "caption": "", "type": "checkbox" },
                        { "id": 31103504, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 6,
                    "jenisinfo": "Fungsi ginjal (Ureum, creatinin)",
                    "detail": [
                        { "id": 31103505, "caption": "", "type": "checkbox" },
                        { "id": 31103506, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 7,
                    "jenisinfo": "Fungsi hepar (SGOT, SGPT, Laktat)",
                    "detail": [
                        { "id": 31103507, "caption": "", "type": "checkbox" },
                        { "id": 31103508, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 8,
                    "jenisinfo": "Diagnosis asfiksia dengan HIE berdasarkan kriteria: a. Bukti asidosis metabolik atau campuran pH <7.0 pada pemeriksaan darah talit pusat, atau defisit basa 16 mmol/L dalam 60 menit pertama,    b. Nilai agar <6 pada menit ke 10,    c. Manifestasi neurologis (seperti kejang, hipotonia, atau koma),    d. Disfungsi multiorgan (seperti gangguan kardiovaskular, gastrointestinal, hematologi, respirasi, atau renal)",
                    "detail": [
                        { "id": 31103509, "caption": "", "type": "checkbox" },
                        { "id": 31103510, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 9,
                    "jenisinfo": "HIE ditegakkan bila didapatkan minimal 2 kriteria pada fasilitas lengkap, dan minimal 1 pada fasilitas terbatas",
                    "detail": [
                        { "id": 31103511, "caption": "", "type": "checkbox" },
                        { "id": 31103512, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 10,
                    "jenisinfo": "Mempertahankan fungsi pernafasan tetap baik dan SaO2 stabil 90-94% disertai hasil AGD yang baik",
                    "detail": [
                        { "id": 31103513, "caption": "", "type": "checkbox" },
                        { "id": 31103514, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 11,
                    "jenisinfo": "Mempertahankan fungsi pernafasan tetap baik dan SaO2 stabil 90-94% , tanpa disertai pemeriksaan AGD karena keterbatasan alat AGD",
                    "detail": [
                        { "id": 31103515, "caption": "", "type": "checkbox" },
                        { "id": 31103516, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 12,
                    "jenisinfo": "Memantau dan mempertahankan suhu tubuh 35-36,5 oC",
                    "detail": [
                        { "id": 31103517, "caption": "", "type": "checkbox" },
                        { "id": 31103518, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 13,
                    "jenisinfo": "Koreksi dan mempertahankan elektrolit dan glukosa",
                    "detail": [
                        { "id": 31103519, "caption": "", "type": "checkbox" },
                        { "id": 31103520, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 14,
                    "jenisinfo": "Koreksi hipovolemia",
                    "detail": [
                        { "id": 31103521, "caption": "", "type": "checkbox" },
                        { "id": 31103522, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 15,
                    "jenisinfo": "Saat merujuk dipertahankan suhu 34°C–35°C (inkubator tidak dinyalakan dan tidak dipeluk ibu (KMC)",
                    "detail": [
                        { "id": 31103523, "caption": "", "type": "checkbox" },
                        { "id": 31103524, "caption": "", "type": "checkbox" }
                    ]
                }
               
            ];

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

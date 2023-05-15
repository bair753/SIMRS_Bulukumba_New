define(['initialize', 'Configuration'], function (initialize, config) {
    'use strict';
    initialize.controller('LembarTriaseGawatDaruratAnakDanNeonatusCtrl', ['$q', '$rootScope', '$scope', 'ModelItem', '$state', 'CacheHelper', 'DateHelper', 'MedifirstService',
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
            $scope.cc.emrfk = 290006;
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

            $scope.listKeluhan = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420445, "nama": "", "caption": "Keluhan Utama", "type": "textarea", "dataList": "" },
                        { "id": 420446, "nama": "", "caption": "Riwayat Alergi", "type": "textarea", "dataList": "" },
                        { "id": 420447, "nama": "", "caption": "Tanggal/Pukul", "type": "datetime", "dataList": "" },
                        { "id": 420448, "nama": "", "caption": "Tekanan Darah", "type": "textbox", "dataList": "" },
                        { "id": 420449, "nama": "", "caption": "Nadi", "type": "textbox", "dataList": "" },
                        { "id": 420450, "nama": "", "caption": "Suhu", "type": "textbox", "dataList": "" },
                        { "id": 420451, "nama": "", "caption": "Saturasi Oksigen", "type": "textbox", "dataList": "" },
                        { "id": 420452, "nama": "", "caption": "Nafas", "type": "textbox", "dataList": "" },
                        { "id": 420453, "nama": "", "caption": "GCS", "type": "textbox", "dataList": "" }
                    ]
                }
            ];

            $scope.listATS1K1 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420454, "nama": "Obstruksi Total", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420455, "nama": "Henti Napas", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420456, "nama": "RR < 10", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420457, "nama": "Henti Jantung", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420458, "nama": "TD < 80", "caption": "", "type": "checkbox", "dataList": "" }
                    ]
                }
            ];

            $scope.listATS2K1 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420459, "nama": "Obstruksi Parsial", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420460, "nama": "Distress Napas Berat", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420461, "nama": "Gangguan Hemodinamik Berat", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420462, "nama": "HR < 60 atau > 150", "caption": "", "type": "checkbox", "dataList": "" }
                    ]
                }
            ];

            $scope.listATS3K1 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420463, "nama": "Paten", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420464, "nama": "Distress Napas Sedang", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420465, "nama": "Gangguan Hemodinamik Sedang-ringan", "caption": "", "type": "checkbox", "dataList": "" }
                    ]
                }
            ];

            $scope.listATS4K1 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420466, "nama": "Paten", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420467, "nama": "Tidak Ada Distress Napas", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420468, "nama": "Hemodinamik Stabil", "caption": "", "type": "checkbox", "dataList": "" }
                    ]
                }
            ];

            $scope.listATS5K1 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420469, "nama": "Paten", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420470, "nama": "Tidak Ada Distress Napas", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420471, "nama": "Hemodinamik Stabil", "caption": "", "type": "checkbox", "dataList": "" }
                    ]
                }
            ];

            $scope.listATS1K2 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420472, "nama": "< 9", "caption": "", "type": "checkbox", "dataList": "" }
                    ]
                }
            ];

            $scope.listATS2K2 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420473, "nama": "9 - 12", "caption": "", "type": "checkbox", "dataList": "" }
                    ]
                }
            ];

            $scope.listATS3K2 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420474, "nama": "13 - 15", "caption": "", "type": "checkbox", "dataList": "" }
                    ]
                }
            ];

            $scope.listATS4K2 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420475, "nama": "15", "caption": "", "type": "checkbox", "dataList": "" }
                    ]
                }
            ];

            $scope.listATS5K2 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420476, "nama": "15", "caption": "", "type": "checkbox", "dataList": "" }
                    ]
                }
            ];

            $scope.listATS2K3 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420477, "nama": "Nyeri Berat", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420478, "nama": "Hipotermia", "caption": "", "type": "checkbox", "dataList": "" }
                    ]
                }
            ];

            $scope.listATS3K3 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420479, "nama": "Nyeri Sedang", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420480, "nama": "Tidak Kooperatif", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420481, "nama": "Iritabel, Sulit Menyusui", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420482, "nama": "Pucat", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420483, "nama": "Kelainan Kongenital Mayor", "caption": "", "type": "checkbox", "dataList": "" }
                    ]
                }
            ];

            $scope.listATS4K3 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420484, "nama": "Nyeri Ringan", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420485, "nama": "Kooperatif", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420486, "nama": "BBLR", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420487, "nama": "Ikterik Kraemer > 3, Ikterik Dalam 24 Jam Pertama, Ikterik Bertahan > 14 Hari", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420488, "nama": "Perdarahan", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420489, "nama": "Trauma Lahir Minor", "caption": "", "type": "checkbox", "dataList": "" }
                    ]
                }
            ];

            $scope.listATS5K3 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420490, "nama": "Kooperatif", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420491, "nama": "Ikterik", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420492, "nama": "Infeksi Superfisia", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420493, "nama": "Malformasi Minor", "caption": "", "type": "checkbox", "dataList": "" }
                    ]
                }
            ];

            $scope.listTabelKeterangan = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420494, "nama": "", "caption": "", "type": "textarea", "dataList": "" },
                        { "id": 420495, "nama": "", "caption": "SKALA 1", "type": "label", "dataList": "" },
                        { "id": 420496, "nama": "", "caption": "Segera", "type": "label", "dataList": "" },
                        { "id": 420497, "nama": "", "caption": "Resusitasi", "type": "label", "dataList": "" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 420498, "nama": "", "caption": "", "type": "textarea", "dataList": "" },
                        { "id": 420499, "nama": "", "caption": "SKALA 2", "type": "label", "dataList": "" },
                        { "id": 420500, "nama": "", "caption": "10 Menit", "type": "label", "dataList": "" },
                        { "id": 420501, "nama": "", "caption": "Emergency/Gawat Darurat", "type": "label", "dataList": "" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 420502, "nama": "", "caption": "", "type": "textarea", "dataList": "" },
                        { "id": 420503, "nama": "", "caption": "SKALA 3", "type": "label", "dataList": "" },
                        { "id": 420504, "nama": "", "caption": "30 Menit", "type": "label", "dataList": "" },
                        { "id": 420505, "nama": "", "caption": "Urgent/Darurat", "type": "label", "dataList": "" }
                    ]
                },
                {
                    "id": 4,
                    "detail": [
                        { "id": 420506, "nama": "", "caption": "", "type": "textarea", "dataList": "" },
                        { "id": 420507, "nama": "", "caption": "SKALA 4", "type": "label", "dataList": "" },
                        { "id": 420508, "nama": "", "caption": "60 Menit", "type": "label", "dataList": "" },
                        { "id": 420509, "nama": "", "caption": "Semi Darurat", "type": "label", "dataList": "" }
                    ]
                },
                {
                    "id": 5,
                    "detail": [
                        { "id": 420510, "nama": "", "caption": "", "type": "textarea", "dataList": "" },
                        { "id": 420511, "nama": "", "caption": "SKALA 5", "type": "label", "dataList": "" },
                        { "id": 420512, "nama": "", "caption": "120 Menit", "type": "label", "dataList": "" },
                        { "id": 420513, "nama": "", "caption": "Tidak Darurat", "type": "label", "dataList": "" }
                    ]
                }
            ];

            $scope.cetakPdf = function () {
                if($scope.item.obj[420445] == undefined){
                    toastr.warning('Keluhan Utama tidak boleh kosong','Peringatan')
                    return
                }

                if($scope.item.obj[420446] == undefined){
                    toastr.warning('Riwayat Alergi tidak boleh kosong','Peringatan')
                    return
                }
                if (norecEMR == '') return
                var local = JSON.parse(localStorage.getItem('profile'));
                var nama = medifirstService.getPegawaiLogin().namalengkap;
                window.open(config.baseApiBackend + 'report/cetak-lembar-triase-anak?nocm='
                    + $scope.cc.nocm + '&norec_apd=' + $scope.cc.norec + '&emr=' + norecEMR
                    + '&emrfk=' + $scope.cc.emrfk
                    + '&kdprofile=' + local.id
                    + '&nama=' + nama, '_blank');
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
                medifirstService.get("emr/get-antrian-pasien-norec/" + noregistrasifk).then(function (e) {
                    var antrianPasien = e.data.result;
                    // $scope.item.obj[420394] = new Date(moment(antrianPasien.tglregistrasi).format('YYYY-MM-DD HH:mm'));
                    // if (antrianPasien.objectruanganfk != null && antrianPasien.namaruangan) {
                    //     $scope.item.obj[420395] = {
                    //         value: antrianPasien.objectruanganfk,
                    //         text: antrianPasien.namaruangan
                    //     }
                    // }
                    // if (antrianPasien.objectkelasfk != null && antrianPasien.namakelas) {
                    //     $scope.item.obj[420396] = {
                    //         value: antrianPasien.objectkelasfk,
                    //         text: antrianPasien.namakelas
                    //     }
                    // }
                    // $scope.item.obj[420397] = antrianPasien.nocm;
                    // $scope.item.obj[420398] = antrianPasien.namapasien;
                    // $scope.item.obj[420399] = new Date(moment(antrianPasien.tgllahir).format('YYYY-MM-DD'));
                    $scope.item.obj[420447] = $scope.now;
                })
                
                medifirstService.get("emr/get-vital-sign?noregistrasi=" + $scope.cc.noregistrasi + "&objectidawal=4241&objectidakhir=4246&idemr=147", true).then(function (datas) {
                    if (datas.data.data.length>0){
                        //$scope.item.obj[420448] = datas.data.data[1].value; // Tekanan Darah
                        //$scope.item.obj[420449] = datas.data.data[5].value; // Nadi
                        //$scope.item.obj[420450] = datas.data.data[4].value; // Suhu
                        //$scope.item.obj[420452] = datas.data.data[6].value; // Napas
                    }
                })
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
                    if (cacheEMR_TRIASE_PRIMER != undefined) {
                        medifirstService.get("emr/get-emr-transaksi-detail?noemr=" + cacheEMR_TRIASE_PRIMER + "&emrfk=" + $scope.cc.emrfk, true).then(function (dat) {
                            var dataNA = dat.data.data
                            for (var i = 0; i <= dataNA.length - 1; i++) {
                                if (dataNA[i].emrdfk == '9044') {
                                    if (dataNA[i].value == '1') {
                                        $scope.activeTriaseStatus = 'merah'
                                    }
                                }
                                if (dataNA[i].emrdfk == '9050') {
                                    if (dataNA[i].value == '1') {
                                        $scope.activeTriaseStatus = 'kuning'
                                    }
                                }
                                if (dataNA[i].emrdfk == '9052') {
                                    if (dataNA[i].value == '1') {
                                        $scope.activeTriaseStatus = 'hijau'
                                    }
                                }
                                if (dataNA[i].emrdfk == '9055') {
                                    if (dataNA[i].value == '1') {
                                        $scope.activeTriaseStatus = 'hitam'
                                    }
                                }

                            }

                        })
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

define(['initialize'], function (initialize) {
    'use strict';
    initialize.controller('AsesmenKeperawatanPasienTerminalCtrl', ['$q', '$rootScope', '$scope', 'ModelItem', '$state', 'CacheHelper', 'DateHelper', 'MedifirstService',
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
            $scope.cc.emrfk = 290053;
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
                $scope.item.obj[429745] = $scope.now;
                medifirstService.get("emr/get-antrian-pasien-norec/" + noregistrasifk).then(function (e) {
                    var antrianPasien = e.data.result;
                    $scope.item.obj[429510] = new Date(moment(antrianPasien.tglregistrasi).format('YYYY-MM-DD HH:mm'));
                    if (antrianPasien.objectruanganfk != null && antrianPasien.namaruangan != null) {
                        $scope.item.obj[429511] = {
                            value: antrianPasien.objectruanganfk,
                            text: antrianPasien.namaruangan
                        }
                    }
                    if (antrianPasien.iddpjp != null && antrianPasien.dokterdpjp != null) {
                        $scope.item.obj[429747] = {
                            value: antrianPasien.iddpjp,
                            text: antrianPasien.dokterdpjp
                        }
                    }
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
                        'Asesmen Medis Keperawatan Pasien Terminal (Akhir Kehidupan) ' + ' dengan No EMR - ' + e.data.data.noemr + ' pada No Registrasi '
                        + $scope.cc.noregistrasi).then(function (res) {
                        })

                    $rootScope.loadRiwayat()
                    var arrStr = {
                        0: e.data.data.noemr
                    }
                    cacheHelper.set('cacheNomorEMR', arrStr);
                });
            }

            $scope.listAsesmen = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 429510, "caption": "Tanggal Masuk RS", "nama": "", "type": "datetime" },
                        { "id": 429511, "caption": "Ruangan", "nama": "", "type": "combobox" },
                        { "id": 429512, "caption": "Agama", "nama": "", "type": "label" },
                        { "id": 429513, "caption": "", "nama": "Islam", "type": "checkbox" },
                        { "id": 429514, "caption": "", "nama": "Kristen Katolik", "type": "checkbox" },
                        { "id": 429515, "caption": "", "nama": "Kristen Protestan", "type": "checkbox" },
                        { "id": 429516, "caption": "", "nama": "Hindu", "type": "checkbox" },
                        { "id": 429517, "caption": "", "nama": "Budha", "type": "checkbox" },
                        { "id": 429518, "caption": "", "nama": "Khonghucu", "type": "checkbox" },
                        { "id": 429519, "caption": "", "nama": "Kepercayaan Terhadap Tuhan Yang Maha Esa", "type": "checkbox" },
                        { "id": 429520, "caption": "Yang Merawat", "nama": "", "type": "label" },
                        { "id": 429521, "caption": "", "nama": "Suami/istri", "type": "checkbox" },
                        { "id": 429522, "caption": "", "nama": "Anak", "type": "checkbox" },
                        { "id": 429523, "caption": "", "nama": "Tidak ada", "type": "checkbox" },
                        { "id": 429524, "caption": "Status", "nama": "", "type": "label" },
                        { "id": 429525, "caption": "", "nama": "Belum menikah", "type": "checkbox" },
                        { "id": 429526, "caption": "", "nama": "Sudah menikah", "type": "checkbox" },
                        { "id": 429527, "caption": "", "nama": "Cerai", "type": "checkbox" },
                        { "id": 429528, "caption": "Tanggal/Jam", "nama": "", "type": "datetime" },
                        { "id": 429529, "caption": "Nama Lengkap Keluarga", "nama": "", "type": "textbox" }
                    ]
                }
            ];

            $scope.listGeneral = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 429546, "caption": "Lelah", "type": "label" },
                        { "id": 429547, "caption": "", "type": "checkbox" },
                        { "id": 429548, "caption": "", "type": "checkbox" },
                        { "id": 429549, "caption": "", "type": "textarea" },
                        { "id": 429550, "caption": "Sesak Nafas", "type": "label" },
                        { "id": 429551, "caption": "", "type": "checkbox" },
                        { "id": 429552, "caption": "", "type": "checkbox" },
                        { "id": 429553, "caption": "", "type": "textarea" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 429554, "caption": "Gangguan Tidur", "type": "label" },
                        { "id": 429555, "caption": "", "type": "checkbox" },
                        { "id": 429556, "caption": "", "type": "checkbox" },
                        { "id": 429557, "caption": "", "type": "textarea" },
                        { "id": 429558, "caption": "Batuk", "type": "label" },
                        { "id": 429559, "caption": "", "type": "checkbox" },
                        { "id": 429560, "caption": "", "type": "checkbox" },
                        { "id": 429561, "caption": "", "type": "textarea" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 429562, "caption": "Postur dan pola", "type": "label" },
                        { "id": 429563, "caption": "", "type": "checkbox" },
                        { "id": 429564, "caption": "", "type": "checkbox" },
                        { "id": 429565, "caption": "", "type": "textarea" },
                        { "id": 429566, "caption": "Sputum", "type": "label" },
                        { "id": 429567, "caption": "", "type": "checkbox" },
                        { "id": 429568, "caption": "", "type": "checkbox" },
                        { "id": 429569, "caption": "", "type": "textarea" }
                    ]
                },
                {
                    "id": 4,
                    "detail": [
                        { "id": 429570, "caption": "Jalan", "type": "label" },
                        { "id": 429571, "caption": "", "type": "checkbox" },
                        { "id": 429572, "caption": "", "type": "checkbox" },
                        { "id": 429573, "caption": "", "type": "textarea" },
                        { "id": 429574, "caption": "Hemoptisis", "type": "label" },
                        { "id": 429575, "caption": "", "type": "checkbox" },
                        { "id": 429576, "caption": "", "type": "checkbox" },
                        { "id": 429577, "caption": "", "type": "textarea" }
                    ]
                }
            ];

            $scope.listSaluranCerna = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 429578, "caption": "Nafsu Makan", "type": "label" },
                        { "id": 429579, "caption": "", "type": "checkbox" },
                        { "id": 429580, "caption": "", "type": "checkbox" },
                        { "id": 429581, "caption": "", "type": "textarea" },
                        { "id": 429582, "caption": "Sekit Kepala", "type": "label" },
                        { "id": 429583, "caption": "", "type": "checkbox" },
                        { "id": 429584, "caption": "", "type": "checkbox" },
                        { "id": 429585, "caption": "", "type": "textarea" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 429586, "caption": "Gangguan Oral", "type": "label" },
                        { "id": 429587, "caption": "", "type": "checkbox" },
                        { "id": 429588, "caption": "", "type": "checkbox" },
                        { "id": 429589, "caption": "", "type": "textarea" },
                        { "id": 429590, "caption": "Pusing", "type": "label" },
                        { "id": 429591, "caption": "", "type": "checkbox" },
                        { "id": 429592, "caption": "", "type": "checkbox" },
                        { "id": 429593, "caption": "", "type": "textarea" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 429594, "caption": "Penurunan BB", "type": "label" },
                        { "id": 429595, "caption": "", "type": "checkbox" },
                        { "id": 429596, "caption": "", "type": "checkbox" },
                        { "id": 429597, "caption": "", "type": "textarea" },
                        { "id": 429598, "caption": "Pingsan", "type": "label" },
                        { "id": 429599, "caption": "", "type": "checkbox" },
                        { "id": 429600, "caption": "", "type": "checkbox" },
                        { "id": 429601, "caption": "", "type": "textarea" }
                    ]
                },
                {
                    "id": 4,
                    "detail": [
                        { "id": 429602, "caption": "Disfagia", "type": "label" },
                        { "id": 429603, "caption": "", "type": "checkbox" },
                        { "id": 429604, "caption": "", "type": "checkbox" },
                        { "id": 429605, "caption": "", "type": "textarea" },
                        { "id": 429606, "caption": "Kelemahan Tungkai", "type": "label" },
                        { "id": 429607, "caption": "", "type": "checkbox" },
                        { "id": 429608, "caption": "", "type": "checkbox" },
                        { "id": 429609, "caption": "", "type": "textarea" }
                    ]
                },
                {
                    "id": 5,
                    "detail": [
                        { "id": 429610, "caption": "Mual", "type": "label" },
                        { "id": 429611, "caption": "", "type": "checkbox" },
                        { "id": 429612, "caption": "", "type": "checkbox" },
                        { "id": 429613, "caption": "", "type": "textarea" },
                        { "id": 429614, "caption": "Penurunan Kesadaran", "type": "label" },
                        { "id": 429615, "caption": "", "type": "checkbox" },
                        { "id": 429616, "caption": "", "type": "checkbox" },
                        { "id": 429617, "caption": "", "type": "textarea" }
                    ]
                },
                {
                    "id": 6,
                    "detail": [
                        { "id": 429618, "caption": "Muntah", "type": "label" },
                        { "id": 429619, "caption": "", "type": "checkbox" },
                        { "id": 429620, "caption": "", "type": "checkbox" },
                        { "id": 429621, "caption": "", "type": "textarea" },
                        { "id": 429622, "caption": "Kebingungan", "type": "label" },
                        { "id": 429623, "caption": "", "type": "checkbox" },
                        { "id": 429624, "caption": "", "type": "checkbox" },
                        { "id": 429625, "caption": "", "type": "textarea" }
                    ]
                },
                {
                    "id": 7,
                    "detail": [
                        { "id": 429626, "caption": "Konstipas", "type": "label" },
                        { "id": 429627, "caption": "", "type": "checkbox" },
                        { "id": 429628, "caption": "", "type": "checkbox" },
                        { "id": 429629, "caption": "", "type": "textarea" },
                        { "id": 429630, "caption": "Hilang Memori", "type": "label" },
                        { "id": 429631, "caption": "", "type": "checkbox" },
                        { "id": 429632, "caption": "", "type": "checkbox" },
                        { "id": 429633, "caption": "", "type": "textarea" }
                    ]
                },
                {
                    "id": 8,
                    "detail": [
                        { "id": 429634, "caption": "Diare", "type": "label" },
                        { "id": 429635, "caption": "", "type": "checkbox" },
                        { "id": 429636, "caption": "", "type": "checkbox" },
                        { "id": 429637, "caption": "", "type": "textarea" },
                        { "id": 429638, "caption": "Halusinasi", "type": "label" },
                        { "id": 429639, "caption": "", "type": "checkbox" },
                        { "id": 429640, "caption": "", "type": "checkbox" },
                        { "id": 429641, "caption": "", "type": "textarea" }
                    ]
                },
                {
                    "id": 9,
                    "detail": [
                        { "id": 429642, "caption": "Hematemesis", "type": "label" },
                        { "id": 429643, "caption": "", "type": "checkbox" },
                        { "id": 429644, "caption": "", "type": "checkbox" },
                        { "id": 429645, "caption": "", "type": "textarea" },
                        { "id": 429646, "caption": "Mimpi Buruk", "type": "label" },
                        { "id": 429647, "caption": "", "type": "checkbox" },
                        { "id": 429648, "caption": "", "type": "checkbox" },
                        { "id": 429649, "caption": "", "type": "textarea" }
                    ]
                },
                {
                    "id": 9,
                    "detail": [
                        { "id": 429650, "caption": "Melena", "type": "label" },
                        { "id": 429651, "caption": "", "type": "checkbox" },
                        { "id": 429652, "caption": "", "type": "checkbox" },
                        { "id": 429653, "caption": "", "type": "textarea" },
                        { "id": 429654, "caption": "", "type": "label" },
                        { "id": 429655, "caption": "", "type": "label" },
                        { "id": 429656, "caption": "", "type": "label" },
                        { "id": 429657, "caption": "", "type": "label" }
                    ]
                }
            ];

            $scope.listSaluranKemih = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 429658, "caption": "Gangguan Kemih", "type": "label" },
                        { "id": 429659, "caption": "", "type": "checkbox" },
                        { "id": 429660, "caption": "", "type": "checkbox" },
                        { "id": 429661, "caption": "", "type": "textarea" },
                        { "id": 429662, "caption": "Sedih", "type": "label" },
                        { "id": 429663, "caption": "", "type": "checkbox" },
                        { "id": 429664, "caption": "", "type": "checkbox" },
                        { "id": 429665, "caption": "", "type": "textarea" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 429666, "caption": "", "type": "label" },
                        { "id": 429667, "caption": "", "type": "label" },
                        { "id": 429668, "caption": "", "type": "label" },
                        { "id": 429669, "caption": "", "type": "label" },
                        { "id": 429670, "caption": "Depresi", "type": "label" },
                        { "id": 429671, "caption": "", "type": "checkbox" },
                        { "id": 429672, "caption": "", "type": "checkbox" },
                        { "id": 429673, "caption": "", "type": "textarea" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 429674, "caption": "", "type": "label" },
                        { "id": 429675, "caption": "", "type": "label" },
                        { "id": 429676, "caption": "", "type": "label" },
                        { "id": 429677, "caption": "", "type": "label" },
                        { "id": 429678, "caption": "Cemas", "type": "label" },
                        { "id": 429679, "caption": "", "type": "checkbox" },
                        { "id": 429680, "caption": "", "type": "checkbox" },
                        { "id": 429681, "caption": "", "type": "textarea" }
                    ]
                }
            ];

            $scope.listKulit = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 429682, "caption": "Gatal", "type": "label" },
                        { "id": 429683, "caption": "", "type": "checkbox" },
                        { "id": 429684, "caption": "", "type": "checkbox" },
                        { "id": 429685, "caption": "", "type": "textarea" },
                        { "id": 429686, "caption": "", "type": "textarea" },
                        { "id": 429687, "caption": "", "type": "checkbox" },
                        { "id": 429688, "caption": "", "type": "checkbox" },
                        { "id": 429689, "caption": "", "type": "textarea" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 429690, "caption": "Kemerahan", "type": "label" },
                        { "id": 429691, "caption": "", "type": "checkbox" },
                        { "id": 429692, "caption": "", "type": "checkbox" },
                        { "id": 429693, "caption": "", "type": "textarea" },
                        { "id": 429694, "caption": "", "type": "textarea" },
                        { "id": 429695, "caption": "", "type": "checkbox" },
                        { "id": 429696, "caption": "", "type": "checkbox" },
                        { "id": 429697, "caption": "", "type": "textarea" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 429698, "caption": "Dekubitus", "type": "label" },
                        { "id": 429699, "caption": "", "type": "checkbox" },
                        { "id": 429701, "caption": "", "type": "checkbox" },
                        { "id": 429702, "caption": "", "type": "textarea" },
                        { "id": 429703, "caption": "", "type": "textarea" },
                        { "id": 429704, "caption": "", "type": "checkbox" },
                        { "id": 429705, "caption": "", "type": "checkbox" },
                        { "id": 429706, "caption": "", "type": "textarea" }
                    ]
                }
            ];

            $scope.listKontakTim = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 429730, "caption": "DPJP", "type": "label" },
                        { "id": 429731, "caption": "", "type": "textbox" },
                        { "id": 429732, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 429733, "caption": "Kasie Keperawatan", "type": "label" },
                        { "id": 429734, "caption": "", "type": "textbox" },
                        { "id": 429735, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 429736, "caption": "Psikiater", "type": "label" },
                        { "id": 429737, "caption": "", "type": "textbox" },
                        { "id": 429738, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "detail": [
                        { "id": 429739, "caption": "KaBid YanMed", "type": "label" },
                        { "id": 429740, "caption": "", "type": "textbox" },
                        { "id": 429741, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 5,
                    "detail": [
                        { "id": 429742, "caption": "Rohaniawan", "type": "label" },
                        { "id": 429743, "caption": "", "type": "textbox" },
                        { "id": 429744, "caption": "", "type": "textbox" }
                    ]
                }
            ]

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

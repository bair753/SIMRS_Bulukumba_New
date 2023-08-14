define(['initialize', 'Configuration'], function (initialize, config) {
    'use strict';
    initialize.controller('PemberianEdukasiPasienCtrl', ['$q', '$rootScope', '$scope', 'ModelItem', '$state', 'CacheHelper', 'DateHelper', 'MedifirstService',
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
            $scope.cc.emrfk = 290027;
            var dataLoad = [];
            $scope.isCetak = true;
            $scope.show = true;
            $scope.allDisabled = false;
            $scope.listItem = [
                { id: 423291, inuse: true },
                { id: 423298 },
                { id: 423305 },
                { id: 423312 },
                { id: 423319 },
                { id: 423326 },
                { id: 423333 },
                { id: 423340 },
                { id: 423347 },
                { id: 423354 },
                { id: 423361 },
                { id: 423368 },
                { id: 423375 },
                { id: 423382 },
                { id: 423389 },
                { id: 423396 },
                { id: 423403 },
                { id: 423410 },
                { id: 423417 },
                { id: 423424 },
                { id: 423431 }
            ];
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

            medifirstService.getPart("sysadmin/general/get-datacombo-jenispegawai-cppt", true, true, 20).then(function (data) {
                $scope.listJenisPegawai = data;
            });

            $scope.listEdukasiPasien = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 423249, "nama": "", "caption": "Baca dan tulis", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 423250, "nama": "Baik", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423251, "nama": "Kurang", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423252, "nama": "", "caption": "Pendidikan pasien", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 423253, "nama": "SD", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423254, "nama": "SLTP", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423255, "nama": "SLTA", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423256, "nama": "S-1", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423257, "nama": "Lain-lain :", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423258, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" },
                        { "id": 423259, "nama": "", "caption": "Bahasa", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 423260, "nama": "Indonesia", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423261, "nama": "Inggris", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423262, "nama": "Daerah :", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423263, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" },
                        { "id": 423264, "nama": "Lain-lain :", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423265, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" },
                        { "id": 423266, "nama": "", "caption": "Hambatan Emosional dan Motivasi", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 423267, "nama": "Tidak ada", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423268, "nama": "Bahasa", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423269, "nama": "Kognitif terbatas", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423270, "nama": "Emosional", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423271, "nama": "", "caption": "Keterbatasan Fisik dan Kognetif", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 423272, "nama": "Tidak ada", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423273, "nama": "Penglihatan terganggu", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423274, "nama": "Pendengaran terganggu", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423275, "nama": "Gangguan bicara", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423276, "nama": "Fisik lemah", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423277, "nama": "Lain-lain :", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423278, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" },
                        { "id": 423279, "nama": "", "caption": "Kesediaan untuk Menerima Informasi", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 423280, "nama": "Ya", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423281, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listMateriEdukasi = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 423282, "nama": "Penggunaan Obat-obatan", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423283, "nama": "Penggunaan peralatan medis", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423284, "nama": "Potensi interaksi antar obat", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423285, "nama": "Diet dan nutrisi", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423286, "nama": "Manejemen nyeri", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423287, "nama": "Teknik rehabilitasi", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423288, "nama": "Cuci tangan yang benar", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423289, "nama": "Lain-lain :", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423290, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.cetakPdf = function () {
                if (norecEMR == '') return
                var local = JSON.parse(localStorage.getItem('profile'));
                var nama = medifirstService.getPegawaiLogin().namalengkap;
                window.open(config.baseApiBackend + 'report/cetak-pemberian-edukasi-pasien?nocm='
                    + $scope.cc.nocm + '&norec_apd=' + $scope.cc.norec + '&emr=' + norecEMR
                    + '&emrfk=' + $scope.cc.emrfk
                    + '&kdprofile=' + local.id
                    + '&index=' + paramsIndex
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
                $scope.item.obj[423291] = $scope.now;
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
                            if (parseFloat($scope.cc.emrfk) == dataLoad[i].emrfk && paramsIndex == dataLoad[i].index) {

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

            function saveTosDipake(id) {
                if (nomorEMR != '-') {
                    let json = {
                        noemr: nomorEMR,
                        emrfk: $scope.cc.emrfk,
                        id: id,
                        value: moment(new Date()).format('YYYY-MM-DD HH:mm:ss')
                    }
                    medifirstService.postNonMessage("emr/save-status-dipake", json).then(function (dat) {
                    })
                }
            }

            $scope.tambah = function () {
                let details = []
                for (let i = 0; i < $scope.listItem.length; i++) {
                    const element = $scope.listItem[i];
                    if (element.inuse == undefined) {
                        details.push(element.id)
                    }
                }
                let json = {
                    noemr: nomorEMR,
                    emrfk: $scope.cc.emrfk,
                    details: details
                }
                medifirstService.postNonMessage("emr/get-status-dipake", json).then(function (dat) {
                    let result = dat.data.data
                    for (let j = 0; j < $scope.listItem.length; j++) {
                        const element = $scope.listItem[j];
                        for (let x = 0; x < result.length; x++) {
                            const element2 = result[x];
                            if (element.id == element2.emrdfk) {
                                element.inuse = true
                            }
                        }
                    }

                    for (let j = 0; j < $scope.listItem.length; j++) {
                        const element2 = $scope.listItem[j];
                        if (element2.inuse == undefined) {
                            $scope.item.obj[parseInt(element2.id)] = new Date()
                            element2.inuse = true
                            saveTosDipake(element2.id)
                            break
                        }
                    }
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
                        'Pemberian Edukasi Pasien' + ' dengan No EMR - ' + e.data.data.noemr + ' pada No Registrasi '
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

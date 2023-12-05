define(['initialize', 'Configuration'], function (initialize, config) {
    'use strict';
    initialize.controller('EvaluasiPascaAnestesiLainCtrl', ['$q', '$rootScope', '$scope', 'ModelItem', '$state', 'CacheHelper', 'DateHelper', 'MedifirstService',
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
            $scope.cc.emrfk = 290195;
            var seriesSistolik = []
            var seriesNadi = []
            var seriesRespirasi = []
            var seriesDistolik = []
            var seriesTV = []
            var seriesDis = []
            var categories = []
            var dataLoad = [];
            $scope.isCetak = false;
            $scope.show = true;
            $scope.allDisabled = false;
            $scope.listItem = [
                { id: 422550, inuse: true },
                { id: 422553 },
                { id: 422557 },
                { id: 422560 },
                { id: 422563 },
                { id: 422566 },
                { id: 422569 },
                { id: 422572 },
                { id: 422575 },
                { id: 422578 },
                { id: 422581 },
                { id: 422584 },
                { id: 422587 },
                { id: 422590 },
                { id: 422593 },
                { id: 422596 },
                { id: 422599 },
                { id: 422602 },
                { id: 422605 },
                { id: 422608 },
                { id: 422611 },
                { id: 422614 },
                { id: 422617 }
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
            
            medifirstService.getPart("emr/get-datacombo-part-obat", true, true, 20).then(function (data) {
                $scope.listObat = data;
            });

            $scope.cetakPdf = function () {
                if (norecEMR == '') return
                var local = JSON.parse(localStorage.getItem('profile'));
                var nama = medifirstService.getPegawaiLogin().namalengkap;
                window.open(config.baseApiBackend + 'report/cetak-flowsheet?nocm='
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

            $scope.listData1 = []
            $scope.listData2 = []
            $scope.listTanggal = []
            $scope.listTanggal2 = []
            
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
                medifirstService.get("emr/get-rekam-medis-dynamic?emrid=" + $scope.cc.emrfk).then(function (e) {
                    $scope.listData = e.data
                    $scope.item.title = e.data.title
                    $scope.item.classgrid = e.data.classgrid

                    // $scope.cc.emrfk = emrfk_
                    $scope.item.objcbo = []

                    var datas = e.data.kolom4

                    var detail = []
                    var arrayAskep = []
                    var arrayAskep2 = []
                    var arrayParenteral = []
                    var arrayParenteral2 = []
                    var sama = false
                    for (let i = 0; i < datas.length; i++) {

                        const element = datas[i];
                        console.log(datas[i]);
                        if (element.id >= 32117538) {
                            sama = false
                            if (element.type == 'time') {
                                $scope.listTanggal.push({ id: element.id })
                            }
                            if (element.kodeexternal == 'date2') {
                                $scope.listTanggal2.push({ id: element.id })
                            }
                            // ARRAY GEJALA
                            if (element.kodeexternal == 'pernafasan') {
                                for (let z = 0; z < arrayAskep.length; z++) {
                                    const element2 = arrayAskep[z];
                                    if (element2.namaexternal == element.namaexternal) {
                                        detail.push(element)
                                        element2.details = detail
                                        sama = true
                                    }
                                }
                                if (sama == false) {
                                    var datax = {
                                        caption: element.caption,
                                        cbotable: element.cbotable,
                                        child: [],
                                        emrfk: element.emrfk,
                                        headfk: element.headfk,
                                        id: element.id,
                                        kdprofile: element.kdprofile,
                                        kodeexternal: element.kodeexternal,
                                        namaemr: element.namaemr,
                                        namaexternal: element.namaexternal,
                                        nourut: element.nourut,
                                        reportdisplay: element.reportdisplay,
                                        satuan: element.satuan,
                                        statusenabled: element.statusenabled,
                                        style: element.style,
                                        type: element.type,

                                    }
                                    arrayAskep.push(datax)
                                }
                            }// ARRAY GEJALA



                        }
                        // ARRAY GEJALA
                        var gejalaKosongKeun = []
                        for (let k = 0; k < arrayAskep.length; k++) {
                            const element = arrayAskep[k];
                            for (let l = 0; l < datas.length; l++) {
                                const element2 = datas[l];
                                if (element2.namaexternal == element.namaexternal) {
                                    gejalaKosongKeun.push(element2)
                                    element.details = gejalaKosongKeun
                                } else {
                                    gejalaKosongKeun = []
                                }
                            }
                        }
                        $scope.listData1 = arrayAskep
                    }
                    // console.log(element);
                    console.log($scope.listTanggal);
                    for (var i = e.data.kolom4.length - 1; i >= 0; i--) {
                        if (e.data.kolom4[i].id >= 32117538) {
                            e.data.kolom4.splice(i, 1)
                        }
                    }
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
                        for (var ii = e.data.kolom3.child.length - 1; ii >= 0; ii--) {
                            if (e.data.kolom3[i].child[ii].cbotable != null) {
                                medifirstService.getPart2(e.data.kolom3[i].child[ii].id, e.data.kolom3[i].child[ii].cbotable, true, true, 20).then(function (data) {
                                    $scope.item.objcbo[data.options.idididid] = data
                                })
                            }
                        }
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
                    var datas = e.data.kolom4

                    var detail = []
                    var arrayAskep = []
                    var arrayAskep2 = []
                    var arrayParenteral = []
                    var arrayParenteral2 = []
                    var sama = false
                    for (let i = 0; i < datas.length; i++) {

                        const element = datas[i];
                        if (element.id >= 32117538) {
                            sama = false
                            if (element.type == 'time') {
                                $scope.listTanggal.push({ id: element.id })
                            }
                            if (element.kodeexternal == 'date2') {
                                $scope.listTanggal2.push({ id: element.id })
                            }
                            // ARRAY GEJALA
                            if (element.kodeexternal == 'pernafasan') {
                                for (let z = 0; z < arrayAskep.length; z++) {
                                    const element2 = arrayAskep[z];
                                    if (element2.namaexternal == element.namaexternal) {
                                        detail.push(element)
                                        element2.details = detail
                                        sama = true
                                    }
                                }
                                if (sama == false) {
                                    var datax = {
                                        caption: element.caption,
                                        cbotable: element.cbotable,
                                        child: [],
                                        emrfk: element.emrfk,
                                        headfk: element.headfk,
                                        id: element.id,
                                        kdprofile: element.kdprofile,
                                        kodeexternal: element.kodeexternal,
                                        namaemr: element.namaemr,
                                        namaexternal: element.namaexternal,
                                        nourut: element.nourut,
                                        reportdisplay: element.reportdisplay,
                                        satuan: element.satuan,
                                        statusenabled: element.statusenabled,
                                        style: element.style,
                                        type: element.type,

                                    }
                                    arrayAskep.push(datax)
                                }
                            }// ARRAY GEJALA



                        }
                        // ARRAY GEJALA
                        var gejalaKosongKeun = []
                        for (let k = 0; k < arrayAskep.length; k++) {
                            const element = arrayAskep[k];
                            for (let l = 0; l < datas.length; l++) {
                                const element2 = datas[l];
                                if (element2.namaexternal == element.namaexternal) {
                                    gejalaKosongKeun.push(element2)
                                    element.details = gejalaKosongKeun
                                } else {
                                    gejalaKosongKeun = []
                                }
                            }
                        }
                        $scope.listData1 = arrayAskep
                    }
                    console.log($scope.listTanggal);

                    $scope.item.objcbo = []
                    for (var i = e.data.kolom4.length - 1; i >= 0; i--) {
                        if (e.data.kolom4[i].id >= 32117538) {
                            e.data.kolom4.splice(i, 1)
                        }
                    }
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

                        categories = []
                        var arrobj = Object.keys($scope.item.obj)
                        for (let ii = 0; ii < arrobj.length; ii++) {
                            if (parseInt(arrobj[ii]) >= 32117538 && parseInt(arrobj[ii]) <= 32117549) {
                                if ($scope.item.obj[parseFloat(arrobj[ii])] instanceof Date) {
                                    categories.push(moment($scope.item.obj[parseFloat(arrobj[ii])]).format('HH:mm'))
                                } else {
                                    var date = moment(new Date()).format('YYYY-MM-DD')
                                    categories.push(moment(date + ' ' + $scope.item.obj[parseFloat(arrobj[ii])]).format('HH:mm'))
                                }
                            }
                        }
                        var arrobj = Object.keys($scope.item.obj)
                        for (var i = arrobj.length - 1; i >= 0; i--) {

                            for (let y = 0; y < 35; y++) {
                                if (arrobj[i] == 32117590 + y && arrobj[i] != '')
                                    seriesSistolik[y] = $scope.item.obj[parseFloat(arrobj[i])]
                            }
                            for (let y = 0; y < 35; y++) {
                                if (arrobj[i] == 32117550 + y && arrobj[i] != '')
                                    seriesNadi[y] = $scope.item.obj[parseFloat(arrobj[i])]
                            }
                            for (let y = 0; y < 35; y++) {
                                if (arrobj[i] == 32117670 + y && arrobj[i] != '')
                                    seriesRespirasi[y] = $scope.item.obj[parseFloat(arrobj[i])]
                            }
                            for (let y = 0; y < 35; y++) {
                                if (arrobj[i] == 32117630 + y && arrobj[i] != '')
                                    seriesDistolik[y] = $scope.item.obj[parseFloat(arrobj[i])]
                            }

                            for (let y = 0; y < 35; y++) {
                                if (arrobj[i] == 32117710 + y && arrobj[i] != '')
                                    seriesTV[y] = $scope.item.obj[parseFloat(arrobj[i])]
                            }

                            // for (let y = 0; y < 35; y++) {
                            //     if (arrobj[i] == 32116379 + y && arrobj[i] != '') {
                            //         var td = $scope.item.obj[parseFloat(arrobj[i])]
                            //         td = td.split('/')
                            //         if (td.length == 2) {
                            //             seriesTV[y] = td[0]
                            //             seriesDis[y] = td[1]
                            //         }
                            //     }
                            // }
                        }

                        for (let x = 0; x < seriesSistolik.length; x++) {
                            if (!isNaN(parseFloat(seriesSistolik[x])))
                                seriesSistolik[x] = parseFloat(seriesSistolik[x])

                        }
                        for (let x = 0; x < seriesNadi.length; x++) {
                            if (!isNaN(parseInt(seriesNadi[x])))
                                seriesNadi[x] = parseInt(seriesNadi[x])

                        }
                        for (let x = 0; x < seriesRespirasi.length; x++) {
                            if (!isNaN(parseInt(seriesRespirasi[x])))
                                seriesRespirasi[x] = parseInt(seriesRespirasi[x])

                        }
                        for (let x = 0; x < seriesDistolik.length; x++) {
                            if (!isNaN(parseInt(seriesDistolik[x])))
                                seriesDistolik[x] = parseInt(seriesDistolik[x])

                        }
                        for (let x = 0; x < seriesTV.length; x++) {
                            if (!isNaN(parseInt(seriesTV[x])))
                                seriesTV[x] = parseInt(seriesTV[x])
                        }
                        for (let x = 0; x < seriesDis.length; x++) {
                            if (!isNaN(parseInt(seriesDis[x])))
                                seriesDis[x] = parseInt(seriesDis[x])
                        }
                        loadChart()
                        // loadChart2()

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
                for (let j = 0; j < $scope.listItem.length; j++) {
                    const element = $scope.listItem[j];
                    if ($scope.item.obj[element.id] === undefined) {
                        element.inuse = undefined;
                    } else {
                        element.inuse = true;
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
            }
                $scope.hapus = function (index) {
                    var yakin = confirm("Apakah anda yakin akan menghapus?");
                    if (yakin) {
                        $scope.item.obj[parseFloat($scope.listItem[index].id)] = undefined;
                        $scope.listItem[index].inuse = false;
                    } else {
                        return
                    }

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
                    afterSave(e)
                    var arrobj = Object.keys($scope.item.obj)
                    categories = []

                    for (let i = 0; i < arrobj.length; i++) {
                        if (arrobj[i] >= 32117538 && arrobj[i] <= 32117549) {
                            $scope.item.obj[parseFloat(arrobj[i])] = new Date($scope.item.obj[parseFloat(arrobj[i])])
                            // if ($scope.item.obj[parseFloat(arrobj[i])] instanceof Date) {
                            categories.push(moment($scope.item.obj[parseFloat(arrobj[i])]).format('HH:mm'))
                            // }else{
                            //     categories.push(moment(new Date($scope.item.obj[parseFloat(arrobj[i])])).format('HH:mm'))
                            // }
                        }
                    }

                    for (var i = arrobj.length - 1; i >= 0; i--) {

                        for (let z = 0; z < 35; z++) {
                            if (arrobj[i] == 32117590 + z && arrobj[i] != '')
                                seriesSistolik[z] = $scope.item.obj[parseFloat(arrobj[i])]
                        }
                        for (let z = 0; z < 35; z++) {
                            if (arrobj[i] == 32117550 + z && arrobj[i] != '')
                                seriesNadi[z] = $scope.item.obj[parseFloat(arrobj[i])]
                        }
                        for (let z = 0; z < 35; z++) {
                            if (arrobj[i] == 32117670 + z && arrobj[i] != '')
                                seriesRespirasi[z] = $scope.item.obj[parseFloat(arrobj[i])]
                        }
                        for (let z = 0; z < 35; z++) {
                            if (arrobj[i] == 32117630 + z && arrobj[i] != '')
                                seriesDistolik[z] = $scope.item.obj[parseFloat(arrobj[i])]
                        }
                        for (let z = 0; z < 35; z++) {
                            if (arrobj[i] == 32117710 + z && arrobj[i] != '')
                                seriesTV[z] = $scope.item.obj[parseFloat(arrobj[i])]
                        }
                        // for (let z = 0; z < 35; z++) {
                        //     if (arrobj[i] == 32116379 + z && arrobj[i] != '') {
                        //         var td = $scope.item.obj[parseFloat(arrobj[i])]
                        //         td = td.split('/')
                        //         if (td.length == 2) {
                        //             seriesTV[z] = td[0]
                        //             seriesDis[z] = td[1]
                        //         }

                        //     }
                        // }
                    }

                    for (let x = 0; x < seriesSistolik.length; x++) {
                        if (!isNaN(parseFloat(seriesSistolik[x])))
                            seriesSistolik[x] = parseFloat(seriesSistolik[x])
                    }
                    for (let x = 0; x < seriesNadi.length; x++) {
                        if (!isNaN(parseInt(seriesNadi[x])))
                            seriesNadi[x] = parseInt(seriesNadi[x])
                    }
                    for (let x = 0; x < seriesRespirasi.length; x++) {
                        if (!isNaN(parseInt(seriesRespirasi[x])))
                            seriesRespirasi[x] = parseInt(seriesRespirasi[x])
                    }
                    for (let x = 0; x < seriesDistolik.length; x++) {
                        if (!isNaN(parseInt(seriesDistolik[x])))
                            seriesDistolik[x] = parseInt(seriesDistolik[x])
                    }
                    for (let x = 0; x < seriesTV.length; x++) {
                        if (!isNaN(parseInt(seriesTV[x])))
                            seriesTV[x] = parseInt(seriesTV[x])
                    }
                    for (let x = 0; x < seriesDis.length; x++) {
                        if (!isNaN(parseInt(seriesDis[x])))
                            seriesDis[x] = parseInt(seriesDis[x])
                    }
                    loadChart()
                    // loadChart2()

                    medifirstService.postLogging('EMR', 'norec emrpasien_t', e.data.data.norec,
                        'Evaluasi Pasca Anestesi / Sedasi (RM 51a)' + ' dengan No EMR - ' + e.data.data.noemr + ' pada No Registrasi '
                        + $scope.cc.noregistrasi).then(function (res) {
                        })

                    $rootScope.loadRiwayat()
                    var arrStr = {
                        0: e.data.data.noemr
                    }
                    cacheHelper.set('cacheNomorEMR', arrStr);
                });
            }
            function afterSave(e) {
                $scope.cc.norec_emr = e.data.data.noemr
                medifirstService.postLogging('EMR', 'norec emrpasien_t', e.data.data.norec,
                    'Evaluasi Pasca Anestesi / Sedasi (RM 51a)' + ' dengan No EMR - ' + e.data.data.noemr + ' pada No Registrasi '
                    + $scope.cc.noregistrasi).then(function (res) {
                    })

                // $rootScope.loadHistoryEMRBedah();
                var arrStr = {
                    0: e.data.data.noemr
                }
                cacheHelper.set('cacheNomorEMR', arrStr);
            }
            loadChart()
            function loadChart() {
                for (var i = seriesSistolik.length - 1; i >= 0; i--) {
                    const element = seriesSistolik[i]
                    if (element == '') {
                        seriesSistolik.splice(i, 1)
                    }
                }
                for (var i = seriesDistolik.length - 1; i >= 0; i--) {
                    const element = seriesDistolik[i]
                    if (element == '') {
                        seriesDistolik.splice(i, 1)
                    }
                }
                for (var i = seriesNadi.length - 1; i >= 0; i--) {
                    const element = seriesNadi[i]
                    if (element == '') {
                        seriesNadi.splice(i, 1)
                    }
                }
                for (var i = seriesRespirasi.length - 1; i >= 0; i--) {
                    const element = seriesRespirasi[i]
                    if (element == '') {
                        seriesRespirasi.splice(i, 1)
                    }
                }
                for (var i = seriesDis.length - 1; i >= 0; i--) {
                    const element = seriesDis[i]
                    if (element == '') {
                        seriesDis.splice(i, 1)
                    }
                }
                for (var i = seriesTV.length - 1; i >= 0; i--) {
                    const element = seriesTV[i]
                    if (element == '') {
                        seriesTV.splice(i, 1)
                    }
                }
                Highcharts.chart('container', {

                    title: {
                        text: 'Vital Sign'
                    },

                    subtitle: {
                        text: ''
                    },

                    yAxis: {
                        title: {
                            text: 'Jumlah'
                        }
                    },

                    xAxis: {
                        title: {
                            text: 'Waktu'
                        },
                        categories: categories,
                        crosshair: true
                    },

                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle'
                    },
                    credits: {
                        enabled: false
                    },
                    plotOptions: {
                        series: {
                            label: {
                                connectorAllowed: false
                            },
                            cursor: 'pointer',

                            dataLabels: {
                                enabled: true,
                                formatter: function () {
                                    return this.y;
                                }
                            },
                            showInLegend: true
                        }
                    },

                    series: [{
                        name: 'Sistolik',
                        data: seriesSistolik,
                        color: '#1e87e3'
                    }, {
                        name: 'Distolik',
                        data: seriesDistolik,
                        color: '#2be31e'
                    }, {
                        name: 'Nadi',
                        data: seriesNadi,
                        color: '#e3381e'
                    }, {
                        name: 'Respirasi',
                        data: seriesRespirasi,
                        color: '#000000'
                    },{
                        name: 'TV',
                        data: seriesTV,
                        color: "#000000"
                    }, 
                        //  {
                        //     name: 'Sistole',
                        //     data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
                        // },
                        // {
                        //     name: 'Diastole',
                        //     data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
                        // }
                    ],

                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 500
                            },
                            chartOptions: {
                                legend: {
                                    layout: 'horizontal',
                                    align: 'center',
                                    verticalAlign: 'bottom'
                                }
                            }
                        }]
                    }

                });
            }
            // loadChart2()
            function loadChart2() {
                for (var i = seriesDis.length - 1; i >= 0; i--) {
                    const element = seriesDis[i]
                    if (element == '') {
                        seriesDis.splice(i, 1)
                    }
                }
                for (var i = seriesTV.length - 1; i >= 0; i--) {
                    const element = seriesTV[i]
                    if (element == '') {
                        seriesTV.splice(i, 1)
                    }
                }
                Highcharts.chart('container2', {

                    title: {
                        text: 'Grafik Tekanan Darah'
                    },

                    subtitle: {
                        text: ''
                    },

                    yAxis: {
                        title: {
                            text: 'Jumlah'
                        }
                    },

                    xAxis: {
                        title: {
                            text: 'Waktu'
                        },
                        categories: categories,
                        crosshair: true
                    },

                    legend: {
                        layout: 'vertical',
                        align: 'left',
                        verticalAlign: 'middle'
                    },
                    credits: {
                        enabled: false
                    },
                    plotOptions: {
                        series: {
                            label: {
                                connectorAllowed: false
                            },
                            cursor: 'pointer',

                            dataLabels: {
                                enabled: true,
                                formatter: function () {
                                    return this.y;
                                }
                            },
                            showInLegend: true
                        }
                    },

                    series: [{
                        name: 'Sistolik',
                        data: seriesTV,
                        color: "#fc1303"
                    }, {
                        name: 'Diastolik',
                        data: seriesDis,
                        color: "#03a9fc"
                    },
                    ],

                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 500
                            },
                            chartOptions: {
                                legend: {
                                    layout: 'horizontal',
                                    align: 'center',
                                    verticalAlign: 'bottom'
                                }
                            }
                        }]
                    }

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

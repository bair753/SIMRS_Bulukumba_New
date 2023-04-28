define(['initialize'], function (initialize) {
    'use strict';
    initialize.controller('PemberianMakanAwal1500mgCtrl', ['$q', '$rootScope', '$scope', 'ModelItem', '$state', 'CacheHelper', 'DateHelper', 'MedifirstService',
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
            $scope.cc.emrfk = 290135;
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

            medifirstService.getPart('emr/get-asisten-operasi', true, true, 20).then(function (data) {
                $scope.listAsisten = data
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

            medifirstService.getPart("emr/get-datacombo-part-diagnosa", true, true, 10).then(function (data) {
                $scope.listDiagnosa = data;
            });

            medifirstService.getPart("emr/get-datacombo-icd10-secondary", true, true, 10).then(function (data) {
                $scope.listDiagnosaSecondary = data;
            });


            // $scope.cetakPdf = function () {
            //     if (norecEMR == '') return
            //     var client = new HttpClient();
            //     client.get('http://127.0.0.1:1237/printvb/e-rekammedis?cetak-emr-asesmen-awal-medis-igd&id=' + $scope.cc.nocm + '&emr=' + norecEMR + '&view=true', function (response) {
            //         // do something with response
            //     });
            // }

            $scope.cetakPdf = function () {

                if($scope.item.obj[31100543] == undefined){
                    toastr.warning('Diagnose Pasca Operatif tidak boleh kosong','Peringatan')
                    return
                }

                if($scope.item.obj[31100550] == undefined){
                    toastr.warning('Prosedur Tindakan yang Dilakukan tidak boleh kosong','Peringatan')
                    return
                }

                if($scope.item.obj[31100563] == undefined){
                    toastr.warning('No. Alat yang Dipasang tidak boleh kosong','Peringatan')
                    return
                }

                if($scope.item.obj[31100568] == undefined){
                    toastr.warning('Laporan/Tindakan Operasi tidak boleh kosong','Peringatan')
                    return
                }
                
                if (norecEMR == '') return

                var local = JSON.parse(localStorage.getItem('profile'));
                var nama = medifirstService.getPegawaiLogin().namalengkap;
                window.open(config.baseApiBackend + 'report/cetak-laporan-operasi?nocm='
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
                    $scope.item.obj[422700] = antrianPasien.namapasien;
                    $scope.item.obj[422701] = antrianPasien.nocm;
                    $scope.item.obj[422704] = new Date(moment(antrianPasien.tgllahir).format('YYYY-MM-DD'));
                    $scope.item.obj[422707] = antrianPasien.alamatlengkap;
                    if (antrianPasien.jeniskelamin == 'PEREMPUAN') {
                        $scope.item.obj[422702] = false;
                        $scope.item.obj[422703] = true;
                    } else {
                        $scope.item.obj[422702] = true;
                        $scope.item.obj[422703] = false;
                    }
                    $scope.item.obj[422724] = new Date(moment(antrianPasien.tglregistrasi).format('YYYY-MM-DD HH:mm'));
                    if (antrianPasien.iddpjp != null && antrianPasien.dokterdpjp != null) {
                        $scope.item.obj[422790] = {
                            value: antrianPasien.iddpjp,
                            text: antrianPasien.dokterdpjp
                        }
                    }
                    if (antrianPasien.objectruanganfk != null && antrianPasien.namaruangan != null) {
                        $scope.item.obj[422723] = {
                            value: antrianPasien.objectruanganfk,
                            text: antrianPasien.namaruangan
                        }
                    }
                    $scope.item.obj[422788] = $scope.now;
                })
                
                medifirstService.get("emr/get-vital-sign?noregistrasi=" + $scope.cc.noregistrasi + "&objectidawal=4241&objectidakhir=4246&idemr=147", true).then(function (datas) {
                    if (datas.data.data.length>0){
                        // $scope.item.obj[4228]=datas.data.data[0].value
                        // $scope.item.obj[4229]=datas.data.data[3].value
                        // $scope.item.obj[4230]=datas.data.data[4].value
                        // $scope.item.obj[4231]=datas.data.data[5].value
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
                        'Pemberian Makan Awal 1500-2000 gram' + ' dengan No EMR - ' + e.data.data.noemr + ' pada No Registrasi '
                        + $scope.cc.noregistrasi).then(function (res) {
                        })

                    $rootScope.loadRiwayat()
                    var arrStr = {
                        0: e.data.data.noemr
                    }
                    cacheHelper.set('cacheNomorEMR', arrStr);
                });
            }

            $scope.listInfo1 = [
                {
                    id: 1,
                    detail: [
                        { id: 1001352, caption: 'HARI 1 :', type: 'label' },
                        { id: 1001353, caption: '00 cc/kg/hr', type: 'label' },
                        { id: 1001354, caption: '80 cc/kg/hr', type: 'label' },
                        { id: 1001355, caption: 'D10', type: 'label' },
                        { id: 1001356, caption: '80 cc/kg/hr', type: 'label' },
                    ]
                },
                {
                    id: 2,
                    detail: [
                        { id: 1001357, caption: 'HARI 2 :', type: 'label' },
                        { id: 1001358, caption: '10 cc/kg/hr', type: 'label' },
                        { id: 1001359, caption: '90 cc/kg/hr', type: 'label' },
                        { id: 1001360, caption: 'D10', type: 'label' },
                        { id: 1001361, caption: '100 cc/kg/hr', type: 'label' },
                    ]
                },
                {
                    id: 3,
                    detail: [
                        { id: 1001362, caption: 'HARI 3 :', type: 'label' },
                        { id: 1001363, caption: '20 cc/kg/hr', type: 'label' },
                        { id: 1001364, caption: '80 cc/kg/hr', type: 'label' },
                        { id: 1001365, caption: 'D10 1/5 NS', type: 'label' },
                        { id: 1001366, caption: '100 cc/kg/hr', type: 'label' },
                    ]
                },
                {
                    id: 4,
                    detail: [
                        { id: 1001367, caption: 'HARI 4 :', type: 'label' },
                        { id: 1001368, caption: '40 cc/kg/hr', type: 'label' },
                        { id: 1001369, caption: '80 cc/kg/hr', type: 'label' },
                        { id: 1001370, caption: 'D10 1/5 NS', type: 'label' },
                        { id: 1001371, caption: '120 cc/kg/hr', type: 'label' },
                    ]
                },
                {
                    id: 5,
                    detail: [
                        { id: 1001372, caption: 'HARI 5 :', type: 'label' },
                        { id: 1001373, caption: '60 cc/kg/hr', type: 'label' },
                        { id: 1001374, caption: '60 cc/kg/hr', type: 'label' },
                        { id: 1001375, caption: 'D10 1/5 NS', type: 'label' },
                        { id: 1001376, caption: '120 cc/kg/hr', type: 'label' },
                    ]
                },
                {
                    id: 6,
                    detail: [
                        { id: 1001377, caption: 'HARI 6 :', type: 'label' },
                        { id: 1001378, caption: '80 cc/kg/hr', type: 'label' },
                        { id: 1001379, caption: '40 cc/kg/hr', type: 'label' },
                        { id: 1001380, caption: 'D10 1/5 NS', type: 'label' },
                        { id: 1001381, caption: '120 cc/kg/hr', type: 'label' },
                    ]
                },
                {
                    id: 7,
                    detail: [
                        { id: 1001382, caption: 'HARI 7 :', type: 'label' },
                        { id: 1001383, caption: '100 cc/kg/hr', type: 'label' },
                        { id: 1001384, caption: '20 cc/kg/hr', type: 'label' },
                        { id: 1001385, caption: 'D10 1/5 NS', type: 'label' },
                        { id: 1001386, caption: '120 cc/kg/hr', type: 'label' },
                    ]
                },
                {
                    id: 8,
                    detail: [
                        { id: 1001387, caption: 'HARI 8 :', type: 'label' },
                        { id: 1001388, caption: '120 cc/kg/hr', type: 'label' },
                        { id: 1001389, caption: '10 cc/kg/hr', type: 'label' },
                        { id: 1001390, caption: 'D10 1/5 NS', type: 'label' },
                        { id: 1001391, caption: '130 cc/kg/hr', type: 'label' },
                    ]
                },
                {
                    id: 9,
                    detail: [
                        { id: 1001392, caption: 'HARI 9 :', type: 'label' },
                        { id: 1001393, caption: '140 cc/kg/hr', type: 'label' },
                        { id: 1001394, caption: 'OFF', type: 'label' },
                        { id: 1001395, caption: 'D10 1/5 NS', type: 'label' },
                        { id: 1001396, caption: '140 cc/kg/hr', type: 'label' },
                    ]
                },
                {
                    id: 10,
                    detail: [
                        { id: 1001397, caption: 'HARI 10 :', type: 'label' },
                        { id: 1001398, caption: '150 cc/kg/hr', type: 'label' },
                        { id: 1001399, caption: 'OFF', type: 'label' },
                        { id: 1001400, caption: 'D10 1/5 NS', type: 'label' },
                        { id: 1001401, caption: '150 cc/kg/hr', type: 'label' },
                    ]
                },
                {
                    id: 11,
                    detail: [
                        { id: 1001402, caption: 'HARI 11 :', type: 'label' },
                        { id: 1001403, caption: 'LEMBAR PEMELIHARAAN', type: 'label' },
                        { id: 1001404, caption: 'OFF', type: 'label' },
                        { id: 1001405, caption: 'D10 1/5 NS', type: 'label' },
                        { id: 1001406, caption: '150 cc/kg/hr', type: 'label' },
                    ]
                },
                {
                    id: 12,
                    detail: [
                        { id: 1001407, caption: 'HARI 12 :', type: 'label' },
                        { id: 1001408, caption: 'LEMBAR PEMELIHARAAN', type: 'label' },
                        { id: 1001409, caption: 'OFF', type: 'label' },
                        { id: 1001410, caption: 'D10 1/5 NS', type: 'label' },
                        { id: 1001411, caption: '150 cc/kg/hr', type: 'label' },
                    ]
                },
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

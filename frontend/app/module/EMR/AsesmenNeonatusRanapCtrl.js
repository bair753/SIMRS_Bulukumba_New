define(['initialize'], function (initialize) {
    'use strict';
    initialize.controller('AsesmenNeonatusCtrl', ['$q', '$rootScope', '$scope', 'ModelItem', '$state', 'CacheHelper', 'DateHelper', 'MedifirstService',
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
            $scope.cc.emrfk = 290067;
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
                $scope.item.obj[430805] = $scope.now;
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
                
                medifirstService.get("emr/get-vital-sign?noregistrasi=" + $scope.cc.noregistrasi + "&objectidawal=4241&objectidakhir=4246&idemr=147", true).then(function (datas) {
                    if (datas.data.data.length>0){
                        $scope.item.obj[421302] = datas.data.data[1].value; // Tekanan Darah
                        $scope.item.obj[421303] = datas.data.data[5].value; // Nadi
                        $scope.item.obj[421304] = datas.data.data[4].value; // Suhu
                        $scope.item.obj[421305] = datas.data.data[6].value; // Napas
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
                        'Asesmen Neonatus ' + ' dengan No EMR - ' + e.data.data.noemr + ' pada No Registrasi '
                        + $scope.cc.noregistrasi).then(function (res) {
                        })

                    $rootScope.loadRiwayat()
                    var arrStr = {
                        0: e.data.data.noemr
                    }
                    cacheHelper.set('cacheNomorEMR', arrStr);
                });
            }

            $scope.skorScrinning = 0;
            $scope.getScore = function(dataset) {
                var arrobj = Object.keys($scope.item.obj);

                for (var i = arrobj.length - 1; i >= 0; i--) {
                    if (arrobj[i] == dataset.id) {
                        if ($scope.item.obj[parseFloat(arrobj[i])] == true) {
                            $scope.skorScrinning = $scope.skorScrinning + parseFloat(dataset.descNilai);
                            break;
                        } else {
                            $scope.skorScrinning = $scope.skorScrinning - parseFloat(dataset.descNilai);
                            break;
                        }
                    }
                }
                $scope.item.obj[430670] = $scope.skorScrinning;
            }

            $scope.listAnamnesa = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 430199, "caption": "1. Tiba diruangan tanggal", "nama": "", "satuan": "", "type": "datetime" },
                        { "id": 430200, "caption": "Pengkajian diperoleh dari", "nama": "", "satuan": "", "type": "textbox3" },
                        { "id": 430201, "caption": "Tgl/Jam pengkajian", "nama": "", "satuan": "", "type": "datetime2" },
                        { "id": 430202, "caption": "2. Cara masuk", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430203, "caption": "", "nama": "Menggunakan inkubator", "satuan": "", "type": "checkbox" },
                        { "id": 430204, "caption": "", "nama": "PMK", "satuan": "", "type": "checkbox" },
                        { "id": 430205, "caption": "", "nama": "Digendong", "satuan": "", "type": "checkbox" },
                        { "id": 430206, "caption": "", "nama": "Lainnya", "satuan": "", "type": "checkbox" },
                        { "id": 430207, "caption": "", "nama": "", "satuan": "", "type": "textbox2" },
                        { "id": 430208, "caption": "3. Asal masuk", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430209, "caption": "", "nama": "IGD", "satuan": "", "type": "checkbox" },
                        { "id": 430210, "caption": "", "nama": "Poliklinik", "satuan": "", "type": "checkbox" },
                        { "id": 430211, "caption": "", "nama": "Rujukan dr.spesialis/RS luar/bidan/klinik/puskesmas", "satuan": "", "type": "checkbox" },
                        { "id": 430212, "caption": "", "nama": "OK", "satuan": "", "type": "checkbox" },
                        { "id": 430213, "caption": "", "nama": "VK", "satuan": "", "type": "checkbox" },
                        { "id": 430214, "caption": "", "nama": "Lainnya", "satuan": "", "type": "checkbox" },
                        { "id": 430215, "caption": "", "nama": "", "satuan": "", "type": "textbox2" },
                        { "id": 430216, "caption": "4. Penanggung jawab", "nama": "", "satuan": "", "type": "textbox" },
                        { "id": 430217, "caption": "Usia", "nama": "", "satuan": "", "type": "textbox3" },
                        { "id": 430218, "caption": "Pekerjaan", "nama": "", "satuan": "", "type": "textbox3" },
                        { "id": 430219, "caption": "5. Suku bangsa", "nama": "", "satuan": "", "type": "textbox" },
                        { "id": 430220, "caption": "6. Keluhan utama", "nama": "", "satuan": "", "type": "textarea" },
                        { "id": 430221, "caption": "7. Riwayat obsetric", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430222, "caption": "G", "nama": "", "satuan": "", "type": "textbox3" },
                        { "id": 430223, "caption": "P", "nama": "", "satuan": "", "type": "textbox3" },
                        { "id": 430224, "caption": "A", "nama": "", "satuan": "", "type": "textbox3" },
                        { "id": 430225, "caption": "Usia gestasi", "nama": "", "satuan": "mg", "type": "textbox3" },
                        { "id": 430226, "caption": "8. Pernah dirawat", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430227, "caption": "", "nama": "Ya/tidak", "satuan": "", "type": "checkbox" },
                        { "id": 430228, "caption": "", "nama": "Indikasi rawat", "satuan": "", "type": "checkbox" },
                        { "id": 430229, "caption": "", "nama": "", "satuan": "", "type": "textbox2" },
                        { "id": 430230, "caption": "Status gizi ibu", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430231, "caption": "", "nama": "Baik", "satuan": "", "type": "checkbox" },
                        { "id": 430232, "caption": "", "nama": "Buruk", "satuan": "", "type": "checkbox" },
                        { "id": 430233, "caption": "9. Obat-obat yang dikonsumsi selama kehamilan", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430234, "caption": "", "nama": "Tidak ada", "satuan": "", "type": "checkbox" },
                        { "id": 430235, "caption": "", "nama": "Ada, jenis :", "satuan": "", "type": "checkbox" },
                        { "id": 430236, "caption": "", "nama": "", "satuan": "", "type": "textbox2" },
                        { "id": 430237, "caption": "10. Kebiasaan ibu", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430238, "caption": "", "nama": "Merokok", "satuan": "", "type": "checkbox" },
                        { "id": 430239, "caption": "", "nama": "Minum jamu", "satuan": "", "type": "checkbox" },
                        { "id": 430240, "caption": "", "nama": "Minum beralkohol", "satuan": "", "type": "checkbox" },
                        { "id": 430241, "caption": "", "nama": "Dll", "satuan": "", "type": "checkbox" },
                        { "id": 430242, "caption": "", "nama": "", "satuan": "", "type": "textbox2" },
                        { "id": 430243, "caption": "11. Riwayat persalinan", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430244, "caption": "", "nama": "SC", "satuan": "", "type": "checkbox" },
                        { "id": 430245, "caption": "", "nama": "Spontan kepala/bokong", "satuan": "", "type": "checkbox" },
                        { "id": 430246, "caption": "", "nama": "VE", "satuan": "", "type": "checkbox" },
                        { "id": 430247, "caption": "", "nama": "Forcep", "satuan": "", "type": "checkbox" },
                        { "id": 430248, "caption": "Ketuban", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430249, "caption": "", "nama": "Jernih", "satuan": "", "type": "checkbox" },
                        { "id": 430250, "caption": "", "nama": "Hijau encer/kental", "satuan": "", "type": "checkbox" },
                        { "id": 430251, "caption": "", "nama": "Meconium", "satuan": "", "type": "checkbox" },
                        { "id": 430252, "caption": "", "nama": "Darah", "satuan": "", "type": "checkbox" },
                        { "id": 430253, "caption": "", "nama": "Putih keruh", "satuan": "", "type": "checkbox" },
                        { "id": 430254, "caption": "", "nama": "Dll", "satuan": "", "type": "checkbox" },
                        { "id": 430255, "caption": "", "nama": "", "satuan": "", "type": "textbox2" },
                        { "id": 430256, "caption": "Volume", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430257, "caption": "", "nama": "Normal", "satuan": "", "type": "checkbox" },
                        { "id": 430258, "caption": "", "nama": "Oligohidramnion", "satuan": "", "type": "checkbox" },
                        { "id": 430259, "caption": "", "nama": "Polihidramnion", "satuan": "", "type": "checkbox" },
                        { "id": 430260, "caption": "APGAR SCORE", "nama": "", "satuan": "", "type": "textbox" },
                        { "id": 430261, "caption": "12. Antopometri BBL", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430262, "caption": "BB", "nama": "", "satuan": "gram", "type": "textbox3" },
                        { "id": 430263, "caption": "PB", "nama": "", "satuan": "cm", "type": "textbox3" },
                        { "id": 430264, "caption": "LK", "nama": "", "satuan": "cm", "type": "textbox3" },
                        { "id": 430265, "caption": "LD", "nama": "", "satuan": "cm", "type": "textbox3" },
                        { "id": 430266, "caption": "LILA", "nama": "", "satuan": "cm", "type": "textbox3" },
                        { "id": 430267, "caption": "13. Riwayat penyakit keluarga", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430268, "caption": "", "nama": "Tidak ada", "satuan": "", "type": "checkbox" },
                        { "id": 430269, "caption": "", "nama": "Ada", "satuan": "", "type": "checkbox" },
                        { "id": 430270, "caption": "", "nama": "Diabetes", "satuan": "", "type": "checkbox" },
                        { "id": 430271, "caption": "", "nama": "Kanker", "satuan": "", "type": "checkbox" },
                        { "id": 430272, "caption": "", "nama": "Asthma", "satuan": "", "type": "checkbox" },
                        { "id": 430273, "caption": "", "nama": "Hipertensi", "satuan": "", "type": "checkbox" },
                        { "id": 430274, "caption": "", "nama": "Jantung", "satuan": "", "type": "checkbox" },
                        { "id": 430275, "caption": "", "nama": "Lain-lain", "satuan": "", "type": "checkbox" },
                        { "id": 430276, "caption": "", "nama": "", "satuan": "", "type": "textbox2" },
                        { "id": 430277, "caption": "14. Riwayat alergi obat/makanan", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430278, "caption": "", "nama": "Tidak ada", "satuan": "", "type": "checkbox" },
                        { "id": 430279, "caption": "", "nama": "Ada, sebutkan :", "satuan": "", "type": "checkbox" },
                        { "id": 430280, "caption": "", "nama": "", "satuan": "", "type": "textbox2" },
                        { "id": 430281, "caption": "15. Riwayat transfusi darah", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430282, "caption": "", "nama": "Tidak", "satuan": "", "type": "checkbox" },
                        { "id": 430283, "caption": "", "nama": "Ya, kapan", "satuan": "", "type": "checkbox" },
                        { "id": 430284, "caption": "", "nama": "", "satuan": "", "type": "textbox2" },
                        { "id": 430285, "caption": "Timbul reaksi", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430286, "caption": "", "nama": "Tidak", "satuan": "", "type": "checkbox" },
                        { "id": 430287, "caption": "", "nama": "Ya", "satuan": "", "type": "checkbox" },
                        { "id": 430288, "caption": "", "nama": "", "satuan": "", "type": "textbox2" },
                        { "id": 430289, "caption": "16. Riwayat imunisasi", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430290, "caption": "", "nama": "Tidak", "satuan": "", "type": "checkbox" },
                        { "id": 430291, "caption": "", "nama": "Ya, sebutkan", "satuan": "", "type": "checkbox" },
                        { "id": 430292, "caption": "", "nama": "", "satuan": "", "type": "textbox2" }
                    ]
                }
            ];

            $scope.listPemeriksaanFisik = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 430293, "caption": "1. Keadaan umum", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430294, "caption": "", "nama": "Tampak tidak sakit", "satuan": "", "type": "checkbox" },
                        { "id": 430295, "caption": "", "nama": "Sakit ringan", "satuan": "", "type": "checkbox" },
                        { "id": 430296, "caption": "", "nama": "Sakit sedang", "satuan": "", "type": "checkbox" },
                        { "id": 430297, "caption": "", "nama": "Sakit berat", "satuan": "", "type": "checkbox" },
                        { "id": 430298, "caption": "2. Kesadaran", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430299, "caption": "", "nama": "Compos mentis", "satuan": "", "type": "checkbox" },
                        { "id": 430300, "caption": "", "nama": "Apatis", "satuan": "", "type": "checkbox" },
                        { "id": 430301, "caption": "", "nama": "Somnolen", "satuan": "", "type": "checkbox" },
                        { "id": 430302, "caption": "", "nama": "Sopor", "satuan": "", "type": "checkbox" },
                        { "id": 430303, "caption": "", "nama": "Soporo coma", "satuan": "", "type": "checkbox" },
                        { "id": 430304, "caption": "", "nama": "Coma", "satuan": "", "type": "checkbox" },
                        { "id": 430305, "caption": "3. Tanda vital", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430306, "caption": "Sh", "nama": "", "satuan": "", "type": "textbox3" },
                        { "id": 430307, "caption": "Nd", "nama": "", "satuan": "", "type": "textbox3" },
                        { "id": 430308, "caption": "Rr", "nama": "", "satuan": "", "type": "textbox3" },
                        { "id": 430309, "caption": "SpO2", "nama": "", "satuan": "", "type": "textbox3" },
                        { "id": 430310, "caption": "Down Score", "nama": "", "satuan": "", "type": "textbox3" },
                        { "id": 430311, "caption": "4. Gol Darah / RH (Bayi)", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430312, "caption": "", "nama": "A", "satuan": "", "type": "checkbox" },
                        { "id": 430313, "caption": "", "nama": "B", "satuan": "", "type": "checkbox" },
                        { "id": 430314, "caption": "", "nama": "O", "satuan": "", "type": "checkbox" },
                        { "id": 430315, "caption": "", "nama": "AB", "satuan": "", "type": "checkbox" },
                        { "id": 430316, "caption": "Gol Darah / RH (Ibu)", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430317, "caption": "", "nama": "A", "satuan": "", "type": "checkbox" },
                        { "id": 430318, "caption": "", "nama": "B", "satuan": "", "type": "checkbox" },
                        { "id": 430319, "caption": "", "nama": "O", "satuan": "", "type": "checkbox" },
                        { "id": 430320, "caption": "", "nama": "AB", "satuan": "", "type": "checkbox" },
                        { "id": 430321, "caption": "Gol Darah / RH (Ayah)", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430322, "caption": "", "nama": "A", "satuan": "", "type": "checkbox" },
                        { "id": 430323, "caption": "", "nama": "B", "satuan": "", "type": "checkbox" },
                        { "id": 430324, "caption": "", "nama": "O", "satuan": "", "type": "checkbox" },
                        { "id": 430325, "caption": "", "nama": "AB", "satuan": "", "type": "checkbox" },
                        { "id": 430326, "caption": "5. Pengkajian persistem", "nama": "", "satuan": "", "type": "label" }
                    ]
                }
            ];

            $scope.listSistemSyarafPusat = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 430327, "caption": "Gerak bayi", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430328, "caption": "", "nama": "Aktif", "satuan": "", "type": "checkbox" },
                        { "id": 430329, "caption": "", "nama": "Tidak aktif", "satuan": "", "type": "checkbox" },
                        { "id": 430330, "caption": "UUB", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430331, "caption": "", "nama": "Datar", "satuan": "", "type": "checkbox" },
                        { "id": 430332, "caption": "", "nama": "Cekung", "satuan": "", "type": "checkbox" },
                        { "id": 430333, "caption": "", "nama": "Tegang", "satuan": "", "type": "checkbox" },
                        { "id": 430334, "caption": "", "nama": "Membenjol", "satuan": "", "type": "checkbox" },
                        { "id": 430335, "caption": "", "nama": "Lain-lain", "satuan": "", "type": "checkbox" },
                        { "id": 430336, "caption": "", "nama": "", "satuan": "", "type": "textbox2" },
                        { "id": 430337, "caption": "Kejang", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430338, "caption": "", "nama": "Tidak ada", "satuan": "", "type": "checkbox" },
                        { "id": 430339, "caption": "", "nama": "Ada :", "satuan": "", "type": "checkbox" },
                        { "id": 430340, "caption": "", "nama": "", "satuan": "", "type": "textbox2" },
                        { "id": 430341, "caption": "Refleks", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430342, "caption": "", "nama": "Moro", "satuan": "", "type": "checkbox" },
                        { "id": 430343, "caption": "", "nama": "Menelan", "satuan": "", "type": "checkbox" },
                        { "id": 430344, "caption": "", "nama": "Hisap", "satuan": "", "type": "checkbox" },
                        { "id": 430345, "caption": "", "nama": "Babinski", "satuan": "", "type": "checkbox" },
                        { "id": 430346, "caption": "", "nama": "Rooting", "satuan": "", "type": "checkbox" },
                        { "id": 430347, "caption": "", "nama": "Lain-lain :", "satuan": "", "type": "checkbox" },
                        { "id": 430348, "caption": "", "nama": "", "satuan": "", "type": "textbox2" },
                        { "id": 430349, "caption": "Tangis bayi", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430350, "caption": "", "nama": "Kuat", "satuan": "", "type": "checkbox" },
                        { "id": 430351, "caption": "", "nama": "Melengking", "satuan": "", "type": "checkbox" },
                        { "id": 430352, "caption": "", "nama": "Lain-lain :", "satuan": "", "type": "checkbox" },
                        { "id": 430353, "caption": "", "nama": "", "satuan": "", "type": "textbox2" }
                    ]
                }
            ];

            $scope.listSistemPenglihatan = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 430354, "caption": "Posisi mata", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430355, "caption": "", "nama": "Simetris", "satuan": "", "type": "checkbox" },
                        { "id": 430356, "caption": "", "nama": "Asimetris", "satuan": "", "type": "checkbox" },
                        { "id": 430357, "caption": "Besar pupil", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430358, "caption": "", "nama": "Isokor", "satuan": "", "type": "checkbox" },
                        { "id": 430359, "caption": "", "nama": "Anisokor", "satuan": "", "type": "checkbox" },
                        { "id": 430360, "caption": "Kelompok mata", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430361, "caption": "", "nama": "TAK", "satuan": "", "type": "checkbox" },
                        { "id": 430362, "caption": "", "nama": "Edema", "satuan": "", "type": "checkbox" },
                        { "id": 430363, "caption": "", "nama": "Cekung", "satuan": "", "type": "checkbox" },
                        { "id": 430364, "caption": "", "nama": "Lain-lain :", "satuan": "", "type": "checkbox" },
                        { "id": 430365, "caption": "", "nama": "", "satuan": "", "type": "textbox2" },
                        { "id": 430366, "caption": "Konjungtiva", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430367, "caption": "", "nama": "TAK", "satuan": "", "type": "checkbox" },
                        { "id": 430368, "caption": "", "nama": "Anemis", "satuan": "", "type": "checkbox" },
                        { "id": 430369, "caption": "", "nama": "Konjungtivis", "satuan": "", "type": "checkbox" },
                        { "id": 430370, "caption": "", "nama": "Lain-lain :", "satuan": "", "type": "checkbox" },
                        { "id": 430371, "caption": "", "nama": "", "satuan": "", "type": "textbox2" },
                        { "id": 430372, "caption": "Scelera", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430373, "caption": "", "nama": "TAK", "satuan": "", "type": "checkbox" },
                        { "id": 430374, "caption": "", "nama": "Ikretik", "satuan": "", "type": "checkbox" },
                        { "id": 430375, "caption": "", "nama": "Perdarahan", "satuan": "", "type": "checkbox" },
                        { "id": 430376, "caption": "", "nama": "Lain-lain :", "satuan": "", "type": "checkbox" },
                        { "id": 430377, "caption": "", "nama": "", "satuan": "", "type": "textbox2" }
                    ]
                }
            ]

            $scope.listSistemPendengaran = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 430378, "nama": "TAK", "type": "checkbox" },
                        { "id": 430379, "nama": "Asimetris", "type": "checkbox" },
                        { "id": 430380, "nama": "Serumin", "type": "checkbox" },
                        { "id": 430381, "nama": "Keluar cairan", "type": "checkbox" },
                        { "id": 430382, "nama": "Tidak ada lubang drum", "type": "checkbox" },
                        { "id": 430383, "nama": "Lain-lain :", "type": "checkbox" },
                        { "id": 430384, "nama": "", "type": "textbox2" }
                    ]
                }
            ];

            $scope.listSistemPenciuman = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 430385, "nama": "TAK", "type": "checkbox" },
                        { "id": 430386, "nama": "Asimetris", "type": "checkbox" },
                        { "id": 430387, "nama": "Pengeluaran cairan", "type": "checkbox" },
                        { "id": 430388, "nama": "Lain-lain :", "type": "checkbox" },
                        { "id": 430389, "nama": "", "type": "textbox2" }
                    ]
                }
            ];

            $scope.listSistemKardioVaskuler = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 430390, "caption": "Warna kulit", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430391, "caption": "", "nama": "Kemerahan", "satuan": "", "type": "checkbox" },
                        { "id": 430392, "caption": "", "nama": "Sianosis", "satuan": "", "type": "checkbox" },
                        { "id": 430393, "caption": "", "nama": "", "satuan": "", "type": "textbox2" },
                        { "id": 430394, "caption": "", "nama": "Pucat", "satuan": "", "type": "checkbox" },
                        { "id": 430395, "caption": "", "nama": "Lain-lain :", "satuan": "", "type": "checkbox" },
                        { "id": 430396, "caption": "", "nama": "", "satuan": "", "type": "textbox2" },
                        { "id": 430397, "caption": "Denyut nadi", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430398, "caption": "", "nama": "Teratur", "satuan": "", "type": "checkbox" },
                        { "id": 430399, "caption": "", "nama": "Tidak teratur", "satuan": "", "type": "checkbox" },
                        { "id": 430400, "caption": "", "nama": "Frekuensi :", "satuan": "", "type": "checkbox" },
                        { "id": 430401, "caption": "", "nama": "", "satuan": "x/menit", "type": "textbox2" },
                        { "id": 430402, "caption": "Sirkulasi", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430403, "caption": "", "nama": "Akral hangat", "satuan": "", "type": "checkbox" },
                        { "id": 430404, "caption": "", "nama": "Akral dingin", "satuan": "", "type": "checkbox" },
                        { "id": 430405, "caption": "", "nama": "CRT :", "satuan": "", "type": "checkbox" },
                        { "id": 430406, "caption": "", "nama": "", "satuan": "detik", "type": "textbox2" },
                        { "id": 430407, "caption": "Pulpasi", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430408, "caption": "", "nama": "Kuat", "satuan": "", "type": "checkbox" },
                        { "id": 430409, "caption": "", "nama": "Lemah", "satuan": "", "type": "checkbox" },
                        { "id": 430410, "caption": "", "nama": "Mur-mur", "satuan": "", "type": "checkbox" },
                        { "id": 430411, "caption": "", "nama": "Lain-lain", "satuan": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listSistemPernafasan = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 430412, "caption": "Pola nafas", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430413, "caption": "", "nama": "Normal :", "satuan": "", "type": "checkbox" },
                        { "id": 430414, "caption": "", "nama": "", "satuan": "x/menit", "type": "textbox2" },
                        { "id": 430415, "caption": "", "nama": "Bradipnea :", "satuan": "", "type": "checkbox" },
                        { "id": 430416, "caption": "", "nama": "", "satuan": "x/menit", "type": "textbox2" },
                        { "id": 430417, "caption": "", "nama": "Tacipnea :", "satuan": "", "type": "checkbox" },
                        { "id": 430418, "caption": "", "nama": "", "satuan": "x/menit", "type": "textbox2" },
                        { "id": 430419, "caption": "Jenis pernafasan", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430420, "caption": "", "nama": "Pernafasan dada", "satuan": "", "type": "checkbox" },
                        { "id": 430421, "caption": "", "nama": "Pernafasan perut", "satuan": "", "type": "checkbox" },
                        { "id": 430422, "caption": "", "nama": "Alat bantu nafas, sebutkan :", "satuan": "", "type": "checkbox" },
                        { "id": 430423, "caption": "", "nama": "", "satuan": "", "type": "textbox2" },
                        { "id": 430424, "caption": "Irama nafas", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430425, "caption": "", "nama": "Teratur", "satuan": "", "type": "checkbox" },
                        { "id": 430426, "caption": "", "nama": "Tidak teratur", "satuan": "", "type": "checkbox" },
                        { "id": 430427, "caption": "Retraksi", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430428, "caption": "", "nama": "Tidak ada", "satuan": "", "type": "checkbox" },
                        { "id": 430429, "caption": "", "nama": "Ringan", "satuan": "", "type": "checkbox" },
                        { "id": 430430, "caption": "", "nama": "Berat", "satuan": "", "type": "checkbox" },
                        { "id": 430431, "caption": "Air entri", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430432, "caption": "", "nama": "Udara masuk", "satuan": "", "type": "checkbox" },
                        { "id": 430433, "caption": "", "nama": "Penurunan udara masuk", "satuan": "", "type": "checkbox" },
                        { "id": 430434, "caption": "", "nama": "Tidak ada udara masuk", "satuan": "", "type": "checkbox" },
                        { "id": 430435, "caption": "Merintih", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430436, "caption": "", "nama": "Tidak ada", "satuan": "", "type": "checkbox" },
                        { "id": 430437, "caption": "", "nama": "Terdengar dengan stetoskop", "satuan": "", "type": "checkbox" },
                        { "id": 430438, "caption": "", "nama": "Terdengar tanpa stetoskop", "satuan": "", "type": "checkbox" },
                        { "id": 430439, "caption": "Suara nafas", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430440, "caption": "", "nama": "Vesikuler", "satuan": "", "type": "checkbox" },
                        { "id": 430441, "caption": "", "nama": "Wheezing", "satuan": "", "type": "checkbox" },
                        { "id": 430442, "caption": "", "nama": "Ronchi", "satuan": "", "type": "checkbox" },
                        { "id": 430443, "caption": "", "nama": "Stridor", "satuan": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listSistemPencernaan = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 430444, "caption": "Mulut", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430445, "caption": "", "nama": "Tidak ada kelainan", "satuan": "", "type": "checkbox" },
                        { "id": 430446, "caption": "", "nama": "Simetris", "satuan": "", "type": "checkbox" },
                        { "id": 430447, "caption": "", "nama": "Asimetris", "satuan": "", "type": "checkbox" },
                        { "id": 430448, "caption": "", "nama": "Mucosa mulut kering", "satuan": "", "type": "checkbox" },
                        { "id": 430449, "caption": "", "nama": "Bibir pucat", "satuan": "", "type": "checkbox" },
                        { "id": 430450, "caption": "", "nama": "Lain-lain :", "satuan": "", "type": "checkbox" },
                        { "id": 430451, "caption": "", "nama": "", "satuan": "", "type": "textbox2" },
                        { "id": 430452, "caption": "Lidah", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430453, "caption": "", "nama": "Tidak ada kelainan", "satuan": "", "type": "checkbox" },
                        { "id": 430454, "caption": "", "nama": "Kotor", "satuan": "", "type": "checkbox" },
                        { "id": 430455, "caption": "", "nama": "Gerakan asimetris", "satuan": "", "type": "checkbox" },
                        { "id": 430456, "caption": "", "nama": "Lain-lain :", "satuan": "", "type": "checkbox" },
                        { "id": 430457, "caption": "", "nama": "", "satuan": "", "type": "textbox2" },
                        { "id": 430458, "caption": "Oesofagus", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430459, "caption": "", "nama": "Tidak ada kelainan", "satuan": "", "type": "checkbox" },
                        { "id": 430460, "caption": "", "nama": "Lain-lain :", "satuan": "", "type": "checkbox" },
                        { "id": 430461, "caption": "", "nama": "", "satuan": "", "type": "textbox2" },
                        { "id": 430462, "caption": "Abdomen", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430463, "caption": "", "nama": "Supel", "satuan": "", "type": "checkbox" },
                        { "id": 430464, "caption": "", "nama": "Asites", "satuan": "", "type": "checkbox" },
                        { "id": 430465, "caption": "", "nama": "Tegang", "satuan": "", "type": "checkbox" },
                        { "id": 430466, "caption": "", "nama": "Bising usus :", "satuan": "", "type": "checkbox" },
                        { "id": 430467, "caption": "", "nama": "", "satuan": "x/menit", "type": "textbox2" },
                        { "id": 430468, "caption": "", "nama": "Lain-lain :", "satuan": "", "type": "checkbox" },
                        { "id": 430469, "caption": "", "nama": "", "satuan": "", "type": "textbox2" },
                        { "id": 430470, "caption": "BAB", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430471, "caption": "", "nama": "Normal", "satuan": "", "type": "checkbox" },
                        { "id": 430472, "caption": "", "nama": "Konstipasi", "satuan": "", "type": "checkbox" },
                        { "id": 430473, "caption": "", "nama": "melena", "satuan": "", "type": "checkbox" },
                        { "id": 430474, "caption": "", "nama": "Colostomy", "satuan": "", "type": "checkbox" },
                        { "id": 430475, "caption": "", "nama": "Diare, Frekuensi :", "satuan": "", "type": "checkbox" },
                        { "id": 430476, "caption": "", "nama": "", "satuan": "x/hari", "type": "textbox2" },
                        { "id": 430477, "caption": "", "nama": "Meco, pertama, tgl/jam :", "satuan": "", "type": "checkbox" },
                        { "id": 430478, "caption": "", "nama": "", "satuan": "", "type": "textbox2" }
                    ]
                }
            ];

            $scope.listSistemGenitourinaria = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 430479, "caption": "Warna", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430480, "caption": "", "nama": "Kuning", "satuan": "", "type": "checkbox" },
                        { "id": 430481, "caption": "", "nama": "Dempul", "satuan": "", "type": "checkbox" },
                        { "id": 430482, "caption": "", "nama": "Coklat", "satuan": "", "type": "checkbox" },
                        { "id": 430483, "caption": "", "nama": "Hijau", "satuan": "", "type": "checkbox" },
                        { "id": 430484, "caption": "", "nama": "Lain-lain :", "satuan": "", "type": "checkbox" },
                        { "id": 430485, "caption": "", "nama": "", "satuan": "", "type": "textbox2" },
                        { "id": 430486, "caption": "BAK", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430487, "caption": "", "nama": "Normal", "satuan": "", "type": "checkbox" },
                        { "id": 430488, "caption": "", "nama": "Hematuri", "satuan": "", "type": "checkbox" },
                        { "id": 430489, "caption": "", "nama": "Urin menetas", "satuan": "", "type": "checkbox" },
                        { "id": 430490, "caption": "", "nama": "Sakit,", "satuan": "", "type": "checkbox" },
                        { "id": 430491, "caption": "", "nama": "Oliguri", "satuan": "", "type": "checkbox" },
                        { "id": 430492, "caption": "", "nama": "BAK pertama, tgl/jam :", "satuan": "", "type": "checkbox" },
                        { "id": 430493, "caption": "", "nama": "", "satuan": "", "type": "textbox2" },
                        { "id": 430494, "caption": "Warna", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430495, "caption": "", "nama": "Jernih", "satuan": "", "type": "checkbox" },
                        { "id": 430496, "caption": "", "nama": "Kuning pekat", "satuan": "", "type": "checkbox" },
                        { "id": 430497, "caption": "", "nama": "Lain-lain :", "satuan": "", "type": "checkbox" },
                        { "id": 430498, "caption": "", "nama": "", "satuan": "", "type": "textbox2" }
                    ]
                }
            ];

            $scope.listSistemReproduksi = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 430499, "caption": "Laki-laki", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430500, "caption": "", "nama": "Normal", "satuan": "", "type": "checkbox" },
                        { "id": 430501, "caption": "", "nama": "Hipospadia", "satuan": "", "type": "checkbox" },
                        { "id": 430502, "caption": "", "nama": "Epispadia", "satuan": "", "type": "checkbox" },
                        { "id": 430503, "caption": "", "nama": "Fimosis", "satuan": "", "type": "checkbox" },
                        { "id": 430504, "caption": "", "nama": "Hidrokel", "satuan": "", "type": "checkbox" },
                        { "id": 430505, "caption": "", "nama": "Lain-lain :", "satuan": "", "type": "checkbox" },
                        { "id": 430506, "caption": "", "nama": "", "satuan": "", "type": "textbox2" },
                        { "id": 430507, "caption": "Perempuan", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430508, "caption": "", "nama": "Normal", "satuan": "", "type": "checkbox" },
                        { "id": 430509, "caption": "", "nama": "Keputihan", "satuan": "", "type": "checkbox" },
                        { "id": 430510, "caption": "", "nama": "Vagina skintag", "satuan": "", "type": "checkbox" },
                        { "id": 430511, "caption": "", "nama": "Lain-lain :", "satuan": "", "type": "checkbox" },
                        { "id": 430512, "caption": "", "nama": "", "satuan": "", "type": "textbox2" }
                    ]
                }
            ];

            $scope.listSistemIntegumen = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 430513, "caption": "Vernic kassosa", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430514, "caption": "", "nama": "Ada", "satuan": "", "type": "checkbox" },
                        { "id": 430515, "caption": "", "nama": "Tidak ada", "satuan": "", "type": "checkbox" },
                        { "id": 430516, "caption": "", "nama": "Lain-lain :", "satuan": "", "type": "checkbox" },
                        { "id": 430517, "caption": "", "nama": "", "satuan": "", "type": "textbox2" },
                        { "id": 430518, "caption": "Lanugo", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430519, "caption": "", "nama": "Tidak ada", "satuan": "", "type": "checkbox" },
                        { "id": 430520, "caption": "", "nama": "Banyak", "satuan": "", "type": "checkbox" },
                        { "id": 430521, "caption": "", "nama": "Tipis", "satuan": "", "type": "checkbox" },
                        { "id": 430522, "caption": "", "nama": "Bercak-bercak tanpa lanugo", "satuan": "", "type": "checkbox" },
                        { "id": 430523, "caption": "", "nama": "Sebagian besar tanpa lanugo", "satuan": "", "type": "checkbox" },
                        { "id": 430524, "caption": "Warna", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430525, "caption": "", "nama": "Pucat", "satuan": "", "type": "checkbox" },
                        { "id": 430526, "caption": "", "nama": "Ikterik", "satuan": "", "type": "checkbox" },
                        { "id": 430527, "caption": "", "nama": "Sianosis", "satuan": "", "type": "checkbox" },
                        { "id": 430528, "caption": "", "nama": "Normal", "satuan": "", "type": "checkbox" },
                        { "id": 430529, "caption": "", "nama": "Lain-lain :", "satuan": "", "type": "checkbox" },
                        { "id": 430530, "caption": "", "nama": "", "satuan": "", "type": "textbox2" },
                        { "id": 430531, "caption": "Tugor", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430532, "caption": "", "nama": "Baik", "satuan": "", "type": "checkbox" },
                        { "id": 430533, "caption": "", "nama": "Sedang", "satuan": "", "type": "checkbox" },
                        { "id": 430534, "caption": "", "nama": "Buruk", "satuan": "", "type": "checkbox" },
                        { "id": 430535, "caption": "Kulit", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430536, "caption": "", "nama": "Normal", "satuan": "", "type": "checkbox" },
                        { "id": 430537, "caption": "", "nama": "Rash kemerahan", "satuan": "", "type": "checkbox" },
                        { "id": 430538, "caption": "", "nama": "Lesi", "satuan": "", "type": "checkbox" },
                        { "id": 430539, "caption": "", "nama": "Luka", "satuan": "", "type": "checkbox" },
                        { "id": 430540, "caption": "", "nama": "Memar", "satuan": "", "type": "checkbox" },
                        { "id": 430541, "caption": "", "nama": "Plachie", "satuan": "", "type": "checkbox" },
                        { "id": 430542, "caption": "", "nama": "Bula", "satuan": "", "type": "checkbox" },
                        { "id": 430543, "caption": "Kriteria resiko dekubitas", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430544, "caption": "", "nama": "Jaringan/elastisitas kulit kurang", "satuan": "", "type": "checkbox" },
                        { "id": 430545, "caption": "", "nama": "Immobilisasi", "satuan": "", "type": "checkbox" },
                        { "id": 430546, "caption": "", "nama": "Dirawat perina/NICU", "satuan": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listSistemMuskuloskeletal = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 430547, "caption": "Lengan", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430548, "caption": "", "nama": "Fleksi", "satuan": "", "type": "checkbox" },
                        { "id": 430549, "caption": "", "nama": "Ekstensi", "satuan": "", "type": "checkbox" },
                        { "id": 430550, "caption": "", "nama": "Pergerakan aktif", "satuan": "", "type": "checkbox" },
                        { "id": 430551, "caption": "", "nama": "Pergerakan tidak aktif", "satuan": "", "type": "checkbox" },
                        { "id": 430552, "caption": "", "nama": "Lain-lain :", "satuan": "", "type": "checkbox" },
                        { "id": 430553, "caption": "", "nama": "", "satuan": "", "type": "textbox2" },
                        { "id": 430554, "caption": "Tungkai", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430555, "caption": "", "nama": "Fleksi", "satuan": "", "type": "checkbox" },
                        { "id": 430556, "caption": "", "nama": "Ekstensi", "satuan": "", "type": "checkbox" },
                        { "id": 430557, "caption": "", "nama": "Pergerakan aktif", "satuan": "", "type": "checkbox" },
                        { "id": 430558, "caption": "", "nama": "Pergerakan tidak aktif", "satuan": "", "type": "checkbox" },
                        { "id": 430559, "caption": "", "nama": "Lain-lain :", "satuan": "", "type": "checkbox" },
                        { "id": 430560, "caption": "", "nama": "", "satuan": "", "type": "textbox2" },
                        { "id": 430561, "caption": "Rekoil telinga", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430562, "caption": "", "nama": "Rekoil lambat", "satuan": "", "type": "checkbox" },
                        { "id": 430563, "caption": "", "nama": "Rekoil cepat", "satuan": "", "type": "checkbox" },
                        { "id": 430564, "caption": "", "nama": "Rekoil segera", "satuan": "", "type": "checkbox" },
                        { "id": 430565, "caption": "", "nama": "Lain-lain :", "satuan": "", "type": "checkbox" },
                        { "id": 430566, "caption": "", "nama": "", "satuan": "", "type": "textbox2" },
                        { "id": 430567, "caption": "Garis telapak tangan", "nama": "", "satuan": "", "type": "label" },
                        { "id": 430568, "caption": "", "nama": "Tipis", "satuan": "", "type": "checkbox" },
                        { "id": 430569, "caption": "", "nama": "Garis tranversal anterior", "satuan": "", "type": "checkbox" },
                        { "id": 430570, "caption": "", "nama": "Garis 2/3 anterior", "satuan": "", "type": "checkbox" },
                        { "id": 430571, "caption": "", "nama": "Seluruh telapak kaki", "satuan": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listSpiritual = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 430572, "caption": "Agama", "nama": "", "type": "label" },
                        { "id": 430573, "caption": "", "nama": "Islam", "type": "checkbox" },
                        { "id": 430574, "caption": "", "nama": "Kristen", "type": "checkbox" },
                        { "id": 430575, "caption": "", "nama": "Hindu", "type": "checkbox" },
                        { "id": 430576, "caption": "", "nama": "Budha", "type": "checkbox" },
                        { "id": 430577, "caption": "", "nama": "Lain-lain, Sebutkan :", "type": "checkbox" },
                        { "id": 430578, "caption": "", "nama": "", "type": "textbox2" },
                        { "id": 430579, "caption": "Mengungkapkan keprihatinan yang berhubungan dengan rawat inap", "nama": "", "type": "label" },
                        { "id": 430580, "caption": "", "nama": "Tidak", "type": "checkbox" },
                        { "id": 430581, "caption": "", "nama": "Ya, Sebutkan alasan", "type": "checkbox" },
                        { "id": 430582, "caption": "", "nama": "", "type": "textbox2" },
                        { "id": 430583, "caption": "", "nama": "Konflik antara kepercayaan spiritual dengan ketentuan sistem kesehatan", "type": "checkbox2" },
                        { "id": 430584, "caption": "", "nama": "Bimbingan rohani", "type": "checkbox" },
                        { "id": 430585, "caption": "", "nama": "Lain-lain :", "type": "checkbox" },
                        { "id": 430586, "caption": "", "nama": "", "type": "textbox2" }
                    ]
                }
            ];

            $scope.listStatusPsikologis = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 430587, "nama": "Tenang", "type": "checkbox" },
                        { "id": 430588, "nama": "Cemas", "type": "checkbox" },
                        { "id": 430589, "nama": "Sedih", "type": "checkbox" },
                        { "id": 430590, "nama": "Depresi", "type": "checkbox" },
                        { "id": 430591, "nama": "Marah", "type": "checkbox" },
                        { "id": 430592, "nama": "Hiperaktif", "type": "checkbox" },
                        { "id": 430593, "nama": "Mengganggu sekitar", "type": "checkbox" },
                        { "id": 430594, "nama": "Lain-lain :", "type": "checkbox" },
                        { "id": 430595, "nama": "", "type": "textbox2" }
                    ]
                }
            ];

            $scope.listPengkajianNyeri = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 430596, "caption": "Nyeri", "nama": "", "type": "label" },
                        { "id": 430597, "caption": "", "nama": "Tidak ada", "type": "checkbox" },
                        { "id": 430598, "caption": "", "nama": "Ada < skala nyeri ", "type": "checkbox" },
                        { "id": 430599, "caption": "", "nama": "", "type": "textbox2" },
                        { "id": 430600, "caption": "Tipe", "nama": "", "type": "label" },
                        { "id": 430601, "caption": "", "nama": "Akut", "type": "checkbox" },
                        { "id": 430602, "caption": "", "nama": "Kronis, diskripsi", "type": "checkbox" },
                        { "id": 430603, "caption": "", "nama": "", "type": "textbox2" },
                        { "id": 430604, "caption": "Frekuensi", "nama": "", "type": "label" },
                        { "id": 430605, "caption": "", "nama": "Jarang", "type": "checkbox" },
                        { "id": 430606, "caption": "", "nama": "Hilang timbul", "type": "checkbox" },
                        { "id": 430607, "caption": "", "nama": "Terus menerus", "type": "checkbox" },
                        { "id": 430608, "caption": "", "nama": "Lama nyeri :", "type": "checkbox" },
                        { "id": 430609, "caption": "", "nama": "", "type": "textbox2" }
                    ]
                }
            ];

            $scope.listHasilPemantauan = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 430610, "caption": "Wajah", "type": "label", "descNilai": 0 },
                        { "id": 430611, "caption": "Tidak ada eskpresi khusus (seperti senyum)", "type": "label", "descNilai": 0 },
                        { "id": 430612, "caption": "0", "type": "label2", "descNilai": 0 },
                        { "id": 430613, "caption": "", "type": "checkbox", "descNilai": 0 }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 430614, "caption": "Wajah", "type": "label", "descNilai": 0 },
                        { "id": 430615, "caption": "Kadang meringis dan mengerutkan dahi, rahang", "type": "label", "descNilai": 0 },
                        { "id": 430616, "caption": "1", "type": "label2", "descNilai": 1 },
                        { "id": 430617, "caption": "", "type": "checkbox", "descNilai": 1 }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 430618, "caption": "Wajah", "type": "label", "descNilai": 0 },
                        { "id": 430619, "caption": "Sering/terus menerus mengerutkan dahi, rahang mengatup, dagu bergetar", "type": "label", "descNilai": 0 },
                        { "id": 430620, "caption": "2", "type": "label2", "descNilai": 0 },
                        { "id": 430621, "caption": "", "type": "checkbox", "descNilai": 2 }
                    ]
                },
                {
                    "id": 4,
                    "detail": [
                        { "id": 430622, "caption": "Ekstremitas", "type": "label", "descNilai": 0 },
                        { "id": 430623, "caption": "Posisi normal/rileks", "type": "label", "descNilai": 0 },
                        { "id": 430624, "caption": "0", "type": "label2", "descNilai": 0 },
                        { "id": 430625, "caption": "", "type": "checkbox", "descNilai": 0 }
                    ]
                },
                {
                    "id": 5,
                    "detail": [
                        { "id": 430626, "caption": "Ekstremitas", "type": "label", "descNilai": 0 },
                        { "id": 430627, "caption": "Tidak senang, gelisah, tegang", "type": "label", "descNilai": 0 },
                        { "id": 430628, "caption": "1", "type": "label2", "descNilai": 0 },
                        { "id": 430629, "caption": "", "type": "checkbox", "descNilai": 1 }
                    ]
                },
                {
                    "id": 6,
                    "detail": [
                        { "id": 430630, "caption": "Ekstremitas", "type": "label", "descNilai": 0 },
                        { "id": 430631, "caption": "Menendang/menarik kaki", "type": "label", "descNilai": 0 },
                        { "id": 430632, "caption": "2", "type": "label2", "descNilai": 0 },
                        { "id": 430633, "caption": "", "type": "checkbox", "descNilai": 2 }
                    ]
                },
                {
                    "id": 7,
                    "detail": [
                        { "id": 430634, "caption": "Gerakan", "type": "label", "descNilai": 0 },
                        { "id": 430635, "caption": "Berbaring tenang, posisi normal, bergerak mudah", "type": "label", "descNilai": 0 },
                        { "id": 430636, "caption": "0", "type": "label2", "descNilai": 0 },
                        { "id": 430637, "caption": "", "type": "checkbox", "descNilai": 0 }
                    ]
                },
                {
                    "id": 8,
                    "detail": [
                        { "id": 430638, "caption": "Gerakan", "type": "label", "descNilai": 0 },
                        { "id": 430639, "caption": "Menggeliat-geliat, bolak-balik berpindah, tegang", "type": "label", "descNilai": 0 },
                        { "id": 430640, "caption": "1", "type": "label2", "descNilai": 0 },
                        { "id": 430641, "caption": "", "type": "checkbox", "descNilai": 1 }
                    ]
                },
                {
                    "id": 9,
                    "detail": [
                        { "id": 430642, "caption": "Gerakan", "type": "label", "descNilai": 0 },
                        { "id": 430643, "caption": "Posisi tubuh meringkuk, kaku/spasme/menyentak", "type": "label", "descNilai": 0 },
                        { "id": 430644, "caption": "2", "type": "label2", "descNilai": 0 },
                        { "id": 430645, "caption": "", "type": "checkbox", "descNilai": 2 }
                    ]
                },
                {
                    "id": 10,
                    "detail": [
                        { "id": 430646, "caption": "Menangis", "type": "label", "descNilai": 0 },
                        { "id": 430647, "caption": "Tidak menangis", "type": "label", "descNilai": 0 },
                        { "id": 430648, "caption": "0", "type": "label2", "descNilai": 0 },
                        { "id": 430649, "caption": "", "type": "checkbox", "descNilai": 0 }
                    ]
                },
                {
                    "id": 11,
                    "detail": [
                        { "id": 430650, "caption": "Menangis", "type": "label", "descNilai": 0 },
                        { "id": 430651, "caption": "Merintih, merengek, kadang mengeluh", "type": "label", "descNilai": 0 },
                        { "id": 430652, "caption": "1", "type": "label2", "descNilai": 0 },
                        { "id": 430653, "caption": "", "type": "checkbox", "descNilai": 1 }
                    ]
                },
                {
                    "id": 12,
                    "detail": [
                        { "id": 430654, "caption": "Menangis", "type": "label", "descNilai": 0 },
                        { "id": 430655, "caption": "Menangis tersedu-sedu, terisak-isak, menjerit", "type": "label", "descNilai": 0 },
                        { "id": 430656, "caption": "2", "type": "label2", "descNilai": 0 },
                        { "id": 430657, "caption": "", "type": "checkbox", "descNilai": 2 }
                    ]
                },
                {
                    "id": 13,
                    "detail": [
                        { "id": 430658, "caption": "Kemampuan ditenangkan", "type": "label", "descNilai": 0 },
                        { "id": 430659, "caption": "Senang, rileks", "type": "label", "descNilai": 0 },
                        { "id": 430660, "caption": "0", "type": "label2", "descNilai": 0 },
                        { "id": 430661, "caption": "", "type": "checkbox", "descNilai": 0 }
                    ]
                },
                {
                    "id": 14,
                    "detail": [
                        { "id": 430662, "caption": "Kemampuan ditenangkan", "type": "label", "descNilai": 0 },
                        { "id": 430663, "caption": "Dapat ditenangkan dengan sentuhan, pelukan, berbicara, dapat dialihkan", "type": "label", "descNilai": 0 },
                        { "id": 430664, "caption": "1", "type": "label2", "descNilai": 0 },
                        { "id": 430665, "caption": "", "type": "checkbox", "descNilai": 1 }
                    ]
                },
                {
                    "id": 15,
                    "detail": [
                        { "id": 430666, "caption": "Kemampuan ditenangkan", "type": "label", "descNilai": 0 },
                        { "id": 430667, "caption": "Sulit/tidak dapat ditenangkan dengan pelukan, sentuhan atau distraksi", "type": "label", "descNilai": 0 },
                        { "id": 430668, "caption": "2", "type": "label2", "descNilai": 0 },
                        { "id": 430669, "caption": "", "type": "checkbox", "descNilai": 2 }
                    ]
                }
            ];

            $scope.listKebutuhanKomunikasi = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 430672, "caption": "Bicara", "nama": "", "type": "label" },
                        { "id": 430673, "caption": "", "nama": "Normal", "type": "checkbox" },
                        { "id": 430674, "caption": "", "nama": "Tidak gangguan", "type": "checkbox" },
                        { "id": 430675, "caption": "", "nama": "", "type": "textbox2" },
                        { "id": 430676, "caption": "Berbahasa sehari-hari", "nama": "", "type": "textbox" },
                        { "id": 430677, "caption": "Penterjemah", "nama": "", "type": "label" },
                        { "id": 430678, "caption": "", "nama": "Tidak", "type": "checkbox" },
                        { "id": 430679, "caption": "", "nama": "Ya, bahasa :", "type": "checkbox" },
                        { "id": 430680, "caption": "", "nama": "", "type": "textbox2" },
                        { "id": 430681, "caption": "", "nama": "Bahasa isyarat", "type": "checkbox" },
                        { "id": 430682, "caption": "", "nama": "Ya", "type": "checkbox" },
                        { "id": 430683, "caption": "", "nama": "Tidak", "type": "checkbox" },
                        { "id": 430684, "caption": "Masalah penglihatan", "nama": "", "type": "label" },
                        { "id": 430685, "caption": "", "nama": "Ya", "type": "checkbox" },
                        { "id": 430686, "caption": "", "nama": "Tidak, sebutkan :", "type": "checkbox" },
                        { "id": 430687, "caption": "", "nama": "", "type": "textbox2" },
                        { "id": 430688, "caption": "Pendidikan penanngung jawab", "nama": "", "type": "label" },
                        { "id": 430689, "caption": "", "nama": "SD", "type": "checkbox" },
                        { "id": 430690, "caption": "", "nama": "SMP", "type": "checkbox" },
                        { "id": 430691, "caption": "", "nama": "SMA", "type": "checkbox" },
                        { "id": 430692, "caption": "", "nama": "Akademi/PT", "type": "checkbox" },
                        { "id": 430693, "caption": "", "nama": "Pasca sarjana", "type": "checkbox" },
                        { "id": 430694, "caption": "", "nama": "Lain-lain :", "type": "checkbox" },
                        { "id": 430695, "caption": "", "nama": "", "type": "textbox2" },
                        { "id": 430696, "caption": "Pasien atau keluarga menginginkan informasi tentang", "nama": "", "type": "label" },
                        { "id": 430697, "caption": "", "nama": "Proses penyakit", "type": "checkbox" },
                        { "id": 430698, "caption": "", "nama": "Gizi / nutrisi", "type": "checkbox" },
                        { "id": 430699, "caption": "", "nama": "Terapi / obat", "type": "checkbox" },
                        { "id": 430700, "caption": "", "nama": "Peralatan medis", "type": "checkbox" },
                        { "id": 430701, "caption": "", "nama": "Tindakan / pemeriksaan", "type": "checkbox" },
                        { "id": 430702, "caption": "", "nama": "Lain-lain :", "type": "checkbox" },
                        { "id": 430703, "caption": "", "nama": "", "type": "textbox2" }
                    ]
                }
            ];

            $scope.listKebutuhanPrivacy = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 430704, "nama": "Keinginan / waktu tempat wawancara tindakan", "type": "checkbox" },
                        { "id": 430705, "nama": "Pengobatan", "type": "checkbox" },
                        { "id": 430706, "nama": "Kondisi penyakit", "type": "checkbox" },
                        { "id": 430707, "nama": "Transportas", "type": "checkbox" },
                        { "id": 430708, "nama": "Lain-lain :", "type": "checkbox2" },
                        { "id": 430709, "nama": "", "type": "textbox2" }
                    ]
                }
            ];

            $scope.listScrinnigGizi = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 430710, "caption": "1. Minum", "nama": "", "type": "label" },
                        { "id": 430711, "caption": "", "nama": "Asi", "type": "checkbox" },
                        { "id": 430712, "caption": "", "nama": "PASI", "type": "checkbox" },
                        { "id": 430713, "caption": "", "nama": "Frekuensi :", "type": "checkbox" },
                        { "id": 430714, "caption": "", "nama": "", "type": "textbox2" },
                        { "id": 430715, "caption": "Masalah", "nama": "", "type": "label" },
                        { "id": 430716, "caption": "", "nama": "Ada scoring (1)", "type": "checkbox" },
                        { "id": 430717, "caption": "", "nama": "Tidak ada scoring (0)", "type": "checkbox" },
                        { "id": 430718, "caption": "2. Penurunan BB", "nama": "", "type": "label" },
                        { "id": 430719, "caption": "", "nama": "<= 10% dari BBL (0)", "type": "checkbox" },
                        { "id": 430720, "caption": "", "nama": ">= 10% dari BBL (1)", "type": "checkbox" },
                        { "id": 430721, "caption": "3. Penyakit yang menyertai jika scoringnya 2", "nama": "", "type": "label" },
                        { "id": 430722, "caption": "", "nama": "Sepsis", "type": "checkbox" },
                        { "id": 430723, "caption": "", "nama": "Jantung", "type": "checkbox" },
                        { "id": 430724, "caption": "", "nama": "BBLR", "type": "checkbox" },
                        { "id": 430725, "caption": "", "nama": "Hypoglikemi", "type": "checkbox" },
                        { "id": 430726, "caption": "", "nama": "Diarhoe", "type": "checkbox" },
                        { "id": 430727, "caption": "", "nama": "Lain-lain :", "type": "checkbox" },
                        { "id": 430728, "caption": "", "nama": "", "type": "textbox2" },
                        { "id": 430729, "caption": "Total Skor", "nama": "", "type": "label" },
                        { "id": 430730, "caption": "Jika skor < 2 diet yang diberikan", "nama": "", "type": "label" },
                        { "id": 430731, "caption": "", "nama": "ASI", "type": "checkbox" },
                        { "id": 430732, "caption": "", "nama": "PASI", "type": "checkbox" },
                        { "id": 430733, "caption": "", "nama": "Per Oral / NGT / OGT", "type": "checkbox" },
                        { "id": 430734, "caption": "Jika skor >= 2", "nama": "", "type": "label" },
                        { "id": 430735, "caption": "", "nama": "Lapor DPJP", "type": "checkbox" },
                        { "id": 430736, "caption": "", "nama": "Asesmen lanjut oleh ahli gizi", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listMasalahKeperawatan = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 430737, "caption": "", "nama": "Nyeri", "type": "checkbox" },
                        { "id": 430738, "caption": "", "nama": "Nutrisi", "type": "checkbox" },
                        { "id": 430739, "caption": "", "nama": "Mobilitas / aktifitas", "type": "checkbox" },
                        { "id": 430740, "caption": "", "nama": "Pengetahuan / komunikasi", "type": "checkbox" },
                        { "id": 430741, "caption": "", "nama": "Infeksi", "type": "checkbox" },
                        { "id": 430742, "caption": "", "nama": "Keselamatan pasien", "type": "checkbox" },
                        { "id": 430743, "caption": "", "nama": "Suhu tubuh", "type": "checkbox" },
                        { "id": 430744, "caption": "", "nama": "Eliminasi", "type": "checkbox" },
                        { "id": 430745, "caption": "", "nama": "Keseimbangan cairan / elektrolit", "type": "checkbox" },
                        { "id": 430746, "caption": "", "nama": "Peningkatan bilirubin", "type": "checkbox" },
                        { "id": 430747, "caption": "", "nama": "Perfusi jaringan", "type": "checkbox" },
                        { "id": 430748, "caption": "", "nama": "Pola nafas", "type": "checkbox" },
                        { "id": 430749, "caption": "", "nama": "Integritas kulit", "type": "checkbox" },
                        { "id": 430750, "caption": "", "nama": "Jalan nafas / pertukaran gas", "type": "checkbox" },
                        { "id": 430751, "caption": "", "nama": "Lain-lain :", "type": "checkbox" },
                        { "id": 430752, "caption": "", "nama": "", "type": "textbox2" },
                        { "id": 430753, "caption": "Rencana keperawatan", "nama": "", "type": "label" },
                        { "id": 430754, "caption": "1", "nama": "", "type": "textbox" },
                        { "id": 430755, "caption": "2", "nama": "", "type": "textbox" }
                    ]
                }
            ];

            $scope.listPerencanaanPerawatan = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 430756, "caption": "1. Diet dan nutrisi", "nama": "", "type": "label" },
                        { "id": 430757, "caption": "", "nama": "Tidak", "type": "checkbox" },
                        { "id": 430758, "caption": "", "nama": "Ya :", "type": "checkbox" },
                        { "id": 430759, "caption": "", "nama": "", "type": "textbox2" },
                        { "id": 430760, "caption": "2. Rehabilitas medik", "nama": "", "type": "label" },
                        { "id": 430761, "caption": "", "nama": "Tidak", "type": "checkbox" },
                        { "id": 430762, "caption": "", "nama": "Ya :", "type": "checkbox" },
                        { "id": 430763, "caption": "", "nama": "", "type": "textbox2" },
                        { "id": 430764, "caption": "3. Farmasi", "nama": "", "type": "label" },
                        { "id": 430765, "caption": "", "nama": "Tidak", "type": "checkbox" },
                        { "id": 430766, "caption": "", "nama": "Ya :", "type": "checkbox" },
                        { "id": 430767, "caption": "", "nama": "", "type": "textbox2" },
                        { "id": 430768, "caption": "4. Perawatan luka", "nama": "", "type": "label" },
                        { "id": 430769, "caption": "", "nama": "Tidak", "type": "checkbox" },
                        { "id": 430770, "caption": "", "nama": "Ya :", "type": "checkbox" },
                        { "id": 430771, "caption": "", "nama": "", "type": "textbox2" },
                        { "id": 430772, "caption": "5. Manajemen nyeri", "nama": "", "type": "label" },
                        { "id": 430773, "caption": "", "nama": "Tidak", "type": "checkbox" },
                        { "id": 430774, "caption": "", "nama": "Ya :", "type": "checkbox" },
                        { "id": 430775, "caption": "", "nama": "", "type": "textbox2" },
                        { "id": 430776, "caption": "6. Lain-lain", "nama": "", "type": "label" },
                        { "id": 430777, "caption": "", "nama": "Tidak", "type": "checkbox" },
                        { "id": 430778, "caption": "", "nama": "Ya :", "type": "checkbox" },
                        { "id": 430779, "caption": "", "nama": "", "type": "textbox2" }
                    ]
                }
            ];

            $scope.listPerencaanPulang = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 430780, "caption": "Pasien dan keluarga diberikan informasi tentang perencanaan pulang", "nama": "", "type": "label" },
                        { "id": 430781, "caption": "", "nama": "Tidak", "type": "checkbox" },
                        { "id": 430782, "caption": "", "nama": "Ya", "type": "checkbox" },
                        { "id": 430783, "caption": "1. Lama perawatan rata-rata", "nama": "", "type": "textbox", "satuan": "hari" },
                        { "id": 430784, "caption": "2. Tanggal perencanaan pulang", "nama": "", "type": "date" },
                        { "id": 430785, "caption": "3. Perawatan lanjutan yang diberikan dirumah", "nama": "", "type": "label" },
                        { "id": 430786, "caption": "", "nama": "Hygiene (BAB, BAK, Mandi)", "type": "checkbox" },
                        { "id": 430787, "caption": "", "nama": "Perawatan luka", "type": "checkbox" },
                        { "id": 430788, "caption": "", "nama": "Perawatan bayi", "type": "checkbox" },
                        { "id": 430789, "caption": "", "nama": "Pemberian obat", "type": "checkbox" },
                        { "id": 430790, "caption": "", "nama": "Pemberian minum NGT / sendok / dot", "type": "checkbox" },
                        { "id": 430791, "caption": "", "nama": "Nutrisi", "type": "checkbox" },
                        { "id": 430792, "caption": "", "nama": "Pemeriksaan laboratrium lanjutan", "type": "checkbox" },
                        { "id": 430793, "caption": "", "nama": "Penyakit / diagnosis", "type": "checkbox" },
                        { "id": 430794, "caption": "", "nama": "Lain-lain", "type": "checkbox" },
                        { "id": 430795, "caption": "4. Bayi tinggal bersama", "nama": "", "type": "label" },
                        { "id": 430796, "caption": "", "nama": "OT Kandung", "type": "checkbox" },
                        { "id": 430797, "caption": "", "nama": "Keluarga", "type": "checkbox" },
                        { "id": 430798, "caption": "", "nama": "", "type": "textbox2" },
                        { "id": 430799, "caption": "5. Transportasi yang digunakan", "nama": "", "type": "label" },
                        { "id": 430800, "caption": "", "nama": "Kendaraan pribadi (mobil, roda dua, dll)", "type": "checkbox" },
                        { "id": 430801, "caption": "", "nama": "Kendaraan umum", "type": "checkbox" },
                        { "id": 430802, "caption": "", "nama": "Mobil ambulance", "type": "checkbox" },
                        { "id": 430803, "caption": "", "nama": "Lain-lain", "type": "checkbox" },
                        { "id": 430804, "caption": "", "nama": "", "type": "textbox2" }
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

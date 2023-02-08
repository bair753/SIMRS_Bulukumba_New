define(['initialize'], function (initialize) {
    'use strict';
    initialize.controller('PengkajianHarianPeritonealDialisisCtrl', ['$q', '$rootScope', '$scope', 'ModelItem', '$state', 'CacheHelper', 'DateHelper', 'MedifirstService',
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
            $scope.cc.emrfk = 290051;
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
                $scope.item.obj[429389] = $scope.now;
                medifirstService.get("emr/get-antrian-pasien-norec/" + noregistrasifk).then(function (e) {
                    var antrianPasien = e.data.result;
                    if (antrianPasien.objectruanganfk != null && antrianPasien.namaruangan != null) {
                        $scope.item.obj[429249] = {
                            value: antrianPasien.objectruanganfk,
                            text: antrianPasien.namaruangan
                        }
                    }
                    // if (antrianPasien.iddpjp != null && antrianPasien.dokterdpjp != null) {
                    //     $scope.item.obj[428920] = {
                    //         value: antrianPasien.iddpjp,
                    //         text: antrianPasien.dokterdpjp
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
                        'Pengkajian Harian Peritoneal Dialisis ' + ' dengan No EMR - ' + e.data.data.noemr + ' pada No Registrasi '
                        + $scope.cc.noregistrasi).then(function (res) {
                        })

                    $rootScope.loadRiwayat()
                    var arrStr = {
                        0: e.data.data.noemr
                    }
                    cacheHelper.set('cacheNomorEMR', arrStr);
                });
            }

            $scope.listPengkajian = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 429251, "nama": "", "caption": "Diagnosa Medis", "type": "textbox" },
                        { "id": 429252, "nama": "", "caption": "Alergi Obat", "type": "label" },
                        { "id": 429253, "nama": "Tidak", "caption": "", "type": "checkbox" },
                        { "id": 429254, "nama": "Ya, ", "caption": "", "type": "checkbox" },
                        { "id": 429255, "nama": "", "caption": "", "type": "textbox2" },
                        { "id": 429256, "nama": "", "caption": "Pengkajian Keperawatan", "type": "label" },
                        { "id": 429257, "nama": "", "caption": "Keluhan Utama", "type": "label" },
                        { "id": 429258, "nama": "Sesak", "caption": "", "type": "checkbox" },
                        { "id": 429259, "nama": "Lemas", "caption": "", "type": "checkbox" },
                        { "id": 429260, "nama": "Demam", "caption": "", "type": "checkbox" },
                        { "id": 429261, "nama": "Mual/Muntah", "caption": "", "type": "checkbox" },
                        { "id": 429262, "nama": "Gatal", "caption": "", "type": "checkbox" },
                        { "id": 429263, "nama": "", "caption": "", "type": "checkbox2" },
                        { "id": 429264, "nama": "", "caption": "", "type": "textbox2" },
                        { "id": 429265, "nama": "", "caption": "Nyeri", "type": "label" },
                        { "id": 429266, "nama": "Tidak", "caption": "", "type": "checkbox" },
                        { "id": 429267, "nama": "Ya", "caption": "", "type": "checkbox" },
                        { "id": 429268, "nama": "", "caption": "Onset", "type": "label" },
                        { "id": 429269, "nama": "Akut", "caption": "", "type": "checkbox" },
                        { "id": 429270, "nama": "Kronis", "caption": "", "type": "checkbox" },
                        { "id": 429271, "nama": "", "caption": "Pencetus", "type": "textbox" },
                        { "id": 429272, "nama": "", "caption": "Gambaran Nyeri", "type": "textbox" },
                        { "id": 429273, "nama": "", "caption": "Lokasi", "type": "textbox" },
                        { "id": 429274, "nama": "", "caption": "Durasi", "type": "textbox" },
                        { "id": 429275, "nama": "", "caption": "Frekuensi", "type": "textbox" },
                        { "id": 429276, "nama": "", "caption": "Skala", "type": "textbox" },
                        { "id": 429277, "nama": "", "caption": "Metode", "type": "textbox" }
                    ]
                }
            ];

            $scope.listPemeriksaanFisik = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 429278, "nama": "", "caption": "Keadaan Umum", "type": "label", "satuan": "" },
                        { "id": 429279, "nama": "Baik", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 429280, "nama": "Sedang", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 429281, "nama": "Buruk", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 429282, "nama": "", "caption": "Tingkat Kesadaran", "type": "label", "satuan": "" },
                        { "id": 429283, "nama": "Composmentis", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 429284, "nama": "Apatis", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 429285, "nama": "Delirium", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 429286, "nama": "Samnolen", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 429287, "nama": "", "caption": "", "type": "checkbox2", "satuan": "" },
                        { "id": 429288, "nama": "", "caption": "", "type": "textbox2", "satuan": "" },
                        { "id": 429289, "nama": "", "caption": "Tanda Vital", "type": "label", "satuan": "" },
                        { "id": 429290, "nama": "", "caption": "Tekanan Darah", "type": "textbox", "satuan": "mmHg" },
                        { "id": 429291, "nama": "", "caption": "Respirasi", "type": "textbox", "satuan": "kali/menit" },
                        { "id": 429292, "nama": "", "caption": "Berat Badan", "type": "textbox", "satuan": "kg" },
                        { "id": 429293, "nama": "", "caption": "Tinggi Badan", "type": "textbox", "satuan": "cm" },
                        { "id": 429294, "nama": "", "caption": "Nadi", "type": "textbox", "satuan": "kali/menit" },
                        { "id": 429295, "nama": "", "caption": "Suhu", "type": "textbox", "satuan": "C" },
                        { "id": 429296, "nama": "", "caption": "Berat Badan Kering", "type": "textbox", "satuan": "kg" },
                        { "id": 429297, "nama": "", "caption": "Konjungtiva", "type": "textbox", "satuan": "" },
                        { "id": 429298, "nama": "", "caption": "Ekstremitas", "type": "label", "satuan": "" },
                        { "id": 429299, "nama": "Edema", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 429300, "nama": "Tidak Edema", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 429301, "nama": "Edema Anasarka", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 429302, "nama": "", "caption": "", "type": "checkbox2", "satuan": "" },
                        { "id": 429303, "nama": "", "caption": "", "type": "textbox2", "satuan": "" }
                    ]
                }
            ];

            $scope.listPengkajianPsikologi = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 429315, "nama": "", "caption": "Tanggal pengkajian", "type": "date" },
                        { "id": 429316, "nama": "", "caption": "Apakah keyakinan/tradisi/budaya yang berkaitan dengan pelayanan kesehatan yang akan diberikan", "type": "label" },
                        { "id": 429317, "nama": "Tidak ada", "caption": "", "type": "checkbox" },
                        { "id": 429318, "nama": "Ada", "caption": "", "type": "checkbox" },
                        { "id": 429319, "nama": "", "caption": "Kendala komunikasi", "type": "label" },
                        { "id": 429320, "nama": "Tidak ada", "caption": "", "type": "checkbox" },
                        { "id": 429321, "nama": "Ada, Jelaskan :", "caption": "", "type": "checkbox" },
                        { "id": 429322, "nama": "", "caption": "", "type": "textbox2" },
                        { "id": 429323, "nama": "", "caption": "Yang merawat dirumah", "type": "label" },
                        { "id": 429324, "nama": "Tidak ada", "caption": "", "type": "checkbox" },
                        { "id": 429325, "nama": "Ada, jelaskan :", "caption": "", "type": "checkbox" },
                        { "id": 429326, "nama": "", "caption": "", "type": "textbox2" },
                        { "id": 429327, "nama": "", "caption": "Kondisi saat ini", "type": "label" },
                        { "id": 429328, "nama": "Tenang", "caption": "", "type": "checkbox" },
                        { "id": 429329, "nama": "Gelisah", "caption": "", "type": "checkbox" },
                        { "id": 429330, "nama": "Marah", "caption": "", "type": "checkbox" },
                        { "id": 429331, "nama": "", "caption": "", "type": "checkbox2" },
                        { "id": 429332, "nama": "", "caption": "", "type": "textbox2" }
                    ]
                }
            ];

            $scope.listDiagnosaKeperawatan = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 429334, "nama": "Kelebihan volume cairan tubuh", "type": "checkbox3" },
                        { "id": 429335, "nama": "Kekurangan volume cairan", "type": "checkbox3" },
                        { "id": 429336, "nama": "Gangguan pertukaran gas", "type": "checkbox3" },
                        { "id": 429337, "nama": "Gangguan rasa nyaman", "type": "checkbox3" },
                        { "id": 429338, "nama": "Resiko ketidakseimbangan elektrolit", "type": "checkbox3" },
                        { "id": 429339, "nama": "Nausea", "type": "checkbox3" },
                        { "id": 429340, "nama": "Kerusakan integritas jaringan", "type": "checkbox3" },
                        { "id": 429341, "nama": "Intoleran aktivitas", "type": "checkbox3" },
                        { "id": 429342, "nama": "Nutrisi kurang dari kebutuhan tubuh", "type": "checkbox3" },
                        { "id": 429343, "nama": "Nyeri", "type": "checkbox" },
                        { "id": 429344, "nama": "", "type": "textbox2" },
                        { "id": 429345, "nama": "Resiko Infeksi", "type": "checkbox3" },
                        { "id": 429346, "nama": "", "type": "checkbox2" },
                        { "id": 429347, "nama": "", "type": "textbox2" }
                    ]
                }
            ];

            $scope.listIntervensiKeperawatan = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 429348, "nama": "Monitor Intake dan output cairan", "type": "checkbox3" },
                        { "id": 429349, "nama": "Monitor exit site kateter", "type": "checkbox3" },
                        { "id": 429350, "nama": "Monitor berat badan", "type": "checkbox3" },
                        { "id": 429351, "nama": "Manajemen nyeri, emotional support", "type": "checkbox3" },
                        { "id": 429352, "nama": "Monitor status nutrisi, kaji kemampuan pasien mendapatkan nurtisi sesuai kebutuhan", "type": "checkbox3" },
                        { "id": 429353, "nama": "Monitor tada dan gejala infeksi", "type": "checkbox3" },
                        { "id": 429354, "nama": "Manajemen perawatan luka", "type": "checkbox3" },
                        { "id": 429355, "nama": "Atur posisi pasien agar ventilasi adekuat", "type": "checkbox3" },
                        { "id": 429356, "nama": "", "type": "checkbox2" },
                        { "id": 429357, "nama": "", "type": "textbox2" }
                    ]
                }
            ];

            $scope.listIntervensiKolaborasi = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 429358, "nama": "Program PD", "type": "checkbox3" },
                        { "id": 429359, "nama": "Kolaborasi diet", "type": "checkbox3" },
                        { "id": 429360, "nama": "Pemeriksaan laboratorium", "type": "checkbox3" },
                        { "id": 429361, "nama": "Pemberian Eritropoeitin", "type": "checkbox3" },
                        { "id": 429362, "nama": "Pemberian preparat besi", "type": "checkbox3" },
                        { "id": 429363, "nama": "Pemberian antibiotic", "type": "checkbox3" }
                    ]
                }
            ];

            $scope.listImplementasiKeperawatan = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 429364, "nama": "Ganti cairan", "type": "checkbox" },
                        { "id": 429365, "nama": "Ganti verband exit site", "type": "checkbox" },
                        { "id": 429366, "nama": "Injeksi IV/IP/SC", "type": "checkbox" },
                        { "id": 429367, "nama": "Drips/infus", "type": "checkbox" },
                        { "id": 429368, "nama": "PET", "type": "checkbox" },
                        { "id": 429369, "nama": "Pemeriksaan adekuasi", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listPeresepanCAPD = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 429370, "nama": "", "caption": "a. Jenis cairan dianel", "satuan": "", "type": "label" },
                        { "id": 429371, "nama": "1,5 %", "caption": "", "satuan": "", "type": "checkbox" },
                        { "id": 429372, "nama": "2,5 %", "caption": "", "satuan": "", "type": "checkbox" },
                        { "id": 429373, "nama": "Extraneal", "caption": "", "satuan": "", "type": "checkbox" },
                        { "id": 429374, "nama": "", "caption": "", "satuan": "", "type": "checkbox2" },
                        { "id": 429375, "nama": "", "caption": "", "satuan": "", "type": "textbox2" },
                        { "id": 429376, "nama": "", "caption": "b. Frekuensi pergantian cairan", "satuan": "", "type": "label" },
                        { "id": 429377, "nama": "3 kali/hari", "caption": "", "satuan": "", "type": "checkbox" },
                        { "id": 429378, "nama": "4 kali/hari", "caption": "", "satuan": "", "type": "checkbox" },
                        { "id": 429379, "nama": "", "caption": "", "satuan": "", "type": "checkbox2" },
                        { "id": 429380, "nama": "", "caption": "", "satuan": "", "type": "textbox2" },
                        { "id": 429381, "nama": "", "caption": "c. Pergantian cairan", "satuan": "", "type": "label" },
                        { "id": 429382, "nama": "", "caption": "Volume masuk", "satuan": "ml", "type": "textbox" },
                        { "id": 429383, "nama": "", "caption": "Waktu", "satuan": "menit", "type": "textbox" },
                        { "id": 429384, "nama": "", "caption": "Volume Keluar", "satuan": "ml", "type": "textbox" },
                        { "id": 429385, "nama": "", "caption": "Waktu", "satuan": "menit", "type": "textbox" },
                        { "id": 429386, "nama": "", "caption": "Balance", "satuan": "ml", "type": "textbox" },
                        { "id": 429387, "nama": "", "caption": "Warna cairan", "satuan": "", "type": "textbox" }
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

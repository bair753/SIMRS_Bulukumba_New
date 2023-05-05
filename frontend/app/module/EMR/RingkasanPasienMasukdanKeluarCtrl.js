define(['initialize', 'Configuration'], function (initialize, config) {
    'use strict';
    initialize.controller('RingkasanPasienMasukdanKeluarCtrl', ['$q', '$rootScope', '$scope', 'ModelItem', '$state', 'CacheHelper', 'DateHelper', 'MedifirstService',
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
            $scope.cc.emrfk = 290004;
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

            medifirstService.getPart("emr/get-datacombo-part-diagnosa", true, true, 10).then(function (data) {
                $scope.listDiagnosa = data;
            });

            medifirstService.getPart("emr/get-datacombo-icd10-secondary", true, true, 10).then(function (data) {
                $scope.listDiagnosaSecondary = data;
            });

            $scope.listDataPasien = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420303, "nama": "", "caption": "Nama Lengkap", "type": "textbox", "dataList": "" },
                        { "id": 420304, "nama": "", "caption": "No RM", "type": "textbox", "dataList": "" },
                        { "id": 420305, "nama": "Laki-laki", "caption": "Jenis Kelamin", "type": "checkbox", "dataList": "" },
                        { "id": 420306, "nama": "Perempuan", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420307, "nama": "", "caption": "Tgl Lahir", "type": "date", "dataList": "" },
                        { "id": 420308, "nama": "", "caption": "Agama", "type": "textbox", "dataList": "" },
                        { "id": 420309, "nama": "", "caption": "Kebangsaan", "type": "textbox", "dataList": "" },
                        { "id": 420310, "nama": "", "caption": "Alamat", "type": "textarea", "dataList": "" },
                        { "id": 420311, "nama": "", "caption": "No Telp/HP", "type": "textbox", "dataList": "" },
                        { "id": 420312, "nama": "Kawin", "caption": "Status Perkawinan", "type": "checkbox", "dataList": "" },
                        { "id": 420313, "nama": "Belum Kawin", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420314, "nama": "Janda / Duda", "caption": "", "type": "checkbox", "dataList": "" }
                    ]
                }
            ];

            $scope.listDataPenanggung = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420315, "nama": "", "caption": "Nama Penanggung", "type": "textbox", "dataList": "" },
                        { "id": 420316, "nama": "", "caption": "Hubungan Keluarga", "type": "textbox", "dataList": "" },
                        { "id": 420317, "nama": "", "caption": "Pekerjaan", "type": "textbox", "dataList": "" },
                        { "id": 420318, "nama": "", "caption": "Alamat", "type": "textarea", "dataList": "" },
                        { "id": 420319, "nama": "", "caption": "No Telp/HP", "type": "textbox", "dataList": "" },
                        { "id": 420320, "nama": "", "caption": "Dirawat Yang Ke", "type": "textbox", "dataList": "" },
                        { "id": 420321, "nama": "", "caption": "Dikirim Oleh :", "type": "textbox", "dataList": "" },
                        { "id": 420322, "nama": "", "caption": "Dr. Poliklinik", "type": "combobox", "dataList": "listPegawai" },
                        { "id": 420323, "nama": "", "caption": "Dr. Jaga", "type": "combobox", "dataList": "listPegawai" },
                        { "id": 420324, "nama": "", "caption": "Rujukan Dari", "type": "textbox", "dataList": "" }
                    ]
                }
            ];

            $scope.listSebabDiRawat = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420325, "nama": "", "caption": "Sebab Dirawat", "type": "textbox", "dataList": "" },
                        { "id": 420326, "nama": "", "caption": "Dirawat di Ruang", "type": "combobox", "dataList": "listRuangan" },
                        { "id": 420327, "nama": "", "caption": "Masuk Tanggal", "type": "datetime", "dataList": "" },
                        { "id": 420328, "nama": "", "caption": "Bagian", "type": "textbox", "dataList": "" },
                        { "id": 420329, "nama": "", "caption": "Jam", "type": "time", "dataList": "" }
                    ]
                }
            ]

            $scope.listPindahKeRuang = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420340, "nama": "", "caption": "Dipindahkan ke Ruang", "type": "combobox", "dataList": "listRuangan" },
                        { "id": 420341, "nama": "", "caption": "Kelas", "type": "combobox", "dataList": "listKelas" },
                        { "id": 420342, "nama": "", "caption": "Tgl/Jam", "type": "datetime", "dataList": "" }
                    ]
                }
            ]

            $scope.listPindahDariRuang = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420343, "nama": "", "caption": "Dipindahkan dari Ruang", "type": "combobox", "dataList": "listRuangan" },
                        { "id": 420344, "nama": "", "caption": "Kelas", "type": "combobox", "dataList": "listKelas" },
                        { "id": 420345, "nama": "", "caption": "Tgl/Jam", "type": "datetime", "dataList": "" }
                    ]
                }
            ]

            $scope.listTglMeninggal = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420346, "nama": "", "caption": "Meninggal Tgl", "type": "datetime", "dataList": "" }
                    ]
                }
            ]

            $scope.listSebabMeninggal = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420347, "nama": "", "caption": "Sebab Kematian", "type": "textbox", "dataList": "" }
                    ]
                }
            ]

            $scope.listAlergiTerhadap = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420348, "nama": "", "caption": "Alergi Terhadap", "type": "textarea", "dataList": "" }
                    ]
                }
            ]

            $scope.listCacatBawaan = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420349, "nama": "", "caption": "Cacat Bawaan", "type": "textarea", "dataList": "" }
                    ]
                }
            ]

            $scope.listStatusKB = [
                {
                    "id": 1,
                    "nama": "Status KB (khusus pasien wanita)",
                    "detail": [
                        { "id": 420362, "nama": "Sudah KB", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420363, "nama": "MOP / MOW", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420364, "nama": "IUD", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420365, "nama": "Suntikan", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420366, "nama": "Kondom", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420367, "nama": "Pil KB", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420368, "nama": "Belum KB", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420369, "nama": "Tidak Perlu KB, Alasan :", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420370, "nama": "", "caption": "", "type": "textbox", "dataList": "" }
                    ]
                }
            ]

            $scope.listImunisasiPernahDibuat = [
                {
                    "id": 1,
                    "nama": "Imunisasi yang pernah didapat",
                    "detail": [
                        { "id": 420371, "nama": "BCG", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420372, "nama": "DPT", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420373, "nama": "Polio", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420374, "nama": "TFT", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420375, "nama": "Campak", "caption": "", "type": "checkbox", "dataList": "" }
                    ]
                }
            ]

            $scope.listKeadaanKeluar = [
                {
                    "id": 1,
                    "nama": "Keadaan Keluar",
                    "detail": [
                        { "id": 420380, "nama": "Sembuh", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420381, "nama": "Membaik", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420382, "nama": "Belum Sembuh", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420383, "nama": "Meninggal < 48 Jam", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420384, "nama": "Meninggal > 48 Jam", "caption": "", "type": "checkbox", "dataList": "" }
                    ]
                }
            ]

            $scope.listCaraKeluar = [
                {
                    "id": 1,
                    "nama": "Cara Keluar",
                    "detail": [
                        { "id": 420385, "nama": "Diijinkan Pulang", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420386, "nama": "Pulang Paksa", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420387, "nama": "Lari", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420388, "nama": "Pindah RS Lain", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420389, "nama": "Dirujuk ke", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420390, "nama": "", "caption": "", "type": "textbox", "dataList": "" }
                    ]
                }
            ]

            // $scope.cetakPdf = function () {
            //     if (norecEMR == '') return
            //     var client = new HttpClient();
            //     client.get('http://127.0.0.1:1237/printvb/e-rekammedis?cetak-emr-asesmen-awal-medis-igd&id=' + $scope.cc.nocm + '&emr=' + norecEMR + '&view=true', function (response) {
            //         // do something with response
            //     });
            // }

            $scope.cetakPdf = function () {
                if (norecEMR == '') return

                var local = JSON.parse(localStorage.getItem('profile'));
                var nama = medifirstService.getPegawaiLogin().namalengkap;
                console.log(config.baseApiBackend);
                window.open(config.baseApiBackend + 'report/cetak-ringkasan-pasien-masuk-keluar?nocm='
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
                    $scope.item.obj[420303] = antrianPasien.namapasien;
                    $scope.item.obj[420304] = antrianPasien.nocm;
                    $scope.item.obj[420307] = new Date(moment(antrianPasien.tgllahir).format('YYYY-MM-DD'));
                    $scope.item.obj[420310] = antrianPasien.alamatlengkap;
                    if (antrianPasien.jeniskelamin == 'PEREMPUAN') {
                        $scope.item.obj[420305] = false;
                        $scope.item.obj[420306] = true;
                    } else {
                        $scope.item.obj[420305] = true;
                        $scope.item.obj[420306] = false;
                    }
                    $scope.item.obj[420327] = new Date(moment(antrianPasien.tglregistrasi).format('YYYY-MM-DD HH:mm'));
                    if (antrianPasien.iddpjp != null && antrianPasien.dokterdpjp != null) {
                        $scope.item.obj[420393] = {
                            value: antrianPasien.iddpjp,
                            text: antrianPasien.dokterdpjp
                        }
                    }
                    if (antrianPasien.objectruanganfk != null && antrianPasien.namaruangan != null) {
                        $scope.item.obj[420326] = {
                            value: antrianPasien.objectruanganfk,
                            text: antrianPasien.namaruangan
                        }
                    }
                    $scope.item.obj[420391] = $scope.now;
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
                        'Ringkasan Pasien Masuk dan Keluar ' + ' dengan No EMR - ' + e.data.data.noemr + ' pada No Registrasi '
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

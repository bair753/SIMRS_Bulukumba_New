define(['initialize'], function (initialize) {
    'use strict';
    initialize.controller('AsesmenAwalKeperawatanRajalCtrl', ['$q', '$rootScope', '$scope', 'ModelItem', '$state', 'CacheHelper', 'DateHelper', 'MedifirstService',
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
            $scope.cc.emrfk = 290011;
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

            $scope.listStatusFisik = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 421153, "nama": "", "caption": "TD", "type": "textbox", "dataList": "", "satuan": "mmHg" },
                        { "id": 421154, "nama": "", "caption": "Nadi", "type": "textbox", "dataList": "", "satuan": "x/mnt" },
                        { "id": 421155, "nama": "", "caption": "Suhu", "type": "textbox", "dataList": "", "satuan": "C" },
                        { "id": 421156, "nama": "", "caption": "Nafas", "type": "textbox", "dataList": "", "satuan": "x/mnt" },
                        { "id": 421157, "nama": "", "caption": "Khusus Bedah", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421158, "nama": "", "caption": "Luka post operasi", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421159, "nama": "", "caption": "Khusus Maternal", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421160, "nama": "", "caption": "Kehamilan", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421161, "nama": "", "caption": "G", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421162, "nama": "", "caption": "P", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421163, "nama": "", "caption": "A", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421164, "nama": "", "caption": "HPHT", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421165, "nama": "", "caption": "HPL", "type": "textbox", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listEkonomi = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 421192, "nama": "", "caption": "Pembiayaan", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421193, "nama": "Pribadi", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421194, "nama": "Jaminan Kesehatan/Asuransi", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421195, "nama": "BPJS", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421196, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listRiwayatAlergi = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 421214, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421215, "nama": "Ya, Sebutkan :", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421216, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listRiwayatPenggunaanObat = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 421217, "nama": "Tidak ada", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421218, "nama": "Ada", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421219, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listAsesmenNyeri = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 421220, "nama": "Tidak nyeri", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421221, "nama": "Nyeri, lanjut ke RM 36", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listRisikoJatuh = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 421222, "nama": "", "caption": "Penilaian / pengkajian :", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421223, "nama": "", "caption": "1. Cara berjalan pasien (salah satu atau lebih)", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421224, "nama": "", "caption": "a. Tidak seimbang/sempoyongan/limbung", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421225, "nama": "Ya", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421226, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421227, "nama": "", "caption": "b. Jalan dengan menggunakan alat bantu (kruk/tripot/kursi roda/orang lain) ", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421228, "nama": "Ya", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421229, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421230, "nama": "", "caption": "2. Menopang saat akan duduk : Tampak memegang pinggiran kursi atau meja atau benda lain sebagai penopang saat akan duduk", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421231, "nama": "Ya", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421232, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listAsesmenFungsional = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 421233, "nama": "", "caption": "Alat bantu", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421234, "nama": "", "caption": "Prothesa", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421235, "nama": "", "caption": "Cacat tubuh", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421236, "nama": "", "caption": "ADL", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421237, "nama": "Mandiri", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421238, "nama": "Dibantu", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421239, "nama": "Tergantung penuh", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listRisikoNutrisional = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 421240, "nama": "", "caption": "BB", "type": "textbox", "dataList": "", "satuan": "g/Kg" },
                        { "id": 421241, "nama": "", "caption": "TB", "type": "textbox", "dataList": "", "satuan": "cm" },
                        { "id": 421242, "nama": "", "caption": "LLA", "type": "textbox", "dataList": "", "satuan": "cm" },
                        { "id": 421243, "nama": "", "caption": "TL (jika diperlukan)", "type": "textbox", "dataList": "", "satuan": "cm" },
                        { "id": 421244, "nama": "", "caption": "Khusus Anak dan Bayi", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421245, "nama": "", "caption": "Lingkar Kepala", "type": "textbox", "dataList": "", "satuan": "cm" },
                        { "id": 421246, "nama": "", "caption": "Konsul Poli Gizi", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421247, "nama": "Tidak Perlu", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421248, "nama": "Perlu", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listKebutuhanEdukasi = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 421249, "nama": "", "caption": "Edukasi diberikan kepada", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421250, "nama": "Pasien", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421251, "nama": "Keluarga (Hubungan dengan pasien)", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421252, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" },
                        { "id": 421253, "nama": "", "caption": "", "type": "hr", "dataList": "", "satuan": "" },
                        { "id": 421254, "nama": "", "caption": "Hambatan", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421255, "nama": "Ada Hambatan", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421256, "nama": "Tidak Ada Hambatan", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421257, "nama": "", "caption": "", "type": "hr", "dataList": "", "satuan": "" },
                        { "id": 421258, "nama": "", "caption": "Identifikasi Kebutuhan Edukasi", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421259, "nama": "Diagnosis penyakit", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421260, "nama": "Penggunaan alat medik", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421261, "nama": "Penggunaan obat", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421262, "nama": "Nutrisi", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421263, "nama": "Perawatan", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421264, "nama": "Manajemen nyeri", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421265, "nama": "Lainnya :", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421266, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listPerencanaanPemulangan = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 421267, "nama": "", "caption": "Pasien disarankan pulang", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421268, "nama": "Berobat lanjut di FKTP", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421269, "nama": "Poli", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421270, "nama": "", "caption": "", "type": "combobox", "dataList": "listRuangan", "satuan": "" },
                        { "id": 421271, "nama": "", "caption": "", "type": "hr", "dataList": "", "satuan": "" },
                        { "id": 421272, "nama": "", "caption": "Pasien dirujuk", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421273, "nama": "Rujuk balik ke FKTP", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421274, "nama": "RS", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421275, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" },
                        { "id": 421276, "nama": "", "caption": "", "type": "hr", "dataList": "", "satuan": "" },
                        { "id": 421277, "nama": "", "caption": "Rawat Inap", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421278, "nama": "", "caption": "Bagian / Ruang", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421279, "nama": "", "caption": "", "type": "combobox", "dataList": "listRuangan", "satuan": "" }
                    ]
                }
            ];

            $scope.listMasalahKeperawatan = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 421280, "nama": "Risiko jatuh", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421281, "nama": "Ketidak seimbangan nutrisi kurang dari kebutuhan", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421282, "nama": "Hipertermi", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421283, "nama": "Risiko kekurangan volume cairan", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421284, "nama": "Kerusakan integritas kulit", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421285, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421286, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" }
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
                medifirstService.get("emr/get-antrian-pasien-norec/" + noregistrasifk).then(function (e) {
                    var antrianPasien = e.data.result;
                    $scope.item.obj[421151] = new Date(moment(antrianPasien.tglregistrasi).format('YYYY-MM-DD HH:mm'));
                    if (antrianPasien.objectruanganfk != null && antrianPasien.namaruangan != null) {
                        $scope.item.obj[421150] = {
                            value: antrianPasien.objectruanganfk,
                            text: antrianPasien.namaruangan
                        }
                    }
                })
                
                medifirstService.get("emr/get-vital-sign?noregistrasi=" + $scope.cc.noregistrasi + "&objectidawal=4241&objectidakhir=4246&idemr=147", true).then(function (datas) {
                    if (datas.data.data.length>0){
                        $scope.item.obj[421153] = datas.data.data[1].value; // Tekanan Darah
                        $scope.item.obj[421154] = datas.data.data[5].value; // Nadi
                        $scope.item.obj[421155] = datas.data.data[4].value; // Suhu
                        $scope.item.obj[421156] = datas.data.data[6].value; // Napas
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

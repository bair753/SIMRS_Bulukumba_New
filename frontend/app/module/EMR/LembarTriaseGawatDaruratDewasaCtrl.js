define(['initialize'], function (initialize) {
    'use strict';
    initialize.controller('LembarTriaseGawatDaruratDewasaCtrl', ['$q', '$rootScope', '$scope', 'ModelItem', '$state', 'CacheHelper', 'DateHelper', 'MedifirstService',
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
            $scope.cc.emrfk = 290007;
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
                        { "id": 420516, "nama": "", "caption": "Keluhan Utama", "type": "textarea", "dataList": "" },
                        { "id": 420517, "nama": "", "caption": "Tanggal/Pukul", "type": "datetime", "dataList": "" }
                    ]
                }
            ];

            $scope.listResusitasiK1 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420518, "nama": "Henti Jantung", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420519, "nama": "Henti Nafas", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420520, "nama": "RR < 10x/menit", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420521, "nama": "GCS < 9", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420522, "nama": "Syok dengan Tekanan Sistolik < 70 mmHg dan Syok Berat Pada Bayi/ Anak", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420523, "nama": "Kejang Lama", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420524, "nama": "Overdosis Obat dengan Hipoventilasi", "caption": "", "type": "checkbox", "dataList": "" }
                    ]
                }
            ];

            $scope.listTandaVitalK1 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420525, "nama": "", "caption": "Tekanan Darah", "type": "textbox", "dataList": "" },
                        { "id": 420526, "nama": "", "caption": "Nadi", "type": "textbox", "dataList": "" },
                        { "id": 420527, "nama": "", "caption": "Nafas", "type": "textbox", "dataList": "" }
                    ]
                }
            ];

            $scope.listResusitasiK2 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420528, "nama": "Stidor Berat", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420529, "nama": "Respirasi Distress Berat", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420530, "nama": "HR < 50 atau 150x/menit Kulit Lembab", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420531, "nama": "Hipotensi dengan Efek Hemodinamik", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420532, "nama": "Perdarahan Berat", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420533, "nama": "Tenggelam", "caption": "", "type": "checkbox", "dataList": "" }
                    ]
                }
            ];

            $scope.ListORespirasiK2 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420534, "nama": "Pernafasan Dangkal", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420535, "nama": "SaO2 < 90", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420536, "nama": "Sesak Nafas Sedang", "caption": "", "type": "checkbox", "dataList": "" }
                    ]
                }
            ];

            $scope.listTandaVitalK2 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420537, "nama": "", "caption": "Suhu", "type": "textbox", "dataList": "" },
                        { "id": 420538, "nama": "", "caption": "Saturasi Oksigen", "type": "textbox", "dataList": "" },
                        { "id": 420539, "nama": "", "caption": "GCS", "type": "textbox", "dataList": "" },
                        { "id": 420540, "nama": "", "caption": "Riwayat Alergi Obat", "type": "textarea", "dataList": "" },
                        { "id": 420541, "nama": "", "caption": "Alergi Lainnya", "type": "textarea", "dataList": "" }
                    ]
                }
            ];

            $scope.listONRespirasiK2 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420542, "nama": "Penurunan Kesadaran", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420543, "nama": "Hemiperese Akut dan Penurunan Kesadaran", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420544, "nama": "Nyeri Dada Kardiak", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420545, "nama": "Demam dengan Kelemahan", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420546, "nama": "Suspek Meningitis", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420547, "nama": "Multipel Trauma Mayor", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420548, "nama": "Mata Kena Cairan Alkali/Asam", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420549, "nama": "Trauma Berat, Fracture, Amputasi", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420550, "nama": "Minum Sedative Keracunan Kena Bisa", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420551, "nama": "Nyeri Hebat, KET", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420552, "nama": "Gaduh Gelisah", "caption": "", "type": "checkbox", "dataList": "" }
                    ]
                }
            ];

            $scope.ListORespirasiK3 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420553, "nama": "Batuk BErdahak Disertai Demam dan Sesak", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420554, "nama": "Batuk Disertai Nyeri Dada dan Sesak", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420555, "nama": "Batuk Darah", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420556, "nama": "Sesak Nafas dengan Riwayat Asma", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420557, "nama": "Sesak Nafas dengan Riwayat Tumor Paru", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420558, "nama": "Sesak Nafas dengan Riwayat PPOK", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420559, "nama": "Sesak Nafas dengan Riwayat TB Paru", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420560, "nama": "Sesak Nafas dengan Saturasi O2 90-95% ", "caption": "", "type": "checkbox", "dataList": "" }
                    ]
                }
            ];

            $scope.listONRespirasiK3 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420561, "nama": "Hipertensi Berat", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420562, "nama": "Perdarahan Sedang", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420563, "nama": "Kejang Demam Pada Pas Imuno Supresif", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420564, "nama": "Muntah-Muntah Menetap", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420565, "nama": "Dehidrasi", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420566, "nama": "Cedera Kepala dengan Riwayat Pingsan", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420567, "nama": "Nyeri Sedang Sampai Berat", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420568, "nama": "Nyeri Non Kardiak", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420569, "nama": "Sakit Perut Tanpa Risiko Tinggi", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420570, "nama": "Cacat Extermitas", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420571, "nama": "Extermitas Tidak Ada Sensasi", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420572, "nama": "Trauma Risiko Tinggi", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420573, "nama": "Stable Neonatus", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420574, "nama": "Kekerasan Pada Anak", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420575, "nama": "Stress Berat", "caption": "", "type": "checkbox", "dataList": "" }
                    ]
                }
            ];

            $scope.listONRespirasiK4 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420576, "nama": "Perdarahan Ringan", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420577, "nama": "Aspirasi Benda Asing Tanpa Gangguan Pernafasan", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420578, "nama": "CKR", "caption": "", "type": "checkbox", "dataList": "" },
                        // { "id": 420579, "nama": "Muntah-Muntah Menetap", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420580, "nama": "Iritasi Mata dengan Visusnormal", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420581, "nama": "Trauma Extermitas : Keseleo Pergelangan Kaki, Kemungkinan Fraktur, Luka Ringan, dengan Normal Tanda- Tanda Vital dan Nyeri Ringan dan Sedang", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420582, "nama": "Balutan Ketat Tanpa Gangguan Neuro Vascular", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420583, "nama": "Sendi Bengkak dan Merah", "caption": "", "type": "checkbox", "dataList": "" }
                    ]
                }
            ];

            $scope.listNonGadarK4 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420584, "nama": "Nyeri Sedang", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420585, "nama": "Mual/Diare Tanpa Dehidrasi", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420586, "nama": "Nyeri Perut Non Spesifik", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420587, "nama": "Trauma Dada Tanpa Nyeri Iga dan Gangguan Pernafasan", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420588, "nama": "Sukar Menelan Tanpa Gangguan Pernafasan", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420589, "nama": "Masalah Kesehatan Mental yang Semi Mendesak, dalam Observasi/ Tidak Ada Risiko Terhadap Diri Sendiri maupun Orang Lain", "caption": "", "type": "checkbox", "dataList": "" }
                    ]
                }
            ];

            $scope.listNonGadarK5 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420590, "nama": "Nyeri Ringan Tanpa Tanda-Tanda Resiko Tinggi", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420591, "nama": "Riwayat Penyakit Risiko Rendah Sekarang Tidak Ada Keluhan", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420592, "nama": "Keluhan Ringan Penyakit", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420593, "nama": "Luka Kecil/Lecet", "caption": "", "type": "checkbox", "dataList": "" }
                    ]
                }
            ];

            $scope.listTabelKeterangan = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420594, "nama": "", "caption": "", "type": "textarea", "dataList": "" },
                        { "id": 420595, "nama": "", "caption": "SKALA 1", "type": "label", "dataList": "" },
                        { "id": 420596, "nama": "", "caption": "Segera", "type": "label", "dataList": "" },
                        { "id": 420597, "nama": "", "caption": "Resusitasi", "type": "label", "dataList": "" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 420598, "nama": "", "caption": "", "type": "textarea", "dataList": "" },
                        { "id": 420599, "nama": "", "caption": "SKALA 2", "type": "label", "dataList": "" },
                        { "id": 420600, "nama": "", "caption": "10 Menit", "type": "label", "dataList": "" },
                        { "id": 420601, "nama": "", "caption": "Emergency/Gawat Darurat", "type": "label", "dataList": "" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 420602, "nama": "", "caption": "", "type": "textarea", "dataList": "" },
                        { "id": 420603, "nama": "", "caption": "SKALA 3", "type": "label", "dataList": "" },
                        { "id": 420604, "nama": "", "caption": "30 Menit", "type": "label", "dataList": "" },
                        { "id": 420605, "nama": "", "caption": "Urgent/Darurat", "type": "label", "dataList": "" }
                    ]
                },
                {
                    "id": 4,
                    "detail": [
                        { "id": 420606, "nama": "", "caption": "", "type": "textarea", "dataList": "" },
                        { "id": 420607, "nama": "", "caption": "SKALA 4", "type": "label", "dataList": "" },
                        { "id": 420608, "nama": "", "caption": "60 Menit", "type": "label", "dataList": "" },
                        { "id": 420609, "nama": "", "caption": "Semi Darurat", "type": "label", "dataList": "" }
                    ]
                },
                {
                    "id": 5,
                    "detail": [
                        { "id": 420610, "nama": "", "caption": "", "type": "textarea", "dataList": "" },
                        { "id": 420611, "nama": "", "caption": "SKALA 5", "type": "label", "dataList": "" },
                        { "id": 420612, "nama": "", "caption": "120 Menit", "type": "label", "dataList": "" },
                        { "id": 420613, "nama": "", "caption": "Tidak Darurat", "type": "label", "dataList": "" }
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
                    $scope.item.obj[420517] = $scope.now;
                })
                
                medifirstService.get("emr/get-vital-sign?noregistrasi=" + $scope.cc.noregistrasi + "&objectidawal=4241&objectidakhir=4246&idemr=147", true).then(function (datas) {
                    if (datas.data.data.length>0){
                        $scope.item.obj[420525] = datas.data.data[1].value; // Tekanan Darah
                        $scope.item.obj[420526] = datas.data.data[5].value; // Nadi
                        $scope.item.obj[420537] = datas.data.data[4].value; // Suhu
                        $scope.item.obj[420527] = datas.data.data[6].value; // Napas
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

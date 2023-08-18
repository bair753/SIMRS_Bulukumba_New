define(['initialize', 'Configuration'], function (initialize, config) {
    'use strict';
    initialize.controller('PengkajianHarianHemodialisisCtrl', ['$q', '$rootScope', '$scope', 'ModelItem', '$state', 'CacheHelper', 'DateHelper', 'MedifirstService',
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
            $scope.cc.emrfk = 290050;
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

            $scope.listDataPasien = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 428950, "caption": "Tanggal/Jam", "nama": "", "type": "datetime" },
                        { "id": 428951, "caption": "Nama Pasien", "nama": "", "type": "textbox" },
                        { "id": 428952, "caption": "Jenis Kelamin", "nama": "", "type": "label" },
                        { "id": 428953, "caption": "", "nama": "Laki-laki", "type": "checkbox" },
                        { "id": 428954, "caption": "", "nama": "Perempuan", "type": "checkbox" },
                        { "id": 428955, "caption": "Tanggal Lahir", "nama": "", "type": "date" },
                        { "id": 428956, "caption": "No. RM", "nama": "", "type": "textbox" },
                        { "id": 428957, "caption": "Alamat", "nama": "", "type": "textarea" },
                        { "id": 428958, "caption": "Diagnosa Medis", "nama": "", "type": "textarea" },
                        { "id": 428959, "caption": "No. Mesin", "nama": "", "type": "textbox" },
                        { "id": 428960, "caption": "Hemodialisi ke-", "nama": "", "type": "textbox" },
                        { "id": 428961, "caption": "Tipe Dialiser", "nama": "", "type": "textbox" },
                        { "id": 428962, "caption": "Riwayat Alergi Obat", "nama": "", "type": "label" },
                        { "id": 428963, "caption": "", "nama": "Tidak", "type": "checkbox" },
                        { "id": 428964, "caption": "", "nama": "Ya :", "type": "checkbox" },
                        { "id": 428965, "caption": "", "nama": "", "type": "textbox2" }
                    ]
                }
            ];

            $scope.listPengkajianKeperawatan = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 428966, "caption": "1. Keluhan Utama", "nama": "", "type": "textarea" },
                        { "id": 428967, "caption": "2. Penilaian Nyeri", "nama": "", "type": "label" },
                        { "id": 428968, "caption": "Nyeri", "nama": "", "type": "label" },
                        { "id": 428969, "caption": "", "nama": "Ya", "type": "checkbox" },
                        { "id": 428970, "caption": "", "nama": "Tidak", "type": "checkbox" },
                        { "id": 428971, "caption": "a. Onset", "nama": "", "type": "label" },
                        { "id": 428972, "caption": "", "nama": "Akut", "type": "checkbox" },
                        { "id": 428973, "caption": "", "nama": "Kronik", "type": "checkbox" },
                        { "id": 428974, "caption": "b. Pencetus", "nama": "", "type": "textbox" },
                        { "id": 428975, "caption": "Gambaran Nyeri", "nama": "", "type": "textbox" },
                        { "id": 428976, "caption": "Lokasi Nyeri", "nama": "", "type": "textbox" },
                        { "id": 428977, "caption": "c. Durasi", "nama": "", "type": "textbox" },
                        { "id": 428978, "caption": "Frekuensi", "nama": "", "type": "textbox" },
                        { "id": 428979, "caption": "d. Skala Nyeri", "nama": "", "type": "textbox", "placeholder": "(Metode VAS/NRS/BPS/FLACC/NIPS)" }
                    ]
                }
            ];

            $scope.listPemeriksaanFisik = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 428980, "caption": "3. Pemeriksaan Fisik", "satuan": "", "type": "label" },
                        { "id": 428981, "caption": "a. Keadaan Umum", "satuan": "", "type": "textbox" },
                        { "id": 428982, "caption": "b. Tekanan Darah", "satuan": "mmHg", "type": "textbox" },
                        { "id": 428983, "caption": "c. Frekuensi Nadi", "satuan": "x/menit", "type": "textbox" },
                        { "id": 428984, "caption": "d. Frekuensi Napas", "satuan": "x/menit", "type": "textbox" },
                        { "id": 428985, "caption": "e. Suhu", "satuan": "C", "type": "textbox" },
                        { "id": 428986, "caption": "f. Berat Badan Pre HD", "satuan": "kg", "type": "textbox" },
                        { "id": 428987, "caption": "g. Berat Badan Post HD", "satuan": "kg", "type": "textbox" },
                        { "id": 428988, "caption": "h. Berat Badan Kering", "satuan": "kg", "type": "textbox" },
                        { "id": 428989, "caption": "i. Tinggi Badan", "satuan": "cm", "type": "textbox" },
                        { "id": 428990, "caption": "j. IMT", "satuan": "kg/m2", "type": "textbox" },
                        { "id": 428991, "caption": "Pemeriksaan fisik tambahan", "satuan": "", "type": "textarea" },
                        { "id": 428992, "caption": "4. Pemeriksaan Penunjang", "satuan": "", "type": "textarea" }
                    ]
                }
            ];

            $scope.listGizi = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 428993, "caption": "5. Gizi", "nama": "", "type": "label" },
                        { "id": 428994, "caption": "", "nama": "SGA, total score :", "type": "checkbox" },
                        { "id": 428995, "caption": "", "nama": "", "type": "textbox2" },
                        { "id": 428996, "caption": "Kesimpulan", "nama": "", "type": "label" },
                        { "id": 428997, "caption": "", "nama": "Tanpa malnutrisi", "type": "checkbox" },
                        { "id": 428998, "caption": "", "nama": "Malnutrisi Ringan", "type": "checkbox" },
                        { "id": 428999, "caption": "", "nama": "Malnutrisi Sedang", "type": "checkbox" },
                        { "id": 429000, "caption": "", "nama": "Malnutrisi Berat", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listDiagnosaKeperawatan = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 429001, "caption": "Diagnosa Keperawatan", "nama": "", "type": "label" },
                        { "id": 429002, "caption": "", "nama": "Kelebihan volume cairan", "type": "checkbox" },
                        { "id": 429003, "caption": "", "nama": "Gangguan pemenuhan oksigen", "type": "checkbox" },
                        { "id": 429004, "caption": "", "nama": "Gangguan keseimbangan cairan", "type": "checkbox" },
                        { "id": 429005, "caption": "", "nama": "Penurunan curah jantung", "type": "checkbox" },
                        { "id": 429006, "caption": "", "nama": "Nutrisi kurang dari kebutuhan tubuh", "type": "checkbox" },
                        { "id": 429007, "caption": "", "nama": "Ketidak patuhan terhadap diet", "type": "checkbox" },
                        { "id": 429008, "caption": "", "nama": "Risiko infeksi", "type": "checkbox" },
                        { "id": 429009, "caption": "", "nama": "Gangguan rasa nyaman : nyeri", "type": "checkbox" },
                        { "id": 429010, "caption": "", "nama": "", "type": "hr" },
                        { "id": 429011, "caption": "Intervensi Keperawatan (rekapitulasi pre-intra dan post-HD)", "nama": "", "type": "label" },
                        { "id": 429012, "caption": "", "nama": "Monitor berat badan, intake out put", "type": "checkbox" },
                        { "id": 429013, "caption": "", "nama": "Berikan terapi oksigen sesuai kebutuhan", "type": "checkbox" },
                        { "id": 429014, "caption": "", "nama": "Bila pasien mulai hipotensi", "type": "checkbox" },
                        { "id": 429015, "caption": "", "nama": "Kaji kemampuan pasien mendapatkan nutrisi yang dibutihkan", "type": "checkbox" },
                        { "id": 429016, "caption": "", "nama": "Monitor tanda dan gejala infeksi (lokal sismetik)", "type": "checkbox" },
                        { "id": 429017, "caption": "", "nama": "Monitor kadar gula darah", "type": "checkbox" },
                        { "id": 429018, "caption": "", "nama": "Atur posisi pasien agar ventilasi adekuat", "type": "checkbox" },
                        { "id": 429019, "caption": "", "nama": "Melakukan observasi pasien (Monitor vital sign) dan mesin", "type": "checkbox" },
                        { "id": 429020, "caption": "", "nama": "Hentikan HD sesuai indikasi", "type": "checkbox" },
                        { "id": 429021, "caption": "", "nama": "Posisikan supinasi dengan evaluasi kepala 30 dan evaluasi kaki", "type": "checkbox" },
                        { "id": 429022, "caption": "", "nama": "Ganti bulatan luka sesuai dengan prosedur monitor tanda dan gejalah hipoglikemik", "type": "checkbox" },
                        { "id": 429023, "caption": "", "nama": "PENKES : diet, AV-Shunt, ", "type": "checkbox" },
                        { "id": 429024, "caption": "", "nama": "", "type": "textbox2" }
                    ]
                }
            ]

            $scope.listIntruksiMedik = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 429025, "caption": "Resep HD", "nama": "", "satuan": "", "type": "label" },
                        { "id": 429026, "caption": "", "nama": "Inisiasi", "satuan": "", "type": "checkbox2" },
                        { "id": 429027, "caption": "", "nama": "Akut", "satuan": "", "type": "checkbox2" },
                        { "id": 429028, "caption": "", "nama": "Rutin", "satuan": "", "type": "checkbox2" },
                        { "id": 429029, "caption": "", "nama": "SLED", "satuan": "", "type": "checkbox2" },
                        { "id": 429030, "caption": "", "nama": "", "satuan": "", "type": "textbox2" },
                        { "id": 429031, "caption": "Time", "nama": "", "satuan": "Jam", "type": "textbox" },
                        { "id": 429032, "caption": "Bloode Flow", "nama": "", "satuan": "ml/menit", "type": "textbox" },
                        { "id": 429033, "caption": "Dialysate Flow", "nama": "", "satuan": "ml/menit", "type": "textbox" },
                        { "id": 429034, "caption": "Ultra Filtration Goal", "nama": "", "satuan": "ml", "type": "textbox" },
                        { "id": 429035, "caption": "Ultra Filtration Rate", "nama": "", "satuan": "ml/Jam", "type": "textbox" },
                        { "id": 429036, "caption": "Conductivity", "nama": "", "satuan": "", "type": "textbox" },
                        { "id": 429037, "caption": "Dialysate Temperature", "nama": "", "satuan": "C", "type": "textbox" },
                        { "id": 429038, "caption": "Akses Vaskuler", "nama": "", "satuan": "", "type": "textbox" }
                    ]
                }
            ]

            $scope.listObservasi = [
                {
                    "id": 1,
                    "nama": "PRE-HD",
                    "detail": [
                        { "id": 429053, "type": "time" },
                        { "id": 429054, "type": "textbox" },
                        { "id": 429055, "type": "textbox" },
                        { "id": 429056, "type": "textbox" },
                        { "id": 429057, "type": "textbox" },
                        { "id": 429058, "type": "textbox" },
                        { "id": 429059, "type": "textbox" },
                        { "id": 429060, "type": "textbox" },
                        { "id": 429061, "type": "textbox" },
                        { "id": 429062, "type": "textbox" },
                        { "id": 429063, "type": "textarea" },
                        { "id": 429064, "type": "combobox" }
                    ]
                },
                {
                    "id": 2,
                    "nama": "INTRA-HD",
                    "detail": [
                        { "id": 429065, "type": "time" },
                        { "id": 429066, "type": "textbox" },
                        { "id": 429067, "type": "textbox" },
                        { "id": 429068, "type": "textbox" },
                        { "id": 429069, "type": "textbox" },
                        { "id": 429070, "type": "textbox" },
                        { "id": 429071, "type": "textbox" },
                        { "id": 429072, "type": "textbox" },
                        { "id": 429073, "type": "textbox" },
                        { "id": 429074, "type": "textbox" },
                        { "id": 429075, "type": "textarea" },
                        { "id": 429076, "type": "combobox" }
                    ]
                },
                {
                    "id": 3,
                    "nama": "INTRA-HD",
                    "detail": [
                        { "id": 429077, "type": "time" },
                        { "id": 429078, "type": "textbox" },
                        { "id": 429079, "type": "textbox" },
                        { "id": 429080, "type": "textbox" },
                        { "id": 429081, "type": "textbox" },
                        { "id": 429082, "type": "textbox" },
                        { "id": 429083, "type": "textbox" },
                        { "id": 429084, "type": "textbox" },
                        { "id": 429085, "type": "textbox" },
                        { "id": 429086, "type": "textbox" },
                        { "id": 429087, "type": "textarea" },
                        { "id": 429088, "type": "combobox" }
                    ]
                },
                {
                    "id": 4,
                    "nama": "INTRA-HD",
                    "detail": [
                        { "id": 429089, "type": "time" },
                        { "id": 429090, "type": "textbox" },
                        { "id": 429091, "type": "textbox" },
                        { "id": 429092, "type": "textbox" },
                        { "id": 429093, "type": "textbox" },
                        { "id": 429094, "type": "textbox" },
                        { "id": 429095, "type": "textbox" },
                        { "id": 429096, "type": "textbox" },
                        { "id": 429097, "type": "textbox" },
                        { "id": 429098, "type": "textbox" },
                        { "id": 429099, "type": "textarea" },
                        { "id": 429100, "type": "combobox" }
                    ]
                },
                {
                    "id": 5,
                    "nama": "INTRA-HD",
                    "detail": [
                        { "id": 429101, "type": "time" },
                        { "id": 429102, "type": "textbox" },
                        { "id": 429103, "type": "textbox" },
                        { "id": 429104, "type": "textbox" },
                        { "id": 429105, "type": "textbox" },
                        { "id": 429106, "type": "textbox" },
                        { "id": 429107, "type": "textbox" },
                        { "id": 429108, "type": "textbox" },
                        { "id": 429109, "type": "textbox" },
                        { "id": 429110, "type": "textbox" },
                        { "id": 429111, "type": "textarea" },
                        { "id": 429112, "type": "combobox" }
                    ]
                },
                {
                    "id": 6,
                    "nama": "INTRA-HD",
                    "detail": [
                        { "id": 429113, "type": "time" },
                        { "id": 429114, "type": "textbox" },
                        { "id": 429115, "type": "textbox" },
                        { "id": 429116, "type": "textbox" },
                        { "id": 429117, "type": "textbox" },
                        { "id": 429118, "type": "textbox" },
                        { "id": 429119, "type": "textbox" },
                        { "id": 429120, "type": "textbox" },
                        { "id": 429121, "type": "textbox" },
                        { "id": 429122, "type": "textbox" },
                        { "id": 429123, "type": "textarea" },
                        { "id": 429124, "type": "combobox" }
                    ]
                },
                {
                    "id": 7,
                    "nama": "INTRA-HD",
                    "detail": [
                        { "id": 429125, "type": "time" },
                        { "id": 429126, "type": "textbox" },
                        { "id": 429127, "type": "textbox" },
                        { "id": 429128, "type": "textbox" },
                        { "id": 429129, "type": "textbox" },
                        { "id": 429130, "type": "textbox" },
                        { "id": 429131, "type": "textbox" },
                        { "id": 429132, "type": "textbox" },
                        { "id": 429133, "type": "textbox" },
                        { "id": 429134, "type": "textbox" },
                        { "id": 429135, "type": "textarea" },
                        { "id": 429136, "type": "combobox" }
                    ]
                },
                {
                    "id": 8,
                    "nama": "INTRA-HD",
                    "detail": [
                        { "id": 429137, "type": "time" },
                        { "id": 429138, "type": "textbox" },
                        { "id": 429139, "type": "textbox" },
                        { "id": 429140, "type": "textbox" },
                        { "id": 429141, "type": "textbox" },
                        { "id": 429142, "type": "textbox" },
                        { "id": 429143, "type": "textbox" },
                        { "id": 429144, "type": "textbox" },
                        { "id": 429145, "type": "textbox" },
                        { "id": 429146, "type": "textbox" },
                        { "id": 429147, "type": "textarea" },
                        { "id": 429148, "type": "combobox" }
                    ]
                },
                {
                    "id": 9,
                    "nama": "INTRA-HD",
                    "detail": [
                        { "id": 429149, "type": "time" },
                        { "id": 429150, "type": "textbox" },
                        { "id": 429151, "type": "textbox" },
                        { "id": 429152, "type": "textbox" },
                        { "id": 429153, "type": "textbox" },
                        { "id": 429154, "type": "textbox" },
                        { "id": 429155, "type": "textbox" },
                        { "id": 429156, "type": "textbox" },
                        { "id": 429157, "type": "textbox" },
                        { "id": 429158, "type": "textbox" },
                        { "id": 429159, "type": "textarea" },
                        { "id": 429160, "type": "combobox" }
                    ]
                },
                {
                    "id": 10,
                    "nama": "INTRA-HD",
                    "detail": [
                        { "id": 429161, "type": "time" },
                        { "id": 429162, "type": "textbox" },
                        { "id": 429163, "type": "textbox" },
                        { "id": 429164, "type": "textbox" },
                        { "id": 429165, "type": "textbox" },
                        { "id": 429166, "type": "textbox" },
                        { "id": 429167, "type": "textbox" },
                        { "id": 429168, "type": "textbox" },
                        { "id": 429169, "type": "textbox" },
                        { "id": 429170, "type": "textbox" },
                        { "id": 429171, "type": "textarea" },
                        { "id": 429172, "type": "combobox" }
                    ]
                },
                {
                    "id": 11,
                    "nama": "INTRA-HD",
                    "detail": [
                        { "id": 429173, "type": "time" },
                        { "id": 429174, "type": "textbox" },
                        { "id": 429175, "type": "textbox" },
                        { "id": 429176, "type": "textbox" },
                        { "id": 429177, "type": "textbox" },
                        { "id": 429178, "type": "textbox" },
                        { "id": 429179, "type": "textbox" },
                        { "id": 429180, "type": "textbox" },
                        { "id": 429181, "type": "textbox" },
                        { "id": 429182, "type": "textbox" },
                        { "id": 429183, "type": "textarea" },
                        { "id": 429184, "type": "combobox" }
                    ]
                },
                {
                    "id": 12,
                    "nama": "POST-HD",
                    "detail": [
                        { "id": 429185, "type": "time" },
                        { "id": 429186, "type": "textbox" },
                        { "id": 429187, "type": "textbox" },
                        { "id": 429188, "type": "textbox" },
                        { "id": 429189, "type": "textbox" },
                        { "id": 429190, "type": "textbox" },
                        { "id": 429191, "type": "textbox" },
                        { "id": 429192, "type": "textbox" },
                        { "id": 429193, "type": "textbox" },
                        { "id": 429194, "type": "textbox" },
                        { "id": 429195, "type": "textarea" },
                        { "id": 429196, "type": "combobox" }
                    ]
                }
            ]

            $scope.cetakPdf = function () {
                if (norecEMR == '') return
                var local = JSON.parse(localStorage.getItem('profile'));
                var nama = medifirstService.getPegawaiLogin().namalengkap;
                window.open(config.baseApiBackend + 'report/cetak-pengkajian-harian-hemodialisa?nocm='
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
                $scope.item.obj[429205] = $scope.now;
                $scope.item.obj[428951] = $scope.cc.namapasien;
                if ($scope.cc.jeniskelamin == 'PEREMPUAN') {
                    $scope.item.obj[428953] = false;
                    $scope.item.obj[428954] = true;
                } else {
                    $scope.item.obj[428953] = true;
                    $scope.item.obj[428954] = false;
                }
                $scope.item.obj[428956] = $scope.cc.nocm;
                medifirstService.get("emr/get-antrian-pasien-norec/" + noregistrasifk).then(function (e) {
                    var antrianPasien = e.data.result;
                    $scope.item.obj[428955] = moment(antrianPasien.tgllahir).format('YYYY-MM-DD');
                    $scope.item.obj[428957] = antrianPasien.alamatlengkap;
                    // if (antrianPasien.objectruanganfk != null && antrianPasien.namaruangan != null) {
                    //     $scope.item.obj[428900] = {
                    //         value: antrianPasien.objectruanganfk,
                    //         text: antrianPasien.namaruangan
                    //     }
                    // }
                    // if (antrianPasien.iddpjp != null && antrianPasien.dokterdpjp != null) {
                    //     $scope.item.obj[428920] = {
                    //         value: antrianPasien.iddpjp,
                    //         text: antrianPasien.dokterdpjp
                    //     }
                    // }
                })
                
                medifirstService.get("emr/get-vital-sign?noregistrasi=" + $scope.cc.noregistrasi + "&objectidawal=4241&objectidakhir=4246&idemr=147", true).then(function (datas) {
                    if (datas.data.data.length>0){
                        $scope.item.obj[428982] = datas.data.data[1].value; // Tekanan Darah
                        $scope.item.obj[428983] = datas.data.data[5].value; // Nadi
                        $scope.item.obj[428985] = datas.data.data[4].value; // Suhu
                        $scope.item.obj[428984] = datas.data.data[6].value; // Napas
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
                        'Pengkajian Harian Hemodialis ' + ' dengan No EMR - ' + e.data.data.noemr + ' pada No Registrasi '
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

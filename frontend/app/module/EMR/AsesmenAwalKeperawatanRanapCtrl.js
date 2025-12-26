define(['initialize'], function (initialize) {
    'use strict';
    initialize.controller('AsesmenAwalKeperawatanRanapCtrl', ['$q', '$rootScope', '$scope', 'ModelItem', '$state', 'CacheHelper', 'DateHelper', 'MedifirstService',
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
            $scope.cc.emrfk = 290017;
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
            });

            medifirstService.getPart('emr/get-datacombo-part-pegawai', true, true, 20).then(function (data) {
                $scope.listPegawai = data
            });

            medifirstService.getPart('emr/get-datacombo-part-ruangan-pelayanan', true, true, 20).then(function (data) {
                $scope.listRuangan = data
            });

            medifirstService.getPart('emr/get-datacombo-part-kelas', true, true, 20).then(function (data) {
                $scope.listKelas = data
            });

            medifirstService.getPart("sysadmin/general/get-datacombo-icd10", true, true, 10).then(function (data) {
                $scope.listDiagnosa = data;
            });

            medifirstService.getPart("sysadmin/general/get-datacombo-icd10-secondary", true, true, 10).then(function (data) {
                $scope.listDiagnosaSecondary = data;
            });

            medifirstService.getPart("emr/get-datacombo-part-bulan", true, true, 10).then(function (data) {
                $scope.listBulan = data;
            });

            $scope.listStatusFisik = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 421911, "nama": "", "caption": "TD", "type": "textbox", "dataList": "", "satuan": "mmHg" },
                        { "id": 421912, "nama": "", "caption": "Nadi", "type": "textbox", "dataList": "", "satuan": "x/mnt" },
                        { "id": 421913, "nama": "", "caption": "Suhu", "type": "textbox", "dataList": "", "satuan": "C" },
                        { "id": 421914, "nama": "", "caption": "Nafas", "type": "textbox", "dataList": "", "satuan": "x/mnt" },
                        { "id": 421915, "nama": "", "caption": "", "type": "hr", "dataList": "", "satuan": "" },
                        { "id": 421916, "nama": "", "caption": "Keadaan umum", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421917, "nama": "", "caption": "Berat badan", "type": "textbox", "dataList": "", "satuan": "kg" },
                        { "id": 421918, "nama": "", "caption": "Tinggi/panjang badan", "type": "textbox", "dataList": "", "satuan": "cm" },
                        { "id": 421919, "nama": "", "caption": "", "type": "hr", "dataList": "", "satuan": "" },
                        { "id": 421920, "nama": "", "caption": "Kesadaran", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421921, "nama": "CM", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421922, "nama": "Apatis", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421923, "nama": "Somnolen", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421924, "nama": "Sopor", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421925, "nama": "Koma", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421926, "nama": "", "caption": "", "type": "hr", "dataList": "", "satuan": "" },
                        { "id": 421927, "nama": "", "caption": "Kepala", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421928, "nama": "Normal", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421929, "nama": "Benjolan", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421930, "nama": "Luka", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421931, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421932, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" },
                        { "id": 421933, "nama": "", "caption": "", "type": "hr", "dataList": "", "satuan": "" },
                        { "id": 421934, "nama": "", "caption": "Mata", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421935, "nama": "Normal", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421936, "nama": "", "caption": "Pupil", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421937, "nama": "Isokor", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421938, "nama": "Anisokor", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421939, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421940, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" },
                        { "id": 421941, "nama": "", "caption": "", "type": "hr", "dataList": "", "satuan": "" },
                        { "id": 421942, "nama": "", "caption": "THT", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421943, "nama": "Normal", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421944, "nama": "Luka", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421945, "nama": "Sumbatan", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421946, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421947, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" },
                        { "id": 421948, "nama": "", "caption": "", "type": "hr", "dataList": "", "satuan": "" },
                        { "id": 421949, "nama": "", "caption": "Mulut", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421950, "nama": "Normal", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421951, "nama": "Luka", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421952, "nama": "Benjolan", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421953, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421954, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" },
                        { "id": 421955, "nama": "", "caption": "", "type": "hr", "dataList": "", "satuan": "" },
                        { "id": 421956, "nama": "", "caption": "Leher", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421957, "nama": "Normal", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421958, "nama": "Luka", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421959, "nama": "Benjolan", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421960, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421961, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" },
                        { "id": 421962, "nama": "", "caption": "", "type": "hr", "dataList": "", "satuan": "" },
                        { "id": 421963, "nama": "", "caption": "Thorax", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421964, "nama": "Normal", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421965, "nama": "Luka", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421966, "nama": "Benjolan", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421967, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421968, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" },
                        { "id": 421970, "nama": "", "caption": "", "type": "hr", "dataList": "", "satuan": "" },
                        { "id": 421971, "nama": "", "caption": "Abdomen", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421972, "nama": "Normal", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421973, "nama": "Asistes", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421974, "nama": "Tegang", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421975, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421976, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" },
                        { "id": 421977, "nama": "", "caption": "", "type": "hr", "dataList": "", "satuan": "" },
                        { "id": 421978, "nama": "", "caption": "Urogenital", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421979, "nama": "Normal", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421980, "nama": "Tidak normal", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421981, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421982, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" },
                        { "id": 421983, "nama": "", "caption": "", "type": "hr", "dataList": "", "satuan": "" },
                        { "id": 421984, "nama": "", "caption": "Ekstermitas", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421985, "nama": "Normal", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421986, "nama": "", "caption": "Atas", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421987, "nama": "Kuat", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421988, "nama": "Lemah", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421989, "nama": "", "caption": "Bawah", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421990, "nama": "Kuat", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421991, "nama": "Lemah", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421992, "nama": "", "caption": "", "type": "hr", "dataList": "", "satuan": "" },
                        { "id": 421993, "nama": "", "caption": "Kulit", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421994, "nama": "Normal", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421995, "nama": "", "caption": "Turgor", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421996, "nama": "Baik", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421997, "nama": "Dehidrasi", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421998, "nama": "", "caption": "Luka", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421999, "nama": "Ya", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422000, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422001, "nama": "", "caption": "", "type": "hr", "dataList": "", "satuan": "" },
                        { "id": 422002, "nama": "", "caption": "Jantung", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 422003, "nama": "Normal", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422004, "nama": "", "caption": "Nyeri dada", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 422005, "nama": "Ya", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422006, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422007, "nama": "", "caption": "Bunyi Jantung", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 422008, "nama": "Mumur", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422009, "nama": "Gallop", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listEkonomi = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 422036, "nama": "PNS", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422037, "nama": "Pegawai Swasta", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422038, "nama": "TNI/POLRI", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422039, "nama": "Wiraswasta", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422040, "nama": "Petani/Nelayan", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422041, "nama": "Lain-lain", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422042, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listRiwayatKesehatanPasien = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 422043, "nama": "", "caption": "Riwayat penyakit sebelumnya", "type": "textarea", "dataList": "", "satuan": "" },
                        { "id": 422044, "nama": "", "caption": "", "type": "hr", "dataList": "", "satuan": "" },
                        { "id": 422045, "nama": "", "caption": "Riwayat penyakit sekarang", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listRiwayatAlergi = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 422046, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422047, "nama": "Ya, Sebutkan :", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422048, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listRiwayatPenggunaanObat = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 422049, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422050, "nama": "Ya, Sebutkan :", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422051, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listRiwayatPersalinan = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 422063, "nama": "", "caption": "G", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 422064, "nama": "", "caption": "P", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 422065, "nama": "", "caption": "A", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 422066, "nama": "", "caption": "Persalinan", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 422067, "nama": "Spontan", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422068, "nama": "Vacum", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422069, "nama": "Forceps", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422070, "nama": "SC", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422071, "nama": "", "caption": "Ditolong oleh", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 422072, "nama": "Dokter", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422073, "nama": "Bidan", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422074, "nama": "Lainnya", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422075, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" },
                        { "id": 422076, "nama": "", "caption": "Berat Badan", "type": "textbox", "dataList": "", "satuan": "gram" },
                        { "id": 422077, "nama": "", "caption": "Panjang badan", "type": "textbox", "dataList": "", "satuan": "cm" },
                        { "id": 422078, "nama": "", "caption": "Keadaan saat lahir", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 422079, "nama": "Segera menangis", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422080, "nama": "Tidak segera menangis", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listRiwayatTransfusi = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 422085, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422086, "nama": "Ya, berapa kali :", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422087, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" },
                        { "id": 422088, "nama": "", "caption": "Golongan darah", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 422089, "nama": "", "caption": "Reaksi transfusi", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 422090, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422091, "nama": "Ya, reaksi yang timbul :", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422092, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listAsesmenNyeri = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 422093, "nama": "Tidak nyeri", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422094, "nama": "Nyeri, lanjut ke RM 36", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listRisikoJatuh = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 422095, "nama": "", "caption": "Penilaian / pengkajian :", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 422096, "nama": "", "caption": "1. Cara berjalan pasien (salah satu atau lebih)", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 422097, "nama": "", "caption": "a. Tidak seimbang/sempoyongan/limbung", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 422098, "nama": "Ya", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422099, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422100, "nama": "", "caption": "b. Jalan dengan menggunakan alat bantu (kruk/tripot/kursi roda/orang lain) ", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 422101, "nama": "Ya", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422102, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422103, "nama": "", "caption": "2. Menopang saat akan duduk : Tampak memegang pinggiran kursi atau meja atau benda lain sebagai penopang saat akan duduk", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 422104, "nama": "Ya", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422105, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422106, "nama": "", "caption": "Jika terdapat jawaban Ya, pasang gelang penanda warna kuning dan lanjut ke RM 38.1, 38.2, 38.3, 38.4", "type": "label", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listAsesmenFungsional = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 422107, "nama": "", "caption": "Alat bantu", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 422108, "nama": "", "caption": "Prothesa", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 422109, "nama": "", "caption": "Cacat tubuh", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 422110, "nama": "", "caption": "ADL", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 422111, "nama": "Mandiri", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422112, "nama": "Dibantu", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422113, "nama": "Tergantung penuh", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listRisikoNutrisional = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 422114, "nama": "", "caption": "IMT < 20,5 kg/m2 atau LILA < 23,5 cm", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 422115, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422116, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 422117, "nama": "", "caption": "Berat badan berkurang dalam 3 bulan", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 422118, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422119, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 422120, "nama": "", "caption": "Asupan makan menurun dalam 1 minggu terakhir", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 422121, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422122, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 4,
                    "detail": [
                        { "id": 422123, "nama": "", "caption": "Menderita sakit berat, misalnya : kesadaran menurun dan terapi insentif", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 422124, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422125, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 5,
                    "detail": [
                        {
                        "id": 422126, "nama": "", "caption": "Ada gangguan metabolisme (DM, PenyakitJantung, HT, CKD, TBC Keganasan) Lain-lain :", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 422127, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422128, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listSkriningLaktasi = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 32116672, "nama": "", "caption": "Apakah bayi diberi ASI?", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 32116673, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 32116674, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 32116669, "nama": "", "caption": "Apakah puting menonjol (tidak datar atau terbenam)?	", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 32116670, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 32116671, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 32116675, "nama": "", "caption": "Apakah proses menyusui baik (tidak ada kesulitan)?", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 32116676, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 32116677, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 4,
                    "detail": [
                        { "id": 32116678, "nama": "", "caption": "Apakah posisi bayi saat menyusu sudah benar?", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 32116679, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 32116680, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 5,
                    "detail": [
                        { "id": 32116681, "nama": "", "caption": "Apakah bayi melekat dengan baik?", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 32116682, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 32116683, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 6,
                    "detail": [
                        { "id": 32116684, "nama": "", "caption": "Apakah bayi mengisap dengan efektif?", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 32116685, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 32116686, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 7,
                    "detail": [
                        { "id": 32116687, "nama": "", "caption": "Apakah ada dukungan suami/keluarga terdekat?", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 32116688, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 32116689, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                },
            ];

            $scope.listSkriningLaktasiNifas = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 32116708, "nama": "", "caption": "Apakah ibu dan bayi dirawat gabung?", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 32116709, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 32116710, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 32116711, "nama": "", "caption": "Jika dirawat terpisah, apakah bayi tetap diberikan ASI?	", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 32116712, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 32116713, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 32116714, "nama": "", "caption": "Apakah puting menonjol (tidak datar atau terbenam)?", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 32116715, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 32116716, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 4,
                    "detail": [
                        { "id": 32116717, "nama": "", "caption": "Apakah bayi diberi ASI?", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 32116718, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 32116719, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 5,
                    "detail": [
                        { "id": 32116720, "nama": "", "caption": "Apakah proses menyusui baik (tidak ada kesulitan)?", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 32116721, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 32116722, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 6,
                    "detail": [
                        { "id": 32116723, "nama": "", "caption": "Apakah posisi bayi saat menyusu sudah benar?", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 32116724, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 32116725, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 7,
                    "detail": [
                        { "id": 32116726, "nama": "", "caption": "Apakah bayi melekat dengan baik?", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 32116727, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 32116728, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 8,
                    "detail": [
                        { "id": 32116729, "nama": "", "caption": "Apakah bayi mengisap dengan efektif?", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 32116730, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 32116731, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 9,
                    "detail": [
                        { "id": 32116732, "nama": "", "caption": "Apakah ada dukungan suami/keluarga terdekat?", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 32116733, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 32116734, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                },
            ];

            $scope.listKebutuhanEdukasi = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 422129, "nama": "", "caption": "Edukasi diberikan kepada", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 422130, "nama": "Pasien", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422131, "nama": "Keluarga (Hubungan dengan pasien)", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422132, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" },
                        { "id": 422133, "nama": "", "caption": "", "type": "hr", "dataList": "", "satuan": "" },
                        { "id": 422134, "nama": "", "caption": "Hambatan", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 422135, "nama": "Ada Hambatan", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422136, "nama": "Tidak Ada Hambatan", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422137, "nama": "", "caption": "", "type": "hr", "dataList": "", "satuan": "" },
                        { "id": 422138, "nama": "", "caption": "Identifikasi Kebutuhan Edukasi", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 422139, "nama": "Diagnosis penyakit", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422140, "nama": "Penggunaan alat medik", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422141, "nama": "Penggunaan obat", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422142, "nama": "Nutrisi", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422143, "nama": "Perawatan", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422144, "nama": "Manajemen nyeri", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422145, "nama": "Lainnya :", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422146, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" },
                        { "id": 32116793, "nama": "Manajemen laktasi", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listPerencanaanPulang = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 422147, "nama": "", "caption": "Usia lanjut (60 tahun atau lebih) ?", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 422148, "nama": "Ya", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422149, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422150, "nama": "", "caption": "Hambatan mobilisasi ?", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 422151, "nama": "Ya", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422152, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422153, "nama": "", "caption": "Membutuhkan pelayanan medis dan perawatan lanjutan ?", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 422154, "nama": "Ya", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422155, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422156, "nama": "", "caption": "Tergantung dengan orang lain dalam aktivitas harian ?", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 422157, "nama": "Ya", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422158, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422159, "nama": "", "caption": "", "type": "hr", "dataList": "", "satuan": "" },
                        { "id": 422160, "nama": "", "caption": "Jika terdapat jawaban Ya, maka pasien membutuhkan perencanaan pulang khusus", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 422161, "nama": "", "caption": "", "type": "hr", "dataList": "", "satuan": "" },
                        { "id": 422162, "nama": "", "caption": "Orang yang mendampingi dan merawat di rumah", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 422163, "nama": "", "caption": "", "type": "hr", "dataList": "", "satuan": "" },
                        { "id": 422164, "nama": "", "caption": "Transportasi pulang", "type": "textbox", "dataList": "", "satuan": "" }
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
                    $scope.item.obj[421902] = new Date(moment(antrianPasien.tglregistrasi).format('YYYY-MM-DD HH:mm'));
                    // if (antrianPasien.objectruanganfk != null && antrianPasien.namaruangan != null) {
                    //     $scope.item.obj[421150] = {
                    //         value: antrianPasien.objectruanganfk,
                    //         text: antrianPasien.namaruangan
                    //     }
                    // }
                    $scope.item.obj[422167] = $scope.now;
                })
                
                medifirstService.get("emr/get-vital-sign?noregistrasi=" + $scope.cc.noregistrasi + "&objectidawal=4241&objectidakhir=4246&idemr=147", true).then(function (datas) {
                    // if($scope.cc.objectruanganfk == 818 || $scope.cc.objectruanganfk == 834 || $scope.cc.objectruanganfk == 785){
                    //     $scope.skriningLaktasi = true;
                    // }else{
                    //     $scope.skriningLaktasi = false;
                    // }
        
                    // if($scope.cc.objectruanganfk == 821 || $scope.cc.objectruanganfk == 816 || $scope.cc.objectruanganfk == 820 || $scope.cc.objectruanganfk == 822){
                    //     $scope.skriningLaktasiNifas = true;
                    // }else{
                    //     $scope.skriningLaktasiNifas = false;
                    // }
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

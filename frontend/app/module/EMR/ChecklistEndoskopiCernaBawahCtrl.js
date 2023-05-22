define(['initialize'], function (initialize) {
    'use strict';
    initialize.controller('ChecklistEndoskopiCernaBawahCtrl', ['$q', '$rootScope', '$scope', 'ModelItem', '$state', 'CacheHelper', 'DateHelper', 'MedifirstService',
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
            $scope.cc.emrfk = 290156;
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

            $scope.isShiftPagi = false;
            $scope.showShiftPagi = function() {
                $scope.isShiftPagi = !$scope.isShiftPagi;
            }

            $scope.isShiftSiang = false;
            $scope.showShiftSiang = function() {
                $scope.isShiftSiang = !$scope.isShiftSiang;
            }

            $scope.isShiftSore = false;
            $scope.showShiftSore = function() {
                $scope.isShiftSore = !$scope.isShiftSore;
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

            $scope.listAsesmentPagi = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 423856, "nama": "", "caption": "B1 (Breathing)", "type": "textbox", "satuan": "" },
                        { "id": 423857, "nama": "", "caption": "Airway", "type": "label", "satuan": "" },
                        { "id": 423858, "nama": "Bebas", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423859, "nama": "Snoring", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423860, "nama": "Stridor", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423861, "nama": "Gargling", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423862, "nama": "", "caption": "RR", "type": "textbox1", "satuan": "x/menit" },
                        { "id": 423863, "nama": "", "caption": "Flare", "type": "label", "satuan": "" },
                        { "id": 423864, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423865, "nama": "Ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423866, "nama": "", "caption": "Retraksi Iga", "type": "label", "satuan": "" },
                        { "id": 423867, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423868, "nama": "Ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423869, "nama": "", "caption": "Suara Napas", "type": "label", "satuan": "" },
                        { "id": 423870, "nama": "Vesicular / Bronchovesikular", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423871, "nama": "Ronchi :", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423872, "nama": "", "caption": "", "type": "textbox2", "satuan": "" },
                        { "id": 423873, "nama": "Wheezing :", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423874, "nama": "", "caption": "", "type": "textbox2", "satuan": "" },
                        { "id": 423875, "nama": "", "caption": "B2 (Blood)", "type": "textbox", "satuan": "" },
                        { "id": 423876, "nama": "", "caption": "Perfusi", "type": "textbox1", "satuan": "" },
                        { "id": 423877, "nama": "", "caption": "Sp02", "type": "textbox1", "satuan": "%" },
                        { "id": 423878, "nama": "", "caption": "O2", "type": "textbox1", "satuan": "I/menit" },
                        { "id": 423879, "nama": "", "caption": "Metode", "type": "textbox1", "satuan": "" },
                        { "id": 423880, "nama": "", "caption": "BP", "type": "textbox1", "satuan": "" },
                        { "id": 423881, "nama": "", "caption": "HR", "type": "textbox1", "satuan": "" },
                        { "id": 423882, "nama": "", "caption": "Temp", "type": "textbox1", "satuan": "" },
                        { "id": 423883, "nama": "", "caption": "B3 (Brain)", "type": "textbox", "satuan": "" },
                        { "id": 423884, "nama": "", "caption": "Tingkat Kesadaran / GCS", "type": "textbox1", "satuan": "" },
                        { "id": 423885, "nama": "", "caption": "E", "type": "textbox1", "satuan": "" },
                        { "id": 423886, "nama": "", "caption": "V", "type": "textbox1", "satuan": "" },
                        { "id": 423887, "nama": "", "caption": "M", "type": "textbox1", "satuan": "" },
                        { "id": 423888, "nama": "", "caption": "Pupil / Diameter", "type": "label", "satuan": "" },
                        { "id": 423889, "nama": "", "caption": "Kanan", "type": "textbox1", "satuan": "" },
                        { "id": 423890, "nama": "", "caption": "Kiri", "type": "textbox1", "satuan": "" },
                        { "id": 423891, "nama": "", "caption": "Refleks Cahaya", "type": "label", "satuan": "" },
                        { "id": 423892, "nama": "", "caption": "Kanan", "type": "textbox1", "satuan": "" },
                        { "id": 423893, "nama": "", "caption": "Kiri", "type": "textbox1", "satuan": "" },
                        { "id": 423894, "nama": "", "caption": "Parase / Plegia", "type": "textbox1", "satuan": "" },
                        { "id": 423895, "nama": "", "caption": "B4 (Bladder)", "type": "label", "satuan": "" },
                        { "id": 423896, "nama": "", "caption": "Intake", "type": "textbox1", "satuan": "" },
                        { "id": 423897, "nama": "", "caption": "Output", "type": "textbox1", "satuan": "" },
                        { "id": 423898, "nama": "", "caption": "Balance Cairan", "type": "label", "satuan": "" },
                        { "id": 423899, "nama": "", "caption": "WL", "type": "textbox1", "satuan": "cc" },
                        { "id": 423900, "nama": "", "caption": "Balance", "type": "label", "satuan": "" },
                        { "id": 423901, "nama": "Defisit", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423902, "nama": "Excess", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423903, "nama": "", "caption": "B5 (Bowel)", "type": "textbox", "satuan": "" },
                        { "id": 423904, "nama": "", "caption": "Distensi Abdomen", "type": "label", "satuan": "" },
                        { "id": 423905, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423906, "nama": "Ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423907, "nama": "", "caption": "Peristaltik", "type": "label", "satuan": "" },
                        { "id": 423908, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423909, "nama": "Ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423910, "nama": "", "caption": "B6 (Bone)", "type": "textbox", "satuan": "" },
                        { "id": 423911, "nama": "", "caption": "Wound / Balutan", "type": "label", "satuan": "" },
                        { "id": 423912, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423913, "nama": "Ada, Lokasi :", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423914, "nama": "", "caption": "", "type": "textbox2", "satuan": "" },
                        { "id": 423915, "nama": "Bersih", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423916, "nama": "Pus", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423917, "nama": "Granulasi", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423918, "nama": "Netkrotik", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423919, "nama": "", "caption": "Udem Pretibia", "type": "label", "satuan": "" },
                        { "id": 423920, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423921, "nama": "Ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423922, "nama": "", "caption": "Fraktur", "type": "label", "satuan": "" },
                        { "id": 423923, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423924, "nama": "Ada, Lokasi :", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423925, "nama": "", "caption": "", "type": "textbox2", "satuan": "" },
                        { "id": 423926, "nama": "", "caption": "IVFD / Cairan / Sonde", "type": "textarea", "satuan": "" },
                        { "id": 423927, "nama": "", "caption": "Pemeriksaan Penunjang Terakhir", "type": "textarea", "satuan": "" }
                    ]
                }
            ];

            $scope.listAsesmentSiang = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 423935, "nama": "", "caption": "B1 (Breathing)", "type": "textbox", "satuan": "" },
                        { "id": 423936, "nama": "", "caption": "Airway", "type": "label", "satuan": "" },
                        { "id": 423937, "nama": "Bebas", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423938, "nama": "Snoring", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423939, "nama": "Stridor", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423940, "nama": "Gargling", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423941, "nama": "", "caption": "RR", "type": "textbox1", "satuan": "x/menit" },
                        { "id": 423942, "nama": "", "caption": "Flare", "type": "label", "satuan": "" },
                        { "id": 423943, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423944, "nama": "Ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423945, "nama": "", "caption": "Retraksi Iga", "type": "label", "satuan": "" },
                        { "id": 423946, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423947, "nama": "Ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423948, "nama": "", "caption": "Suara Napas", "type": "label", "satuan": "" },
                        { "id": 423949, "nama": "Vesicular / Bronchovesikular", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423950, "nama": "Ronchi :", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423951, "nama": "", "caption": "", "type": "textbox2", "satuan": "" },
                        { "id": 423952, "nama": "Wheezing :", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423953, "nama": "", "caption": "", "type": "textbox2", "satuan": "" },
                        { "id": 423954, "nama": "", "caption": "B2 (Blood)", "type": "textbox", "satuan": "" },
                        { "id": 423955, "nama": "", "caption": "Perfusi", "type": "textbox1", "satuan": "" },
                        { "id": 423956, "nama": "", "caption": "Sp02", "type": "textbox1", "satuan": "%" },
                        { "id": 423957, "nama": "", "caption": "O2", "type": "textbox1", "satuan": "I/menit" },
                        { "id": 423958, "nama": "", "caption": "Metode", "type": "textbox1", "satuan": "" },
                        { "id": 423959, "nama": "", "caption": "BP", "type": "textbox1", "satuan": "" },
                        { "id": 423960, "nama": "", "caption": "HR", "type": "textbox1", "satuan": "" },
                        { "id": 423961, "nama": "", "caption": "Temp", "type": "textbox1", "satuan": "" },
                        { "id": 423962, "nama": "", "caption": "B3 (Brain)", "type": "textbox", "satuan": "" },
                        { "id": 423963, "nama": "", "caption": "Tingkat Kesadaran / GCS", "type": "textbox1", "satuan": "" },
                        { "id": 423964, "nama": "", "caption": "E", "type": "textbox1", "satuan": "" },
                        { "id": 423965, "nama": "", "caption": "V", "type": "textbox1", "satuan": "" },
                        { "id": 423966, "nama": "", "caption": "M", "type": "textbox1", "satuan": "" },
                        { "id": 423967, "nama": "", "caption": "Pupil / Diameter", "type": "label", "satuan": "" },
                        { "id": 423968, "nama": "", "caption": "Kanan", "type": "textbox1", "satuan": "" },
                        { "id": 423969, "nama": "", "caption": "Kiri", "type": "textbox1", "satuan": "" },
                        { "id": 423970, "nama": "", "caption": "Refleks Cahaya", "type": "label", "satuan": "" },
                        { "id": 423971, "nama": "", "caption": "Kanan", "type": "textbox1", "satuan": "" },
                        { "id": 423972, "nama": "", "caption": "Kiri", "type": "textbox1", "satuan": "" },
                        { "id": 423973, "nama": "", "caption": "Parase / Plegia", "type": "textbox1", "satuan": "" },
                        { "id": 423974, "nama": "", "caption": "B4 (Bladder)", "type": "label", "satuan": "" },
                        { "id": 423975, "nama": "", "caption": "Intake", "type": "textbox1", "satuan": "" },
                        { "id": 423976, "nama": "", "caption": "Output", "type": "textbox1", "satuan": "" },
                        { "id": 423977, "nama": "", "caption": "Balance Cairan", "type": "label", "satuan": "" },
                        { "id": 423978, "nama": "", "caption": "WL", "type": "textbox1", "satuan": "cc" },
                        { "id": 423979, "nama": "", "caption": "Balance", "type": "label", "satuan": "" },
                        { "id": 423980, "nama": "Defisit", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423981, "nama": "Excess", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423982, "nama": "", "caption": "B5 (Bowel)", "type": "textbox", "satuan": "" },
                        { "id": 423983, "nama": "", "caption": "Distensi Abdomen", "type": "label", "satuan": "" },
                        { "id": 423984, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423985, "nama": "Ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423986, "nama": "", "caption": "Peristaltik", "type": "label", "satuan": "" },
                        { "id": 423987, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423988, "nama": "Ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423989, "nama": "", "caption": "B6 (Bone)", "type": "textbox", "satuan": "" },
                        { "id": 423990, "nama": "", "caption": "Wound / Balutan", "type": "label", "satuan": "" },
                        { "id": 423991, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423992, "nama": "Ada, Lokasi :", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423993, "nama": "", "caption": "", "type": "textbox2", "satuan": "" },
                        { "id": 423994, "nama": "Bersih", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423995, "nama": "Pus", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423996, "nama": "Granulasi", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423997, "nama": "Netkrotik", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 423998, "nama": "", "caption": "Udem Pretibia", "type": "label", "satuan": "" },
                        { "id": 423999, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 424000, "nama": "Ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 424001, "nama": "", "caption": "Fraktur", "type": "label", "satuan": "" },
                        { "id": 424002, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 424003, "nama": "Ada, Lokasi :", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 424004, "nama": "", "caption": "", "type": "textbox2", "satuan": "" },
                        { "id": 424005, "nama": "", "caption": "IVFD / Cairan / Sonde", "type": "textarea", "satuan": "" },
                        { "id": 424006, "nama": "", "caption": "Pemeriksaan Penunjang Terakhir", "type": "textarea", "satuan": "" }
                    ]
                }
            ];

            $scope.listAsesmentSore = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424014, "nama": "", "caption": "B1 (Breathing)", "type": "textbox", "satuan": "" },
                        { "id": 424015, "nama": "", "caption": "Airway", "type": "label", "satuan": "" },
                        { "id": 424016, "nama": "Bebas", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 424017, "nama": "Snoring", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 424018, "nama": "Stridor", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 424019, "nama": "Gargling", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 424020, "nama": "", "caption": "RR", "type": "textbox1", "satuan": "x/menit" },
                        { "id": 424021, "nama": "", "caption": "Flare", "type": "label", "satuan": "" },
                        { "id": 424022, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 424023, "nama": "Ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 424024, "nama": "", "caption": "Retraksi Iga", "type": "label", "satuan": "" },
                        { "id": 424025, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 424026, "nama": "Ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 424027, "nama": "", "caption": "Suara Napas", "type": "label", "satuan": "" },
                        { "id": 424028, "nama": "Vesicular / Bronchovesikular", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 424029, "nama": "Ronchi :", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 424030, "nama": "", "caption": "", "type": "textbox2", "satuan": "" },
                        { "id": 424031, "nama": "Wheezing :", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 424032, "nama": "", "caption": "", "type": "textbox2", "satuan": "" },
                        { "id": 424033, "nama": "", "caption": "B2 (Blood)", "type": "textbox", "satuan": "" },
                        { "id": 424034, "nama": "", "caption": "Perfusi", "type": "textbox1", "satuan": "" },
                        { "id": 424035, "nama": "", "caption": "Sp02", "type": "textbox1", "satuan": "%" },
                        { "id": 424036, "nama": "", "caption": "O2", "type": "textbox1", "satuan": "I/menit" },
                        { "id": 424037, "nama": "", "caption": "Metode", "type": "textbox1", "satuan": "" },
                        { "id": 424038, "nama": "", "caption": "BP", "type": "textbox1", "satuan": "" },
                        { "id": 424039, "nama": "", "caption": "HR", "type": "textbox1", "satuan": "" },
                        { "id": 424040, "nama": "", "caption": "Temp", "type": "textbox1", "satuan": "" },
                        { "id": 424041, "nama": "", "caption": "B3 (Brain)", "type": "textbox", "satuan": "" },
                        { "id": 424042, "nama": "", "caption": "Tingkat Kesadaran / GCS", "type": "textbox1", "satuan": "" },
                        { "id": 424043, "nama": "", "caption": "E", "type": "textbox1", "satuan": "" },
                        { "id": 424044, "nama": "", "caption": "V", "type": "textbox1", "satuan": "" },
                        { "id": 424045, "nama": "", "caption": "M", "type": "textbox1", "satuan": "" },
                        { "id": 424046, "nama": "", "caption": "Pupil / Diameter", "type": "label", "satuan": "" },
                        { "id": 424047, "nama": "", "caption": "Kanan", "type": "textbox1", "satuan": "" },
                        { "id": 424048, "nama": "", "caption": "Kiri", "type": "textbox1", "satuan": "" },
                        { "id": 424049, "nama": "", "caption": "Refleks Cahaya", "type": "label", "satuan": "" },
                        { "id": 424050, "nama": "", "caption": "Kanan", "type": "textbox1", "satuan": "" },
                        { "id": 424051, "nama": "", "caption": "Kiri", "type": "textbox1", "satuan": "" },
                        { "id": 424052, "nama": "", "caption": "Parase / Plegia", "type": "textbox1", "satuan": "" },
                        { "id": 424053, "nama": "", "caption": "B4 (Bladder)", "type": "label", "satuan": "" },
                        { "id": 424054, "nama": "", "caption": "Intake", "type": "textbox1", "satuan": "" },
                        { "id": 424055, "nama": "", "caption": "Output", "type": "textbox1", "satuan": "" },
                        { "id": 424056, "nama": "", "caption": "Balance Cairan", "type": "label", "satuan": "" },
                        { "id": 424057, "nama": "", "caption": "WL", "type": "textbox1", "satuan": "cc" },
                        { "id": 424058, "nama": "", "caption": "Balance", "type": "label", "satuan": "" },
                        { "id": 424059, "nama": "Defisit", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 424060, "nama": "Excess", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 424061, "nama": "", "caption": "B5 (Bowel)", "type": "textbox", "satuan": "" },
                        { "id": 424062, "nama": "", "caption": "Distensi Abdomen", "type": "label", "satuan": "" },
                        { "id": 424063, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 424064, "nama": "Ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 424065, "nama": "", "caption": "Peristaltik", "type": "label", "satuan": "" },
                        { "id": 424066, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 424067, "nama": "Ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 424068, "nama": "", "caption": "B6 (Bone)", "type": "textbox", "satuan": "" },
                        { "id": 424069, "nama": "", "caption": "Wound / Balutan", "type": "label", "satuan": "" },
                        { "id": 424070, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 424071, "nama": "Ada, Lokasi :", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 424072, "nama": "", "caption": "", "type": "textbox2", "satuan": "" },
                        { "id": 424073, "nama": "Bersih", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 424074, "nama": "Pus", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 424075, "nama": "Granulasi", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 424076, "nama": "Netkrotik", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 424077, "nama": "", "caption": "Udem Pretibia", "type": "label", "satuan": "" },
                        { "id": 424078, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 424079, "nama": "Ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 424080, "nama": "", "caption": "Fraktur", "type": "label", "satuan": "" },
                        { "id": 424081, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 424082, "nama": "Ada, Lokasi :", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 424083, "nama": "", "caption": "", "type": "textbox2", "satuan": "" },
                        { "id": 424084, "nama": "", "caption": "IVFD / Cairan / Sonde", "type": "textarea", "satuan": "" },
                        { "id": 424085, "nama": "", "caption": "Pemeriksaan Penunjang Terakhir", "type": "textarea", "satuan": "" }
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
                // medifirstService.get("emr/get-antrian-pasien-norec/" + noregistrasifk).then(function (e) {
                //     var antrianPasien = e.data.result;
                    // $scope.item.obj[420303] = antrianPasien.namapasien;
                    // $scope.item.obj[420304] = antrianPasien.nocm;
                    // $scope.item.obj[420307] = new Date(moment(antrianPasien.tgllahir).format('YYYY-MM-DD'));
                    // $scope.item.obj[420310] = antrianPasien.alamatlengkap;
                    // if (antrianPasien.jeniskelamin == 'PEREMPUAN') {
                    //     $scope.item.obj[420305] = false;
                    //     $scope.item.obj[420306] = true;
                    // } else {
                    //     $scope.item.obj[420305] = true;
                    //     $scope.item.obj[420306] = false;
                    // }
                    // $scope.item.obj[420327] = new Date(moment(antrianPasien.tglregistrasi).format('YYYY-MM-DD HH:mm'));
                    // if (antrianPasien.iddpjp != null && antrianPasien.dokterdpjp != null) {
                    //     $scope.item.obj[420393] = {
                    //         value: antrianPasien.iddpjp,
                    //         text: antrianPasien.dokterdpjp
                    //     }
                    // }
                    // if (antrianPasien.objectruanganfk != null && antrianPasien.namaruangan != null) {
                    //     $scope.item.obj[420326] = {
                    //         value: antrianPasien.objectruanganfk,
                    //         text: antrianPasien.namaruangan
                    //     }
                    // }
                    
                    $scope.item.obj[423850] = $scope.now;
                // })
                
                // medifirstService.get("emr/get-vital-sign?noregistrasi=" + $scope.cc.noregistrasi + "&objectidawal=4241&objectidakhir=4246&idemr=147", true).then(function (datas) {
                //     if (datas.data.data.length>0){
                        // $scope.item.obj[4228]=datas.data.data[0].value
                        // $scope.item.obj[4229]=datas.data.data[3].value
                        // $scope.item.obj[4230]=datas.data.data[4].value
                        // $scope.item.obj[4231]=datas.data.data[5].value
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
                        'Kolonoskopi' + ' dengan No EMR - ' + e.data.data.noemr + ' pada No Registrasi '
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

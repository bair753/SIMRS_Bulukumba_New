define(['initialize'], function (initialize) {
    'use strict';
    initialize.controller('CheckListKeselamatanPasienDiKamarRequestIGDCtrl', ['$q', '$rootScope', '$scope', 'ModelItem', '$state', 'CacheHelper', 'DateHelper', 'MedifirstService',
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
            $scope.cc.emrfk = 290081;
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
                        { "id": 427656, "nama": "", "caption": "B1 (Breathing)", "type": "textbox", "satuan": "" },
                        { "id": 427657, "nama": "", "caption": "Airway", "type": "label", "satuan": "" },
                        { "id": 427658, "nama": "Bebas", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427659, "nama": "Snoring", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427660, "nama": "Stridor", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427661, "nama": "Gargling", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427662, "nama": "", "caption": "RR", "type": "textbox1", "satuan": "x/menit" },
                        { "id": 427663, "nama": "", "caption": "Flare", "type": "label", "satuan": "" },
                        { "id": 427664, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427665, "nama": "Ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427666, "nama": "", "caption": "Retraksi Iga", "type": "label", "satuan": "" },
                        { "id": 427667, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427668, "nama": "Ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427669, "nama": "", "caption": "Suara Napas", "type": "label", "satuan": "" },
                        { "id": 427670, "nama": "Vesicular / Bronchovesikular", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427671, "nama": "Ronchi :", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427672, "nama": "", "caption": "", "type": "textbox2", "satuan": "" },
                        { "id": 427673, "nama": "Wheezing :", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427674, "nama": "", "caption": "", "type": "textbox2", "satuan": "" },
                        { "id": 427675, "nama": "", "caption": "B2 (Blood)", "type": "textbox", "satuan": "" },
                        { "id": 427676, "nama": "", "caption": "Perfusi", "type": "textbox1", "satuan": "" },
                        { "id": 427677, "nama": "", "caption": "Sp02", "type": "textbox1", "satuan": "%" },
                        { "id": 427678, "nama": "", "caption": "O2", "type": "textbox1", "satuan": "I/menit" },
                        { "id": 427679, "nama": "", "caption": "Metode", "type": "textbox1", "satuan": "" },
                        { "id": 427680, "nama": "", "caption": "BP", "type": "textbox1", "satuan": "" },
                        { "id": 427681, "nama": "", "caption": "HR", "type": "textbox1", "satuan": "" },
                        { "id": 427682, "nama": "", "caption": "Temp", "type": "textbox1", "satuan": "" },
                        { "id": 427683, "nama": "", "caption": "B3 (Brain)", "type": "textbox", "satuan": "" },
                        { "id": 427684, "nama": "", "caption": "Tingkat Kesadaran / GCS", "type": "textbox1", "satuan": "" },
                        { "id": 427685, "nama": "", "caption": "E", "type": "textbox1", "satuan": "" },
                        { "id": 427686, "nama": "", "caption": "V", "type": "textbox1", "satuan": "" },
                        { "id": 427687, "nama": "", "caption": "M", "type": "textbox1", "satuan": "" },
                        { "id": 427688, "nama": "", "caption": "Pupil / Diameter", "type": "label", "satuan": "" },
                        { "id": 427689, "nama": "", "caption": "Kanan", "type": "textbox1", "satuan": "" },
                        { "id": 427690, "nama": "", "caption": "Kiri", "type": "textbox1", "satuan": "" },
                        { "id": 427691, "nama": "", "caption": "Refleks Cahaya", "type": "label", "satuan": "" },
                        { "id": 427692, "nama": "", "caption": "Kanan", "type": "textbox1", "satuan": "" },
                        { "id": 427693, "nama": "", "caption": "Kiri", "type": "textbox1", "satuan": "" },
                        { "id": 427694, "nama": "", "caption": "Parase / Plegia", "type": "textbox1", "satuan": "" },
                        { "id": 427695, "nama": "", "caption": "B4 (Bladder)", "type": "label", "satuan": "" },
                        { "id": 427696, "nama": "", "caption": "Intake", "type": "textbox1", "satuan": "" },
                        { "id": 427697, "nama": "", "caption": "Output", "type": "textbox1", "satuan": "" },
                        { "id": 427698, "nama": "", "caption": "Balance Cairan", "type": "label", "satuan": "" },
                        { "id": 427699, "nama": "", "caption": "WL", "type": "textbox1", "satuan": "cc" },
                        { "id": 427700, "nama": "", "caption": "Balance", "type": "label", "satuan": "" },
                        { "id": 427701, "nama": "Defisit", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427702, "nama": "Excess", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427703, "nama": "", "caption": "B5 (Bowel)", "type": "textbox", "satuan": "" },
                        { "id": 427704, "nama": "", "caption": "Distensi Abdomen", "type": "label", "satuan": "" },
                        { "id": 427705, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427706, "nama": "Ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427707, "nama": "", "caption": "Peristaltik", "type": "label", "satuan": "" },
                        { "id": 427708, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427709, "nama": "Ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427710, "nama": "", "caption": "B6 (Bone)", "type": "textbox", "satuan": "" },
                        { "id": 427711, "nama": "", "caption": "Wound / Balutan", "type": "label", "satuan": "" },
                        { "id": 427712, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427713, "nama": "Ada, Lokasi :", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427714, "nama": "", "caption": "", "type": "textbox2", "satuan": "" },
                        { "id": 427715, "nama": "Bersih", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427716, "nama": "Pus", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427717, "nama": "Granulasi", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427718, "nama": "Netkrotik", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427719, "nama": "", "caption": "Udem Pretibia", "type": "label", "satuan": "" },
                        { "id": 427720, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427721, "nama": "Ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427722, "nama": "", "caption": "Fraktur", "type": "label", "satuan": "" },
                        { "id": 427723, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427724, "nama": "Ada, Lokasi :", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427725, "nama": "", "caption": "", "type": "textbox2", "satuan": "" },
                        { "id": 427726, "nama": "", "caption": "IVFD / Cairan / Sonde", "type": "textarea", "satuan": "" },
                        { "id": 427727, "nama": "", "caption": "Pemeriksaan Penunjang Terakhir", "type": "textarea", "satuan": "" }
                    ]
                }
            ];

            $scope.listAsesmentSiang = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 427735, "nama": "", "caption": "B1 (Breathing)", "type": "textbox", "satuan": "" },
                        { "id": 427736, "nama": "", "caption": "Airway", "type": "label", "satuan": "" },
                        { "id": 427737, "nama": "Bebas", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427738, "nama": "Snoring", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427739, "nama": "Stridor", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427740, "nama": "Gargling", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427741, "nama": "", "caption": "RR", "type": "textbox1", "satuan": "x/menit" },
                        { "id": 427742, "nama": "", "caption": "Flare", "type": "label", "satuan": "" },
                        { "id": 427743, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427744, "nama": "Ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427745, "nama": "", "caption": "Retraksi Iga", "type": "label", "satuan": "" },
                        { "id": 427746, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427747, "nama": "Ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427748, "nama": "", "caption": "Suara Napas", "type": "label", "satuan": "" },
                        { "id": 427749, "nama": "Vesicular / Bronchovesikular", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427750, "nama": "Ronchi :", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427751, "nama": "", "caption": "", "type": "textbox2", "satuan": "" },
                        { "id": 427752, "nama": "Wheezing :", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427753, "nama": "", "caption": "", "type": "textbox2", "satuan": "" },
                        { "id": 427754, "nama": "", "caption": "B2 (Blood)", "type": "textbox", "satuan": "" },
                        { "id": 427755, "nama": "", "caption": "Perfusi", "type": "textbox1", "satuan": "" },
                        { "id": 427756, "nama": "", "caption": "Sp02", "type": "textbox1", "satuan": "%" },
                        { "id": 427757, "nama": "", "caption": "O2", "type": "textbox1", "satuan": "I/menit" },
                        { "id": 427758, "nama": "", "caption": "Metode", "type": "textbox1", "satuan": "" },
                        { "id": 427759, "nama": "", "caption": "BP", "type": "textbox1", "satuan": "" },
                        { "id": 427760, "nama": "", "caption": "HR", "type": "textbox1", "satuan": "" },
                        { "id": 427761, "nama": "", "caption": "Temp", "type": "textbox1", "satuan": "" },
                        { "id": 427762, "nama": "", "caption": "B3 (Brain)", "type": "textbox", "satuan": "" },
                        { "id": 427763, "nama": "", "caption": "Tingkat Kesadaran / GCS", "type": "textbox1", "satuan": "" },
                        { "id": 427764, "nama": "", "caption": "E", "type": "textbox1", "satuan": "" },
                        { "id": 427765, "nama": "", "caption": "V", "type": "textbox1", "satuan": "" },
                        { "id": 427766, "nama": "", "caption": "M", "type": "textbox1", "satuan": "" },
                        { "id": 427767, "nama": "", "caption": "Pupil / Diameter", "type": "label", "satuan": "" },
                        { "id": 427768, "nama": "", "caption": "Kanan", "type": "textbox1", "satuan": "" },
                        { "id": 427769, "nama": "", "caption": "Kiri", "type": "textbox1", "satuan": "" },
                        { "id": 427770, "nama": "", "caption": "Refleks Cahaya", "type": "label", "satuan": "" },
                        { "id": 427771, "nama": "", "caption": "Kanan", "type": "textbox1", "satuan": "" },
                        { "id": 427772, "nama": "", "caption": "Kiri", "type": "textbox1", "satuan": "" },
                        { "id": 427773, "nama": "", "caption": "Parase / Plegia", "type": "textbox1", "satuan": "" },
                        { "id": 427774, "nama": "", "caption": "B4 (Bladder)", "type": "label", "satuan": "" },
                        { "id": 427775, "nama": "", "caption": "Intake", "type": "textbox1", "satuan": "" },
                        { "id": 427776, "nama": "", "caption": "Output", "type": "textbox1", "satuan": "" },
                        { "id": 427777, "nama": "", "caption": "Balance Cairan", "type": "label", "satuan": "" },
                        { "id": 427778, "nama": "", "caption": "WL", "type": "textbox1", "satuan": "cc" },
                        { "id": 427779, "nama": "", "caption": "Balance", "type": "label", "satuan": "" },
                        { "id": 427780, "nama": "Defisit", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427781, "nama": "Excess", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427782, "nama": "", "caption": "B5 (Bowel)", "type": "textbox", "satuan": "" },
                        { "id": 427783, "nama": "", "caption": "Distensi Abdomen", "type": "label", "satuan": "" },
                        { "id": 427784, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427785, "nama": "Ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427786, "nama": "", "caption": "Peristaltik", "type": "label", "satuan": "" },
                        { "id": 427787, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427788, "nama": "Ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427789, "nama": "", "caption": "B6 (Bone)", "type": "textbox", "satuan": "" },
                        { "id": 427790, "nama": "", "caption": "Wound / Balutan", "type": "label", "satuan": "" },
                        { "id": 427791, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427792, "nama": "Ada, Lokasi :", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427793, "nama": "", "caption": "", "type": "textbox2", "satuan": "" },
                        { "id": 427794, "nama": "Bersih", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427795, "nama": "Pus", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427796, "nama": "Granulasi", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427797, "nama": "Netkrotik", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427798, "nama": "", "caption": "Udem Pretibia", "type": "label", "satuan": "" },
                        { "id": 427799, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427800, "nama": "Ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427801, "nama": "", "caption": "Fraktur", "type": "label", "satuan": "" },
                        { "id": 427802, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427803, "nama": "Ada, Lokasi :", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427804, "nama": "", "caption": "", "type": "textbox2", "satuan": "" },
                        { "id": 427805, "nama": "", "caption": "IVFD / Cairan / Sonde", "type": "textarea", "satuan": "" },
                        { "id": 427806, "nama": "", "caption": "Pemeriksaan Penunjang Terakhir", "type": "textarea", "satuan": "" }
                    ]
                }
            ];

            $scope.listAsesmentSore = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 427814, "nama": "", "caption": "B1 (Breathing)", "type": "textbox", "satuan": "" },
                        { "id": 427815, "nama": "", "caption": "Airway", "type": "label", "satuan": "" },
                        { "id": 427816, "nama": "Bebas", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427817, "nama": "Snoring", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427818, "nama": "Stridor", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427819, "nama": "Gargling", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427820, "nama": "", "caption": "RR", "type": "textbox1", "satuan": "x/menit" },
                        { "id": 427821, "nama": "", "caption": "Flare", "type": "label", "satuan": "" },
                        { "id": 427822, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427823, "nama": "Ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427824, "nama": "", "caption": "Retraksi Iga", "type": "label", "satuan": "" },
                        { "id": 427825, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427826, "nama": "Ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427827, "nama": "", "caption": "Suara Napas", "type": "label", "satuan": "" },
                        { "id": 427828, "nama": "Vesicular / Bronchovesikular", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427829, "nama": "Ronchi :", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427830, "nama": "", "caption": "", "type": "textbox2", "satuan": "" },
                        { "id": 427831, "nama": "Wheezing :", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427832, "nama": "", "caption": "", "type": "textbox2", "satuan": "" },
                        { "id": 427833, "nama": "", "caption": "B2 (Blood)", "type": "textbox", "satuan": "" },
                        { "id": 427834, "nama": "", "caption": "Perfusi", "type": "textbox1", "satuan": "" },
                        { "id": 427835, "nama": "", "caption": "Sp02", "type": "textbox1", "satuan": "%" },
                        { "id": 427836, "nama": "", "caption": "O2", "type": "textbox1", "satuan": "I/menit" },
                        { "id": 427837, "nama": "", "caption": "Metode", "type": "textbox1", "satuan": "" },
                        { "id": 427838, "nama": "", "caption": "BP", "type": "textbox1", "satuan": "" },
                        { "id": 427839, "nama": "", "caption": "HR", "type": "textbox1", "satuan": "" },
                        { "id": 427840, "nama": "", "caption": "Temp", "type": "textbox1", "satuan": "" },
                        { "id": 427841, "nama": "", "caption": "B3 (Brain)", "type": "textbox", "satuan": "" },
                        { "id": 427842, "nama": "", "caption": "Tingkat Kesadaran / GCS", "type": "textbox1", "satuan": "" },
                        { "id": 427843, "nama": "", "caption": "E", "type": "textbox1", "satuan": "" },
                        { "id": 427844, "nama": "", "caption": "V", "type": "textbox1", "satuan": "" },
                        { "id": 427845, "nama": "", "caption": "M", "type": "textbox1", "satuan": "" },
                        { "id": 427846, "nama": "", "caption": "Pupil / Diameter", "type": "label", "satuan": "" },
                        { "id": 427847, "nama": "", "caption": "Kanan", "type": "textbox1", "satuan": "" },
                        { "id": 427848, "nama": "", "caption": "Kiri", "type": "textbox1", "satuan": "" },
                        { "id": 427849, "nama": "", "caption": "Refleks Cahaya", "type": "label", "satuan": "" },
                        { "id": 427850, "nama": "", "caption": "Kanan", "type": "textbox1", "satuan": "" },
                        { "id": 427851, "nama": "", "caption": "Kiri", "type": "textbox1", "satuan": "" },
                        { "id": 427852, "nama": "", "caption": "Parase / Plegia", "type": "textbox1", "satuan": "" },
                        { "id": 427853, "nama": "", "caption": "B4 (Bladder)", "type": "label", "satuan": "" },
                        { "id": 427854, "nama": "", "caption": "Intake", "type": "textbox1", "satuan": "" },
                        { "id": 427855, "nama": "", "caption": "Output", "type": "textbox1", "satuan": "" },
                        { "id": 427856, "nama": "", "caption": "Balance Cairan", "type": "label", "satuan": "" },
                        { "id": 427857, "nama": "", "caption": "WL", "type": "textbox1", "satuan": "cc" },
                        { "id": 427858, "nama": "", "caption": "Balance", "type": "label", "satuan": "" },
                        { "id": 427859, "nama": "Defisit", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427860, "nama": "Excess", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427861, "nama": "", "caption": "B5 (Bowel)", "type": "textbox", "satuan": "" },
                        { "id": 427862, "nama": "", "caption": "Distensi Abdomen", "type": "label", "satuan": "" },
                        { "id": 427863, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427864, "nama": "Ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427865, "nama": "", "caption": "Peristaltik", "type": "label", "satuan": "" },
                        { "id": 427866, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427867, "nama": "Ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427868, "nama": "", "caption": "B6 (Bone)", "type": "textbox", "satuan": "" },
                        { "id": 427869, "nama": "", "caption": "Wound / Balutan", "type": "label", "satuan": "" },
                        { "id": 427870, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427871, "nama": "Ada, Lokasi :", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427872, "nama": "", "caption": "", "type": "textbox2", "satuan": "" },
                        { "id": 427873, "nama": "Bersih", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427874, "nama": "Pus", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427875, "nama": "Granulasi", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427876, "nama": "Netkrotik", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427877, "nama": "", "caption": "Udem Pretibia", "type": "label", "satuan": "" },
                        { "id": 427878, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427879, "nama": "Ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427880, "nama": "", "caption": "Fraktur", "type": "label", "satuan": "" },
                        { "id": 427881, "nama": "Tidak ada", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427882, "nama": "Ada, Lokasi :", "caption": "", "type": "checkbox", "satuan": "" },
                        { "id": 427883, "nama": "", "caption": "", "type": "textbox2", "satuan": "" },
                        { "id": 427884, "nama": "", "caption": "IVFD / Cairan / Sonde", "type": "textarea", "satuan": "" },
                        { "id": 427885, "nama": "", "caption": "Pemeriksaan Penunjang Terakhir", "type": "textarea", "satuan": "" }
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
                    
                $scope.item.obj[427650] = $scope.now;
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
                        'Check List Keselamatan Pasien Di Kamar Operasi IGD' + ' dengan No EMR - ' + e.data.data.noemr + ' pada No Registrasi '
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

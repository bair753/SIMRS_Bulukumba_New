define(['initialize'], function (initialize) {
    'use strict';
    initialize.controller('GrafikTandaVital3Ctrl', ['$q', '$rootScope', '$scope', 'ModelItem', '$state', 'CacheHelper', 'DateHelper', 'MedifirstService',
        function ($q, $rootScope, $scope, ModelItem, $state, cacheHelper, dateHelper, medifirstService) {


            $scope.noCM = $state.params.noCM;
            $scope.tombolSimpanVis = true
            $scope.noRecPap = cacheHelper.get('noRecPap');
            $scope.totalSkor = 0
            $scope.totalSkor2 = 0
            $scope.cc = {}
            var nomorEMR = '-'
            $scope.cc.emrfk = 290035
            var dataLoad = []
            $scope.isCetak = true
            var norecEMR = ''
            var cacheNomorEMR = cacheHelper.get('cacheNomorEMR');
            var cacheNoREC = cacheHelper.get('cacheNOREC_EMR');
            if (cacheNoREC != undefined) {
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
            $scope.cetakPdf = function () {
                if (norecEMR == '') return
                var client = new HttpClient();
                client.get('http://127.0.0.1:1237/printvb/e-rekammedis?cetak-emr-grafik-tanda-vital&id=' + $scope.cc.nocm + '&emr=' + norecEMR + '&view=true', function (response) {
                    // do something with response
                });
            }

            $scope.listTanggal = [
                { "id": 425651 },
                { "id": 425652 }
            ]

            $scope.listData1 = [
                { 
                    "id": 1,
                    "namaexternal": "Suhu",
                    "details": [
                        { "id": 425653, "caption": "", "type": "textbox" },
                        { "id": 425654, "caption": "", "type": "textbox" },
                        { "id": 425655, "caption": "", "type": "textbox" },
                        { "id": 425656, "caption": "", "type": "textbox" },
                        { "id": 425657, "caption": "", "type": "textbox" },
                        { "id": 425658, "caption": "", "type": "textbox" },
                        { "id": 425659, "caption": "", "type": "textbox" },
                        { "id": 425660, "caption": "", "type": "textbox" },
                        // { "id": 425011, "caption": "", "type": "textbox" },
                        // { "id": 425012, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "namaexternal": "Nadi",
                    "details": [
                        { "id": 425661, "caption": "", "type": "textbox" },
                        { "id": 425662, "caption": "", "type": "textbox" },
                        { "id": 425663, "caption": "", "type": "textbox" },
                        { "id": 425664, "caption": "", "type": "textbox" },
                        { "id": 425665, "caption": "", "type": "textbox" },
                        { "id": 425666, "caption": "", "type": "textbox" },
                        { "id": 425667, "caption": "", "type": "textbox" },
                        { "id": 425668, "caption": "", "type": "textbox" },
                        // { "id": 425021, "caption": "", "type": "textbox" },
                        // { "id": 425022, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "namaexternal": "Pernafasan",
                    "details": [
                        { "id": 425669, "caption": "", "type": "textbox" },
                        { "id": 425670, "caption": "", "type": "textbox" },
                        { "id": 425671, "caption": "", "type": "textbox" },
                        { "id": 425672, "caption": "", "type": "textbox" },
                        { "id": 425673, "caption": "", "type": "textbox" },
                        { "id": 425674, "caption": "", "type": "textbox" },
                        { "id": 425675, "caption": "", "type": "textbox" },
                        { "id": 425676, "caption": "", "type": "textbox" },
                        // { "id": 425031, "caption": "", "type": "textbox" },
                        // { "id": 425032, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "namaexternal": "Tekanan Darah",
                    "details": [
                        { "id": 425677, "caption": "", "type": "textbox" },
                        { "id": 425678, "caption": "", "type": "textbox" },
                        { "id": 425679, "caption": "", "type": "textbox" },
                        { "id": 425680, "caption": "", "type": "textbox" },
                        { "id": 425681, "caption": "", "type": "textbox" },
                        { "id": 425682, "caption": "", "type": "textbox" },
                        { "id": 425683, "caption": "", "type": "textbox" },
                        { "id": 425684, "caption": "", "type": "textbox" },
                        // { "id": 425041, "caption": "", "type": "textbox" },
                        // { "id": 425042, "caption": "", "type": "textbox" }
                    ]
                }
            ]

            $scope.listTanggal2 = [
                { "id": 425685 },
                { "id": 425686 }
            ]

            $scope.listData2 = [
                {
                    "id": 1,
                    "namaexternal": "Suhu",
                    "details": [
                        { "id": 425687, "caption": "", "type": "textbox" },
                        { "id": 425688, "caption": "", "type": "textbox" },
                        { "id": 425689, "caption": "", "type": "textbox" },
                        { "id": 425690, "caption": "", "type": "textbox" },
                        { "id": 425691, "caption": "", "type": "textbox" },
                        { "id": 425692, "caption": "", "type": "textbox" },
                        { "id": 425693, "caption": "", "type": "textbox" },
                        { "id": 425694, "caption": "", "type": "textbox" },
                        // { "id": 425053, "caption": "", "type": "textbox" },
                        // { "id": 425054, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "namaexternal": "Nadi",
                    "details": [
                        { "id": 425695, "caption": "", "type": "textbox" },
                        { "id": 425696, "caption": "", "type": "textbox" },
                        { "id": 425697, "caption": "", "type": "textbox" },
                        { "id": 425698, "caption": "", "type": "textbox" },
                        { "id": 425699, "caption": "", "type": "textbox" },
                        { "id": 425700, "caption": "", "type": "textbox" },
                        { "id": 425701, "caption": "", "type": "textbox" },
                        { "id": 425702, "caption": "", "type": "textbox" },
                        // { "id": 425063, "caption": "", "type": "textbox" },
                        // { "id": 425064, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "namaexternal": "Pernafasan",
                    "details": [
                        { "id": 425703, "caption": "", "type": "textbox" },
                        { "id": 425704, "caption": "", "type": "textbox" },
                        { "id": 425705, "caption": "", "type": "textbox" },
                        { "id": 425706, "caption": "", "type": "textbox" },
                        { "id": 425707, "caption": "", "type": "textbox" },
                        { "id": 425708, "caption": "", "type": "textbox" },
                        { "id": 425709, "caption": "", "type": "textbox" },
                        { "id": 425710, "caption": "", "type": "textbox" },
                        // { "id": 425073, "caption": "", "type": "textbox" },
                        // { "id": 425074, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "namaexternal": "Tekanan Darah",
                    "details": [
                        { "id": 425711, "caption": "", "type": "textbox" },
                        { "id": 425712, "caption": "", "type": "textbox" },
                        { "id": 425713, "caption": "", "type": "textbox" },
                        { "id": 425714, "caption": "", "type": "textbox" },
                        { "id": 425715, "caption": "", "type": "textbox" },
                        { "id": 425716, "caption": "", "type": "textbox" },
                        { "id": 425717, "caption": "", "type": "textbox" },
                        { "id": 425718, "caption": "", "type": "textbox" },
                        // { "id": 425083, "caption": "", "type": "textbox" },
                        // { "id": 425084, "caption": "", "type": "textbox" }
                    ]
                }
            ]

            $scope.listTanggal3 = [
                { "id": 425719 },
                { "id": 425720 }
            ]

            $scope.listData3 = [
                {
                    "id": 1,
                    "namaexternal": "Suhu",
                    "details": [
                        { "id": 425721, "caption": "", "type": "textbox" },
                        { "id": 425722, "caption": "", "type": "textbox" },
                        { "id": 425723, "caption": "", "type": "textbox" },
                        { "id": 425724, "caption": "", "type": "textbox" },
                        { "id": 425725, "caption": "", "type": "textbox" },
                        { "id": 425726, "caption": "", "type": "textbox" },
                        { "id": 425727, "caption": "", "type": "textbox" },
                        { "id": 425728, "caption": "", "type": "textbox" },
                        // { "id": 425095, "caption": "", "type": "textbox" },
                        // { "id": 425096, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "namaexternal": "Nadi",
                    "details": [
                        { "id": 425729, "caption": "", "type": "textbox" },
                        { "id": 425730, "caption": "", "type": "textbox" },
                        { "id": 425731, "caption": "", "type": "textbox" },
                        { "id": 425732, "caption": "", "type": "textbox" },
                        { "id": 425733, "caption": "", "type": "textbox" },
                        { "id": 425734, "caption": "", "type": "textbox" },
                        { "id": 425735, "caption": "", "type": "textbox" },
                        { "id": 425736, "caption": "", "type": "textbox" },
                        // { "id": 425105, "caption": "", "type": "textbox" },
                        // { "id": 425106, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "namaexternal": "Pernafasan",
                    "details": [
                        { "id": 425737, "caption": "", "type": "textbox" },
                        { "id": 425738, "caption": "", "type": "textbox" },
                        { "id": 425739, "caption": "", "type": "textbox" },
                        { "id": 425740, "caption": "", "type": "textbox" },
                        { "id": 425741, "caption": "", "type": "textbox" },
                        { "id": 425742, "caption": "", "type": "textbox" },
                        { "id": 425743, "caption": "", "type": "textbox" },
                        { "id": 425744, "caption": "", "type": "textbox" },
                        // { "id": 425115, "caption": "", "type": "textbox" },
                        // { "id": 425116, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "namaexternal": "Tekanan Darah",
                    "details": [
                        { "id": 425745, "caption": "", "type": "textbox" },
                        { "id": 425746, "caption": "", "type": "textbox" },
                        { "id": 425747, "caption": "", "type": "textbox" },
                        { "id": 425748, "caption": "", "type": "textbox" },
                        { "id": 425749, "caption": "", "type": "textbox" },
                        { "id": 425750, "caption": "", "type": "textbox" },
                        { "id": 425751, "caption": "", "type": "textbox" },
                        { "id": 425752, "caption": "", "type": "textbox" },
                        // { "id": 425125, "caption": "", "type": "textbox" },
                        // { "id": 425126, "caption": "", "type": "textbox" }
                    ]
                }
            ]

            $scope.listTanggal4 = [
                { "id": 425753 },
                { "id": 425754 }
            ]

            $scope.listData4 = [
                {
                    "id": 1,
                    "namaexternal": "Suhu",
                    "details": [
                        { "id": 425755, "caption": "", "type": "textbox" },
                        { "id": 425756, "caption": "", "type": "textbox" },
                        { "id": 425757, "caption": "", "type": "textbox" },
                        { "id": 425758, "caption": "", "type": "textbox" },
                        { "id": 425759, "caption": "", "type": "textbox" },
                        { "id": 425760, "caption": "", "type": "textbox" },
                        { "id": 425761, "caption": "", "type": "textbox" },
                        { "id": 425762, "caption": "", "type": "textbox" },
                        // { "id": 425137, "caption": "", "type": "textbox" },
                        // { "id": 425138, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "namaexternal": "Nadi",
                    "details": [
                        { "id": 425763, "caption": "", "type": "textbox" },
                        { "id": 425764, "caption": "", "type": "textbox" },
                        { "id": 425765, "caption": "", "type": "textbox" },
                        { "id": 425766, "caption": "", "type": "textbox" },
                        { "id": 425767, "caption": "", "type": "textbox" },
                        { "id": 425768, "caption": "", "type": "textbox" },
                        { "id": 425769, "caption": "", "type": "textbox" },
                        { "id": 425770, "caption": "", "type": "textbox" },
                        // { "id": 425148, "caption": "", "type": "textbox" },
                        // { "id": 425149, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "namaexternal": "Pernafasan",
                    "details": [
                        { "id": 425771, "caption": "", "type": "textbox" },
                        { "id": 425772, "caption": "", "type": "textbox" },
                        { "id": 425773, "caption": "", "type": "textbox" },
                        { "id": 425774, "caption": "", "type": "textbox" },
                        { "id": 425775, "caption": "", "type": "textbox" },
                        { "id": 425776, "caption": "", "type": "textbox" },
                        { "id": 425777, "caption": "", "type": "textbox" },
                        { "id": 425778, "caption": "", "type": "textbox" },
                        // { "id": 425158, "caption": "", "type": "textbox" },
                        // { "id": 425159, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "namaexternal": "Tekanan Darah",
                    "details": [
                        { "id": 425779, "caption": "", "type": "textbox" },
                        { "id": 425780, "caption": "", "type": "textbox" },
                        { "id": 425781, "caption": "", "type": "textbox" },
                        { "id": 425782, "caption": "", "type": "textbox" },
                        { "id": 425783, "caption": "", "type": "textbox" },
                        { "id": 425784, "caption": "", "type": "textbox" },
                        { "id": 425785, "caption": "", "type": "textbox" },
                        { "id": 425786, "caption": "", "type": "textbox" },
                        // { "id": 425168, "caption": "", "type": "textbox" },
                        // { "id": 425169, "caption": "", "type": "textbox" }
                    ]
                }
            ]

            $scope.listGantiSetInfus = [
                {
                    "id": 1,
                    "details": [
                        { "id": 425787, "caption": "", "type": "date" },
                        { "id": 425788, "caption": "", "type": "time" },
                        { "id": 425789, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "details": [
                        { "id": 425790, "caption": "", "type": "date" },
                        { "id": 425791, "caption": "", "type": "time" },
                        { "id": 425792, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "details": [
                        { "id": 425793, "caption": "", "type": "date" },
                        { "id": 425794, "caption": "", "type": "time" },
                        { "id": 425795, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "details": [
                        { "id": 425796, "caption": "", "type": "date" },
                        { "id": 425797, "caption": "", "type": "time" },
                        { "id": 425798, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 5,
                    "details": [
                        { "id": 425799, "caption": "", "type": "date" },
                        { "id": 425800, "caption": "", "type": "time" },
                        { "id": 425801, "caption": "", "type": "textbox" }
                    ]
                }
            ]

            $scope.listGantiKateter = [
                {
                    "id": 1,
                    "details": [
                        { "id": 425802, "caption": "", "type": "date" },
                        { "id": 425803, "caption": "", "type": "time" },
                        { "id": 425804, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "details": [
                        { "id": 425805, "caption": "", "type": "date" },
                        { "id": 425806, "caption": "", "type": "time" },
                        { "id": 425807, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "details": [
                        { "id": 425808, "caption": "", "type": "date" },
                        { "id": 425809, "caption": "", "type": "time" },
                        { "id": 425810, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "details": [
                        { "id": 425811, "caption": "", "type": "date" },
                        { "id": 425812, "caption": "", "type": "time" },
                        { "id": 425813, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 5,
                    "details": [
                        { "id": 425814, "caption": "", "type": "date" },
                        { "id": 425815, "caption": "", "type": "time" },
                        { "id": 425816, "caption": "", "type": "textbox" }
                    ]
                }
            ]

            $scope.listGantiNGT = [
                {
                    "id": 1,
                    "details": [
                        { "id": 425817, "caption": "", "type": "date" },
                        { "id": 425818, "caption": "", "type": "time" },
                        { "id": 425819, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "details": [
                        { "id": 425820, "caption": "", "type": "date" },
                        { "id": 425821, "caption": "", "type": "time" },
                        { "id": 425822, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "details": [
                        { "id": 425823, "caption": "", "type": "date" },
                        { "id": 425824, "caption": "", "type": "time" },
                        { "id": 425825, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "details": [
                        { "id": 425826, "caption": "", "type": "date" },
                        { "id": 425827, "caption": "", "type": "time" },
                        { "id": 425828, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 5,
                    "details": [
                        { "id": 425829, "caption": "", "type": "date" },
                        { "id": 425830, "caption": "", "type": "time" },
                        { "id": 425831, "caption": "", "type": "textbox" }
                    ]
                }
            ]

            $scope.listTabelTerakhir = [
                {
                    "id": 1,
                    "namaexternal": "Diet",
                    "details": [
                        { "id": 425832, "caption": "", "type": "textbox" },
                        { "id": 425833, "caption": "", "type": "textbox" },
                        { "id": 425834, "caption": "", "type": "textbox" },
                        { "id": 425835, "caption": "", "type": "textbox" },
                        { "id": 425836, "caption": "", "type": "textbox" },
                        { "id": 425837, "caption": "", "type": "textbox" },
                        { "id": 425838, "caption": "", "type": "textbox" },
                        { "id": 425839, "caption": "", "type": "textbox" },
                        { "id": 425840, "caption": "", "type": "textbox" },
                        { "id": 425841, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "namaexternal": "Berat Badan",
                    "details": [
                        { "id": 425842, "caption": "", "type": "textbox" },
                        { "id": 425843, "caption": "", "type": "textbox" },
                        { "id": 425844, "caption": "", "type": "textbox" },
                        { "id": 425845, "caption": "", "type": "textbox" },
                        { "id": 425846, "caption": "", "type": "textbox" },
                        { "id": 425847, "caption": "", "type": "textbox" },
                        { "id": 425848, "caption": "", "type": "textbox" },
                        { "id": 425849, "caption": "", "type": "textbox" },
                        { "id": 425850, "caption": "", "type": "textbox" },
                        { "id": 425851, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "namaexternal": "Tindakan khusus",
                    "details": [
                        { "id": 425852, "caption": "", "type": "textbox" },
                        { "id": 425853, "caption": "", "type": "textbox" },
                        { "id": 425854, "caption": "", "type": "textbox" },
                        { "id": 425855, "caption": "", "type": "textbox" },
                        { "id": 425856, "caption": "", "type": "textbox" },
                        { "id": 425857, "caption": "", "type": "textbox" },
                        { "id": 425858, "caption": "", "type": "textbox" },
                        { "id": 425859, "caption": "", "type": "textbox" },
                        { "id": 425860, "caption": "", "type": "textbox" },
                        { "id": 425861, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "namaexternal": "Sputum",
                    "details": [
                        { "id": 425862, "caption": "", "type": "textbox" },
                        { "id": 425863, "caption": "", "type": "textbox" },
                        { "id": 425864, "caption": "", "type": "textbox" },
                        { "id": 425865, "caption": "", "type": "textbox" },
                        { "id": 425866, "caption": "", "type": "textbox" },
                        { "id": 425867, "caption": "", "type": "textbox" },
                        { "id": 425868, "caption": "", "type": "textbox" },
                        { "id": 425869, "caption": "", "type": "textbox" },
                        { "id": 425870, "caption": "", "type": "textbox" },
                        { "id": 425871, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 5,
                    "namaexternal": "Sputum",
                    "details": [
                        { "id": 425872, "caption": "", "type": "textbox" },
                        { "id": 425873, "caption": "", "type": "textbox" },
                        { "id": 425874, "caption": "", "type": "textbox" },
                        { "id": 425875, "caption": "", "type": "textbox" },
                        { "id": 425876, "caption": "", "type": "textbox" },
                        { "id": 425877, "caption": "", "type": "textbox" },
                        { "id": 425878, "caption": "", "type": "textbox" },
                        { "id": 425879, "caption": "", "type": "textbox" },
                        { "id": 425880, "caption": "", "type": "textbox" },
                        { "id": 425881, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 6,
                    "namaexternal": "Sputum",
                    "details": [
                        { "id": 425882, "caption": "", "type": "textbox" },
                        { "id": 425883, "caption": "", "type": "textbox" },
                        { "id": 425884, "caption": "", "type": "textbox" },
                        { "id": 425885, "caption": "", "type": "textbox" },
                        { "id": 425886, "caption": "", "type": "textbox" },
                        { "id": 425887, "caption": "", "type": "textbox" },
                        { "id": 425888, "caption": "", "type": "textbox" },
                        { "id": 425889, "caption": "", "type": "textbox" },
                        { "id": 425890, "caption": "", "type": "textbox" },
                        { "id": 425891, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 7,
                    "namaexternal": "Darah",
                    "details": [
                        { "id": 425892, "caption": "", "type": "textbox" },
                        { "id": 425893, "caption": "", "type": "textbox" },
                        { "id": 425894, "caption": "", "type": "textbox" },
                        { "id": 425895, "caption": "", "type": "textbox" },
                        { "id": 425896, "caption": "", "type": "textbox" },
                        { "id": 425897, "caption": "", "type": "textbox" },
                        { "id": 425898, "caption": "", "type": "textbox" },
                        { "id": 425899, "caption": "", "type": "textbox" },
                        { "id": 425900, "caption": "", "type": "textbox" },
                        { "id": 425901, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 8,
                    "namaexternal": "Darah",
                    "details": [
                        { "id": 425902, "caption": "", "type": "textbox" },
                        { "id": 425903, "caption": "", "type": "textbox" },
                        { "id": 425904, "caption": "", "type": "textbox" },
                        { "id": 425905, "caption": "", "type": "textbox" },
                        { "id": 425906, "caption": "", "type": "textbox" },
                        { "id": 425907, "caption": "", "type": "textbox" },
                        { "id": 425908, "caption": "", "type": "textbox" },
                        { "id": 425909, "caption": "", "type": "textbox" },
                        { "id": 425910, "caption": "", "type": "textbox" },
                        { "id": 425911, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 9,
                    "namaexternal": "Darah",
                    "details": [
                        { "id": 425912, "caption": "", "type": "textbox" },
                        { "id": 425913, "caption": "", "type": "textbox" },
                        { "id": 425914, "caption": "", "type": "textbox" },
                        { "id": 425915, "caption": "", "type": "textbox" },
                        { "id": 425916, "caption": "", "type": "textbox" },
                        { "id": 425917, "caption": "", "type": "textbox" },
                        { "id": 425918, "caption": "", "type": "textbox" },
                        { "id": 425919, "caption": "", "type": "textbox" },
                        { "id": 425920, "caption": "", "type": "textbox" },
                        { "id": 425921, "caption": "", "type": "textbox" }
                    ]
                }
            ]

            medifirstService.getPart('emr/get-datacombo-part-pegawai', true, true, 20).then(function (data) {
                $scope.listPegawai = data
            })
            medifirstService.getPart('emr/get-datacombo-part-kelas', true, true, 20).then(function (data) {
                $scope.listKelas = data

            })
            medifirstService.getPart('emr/get-datacombo-part-ruangan-pelayanan', true, true, 20).then(function (data) {
                $scope.listRuang = data

            })
            $scope.tekananDarah = [
                // {
                //     nilai: 10,
                //     nilai2: 30
                // }, {
                //     nilai: 10,
                //     nilai2: 30
                // },
            ]
            var sesiesSuhu = []
            var seriesNadi = []
            var sesiesPernafasan = []
            var sesiesTekananDarah = []
            loadChart()
            function loadChart() {
                $("#chartNadi").kendoChart({
                    // title: {
                    //     text: "Tanda Tanda Vital"
                    // },
                    // legend: {
                    //     position: "top"
                    // },
                    // series: [
                    //     {
                    //         type: "line",
                    //         data: sesiesSuhu,
                    //         name: "Suhu",
                    //         color: "#ec5e0a",
                    //         // axis: "S"
                    //     }, {
                    //         type: "line",
                    //         data: seriesNadi,
                    //         name: "Nadi",
                    //         color: "#4e4141",
                    //         // axis: "N"
                    //     }

                    // ],
                    // valueAxes: [{
                    //     name: "Suhu",
                    //     title: { text: "S" },
                    //     min:     ,
                    //     max: 42
                    // }, {
                    //     name: "Nadi",
                    //     title: { text: "N" },
                    //     min: 40,
                    //     max: 180,
                    //     majorUnit: 20
                    // }],
                    title: {
                        text: "Grafik Nadi"
                    },
                    legend: {
                        position: "top"
                    },
                    series: [
                        //     {
                        //     type: "line",
                        //     data: sesiesSuhu,
                        //     name: "Suhu",
                        //     color: "#ec5e0a",

                        // }, 
                        {
                            type: "line",
                            data: seriesNadi,
                            name: "Nadi",
                            color: "#fc0303",

                        }],
                    valueAxes: [{
                        title: { text: "N" },
                        min: 40,
                        max: 180,
                        majorUnit: 20
                    },
                        //  {
                        //     name: "S",
                        //     title: { text: "S" },
                        //     min: 35,
                        //     max: 42,

                        // }
                    ],
                    categoryAxis: {
                        categories: ['P', 'S', 'S', 'M', 'P', 'S', 'S', 'M', 'P', 'S', 'S', 'M', 'P', 'S', 'S', 'M', 'P', 'S', 'S', 'M', 'P', 'S', 'S', 'M', 'P', 'S', 'S', 'M', 'P', 'S', 'S', 'M'],
                        // categories: ["Mon", "Tue", "Wed", "Thu", "Fri"],

                        axisCrossingValues: [0, 35]
                    }
                });

                $("#chartSuhu").kendoChart({
                    // title: {
                    //     text: "Tanda Tanda Vital"
                    // },
                    // legend: {
                    //     position: "top"
                    // },
                    // series: [
                    //     {
                    //         type: "line",
                    //         data: sesiesSuhu,
                    //         name: "Suhu",
                    //         color: "#ec5e0a",
                    //         // axis: "S"
                    //     }, {
                    //         type: "line",
                    //         data: seriesNadi,
                    //         name: "Nadi",
                    //         color: "#4e4141",
                    //         // axis: "N"
                    //     }

                    // ],
                    // valueAxes: [{
                    //     name: "Suhu",
                    //     title: { text: "S" },
                    //     min:     ,
                    //     max: 42
                    // }, {
                    //     name: "Nadi",
                    //     title: { text: "N" },
                    //     min: 40,
                    //     max: 180,
                    //     majorUnit: 20
                    // }],
                    title: {
                        text: "Grafik Suhu"
                    },
                    legend: {
                        position: "top"
                    },
                    series: [{
                        type: "line",
                        data: sesiesSuhu,
                        name: "Suhu",
                        color: "#0328fc",

                    }
                        // , {
                        //     type: "line",
                        //     data: seriesNadi,
                        //     name: "Nadi",
                        //     color: "#4e4141",

                        // }
                    ],
                    valueAxes: [
                        //     {
                        //     title: { text: "N" },
                        //     min: 40,
                        //     max: 180,
                        //     majorUnit: 20
                        // }, 
                        {
                            name: "S",
                            title: { text: "S" },
                            min: 32,
                            max: 42,

                        }
                    ],
                    categoryAxis: {
                        categories: ['P', 'S', 'S', 'M', 'P', 'S', 'S', 'M', 'P', 'S', 'S', 'M', 'P', 'S', 'S', 'M', 'P', 'S', 'S', 'M', 'P', 'S', 'S', 'M', 'P', 'S', 'S', 'M', 'P', 'S', 'S', 'M'],
                        // categories: ["Mon", "Tue", "Wed", "Thu", "Fri"],

                        axisCrossingValues: [0, 35]
                    }
                });

                $("#chartPernafasan").kendoChart({
                    // title: {
                    //     text: "Tanda Tanda Vital"
                    // },
                    // legend: {
                    //     position: "top"
                    // },
                    // series: [
                    //     {
                    //         type: "line",
                    //         data: sesiesSuhu,
                    //         name: "Suhu",
                    //         color: "#ec5e0a",
                    //         // axis: "S"
                    //     }, {
                    //         type: "line",
                    //         data: seriesNadi,
                    //         name: "Nadi",
                    //         color: "#4e4141",
                    //         // axis: "N"
                    //     }

                    // ],
                    // valueAxes: [{
                    //     name: "Suhu",
                    //     title: { text: "S" },
                    //     min:     ,
                    //     max: 42
                    // }, {
                    //     name: "Nadi",
                    //     title: { text: "N" },
                    //     min: 40,
                    //     max: 180,
                    //     majorUnit: 20
                    // }],
                    title: {
                        text: "Grafik Pernafasan"
                    },
                    legend: {
                        position: "top"
                    },
                    series: [{
                        type: "line",
                        data: sesiesPernafasan,
                        name: "Pernafasan",
                        color: "#34A853",

                    }
                        // , {
                        //     type: "line",
                        //     data: seriesNadi,
                        //     name: "Nadi",
                        //     color: "#4e4141",

                        // }
                    ],
                    valueAxes: [
                        //     {
                        //     title: { text: "N" },
                        //     min: 40,
                        //     max: 180,
                        //     majorUnit: 20
                        // }, 
                        {
                            name: "P",
                            title: { text: "P" },
                            min: 20,
                            max: 70,

                        }
                    ],
                    categoryAxis: {
                        categories: ['P', 'S', 'S', 'M', 'P', 'S', 'S', 'M', 'P', 'S', 'S', 'M', 'P', 'S', 'S', 'M', 'P', 'S', 'S', 'M', 'P', 'S', 'S', 'M', 'P', 'S', 'S', 'M', 'P', 'S', 'S', 'M'],
                        // categories: ["Mon", "Tue", "Wed", "Thu", "Fri"],

                        axisCrossingValues: [0, 35]
                    }
                });

                $("#chartTekananDarah").kendoChart({
                    // title: {
                    //     text: "Tanda Tanda Vital"
                    // },
                    // legend: {
                    //     position: "top"
                    // },
                    // series: [
                    //     {
                    //         type: "line",
                    //         data: sesiesSuhu,
                    //         name: "Suhu",
                    //         color: "#ec5e0a",
                    //         // axis: "S"
                    //     }, {
                    //         type: "line",
                    //         data: seriesNadi,
                    //         name: "Nadi",
                    //         color: "#4e4141",
                    //         // axis: "N"
                    //     }

                    // ],
                    // valueAxes: [{
                    //     name: "Suhu",
                    //     title: { text: "S" },
                    //     min:     ,
                    //     max: 42
                    // }, {
                    //     name: "Nadi",
                    //     title: { text: "N" },
                    //     min: 40,
                    //     max: 180,
                    //     majorUnit: 20
                    // }],
                    title: {
                        text: "Grafik Tekanan Darah"
                    },
                    legend: {
                        position: "top"
                    },
                    series: [{
                        type: "line",
                        data: sesiesTekananDarah,
                        name: "Tekanan Darah",
                        color: "#FBBC05",

                    }
                        // , {
                        //     type: "line",
                        //     data: seriesNadi,
                        //     name: "Nadi",
                        //     color: "#4e4141",

                        // }
                    ],
                    valueAxes: [
                        //     {
                        //     title: { text: "N" },
                        //     min: 40,
                        //     max: 180,
                        //     majorUnit: 20
                        // }, 
                        {
                            name: "TD",
                            title: { text: "TD" },
                            min: 50,
                            max: 300,
                            majorUnit: 50

                        }
                    ],
                    categoryAxis: {
                        categories: ['P', 'S', 'S', 'M', 'P', 'S', 'S', 'M', 'P', 'S', 'S', 'M', 'P', 'S', 'S', 'M', 'P', 'S', 'S', 'M', 'P', 'S', 'S', 'M', 'P', 'S', 'S', 'M', 'P', 'S', 'S', 'M'],
                        // categories: ["Mon", "Tue", "Wed", "Thu", "Fri"],

                        axisCrossingValues: [0, 35]
                    }
                });

                $("#chartSuhu2").kendoChart({
                    // title: {
                    //     text: "Tanda Tanda Vital"
                    // },
                    // legend: {
                    //     position: "top"
                    // },
                    // series: [
                    //     {
                    //         type: "line",
                    //         data: sesiesSuhu,
                    //         name: "Suhu",
                    //         color: "#ec5e0a",
                    //         // axis: "S"
                    //     }, {
                    //         type: "line",
                    //         data: seriesNadi,
                    //         name: "Nadi",
                    //         color: "#4e4141",
                    //         // axis: "N"
                    //     }

                    // ],
                    // valueAxes: [{
                    //     name: "Suhu",
                    //     title: { text: "S" },
                    //     min:     ,
                    //     max: 42
                    // }, {
                    //     name: "Nadi",
                    //     title: { text: "N" },
                    //     min: 40,
                    //     max: 180,
                    //     majorUnit: 20
                    // }],
                    title: {
                        text: "Grafik Suhu 2"
                    },
                    legend: {
                        position: "top"
                    },
                    series: [{
                        type: "line",
                        data: sesiesSuhu,
                        name: "Suhu",
                        color: "#0328fc",

                    }
                        // , {
                        //     type: "line",
                        //     data: seriesNadi,
                        //     name: "Nadi",
                        //     color: "#4e4141",

                        // }
                    ],
                    valueAxes: [
                        //     {
                        //     title: { text: "N" },
                        //     min: 40,
                        //     max: 180,
                        //     majorUnit: 20
                        // }, 
                        {
                            name: "S",
                            title: { text: "S" },
                            min: 32,
                            max: 42,
                            majorUnit: 0.5
                        }
                    ],
                    categoryAxis: {
                        categories: ['P', 'S', 'M', 'P', 'S', 'M', 'P', 'S', 'M', 'P', 'S', 'M', 'P', 'S', 'M', 'P', 'S', 'M', 'P', 'S', 'M'],
                        // categories: ["Mon", "Tue", "Wed", "Thu", "Fri"],

                        axisCrossingValues: [0, 35]
                    }
                });
            }
            // $scope.listData1 = []
            // $scope.listData2 = []
            // $scope.listTanggal = []
            // $scope.listTanggal2 = []
            $scope.listSuhu = []
            $scope.listNadi = []
            $scope.listPernafasan = []
            $scope.listTekananDarah = []

            medifirstService.get("emr/get-rekam-medis-dynamic?emrid=" + $scope.cc.emrfk).then(function (e) {

                var datas = e.data.kolom4

                var detail = []
                var arrayAskep = []
                var arrayAskep2 = []
                var arrayParenteral = []
                var arrayParenteral2 = []
                var sama = false
                for (let i = 0; i < datas.length; i++) {
                    const element = datas[i];
                    sama = false
                    // if (element.kodeexternal == 'date') {
                    //     $scope.listTanggal.push({ id: element.id })
                    // }
                    // if (element.kodeexternal == 'date2') {
                    //     $scope.listTanggal2.push({ id: element.id })
                    // }
                    if (element.kodeexternal == 'pernafasan' && element.namaexternal == 'Suhu') {
                        $scope.listSuhu.push({ id: element.id })
                    }
                    if (element.kodeexternal == 'pernafasan' && element.namaexternal == 'Nadi') {
                        $scope.listNadi.push({ id: element.id })
                    }
                    if (element.kodeexternal == 'pernafasan' && element.namaexternal == 'Pernafasan') {
                        $scope.listPernafasan.push({ id: element.id })
                    }
                    if (element.kodeexternal == 'pernafasan' && element.namaexternal == 'Tekanan Darah') {
                        $scope.listTekananDarah.push({ id: element.id })
                    }
                    if (element.kodeexternal == 'pernafasan2' && element.namaexternal == 'Suhu2') {
                        $scope.listSuhu.push({ id: element.id })
                    }
                    if (element.kodeexternal == 'pernafasan2' && element.namaexternal == 'Nadi2') {
                        $scope.listNadi.push({ id: element.id })
                    }
                    if (element.kodeexternal == 'pernafasan2' && element.namaexternal == 'Pernafasan2') {
                        $scope.listPernafasan.push({ id: element.id })
                    }
                    if (element.kodeexternal == 'pernafasan2' && element.namaexternal == 'Tekanan Darah2') {
                        $scope.listTekananDarah.push({ id: element.id })
                    }
                    
                    // ARRAY GEJALA
                    if (element.kodeexternal == 'pernafasan') {
                        for (let z = 0; z < arrayAskep.length; z++) {
                            const element2 = arrayAskep[z];
                            if (element2.namaexternal == element.namaexternal) {
                                detail.push(element)
                                element2.details = detail
                                sama = true
                            }
                        }
                        if (sama == false) {
                            var datax = {
                                caption: element.caption,
                                cbotable: element.cbotable,
                                child: [],
                                emrfk: element.emrfk,
                                headfk: element.headfk,
                                id: element.id,
                                kdprofile: element.kdprofile,
                                kodeexternal: element.kodeexternal,
                                namaemr: element.namaemr,
                                namaexternal: element.namaexternal,
                                nourut: element.nourut,
                                reportdisplay: element.reportdisplay,
                                satuan: element.satuan,
                                statusenabled: element.statusenabled,
                                style: element.style,
                                type: element.type,

                            }
                            arrayAskep.push(datax)
                        }
                    }// ARRAY GEJALA
                    if (element.kodeexternal == 'pernafasan2') {
                        for (let z = 0; z < arrayAskep2.length; z++) {
                            const element2 = arrayAskep2[z];
                            if (element2.namaexternal == element.namaexternal) {
                                detail.push(element)
                                element2.details = detail
                                sama = true
                            }
                        }
                        if (sama == false) {
                            var datax = {
                                caption: element.caption,
                                cbotable: element.cbotable,
                                child: [],
                                emrfk: element.emrfk,
                                headfk: element.headfk,
                                id: element.id,
                                kdprofile: element.kdprofile,
                                kodeexternal: element.kodeexternal,
                                namaemr: element.namaemr,
                                namaexternal: element.namaexternal,
                                nourut: element.nourut,
                                reportdisplay: element.reportdisplay,
                                satuan: element.satuan,
                                statusenabled: element.statusenabled,
                                style: element.style,
                                type: element.type,

                            }
                            arrayAskep2.push(datax)
                        }
                    }
                    //END ARRAY GEJALA

                    // ARRAY GEJALA
                    // if (element.kodeexternal == 'parenteral') {
                    //     for (let z = 0; z < arrayParenteral.length; z++) {
                    //         const element2 = arrayParenteral[z];
                    //         if (element2.namaexternal == element.namaexternal) {
                    //             detail.push(element)
                    //             element2.details = detail
                    //             sama = true
                    //         }
                    //     }
                    //     if (sama == false) {
                    //         var datax = {
                    //             caption: element.caption,
                    //             cbotable: element.cbotable,
                    //             child: [],
                    //             emrfk: element.emrfk,
                    //             headfk: element.headfk,
                    //             id: element.id,
                    //             kdprofile: element.kdprofile,
                    //             kodeexternal: element.kodeexternal,
                    //             namaemr: element.namaemr,
                    //             namaexternal: element.namaexternal,
                    //             nourut: element.nourut,
                    //             reportdisplay: element.reportdisplay,
                    //             satuan: element.satuan,
                    //             statusenabled: element.statusenabled,
                    //             style: element.style,
                    //             type: element.type,

                    //         }
                    //         arrayParenteral.push(datax)
                    //     }
                    // }
                    //END ARRAY GEJALA
                    // ARRAY GEJALA
                    // if (element.kodeexternal == 'parenteral2') {
                    //     for (let z = 0; z < arrayParenteral2.length; z++) {
                    //         const element2 = arrayParenteral2[z];
                    //         if (element2.namaexternal == element.namaexternal) {
                    //             detail.push(element)
                    //             element2.details = detail
                    //             sama = true
                    //         }
                    //     }
                    //     if (sama == false) {
                    //         var datax = {
                    //             caption: element.caption,
                    //             cbotable: element.cbotable,
                    //             child: [],
                    //             emrfk: element.emrfk,
                    //             headfk: element.headfk,
                    //             id: element.id,
                    //             kdprofile: element.kdprofile,
                    //             kodeexternal: element.kodeexternal,
                    //             namaemr: element.namaemr,
                    //             namaexternal: element.namaexternal,
                    //             nourut: element.nourut,
                    //             reportdisplay: element.reportdisplay,
                    //             satuan: element.satuan,
                    //             statusenabled: element.statusenabled,
                    //             style: element.style,
                    //             type: element.type,

                    //         }
                    //         arrayParenteral2.push(datax)
                    //     }
                    // }
                    //END ARRAY GEJALA


                }
                // ARRAY GEJALA
                var gejalaKosongKeun = []
                for (let k = 0; k < arrayAskep.length; k++) {
                    const element = arrayAskep[k];
                    for (let l = 0; l < datas.length; l++) {
                        const element2 = datas[l];
                        if (element2.namaexternal == element.namaexternal) {
                            gejalaKosongKeun.push(element2)
                            element.details = gejalaKosongKeun
                        } else {
                            gejalaKosongKeun = []
                        }
                    }
                }
                // $scope.listData1 = arrayAskep

                var gejalaKosong1 = []
                for (let k = 0; k < arrayParenteral.length; k++) {
                    const element = arrayParenteral[k];
                    for (let l = 0; l < datas.length; l++) {
                        const element2 = datas[l];
                        if (element2.namaexternal == element.namaexternal) {
                            gejalaKosong1.push(element2)
                            element.details = gejalaKosong1
                        } else {
                            gejalaKosong1 = []
                        }
                    }
                }
                // $scope.listData2 = arrayParenteral
                // ARRAY GEJALA
                var gejalaKosongKeun = []
                for (let k = 0; k < arrayAskep2.length; k++) {
                    const element = arrayAskep2[k];
                    for (let l = 0; l < datas.length; l++) {
                        const element2 = datas[l];
                        if (element2.namaexternal == element.namaexternal) {
                            gejalaKosongKeun.push(element2)
                            element.details = gejalaKosongKeun
                        } else {
                            gejalaKosongKeun = []
                        }
                    }
                }
                // $scope.listData3 = arrayAskep2

                var gejalaKosong1 = []
                for (let k = 0; k < arrayParenteral2.length; k++) {
                    const element = arrayParenteral2[k];
                    for (let l = 0; l < datas.length; l++) {
                        const element2 = datas[l];
                        if (element2.namaexternal == element.namaexternal) {
                            gejalaKosong1.push(element2)
                            element.details = gejalaKosong1
                        } else {
                            gejalaKosong1 = []
                        }
                    }
                }
                // $scope.listData4 = arrayParenteral2
                onloadchart()
            })

            var cacheNomorEMR = cacheHelper.get('cacheNomorEMR');
            if (cacheNomorEMR != undefined) {
                nomorEMR = cacheNomorEMR[0]
                $scope.cc.norec_emr = nomorEMR
            }

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
            var chekedd = false

            
            $scope.item.obj = []
            $scope.item.obj2 = []

            if (nomorEMR == '-') {
                var nocmfk = null;
                var noregistrasifk = $state.params.noRec;
                var status = "t";
                // $scope.item.obj[423291] = $scope.now;
                medifirstService.get("emr/get-antrian-pasien-norec/" + noregistrasifk).then(function (e) {
                    var antrianPasien = e.data.result;
                    $scope.item.obj[425650] = new Date(moment(antrianPasien.tglregistrasi).format('YYYY-MM-DD HH:mm'));
                })
            }

            medifirstService.get("emr/get-emr-transaksi-detail?noemr=" + nomorEMR + "&emrfk=" + $scope.cc.emrfk, true).then(function (dat) {
                dataLoad = dat.data.data
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
                            if (dataLoad[i].emrdfk >= 7590 && dataLoad[i].emrdfk <= 7593 && chekedd) {
                                $scope.getSkalaNyeri(1, { descNilai: dataLoad[i].reportdisplay })
                            }



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


                    }

                }
                onloadchart()
            })
            
            function onloadchart() {
                // var arrobj = Object.keys($scope.item.obj)

                // for (var i = arrobj.length - 1; i >= 0; i--) {
                for (let z = 0; z < 32; z++) {
                    // if (arrobj[i] == 25000 + z)
                    //     sesiesSuhu[z] = $scope.item.obj[parseFloat(arrobj[i])]
                    var item = $scope.listSuhu[z]['id'];
                    sesiesSuhu[z] = $scope.item.obj[parseFloat(item)]
                }

                // }
                // for (var i = arrobj.length - 1; i >= 0; i--) {
                for (let y = 0; y < 32; y++) {
                    // if (arrobj[i] == 25028 + y)
                    //     seriesNadi[y] = $scope.item.obj[parseFloat(arrobj[i])]
                    var item = $scope.listNadi[y]['id'];
                    seriesNadi[y] = $scope.item.obj[parseFloat(item)]
                }

                for (let x = 0; x < 32; x++) {
                    var item = $scope.listPernafasan[x]['id'];
                    sesiesPernafasan[x] = $scope.item.obj[parseFloat(item)]
                }

                for (let w = 0; w < 32; w++) {
                    var item = $scope.listTekananDarah[w]['id'];
                    sesiesTekananDarah[w] = $scope.item.obj[parseFloat(item)]
                }

                // }

                for (let x = 0; x < sesiesSuhu.length; x++) {

                    if (!isNaN(parseFloat(sesiesSuhu[x])))
                        sesiesSuhu[x] = parseFloat(sesiesSuhu[x])
                    else
                        sesiesSuhu[x] = null
                }
                for (let x = 0; x < seriesNadi.length; x++) {
                    if (!isNaN(parseInt(seriesNadi[x])))
                        seriesNadi[x] = parseInt(seriesNadi[x])
                    else
                        seriesNadi[x] = null
                }
                for (let x = 0; x < sesiesPernafasan.length; x++) {
                    if (!isNaN(parseInt(sesiesPernafasan[x])))
                        sesiesPernafasan[x] = parseInt(sesiesPernafasan[x])
                    else
                        sesiesPernafasan[x] = null
                }
                for (let x = 0; x < sesiesTekananDarah.length; x++) {
                    if (!isNaN(parseInt(sesiesTekananDarah[x])))
                        sesiesTekananDarah[x] = parseInt(sesiesTekananDarah[x])
                    else
                        sesiesTekananDarah[x] = null
                }

                loadChart()
                // console.log(seriesNadi)
                // console.log(sesiesSuhu)
            }

            $scope.Batal = function () {
                $scope.item.obj = []
            }
            $scope.kembali = function () {
                $rootScope.showRiwayat()
            }

            $scope.Save = function () {

                var arrobj = Object.keys($scope.item.obj)
                var arrSave = []
                for (var i = arrobj.length - 1; i >= 0; i--) {
                    arrSave.push({ id: arrobj[i], values: $scope.item.obj[parseInt(arrobj[i])] })
                }
                $scope.cc.jenisemr = 'asesmen'
                var jsonSave = {
                    head: $scope.cc,
                    data: arrSave
                }
                medifirstService.post('emr/save-emr-dinamis', jsonSave).then(function (e) {

                    medifirstService.postLogging('EMR', 'norec emrpasien_t', e.data.data.norec,
                        'Catatan Grafik Tanda - Tanda Vital ' + ' dengan No EMR - ' + e.data.data.noemr + ' pada No Registrasi '
                        + $scope.cc.noregistrasi).then(function (res) {
                        })
                    var arrobj = Object.keys($scope.item.obj)

                    // for (var i = arrobj.length - 1; i >= 0; i--) {
                    for (let z = 0; z < 32; z++) {
                        // if (arrobj[i] == 25000 + z)
                        //     sesiesSuhu[z] = $scope.item.obj[parseFloat(arrobj[i])]
                        var item = $scope.listSuhu[z]['id'];
                        sesiesSuhu[z] = $scope.item.obj[parseFloat(item)]
                    }
                    for (let z = 0; z < 32; z++) {
                        // if (arrobj[i] == 25028 + z)
                        //     seriesNadi[z] = $scope.item.obj[parseFloat(arrobj[i])]
                        var item = $scope.listNadi[z]['id'];
                        seriesNadi[z] = $scope.item.obj[parseFloat(item)]
                    }
                    for (let x = 0; x < 32; x++) {
                        var item = $scope.listPernafasan[x]['id'];
                        sesiesPernafasan[x] = $scope.item.obj[parseFloat(item)]
                    }

                    for (let w = 0; w < 32; w++) {
                        var item = $scope.listTekananDarah[w]['id'];
                        sesiesTekananDarah[w] = $scope.item.obj[parseFloat(item)]
                    }
                    // }
                    for (let x = 0; x < sesiesSuhu.length; x++) {
                        if (!isNaN(parseFloat(sesiesSuhu[x])))
                            sesiesSuhu[x] = parseFloat(sesiesSuhu[x])
                        else
                            sesiesSuhu[x] = null
                    }
                    for (let x = 0; x < seriesNadi.length; x++) {
                        if (!isNaN(parseInt(seriesNadi[x])))
                            seriesNadi[x] = parseInt(seriesNadi[x])
                        else
                            seriesNadi[x] = null
                    }
                    for (let x = 0; x < sesiesPernafasan.length; x++) {
                        if (!isNaN(parseInt(sesiesPernafasan[x])))
                            sesiesPernafasan[x] = parseInt(sesiesPernafasan[x])
                        else
                            sesiesPernafasan[x] = null
                    }
                    for (let x = 0; x < sesiesTekananDarah.length; x++) {
                        if (!isNaN(parseInt(sesiesTekananDarah[x])))
                            sesiesTekananDarah[x] = parseInt(sesiesTekananDarah[x])
                        else
                            sesiesTekananDarah[x] = null
                    }
                    loadChart()
                    medifirstService.postLogging('EMR', 'norec emrpasien_t', e.data.data.norec,
                        'Catatan Grafik Tanda - Tanda Vital' + ' dengan No EMR - ' + e.data.data.noemr + ' pada No Registrasi '
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

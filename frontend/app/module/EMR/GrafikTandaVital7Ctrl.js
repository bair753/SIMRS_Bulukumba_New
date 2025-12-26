define(['initialize'], function (initialize) {
    'use strict';
    initialize.controller('GrafikTandaVital7Ctrl', ['$q', '$rootScope', '$scope', 'ModelItem', '$state', 'CacheHelper', 'DateHelper', 'MedifirstService',
        function ($q, $rootScope, $scope, ModelItem, $state, cacheHelper, dateHelper, medifirstService) {


            $scope.noCM = $state.params.noCM;
            $scope.tombolSimpanVis = true
            $scope.noRecPap = cacheHelper.get('noRecPap');
            $scope.totalSkor = 0
            $scope.totalSkor2 = 0
            $scope.cc = {}
            var nomorEMR = '-'
            $scope.cc.emrfk = 290039
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
                { "id": 426851 },
                { "id": 426852 }
            ]

            $scope.listData1 = [
                { 
                    "id": 1,
                    "namaexternal": "Suhu",
                    "details": [
                        { "id": 426853, "caption": "", "type": "textbox" },
                        { "id": 426854, "caption": "", "type": "textbox" },
                        { "id": 426855, "caption": "", "type": "textbox" },
                        { "id": 426856, "caption": "", "type": "textbox" },
                        { "id": 426857, "caption": "", "type": "textbox" },
                        { "id": 426858, "caption": "", "type": "textbox" },
                        { "id": 426859, "caption": "", "type": "textbox" },
                        { "id": 426860, "caption": "", "type": "textbox" },
                        // { "id": 425011, "caption": "", "type": "textbox" },
                        // { "id": 425012, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "namaexternal": "Nadi",
                    "details": [
                        { "id": 426861, "caption": "", "type": "textbox" },
                        { "id": 426862, "caption": "", "type": "textbox" },
                        { "id": 426863, "caption": "", "type": "textbox" },
                        { "id": 426864, "caption": "", "type": "textbox" },
                        { "id": 426865, "caption": "", "type": "textbox" },
                        { "id": 426866, "caption": "", "type": "textbox" },
                        { "id": 426867, "caption": "", "type": "textbox" },
                        { "id": 426868, "caption": "", "type": "textbox" },
                        // { "id": 425021, "caption": "", "type": "textbox" },
                        // { "id": 425022, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "namaexternal": "Pernafasan",
                    "details": [
                        { "id": 426869, "caption": "", "type": "textbox" },
                        { "id": 426870, "caption": "", "type": "textbox" },
                        { "id": 426871, "caption": "", "type": "textbox" },
                        { "id": 426872, "caption": "", "type": "textbox" },
                        { "id": 426873, "caption": "", "type": "textbox" },
                        { "id": 426874, "caption": "", "type": "textbox" },
                        { "id": 426875, "caption": "", "type": "textbox" },
                        { "id": 426876, "caption": "", "type": "textbox" },
                        // { "id": 425031, "caption": "", "type": "textbox" },
                        // { "id": 425032, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "namaexternal": "Tekanan Darah",
                    "details": [
                        { "id": 426877, "caption": "", "type": "textbox" },
                        { "id": 426878, "caption": "", "type": "textbox" },
                        { "id": 426879, "caption": "", "type": "textbox" },
                        { "id": 426880, "caption": "", "type": "textbox" },
                        { "id": 426881, "caption": "", "type": "textbox" },
                        { "id": 426882, "caption": "", "type": "textbox" },
                        { "id": 426883, "caption": "", "type": "textbox" },
                        { "id": 426884, "caption": "", "type": "textbox" },
                        // { "id": 425041, "caption": "", "type": "textbox" },
                        // { "id": 425042, "caption": "", "type": "textbox" }
                    ]
                }
            ]

            $scope.listTanggal2 = [
                { "id": 426885 },
                { "id": 426886 }
            ]

            $scope.listData2 = [
                {
                    "id": 1,
                    "namaexternal": "Suhu",
                    "details": [
                        { "id": 426887, "caption": "", "type": "textbox" },
                        { "id": 426888, "caption": "", "type": "textbox" },
                        { "id": 426889, "caption": "", "type": "textbox" },
                        { "id": 426890, "caption": "", "type": "textbox" },
                        { "id": 426891, "caption": "", "type": "textbox" },
                        { "id": 426892, "caption": "", "type": "textbox" },
                        { "id": 426893, "caption": "", "type": "textbox" },
                        { "id": 426894, "caption": "", "type": "textbox" },
                        // { "id": 425053, "caption": "", "type": "textbox" },
                        // { "id": 425054, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "namaexternal": "Nadi",
                    "details": [
                        { "id": 426895, "caption": "", "type": "textbox" },
                        { "id": 426896, "caption": "", "type": "textbox" },
                        { "id": 426897, "caption": "", "type": "textbox" },
                        { "id": 426898, "caption": "", "type": "textbox" },
                        { "id": 426899, "caption": "", "type": "textbox" },
                        { "id": 426900, "caption": "", "type": "textbox" },
                        { "id": 426901, "caption": "", "type": "textbox" },
                        { "id": 426902, "caption": "", "type": "textbox" },
                        // { "id": 425063, "caption": "", "type": "textbox" },
                        // { "id": 425064, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "namaexternal": "Pernafasan",
                    "details": [
                        { "id": 426903, "caption": "", "type": "textbox" },
                        { "id": 426904, "caption": "", "type": "textbox" },
                        { "id": 426905, "caption": "", "type": "textbox" },
                        { "id": 426906, "caption": "", "type": "textbox" },
                        { "id": 426907, "caption": "", "type": "textbox" },
                        { "id": 426908, "caption": "", "type": "textbox" },
                        { "id": 426909, "caption": "", "type": "textbox" },
                        { "id": 426910, "caption": "", "type": "textbox" },
                        // { "id": 425073, "caption": "", "type": "textbox" },
                        // { "id": 425074, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "namaexternal": "Tekanan Darah",
                    "details": [
                        { "id": 426911, "caption": "", "type": "textbox" },
                        { "id": 426912, "caption": "", "type": "textbox" },
                        { "id": 426913, "caption": "", "type": "textbox" },
                        { "id": 426914, "caption": "", "type": "textbox" },
                        { "id": 426915, "caption": "", "type": "textbox" },
                        { "id": 426916, "caption": "", "type": "textbox" },
                        { "id": 426917, "caption": "", "type": "textbox" },
                        { "id": 426918, "caption": "", "type": "textbox" },
                        // { "id": 425083, "caption": "", "type": "textbox" },
                        // { "id": 425084, "caption": "", "type": "textbox" }
                    ]
                }
            ]

            $scope.listTanggal3 = [
                { "id": 426919 },
                { "id": 426920 }
            ]

            $scope.listData3 = [
                {
                    "id": 1,
                    "namaexternal": "Suhu",
                    "details": [
                        { "id": 426921, "caption": "", "type": "textbox" },
                        { "id": 426922, "caption": "", "type": "textbox" },
                        { "id": 426923, "caption": "", "type": "textbox" },
                        { "id": 426924, "caption": "", "type": "textbox" },
                        { "id": 426925, "caption": "", "type": "textbox" },
                        { "id": 426926, "caption": "", "type": "textbox" },
                        { "id": 426927, "caption": "", "type": "textbox" },
                        { "id": 426928, "caption": "", "type": "textbox" },
                        // { "id": 425095, "caption": "", "type": "textbox" },
                        // { "id": 425096, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "namaexternal": "Nadi",
                    "details": [
                        { "id": 426929, "caption": "", "type": "textbox" },
                        { "id": 426930, "caption": "", "type": "textbox" },
                        { "id": 426931, "caption": "", "type": "textbox" },
                        { "id": 426932, "caption": "", "type": "textbox" },
                        { "id": 426933, "caption": "", "type": "textbox" },
                        { "id": 426934, "caption": "", "type": "textbox" },
                        { "id": 426935, "caption": "", "type": "textbox" },
                        { "id": 426936, "caption": "", "type": "textbox" },
                        // { "id": 425105, "caption": "", "type": "textbox" },
                        // { "id": 425106, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "namaexternal": "Pernafasan",
                    "details": [
                        { "id": 426937, "caption": "", "type": "textbox" },
                        { "id": 426938, "caption": "", "type": "textbox" },
                        { "id": 426939, "caption": "", "type": "textbox" },
                        { "id": 426940, "caption": "", "type": "textbox" },
                        { "id": 426941, "caption": "", "type": "textbox" },
                        { "id": 426942, "caption": "", "type": "textbox" },
                        { "id": 426943, "caption": "", "type": "textbox" },
                        { "id": 426944, "caption": "", "type": "textbox" },
                        // { "id": 425115, "caption": "", "type": "textbox" },
                        // { "id": 425116, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "namaexternal": "Tekanan Darah",
                    "details": [
                        { "id": 426945, "caption": "", "type": "textbox" },
                        { "id": 426946, "caption": "", "type": "textbox" },
                        { "id": 426947, "caption": "", "type": "textbox" },
                        { "id": 426948, "caption": "", "type": "textbox" },
                        { "id": 426949, "caption": "", "type": "textbox" },
                        { "id": 426950, "caption": "", "type": "textbox" },
                        { "id": 426951, "caption": "", "type": "textbox" },
                        { "id": 426952, "caption": "", "type": "textbox" },
                        // { "id": 425125, "caption": "", "type": "textbox" },
                        // { "id": 425126, "caption": "", "type": "textbox" }
                    ]
                }
            ]

            $scope.listTanggal4 = [
                { "id": 426953 },
                { "id": 426954 }
            ]

            $scope.listData4 = [
                {
                    "id": 1,
                    "namaexternal": "Suhu",
                    "details": [
                        { "id": 426955, "caption": "", "type": "textbox" },
                        { "id": 426956, "caption": "", "type": "textbox" },
                        { "id": 426957, "caption": "", "type": "textbox" },
                        { "id": 426958, "caption": "", "type": "textbox" },
                        { "id": 426959, "caption": "", "type": "textbox" },
                        { "id": 426960, "caption": "", "type": "textbox" },
                        { "id": 426961, "caption": "", "type": "textbox" },
                        { "id": 426962, "caption": "", "type": "textbox" },
                        // { "id": 425137, "caption": "", "type": "textbox" },
                        // { "id": 425138, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "namaexternal": "Nadi",
                    "details": [
                        { "id": 426963, "caption": "", "type": "textbox" },
                        { "id": 426964, "caption": "", "type": "textbox" },
                        { "id": 426965, "caption": "", "type": "textbox" },
                        { "id": 426966, "caption": "", "type": "textbox" },
                        { "id": 426967, "caption": "", "type": "textbox" },
                        { "id": 426968, "caption": "", "type": "textbox" },
                        { "id": 426969, "caption": "", "type": "textbox" },
                        { "id": 426970, "caption": "", "type": "textbox" },
                        // { "id": 425148, "caption": "", "type": "textbox" },
                        // { "id": 425149, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "namaexternal": "Pernafasan",
                    "details": [
                        { "id": 426971, "caption": "", "type": "textbox" },
                        { "id": 426972, "caption": "", "type": "textbox" },
                        { "id": 426973, "caption": "", "type": "textbox" },
                        { "id": 426974, "caption": "", "type": "textbox" },
                        { "id": 426975, "caption": "", "type": "textbox" },
                        { "id": 426976, "caption": "", "type": "textbox" },
                        { "id": 426977, "caption": "", "type": "textbox" },
                        { "id": 426978, "caption": "", "type": "textbox" },
                        // { "id": 425158, "caption": "", "type": "textbox" },
                        // { "id": 425159, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "namaexternal": "Tekanan Darah",
                    "details": [
                        { "id": 426979, "caption": "", "type": "textbox" },
                        { "id": 426980, "caption": "", "type": "textbox" },
                        { "id": 426981, "caption": "", "type": "textbox" },
                        { "id": 426982, "caption": "", "type": "textbox" },
                        { "id": 426983, "caption": "", "type": "textbox" },
                        { "id": 426984, "caption": "", "type": "textbox" },
                        { "id": 426985, "caption": "", "type": "textbox" },
                        { "id": 426986, "caption": "", "type": "textbox" },
                        // { "id": 425168, "caption": "", "type": "textbox" },
                        // { "id": 425169, "caption": "", "type": "textbox" }
                    ]
                }
            ]

            $scope.listGantiSetInfus = [
                {
                    "id": 1,
                    "details": [
                        { "id": 426987, "caption": "", "type": "date" },
                        { "id": 426988, "caption": "", "type": "time" },
                        { "id": 426989, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "details": [
                        { "id": 426990, "caption": "", "type": "date" },
                        { "id": 426991, "caption": "", "type": "time" },
                        { "id": 426992, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "details": [
                        { "id": 426993, "caption": "", "type": "date" },
                        { "id": 426994, "caption": "", "type": "time" },
                        { "id": 426995, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "details": [
                        { "id": 426996, "caption": "", "type": "date" },
                        { "id": 426997, "caption": "", "type": "time" },
                        { "id": 426998, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 5,
                    "details": [
                        { "id": 426999, "caption": "", "type": "date" },
                        { "id": 427000, "caption": "", "type": "time" },
                        { "id": 427001, "caption": "", "type": "textbox" }
                    ]
                }
            ]

            $scope.listGantiKateter = [
                {
                    "id": 1,
                    "details": [
                        { "id": 427002, "caption": "", "type": "date" },
                        { "id": 427003, "caption": "", "type": "time" },
                        { "id": 427004, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "details": [
                        { "id": 427005, "caption": "", "type": "date" },
                        { "id": 427006, "caption": "", "type": "time" },
                        { "id": 427007, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "details": [
                        { "id": 427008, "caption": "", "type": "date" },
                        { "id": 427009, "caption": "", "type": "time" },
                        { "id": 427010, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "details": [
                        { "id": 427011, "caption": "", "type": "date" },
                        { "id": 427012, "caption": "", "type": "time" },
                        { "id": 427013, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 5,
                    "details": [
                        { "id": 427014, "caption": "", "type": "date" },
                        { "id": 427015, "caption": "", "type": "time" },
                        { "id": 427016, "caption": "", "type": "textbox" }
                    ]
                }
            ]

            $scope.listGantiNGT = [
                {
                    "id": 1,
                    "details": [
                        { "id": 427017, "caption": "", "type": "date" },
                        { "id": 427018, "caption": "", "type": "time" },
                        { "id": 427019, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "details": [
                        { "id": 427020, "caption": "", "type": "date" },
                        { "id": 427021, "caption": "", "type": "time" },
                        { "id": 427022, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "details": [
                        { "id": 427023, "caption": "", "type": "date" },
                        { "id": 427024, "caption": "", "type": "time" },
                        { "id": 427025, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "details": [
                        { "id": 427026, "caption": "", "type": "date" },
                        { "id": 427027, "caption": "", "type": "time" },
                        { "id": 427028, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 5,
                    "details": [
                        { "id": 427029, "caption": "", "type": "date" },
                        { "id": 427030, "caption": "", "type": "time" },
                        { "id": 427031, "caption": "", "type": "textbox" }
                    ]
                }
            ]

            $scope.listTabelTerakhir = [
                {
                    "id": 1,
                    "namaexternal": "Diet",
                    "details": [
                        { "id": 427032, "caption": "", "type": "textbox" },
                        { "id": 427033, "caption": "", "type": "textbox" },
                        { "id": 427034, "caption": "", "type": "textbox" },
                        { "id": 427035, "caption": "", "type": "textbox" },
                        { "id": 427036, "caption": "", "type": "textbox" },
                        { "id": 427037, "caption": "", "type": "textbox" },
                        { "id": 427038, "caption": "", "type": "textbox" },
                        { "id": 427039, "caption": "", "type": "textbox" },
                        { "id": 427040, "caption": "", "type": "textbox" },
                        { "id": 427041, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "namaexternal": "Berat Badan",
                    "details": [
                        { "id": 427042, "caption": "", "type": "textbox" },
                        { "id": 427043, "caption": "", "type": "textbox" },
                        { "id": 427044, "caption": "", "type": "textbox" },
                        { "id": 427045, "caption": "", "type": "textbox" },
                        { "id": 427046, "caption": "", "type": "textbox" },
                        { "id": 427047, "caption": "", "type": "textbox" },
                        { "id": 427048, "caption": "", "type": "textbox" },
                        { "id": 427049, "caption": "", "type": "textbox" },
                        { "id": 427050, "caption": "", "type": "textbox" },
                        { "id": 427051, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "namaexternal": "Tindakan khusus",
                    "details": [
                        { "id": 427052, "caption": "", "type": "textbox" },
                        { "id": 427053, "caption": "", "type": "textbox" },
                        { "id": 427054, "caption": "", "type": "textbox" },
                        { "id": 427055, "caption": "", "type": "textbox" },
                        { "id": 427056, "caption": "", "type": "textbox" },
                        { "id": 427057, "caption": "", "type": "textbox" },
                        { "id": 427058, "caption": "", "type": "textbox" },
                        { "id": 427059, "caption": "", "type": "textbox" },
                        { "id": 427060, "caption": "", "type": "textbox" },
                        { "id": 427061, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "namaexternal": "Sputum",
                    "details": [
                        { "id": 427062, "caption": "", "type": "textbox" },
                        { "id": 427063, "caption": "", "type": "textbox" },
                        { "id": 427064, "caption": "", "type": "textbox" },
                        { "id": 427065, "caption": "", "type": "textbox" },
                        { "id": 427066, "caption": "", "type": "textbox" },
                        { "id": 427067, "caption": "", "type": "textbox" },
                        { "id": 427068, "caption": "", "type": "textbox" },
                        { "id": 427069, "caption": "", "type": "textbox" },
                        { "id": 427070, "caption": "", "type": "textbox" },
                        { "id": 427071, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 5,
                    "namaexternal": "Sputum",
                    "details": [
                        { "id": 427072, "caption": "", "type": "textbox" },
                        { "id": 427073, "caption": "", "type": "textbox" },
                        { "id": 427074, "caption": "", "type": "textbox" },
                        { "id": 427075, "caption": "", "type": "textbox" },
                        { "id": 427076, "caption": "", "type": "textbox" },
                        { "id": 427077, "caption": "", "type": "textbox" },
                        { "id": 427078, "caption": "", "type": "textbox" },
                        { "id": 427079, "caption": "", "type": "textbox" },
                        { "id": 427080, "caption": "", "type": "textbox" },
                        { "id": 427081, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 6,
                    "namaexternal": "Sputum",
                    "details": [
                        { "id": 427082, "caption": "", "type": "textbox" },
                        { "id": 427083, "caption": "", "type": "textbox" },
                        { "id": 427084, "caption": "", "type": "textbox" },
                        { "id": 427085, "caption": "", "type": "textbox" },
                        { "id": 427086, "caption": "", "type": "textbox" },
                        { "id": 427087, "caption": "", "type": "textbox" },
                        { "id": 427088, "caption": "", "type": "textbox" },
                        { "id": 427089, "caption": "", "type": "textbox" },
                        { "id": 427090, "caption": "", "type": "textbox" },
                        { "id": 427091, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 7,
                    "namaexternal": "Darah",
                    "details": [
                        { "id": 427092, "caption": "", "type": "textbox" },
                        { "id": 427093, "caption": "", "type": "textbox" },
                        { "id": 427094, "caption": "", "type": "textbox" },
                        { "id": 427095, "caption": "", "type": "textbox" },
                        { "id": 427096, "caption": "", "type": "textbox" },
                        { "id": 427097, "caption": "", "type": "textbox" },
                        { "id": 427098, "caption": "", "type": "textbox" },
                        { "id": 427099, "caption": "", "type": "textbox" },
                        { "id": 427100, "caption": "", "type": "textbox" },
                        { "id": 427101, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 8,
                    "namaexternal": "Darah",
                    "details": [
                        { "id": 427102, "caption": "", "type": "textbox" },
                        { "id": 427103, "caption": "", "type": "textbox" },
                        { "id": 427104, "caption": "", "type": "textbox" },
                        { "id": 427105, "caption": "", "type": "textbox" },
                        { "id": 427106, "caption": "", "type": "textbox" },
                        { "id": 427107, "caption": "", "type": "textbox" },
                        { "id": 427108, "caption": "", "type": "textbox" },
                        { "id": 427109, "caption": "", "type": "textbox" },
                        { "id": 427110, "caption": "", "type": "textbox" },
                        { "id": 427111, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 9,
                    "namaexternal": "Darah",
                    "details": [
                        { "id": 427112, "caption": "", "type": "textbox" },
                        { "id": 427113, "caption": "", "type": "textbox" },
                        { "id": 427114, "caption": "", "type": "textbox" },
                        { "id": 427115, "caption": "", "type": "textbox" },
                        { "id": 427116, "caption": "", "type": "textbox" },
                        { "id": 427117, "caption": "", "type": "textbox" },
                        { "id": 427118, "caption": "", "type": "textbox" },
                        { "id": 427119, "caption": "", "type": "textbox" },
                        { "id": 427120, "caption": "", "type": "textbox" },
                        { "id": 427121, "caption": "", "type": "textbox" }
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
                    $scope.item.obj[426850] = new Date(moment(antrianPasien.tglregistrasi).format('YYYY-MM-DD HH:mm'));
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

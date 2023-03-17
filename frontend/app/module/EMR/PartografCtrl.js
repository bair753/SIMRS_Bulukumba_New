define(['initialize'], function (initialize) {
    'use strict';
    initialize.controller('PartografCtrl', ['$q', '$rootScope', '$scope', 'ModelItem', '$state', 'CacheHelper', 'DateHelper', 'MedifirstService',
        function ($q, $rootScope, $scope, ModelItem, $state, cacheHelper, dateHelper, medifirstService) {


            $scope.noCM = $state.params.noCM;
            $scope.tombolSimpanVis = true
            $scope.noRecPap = cacheHelper.get('noRecPap');
            $scope.totalSkor = 0
            $scope.totalSkor2 = 0
            $scope.cc = {}
            var nomorEMR = '-'
            $scope.cc.emrfk = 290071
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
                { "id": 425001 },
                { "id": 425002 }
            ]

            $scope.listData1 = [
                { 
                    "id": 1,
                    "namaexternal": "Suhu",
                    "details": [
                        { "id": 425003, "caption": "", "type": "textbox" },
                        { "id": 425004, "caption": "", "type": "textbox" },
                        { "id": 425005, "caption": "", "type": "textbox" },
                        { "id": 425006, "caption": "", "type": "textbox" },
                        { "id": 425007, "caption": "", "type": "textbox" },
                        { "id": 425008, "caption": "", "type": "textbox" },
                        { "id": 425009, "caption": "", "type": "textbox" },
                        { "id": 425010, "caption": "", "type": "textbox" },
                        // { "id": 425011, "caption": "", "type": "textbox" },
                        // { "id": 425012, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "namaexternal": "Nadi",
                    "details": [
                        { "id": 425013, "caption": "", "type": "textbox" },
                        { "id": 425014, "caption": "", "type": "textbox" },
                        { "id": 425015, "caption": "", "type": "textbox" },
                        { "id": 425016, "caption": "", "type": "textbox" },
                        { "id": 425017, "caption": "", "type": "textbox" },
                        { "id": 425018, "caption": "", "type": "textbox" },
                        { "id": 425019, "caption": "", "type": "textbox" },
                        { "id": 425020, "caption": "", "type": "textbox" },
                        // { "id": 425021, "caption": "", "type": "textbox" },
                        // { "id": 425022, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "namaexternal": "Pernafasan",
                    "details": [
                        { "id": 425023, "caption": "", "type": "textbox" },
                        { "id": 425024, "caption": "", "type": "textbox" },
                        { "id": 425025, "caption": "", "type": "textbox" },
                        { "id": 425026, "caption": "", "type": "textbox" },
                        { "id": 425027, "caption": "", "type": "textbox" },
                        { "id": 425028, "caption": "", "type": "textbox" },
                        { "id": 425029, "caption": "", "type": "textbox" },
                        { "id": 425030, "caption": "", "type": "textbox" },
                        // { "id": 425031, "caption": "", "type": "textbox" },
                        // { "id": 425032, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "namaexternal": "Tekanan Darah",
                    "details": [
                        { "id": 425033, "caption": "", "type": "textbox" },
                        { "id": 425034, "caption": "", "type": "textbox" },
                        { "id": 425035, "caption": "", "type": "textbox" },
                        { "id": 425036, "caption": "", "type": "textbox" },
                        { "id": 425037, "caption": "", "type": "textbox" },
                        { "id": 425038, "caption": "", "type": "textbox" },
                        { "id": 425039, "caption": "", "type": "textbox" },
                        { "id": 425040, "caption": "", "type": "textbox" },
                        // { "id": 425041, "caption": "", "type": "textbox" },
                        // { "id": 425042, "caption": "", "type": "textbox" }
                    ]
                }
            ]

            $scope.listTanggal2 = [
                { "id": 425043 },
                { "id": 425044 }
            ]

            $scope.listData2 = [
                {
                    "id": 1,
                    "namaexternal": "Suhu",
                    "details": [
                        { "id": 425045, "caption": "", "type": "textbox" },
                        { "id": 425046, "caption": "", "type": "textbox" },
                        { "id": 425047, "caption": "", "type": "textbox" },
                        { "id": 425048, "caption": "", "type": "textbox" },
                        { "id": 425049, "caption": "", "type": "textbox" },
                        { "id": 425050, "caption": "", "type": "textbox" },
                        { "id": 425051, "caption": "", "type": "textbox" },
                        { "id": 425052, "caption": "", "type": "textbox" },
                        // { "id": 425053, "caption": "", "type": "textbox" },
                        // { "id": 425054, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "namaexternal": "Nadi",
                    "details": [
                        { "id": 425055, "caption": "", "type": "textbox" },
                        { "id": 425056, "caption": "", "type": "textbox" },
                        { "id": 425057, "caption": "", "type": "textbox" },
                        { "id": 425058, "caption": "", "type": "textbox" },
                        { "id": 425059, "caption": "", "type": "textbox" },
                        { "id": 425060, "caption": "", "type": "textbox" },
                        { "id": 425061, "caption": "", "type": "textbox" },
                        { "id": 425062, "caption": "", "type": "textbox" },
                        // { "id": 425063, "caption": "", "type": "textbox" },
                        // { "id": 425064, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "namaexternal": "Pernafasan",
                    "details": [
                        { "id": 425065, "caption": "", "type": "textbox" },
                        { "id": 425066, "caption": "", "type": "textbox" },
                        { "id": 425067, "caption": "", "type": "textbox" },
                        { "id": 425068, "caption": "", "type": "textbox" },
                        { "id": 425069, "caption": "", "type": "textbox" },
                        { "id": 425070, "caption": "", "type": "textbox" },
                        { "id": 425071, "caption": "", "type": "textbox" },
                        { "id": 425072, "caption": "", "type": "textbox" },
                        // { "id": 425073, "caption": "", "type": "textbox" },
                        // { "id": 425074, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "namaexternal": "Tekanan Darah",
                    "details": [
                        { "id": 425075, "caption": "", "type": "textbox" },
                        { "id": 425076, "caption": "", "type": "textbox" },
                        { "id": 425077, "caption": "", "type": "textbox" },
                        { "id": 425078, "caption": "", "type": "textbox" },
                        { "id": 425079, "caption": "", "type": "textbox" },
                        { "id": 425080, "caption": "", "type": "textbox" },
                        { "id": 425081, "caption": "", "type": "textbox" },
                        { "id": 425082, "caption": "", "type": "textbox" },
                        // { "id": 425083, "caption": "", "type": "textbox" },
                        // { "id": 425084, "caption": "", "type": "textbox" }
                    ]
                }
            ]

            $scope.listTanggal3 = [
                { "id": 425085 },
                { "id": 425086 }
            ]

            $scope.listData3 = [
                {
                    "id": 1,
                    "namaexternal": "Suhu",
                    "details": [
                        { "id": 425087, "caption": "", "type": "textbox" },
                        { "id": 425088, "caption": "", "type": "textbox" },
                        { "id": 425089, "caption": "", "type": "textbox" },
                        { "id": 425090, "caption": "", "type": "textbox" },
                        { "id": 425091, "caption": "", "type": "textbox" },
                        { "id": 425092, "caption": "", "type": "textbox" },
                        { "id": 425093, "caption": "", "type": "textbox" },
                        { "id": 425094, "caption": "", "type": "textbox" },
                        // { "id": 425095, "caption": "", "type": "textbox" },
                        // { "id": 425096, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "namaexternal": "Nadi",
                    "details": [
                        { "id": 425097, "caption": "", "type": "textbox" },
                        { "id": 425098, "caption": "", "type": "textbox" },
                        { "id": 425099, "caption": "", "type": "textbox" },
                        { "id": 425100, "caption": "", "type": "textbox" },
                        { "id": 425101, "caption": "", "type": "textbox" },
                        { "id": 425102, "caption": "", "type": "textbox" },
                        { "id": 425103, "caption": "", "type": "textbox" },
                        { "id": 425104, "caption": "", "type": "textbox" },
                        // { "id": 425105, "caption": "", "type": "textbox" },
                        // { "id": 425106, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "namaexternal": "Pernafasan",
                    "details": [
                        { "id": 425107, "caption": "", "type": "textbox" },
                        { "id": 425108, "caption": "", "type": "textbox" },
                        { "id": 425109, "caption": "", "type": "textbox" },
                        { "id": 425110, "caption": "", "type": "textbox" },
                        { "id": 425111, "caption": "", "type": "textbox" },
                        { "id": 425112, "caption": "", "type": "textbox" },
                        { "id": 425113, "caption": "", "type": "textbox" },
                        { "id": 425114, "caption": "", "type": "textbox" },
                        // { "id": 425115, "caption": "", "type": "textbox" },
                        // { "id": 425116, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "namaexternal": "Tekanan Darah",
                    "details": [
                        { "id": 425117, "caption": "", "type": "textbox" },
                        { "id": 425118, "caption": "", "type": "textbox" },
                        { "id": 425119, "caption": "", "type": "textbox" },
                        { "id": 425120, "caption": "", "type": "textbox" },
                        { "id": 425121, "caption": "", "type": "textbox" },
                        { "id": 425122, "caption": "", "type": "textbox" },
                        { "id": 425123, "caption": "", "type": "textbox" },
                        { "id": 425124, "caption": "", "type": "textbox" },
                        // { "id": 425125, "caption": "", "type": "textbox" },
                        // { "id": 425126, "caption": "", "type": "textbox" }
                    ]
                }
            ]

            $scope.listTanggal4 = [
                { "id": 425127 },
                { "id": 425128 }
            ]

            $scope.listData4 = [
                {
                    "id": 1,
                    "namaexternal": "Suhu",
                    "details": [
                        { "id": 425129, "caption": "", "type": "textbox" },
                        { "id": 425130, "caption": "", "type": "textbox" },
                        { "id": 425131, "caption": "", "type": "textbox" },
                        { "id": 425132, "caption": "", "type": "textbox" },
                        { "id": 425133, "caption": "", "type": "textbox" },
                        { "id": 425134, "caption": "", "type": "textbox" },
                        { "id": 425135, "caption": "", "type": "textbox" },
                        { "id": 425136, "caption": "", "type": "textbox" },
                        // { "id": 425137, "caption": "", "type": "textbox" },
                        // { "id": 425138, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "namaexternal": "Nadi",
                    "details": [
                        { "id": 425139, "caption": "", "type": "textbox" },
                        { "id": 425140, "caption": "", "type": "textbox" },
                        { "id": 425141, "caption": "", "type": "textbox" },
                        { "id": 425142, "caption": "", "type": "textbox" },
                        { "id": 425143, "caption": "", "type": "textbox" },
                        { "id": 425145, "caption": "", "type": "textbox" },
                        { "id": 425146, "caption": "", "type": "textbox" },
                        { "id": 425147, "caption": "", "type": "textbox" },
                        // { "id": 425148, "caption": "", "type": "textbox" },
                        // { "id": 425149, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "namaexternal": "Pernafasan",
                    "details": [
                        { "id": 425150, "caption": "", "type": "textbox" },
                        { "id": 425151, "caption": "", "type": "textbox" },
                        { "id": 425152, "caption": "", "type": "textbox" },
                        { "id": 425153, "caption": "", "type": "textbox" },
                        { "id": 425154, "caption": "", "type": "textbox" },
                        { "id": 425155, "caption": "", "type": "textbox" },
                        { "id": 425156, "caption": "", "type": "textbox" },
                        { "id": 425157, "caption": "", "type": "textbox" },
                        // { "id": 425158, "caption": "", "type": "textbox" },
                        // { "id": 425159, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "namaexternal": "Tekanan Darah",
                    "details": [
                        { "id": 425160, "caption": "", "type": "textbox" },
                        { "id": 425161, "caption": "", "type": "textbox" },
                        { "id": 425162, "caption": "", "type": "textbox" },
                        { "id": 425163, "caption": "", "type": "textbox" },
                        { "id": 425164, "caption": "", "type": "textbox" },
                        { "id": 425165, "caption": "", "type": "textbox" },
                        { "id": 425166, "caption": "", "type": "textbox" },
                        { "id": 425167, "caption": "", "type": "textbox" },
                        // { "id": 425168, "caption": "", "type": "textbox" },
                        // { "id": 425169, "caption": "", "type": "textbox" }
                    ]
                }
            ]

            $scope.listGantiSetInfus = [
                {
                    "id": 1,
                    "details": [
                        { "id": 425170, "caption": "", "type": "date" },
                        { "id": 425171, "caption": "", "type": "time" },
                        { "id": 425172, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "details": [
                        { "id": 425173, "caption": "", "type": "date" },
                        { "id": 425174, "caption": "", "type": "time" },
                        { "id": 425175, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "details": [
                        { "id": 425176, "caption": "", "type": "date" },
                        { "id": 425177, "caption": "", "type": "time" },
                        { "id": 425178, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "details": [
                        { "id": 425179, "caption": "", "type": "date" },
                        { "id": 425180, "caption": "", "type": "time" },
                        { "id": 425181, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 5,
                    "details": [
                        { "id": 425182, "caption": "", "type": "date" },
                        { "id": 425183, "caption": "", "type": "time" },
                        { "id": 425184, "caption": "", "type": "textbox" }
                    ]
                }
            ]

            $scope.listGantiKateter = [
                {
                    "id": 1,
                    "details": [
                        { "id": 425185, "caption": "", "type": "date" },
                        { "id": 425186, "caption": "", "type": "time" },
                        { "id": 425187, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "details": [
                        { "id": 425188, "caption": "", "type": "date" },
                        { "id": 425189, "caption": "", "type": "time" },
                        { "id": 425190, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "details": [
                        { "id": 425191, "caption": "", "type": "date" },
                        { "id": 425192, "caption": "", "type": "time" },
                        { "id": 425193, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "details": [
                        { "id": 425194, "caption": "", "type": "date" },
                        { "id": 425195, "caption": "", "type": "time" },
                        { "id": 425196, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 5,
                    "details": [
                        { "id": 425197, "caption": "", "type": "date" },
                        { "id": 425198, "caption": "", "type": "time" },
                        { "id": 425199, "caption": "", "type": "textbox" }
                    ]
                }
            ]

            $scope.listGantiNGT = [
                {
                    "id": 1,
                    "details": [
                        { "id": 425200, "caption": "", "type": "date" },
                        { "id": 425201, "caption": "", "type": "time" },
                        { "id": 425202, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "details": [
                        { "id": 425203, "caption": "", "type": "date" },
                        { "id": 425204, "caption": "", "type": "time" },
                        { "id": 425205, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "details": [
                        { "id": 425206, "caption": "", "type": "date" },
                        { "id": 425207, "caption": "", "type": "time" },
                        { "id": 425208, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "details": [
                        { "id": 425209, "caption": "", "type": "date" },
                        { "id": 425210, "caption": "", "type": "time" },
                        { "id": 425211, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 5,
                    "details": [
                        { "id": 425212, "caption": "", "type": "date" },
                        { "id": 425213, "caption": "", "type": "time" },
                        { "id": 425214, "caption": "", "type": "textbox" }
                    ]
                }
            ]

            $scope.listTabelTerakhir = [
                {
                    "id": 1,
                    "namaexternal": "Diet",
                    "details": [
                        { "id": 425215, "caption": "", "type": "textbox" },
                        { "id": 425216, "caption": "", "type": "textbox" },
                        { "id": 425217, "caption": "", "type": "textbox" },
                        { "id": 425218, "caption": "", "type": "textbox" },
                        { "id": 425219, "caption": "", "type": "textbox" },
                        { "id": 425220, "caption": "", "type": "textbox" },
                        { "id": 425221, "caption": "", "type": "textbox" },
                        { "id": 425222, "caption": "", "type": "textbox" },
                        { "id": 425223, "caption": "", "type": "textbox" },
                        { "id": 425224, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "namaexternal": "Berat Badan",
                    "details": [
                        { "id": 425225, "caption": "", "type": "textbox" },
                        { "id": 425226, "caption": "", "type": "textbox" },
                        { "id": 425227, "caption": "", "type": "textbox" },
                        { "id": 425228, "caption": "", "type": "textbox" },
                        { "id": 425229, "caption": "", "type": "textbox" },
                        { "id": 425230, "caption": "", "type": "textbox" },
                        { "id": 425231, "caption": "", "type": "textbox" },
                        { "id": 425232, "caption": "", "type": "textbox" },
                        { "id": 425233, "caption": "", "type": "textbox" },
                        { "id": 425234, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "namaexternal": "Tindakan khusus",
                    "details": [
                        { "id": 425235, "caption": "", "type": "textbox" },
                        { "id": 425236, "caption": "", "type": "textbox" },
                        { "id": 425237, "caption": "", "type": "textbox" },
                        { "id": 425238, "caption": "", "type": "textbox" },
                        { "id": 425239, "caption": "", "type": "textbox" },
                        { "id": 425240, "caption": "", "type": "textbox" },
                        { "id": 425241, "caption": "", "type": "textbox" },
                        { "id": 425242, "caption": "", "type": "textbox" },
                        { "id": 425243, "caption": "", "type": "textbox" },
                        { "id": 425244, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "namaexternal": "Sputum",
                    "details": [
                        { "id": 425245, "caption": "", "type": "textbox" },
                        { "id": 425246, "caption": "", "type": "textbox" },
                        { "id": 425247, "caption": "", "type": "textbox" },
                        { "id": 425248, "caption": "", "type": "textbox" },
                        { "id": 425249, "caption": "", "type": "textbox" },
                        { "id": 425250, "caption": "", "type": "textbox" },
                        { "id": 425251, "caption": "", "type": "textbox" },
                        { "id": 425252, "caption": "", "type": "textbox" },
                        { "id": 425253, "caption": "", "type": "textbox" },
                        { "id": 425254, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 5,
                    "namaexternal": "Sputum",
                    "details": [
                        { "id": 425255, "caption": "", "type": "textbox" },
                        { "id": 425256, "caption": "", "type": "textbox" },
                        { "id": 425257, "caption": "", "type": "textbox" },
                        { "id": 425258, "caption": "", "type": "textbox" },
                        { "id": 425259, "caption": "", "type": "textbox" },
                        { "id": 425260, "caption": "", "type": "textbox" },
                        { "id": 425261, "caption": "", "type": "textbox" },
                        { "id": 425262, "caption": "", "type": "textbox" },
                        { "id": 425263, "caption": "", "type": "textbox" },
                        { "id": 425264, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 6,
                    "namaexternal": "Sputum",
                    "details": [
                        { "id": 425265, "caption": "", "type": "textbox" },
                        { "id": 425266, "caption": "", "type": "textbox" },
                        { "id": 425267, "caption": "", "type": "textbox" },
                        { "id": 425268, "caption": "", "type": "textbox" },
                        { "id": 425269, "caption": "", "type": "textbox" },
                        { "id": 425270, "caption": "", "type": "textbox" },
                        { "id": 425271, "caption": "", "type": "textbox" },
                        { "id": 425272, "caption": "", "type": "textbox" },
                        { "id": 425273, "caption": "", "type": "textbox" },
                        { "id": 425274, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 7,
                    "namaexternal": "Darah",
                    "details": [
                        { "id": 425275, "caption": "", "type": "textbox" },
                        { "id": 425276, "caption": "", "type": "textbox" },
                        { "id": 425277, "caption": "", "type": "textbox" },
                        { "id": 425278, "caption": "", "type": "textbox" },
                        { "id": 425279, "caption": "", "type": "textbox" },
                        { "id": 425280, "caption": "", "type": "textbox" },
                        { "id": 425281, "caption": "", "type": "textbox" },
                        { "id": 425282, "caption": "", "type": "textbox" },
                        { "id": 425283, "caption": "", "type": "textbox" },
                        { "id": 425284, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 8,
                    "namaexternal": "Darah",
                    "details": [
                        { "id": 425285, "caption": "", "type": "textbox" },
                        { "id": 425286, "caption": "", "type": "textbox" },
                        { "id": 425287, "caption": "", "type": "textbox" },
                        { "id": 425288, "caption": "", "type": "textbox" },
                        { "id": 425289, "caption": "", "type": "textbox" },
                        { "id": 425290, "caption": "", "type": "textbox" },
                        { "id": 425291, "caption": "", "type": "textbox" },
                        { "id": 425292, "caption": "", "type": "textbox" },
                        { "id": 425293, "caption": "", "type": "textbox" },
                        { "id": 425294, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 9,
                    "namaexternal": "Darah",
                    "details": [
                        { "id": 425295, "caption": "", "type": "textbox" },
                        { "id": 425296, "caption": "", "type": "textbox" },
                        { "id": 425297, "caption": "", "type": "textbox" },
                        { "id": 425298, "caption": "", "type": "textbox" },
                        { "id": 425299, "caption": "", "type": "textbox" },
                        { "id": 425300, "caption": "", "type": "textbox" },
                        { "id": 425301, "caption": "", "type": "textbox" },
                        { "id": 425302, "caption": "", "type": "textbox" },
                        { "id": 425303, "caption": "", "type": "textbox" },
                        { "id": 425304, "caption": "", "type": "textbox" }
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
                    $scope.item.obj[425000] = new Date(moment(antrianPasien.tglregistrasi).format('YYYY-MM-DD HH:mm'));
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
                        'Partograf ' + ' dengan No EMR - ' + e.data.data.noemr + ' pada No Registrasi '
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

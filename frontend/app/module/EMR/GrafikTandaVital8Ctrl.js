define(['initialize'], function (initialize) {
    'use strict';
    initialize.controller('GrafikTandaVital8Ctrl', ['$q', '$rootScope', '$scope', 'ModelItem', '$state', 'CacheHelper', 'DateHelper', 'MedifirstService',
        function ($q, $rootScope, $scope, ModelItem, $state, cacheHelper, dateHelper, medifirstService) {


            $scope.noCM = $state.params.noCM;
            $scope.tombolSimpanVis = true
            $scope.noRecPap = cacheHelper.get('noRecPap');
            $scope.totalSkor = 0
            $scope.totalSkor2 = 0
            $scope.cc = {}
            var nomorEMR = '-'
            $scope.cc.emrfk = 290040
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
                { "id": 427151 },
                { "id": 427152 }
            ]

            $scope.listData1 = [
                { 
                    "id": 1,
                    "namaexternal": "Suhu",
                    "details": [
                        { "id": 427153, "caption": "", "type": "textbox" },
                        { "id": 427154, "caption": "", "type": "textbox" },
                        { "id": 427155, "caption": "", "type": "textbox" },
                        { "id": 427156, "caption": "", "type": "textbox" },
                        { "id": 427157, "caption": "", "type": "textbox" },
                        { "id": 427158, "caption": "", "type": "textbox" },
                        { "id": 427159, "caption": "", "type": "textbox" },
                        { "id": 427160, "caption": "", "type": "textbox" },
                        // { "id": 425011, "caption": "", "type": "textbox" },
                        // { "id": 425012, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "namaexternal": "Nadi",
                    "details": [
                        { "id": 427161, "caption": "", "type": "textbox" },
                        { "id": 427162, "caption": "", "type": "textbox" },
                        { "id": 427163, "caption": "", "type": "textbox" },
                        { "id": 427164, "caption": "", "type": "textbox" },
                        { "id": 427165, "caption": "", "type": "textbox" },
                        { "id": 427166, "caption": "", "type": "textbox" },
                        { "id": 427167, "caption": "", "type": "textbox" },
                        { "id": 427168, "caption": "", "type": "textbox" },
                        // { "id": 425021, "caption": "", "type": "textbox" },
                        // { "id": 425022, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "namaexternal": "Pernafasan",
                    "details": [
                        { "id": 427169, "caption": "", "type": "textbox" },
                        { "id": 427170, "caption": "", "type": "textbox" },
                        { "id": 427171, "caption": "", "type": "textbox" },
                        { "id": 427172, "caption": "", "type": "textbox" },
                        { "id": 427173, "caption": "", "type": "textbox" },
                        { "id": 427174, "caption": "", "type": "textbox" },
                        { "id": 427175, "caption": "", "type": "textbox" },
                        { "id": 427176, "caption": "", "type": "textbox" },
                        // { "id": 425031, "caption": "", "type": "textbox" },
                        // { "id": 425032, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "namaexternal": "Tekanan Darah",
                    "details": [
                        { "id": 427177, "caption": "", "type": "textbox" },
                        { "id": 427178, "caption": "", "type": "textbox" },
                        { "id": 427179, "caption": "", "type": "textbox" },
                        { "id": 427180, "caption": "", "type": "textbox" },
                        { "id": 427181, "caption": "", "type": "textbox" },
                        { "id": 427182, "caption": "", "type": "textbox" },
                        { "id": 427183, "caption": "", "type": "textbox" },
                        { "id": 427184, "caption": "", "type": "textbox" },
                        // { "id": 425041, "caption": "", "type": "textbox" },
                        // { "id": 425042, "caption": "", "type": "textbox" }
                    ]
                }
            ]

            $scope.listTanggal2 = [
                { "id": 427185 },
                { "id": 427186 }
            ]

            $scope.listData2 = [
                {
                    "id": 1,
                    "namaexternal": "Suhu",
                    "details": [
                        { "id": 427187, "caption": "", "type": "textbox" },
                        { "id": 427188, "caption": "", "type": "textbox" },
                        { "id": 427189, "caption": "", "type": "textbox" },
                        { "id": 427190, "caption": "", "type": "textbox" },
                        { "id": 427191, "caption": "", "type": "textbox" },
                        { "id": 427192, "caption": "", "type": "textbox" },
                        { "id": 427193, "caption": "", "type": "textbox" },
                        { "id": 427194, "caption": "", "type": "textbox" },
                        // { "id": 425053, "caption": "", "type": "textbox" },
                        // { "id": 425054, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "namaexternal": "Nadi",
                    "details": [
                        { "id": 427195, "caption": "", "type": "textbox" },
                        { "id": 427196, "caption": "", "type": "textbox" },
                        { "id": 427197, "caption": "", "type": "textbox" },
                        { "id": 427198, "caption": "", "type": "textbox" },
                        { "id": 427199, "caption": "", "type": "textbox" },
                        { "id": 427200, "caption": "", "type": "textbox" },
                        { "id": 427201, "caption": "", "type": "textbox" },
                        { "id": 427202, "caption": "", "type": "textbox" },
                        // { "id": 425063, "caption": "", "type": "textbox" },
                        // { "id": 425064, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "namaexternal": "Pernafasan",
                    "details": [
                        { "id": 427203, "caption": "", "type": "textbox" },
                        { "id": 427204, "caption": "", "type": "textbox" },
                        { "id": 427205, "caption": "", "type": "textbox" },
                        { "id": 427206, "caption": "", "type": "textbox" },
                        { "id": 427207, "caption": "", "type": "textbox" },
                        { "id": 427208, "caption": "", "type": "textbox" },
                        { "id": 427209, "caption": "", "type": "textbox" },
                        { "id": 427210, "caption": "", "type": "textbox" },
                        // { "id": 425073, "caption": "", "type": "textbox" },
                        // { "id": 425074, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "namaexternal": "Tekanan Darah",
                    "details": [
                        { "id": 427211, "caption": "", "type": "textbox" },
                        { "id": 427212, "caption": "", "type": "textbox" },
                        { "id": 427213, "caption": "", "type": "textbox" },
                        { "id": 427214, "caption": "", "type": "textbox" },
                        { "id": 427215, "caption": "", "type": "textbox" },
                        { "id": 427216, "caption": "", "type": "textbox" },
                        { "id": 427217, "caption": "", "type": "textbox" },
                        { "id": 427218, "caption": "", "type": "textbox" },
                        // { "id": 425083, "caption": "", "type": "textbox" },
                        // { "id": 425084, "caption": "", "type": "textbox" }
                    ]
                }
            ]

            $scope.listTanggal3 = [
                { "id": 427219 },
                { "id": 427220 }
            ]

            $scope.listData3 = [
                {
                    "id": 1,
                    "namaexternal": "Suhu",
                    "details": [
                        { "id": 427221, "caption": "", "type": "textbox" },
                        { "id": 427222, "caption": "", "type": "textbox" },
                        { "id": 427223, "caption": "", "type": "textbox" },
                        { "id": 427224, "caption": "", "type": "textbox" },
                        { "id": 427225, "caption": "", "type": "textbox" },
                        { "id": 427226, "caption": "", "type": "textbox" },
                        { "id": 427227, "caption": "", "type": "textbox" },
                        { "id": 427228, "caption": "", "type": "textbox" },
                        // { "id": 425095, "caption": "", "type": "textbox" },
                        // { "id": 425096, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "namaexternal": "Nadi",
                    "details": [
                        { "id": 427229, "caption": "", "type": "textbox" },
                        { "id": 427230, "caption": "", "type": "textbox" },
                        { "id": 427231, "caption": "", "type": "textbox" },
                        { "id": 427232, "caption": "", "type": "textbox" },
                        { "id": 427233, "caption": "", "type": "textbox" },
                        { "id": 427234, "caption": "", "type": "textbox" },
                        { "id": 427235, "caption": "", "type": "textbox" },
                        { "id": 427236, "caption": "", "type": "textbox" },
                        // { "id": 425105, "caption": "", "type": "textbox" },
                        // { "id": 425106, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "namaexternal": "Pernafasan",
                    "details": [
                        { "id": 427237, "caption": "", "type": "textbox" },
                        { "id": 427238, "caption": "", "type": "textbox" },
                        { "id": 427239, "caption": "", "type": "textbox" },
                        { "id": 427240, "caption": "", "type": "textbox" },
                        { "id": 427241, "caption": "", "type": "textbox" },
                        { "id": 427242, "caption": "", "type": "textbox" },
                        { "id": 427243, "caption": "", "type": "textbox" },
                        { "id": 427244, "caption": "", "type": "textbox" },
                        // { "id": 425115, "caption": "", "type": "textbox" },
                        // { "id": 425116, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "namaexternal": "Tekanan Darah",
                    "details": [
                        { "id": 427245, "caption": "", "type": "textbox" },
                        { "id": 427246, "caption": "", "type": "textbox" },
                        { "id": 427247, "caption": "", "type": "textbox" },
                        { "id": 427248, "caption": "", "type": "textbox" },
                        { "id": 427249, "caption": "", "type": "textbox" },
                        { "id": 427250, "caption": "", "type": "textbox" },
                        { "id": 427251, "caption": "", "type": "textbox" },
                        { "id": 427252, "caption": "", "type": "textbox" },
                        // { "id": 425125, "caption": "", "type": "textbox" },
                        // { "id": 425126, "caption": "", "type": "textbox" }
                    ]
                }
            ]

            $scope.listTanggal4 = [
                { "id": 427253 },
                { "id": 427254 }
            ]

            $scope.listData4 = [
                {
                    "id": 1,
                    "namaexternal": "Suhu",
                    "details": [
                        { "id": 427255, "caption": "", "type": "textbox" },
                        { "id": 427256, "caption": "", "type": "textbox" },
                        { "id": 427257, "caption": "", "type": "textbox" },
                        { "id": 427258, "caption": "", "type": "textbox" },
                        { "id": 427259, "caption": "", "type": "textbox" },
                        { "id": 427260, "caption": "", "type": "textbox" },
                        { "id": 427261, "caption": "", "type": "textbox" },
                        { "id": 427262, "caption": "", "type": "textbox" },
                        // { "id": 425137, "caption": "", "type": "textbox" },
                        // { "id": 425138, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "namaexternal": "Nadi",
                    "details": [
                        { "id": 427263, "caption": "", "type": "textbox" },
                        { "id": 427264, "caption": "", "type": "textbox" },
                        { "id": 427265, "caption": "", "type": "textbox" },
                        { "id": 427266, "caption": "", "type": "textbox" },
                        { "id": 427267, "caption": "", "type": "textbox" },
                        { "id": 427268, "caption": "", "type": "textbox" },
                        { "id": 427269, "caption": "", "type": "textbox" },
                        { "id": 427270, "caption": "", "type": "textbox" },
                        // { "id": 425148, "caption": "", "type": "textbox" },
                        // { "id": 425149, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "namaexternal": "Pernafasan",
                    "details": [
                        { "id": 427271, "caption": "", "type": "textbox" },
                        { "id": 427272, "caption": "", "type": "textbox" },
                        { "id": 427273, "caption": "", "type": "textbox" },
                        { "id": 427274, "caption": "", "type": "textbox" },
                        { "id": 427275, "caption": "", "type": "textbox" },
                        { "id": 427276, "caption": "", "type": "textbox" },
                        { "id": 427277, "caption": "", "type": "textbox" },
                        { "id": 427278, "caption": "", "type": "textbox" },
                        // { "id": 425158, "caption": "", "type": "textbox" },
                        // { "id": 425159, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "namaexternal": "Tekanan Darah",
                    "details": [
                        { "id": 427279, "caption": "", "type": "textbox" },
                        { "id": 427280, "caption": "", "type": "textbox" },
                        { "id": 427281, "caption": "", "type": "textbox" },
                        { "id": 427282, "caption": "", "type": "textbox" },
                        { "id": 427283, "caption": "", "type": "textbox" },
                        { "id": 427284, "caption": "", "type": "textbox" },
                        { "id": 427285, "caption": "", "type": "textbox" },
                        { "id": 427286, "caption": "", "type": "textbox" },
                        // { "id": 425168, "caption": "", "type": "textbox" },
                        // { "id": 425169, "caption": "", "type": "textbox" }
                    ]
                }
            ]

            $scope.listGantiSetInfus = [
                {
                    "id": 1,
                    "details": [
                        { "id": 427287, "caption": "", "type": "date" },
                        { "id": 427288, "caption": "", "type": "time" },
                        { "id": 427289, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "details": [
                        { "id": 427290, "caption": "", "type": "date" },
                        { "id": 427291, "caption": "", "type": "time" },
                        { "id": 427292, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "details": [
                        { "id": 427293, "caption": "", "type": "date" },
                        { "id": 427294, "caption": "", "type": "time" },
                        { "id": 427295, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "details": [
                        { "id": 427296, "caption": "", "type": "date" },
                        { "id": 427297, "caption": "", "type": "time" },
                        { "id": 427298, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 5,
                    "details": [
                        { "id": 427299, "caption": "", "type": "date" },
                        { "id": 427300, "caption": "", "type": "time" },
                        { "id": 427301, "caption": "", "type": "textbox" }
                    ]
                }
            ]

            $scope.listGantiKateter = [
                {
                    "id": 1,
                    "details": [
                        { "id": 427302, "caption": "", "type": "date" },
                        { "id": 427303, "caption": "", "type": "time" },
                        { "id": 427304, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "details": [
                        { "id": 427305, "caption": "", "type": "date" },
                        { "id": 427306, "caption": "", "type": "time" },
                        { "id": 427307, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "details": [
                        { "id": 427308, "caption": "", "type": "date" },
                        { "id": 427309, "caption": "", "type": "time" },
                        { "id": 427310, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "details": [
                        { "id": 427311, "caption": "", "type": "date" },
                        { "id": 427312, "caption": "", "type": "time" },
                        { "id": 427313, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 5,
                    "details": [
                        { "id": 427314, "caption": "", "type": "date" },
                        { "id": 427315, "caption": "", "type": "time" },
                        { "id": 427316, "caption": "", "type": "textbox" }
                    ]
                }
            ]

            $scope.listGantiNGT = [
                {
                    "id": 1,
                    "details": [
                        { "id": 427317, "caption": "", "type": "date" },
                        { "id": 427318, "caption": "", "type": "time" },
                        { "id": 427319, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "details": [
                        { "id": 427320, "caption": "", "type": "date" },
                        { "id": 427321, "caption": "", "type": "time" },
                        { "id": 427322, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "details": [
                        { "id": 427323, "caption": "", "type": "date" },
                        { "id": 427324, "caption": "", "type": "time" },
                        { "id": 427325, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "details": [
                        { "id": 427326, "caption": "", "type": "date" },
                        { "id": 427327, "caption": "", "type": "time" },
                        { "id": 427328, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 5,
                    "details": [
                        { "id": 427329, "caption": "", "type": "date" },
                        { "id": 427330, "caption": "", "type": "time" },
                        { "id": 427331, "caption": "", "type": "textbox" }
                    ]
                }
            ]

            $scope.listTabelTerakhir = [
                {
                    "id": 1,
                    "namaexternal": "Diet",
                    "details": [
                        { "id": 427332, "caption": "", "type": "textbox" },
                        { "id": 427333, "caption": "", "type": "textbox" },
                        { "id": 427334, "caption": "", "type": "textbox" },
                        { "id": 427335, "caption": "", "type": "textbox" },
                        { "id": 427336, "caption": "", "type": "textbox" },
                        { "id": 427337, "caption": "", "type": "textbox" },
                        { "id": 427338, "caption": "", "type": "textbox" },
                        { "id": 427339, "caption": "", "type": "textbox" },
                        { "id": 427340, "caption": "", "type": "textbox" },
                        { "id": 427341, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "namaexternal": "Berat Badan",
                    "details": [
                        { "id": 427342, "caption": "", "type": "textbox" },
                        { "id": 427343, "caption": "", "type": "textbox" },
                        { "id": 427344, "caption": "", "type": "textbox" },
                        { "id": 427345, "caption": "", "type": "textbox" },
                        { "id": 427346, "caption": "", "type": "textbox" },
                        { "id": 427347, "caption": "", "type": "textbox" },
                        { "id": 427348, "caption": "", "type": "textbox" },
                        { "id": 427349, "caption": "", "type": "textbox" },
                        { "id": 427350, "caption": "", "type": "textbox" },
                        { "id": 427351, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "namaexternal": "Tindakan khusus",
                    "details": [
                        { "id": 427352, "caption": "", "type": "textbox" },
                        { "id": 427353, "caption": "", "type": "textbox" },
                        { "id": 427354, "caption": "", "type": "textbox" },
                        { "id": 427355, "caption": "", "type": "textbox" },
                        { "id": 427356, "caption": "", "type": "textbox" },
                        { "id": 427357, "caption": "", "type": "textbox" },
                        { "id": 427358, "caption": "", "type": "textbox" },
                        { "id": 427359, "caption": "", "type": "textbox" },
                        { "id": 427360, "caption": "", "type": "textbox" },
                        { "id": 427361, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "namaexternal": "Sputum",
                    "details": [
                        { "id": 427362, "caption": "", "type": "textbox" },
                        { "id": 427363, "caption": "", "type": "textbox" },
                        { "id": 427364, "caption": "", "type": "textbox" },
                        { "id": 427365, "caption": "", "type": "textbox" },
                        { "id": 427366, "caption": "", "type": "textbox" },
                        { "id": 427367, "caption": "", "type": "textbox" },
                        { "id": 427368, "caption": "", "type": "textbox" },
                        { "id": 427369, "caption": "", "type": "textbox" },
                        { "id": 427370, "caption": "", "type": "textbox" },
                        { "id": 427371, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 5,
                    "namaexternal": "Sputum",
                    "details": [
                        { "id": 427372, "caption": "", "type": "textbox" },
                        { "id": 427373, "caption": "", "type": "textbox" },
                        { "id": 427374, "caption": "", "type": "textbox" },
                        { "id": 427375, "caption": "", "type": "textbox" },
                        { "id": 427376, "caption": "", "type": "textbox" },
                        { "id": 427377, "caption": "", "type": "textbox" },
                        { "id": 427378, "caption": "", "type": "textbox" },
                        { "id": 427379, "caption": "", "type": "textbox" },
                        { "id": 427380, "caption": "", "type": "textbox" },
                        { "id": 427381, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 6,
                    "namaexternal": "Sputum",
                    "details": [
                        { "id": 427382, "caption": "", "type": "textbox" },
                        { "id": 427383, "caption": "", "type": "textbox" },
                        { "id": 427384, "caption": "", "type": "textbox" },
                        { "id": 427385, "caption": "", "type": "textbox" },
                        { "id": 427386, "caption": "", "type": "textbox" },
                        { "id": 427387, "caption": "", "type": "textbox" },
                        { "id": 427388, "caption": "", "type": "textbox" },
                        { "id": 427389, "caption": "", "type": "textbox" },
                        { "id": 427390, "caption": "", "type": "textbox" },
                        { "id": 427391, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 7,
                    "namaexternal": "Darah",
                    "details": [
                        { "id": 427392, "caption": "", "type": "textbox" },
                        { "id": 427393, "caption": "", "type": "textbox" },
                        { "id": 427394, "caption": "", "type": "textbox" },
                        { "id": 427395, "caption": "", "type": "textbox" },
                        { "id": 427396, "caption": "", "type": "textbox" },
                        { "id": 427397, "caption": "", "type": "textbox" },
                        { "id": 427398, "caption": "", "type": "textbox" },
                        { "id": 427399, "caption": "", "type": "textbox" },
                        { "id": 427400, "caption": "", "type": "textbox" },
                        { "id": 427401, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 8,
                    "namaexternal": "Darah",
                    "details": [
                        { "id": 427402, "caption": "", "type": "textbox" },
                        { "id": 427403, "caption": "", "type": "textbox" },
                        { "id": 427404, "caption": "", "type": "textbox" },
                        { "id": 427405, "caption": "", "type": "textbox" },
                        { "id": 427406, "caption": "", "type": "textbox" },
                        { "id": 427407, "caption": "", "type": "textbox" },
                        { "id": 427408, "caption": "", "type": "textbox" },
                        { "id": 427409, "caption": "", "type": "textbox" },
                        { "id": 427410, "caption": "", "type": "textbox" },
                        { "id": 427411, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 9,
                    "namaexternal": "Darah",
                    "details": [
                        { "id": 427412, "caption": "", "type": "textbox" },
                        { "id": 427413, "caption": "", "type": "textbox" },
                        { "id": 427414, "caption": "", "type": "textbox" },
                        { "id": 427415, "caption": "", "type": "textbox" },
                        { "id": 427416, "caption": "", "type": "textbox" },
                        { "id": 427417, "caption": "", "type": "textbox" },
                        { "id": 427418, "caption": "", "type": "textbox" },
                        { "id": 427419, "caption": "", "type": "textbox" },
                        { "id": 427420, "caption": "", "type": "textbox" },
                        { "id": 427421, "caption": "", "type": "textbox" }
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
                    $scope.item.obj[427150] = new Date(moment(antrianPasien.tglregistrasi).format('YYYY-MM-DD HH:mm'));
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

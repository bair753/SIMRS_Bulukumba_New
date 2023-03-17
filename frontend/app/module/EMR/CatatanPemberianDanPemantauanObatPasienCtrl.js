define(['initialize'], function (initialize) {
    'use strict';
    initialize.controller('CatatanPemberianDanPemantauanObatPasienCtrl', ['$q', '$rootScope', '$scope', 'ModelItem', '$state', 'CacheHelper', 'DateHelper', 'MedifirstService',
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
            $scope.cc.emrfk = 290032;
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

            medifirstService.getPart("emr/get-datacombo-part-obat", true, true, 20).then(function (data) {
                $scope.listObat = data;
            });

            $scope.listWaktuFrekuensi1 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424106, "nama": "", "caption": "" , "type": "textbox" },
                        { "id": 424107, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424108, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424109, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424110, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424111, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424112, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424113, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424114, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424115, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424116, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424117, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424118, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424119, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424120, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi2 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424128, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424129, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424130, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424131, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424132, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424133, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424134, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424135, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424136, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424137, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424138, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424139, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424140, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424141, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424142, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi3 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424150, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424151, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424152, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424153, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424154, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424155, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424156, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424157, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424158, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424159, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424160, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424161, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424162, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424163, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424164, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi4 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424172, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424173, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424174, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424175, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424176, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424177, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424178, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424179, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424180, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424181, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424182, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424183, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424184, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424185, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424186, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi5 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424194, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424195, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424196, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424197, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424198, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424199, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424200, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424201, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424202, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424203, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424204, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424205, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424206, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424207, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424208, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi6 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424216, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424217, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424218, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424219, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424220, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424221, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424222, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424223, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424224, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424225, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424226, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424227, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424228, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424229, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424230, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi7 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424238, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424239, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424240, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424241, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424242, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424243, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424244, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424245, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424246, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424247, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424248, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424249, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424250, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424251, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424252, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi8 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424260, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424261, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424262, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424263, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424264, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424265, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424266, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424267, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424268, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424269, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424270, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424271, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424272, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424273, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424274, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi9 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424282, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424283, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424284, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424285, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424286, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424287, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424288, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424289, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424290, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424291, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424292, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424293, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424294, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424295, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424296, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi10 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424304, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424305, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424306, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424307, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424308, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424309, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424310, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424311, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424312, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424313, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424314, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424315, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424316, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424317, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424318, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi11 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424326, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424327, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424328, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424329, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424330, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424331, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424332, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424333, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424334, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424335, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424336, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424337, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424338, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424339, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424340, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi12 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424348, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424349, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424350, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424351, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424352, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424353, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424354, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424355, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424356, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424357, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424358, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424359, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424360, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424361, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424362, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi13 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424370, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424371, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424372, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424373, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424374, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424375, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424376, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424377, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424378, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424379, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424380, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424381, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424382, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424383, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424384, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi14 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424392, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424393, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424394, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424395, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424396, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424397, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424398, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424399, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424400, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424401, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424402, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424403, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424404, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424405, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424406, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi15 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424414, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424415, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424416, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424417, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424418, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424419, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424420, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424421, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424422, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424423, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424424, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424425, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424426, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424427, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424428, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi16 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424436, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424437, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424438, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424439, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424440, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424441, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424442, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424443, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424444, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424445, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424446, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424447, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424448, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424449, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424450, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi17 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424458, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424459, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424460, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424461, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424462, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424463, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424464, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424465, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424466, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424467, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424468, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424469, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424470, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424471, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424472, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi18 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424480, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424481, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424482, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424483, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424484, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424485, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424486, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424487, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424488, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424489, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424490, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424491, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424492, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424493, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424494, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi19 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424502, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424503, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424504, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424505, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424506, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424507, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424508, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424509, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424510, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424511, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424512, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424513, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424514, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424515, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424516, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi20 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424524, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424525, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424526, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424527, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424528, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424529, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424530, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424531, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424532, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424533, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424534, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424535, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424536, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424537, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424538, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi21 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424546, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424547, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424548, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424549, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424550, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424551, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424552, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424553, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424554, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424555, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424556, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424557, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424558, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424559, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424560, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi22 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424568, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424569, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424570, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424571, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424572, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424573, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424574, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424575, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424576, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424577, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424578, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424579, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424580, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424581, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424582, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi23 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424590, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424591, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424592, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424593, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424594, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424595, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424596, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424597, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424598, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424599, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424600, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424601, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424602, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424603, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424604, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi24 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424612, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424613, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424614, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424615, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424616, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424617, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424618, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424619, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424620, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424621, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424622, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424623, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424624, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424625, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424626, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi25 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424634, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424635, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424636, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424637, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424638, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424639, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424640, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424641, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424642, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424643, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424644, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424645, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424646, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424647, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424648, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi26 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424656, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424657, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424658, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424659, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424660, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424661, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424662, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424663, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424664, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424665, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424666, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424667, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424668, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424669, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424670, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi27 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424678, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424679, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424680, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424681, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424682, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424683, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424684, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424685, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424686, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424687, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424688, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424689, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424690, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424691, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424692, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi28 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424700, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424701, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424702, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424703, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424704, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424705, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424706, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424707, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424708, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424709, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424710, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424711, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424712, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424713, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424714, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi29 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424722, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424723, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424724, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424725, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424726, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424727, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424728, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424729, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424730, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424731, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424732, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424733, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424734, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424735, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424736, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi30 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424744, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424745, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424746, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424747, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424748, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424749, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424750, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424751, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424752, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424753, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424754, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424755, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424756, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424757, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424758, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi31 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424766, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424767, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424768, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424769, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424770, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424771, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424772, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424773, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424774, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424775, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424776, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424777, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424778, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424779, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424780, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi32 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424788, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424789, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424790, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424791, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424792, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424793, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424794, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424795, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424796, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424797, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424798, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424799, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424800, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424801, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424802, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi33 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424810, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424811, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424812, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424813, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424814, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424815, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424816, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424817, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424818, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424819, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424820, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424821, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424822, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424823, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424824, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi34 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424832, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424833, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424834, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424835, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424836, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424837, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424838, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424839, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424840, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424841, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424842, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424843, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424844, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424845, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424846, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi35 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424854, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424855, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424856, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424857, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424858, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424859, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424860, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424861, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424862, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424863, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424864, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424865, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424866, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424867, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424868, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi36 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424876, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424877, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424878, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424879, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424880, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424881, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424882, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424883, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424884, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424885, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424886, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424887, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424888, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424889, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424890, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi37 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424898, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424899, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424900, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424901, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424902, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424903, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424904, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424905, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424906, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424907, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424908, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424909, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424910, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424911, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424912, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listWaktuFrekuensi38 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 424920, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424921, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424922, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424923, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424924, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 424925, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424926, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424927, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424928, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424929, "nama": "M", "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 424930, "nama": "", "caption": "", "type": "textbox" },
                        { "id": 424931, "nama": "P", "caption": "", "type": "checkbox" },
                        { "id": 424932, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424933, "nama": "S", "caption": "", "type": "checkbox" },
                        { "id": 424934, "nama": "M", "caption": "", "type": "checkbox" }
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
                // $scope.item.obj[422900] = $scope.now;
                medifirstService.get("emr/get-antrian-pasien-norec/" + noregistrasifk).then(function (e) {
                    var antrianPasien = e.data.result;
                    // $scope.item.obj[421300] = new Date(moment(antrianPasien.tglregistrasi).format('YYYY-MM-DD HH:mm'));
                    if (antrianPasien.objectruanganfk != null && antrianPasien.namaruangan != null) {
                        $scope.item.obj[424100] = {
                            value: antrianPasien.objectruanganfk,
                            text: antrianPasien.namaruangan
                        }
                    }
                    // if (antrianPasien.iddpjp != null && antrianPasien.dokterdpjp != null) {
                    //     $scope.item.obj[421371] = {
                    //         value: antrianPasien.iddpjp,
                    //         text: antrianPasien.dokterdpjp
                    //     }
                    // }
                })
                
                // medifirstService.get("emr/get-vital-sign?noregistrasi=" + $scope.cc.noregistrasi + "&objectidawal=4241&objectidakhir=4246&idemr=147", true).then(function (datas) {
                //     if (datas.data.data.length>0){
                //         $scope.item.obj[421302] = datas.data.data[1].value; // Tekanan Darah
                //         $scope.item.obj[421303] = datas.data.data[5].value; // Nadi
                //         $scope.item.obj[421304] = datas.data.data[4].value; // Suhu
                //         $scope.item.obj[421305] = datas.data.data[6].value; // Napas
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
                $scope.cc.index = $state.params.index

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

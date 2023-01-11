define(['initialize'], function (initialize) {
    'use strict';
    initialize.controller('GrafikTandaVital6Ctrl', ['$q', '$rootScope', '$scope', 'ModelItem', '$state', 'CacheHelper', 'DateHelper', 'MedifirstService',
        function ($q, $rootScope, $scope, ModelItem, $state, cacheHelper, dateHelper, medifirstService) {


            $scope.noCM = $state.params.noCM;
            $scope.tombolSimpanVis = true
            $scope.noRecPap = cacheHelper.get('noRecPap');
            $scope.totalSkor = 0
            $scope.totalSkor2 = 0
            $scope.cc = {}
            var nomorEMR = '-'
            $scope.cc.emrfk = 290038
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
                { "id": 426551 },
                { "id": 426552 }
            ]

            $scope.listData1 = [
                { 
                    "id": 1,
                    "namaexternal": "Suhu",
                    "details": [
                        { "id": 426553, "caption": "", "type": "textbox" },
                        { "id": 426554, "caption": "", "type": "textbox" },
                        { "id": 426555, "caption": "", "type": "textbox" },
                        { "id": 426556, "caption": "", "type": "textbox" },
                        { "id": 426557, "caption": "", "type": "textbox" },
                        { "id": 426558, "caption": "", "type": "textbox" },
                        { "id": 426559, "caption": "", "type": "textbox" },
                        { "id": 426560, "caption": "", "type": "textbox" },
                        // { "id": 425011, "caption": "", "type": "textbox" },
                        // { "id": 425012, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "namaexternal": "Nadi",
                    "details": [
                        { "id": 426561, "caption": "", "type": "textbox" },
                        { "id": 426562, "caption": "", "type": "textbox" },
                        { "id": 426563, "caption": "", "type": "textbox" },
                        { "id": 426564, "caption": "", "type": "textbox" },
                        { "id": 426565, "caption": "", "type": "textbox" },
                        { "id": 426566, "caption": "", "type": "textbox" },
                        { "id": 426567, "caption": "", "type": "textbox" },
                        { "id": 426568, "caption": "", "type": "textbox" },
                        // { "id": 425021, "caption": "", "type": "textbox" },
                        // { "id": 425022, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "namaexternal": "Pernafasan",
                    "details": [
                        { "id": 426569, "caption": "", "type": "textbox" },
                        { "id": 426570, "caption": "", "type": "textbox" },
                        { "id": 426571, "caption": "", "type": "textbox" },
                        { "id": 426572, "caption": "", "type": "textbox" },
                        { "id": 426573, "caption": "", "type": "textbox" },
                        { "id": 426574, "caption": "", "type": "textbox" },
                        { "id": 426575, "caption": "", "type": "textbox" },
                        { "id": 426576, "caption": "", "type": "textbox" },
                        // { "id": 425031, "caption": "", "type": "textbox" },
                        // { "id": 425032, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "namaexternal": "Tekanan Darah",
                    "details": [
                        { "id": 426577, "caption": "", "type": "textbox" },
                        { "id": 426578, "caption": "", "type": "textbox" },
                        { "id": 426579, "caption": "", "type": "textbox" },
                        { "id": 426580, "caption": "", "type": "textbox" },
                        { "id": 426581, "caption": "", "type": "textbox" },
                        { "id": 426582, "caption": "", "type": "textbox" },
                        { "id": 426583, "caption": "", "type": "textbox" },
                        { "id": 426584, "caption": "", "type": "textbox" },
                        // { "id": 425041, "caption": "", "type": "textbox" },
                        // { "id": 425042, "caption": "", "type": "textbox" }
                    ]
                }
            ]

            $scope.listTanggal2 = [
                { "id": 426585 },
                { "id": 426586 }
            ]

            $scope.listData2 = [
                {
                    "id": 1,
                    "namaexternal": "Suhu",
                    "details": [
                        { "id": 426587, "caption": "", "type": "textbox" },
                        { "id": 426588, "caption": "", "type": "textbox" },
                        { "id": 426589, "caption": "", "type": "textbox" },
                        { "id": 426590, "caption": "", "type": "textbox" },
                        { "id": 426591, "caption": "", "type": "textbox" },
                        { "id": 426592, "caption": "", "type": "textbox" },
                        { "id": 426593, "caption": "", "type": "textbox" },
                        { "id": 426594, "caption": "", "type": "textbox" },
                        // { "id": 425053, "caption": "", "type": "textbox" },
                        // { "id": 425054, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "namaexternal": "Nadi",
                    "details": [
                        { "id": 426595, "caption": "", "type": "textbox" },
                        { "id": 426596, "caption": "", "type": "textbox" },
                        { "id": 426597, "caption": "", "type": "textbox" },
                        { "id": 426598, "caption": "", "type": "textbox" },
                        { "id": 426599, "caption": "", "type": "textbox" },
                        { "id": 426600, "caption": "", "type": "textbox" },
                        { "id": 426601, "caption": "", "type": "textbox" },
                        { "id": 426602, "caption": "", "type": "textbox" },
                        // { "id": 425063, "caption": "", "type": "textbox" },
                        // { "id": 425064, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "namaexternal": "Pernafasan",
                    "details": [
                        { "id": 426603, "caption": "", "type": "textbox" },
                        { "id": 426604, "caption": "", "type": "textbox" },
                        { "id": 426605, "caption": "", "type": "textbox" },
                        { "id": 426606, "caption": "", "type": "textbox" },
                        { "id": 426607, "caption": "", "type": "textbox" },
                        { "id": 426608, "caption": "", "type": "textbox" },
                        { "id": 426609, "caption": "", "type": "textbox" },
                        { "id": 426610, "caption": "", "type": "textbox" },
                        // { "id": 425073, "caption": "", "type": "textbox" },
                        // { "id": 425074, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "namaexternal": "Tekanan Darah",
                    "details": [
                        { "id": 426611, "caption": "", "type": "textbox" },
                        { "id": 426612, "caption": "", "type": "textbox" },
                        { "id": 426613, "caption": "", "type": "textbox" },
                        { "id": 426614, "caption": "", "type": "textbox" },
                        { "id": 426615, "caption": "", "type": "textbox" },
                        { "id": 426616, "caption": "", "type": "textbox" },
                        { "id": 426617, "caption": "", "type": "textbox" },
                        { "id": 426618, "caption": "", "type": "textbox" },
                        // { "id": 425083, "caption": "", "type": "textbox" },
                        // { "id": 425084, "caption": "", "type": "textbox" }
                    ]
                }
            ]

            $scope.listTanggal3 = [
                { "id": 426619 },
                { "id": 426620 }
            ]

            $scope.listData3 = [
                {
                    "id": 1,
                    "namaexternal": "Suhu",
                    "details": [
                        { "id": 426621, "caption": "", "type": "textbox" },
                        { "id": 426622, "caption": "", "type": "textbox" },
                        { "id": 426623, "caption": "", "type": "textbox" },
                        { "id": 426624, "caption": "", "type": "textbox" },
                        { "id": 426625, "caption": "", "type": "textbox" },
                        { "id": 426626, "caption": "", "type": "textbox" },
                        { "id": 426627, "caption": "", "type": "textbox" },
                        { "id": 426628, "caption": "", "type": "textbox" },
                        // { "id": 425095, "caption": "", "type": "textbox" },
                        // { "id": 425096, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "namaexternal": "Nadi",
                    "details": [
                        { "id": 426629, "caption": "", "type": "textbox" },
                        { "id": 426630, "caption": "", "type": "textbox" },
                        { "id": 426631, "caption": "", "type": "textbox" },
                        { "id": 426632, "caption": "", "type": "textbox" },
                        { "id": 426633, "caption": "", "type": "textbox" },
                        { "id": 426634, "caption": "", "type": "textbox" },
                        { "id": 426635, "caption": "", "type": "textbox" },
                        { "id": 426636, "caption": "", "type": "textbox" },
                        // { "id": 425105, "caption": "", "type": "textbox" },
                        // { "id": 425106, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "namaexternal": "Pernafasan",
                    "details": [
                        { "id": 426637, "caption": "", "type": "textbox" },
                        { "id": 426638, "caption": "", "type": "textbox" },
                        { "id": 426639, "caption": "", "type": "textbox" },
                        { "id": 426640, "caption": "", "type": "textbox" },
                        { "id": 426641, "caption": "", "type": "textbox" },
                        { "id": 426642, "caption": "", "type": "textbox" },
                        { "id": 426643, "caption": "", "type": "textbox" },
                        { "id": 426644, "caption": "", "type": "textbox" },
                        // { "id": 425115, "caption": "", "type": "textbox" },
                        // { "id": 425116, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "namaexternal": "Tekanan Darah",
                    "details": [
                        { "id": 426645, "caption": "", "type": "textbox" },
                        { "id": 426646, "caption": "", "type": "textbox" },
                        { "id": 426647, "caption": "", "type": "textbox" },
                        { "id": 426648, "caption": "", "type": "textbox" },
                        { "id": 426649, "caption": "", "type": "textbox" },
                        { "id": 426650, "caption": "", "type": "textbox" },
                        { "id": 426651, "caption": "", "type": "textbox" },
                        { "id": 426652, "caption": "", "type": "textbox" },
                        // { "id": 425125, "caption": "", "type": "textbox" },
                        // { "id": 425126, "caption": "", "type": "textbox" }
                    ]
                }
            ]

            $scope.listTanggal4 = [
                { "id": 426653 },
                { "id": 426654 }
            ]

            $scope.listData4 = [
                {
                    "id": 1,
                    "namaexternal": "Suhu",
                    "details": [
                        { "id": 426655, "caption": "", "type": "textbox" },
                        { "id": 426656, "caption": "", "type": "textbox" },
                        { "id": 426657, "caption": "", "type": "textbox" },
                        { "id": 426658, "caption": "", "type": "textbox" },
                        { "id": 426659, "caption": "", "type": "textbox" },
                        { "id": 426660, "caption": "", "type": "textbox" },
                        { "id": 426661, "caption": "", "type": "textbox" },
                        { "id": 426662, "caption": "", "type": "textbox" },
                        // { "id": 425137, "caption": "", "type": "textbox" },
                        // { "id": 425138, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "namaexternal": "Nadi",
                    "details": [
                        { "id": 426663, "caption": "", "type": "textbox" },
                        { "id": 426664, "caption": "", "type": "textbox" },
                        { "id": 426665, "caption": "", "type": "textbox" },
                        { "id": 426666, "caption": "", "type": "textbox" },
                        { "id": 426667, "caption": "", "type": "textbox" },
                        { "id": 426668, "caption": "", "type": "textbox" },
                        { "id": 426669, "caption": "", "type": "textbox" },
                        { "id": 426670, "caption": "", "type": "textbox" },
                        // { "id": 425148, "caption": "", "type": "textbox" },
                        // { "id": 425149, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "namaexternal": "Pernafasan",
                    "details": [
                        { "id": 426671, "caption": "", "type": "textbox" },
                        { "id": 426672, "caption": "", "type": "textbox" },
                        { "id": 426673, "caption": "", "type": "textbox" },
                        { "id": 426674, "caption": "", "type": "textbox" },
                        { "id": 426675, "caption": "", "type": "textbox" },
                        { "id": 426676, "caption": "", "type": "textbox" },
                        { "id": 426677, "caption": "", "type": "textbox" },
                        { "id": 426678, "caption": "", "type": "textbox" },
                        // { "id": 425158, "caption": "", "type": "textbox" },
                        // { "id": 425159, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "namaexternal": "Tekanan Darah",
                    "details": [
                        { "id": 426679, "caption": "", "type": "textbox" },
                        { "id": 426680, "caption": "", "type": "textbox" },
                        { "id": 426681, "caption": "", "type": "textbox" },
                        { "id": 426682, "caption": "", "type": "textbox" },
                        { "id": 426683, "caption": "", "type": "textbox" },
                        { "id": 426684, "caption": "", "type": "textbox" },
                        { "id": 426685, "caption": "", "type": "textbox" },
                        { "id": 426686, "caption": "", "type": "textbox" },
                        // { "id": 425168, "caption": "", "type": "textbox" },
                        // { "id": 425169, "caption": "", "type": "textbox" }
                    ]
                }
            ]

            $scope.listGantiSetInfus = [
                {
                    "id": 1,
                    "details": [
                        { "id": 426687, "caption": "", "type": "date" },
                        { "id": 426688, "caption": "", "type": "time" },
                        { "id": 426689, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "details": [
                        { "id": 426690, "caption": "", "type": "date" },
                        { "id": 426691, "caption": "", "type": "time" },
                        { "id": 426692, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "details": [
                        { "id": 426693, "caption": "", "type": "date" },
                        { "id": 426694, "caption": "", "type": "time" },
                        { "id": 426695, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "details": [
                        { "id": 426696, "caption": "", "type": "date" },
                        { "id": 426697, "caption": "", "type": "time" },
                        { "id": 426698, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 5,
                    "details": [
                        { "id": 426699, "caption": "", "type": "date" },
                        { "id": 426700, "caption": "", "type": "time" },
                        { "id": 426701, "caption": "", "type": "textbox" }
                    ]
                }
            ]

            $scope.listGantiKateter = [
                {
                    "id": 1,
                    "details": [
                        { "id": 426702, "caption": "", "type": "date" },
                        { "id": 426703, "caption": "", "type": "time" },
                        { "id": 426704, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "details": [
                        { "id": 426705, "caption": "", "type": "date" },
                        { "id": 426706, "caption": "", "type": "time" },
                        { "id": 426707, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "details": [
                        { "id": 426708, "caption": "", "type": "date" },
                        { "id": 426709, "caption": "", "type": "time" },
                        { "id": 426710, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "details": [
                        { "id": 426711, "caption": "", "type": "date" },
                        { "id": 426712, "caption": "", "type": "time" },
                        { "id": 426713, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 5,
                    "details": [
                        { "id": 426714, "caption": "", "type": "date" },
                        { "id": 426715, "caption": "", "type": "time" },
                        { "id": 426716, "caption": "", "type": "textbox" }
                    ]
                }
            ]

            $scope.listGantiNGT = [
                {
                    "id": 1,
                    "details": [
                        { "id": 426717, "caption": "", "type": "date" },
                        { "id": 426718, "caption": "", "type": "time" },
                        { "id": 426719, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "details": [
                        { "id": 426720, "caption": "", "type": "date" },
                        { "id": 426721, "caption": "", "type": "time" },
                        { "id": 426722, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "details": [
                        { "id": 426723, "caption": "", "type": "date" },
                        { "id": 426724, "caption": "", "type": "time" },
                        { "id": 426725, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "details": [
                        { "id": 426726, "caption": "", "type": "date" },
                        { "id": 426727, "caption": "", "type": "time" },
                        { "id": 426728, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 5,
                    "details": [
                        { "id": 426729, "caption": "", "type": "date" },
                        { "id": 426730, "caption": "", "type": "time" },
                        { "id": 426731, "caption": "", "type": "textbox" }
                    ]
                }
            ]

            $scope.listTabelTerakhir = [
                {
                    "id": 1,
                    "namaexternal": "Diet",
                    "details": [
                        { "id": 426732, "caption": "", "type": "textbox" },
                        { "id": 426733, "caption": "", "type": "textbox" },
                        { "id": 426734, "caption": "", "type": "textbox" },
                        { "id": 426735, "caption": "", "type": "textbox" },
                        { "id": 426736, "caption": "", "type": "textbox" },
                        { "id": 426737, "caption": "", "type": "textbox" },
                        { "id": 426738, "caption": "", "type": "textbox" },
                        { "id": 426739, "caption": "", "type": "textbox" },
                        { "id": 426740, "caption": "", "type": "textbox" },
                        { "id": 426741, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 2,
                    "namaexternal": "Berat Badan",
                    "details": [
                        { "id": 426742, "caption": "", "type": "textbox" },
                        { "id": 426743, "caption": "", "type": "textbox" },
                        { "id": 426744, "caption": "", "type": "textbox" },
                        { "id": 426745, "caption": "", "type": "textbox" },
                        { "id": 426746, "caption": "", "type": "textbox" },
                        { "id": 426747, "caption": "", "type": "textbox" },
                        { "id": 426748, "caption": "", "type": "textbox" },
                        { "id": 426749, "caption": "", "type": "textbox" },
                        { "id": 426750, "caption": "", "type": "textbox" },
                        { "id": 426751, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 3,
                    "namaexternal": "Tindakan khusus",
                    "details": [
                        { "id": 426752, "caption": "", "type": "textbox" },
                        { "id": 426753, "caption": "", "type": "textbox" },
                        { "id": 426754, "caption": "", "type": "textbox" },
                        { "id": 426755, "caption": "", "type": "textbox" },
                        { "id": 426756, "caption": "", "type": "textbox" },
                        { "id": 426757, "caption": "", "type": "textbox" },
                        { "id": 426758, "caption": "", "type": "textbox" },
                        { "id": 426759, "caption": "", "type": "textbox" },
                        { "id": 426760, "caption": "", "type": "textbox" },
                        { "id": 426761, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 4,
                    "namaexternal": "Sputum",
                    "details": [
                        { "id": 426762, "caption": "", "type": "textbox" },
                        { "id": 426763, "caption": "", "type": "textbox" },
                        { "id": 426764, "caption": "", "type": "textbox" },
                        { "id": 426765, "caption": "", "type": "textbox" },
                        { "id": 426766, "caption": "", "type": "textbox" },
                        { "id": 426767, "caption": "", "type": "textbox" },
                        { "id": 426768, "caption": "", "type": "textbox" },
                        { "id": 426769, "caption": "", "type": "textbox" },
                        { "id": 426770, "caption": "", "type": "textbox" },
                        { "id": 426771, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 5,
                    "namaexternal": "Sputum",
                    "details": [
                        { "id": 426772, "caption": "", "type": "textbox" },
                        { "id": 426773, "caption": "", "type": "textbox" },
                        { "id": 426774, "caption": "", "type": "textbox" },
                        { "id": 426775, "caption": "", "type": "textbox" },
                        { "id": 426776, "caption": "", "type": "textbox" },
                        { "id": 426777, "caption": "", "type": "textbox" },
                        { "id": 426778, "caption": "", "type": "textbox" },
                        { "id": 426779, "caption": "", "type": "textbox" },
                        { "id": 426780, "caption": "", "type": "textbox" },
                        { "id": 426781, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 6,
                    "namaexternal": "Sputum",
                    "details": [
                        { "id": 426782, "caption": "", "type": "textbox" },
                        { "id": 426783, "caption": "", "type": "textbox" },
                        { "id": 426784, "caption": "", "type": "textbox" },
                        { "id": 426785, "caption": "", "type": "textbox" },
                        { "id": 426786, "caption": "", "type": "textbox" },
                        { "id": 426787, "caption": "", "type": "textbox" },
                        { "id": 426788, "caption": "", "type": "textbox" },
                        { "id": 426789, "caption": "", "type": "textbox" },
                        { "id": 426790, "caption": "", "type": "textbox" },
                        { "id": 426791, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 7,
                    "namaexternal": "Darah",
                    "details": [
                        { "id": 426792, "caption": "", "type": "textbox" },
                        { "id": 426793, "caption": "", "type": "textbox" },
                        { "id": 426794, "caption": "", "type": "textbox" },
                        { "id": 426795, "caption": "", "type": "textbox" },
                        { "id": 426796, "caption": "", "type": "textbox" },
                        { "id": 426797, "caption": "", "type": "textbox" },
                        { "id": 426798, "caption": "", "type": "textbox" },
                        { "id": 426799, "caption": "", "type": "textbox" },
                        { "id": 426800, "caption": "", "type": "textbox" },
                        { "id": 426801, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 8,
                    "namaexternal": "Darah",
                    "details": [
                        { "id": 426802, "caption": "", "type": "textbox" },
                        { "id": 426803, "caption": "", "type": "textbox" },
                        { "id": 426804, "caption": "", "type": "textbox" },
                        { "id": 426805, "caption": "", "type": "textbox" },
                        { "id": 426806, "caption": "", "type": "textbox" },
                        { "id": 426807, "caption": "", "type": "textbox" },
                        { "id": 426808, "caption": "", "type": "textbox" },
                        { "id": 426809, "caption": "", "type": "textbox" },
                        { "id": 426810, "caption": "", "type": "textbox" },
                        { "id": 426811, "caption": "", "type": "textbox" }
                    ]
                },
                {
                    "id": 9,
                    "namaexternal": "Darah",
                    "details": [
                        { "id": 426812, "caption": "", "type": "textbox" },
                        { "id": 426813, "caption": "", "type": "textbox" },
                        { "id": 426814, "caption": "", "type": "textbox" },
                        { "id": 426815, "caption": "", "type": "textbox" },
                        { "id": 426816, "caption": "", "type": "textbox" },
                        { "id": 426817, "caption": "", "type": "textbox" },
                        { "id": 426818, "caption": "", "type": "textbox" },
                        { "id": 426819, "caption": "", "type": "textbox" },
                        { "id": 426820, "caption": "", "type": "textbox" },
                        { "id": 426821, "caption": "", "type": "textbox" }
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
                    $scope.item.obj[426550] = new Date(moment(antrianPasien.tglregistrasi).format('YYYY-MM-DD HH:mm'));
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

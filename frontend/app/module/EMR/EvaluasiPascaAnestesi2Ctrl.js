define(['initialize', 'Configuration'], function (initialize, config) {
    'use strict';
    initialize.controller('EvaluasiPascaAnestesi2Ctrl', ['$q', '$rootScope', '$scope', 'ModelItem', '$state', 'CacheHelper', 'DateHelper', 'MedifirstService',
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
            $scope.cc.emrfk = 290195;
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

            medifirstService.getPart('emr/get-asisten-operasi', true, true, 20).then(function (data) {
                $scope.listAsisten = data
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

            $scope.listTanggal = [
                { "id": 32117538 },
                { "id": 32117539 },
                { "id": 32117540 },
                { "id": 32117541 },
                { "id": 32117542 },
                { "id": 32117543 },
                { "id": 32117544 },
                { "id": 32117545 },
                { "id": 32117546 },
                { "id": 32117547 },
                { "id": 32117548 },
                { "id": 32117549 },
                
                
            ]

            $scope.listData1 = [
                { 
                    "id": 1,
                    "namaexternal": "Nadi",
                    "details": [
                        { "id": 32117550, "caption": "", "type": "textbox" },
                        { "id": 32117551, "caption": "", "type": "textbox" },
                        { "id": 32117552, "caption": "", "type": "textbox" },
                        { "id": 32117553, "caption": "", "type": "textbox" },
                        { "id": 32117554, "caption": "", "type": "textbox" },
                        { "id": 32117555, "caption": "", "type": "textbox" },
                        { "id": 32117556, "caption": "", "type": "textbox" },
                        { "id": 32117557, "caption": "", "type": "textbox" },
                        { "id": 32117558, "caption": "", "type": "textbox" },
                        { "id": 32117559, "caption": "", "type": "textbox" },
                        { "id": 32117560, "caption": "", "type": "textbox" },
                        { "id": 32117561, "caption": "", "type": "textbox" },
                        { "id": 32117562, "caption": "", "type": "textbox" },
                        { "id": 32117563, "caption": "", "type": "textbox" },
                        { "id": 32117564, "caption": "", "type": "textbox" },
                        { "id": 32117565, "caption": "", "type": "textbox" },
                        { "id": 32117566, "caption": "", "type": "textbox" },
                        { "id": 32117567, "caption": "", "type": "textbox" },
                        { "id": 32117568, "caption": "", "type": "textbox" },
                        { "id": 32117569, "caption": "", "type": "textbox" },
                        { "id": 32117570, "caption": "", "type": "textbox" },
                        { "id": 32117571, "caption": "", "type": "textbox" },
                        { "id": 32117572, "caption": "", "type": "textbox" },
                        { "id": 32117573, "caption": "", "type": "textbox" },
                        { "id": 32117574, "caption": "", "type": "textbox" },
                        { "id": 32117575, "caption": "", "type": "textbox" },
                        { "id": 32117576, "caption": "", "type": "textbox" },
                        { "id": 32117577, "caption": "", "type": "textbox" },
                        { "id": 32117578, "caption": "", "type": "textbox" },
                        { "id": 32117579, "caption": "", "type": "textbox" },
                        { "id": 32117580, "caption": "", "type": "textbox" },
                        { "id": 32117581, "caption": "", "type": "textbox" },
                        { "id": 32117582, "caption": "", "type": "textbox" },
                        { "id": 32117583, "caption": "", "type": "textbox" },
                        { "id": 32117584, "caption": "", "type": "textbox" },
                        { "id": 32117585, "caption": "", "type": "textbox" },
                    ]
                },
                {
                    "id": 2,
                    "namaexternal": "Sistolik",
                    "details": [
                        { "id": 32117590, "caption": "", "type": "textbox" },
                        { "id": 32117591, "caption": "", "type": "textbox" },
                        { "id": 32117592, "caption": "", "type": "textbox" },
                        { "id": 32117593, "caption": "", "type": "textbox" },
                        { "id": 32117594, "caption": "", "type": "textbox" },
                        { "id": 32117595, "caption": "", "type": "textbox" },
                        { "id": 32117596, "caption": "", "type": "textbox" },
                        { "id": 32117597, "caption": "", "type": "textbox" },
                        { "id": 32117598, "caption": "", "type": "textbox" },
                        { "id": 32117599, "caption": "", "type": "textbox" },
                        { "id": 32117600, "caption": "", "type": "textbox" },
                        { "id": 32117601, "caption": "", "type": "textbox" },
                        { "id": 32117602, "caption": "", "type": "textbox" },
                        { "id": 32117603, "caption": "", "type": "textbox" },
                        { "id": 32117604, "caption": "", "type": "textbox" },
                        { "id": 32117605, "caption": "", "type": "textbox" },
                        { "id": 32117606, "caption": "", "type": "textbox" },
                        { "id": 32117607, "caption": "", "type": "textbox" },
                        { "id": 32117608, "caption": "", "type": "textbox" },
                        { "id": 32117609, "caption": "", "type": "textbox" },
                        { "id": 32117610, "caption": "", "type": "textbox" },
                        { "id": 32117611, "caption": "", "type": "textbox" },
                        { "id": 32117612, "caption": "", "type": "textbox" },
                        { "id": 32117613, "caption": "", "type": "textbox" },
                        { "id": 32117614, "caption": "", "type": "textbox" },
                        { "id": 32117615, "caption": "", "type": "textbox" },
                        { "id": 32117616, "caption": "", "type": "textbox" },
                        { "id": 32117617, "caption": "", "type": "textbox" },
                        { "id": 32117618, "caption": "", "type": "textbox" },
                        { "id": 32117619, "caption": "", "type": "textbox" },
                        { "id": 32117620, "caption": "", "type": "textbox" },
                        { "id": 32117621, "caption": "", "type": "textbox" },
                        { "id": 32117622, "caption": "", "type": "textbox" },
                        { "id": 32117623, "caption": "", "type": "textbox" },
                        { "id": 32117624, "caption": "", "type": "textbox" },
                        { "id": 32117625, "caption": "", "type": "textbox" },
                    ]
                },
                {
                    "id": 3,
                    "namaexternal": "Distolik",
                    "details": [
                        { "id": 32117630, "caption": "", "type": "textbox" },
                        { "id": 32117631, "caption": "", "type": "textbox" },
                        { "id": 32117632, "caption": "", "type": "textbox" },
                        { "id": 32117633, "caption": "", "type": "textbox" },
                        { "id": 32117634, "caption": "", "type": "textbox" },
                        { "id": 32117635, "caption": "", "type": "textbox" },
                        { "id": 32117636, "caption": "", "type": "textbox" },
                        { "id": 32117637, "caption": "", "type": "textbox" },
                        { "id": 32117638, "caption": "", "type": "textbox" },
                        { "id": 32117639, "caption": "", "type": "textbox" },
                        { "id": 32117640, "caption": "", "type": "textbox" },
                        { "id": 32117641, "caption": "", "type": "textbox" },
                        { "id": 32117642, "caption": "", "type": "textbox" },
                        { "id": 32117643, "caption": "", "type": "textbox" },
                        { "id": 32117644, "caption": "", "type": "textbox" },
                        { "id": 32117645, "caption": "", "type": "textbox" },
                        { "id": 32117646, "caption": "", "type": "textbox" },
                        { "id": 32117647, "caption": "", "type": "textbox" },
                        { "id": 32117648, "caption": "", "type": "textbox" },
                        { "id": 32117649, "caption": "", "type": "textbox" },
                        { "id": 32117650, "caption": "", "type": "textbox" },
                        { "id": 32117651, "caption": "", "type": "textbox" },
                        { "id": 32117652, "caption": "", "type": "textbox" },
                        { "id": 32117653, "caption": "", "type": "textbox" },
                        { "id": 32117654, "caption": "", "type": "textbox" },
                        { "id": 32117655, "caption": "", "type": "textbox" },
                        { "id": 32117656, "caption": "", "type": "textbox" },
                        { "id": 32117657, "caption": "", "type": "textbox" },
                        { "id": 32117658, "caption": "", "type": "textbox" },
                        { "id": 32117659, "caption": "", "type": "textbox" },
                        { "id": 32117660, "caption": "", "type": "textbox" },
                        { "id": 32117661, "caption": "", "type": "textbox" },
                        { "id": 32117662, "caption": "", "type": "textbox" },
                        { "id": 32117663, "caption": "", "type": "textbox" },
                        { "id": 32117664, "caption": "", "type": "textbox" },
                        { "id": 32117665, "caption": "", "type": "textbox" },
                    ]
                },
                {
                    "id": 4,
                    "namaexternal": "R",
                    "details": [
                        { "id": 32117670, "caption": "", "type": "textbox" },
                        { "id": 32117671, "caption": "", "type": "textbox" },
                        { "id": 32117672, "caption": "", "type": "textbox" },
                        { "id": 32117673, "caption": "", "type": "textbox" },
                        { "id": 32117674, "caption": "", "type": "textbox" },
                        { "id": 32117675, "caption": "", "type": "textbox" },
                        { "id": 32117676, "caption": "", "type": "textbox" },
                        { "id": 32117677, "caption": "", "type": "textbox" },
                        { "id": 32117678, "caption": "", "type": "textbox" },
                        { "id": 32117679, "caption": "", "type": "textbox" },
                        { "id": 32117680, "caption": "", "type": "textbox" },
                        { "id": 32117681, "caption": "", "type": "textbox" },
                        { "id": 32117682, "caption": "", "type": "textbox" },
                        { "id": 32117683, "caption": "", "type": "textbox" },
                        { "id": 32117684, "caption": "", "type": "textbox" },
                        { "id": 32117685, "caption": "", "type": "textbox" },
                        { "id": 32117686, "caption": "", "type": "textbox" },
                        { "id": 32117687, "caption": "", "type": "textbox" },
                        { "id": 32117688, "caption": "", "type": "textbox" },
                        { "id": 32117689, "caption": "", "type": "textbox" },
                        { "id": 32117690, "caption": "", "type": "textbox" },
                        { "id": 32117691, "caption": "", "type": "textbox" },
                        { "id": 32117692, "caption": "", "type": "textbox" },
                        { "id": 32117693, "caption": "", "type": "textbox" },
                        { "id": 32117694, "caption": "", "type": "textbox" },
                        { "id": 32117695, "caption": "", "type": "textbox" },
                        { "id": 32117696, "caption": "", "type": "textbox" },
                        { "id": 32117697, "caption": "", "type": "textbox" },
                        { "id": 32117698, "caption": "", "type": "textbox" },
                        { "id": 32117699, "caption": "", "type": "textbox" },
                        { "id": 32117700, "caption": "", "type": "textbox" },
                        { "id": 32117701, "caption": "", "type": "textbox" },
                        { "id": 32117702, "caption": "", "type": "textbox" },
                        { "id": 32117703, "caption": "", "type": "textbox" },
                        { "id": 32117704, "caption": "", "type": "textbox" },
                        { "id": 32117705, "caption": "", "type": "textbox" },
                    ]
                },
                {
                    "id": 5,
                    "namaexternal": "TV",
                    "details": [
                        { "id": 32117710, "caption": "", "type": "textbox" },
                        { "id": 32117711, "caption": "", "type": "textbox" },
                        { "id": 32117712, "caption": "", "type": "textbox" },
                        { "id": 32117713, "caption": "", "type": "textbox" },
                        { "id": 32117714, "caption": "", "type": "textbox" },
                        { "id": 32117715, "caption": "", "type": "textbox" },
                        { "id": 32117716, "caption": "", "type": "textbox" },
                        { "id": 32117717, "caption": "", "type": "textbox" },
                        { "id": 32117718, "caption": "", "type": "textbox" },
                        { "id": 32117719, "caption": "", "type": "textbox" },
                        { "id": 32117720, "caption": "", "type": "textbox" },
                        { "id": 32117721, "caption": "", "type": "textbox" },
                        { "id": 32117722, "caption": "", "type": "textbox" },
                        { "id": 32117723, "caption": "", "type": "textbox" },
                        { "id": 32117724, "caption": "", "type": "textbox" },
                        { "id": 32117725, "caption": "", "type": "textbox" },
                        { "id": 32117726, "caption": "", "type": "textbox" },
                        { "id": 32117727, "caption": "", "type": "textbox" },
                        { "id": 32117728, "caption": "", "type": "textbox" },
                        { "id": 32117729, "caption": "", "type": "textbox" },
                        { "id": 32117730, "caption": "", "type": "textbox" },
                        { "id": 32117731, "caption": "", "type": "textbox" },
                        { "id": 32117732, "caption": "", "type": "textbox" },
                        { "id": 32117733, "caption": "", "type": "textbox" },
                        { "id": 32117734, "caption": "", "type": "textbox" },
                        { "id": 32117735, "caption": "", "type": "textbox" },
                        { "id": 32117736, "caption": "", "type": "textbox" },
                        { "id": 32117737, "caption": "", "type": "textbox" },
                        { "id": 32117738, "caption": "", "type": "textbox" },
                        { "id": 32117739, "caption": "", "type": "textbox" },
                        { "id": 32117740, "caption": "", "type": "textbox" },
                        { "id": 32117741, "caption": "", "type": "textbox" },
                        { "id": 32117742, "caption": "", "type": "textbox" },
                        { "id": 32117743, "caption": "", "type": "textbox" },
                        { "id": 32117744, "caption": "", "type": "textbox" },
                        { "id": 32117745, "caption": "", "type": "textbox" },
                    ]
                }
            ]

            var seriesNadi = []
            var seriesSistolik = []
            var seriesDistolik = []
            var seriesRespirasi = []
            var seriesTV = []
            loadChart()
            function loadChart() {
                $("#chartNadi").kendoChart({
                    title: {
                        text: "Grafik Nadi"
                    },
                    legend: {
                        position: "top"
                    },
                    series: [ 
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
                    ],
                    categoryAxis: {
                        categories: ['P', 'S', 'S', 'M', 'P', 'S', 'S', 'M', 'P', 'S', 'S', 'M', 'P', 'S', 'S', 'M', 'P', 'S', 'S', 'M', 'P', 'S', 'S', 'M', 'P', 'S', 'S', 'M', 'P', 'S', 'S', 'M'],
                        axisCrossingValues: [0, 35]
                    }
                });

                $("#chartSistolik").kendoChart({
                    
                    title: {
                        text: "Grafik Sistolik"
                    },
                    legend: {
                        position: "top"
                    },
                    series: [{
                        type: "line",
                        data: seriesSistolik,
                        name: "Sistolik",
                        color: "#0328fc",

                    }
                       
                    ],
                    valueAxes: [
                        
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

                $("#chartDistolik").kendoChart({
                    
                    title: {
                        text: "Grafik Distolik"
                    },
                    legend: {
                        position: "top"
                    },
                    series: [{
                        type: "line",
                        data: seriesDistolik,
                        name: "Distolik",
                        color: "#34A853",

                    }
                       
                    ],
                    valueAxes: [
                        
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

                $("#chartRespirasi").kendoChart({
                    
                    title: {
                        text: "Grafik Respirasi"
                    },
                    legend: {
                        position: "top"
                    },
                    series: [{
                        type: "line",
                        data: seriesRespirasi,
                        name: "Respirasi",
                        color: "#FBBC05",

                    }
                       
                    ],
                    valueAxes: [
                        
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

                        axisCrossingValues: [0, 35]
                    }
                });

                $("#chartTV").kendoChart({
                   
                    title: {
                        text: "Grafik TV"
                    },
                    legend: {
                        position: "top"
                    },
                    series: [{
                        type: "line",
                        data: seriesTV,
                        name: "TV",
                        color: "#0328fc",

                    }
                        
                    ],
                    valueAxes: [
                         
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

                        axisCrossingValues: [0, 35]
                    }
                });
            }

            $scope.listNadi = []
            $scope.listSistolik = []
            $scope.listDistolik = []
            $scope.listRespirasi = []
            $scope.listTV = []

            $scope.cetakPdf = function () {

                
                if (norecEMR == '') return

                var local = JSON.parse(localStorage.getItem('profile'));
                var nama = medifirstService.getPegawaiLogin().namalengkap;
                window.open(config.baseApiBackend + 'report/cetak-laporan-operasi?nocm='
                    + $scope.cc.nocm + '&norec_apd=' + $scope.cc.norec + '&emr=' + norecEMR
                    + '&emrfk=' + $scope.cc.emrfk
                    + '&kdprofile=' + local.id
                    // + '&index=' + paramsIndex
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
                medifirstService.get("emr/get-antrian-pasien-norec/" + noregistrasifk).then(function (e) {
                    var antrianPasien = e.data.result;
                    $scope.item.obj[422700] = antrianPasien.namapasien;
                    $scope.item.obj[422701] = antrianPasien.nocm;
                    $scope.item.obj[422704] = new Date(moment(antrianPasien.tgllahir).format('YYYY-MM-DD'));
                    $scope.item.obj[422707] = antrianPasien.alamatlengkap;
                    if (antrianPasien.jeniskelamin == 'PEREMPUAN') {
                        $scope.item.obj[422702] = false;
                        $scope.item.obj[422703] = true;
                    } else {
                        $scope.item.obj[422702] = true;
                        $scope.item.obj[422703] = false;
                    }
                    $scope.item.obj[422724] = new Date(moment(antrianPasien.tglregistrasi).format('YYYY-MM-DD HH:mm'));
                    if (antrianPasien.iddpjp != null && antrianPasien.dokterdpjp != null) {
                        $scope.item.obj[422790] = {
                            value: antrianPasien.iddpjp,
                            text: antrianPasien.dokterdpjp
                        }
                    }
                    if (antrianPasien.objectruanganfk != null && antrianPasien.namaruangan != null) {
                        $scope.item.obj[422723] = {
                            value: antrianPasien.objectruanganfk,
                            text: antrianPasien.namaruangan
                        }
                    }
                    $scope.item.obj[422788] = $scope.now;
                })
                
                medifirstService.get("emr/get-vital-sign?noregistrasi=" + $scope.cc.noregistrasi + "&objectidawal=4241&objectidakhir=4246&idemr=147", true).then(function (datas) {
                    if (datas.data.data.length>0){
                        // $scope.item.obj[4228]=datas.data.data[0].value
                        // $scope.item.obj[4229]=datas.data.data[3].value
                        // $scope.item.obj[4230]=datas.data.data[4].value
                        // $scope.item.obj[4231]=datas.data.data[5].value
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
                    var datas = e.data.kolom4

                var detail = []
                var arrayAskep = []

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
                    if (element.kodeexternal == 'pernafasan' && element.namaexternal == 'Nadi') {
                        $scope.listNadi.push({ id: element.id })
                    }
                    if (element.kodeexternal == 'pernafasan' && element.namaexternal == 'Sistolik') {
                        $scope.listSistolik.push({ id: element.id })
                    }
                    if (element.kodeexternal == 'pernafasan' && element.namaexternal == 'Distolik') {
                        $scope.listDistolik.push({ id: element.id })
                    }
                    if (element.kodeexternal == 'pernafasan' && element.namaexternal == 'Respirasi') {
                        $scope.listRespirasi.push({ id: element.id })
                    }
                    if (element.kodeexternal == 'pernafasan' && element.namaexternal == 'TV') {
                        $scope.listTV.push({ id: element.id })
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
                
                // $scope.listData4 = arrayParenteral2
                onloadchart()
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
                onloadchart()
            }

            function onloadchart() {
                for (let y = 0; y < 36; y++) {
                    var item = $scope.listNadi[y]['id'];
                    seriesNadi[y] = $scope.item.obj[parseFloat(item)]
                }

                for (let z = 0; z < 36; z++) {
                    var item = $scope.listSistolik[z]['id'];
                    seriesSistolik[z] = $scope.item.obj[parseFloat(item)]
                }

                for (let z = 0; z < 36; z++) {
                    var item = $scope.listDistolik[z]['id'];
                    seriesDistolik[z] = $scope.item.obj[parseFloat(item)]
                }

                for (let z = 0; z < 36; z++) {
                    var item = $scope.listRespirasi[z]['id'];
                    seriesRespirasi[z] = $scope.item.obj[parseFloat(item)]
                }

                for (let z = 0; z < 36; z++) {
                    var item = $scope.listTV[z]['id'];
                    seriesTV[z] = $scope.item.obj[parseFloat(item)]
                }


                for (let x = 0; x < seriesNadi.length; x++) {
                    if (!isNaN(parseInt(seriesNadi[x])))
                        seriesNadi[x] = parseInt(seriesNadi[x])
                    else
                        seriesNadi[x] = null
                }
                for (let x = 0; x < seriesSistolik.length; x++) {
                    if (!isNaN(parseInt(seriesSistolik[x])))
                        seriesSistolik[x] = parseInt(seriesSistolik[x])
                    else
                        seriesSistolik[x] = null
                }
                for (let x = 0; x < seriesDistolik.length; x++) {
                    if (!isNaN(parseInt(seriesDistolik[x])))
                        seriesDistolik[x] = parseInt(seriesDistolik[x])
                    else
                        seriesDistolik[x] = null
                }
                for (let x = 0; x < seriesRespirasi.length; x++) {
                    if (!isNaN(parseInt(seriesRespirasi[x])))
                        seriesRespirasi[x] = parseInt(seriesRespirasi[x])
                    else
                        seriesRespirasi[x] = null
                }
                for (let x = 0; x < seriesTV.length; x++) {
                    if (!isNaN(parseInt(seriesTV[x])))
                        seriesTV[x] = parseInt(seriesTV[x])
                    else
                        seriesTV[x] = null
                }

                loadChart()
            }

            $scope.kembali = function () {
                $rootScope.showRiwayat()
            }
              
            $scope.Save = function () {

                // if($scope.item.obj[31100530] == undefined){
                //     toastr.warning('Nama DPJP tidak boleh kosong','Peringatan')
                //     return
                // }

                // if($scope.item.obj[31100532] == undefined){
                //     toastr.warning('Asisten I tidak boleh kosong','Peringatan')
                //     return
                // }

                // if($scope.item.obj[31100537] == undefined){
                //     toastr.warning('Nama Dokter Anestesi tidak boleh kosong','Peringatan')
                //     return
                // }

                // if($scope.item.obj[31100538] == undefined && $scope.item.obj[31100539] == undefined && $scope.item.obj[31100540] == undefined){
                //     toastr.warning('Jenis Anestesi tidak boleh kosong','Peringatan')
                //     return
                // }

                // if($scope.item.obj[31100541] == undefined){
                //     toastr.warning('Diagnose Pre-Operatif tidak boleh kosong','Peringatan')
                //     return
                // }

                // if($scope.item.obj[31100542] == undefined){
                //     toastr.warning('Komplikasi Selama Operasi tidak boleh kosong','Peringatan')
                //     return
                // }

                // if($scope.item.obj[31100543] == undefined){
                //     toastr.warning('Diagnose Pasca Operatif tidak boleh kosong','Peringatan')
                //     return
                // }

                // if($scope.item.obj[31100544] == undefined && $scope.item.obj[32103414] == undefined && $scope.item.obj[31100545] == undefined && $scope.item.obj[32103415] == undefined && $scope.item.obj[31100546] == undefined && $scope.item.obj[32103416] == undefined){
                //     toastr.warning('Intake tidak boleh kosong','Peringatan')
                //     return
                // }

                // if($scope.item.obj[31100547] == undefined && $scope.item.obj[32103417] == undefined && $scope.item.obj[31100548] == undefined && $scope.item.obj[32103418] == undefined && $scope.item.obj[31100549] == undefined && $scope.item.obj[32103419] == undefined){
                //     toastr.warning('Output tidak boleh kosong','Peringatan')
                //     return
                // }

                // if($scope.item.obj[31100550] == undefined){
                //     toastr.warning('Prosedur Tindakan yang Dilakukan tidak boleh kosong','Peringatan')
                //     return
                // }

                // if($scope.item.obj[31100551] == undefined && $scope.item.obj[31100552] == undefined && $scope.item.obj[31100553] == undefined && $scope.item.obj[31100554] == undefined && $scope.item.obj[31100555] == undefined && $scope.item.obj[31100556] == undefined){
                //     toastr.warning('Checklist Prosedur Tindakan yang Dilakukan tidak boleh kosong','Peringatan')
                //     return
                // }

                // if($scope.item.obj[31100557] == undefined && $scope.item.obj[31100558] == undefined){
                //     toastr.warning('Dikirim Untuk Pemeriksaan P.A tidak boleh kosong','Peringatan')
                //     return
                // }

                // if($scope.item.obj[31100559] == undefined && $scope.item.obj[31100560] == undefined && $scope.item.obj[31100561] == undefined && $scope.item.obj[31100562] == undefined){
                //     toastr.warning('Jenis Luka Operasi tidak boleh kosong','Peringatan')
                //     return
                // }

                // if($scope.item.obj[31100563] == undefined){
                //     toastr.warning('No. Alat yang Dipasang (implan) tidak boleh kosong','Peringatan')
                //     return
                // }

                // if($scope.item.obj[31100564] == undefined){
                //     toastr.warning('Tanggal Operasi tidak boleh kosong','Peringatan')
                //     return
                // }

                // if($scope.item.obj[31100565] == undefined){
                //     toastr.warning('Jam Operasi Dimulai tidak boleh kosong','Peringatan')
                //     return
                // }

                // if($scope.item.obj[31100566] == undefined){
                //     toastr.warning('Jam Operasi Selesai tidak boleh kosong','Peringatan')
                //     return
                // }

                // if($scope.item.obj[31100567] == undefined){
                //     toastr.warning('Lama Operasi Berlangsung tidak boleh kosong','Peringatan')
                //     return
                // }

                // if($scope.item.obj[31100568] == undefined){
                //     toastr.warning('Laporan/Tindakan Operasi tidak boleh kosong','Peringatan')
                //     return
                // }

                // if($scope.item.obj[31100569] == undefined){
                //     toastr.warning('Tanda Tangan dan Nama Dokter tidak boleh kosong','Peringatan')
                //     return
                // }

                // if($scope.item.obj[31100570] == undefined){
                //     toastr.warning('Intruksi Pasca Bedah tidak boleh kosong','Peringatan')
                //     return
                // }

                // if($scope.item.obj[31100571] == undefined){
                //     toastr.warning('1. Kontrol Nadi/Tensi/Nafas/Suhu tidak boleh kosong','Peringatan')
                //     return
                // }

                // if($scope.item.obj[31100572] == undefined){
                //     toastr.warning('2. Puasa tidak boleh kosong','Peringatan')
                //     return
                // }

                // if($scope.item.obj[31100573] == undefined){
                //     toastr.warning('3. Infus tidak boleh kosong','Peringatan')
                //     return
                // }

                // if($scope.item.obj[31100574] == undefined){
                //     toastr.warning('4. Antibiotika tidak boleh kosong','Peringatan')
                //     return
                // }

                // if($scope.item.obj[31100575] == undefined){
                //     toastr.warning('5. Lain-lain tidak boleh kosong','Peringatan')
                //     return
                // }

                // if($scope.item.obj[31100576] == undefined){
                //     toastr.warning('DPJP tidak boleh kosong','Peringatan')
                //     return
                // }

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

                    for (let z = 0; z < 36; z++) {
                        var item = $scope.listNadi[z]['id'];
                        seriesNadi[z] = $scope.item.obj[parseFloat(item)]
                    }

                    for (let z = 0; z < 36; z++) {
                        var item = $scope.listSistolik[z]['id'];
                        seriesSistolik[z] = $scope.item.obj[parseFloat(item)]
                    }

                    for (let z = 0; z < 36; z++) {
                        var item = $scope.listDistolik[z]['id'];
                        seriesDistolik[z] = $scope.item.obj[parseFloat(item)]
                    }

                    for (let z = 0; z < 36; z++) {
                        var item = $scope.listRespirasi[z]['id'];
                        seriesRespirasi[z] = $scope.item.obj[parseFloat(item)]
                    }

                    for (let z = 0; z < 36; z++) {
                        var item = $scope.listTV[z]['id'];
                        seriesTV[z] = $scope.item.obj[parseFloat(item)]
                    }
                    
                    for (let x = 0; x < seriesNadi.length; x++) {
                        if (!isNaN(parseInt(seriesNadi[x])))
                            seriesNadi[x] = parseInt(seriesNadi[x])
                        else
                            seriesNadi[x] = null
                    }
                    for (let x = 0; x < seriesSistolik.length; x++) {
                        if (!isNaN(parseInt(seriesSistolik[x])))
                            seriesSistolik[x] = parseInt(seriesSistolik[x])
                        else
                            seriesSistolik[x] = null
                    }
                    for (let x = 0; x < seriesDistolik.length; x++) {
                        if (!isNaN(parseInt(seriesDistolik[x])))
                            seriesDistolik[x] = parseInt(seriesDistolik[x])
                        else
                            seriesDistolik[x] = null
                    }
                    for (let x = 0; x < seriesRespirasi.length; x++) {
                        if (!isNaN(parseInt(seriesRespirasi[x])))
                            seriesRespirasi[x] = parseInt(seriesRespirasi[x])
                        else
                            seriesRespirasi[x] = null
                    }
                    for (let x = 0; x < seriesTV.length; x++) {
                        if (!isNaN(parseInt(seriesTV[x])))
                            seriesTV[x] = parseInt(seriesTV[x])
                        else
                            seriesTV[x] = null
                    }
                    loadChart()

                    medifirstService.postLogging('EMR', 'norec emrpasien_t', e.data.data.norec,
                        'Evaluasi Pasca Anestesi / Sedasi (RM 51a)' + ' dengan No EMR - ' + e.data.data.noemr + ' pada No Registrasi '
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

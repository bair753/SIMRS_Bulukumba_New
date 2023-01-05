define(['initialize'], function (initialize) {
    'use strict';
    initialize.controller('RekonsiliasiObatCtrl', ['$q', '$rootScope', '$scope', 'ModelItem', '$state', 'CacheHelper', 'DateHelper', 'MedifirstService',
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
            $scope.cc.emrfk = 290028;
            var dataLoad = [];
            $scope.isSaatMasuk = true;
            $scope.isSaatTransfer = false;
            $scope.isSaatKeluar = false;
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

            $scope.showSaatMasuk = function () {
                $scope.isSaatMasuk = !$scope.isSaatMasuk;
            }

            $scope.showSaatTransfer = function () {
                $scope.isSaatTransfer = !$scope.isSaatTransfer;
            }

            $scope.showSaatKeluar = function () {
                $scope.isSaatKeluar = !$scope.isSaatKeluar;
            }

            $scope.cetakPdf = function () {
                if (norecEMR == '') return
                var client = new HttpClient();
                client.get('http://127.0.0.1:1237/printvb/e-rekammedis?cetak-emr-asesmen-awal-medis-igd&id=' + $scope.cc.nocm + '&emr=' + norecEMR + '&view=true', function (response) {
                    // do something with response
                });
            }

            $scope.listSaatMasuk = [
                {
                    "id": 1,
                    "namaobat": [
                        { "id": 423500, "nama": "", "caption": "", "type": "combobox", "dataList": "listObat", "satuan": "" }
                    ],
                    "dosis": [
                        { "id": 423501, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "frekuensi": [
                        { "id": 423502, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "carapemberian": [
                        { "id": 423503, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "tindaklanjut": [
                        { "id": 423504, "nama": "Lanjut aturan pakai sama", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423505, "nama": "Lanjut aturan pakai berubah", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423506, "nama": "Stop", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ],
                    "perubahan": [
                        { "id": 423507, "nama": "", "caption": "", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 2,
                    "namaobat": [
                        { "id": 423508, "nama": "", "caption": "", "type": "combobox", "dataList": "listObat", "satuan": "" }
                    ],
                    "dosis": [
                        { "id": 423509, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "frekuensi": [
                        { "id": 423510, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "carapemberian": [
                        { "id": 423511, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "tindaklanjut": [
                        { "id": 423512, "nama": "Lanjut aturan pakai sama", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423513, "nama": "Lanjut aturan pakai berubah", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423514, "nama": "Stop", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ],
                    "perubahan": [
                        { "id": 423515, "nama": "", "caption": "", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 3,
                    "namaobat": [
                        { "id": 423516, "nama": "", "caption": "", "type": "combobox", "dataList": "listObat", "satuan": "" }
                    ],
                    "dosis": [
                        { "id": 423517, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "frekuensi": [
                        { "id": 423518, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "carapemberian": [
                        { "id": 423519, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "tindaklanjut": [
                        { "id": 423520, "nama": "Lanjut aturan pakai sama", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423521, "nama": "Lanjut aturan pakai berubah", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423522, "nama": "Stop", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ],
                    "perubahan": [
                        { "id": 423523, "nama": "", "caption": "", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 4,
                    "namaobat": [
                        { "id": 423524, "nama": "", "caption": "", "type": "combobox", "dataList": "listObat", "satuan": "" }
                    ],
                    "dosis": [
                        { "id": 423525, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "frekuensi": [
                        { "id": 423526, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "carapemberian": [
                        { "id": 423527, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "tindaklanjut": [
                        { "id": 423528, "nama": "Lanjut aturan pakai sama", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423529, "nama": "Lanjut aturan pakai berubah", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423530, "nama": "Stop", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ],
                    "perubahan": [
                        { "id": 423531, "nama": "", "caption": "", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 5,
                    "namaobat": [
                        { "id": 423532, "nama": "", "caption": "", "type": "combobox", "dataList": "listObat", "satuan": "" }
                    ],
                    "dosis": [
                        { "id": 423533, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "frekuensi": [
                        { "id": 423534, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "carapemberian": [
                        { "id": 423535, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "tindaklanjut": [
                        { "id": 423536, "nama": "Lanjut aturan pakai sama", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423537, "nama": "Lanjut aturan pakai berubah", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423538, "nama": "Stop", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ],
                    "perubahan": [
                        { "id": 423539, "nama": "", "caption": "", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listSaatTransfer = [
                {
                    "id": 1,
                    "namaobat": [
                        { "id": 423540, "nama": "", "caption": "", "type": "combobox", "dataList": "listObat", "satuan": "" }
                    ],
                    "dosis": [
                        { "id": 423541, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "frekuensi": [
                        { "id": 423542, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "carapemberian": [
                        { "id": 423543, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "tindaklanjut": [
                        { "id": 423544, "nama": "Lanjut aturan pakai sama", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423545, "nama": "Lanjut aturan pakai berubah", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423546, "nama": "Stop", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ],
                    "perubahan": [
                        { "id": 423547, "nama": "", "caption": "", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 2,
                    "namaobat": [
                        { "id": 423548, "nama": "", "caption": "", "type": "combobox", "dataList": "listObat", "satuan": "" }
                    ],
                    "dosis": [
                        { "id": 423549, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "frekuensi": [
                        { "id": 423550, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "carapemberian": [
                        { "id": 423551, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "tindaklanjut": [
                        { "id": 423552, "nama": "Lanjut aturan pakai sama", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423553, "nama": "Lanjut aturan pakai berubah", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423554, "nama": "Stop", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ],
                    "perubahan": [
                        { "id": 423555, "nama": "", "caption": "", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 3,
                    "namaobat": [
                        { "id": 423556, "nama": "", "caption": "", "type": "combobox", "dataList": "listObat", "satuan": "" }
                    ],
                    "dosis": [
                        { "id": 423557, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "frekuensi": [
                        { "id": 423558, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "carapemberian": [
                        { "id": 423559, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "tindaklanjut": [
                        { "id": 423560, "nama": "Lanjut aturan pakai sama", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423561, "nama": "Lanjut aturan pakai berubah", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423562, "nama": "Stop", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ],
                    "perubahan": [
                        { "id": 423563, "nama": "", "caption": "", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 4,
                    "namaobat": [
                        { "id": 423564, "nama": "", "caption": "", "type": "combobox", "dataList": "listObat", "satuan": "" }
                    ],
                    "dosis": [
                        { "id": 423565, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "frekuensi": [
                        { "id": 423566, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "carapemberian": [
                        { "id": 423567, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "tindaklanjut": [
                        { "id": 423568, "nama": "Lanjut aturan pakai sama", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423569, "nama": "Lanjut aturan pakai berubah", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423570, "nama": "Stop", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ],
                    "perubahan": [
                        { "id": 423571, "nama": "", "caption": "", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 5,
                    "namaobat": [
                        { "id": 423572, "nama": "", "caption": "", "type": "combobox", "dataList": "listObat", "satuan": "" }
                    ],
                    "dosis": [
                        { "id": 423573, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "frekuensi": [
                        { "id": 423574, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "carapemberian": [
                        { "id": 423575, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "tindaklanjut": [
                        { "id": 423576, "nama": "Lanjut aturan pakai sama", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423577, "nama": "Lanjut aturan pakai berubah", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423578, "nama": "Stop", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ],
                    "perubahan": [
                        { "id": 423579, "nama": "", "caption": "", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listSaatKeluar = [
                {
                    "id": 1,
                    "namaobat": [
                        { "id": 423580, "nama": "", "caption": "", "type": "combobox", "dataList": "listObat", "satuan": "" }
                    ],
                    "dosis": [
                        { "id": 423581, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "frekuensi": [
                        { "id": 423582, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "carapemberian": [
                        { "id": 423583, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "tindaklanjut": [
                        { "id": 423584, "nama": "Lanjut aturan pakai sama", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423585, "nama": "Lanjut aturan pakai berubah", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423586, "nama": "Stop", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ],
                    "perubahan": [
                        { "id": 423587, "nama": "", "caption": "", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 2,
                    "namaobat": [
                        { "id": 423588, "nama": "", "caption": "", "type": "combobox", "dataList": "listObat", "satuan": "" }
                    ],
                    "dosis": [
                        { "id": 423589, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "frekuensi": [
                        { "id": 423590, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "carapemberian": [
                        { "id": 423591, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "tindaklanjut": [
                        { "id": 423592, "nama": "Lanjut aturan pakai sama", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423593, "nama": "Lanjut aturan pakai berubah", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423594, "nama": "Stop", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ],
                    "perubahan": [
                        { "id": 423595, "nama": "", "caption": "", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 3,
                    "namaobat": [
                        { "id": 423596, "nama": "", "caption": "", "type": "combobox", "dataList": "listObat", "satuan": "" }
                    ],
                    "dosis": [
                        { "id": 423597, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "frekuensi": [
                        { "id": 423598, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "carapemberian": [
                        { "id": 423599, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "tindaklanjut": [
                        { "id": 423600, "nama": "Lanjut aturan pakai sama", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423601, "nama": "Lanjut aturan pakai berubah", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423602, "nama": "Stop", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ],
                    "perubahan": [
                        { "id": 423603, "nama": "", "caption": "", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 4,
                    "namaobat": [
                        { "id": 423604, "nama": "", "caption": "", "type": "combobox", "dataList": "listObat", "satuan": "" }
                    ],
                    "dosis": [
                        { "id": 423605, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "frekuensi": [
                        { "id": 423606, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "carapemberian": [
                        { "id": 423607, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "tindaklanjut": [
                        { "id": 423608, "nama": "Lanjut aturan pakai sama", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423609, "nama": "Lanjut aturan pakai berubah", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423610, "nama": "Stop", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ],
                    "perubahan": [
                        { "id": 423611, "nama": "", "caption": "", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 5,
                    "namaobat": [
                        { "id": 423612, "nama": "", "caption": "", "type": "combobox", "dataList": "listObat", "satuan": "" }
                    ],
                    "dosis": [
                        { "id": 423613, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "frekuensi": [
                        { "id": 423614, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "carapemberian": [
                        { "id": 423615, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" }
                    ],
                    "tindaklanjut": [
                        { "id": 423616, "nama": "Lanjut aturan pakai sama", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423617, "nama": "Lanjut aturan pakai berubah", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 423618, "nama": "Stop", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ],
                    "perubahan": [
                        { "id": 423619, "nama": "", "caption": "", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                }
            ];

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
                $scope.item.obj[423291] = $scope.now;
                // medifirstService.get("emr/get-antrian-pasien-norec/" + noregistrasifk).then(function (e) {
                //     var antrianPasien = e.data.result;
                //     $scope.item.obj[421300] = new Date(moment(antrianPasien.tglregistrasi).format('YYYY-MM-DD HH:mm'));
                //     if (antrianPasien.objectruanganfk != null && antrianPasien.namaruangan != null) {
                //         $scope.item.obj[421299] = {
                //             value: antrianPasien.objectruanganfk,
                //             text: antrianPasien.namaruangan
                //         }
                //     }
                //     if (antrianPasien.iddpjp != null && antrianPasien.dokterdpjp != null) {
                //         $scope.item.obj[421371] = {
                //             value: antrianPasien.iddpjp,
                //             text: antrianPasien.dokterdpjp
                //         }
                //     }
                // })
                
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

            function saveTosDipake(id) {
                if (nomorEMR != '-') {
                    let json = {
                        noemr: nomorEMR,
                        emrfk: $scope.cc.emrfk,
                        id: id,
                        value: moment(new Date()).format('YYYY-MM-DD HH:mm:ss')
                    }
                    medifirstService.postNonMessage("emr/save-status-dipake", json).then(function (dat) {
                    })
                }
            }

            $scope.tambah = function () {
                let details = []
                for (let i = 0; i < $scope.listItem.length; i++) {
                    const element = $scope.listItem[i];
                    if (element.inuse == undefined) {
                        details.push(element.id)
                    }
                }
                let json = {
                    noemr: nomorEMR,
                    emrfk: $scope.cc.emrfk,
                    details: details
                }
                medifirstService.postNonMessage("emr/get-status-dipake", json).then(function (dat) {
                    let result = dat.data.data
                    for (let j = 0; j < $scope.listItem.length; j++) {
                        const element = $scope.listItem[j];
                        for (let x = 0; x < result.length; x++) {
                            const element2 = result[x];
                            if (element.id == element2.emrdfk) {
                                element.inuse = true
                            }
                        }
                    }

                    for (let j = 0; j < $scope.listItem.length; j++) {
                        const element2 = $scope.listItem[j];
                        if (element2.inuse == undefined) {
                            $scope.item.obj[parseInt(element2.id)] = new Date()
                            element2.inuse = true
                            saveTosDipake(element2.id)
                            break
                        }
                    }
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

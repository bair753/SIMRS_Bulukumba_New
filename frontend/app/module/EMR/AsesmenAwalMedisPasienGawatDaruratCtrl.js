define(['initialize'], function (initialize) {
    'use strict';
    initialize.controller('AsesmenAwalMedisPasienGawatDaruratCtrl', ['$q', '$rootScope', '$scope', 'ModelItem', '$state', 'CacheHelper', 'DateHelper', 'MedifirstService',
        function ($q, $rootScope, $scope, ModelItem, $state, cacheHelper, dateHelper, medifirstService) {


            $scope.noCM = $state.params.noCM;
            $scope.tombolSimpanVis = true
            $scope.noRecPap = cacheHelper.get('noRecPap');
            $scope.totalSkor = 0
            $scope.totalSkor2 = 0
            $scope.SkorSkalaFlacc = [];
            $scope.SkorJatuhAnak = [];
            $scope.cc = {}
            var nomorEMR = '-'
            $scope.cc.emrfk = 290008;
            var dataLoad = []
            var pegawaiInputDetail= ''
            $scope.isCetak = false
            var norecEMR = ''
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
            $scope.cetakPdf = function () {
                if (norecEMR == '') return
                var client = new HttpClient();
                client.get('http://127.0.0.1:1237/printvb/e-rekammedis?cetak-emr-asesmen-awal-keperawatan-igd&id=' + $scope.cc.nocm + '&emr=' + norecEMR + '&view=true', function (response) {
                    // do something with response
                });
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

            $scope.listHendaya = [
                { id: 5006, nama: 'Tuna Rungu' },
                { id: 5007, nama: 'Tuna Wicara' },
                { id: 5008, nama: 'Tuna Netra' },
                { id: 5009, nama: 'Lainnya :' }
            ]
            $scope.listADL = [
                { id: 5011, nama: 'Mandiri' },
                { id: 5012, nama: 'Perlu Bantuan' },
                { id: 5013, nama: 'Bantuan Total' },

            ]
            $scope.listKeluhanFisik = [
                { id: 5014, nama: 'Tidak Ada' },
                { id: 5015, nama: 'Ada, jelaskan :' },
            ]

            var cacheNomorEMR = cacheHelper.get('cacheNomorEMR');
            if (cacheNomorEMR != undefined) {
                nomorEMR = cacheNomorEMR[0]
                $scope.cc.norec_emr = nomorEMR
            }

            $scope.listWaktuPengkajian = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420932, "nama": "", "caption": "Tanggal Masuk UGD", "type": "datetime", "dataList": "", "satuan": "" },
                        { "id": 420933, "nama": "", "caption": "Cara Masuk", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 420934, "nama": "Datang sendiri", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420935, "nama": "Rujukan dari", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420936, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" },
                        { "id": 420937, "nama": "", "caption": "Cara Pembayaran", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 420938, "nama": "Umum", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420939, "nama": "Asuransi", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420940, "nama": "BPJS, No :", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420941, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listBioPsiko = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420959, "nama": "", "caption": "Masalah psikologi", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 420960, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420961, "nama": "Ya, Sebutkan", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420962, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" },
                        { "id": 420963, "nama": "", "caption": "Masalah sosial", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 420964, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420965, "nama": "Ya, Sebutkan", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420966, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" },
                        { "id": 420967, "nama": "", "caption": "Masalah cultura/bahasa", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 420968, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420969, "nama": "Ya, Sebutkan", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420970, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" },
                        { "id": 420971, "nama": "", "caption": "Masalah spiritual", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 420972, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420973, "nama": "Ya, Sebutkan", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420974, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listEkonomi = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420975, "nama": "PNS", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420976, "nama": "TNI/POLRI", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420977, "nama": "Pegawai Swasta", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420978, "nama": "Wiraswasta", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420979, "nama": "Petani/Nelayan", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420980, "nama": "Lain", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420981, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listRiwayatKesehatanPasien = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420982, "nama": "", "caption": "Riwayat Penyakit Sebelumnya", "type": "textarea", "dataList": "", "satuan": "" },
                        { "id": 420983, "nama": "", "caption": "", "type": "hr", "dataList": "", "satuan": "" },
                        { "id": 420984, "nama": "", "caption": "Riwayat Penyakit Sekarang", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listAlergi = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420985, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420986, "nama": "Ya, Sebutkan", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420987, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listRiwayatPenggunaanObat = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420988, "nama": "Tidak Ada", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420989, "nama": "Ada", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420990, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listAsesmenNyeri = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420991, "nama": "Tidak Nyeri", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420992, "nama": "Nyeri, menggunakan metode", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420993, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listRisikoJatuh = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420994, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420995, "nama": "Ya, menggunakan metode", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420996, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listAsesmenFungsional = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420997, "nama": "", "caption": "Alat bantu", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 420998, "nama": "", "caption": "Prothesa", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 420999, "nama": "", "caption": "Cacat tubuh", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421000, "nama": "", "caption": "ADL", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421001, "nama": "Mandiri", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421002, "nama": "Dibantu", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421003, "nama": "Tergantung Penuh", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listRisikoNutrisional = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 421004, "nama": "", "caption": "BB", "type": "textbox", "dataList": "", "satuan": "g/Kg" },
                        { "id": 421005, "nama": "", "caption": "Tinggi Badan/Panjang Badan", "type": "textbox", "dataList": "", "satuan": "cm" },
                        { "id": 421006, "nama": "", "caption": "Khusus Anak dan Bayi", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421007, "nama": "", "caption": "Lingkar Kepala", "type": "textbox", "dataList": "", "satuan": "cm" },
                        { "id": 421008, "nama": "", "caption": "LLA", "type": "textbox", "dataList": "", "satuan": "cm" },
                        { "id": 421009, "nama": "", "caption": "Konsul Dietisien", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421010, "nama": "Tidak Perlu", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421012, "nama": "Perlu", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listKebutuhanEdukasi = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 421012, "nama": "", "caption": "Edukasi awal disampaikan tentang penggunaan obat-obatan, penggunaan peralatan medis, potensi interaksi antara obat, diet dan nutrisi, manajemen nyeri, teknik rehabilitasi, dan cuci tangan yang benar kepada: ", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 421013, "nama": "Pasien", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421014, "nama": "Keluarga", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421015, "nama": "Tidak dapat memberikan edukasi kepada pasien atau keluarga, karena :", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 421016, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listTerapi = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 421017, "nama": "", "caption": "", "type": "datetime", "dataList": "", "satuan": "" },
                        { "id": 421018, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421019, "nama": "", "caption": "", "type": "combobox", "dataList": "listPegawai", "satuan": "" },
                        { "id": 421020, "nama": "", "caption": "", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 421021, "nama": "", "caption": "", "type": "datetime", "dataList": "", "satuan": "" },
                        { "id": 421022, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421023, "nama": "", "caption": "", "type": "combobox", "dataList": "listPegawai", "satuan": "" },
                        { "id": 421024, "nama": "", "caption": "", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 421025, "nama": "", "caption": "", "type": "datetime", "dataList": "", "satuan": "" },
                        { "id": 421026, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421027, "nama": "", "caption": "", "type": "combobox", "dataList": "listPegawai", "satuan": "" },
                        { "id": 421028, "nama": "", "caption": "", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 4,
                    "detail": [
                        { "id": 421029, "nama": "", "caption": "", "type": "datetime", "dataList": "", "satuan": "" },
                        { "id": 421030, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421031, "nama": "", "caption": "", "type": "combobox", "dataList": "listPegawai", "satuan": "" },
                        { "id": 421032, "nama": "", "caption": "", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 5,
                    "detail": [
                        { "id": 421033, "nama": "", "caption": "", "type": "datetime", "dataList": "", "satuan": "" },
                        { "id": 421034, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421035, "nama": "", "caption": "", "type": "combobox", "dataList": "listPegawai", "satuan": "" },
                        { "id": 421036, "nama": "", "caption": "", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 6,
                    "detail": [
                        { "id": 421037, "nama": "", "caption": "", "type": "datetime", "dataList": "", "satuan": "" },
                        { "id": 421038, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421039, "nama": "", "caption": "", "type": "combobox", "dataList": "listPegawai", "satuan": "" },
                        { "id": 421040, "nama": "", "caption": "", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 7,
                    "detail": [
                        { "id": 421041, "nama": "", "caption": "", "type": "datetime", "dataList": "", "satuan": "" },
                        { "id": 421042, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421043, "nama": "", "caption": "", "type": "combobox", "dataList": "listPegawai", "satuan": "" },
                        { "id": 421044, "nama": "", "caption": "", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 8,
                    "detail": [
                        { "id": 421045, "nama": "", "caption": "", "type": "datetime", "dataList": "", "satuan": "" },
                        { "id": 421046, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421047, "nama": "", "caption": "", "type": "combobox", "dataList": "listPegawai", "satuan": "" },
                        { "id": 421048, "nama": "", "caption": "", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 9,
                    "detail": [
                        { "id": 421049, "nama": "", "caption": "", "type": "datetime", "dataList": "", "satuan": "" },
                        { "id": 421050, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421051, "nama": "", "caption": "", "type": "combobox", "dataList": "listPegawai", "satuan": "" },
                        { "id": 421052, "nama": "", "caption": "", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 10,
                    "detail": [
                        { "id": 421053, "nama": "", "caption": "", "type": "datetime", "dataList": "", "satuan": "" },
                        { "id": 421054, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421055, "nama": "", "caption": "", "type": "combobox", "dataList": "listPegawai", "satuan": "" },
                        { "id": 421056, "nama": "", "caption": "", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 11,
                    "detail": [
                        { "id": 421057, "nama": "", "caption": "", "type": "datetime", "dataList": "", "satuan": "" },
                        { "id": 421058, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421059, "nama": "", "caption": "", "type": "combobox", "dataList": "listPegawai", "satuan": "" },
                        { "id": 421060, "nama": "", "caption": "", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 12,
                    "detail": [
                        { "id": 421061, "nama": "", "caption": "", "type": "datetime", "dataList": "", "satuan": "" },
                        { "id": 421062, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421063, "nama": "", "caption": "", "type": "combobox", "dataList": "listPegawai", "satuan": "" },
                        { "id": 421064, "nama": "", "caption": "", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 13,
                    "detail": [
                        { "id": 421065, "nama": "", "caption": "", "type": "datetime", "dataList": "", "satuan": "" },
                        { "id": 421066, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421067, "nama": "", "caption": "", "type": "combobox", "dataList": "listPegawai", "satuan": "" },
                        { "id": 421068, "nama": "", "caption": "", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 14,
                    "detail": [
                        { "id": 421069, "nama": "", "caption": "", "type": "datetime", "dataList": "", "satuan": "" },
                        { "id": 421070, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421071, "nama": "", "caption": "", "type": "combobox", "dataList": "listPegawai", "satuan": "" },
                        { "id": 421072, "nama": "", "caption": "", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 15,
                    "detail": [
                        { "id": 421073, "nama": "", "caption": "", "type": "datetime", "dataList": "", "satuan": "" },
                        { "id": 421074, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 421075, "nama": "", "caption": "", "type": "combobox", "dataList": "listPegawai", "satuan": "" },
                        { "id": 421076, "nama": "", "caption": "", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                }
            ];

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
                $scope.cc.dokterdpjp = chacePeriode[16]
                $scope.cc.iddpjp = chacePeriode[17]
                if (nomorEMR == '-') {
                    $scope.cc.norec_emr = '-'
                } else {
                    $scope.cc.norec_emr = nomorEMR
                }
            }
            medifirstService.get("emr/get-rekam-medis-dynamic?emrid=" + $scope.cc.emrfk).then(function (e) {

                var datas = e.data.kolom4

                var detail = []
                var arrayShiftJaga= []
                var arrayShiftJaga2 = []
                var arrayShiftJaga3= []
                var sama = false
                for (let i = 0; i < datas.length; i++) {
                    const element = datas[i];
                    sama = false

                    // ARRAY GEJALA
                    if (element.kodeexternal == 'shiftjaga2') {
                        for (let z = 0; z < arrayShiftJaga.length; z++) {
                            const element2 = arrayShiftJaga[z];
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
                            arrayShiftJaga.push(datax)
                        }
                    }
                }
                 // ARRAY GEJALA
                var gejalaKosongKeun = []
                for (let k = 0; k < arrayShiftJaga.length; k++) {
                    const element = arrayShiftJaga[k];
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
                $scope.listData1 = arrayShiftJaga
            })
            var chekedd = false
            $scope.totalSkorAses =0
            $scope.totalSkorAses2 =0
            $scope.totalSkor2=0

            medifirstService.get("emr/get-emr-transaksi-detail?noemr=" + nomorEMR + "&emrfk=" + $scope.cc.emrfk, true).then(function (dat) {
                $scope.item.obj = []
                $scope.item.obj2 = []
                $scope.item.obj[421096] = $scope.now
                dataLoad = dat.data.data

                // medifirstService.get("emr/get-vital-sign?noregistrasi=" + $scope.cc.noregistrasi + "&objectidawal=4241&objectidakhir=4246&idemr=147", true).then(function (datas) {
                //     $scope.item.obj[420943] = datas.data.data[1].value; 
                //     $scope.item.obj[420944] = datas.data.data[8].value; 
                //     $scope.item.obj[420945] = datas.data.data[6].value; 
                //     $scope.item.obj[420946] = datas.data.data[11].value; 
                // })

                var noregistrasifk = $state.params.noRec;
                var status = "t";
                medifirstService.get("emr/get-antrian-pasien-norec/" + noregistrasifk).then(function (e) {
                    var antrianPasien = e.data.result;
                    $scope.item.obj[420932] = new Date(moment(antrianPasien.tglregistrasi).format('YYYY-MM-DD HH:mm'));
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
                            if(str != undefined){
                                var res = str.split("~");
                                // $scope.item.objcbo[dataLoad[i].emrdfk]= {value:res[0],text:res[1]}
                                $scope.item.obj[dataLoad[i].emrdfk] = { value: res[0], text: res[1] }        
                            }

                        }
                        pegawaiInputDetail = dataLoad[i].pegawaifk
                    }

                }
                 if( $scope.cc.norec_emr !='-' && pegawaiInputDetail !='' && pegawaiInputDetail !=null){
                    if(pegawaiInputDetail != medifirstService.getPegawaiLogin().id){
                        $scope.allDisabled =true
                        toastr.warning('Hanya Bisa melihat data','Peringatan')
                        return
                    }
                }
            })

            $scope.kembali = function () {
                $rootScope.showRiwayat()
            }

            $scope.Save = function () {
                //  if( $scope.cc.norec_emr !='-' && pegawaiInputDetail !='' && pegawaiInputDetail !=null){
                //     if(pegawaiInputDetail != medifirstService.getPegawaiLogin().id){
                //         toastr.warning('Hanya Bisa melihat data','Peringatan')
                //         return
                //     }
                // }

                var arrobj = Object.keys($scope.item.obj)
                var arrSave = []
                for (var i = arrobj.length - 1; i >= 0; i--) {
                    if ($scope.item.obj[parseInt(arrobj[i])] instanceof Date)
                        $scope.item.obj[parseInt(arrobj[i])] = moment($scope.item.obj[parseInt(arrobj[i])]).format('YYYY-MM-DD HH:mm')
                    arrSave.push({ id: arrobj[i], values: $scope.item.obj[parseInt(arrobj[i])] })
                }
                $scope.cc.jenisemr = 'asesmen'
                var jsonSave = {
                    head: $scope.cc,
                    data: arrSave
                }
                medifirstService.post('emr/save-emr-dinamis', jsonSave).then(function (e) {
                    medifirstService.postLogging('EMR', 'norec emrpasien_t', e.data.data.norec,
                    'Asesmen Awal Medis Pasien Gawat Darurat'+ ' dengan No EMR - ' + e.data.data.noemr + ' pada No Registrasi '
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
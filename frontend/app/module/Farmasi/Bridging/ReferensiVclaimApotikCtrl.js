define(['initialize', 'Configuration'], function (initialize, configuration) {
    'use strict';
    initialize.controller('ReferensiVclaimApotikCtrl', ['$scope', '$state', 'MedifirstService',
        function ($scope, $state, medifirstService) {
            $scope.now = new Date();

            $scope.monthUngkul = {
                start: "year",
                depth: "year"
            }
            $scope.yearUngkul = {
                start: "decade",
                depth: "decade"
            }

            $scope.nav = function (state) {
                $scope.currentState = state;
                $state.go(state, $state.params);
                console.log($scope.currentState);
            }
            $scope.histori = {}
            $scope.kunjungan = {};
            $scope.klaim = {};
            $scope.raharja = {}

            $scope.poli = {};

            $scope.clearPoli = function () {

                $scope.isRouteLoading = false;
                $scope.poli = {
                    poli: '',
                };
            };

            $scope.setting = {};

            $scope.clearSetting = function () {

                $scope.isRouteLoading = false;
                $scope.setting = {
                    kode: '',
                };
            };

            $scope.obat = {};
            $scope.obat.tglresep = moment($scope.now).format('YYYY-MM-DD')

            $scope.clearObat = function () {

                $scope.isRouteLoading = false;
                $scope.obat = {
                    kode: '',
                    tglresep: moment($scope.now).format('YYYY-MM-DD'),
                    filter: '',
                };
            };

            $scope.faskes = {};

            $scope.clearFaskes = function () {

                $scope.isRouteLoading = false;
                $scope.faskes = {
                    nama: '',
                    jenisfaskes: undefined,
                };
            };

            $scope.clear = function () {

                $scope.isRouteLoading = false;
                $scope.klaim = {
                    bulan: moment($scope.now).format('MM'),
                    tahun: moment($scope.now).format('YYYY')
                };
            };
            $scope.isShowPembuatanSep = false;
            $scope.isShowPotensi = true;
            $scope.isShowApproval = false;
            $scope.isShowTglPulang = false;
            $scope.isShowIntegrasi = false;
            $scope.showPembuatanSep = function () {
                $scope.isShowPembuatanSep = !$scope.isShowPembuatanSep;
            }
            $scope.showPotensi = function () {
                $scope.isShowPotensi = !$scope.isShowPotensi;
            }
            $scope.showApproval = function () {
                $scope.isShowApproval = !$scope.isShowApproval;
            }
            $scope.showTglPulang = function () {
                $scope.isShowTglPulang = !$scope.isShowTglPulang;
            }
            $scope.showIntegrasi = function () {
                $scope.isShowIntegrasi = !$scope.isShowIntegrasi;
            }
            $scope.clear();

            $scope.listStatusKlaim = [{
                "id": 0, "nama": "Belum Verifikasi"
            }, {
                "id": 1, "nama": "Sudah Verifikasi"
            }];

            $scope.listJenisObat = [{
                "id": 1, "nama": "Obat PRB"
            }, {
                "id": 2, "nama": "Obat Kronis Blm Stabil"
            }, {
                "id": 3, "nama": "Obat Kemoterapi"
            }
            ];

            $scope.listJenisFaskes = [{
                "id": 1, "nama": "Faskes 1"
            }, {
                "id": 2, "nama": " Faskes 2/RS"
            }
            ];

            // medifirstService.get("bridging/bpjs/get-daftar-obat-dpho").then(function (e) {
            //     // document.getElementById("jsonKlaim").innerHTML = JSON.stringify(e.data, undefined, 4);
            //     const datas = e.data.response.list;
            //     for (var i = 0; i < datas.length; i++) {
            //         datas[i].no = i + 1
            //         // dat.data[i].total = parseFloat(dat.data[i].jumlah) * (parseFloat(dat.data[i].hargasatuan) - parseFloat(dat.data[i].hargadiscount))
            //         // dat.data[i].total = parseFloat(dat.data[i].total) + parseFloat(dat.data[i].jasa)
            //         // if (dat.data[i].iskronis == true || dat.data[i].iskronis == 't') {
            //         //     dat.data[i].kronis = "✔"
            //         // } else {
            //         //     dat.data[i].kronis = ""
            //         // }
            //     }
            //     $scope.dataDaftarObatDPHO = new kendo.data.DataSource({
            //         data: datas,
            //         pageSize: 20,
            //         // group: $scope.group,
            //     })
            // }).then(function () {
            //     $scope.isRouteLoading = false;
            // });

            medifirstService.get("bridging/bpjs/get-daftar-spesialistik").then(function (e) {
                // document.getElementById("jsonSpesialis").innerHTML = JSON.stringify(e.data, undefined, 4);
                const datas = e.data.response.list;
                    for (var i = 0; i < datas.length; i++) {
                        datas[i].no = i + 1
                    }
                    $scope.dataDaftarSpesialistik = new kendo.data.DataSource({
                        data: datas,
                        pageSize: 20,
                        // group: $scope.group,
                    })
            }).then(function () {
                $scope.isRouteLoading = false;
            });

            $scope.findHistori = function (data) {
                $scope.isRouteLoading = true;

                medifirstService.get("bridging/bpjs/get-monitoring-historipelayanan-peserta?noKartu="
                    + data.noKartu
                    + "&tglMulai="
                    + moment(data.tglAwal).format('YYYY-MMDD')
                    + "&tglAkhir="
                    + moment(data.tglAkhir).format('YYYY-MMDD')
                ).then(function (e) {
                    document.getElementById("jsonHistori").innerHTML = JSON.stringify(e.data, undefined, 4);
                }).then(function () {
                    $scope.isRouteLoading = false;
                });
            }
            // RAHARJA

            // HISTROI
            $scope.findRaharja = function (data) {
                $scope.isRouteLoading = true;

                medifirstService.get("bridging/bpjs/get-monitoring-klaim-jasaraharja?tglMulai="
                    + moment(data.tglAwal).format('YYYY-MMDD')
                    + "&tglAkhir="
                    + moment(data.tglAkhir).format('YYYY-MMDD')
                ).then(function (e) {
                    document.getElementById("jsonRaharja").innerHTML = JSON.stringify(e.data, undefined, 4);
                }).then(function () {
                    $scope.isRouteLoading = false;
                });
            }

            $scope.findPoli = function (data) {
                $scope.isRouteLoading = true;
                var data = {
                    poli: data.poli,
                }
                medifirstService.get("bridging/bpjs/get-poli-apotik-online?poli="
                    + data.poli
                ).then(function (e) {
                    // document.getElementById("jsonPoli").innerHTML = JSON.stringify(e.data, undefined, 4);
                    const datas = e.data.response.list;
                    for (var i = 0; i < datas.length; i++) {
                        datas[i].no = i + 1
                    }
                    $scope.dataDaftarPoli = new kendo.data.DataSource({
                        data: datas,
                        pageSize: 20,
                        // group: $scope.group,
                    })
                }).then(function () {
                    $scope.isRouteLoading = false;
                });
            }

            $scope.findSetting = function (data) {
                $scope.isRouteLoading = true;
                var data = {
                    kode: data.kode,
                }
                medifirstService.get("bridging/bpjs/get-setting-apotik-online?kode="
                    + data.kode
                ).then(function (e) {
                    document.getElementById("jsonSetting").innerHTML = JSON.stringify(e.data, undefined, 4);
                }).then(function () {
                    $scope.isRouteLoading = false;
                });
            }

            $scope.findFaskes = function (data) {
                $scope.isRouteLoading = true;
                var data = {
                    nama: data.nama,
                    id: data.jenisfaskes.id,
                }
                medifirstService.get("bridging/bpjs/get-faskes-apotik-online?nama="
                    + data.nama
                    + "&id=" + data.id
                ).then(function (e) {
                    // document.getElementById("jsonFaskes").innerHTML = JSON.stringify(e.data, undefined, 4);
                    const datas = e.data.response.list;
                    for (var i = 0; i < datas.length; i++) {
                        datas[i].no = i + 1
                    }
                    $scope.dataDaftarFaskes = new kendo.data.DataSource({
                        data: datas,
                        pageSize: 20,
                        // group: $scope.group,
                    })
                }).then(function () {
                    $scope.isRouteLoading = false;
                });
            }

            $scope.findObat = function (data) {
                $scope.isRouteLoading = true;
                var data = {
                    kode: data.kode.id,
                    tglresep: moment(data.tglresep).format('YYYY-MM-DD'),
                    filter: data.filter,
                }
                medifirstService.get("bridging/bpjs/get-obat-apotik-online?kode="
                    + data.kode
                    + "&tglresep=" + data.tglresep
                    + "&filter=" + data.filter
                ).then(function (e) {
                    document.getElementById("jsonObat").innerHTML = JSON.stringify(e.data, undefined, 4);
                }).then(function () {
                    $scope.isRouteLoading = false;
                });
            }

            $scope.formatRupiah = function (value, currency) {
                return currency + " " + parseFloat(value).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
            }

            $scope.columnDaftarObatDPHO = {
                toolbar: [
                    "excel",
                ],
                excel: {
                    fileName: "DaftarObatDPHO.xlsx",
                    allPages: true,
                },
                excelExport: function (e) {
                    var sheet = e.workbook.sheets[0];
                    sheet.frozenRows = 2;
                    sheet.mergedCells = ["A1:M1"];
                    sheet.name = "Orders";

                    var myHeaders = [{
                        value: "Daftar Obat DPHO",
                        fontSize: 20,
                        textAlign: "center",
                        background: "#ffffff",
                    }];

                    sheet.rows.splice(0, 0, { cells: myHeaders, type: "header", height: 70 });
                },
                selectable: 'row',
                pageable: true,
                columns:
                    [
                        {
                            "field": "kodeobat",
                            "title": "Kode Obat",
                            "width": "120px",
                            "template": "<span class='style-left'>#: kodeobat #</span>"
                        },
                        {
                            "field": "namaobat",
                            "title": "Nama Obat",
                            "width": "150px",
                            "template": "<span class='style-left'>#: namaobat #</span>"
                        },
                        {
                            "field": "prb",
                            "title": "PRB",
                            "width": "80px",
                            "template": "<span class='style-center'>#: prb #</span>"
                        },
                        {
                            "field": "kronis",
                            "title": "Kronis",
                            "width": "80px",
                            "template": "<span class='style-center'>#: kronis #</span>"
                        },
                        {
                            "field": "kemo",
                            "title": "Kemo",
                            "width": "80px",
                            "template": "<span class='style-center'>#: kemo #</span>"
                        },
                        {
                            "field": "harga",
                            "title": "Harga",
                            "width": "80px",
                            "template": "<span class='style-right'>{{formatRupiah('#: harga #', '')}}</span>"
                        },
                        {
                            "field": "restriksi",
                            "title": "Retreksi",
                            "width": "100px",
                            "template": "<span class='style-center'>#: restriksi #</span>"
                        },
                        {
                            "field": "generik",
                            "title": "Generik",
                            "width": "150px",
                            "template": "<span class='style-left'>#: generik #</span>"
                        },
                        {
                            "field": "sedia",
                            "title": "Sedia",
                            "width": "80px",
                            "template": "<span class='style-center'>#: sedia #</span>"
                        },
                        {
                            "field": "stok",
                            "title": "Stok",
                            "width": "80px",
                            "template": "<span class='style-center'>#: stok #</span>"
                            // "template": '# if( stok==null) {# <span class="style-center"> - </span> # } else {# <span class="style-center">#: stok #</span> #} #'
                        },
                        {
                            "field": "aktif",
                            "title": "Aktif",
                            "width": "80px",
                            "template": "<span class='style-center'>#: aktif #</span>"
                            // "template": '# if( aktif==null) {# <span class="style-center"> - </span> # } else {# <span class="style-center">#: aktif #</span> #} #'

                        },
                        // {
                        //     "command": [
                        //         {
                        //             text: "Detail",
                        //             click: getDetailPelayananResep,
                        //             imageClass: "k-icon k-i-search"
                        //         }
                        //     ],
                        //     title: "",
                        //     width: "70px",
                        // }
                    ]
            };

            $scope.columnDaftarPoli = {
                toolbar: [
                    "excel",
                ],
                excel: {
                    fileName: "DaftarPoli.xlsx",
                    allPages: true,
                },
                excelExport: function (e) {
                    var sheet = e.workbook.sheets[0];
                    sheet.frozenRows = 2;
                    sheet.mergedCells = ["A1:M1"];
                    sheet.name = "Orders";

                    var myHeaders = [{
                        value: "Daftar Poli",
                        fontSize: 20,
                        textAlign: "center",
                        background: "#ffffff",
                    }];

                    sheet.rows.splice(0, 0, { cells: myHeaders, type: "header", height: 70 });
                },
                selectable: 'row',
                pageable: true,
                columns:
                    [
                        {
                            "field": "no",
                            "title": "No",
                            "width": "20px",
                            "template": "<span class='style-center'>#: no #</span>"
                        },
                        {
                            "field": "kode",
                            "title": "Kode",
                            "width": "20px",
                            "template": "<span class='style-left'>#: kode #</span>"
                        },
                        {
                            "field": "nama",
                            "title": "Nama Poli",
                            "width": "150px",
                            "template": "<span class='style-left'>#: nama #</span>"
                        },
                    ]
            };

            $scope.columnDaftarSpesialistik = {
                toolbar: [
                    "excel",
                ],
                excel: {
                    fileName: "DaftarSpesialistik.xlsx",
                    allPages: true,
                },
                excelExport: function (e) {
                    var sheet = e.workbook.sheets[0];
                    sheet.frozenRows = 2;
                    sheet.mergedCells = ["A1:M1"];
                    sheet.name = "Orders";

                    var myHeaders = [{
                        value: "Daftar Spesialistik",
                        fontSize: 20,
                        textAlign: "center",
                        background: "#ffffff",
                    }];

                    sheet.rows.splice(0, 0, { cells: myHeaders, type: "header", height: 70 });
                },
                selectable: 'row',
                pageable: true,
                columns:
                    [
                        {
                            "field": "no",
                            "title": "No",
                            "width": "20px",
                            "template": "<span class='style-center'>#: no #</span>"
                        },
                        {
                            "field": "kode",
                            "title": "Kode",
                            "width": "20px",
                            "template": "<span class='style-left'>#: kode #</span>"
                        },
                        {
                            "field": "nama",
                            "title": "Nama Spesialistik",
                            "width": "150px",
                            "template": "<span class='style-left'>#: nama #</span>"
                        },
                    ]
            };

            $scope.columnDaftarFaskes = {
                toolbar: [
                    "excel",
                ],
                excel: {
                    fileName: "DaftarFaskes.xlsx",
                    allPages: true,
                },
                excelExport: function (e) {
                    var sheet = e.workbook.sheets[0];
                    sheet.frozenRows = 2;
                    sheet.mergedCells = ["A1:M1"];
                    sheet.name = "Orders";

                    var myHeaders = [{
                        value: "Daftar Faskes",
                        fontSize: 20,
                        textAlign: "center",
                        background: "#ffffff",
                    }];

                    sheet.rows.splice(0, 0, { cells: myHeaders, type: "header", height: 70 });
                },
                selectable: 'row',
                pageable: true,
                columns:
                    [
                        {
                            "field": "no",
                            "title": "No",
                            "width": "20px",
                            "template": "<span class='style-center'>#: no #</span>"
                        },
                        {
                            "field": "kode",
                            "title": "Kode",
                            "width": "30px",
                            "template": "<span class='style-left'>#: kode #</span>"
                        },
                        {
                            "field": "nama",
                            "title": "Nama Faskes",
                            "width": "150px",
                            "template": "<span class='style-left'>#: nama #</span>"
                        },
                    ]
            };
        }
    ]);
});
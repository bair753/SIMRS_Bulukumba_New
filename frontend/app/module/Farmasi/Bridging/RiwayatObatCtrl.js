define(['initialize', 'Configuration'], function (initialize, configuration) {
    'use strict';
    initialize.controller('RiwayatObatCtrl', ['$scope', '$state', 'MedifirstService',
        function ($scope, $state, medifirstService) {
            
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
            $scope.now = new Date();

            $scope.klaim = {};

            $scope.klaim.tglAwal = moment()
                .subtract(2, 'years')
                .startOf('day')
                .toDate();

            $scope.klaim.tglAkhir = moment()
                .startOf('day')
                .toDate();
            $scope.raharja = {}
            $scope.clear = function () {

                $scope.isRouteLoading = false;
                $scope.klaim.noKartu = undefined;
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
                "id": 0, "nama": "Semua"
            }, {
                "id": 1, "nama": "Obat PRB"
            }, {
                "id": 2, "nama": "Obat Kronis Blm Stabil"
            }, {
                "id": 3, "nama": "Obat Kemoterapi"
            }
            ];

            $scope.findKlaim = function (data) {
                $scope.isRouteLoading = true;
                var data = {
                    tglAwal: data.tglAwal,
                    tglAkhir: data.tglAkhir,
                    noKartu: data.noKartu
                }
                medifirstService.get("bridging/bpjs/get-riwayat-obat?tglAwal="
                    + moment(data.tglAwal).format('YYYY-MM-DD')
                    + "&tglAkhir="
                    + moment(data.tglAkhir).format('YYYY-MM-DD')
                    + "&noKartu="
                    + data.noKartu
                ).then(function (e) {
                    // document.getElementById("jsonKlaim").innerHTML = JSON.stringify(e.data, undefined, 4);
                    
                    $scope.isRouteLoading = false;
                    var response = e.data.response.list || {};

                    // Header
                    console.log(response);
                    $scope.namapeserta = response.namapeserta || '-';
                    $scope.nokartu = response.nokartu || '-';
                    $scope.tgllhr = response.tgllhr || '-';

                    // Detail
                    var data = response.history || [];
                    console.log(data);
                    $scope.dataDaftarPasienPulang = new kendo.data.DataSource({
                        data: data,
                        pageSize: 10
                    });
                }).then(function () {
                    $scope.isRouteLoading = false;
                });
            }
            // END KLAIM
             $scope.columnDaftarPasienPulang = {
                toolbar: [
                    "excel",
                ],
                excel: {
                    fileName: "DaftarKlaimApotek.xlsx",
                    allPages: true,
                },
                excelExport: function (e) {
                    var sheet = e.workbook.sheets[0];
                    sheet.frozenRows = 2;
                    sheet.mergedCells = ["A1:J1"];
                    sheet.name = "Orders";

                    var myHeaders = [{
                        value: "Daftar Klaim Apotek",
                        fontSize: 20,
                        textAlign: "center",
                        background: "#ffffff",
                    }];

                    sheet.rows.splice(0, 0, { cells: myHeaders, type: "header", height: 70 });
                },
                selectable: 'row',
                pageable: true,
                columns: [
                    {
                        field: "nosjp",
                        title: "No SJP",
                        width: "180px"
                    },
                    {
                        field: "tglpelayanan",
                        title: "Tgl Pelayanan",
                        width: "130px"
                    },
                    {
                        field: "noresep",
                        title: "No Resep",
                        width: "120px"
                    },
                    {
                        field: "kodeobat",
                        title: "Kode Obat",
                        width: "150px"
                    },
                    {
                        field: "namaobat",
                        title: "Nama Obat",
                        width: "300px"
                    },
                    {
                        field: "jmlobat",
                        title: "Jumlah Obat",
                        width: "120px",
                        attributes: {
                            style: "text-align:right"
                        },
                        headerAttributes: {
                            style: "text-align:center"
                        }
                    }
                ]
            };
            // HISTROI
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
        }
    ]);
});
define(['initialize', 'Configuration'], function (initialize, configuration) {
    'use strict';
    initialize.controller('MonitoringApotikOnlineCtrl', ['$scope', '$state', 'MedifirstService',
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
            $scope.PRB = {};
            $scope.raharja = {}
            $scope.clear = function () {

                $scope.isRouteLoading = false;
                $scope.klaim = {
                    bulan : moment($scope.now).format('MM'),
				    tahun : moment($scope.now).format('YYYY')
                };
                $scope.PRB = {
                    bulan : moment($scope.now).format('MM'),
				    tahun : moment($scope.now).format('YYYY')
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
                "id": 0, "nama": "Semua"
            }, {
                "id": 1, "nama": "Obat PRB"
            }, {
                "id": 2, "nama": "Obat Kronis Blm Stabil"
            }, {
                "id": 3, "nama": "Obat Kemoterapi"
            }
            ];

            $scope.findKlaim = function (item) {

                $scope.isRouteLoading = true;

                var param = {
                    status: item.statusKlaim.id,
                    jenisobat: item.jenisobat.id,
                    bulan: parseInt(moment(item.bulan).format('MM')),
                    tahun: moment(item.tahun).format('YYYY')
                };

                medifirstService.get(
                    "bridging/bpjs/get-monitoring-klaim-apotik-online?" +
                    "bulan=" + param.bulan +
                    "&tahun=" + param.tahun +
                    "&status=" + param.status +
                    "&jenisobat=" + param.jenisobat
                ).then(function (e) {

                    $scope.isRouteLoading = false;

                    var response = e.data.response || {};

                    // Header
                    $scope.jumlahData = parseInt(response.jumlahdata || 0);
                    $scope.totalBiayaPengajuan = parseFloat(response.totalbiayapengajuan || 0);
                    $scope.totalBiayaSetuju = parseFloat(response.totalbiayasetuju || 0);

                    // Detail
                    var data = response.listsep || [];

                    angular.forEach(data, function (item, index) {
                        item.no = index + 1;
                        item.biayapengajuan = parseFloat(item.biayapengajuan || 0);
                        item.biayasetujui = parseFloat(item.biayasetujui || 0);
                    });

                    $scope.dataDaftarPasienPulang = new kendo.data.DataSource({
                        data: data,
                        pageSize: 10
                    });

                }, function () {
                    $scope.isRouteLoading = false;
                });
            };
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
                        field: "no",
                        title: "No",
                        width: "50px"
                    },
                    {
                        field: "nosepapotek",
                        title: "No SEP Apotek",
                        width: "180px"
                    },
                    {
                        field: "nosepaasal",
                        title: "No SEP Asal",
                        width: "180px"
                    },
                    {
                        field: "nokapst",
                        title: "No Kartu",
                        width: "150px"
                    },
                    {
                        field: "nmpst",
                        title: "Nama Pasien",
                        width: "250px"
                    },
                    {
                        field: "noresep",
                        title: "No Resep",
                        width: "120px"
                    },
                    {
                        field: "nmjnsobat",
                        title: "Jenis Obat",
                        width: "200px"
                    },
                    {
                        field: "tglpelayanan",
                        title: "Tgl Pelayanan",
                        width: "120px",
                    },
                    {
                        field: "biayapengajuan",
                        title: "Biaya Pengajuan",
                        width: "150px",
                        attributes: {
                            style: "text-align:right"
                        },
                    },
                    {
                        field: "biayasetujui",
                        title: "Biaya Disetujui",
                        width: "150px",
                        attributes: {
                            style: "text-align:right"
                        },
                    }
                ]
            };
            $scope.findPRB = function (data) {
                $scope.isRouteLoading = true;
                var data = {
                    bulan: parseInt(new moment(data.bulan).format('MM')),
                    tahun: new moment(data.tahun).format('YYYY')
                }
                medifirstService.get("bridging/bpjs/get-monitoring-prb-apotik-online?bulan="
                    + data.bulan
                    + "&tahun="
                    + data.tahun
                  
                ).then(function (e) {
                    document.getElementById("jsonPRB").innerHTML = JSON.stringify(e.data, undefined, 4);
                }).then(function () {
                    $scope.isRouteLoading = false;
                });
            }
            
            // END KLAIM

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
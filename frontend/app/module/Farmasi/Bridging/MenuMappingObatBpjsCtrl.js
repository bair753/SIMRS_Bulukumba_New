define(['initialize', 'Configuration'], function (initialize, configuration) {
    'use strict';
    initialize.controller('MenuMappingObatBpjsCtrl', ['$rootScope', '$scope', '$state', 'MedifirstService',
        function ($rootScope, $scope, $state, medifirstService) {
            $scope.now = new Date();
            $scope.nav = function (state) {
                // debugger;
                $scope.currentState = state;
                $state.go(state, $state.params);
                console.log($scope.currentState);
            }
            $scope.item = {};
            $scope.item.start = 1
            $scope.item.limit = 10
            $scope.isShowPembuatanSep = false;
            $scope.isShowPotensi = true;
            $scope.isShowApproval = false;
            $scope.isShowTglPulang = false;
            $scope.isShowIntegrasi = false;
            $scope.isRouteLoading = false;
            $scope.listDokterBpjs = "";
            loadCombo();

            function loadCombo() {
                $scope.isRouteLoading = true;

                medifirstService.get("bridging/bpjs/get-daftar-obat-dpho").then(function (e) {
                    if (e.data.metaData.code == 200) {
                        $scope.listObatBpjs = e.data.response.list;
                    }
                });

                medifirstService.get("sysadmin/general/get-combo-produk-apol").then(function (e) {
                    console.log(e.data);
                    $scope.listProdukRs = e.data;
                    $scope.isRouteLoading = false;
                });

                LoadData();
            }

            $scope.columnGrid = {
                selectable: "row",
                pageable: true,
                columns: [
                    {
                        field: "no",
                        title: "No",
                        width: "50px"
                    },
                    {
                        field: "kdobatbpjs",
                        title: "Kode BPJS",
                        width: "100px"
                    },
                    {
                        field: "namaobat",
                        title: "Nama Obat BPJS",
                        width: "220px"
                    },
                    {
                        field: "namaproduk",
                        title: "Obat RS",
                        width: "220px"
                    },
                    {
                        field: "prb",
                        title: "PRB",
                        width: "60px",
                        template: "#= prb ? 'Ya' : '-' #"
                    },
                    {
                        field: "kronis",
                        title: "Kronis",
                        width: "70px",
                        template: "#= kronis ? 'Ya' : '-' #"
                    },
                    {
                        field: "kemo",
                        title: "Kemo",
                        width: "60px",
                        template: "#= kemo ? 'Ya' : '-' #"
                    },
                    {
                        command: [
                            // { text: "Edit", click: editMapping },
                            { text: "Hapus", click: hapusMapping }
                        ],
                        title: "&nbsp;",
                        width: "140px"
                    }
                ]
            };

            function editMapping(e) {
                e.preventDefault();

                var tr = $(e.target).closest("tr");
                var dataItem = this.dataItem(tr);

                $scope.item.obatBpjs = {
                    kodeobat: dataItem.kdobatbpjs,
                    namaobat: dataItem.namaobatbpjs
                };

                $scope.item.produkRs = {
                    id: dataItem.id,
                    namaproduk: dataItem.namaproduk
                };
            }

            function hapusMapping(e) {
                e.preventDefault();

                var tr = $(e.target).closest("tr");
                var dataItem = this.dataItem(tr);

                medifirstService.post(
                    "bridging/bpjs/hapus-data-mappingobatbpjs",
                    {
                        id: dataItem.id,
                        namaproduk: dataItem.namaproduk
                    }
                ).then(function () {
                    loadCombo();
                });
            }

            function LoadData() {

                var idProduk = "";
                if ($scope.item.produkRs)
                    idProduk = "&idProduk=" + $scope.item.produkRs.id;

                var kodeObat = "";
                if ($scope.item.obatBpjs)
                    kodeObat = "&kodeObatBpjs=" + $scope.item.obatBpjs.kodeobat;

                medifirstService.get(
                    "bridging/bpjs/get-data-mappingobatbpjs?"
                    + idProduk
                    + kodeObat
                ).then(function (data) {

                    var datas = data.data;

                    angular.forEach(datas, function (e, i) {
                        e.no = i + 1;
                    });

                    $scope.dataSource = new kendo.data.DataSource({
                        data: datas,
                        pageSize: 50
                    });

                    $scope.isRouteLoading = false;
                });
            }

            $scope.SearchData = function () {
                LoadData();
            }

            $scope.tambahMapping = function () {

                if (!$scope.item.obatBpjs) {
                    toastr.error("Obat BPJS belum dipilih");
                    return;
                }

                if (!$scope.item.produkRs) {
                    toastr.error("Obat RS belum dipilih");
                    return;
                }

                var objSave = {
                    kodeobatbpjs: $scope.item.obatBpjs.kodeobat,
                    idproduk: $scope.item.produkRs.id,
                    namaproduk: $scope.item.produkRs.namaproduk
                };

                medifirstService.post(
                    "bridging/bpjs/save-data-mappingobatbpjs",
                    objSave
                ).then(function () {
                    kosongkeun();
                });
            };

            function kosongkeun() {
                $scope.item.obatBpjs = undefined;
                $scope.item.produkRs = undefined;
                loadCombo();
            }

            $scope.Cancel = function () {
                kosongkeun();
            }
            //** BATAS */
        }
    ]);
});
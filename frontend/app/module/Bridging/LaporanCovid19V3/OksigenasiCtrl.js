define(['initialize'], function (initialize) {
    'use strict';
    initialize.controller('OksigenasiCtrl', ['$q', '$rootScope', '$scope', '$state', 'CacheHelper', 'MedifirstService', '$timeout', '$mdDialog',
        function ($q, $rootScope, $scope, $state, cacheHelper, medifirstService, $timeout, $mdDialog) {
            $scope.dataVOloaded = true;
			$scope.now = new Date();
            $scope.item = {};
            $scope.isRouteLoading = false

            $scope.listmeterkubik = [
                { id: 1, nama: "M3" },
                { id: 2, nama: "Liter" },
                { id: 3, nama: "Kg" },
                { id: 4, nama: "Ton" },
                { id: 5, nama: "Galon" },
            ]
            loaddata()

            function loaddata() {
                var json = {
                    "url": "Logistik/oksigen",
                    "method": "GET",
                    "jenis": "sirsonlinev3",
                    "data": null
                }
                $scope.isRouteLoading = true
                medifirstService.postNonMessage("bridging/kemenkes/tools", json).then(function (e) {
                    var data = e.data.Oksigenasi;
                    if(data[0].status === "202") {
                        toastr.info(data[0].message)
                    } else {
                        for (let i = 0; i < data.length; i++) {
                            data[i].no = i + 1;
                        }
                        $scope.dataDaftarOksigen = new kendo.data.DataSource({
                            data: data,
                            pageSize: 10,
                            total: data.length,
                            serverPaging: false,
                            sort: {
                                field: "tanggal",
                                dir: "desc"
                            },
                            schema: {
                                model: {
                                    fields: {
                                    }
                                }
                            }
                        });
                    }
                    $scope.isRouteLoading = false
                })
            }

            $scope.SearchData = function () {
                if($scope.item.periodeAwal == undefined) {
                    loaddata()
                } else {
                    var tgl = moment($scope.item.periodeAwal).format("YYYY-MM-DD");
                    var json = {
                        "url": "Logistik/oksigen",
                        "method": "GET",
                        "jenis": "sirsonlinev3",
                        "head": "x-tanggal: " + tgl,
                        "data": null
                    }
                    $scope.isRouteLoading = true
                    medifirstService.postNonMessage("bridging/kemenkes/tools", json).then(function (e) {
                        var data = e.data.Oksigenasi;
                        if(data[0].status === "202") {
                            toastr.info(data[0].message)
                        } else {
                            for (let i = 0; i < data.length; i++) {
                                data[i].no = i + 1;
                            }
                            $scope.dataDaftarOksigen = new kendo.data.DataSource({
                                data: data,
                                pageSize: 10,
                                total: data.length,
                                serverPaging: false,
                                sort: {
                                    field: "tanggal",
                                    dir: "desc"
                                },
                                schema: {
                                    model: {
                                        fields: {
                                        }
                                    }
                                }
                            });
                        }
                        $scope.isRouteLoading = false
                    })
                }
            }

            $scope.columnDaftarOksigen = {
                toolbar: [
                    {
                        name: "add", text: "Tambah",
                        template: '<button ng-click="Tambah()" class="k-button k-button-icontext k-grid-upload" href="\\#"><span class="k-icon k-i-plus"></span>Tambah</button>'
                    }
                ],
                scrollable: true,
                columns: [
                    {
                        "field": "no",
                        "title": "No",
                        "width": "40px",
                        "template": "<span class='style-center'>#: no #</span>"
                    },
                    {
                        "field": "tanggal",
                        "title": "Tanggal",
                        "width": "90px",
                        "template": "<span class='style-center'>#: tanggal #</span>"
                    },
                    {
                        "field": "",
                        "title": "Pemakaian",
                        headerAttributes: { style: "text-align : center" },
                        "columns": [
                            {
                                "field": "p_cair",
                                "title": "Oksigen Cair (m3)",
                                "width": "90px"
                            },
                            {
                                "field": "p_tabung_kecil",
                                "title": "Tabung Kecil 1m3 (tabung)",
                                "width": "90px"
                            },
                            {
                                "field": "p_tabung_sedang",
                                "title": "Tabung Sedang 2m3 (tabung)",
                                "width": "90px"
                            },
                            {
                                "field": "p_tabung_besar",
                                "title": "Tabung Sedang 6m3 (tabung)",
                                "width": "90px"
                            }
                        ]
                    },
                    {
                        "field": "",
                        "title": "Ketersediaan",
                        headerAttributes: { style: "text-align : center" },
                        "columns": [
                            {
                                "field": "k_isi_cair",
                                "title": "Oksigen Cair (m3)",
                                "width": "90px"
                            },
                            {
                                "field": "k_isi_tabung_kecil",
                                "title": "Tabung Kecil 1m3 (tabung)",
                                "width": "90px"
                            },
                            {
                                "field": "k_isi_tabung_sedang",
                                "title": "Tabung Sedang 2m3 (tabung)",
                                "width": "90px"
                            },
                            {
                                "field": "k_isi_tabung_besar",
                                "title": "Tabung Sedang 6m3 (tabung)",
                                "width": "90px"
                            }
                        ]
                    },
                    {
                        "field": "tgllapor",
                        "title": "Tanggal Lapor",
                        "width": "90px",
                        "template": "<span class='style-center'>#: tgllapor #</span>"
                    }
                ]
            }

            $scope.Tambah = function () {
                clear();
                $scope.popUp.center().open();
            }

            $scope.klikedit = function (dataOksigenSelected) {
                $scope.item.tanggal = new Date(dataOksigenSelected.tanggal);
                $scope.item.p_cair = parseFloat(dataOksigenSelected.p_cair)
                $scope.item.p_tabung_kecil = parseFloat(dataOksigenSelected.p_tabung_kecil)
                $scope.item.p_tabung_sedang = parseFloat(dataOksigenSelected.p_tabung_sedang)
                $scope.item.p_tabung_besar = parseFloat(dataOksigenSelected.p_tabung_besar)
                $scope.item.k_isi_cair = parseFloat(dataOksigenSelected.k_isi_cair)
                $scope.item.k_isi_tabung_kecil = parseFloat(dataOksigenSelected.k_isi_tabung_kecil)
                $scope.item.k_isi_tabung_sedang = parseFloat(dataOksigenSelected.k_isi_tabung_sedang)
                $scope.item.k_isi_tabung_besar = parseFloat(dataOksigenSelected.k_isi_tabung_besar)
                $scope.popUp.center().open();
            }

            $scope.simpanformoksigen = function () {
                if($scope.item.tanggal == undefined) {
                    toastr.error("Harap isikan tanggal terlebih dahulu !");
                    return
                }

                var tgl = moment($scope.item.tanggal).format("YYYY-MM-DD");
                var json = {
                    "url": "Logistik/oksigen",
                    "method": "POST",
                    "jenis": "sirsonlinev3",
                    "data": {
                        "tanggal": tgl,
                        "p_cair": $scope.item.p_cair == undefined ? 0 : $scope.item.p_cair,
                        "p_tabung_kecil": $scope.item.p_tabung_kecil == undefined ? 0 : $scope.item.p_tabung_kecil,
                        "p_tabung_sedang": $scope.item.p_tabung_sedang == undefined ? 0 : $scope.item.p_tabung_sedang,
                        "p_tabung_besar": $scope.item.p_tabung_besar == undefined ? 0 : $scope.item.p_tabung_besar,
                        "k_isi_cair": $scope.item.k_isi_cair == undefined ? 0 : $scope.item.k_isi_cair,
                        "k_isi_tabung_kecil": $scope.item.k_isi_tabung_kecil == undefined ? 0 : $scope.item.k_isi_tabung_kecil,
                        "k_isi_tabung_sedang": $scope.item.k_isi_tabung_sedang == undefined ? 0 : $scope.item.k_isi_tabung_sedang,
                        "k_isi_tabung_besar": $scope.item.k_isi_tabung_besar == undefined ? 0 : $scope.item.k_isi_tabung_besar,
                    }
                }
                $scope.isRouteLoading = true
                medifirstService.postNonMessage("bridging/kemenkes/tools", json).then(function (e) {
                    var data = e.data.Oksigenasi;
                    if(data[0].status === "200") {
                        toastr.success(data[0].message)
                    }
                    $scope.isRouteLoading = false
                    clear()
                    $scope.SearchData();
                    $scope.popUp.close();
                })
            }

            function clear() {
                $scope.item.tanggal = undefined
                $scope.item.p_cair = undefined
                $scope.item.p_tabung_kecil = undefined
                $scope.item.p_tabung_sedang = undefined
                $scope.item.p_tabung_besar = undefined
                $scope.item.k_isi_cair = undefined
                $scope.item.k_isi_tabung_kecil = undefined
                $scope.item.k_isi_tabung_sedang = undefined
                $scope.item.k_isi_tabung_besar = undefined
            }
        }
    ])
})
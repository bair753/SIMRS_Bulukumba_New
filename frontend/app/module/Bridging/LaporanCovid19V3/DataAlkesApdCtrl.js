define(['initialize'], function (initialize) {
    'use strict';
    initialize.controller('DataAlkesApdCtrl', ['$q', '$rootScope', '$scope', '$state', 'CacheHelper', 'MedifirstService', '$timeout', '$mdDialog',
        function ($q, $rootScope, $scope, $state, cacheHelper, medifirstService, $timeout, $mdDialog) {
            $scope.dataVOloaded = true;
			$scope.now = new Date();
            $scope.item = {};
            $scope.isSimpan = true
            loaddata()
            loadcombo()

            function loaddata() {
                var json = {
                    "url": "Fasyankes/apd",
                    "method": "GET",
                    "jenis": "sirsonlinev3",
                    "data": null
                }
                medifirstService.postNonMessage("bridging/kemenkes/tools", json).then(function (e) {
                    var data = e.data.apd;
                    for (let i = 0; i < data.length; i++) {
                        data[i].no = i + 1;
                    }
                    $scope.dataDaftarAPD = new kendo.data.DataSource({
                        data: data,
                        pageSize: 10,
                        total: data.length,
                        serverPaging: false,
                        sort: {
                            field: "tglupdate",
                            dir: "desc"
                        },
                        schema: {
                            model: {
                                fields: {
                                }
                            }
                        }
                    });
                })
            }

            function loadcombo() {
                var json = {
                    "url": "Referensi/kebutuhan_apd",
                    "method": "GET",
                    "jenis": "sirsonlinev3",
                    "data": null
                }
                medifirstService.postNonMessage("bridging/kemenkes/tools", json).then(function (e) {
                    $scope.listkebutuhan = e.data.kebutuhan_apd
                })
            }

            $scope.columnDaftarAPD = {
                toolbar: [
                    {
                        name: "add", text: "Tambah",
                        template: '<button ng-click="Tambah()" class="k-button k-button-icontext k-grid-upload" href="\\#"><span class="k-icon k-i-plus"></span>Tambah</button>'
                    },
                    {
                        name: "delete", text: "Hapus",
                        template: '<button ng-click="hapusData()" class="k-button k-button-icontext k-grid-upload" href="\\#"><span class="k-icon k-i-cancel"></span>Hapus</button>'
                    },
                ],
                columns: [
                    {
                        "field": "no",
                        "title": "No",
                        "width": "2%"
                    },
                    {
                        "field": "tglupdate",
                        "title": "Tanggal Update",
                        "width": "8%"
                    },
                    {
                        "field": "kebutuhan",
                        "title": "Kebutuhan",
                        "width": "30%"
                    },
                    {
                        "field": "jumlah_eksisting",
                        "title": "Jumlah Eksisting",
                        "width": "10%"
                    },
                    {
                        "field": "jumlah",
                        "title": "Jumlah",
                        "width": "10%"
                    },
                    {
                        "field": "jumlah_diterima",
                        "title": "Jumlah Diterima",
                        "width": "10%"
                    }
                ]
            }

            $scope.klikGrid = function (dataAPDSelected) {
                $scope.dataAPDSelected = dataAPDSelected;
            }

            $scope.Tambah = function () {
                clear()
                $scope.isSimpan = true
                $scope.popUp.center().open();
            }
            $scope.hapusData = function () {
                if($scope.dataAPDSelected === undefined) {
                    toastr.error("Pilih data yang akan dihapus terlebih dahulu !")
                    return
                }

                var json = {
                    "url": "Fasyankes/apd",
                    "method": "DELETE",
                    "jenis": "sirsonlinev3",
                    "data": {
                        "id_kebutuhan": $scope.dataAPDSelected.id_kebutuhan
                    }
                }
                medifirstService.postNonMessage("bridging/kemenkes/tools", json).then(function (e) {
                    var respon = e.data.apd;
                    if (respon.length > 0) 
                        toastr.info(respon[0].message);

                    clear()
                    loaddata()
                })
            }

            $scope.simpanformlogistik = function () {
                if($scope.item.kebutuhan === undefined) {
                    toastr.error("Harap pilih kebutuhan terlebih dahulu !");
                    return
                }
                if($scope.item.jumlah_eksisting === undefined) {
                    toastr.error("Harap isi jumlah eksisting terlebih dahulu !");
                    return
                }
                if($scope.item.jumlah === undefined) {
                    toastr.error("Harap isi jumlah terlebih dahulu !");
                    return
                }
                if($scope.item.jumlah_diterima === undefined) {
                    toastr.error("Harap isi jumlah diterima terlebih dahulu !");
                    return
                }

                var json = {
                    "url": "Fasyankes/apd",
                    "method": "POST",
                    "jenis": "sirsonlinev3",
                    "data": {
                        "id_kebutuhan": $scope.item.kebutuhan.id_kebutuhan,
                        "jumlah_eksisting": $scope.item.jumlah_eksisting,
                        "jumlah": $scope.item.jumlah,
                        "jumlah_diterima": $scope.item.jumlah_diterima
                    }
                }
                medifirstService.postNonMessage("bridging/kemenkes/tools", json).then(function (e) {
                    var respon = e.data.apd;
                    if (respon.length > 0) 
                        toastr.info(respon[0].message);

                    clear()
                    loaddata()
                })
            }

            $scope.updateformlogistik = function () {
                if($scope.item.kebutuhan === undefined) {
                    toastr.error("Harap pilih kebutuhan terlebih dahulu !");
                    return
                }
                if($scope.item.jumlah_eksisting === undefined) {
                    toastr.error("Harap isi jumlah eksisting terlebih dahulu !");
                    return
                }
                if($scope.item.jumlah === undefined) {
                    toastr.error("Harap isi jumlah terlebih dahulu !");
                    return
                }
                if($scope.item.jumlah_diterima === undefined) {
                    toastr.error("Harap isi jumlah diterima terlebih dahulu !");
                    return
                }

                var json = {
                    "url": "Fasyankes/apd",
                    "method": "PUT",
                    "jenis": "sirsonlinev3",
                    "data": {
                        "id_kebutuhan": $scope.item.kebutuhan.id_kebutuhan,
                        "jumlah_eksisting": $scope.item.jumlah_eksisting,
                        "jumlah": $scope.item.jumlah,
                        "jumlah_diterima": $scope.item.jumlah_diterima
                    }
                }
                medifirstService.postNonMessage("bridging/kemenkes/tools", json).then(function (e) {
                    var respon = e.data.apd;
                    if (respon.length > 0) 
                        toastr.info(respon[0].message);

                    clear()
                    loaddata()
                    $scope.popUp.close();
                })
            }

            $scope.klikedit = function (dataAPDSelected) {
                $scope.item.kebutuhan = { id_kebutuhan: dataAPDSelected.id_kebutuhan, kebutuhan: dataAPDSelected.kebutuhan }
                $scope.item.jumlah_eksisting = parseInt(dataAPDSelected.jumlah_eksisting)
                $scope.item.jumlah = parseInt(dataAPDSelected.jumlah)
                $scope.item.jumlah_diterima = parseInt(dataAPDSelected.jumlah_diterima)
                $scope.isSimpan = false
                $scope.popUp.center().open();
            }

            function clear() {
                $scope.item.kebutuhan = undefined
                $scope.item.jumlah_eksisting = undefined
                $scope.item.jumlah = undefined
                $scope.item.jumlah_diterima = undefined
            }
        }
    ])
})
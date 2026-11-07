define(['initialize', 'Configuration'], function (initialize, configuration) {
    'use strict';
    initialize.controller('ObatApotikOnlineCtrl', ['$scope', '$state', 'MedifirstService',
        function ($scope, $state, medifirstService) {
            $scope.now = new Date();

            $scope.nav = function (state) {
                $scope.currentState = state;
                $state.go(state, $state.params);
                console.log($scope.currentState);
            }
            $scope.sep = {};
            $scope.clearSEP = function () {

                $scope.isRouteLoading = false;
                $scope.sep = {
                    no : '',
                };
            };
            medifirstService.get("bridging/bpjs/get-datacombo", true).then(function (dat) {
                $scope.isRouteLoading = false;
                $scope.listProduk = dat.data.produk;
            });
            $scope.clear = function () {

                $scope.isRouteLoading = false;
                $scope.klaim = {
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

             $scope.Update = function (data) {
                
                if ($scope.obat.produk.id == undefined) {
                    toastr.error('Pilih Obat dulu', 'Info');
                    return
                }
                if ($scope.obat.jumlah == undefined) {
                    toastr.error('Jumlah Obat Belum Diisi', 'Info');
                    return
                }
                $scope.isRouteLoading = true;
                var data = {
                    "KDOBAT": $scope.obat.produk.id,
                    "STOK": $scope.obat.jumlah
                }
                console.log('DATA BARU KIRIM', data);
                var datas = {
                    data: data
                }
                medifirstService.post('bridging/bpjs/UpdateStokObat', datas).then(function (e) {
                    console.log(e.data.metaData.message);

                    toastr.info(e.data.metaData.message, 'Status');
                    document.getElementById("jsonSEP").innerHTML = JSON.stringify(e.data, undefined, 4);
                }).then(function () {
                    $scope.isRouteLoading = false;
                });
            }
            // END KLAIM

            // HISTROI
        }
    ]);
});
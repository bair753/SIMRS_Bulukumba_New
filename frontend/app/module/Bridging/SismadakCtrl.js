define(['initialize'], function (initialize) {
    'use strict';
    initialize.controller('SismadakCtrl', ['$q', '$rootScope', '$scope', '$state', 'CacheHelper', 'MedifirstService', '$timeout',
        function ($q, $rootScope, $scope, $state, cacheHelper, medifirstService, $timeout) {
            $scope.item = { date: new Date() };

            let data2 = []
            $scope.isRouteLoading = false

            medifirstService.get('bridging/sismadak/get-combo').then(function (e) {
                $scope.listIndikator = e.data.indikator
                $scope.listDepartemen = e.data.departemen
            })

            $scope.listTipe = [{ id: 'N', name: 'Numerator' }, { id: 'D', name: 'Denumerator' }]
            $scope.onTabChanges = function (value) {
                if (value === 1) {
                    loadDataJP()
                } else if (value === 2) {
                    loadMap()
                }
            };
            $scope.cari1 = function () {
                loadDataJP()
            }

            $scope.gridJenisPemeriksaan = {
                toolbar: [{
                    name: "create", text: "Input Baru",
                    template: '<button ng-click="inputBaru()" class="k-button k-button-icontext k-grid-upload" href="\\#"><span class="k-icon k-i-plus"></span>Tambah </button>'
                },],
                pageable: true,
                scrollable: true,
                columns: [
                    // { field: "rowNumber", title: "#", width: 40, width: 40, attributes: { style: "text-align:right; padding-right: 15px;"}, hideMe: true},
                    { field: "no", title: "No", width: 40 },
                    { field: "date", title: "Tanggal", width: 120 },
                    { field: "indicator_element", title: "Indikator", width: 250 },
                    { field: "type", title: "Tipe", width: 150 },
                    { field: "namadepartemen", title: "Departemen", width: 150 },
                    { field: "value", title: "Nilai", width: 120 },

                    {
                        command: [
                            { imageClass: "k-icon k-delete", text: "Hapus", click: hapus },
                            // { name: "edit", text: "Edit", click: editData },
                            // { imageClass: "k-icon k-edit", text: "Jawab", click: jawab },
                        ], title: "&nbsp;", width: 100
                    }
                ],
            };
            $scope.inputBaru = function () {
                $scope.popUp.center().open();
            }

            $scope.tutup = function () {
                $scope.popUp.close()
                $scope.item = {}
            }
            function hapus(e) {
                e.preventDefault();
                var grid = this;
                var row = $(e.currentTarget).closest("tr");
                var tr = $(e.target).closest("tr");
                var dataItem = this.dataItem(tr);
                medifirstService.post('bridging/sismadak/delete', { 'norec': dataItem.norec }).then(function (e) {
                    loadDataJP()
                })


            }

            function loadDataJP() {
                var nama = ''
                if ($scope.item.nama != undefined) {
                    nama = $scope.item.nama
                }
                $scope.isRouteLoading = true
                $scope.sourceJenisPemeriksaan = []
                medifirstService.get('bridging/sismadak/get?nama=' + nama).then(function (e) {

                    for (let i = 0; i < e.data.data.length; i++) {
                        const element = e.data.data[i];
                        element.no = i + 1
                        if (element.variable_type == 'N') {
                            element.type = 'Numerator'
                        } else {
                            element.type = 'Denumerator'
                        }
                    }

                    $scope.isRouteLoading = false
                    $scope.sourceJenisPemeriksaan = e.data.data
                })
            }

            $scope.resetFilter1 = function () {

                $scope.item = {};
            }
            $scope.save = function () {
                var tgl = moment($scope.item.date).format('YYYY-MM-DD')
                if (!$scope.item.indikator) {
                    toastr.error('Indikator harus di isi')
                    return
                }
                if (!$scope.item.departemen) {
                    toastr.error('Departemen harus di isi')
                    return
                }
                if (!$scope.item.type) {
                    toastr.error('Tipe harus di isi')
                    return
                }
                if (!$scope.item.jumlah) {
                    toastr.error('Nilai harus di isi')
                    return
                }
                var json = [{
                    'modules': 'imut_lokal',
                    'indicator_id': $scope.item.indikator.indicator_id,
                    'date': tgl,
                    'department_id': $scope.item.departemen.id,
                    'variable_type': $scope.item.type,
                    'value': $scope.item.jumlah
                }]
                medifirstService.post('bridging/sismadak/save', { 'data': json }).then(function (e) {

                    $scope.tutup()
                    loadDataJP()
                })

            }


            // ------------
            //***********************************

        }
    ]);
});

// http://127.0.0.1:1237/printvb/farmasiApotik?cetak-label-etiket=1&norec=6a287c10-8cce-11e7-943b-2f7b4944&cetak=1
define(['initialize'], function (initialize) {
    'use strict';
    initialize.controller('RealisasiRBACtrl', ['$scope', 'MedifirstService', '$state', 'CacheHelper', 'DateHelper',
        function ($scope, medifirstService, $state, cacheHelper, dateHelper) {
            $scope.isRouteLoading = false;
            $scope.item = {};
            $scope.dataVOloaded = true;
            $scope.now = new Date();            
            $scope.monthSelectorOptions = function () {
                return {
                    start: "decade",
                    depth: "decade"
                }
            };
            $scope.item.periodeTahun = $scope.now;
            var pegawaiUser = {}
            var dataCOA = []

            LoadCache();
            loadCombo();
            function LoadCache() {
                var chacePeriode = cacheHelper.get('RealisasiRBACtrl');
                if (chacePeriode != undefined) {
                    $scope.item.bulan = new Date(chacePeriode[0]);
                    $scope.item.tahun = new Date(chacePeriode[1]);

                    init();
                }
                else {
                    $scope.item.bulan = $scope.now;
                    $scope.item.tahun = $scope.now;
                    init();
                }
            }

            function loadCombo() {

            }

            $scope.munculJaya = false;
            function init() {
                $scope.isRouteLoading = true;
                var tahun = 'tahun=' + moment($scope.item.periodeTahun).format('YYYY');
                var noakun = '&kdrekening=' + $scope.item.filtera
                if ($scope.item.filtera == undefined) {
                    noakun = ''
                }
                var namaAkun = '&mataanggaran=' + $scope.item.filter
                if ($scope.item.filter == undefined) {
                    namaAkun = ''
                }
                medifirstService.get("perencanaan/get-data-realisasi-anggaran?" + tahun + noakun + namaAkun, true).then(function (dat) {
                    $scope.isRouteLoading = false;
                    $scope.munculJaya = true;                    
                    var datas = dat.data;
                    for (let i = 0; i < datas.length; i++) {
                        const element = datas[i];
                        element.no = i + 1;
                        // if (parseFloat(element.hargasatuan) == 0 && parseFloat(element.saldoawalblu) != 0) {
                        //     element.jumlah = parseFloat(element.saldoawalblu);
                        // }else if (parseFloat(element.saldoawalblu) == 0 && parseFloat(element.hargasatuan) != 0) {
                        //     var satuan = 1;
                        //     if (element.satuan != undefined) {
                        //         satuan = parseFloat(element.satuan);
                        //     }
                        //     element.jumlah = satuan * parseFloat(element.hargasatuan);
                        // }else{
                        //     element.jumlah = 0
                        // }
                        // element.total = element.jumlah - element.realiasi
                    }              
                    $scope.dataGrid = new kendo.data.DataSource({
                        data: datas,
                        sort: [
                            {
                                field: "kdrekening",
                                dir: "asc"
                            }
                        ],
                        pageSize: 100
                    });
                });

                var chacePeriode = {
                    0: $scope.item.bulan,
                    1: $scope.item.tahun,
                    2: '',
                    3: '',
                    4: '',
                    5: '',
                    6: ''
                }
                cacheHelper.set('RealisasiRBACtrl', chacePeriode);
            }

            $scope.cariFilter = function () {
                init();
            }

            $scope.optionsDataGrid = {
                toolbar: ["excel"],
                excel: {
                    fileName: "Realisasi RBA",
                    allPages: true,
                },
                filterable: {
                    extra: false,
                    operators: {
                        string: {
                            contains: "Contains",
                            startswith: "Starts with"
                        }
                    }
                },
                selectable: 'row',
                pageable: true,
                sortable: true,
                columns: [
                    {
                        "field": "no",
                        "title": "No",
                        "width": "45px",
                    },
                    {
                        "field": "kdrekening",
                        "title": "Kode",
                        "width": "110px",
                        "hidden": true,
                    },
                    {
                        "field": "kode",
                        "title": "Kode Rekening",
                        "width": "110px",
                        "template": '# if( kode==null) {#  # } else {# <span style="font-weight: bold;">#: kode #</span> #} #'
                    },
                    {
                        "field": "mataanggaran",
                        "title": "Mata Anggaran",
                        "width": "250px",
                        "template": '# if( turunan <= 6) {# <span style="font-weight: bold;">#: mataanggaran #</span> # } else {# #: mataanggaran # #} #'
                    },
                    {
                        "field": "volume",
                        "title": "Volume",
                        "width": "60px",
                        "template": '# if( volume==null) {#  # } else {# <span class="style-center">#: volume #</span> #} #'
                    },
                    {
                        "field": "satuananggaran",
                        "title": "Satuan",
                        "width": "100px",
                        "template": '# if( satuananggaran==null) {# <span style="font-weight: bold;" class="style-center">-</span> # } else {# <span style="font-weight: bold;" class="style-center">#: satuananggaran #</span> #} #'
                    },
                    {
                        "field": "hargasatuan",
                        "title": "Harga Satuan",
                        "width": "120px",
                        "template": "<span class='style-right'>{{formatRupiah('#: hargasatuan #', 'Rp.')}}</span>"
                    },
                    {
                        "field": "jumlah",
                        "title": "Saldo Awal BLUD",
                        "width": "120px",
                        "template": "<span class='style-right'>{{formatRupiah('#: jumlah #', 'Rp.')}}</span>"
                    },
                    {
                        "field": "realiasi",
                        "title": "Realisasi",
                        "width": "120px",
                        "template": "<span class='style-right'>{{formatRupiah('#: realiasi #', 'Rp.')}}</span>"
                    },
                    {
                        "field": "total",
                        "title": "Sisa Anggaran",
                        "width": "120px",
                        "template": "<span class='style-right'>{{formatRupiah('#: total #', 'Rp.')}}</span>"
                    }
                ]
            };

            $scope.formatRupiah = function (value, currency) {
                return currency + " " + parseFloat(value).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
            }

            $scope.formatTanggal = function (tanggal) {
                return moment(tanggal).format('DD-MM-YYYY');
            }

            function getLastDay(y, m) {
                if (m == 2 && y % 4 != 0) {
                    return 28
                }
                else {
                    return 31 + (m <= 7 ? ((m % 2) ? 1 : 0) : (!(m % 2) ? 1 : 0)) - (m == 2) - (m == 2 && y % 4 != 0 || !(y % 100 == 0 && y % 400 == 0));
                }
            }

            //***********************************
        }
    ]);
});

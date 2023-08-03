
define(['initialize'], function (initialize) {

    'use strict';
    initialize.controller('InputCheklisApdCtrl', ['$state', 'MedifirstService', '$rootScope', '$scope', 'DateHelper', '$timeout',
        function ($state, medifirstService, $rootScope, $scope, dateHelper, $timeout) {
            $scope.titleButton = 'Input APD'
            $scope.isRouteLoading = false;
            $scope.now = new Date();
            $scope.item = {};
            $scope.itemC = {};
            $scope.arrDokter = [];
            $scope.selectedData = [];
            var dataChecklist = [];
            var datana = []
            var data_head = []
            var dataARR = []
            var dataTea = [];
            $scope.item.tglInput = moment($scope.now).format('YYYY-MM-DD')
            FormLoad();

            function FormLoad() {
                $scope.item.bulan = $scope.now;
                $scope.monthOnly = {
                    start: "year",
                    depth: "year",
                    format: "MMMM yyyy",
                };
                LoadCombo();
            }

            function LoadCombo() {
                medifirstService.getPart('sysadmin/general/get-ruangan-part', true, true, 10).then(function (e) {
                    $scope.listRuangan = e;
                });

                medifirstService.get('sysadmin/general/get-combo-pegawai').then(function (e) {
                    $scope.listPegawai = e.data
                });

                datana = [
                    {
                        'no': '1', 'jeniskegiatan': 'Masker'
                    },
                    {
                        'no': '2', 'jeniskegiatan': 'Hand Scone'
                    },
                    {
                        'no': '3', 'jeniskegiatan': 'Sepatu Boot'
                    },
                    {
                        'no': '4', 'jeniskegiatan': 'Penutup Kepala'
                    },
                    {
                        'no': '5', 'jeniskegiatan': 'Penutup Kepala'
                    },
                    {
                        'no': '6', 'jeniskegiatan': 'Hand Srub'
                    }
                ]
            }


            $scope.cekAll = function (bool) {
                if (bool) {
                    $scope.listDokter.forEach(function (e) {
                        e.isChecked = true
                        $scope.arrDokter.push(e)
                    })
                } else {
                    $scope.listDokter.forEach(function (e) {
                        e.isChecked = false
                        $scope.arrDokter = []
                    })
                }
            }

            $("#calendar").kendoCalendar();
            var isCheckAll = false
            $scope.selectUnselectAllRow = function () {
                var tempData = $scope.dataSourceGrid._data;

                if (isCheckAll) {
                    isCheckAll = false;
                    for (var i = 0; i < tempData.length; i++) {
                        tempData[i].statCheckbox = false;
                        $scope.selectedData = []
                    }
                }
                else {
                    isCheckAll = true;
                    for (var i = 0; i < tempData.length; i++) {
                        tempData[i].statCheckbox = true;
                        $scope.selectedData.push(tempData[i])
                    }
                }

                console.log($scope.selectedData)
                reloaddataSourceGrid(tempData);
            }

            function reloaddataSourceGrid(ds) {

                var newDs = new kendo.data.DataSource({
                    data: ds,
                    pageSize: 20,
                    total: ds.length,
                    serverPaging: true,

                });

                var grid = $('#kGrid').data("kendoGrid");

                grid.setDataSource(newDs);
                grid.refresh();

            }

            $scope.selectRow = function (dataItem) {
                var dataSelect = _.find($scope.dataSourceGrid._data, function (data) {
                    return data.id == dataItem.id;
                });

                if (dataSelect.statCheckbox) {
                    dataSelect.statCheckbox = false;
                    for (let i = 0; i < $scope.selectedData.length; i++) {
                        if (dataSelect.norec == $scope.selectedData[i].norec) {
                            $scope.selectedData.splice([i], 1)
                            break
                        }
                    }
                }
                else {
                    dataSelect.statCheckbox = true;
                    $scope.selectedData.push(dataSelect)
                }
                console.log($scope.selectedData)
            }


            $scope.formatTanggal = function (tanggal) {
                if (tanggal != "null")
                    return moment(tanggal).format('DD-MMM-YYYY HH:mm');
                else
                    return '-'
            }

            $scope.cariDokter = function () {
                $scope.listTempDokter = []
                if ($scope.item.cariDokter != undefined) {
                    var textbox = $scope.item.cariDokter.toLowerCase()
                    for (let i = 0; i < $scope.listDokterCari.length; i++) {
                        var arr = $scope.listDokterCari[i].namalengkap.toLowerCase()
                        if (arr.indexOf(textbox) != -1) {
                            $scope.listTempDokter.push($scope.listDokterCari[i])
                        }
                    }
                    $scope.listDokter = []
                    $scope.listDokter = $scope.listTempDokter
                }
                if ($scope.item.cariDokter == "" || $scope.item.cariDokter == undefined)
                    $scope.listDokter = $scope.listDokterCari
            }


            $scope.inputJadwal = function () {
                if ($scope.item.ruangan == undefined) {
                    toastr.warning('Pilih ruangan terlebih dahulu')
                    return;
                }
                $scope.isInput = !$scope.isInput
                if ($scope.isInput) {
                    $scope.titleButton = 'Hide Input APD'
                    $scope.generateTable()
                } else
                    $scope.titleButton = 'Input APD'

            }

            $scope.generateTable = function () {
                $scope.column = [
                    {
                        "field": "no",
                        "title": "<h3 align=center>No.<h3>",
                        "width": "48px",
                        "filterable": false,
                        attributes: {
                            "class": "table-cell",
                            style: "text-align: center;"
                        }
                    },
                    {
                        "field": "jeniskegiatan",
                        "title": "<h3 align=center>Jenis Kegiatan<h3>",
                        "width": "410px",
                        "filterable": false,
                        attributes: {
                            "class": "table-cell",
                            style: "text-align: left;"
                        }
                    },
                    {
                        "title": "<h3 align=center>" + $scope.getBulan() + "<h3>",
                        "columns": $scope.createColumn(),
                        "filterable": false,
                        attributes: {
                            "class": "table-cell",
                            style: "text-align: center;"
                        }
                        // title: $scope.getBulan(),
                        // columns: $scope.createColumn(),
                    }
                ]
                $scope.mainGridOptionss = {
                    selectable: "cell",
                    // dataBound: $scope.onDataBound,
                    // change: onChange,
                    columns: [
                        {
                            "field": "no",
                            "title": "No",
                            "width": "48px",
                        },
                        {
                            "field": "jeniskegiatan",
                            "title": "Jenis Kegiatan",
                            "width": "180px",
                        },
                        {
                            "field": "namalengkap",
                            "title": "Inisial Petugas",
                            "width": "100px",
                        },
                        {
                            "field": "jenispegawai",
                            "title": "Profesi",
                            "width": "100px",
                        },
                        {
                            "field": "sarungtangan",
                            "title": "Sarung Tangan",
                            "width": "80px",
                        },
                        {
                            "field": "maskerbedah",
                            "title": "Masker Bedah",
                            "width": "80px",
                        },
                        {
                            "field": "maskern95",
                            "title": "Masker N95",
                            "width": "80px",
                        },
                        {
                            "field": "faceshield",
                            "title": "Google/Face Shield",
                            "width": "80px",
                        },
                        {
                            "field": "apron",
                            "title": "Apron",
                            "width": "80px",
                        },
                        {
                            "field": "gaun",
                            "title": "gaun",
                            "width": "80px",
                        },
                        {
                            "field": "penutupkepala",
                            "title": "Penutup Kepala",
                            "width": "80px",
                        },
                        {
                            "field": "sepatupelindung",
                            "title": "Sepatu Pelindung",
                            "width": "80px",
                        },
                        {
                            "field": "catatan",
                            "title": "Catatan",
                            "width": "200px",
                        },
                    ]

                }

                // var grid = $("#gridBulan").data("kendoGrid");
                // if (grid != undefined) {
                //     grid.destroy();
                    // grid.setDataSource( $scope.sourceJadwalBulanan);
                    // $("#gridBulan").empty().kendoGrid({
                    //     dataSource: $scope.sourceJadwalBulanan,
                    //     columns: $scope.column,
                    //     selectable: "cell",
                    //     dataBound: $scope.onDataBound,
                        // options: $scope.mainGridOptionss
                //     });
                // }
                // for (let i = 0; i < datana.length; i++) {
                //     const element = datana[i];
                //     element.listTgl = []

                // }
                // dataARR = []
                // dataARR = datana
                // $scope.sourceJadwalBulanan = new kendo.data.DataSource({
                //     data: dataChecklist,
                // });
            }

            $scope.sourceJadwalBulanan = new kendo.data.DataSource({
                data: dataChecklist,
                group: $scope.group,
                pageSize: 100,
                total: dataChecklist.length,
                serverPaging: false,
                schema: {
                    model: {
                    }
                }
            });

            $scope.bulanSelected = moment($scope.item.bulan).format("MMMM YYYY")

            $scope.getBulan = function () {
                $scope.bulanString = moment($scope.item.bulan).format("MMMM YYYY")
                return "<center>" + $scope.bulanString + "</center>";
            }

            function getHeader() {
                var kolomTitle = "Capaian : " + DateHelper.getBulanFormatted(new Date($scope.item.bulan));
                return kolomTitle;
            }

            $scope.createColumn = function () {
                var year = parseInt(moment($scope.item.bulan).format("Y"))
                var month = parseInt(moment($scope.item.bulan).format("M"))
                var tempDate = new Date(year, month, 0);

                var list = [];

                for (var i = 0; i < tempDate.getDate(); i++) {
                    var data = {
                        field: "[" + (i + 1) + "]",
                        title: (i + 1).toString(),
                        format: "{0:n1}",
                        width: "50px"
                    };

                    list.push(data);
                }

                return list;
            }

            $scope.addDokter = function (bool, data) {
                var index = $scope.arrDokter.indexOf(data);
                if (_.filter($scope.arrDokter, {
                    id: data.id
                }).length === 0 && bool)

                    $scope.arrDokter.push(data);
                else
                    $scope.arrDokter.splice(index, 1);
            }


            $scope.onDataBound = function (e) {
                data_head = [];
                var grid = $("#gridBulan").data("kendoGrid");
                $(grid.tbody).on("click", "td", function (e) {
                    var row = $(this).closest("tr");
                    var colIdx = $("td", row).index(this);
                    data_head = [];
                    $scope.selectedData = grid.dataItem(row);
                    if (colIdx > 1) {
                        var colDateIdx = colIdx - 1;
                        var no = grid.dataItem(row).no;                        
                        e.currentTarget.innerText = '✔'
                        var colDateIdx = colIdx - 1;
                        var colName = $('#gridBulan tr').eq(1).find('th').eq(colDateIdx).text();
                        if (colName.length === 1) {
                            colName = "0" + colName;
                        }
                        $scope.selectedData.listTgl = date;
                        var tgl = dateHelper.getFormatMonthPicker($scope.item.bulan);
                        var Tglset = "";
                        var tglTea = colDateIdx
                        if (tglTea.toString().length > 1) {
                            Tglset = colDateIdx
                        } else {
                            Tglset = '0' + colDateIdx
                        }
                        $scope.selectedData.listTgl = dateHelper.getFormatMonthPicker($scope.item.bulan) + "-" + Tglset;
                        var date = $scope.selectedData.listTgl
                        $scope.pushKeArray($scope.selectedData.no, $scope.selectedData.jeniskegiatan, $scope.selectedData.listTgl, date, e.currentTarget.innerText);
                    }
                });
            }

            $scope.batal = function () {
                $scope.item.jumlahPengunjung = undefined;
            }

            $scope.pushKeArray = function (id, nama, list, date, isi) {
                for (let i = 0; i < dataARR.length; i++) {
                    const element = dataARR[i];
                    if (isi == '') {
                        if (element.no == id) {
                            for (let e = 0; e < element.listTgl.length; e++) {                                
                                if (element.listTgl[e] == date) {
                                    element.listTgl.splice([e])
                                }
                            }

                        }
                    } else {
                        if (element.no == id) {
                            element.listTgl.push(date)                            
                            // for (var o = dataARR.length - 1; o >= 0; o--) {
                            //     if (dataARR[o].no == id) {                                    
                            //         dataARR[o].isi = isi                                    
                            //         dataARR[o].list.push(date)
                            //     }
                            // }
                        }
                    }
                }
            }

            $scope.save = function () {
                if ($scope.item.ruangan == undefined) {
                    toastr.error('Ruangan Tidak Boleh Kosong')
                    return
                }

                // if ($scope.itemC.pegawai == undefined) {
                //     toastr.error('Pegawai Tidak Boleh Kosong')
                //     return
                // }

                var data2 = []
                // for (let i = 0; i < dataARR.length; i++) {
                //     var isi = '';
                //     if (dataARR[i].isi == '✔') {
                //         isi = '01'
                //     } else {
                //         isi = '02'
                //     }                    
                //     data2.push({
                //         'tgl': dataARR[i].tgl,
                //         'isi': isi,
                //         'jeniskegiatan': dataARR[i].jeniskegiatan
                //     })                    
                // }
                // debugger
                // for (let i = 0; i < dataARR.length; i++) {
                //     for (let j = 0; j < dataARR[i].listTgl.length; j++) {
                //         data2.push({                        
                //             'jeniskegiatan': dataARR[i].jeniskegiatan,
                //             'tgl': dataARR[i].listTgl[j],
                //             'isi': '01',
                //         })
                //     }


                // }
                if (dataChecklist.length == 0) {
                    toastr.warning('Data belum diisi');
                    return
                }


                var objSave = {
                    'norec': '',
                    'ruanganfk': $scope.item.ruangan.id,
                    'tglinput': moment($scope.item.tglInput).format('YYYY-MM-DD hh:mm'),
                    'data': dataChecklist
                }
                medifirstService.post('rawatinap/save-data-apd', objSave).then(function (e) {
                    dataChecklist = []
                    $scope.sourceJadwalBulanan = new kendo.data.DataSource({
                        data: dataChecklist
                    });
                    searchData()
                    $scope.isInput = !$scope.isInput
                })
            }

            function searchData() {
                var dataGrid = [];
                var tgl = moment($scope.item.tglInput).format('YYYY-MM-DD')
                var ruangId = ''
                if ($scope.item.ruangan != undefined) {
                    ruangId = '&idRuangan=' + $scope.item.ruangan.id
                }
                var pegawaiId = ''
                if ($scope.item.pegawai != undefined) {
                    pegawaiId = '&idPegawai=' + $scope.item.pegawai.id
                }
                $scope.isRouteLoading = true;
                var dataGrid = [];
                medifirstService.get('rawatinap/get-data-cheklis-apd-new?tglinput=' + tgl
                    + pegawaiId + ruangId).then(function (e) {
                        $scope.isRouteLoading = false
                        $scope.datasSearch = e.data
                        for (var i = $scope.datasSearch.length - 1; i >= 0; i--) {
                            $scope.datasSearch[i].no = i + 1
                        }

                        if (!$scope.datasSearch) {
                            return toastr.success('Data tidak ditemukan', 'Info');
                        };

                        // $scope.datasSearch.forEach(function (element) {
                        //     var customData = {};
                        //     for (var key in element) {
                        //         switch (key) {
                        //             case "tgl":                                        
                        //                 var tgl = element.tgl;
                        //                 var key = tgl.slice(-1);
                        //                 if (key[0] === "0") {
                        //                     customData[key] = element.isian;
                        //                 } else {
                        //                     customData[key] = element.isian;
                        //                 }                                       
                        //                 break;
                        //             default:
                        //                 customData[key] = element[key];
                        //                 break;
                        //         }
                        //     };
                        //     dataGrid.push(customData);
                        // });
                        $scope.mainGridOption = {
                            dataSource: {
                                data: $scope.datasSearch,
                                aggregate: [
                                    // { field: "totalTindakan", aggregate: "sum" },
                                    // { field: "pointQty", aggregate: "sum" }
                                ]
                            },
                            toolbar: [
                                "excel",
                            ],
                            excel: {
                                fileName: "laporanCheklisApd.xlsx",
                                allPages: true,
                            },
                            excelExport: function (e) {                              
                            },
                            editable: false,
                            scrollable: true,
                            selectable: "row",
                            columns: [
                                {
                                    "field": "no",
                                    "title": "No",
                                    "width": "48px",
                                },
                                {
                                    "field": "jeniskegiatan",
                                    "title": "Jenis Kegiatan",
                                    "width": "180px",
                                },
                                {
                                    "field": "petugas",
                                    "title": "Inisial Petugas",
                                    "width": "100px",
                                },
                                {
                                    "field": "jenispegawai",
                                    "title": "Profesi",
                                    "width": "100px",
                                },
                                {
                                    "field": "sarungtangan",
                                    "title": "Sarung Tangan",
                                    "width": "80px",
                                },
                                {
                                    "field": "maskerbedah",
                                    "title": "Masker Bedah",
                                    "width": "80px",
                                },
                                {
                                    "field": "maskern95",
                                    "title": "Masker N95",
                                    "width": "80px",
                                },
                                {
                                    "field": "faceshield",
                                    "title": "Google/Face Shield",
                                    "width": "80px",
                                },
                                {
                                    "field": "apron",
                                    "title": "Apron",
                                    "width": "80px",
                                },
                                {
                                    "field": "gaun",
                                    "title": "gaun",
                                    "width": "80px",
                                },
                                {
                                    "field": "penutupkepala",
                                    "title": "Penutup Kepala",
                                    "width": "80px",
                                },
                                {
                                    "field": "sepatupelindung",
                                    "title": "Sepatu Pelindung",
                                    "width": "80px",
                                },
                                {
                                    "field": "isi",
                                    "title": "Catatan",
                                    "width": "200px",
                                },
                            ]
                        };
                        $scope.dataSource = new kendo.data.DataSource({
                            data: $scope.datasSearch
                        });
                    })
            }

            var timeoutPromise;
            $scope.$watch('item.cariDokters', function (newVal, oldVal) {
                $timeout.cancel(timeoutPromise);
                timeoutPromise = $timeout(function () {
                    if (newVal && newVal !== oldVal) {
                        applyFilter("namalengkap", newVal)
                    }
                }, 500)
            })

            $scope.cariDokterGrid = function () {
                applyFilter("namalengkap", $scope.item.cariDokters)
            }

            function applyFilter(filterField, filterValue) {
                var dataGrid = $("#kGrid").data("kendoGrid");
                var currFilterObject = dataGrid.dataSource.filter();
                var currentFilters = currFilterObject ? currFilterObject.filters : [];

                if (currentFilters && currentFilters.length > 0) {
                    for (var i = 0; i < currentFilters.length; i++) {
                        if (currentFilters[i].field == filterField) {
                            currentFilters.splice(i, 1);
                            break;
                        }
                    }
                }

                if (filterValue.id) {
                    currentFilters.push({
                        field: filterField,
                        operator: "eq",
                        value: filterValue.id
                    });
                } else {
                    currentFilters.push({
                        field: filterField,
                        operator: "contains",
                        value: filterValue
                    })
                }

                dataGrid.dataSource.filter({
                    logic: "and",
                    filters: currentFilters
                })
            }

            $scope.resetFilter = function () {
                var dataGrid = $("#kGrid").data("kendoGrid");
                dataGrid.dataSource.filter({});
                delete $scope.item.cariDokters;
            }

            $scope.hapusJadwal = function () {
                if ($scope.selectedData.length == 0) {
                    toastr.error('Ceklis data yang mau dihapus')
                    return
                }
                var json = {
                    'data': $scope.selectedData
                }
                medifirstService.post('rawatinap/hapus-jadwal-perbulan-pegawai', json).then(function (e) {
                    searchData()
                }, function error() {

                })
            }

            $scope.cari = function () {
                searchData();
            }

            $scope.generateTables = function () {
                $scope.columns = [
                    {
                        "field": "no",
                        "title": "<h3 align=center>No.<h3>",
                        "width": "48px",
                        "filterable": false,
                        attributes: {
                            "class": "table-cell",
                            style: "text-align: center;"
                        }
                    },
                    {
                        "field": "jeniskegiatan",
                        "title": "<h3 align=center>Jenis Kegiatan<h3>",
                        "width": "410px",
                        "filterable": false,
                        attributes: {
                            "class": "table-cell",
                            style: "text-align: left;"
                        }
                    },
                    {
                        "field": "isian",
                        "title": "<h3 align=center>" + $scope.getBulan() + "<h3>",
                        "columns": $scope.createColumn(),
                        "filterable": false,
                        attributes: {
                            "class": "table-cell",
                            style: "text-align: center;"
                        }                        
                    }
                ]
            }

            $scope.generateGridColumn = function () {
                var year = $scope.item.bulan.getYear();
                var month = $scope.item.bulan.getMonth();
                var dateInMonth = new Date(year, month + 1, 0);
                var listDay = [];
                for (var i = 0; i < dateInMonth.getDate(); i++) {
                    var data = {
                        field: "[" + (i + 1) + "]",
                        title: (i + 1).toString(),
                        width: "50px", attributes: { style: "text-align: right;" },
                        headerAttributes: { style: "text-align: center;  " }
                    };
                    listDay.push(data);
                }
                return listDay;
            }

            $scope.selectPegawai = function(data) {
                $scope.itemC.jenispegawai = data.jenispegawai
            }

            $scope.tambah = function() {
                if ($scope.itemC.pegawai == undefined) {
                    toastr.warning('Inisial Petugas belum diiisi!')
                    return
                }
                var no = 0
                if (dataChecklist.length == 0) {
                    no = 1
                } else {
                    no = dataChecklist[dataChecklist.length - 1].no + 1
                }
                if ($scope.itemC.no != undefined) {
                    no = $scope.itemC.no
                }
                var data = {}
                if ($scope.itemC.no != undefined) { // Edit
                    for (let i = 0; i < dataChecklist.length; i++) {
                        if (dataChecklist[i].no == $scope.itemC.no) {
                            data.no = $scope.itemC.no
                            data.id = $scope.itemC.pegawai.id
                            data.namalengkap = $scope.itemC.pegawai.namalengkap
                            data.jenispegawai = $scope.itemC.jenispegawai
                            data.jeniskegiatan = $scope.itemC.jeniskegiatan
                            data.catatan = $scope.itemC.catatan
                            data.sarungtangan = $scope.itemC.sarungtangan
                            data.maskerbedah = $scope.itemC.maskerbedah
                            data.maskern95 = $scope.itemC.maskern95
                            data.faceshield = $scope.itemC.faceshield
                            data.apron = $scope.itemC.apron
                            data.gaun = $scope.itemC.gaun
                            data.penutupkepala = $scope.itemC.penutupkepala
                            data.sepatupelindung = $scope.itemC.sepatupelindung
                        }
                        dataChecklist[i] = data
                        $scope.sourceJadwalBulanan = new kendo.data.DataSource({
                            data: dataChecklist
                        });
                        kosongkanIsian()
                    }
                } else { // Tambah
                    data = {
                        no: no,
                        id: $scope.itemC.pegawai.id,
                        namalengkap: $scope.itemC.pegawai.namalengkap,
                        jenispegawai: $scope.itemC.jenispegawai,
                        jeniskegiatan: $scope.itemC.jeniskegiatan,
                        catatan: $scope.itemC.catatan,
                        sarungtangan: $scope.itemC.sarungtangan,
                        maskerbedah: $scope.itemC.maskerbedah,
                        maskern95: $scope.itemC.maskern95,
                        faceshield: $scope.itemC.faceshield,
                        apron: $scope.itemC.apron,
                        gaun: $scope.itemC.gaun,
                        penutupkepala: $scope.itemC.penutupkepala,
                        sepatupelindung: $scope.itemC.sepatupelindung,
                    }
                    dataChecklist.push(data)
                    $scope.sourceJadwalBulanan = new kendo.data.DataSource({
                        data: dataChecklist
                    });
                    kosongkanIsian()
                }
            }

            function kosongkanIsian() {
                $scope.itemC.no = undefined
                $scope.itemC.pegawai = undefined
                $scope.itemC.jenispegawai = undefined
                $scope.itemC.jeniskegiatan = undefined
                $scope.itemC.catatan = undefined
                $scope.itemC.sarungtangan = undefined
                $scope.itemC.maskerbedah = undefined
                $scope.itemC.maskern95 = undefined
                $scope.itemC.faceshield = undefined
                $scope.itemC.apron = undefined
                $scope.itemC.gaun = undefined
                $scope.itemC.penutupkepala = undefined
                $scope.itemC.sepatupelindung = undefined
            }

            $scope.klikGridPro = function(dataSelectedKegiatan) {
                if (dataSelectedKegiatan == undefined) {
                    toastr.warning('Data belum dipilih')
                    return
                }
                $scope.itemC.no = dataSelectedKegiatan.no
                $scope.itemC.pegawai = { id: dataSelectedKegiatan.id, namalengkap: dataSelectedKegiatan.namalengkap }
                $scope.itemC.jenispegawai = dataSelectedKegiatan.jenispegawai
                $scope.itemC.jeniskegiatan = dataSelectedKegiatan.jeniskegiatan
                $scope.itemC.catatan = dataSelectedKegiatan.catatan
                $scope.itemC.sarungtangan = dataSelectedKegiatan.sarungtangan
                $scope.itemC.maskerbedah = dataSelectedKegiatan.maskerbedah
                $scope.itemC.maskern95 = dataSelectedKegiatan.maskern95
                $scope.itemC.faceshield = dataSelectedKegiatan.faceshield
                $scope.itemC.apron = dataSelectedKegiatan.apron
                $scope.itemC.gaun = dataSelectedKegiatan.gaun
                $scope.itemC.penutupkepala = dataSelectedKegiatan.penutupkepala
                $scope.itemC.sepatupelindung = dataSelectedKegiatan.sepatupelindung
            }

            $scope.batal = function() {
                kosongkanIsian()
            }

            $scope.hapus = function () {
				if ($scope.itemC.pegawai == undefined) {
					toastr.warning("Data belum dipilih")
                    return
				}
                if ($scope.itemC.no != undefined){
                    for (var i = dataChecklist.length - 1; i >= 0; i--) {
                        if (dataChecklist[i].no ==  $scope.itemC.no){                            
                            dataChecklist.splice(i, 1);
                        }
                    }
                }
                $scope.sourceJadwalBulanan = new kendo.data.DataSource({
                    data: dataChecklist
                });
                kosongkanIsian();
			}

            /////////////////////////////// // ///////
        }
    ]);

});
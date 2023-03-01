define(['initialize'], function (initialize) {
    'use strict';
    initialize.controller('LaporanPersediaanCtrl', ['$q', '$rootScope', '$scope', 'MedifirstService', '$state', 'CacheHelper', 'DateHelper',
        function ($q, $rootScope, $scope, medifirstService, $state, cacheHelper, dateHelper) {
            $scope.item = {};
            $scope.dataVOloaded = true;
            $scope.now = new Date();
            $scope.isRouteLoading = false;
            $scope.dataLogin = JSON.parse(window.localStorage.getItem('pegawai'));
            var details = [];                       
            $scope.selectedJenisProduk = []
            $scope.selectedDetailJenis = []
            LoadCache();
            $scope.item.neraca = false;
            $scope.awalBulanClosing = new Date("2021-07-01 00:00:00");
            // var tglawal = moment($scope.item.tglAwal).format('YYYY-MM-DD 00:00');
            // var tglakhir = moment($scope.item.tglAkhir).format('YYYY-MM-DD 23:59');
            $scope.monthSelectorOptions = function () {
                return {
                    start: "year",
                    depth: "year",
                    format: "MMMM yyyy",
                }
            }
            $scope.selectOptionsDetailJenis = {
                // placeholder: "Pilih Detail Jenis Produk...",
                dataTextField: "detailjenisproduk",
                dataValueField: "id",
                filter: "contains"
            };

            $scope.selectOptJenisProduk = {
                // placeholder: "Pilih Jenis Produk...",
                dataTextField: "jenisproduk",
                dataValueField: "id",
                filter: "contains"
            };

            function LoadCache() {
                $scope.item.bulan = $scope.now;
                $scope.item.bulanAkhir = $scope.now;
                medifirstService.get("logistik-stok/get-data-stock-flow", true).then(function (dat) {                    
                    $scope.listRuangan = medifirstService.getMapLoginUserToRuangan();
                    $scope.listJenisProduk = dat.data.jenisproduk
                    $scope.listDetailJenis = dat.data.detailjenisproduk
                    $scope.item.passwordSo = dat.data.password; 
                    var chacePeriode = cacheHelper.get('NeracaPersediaanCtrl');
                    // if (chacePeriode != undefined) {
                    //     $scope.item.tglAwal = new Date(chacePeriode[0]);
                    //     $scope.item.tglAkhir = new Date(chacePeriode[1]);
                    // }
                    // else {
                    //     $scope.item.tglAwal = new Date(moment($scope.now).format('YYYY-MM-DD 00:00:00'));
                    //     // $scope.item.tglAkhir = $scope.now;
                    //     $scope.item.tglAkhir = new Date(moment($scope.now).format('YYYY-MM-DD 23:59:59'))
                    //     // init();
                    // }
                });

            }

            function init() {
                $scope.isRouteLoading = true;
                $scope.dataGrid = {
                    data: [],
                    pageSize: 10,
                    selectable: true,
                    refresh: true,
                    total: 0,
                   
                };
                var listDetailJenis = ""
                if ($scope.selectedDetailJenis.length != 0) {
                    var a = ""
                    var b = ""
                    for (var i = $scope.selectedDetailJenis.length - 1; i >= 0; i--) {
                        var c = $scope.selectedDetailJenis[i].id
                        b = "," + c
                        a = a + b
                    }
                    listDetailJenis = a.slice(1, a.length)
                }

                var nmproduk = ""
                if ($scope.item.nmProduk != undefined) {
                    nmproduk = "&nmproduk=" + $scope.item.nmProduk
                }

                var idRuangan = ""
                if ($scope.item.ruangan != undefined) {
                    idRuangan = "&idRuangan=" + $scope.item.ruangan.id
                }

                var ttlsaldoawal = 0
                var ttlpenerimaan = 0
                var ttlpengeluaran = 0
                var ttlsaldoakhir = 0               
                var date = new Date($scope.item.bulan);
                var dateAkhir = new Date($scope.item.bulanAkhir);
                var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
                var lastDay = new Date(dateAkhir.getFullYear(), dateAkhir.getMonth() + 1, 0);
                var tglAwal = moment(firstDay).format('YYYY-MM-DD 00:00');
                var tglAkhir = moment(lastDay).format('YYYY-MM-DD 23:59');
                var tglawalsaldo = moment(lastDay).format('YYYY-MM-DD 00:00');
                var tglakhirsaldo = moment(lastDay).format('YYYY-MM-DD 23:59');
                var lalu = parseFloat(moment($scope.item.bulan).format('M')) - 1;
                
                var lalu = moment($scope.item.bulan).subtract(1, 'months')
                var bulanlalu = moment(lalu).format('MM.YYYY');
                var bln = moment($scope.item.bulan).format('MM.YYYY');
                medifirstService.get("logistik-stok/get-data-laporan-persediaan-v4?" +
                    "&blnLalu=" + bulanlalu +             
                    "&tglawal=" + tglAwal +
                    "&tglakhir=" + tglAkhir +
                    "&tglawalsaldo=" + tglawalsaldo +
                    "&tglakhirsaldo=" + tglakhirsaldo +
                    "&djp=" + listDetailJenis +
                    nmproduk + idRuangan, true).then(function (dat) {
                        var datas = dat.data.data
                        for (let i = 0; i < datas.length; i++) {
                            const element = datas[i];
                            element.no = i + 1
                        }
                        // $scope.item.ttlsaldoawal = parseFloat(ttlsaldoawal).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
                        // $scope.item.ttlpenerimaan = parseFloat(ttlpenerimaan).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
                        // $scope.item.ttlpengeluaran = parseFloat(ttlpengeluaran).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
                        // $scope.item.ttlsaldoakhir = parseFloat(ttlsaldoakhir).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
                        details = datas;                        
                        $scope.dataGrid = {
                            data: datas,
                            pageSize: 10,
                            selectable: true,
                            refresh: true,
                            total: datas.length,
                            schema: {
                                model: {
                                    fields: {
                                        hargasatuan: { type: "number" },
                                        totalrpsaldoawal: { type: "number" },
                                        hargaterima: { type: "number" },
                                        totalhargaterima: { type: "number" },
                                        hargakeluar: { type: "number" },
                                        totalhargakeluar: { type: "number" },
                                        hargasaldoakhir: { type: "number" },
                                        totalrpsaldoakhir: { type: "number" },
                                    }
                                }
                            },
                            aggregate: [

                                { field: 'hargasatuan', aggregate: 'sum' },
                                { field: 'totalrpsaldoawal', aggregate: 'sum' },
                                { field: 'hargaterima', aggregate: 'sum' },
                                { field: 'totalhargaterima', aggregate: 'sum' },
                                { field: 'hargakeluar', aggregate: 'sum' },
                                { field: 'totalhargakeluar', aggregate: 'sum' },
                                { field: 'hargasaldoakhir', aggregate: 'sum' },
                                { field: 'totalrpsaldoakhir', aggregate: 'sum' },
                            ]
                        };
                        $scope.dataExcel = datas;
                        $scope.isRouteLoading = false;
                    });

                var chacePeriode = {
                    0: tglAwal,
                    1: tglAkhir,
                    2: '',
                    3: '',
                    4: '',
                    5: '',
                    6: ''
                }
                cacheHelper.set('NeracaPersediaanCtrl', chacePeriode);
            }

            $scope.getRuangan = function () {
                $scope.listRuangan = $scope.item.instalasi.ruangan;
            }

            $scope.cariFilter = function () {
                // if ($scope.item.ruangan == undefined) {
                //     toastr.error("Ruangan Tidak Boleh Kosong!");
                //     return;
                // }
                init();
            }

            $scope.cariPopUp = function () {
                console.log($scope.selectedJenisProduk)
                init();
                $scope.popUpCari.close()
            }

            $scope.batal = function () {
                $scope.popUpCari.close()
            }

            $scope.Neraca = function () {
                // debugger;
                if ($scope.item.neraca == true) {
                    $scope.item.ruangan = ''

                }
            }

            $scope.closingPersediaan = function () {
                $scope.popUp.center().open();
            }

            $scope.lanjutkan = function () {
                var stt = 'false'
                if (confirm('Close Persediaan bulan "' + dateHelper.formatDate($scope.item.tglAkhir, "MMMM YYYY") + '"')) {
                    // Save it!
                    stt = 'true';
                    // var norec_tea = $scope.item.norecSaldo
                    // if ($scope.item.norecSaldo ==  undefined){
                    //     norec_tea ='-'
                    // }
                    var tgltgl = moment($scope.item.tglAkhir).format('YYYYMM');
                    var objSave =
                    {
                        ym: tgltgl,
                        data: details
                    }
                    manageLogistikPhp.postclosingpersediaan(objSave).then(function (e) {

                    })
                } else {
                    // Do nothing!
                    stt = 'false'
                }

                $scope.item.kataKunciPass = "";
                $scope.item.kataKunciConfirm = "";
                $scope.popUp.close();
            }

            $scope.formatTanggal = function (tanggal) {
                return moment(tanggal).format('DD-MMM-YYYY');
            }

            $scope.formatRupiah = function (value, currency) {
                return currency + " " + parseFloat(value).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
            }

            $scope.columnGrid = {
                toolbar: ["excel"],
                excel: {
                    fileName: "Laporan Persediaan" + moment($scope.item.tglAwal).format('DD/MMM/YYYY') + '-' + moment($scope.item.tglAkhir).format('DD/MMM/YYYY'),
                    allPages: true,
                },
                excelExport: function (e) {
                    var sheet = e.workbook.sheets[0];
                    var rows = e.workbook.sheets[0].rows;

                    // var sheet = e.workbook.sheets[0];
                    for (var rowIndex = 1; rowIndex < sheet.rows.length; rowIndex++) {
                        var row = sheet.rows[rowIndex];
                        for (var cellIndex = 0; cellIndex < row.cells.length; cellIndex++) {
                            //whatever you want to do with cells
                        }
                        if (row.cells[5] != undefined) {
                            row.cells[5].format = "#,##0";
                        }
                        if (row.cells[6] != undefined) {
                            row.cells[6].format = "#,##0";
                        }
                        if (row.cells[8] != undefined) {
                            row.cells[8].format = "#,##0";
                        }
                        if (row.cells[9] != undefined) {
                            row.cells[9].format = "#,##0";
                        }
                        if (row.cells[11] != undefined) {
                            row.cells[11].format = "#,##0";
                        }
                        if (row.cells[12] != undefined) {
                            row.cells[12].format = "#,##0";
                        }
                        if (row.cells[14] != undefined) {
                            row.cells[14].format = "#,##0";
                        }
                        if (row.cells[15] != undefined) {
                            row.cells[15].format = "#,##0";
                        }
                    }
                    for (var ri = 0; ri < rows.length; ri++) {
                        var row = rows[ri];

                        if (row.type == "group-footer" || row.type == "footer") {
                            for (var ci = 0; ci < row.cells.length; ci++) {
                                var cell = row.cells[ci];
                                row.cells[6].format = "#,##0.00";
                                row.cells[9].format = "#,##0.00";
                                row.cells[12].format = "#,##0.00";
                                row.cells[15].format = "#,##0.00";

                                if (cell.value) {
                                    if (cell.value.indexOf('Rp.') > -1) {
                                        cell.value = cell.value.replace("Rp. {{formatRupiah('", '')
                                        cell.value = cell.value.replace("', '')}}", '')
                                    }
                                    // Use jQuery.fn.text to remove the HTML and get only the text
                                    cell.value = $(cell.value).text();
                                    // Set the alignment
                                    cell.hAlign = "right";
                                }
                            }
                        }
                    }

                    sheet.frozenRows = 2;
                    sheet.mergedCells = ["A1:P1"];
                    sheet.name = "Orders";

                    var myHeaders = [{
                        value: "LAPORAN PERSEDIAAN",
                        fontSize: 20,
                        textAlign: "center",
                        background: "#ffffff",
                        // color:"#ffffff"
                    }];

                    sheet.rows.splice(0, 0, { cells: myHeaders, type: "header", height: 70 });
                },
                selectable: 'row',
                pageable: true,
                editable: false,
                sortable: true,
                columns: [
                    {
                        field: "no",
                        title: "No",
                        width: "45px",
                        Template: "<span class='style-center'>#: no #</span>",
                    },
                    {
                        field: "id",
                        title: "Kode",
                        width: "100px",
                        Template: "<span class='style-center'>#: id #</span>",
                    },
                    {
                        field: "namaproduk",
                        title: "Nama Barang",
                        width: "220px",
                        Template: "<span class='style-center'>#: namaproduk #</span>",
                    },
                    {
                        field: "satuanstandar",
                        title: "Satuan",
                        width: "100px",                        
                        Template: "<span class='style-center'>#: satuanstandar #</span>",
                        footerTemplate: "<span class='style-right'></span>"
                    },
                    {
                        field: "asalproduk",
                        title: "Sumber Dana",
                        width: "100px",                        
                        Template: "<span class='style-center'>#: asalproduk #</span>",
                        footerTemplate: "<span class='style-right'></span>"
                    },
                    {
                        title: "Saldo Awal",
                        headerAttributes: { style: "text-align : center" },
                        columns: [
                            {
                                field: "saldoawal",
                                title: "QTY",
                                width: "80px",
                                template: "<span class='style-right'>{{formatRupiah('#: saldoawal #', '')}}</span>"
                            },
                            {
                                field: "hargasatuan",
                                title: "Jumlah",
                                width: "120px",
                                template: "<span class='style-right'>{{formatRupiah('#: hargasatuan #', '')}}</span>"
                            },
                            {
                                field: "totalrpsaldoawal",
                                title: "Total Harga",
                                width: "150px",
                                template: "<span class='style-right'>{{formatRupiah('#: totalrpsaldoawal #', '')}}</span>",
                                aggregates: ["sum"],
                                attributes: { style: "text-align:right;" },
                                footerTemplate: "<span class='style-right'>Rp. {{formatRupiah('#: data.totalrpsaldoawal.sum  #', '')}}</span>"
                            },
                        ]
                    },
                    {
                        title: "Barang Masuk",
                        headerAttributes: { style: "text-align : center" },
                        columns: [
                            {
                                field: "qtyterima",
                                title: "QTY",
                                width: "80px",
                                template: "<span class='style-right'>{{formatRupiah('#: qtyterima #', '')}}</span>"
                            },
                            {
                                field: "returjual",
                                title: "Retur Jual",
                                width: "80px",
                                template: "<span class='style-right'>{{formatRupiah('#: returjual #', '')}} </span>"
                            },
                            {
                                field: "hargasatuan",
                                title: "Jumlah",
                                width: "120px",
                                template: "<span class='style-right'>{{formatRupiah('#: hargasatuan #', '')}}</span>"
                            },
                            {
                                field: "totalhargaterima",
                                title: "Total Harga",
                                width: "150px",
                                template: "<span class='style-right'>{{formatRupiah('#: totalhargaterima #', '')}}</span>",
                                aggregates: ["sum"],
                                attributes: { style: "text-align:right;" },
                                footerTemplate: "<span class='style-right'>Rp. {{formatRupiah('#: data.totalhargaterima.sum  #', '')}}</span>"
                            },
                        ]
                    },
                    {
                        title: "Pemakaian",
                        headerAttributes: { style: "text-align : center" },
                        columns: [
                            {
                                field: "qtykeluar",
                                title: "QTY",
                                width: "80px",
                                template: "<span class='style-right'>{{formatRupiah('#: qtykeluar #', '')}}</span>"
                            },
                            {
                                field: "returbeli",
                                title: "Retur Beli",
                                width: "80px",
                                template: "<span class='style-right'>{{formatRupiah('#: returbeli #', '')}}</span>"
                            },
                            {
                                field: "hargasatuan",
                                title: "Jumlah",
                                width: "120px",
                                template: "<span class='style-right'>{{formatRupiah('#: hargasatuan #', '')}}</span>"
                            },
                            {
                                field: "totalhargakeluar",
                                title: "Total Harga",
                                width: "150px",
                                template: "<span class='style-right'>{{formatRupiah('#: totalhargakeluar #', '')}}</span>",
                                aggregates: ["sum"],
                                attributes: { style: "text-align:right;" },
                                footerTemplate: "<span class='style-right'>Rp. {{formatRupiah('#: data.totalhargakeluar.sum  #', '')}}</span>"
                            },
                        ]
                    },
                    {
                        title: "Sisa Stok",
                        headerAttributes: { style: "text-align : center" },
                        columns: [
                            {
                                field: "saldoakhir",
                                title: "QTY",
                                width: "80px",
                                template: "<span class='style-right'>{{formatRupiah('#: saldoakhir #', '')}}</span>"
                            },
                            {
                                field: "hargasatuan",
                                title: "Jumlah",
                                width: "120px",
                                template: "<span class='style-right'>{{formatRupiah('#: hargasatuan #', '')}}</span>"
                            },
                            {
                                field: "totalrpsaldoakhir",
                                title: "Total Harga",
                                width: "150px",
                                template: "<span class='style-right'>{{formatRupiah('#: totalrpsaldoakhir #', '')}}</span>",
                                aggregates: ["sum"],
                                attributes: { style: "text-align:right;" },
                                footerTemplate: "<span class='style-right'>Rp. {{formatRupiah('#: data.totalrpsaldoakhir.sum  #', '')}}</span>"
                            },
                        ]
                    }
                ],
            };    
            
            $scope.BatalClosing = function () {
                $scope.item.kataKunciPass = "";
                $scope.item.kataKunciConfirm = "";
                $scope.popUp.close();
            }
            $scope.TutupDetailPersediaan = function(){
                $scope.popUpDetail.close();
            }

            $scope.ClosingSaldo = function () {
                $scope.popUp.center().open();                                                        
            };
            $scope.DetailPersediaan = function(){
                $scope.popUpDetail.center().open();
                $scope.item.idProdukDetail = $scope.dataSelected.id  
                $scope.item.nmProdukDetail = $scope.dataSelected.namaproduk  
                $scope.item.satuanDetail = $scope.dataSelected.satuanstandar  
                $scope.item.asalProdukdetail = $scope.dataSelected.asalproduk ;
                var date = new Date($scope.item.bulan);
                var dateAkhir = new Date($scope.item.bulanAkhir);
                var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
                var lastDay = new Date(dateAkhir.getFullYear(), dateAkhir.getMonth() + 1, 0);
                var tglAwal = moment(firstDay).format('YYYY-MM-DD 00:00');
                var tglAkhir = moment(lastDay).format('YYYY-MM-DD 23:59'); 
                medifirstService.get("logistik-stok/get-data-laporan-persediaan-detail-v3?" +          
                    "&tglawal=" + tglAwal +
                    "&tglakhir=" + tglAkhir +
                    "&idproduk=" + $scope.item.idProdukDetail , true).then(function (dat) {
                        var datas = dat.data.tr
                        for (let i = 0; i < datas.length; i++) {
                            const element = datas[i];
                            element.no = i + 1
                        }
                        // details = datas;                        
                        $scope.dataGridDetail = {
                            data: datas,
                            pageSize: 10,
                            selectable: true,
                            refresh: true,
                            total: datas.length,
                            schema: {
                                model: {
                                    fields: {
                                        qtyterima: { type: "number" },
                                        qtykeluar: { type: "number" }
                                    }
                                }
                            },
                            aggregate: [

                                { field: 'qtyterima', aggregate: 'sum' },
                                { field: 'qtykeluar', aggregate: 'sum' }
                            ]
                        };
                        $scope.dataExcel = datas;
                        $scope.isRouteLoading = false;
                    }
                );
            }
            $scope.columnGridDetail = {
                toolbar: ["excel"],
                excel: {
                    fileName: "Laporan Persediaan" + moment($scope.item.tglAwal).format('DD/MMM/YYYY') + '-' + moment($scope.item.tglAkhir).format('DD/MMM/YYYY'),
                    allPages: true,
                },
                
                selectable: 'row',
                pageable: true,
                editable: false,
                sortable: true,
                columns: [
                    {
                        field: "no",
                        title: "No",
                        width: "45px",
                        Template: "<span class='style-center'>#: no #</span>",
                    },
                    {
                        field: "norec",
                        title: "norec",
                        width: "220px",
                        Template: "<span class='style-center'>#: norec #</span>",
                    },
                    {
                        field: "trans",
                        title: "Jenis Transaksi",
                        width: "220px",
                        Template: "<span class='style-center'>#: trans #</span>",
                    },
                    {
                        field: "tgl",
                        title: "Tanggal",
                        width: "100px",
                        Template: "<span class='style-center'>#: tgl #</span>",
                    },
                    {
                        field: "ket",
                        title: "Keterangan",
                        width: "220px",
                        Template: "<span class='style-center'>#: ket #</span>",
                    },
                    {
                        field: "satuanstandar",
                        title: "Satuan",
                        width: "150px",                        
                        Template: "<span class='style-center'>#: satuanstandar #</span>",
                        footerTemplate: "<span class='style-right'></span>"
                    },
                    // {
                    //     field: "asalproduk",
                    //     title: "Sumber Dana",
                    //     width: "150px",                        
                    //     Template: "<span class='style-center'>#: asalproduk #</span>",
                    //     footerTemplate: "<span class='style-right'></span>"
                    // },
                    {
                        field: "qtyterima",
                        title: "Jumlah Masuk",
                        width: "120px",
                        template: "<span class='style-right'>{{formatRupiah('#: qtyterima #', '')}}</span>",
                        aggregates: ["sum"],
                        attributes: { style: "text-align:right;" },
                        footerTemplate: "<span class='style-right'>{{'#: data.qtyterima.sum  #'}}</span>"
                   
                    }, 
                    {
                        field: "qtykeluar",
                        title: "Jumlah Keluar",
                        width: "120px",
                        template: "<span class='style-right'>{{formatRupiah('#: qtykeluar #', '')}}</span>",
                        aggregates: ["sum"],
                        attributes: { style: "text-align:right;" },
                        footerTemplate: "<span class='style-right'>{{'#: data.qtykeluar.sum  #'}}</span>"
                    }, 
                    {
                        field: "hargasatuan",
                        title: "Harga Satuan",
                        width: "120px",
                        template: "<span class='style-right'>{{formatRupiah('#: hargasatuan #', '')}}</span>"
                    },
                ],
            };    

            function saveClosingPersediaan(){
                $scope.isRouteLoading = true;                
                var date = new Date($scope.item.bulan);
                var tglAwal = moment(new Date(date.getFullYear(), date.getMonth(), 1)).format('YYYY-MM-DD 00:00');
                var tglAkhir = moment(new Date(date.getFullYear(), date.getMonth(), + 1, 0)).format('YYYY-MM-DD 23:59');
                var bln = moment($scope.item.bulan).format('MM.YYYY');
                if (details.length > 0) {
                    $scope.isRouteLoading = false; 
                    var objSave = {
                        'tglawal' : tglAwal,
                        'tglakhir' : tglAkhir,
                        'bulan' : bln,
                        'ruanganfk' : null,//$scope.item.ruangan.id,
                        'details': details,                        
                    }

                    medifirstService.post('logistik/save-closing-persediaan-2021', objSave).then(function (e) {
                        // init();
                    });
                }else{
                    $scope.isRouteLoading = false; 
                    toastr.error("Data Tidak Ditemukan!");
                    return;
                }     
            }

            $scope.lanjutkan = function(){
                if ($scope.item.kataKunciPass != $scope.item.passwordSo) {
                    alert('Kata kunci / password salah')
                    $scope.isRouteLoading = false;
                    $scope.popUp.close();
                    return
                }

                // if ($scope.item.ruangan == undefined) {
                //     toastr.error("Data Ruangan Belum Dipilih!");
                //     $scope.item.kataKunciPass = "";
                //     $scope.item.kataKunciConfirm = "";
                //     return;
                // }

                $scope.item.kataKunciPass = "";
                $scope.item.kataKunciConfirm = "";
                $scope.popUp.close();
                saveClosingPersediaan();
            }
            
            //** BATAS */
        }
    ]);
});

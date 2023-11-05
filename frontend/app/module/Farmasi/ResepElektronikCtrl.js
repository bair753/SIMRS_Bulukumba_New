define(['initialize', 'Configuration'], function (initialize, config) {
    'use strict';
    initialize.controller('ResepElektronikCtrl', ['SaveToWindow', '$rootScope', '$scope', 'ModelItem', '$state', 'CacheHelper', 'DateHelper', '$mdDialog', 'CetakHelper', 'MedifirstService', '$q',
        function (saveToWindow, $rootScope, $scope, ModelItem, $state, cacheHelper, DateHelper, $mdDialog, cetakHelper, medifirstService, $q) {
            $scope.title = "Resep elektronik";
            $scope.dataVOloaded = true;
            $scope.item = {};
            var nomorEMR = '-'
            $rootScope.isOpen = true;
            FormLoad();
            // $scope.item.namaPasien = "";
            // $scope.item.ruangan = "";
            // $scope.getIsiComboRuangan = function () {
            //     $scope.listRuangan = $scope.departemen.ruangan
            // }
            // $scope.notDetail = true;
            //define column untuk grid

            function FormLoad() {
                medifirstService.get('farmasi/get-datacombo_dp').then(function (e) {
                    $scope.listRuangan = e.data.ruanganpelayanan
                    $scope.listRuanganDepo = e.data.ruanganfarmasi
                    $scope.listpetugas = e.data.petugas
                })
            }
              var onDataBound = function (e) {
                var kendoGrid = $("#kGrid").data("kendoGrid"); // get the grid widget
                var rows = e.sender.element.find("tbody tr"); // get all rows
                // iterate over the rows and if the undelying dataitem's Status field is PPT add class to the cell
                for (var i = 0; i < rows.length; i++) {
                    var row = rows[i];
                    var isambilobat = kendoGrid.dataItem(row).isambilobat;
                    if (isambilobat != null && isambilobat == '✔') {
                        $(row.cells[2]).addClass("green");
                         $(row.cells[15]).addClass("green");
                    }else{
                        // $(row.cells[1]).addClass("red");
                    }
                    var iskurir = kendoGrid.dataItem(row).iskurir;
                    if (iskurir != null && iskurir == '✔') {
                        $(row.cells[2]).addClass("koneng");
                         $(row.cells[16]).addClass("koneng");
                    }else{
                        // $(row.cells[1]).addClass("red");
                    }
                    
                }
            }
             $scope.arrColumnGridResepElektronik = {
                dataBound: onDataBound,
                toolbar: ["excel"],
                excel: {
                    fileName: "Data Resep Elektronik",
                    allPages: true,
                },
                // filterable: {
                //     extra: false,
                //     operators: {
                //         string: {
                //             contains: "Contains",
                //             startswith: "Starts with"
                //         }
                //     }
                // },
                selectable: 'row',
                scrollable: true,

                pageable: true,
                groupable: true,  
                columns: [
                {
                    "field": "noantri",
                    "title": "No Antri",
                    "width": "40px",
                },
                {
                    "field": "noorder",
                    "title": "No Pesanan",
                    "width": "60px",


                }, {
                    "field": "nocm",
                    "title": "No Rekam Medis",
                    "width": "60px",


                }, {
                    "field": "namapasien",
                    "title": "Nama Pasien",
                    "width": "100px",

                }, {
                    "field": "jeniskelamin",
                    "title": "Jenis Kelamin",
                    "width": "60px",

                }, {
                    "field": "namaruanganrawat",
                    "title": "Ruang Rawat",
                    "width": "100px",

                }, {
                    template: "#= new moment(new Date(tglorder)).format('DD-MM-YYYY HH:mm:ss') #",
                    "field": "strukOrder.tglOrder",
                    "title": "Tanggal/Jam Masuk",
                    "width": "100px",

                }, {
                    "field": "namalengkap",
                    "title": "Dokter",
                    "width": "100px",

                }, {
                    "field": "kelompokpasien",
                    "title": "Tipe Pasien",
                    "width": "60px",

                }, {
                    hidden: true,
                    "field": "namaruangan",
                    "width": "70px",
                    "title": "Depo",
                    aggregates: ["count"],
                    groupHeaderTemplate: "Ruangan #= value # "

                }, {
                    "field": "statusorder",
                    "title": "Status",
                    "width": "60px",

                }, {
                    "field": "namapengambilorder",
                    "title": "Pengambil Obat",
                    "width": "80px",

                },
                {
                    "field": "noruangan",
                    "title": "No Ruang",
                    "width": "80px",

                },
                {
                    "field": "cekreseppulang",
                    "title": "Resep Pulang",
                    "width": "80px",

                },
                {
                    "field": "isambilobat",
                    "title": "Resep Di Ambil Di RS",
                    "width": "80px",

                },
                {
                    "field": "iskurir",
                    "title": "Resep Diantar Kurir",
                    "width": "80px",

                },
                {
                    "field": "statusgrab",
                    "title": "Order Grab",
                    "width": "80px",

                },
                
                {
                    hidden: true,
                    "field": "jenis",
                    "width": "70px",
                    "title": "Jenis",
                    aggregates: ["count"],
                    groupHeaderTemplate: " #= value # "

                },]
            };

            LoadCache();
            function LoadCache() {
                var chacePeriode = cacheHelper.get('ResepElektronikCtrl');
                if (chacePeriode != undefined) {
                    //var arrPeriode = chacePeriode.split(':');
                    $scope.startDate = new Date(chacePeriode[0]);
                    $scope.untilDate = new Date(chacePeriode[1]);
                    if (chacePeriode[2] != null)
                        $scope.noCm = chacePeriode[2]
                    if (chacePeriode[3] != null)
                        $scope.namaPasien = chacePeriode[3]
                    if (chacePeriode[4] != null)
                        $scope.noPesanan = chacePeriode[4]
                    if (chacePeriode[5] != null)
                        $scope.departemen = chacePeriode[5]


                }
                else {
                    $scope.item.startDate = $scope.now;
                    $scope.item.untilDate = $scope.now;
                }
            }

            // $scope.noCm = "";
            // $scope.startDate = new Date();
            // $scope.untilDate = new Date();
            $scope.ruanganId = "";
            $scope.group = {
                field: "jenis",
                aggregates: [{
                    field: "jenis",
                    aggregate: "count"
                }]
            };
            // $scope.arrColumnGridResepElektronik = [{
            //     "field": "strukOrder.noOrder",
            //     "title": "No Pesanan",


            // }, {
            //     "field": "pasien.noCm",
            //     "title": "No Rekam Medis",


            // }, {
            //     "field": "pasien.namaPasien",
            //     "title": "Nama Pasien",

            // }, {
            //     "field": "pasien.jenisKelamin.jenisKelamin",
            //     "title": "Jenis Kelamin",

            // }, {
            //     "field": "strukOrder.ruangan.namaRuangan",
            //     "title": "Ruang Rawat",

            // }, {
            //     template: "#= new moment(new Date(strukOrder.tglOrder)).format('DD-MM-YYYY HH:mm:ss') #",
            //     "field": "strukOrder.tglOrder",
            //     "title": "Tanggal/Jam Masuk",

            // }, {
            //     "field": "penulisResep.namaLengkap",
            //     "title": "Dokter",

            // }, {
            //     "field": "strukOrder.pasienDaftar.kelompokPasien.kelompokPasien",
            //     "title": "Tipe Pasien",

            // }, {
            //     hidden: true,
            //     "field": "strukOrder.ruanganTujuan.namaRuangan",
            //     "title": "Depo",
            //     aggregates: ["count"],
            //     groupHeaderTemplate: "Ruangan #= value # "

            // }, {
            //     "field": "statusAntrian",
            //     "title": "Status",

            // }, {
            //     "field": "strukOrder.namaPengambilOrder",
            //     "title": "Pengambil Obat",

            // }];

            // $scope.noCm = "";
            // $scope.startDate = new Date();
            // $scope.untilDate = new Date();
            // $scope.ruanganId = "";
            // $scope.group = {
            //     field: "strukOrder.ruanganTujuan.namaRuangan",
            //     aggregates: [{
            //         field: "strukOrder.ruanganTujuan.namaRuangan",
            //         aggregate: "count"
            //     }]
            // };
            $scope.listStatus = [
                { id: 0, status: 'Menunggu' },
                { id: 1, status: 'Produksi' },
                { id: 2, status: 'Packaging' },
                { id: 3, status: 'Selesai' },
                { id: 4, status: 'Penyerahan Obat' },
                { id: 5, status: 'Verifikasi' },
            ]
            $scope.selectOptionStatus = {
                placeholder: "Status...",
                dataTextField: "status",
                dataValueField: "id",
                // dataSource:{
                //     data: $scope.listRuangan
                // },
                autoBind: false,

            };
            $scope.refresh = function () {
                $scope.isRouteLoading = true
                // debugger;
                var nocm = ''
                if ($scope.noCm != undefined) {
                    nocm = '&nocm=' + $scope.noCm
                }
                var namaPasien = ''
                if ($scope.namaPasien != undefined) {
                    namaPasien = '&namaPasien=' + $scope.namaPasien
                }
                var noPesanan = ''
                if ($scope.noPesanan != undefined) {
                    noPesanan = '&noPesanan=' + $scope.noPesanan
                }
                var departemenId = ''
                if ($scope.departemen != undefined) {
                    departemenId = '&departemenId=' + $scope.departemen.id
                }
                var ruanganId = ''
                if ($scope.ruangan != undefined) {
                    ruanganId = '&ruanganId=' + $scope.ruangan.id
                }
                var depoId = ''
                if ($scope.depo != undefined) {
                    depoId = '&depoId=' + $scope.depo.id
                }
                // var status = ''
                // if ($scope.status != undefined) {
                //     status = '&statusId=' + $scope.status.id
                // }
                var status = ""
                if ($scope.status != undefined) {
                    if ($scope.status.length != 0) {
                        var a = ""
                        var b = ""
                        for (var i = $scope.status.length - 1; i >= 0; i--) {
                            var c = $scope.status[i].id
                            b = "," + c
                            a = a + b
                        }
                        status = a.slice(1, a.length)
                    }
                }

                var tglAwal = moment($scope.startDate).format('YYYY-MM-DD');
                var tglAkhir = moment($scope.untilDate).format('YYYY-MM-DD');
                medifirstService.get('farmasi/get-daftar-order?tglAwal=' + tglAwal + '&tglAkhir=' + tglAkhir + nocm + namaPasien + noPesanan + ruanganId + departemenId + '&statusId=' + status + depoId).then(function (e) {
                    // findPasien.findOrderObat($scope.noCm, $scope.ruanganId, $scope.startDate, $scope.untilDate).then(function(e) {
                    for (var i = 0; i < e.data.length; i++) {
                        e.data[i].no = i + 1
                        var tanggal = $scope.now;
                        var tanggalLahir = new Date(e.data[i].tgllahir);
                        var umur = DateHelper.CountAge(tanggalLahir, tanggal);
                        e.data[i].umur = umur.year + ' thn ' + umur.month + ' bln ' + umur.day + ' hari'
                        //itungUsia(dat.data[i].tgllahir)
                        if (e.data[i].noorder == e.data[i].noresep) {
                            if (e.data[i].statusorder == 'Menunggu')
                                e.data[i].statusorder = 'Verifikasi'
                        }
                        if (e.data[i].checkreseppulang == '1') {
                            e.data[i].cekreseppulang = '✔'
                        } else {
                            e.data[i].cekreseppulang = '-'
                        }
                        if (e.data[i].isambilobat == true) {
                            e.data[i].isambilobat = "✔"                            
                        }else{
                            e.data[i].isambilobat = "✘"
                        }
                        if (e.data[i].isordergrab == true) {
                            e.data[i].statusgrab = "Sudah Order"                            
                        }else{
                            e.data[i].statusgrab = "-"
                        }
                        if (e.data[i].iskurir == true) {
                            e.data[i].iskurir = "✔"                            
                        }else{
                            e.data[i].iskurir = "✘"
                        }

                    }
                    $scope.isRouteLoading = false
                    e.data.sort(function (a, b) {
                        if (a.noantri < b.noantri) { return -1; }
                        if (a.noantri > b.noantri) { return 1; }
                        return 0;
                    })
                    $scope.patienGrids = new kendo.data.DataSource({
                        //data: ModelItem.beforePost(e.data.data, true),
                        data: ModelItem.beforePost(e.data, true),
                        group: $scope.group
                    });


                });
                var chacePeriode = {
                    0: tglAwal,
                    1: tglAkhir,
                    2: $scope.noCm != undefined ? $scope.noCm : null,
                    3: $scope.namaPasien != undefined ? $scope.namaPasien : null,
                    4: $scope.noPesanan != undefined ? $scope.noPesanan : null,
                    5: $scope.departemen != undefined ? $scope.departemen : null
                }
                cacheHelper.set('ResepElektronikCtrl', chacePeriode);
            };
            $scope.refresh();


            $scope.now = new Date();
            $scope.detailOrder = function () {

                //$state.go('ResepElektronikDetail', { noOrder: $scope.item.strukOrder.noOrder, noAntrianPasien: $scope.item.strukOrder.noRegistrasi.noRec });

                // *** OLD
                // var arrStr ={ 0 : $scope.item.nocm ,
                //     1 : $scope.item.namapasien,
                //     2 : $scope.item.jeniskelamin,
                //     3 : $scope.item.noregistrasi, 
                //     4 : $scope.item.umur,
                //     5 : $scope.item.klid,
                //     6 : $scope.item.namakelas,
                //     7 : $scope.item.tglregistrasi,
                //     8 : $scope.item.norec_apd,
                //     9 : 'detail'
                // }
                // cacheHelper.set('TransaksiPelayananApotikCtrl', arrStr);
                // $state.go('TransaksiPelayananApotik')
                var dataSet = []
                medifirstService.get("farmasi/get-detail-order?noorder=" + $scope.item.noorder, true).then(function (e) {
                    // medifirstService.get('farmasi/get-daftar-detail-order?norec_apd=' + $scope.item.norec_apd).then(function (e) {
                    $scope.item.tglorders = moment(new Date(e.data.strukorder.tglorder)).format('DD-MM-YYYY HH:mm')
                    $scope.item.noorders = $scope.item.noorder
                    $scope.item.dokters = $scope.item.namalengkap
                    $scope.item.statuss = $scope.item.statusorder
                    var dataGrids = e.data.orderpelayanan
                    for (let i = 0; i < dataGrids.length; i++) {
                        const element = dataGrids[i];
                        element.namaruangan = e.data.strukorder.namaruangan
                        if ($scope.item.reseppulang == '1') {
                            element.chekreseppulang = '✔'
                        } else {
                            element.chekreseppulang = '-'
                        }
                    }
                    // for (var i = e.data.orderpelayanan.length - 1; i >= 0; i--) {
                    //     e.data.orderpelayanan[i].no = i + 1
                    // for (let z = 0; z < e.data[i].details.length; z++) {
                    //     dataSet.push({
                    //         no: z + 1,
                    //         jeniskelamin: e.data[i].jeniskelamin,
                    //         kelompokpasien: e.data[i].kelompokpasien,
                    //         klid: e.data[i].klid,
                    //         namakelas: e.data[i].namakelas,
                    //         namalengkap: e.data[i].namalengkap,
                    //         namapasien: e.data[i].namapasien,
                    //         namapengambilorder: e.data[i].namapengambilorder,
                    //         namaruangan: e.data[i].namaruangan,
                    //         namaruanganrawat: e.data[i].namaruanganrawat,
                    //         nocm: e.data[i].nocm,
                    //         noorder: e.data[i].noorder,
                    //         norec: e.data[i].norec,
                    //         norec_apd: e.data[i].norec_apd,
                    //         noregistrasi: e.data[i].noregistrasi,
                    //         statusorder: e.data[i].statusorder,
                    //         tgllahir: e.data[i].tgllahir,
                    //         tglorder: e.data[i].tglorder,
                    //         tglregistrasi: e.data[i].tglregistrasi,
                    //         aturanpakai: e.data[i].details[z].aturanpakai,
                    //         hargasatuan: e.data[i].details[z].hargasatuan,
                    //         jeniskemasan: e.data[i].details[z].jeniskemasan,
                    //         jumlah: e.data[i].details[z].jumlah,
                    //         namaproduk: e.data[i].details[z].namaproduk,
                    //         noorder: e.data[i].details[z].noorder,
                    //         rke: e.data[i].details[z].rke,
                    //         satuanstandar: e.data[i].details[z].satuanstandar,
                    //         norecresep: e.data[i].details[z].norecresep,
                    //     })

                    // }
                    // }
                    // if (dataSet.length > 0) {
                    //     $scope.item.tglorders = dataSet[0].tglorder
                    //     $scope.item.noorders = dataSet[0].noorder
                    //     $scope.item.dokters = dataSet[0].namalengkap
                    //     $scope.item.statuss = dataSet[0].statusorder
                    // }
                    $scope.dataGridRiwayat = new kendo.data.DataSource({
                        data: e.data.orderpelayanan,
                        pageSize: 1000
                    });


                });
                $scope.popUp.center().open()
            }

            $scope.updateProduksi = function () {
                if ($scope.item.statusorder == 'Verifikasi') {
                    //managePasien.updateStatusOrder($scope.item.strukOrder.noOrder, 1).then(function(e) {
                    //
                    //managePasien.updateStatusOrder($scope.item.noorder, 1).then(function(e) {
                    var strukresep = ""
                    if ($scope.item.noorder == $scope.item.noresep) { //resep yang input langsung tanpa order
                        strukresep = true
                    }

                    var objSave = {
                        noorder: $scope.item.noorder,
                        statusorder: 1,
                        tglambil: null,
                        namapengambil: null,
                        strukresep: strukresep
                    }
                    medifirstService.post('farmasi/save-status-resepelektonik', objSave).then(function (e) {
                        medifirstService.postLogging('Rubah Status Produksi Order Resep Elektronik', 'No Order Struk Order',
                            $scope.item.noorder, 'Rubah Status Produksi Order Resep Elektronik No Order: ' + $scope.item.noorder + '/ Noregistrasi : ' + $scope.item.noregistrasi).then(function (res) {
                                $scope.refresh();
                            })
                    });
                    let params = $scope.item.noregistrasi    
                    if($scope.item.noreservasi != undefined && $scope.item.noreservasi != '' && $scope.item.noreservasi !='Kios-K'){
                        params = $scope.item.noreservasi
                    } 
                    saveAntrol(params,6,$scope.item.norec)//waktu layan faarmasi
                } else {
                    toastr.error("Status Data Belum Diverifikasi !!")
                    return;
                }
            }

            $scope.updatePackaging = function () {
                if ($scope.item.statusorder == 'Verifikasi' || $scope.item.statusorder == 'Produksi') {
                    //managePasien.updateStatusOrder($scope.item.strukOrder.noOrder, 2).then(function(e) {
                    // managePasien.updateStatusOrder($scope.item.noorder, 2).then(function(e) {
                    //     $scope.refresh();
                    // });;
                    var strukresep = ""
                    if ($scope.item.noorder == $scope.item.noresep) { //resep yang input langsung tanpa order
                        strukresep = true
                    }

                    var objSave =
                    {
                        noorder: $scope.item.noorder,
                        statusorder: 2,
                        tglambil: null,
                        namapengambil: null,
                        strukresep: strukresep
                    }
                    medifirstService.post('farmasi/save-status-resepelektonik', objSave).then(function (e) {
                        medifirstService.postLogging('Rubah Status Packaging Order Resep Elektronik', 'No Order Struk Order',
                            $scope.item.noorder, 'Rubah Status Packaging Order Resep Elektronik No Order: ' + $scope.item.noorder + '/ Noregistrasi : ' + $scope.item.noregistrasi).then(function (res) {
                                $scope.refresh();
                            })
                    });
                } else {
                    if ($scope.item.statusorder == 'Menunggu') {
                        toastr.error("Status Data Belum Diverifikasi !!")
                        return;
                    } else {
                        toastr.error("Status Data Belum Produksi !!")
                        return;
                    }
                }
            }
            $scope.updateDone = function () {
                if ($scope.item.statusorder == 'Verifikasi' || $scope.item.statusorder == 'Packaging') {
                    //managePasien.updateStatusOrder($scope.item.strukOrder.noOrder, 3).then(function(e) {
                    // managePasien.updateStatusOrder($scope.item.noorder, 3).then(function(e) {
                    //     $scope.refresh();
                    // });;
                    var strukresep = ""
                    if ($scope.item.noorder == $scope.item.noresep) { //resep yang input langsung tanpa order
                        strukresep = true
                    }
                    var objSave =
                    {
                        noorder: $scope.item.noorder,
                        statusorder: 3,
                        tglambil: null,
                        namapengambil: null,
                        strukresep: strukresep
                    }
                    medifirstService.post('farmasi/save-status-resepelektonik', objSave).then(function (e) {
                        var userLogin = medifirstService.getPegawaiLogin();
                        var Norec = $scope.item.noresep;
                        var Noreg = $scope.item.noregistrasi;
                        if ($scope.item.statusorder == 'Verifikasi' || $scope.item.statusorder == 'Packaging' || $scope.item.statusorder == 'Selesai') {
                            var stt = 'false'
                            if (confirm('View Antrian Farmasi? ')) {
                                // Save it!
                                stt = 'true';
                            } else {
                                // Do nothing!
                                stt = 'false'
                            }
                            var client = new HttpClient();
                            client.get('http://127.0.0.1:1237/printvb/farmasi?cetak-buktiantrianfarmasi=' + Norec + '&noregistrasi=' + Noreg + '&view=' + stt, function (response) {
                                // aadc=response;
                            });
                        }
                        medifirstService.postLogging('Rubah Status Selasai Order Resep Elektronik', 'No Order Struk Order',
                            $scope.item.noorder, 'Rubah Status Selasai Order Resep Elektronik No Order: ' + $scope.item.noorder + '/ Noregistrasi : ' + $scope.item.noregistrasi).then(function (res) {
                                $scope.refresh();
                            })
                    });
                } else {
                    if ($scope.item.statusorder == 'Menunggu') {
                        toastr.error("Status Data Belum Diverifikasi !!")
                        return;
                    } else {
                        toastr.error("Status Data Belum Packaging !!")
                        return;
                    }
                }
            }

            $scope.verifikasi = function () {
                // debugger;
                if ($scope.item.statusorder == 'Menunggu') {
                    //$state.go('ResepElektronikVerifikasi', { noOrder: $scope.item.strukOrder.noOrder, noAntrianPasien: $scope.item.strukOrder.noRegistrasi.noRec });
                    var arrStr = {
                        0: $scope.item.nocm,
                        1: $scope.item.namapasien,
                        2: $scope.item.jeniskelamin,
                        3: $scope.item.noregistrasi,
                        4: $scope.item.umur,
                        5: $scope.item.klid,
                        6: $scope.item.namakelas,
                        7: $scope.item.tglregistrasi,
                        8: $scope.item.norec_apd,
                        9: $scope.item.noorder,
                        10: $scope.item.jenisPenjamin,
                        11: $scope.item.kelompokPasien,
                        12: $scope.item.beratBadan,
                        13: $scope.item.AlergiYa,
                        14: ''
                    }
                    cacheHelper.set('InputResepApotikCtrl', arrStr);
                    $state.go('InputResepApotik')
                } else {
                    alert('Sudah di verifikasi!!')
                }
            }
            $scope.ambilObat = function () {
                if ($scope.item.statusorder == 'Selesai') {
                    // noresep
                    $scope.item.tglambil = new Date()
                    var client = new HttpClient();
                    client.get('http://127.0.0.1:2905/printvb/Pendaftaran?displaykeun=1&noantri=' + $scope.item.noantri + '&namapasien=' + $scope.item.nocm + ', ' + $scope.item.namapasien + '&view=true', function (response) {
                        // do something with response
                    });
                    let params = $scope.item.noregistrasi    
                    if($scope.item.noreservasi != undefined && $scope.item.noreservasi != '' && $scope.item.noreservasi !='Kios-K'){
                        params = $scope.item.noreservasi
                    } 
                    saveAntrol(params,7,$scope.item.norec)//waktu penyerahan obat faarmasi
                    // if ( $scope.item.statusorder == 'Selesai') {
                    $scope.popup.center().open();
                    //$state.go('ResepElektronikAmbilObat', { noOrder: $scope.item.strukOrder.noOrder, noAntrianPasien: $scope.item.strukOrder.noRegistrasi.noRec });
                    // $state.go('ResepElektronikAmbilObat', { noOrder: $scope.item.noorder, noAntrianPasien: $scope.item.norec_apd });
                    // } else {
                    // alert('Status harus Selesai!!')
                    // }
                } else {
                    toastr.error("Status Data Harus Selesai !!")
                    return;
                }

            }

            $scope.saveambilobat = function () {
                var nm = ''
                if ($scope.item.namapengambil != undefined) {
                    nm = $scope.item.namapengambil
                }
                var strukresep = ""
                if ($scope.item.noorder == $scope.item.noresep) { //resep yang input langsung tanpa order
                    strukresep = true
                }
                var objSave =
                {
                    noorder: $scope.item.noorder,
                    statusorder: 4,
                    tglambil: moment($scope.item.tglambil).format('YYYY-MM-DD HH:mm'),
                    namapengambil: nm,
                    strukresep: strukresep
                }
                medifirstService.post('farmasi/save-status-resepelektonik', objSave).then(function (e) {
                    medifirstService.postLogging('Rubah Status Sudah Di Ambil Order Resep Elektronik', 'No Order Struk Order',
                        $scope.item.noorder, 'Rubah Status Sudah Di Ambil Order Resep Elektronik No Order: ' + $scope.item.noorder + '/ Noregistrasi : ' + $scope.item.noregistrasi).then(function (res) {
                            $scope.refresh();
                            $scope.popup.close()
                        })
                });
            }


            $scope.columnGridRiwayat = [
                {
                    "field": "no",
                    "title": "No",
                    "width": "30px",
                },
                // {
                //     "field": "tglorder",
                //     "title": "Tgl Order",
                //     "width" : "50px",
                // },
                // {
                //     "field": "noorder",
                //     "title": "No Order",
                //     "width" : "60px",
                // },
                {
                    field: "rke",
                    title: "Rke",
                    width: "50px",
                },
                {
                    field: "jeniskemasan",
                    title: "Jenis Kemasan",
                    width: "100px",
                },
                {
                    field: "namaproduk",
                    title: "Deskripsi",
                    width: "200px"
                },
                {
                    field: "satuanstandar",
                    title: "Satuan",
                    width: "100px"
                },
                {
                    field: "aturanpakai",
                    title: "Aturan Pakai",
                    width: "100px"
                },
                {
                    field: "jumlah",
                    title: "Qty",
                    width: "100px"
                },
                {
                    field: "keterangan",
                    title: "Keterangan",
                    width: "200px"
                },
                // {
                //     "field": "namalengkap",
                //     "title": "Dokter",
                //     "width" : "100px"
                // },
                {
                    "field": "namaruangan",
                    "title": "Apotik",
                    "width": "70px",
                },
                {
                    "field": "chekreseppulang",
                    "title": "Resep Pulang",
                    "width": "70px",
                }
                // {
                //     "field": "statusorder",
                //     "title": "Status",
                //     "width" : "70px",
                // }
            ];
            var HttpClient = function () {
                this.get = function (aUrl, aCallback) {
                    var anHttpRequest = new XMLHttpRequest();
                    anHttpRequest.onreadystatechange = function () {
                        if (anHttpRequest.readyState == 4 && anHttpRequest.status == 200)
                            aCallback(anHttpRequest.responseText);
                    }

                    anHttpRequest.open("GET", aUrl, true);
                    anHttpRequest.send(null);
                }
            }
            $scope.detailGridOptions = function (dataItem) {
                return {
                    dataSource: new kendo.data.DataSource({
                        data: dataItem.details
                    }),
                    columns: [
                        {
                            field: "rke",
                            title: "Rke",
                            width: "30px",
                        },
                        {
                            field: "jeniskemasan",
                            title: "Jenis Kemasan",
                            width: "100px",
                        },
                        {
                            field: "namaproduk",
                            title: "Deskripsi",
                            width: "200px"
                        },
                        {
                            field: "satuanstandar",
                            title: "Satuan",
                            width: "100px"
                        },
                        {
                            field: "aturanpakai",
                            title: "Aturan Pakai",
                            width: "100px"
                        },
                        {
                            field: "jumlah",
                            title: "Qty",
                            width: "100px"
                        }]
                };
            };

            $scope.cetakLabeKecil = function () {
                var userLogin = medifirstService.getPegawaiLogin();
                if ($scope.item.statusorder == 'Verifikasi' || $scope.item.statusorder == 'Packaging' || $scope.item.statusorder == 'Selesai' || $scope.item.statusorder == 'Sudah Di Ambil') {
                    var Norec = $scope.item.norecresep;
                    var local = JSON.parse(localStorage.getItem('profile'));
                    var stt = 'false'
                    if (Norec == undefined) {
                        // Save it!
                        toastr.error('Pilih data dulu')
                        stt = 'true';
                        return;
                    } else {
                        // Do nothing!
                        stt = 'false'
                        var local = JSON.parse(localStorage.getItem('profile'));
                        var nama = medifirstService.getPegawaiLogin().namalengkap;
                        console.log(config.baseApiBackend);
                        window.open(config.baseApiBackend + 'report/cetak-labelkecil-apotik?norec='
                        + Norec +'&kdprofile=' + local.id + '&userlogin=' + userLogin.namaLengkap, '_blank');
                    }
                }
            }

            // $scope.cetakLabeKecil = function () {
            //     var userLogin = medifirstService.getPegawaiLogin();
            //     if ($scope.item.statusorder == 'Verifikasi' || $scope.item.statusorder == 'Packaging' || $scope.item.statusorder == 'Selesai' || $scope.item.statusorder == 'Sudah Di Ambil') {
            //         var Norec = $scope.item.norecresep;
            //         var stt = 'false'
            //         if (confirm('View Label? ')) {
            //             // Save it!
            //             stt = 'true';
            //         } else {
            //             // Do nothing!
            //             stt = 'false'
            //         }
            //         var client = new HttpClient();
            //         client.get('http://127.0.0.1:1237/printvb/farmasi?cetak-LabelFarmasiKecil=' + Norec + '&view=' + stt + '&user=' + userLogin.userLogin, function (response) {
            //             // aadc=response;
            //         });
            //     }
            // }

            $scope.cetakLabelRekap = function () {
                var Norec = $scope.item.norecresep;
                var userLogin = medifirstService.getPegawaiLogin();
                if ($scope.item.statusorder == 'Verifikasi' || $scope.item.statusorder == 'Packaging' || $scope.item.statusorder == 'Selesai' || $scope.item.statusorder == 'Sudah Di Ambil') {
                    medifirstService.get("farmasi/get-data-waktuminum-resep?Norec_sr=" + Norec).then(function (dat) {
                        $scope.datas = dat.data;
                        var JmlPagi = 0;
                        var JmlSiang = 0;
                        var JmlSore = 0;
                        var JmlMalam = 0;
                        var stt = 'false'
                        if (confirm('View Label resep? ')) {
                            // Save it!
                            stt = 'true';
                        } else {
                            // Do nothing!
                            stt = 'false'
                        }
                        $scope.datas.forEach(function (element) {
                            var customData = {};
                            for (var key in element) {
                                switch (key) {
                                    case "pagi":
                                        if (element.pagi != '-') {
                                            if (JmlPagi < 1) {
                                                JmlPagi = parseFloat(JmlPagi) + 1;
                                                // var stt = 'false'
                                                var isPagi = 'Pagi';
                                                var client = new HttpClient();
                                                client.get('http://127.0.0.1:1237/printvb/farmasi?cetak-LabelFarmasiRekap=' + Norec + '&waktuMinum=' + isPagi + '&view=' + stt + '&user=' + userLogin.namaLengkap, function (response) { });
                                            }
                                        }
                                        break;
                                    case "siang":
                                        if (element.siang != '-') {
                                            if (JmlSiang < 1) {
                                                JmlSiang = parseFloat(JmlSiang) + 1;
                                                // var stt = 'false'
                                                var isSiang = 'Siang';
                                                var client = new HttpClient();
                                                client.get('http://127.0.0.1:1237/printvb/farmasi?cetak-LabelFarmasiRekap=' + Norec + '&waktuMinum=' + isSiang + '&view=' + stt + '&user=' + userLogin.namaLengkap, function (response) { });
                                            }
                                        }
                                        break;
                                    case "sore":
                                        if (element.sore != '-') {
                                            if (JmlSore < 1) {
                                                JmlSore = parseFloat(JmlSore) + 1;
                                                // var stt = 'false'
                                                var isSore = 'Sore';
                                                var client = new HttpClient();
                                                client.get('http://127.0.0.1:1237/printvb/farmasi?cetak-LabelFarmasiRekap=' + Norec + '&waktuMinum=' + isSore + '&view=' + stt + '&user=' + userLogin.namaLengkap, function (response) { });
                                            }
                                        }
                                        break;
                                    case "malam":
                                        if (element.malam != '-') {
                                            if (JmlMalam < 1) {
                                                JmlMalam = parseFloat(JmlMalam) + 1;
                                                // var stt = 'false'
                                                var isMalam = 'Malam';
                                                var client = new HttpClient();
                                                client.get('http://127.0.0.1:1237/printvb/farmasi?cetak-LabelFarmasiRekap=' + Norec + '&waktuMinum=' + isMalam + '&view=' + stt + '&user=' + userLogin.namaLengkap, function (response) { });
                                            }
                                        }
                                        break;
                                    default:
                                        customData[key] = element[key];
                                        break;
                                }
                            };
                        });
                    })
                }
            }

            var HttpClient = function () {
                this.get = function (aUrl, aCallback) {
                    var anHttpRequest = new XMLHttpRequest();
                    anHttpRequest.onreadystatechange = function () {
                        if (anHttpRequest.readyState == 4 && anHttpRequest.status == 200)
                            aCallback(anHttpRequest.responseText);
                    }

                    anHttpRequest.open("GET", aUrl, true);
                    anHttpRequest.send(null);
                }
            }

            $scope.klikGridS = function (dataSelected) {
                $scope.dataSelected = dataSelected;
            }

            $scope.BatalVerifikasi = function () {
                // if ($scope.dataSelected.nostruk != undefined) {
                //     window.messageContainer.error('Sudah verifikasi Tatarekening tidak dapat di hapus!')
                //     return;
                // }

                // if ($scope.dataSelected.nostruk != undefined) {
                //     window.messageContainer.error('Sudah verifikasi Tatarekening Tidak Bisa hapus Obat!')
                //     return;
                // } else {
                if ($scope.item.norecresep == undefined) {
                    toastr.error('Pilih data dulu')
                    return
                }
                if ($scope.item.noorder == $scope.item.noresep) {
                    toastr.error('Tidak bisa Unverifikasi')
                    return
                }

                var stt = 'false'
                if (confirm('Yakin Mau Batal Verifikasi Resep? ')) {
                    // Save it!
                    stt = 'true';
                } else {
                    // Do nothing!
                    return;
                    stt = 'false'
                }

                if (stt) {
                    medifirstService.get('farmasi/get-nostruk-kasir?norecresep=' + $scope.item.norecresep).then(function (x) {
                        var nostruk = x.data[0].nostruk

                        if (nostruk != null) {
                            toastr.error('Tidak bisa batal verif karena sudah diverif kasir, harap hubungi kasir terlebih dahulu!')
                            return
                        } else {
                            var objDelete = {
                                norec: $scope.item.norecresep,
                                norec_order: $scope.item.norec_order,
                            }
                            medifirstService.post('farmasi/batal-verifikasi-order-resep', objDelete).then(function (e) {
                                medifirstService.post('farmasi/save-hapus-pelayananobat', objDelete).then(function (e) {
                                    $scope.refresh()
                                    medifirstService.get("sysadmin/logging/save-log-hapus-resep?norec_resep="
                                        + $scope.item.norecresep).then(function (data) {
                                            // medifirstService.postLogging('Batal Verifikasi Order Resep Elektronik', 'Norec Struk Order', $state.params.noRec, 'Batal Verifikasi Order Resep Elektronik').then(function (res) {
                                            // })
                                        })
                                    // LoadCache()
                                })
                            });
                        }
                    })
                }

                //##save Logging user

                //##end 
                // }
            }

            $scope.cetakNomorAntrian = function () {
                var userLogin = medifirstService.getPegawaiLogin();
                var Norec = $scope.item.noresep;
                var Noreg = $scope.item.noregistrasi;
                if ($scope.item.statusorder == 'Verifikasi' || $scope.item.statusorder == 'Packaging' || $scope.item.statusorder == 'Selesai' || $scope.item.statusorder == 'Sudah Di Ambil') {
                    var stt = 'false'
                    if (confirm('View Antrian Farmasi? ')) {
                        // Save it!
                        stt = 'true';
                    } else {
                        // Do nothing!
                        stt = 'false'
                    }
                    var client = new HttpClient();
                    client.get('http://127.0.0.1:1237/printvb/farmasi?cetak-buktiantrianfarmasi=' + Norec + '&noregistrasi=' + Noreg + '&view=' + stt, function (response) {
                        // aadc=response;
                    });
                }
            }
            $scope.formatRupiah = function (value, currency) {
                return currency + " " + parseFloat(value).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
            }
            function loadDiagnosa(noreg) {
                medifirstService.get("sysadmin/general/get-diagnosa-pasien?noReg=" + noreg
                ).then(function (data) {
                    var dataICD10 = data.data.datas;
                    if (dataICD10.length > 0) {
                        var diagnosa = ''
                        var a = ""
                        var b = ""
                        for (let i = 0; i < dataICD10.length; i++) {
                            const element = dataICD10[i];
                            var c = element.kddiagnosa + '-' + element.namadiagnosa
                            b = ", " + c
                            a = a + b
                        }
                        diagnosa = a.slice(1, a.length)
                        $scope.item.diagnosa = diagnosa
                    }
                });
            }
            $scope.detailVerif = function () {
                if ($scope.item.norecresep == null)
                    return
                $scope.dataGridVerif = new kendo.data.DataSource({
                    data: [],
                    pageSize: 10
                });
                medifirstService.get("farmasi/get_detail-resep?norecResep=" + $scope.item.norecresep, true).then(function (e) {
                    // medifirstService.get('farmasi/get-daftar-detail-order?norec_apd=' + $scope.item.norec_apd).then(function (e) {
                    $scope.item.tglreseps = moment(new Date($scope.item.tglorder)).format('DD-MM-YYYY HH:mm')
                    $scope.item.noreseps = e.data.detailresep.noresep
                    $scope.item.dokters = $scope.item.namalengkap
                    $scope.item.statuss = $scope.item.statusorder
                    $scope.item.namaPasienVerif = $scope.item.namapasien
                    $scope.item.norm = $scope.item.nocm
                    medifirstService.get("farmasi/get-alamat?noregistrasi=" + $scope.item.noregistrasi).then(function (e) {
                        $scope.item.alamat = e.data.alamatlengkap
                    })
                    loadDiagnosa($scope.item.noregistrasi)

                    var dataGrids = e.data.pelayananPasien
                    for (let i = 0; i < dataGrids.length; i++) {
                        const element = dataGrids[i];
                        element.namaruangan = $scope.item.namaruangan
                        if (element.isreseppulang == '1') {
                            element.chekreseppulang = '✔'
                        } else {
                            element.chekreseppulang = '-'
                        }
                    }

                    $scope.dataGridVerif = new kendo.data.DataSource({
                        data: dataGrids,
                        pageSize: 10
                    });


                });
                $scope.popUpDetailVerif.center().open()
            }


            $scope.columnGridVerif = [
                {
                    "field": "no",
                    "title": "No",
                    "width": "30px",
                },

                {
                    field: "rke",
                    title: "Rke",
                    width: "40px",
                },
                {
                    field: "jeniskemasan",
                    title: "Jenis Kemasan",
                    width: "100px",
                },
                {
                    field: "namaproduk",
                    title: "Deskripsi",
                    width: "200px"
                },
                {
                    field: "satuanstandar",
                    title: "Satuan",
                    width: "80px"
                },
                {
                    field: "aturanpakai",
                    title: "Aturan Pakai",
                    width: "100px"
                },
                {
                    field: "jumlah",
                    title: "Qty",
                    width: "60px"
                },
                // {
                //     "field": "namalengkap",
                //     "title": "Dokter",
                //     "width" : "100px"
                // },
                {
                    "field": "namaruangan",
                    "title": "Apotik",
                    "width": "70px",
                },
                {
                    "field": "total",
                    "title": "Total",
                    "width": "70px",
                    "template": "<span class='style-right'>{{formatRupiah('#: total #', '')}}</span>"
                },
                {
                    "field": "keterangan",
                    "title": "Keterangan",
                    "width": "100px",
                },
                {
                    "field": "chekreseppulang",
                    "title": "Resep Pulang",
                    "width": "110px",
                },
                // {
                //     "field": "statusorder",
                //     "title": "Status",
                //     "width" : "70px",
                // }
            ];

            $scope.cetakLabelRekapApotik = function () {
                var userLogin = medifirstService.getPegawaiLogin();
                if ($scope.item.statusorder == 'Verifikasi' || $scope.item.statusorder == 'Packaging' || $scope.item.statusorder == 'Selesai' || $scope.item.statusorder == 'Sudah Di Ambil') {
                    var Norec = $scope.item.norecresep;
                    var local = JSON.parse(localStorage.getItem('profile'));
                    var stt = 'false'
                    if (Norec == undefined) {
                        // Save it!
                        toastr.error('Pilih data dulu')
                        stt = 'true';
                        return;
                    } else {
                        // Do nothing!
                        stt = 'false'
                        var local = JSON.parse(localStorage.getItem('profile'));
                        var nama = medifirstService.getPegawaiLogin().namalengkap;
                        console.log(config.baseApiBackend);
                        window.open(config.baseApiBackend + 'report/cetak-labelrekap-apotik?norec='
                        + Norec +'&kdprofile=' + local.id + '&userlogin=' + userLogin.namaLengkap, '_blank');
                    }
                    // var client = new HttpClient();
                    // client.get('http://127.0.0.1:1237/printvb/farmasi?cetak-labelrekap-rajal=' + Norec + '&view=' + stt + '&user=' + userLogin.namaLengkap, function (response) {
                    //     // aadc=response;
                    // });
                }
            }

            $scope.cetakSemuaResep = function () {
                if($scope.item.noregistrasi == undefined){
                    toastr.error('Pilih data dulu')
                    return
                }
                var userLogin = medifirstService.getPegawaiLogin();
                if ($scope.item.statusorder == 'Verifikasi' || $scope.item.statusorder == 'Packaging' || $scope.item.statusorder == 'Selesai' || $scope.item.statusorder == 'Sudah Di Ambil') {
                    var Norec = $scope.item.norecresep;
                    var local = JSON.parse(localStorage.getItem('profile'));
                    var stt = 'false'
                    if (Norec == undefined) {
                        // Save it!
                        toastr.error('Pilih data dulu')
                        stt = 'true';
                        return;
                    } else {
                        // Do nothing!
                        stt = 'false'
                            var local = JSON.parse(localStorage.getItem('profile'));
                            var profile = local.id;
                            var user = medifirstService.getPegawaiLogin();
                        window.open(config.baseApiBackend + "report/cetak-resep-dokter-all?noorder=" + $scope.item.noorder 
                        + "&norec=" + $scope.item.norecresep 
                        + "&nocm=" + $scope.item.nocm 
                        + "&noregistrasi=" + $scope.item.noregistrasi 
                        + '&kodeprofile=' + profile 
                        + '&user=' + user.namaLengkap);
                    }
                }
            }

            $scope.resepDokter = function (){
                $scope.popUpFormulir.center().open();
                $scope.item.riwayatAlergi = $scope.item.riwayatalergi;

                $scope.item.jamPengkajian = $scope.item.jampengkajian;
                $scope.item.pengkajian = {
                    id: $scope.item.petugaspengkajian,
                    namalengkap: $scope.item.petugaspengkajian,
                };
                $scope.item.jamPenyiapanObat = $scope.item.jampenyiapanobat;
                $scope.item.penyiapanObat = {
                    id: $scope.item.penyiapanobat,
                    namalengkap: $scope.item.penyiapanobat,
                };
                $scope.item.jamDispening = $scope.item.jamdispening;
                $scope.item.dispening = {
                    id: $scope.item.dispening,
                    namalengkap: $scope.item.dispening,
                };
                $scope.item.jamSerahInformasi = $scope.item.jamserah;
                $scope.item.serahInformasi = {
                    id: $scope.item.serahinformasi,
                    namalengkap: $scope.item.serahinformasi,
                };
                $scope.item.penulisResep = $scope.item.penulisanresep;
                $scope.item.obat = $scope.item.obat;
                $scope.item.dosis = $scope.item.dosis;
                $scope.item.waktuFrekuensi = $scope.item.waktufrekuensi;
                $scope.item.rute = $scope.item.rute;
                $scope.item.pasien = $scope.item.pasien;
                $scope.item.duplikasiTerapi = $scope.item.duplikasiterapi;
                $scope.item.interaksiObat = $scope.item.interaksiobat;
            }

            
            $scope.saveResep = function (){
                var objSave = {
					nopesanan: $scope.item.noorder,
					riwayatalergi: $scope.item.riwayatAlergi != undefined ? $scope.item.riwayatAlergi : '',
                    jampengkajian: $scope.item.jamPengkajian != undefined ? moment($scope.item.jamPengkajian).format('YYYY-MM-DD HH:mm') : null,
					pengkajian: $scope.item.pengkajian != undefined ? $scope.item.pengkajian.id : null,
                    jampenyiapanobat: $scope.item.jamPenyiapanObat != undefined ? moment($scope.item.jamPenyiapanObat).format('YYYY-MM-DD HH:mm') : null,
					penyiapanobat: $scope.item.penyiapanObat != undefined ? $scope.item.penyiapanObat.id : null,
                    jamdispening: $scope.item.jamDispening != undefined ? moment($scope.item.jamDispening).format('YYYY-MM-DD HH:mm') : null,
                    dispening: $scope.item.dispening != undefined ? $scope.item.dispening.id : null,
                    jamserahinformasi: $scope.item.jamSerahInformasi != undefined ? moment($scope.item.jamSerahInformasi).format('YYYY-MM-DD HH:mm') : null,
					serahinformasi: $scope.item.serahInformasi != undefined ? $scope.item.serahInformasi.id : null,
                    penulisresep: $scope.item.penulisResep != undefined ? $scope.item.penulisResep : false,
                    obat: $scope.item.obat != undefined ? $scope.item.obat : false,
                    dosis: $scope.item.dosis != undefined ? $scope.item.dosis : false,
                    waktufrekuensi: $scope.item.waktuFrekuensi != undefined ? $scope.item.dosis : false,
                    rute: $scope.item.rute != undefined ? $scope.item.rute : false,
                    pasien: $scope.item.pasien != undefined ? $scope.item.pasien : false,
                    duplikasiterapi: $scope.item.duplikasiTerapi != undefined ? $scope.item.duplikasiTerapi : false,
                    interaksiobat: $scope.item.interaksiObat != undefined ? $scope.item.interaksiObat : false,
                    farmasi: medifirstService.getPegawaiLogin().id,
				}
                medifirstService.post('farmasi/save-resep-obat', objSave).then(function (e) {

                })
            }

            $scope.cetakResepDokter = function(){
                medifirstService.get("farmasi/get-resep-dokter?noorder=" +  $scope.item.noorder, true).then(function (datas) {
                    // datas;
                    // if(datas.data == 0){
                    //     toastr.error("Ada data yang belum di input !!")
                    //     return;
                    // }else{
                        medifirstService.get("emr/get-vital-sign?noregistrasi=" + $scope.item.noregistrasi + "&objectidawal=4241&objectidakhir=4246&idemr=147", true).then(function (datas) {
                            $scope.showRiwayatEMR = false
                            $scope.myVar = 1
                            
                            var tinggibadan = "....";
                            var beratbadan = "....";
                            var local = JSON.parse(localStorage.getItem('profile'));
            
                            var alamatpasien = $scope.item.alamatlengkap;
                            var profile = local.id;
                            var user = medifirstService.getPegawaiLogin();
            
                            if ($scope.item.noorder == null){
                                toastr.error("PILIH NO ORDER !!")
                                return;
                            }else{
                                var stt = 1;
                                // if (confirm('Cetak Resep Dengan Qty Setengahnya ? ')) {
                                //     // Save it!
                                //     stt = "1/2";
                                // } else {
                                //     // Do nothing!
                                //     stt = 1
                                // }
                                
                                window.open(config.baseApiBackend + "report/cetak-resep-dokter?noorder=" + $scope.item.noorder + "&norec=" + $scope.item.norecresep 
                                + "&nocm=" + $scope.item.nocm + '&kodeprofile=' + profile + '&qtybagi=' + stt + '&alamatpasien=' + alamatpasien + '&tinggibadan=' + tinggibadan + '&beratbadan=' + beratbadan + '&user=' + user.namaLengkap);
                                // // window.open(config.baseApiBackend + "report/cetak-hasil-lab-histopatologi?norec=" + $scope.dataSelected.norec_pp + '&kdprofile=' + profile
                                //     + '&user=' + user + '&jenis=his', '_blank');
                            }
                            })
                    // }
                }) 
            }
            $scope.grab = {
                lokasiPengirim :  medifirstService.getProfile().alamatlengkap,
                lokasiPengirimLat :  medifirstService.getProfile().lat,
                lokasiPengirimLng :  medifirstService.getProfile().lng,
                recipient : {},
                sender:{}
            }

            $scope.orderGrab = function(){
                if ($scope.item.statusorder != 'Selesai') {
                    toastr.error("Status Data Harus Selesai !!")
                    return;
                }
                if ($scope.item.isordergrab == true) {
                    toastr.error("Sudah Di Order !!")
                    return;
                }
                
                $scope.grab.sender.firstName = medifirstService.getPegawaiLogin().namaLengkap
                $scope.grab.sender.companyName = medifirstService.getProfile().namalengkap
                $scope.grab.recipient.firstName = $scope.item.namapasien
                $scope.grab.recipient.phone = $scope.item.nohp
                $scope.grab.recipient.address = $scope.item.alamatlengkap
                
                $scope.popupGrab.center().open()
                setMap()

            }
            function setMap(){
               const myLatLng = { lat: parseFloat($scope.grab.lokasiPengirimLat), lng: parseFloat($scope.grab.lokasiPengirimLng) };
               let map = new google.maps.Map(document.getElementById("map"), {
                    center: myLatLng,
                    zoom: 15,
                    mapTypeId: "roadmap",
                    mapTypeControl: false,
                });
                   
            }

            function toggleBounce() {
                if (marker.getAnimation() !== null) {
                    marker.setAnimation(null);
                } else {
                    marker.setAnimation(google.maps.Animation.BOUNCE);
                }
            }

            function initMap(map_lat,map_lng) {
                  
                   let myLatlng = { lat: parseFloat(map_lat) , lng: parseFloat(map_lng) };
                   let map = new google.maps.Map(document.getElementById("map"), {
                        center: myLatlng,
                        zoom: 15,
                        mapTypeId: "roadmap",
                        mapTypeControl: false,
                    });

                     var marker = new google.maps.Marker({
                        map,
                        draggable: true,
                        animation: google.maps.Animation.DROP,
                        position: myLatlng,
                        title: 'Penerima Berada Disini',
                    });
                    marker.addListener("click", toggleBounce);
             }

            $scope.lanjutOrderGrab = function(){
                if($scope.grab.sender.firstName == undefined || $scope.grab.sender.firstName == null || $scope.grab.sender.firstName == '-'){
                   toastr.error('Nama Pengirim tidak boleh Kosong')
                   return
                }
                if($scope.grab.recipient.address == undefined || $scope.grab.recipient.address == null){
                   toastr.error('Mohon isi alamat lengkap untuk tujuan pengiriman')
                   return
                }
                if($scope.grab.recipient.phone == undefined || $scope.grab.recipient.phone == null){
                   toastr.error('No HP Penerima harus di isi')
                   return
                }
                if($scope.grab.sender.phone == undefined || $scope.grab.sender.phone == null){
                   toastr.error('No HP Pengirim harus di isi')
                   return
                }
                if($scope.grab.sender.email == undefined || $scope.grab.sender.email == null){
                   toastr.error('Email Pengirim harus di isi')
                   return
                }
                if($scope.grab.recipient.email == undefined || $scope.grab.recipient.email == null){
                   toastr.error('Email Penerima harus di isi')
                   return
                }

                var client = new HttpClient();
                $scope.isShowOrder = true
                client.get('https://maps.googleapis.com/maps/api/geocode/json?address=' + $scope.grab.recipient.address 
                        + '&key=AIzaSyDYhPXYjgCmT7ZO8jZigFm8iPXY_e16C8M', function (response) {
                   var res = JSON.parse(response)
                   if(res.results.length == 0){
                      toastr.error('Mohon isi alamat dengan lengkap ','Koordinat lokasi tidak ditemukan')
                      return
                   }else{
                        toastr.info('Lat : '  +  res.results[0].geometry.location.lat + ', Lng : '+ res.results[0].geometry.location.lng,'Koordinat ditemukan')
                   }
                   
                   $scope.grab.tujuanLat = res.results[0].geometry.location.lat;
                   $scope.grab.tujuanLong =  res.results[0].geometry.location.lng;
                   initMap( $scope.grab.tujuanLat ,$scope.grab.tujuanLong )

                   medifirstService.get("farmasi/get_detail-resep?norecResep=" + $scope.item.norecresep, true).then(function (zz) {
                        let packageDetail = []
                        let totalOrder = 0
                        for (var i = 0; i < zz.data.pelayananPasien.length; i++) {
                            const element = zz.data.pelayananPasien[i]
                            totalOrder = totalOrder + parseFloat(element.total)
                            packageDetail.push({
                                "name": element.namaproduk,
                                "description": 'Aturan Pakai :' + element.aturanpakai,
                                "quantity": element.jumlah,
                                "price": parseFloat(element.hargasatuan),
                                "dimensions": {
                                    "height": 0,
                                    "width": 0,
                                    "depth": 0,
                                    "weight": 0
                                }
                            })
                        }
                      
                       let json = {
                            "req": {
                                "merchantOrderID": $scope.item.noorder,
                                "serviceType": "INSTANT",
                                "paymentMethod": "CASHLESS",
                                "packages": packageDetail,
                                "origin": {
                                    "address": $scope.grab.lokasiPengirim,
                                    "coordinates": {
                                        "latitude": parseFloat($scope.grab.lokasiPengirimLat),
                                        "longitude": parseFloat($scope.grab.lokasiPengirimLng)
                                    }
                                },
                                "destination": {
                                    "address":$scope.grab.recipient.address,
                                    "coordinates": {
                                        "latitude": parseFloat($scope.grab.tujuanLat) ,
                                        "longitude": parseFloat($scope.grab.tujuanLong )
                                    }
                                },
                                "recipient": {
                                    "firstName": $scope.grab.recipient.firstName,
                                    "lastName": "",
                                    "email": $scope.grab.recipient.email != undefined ? $scope.grab.recipient.email :"",
                                    "phone": $scope.grab.recipient.phone != undefined ? $scope.grab.recipient.phone :"",
                                    "smsEnabled": true
                                },
                                "sender": {
                                    "firstName": $scope.grab.sender.firstName ,
                                    "companyName":  $scope.grab.sender.companyName ,
                                    "email": $scope.grab.sender.email != undefined ? $scope.grab.sender.email :"",
                                    "phone": $scope.grab.sender.phone != undefined ? $scope.grab.sender.phone :"",
                                    "smsEnabled": true
                                },
                                "orderId": parseFloat($scope.item.noorder),
                                "totalOrder": totalOrder
                            }
                        }
                        medifirstService.postApi('api/grab/delivery',json).then(function (e) {
                           if(e.data.deliveryID != undefined){
                               toastr.success('Sukses Order, status : '+e.data.status,'No Kirim : '+e.data.deliveryID) 
                               updateStatusGrab(e.data)
                              
                           }else if(e.data.message!=undefined){
                               toastr.error(e.data.message,'Error') 
                           }else{
                               toastr.error(e.data.arg,'Error') 
                           }
                          
                           $scope.isShowOrder = false
                        },function(error){
                            toastr.error('Terjadi Kesalahan ','Info')
                            $scope.isShowOrder = false
                        })
                    })
                });
// 
            }
            function updateStatusGrab(response){
                let json = {
                    'isordergrab' : true,
                    'statusordergrab' : response.status,
                    'norec_order' : $scope.item.norec_order,
                    'nokirimgrab' : response.deliveryID
                }
                medifirstService.post('farmasi/update-status-grabexpress',json).then(function(e){
                    $scope.cancelOrder()
                    $scope.refresh()

                })
            }
            $scope.cancelOrder = function(){
                $scope.grab = {
                    lokasiPengirim :  medifirstService.getProfile().alamatlengkap,
                    lokasiPengirimLat :  medifirstService.getProfile().lat,
                    lokasiPengirimLng :  medifirstService.getProfile().lng,
                    recipient : {},
                    sender:{}
                }
                $scope.popupGrab.close()
            }
            function saveAntrol(param,waktu,norec_pd){
                var data = {
                   "url": "antrean/updatewaktu",
                   "jenis": "antrean",
                   "method": "POST",
                   "data":                                                 
                   {
                      "kodebooking": param,
                      "taskid": waktu,//Waktu akhir farmasi/mulai buat obat
                      "waktu": new Date().getTime()  
                   }
                }
                saveMonitoringTaksId(norec_pd, waktu, new Date().getTime(), false)
                medifirstService.postNonMessage('bridging/bpjs/tools', data).then(function (e) {
                    if(e.data.metaData.code == 200) {
                        saveMonitoringTaksId(norec_pd, waktu, new Date().getTime(), true)
                    } else {
                        repeatSendTaskId(norec_pd, waktu)
                    }
                })
            }

            function saveMonitoringTaksId(noregistrasifk, taskid, waktu, statuskirim) {
                var json = {
                    "noregistrasifk": noregistrasifk,
                    "taskid": taskid,
                    "waktu": waktu,
                    "statuskirim": statuskirim
                }
                medifirstService.postNonMessage('rawatjalan/save-monitoring-taskid', json).then(function (e) {})
            }

            function repeatSendTaskId(norec_pd, taskid) {
                medifirstService.get('registrasi/get-data-antrean?norec_pd=' + norec_pd).then(function (e) {
                    var data = {
                        "url": "antrean/add",
                        "jenis": "antrean",
                        "method": "POST",
                        "data": e.data
                    }
                    medifirstService.postNonMessage('bridging/bpjs/tools', data).then(function (x) {
                        // simpan log
                        medifirstService.postLogging('Antrol Task ID', 'norec Pasien Daftar',
                        e.data.kodebooking, 'Tambah Antrean Kode ' + e.data.kodebooking +' | '+
                        JSON.stringify(data) + ' | '+ JSON.stringify(x.data))

                        // mengabil data catatan task id dari 1 - 4
                        medifirstService.get('rawatjalan/get-monitoring-taskid?taskid=' + taskid + '&norec_pd=' + norec_pd).then(function (res) {
                            updateWaktuId(res, e.data.kodebooking, norec_pd)
                        })
                    })
                })
            }

            async function updateWaktuId(res, kodebooking, norec_pd) {
                for (let i = 0; i < res.data.length; i++) {
                    const element = res.data[i];
                    var data = {
                        "url": "antrean/updatewaktu",
                        "jenis": "antrean",
                        "method": "POST",
                        "data":
                        {
                            "kodebooking": kodebooking,
                            "taskid": element.taskid,
                            "waktu": parseInt(element.waktu)
                        }
                    }
                    await medifirstService.postNonMessage('bridging/bpjs/tools', data).then(async function (e) {
                        if(e.data.metaData.code == 200) {
                            await saveMonitoringTaksId(norec_pd,  element.taskid, parseInt(element.waktu), true);
                        }
                    })
                }
            }

            //** BATAS SUCI */
        }
    ]);
});
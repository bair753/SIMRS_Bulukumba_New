define(['initialize','Configuration'], function (initialize,config) {
    'use strict';
    initialize.controller('MasterPerencanaanCtrl', ['$scope', 'MedifirstService', '$state',
        function ($scope, medifirstService, $state) {
            $scope.item = {};
            $scope.dataVOloaded = true;
            $scope.now = new Date();
            $scope.isRouteLoading = false;
            $scope.simpanEnable = true;
            $scope.revisiEnable = false;
            $scope.item.id = undefined;
            $scope.Caption = "Simpan";
            var pegawaiUser = {}
            $scope.monthSelectorOptions = function () {
                return {
                    start: "decade",
                    depth: "decade"
                }
            };
            $scope.item.periodeTahun = $scope.now;
            $scope.item.periodeTahuns = $scope.now;
            $scope.item.periodeTahunRev = $scope.now;
            loadCombo();

            function LoadCache() {
                init();
            }

            function loadCombo() {
                $scope.item.jmlRows = 100;
                $scope.item.jmlRowsRev = 100;
                medifirstService.get("perencanaan/get-master-satuan?", true).then(function (dat) {                    
                    var dataCombo = dat.data;
                    $scope.listSatuan = dataCombo.satuan;
                    $scope.listKelAnggaran = dataCombo.kelompok;
                    $scope.item.revisi = dataCombo.revisi.revisi;
                    LoadCache();
                });
            }

            $scope.Tambah = function () {
                $state.go('MasterPerencanaanCtrl')
            }

            function init() {
                var tahun = 'tahun=' + moment($scope.item.periodeTahun).format('YYYY');
                var noakun = '&kdrekening=' + $scope.item.noakunS
                if ($scope.item.noakunS == undefined) {
                    noakun = ''
                }
                var namaAkun = '&mataanggaran=' + $scope.item.namaAkunS
                if ($scope.item.namaAkunS == undefined) {
                    namaAkun = ''
                }
                var jmlRows = '&jmlRows=' + $scope.item.jmlRows;
                $scope.isRouteLoading = true;
                medifirstService.get("perencanaan/get-master-rba?" + tahun + noakun + namaAkun + jmlRows, true).then(function (dat) {
                    $scope.isRouteLoading = false;
                    for (let i = 0; i < dat.data.length; i++) {
                        const element = dat.data[i];
                        element.no = i + 1;
                        if (parseFloat(element.hargasatuan) == 0 && parseFloat(element.saldoawalblu) != 0) {
                            element.jumlah = parseFloat(element.saldoawalblu);
                        }else if (parseFloat(element.saldoawalblu) == 0 && parseFloat(element.hargasatuan) != 0) {
                            var satuan = 1;
                            if (element.satuan != undefined) {
                                satuan = parseFloat(element.satuan);
                            }
                            element.jumlah = satuan * parseFloat(element.hargasatuan);
                        }else{
                            element.jumlah = 0
                        }   
                    }                    
                    $scope.dataGrid = new kendo.data.DataSource({
                        data: dat.data,
                        sort: [
                            {
                                field: "kdrekening",
                                dir: "asc"
                            }
                        ],
                        pageSize: 100
                    });
                });
            }

            $scope.cariFilter = function () {
                init();
            }

            $scope.toRupiah = function (angka, prefix) {
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi),
                    separator = '';

                // tambahkan titik jika yang di input sudah menjadi angka ribuan
                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
            }

            $scope.$watch('item.hargasatuan', function (newValue, oldValue) {
                if (newValue != oldValue) {
                    $scope.item.hargasatuan = $scope.toRupiah(newValue, '');
                }
            });

            $scope.$watch('item.saldoblud', function (newValue, oldValue) {
                if (newValue != oldValue) {
                    $scope.item.saldoblud = $scope.toRupiah(newValue, '');
                }
            });

            $scope.formatTanggal = function (tanggal) {
                return moment(tanggal).format('DD-MMM-YYYY');
            }

            $scope.columnGridExcel = {
                toolbar: ["excel"],
                excel: {
                    fileName: "Master Anggaran " + moment($scope.now).format('DD/MMM/YYYY'),
                    allPages: true,
                },
                sortable: false,
                reorderable: true,
                filterable: false,
                pageable: true,
                columnMenu: false,
                resizable: true,
                selectable: 'row',
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
                        "field": "satuanstandar",
                        "title": "Satuan",
                        "width": "100px",
                        "template": '# if( satuanstandar==null) {# <span style="font-weight: bold;" class="style-center">-</span> # } else {# <span style="font-weight: bold;" class="style-center">#: satuanstandar #</span> #} #'
                    },
                    {
                        "field": "hargasatuan",
                        "title": "Harga Satuan",
                        "width": "120px",
                        "template": "<span class='style-right'>{{formatRupiah('#: hargasatuan #', 'Rp.')}}</span>"
                    },
                    {
                        "field": "jumlah",
                        "title": "Jumlah",
                        "width": "120px",
                        "template": "<span class='style-right'>{{formatRupiah('#: jumlah #', 'Rp.')}}</span>"
                    },
                ]
            }

            $scope.klikGrid = function (dataSelected) {
                $scope.Caption = "Ubah";
                $scope.revisiEnable = true;
                $scope.dataSelected = dataSelected;
                $scope.item.id = dataSelected.id;
                $scope.item.noakun = dataSelected.kdrekening;
                $scope.item.namaAkun = dataSelected.mataanggaran;
                $scope.item.satuan = { id: dataSelected.satuan, reportdisplay: dataSelected.satuanstandar };
                $scope.item.kelAnggaran = { id: dataSelected.turunan, kelompok: dataSelected.kelompok };
                $scope.item.volume = dataSelected.volume;
                $scope.item.kode = dataSelected.kode;
                $scope.item.revisi = dataSelected.revisi;
                $scope.item.Keterangan = dataSelected.Keterangan;
                $scope.item.hargasatuan = dataSelected.hargasatuan;
                $scope.item.saldoblud = dataSelected.saldoawalblu;
            }

            $scope.formatRupiah = function (value, currency) {
                return currency + " " + parseFloat(value).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
            }

            $scope.formatTanggal = function (tanggal) {
                return moment(tanggal).format('DD/MM/YYYY');
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

            $scope.simpan = function () {
                var idCoa = ''
                if ($scope.item.id != undefined)
                    idCoa = $scope.item.id

                if ($scope.item.noakun == undefined) {
                    toastr.error('Kode Rekening harus di isi')
                    return
                }

                if ($scope.item.kelAnggaran == undefined) {
                    toastr.error('Kelompok Anggaran harus di isi')
                    return
                }

                if ($scope.item.namaAkun == undefined) {
                    toastr.error('Nama Anggaran harus di isi')
                    return
                }

                if ($scope.item.revisi == undefined) {
                    toastr.error('revisi harus di isi')
                    return
                }
                // if ($scope.item.volume == undefined) {
                //     toastr.error('Volume harus di isi')
                //     return
                // }

                // if ($scope.item.satuan == undefined) {
                //     toastr.error('Satuan harus di isi')
                //     return
                // }

                var hSatuan = 0;
                if ($scope.item.hargasatuan != undefined) {
                    hSatuan = $scope.item.hargasatuan;
                }

                var salBlud = 0;
                if ($scope.item.saldoblud != undefined) {
                    salBlud = $scope.item.saldoblud;
                }

                var objSave =
                {
                    "id": idCoa,
                    "tahun": moment($scope.item.periodeTahuns).format('YYYY'),
                    "kdrekening": $scope.item.noakun,
                    "kode": $scope.item.kode != undefined ? $scope.item.kode : null,
                    "turunan": $scope.item.kelAnggaran.id,                
                    "namaanggaran": $scope.item.namaAkun,
                    "revisi": $scope.item.revisi,
                    "volume": $scope.item.volume != undefined ? $scope.item.volume : null,
                    "satuananggaran": $scope.item.satuan != undefined ? $scope.item.satuan.id : null,
                    "hargasatuan": hSatuan,
                    "saldoblud": salBlud,
                    "keterangan" : $scope.item.Keterangan != undefined ? $scope.item.Keterangan : null,
                }
                $scope.simpanEnable = false;
                medifirstService.post('perencanaan/save-data-master-perencanaan', objSave).then(function (e) {
                    var jenisLog = 'Input Master Perencanaan Baru';
                    var keterangan = 'Input Master Perencanaan Baru';
                    if (idCoa != '') {
                        jenisLog = 'Edit Master Perencanaan';
                        keterangan = 'Edit Master Perencanaan';
                    }
                    var referensi = 'id perencanaananggaran';
                    medifirstService.get("sysadmin/logging/save-log-all?jenislog="
                        + jenisLog + "&referensi=" + referensi
                        + "&noreff=" + e.data.norec
                        + "&keterangan=" + keterangan
                    ).then(function (data) { });
                    init()
                    $scope.Batal()
                }, function (error) {
                    $scope.simpanEnable = true;
                })
            }

            $scope.Batal = function () {
                delete $scope.item.id
                delete $scope.item.noakun
                delete $scope.item.namaAkun
                delete $scope.item.volume
                delete $scope.item.satuan
                delete $scope.item.hargasatuan
                delete $scope.item.saldoblud
                delete $scope.item.kelAnggaran
                delete $scope.item.kode
                delete $scope.item.revisi
                delete $scope.item.Keterangan
                $scope.simpanEnable = true;
                $scope.Caption = "Simpan";
                $scope.revisiEnable = false;
            }

            $scope.Hapus = function () {
                if ($scope.dataSelected == undefined) {
                    toastr.error("Data Belum Dipilih!");
                    return;
                }

                var objSave = {
                    "id": $scope.dataSelected.id,
                }

                medifirstService.post('perencanaan/hapus-data-master-perencanaan', objSave).then(function (e) {
                    var jenisLog = 'Hapus Master Perencanaan';
                    var keterangan = 'Hapus Master Perencanaan';
                    var referensi = 'id perencanaananggaran';
                    medifirstService.get("sysadmin/logging/save-log-all?jenislog="
                        + jenisLog + "&referensi=" + referensi
                        + "&noreff=" + e.data.norec
                        + "&keterangan=" + keterangan
                    ).then(function (data) { });
                    init();
                    $scope.Batal();
                })
            }

            $scope.revisi = function () {
                if ($scope.dataSelected == undefined) {
                    toastr.error("Data Belum Dipilih!");
                    return;
                }

                if ($scope.item.kelAnggaran == undefined) {
                    toastr.error('Kelompok Anggaran harus di isi')
                    return
                }                

                if ($scope.item.noakun == undefined) {
                    toastr.error('Kode Rekening harus di isi')
                    return
                }

                if ($scope.item.namaAkun == undefined) {
                    toastr.error('Nama Anggaran harus di isi')
                    return
                }

                if ($scope.item.revisi == undefined) {
                    toastr.error('revisi harus di isi')
                    return
                }

                var idCoa = "";
                if ($scope.item.id != undefined)
                    idCoa = $scope.item.id

                // if ($scope.item.volume == undefined) {
                //     toastr.error('Volume harus di isi')
                //     return
                // }

                // if ($scope.item.satuan == undefined) {
                //     toastr.error('Satuan harus di isi')
                //     return
                // }

                var hSatuan = 0;
                if ($scope.item.hargasatuan != undefined) {
                    hSatuan = $scope.item.hargasatuan;
                }

                var salBlud = 0;
                if ($scope.item.saldoblud != undefined) {
                    salBlud = $scope.item.saldoblud;
                }

                var objSave =
                {
                    "id": idCoa,
                    "tahun": moment($scope.item.periodeTahuns).format('YYYY'),
                    "kdrekening": $scope.item.noakun,
                    "kode": $scope.item.kode != undefined ? $scope.item.kode : null,
                    "turunan": $scope.item.kelAnggaran.id,   
                    "revisi": $scope.item.revisi,
                    "namaanggaran": $scope.item.namaAkun,
                    "volume": $scope.item.volume != undefined ? $scope.item.volume : null,
                    "satuananggaran": $scope.item.satuan != undefined ? $scope.item.satuan.id : null,
                    "hargasatuan": hSatuan,
                    "saldoblud": salBlud,
                    "keterangan" : $scope.item.Keterangan != undefined ? $scope.item.Keterangan : null
                }
                $scope.revisiEnable = false;
                medifirstService.post('perencanaan/save-data-master-perencanaan-revisi', objSave).then(function (e) {
                    var jenisLog = 'Revisi Master Perencanaan Baru';
                    var keterangan = 'Revisi Master Perencanaan Baru';                    
                    var referensi = 'id perencanaananggaran revisi';
                    medifirstService.get("sysadmin/logging/save-log-all?jenislog="
                        + jenisLog + "&referensi=" + referensi
                        + "&noreff=" + e.data.norec
                        + "&keterangan=" + keterangan
                    ).then(function (data) { });
                    init()
                    $scope.Batal()
                }, function (error) {
                    $scope.revisiEnable = true;
                })
            }

            var onDataBound = function (e) {
                var kendoGrid = $("#kGrid").data("kendoGrid"); // get the grid widget
                var rows = e.sender.element.find("tbody tr"); // get all rows

                var oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
                var dateNow = new Date();

                // iterate over the rows and if the undelying dataitem's Status field is PPT add class to the cell
                for (var i = 0; i < rows.length; i++) {
                    var row = rows[i];
                    var beda = kendoGrid.dataItem(row).beda;
                    if (beda === "true") {                                               
                        $(row.cells).addClass("green");                        
                    }
                }
            }

            $scope.columnGridRevisi = {
                dataBound: onDataBound,
                toolbar: ["excel"],
                excel: {
                    fileName: "Master Anggaran Revisi" + moment($scope.now).format('DD/MMM/YYYY'),
                    allPages: true,
                },
                sortable: false,
                reorderable: true,
                filterable: false,
                pageable: true,
                columnMenu: false,
                resizable: true,
                selectable: 'row',
                columns: [
                    {
                        "field": "no",
                        "title": "No",
                        "width": "45px",
                    },
                    {
                        "field": "revisi",
                        "title": "Revisi",
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
                        "template": '# if( turunan <= 7) {# <span style="font-weight: bold;">#: mataanggaran #</span> # } else {# #: mataanggaran # #} #'
                    },
                    {
                        "field": "volume",
                        "title": "Volume",
                        "width": "60px",
                        "template": '# if( volume==null) {#  # } else {# <span class="style-center">#: volume #</span> #} #'
                    },
                    {
                        "field": "satuanstandar",
                        "title": "Satuan",
                        "width": "100px",
                        "template": '# if( satuanstandar==null) {# <span style="font-weight: bold;" class="style-center">-</span> # } else {# <span style="font-weight: bold;" class="style-center">#: satuanstandar #</span> #} #'
                    },
                    {
                        "field": "hargasatuan",
                        "title": "Harga Satuan",
                        "width": "120px",
                        "template": "<span class='style-right'>{{formatRupiah('#: hargasatuan #', 'Rp.')}}</span>"
                    },
                    {
                        "field": "saldoawalblu",
                        "title": "Saldo Awal BLUD",
                        "width": "120px",
                        "template": "<span class='style-right'>{{formatRupiah('#: saldoawalblu #', 'Rp.')}}</span>"
                    },
                    {
                        "field": "beda",
                        "title": "beda",
                        "width": "110px",
                        "hidden": true,
                    },
                ]
            }

            function LoadDataRevisi(){
                var tahun = 'tahun=' + moment($scope.item.periodeTahunRev).format('YYYY');
                var noakun = '&kdrekening=' + $scope.item.noakunSRev
                if ($scope.item.noakunSRev == undefined) {
                    noakun = ''
                }
                var namaAkun = '&mataanggaran=' + $scope.item.namaAkunSRev
                if ($scope.item.namaAkunSRev == undefined) {
                    namaAkun = ''
                }
                var jmlRows = '&jmlRows=' + $scope.item.jmlRowsRev;
                $scope.isRouteLoading = true;
                medifirstService.get("perencanaan/get-master-rba-rev?" + tahun + noakun + namaAkun + jmlRows, true).then(function (dat) {
                    $scope.isRouteLoading = false;
                    for (var i = dat.data.length - 1; i >= 0; i--) {
                        dat.data[i].no = i + 1
                    }
                    $scope.dataGridRevisi = new kendo.data.DataSource({
                        data: dat.data,
                        sort: [
                            {
                                field: "kdrekening",
                                dir: "asc"
                            }
                        ],
                        pageSize: 100
                    });
                });
            }

            $scope.cariFilterRev=function(){
                LoadDataRevisi();
            }

            $scope.riwayatSaldo = function(){
                LoadDataRevisi();
                $scope.popupDataRevisi.center().open();
            }

            $scope.cetak = function () {
                $scope.beforePrint.center().open();
                medifirstService.getPart('sysadmin/menu/get-pegawai-part', true, true, 10).then(function (e) {
                    $scope.employees = e
                })
            } 

            $scope.print = function () {
                var tahun = moment($scope.item.periodeTahun).format('YYYY');
                var local = JSON.parse(localStorage.getItem('profile'))
                if (local != null) {
                    var profile = local.id;
                    window.open(config.baseApiBackend + "report/cetak-anggaran?profile="+ profile +"&tahun="+ tahun +"&pimpinanblud=" + $scope.item.pimpinanBLUD.id + '&pejabatkeuangan=' + $scope.item.pejabatKeuangan.id + '&pejabatpelayanan=' + $scope.item.pejabatPelayanan.id + '&pejabatpenunjang=' + $scope.item.pejabatPenunjang.id);
                }
                // $scope.batalPrint();
            }

            $scope.batalPrint = function () {
                $scope.item.pimpinanBLUD = undefined
                $scope.item.pejabatKeuangan = undefined
                $scope.item.pejabatPelayanan = undefined
                $scope.item.pejabatPenunjang = undefined
                $scope.beforePrint.close()
            }

            //***********************************
        }
    ]);
});

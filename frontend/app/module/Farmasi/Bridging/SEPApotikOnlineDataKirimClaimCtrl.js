define(['initialize', 'Configuration'], function (initialize, config) {
    'use strict';
    initialize.controller('SEPApotikOnlineDataKirimClaimCtrl', ['$state', '$q', '$scope', 'CacheHelper', 'DateHelper', 'MedifirstService',
        function ($state, $q, $scope, cacheHelper, dateHelper, medifirstService) {
            $scope.now = new Date();

            $scope.nav = function (state) {
                $scope.currentState = state;
                $state.go(state, $state.params);
                console.log($scope.currentState);
            }
            $scope.item = {};
            $scope.item.periodeAwal = new Date();
            $scope.istempatLaporan = true;
            $scope.item.periodeAkhir = new Date();
            $scope.item.tanggalPulang = new Date();
            $scope.dataPasienSelected = {};
            $scope.cboDokter = false;
            $scope.pasienPulang = false;
            $scope.cboUbahDokter = true;
            $scope.isRouteLoading = false;
            $scope.item.jmlRows = 50
            $scope.jmlRujukanMasuk = 0
            $scope.jmlRujukanKeluar = 0
            $scope.rincianPelayanan = []
            $scope.listJenisObat = [
                {
                    "id": 1,
                    "jenisobat": "Obat PRB"
                },
                {
                    "id": 2,
                    "jenisobat": "Obat Kronis Blm Stabil"
                },
                {
                    "id": 3,
                    "jenisobat": "Obat Kemoterapi"
                }
            ];

            $scope.JnsTgl = [
                {
                    "id": "TGLPELSJP",
                    "jenistgl": "TGLPELSJP"
                },
                {
                    "id": "TGLRSP",
                    "jenistgl": "TGLRSP"
                }
            ]

            $scope.listIterasi = [
                {
                    "id": 0,
                    "iterasi": "Non Iterasi"
                },
                {
                    "id": 1,
                    "iterasi": "Iterasi Satu"
                },
                {
                    "id": 2,
                    "iterasi": "Iterasi Dua"
                }
            ]

            $scope.currentPrinsipBesar = [];
            $scope.listPrinsipBesar = [
                {
                    "id": 1,
                    "detail": [
                        { "nama": "Ceklis Semua" },
                        { "id": 1, "nama": "Benar Pasien" },
                        { "id": 3, "nama": "Benar obat" },
                        { "id": 4, "nama": "Benar dosis dan benar obat" },
                        { "id": 6, "nama": "Benar waktu pemberian" },
                        { "id": 5, "nama": "Benar rute pemberian" },
                    ]
                }
            ]
            $scope.user = medifirstService.getPegawaiLogin();
            loadCombo();
            loadCombo();
            function loadCombo() {
                var chacePeriode = cacheHelper.get('cacheDaftarRegisTtr');
                if (chacePeriode != undefined) {
                    $scope.item.periodeAwal = new Date(chacePeriode[0]);;
                    $scope.item.periodeAkhir = new Date(chacePeriode[1]);

                    if (chacePeriode[2] != undefined) {
                        $scope.item.noReg = chacePeriode[2]
                    }

                    if (chacePeriode[3] != undefined) {
                        $scope.item.noRm = chacePeriode[3]
                    }

                    if (chacePeriode[4] != undefined) {
                        $scope.item.nama = chacePeriode[4]
                    }

                    if (chacePeriode[5] != undefined) {
                        $scope.listDepartemen = [chacePeriode[5]]
                        $scope.item.instalasi = chacePeriode[5]
                    }

                    if (chacePeriode[6] != undefined) {
                        $scope.listRuangan = [chacePeriode[6]]
                        $scope.item.ruangan = chacePeriode[6]
                    }

                    if (chacePeriode[7] != undefined) {
                        $scope.item.listKelompokPasien = [chacePeriode[7]]
                        $scope.item.kelompokpasien = chacePeriode[7]
                    }

                    if (chacePeriode[9] != undefined) {
                        $scope.item.jmlRows = chacePeriode[9]
                    }

                } else {
                    $scope.item.periodeAwal = new Date(moment($scope.now).format('YYYY-MM-DD 00:00'));
                    $scope.item.periodeAkhir = new Date(moment($scope.now).format('YYYY-MM-DD 23:59'))
                    $scope.item.tglpulang = $scope.now;
                }
                medifirstService.get("tatarekening/get-data-combo-daftarregpasien", false).then(function (dat) {
                    $scope.listDepartemen = dat.data.departemen;
                    $scope.listKelompokPasien = dat.data.kelompokpasien;
                })
            }

            $scope.getIsiComboRuangan = function () {
                $scope.listRuangan = $scope.item.instalasi.ruangan
            }

            $scope.formatTanggal = function (tanggal) {
                return moment(tanggal).format('DD-MMM-YYYY HH:mm');
            }

            $scope.formatRupiah = function (value, currency) {
                return currency + " " + parseFloat(value).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
            }

            $scope.columnDaftarPasienPulang = {
                toolbar: [
                    "excel",
                ],
                excel: {
                    fileName: "DaftarRegistrasiPasienFarmasi.xlsx",
                    allPages: true,
                },
                excelExport: function (e) {
                    var sheet = e.workbook.sheets[0];
                    sheet.frozenRows = 2;
                    sheet.mergedCells = ["A1:M1"];
                    sheet.name = "Orders";

                    var myHeaders = [{
                        value: "Daftar Registrasi Pasien Farmasi",
                        fontSize: 20,
                        textAlign: "center",
                        background: "#ffffff",
                    }];

                    sheet.rows.splice(0, 0, { cells: myHeaders, type: "header", height: 70 });
                },
                selectable: 'row',
                pageable: true,
                columns:
                    [
                        {
                            "field": "tglregistrasi",
                            "title": "Tgl Registrasi",
                            "width": "80px",
                            "template": "<span class='style-left'>{{formatTanggal('#: tglregistrasi #')}}</span>"
                        },
                        {
                            "field": "noregistrasi",
                            "title": "NoReg",
                            "width": "80px"
                        },
                        {
                            "field": "nocm",
                            "title": "NoRM",
                            "width": "80px",
                            "template": "<span class='style-center'>#: nocm #</span>"
                        },
                        {
                            "field": "namapasien",
                            "title": "Nama Pasien",
                            "width": "150px",
                            "template": "<span class='style-left'>#: namapasien #</span>"
                        },
                        {
                            "field": "umur",
                            "title": "Umur",
                            "width": "150px",
                            "template": "<span class='style-left'>#: umur #</span>"
                        },
                        {
                            "field": "namaruangan",
                            "title": "Nama Ruangan",
                            "width": "150px",
                            "template": "<span class='style-left'>#: namaruangan #</span>"
                        },
                        {
                            "field": "kelompokpasien",
                            "title": "Kelompok Pasien",
                            "width": "100px",
                            "template": "<span class='style-left'>#: kelompokpasien #</span>"
                        },
                        {
                            "field": "tglpulang",
                            "title": "Tgl Pulang",
                            "width": "80px",
                            "template": "<span class='style-left'>{{formatTanggal('#: tglpulang #')}}</span>"
                        },
                        {
                            "field": "statuspasien",
                            "title": "Stat Kunjungan",
                            "width": "100px",
                            "template": "<span class='style-center'>#: statuspasien #</span>"
                        },
                        {
                            "field": "tglmeninggal",
                            "title": "Stat Pasien",
                            "width": "100px",
                            "template": '# if( tglmeninggal==null) {# <span class="label label-primary text-center">Hidup</span> # } else {# <span class="label label-danger text-center">Meninggal</span> #} #'
                        },
                        {
                            "field": "nosep",
                            "title": "No Sep",
                            "width": "100px",
                        },
                        {
                            "command": [
                                {
                                    text: "Detail",
                                    click: getDetailPelayananResep,
                                    imageClass: "k-icon k-i-search"
                                }
                            ],
                            title: "",
                            width: "70px",
                        }
                    ]
            };

            $scope.TutupPopUp = function () {
                $scope.sourceRincians = [];
                $scope.popUpLayanan.close()
            }

            function getDetailPelayananResep(e) {
                e.preventDefault();
                var tr = $(e.target).closest("tr");
                var dataItem = this.dataItem(tr);
                var dataSource = []
                medifirstService.get("farmasi/get-transaksi-pelayanan?noReg=" + dataItem.noregistrasi, true).then(function (dat) {
                    $scope.popUpLayanan.center().open();
                    $scope.isRouteLoading = false;
                    $scope.dataPasienSelected = dataItem;
                    for (var i = 0; i < dat.data.length; i++) {
                        dat.data[i].no = i + 1
                        dat.data[i].total = parseFloat(dat.data[i].jumlah) * (parseFloat(dat.data[i].hargasatuan) - parseFloat(dat.data[i].hargadiscount))
                        dat.data[i].total = parseFloat(dat.data[i].total) + parseFloat(dat.data[i].jasa)
                        if (dat.data[i].iskronis == true || dat.data[i].iskronis == 't') {
                            dat.data[i].kronis = "✔"
                        } else {
                            dat.data[i].kronis = ""
                        }
                    }
                    $scope.sourceRincians = new kendo.data.DataSource({
                        data: dat.data,
                        group: $scope.group,
                    })
                    // $scope.sourceRincians = dat.data;
                });
            }

            $scope.group = {
                field: "noresep",
                aggregates: [
                    {
                        field: "noresep",
                        aggregate: "count"
                    }]
            };

            $scope.columnRincians = {
                sortable: true,
                selectable: "row",
                columns: [
                    {
                        "template": "<input type='checkbox' class='checkbox' ng-click='onClick($event)' />",
                        "width": 40
                    },
                    {
                        "field": "no",
                        "title": "No",
                        "width": "30px",
                    },
                    {
                        "field": "tglpelayanan",
                        "title": "Tgl Pelayanan",
                        "width": "90px",
                    },
                    {
                        "field": "noregistrasi",
                        "title": "No.Registrasi",
                        "width": "100px",
                    },
                    {
                        "field": "noresep",
                        "title": "No.Resep",
                        "width": "100px",
                    },
                    {
                        "field": "namaruangandepo",
                        "title": "Depo",
                        "width": "100px",
                    },
                    {
                        "field": "rke",
                        "title": "R/ke",
                        "width": "30px",
                    },
                    {
                        "field": "jeniskemasan",
                        "title": "Kemasan",
                        "width": "80px",
                    },
                    {
                        "field": "namaproduk",
                        "title": "Deskripsi",
                        "width": "200px",
                    },
                    {
                        "field": "satuanstandar",
                        "title": "Satuan",
                        "width": "80px",
                    },
                    {
                        "field": "jumlah",
                        "title": "Qty",
                        "width": "40px",
                    },
                    {
                        "field": "hargasatuan",
                        "title": "Harga Satuan",
                        "width": "100px",
                        "template": "<span class='style-right'>{{formatRupiah('#: hargasatuan #', '')}}</span>"
                    },
                    {
                        "field": "hargadiscount",
                        "title": "Harga Discount",
                        "width": "100px",
                        "template": "<span class='style-right'>{{formatRupiah('#: hargadiscount #', '')}}</span>"
                    },
                    {
                        "field": "jasa",
                        "title": "Jasa",
                        "width": "70px",
                        "template": "<span class='style-right'>{{formatRupiah('#: jasa #', '')}}</span>"
                    },
                    {
                        "field": "total",
                        "title": "Total",
                        "width": "100px",
                        "template": "<span class='style-right'>{{formatRupiah('#: total #', '')}}</span>"
                    },
                    {
                        "field": "kronis",
                        "title": "Kronis",
                        "width": "100px"
                    },
                    {
                        "field": "nostruk",
                        "title": "No Struk",
                        "width": "100px"
                    },
                    {
                        "field": "tglkadaluarsa",
                        "title": "Tgl Exp",
                        "width": "90px",
                    },
                ]
            }

            $scope.SearchData = function () {
                loadData()
            }

            function loadData() {
                $scope.isRouteLoading = true;
                var tglAwal = moment($scope.item.periodeAwal).format('YYYY-MM-DD HH:mm:ss');
                var tglAkhir = moment($scope.item.periodeAkhir).format('YYYY-MM-DD HH:mm:ss');
                var reg = ""
                var tempNoReg = "";
                if ($scope.item.noReg != undefined) {
                    var reg = "&noreg=" + $scope.item.noReg
                    tempNoReg = $scope.item.noReg

                }

                var rm = ""
                var tempNoRm = "";
                if ($scope.item.noRm != undefined) {
                    var rm = "&norm=" + $scope.item.noRm
                    tempNoRm = $scope.item.noRm;
                }

                var nm = ""
                var tempNamaOrReg = ""
                if ($scope.item.nama != undefined) {
                    var nm = "&nama=" + $scope.item.nama
                    tempNamaOrReg = $scope.item.nama;
                }

                var ins = ""
                var tempInstalasiIdArr = {};
                if ($scope.item.instalasi != undefined) {
                    var ins = "&deptId=" + $scope.item.instalasi.id
                    tempInstalasiIdArr = { id: $scope.item.instalasi.id, departemen: $scope.item.instalasi.departemen }
                }

                var rg = ""
                var tempRuanganIdArr = {};
                if ($scope.item.ruangan != undefined) {
                    var rg = "&ruangId=" + $scope.item.ruangan.id
                    tempRuanganIdArr = { id: $scope.item.ruangan.id, ruangan: $scope.item.ruangan.ruangan }
                }

                var kp = ""
                var tempKelompokArr = {};
                if ($scope.item.kelompokpasien != undefined) {
                    var kp = "&kelId=" + $scope.item.kelompokpasien.id
                    tempKelompokArr = { id: $scope.item.kelompokpasien.id, kelompokpasien: $scope.item.kelompokpasien.kelompokpasien }
                }

                var jmlRows = "";
                if ($scope.item.jmlRows != undefined) {
                    jmlRows = $scope.item.jmlRows
                }

                $q.all([
                    medifirstService.get("farmasi/get-data-registrasi-pasien-farmasi-apotik-online?" +
                        reg + rm + nm + ins + rg + kp
                        + '&jmlRows=' + jmlRows),
                ]).then(function (data) {
                    $scope.isRouteLoading = false;
                    for (let i = 0; i < data[0].data.length; i++) {
                        const element = data[0].data[i];
                        element.no = i + 1
                        var tanggal = new Date(element.tglregistrasi);
                        var tanggalLahir = new Date(element.tgllahir);
                        var umur = dateHelper.CountAge(tanggalLahir, tanggal);
                        element.umur = umur.year + ' thn ' + umur.month + ' bln ' + umur.day + ' hari'
                    }
                    $scope.dataDaftarPasienPulang = new kendo.data.DataSource({
                        data: data[0].data,
                        // group: $scope.group,
                        pageSize: 10,
                        total: data[0].data,
                        serverPaging: false,
                        schema: {
                            model: {
                                fields: {
                                }
                            }
                        }
                    });

                    var chacePeriode = {
                        0: tglAwal,
                        1: tglAkhir,
                        2: tempNoReg,
                        3: tempNoRm,
                        4: tempNamaOrReg,
                        5: tempInstalasiIdArr,
                        6: tempRuanganIdArr,
                        7: tempKelompokArr,
                        8: jmlRows
                    }
                    cacheHelper.set('cacheDaftarRegisTtr', chacePeriode);
                });

            };

            $scope.klikGrid = function (dataPasienSelected) {
                if (dataPasienSelected != undefined) {
                    $scope.item.namaDokter = { id: dataPasienSelected.pgid, namalengkap: dataPasienSelected.namadokter }
                }
            }

            $scope.klikRincian = function (dataSelectedRincian) {
                if (dataSelectedRincian != undefined) {
                    $scope.dataSelectedRincian = dataSelectedRincian;
                }
            }

            $scope.selectedData2 = [];
            $scope.onClick = function (e) {
                var element = $(e.currentTarget);
                var checked = element.is(':checked'),
                    row = element.closest('tr'),
                    grid = $("#kGrid2").data("kendoGrid"),
                    dataItem = grid.dataItem(row);

                if (checked) {
                    var result = $.grep($scope.selectedData2, function (e) {
                        return e.produkfk == dataItem.produkfk;
                    });

                    if (result.length == 0) {
                        $scope.selectedData2.push(dataItem);
                    } else {
                        for (var i = 0; i < $scope.selectedData2.length; i++)
                            if ($scope.selectedData2[i].produkfk === dataItem.produkfk) {
                                $scope.selectedData2.splice(i, 1);
                                break;
                            }
                        $scope.selectedData2.push(dataItem);
                    }
                    row.addClass("k-state-selected");
                } else {
                    for (var i = 0; i < $scope.selectedData2.length; i++)
                        if ($scope.selectedData2[i].produkfk === dataItem.produkfk) {
                            $scope.selectedData2.splice(i, 1);
                            break;
                        }
                    row.removeClass("k-state-selected");
                }

                // Open the Kendo Window
                // $scope.openPopUp(dataItem);
            };

            // $scope.openPopUp = function (dataItem) {
            //     $scope.selectedItem = dataItem;
            //     $scope.popUpdataAddOns.center().open();
            // };

            // $scope.saveData = function () {
            //     $scope.selectedData2.push({
            //         jenisObat: $scope.selectedItem.jenisObat.id,
            //         iterasi: $scope.selectedItem.iterasi.id
            //     });
            //     $scope.popUpdataAddOns.center().close();
            //     console.log('Selected item saved:', $scope.selectedItem);
            // };


            $scope.kirimOnline = function () {
                console.log($scope.selectedData2);
                $scope.openPopUp($scope.selectedData2);

            }

            $scope.openPopUp = function (dataItem) {
                $scope.selectedItem = dataItem;
                if($scope.selectedItem.length == 0){
                    toastr.error('Ceklist data terlebih dahulut');
                    return
                }
                $scope.popUpdataAddOns.center().open();
            };

            $scope.saveData = function () {
                $scope.selectedData2.push({
                    jenisObat: $scope.selectedItem.jenisObat.id,
                    iterasi: $scope.selectedItem.iterasi.id
                });

                // cek status kepesertaan
                medifirstService.get("bridging/bpjs/get-no-peserta?nokartu=" + $scope.dataPasienSelected.nobpjs + "&tglsep=" + new moment(new Date).format('YYYY-MM-DD')).then(function (e) {
                    toastr.info(e.data.response.peserta.statusPeserta.keterangan, 'Status Peserta');
                    toastr.info(e.data.response.peserta.informasi.prolanisPRB, 'Status Peserta PRB');
                }).then(function () {
                    $scope.isRouteLoading = false;
                });
                medifirstService.get("bridging/bpjs/cek-sep?nosep=" + $scope.dataPasienSelected.nosep).then(function (e) {
                    // Ambil tanggal SEP dari response
                    let tglSep = new Date(e.data.response.tglSep);
                    // Ambil tanggal sekarang
                    let tglSekarang = new Date();

                    // Hitung selisih hari antara tanggal sekarang dan tanggal SEP
                    let selisihHari = Math.floor((tglSekarang - tglSep) / (1000 * 60 * 60 * 24));

                    // Validasi apakah selisih lebih dari 15 hari
                    if (selisihHari > 15) {
                        toastr.warning("Resep melebihi 15 hari dari tanggal SEP", 'Validasi Resep');
                    } else {
                        toastr.info("Resep Tidak melebihi 15 hari dari tanggal SEP", 'Validasi Resep');
                    }
                }).then(function () {
                    $scope.isRouteLoading = false;
                });

                $scope.popUpdataAddOns.center().close();
                // var apotikonline = {
                //     // "TGLSJP": $scope.dataPasienSelected.tanggalsep,
                //     "TGLSJP": $scope.now,
                //     "REFASALSJP": $scope.dataPasienSelected.nosep,
                //     // "REFASALSJP": '1004R0010724V000015',
                //     "POLIRSP": $scope.dataPasienSelected.kdinternal,
                //     "KDJNSOBAT": $scope.selectedItem.jenisObat.id,
                //     "NORESEP": $scope.dataSelectedRincian.noresep.slice(-5),
                //     "IDUSERSJP": $scope.dataPasienSelected.nocm,
                //     "TGLRSP": moment($scope.dataSelectedRincian.tglpelayanan).format('YYYY-MM-DD HH:mm:ss'),
                //     "TGLPELRSP": moment($scope.dataSelectedRincian.tglpelayanan).format('YYYY-MM-DD HH:mm:ss'),
                //     "KdDokter": $scope.dataSelectedRincian.penulisresepfk,
                //     "iterasi": $scope.selectedItem.iterasi.id
                // }
                var apotikonline = {
                    "TGLSJP": $scope.now, // atau bisa gunakan $scope.dataPasienSelected.tanggalsep jika tanggal ini yang ingin digunakan
                    "REFASALSJP": $scope.dataPasienSelected.nosep,
                    "POLIRSP": $scope.dataPasienSelected.kdinternal,
                    "KDJNSOBAT": $scope.selectedItem.jenisObat.id,
                    "NORESEP": $scope.dataSelectedRincian.noresep.slice(-5),
                    "IDUSERSJP": $scope.dataPasienSelected.nocm,
                    "TGLRSP": moment($scope.dataSelectedRincian.tglpelayanan).subtract(1, 'days').format('YYYY-MM-DD HH:mm:ss'),
                    "TGLPELRSP": moment($scope.dataSelectedRincian.tglpelayanan).subtract(1, 'days').format('YYYY-MM-DD HH:mm:ss'),
                    "KdDokter": $scope.dataSelectedRincian.penulisresepfk,
                    "iterasi": $scope.selectedItem.iterasi.id
                };


                var datas = {
                    data: apotikonline
                }
                medifirstService.post('bridging/bpjs/save-resep-apotik-online', datas).then(function (e) {

                    if (e.data.metaData.code == 200) {
                        toastr.info(e.data.metaData.message, 'Apotik Online');

                        // Mengambil NOSJP dari message
                        var message = e.data.metaData.message;
                        var nosjpMatch = message.match(/NOSJP:\s(\S+)/);
                        var nosjp = nosjpMatch ? nosjpMatch[1] : '';

                        var arrnonracikan = [];
                        var arrracikan = [];
                        var x = 0;
                        var r1 = 0;
                        var r2 = 0;

                        for (var i = 0; i < $scope.selectedData2.length; i++) {
                            var item = $scope.selectedData2[i];
                            if (item.jeniskemasanfk == 2) {
                                arrnonracikan[r1] = {
                                    "NOSJP": nosjp,
                                    "NORESEP": $scope.dataSelectedRincian.noresep.slice(-5),
                                    "KDOBT": item.kdobatbpjs,
                                    "NMOBAT": item.namaobatbpjs,
                                    "SIGNA1OBT": item.aturanpakai ? item.aturanpakai.substring(0, 1) : '',
                                    "SIGNA2OBT": item.aturanpakai ? item.aturanpakai.slice(-1) : '',
                                    "JMLOBT": item.jumlah,
                                    "JHO": item.jumlah / parseInt(item.aturanpakai ? item.aturanpakai.substring(0, 1) : ''),
                                    "CatKhsObt": ''
                                };
                                r1++;
                            } else if (item.jeniskemasanfk != 2 && item.kdobatbpjs && item.namaobatbpjs) { // Validasi data racikan
                                x++;
                                var no = x < 10 ? '0' + x : '' + x;
                                arrracikan[r2] = {
                                    "NOSJP": nosjp,
                                    "NORESEP": $scope.dataSelectedRincian.noresep.slice(-5),
                                    "JNSROBT": "R." + no,
                                    "KDOBT": item.kdobatbpjs,
                                    "NMOBAT": item.namaobatbpjs,
                                    "SIGNA1OBT": item.aturanpakai ? item.aturanpakai.substring(0, 1) : '',
                                    "SIGNA2OBT": item.aturanpakai ? item.aturanpakai.slice(-1) : '',
                                    "PERMINTAAN": item.dosis,
                                    "JMLOBT": item.jumlah,
                                    "JHO": 23, // Sesuaikan jika perlu
                                    "CatKhsObt": ''
                                };
                                r2++;
                            }
                        }

                        if (arrnonracikan.length > 0) {
                            var arr1 = { data: arrnonracikan };
                            medifirstService.post('bridging/bpjs/save-non-racikan-apotik-online', arr1).then(function (e) {
                                console.log(e)
                                console.log(e.data[0].metaData.message)
                                // Tambahkan logika jika diperlukan setelah pengiriman data non-racikan
                                toastr.info(e.data[0].metaData.message, 'Apotik Online');
                            });
                        }

                        if (arrracikan.length > 0) {
                            var arr2 = { data: arrracikan };
                            medifirstService.post('bridging/bpjs/save-racikan-apotik-online', arr2).then(function (e) {
                                console.log(e)
                                console.log(e.data[0].metaData.message)
                                // Tambahkan logika jika diperlukan setelah pengiriman data racikan
                                toastr.info(e.data[0].metaData.message, 'Apotik Online');
                            });
                        }

                    } else {
                        toastr.info(e.data.metaData.message, 'Apotik Online');
                    }
                });
                // medifirstService.post('bridging/bpjs/save-resep-apotik-online', datas).then(function (e) {

                //     if (e.data.metaData.code == 200) {
                //         toastr.success('Data Berhasil di Kirim');

                //         // Mengambil NOSJP dari message
                //         var message = e.data.metaData.message;
                //         var nosjpMatch = message.match(/NOSJP:\s(\S+)/);
                //         var nosjp = nosjpMatch ? nosjpMatch[1] : '';

                //         var arrnonracikan = [];
                //         var arrracikan = [];
                //         var x = 0;
                //         var no = '';
                //         var r1 = 0;
                //         var r2 = 0;

                //         for (var i = 0; i < $scope.selectedData2.length; i++) {
                //             if ($scope.selectedData2[i].jeniskemasanfk === 2) {
                //                 arrnonracikan[r1] = {
                //                     "NOSJP": nosjp,
                //                     "NORESEP": $scope.dataSelectedRincian.noresep.slice(-5),
                //                     "KDOBT": $scope.selectedData2[i].kdobatbpjs,
                //                     "NMOBAT": $scope.selectedData2[i].namaobatbpjs,
                //                     "SIGNA1OBT": $scope.selectedData2[i].aturanpakai ? $scope.selectedData2[i].aturanpakai.substring(0, 1) : '',
                //                     "SIGNA2OBT": $scope.selectedData2[i].aturanpakai ? $scope.selectedData2[i].aturanpakai.slice(-1) : '',
                //                     "JMLOBT": $scope.selectedData2[i].jumlah,
                //                     "JHO": $scope.selectedData2[i].jumlah / parseInt($scope.selectedData2[i].aturanpakai ? $scope.selectedData2[i].aturanpakai.substring(0, 1) : ''),
                //                     "CatKhsObt": ''
                //                 };
                //                 r1++;
                //             } else if ($scope.selectedData2[i].jeniskemasanfk !== 2){
                //                 x++;
                //                 no = x < 10 ? '0' + x : '' + x;
                //                 arrracikan[r2] = {
                //                     "NOSJP": nosjp,
                //                     "NORESEP": $scope.dataSelectedRincian.noresep.slice(-5),
                //                     "JNSROBT": "R." + no,
                //                     "KDOBT": $scope.selectedData2[i].kdobatbpjs,
                //                     "NMOBAT": $scope.selectedData2[i].namaobatbpjs,
                //                     "SIGNA1OBT": $scope.selectedData2[i].aturanpakai ? $scope.selectedData2[i].aturanpakai.substring(0, 1) : '',
                //                     "SIGNA2OBT": $scope.selectedData2[i].aturanpakai ? $scope.selectedData2[i].aturanpakai.slice(-1) : '',
                //                     "PERMINTAAN": $scope.selectedData2[i].dosis,
                //                     "JMLOBT": $scope.selectedData2[i].jumlah,
                //                     "JHO": 23, // Sesuaikan jika perlu
                //                     "CatKhsObt": ''
                //                 };
                //                 r2++;
                //             }
                //         }

                //         if (arrnonracikan.length > 0) {
                //             var arr1 = { data: arrnonracikan };
                //             medifirstService.post('bridging/bpjs/save-non-racikan-apotik-online', arr1).then(function (e) {
                //                 // Tambahkan logika jika diperlukan setelah pengiriman data non-racikan
                //             });
                //         }

                //         if (arrracikan.length > 0) {
                //             var arr2 = { data: arrracikan };
                //             medifirstService.post('bridging/bpjs/save-racikan-apotik-online', arr2).then(function (e) {
                //                 // Tambahkan logika jika diperlukan setelah pengiriman data racikan
                //             });
                //         }

                //     } else {
                //         toastr.error('Data Gagal di Kirim');
                //     }
                // });

                // medifirstService.post('bridging/bpjs/save-resep-apotik-online', datas).then(function (e) {

                //     if (e.data.metaData.code == 200) {
                //         toastr.success('Data Berhasil di Kirim');
                //     } else {
                //         toastr.error('Data Gagal di Kirim');
                //     }
                //     var arrnonracikan = []
                //     var arrracikan = []
                //     var x = 0
                //     var no = ''
                //     var r1 = 0
                //     var r2 = 0
                //     for (var i = 0; i < $scope.selectedData2.length; i++) {
                //         // if ($scope.selectedData2[i].isfornas == true) {
                //             if ($scope.selectedData2[i].jeniskemasanfk == 2) {
                //                 arrnonracikan[r1] = {
                //                     "NOSJP": $scope.dataPasienSelected.nosep,
                //                     // "NOSJP": '1004R0010724V000015',
                //                     "NORESEP": $scope.dataSelectedRincian.noresep.slice(-5),
                //                     // "KDOBT": $scope.selectedData2[i].kdapotikonline, //--
                //                     "KDOBT": '0117A005',
                //                     "NMOBAT": $scope.selectedData2[i].namaproduk, //--
                //                     "SIGNA1OBT": $scope.selectedData2[i].aturanpakai ? $scope.selectedData2[i].aturanpakai.substring(0, 1) : '',
                //                     "SIGNA2OBT": $scope.selectedData2[i].aturanpakai ? $scope.selectedData2[i].aturanpakai.slice(-1) : '',
                //                     "JMLOBT": $scope.selectedData2[i].jumlah,
                //                     "JHO": $scope.selectedData2[i].jumlah / parseInt($scope.selectedData2[i].aturanpakai ? $scope.selectedData2[i].aturanpakai.substring(0, 1) : ''), //--
                //                     "CatKhsObt": '',
                //                 }
                //                 r1++
                //             } else {
                //                 x++
                //                 if (x < 10) {
                //                     no = '0' + x
                //                 } else {
                //                     no = '' + x
                //                 }
                //                 arrracikan[r2] = {
                //                     "NOSJP": $scope.dataPasienSelected.nosep,
                //                     // "NOSJP": '1004R0010724V000015',
                //                     "NORESEP": $scope.dataSelectedRincian.noresep.slice(-5),
                //                     "JNSROBT": "R." + no,
                //                     // "KDOBT": $scope.selectedData2[i].kdapotikonline, //--
                //                     "KDOBT": '0117A005',
                //                     "NMOBAT": $scope.selectedData2[i].namaproduk, //--
                //                     "SIGNA1OBT": $scope.selectedData2[i].aturanpakai ? $scope.selectedData2[i].aturanpakai.substring(0, 1) : '',
                //                     "SIGNA2OBT": $scope.selectedData2[i].aturanpakai ? $scope.selectedData2[i].aturanpakai.slice(-1) : '',
                //                     "PERMINTAAN": $scope.selectedData2[i].dosis,
                //                     "JMLOBT": $scope.selectedData2[i].jumlah,
                //                     "JHO": 23, //--
                //                     "CatKhsObt": '',
                //                 }
                //                 r2++
                //             }
                //         // }
                //     }

                //     if (arrnonracikan != []) {
                //         var arr1 = {
                //             data: arrnonracikan
                //         }

                //         medifirstService.post('bridging/bpjs/save-non-racikan-apotik-online', arr1).then(function (e) { });
                //     }

                //     if (arrracikan != []) {
                //         var arr2 = {
                //             data: arrracikan
                //         }

                //         medifirstService.post('bridging/bpjs/save-racikan-apotik-online', arr2).then(function (e) { });
                //     }
                // });
            };

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

            var statusBridgingTemporary = 'false'
            medifirstService.get('sysadmin/settingdatafixed/get/statusBridgingTemporary').then(function (dat) {
                statusBridgingTemporary = dat.data
            })

            $scope.CetakSEP = function () {
                if ($scope.dataPasienSelected == undefined) {
                    toastr.error('Pilih Pasien dulu', 'Info');
                    return
                }
                if (!$scope.dataPasienSelected.nosep) {
                    toastr.error('SEP tidak ada', 'Info');
                    return
                }
                if ($scope.dataPasienSelected.kelompokpasien === "Umum/Pribadi") {
                    toastr.error('Pasien Umum tidak diizinkan mencetak SEP', 'Info');
                    return
                }

                var profile = medifirstService.getProfile();
                if (statusBridgingTemporary == 'false') {
                    medifirstService.get("bridging/bpjs/cek-sep?nosep=" + $scope.dataPasienSelected.nosep).then(function (e) {
                        if (e.data.metaData.code === "200" || e.data.metaData.code === "404") {
                            var client = new HttpClient();
                            // client.get('http://127.0.0.1:1237/printvb/Pendaftaran?cetak-sep-new=1&norec=' + $scope.item.noregistrasi + '&view=true&kadaluarsa=' + $scope.item.kelasditanggung,function (response) {
                            // 	// do something with response
                            // });
                            // cetakSEP()
                            window.open(config.baseApiBackend + 'report/cetak-sep?noregistrasi=' + $scope.dataPasienSelected.noregistrasi + '&kdprofile=' + profile.kdprofile, "_blank")
                        } else {
                            window.messageContainer.error('SEP tidak ada atau tidak sesuai dengan Vclaim mohon dicek kembali !');
                        }
                    });
                } else {
                    window.open(config.baseApiBackend + 'report/cetak-sep?noregistrasi=' + $scope.dataPasienSelected.noregistrasi + '&kdprofile=' + profile.kdprofile, "_blank")
                }
            }

            $scope.cetakResepDokterFull = function () {
                var local = JSON.parse(localStorage.getItem('profile'));
                var profile = local.id;
                if ($scope.dataSelectedRincian.noresep == null) {
                    toastr.error("PILIH NO ORDER !!")
                    return;
                } else {

                    window.open(config.baseApiBackend + "report/cetak-resep-dokter-full?noorder=" + $scope.dataSelectedRincian.noresep + "&norec=" + $scope.dataSelectedRincian.norec_resep
                        + "&nocm=" + $scope.item.nocm + '&kodeprofile=' + profile);
                }
            }

            $scope.simpanSkrining = function () {
                if ($scope.dataSelectedRincian.norec_resep === undefined) {
                    toastr.error("Harap pilih pasien terlebih dahulu !");
                    return
                }

                if ($scope.dataSelectedRincian.norec_resep == null) {
                    toastr.error("Obat Belum diverifikasi !");
                    return
                }
                $scope.currentPrinsipBesar = []
                for (let i = 0; i < $scope.listPrinsipBesar[0].detail.length; i++) {
                    $scope.listPrinsipBesar[0].detail[i].isChecked = false;
                }
                medifirstService.get("farmasi/get-histori-skrining?norecResep=" + $scope.dataSelectedRincian.norec_resep, true).then(function (data_ih) {
                    var datas = data_ih.data[0]
                    if (datas !== undefined) {
                        $scope.norecSkrining = datas.norec
                        if (datas.prinsipbesar != '' || datas.prinsipbesar != null) {
                            var prinsipbesar = datas.prinsipbesar.split(',')
                            prinsipbesar.forEach(function (data) {
                                $scope.listPrinsipBesar.forEach(function (e) {
                                    for (let i in e.detail) {
                                        if (e.detail[i].id == data) {
                                            e.detail[i].isChecked = true
                                            var dataid = {
                                                "id": e.detail[i].id, "nama": e.detail[i].nama,
                                                "value": e.detail[i].id,
                                            }
                                            $scope.currentPrinsipBesar.push(dataid)
                                        }
                                    }
                                })
                            })
                        }
                    }
                    $scope.popupLimaBenar.center().open();

                })
            }
            $scope.closeSkrining = function () {
                $scope.popupLimaBenar.close();
            }
            $scope.lanjutSimpanSkrining = function () {
                var listPrinsipBesar = ""
                var a = ""
                var b = ""
                for (var i = $scope.currentPrinsipBesar.length - 1; i >= 0; i--) {
                    var c = $scope.currentPrinsipBesar[i].id
                    b = "," + c
                    a = a + b
                }
                listPrinsipBesar = a.slice(1, a.length)

                var objSave = {
                    "norec": $scope.norecSkrining == undefined ? '' : $scope.norecSkrining,
                    "norec_apd": $scope.item.norec_apd,
                    "objectruanganfk": null,
                    "rpenulis": null,
                    "rtanggalresep": null,
                    "rmr": null,
                    "rpasien": null,
                    "rtanggallahir": null,
                    "rberatbedan": null,
                    "rdokter": null,
                    "rruang": null,
                    "rstatusjamin": null,
                    "robat": null,
                    "rkekuatan": null,
                    "rjumlahobat": null,
                    "rstabilitas": null,
                    "raturan": null,
                    "rindikasiobat": null,
                    "ralergi": null,
                    "rkonsumsi": null,
                    "rduplikat": null,
                    "rinteraksi": null,
                    "rantibiotik": null,
                    "rpolifarmasi": null,
                    "namapenyekriningresep": null,
                    "namaperacik": null,
                    "namapengecek": null,
                    "namapenyrahobat": null,
                    "namapenerimaobat": null,
                    "prinsipbesar": listPrinsipBesar,
                    "strukresepfk": $scope.item.norecresep,
                    // "noresepfk" : ,
                    "ketpenulis": null,
                    "kettanggal": null,
                    "ketrm": null,
                    "ketpasien": null,
                    "kettanggallahir": null,
                    "ketberat": null,
                    "ketdokter": null,
                    "ketruang": null,
                    "ketstatus": null,
                    "ketobat": null,
                    "ketkekuatan": null,
                    "ketjumlah": null,
                    "ketstabilitas": null,
                    "ketaturan": null,
                    "ketalergi": null,
                    "ketkonsumsi": null,
                    "ketduplikasi": null,
                    "ketinteraski": null,
                    "ketantibiotik": null,
                    "ketpolifarmasi": null,
                    "ketindikasi": null,
                    "rcek": null
                }

                medifirstService.post('farmasi/save-data-skrining-farmasi', objSave).then(function (e) {
                    $scope.popupLimaBenar.close();
                    $scope.cetakBillResep();
                })
            }
            $scope.lanjutSimpanSkriningnew = function () {
                var listPrinsipBesar = ""
                var a = ""
                var b = ""
                for (var i = $scope.currentPrinsipBesar.length - 1; i >= 0; i--) {
                    var c = $scope.currentPrinsipBesar[i].id
                    b = "," + c
                    a = a + b
                }
                listPrinsipBesar = a.slice(1, a.length)

                var objSave = {
                    "norec": $scope.norecSkrining == undefined ? '' : $scope.norecSkrining,
                    "norec_apd": $scope.item.norec_apd,
                    "objectruanganfk": null,
                    "rpenulis": null,
                    "rtanggalresep": null,
                    "rmr": null,
                    "rpasien": null,
                    "rtanggallahir": null,
                    "rberatbedan": null,
                    "rdokter": null,
                    "rruang": null,
                    "rstatusjamin": null,
                    "robat": null,
                    "rkekuatan": null,
                    "rjumlahobat": null,
                    "rstabilitas": null,
                    "raturan": null,
                    "rindikasiobat": null,
                    "ralergi": null,
                    "rkonsumsi": null,
                    "rduplikat": null,
                    "rinteraksi": null,
                    "rantibiotik": null,
                    "rpolifarmasi": null,
                    "namapenyekriningresep": null,
                    "namaperacik": null,
                    "namapengecek": null,
                    "namapenyrahobat": null,
                    "namapenerimaobat": null,
                    "prinsipbesar": listPrinsipBesar,
                    "strukresepfk": $scope.item.norecresep,
                    // "noresepfk" : ,
                    "ketpenulis": null,
                    "kettanggal": null,
                    "ketrm": null,
                    "ketpasien": null,
                    "kettanggallahir": null,
                    "ketberat": null,
                    "ketdokter": null,
                    "ketruang": null,
                    "ketstatus": null,
                    "ketobat": null,
                    "ketkekuatan": null,
                    "ketjumlah": null,
                    "ketstabilitas": null,
                    "ketaturan": null,
                    "ketalergi": null,
                    "ketkonsumsi": null,
                    "ketduplikasi": null,
                    "ketinteraski": null,
                    "ketantibiotik": null,
                    "ketpolifarmasi": null,
                    "ketindikasi": null,
                    "rcek": null
                }

                medifirstService.post('farmasi/save-data-skrining-farmasi', objSave).then(function (e) {
                    $scope.popupLimaBenarnew.close();
                    $scope.cetakBillResep();
                })
            }

            $scope.addListPrinsipBesar = function (isChecked, data) {
                if (data.nama === "Ceklis Semua") {
                    // Jika opsi "Ceklis Semua" dipilih, atur ceklis semua item lainnya
                    angular.forEach($scope.listPrinsipBesar[0].detail, function (item) {
                        item.isChecked = isChecked;
                        // Update currentPrinsipBesar sesuai dengan ceklis semua
                        if (isChecked && $scope.currentPrinsipBesar.indexOf(item) === -1) {
                            $scope.currentPrinsipBesar.push(item);
                        } else if (!isChecked) {
                            var index = $scope.currentPrinsipBesar.indexOf(item);
                            if (index !== -1) {
                                $scope.currentPrinsipBesar.splice(index, 1);
                            }
                        }
                    });
                } else {
                    // Jika opsi lain dipilih, atur ceklis sesuai dengan nilai isChecked
                    var index = $scope.currentPrinsipBesar.indexOf(data);
                    if (isChecked && index === -1) {
                        $scope.currentPrinsipBesar.push(data);
                    } else if (!isChecked && index !== -1) {
                        $scope.currentPrinsipBesar.splice(index, 1);
                    }
                }
            };

            $scope.cetakBillResep = function () {
                var bp = ""
                var bi = ""
                var bo = ""
                var bw = ""
                var bd = ""
                var br = ""
                var bdk = ""
                var user = medifirstService.getPegawaiLogin().namaLengkap
                for (let i = 0; i < $scope.currentPrinsipBesar.length; i++) {
                    var element = $scope.currentPrinsipBesar[i]
                    switch (element.id) {
                        case 1: bp = element.nama
                            break;
                        case 2: bi = element.nama
                            break;
                        case 3: bo = element.nama
                            break;
                        case 4: bd = element.nama
                            break;
                        case 5: br = element.nama
                            break;
                        case 6: bw = element.nama
                            break;
                        case 7: bdk = element.nama
                            break;
                    }
                }
                var json = {
                    "gambarLogo": "logo_kab.png",
                    "paramKey": ["norec_resep", "bp", "bo", "bw", "bd", "br", "bdk", "user"],
                    "paramValue": [$scope.dataSelectedRincian.norec_resep, bp, bo, bw, bd, br, bdk, user],
                    "paramType": ["", "", "", "", "", "", "", ""] // selain date, isinya kosong saja
                };
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        //this.response is what you're looking for
                        // handler(this.response);
                        console.log(this.response, typeof this.response);
                        //var res = this.response
                        //var file = new Blob( [res], {type: 'application/pdf'});
                        var url = window.URL.createObjectURL(this.response)
                        var pdf = document.getElementById('tempatLaporan');
                        pdf.innerHTML = '<embed src="' + url + '#view=FitH&toolbar=1" type="application/pdf" width="100%" height="100%"></embed>';
                        var win = window.open(url, '_blank');
                        win.focus();
                    }
                }
                xhr.open('POST', config.urlJasper + "BillingResep.pdf");
                // set `Content-Type` header
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.setRequestHeader('Access-Control-Allow-Origin', '*');
                xhr.responseType = 'blob';
                // send rquest with JSON payload
                xhr.send(JSON.stringify(json));
            }


            $scope.DaftarResepBpjs = function (dataItem) {
                $scope.selectedItem = dataItem;
                $scope.PopUpDaftarResepBpjs.center().open();
            }

            $scope.GetDaftarResepBpjs = function () {
                var data = {
                    "kdppk": "0117A005",
                    "KdJnsObat": $scope.item.jenisObat.id,
                    "JnsTgl": $scope.item.JnsTgl.jenistgl,
                    "TglMulai": moment($scope.item.periodeAwal).format('YYYY-MM-DD'),
                    "TglAkhir": moment($scope.item.periodeAkhir).format('YYYY-MM-DD')
                }
                console.log('DATA BARU KIRIM', data);
                var datas = {
                    data: data
                }
                medifirstService.post('bridging/bpjs/daftarresep', datas).then(function (e) {
                    console.log('DATA KIRIM', e.data.response);
                    $scope.dataObatBpjs = new kendo.data.DataSource({
                        data: e.data.response,
                        pageSize: 10,
                        total: e.data.response,
                        serverPaging: false,
                        schema: {
                            model: {
                                fields: {
                                }
                            }
                        }
                    });
                });
            }

            $scope.columnObatBpjs = {
                toolbar: ["excel"],
                excel: {
                    fileName: "DaftarResepBpjs.xlsx",
                    allPages: true,
                },
                excelExport: function (e) {
                    var sheet = e.workbook.sheets[0];
                    sheet.frozenRows = 2;
                    sheet.mergedCells = ["A1:M1"];
                    sheet.name = "Resep BPJS";

                    var myHeaders = [{
                        value: "Daftar Resep BPJS",
                        fontSize: 20,
                        textAlign: "center",
                        background: "#ffffff",
                    }];

                    sheet.rows.splice(0, 0, { cells: myHeaders, type: "header", height: 70 });
                },
                selectable: 'row',
                pageable: true,
                columns: [
                    {
                        field: "NORESEP",
                        title: "No Resep",
                        width: "100px"
                    },
                    {
                        field: "NOAPOTIK",
                        title: "No Apotik",
                        width: "100px"
                    },
                    {
                        field: "NOSEP_KUNJUNGAN",
                        title: "No SEP Kunjungan",
                        width: "150px"
                    },
                    {
                        field: "NOKARTU",
                        title: "No Kartu",
                        width: "150px"
                    },
                    {
                        field: "NAMA",
                        title: "Nama",
                        width: "150px"
                    },
                    {
                        field: "TGLENTRY",
                        title: "Tgl Entry",
                        width: "100px",
                        template: "<span class='style-left'>{{formatTanggal('#: TGLENTRY #')}}</span>"
                    },
                    {
                        field: "TGLRESEP",
                        title: "Tgl Resep",
                        width: "100px",
                        template: "<span class='style-left'>{{formatTanggal('#: TGLRESEP #')}}</span>"
                    },
                    {
                        field: "TGLPELRSP",
                        title: "Tgl Pelayanan Resep",
                        width: "100px",
                        template: "<span class='style-left'>{{formatTanggal('#: TGLPELRSP #')}}</span>"
                    },
                    {
                        field: "BYTAGRSP",
                        title: "Biaya Resep",
                        width: "100px"
                    },
                    {
                        field: "BYVERRSP",
                        title: "Verifikasi Resep",
                        width: "100px"
                    },
                    {
                        field: "KDJNSOBAT",
                        title: "Kode Jenis Obat",
                        width: "100px"
                    },
                    {
                        field: "FASKESASAL",
                        title: "Faskes Asal",
                        width: "100px"
                    },
                    {
                        field: "FLAGITER",
                        title: "Flag Iterasi",
                        width: "100px"
                    }
                ]
            };


            // Dummy Data untuk Daftar Resep BPJS
            // $scope.GetDaftarResepBpjs = function () {
            //     var data = {
            //         "kdppk": "0117A005",
            //         "KdJnsObat": $scope.item?.jenisObat?.id || "OBT001",
            //         "JnsTgl": $scope.item?.JnsTgl?.jenistgl || "TGLRESEP",
            //         "TglMulai": moment($scope.item?.periodeAwal || new Date()).format('YYYY-MM-DD'),
            //         "TglAkhir": moment($scope.item?.periodeAkhir || new Date()).format('YYYY-MM-DD')
            //     };

            //     console.log('DATA BARU KIRIM', data);

            //     var dummyResponse = [
            //         {
            //             "NOAPOTIK": "APT001",
            //             "NORESEP": "00010",
            //             "NOSEP_KUNJUNGAN": "1004R0010325V000004",
            //             "NOKARTU": "0002039411294",
            //             "NAMA": "Budi Santoso",
            //             "TGLENTRY": "2025-03-10T08:30:00Z",
            //             "TGLRESEP": "2025-03-09T14:00:00Z",
            //             "TGLPELRSP": "2025-03-10T10:00:00Z",
            //             "BYTAGRSP": 50000,
            //             "BYVERRSP": 48000,
            //             "KDJNSOBAT": "OBT001",
            //             "FASKESASAL": "RSUD Kota A",
            //             "FLAGITER": 1
            //         },
            //         {
            //             "NOAPOTIK": "APT002",
            //             "NORESEP": "00009",
            //             "NOSEP_KUNJUNGAN": "1004R0010325V000005",
            //             "NOKARTU": "0004679890094",
            //             "NAMA": "Siti Aminah",
            //             "TGLENTRY": "2025-03-10T09:15:00Z",
            //             "TGLRESEP": "2025-03-09T15:30:00Z",
            //             "TGLPELRSP": "2025-03-10T11:30:00Z",
            //             "BYTAGRSP": 75000,
            //             "BYVERRSP": 70000,
            //             "KDJNSOBAT": "OBT002",
            //             "FASKESASAL": "Puskesmas B",
            //             "FLAGITER": 0
            //         }
            //     ];

            //     $scope.dataObatBpjs = new kendo.data.DataSource({
            //         data: dummyResponse,
            //         pageSize: 10,
            //         serverPaging: false
            //     });
            // };

            $scope.columnObatBpjs = {
                toolbar: ["excel"],
                excel: {
                    fileName: "DaftarResepBpjs.xlsx",
                    allPages: true,
                },
                excelExport: function (e) {
                    var sheet = e.workbook.sheets[0];
                    sheet.frozenRows = 2;
                    sheet.mergedCells = ["A1:M1"];
                    sheet.name = "Resep BPJS";

                    sheet.rows.splice(0, 0, {
                        cells: [{
                            value: "Daftar Resep BPJS",
                            fontSize: 20,
                            textAlign: "center",
                            background: "#ffffff",
                        }],
                        type: "header",
                        height: 70
                    });
                },
                selectable: 'row',
                pageable: true,
                columns: [
                    { field: "NOAPOTIK", title: "No Apotik", width: "100px" },
                    { field: "NORESEP", title: "No Resep", width: "100px" },
                    { field: "NOSEP_KUNJUNGAN", title: "No SEP Kunjungan", width: "150px" },
                    { field: "NOKARTU", title: "No Kartu", width: "150px" },
                    { field: "NAMA", title: "Nama", width: "150px" },
                    { field: "TGLENTRY", title: "Tgl Entry", width: "100px", template: "<span class='style-left'>{{formatTanggal('#: TGLENTRY #')}}</span>" },
                    { field: "TGLRESEP", title: "Tgl Resep", width: "100px", template: "<span class='style-left'>{{formatTanggal('#: TGLRESEP #')}}</span>" },
                    { field: "TGLPELRSP", title: "Tgl Pelayanan Resep", width: "100px", template: "<span class='style-left'>{{formatTanggal('#: TGLPELRSP #')}}</span>" },
                    // { field: "BYTAGRSP", title: "Biaya Resep", width: "100px" },
                    // { field: "BYVERRSP", title: "Verifikasi Resep", width: "100px" },
                    // { field: "KDJNSOBAT", title: "Kode Jenis Obat", width: "100px" },
                    // { field: "FASKESASAL", title: "Faskes Asal", width: "100px" },
                    // { field: "FLAGITER", title: "Flag Iterasi", width: "100px" }
                ]
            };


            $scope.klikGridBpjs = function (data) {
                console.log('Grid clicked, data:', data);
                // Check if this function is modifying or clearing the data unintentionally
            };

            $scope.DeleteOnline = function () {
                var data = {
                    "nosjp": $scope.dataKlikBpjs.NOAPOTIK,
                    "refasalsjp": $scope.dataKlikBpjs.NOSEP_KUNJUNGAN,
                    "noresep": $scope.dataKlikBpjs.NORESEP
                };
                console.log('DATA DELETE KIRIM', data);

                var datas = {
                    data: data
                };

                medifirstService.post('bridging/bpjs/hapusresep', datas).then(function (e) {
                    console.log('DATA DELETE', e);
                });
            };

        }
    ]);
});
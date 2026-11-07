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
                            "field": "nobpjs",
                            "title": "No BPJS",
                            "width": "100px",
                        },
                        {
                            "field": "jmlitter",
                            "title": "jmlitter",
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
                $scope.selectedData2 = [];
                $scope.popUpLayanan.close()
            }

            function getDetailPelayananResep(e) {
                $scope.selectedData2 = [];
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
                    $scope.sourceRincians = dat.data;
                });
            }

            // $scope.group = {
            //     field: "noresep",
            //     aggregates: [
            //         {
            //             field: "noresep",
            //             aggregate: "count"
            //         }]
            // };

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
                        "field": "aturanpakai",
                        "title": "Aturan Pakai",
                        "width": "85px",
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
                var sep = ""
                var tempnosep = ""
                if ($scope.item.nosep != undefined) {
                    var nm = "&nosep=" + $scope.item.nosep
                    tempnosep = $scope.item.nosep;
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
                    medifirstService.get("farmasi/get-data-registrasi-pasien-farmasi-apotik-online?tglAwal=" + tglAwal + '&tglAkhir=' + tglAkhir
                        +reg + rm + nm + ins + rg + kp + sep
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

                $scope.selectedItem = angular.copy(dataItem);

                
                // isi combo Iterasi
                $scope.selectedItem.iterasi = $scope.listIterasi.find(function(e){
                    return e.id == Number($scope.dataPasienSelected.jmlitter);
                });

                console.log($scope.selectedItem.jmlitter);
                console.log($scope.selectedItem.iterasi);

                $scope.popUpdataAddOns.center().open();
            };
            function validJenisObat(item, jenisId) {

                    switch (parseInt(jenisId)) {

                        case 1: // PRB
                            return item.prbbpjs === true;

                        case 2: // Kronis
                            return item.kronisbpjs === true;

                        case 3: // Kemoterapi
                            return item.kemobpjs === true;

                        default:
                            return false;
                    }
                }
            function ApiCekPeserta(nomor, type) {
                let tlgpelayanan = new moment(new Date).format("YYYY-MM-DD")
                let json = {
                    "url": `Peserta/${type}/${nomor}/tglSEP/${tlgpelayanan}`,
                    "method": "GET",
                    "data": null
                }
                $scope.isRouteLoading = true;
                medifirstService.postNonMessage("bridging/bpjs/tools", json).then(function (e) {
                    $scope.isRouteLoading = false;
                    if (e.data.metaData.code === "200") {
                        toastr.info(e.data.response.peserta.statusPeserta.keterangan, 'Status Peserta');
                        console.log("MASUK SINI BRO DIA MISKIN")
                        return;
                    } else {
                        console.log("MASUK SINI BRO DIA JUGA MISKIN TAPI BISA BAYAR")
                    }
                })
            }
            $scope.findPRB = function (listPRB, noKartu) {

                if (!listPRB || !listPRB.length)
                    return null;

                return listPRB.find(item =>
                    item.peserta &&
                    item.peserta.noKartu == noKartu
                ) || null;
            };

            $scope.checkKepesertaanByNoSrb = async function (noKartu) {
                console.log(noKartu);
                try {
                    const tglawal = moment($scope.now).subtract(7, 'days').format('YYYY-MM-DD');
                    const tglakhir = moment($scope.now).format('YYYY-MM-DD');

                    const data = {
                        url: `prb/tglMulai/${tglawal}/tglAkhir/${tglakhir}`,
                        method: "GET",
                        data: null
                    };

                    const e = await medifirstService.postNonMessage("bridging/bpjs/tools", data);

                    // document.getElementById("jsonCekSRB").innerHTML =
                    //     JSON.stringify(e.data, undefined, 4);

                    const listPRB = e.data?.response?.prb?.list || [];

                    const dataPRB = $scope.findPRB(listPRB, noKartu);

                    if (dataPRB) {

                        $scope.dataPRB = dataPRB;

                        toastr.success(
                            'Data PRB ditemukan. No SRB : ' + dataPRB.noSRB,
                            'PRB'
                        );

                        return dataPRB;

                    } else {

                        $scope.dataPRB = null;

                        toastr.info(
                            'Pasien tidak terdaftar pada data PRB.',
                            'Info'
                        );

                        return null;
                    }

                } catch (err) {

                    $scope.dataPRB = null;

                    toastr.error('Gagal mengambil data PRB');
                    console.error(err);
                    return null;
                }
            };
            $scope.cekSEP = async function (noSep) {

                try {

                    const e = await medifirstService.get(
                        'bridging/bpjs/cek-sep?nosep=' + noSep
                    );

                    console.log(e.data);

                    return e.data;

                } catch (err) {

                    console.error(err);

                    toastr.error('Gagal mengambil data SEP');

                    return null;
                }
            };
                
           $scope.saveData = async function () {
                const dataPRB = await $scope.checkKepesertaanByNoSrb(
                    $scope.dataPasienSelected.nobpjs
                );
                    console.log($scope.selectedItem.iterasi.id);
                if ($scope.selectedItem.iterasi.id == 1) {

                    const sep = await $scope.cekSEP($scope.dataPasienSelected.nosep);

                    if (!sep)
                        return;

                    const jnsPelayanan = sep.response.jnsPelayanan;

                    if (jnsPelayanan == 'Rawat Inap') {
                        toastr.warning(
                            'SEP Rawat Inap tidak dapat dilakukan Iterasi.',
                            'Apotik Online'
                        );
                        return;
                    }
                }

                // kalau mau dihentikan ketika pasien tidak ada PRB
                if ($scope.selectedItem.jenisObat.id == 1 && !dataPRB) {
                    return;
                }
                 
                ApiCekPeserta($scope.dataPasienSelected.nobpjs, "nokartu");
             
                const dataList = ($scope.selectedData2 || []).filter(x => x && x.noresep);

                if (!dataList.length) {
                    toastr.warning('Tidak ada data resep');
                    return;
                }

                function parseSigna(aturanpakai) {
                    if (!aturanpakai) return { signa1: 1, signa2: 1 };

                    const match = aturanpakai.match(/(\d+)\D+(\d+)/);

                    return {
                        signa1: match ? parseInt(match[1]) : 1,
                        signa2: match ? parseInt(match[2]) : 1
                    };
                }
                function getNamaJenisObat(id) {

                    switch (parseInt(id)) {

                        case 1:
                            return 'PRB';

                        case 2:
                            return 'Kronis Belum Stabil';

                        case 3:
                            return 'Kemoterapi';

                        default:
                            return 'BPJS';
                    }
                }
                function validJenisObat(item) {

                    switch (parseInt($scope.selectedItem.jenisObat.id)) {

                        case 1:
                            return item.prbbpjs === true;

                        case 2:
                            return item.kronisbpjs === true;

                        case 3:
                            return item.kemobpjs === true;

                        default:
                            return false;
                    }
                }

                const items = [];

                for (const item of dataList) {

                    if (!item.kdobatbpjs || !item.namaobatbpjs)
                        continue;

                    if (!validJenisObat(item)) {

                        toastr.warning(
                            item.namaproduk +
                            ' bukan termasuk obat ' +
                            getNamaJenisObat($scope.selectedItem.jenisObat.id),
                            'Apotik Online'
                        );

                        continue;
                    }

                    items.push(item);
                }

                if (!items.length) {
                    toastr.warning('Tidak ada obat yang dapat dikirim ke Apotik Online.');
                    return;
                }
                console.log("=== KIRIM RESEP ===");
                console.log("Jumlah item :", items.length);
                console.table(items.map(x => ({
                    noresep: x.noresep,
                    obat: x.namaproduk,
                    kdobat: x.kdobatbpjs
                })));
                const noresepUtama = items
                    .map(x => x.noresep)
                    .sort()[0];

                const first = items[0];

                const apotikonline = {
                    TGLSJP: moment($scope.now).format('YYYY-MM-DD 00:00:00'),
                    REFASALSJP: $scope.dataPasienSelected.nosep,
                    POLIRSP: $scope.dataPasienSelected.kdinternal,
                    KDJNSOBAT: $scope.selectedItem.jenisObat.id,
                    NORESEP: noresepUtama.slice(-5),
                    IDUSERSJP: $scope.dataPasienSelected.nocm,
                    TGLRSP: moment(first.tglpelayanan).format('YYYY-MM-DD 00:00:00'),
                    TGLPELRSP: moment(first.tglpelayanan).format('YYYY-MM-DD 00:00:00'),
                    KdDokter: first.penulisresepfk,
                    iterasi: $scope.selectedItem.iterasi.id
                };

                try {

                    const resHeader = await medifirstService.post(
                        'bridging/bpjs/save-resep-apotik-online',
                        { data: apotikonline }
                    );

                    const meta = resHeader.data.metaData || {};
                    const message = meta.message || '';
                    const msg = message.toLowerCase();

                    const isSuccess =
                        meta.code == 200 ||
                        msg.includes('data sudah di entry') ||
                        msg.includes('sudah dijadikan sjp induk iterasi');

                    if (!isSuccess) {
                        toastr.warning(message, 'Apotik Online');
                        return;
                    }

                    toastr.info(message, 'Apotik Online');

                    const match =
                        message.match(/NOSJP:\s*([^\s]+)/i) ||
                        message.match(/NoSEP Apotik:\s*([^\s]+)/i) ||
                        message.match(/NoApotik\s*([^\s]+)/i);

                    const nosjp = match
                        ? match[1].trim()
                        : $scope.dataPasienSelected.nosep;

                    if (!nosjp) {
                        toastr.error('NOSJP tidak ditemukan');
                        return;
                    }

                    let racikanNo = 0;

                    for (const item of items) {

                        const signa = parseSigna(item.aturanpakai);

                        if (signa.signa1 <= 0) {
                            signa.signa1 = 1;
                        }

                        const jml = parseFloat(item.jumlah) || 0;
                        const jho = Math.ceil(jml / signa.signa1) || 1;

                        const isNonRacikan =
                            (item.jeniskemasan || '').trim().toLowerCase().includes('non racikan');

                        console.log('ITEM:', item);
                        console.log('JENIS KEMASAN:', item.jeniskemasan);
                        console.log('IS NON RACIKAN:', isNonRacikan);

                        let payload;
                        let endpoint;

                        if (isNonRacikan) {

                            payload = {
                                data: [{
                                    NOSJP: nosjp,
                                    NORESEP: noresepUtama.slice(-5),
                                    KDOBT: item.kdobatbpjs,
                                    NMOBAT: item.namaobatbpjs,
                                    SIGNA1OBT: 1,
                                    SIGNA2OBT: 1,
                                    JMLOBT: jml,
                                    JHO: jho,
                                    CatKhsObt: ''
                                }]
                            };

                            endpoint = 'bridging/bpjs/save-non-racikan-apotik-online';

                        } else {

                            racikanNo++;

                            const no = racikanNo.toString().padStart(2, '0');

                            payload = {
                                data: [{
                                    NOSJP: nosjp,
                                    NORESEP: noresepUtama.slice(-5),
                                    JNSROBT: 'R.' + no,
                                    KDOBT: item.kdobatbpjs,
                                    NMOBAT: item.namaobatbpjs,
                                    SIGNA1OBT: signa.signa1,
                                    SIGNA2OBT: signa.signa2,
                                    PERMINTAAN: parseFloat(item.dosis || item.sedia || 1),
                                    JMLOBT: jml,
                                    JHO: jho,
                                    CatKhsObt: 'RACIKAN ' + no
                                }]
                            };

                            endpoint = 'bridging/bpjs/save-racikan-apotik-online';
                        }

                        try {

                            console.log('ENDPOINT:', endpoint);
                            console.log('PAYLOAD:', payload);

                            const result = await medifirstService.post(endpoint, payload);

                            const resMeta = result?.[0]?.data?.metaData;

                            if (resMeta) {

                                switch (resMeta.code) {

                                    case '200':
                                        toastr.success(resMeta.message, 'Sukses');
                                        break;

                                    case '201':
                                        toastr.info(resMeta.message, 'Informasi');
                                        break;

                                    case '400':
                                        toastr.warning(resMeta.message, 'Peringatan');
                                        break;

                                    case '404':
                                        toastr.error(resMeta.message, 'Error');
                                        break;

                                    default:
                                        toastr.info(
                                            resMeta.message || 'Respon diterima'
                                        );
                                }
                            }

                            await new Promise(resolve => setTimeout(resolve, 150));

                        } catch (err) {

                            console.error('ERROR ITEM:', item);
                            console.error('ERROR:', err);
                        }
                    }

                } catch (err) {
                    console.error('ERROR HEADER', err);
                    toastr.error('Gagal kirim header resep');
                }

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
            $scope.Cetak = function () {

                if (!$scope.dataPasienSelected) {
                    toastr.error('Pilih Pasien dulu');
                    return;
                }

                if (!$scope.dataSelectedRincian || !$scope.dataSelectedRincian.noresep) {
                    toastr.error('Pilih No Order dulu');
                    return;
                }

                window.open(
                    config.baseApiBackend +
                    'report/cetak-bundle-sep-resep-billing' +
                    '?noregistrasi=' + $scope.dataPasienSelected.noregistrasi +
                    '&noorder=' + $scope.dataSelectedRincian.noresep +
                    '&norec=' + $scope.dataSelectedRincian.norec_resep +
                    '&kdprofile=' + medifirstService.getProfile().kdprofile,
                    '_blank'
                );
            };
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
            $scope.DaftarPelayananBpjs = function () {

    medifirstService
        .post("bridging/bpjs/DaftarPelayananObat"  +
                        "?nosjp=" + $scope.dataKlikBpjs.NOAPOTIK +
                        "&refasalsjp=" + $scope.dataKlikBpjs.NOSEP_KUNJUNGAN +
                        "&noresep=" + $scope.dataKlikBpjs.NORESEP)

        .then(function (e) {

            var res = e.data.response || {};

                        $scope.PopUpDaftarPelayananBpjs.center().open();
            var details = [];

            if (res.listobat && res.listobat.length > 0) {

                res.listobat.forEach(function (obat) {

                    details.push({

                        noSepApotek: res.noSepApotek,
                        noSepAsal: res.noSepAsal,
                        noresep: res.noresep,
                        nokartu: res.nokartu,
                        nmpst: res.nmpst,
                        kdjnsobat: res.kdjnsobat,
                        nmjnsobat: res.nmjnsobat,
                        tglpelayanan: res.tglpelayanan,

                        kodeobat: obat.kodeobat,
                        namaobat: obat.namaobat,
                        tipeobat: obat.tipeobat,
                        signa1: obat.signa1,
                        signa2: obat.signa2,
                        hari: obat.hari,
                        permintaan: obat.permintaan,
                        jumlah: obat.jumlah,
                        harga: obat.harga

                    });

                });

            }
            
            $scope.dataPelayananBpjs = new kendo.data.DataSource({
                data: details,
                pageSize: 10
            });

        });

};
           

            $scope.GetDaftarResepBpjs = function () {
                if ($scope.item.jenisObat == null) {
                    toastr.error("jenisObat belum Dipilih !");
                    return
                }
                if ($scope.item.JnsTgl == null) {
                    toastr.error("JnsTgl belum Dipilih !");
                    return
                }
                var data = {
                    "kdppk": "0117A005",
                    "KdJnsObat": $scope.item.jenisObat.id,
                    "JnsTgl": $scope.item.JnsTgl.jenistgl,
                    "TglMulai": moment($scope.item.periodeAwal).format('YYYY-MM-DD HH:mm:ss'),
                    "TglAkhir": moment($scope.item.periodeAkhir).format('YYYY-MM-DD HH:mm:ss')
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
            $scope.onSearchTindakan = function () {
				applyFilter(
					[
						"NORESEP",
						"NOAPOTIK",
						"NOSEP_KUNJUNGAN",
						"NOKARTU",
						"NAMA"
					],
					$scope.item.search,
					'kGriddataObatBpjs2'
				);
			};
            function applyFilter(fields, keyword, gridID) {
				var grid = $("#" + gridID).data("kendoGrid");
				if (!grid) return;

				// kalau kosong → reset filter
				if (!keyword) {
					grid.dataSource.filter({});
					return;
				}

				var filters = [];

				angular.forEach(fields, function (field) {
					filters.push({
						field: field,
						operator: "contains",
						value: keyword
					});
				});

				grid.dataSource.filter({
					logic: "or",
					filters: filters
				});
			}
            $scope.columnObatBpjs = {
              toolbar: [
                "excel",
                {
                    template:
                        '<div class="grid_4" style="margin-top:-8px;">' +
                            '<div class="grid_2" style="margin-top:10px;">' +
                                '<label>Search</label>' +
                            '</div>' +
                            '<div class="grid_10">' +
                                '<input class="k-textbox" ' +
                                    'ng-model="item.search" ' +
                                    'ng-change="onSearchTindakan()" ' +
                                    'ng-model-options="{ debounce: 300 }" ' +
                                    'placeholder="Cari No kartu/Nama/ nosep..." />' +
                            '</div>' +
                        '</div>'
                }
            ],
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

            $scope.columnPelayananObatBpjs = {
                toolbar: ["excel"],
                excel: {
                    fileName: "DaftarPelayananObatBPJS.xlsx",
                    allPages: true,
                },

                excelExport: function (e) {

                    var sheet = e.workbook.sheets[0];

                    sheet.frozenRows = 2;
                    sheet.mergedCells = ["A1:N1"];
                    sheet.name = "Pelayanan Obat BPJS";

                    var myHeaders = [{
                        value: "Daftar Pelayanan Obat BPJS",
                        fontSize: 20,
                        textAlign: "center",
                        background: "#ffffff",
                    }];

                    sheet.rows.splice(0, 0, {
                        cells: myHeaders,
                        type: "header",
                        height: 70
                    });

                },

                selectable: 'row',
                pageable: true,

                columns: [

                    {
                        field: "noSepApotek",
                        title: "No SEP Apotek",
                        width: "180px"
                    },

                    {
                        field: "noSepAsal",
                        title: "No SEP Asal",
                        width: "180px"
                    },

                    {
                        field: "noresep",
                        title: "No Resep",
                        width: "100px"
                    },

                    {
                        field: "nokartu",
                        title: "No Kartu",
                        width: "150px"
                    },

                    {
                        field: "nmpst",
                        title: "Nama Pasien",
                        width: "180px"
                    },

                    {
                        field: "kdjnsobat",
                        title: "Kode Jenis Obat",
                        width: "120px"
                    },

                    {
                        field: "nmjnsobat",
                        title: "Jenis Obat",
                        width: "180px"
                    },

                    {
                        field: "tglpelayanan",
                        title: "Tgl Pelayanan",
                        width: "120px",
                        template: "<span class='style-left'>{{formatTanggal('#: tglpelayanan #')}}</span>"
                    },

                    {
                        field: "kodeobat",
                        title: "Kode Obat",
                        width: "140px"
                    },

                    {
                        field: "namaobat",
                        title: "Nama Obat",
                        width: "250px"
                    },

                    {
                        field: "tipeobat",
                        title: "Tipe Obat",
                        width: "100px"
                    },

                    {
                        field: "signa1",
                        title: "Signa 1",
                        width: "90px"
                    },

                    {
                        field: "signa2",
                        title: "Signa 2",
                        width: "90px"
                    },

                    {
                        field: "hari",
                        title: "Hari",
                        width: "80px"
                    },

                    {
                        field: "permintaan",
                        title: "Permintaan",
                        width: "100px"
                    },

                    {
                        field: "jumlah",
                        title: "Jumlah",
                        width: "100px"
                    },

                    {
                        field: "harga",
                        title: "Harga",
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
                  toolbar: [
                "excel",
                {
                    template:
                        '<div class="grid_4" style="margin-top:-8px;">' +
                            '<div class="grid_2" style="margin-top:10px;">' +
                                '<label>Search</label>' +
                            '</div>' +
                            '<div class="grid_10">' +
                                '<input class="k-textbox" ' +
                                    'ng-model="item.search" ' +
                                    'ng-change="onSearchTindakan()" ' +
                                    'ng-model-options="{ debounce: 300 }" ' +
                                    'placeholder="Cari No kartu/Nama/ nosep..." />' +
                            '</div>' +
                        '</div>'
                }
            ],
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
                    { field: "BYTAGRSP", title: "Biaya Resep", width: "100px" },
                    { field: "BYVERRSP", title: "Verifikasi Resep", width: "100px" },
                    { field: "KDJNSOBAT", title: "Kode Jenis Obat", width: "100px" },
                    { field: "FASKESASAL", title: "Faskes Asal", width: "100px" },
                    { field: "FLAGITER", title: "Flag Iterasi", width: "100px" }
                ]
            };


            $scope.klikGridBpjs = function (data) {
                console.log('Grid clicked, data:', data);
                // Check if this function is modifying or clearing the data unintentionally
            };

            $scope.DeleteOnlineObat = function () {
        
                var data = {
                    "nosepapotek" : $scope.dataKlikBpjs.noSepApotek,
                    "noresep" : $scope.dataKlikBpjs.noresep,
                    "kodeobat" : $scope.dataKlikBpjs.kodeobat,
                    "tipeobat" : $scope.dataKlikBpjs.tipeobat
                };
                console.log('DATA DELETE KIRIM', data);

                var datas = {
                    data: data
                };

                medifirstService.post('bridging/bpjs/hapusresepobat', datas).then(function (e) {
                    console.log('DATA DELETE', e);

                    if (e && e.data.metaData) {
                        if (e.data.metaData.code === '200') {
                            toastr.success(e.data.metaData.message);
                        } else {
                            toastr.error(e.data.metaData.message);
                        }
                    } else {
                        toastr.error('Terjadi kesalahan saat menghapus resep.');
                    }
                });
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

                    if (e && e.data.metaData) {
                        if (e.data.metaData.code === '200') {
                            toastr.success(e.data.metaData.message);
                        } else {
                            toastr.error(e.data.metaData.message);
                        }
                    } else {
                        toastr.error('Terjadi kesalahan saat menghapus resep.');
                    }
                });
            };

            // =====================================================================
            // TTE (BSRE) - Bundle SEP + Resep + Billing Apotik Online
            // =====================================================================
            $scope.disabledSimpan2 = false;
            $scope.disabledBatal = false;
            $scope.listPegawaiBsre = [];
            $scope.changeTTD = function () { };

            function getNorecPd() {
                // butuh field norec_pd di query get-data-registrasi-pasien-farmasi-apotik-online (pd.norec as norec_pd)
                return ($scope.dataPasienSelected && $scope.dataPasienSelected.norec) || '';
            }

            function validasiPilihan(perluResep) {
                if (!$scope.dataPasienSelected || !$scope.dataPasienSelected.noregistrasi) {
                    toastr.error('Pilih Pasien dulu', 'Info');
                    return false;
                }
                if (perluResep && (!$scope.dataSelectedRincian || !$scope.dataSelectedRincian.noresep)) {
                    toastr.error('Pilih No Resep dulu', 'Info');
                    return false;
                }
                return true;
            }

            function cekDokumenTTE(callback) {
                var norecPd = getNorecPd();
                if (!norecPd) {
                    toastr.error('norec_pd pasien tidak ditemukan', 'Info');
                    return;
                }
                medifirstService.get("emr/cek_ttd_bsre_apol?norec_pd=" + $scope.dataPasienSelected.noregistrasi, true).then(function (dat) {
                    callback((dat.data && dat.data.data) || []);
                }, function (error) {
                    console.error('Error checking file status:', error);
                });
            }

            $scope.lihatDok = function () {
                if (!validasiPilihan(false)) return;
                cekDokumenTTE(function (dataLoad) {
                    if (dataLoad.length === 0) {
                        toastr.info('Dokumen TTE belum ada', 'Info');
                        return;
                    }
                    var strBACKEND = config.baseApiBackend.replace('service/medifirst2000/', '');
                    window.open(strBACKEND + "service/storage_path?path=" + dataLoad[0].file
                        + "&mimetype=application/pdf");
                });
            };

            $scope.HapusTte = function () {
                if (!validasiPilihan(false)) return;
                cekDokumenTTE(function (dataLoad) {
                    if (dataLoad.length === 0) {
                        toastr.info('Dokumen TTE belum ada', 'Info');
                        return;
                    }
                    if (!confirm('Hapus TTE dokumen ini?')) return;
                    medifirstService.post('bsre-esign/hapus-ttd-pengajuan-apotikonline', { 'norec': dataLoad[0].id }).then(function () {
                        toastr.success('Berhasil Hapus TTD');
                    });
                });
            };

            $scope.ttdElek = function () {
                if (!validasiPilihan(true)) return;
                $scope.savePengajuanTTE(medifirstService.getPegawaiLogin().id);
            };

            $scope.savePengajuanTTE = function (pegawai) {
                if (pegawai == undefined) return;

                var url = 'report/apotikonline-tte'
                    + '?noregistrasi=' + encodeURIComponent($scope.dataPasienSelected.noregistrasi)
                    + '&noorder=' + encodeURIComponent($scope.dataSelectedRincian.noresep)
                    + '&norec=' + encodeURIComponent($scope.dataSelectedRincian.norec_resep || '')
                    + '&norec_pd=' + encodeURIComponent(getNorecPd())
                    + '&kdprofile=' + medifirstService.getProfile().kdprofile
                    + '&isttd=true'
                    + '&pegawaittd=' + pegawai;

                $scope.isRouteLoading = true;
                medifirstService.get(url).then(function (data) {
                    $scope.isRouteLoading = false;
                    var res = data.data || {};
                    var dokumen = res.dokumen;
                    if (res.status != 201 || !dokumen) {
                        toastr.error(res.message || 'Pengajuan TTE gagal', 'TTE');
                        return;
                    }
                    $scope.item.norecDOK = dokumen.id;
                    $scope.item.pegawai = { id: dokumen.pegawaifk, namalengkap: dokumen.namalengkap };
                    $scope.listPegawaiBsre = [$scope.item.pegawai];
                    $scope.item.nik = dokumen.nik_pegawai;
                    $scope.item.file = dokumen.file;
                    $scope.item.namadokumen = dokumen.namadokumen;
                    $scope.item.nomoremr = dokumen.nomoremr;
                    $scope.item.linkQR = dokumen.linkQR;
                    $scope.item.reason = dokumen.reason;
                    $scope.popUpTTD.center().open();
                }, function () {
                    $scope.isRouteLoading = false;
                });
            };

            $scope.SaveUpdate = function () {
                if ($scope.item.pegawai == undefined) {
                    toastr.error("Pegawai harus di isi!");
                    return;
                }
                if ($scope.item.nik == undefined) {
                    toastr.error("NIK harus di isi!");
                    return;
                }
                if ($scope.item.namadokumen == undefined) {
                    toastr.error("Nama Dokumen harus di isi!");
                    return;
                }
                if ($scope.item.passphrase == undefined) {
                    toastr.error("Pass Phrase harus di isi!");
                    return;
                }
                var json = {
                    'norec': $scope.item.norecDOK,
                    'passphrase': $scope.item.passphrase,
                    'nik': $scope.item.nik,
                    'reason': $scope.item.reason ? $scope.item.reason : null,
                    'iduser': medifirstService.getUserLogin().id,
                    'xAxis': '680',
                    'yAxis': '230',
                    'width': '230',
                    'height': '150'
                };

                var btnSimpan = angular.element(document.getElementById("btnSimpan2"));
                var spinElementSimpan = angular.element('<span class="fa fa-spinner fa-spin"></span>&nbsp;<span> Sedang menyimpan</span>');
                var textElementSimpan = angular.element('<span class="k-icon k-update"></span><span>Simpan</span>');

                btnSimpan.empty();
                btnSimpan.append(spinElementSimpan);
                $scope.disabledSimpan2 = true;
                $scope.disabledBatal = true;

                medifirstService.post('bsre-esign/save-ttd-pengajuan-apotikonline', json).then(function (e) {
                    btnSimpan.empty();
                    btnSimpan.append(textElementSimpan);
                    $scope.disabledSimpan2 = false;
                    $scope.disabledBatal = false;

                    if (!e.data || !e.data.dokumen) {
                        toastr.error((e.data && e.data.message) || 'TTE gagal', 'TTE');
                        return;
                    }
                    $scope.signatureId = e.data.dokumen.id;
                    $scope.item.passphrase = undefined;
                    $scope.batal();
                    $scope.VerifDokumen();
                }, function () {
                    btnSimpan.empty();
                    btnSimpan.append(textElementSimpan);
                    $scope.disabledSimpan2 = false;
                    $scope.disabledBatal = false;
                });
            };

            $scope.VerifDokumen = function () {
                if (!$scope.signatureId) {
                    toastr.error("Signature ID not available.");
                    return;
                }
                medifirstService.post("bsre-esign/verify-ttd-v2-apotikonline?id=" + $scope.signatureId).then(function (dat) {
                    if (dat.data == false || dat.data.status != undefined) {
                        toastr.error(dat.data.message);
                        return;
                    }
                    $scope.verify = dat.data;
                    $scope.popUpDoneVerif.center().open();
                });
            };

            $scope.batal = function () {
                $scope.item.norecDOK = undefined
                $scope.item.pegawai = undefined
                $scope.item.nik = undefined
                $scope.item.file = undefined
                $scope.item.namadokumen = undefined
                $scope.item.nomoremr = undefined
                $scope.item.linkQR = undefined
                $scope.item.reason = undefined
                $scope.popUpTTD.close()
            }

        }
    ]);
});
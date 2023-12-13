define(['initialize'], function (initialize) {
    'use strict';
    initialize.controller('RiwayatEchocardiografiCtrl', ['$q', '$rootScope', '$scope', '$state', 'DateHelper', 'CacheHelper', 'MedifirstService',
        function ($q, $rootScope, $scope, $state, DateHelper, cacheHelper, medifirstService) {
            $scope.item = {};
            $scope.itemDd = {};
            $scope.dataVOloaded = true;
            $scope.isRouteLoading = false;
            $scope.now = new Date();
            $scope.item.tglOperasi = new Date();
            var data2 = [];
            var norec_apd = ''
            var norec_pd = ''
            var nocm_str = ''
            $scope.item.qty = 1
            $scope.riwayatForm = false
            $scope.inputOrder = true
            $scope.CmdOrderPelayanan = true;
            $scope.OrderPelayanan = false;
            $scope.showTombol = false
            $scope.header.DataNoregis = '';
            var myVar = 0
            var detail = ''


            var data2 = [];
            $scope.PegawaiLogin2 = {};
            var namaRuangan = ''
            var namaRuanganFk = ''
            var jenisPelayananId = ""
            LoadCacheHelper();
            function LoadCacheHelper() {
                var chacePeriode = cacheHelper.get('TransaksiPelayananLaboratoriumDokterRevCtrl');
                if (chacePeriode != undefined) {
                    //var arrPeriode = chacePeriode.split(':');
                    $scope.item.noMr = chacePeriode[0]
                    nocm_str = chacePeriode[0]
                    $scope.item.namaPasien = chacePeriode[1]
                    $scope.item.jenisKelamin = chacePeriode[2]
                    $scope.item.noregistrasi = chacePeriode[3]
                    $scope.item.umur = chacePeriode[4]
                    $scope.item.kelompokPasien = chacePeriode[5]
                    $scope.item.tglRegistrasi = chacePeriode[6]
                    norec_apd = chacePeriode[7]
                    norec_pd = chacePeriode[8]
                    $scope.item.idKelas = chacePeriode[9]
                    $scope.item.kelas = chacePeriode[10]
                    $scope.item.idRuangan = chacePeriode[11]
                    namaRuanganFk = chacePeriode[11]
                    $scope.item.namaRuangan = chacePeriode[12]
                    $scope.header.DataNoregis = chacePeriode[13]
                    if ($scope.header.DataNoregis == undefined) {
                        $scope.header.DataNoregis = false;
                    }
                    
                    medifirstService.get("sysadmin/general/get-sudah-verif?noregistrasi=" +
                        $scope.item.noregistrasi, true).then(function (dat) {
                            $scope.item.statusVerif = dat.data.status
                        });
                    medifirstService.get('sysadmin/general/get-jenis-pelayanan/' + norec_pd).then(function (e) {
                        jenisPelayananId = e.data.jenispelayanan
                    })
                }
                loadDataRiwayat()
            }
            
            function loadDataRiwayat() {
                $scope.isRouteLoading = true;
                data2 = [];
                var rm = ""
                if ($scope.item.noMr != undefined) {
                    rm = "&norm=" + $scope.item.noMr
                }

                var pasien = ""
                if ($scope.item.namaPasien != undefined) {
                    pasien = "&namaPasien=" + $scope.item.namaPasien
                }

                var noReg = ""
                if ($scope.item.noregistrasi != undefined) {
                    noReg = "&noReg=" + $scope.item.noregistrasi;
                }

                    medifirstService.get("registrasi/daftar-registrasi/get-daftar-echo-pasien?" + rm + noReg + pasien
                    ).then(function (dat) {
                        $scope.isRouteLoading = false;
                        var jumlahRawat2 = 0;
                        var dRiwayatRegLama = dat.data;
                        var jumlahRawat = 0;
                        var dRiwayatReg = dat.data.daftar;                        

                        if (dRiwayatReg != undefined) {
                            for (var i = dRiwayatReg.length - 1; i >= 0; i--) {
                                if (dRiwayatReg[i].statusinap == 1) {
                                    jumlahRawat = jumlahRawat + 1;
                                    if (dRiwayatReg[i].tglpulang != undefined) {
                                        var umur = DateHelper.CountAge(new Date(dRiwayatReg[i].tglregistrasi), new Date(dRiwayatReg[i].tglpulang));
                                        var bln = umur.month,
                                            thn = umur.year,
                                            day = umur.day
                                        dRiwayatReg[i].lamarawat = day + " Hari";
                                    } else {
                                        var umur = DateHelper.CountAge(new Date(dRiwayatReg[i].tglregistrasi), new Date($scope.now));
                                        var bln = umur.month,
                                            thn = umur.year,
                                            day = umur.day
                                        dRiwayatReg[i].lamarawat = day + " Hari";
                                    }
                                }
                                data2.push(dRiwayatReg[i])
                            }
                        }

                        if (dRiwayatRegLama != undefined) {
                            for (var i = dRiwayatRegLama.length - 1; i >= 0; i--) {
                                if (dRiwayatRegLama[i].statusinap == 1) {
                                    jumlahRawat2 = jumlahRawat2 + 1;
                                    if (dRiwayatRegLama[i].tglpulang != undefined) {
                                        var umur = DateHelper.CountAge(new Date(dRiwayatRegLama[i].tglregistrasi), new Date(dRiwayatRegLama[i].tglpulang));
                                        var bln = umur.month,
                                            thn = umur.year,
                                            day = umur.day
                                        dRiwayatRegLama[i].lamarawat = day + " Hari";
                                    } else {
                                        var umur = DateHelper.CountAge(new Date(dRiwayatRegLama[i].tglregistrasi), new Date($scope.now));
                                        var bln = umur.month,
                                            thn = umur.year,
                                            day = umur.day
                                        dRiwayatRegLama[i].lamarawat = day + " Hari";
                                    }
                                }
                                data2.push(dRiwayatRegLama[i]);
                            }
                        }
                        
                        if (data2.length > 0) {
                            for (var i = data2.length - 1; i >= 0; i--) {
                                data2[i].no = 1 + i;
                            }
                        }

                        $scope.dataRiwayatRegistrasi = new kendo.data.DataSource({
                            data: data2,//dRiwayatReg,
                            pageSize: 10,
                            total: data2.length,
                            serverPaging: false,
                            schema: {
                                model: {
                                    fields: {
                                    }
                                }
                            }
                        });
                    })
            }           

            $scope.formatTanggal = function (tanggal) {
                return moment(tanggal).format('DD-MM-YYYY');
            }  
            
            $scope.columnRiwayatRegistrasi = {
                toolbar: [
                    "excel",

                ],
                excel: {
                    fileName: "DaftarRiwayatEcho.xlsx",
                    allPages: true,
                },
                excelExport: function (e) {
                    var sheet = e.workbook.sheets[0];
                    sheet.frozenRows = 2;
                    sheet.mergedCells = ["A1:K1"];
                    sheet.name = "Orders";

                    var myHeaders = [{
                        value: "Daftar Registrasi Pasien",
                        fontSize: 20,
                        textAlign: "center",
                        background: "#ffffff",
                        // color:"#ffffff"
                    }];

                    sheet.rows.splice(0, 0, { cells: myHeaders, type: "header", height: 70 });
                },
                selectable: 'row',
                pageable: true,
                columns: [
                    {
                        "field": "no",
                        "title": "No",
                        "width": "30px",
                    },
                    {
                        "field": "tglemr",
                        "title": "Tgl Diperiksa",
                        "width": "80px",
                        "template": "<span class='style-left'>{{formatTanggal('#: tglemr #')}}</span>"
                    },
                    {
                        "field": "noregistrasi",
                        "title": "No Registrasi",
                        "width": "90px"
                    },
                    {
                        "field": "emrpasienfk",
                        "title": "No EMR",
                        "width": "90px"
                    },
                    // {
                    //     "field": "namaruangan",
                    //     "title": "Ruangan Layanan",
                    //     "width": "150px",
                    //     "template": "<span class='style-left'>#: namaruangan #</span>"
                    // },
                    {
                        "field": "namadokter",
                        "title": "Dokter Pemeriksa",
                        "width": "150px",
                        "template": "<span class='style-left'>#: namadokter #</span>"
                    }, 
                    // {
                    //     "field": "kelompokpasien",
                    //     "title": "Kelompok Pasien",
                    //     "width": "150px",
                    //     "template": "<span class='style-left'>#: kelompokpasien #</span>"
                    // },
                    // {
                    //     "field": "namakelas",
                    //     "title": "Kelas",
                    //     "width": "150px",
                    //     "template": "<span class='style-left'>#: namakelas #</span>"
                    // },
                    // {
                    //     "field": "namarekanan",
                    //     "title": "Penjamin",
                    //     "width": "150px",
                    //     "template": "<span class='style-left'>#: namarekanan #</span>"
                    // },
                     
                    // {
                    //     "field": "tglpulang",
                    //     "title": "Tgl Pulang",
                    //     "width": "80px",
                    // },                                                       
                    // {
                    //     "command": [
                    //         {
                    //             text: "Pemeriksaan",
                    //             click: catatanMedik,                                
                    //             imageClass: "fa fa-medkit",
                    //         }                           
                    //     ],
                    //     title: "",
                    //     width: 280,
                    // },
                ]
            };

            function catatanMedik(e) {
                e.preventDefault();
                var dataItem = this.dataItem($(e.currentTarget).closest("tr"));

                if (dataItem.keterangan != "APP LAMA") {
                    toastr.warning("Info, Fitur ini hanya untuk melihat histori data pemeriksaan aplikasi lama!");
                    return;
                }

                $scope.isRouteLoading = true;
                medifirstService.get("registrasi/riwayat-catatanmedis-applama?noregistrasi="
                    + dataItem.noregistrasi).then(function (data) {                        
                        $scope.isRouteLoading = false;                        
                        var datas = data.data
                        if (datas.length == 0) {
                            toastr.error("Data Pemeriksaan Tidak Ditemukan!");
                            return;
                        }
                        for (let i = 0; i < datas.length; i++) {
                            const element = datas[i];  
                            element.no = i + 1;                          
                        }
                        $scope.dataDetailPemeriksaanSoap = new kendo.data.DataSource({
                            data: datas,
                            pageSize: datas.length,
                            total: datas.length,
                            serverPaging: false,
                            schema: {
                                model: {
                                    fields: {
                                    }
                                }
                            }
                        });
                        $scope.popUpDetailPemeriksaan.center().open().maximize();
                    });
            }

            $scope.columnDetailPemeriksaanSoap = {
                toolbar: [
                    "excel",
                ],
                excel: {
                    fileName: "DaftarDetailPemeriksaanSoap.xlsx",
                    allPages: true,
                },
                excelExport: function (e) {
                    var sheet = e.workbook.sheets[0];
                    sheet.frozenRows = 2;
                    sheet.mergedCells = ["A1:K1"];
                    sheet.name = "Orders";

                    var myHeaders = [{
                        value: "Daftar Riwayat Pemeriksaan SOAP",
                        fontSize: 20,
                        textAlign: "center",
                        background: "#ffffff",
                        // color:"#ffffff"
                    }];

                    sheet.rows.splice(0, 0, { cells: myHeaders, type: "header", height: 70 });
                },
                selectable: 'row',
                pageable: true,
                columns: [
                    {
                        "field": "no",
                        "title": "NO",
                        "width": "30px",
                    },
                    {
                        "field": "tglrawat",
                        "title": "TANGGAL",
                        "width": "100px",
                        "template": "<span class='style-left'>{{formatTanggal('#: tglrawat #')}}</span>"
                    },                   
                    {
                        "field": "suhu_tubuh",
                        "title": "Suhu Tubuh",
                        "width": "150px",
                        // "template": "<span class='style-left'>#: ruangan #</span>"
                    },                   
                    {
                        "field": "tensi",
                        "title": "Tensi",
                        "width": "150px",
                        // "template": "<span class='style-left'>#: FS_INSTRUKSI #</span>"
                    },
                    {
                        "field": "nadi",
                        "title": "nadi",
                        "width": "150px",
                        // "template": "<span class='style-left'>{{formatTanggal('#: tglpulang #')}}</span>"
                    },
                    {
                        "field": "respirasi",
                        "title": "Respirasi",
                        "width": "150px",
                        // "template": "<span class='style-center'>#: jumlah #</span>"
                    },
                    {
                        "field": "tinggi",
                        "title": "Tinggi",
                        "width": "150px",
                        // "template": "<span class='style-right'>{{formatRupiah('#: hargasatuan #', '')}}</span>"
                    },
                    {
                        "field": "berat",
                        "title": "Berat",
                        "width": "150px",
                        // "template": "<span class='style-right'>{{formatRupiah('#: total #', '')}}</span>"
                    },
                    {
                        "field": "spo2",
                        "title": "Spo2",
                        "width": "150px",
                        // "template": "<span class='style-right'>{{formatRupiah('#: total #', '')}}</span>"
                    },
                    {
                        "field": "gcs",
                        "title": "Gcs",
                        "width": "150px",
                        // "template": "<span class='style-right'>{{formatRupiah('#: total #', '')}}</span>"
                    },
                    {
                        "field": "kesadaran",
                        "title": "Kesadaran",
                        "width": "150px",
                        // "template": "<span class='style-right'>{{formatRupiah('#: total #', '')}}</span>"
                    },
                    {
                        "field": "keluhan",
                        "title": "Keluhan",
                        "width": "150px",
                        // "template": "<span class='style-right'>{{formatRupiah('#: total #', '')}}</span>"
                    },
                    {
                        "field": "pemeriksaan",
                        "title": "Pemeriksaan",
                        "width": "150px",
                        // "template": "<span class='style-right'>{{formatRupiah('#: total #', '')}}</span>"
                    },
                    {
                        "field": "alergi",
                        "title": "Alergi",
                        "width": "150px",
                        // "template": "<span class='style-right'>{{formatRupiah('#: total #', '')}}</span>"
                    },
                    {
                        "field": "lingkar_perut",
                        "title": "Lingkar Perut",
                        "width": "150px",
                        // "template": "<span class='style-right'>{{formatRupiah('#: total #', '')}}</span>"
                    },
                    {
                        "field": "rtl",
                        "title": "Rtl",
                        "width": "150px",
                        // "template": "<span class='style-right'>{{formatRupiah('#: total #', '')}}</span>"
                    },
                    {
                        "field": "penilaian",
                        "title": "Penilaian",
                        "width": "150px",
                        // "template": "<span class='style-right'>{{formatRupiah('#: total #', '')}}</span>"
                    },
                    {
                        "field": "instruksi",
                        "title": "Intruksi",
                        "width": "150px",
                        // "template": "<span class='style-right'>{{formatRupiah('#: total #', '')}}</span>"
                    },
                    {
                        "field": "evaluasi",
                        "title": "Evaluasi",
                        "width": "150px",
                        // "template": "<span class='style-right'>{{formatRupiah('#: total #', '')}}</span>"
                    }
                ]
            };            

            //** BATAS */
        }
    ]);
});
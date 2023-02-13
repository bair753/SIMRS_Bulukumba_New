define(['initialize'], function (initialize) {
    'use strict';
    initialize.controller('PemeriksaanPCRNakesCtrl', ['$q', '$rootScope', '$scope', '$state', 'CacheHelper', 'MedifirstService', '$timeout', '$mdDialog',
        function ($q, $rootScope, $scope, $state, cacheHelper, medifirstService, $timeout, $mdDialog) {
            $scope.dataVOloaded = true;
			$scope.now = new Date();
            $scope.item = {};
            $scope.isRouteLoading = false
            $scope.isSimpan = true
            loaddata()

            function loaddata() {
                var json = {
                    "url": "Pasien/pcr_nakes",
                    "method": "GET",
                    "jenis": "sirsonlinev3",
                    "data": null
                }
                $scope.isRouteLoading = true
                medifirstService.postNonMessage("bridging/kemenkes/tools", json).then(function (e) {
                    var data = e.data.PCRNakes;
                    if(data[0].status === "202") {
                        toastr.info(data[0].message)
                    } else {
                        for (let i = 0; i < data.length; i++) {
                            data[i].no = i + 1;
                        }
                        $scope.dataDaftarPCRNakes = new kendo.data.DataSource({
                            data: data,
                            pageSize: 10,
                            total: data.length,
                            serverPaging: false,
                            sort: {
                                field: "tanggal",
                                dir: "desc"
                            },
                            schema: {
                                model: {
                                    fields: {
                                    }
                                }
                            }
                        });
                    }
                    $scope.isRouteLoading = false
                })
            }

            $scope.SearchData = function () {
                if($scope.item.periodeAwal == undefined) {
                    loaddata()
                } else {
                    var tgl = moment($scope.item.periodeAwal).format("YYYY-MM-DD");
                    var json = {
                        "url": "Pasien/pcr_nakes",
                        "method": "GET",
                        "jenis": "sirsonlinev3",
                        "head": "x-tanggal: " + tgl,
                        "data": null
                    }
                    $scope.isRouteLoading = true
                    medifirstService.postNonMessage("bridging/kemenkes/tools", json).then(function (e) {
                        var data = e.data.PCRNakes;
                        if(data[0].status === "202") {
                            toastr.info(data[0].message)
                        } else {
                            for (let i = 0; i < data.length; i++) {
                                data[i].no = i + 1;
                            }
                            $scope.dataDaftarPCRNakes = new kendo.data.DataSource({
                                data: data,
                                pageSize: 10,
                                total: data.length,
                                serverPaging: false,
                                sort: {
                                    field: "tanggal",
                                    dir: "desc"
                                },
                                schema: {
                                    model: {
                                        fields: {
                                        }
                                    }
                                }
                            });
                        }
                        $scope.isRouteLoading = false
                    })
                }
            }

            $scope.columnDaftarPCRNakes = {
                toolbar: [
                    {
                        name: "add", text: "Tambah",
                        template: '<button ng-click="Tambah()" class="k-button k-button-icontext k-grid-upload" href="\\#"><span class="k-icon k-i-plus"></span>Tambah</button>'
                    }
                ],
                scrollable: true,
                columns: [
                    {
                        "field": "no",
                        "title": "No",
                        "width": "40px",
                        "template": "<span class='style-center'>#: no #</span>"
                    },
                    {
                        "field": "tanggal",
                        "title": "Tanggal",
                        "width": "90px",
                        "template": "<span class='style-center'>#: tanggal #</span>"
                    },
                    {
                        "field": "",
                        "title": "Dokter Umum",
                        headerAttributes: { style: "text-align : center" },
                        "columns": [
                            {
                                "field": "jumlah_tenaga_dokter_umum",
                                "title": "Jumlah Tenaga",
                                "width": "90px"
                            },
                            {
                                "field": "sudah_periksa_dokter_umum",
                                "title": "Yang Sudah Diperiksa Swab PCR",
                                "width": "85px"
                            },
                            {
                                "field": "hasil_pcr_dokter_umum",
                                "title": "Hasil PCR Terkonfirmasi",
                                "width": "112px"
                            }
                        ]
                    },
                    {
                        "field": "",
                        "title": "Dokter Spesialis",
                        headerAttributes: { style: "text-align : center" },
                        "columns": [
                            {
                                "field": "jumlah_tenaga_dokter_spesialis",
                                "title": "Jumlah Tenaga",
                                "width": "90px"
                            },
                            {
                                "field": "sudah_periksa_dokter_spesialis",
                                "title": "Yang Sudah Diperiksa Swab PCR",
                                "width": "85px"
                            },
                            {
                                "field": "hasil_pcr_dokter_spesialis",
                                "title": "Hasil PCR Terkonfirmasi",
                                "width": "112px"
                            }
                        ]
                    },
                    {
                        "field": "",
                        "title": "Dokter Gigi",
                        headerAttributes: { style: "text-align : center" },
                        "columns": [
                            {
                                "field": "jumlah_tenaga_dokter_gigi",
                                "title": "Jumlah Tenaga",
                                "width": "90px"
                            },
                            {
                                "field": "sudah_periksa_dokter_gigi",
                                "title": "Yang Sudah Diperiksa Swab PCR",
                                "width": "85px"
                            },
                            {
                                "field": "hasil_pcr_dokter_gigi",
                                "title": "Hasil PCR Terkonfirmasi",
                                "width": "112px"
                            }
                        ]
                    },
                    {
                        "field": "",
                        "title": "Residen",
                        headerAttributes: { style: "text-align : center" },
                        "columns": [
                            {
                                "field": "jumlah_tenaga_residen",
                                "title": "Jumlah Tenaga",
                                "width": "90px"
                            },
                            {
                                "field": "sudah_periksa_residen",
                                "title": "Yang Sudah Diperiksa Swab PCR",
                                "width": "85px"
                            },
                            {
                                "field": "hasil_pcr_residen",
                                "title": "Hasil PCR Terkonfirmasi",
                                "width": "112px"
                            }
                        ]
                    },
                    {
                        "field": "",
                        "title": "Perawat",
                        headerAttributes: { style: "text-align : center" },
                        "columns": [
                            {
                                "field": "jumlah_tenaga_perawat",
                                "title": "Jumlah Tenaga",
                                "width": "90px"
                            },
                            {
                                "field": "sudah_periksa_perawat",
                                "title": "Yang Sudah Diperiksa Swab PCR",
                                "width": "85px"
                            },
                            {
                                "field": "hasil_pcr_perawat",
                                "title": "Hasil PCR Terkonfirmasi",
                                "width": "112px"
                            }
                        ]
                    },
                    {
                        "field": "",
                        "title": "Bidan",
                        headerAttributes: { style: "text-align : center" },
                        "columns": [
                            {
                                "field": "jumlah_tenaga_bidan",
                                "title": "Jumlah Tenaga",
                                "width": "90px"
                            },
                            {
                                "field": "sudah_periksa_bidan",
                                "title": "Yang Sudah Diperiksa Swab PCR",
                                "width": "85px"
                            },
                            {
                                "field": "hasil_pcr_bidan",
                                "title": "Hasil PCR Terkonfirmasi",
                                "width": "112px"
                            }
                        ]
                    },
                    {
                        "field": "",
                        "title": "Apoteker",
                        headerAttributes: { style: "text-align : center" },
                        "columns": [
                            {
                                "field": "jumlah_tenaga_apoteker",
                                "title": "Jumlah Tenaga",
                                "width": "90px"
                            },
                            {
                                "field": "sudah_periksa_apoteker",
                                "title": "Yang Sudah Diperiksa Swab PCR",
                                "width": "85px"
                            },
                            {
                                "field": "hasil_pcr_apoteker",
                                "title": "Hasil PCR Terkonfirmasi",
                                "width": "112px"
                            }
                        ]
                    },
                    {
                        "field": "",
                        "title": "Radiografer",
                        headerAttributes: { style: "text-align : center" },
                        "columns": [
                            {
                                "field": "jumlah_tenaga_radiografer",
                                "title": "Jumlah Tenaga",
                                "width": "90px"
                            },
                            {
                                "field": "sudah_periksa_radiografer",
                                "title": "Yang Sudah Diperiksa Swab PCR",
                                "width": "85px"
                            },
                            {
                                "field": "hasil_pcr_radiografer",
                                "title": "Hasil PCR Terkonfirmasi",
                                "width": "112px"
                            }
                        ]
                    },
                    {
                        "field": "",
                        "title": "Analis Lab",
                        headerAttributes: { style: "text-align : center" },
                        "columns": [
                            {
                                "field": "jumlah_tenaga_analis_lab",
                                "title": "Jumlah Tenaga",
                                "width": "90px"
                            },
                            {
                                "field": "sudah_periksa_analis_lab",
                                "title": "Yang Sudah Diperiksa Swab PCR",
                                "width": "85px"
                            },
                            {
                                "field": "hasil_pcr_analis_lab",
                                "title": "Hasil PCR Terkonfirmasi",
                                "width": "112px"
                            }
                        ]
                    },
                    {
                        "field": "",
                        "title": "Co-Ass",
                        headerAttributes: { style: "text-align : center" },
                        "columns": [
                            {
                                "field": "jumlah_tenaga_co_ass",
                                "title": "Jumlah Tenaga",
                                "width": "90px"
                            },
                            {
                                "field": "sudah_periksa_co_ass",
                                "title": "Yang Sudah Diperiksa Swab PCR",
                                "width": "85px"
                            },
                            {
                                "field": "hasil_pcr_co_ass",
                                "title": "Hasil PCR Terkonfirmasi",
                                "width": "112px"
                            }
                        ]
                    },
                    {
                        "field": "",
                        "title": "Internship",
                        headerAttributes: { style: "text-align : center" },
                        "columns": [
                            {
                                "field": "jumlah_tenaga_internship",
                                "title": "Jumlah Tenaga",
                                "width": "90px"
                            },
                            {
                                "field": "sudah_periksa_internship",
                                "title": "Yang Sudah Diperiksa Swab PCR",
                                "width": "85px"
                            },
                            {
                                "field": "hasil_pcr_internship",
                                "title": "Hasil PCR Terkonfirmasi",
                                "width": "112px"
                            }
                        ]
                    },
                    {
                        "field": "",
                        "title": "Nakes Lainnya",
                        headerAttributes: { style: "text-align : center" },
                        "columns": [
                            {
                                "field": "jumlah_tenaga_nakes_lainnya",
                                "title": "Jumlah Tenaga",
                                "width": "90px"
                            },
                            {
                                "field": "sudah_periksa_nakes_lainnya",
                                "title": "Yang Sudah Diperiksa Swab PCR",
                                "width": "85px"
                            },
                            {
                                "field": "hasil_pcr_nakes_lainnya",
                                "title": "Hasil PCR Terkonfirmasi",
                                "width": "112px"
                            }
                        ]
                    },
                    {
                        "field": "",
                        "title": "Rekapitulasi",
                        headerAttributes: { style: "text-align : center" },
                        "columns": [
                            {
                                "field": "rekap_jumlah_tenaga",
                                "title": "Jumlah Tenaga",
                                "width": "90px"
                            },
                            {
                                "field": "rekap_jumlah_sudah_diperiksa",
                                "title": "Yang Sudah Diperiksa Swab PCR",
                                "width": "85px"
                            },
                            {
                                "field": "rekap_jumlah_hasil_pcr",
                                "title": "Hasil PCR Terkonfirmasi",
                                "width": "112px"
                            }
                        ]
                    },
                    {
                        "field": "tgllapor",
                        "title": "Tanggal Lapor",
                        "width": "90px",
                        "template": "<span class='style-center'>#: tgllapor #</span>"
                    }
                ]
            }

            $scope.Tambah = function () {
                clear();
                $scope.popUp.center().open();
            }

            $scope.klikedit = function (dataPCRNakesSelected) {
                $scope.item.tanggal = new Date(dataPCRNakesSelected.tanggal);
                $scope.item.jumlah_dokter_umum = parseInt(dataPCRNakesSelected.jumlah_tenaga_dokter_umum)
                $scope.item.sudah_dokter_umum = parseInt(dataPCRNakesSelected.sudah_periksa_dokter_umum)
                $scope.item.hasil_dokter_umum = parseInt(dataPCRNakesSelected.hasil_pcr_dokter_umum)
                $scope.item.jumlah_dokter_spesialis = parseInt(dataPCRNakesSelected.jumlah_tenaga_dokter_spesialis)
                $scope.item.sudah_dokter_spesialis = parseInt(dataPCRNakesSelected.sudah_periksa_dokter_spesialis)
                $scope.item.hasil_dokter_spesialis = parseInt(dataPCRNakesSelected.hasil_pcr_dokter_spesialis)
                $scope.item.jumlah_dokter_gigi = parseInt(dataPCRNakesSelected.jumlah_tenaga_dokter_gigi)
                $scope.item.sudah_dokter_gigi = parseInt(dataPCRNakesSelected.sudah_periksa_dokter_gigi)
                $scope.item.hasil_dokter_gigi = parseInt(dataPCRNakesSelected.hasil_pcr_dokter_gigi)
                $scope.item.jumlah_residen = parseInt(dataPCRNakesSelected.jumlah_tenaga_residen)
                $scope.item.sudah_residen = parseInt(dataPCRNakesSelected.sudah_periksa_residen)
                $scope.item.hasil_residen = parseInt(dataPCRNakesSelected.hasil_pcr_residen)
                $scope.item.jumlah_perawat = parseInt(dataPCRNakesSelected.jumlah_tenaga_perawat)
                $scope.item.sudah_perawat = parseInt(dataPCRNakesSelected.sudah_periksa_perawat)
                $scope.item.hasil_perawat = parseInt(dataPCRNakesSelected.hasil_pcr_perawat)
                $scope.item.jumlah_bidan = parseInt(dataPCRNakesSelected.jumlah_tenaga_bidan)
                $scope.item.sudah_bidan = parseInt(dataPCRNakesSelected.sudah_periksa_bidan)
                $scope.item.hasil_bidan = parseInt(dataPCRNakesSelected.hasil_pcr_bidan)
                $scope.item.jumlah_apoteker = parseInt(dataPCRNakesSelected.jumlah_tenaga_apoteker)
                $scope.item.sudah_apoteker = parseInt(dataPCRNakesSelected.sudah_periksa_apoteker)
                $scope.item.hasil_apoteker = parseInt(dataPCRNakesSelected.hasil_pcr_apoteker)
                $scope.item.jumlah_radiografer = parseInt(dataPCRNakesSelected.jumlah_tenaga_radiografer)
                $scope.item.sudah_radiografer = parseInt(dataPCRNakesSelected.sudah_periksa_radiografer)
                $scope.item.hasil_radiografer = parseInt(dataPCRNakesSelected.hasil_pcr_radiografer)
                $scope.item.jumlah_analis_lab = parseInt(dataPCRNakesSelected.jumlah_tenaga_analis_lab)
                $scope.item.sudah_analis_lab = parseInt(dataPCRNakesSelected.sudah_periksa_analis_lab)
                $scope.item.hasil_analis_lab = parseInt(dataPCRNakesSelected.hasil_pcr_analis_lab)
                $scope.item.jumlah_co_ass = parseInt(dataPCRNakesSelected.jumlah_tenaga_co_ass)
                $scope.item.sudah_co_ass = parseInt(dataPCRNakesSelected.sudah_periksa_co_ass)
                $scope.item.hasil_co_ass = parseInt(dataPCRNakesSelected.hasil_pcr_co_ass)
                $scope.item.jumlah_internship = parseInt(dataPCRNakesSelected.jumlah_tenaga_internship)
                $scope.item.sudah_internship = parseInt(dataPCRNakesSelected.sudah_periksa_internship)
                $scope.item.hasil_internship = parseInt(dataPCRNakesSelected.hasil_pcr_internship)
                $scope.item.jumlah_nakes_lainnya = parseInt(dataPCRNakesSelected.jumlah_tenaga_nakes_lainnya)
                $scope.item.sudah_nakes_lainnya = parseInt(dataPCRNakesSelected.sudah_periksa_nakes_lainnya)
                $scope.item.hasil_nakes_lainnya = parseInt(dataPCRNakesSelected.hasil_pcr_nakes_lainnya)
                $scope.popUp.center().open();
            }

            $scope.simpanformpcrnakes = function () {
                if($scope.item.tanggal == undefined) {
                    toastr.error("Harap isikan tanggal terlebih dahulu !");
                    return
                }
                var jumlah_dokter_umum = $scope.item.jumlah_dokter_umum == undefined ? 0 : $scope.item.jumlah_dokter_umum
                var sudah_dokter_umum = $scope.item.sudah_dokter_umum == undefined ? 0 : $scope.item.sudah_dokter_umum
                var hasil_dokter_umum = $scope.item.hasil_dokter_umum == undefined ? 0 : $scope.item.hasil_dokter_umum
                var jumlah_dokter_spesialis = $scope.item.jumlah_dokter_spesialis == undefined ? 0 : $scope.item.jumlah_dokter_spesialis
                var sudah_dokter_spesialis = $scope.item.sudah_dokter_spesialis == undefined ? 0 : $scope.item.sudah_dokter_spesialis
                var hasil_dokter_spesialis = $scope.item.hasil_dokter_spesialis == undefined ? 0 : $scope.item.hasil_dokter_spesialis
                var jumlah_dokter_gigi = $scope.item.jumlah_dokter_gigi == undefined ? 0 : $scope.item.jumlah_dokter_gigi
                var sudah_dokter_gigi = $scope.item.sudah_dokter_gigi == undefined ? 0 : $scope.item.sudah_dokter_gigi
                var hasil_dokter_gigi = $scope.item.hasil_dokter_gigi == undefined ? 0 : $scope.item.hasil_dokter_gigi
                var jumlah_residen = $scope.item.jumlah_residen == undefined ? 0 : $scope.item.jumlah_residen
                var sudah_residen = $scope.item.sudah_residen == undefined ? 0 : $scope.item.sudah_residen
                var hasil_residen = $scope.item.hasil_residen == undefined ? 0 : $scope.item.hasil_residen
                var jumlah_perawat = $scope.item.jumlah_perawat == undefined ? 0 : $scope.item.jumlah_perawat
                var sudah_perawat = $scope.item.sudah_perawat == undefined ? 0 : $scope.item.sudah_perawat
                var hasil_perawat = $scope.item.hasil_perawat == undefined ? 0 : $scope.item.hasil_perawat
                var jumlah_bidan = $scope.item.jumlah_bidan == undefined ? 0 : $scope.item.jumlah_bidan
                var sudah_bidan = $scope.item.sudah_bidan == undefined ? 0 : $scope.item.sudah_bidan
                var hasil_bidan = $scope.item.hasil_bidan == undefined ? 0 : $scope.item.hasil_bidan
                var jumlah_apoteker = $scope.item.jumlah_apoteker == undefined ? 0 : $scope.item.jumlah_apoteker
                var sudah_apoteker = $scope.item.sudah_apoteker == undefined ? 0 : $scope.item.sudah_apoteker
                var hasil_apoteker = $scope.item.hasil_apoteker == undefined ? 0 : $scope.item.hasil_apoteker
                var jumlah_radiografer = $scope.item.jumlah_radiografer == undefined ? 0 : $scope.item.jumlah_radiografer
                var sudah_radiografer = $scope.item.sudah_radiografer == undefined ? 0 : $scope.item.sudah_radiografer
                var hasil_radiografer = $scope.item.hasil_radiografer == undefined ? 0 : $scope.item.hasil_radiografer
                var jumlah_analis_lab = $scope.item.jumlah_analis_lab == undefined ? 0 : $scope.item.jumlah_analis_lab
                var sudah_analis_lab = $scope.item.sudah_analis_lab == undefined ? 0 : $scope.item.sudah_analis_lab
                var hasil_analis_lab = $scope.item.hasil_analis_lab == undefined ? 0 : $scope.item.hasil_analis_lab
                var jumlah_co_ass = $scope.item.jumlah_co_ass == undefined ? 0 : $scope.item.jumlah_co_ass
                var sudah_co_ass = $scope.item.sudah_co_ass == undefined ? 0 : $scope.item.sudah_co_ass
                var hasil_co_ass = $scope.item.hasil_co_ass == undefined ? 0 : $scope.item.hasil_co_ass
                var jumlah_internship = $scope.item.jumlah_internship == undefined ? 0 : $scope.item.jumlah_internship
                var sudah_internship = $scope.item.sudah_internship == undefined ? 0 : $scope.item.sudah_internship
                var hasil_internship = $scope.item.hasil_internship == undefined ? 0 : $scope.item.hasil_internship
                var jumlah_nakes_lainnya = $scope.item.jumlah_nakes_lainnya == undefined ? 0 : $scope.item.jumlah_nakes_lainnya
                var sudah_nakes_lainnya = $scope.item.sudah_nakes_lainnya == undefined ? 0 : $scope.item.sudah_nakes_lainnya
                var hasil_nakes_lainnya = $scope.item.hasil_nakes_lainnya == undefined ? 0 : $scope.item.hasil_nakes_lainnya
                var rekap_jumlah_tenaga = parseInt(jumlah_dokter_umum) + parseInt(jumlah_dokter_spesialis) + parseInt(jumlah_dokter_gigi) + parseInt(jumlah_residen) + parseInt(jumlah_perawat) + parseInt(jumlah_bidan) + parseInt(jumlah_apoteker) + parseInt(jumlah_radiografer) + parseInt(jumlah_analis_lab) + parseInt(jumlah_co_ass) + parseInt(jumlah_internship) + parseInt(jumlah_nakes_lainnya)
                var rekap_jumlah_sudah_diperiksa = parseInt(sudah_dokter_umum) + parseInt(sudah_dokter_spesialis) + parseInt(sudah_dokter_gigi) + parseInt(sudah_residen) + parseInt(sudah_perawat) + parseInt(sudah_bidan) + parseInt(sudah_apoteker) + parseInt(sudah_radiografer) + parseInt(sudah_analis_lab) + parseInt(sudah_co_ass) + parseInt(sudah_internship) + parseInt(sudah_nakes_lainnya)
                var rekap_jumlah_hasil_pcr = parseInt(hasil_dokter_umum) + parseInt(hasil_dokter_spesialis) + parseInt(hasil_dokter_gigi) + parseInt(hasil_residen) + parseInt(hasil_perawat) + parseInt(hasil_bidan) + parseInt(hasil_apoteker) + parseInt(hasil_radiografer) + parseInt(hasil_analis_lab) + parseInt(hasil_co_ass) + parseInt(hasil_internship) + parseInt(hasil_nakes_lainnya)
                var tgl = moment($scope.item.tanggal).format("YYYY-MM-DD");
                var json = {
                    "url": "Pasien/pcr_nakes",
                    "method": "POST",
                    "jenis": "sirsonlinev3",
                    "head": "x-tanggal: " + tgl,
                    "data": {
                        "tanggal": tgl,
                        "jumlah_tenaga_dokter_umum": jumlah_dokter_umum,
                        "sudah_periksa_dokter_umum": sudah_dokter_umum,
                        "hasil_pcr_dokter_umum": hasil_dokter_umum,
                        "jumlah_tenaga_dokter_spesialis": jumlah_dokter_spesialis,
                        "sudah_periksa_dokter_spesialis": sudah_dokter_spesialis,
                        "hasil_pcr_dokter_spesialis": hasil_dokter_spesialis,
                        "jumlah_tenaga_dokter_gigi": jumlah_dokter_gigi,
                        "sudah_periksa_dokter_gigi": sudah_dokter_gigi,
                        "hasil_pcr_dokter_gigi": hasil_dokter_gigi,
                        "jumlah_tenaga_residen": jumlah_residen,
                        "sudah_periksa_residen": sudah_residen,
                        "hasil_pcr_residen": hasil_residen,
                        "jumlah_tenaga_perawat": jumlah_perawat,
                        "sudah_periksa_perawat": sudah_perawat,
                        "hasil_pcr_perawat": hasil_perawat,
                        "jumlah_tenaga_bidan": jumlah_bidan,
                        "sudah_periksa_bidan": sudah_bidan,
                        "hasil_pcr_bidan": hasil_bidan,
                        "jumlah_tenaga_apoteker": jumlah_apoteker,
                        "sudah_periksa_apoteker": sudah_apoteker,
                        "hasil_pcr_apoteker": hasil_apoteker,
                        "jumlah_tenaga_radiografer": jumlah_radiografer,
                        "sudah_periksa_radiografer": sudah_radiografer,
                        "hasil_pcr_radiografer": hasil_radiografer,
                        "jumlah_tenaga_analis_lab": jumlah_analis_lab,
                        "sudah_periksa_analis_lab": sudah_analis_lab,
                        "hasil_pcr_analis_lab": hasil_analis_lab,
                        "jumlah_tenaga_co_ass": jumlah_co_ass,
                        "sudah_periksa_co_ass": sudah_co_ass,
                        "hasil_pcr_co_ass": hasil_co_ass,
                        "jumlah_tenaga_internship": jumlah_internship,
                        "sudah_periksa_internship": sudah_internship,
                        "hasil_pcr_internship": hasil_internship,
                        "jumlah_tenaga_nakes_lainnya": jumlah_nakes_lainnya,
                        "sudah_periksa_nakes_lainnya": sudah_nakes_lainnya,
                        "hasil_pcr_nakes_lainnya": hasil_nakes_lainnya,
                        "rekap_jumlah_tenaga": rekap_jumlah_tenaga,
                        "rekap_jumlah_sudah_diperiksa": rekap_jumlah_sudah_diperiksa,
                        "rekap_jumlah_hasil_pcr": rekap_jumlah_hasil_pcr,
                    }
                }
                $scope.isRouteLoading = true
                medifirstService.postNonMessage("bridging/kemenkes/tools", json).then(function (e) {
                    var data = e.data.PCRNakes;
                    if(data[0].status === "200") {
                        toastr.success(data[0].message)
                    }
                    $scope.isRouteLoading = false
                    clear()
                    $scope.SearchData();
                    $scope.popUp.close();
                })
            }

            function clear() {
                $scope.item.jumlah_dokter_umum = undefined
                $scope.item.sudah_dokter_umum = undefined
                $scope.item.hasil_dokter_umum = undefined
                $scope.item.jumlah_dokter_spesialis = undefined
                $scope.item.sudah_dokter_spesialis = undefined
                $scope.item.hasil_dokter_spesialis = undefined
                $scope.item.jumlah_dokter_gigi = undefined
                $scope.item.sudah_dokter_gigi = undefined
                $scope.item.hasil_dokter_gigi = undefined
                $scope.item.jumlah_residen = undefined
                $scope.item.sudah_residen = undefined
                $scope.item.hasil_residen = undefined
                $scope.item.jumlah_perawat = undefined
                $scope.item.sudah_perawat = undefined
                $scope.item.hasil_perawat = undefined
                $scope.item.jumlah_bidan = undefined
                $scope.item.sudah_bidan = undefined
                $scope.item.hasil_bidan = undefined
                $scope.item.jumlah_apoteker = undefined
                $scope.item.sudah_apoteker = undefined
                $scope.item.hasil_apoteker = undefined
                $scope.item.jumlah_radiografer = undefined
                $scope.item.sudah_radiografer = undefined
                $scope.item.hasil_radiografer = undefined
                $scope.item.jumlah_analis_lab = undefined
                $scope.item.sudah_analis_lab = undefined
                $scope.item.hasil_analis_lab = undefined
                $scope.item.jumlah_co_ass = undefined
                $scope.item.sudah_co_ass = undefined
                $scope.item.hasil_co_ass = undefined
                $scope.item.jumlah_internship = undefined
                $scope.item.sudah_internship = undefined
                $scope.item.hasil_internship = undefined
                $scope.item.jumlah_nakes_lainnya = undefined
                $scope.item.sudah_nakes_lainnya = undefined
                $scope.item.hasil_nakes_lainnya = undefined
            }
        }
    ])
})
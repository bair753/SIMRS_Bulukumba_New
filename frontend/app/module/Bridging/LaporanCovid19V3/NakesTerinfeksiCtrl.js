define(['initialize'], function (initialize) {
    'use strict';
    initialize.controller('NakesTerinfeksiCtrl', ['$q', '$rootScope', '$scope', '$state', 'CacheHelper', 'MedifirstService', '$timeout', '$mdDialog',
        function ($q, $rootScope, $scope, $state, cacheHelper, medifirstService, $timeout, $mdDialog) {
            $scope.dataVOloaded = true;
			$scope.now = new Date();
            $scope.item = {};
            $scope.isRouteLoading = false
            $scope.isSimpan = true
            loaddata()

            function loaddata() {
                var json = {
                    "url": "Pasien/harian_nakes_terinfeksi",
                    "method": "GET",
                    "jenis": "sirsonlinev3",
                    "data": null
                }
                $scope.isRouteLoading = true
                medifirstService.postNonMessage("bridging/kemenkes/tools", json).then(function (e) {
                    var data = e.data.HarianNakesTerinfeksi;
                    if(data[0].status === "202") {
                        toastr.info(data[0].message)
                    } else {
                        for (let i = 0; i < data.length; i++) {
                            data[i].no = i + 1;
                        }
                        $scope.dataDaftarNakesInfeksi = new kendo.data.DataSource({
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
                        "url": "Pasien/harian_nakes_terinfeksi",
                        "method": "GET",
                        "jenis": "sirsonlinev3",
                        "head": "x-tanggal: " + tgl,
                        "data": null
                    }
                    $scope.isRouteLoading = true
                    medifirstService.postNonMessage("bridging/kemenkes/tools", json).then(function (e) {
                        var data = e.data.HarianNakesTerinfeksi;
                        if(data[0].status === "202") {
                            toastr.info(data[0].message)
                        } else {
                            for (let i = 0; i < data.length; i++) {
                                data[i].no = i + 1;
                            }
                            $scope.dataDaftarNakesInfeksi = new kendo.data.DataSource({
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

            $scope.columnDaftarNakesInfeksi = {
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
                        "title": "Co-Assisten",
                        headerAttributes: { style: "text-align : center" },
                        "columns": [
                            {
                                "field": "co_ass",
                                "title": "Terinfeksi",
                                "width": "90px"
                            },
                            {
                                "field": "co_ass_dirawat",
                                "title": "Dirawat",
                                "width": "90px"
                            },
                            {
                                "field": "co_ass_isoman",
                                "title": "Isoman",
                                "width": "90px"
                            },
                            {
                                "field": "co_ass_sembuh",
                                "title": "Sembuh",
                                "width": "90px"
                            },
                        ]
                    },
                    {
                        "field": "",
                        "title": "Residen",
                        "width": "10%",
                        headerAttributes: { style: "text-align : center" },
                        "columns": [
                            {
                                "field": "residen",
                                "title": "Terinfeksi",
                                "width": "90px"
                            },
                            {
                                "field": "residen_dirawat",
                                "title": "Dirawat",
                                "width": "90px"
                            },
                            {
                                "field": "residen_isoman",
                                "title": "Isoman",
                                "width": "90px"
                            },
                            {
                                "field": "residen_sembuh",
                                "title": "Sembuh",
                                "width": "90px"
                            },
                        ]
                    },
                    {
                        "field": "",
                        "title": "Intership",
                        "width": "10%",
                        headerAttributes: { style: "text-align : center" },
                        "columns": [
                            {
                                "field": "intership",
                                "title": "Terinfeksi",
                                "width": "90px"
                            },
                            {
                                "field": "intership_dirawat",
                                "title": "Dirawat",
                                "width": "90px"
                            },
                            {
                                "field": "intership_isoman",
                                "title": "Isoman",
                                "width": "90px"
                            },
                            {
                                "field": "intership_sembuh",
                                "title": "Sembuh",
                                "width": "90px"
                            },
                        ]
                    },
                    {
                        "field": "",
                        "title": "Dokter Spesialis",
                        "width": "10%",
                        headerAttributes: { style: "text-align : center" },
                        "columns": [
                            {
                                "field": "dokter_spesialis",
                                "title": "Terinfeksi",
                                "width": "90px"
                            },
                            {
                                "field": "dokter_spesialis_dirawat",
                                "title": "Dirawat",
                                "width": "90px"
                            },
                            {
                                "field": "dokter_spesialis_isoman",
                                "title": "Isoman",
                                "width": "90px"
                            },
                            {
                                "field": "dokter_spesialis_sembuh",
                                "title": "Sembuh",
                                "width": "90px"
                            },
                        ]
                    },
                    {
                        "field": "",
                        "title": "Dokter Umum",
                        "width": "10%",
                        headerAttributes: { style: "text-align : center" },
                        "columns": [
                            {
                                "field": "dokter_umum",
                                "title": "Terinfeksi",
                                "width": "90px"
                            },
                            {
                                "field": "dirawat",
                                "title": "dokter_umum_dirawat",
                                "width": "90px"
                            },
                            {
                                "field": "dokter_umum_isoman",
                                "title": "Isoman",
                                "width": "90px"
                            },
                            {
                                "field": "dokter_umum_sembuh",
                                "title": "Sembuh",
                                "width": "90px"
                            },
                        ]
                    },
                    {
                        "field": "",
                        "title": "Dokter Gigi",
                        "width": "10%",
                        headerAttributes: { style: "text-align : center" },
                        "columns": [
                            {
                                "field": "dokter_gigi",
                                "title": "Terinfeksi",
                                "width": "90px"
                            },
                            {
                                "field": "dokter_gigi_dirawat",
                                "title": "Dirawat",
                                "width": "90px"
                            },
                            {
                                "field": "dokter_gigi_isoman",
                                "title": "Isoman",
                                "width": "90px"
                            },
                            {
                                "field": "dokter_gigi_sembuh",
                                "title": "Sembuh",
                                "width": "90px"
                            },
                        ]
                    },
                    {
                        "field": "",
                        "title": "Perawat",
                        "width": "10%",
                        headerAttributes: { style: "text-align : center" },
                        "columns": [
                            {
                                "field": "perawat",
                                "title": "Terinfeksi",
                                "width": "90px"
                            },
                            {
                                "field": "perawat_dirawat",
                                "title": "Dirawat",
                                "width": "90px"
                            },
                            {
                                "field": "perawat_isoman",
                                "title": "Isoman",
                                "width": "90px"
                            },
                            {
                                "field": "perawat_sembuh",
                                "title": "Sembuh",
                                "width": "90px"
                            },
                        ]
                    },
                    {
                        "field": "",
                        "title": "Bidan",
                        "width": "10%",
                        headerAttributes: { style: "text-align : center" },
                        "columns": [
                            {
                                "field": "bidan",
                                "title": "Terinfeksi",
                                "width": "90px"
                            },
                            {
                                "field": "bidan_dirawat",
                                "title": "Dirawat",
                                "width": "90px"
                            },
                            {
                                "field": "bidan_isoman",
                                "title": "Isoman",
                                "width": "90px"
                            },
                            {
                                "field": "bidan_sembuh",
                                "title": "Sembuh",
                                "width": "90px"
                            },
                        ]
                    },
                    {
                        "field": "",
                        "title": "Apoteker/Asisten Apoteker",
                        "width": "10%",
                        headerAttributes: { style: "text-align : center" },
                        "columns": [
                            {
                                "field": "apoteker",
                                "title": "Terinfeksi",
                                "width": "90px"
                            },
                            {
                                "field": "apoteker_dirawat",
                                "title": "Dirawat",
                                "width": "90px"
                            },
                            {
                                "field": "apoteker_isoman",
                                "title": "Isoman",
                                "width": "90px"
                            },
                            {
                                "field": "apoteker_sembuh",
                                "title": "Sembuh",
                                "width": "90px"
                            },
                        ]
                    },
                    {
                        "field": "",
                        "title": "Radiografer",
                        "width": "10%",
                        headerAttributes: { style: "text-align : center" },
                        "columns": [
                            {
                                "field": "radiografer",
                                "title": "Terinfeksi",
                                "width": "90px"
                            },
                            {
                                "field": "radiografer_dirawat",
                                "title": "Dirawat",
                                "width": "90px"
                            },
                            {
                                "field": "radiografer_isoman",
                                "title": "Isoman",
                                "width": "90px"
                            },
                            {
                                "field": "radiografer_sembuh",
                                "title": "Sembuh",
                                "width": "90px"
                            },
                        ]
                    },
                    {
                        "field": "",
                        "title": "Analis Lab",
                        "width": "10%",
                        headerAttributes: { style: "text-align : center" },
                        "columns": [
                            {
                                "field": "analis_lab",
                                "title": "Terinfeksi",
                                "width": "90px"
                            },
                            {
                                "field": "analis_lab_dirawat",
                                "title": "Dirawat",
                                "width": "90px"
                            },
                            {
                                "field": "analis_lab_isoman",
                                "title": "Isoman",
                                "width": "90px"
                            },
                            {
                                "field": "analis_lab_sembuh",
                                "title": "Sembuh",
                                "width": "90px"
                            },
                        ]
                    },
                    {
                        "field": "",
                        "title": "Nakes Lainnya",
                        "width": "10%",
                        headerAttributes: { style: "text-align : center" },
                        "columns": [
                            {
                                "field": "nakes_lainnya",
                                "title": "Terinfeksi",
                                "width": "90px"
                            },
                            {
                                "field": "nakes_lainnya_dirawat",
                                "title": "Dirawat",
                                "width": "90px"
                            },
                            {
                                "field": "nakes_lainnya_isoman",
                                "title": "Isoman",
                                "width": "90px"
                            },
                            {
                                "field": "nakes_lainnya_sembuh",
                                "title": "Sembuh",
                                "width": "90px"
                            },
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
            $scope.kembaliformnakesinfeksi = function () {
                $scope.popUp.close();
            }

            $scope.klikedit = function (dataNakesInfeksiSelected) {
                $scope.item.tanggal = new Date(dataNakesInfeksiSelected.tanggal);
                $scope.item.coasterinfeksi = parseInt(dataNakesInfeksiSelected.co_ass);
                $scope.item.residenterinfeksi = parseInt(dataNakesInfeksiSelected.residen);
                $scope.item.intershipterinfeksi = parseInt(dataNakesInfeksiSelected.intership);
                $scope.item.spesialisterinfeksi = parseInt(dataNakesInfeksiSelected.dokter_spesialis);
                $scope.item.umumterinfeksi = parseInt(dataNakesInfeksiSelected.dokter_umum);
                $scope.item.gigiterinfeksi = parseInt(dataNakesInfeksiSelected.dokter_gigi);
                $scope.item.perawatterinfeksi = parseInt(dataNakesInfeksiSelected.perawat);
                $scope.item.bidanterinfeksi = parseInt(dataNakesInfeksiSelected.bidan);
                $scope.item.apotekterinfeksi = parseInt(dataNakesInfeksiSelected.apoteker);
                $scope.item.radioterinfeksi = parseInt(dataNakesInfeksiSelected.radiografer);
                $scope.item.analislabterinfeksi = parseInt(dataNakesInfeksiSelected.analis_lab);
                $scope.item.nakeslainterinfeksi = parseInt(dataNakesInfeksiSelected.nakes_lainnya);
                $scope.item.coastermeninggal = parseInt(dataNakesInfeksiSelected.co_ass_meninggal);
                $scope.item.residentermeninggal = parseInt(dataNakesInfeksiSelected.residen_meninggal);
                $scope.item.intershiptermeninggal = parseInt(dataNakesInfeksiSelected.intership_meninggal);
                $scope.item.spesialistermeninggal = parseInt(dataNakesInfeksiSelected.dokter_spesialis_meninggal);
                $scope.item.umumtermeninggal = parseInt(dataNakesInfeksiSelected.dokter_umum_meninggal);
                $scope.item.gigitermeninggal = parseInt(dataNakesInfeksiSelected.dokter_gigi_meninggal);
                $scope.item.perawattermeninggal = parseInt(dataNakesInfeksiSelected.perawat_meninggal);
                $scope.item.bidantermeninggal = parseInt(dataNakesInfeksiSelected.bidan_meninggal);
                $scope.item.apotektermeninggal = parseInt(dataNakesInfeksiSelected.apoteker_meninggal);
                $scope.item.radiotermeninggal = parseInt(dataNakesInfeksiSelected.radiografer_meninggal);
                $scope.item.analislabtermeninggal = parseInt(dataNakesInfeksiSelected.analis_lab_meninggal);
                $scope.item.nakeslaintermeninggal = parseInt(dataNakesInfeksiSelected.nakes_lainnya_meninggal);
                $scope.item.coasdirawat = parseInt(dataNakesInfeksiSelected.co_ass_dirawat);
                $scope.item.coasisoman = parseInt(dataNakesInfeksiSelected.co_ass_isoman);
                $scope.item.coastersembuh = parseInt(dataNakesInfeksiSelected.co_ass_sembuh);
                $scope.item.residendirawat = parseInt(dataNakesInfeksiSelected.residen_dirawat);
                $scope.item.residenisoman = parseInt(dataNakesInfeksiSelected.residen_isoman);
                $scope.item.residentersembuh = parseInt(dataNakesInfeksiSelected.residen_sembuh);
                $scope.item.intershipdirawat = parseInt(dataNakesInfeksiSelected.intership_dirawat);
                $scope.item.intershipisoman = parseInt(dataNakesInfeksiSelected.intership_isoman);
                $scope.item.intershiptersembuh = parseInt(dataNakesInfeksiSelected.intership_sembuh);
                $scope.item.spesialisdirawat = parseInt(dataNakesInfeksiSelected.dokter_spesialis_dirawat);
                $scope.item.spesialisisoman = parseInt(dataNakesInfeksiSelected.dokter_spesialis_isoman);
                $scope.item.spesialistersembuh = parseInt(dataNakesInfeksiSelected.dokter_spesialis_sembuh);
                $scope.item.umumdirawat = parseInt(dataNakesInfeksiSelected.dokter_umum_dirawat);
                $scope.item.umumisoman = parseInt(dataNakesInfeksiSelected.dokter_umum_isoman);
                $scope.item.umumtersembuh = parseInt(dataNakesInfeksiSelected.dokter_umum_sembuh);
                $scope.item.gigidirawat = parseInt(dataNakesInfeksiSelected.dokter_gigi_dirawat);
                $scope.item.gigiisoman = parseInt(dataNakesInfeksiSelected.dokter_gigi_isoman);
                $scope.item.gigitersembuh = parseInt(dataNakesInfeksiSelected.dokter_gigi_sembuh);
                $scope.item.perawatdirawat = parseInt(dataNakesInfeksiSelected.perawat_dirawat);
                $scope.item.perawatisoman = parseInt(dataNakesInfeksiSelected.perawat_isoman);
                $scope.item.perawattersembuh = parseInt(dataNakesInfeksiSelected.perawat_sembuh);
                $scope.item.bidandirawat = parseInt(dataNakesInfeksiSelected.bidan_dirawat);
                $scope.item.bidanisoman = parseInt(dataNakesInfeksiSelected.bidan_isoman);
                $scope.item.bidantersembuh = parseInt(dataNakesInfeksiSelected.bidan_sembuh);
                $scope.item.apotekdirawat = parseInt(dataNakesInfeksiSelected.apoteker_dirawat);
                $scope.item.apotekisoman = parseInt(dataNakesInfeksiSelected.apoteker_isoman);
                $scope.item.apotektersembuh = parseInt(dataNakesInfeksiSelected.apoteker_sembuh);
                $scope.item.radiodirawat = parseInt(dataNakesInfeksiSelected.radiografer_dirawat);
                $scope.item.radioisoman = parseInt(dataNakesInfeksiSelected.radiografer_isoman);
                $scope.item.radiotersembuh = parseInt(dataNakesInfeksiSelected.radiografer_sembuh);
                $scope.item.analislabdirawat = parseInt(dataNakesInfeksiSelected.analis_lab_dirawat);
                $scope.item.analislabisoman = parseInt(dataNakesInfeksiSelected.analis_lab_isoman);
                $scope.item.analislabtersembuh = parseInt(dataNakesInfeksiSelected.analis_lab_sembuh);
                $scope.item.nakeslaindirawat = parseInt(dataNakesInfeksiSelected.nakes_lainnya_dirawat);
                $scope.item.nakeslainisoman = parseInt(dataNakesInfeksiSelected.nakes_lainnya_isoman);
                $scope.item.nakeslaintersembuh = parseInt(dataNakesInfeksiSelected.nakes_lainnya_sembuh);
                $scope.popUp.center().open();
            }

            $scope.simpanformnakesinfeksi = function () {
                if($scope.item.tanggal == undefined) {
                    toastr.error("Harap isikan tanggal terlebih dahulu !");
                    return
                }

                var tgl = moment($scope.item.tanggal).format("YYYY-MM-DD");
                var json = {
                    "url": "Pasien/harian_nakes_terinfeksi",
                    "method": "POST",
                    "jenis": "sirsonlinev3",
                    "head": "x-tanggal: " + tgl,
                    "data": {
                        "tanggal": tgl,
                        "co_ass": $scope.item.coasterinfeksi === undefined ? 0 : $scope.item.coasterinfeksi,
                        "residen": $scope.item.residenterinfeksi === undefined ? 0 : $scope.item.residenterinfeksi,
                        "intership": $scope.item.intershipterinfeksi === undefined ? 0 : $scope.item.intershipterinfeksi,
                        "dokter_spesialis": $scope.item.spesialisterinfeksi === undefined ? 0 : $scope.item.spesialisterinfeksi,
                        "dokter_umum": $scope.item.umumterinfeksi === undefined ? 0 : $scope.item.umumterinfeksi,
                        "dokter_gigi": $scope.item.gigiterinfeksi === undefined ? 0 : $scope.item.gigiterinfeksi,
                        "perawat": $scope.item.perawatterinfeksi === undefined ? 0 : $scope.item.perawatterinfeksi,
                        "bidan": $scope.item.bidanterinfeksi === undefined ? 0 : $scope.item.bidanterinfeksi,
                        "apoteker": $scope.item.apotekterinfeksi === undefined ? 0 : $scope.item.apotekterinfeksi,
                        "radiografer": $scope.item.radioterinfeksi === undefined ? 0 : $scope.item.radioterinfeksi,
                        "analis_lab": $scope.item.analislabterinfeksi === undefined ? 0 : $scope.item.analislabterinfeksi,
                        "nakes_lainnya": $scope.item.nakeslainterinfeksi === undefined ? 0 : $scope.item.nakeslainterinfeksi,
                        "co_ass_meninggal": $scope.item.coastermeninggal === undefined ? 0 : $scope.item.coastermeninggal,
                        "residen_meninggal": $scope.item.residentermeninggal === undefined ? 0 : $scope.item.residentermeninggal,
                        "intership_meninggal": $scope.item.intershiptermeninggal === undefined ? 0 : $scope.item.intershiptermeninggal,
                        "dokter_spesialis_meninggal": $scope.item.spesialistermeninggal === undefined ? 0 : $scope.item.spesialistermeninggal,
                        "dokter_umum_meninggal": $scope.item.umumtermeninggal === undefined ? 0 : $scope.item.umumtermeninggal,
                        "dokter_gigi_meninggal": $scope.item.gigitermeninggal === undefined ? 0 : $scope.item.gigitermeninggal,
                        "perawat_meninggal": $scope.item.perawattermeninggal === undefined ? 0 : $scope.item.perawattermeninggal,
                        "bidan_meninggal": $scope.item.bidantermeninggal === undefined ? 0 : $scope.item.bidantermeninggal,
                        "apoteker_meninggal": $scope.item.apotektermeninggal === undefined ? 0 : $scope.item.apotektermeninggal,
                        "radiografer_meninggal": $scope.item.radiotermeninggal === undefined ? 0 : $scope.item.radiotermeninggal,
                        "analis_lab_meninggal": $scope.item.analislabtermeninggal === undefined ? 0 : $scope.item.analislabtermeninggal,
                        "nakes_lainnya_meninggal": $scope.item.nakeslaintermeninggal === undefined ? 0 : $scope.item.nakeslaintermeninggal,
                        "co_ass_dirawat": $scope.item.coasdirawat === undefined ? 0 : $scope.item.coasdirawat,
                        "co_ass_isoman": $scope.item.coasisoman === undefined ? 0 : $scope.item.coasisoman,
                        "co_ass_sembuh": $scope.item.coastersembuh === undefined ? 0 : $scope.item.coastersembuh,
                        "residen_dirawat": $scope.item.residendirawat === undefined ? 0 : $scope.item.residendirawat,
                        "residen_isoman": $scope.item.residenisoman === undefined ? 0 : $scope.item.residenisoman,
                        "residen_sembuh": $scope.item.residentersembuh === undefined ? 0 : $scope.item.residentersembuh,
                        "intership_dirawat": $scope.item.intershipdirawat === undefined ? 0 : $scope.item.intershipdirawat,
                        "intership_isoman": $scope.item.intershipisoman === undefined ? 0 : $scope.item.intershipisoman,
                        "intership_sembuh": $scope.item.intershiptersembuh === undefined ? 0 : $scope.item.intershiptersembuh,
                        "dokter_spesialis_dirawat": $scope.item.spesialisdirawat === undefined ? 0 : $scope.item.spesialisdirawat,
                        "dokter_spesialis_isoman": $scope.item.spesialisisoman === undefined ? 0 : $scope.item.spesialisisoman,
                        "dokter_spesialis_sembuh": $scope.item.spesialistersembuh === undefined ? 0 : $scope.item.spesialistersembuh,
                        "dokter_umum_dirawat": $scope.item.umumdirawat === undefined ? 0 : $scope.item.umumdirawat,
                        "dokter_umum_isoman": $scope.item.umumisoman === undefined ? 0 : $scope.item.umumisoman,
                        "dokter_umum_sembuh": $scope.item.umumtersembuh === undefined ? 0 : $scope.item.umumtersembuh,
                        "dokter_gigi_dirawat": $scope.item.gigidirawat === undefined ? 0 : $scope.item.gigidirawat,
                        "dokter_gigi_isoman": $scope.item.gigiisoman === undefined ? 0 : $scope.item.gigiisoman,
                        "dokter_gigi_sembuh": $scope.item.gigitersembuh === undefined ? 0 : $scope.item.gigitersembuh,
                        "perawat_dirawat": $scope.item.perawatdirawat === undefined ? 0 : $scope.item.perawatdirawat,
                        "perawat_isoman": $scope.item.perawatisoman === undefined ? 0 : $scope.item.perawatisoman,
                        "perawat_sembuh": $scope.item.perawattersembuh === undefined ? 0 : $scope.item.perawattersembuh,
                        "bidan_dirawat": $scope.item.bidandirawat === undefined ? 0 : $scope.item.bidandirawat,
                        "bidan_isoman": $scope.item.bidanisoman === undefined ? 0 : $scope.item.bidanisoman,
                        "bidan_sembuh": $scope.item.bidantersembuh === undefined ? 0 : $scope.item.bidantersembuh,
                        "apoteker_dirawat": $scope.item.apotekdirawat === undefined ? 0 : $scope.item.apotekdirawat,
                        "apoteker_isoman": $scope.item.apotekisoman === undefined ? 0 : $scope.item.apotekisoman,
                        "apoteker_sembuh": $scope.item.apotektersembuh === undefined ? 0 : $scope.item.apotektersembuh,
                        "radiografer_dirawat": $scope.item.radiodirawat === undefined ? 0 : $scope.item.radiodirawat,
                        "radiografer_isoman": $scope.item.radioisoman === undefined ? 0 : $scope.item.radioisoman,
                        "radiografer_sembuh": $scope.item.radiotersembuh === undefined ? 0 : $scope.item.radiotersembuh,
                        "analis_lab_dirawat": $scope.item.analislabdirawat === undefined ? 0 : $scope.item.analislabdirawat,
                        "analis_lab_isoman": $scope.item.analislabisoman === undefined ? 0 : $scope.item.analislabisoman,
                        "analis_lab_sembuh": $scope.item.analislabtersembuh === undefined ? 0 : $scope.item.analislabtersembuh,
                        "nakes_lainnya_dirawat": $scope.item.nakeslaindirawat === undefined ? 0 : $scope.item.nakeslaindirawat,
                        "nakes_lainnya_isoman": $scope.item.nakeslainisoman === undefined ? 0 : $scope.item.nakeslainisoman,
                        "nakes_lainnya_sembuh": $scope.item.nakeslaintersembuh === undefined ? 0 : $scope.item.nakeslaintersembuh,
                    }
                }
                $scope.isRouteLoading = true
                medifirstService.postNonMessage("bridging/kemenkes/tools", json).then(function (e) {
                    var data = e.data.HarianNakesTerinfeksi;
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
                $scope.item.tanggal = undefined;
                $scope.item.coasterinfeksi = undefined;
                $scope.item.residenterinfeksi = undefined;
                $scope.item.intershipterinfeksi = undefined;
                $scope.item.spesialisterinfeksi = undefined;
                $scope.item.umumterinfeksi = undefined;
                $scope.item.gigiterinfeksi = undefined;
                $scope.item.perawatterinfeksi = undefined;
                $scope.item.bidanterinfeksi = undefined;
                $scope.item.apotekterinfeksi = undefined;
                $scope.item.radioterinfeksi = undefined;
                $scope.item.analislabterinfeksi = undefined;
                $scope.item.nakeslainterinfeksi = undefined;
                $scope.item.coastermeninggal = undefined;
                $scope.item.residentermeninggal = undefined;
                $scope.item.intershiptermeninggal = undefined;
                $scope.item.spesialistermeninggal = undefined;
                $scope.item.umumtermeninggal = undefined;
                $scope.item.gigitermeninggal = undefined;
                $scope.item.perawattermeninggal = undefined;
                $scope.item.bidantermeninggal = undefined;
                $scope.item.apotektermeninggal = undefined;
                $scope.item.radiotermeninggal = undefined;
                $scope.item.analislabtermeninggal = undefined;
                $scope.item.nakeslaintermeninggal = undefined;
                $scope.item.coasdirawat = undefined;
                $scope.item.coasisoman = undefined;
                $scope.item.coastersembuh = undefined;
                $scope.item.residendirawat = undefined;
                $scope.item.residenisoman = undefined;
                $scope.item.residentersembuh = undefined;
                $scope.item.intershipdirawat = undefined;
                $scope.item.intershipisoman = undefined;
                $scope.item.intershiptersembuh = undefined;
                $scope.item.spesialisdirawat = undefined;
                $scope.item.spesialisisoman = undefined;
                $scope.item.spesialistersembuh = undefined;
                $scope.item.umumdirawat = undefined;
                $scope.item.umumisoman = undefined;
                $scope.item.umumtersembuh = undefined;
                $scope.item.gigidirawat = undefined;
                $scope.item.gigiisoman = undefined;
                $scope.item.gigitersembuh = undefined;
                $scope.item.perawatdirawat = undefined;
                $scope.item.perawatisoman = undefined;
                $scope.item.perawattersembuh = undefined;
                $scope.item.bidandirawat = undefined;
                $scope.item.bidanisoman = undefined;
                $scope.item.bidantersembuh = undefined;
                $scope.item.apotekdirawat = undefined;
                $scope.item.apotekisoman = undefined;
                $scope.item.apotektersembuh = undefined;
                $scope.item.radiodirawat = undefined;
                $scope.item.radioisoman = undefined;
                $scope.item.radiotersembuh = undefined;
                $scope.item.analislabdirawat = undefined;
                $scope.item.analislabisoman = undefined;
                $scope.item.analislabtersembuh = undefined;
                $scope.item.nakeslaindirawat = undefined;
                $scope.item.nakeslainisoman = undefined;
                $scope.item.nakeslaintersembuh = undefined;
            }
        }
    ])
})
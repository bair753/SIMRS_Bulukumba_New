define(['initialize'], function (initialize) {
    'use strict';
    initialize.controller('DataPasienCtrl', ['$q', '$rootScope', '$scope', '$state', 'CacheHelper', 'MedifirstService', '$timeout', '$mdDialog',
        function ($q, $rootScope, $scope, $state, cacheHelper, medifirstService, $timeout, $mdDialog) {
            
			$scope.dataVOloaded = true;
			$scope.now = new Date();
            $scope.item = {};
            $scope.pencarian = {};
            $scope.pencarian.periodeAwal = new Date();
			$scope.pencarian.periodeAkhir = new Date();
            $scope.isRouteLoading = false
            $scope.item.gejala = []
            loadComboSirs();
            loadData();

            $scope.formatTanggal = function (tanggal) {
                return moment(tanggal).format('YYYY-MM-DD');
            }

            $scope.listasalpasien = [
                {
                  "id": 0,
                  "nama": "Non PPLN/PMI"
                },
                {
                  "id": 1,
                  "nama": "PPLN (Pelaku Perjalanan Luar Negeri)"
                },
                {
                  "id": 2,
                  "nama": "PMI (Pekerja Migran Indonesia)"
                }
            ]

            $scope.listpekerjaan = [
                { "id": 1, "nama": "Non Kesehatan" },
                { "id": 2, "nama": "Dokter" },
                { "id": 3, "nama": "Perawat"  },
                { "id": 4, "nama": "Petugas Kesehatan Lainnya" }
            ]

            $scope.listjenispasien = [
                { "id": 1, "nama": "Rawat Jalan" },
                { "id": 2, "nama": "IGD" },
                { "id": 3, "nama": "Rawat Inap" }
            ]

            $scope.liststatuspasien = [
                {
                  "id": 1,
                  "nama": "Suspek"
                },
                {
                  "id": 3,
                  "nama": "Konfirmasi"
                }
            ]

            $scope.listkelompokgejala = [
                {
                  "id": 1,
                  "nama": "Tanpa Gejala"
                },
                {
                  "id": 2,
                  "nama": "Bergejala, tanpa klinis pneumonia"
                },
                {
                  "id": 3,
                  "nama": "Bergejala, dengan tanda klinis pneumonia"
                },
                {
                  "id": 4,
                  "nama": "Bergejala, dengan tanda klinis pneumonia berat"
                }
            ]

            $scope.listcoinsiden = [
                {
                  "id": 0,
                  "nama": "Tidak"
                },
                {
                  "id": 1,
                  "nama": "Ya"
                }
            ]

            $scope.listalatoksigen = [
                {
                  "id": 1,
                  "nama": "Nasal Kanul"
                },
                {
                  "id": 2,
                  "nama": "Simple Mask"
                },
                {
                  "id": 3,
                  "nama": "HFNC"
                },
                {
                  "id": 4,
                  "nama": "Ventilator"
                }
            ]

            $scope.liststatusrawat =  [
                {
                  "id": 0,
                  "nama": "Isolasi Mandiri di rumah"
                },
                {
                  "id": 24,
                  "nama": "ICU Tekanan Negatif dengan Ventilator"
                },
                {
                  "id": 25,
                  "nama": "ICU Tekanan Negatif tanpa Ventilator"
                },
                {
                  "id": 26,
                  "nama": "ICU Tanpa Tekanan Negatif Dengan Ventilator"
                },
                {
                  "id": 27,
                  "nama": "ICU Tanpa Tekanan Negatif Tanpa Ventilator"
                },
                {
                  "id": 28,
                  "nama": "Isolasi Tekanan Negatif"
                },
                {
                  "id": 29,
                  "nama": "Isolasi Tanpa Tekanan Negatif"
                },
                {
                  "id": 30,
                  "nama": "NICU Khusus Covid"
                },
                {
                  "id": 31,
                  "nama": "PICU Khusus Covid"
                },
                {
                  "id": 32,
                  "nama": "IGD Khusus Covid"
                },
                {
                  "id": 33,
                  "nama": "VK (Ibu Melahirkan) Khusus Covid"
                }
            ]

            $scope.listvaksinasi = [
                {
                  "id": 0,
                  "nama": "Belum Vaksinasi"
                },
                {
                  "id": 1,
                  "nama": "Vaksinasi ke-1"
                },
                {
                  "id": 2,
                  "nama": "Vaksinasi ke-2"
                },
                {
                  "id": 3,
                  "nama": "Booster"
                },
                {
                  "id": 4,
                  "nama": "Tidak/Belum diketahui"
                }
            ]

            $scope.listpenyitas = [
                {
                  "id": 0,
                  "nama": "Tidak"
                },
                {
                  "id": 1,
                  "nama": "Ya"
                }
            ]

            $scope.checkgejala = [
                { id:1, nama: "Demam" },
                { id:2, nama: "Napas Cepat" },
                { id:3, nama: "Batuk" },
                { id:4, nama: "Mual / Muntah" },
                { id:5, nama: "Pilek" },
                { id:6, nama: "Diare" },
                { id:7, nama: "Sakit Tenggorokan" },
                { id:8, nama: "Anosmia" },
                { id:9, nama: "Nyeri Otot / Fatique" },
                { id:10, nama: "Frek. Napas 30X per menit" },
                { id:11, nama: "Lemas" },
                { id:12, nama: "Distres Pernapasan Berat" },
                { id:13, nama: "Sesak Napas" },
                { id:14, nama: "Lainnya" },
            ]

            $scope.listjenisdiagnosa = [
                { "id": 1, "nama": "primary" },
                { "id": 2, "nama": "secondary" },
            ]

            $scope.listhasilpemeriksaan = [
                { "id": 0, "nama": "Negatif" },
                { "id": 1, "nama": "Positif" },
            ]

            medifirstService.getPart("emr/get-combo-icd10", true, true, 10).then(function (data) {
                $scope.listDiagnosa = data;
            });

            function loadComboSirs() {
                medifirstService.postNonMessage("bridging/kemenkes/tools/login").then(function (e) {
                    if(e.data.status == false){
                        toastr.error(e.data.message)
                        return
                    }
                    if(e.status === 200) {
                        // get combo komorbid
                        var json = {
                            "url": "komorbid",
                            "method": "GET",
                            "token": e.data.data.access_token,
                            "data": null
                        }
                        medifirstService.postNonMessage("bridging/kemenkes/tools", json).then(function (e) {
                            var data = e.data.data;
                            for (let i = 0; i < data.length; i++) {
                                data[i].nama = data[i].id + " - " + data[i].nama
                            }
                            $scope.listkomorbid = data
                        })

                        // get combo terapi
                        var json = {
                            "url": "terapi",
                            "method": "GET",
                            "token": e.data.data.access_token,
                            "data": null
                        }
                        medifirstService.postNonMessage("bridging/kemenkes/tools", json).then(function (e) {
                            var data = e.data.data;
                            for (let i = 0; i < data.length; i++) {
                                data[i].nama = data[i].id + " - " + data[i].nama
                            }
                            $scope.listterapi = data
                        })

                        // get dosis vaksin
                        var json = {
                            "url": "dosisvaksin",
                            "method": "GET",
                            "token": e.data.data.access_token,
                            "data": null
                        }
                        medifirstService.postNonMessage("bridging/kemenkes/tools", json).then(function (e) {
                            var data = e.data.data;
                            $scope.listdosisvaksin = data
                        })

                        // get nama vaksin
                        var json = {
                            "url": "jenisvaksin",
                            "method": "GET",
                            "token": e.data.data.access_token,
                            "data": null
                        }
                        medifirstService.postNonMessage("bridging/kemenkes/tools", json).then(function (e) {
                            var data = e.data.data;
                            $scope.listnamavaksin = data
                        })

                        // get jenis pemeriksaan
                        var json = {
                            "url": "jenispemeriksaanlab",
                            "method": "GET",
                            "token": e.data.data.access_token,
                            "data": null
                        }
                        medifirstService.postNonMessage("bridging/kemenkes/tools", json).then(function (e) {
                            var data = e.data.data;
                            $scope.listjenispemeriksaan = data
                        })
                    }
                })
            }

            function loadComboSirsKeluar() {
                medifirstService.postNonMessage("bridging/kemenkes/tools/login").then(function (e) {
                    if(e.data.status == false){
                        toastr.error(e.data.message)
                        return
                    }
                    if(e.status === 200) {
                        // get status keluar
                        var json = {
                            "url": "statuskeluar",
                            "method": "GET",
                            "token": e.data.data.access_token,
                            "data": null
                        }
                        medifirstService.postNonMessage("bridging/kemenkes/tools", json).then(function (e) {
                            var data = e.data.data;
                            $scope.liststatuskeluar = data
                        })

                        // get penyebab kematian
                        var json = {
                            "url": "penyebabkematian",
                            "method": "GET",
                            "token": e.data.data.access_token,
                            "data": null
                        }
                        medifirstService.postNonMessage("bridging/kemenkes/tools", json).then(function (e) {
                            var data = e.data.data;
                            $scope.listpenyebabkematian = data
                        })

                        // get penyebab kematian langsung 
                        var json = {
                            "url": "penyebabkematianlangsung",
                            "method": "GET",
                            "token": e.data.data.access_token,
                            "data": null
                        }
                        medifirstService.postNonMessage("bridging/kemenkes/tools", json).then(function (e) {
                            var data = e.data.data;
                            $scope.listpenyebabkematianlangsung = data
                        })

                        // get status pasien saat meninggal 
                        var json = {
                            "url": "statuspasiensaatmeninggal",
                            "method": "GET",
                            "token": e.data.data.access_token,
                            "data": null
                        }
                        medifirstService.postNonMessage("bridging/kemenkes/tools", json).then(function (e) {
                            var data = e.data.data;
                            $scope.liststatuspasienmeninggal = data
                        })

                        // get komorbid coinsiden 
                        var json = {
                            "url": "komorbidcoinsiden",
                            "method": "GET",
                            "token": e.data.data.access_token,
                            "data": null
                        }
                        medifirstService.postNonMessage("bridging/kemenkes/tools", json).then(function (e) {
                            var data = e.data.data;
                            $scope.listkomorbidcoinsiden = data
                        })
                    }
                })
            }

            function loadData() {
                medifirstService.get("registrasi/laporan/get-data-combo-laporan", true).then(function (dat) {
                    $scope.listRuangan = dat.data.ruangan;
                    $scope.listKelas = dat.data.kelas;
                });

                var tglawal = moment($scope.pencarian.periodeAwal).format('YYYY-MM-DD')
                var tglakhir = moment($scope.pencarian.periodeAkhir).format('YYYY-MM-DD')
                var tempRuanganId = "";
                if ($scope.item.ruangan != undefined) {
                    tempRuanganId = "&idRuangan=" + $scope.item.ruangan.id;
                }
                var namapasien="";
                if ($scope.item.namapasien != undefined) {
                    namapasien = "&namapasien=" + $scope.item.namapasien;
                }

                var norm="";
                if ($scope.item.norm != undefined) {
                    norm = "&norm=" + $scope.item.norm;
                }

                
				$scope.isRouteLoading = true;
				medifirstService.get("bridging/kemenkes/get-data-pasien?tglawal="+tglawal+"&tglakhir="+tglakhir+ tempRuanganId +  namapasien + norm).then(function (data) {
                    $scope.isRouteLoading = false;
                    var data = data.data
                    for (let i = 0; i < data.length; i++) {
                        data[i].no = i + 1
                    }
					$scope.dataDaftarPasien = new kendo.data.DataSource({
						data: data,
						pageSize: 10,
						total: data.length,
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

            $scope.SearchData = function() {
                loadData();
            }

            $scope.update = function () {
                if($scope.dataPasienSelected == undefined)
                {
                    toastr.error("Pilih data telebih dahulu !")
                    return
                }

                loadkenformna($scope.dataPasienSelected)
                $scope.updateSirs.center().open();
            }

            $scope.diagnosa = function()
            {
                if($scope.dataPasienSelected == undefined){
                    toastr.error("Pilih data telebih dahulu !")
                    return
                }
                if($scope.dataPasienSelected.idupdatesirs === null){
                    toastr.error("Data belum dikirim ke sirs online harap update terlebih dahulu !");
                    return
                }
                $scope.item.namapasien = $scope.dataPasienSelected.namapasien
                loaddiagnosa()
            }

            function loaddiagnosa() {
                $scope.isRouteLoading = true;
                medifirstService.postNonMessage("bridging/kemenkes/tools/login").then(function (e) {
                    if(e.data.status == false){
                        toastr.error(e.data.message)
                        return
                    }
                    if(e.status === 200) {
                        var json = {
                            "url": "laporancovid19versi3diagnosa?noRM=" + $scope.dataPasienSelected.nocm,
                            "method": "GET",
                            "token": e.data.data.access_token,
                            "data": null
                        }
                        medifirstService.postNonMessage("bridging/kemenkes/tools", json).then(function (e) {
                            $scope.isRouteLoading = false;
                            var data = e.data.data;
                            for (let i = 0; i < data.length; i++) {
                                data[i].KdNamadiagnosa = data[i].icd + " - " + data[i].icdDeskription
                                data[i].jenis = data[i].diagnosa.diagnosaLevelNama
                            }
                            $scope.dataDiagnosa = new kendo.data.DataSource({
                                data: data,
                                pageSize: 10,
                                total: data.length,
                                serverPaging: false,
                                schema: {
                                    model: {
                                        fields: {
                                        }
                                    }
                                }
                            });
                            $scope.diagnosaSirs.center().open();
                        })
                    }
                });
            }

            $scope.komorbid = function () 
            {
                if($scope.dataPasienSelected == undefined){
                    toastr.error("Pilih data telebih dahulu !")
                    return
                }
                if($scope.dataPasienSelected.idupdatesirs === null){
                    toastr.error("Data belum dikirim ke sirs online harap update terlebih dahulu !");
                    return
                }
                $scope.item.namapasien = $scope.dataPasienSelected.namapasien
                loadkomorbid()
            }

            function loadkomorbid() {
                $scope.isRouteLoading = true;
                medifirstService.postNonMessage("bridging/kemenkes/tools/login").then(function (e) {
                    if(e.data.status == false){
                        toastr.error(e.data.message)
                        return
                    }
                    if(e.status === 200) {
                        var json = {
                            "url": "laporancovid19versi3komorbid?noRM=" + $scope.dataPasienSelected.nocm,
                            "method": "GET",
                            "token": e.data.data.access_token,
                            "data": null
                        }
                        medifirstService.postNonMessage("bridging/kemenkes/tools", json).then(function (e) {
                            $scope.isRouteLoading = false;
                            var data = e.data.data;
                            $scope.dataKomorbid = new kendo.data.DataSource({
                                data: data,
                                pageSize: 10,
                                total: data.length,
                                serverPaging: false,
                                schema: {
                                    model: {
                                        fields: {
                                        }
                                    }
                                }
                            });
                            $scope.komorbidSirs.center().open();
                        })
                    }
                });
            }

            $scope.terapi = function () 
            {
                if($scope.dataPasienSelected == undefined){
                    toastr.error("Pilih data telebih dahulu !")
                    return
                }
                if($scope.dataPasienSelected.idupdatesirs === null){
                    toastr.error("Data belum dikirim ke sirs online harap update terlebih dahulu !");
                    return
                }
                $scope.item.namapasien = $scope.dataPasienSelected.namapasien
                loadterapi()
            }

            function loadterapi() {
                $scope.isRouteLoading = true;
                medifirstService.postNonMessage("bridging/kemenkes/tools/login").then(function (e) {
                    if(e.data.status == false){
                        toastr.error(e.data.message)
                        return
                    }
                    if(e.status === 200) {
                        var json = {
                            "url": "laporancovid19versi3terapi?noRM=" + $scope.dataPasienSelected.nocm,
                            "method": "GET",
                            "token": e.data.data.access_token,
                            "data": null
                        }
                        medifirstService.postNonMessage("bridging/kemenkes/tools", json).then(function (e) {
                            $scope.isRouteLoading = false;
                            var data = e.data.data;
                            $scope.dataTerapi = new kendo.data.DataSource({
                                data: data,
                                pageSize: 10,
                                total: data.length,
                                serverPaging: false,
                                schema: {
                                    model: {
                                        fields: {
                                        }
                                    }
                                }
                            });
                            $scope.terapiSirs.center().open();
                        })
                    }
                });
            }

            $scope.vaksin = function () 
            {
                if($scope.dataPasienSelected == undefined){
                    toastr.error("Pilih data telebih dahulu !")
                    return
                }
                if($scope.dataPasienSelected.idupdatesirs === null){
                    toastr.error("Data belum dikirim ke sirs online harap update terlebih dahulu !");
                    return
                }
                $scope.item.namapasien = $scope.dataPasienSelected.namapasien
                loadvaksin()
            }

            function loadvaksin() {
                $scope.isRouteLoading = true;
                medifirstService.postNonMessage("bridging/kemenkes/tools/login").then(function (e) {
                    if(e.data.status == false){
                        toastr.error(e.data.message)
                        return
                    }
                    if(e.status === 200) {
                        var json = {
                            "url": "laporancovid19versi3vaksinasi?noRM=" + $scope.dataPasienSelected.nocm,
                            "method": "GET",
                            "token": e.data.data.access_token,
                            "data": null
                        }
                        medifirstService.postNonMessage("bridging/kemenkes/tools", json).then(function (e) {
                            $scope.isRouteLoading = false;
                            var data = e.data.data;
                            $scope.dataVaksin = new kendo.data.DataSource({
                                data: data,
                                pageSize: 10,
                                total: data.length,
                                serverPaging: false,
                                schema: {
                                    model: {
                                        fields: {
                                        }
                                    }
                                }
                            });
                            $scope.vaksinSirs.center().open();
                        })
                    }
                });
            }

            $scope.lab = function () 
            {
                if($scope.dataPasienSelected == undefined){
                    toastr.error("Pilih data telebih dahulu !")
                    return
                }
                if($scope.dataPasienSelected.idupdatesirs === null){
                    toastr.error("Data belum dikirim ke sirs online harap update terlebih dahulu !");
                    return
                }
                $scope.item.namapasien = $scope.dataPasienSelected.namapasien
                loadlab()
            }

            function loadlab() {
                $scope.isRouteLoading = true;
                medifirstService.postNonMessage("bridging/kemenkes/tools/login").then(function (e) {
                    if(e.data.status == false){
                        toastr.error(e.data.message)
                        return
                    }
                    if(e.status === 200) {
                        var json = {
                            "url": "laporancovid19versi3pemeriksaanlab?noRM=" + $scope.dataPasienSelected.nocm,
                            "method": "GET",
                            "token": e.data.data.access_token,
                            "data": null
                        }
                        medifirstService.postNonMessage("bridging/kemenkes/tools", json).then(function (e) {
                            $scope.isRouteLoading = false;
                            var data = e.data.data;
                            $scope.dataLab = new kendo.data.DataSource({
                                data: data,
                                pageSize: 10,
                                total: data.length,
                                serverPaging: false,
                                schema: {
                                    model: {
                                        fields: {
                                        }
                                    }
                                }
                            });
                            $scope.labSirs.center().open();
                        })
                    }
                });
            }

            $scope.keluar = function () 
            {
                if($scope.dataPasienSelected == undefined){
                    toastr.error("Pilih data telebih dahulu !")
                    return
                }
                if($scope.dataPasienSelected.idupdatesirs === null){
                    toastr.error("Data belum dikirim ke sirs online harap update terlebih dahulu !");
                    return
                }
                loadComboSirsKeluar()

                $scope.item.namapasien = $scope.dataPasienSelected.namapasien
                $scope.keluarSirs.center().open();
            }

            $scope.onchagestatuskeluar = function (e) {
                if(e.id === undefined) return;
                
                if(e.nama.toLowerCase().indexOf("meninggal") >= 0) {
                    $scope.sebabkematian = true;
                } else {
                    $scope.sebabkematian = false;
                    clearinputkeluar();
                }
            }

            $scope.onchagepenyebabkematian = function (e) {
                if(e.id === undefined) return;
                
                if(e.nama.toLowerCase().indexOf("komorbid") >= 0) {
                    $scope.sebabkomorbid = true;
                    $scope.item.penyebabkematianlangsung = undefined
                } else {
                    $scope.sebabkomorbid = false;
                    $scope.item.komorbidcoinsiden = undefined
                }
            }

            function clearinputkeluar() {
                $scope.item.penyebabkematian = undefined
                $scope.item.komorbidcoinsiden = undefined
                $scope.item.statuspasienmeninggal = undefined
                $scope.item.penyebabkematianlangsung = undefined
            }

            function loadkenformna(dataPasienSelected) {
                $scope.item.namapasien = dataPasienSelected.namapasien
                $scope.item.asalpasien = $scope.listasalpasien[0]
                $scope.item.pekerjaan = $scope.listpekerjaan[0]
                switch(dataPasienSelected.departemenid)
                {
                    case 16:
                        $scope.statusrawatdis = false
                        $scope.item.jenispasien = $scope.listjenispasien[2]
                        break;
                    case 18:
                        $scope.statusrawatdis = true
                        $scope.item.statusrawat = $scope.liststatusrawat[0]
                        $scope.item.jenispasien = $scope.listjenispasien[0]
                        break;
                    case 24:
                        $scope.statusrawatdis = true
                        $scope.item.jenispasien = $scope.listjenispasien[1]
                        break;
                }
                $scope.item.statuspasien = $scope.liststatuspasien[0]
                $scope.item.kelompokgejala = $scope.listkelompokgejala[0]
                $scope.item.coinsiden = $scope.listcoinsiden[0]
                $scope.item.penyitas = $scope.listpenyitas[0]
                $scope.showgejala = false
                $scope.showoksigen = false
                $scope.onchagekelompokgejala($scope.item.kelompokgejala);
                $scope.onchagejenispasien($scope.item.jenispasien);
            }

            $scope.onchagejenispasien = function(e) {
                if(e.id === undefined) return;

                switch(e.id)
                {
                    case 3:
                        $scope.statusrawatdis = false
                        $scope.item.statusrawat = null
                        break;
                    case 1:
                        $scope.statusrawatdis = true
                        $scope.item.statusrawat = $scope.liststatusrawat[0]
                        break;
                    case 2:
                        $scope.statusrawatdis = true
                        $scope.item.statusrawat = null
                        break;
                }
            }

            $scope.onchagekelompokgejala = function(e) {
                if(e.id === undefined) return;
                $scope.item.gejala = []
                switch(e.id)
                {
                    case 1:
                        $scope.showgejala = false
                        $scope.item.alatoksigen = null
                        break;
                    case 2:
                        $scope.showgejala = true
                        $scope.showoksigen = false
                        $scope.item.gejala[1] = true
                        $scope.item.gejala[2] = true
                        $scope.item.gejala[3] = true
                        $scope.item.gejala[5] = true
                        $scope.item.alatoksigen = $scope.listalatoksigen[0]
                        break;
                    case 3:
                        $scope.showgejala = true
                        $scope.showoksigen = true
                        $scope.item.gejala[1] = true
                        $scope.item.gejala[3] = true
                        $scope.item.gejala[5] = true
                        $scope.item.gejala[13] = true
                        $scope.item.alatoksigen = $scope.listalatoksigen[0]
                        break;
                    case 4:
                        $scope.showgejala = true
                        $scope.showoksigen = true
                        $scope.item.gejala[1] = true
                        $scope.item.gejala[3] = true
                        $scope.item.gejala[5] = true
                        $scope.item.gejala[10] = true
                        $scope.item.gejala[12] = true
                        $scope.item.gejala[13] = true
                        $scope.item.alatoksigen = $scope.listalatoksigen[1]
                        break;
                }
            }

            $scope.klikGrid = function(dataPasienSelected) {
                $scope.dataPasienSelected = dataPasienSelected;
                $scope.item = {};
            }

            $scope.columnDaftarPasien = {
				// toolbar: [
				// 	"excel",
				// ],
				// excel: {
				// 	fileName: "DaftarPasien.xlsx",
				// 	allPages: true,
				// },
				// excelExport: function (e) {
				// 	var sheet = e.workbook.sheets[0];
				// 	sheet.frozenRows = 2;
				// 	sheet.mergedCells = ["A1:M1"];

				// 	var myHeaders = [{
				// 		value: "Daftar Pasien",
				// 		fontSize: 20,
				// 		textAlign: "center",
				// 		background: "#ffffff",
				// 		// color:"#ffffff"
				// 	}];

				// 	sheet.rows.splice(0, 0, { cells: myHeaders, type: "header", height: 70 });
				// },
				selectable: 'row',
				pageable: true,
				columns:
                [
                    {
                        "field": "no",
                        "title": "No",
                        "width": "50px"
                    },
                    {
                        "field": "nocm",
                        "title": "No RM",
                        "width": "100px",
                        "template": "<span class='style-left'>#: nocm #</span>"
                    },
                    {
                        "field": "noidentitas",
                        "title": "NIK/Passport",
                        "width": "150px",
                        "template": "<span class='style-left'>#: (noidentitas === null) ? '-' : noidentitas #</span>"
                    },
                    {
                        "field": "inisial",
                        "title": "Inisial",
                        "width": "200px",
                        "template": "<span class='style-left'>#: inisial #</span>"
                    },
                    {
                        "field": "namapasien",
                        "title": "Nama",
                        "width": "250px",
                        "template": "<span class='style-left'>#: namapasien #</span>"
                    },
                    {
                        "field": "email",
                        "title": "Email",
                        "width": "150px",
                        "template": "<span class='style-left'>#: email #</span>"
                    },
                    {
                        "field": "nohp",
                        "title": "No Telp",
                        "width": "150px",
                        "template": "<span class='style-left'>#: nohp #</span>"
                    },
                    {
                        "field": "jeniskelamin",
                        "title": "Jenis Kelamin",
                        "width": "100px",
                        "template": "<span class='style-left'>#: jeniskelamin #</span>"
                    },
                    {
                        "field": "usia",
                        "title": "Usia",
                        "width": "100px",
                        "template": "<span class='style-left'>#: usia # Th</span>"
                    },
                    {
                        "field": "tglregistrasi",
                        "title": "Tanggal Masuk",
                        "width": "150px",
                        "template": "<span class='style-left'>#: tglregistrasi #</span>"
                    },
                    {
                        "field": "",
                        "title": "Alamat",
                        headerAttributes: { style: "text-align : center" },
                        "columns":[
                            {
                                "field": "namapropinsi",
                                "title": "Provinsi",
                                "width": "100px",
                                "template": "<span class='style-left'>#: (namapropinsi === null) ? '-' : namapropinsi #</span>"
                            },
                            {
                                "field": "namakotakabupaten",
                                "title": "Kabubapten/Kota",
                                "width": "100px",
                                "template": "<span class='style-left'>#: (namakotakabupaten === null) ? '-' : namakotakabupaten #</span>"
                            },
                            {
                                "field": "namakecamatan",
                                "title": "Kecamatan",
                                "width": "100px",
                                "template": "<span class='style-left'>#: (namakecamatan === null) ? '-' : namakecamatan #</span>"
                            }
                        ]
                    },
                    {
                        "field": "namaruangan",
                        "title": "Ruangan",
                        "width": "250px",
                        "template": "<span class='style-left'>#: namaruangan #</span>"
                    },
                    {
                        "field": "tglupdatesirs",
                        "title": "Tgl Lapor",
                        "width": "250px",
                        "template": "<span class='style-left'>#: (tglupdatesirs === null) ? '-' : tglupdatesirs #</span>"
                    }
                ]
			};

            $scope.columnDiagnosa = {
                columns:
                [
                    {
                        "field": "KdNamadiagnosa",
                        "title": "Diagnosa",
                        "width": "200px",
                        "template": "<span class='style-left'>#: KdNamadiagnosa #</span>"
                    },
                    {
                        "field": "jenis",
                        "title": "Level",
                        "width": "100px",
                        "template": "<span class='style-left'>#: jenis #</span>"
                    },
                ]
            }

            $scope.columnKomorbid = {
                columns:
                [
                    {
                        "field": "icd",
                        "title": "Kode ICD",
                        "width": "80px",
                        "template": "<span class='style-left'>#: icd #</span>"
                    },
                    {
                        "field": "icd10Description",
                        "title": "Jenis Komorbid",
                        "width": "200px",
                        "template": "<span class='style-left'>#: icd10Description #</span>"
                    },
                ]
            }

            $scope.columnTerapi = {
                columns:
                [
                    {
                        "field": "terapi.terapiNama",
                        "title": "Nama Terapi",
                        "width": "200px",
                        "template": "<span class='style-left'>#: terapi.terapiNama #</span>"
                    },
                    {
                        "field": "jumlah",
                        "title": "Jumlah",
                        "width": "80px",
                        "template": "<span class='style-left'>#: jumlah #</span>"
                    },
                ]
            }

            $scope.columnVaksin = {
                columns:
                [
                    {
                        "field": "dosisVaksin.Nama",
                        "title": "Dosis Vaksin",
                        "width": "100px",
                        "template": "<span class='style-left'>#: dosisVaksin.Nama #</span>"
                    },
                    {
                        "field": "jenisVaksin.nama",
                        "title": "Nama Vaksin",
                        "width": "200px",
                        "template": "<span class='style-left'>#: jenisVaksin.nama #</span>"
                    },
                ]
            }

            $scope.columnLab = {
                columns:
                [
                    {
                        "field": "jenisPemeriksaanLab.jenisPemeriksaanLabNama",
                        "title": "Jenis Pemeriksaan",
                        "width": "200px",
                        "template": "<span class='style-left'>#: jenisPemeriksaanLab.jenisPemeriksaanLabNama #</span>"
                    },
                    {
                        "field": "hasilPemeriksaanLab.hasilPemeriksaanLabNama",
                        "title": "Hasil Pemeriksaan",
                        "width": "100px",
                        "template": "<span class='style-left'>#: hasilPemeriksaanLab.hasilPemeriksaanLabNama #</span>"
                    },
                    {
                        "field": "tanggalHasilPemeriksaanLab",
                        "title": "Tanggal Hasil",
                        "width": "100px",
                        "template": "<span class='style-left'>{{formatTanggal('#: tanggalHasilPemeriksaanLab #')}}</span>"
                    },
                ]
            }

            $scope.kirimdatakesirs = function() {
                if($scope.dataPasienSelected.kdnegarasirs === null) {
                    toastr.error("Kewarganegaraan belum ada harap edit pasien telebih dahulu !")
                    return
                }
                if($scope.dataPasienSelected.noidentitas === null) {
                    toastr.error("Nik belum ada harap edit pasien telebih dahulu !")
                    return
                }
                if($scope.dataPasienSelected.kdpropinsisirs  === null) {
                    toastr.error("Provinsi belum ada harap edit pasien telebih dahulu !")
                    return
                }
                if($scope.dataPasienSelected.kdkotakabupatensirs  === null) {
                    toastr.error("Kabkota belum ada harap edit pasien telebih dahulu !")
                    return
                }
                if($scope.dataPasienSelected.kdkecamatansirs  === null) {
                    toastr.error("Kecamatan belum ada harap edit pasien telebih dahulu !")
                    return
                }
                if($scope.item.asalpasien === undefined){
                    toastr.error("Asal pasien masih kosong harap isi telebih dahulu !")
                    return
                }
                if($scope.item.pekerjaan === undefined){
                    toastr.error("Pekerjaan masih kosong harap isi telebih dahulu !")
                    return
                }
                if($scope.item.jenispasien === undefined){
                    toastr.error("Jenis Pasien masih kosong harap isi telebih dahulu !")
                    return
                }
                if($scope.item.statuspasien === undefined){
                    toastr.error("Status Pasien masih kosong harap isi telebih dahulu !")
                    return
                }
                if($scope.item.kelompokgejala === undefined){
                    toastr.error("Gejala Covid 19 masih kosong harap isi telebih dahulu !")
                    return
                }
                if($scope.item.tglonsetgejala === undefined){
                    toastr.error("Tanggal Onset Gejala masih kosong harap isi telebih dahulu !")
                    return
                }
                if($scope.item.coinsiden === undefined){
                    toastr.error("Co Insiden masih kosong harap isi telebih dahulu !")
                    return
                }
                if($scope.item.penyitas === undefined){
                    toastr.error("Penyintas masih kosong harap isi telebih dahulu !")
                    return
                }

                $scope.updateSirs.close();
                var confirm = $mdDialog.confirm()
                .title('Peringatan')
                .textContent('Pastikan data yang akan dikirim sudah benar !')
                .ariaLabel('Lucky day')
                .cancel('Tidak')
                .ok('Ya')
                $mdDialog.show(confirm).then(
                function () {
                    $scope.lanjutkirimdatakesirs();
                },
                function () {
                    $scope.updateSirs.center().open();
                })
            }

            $scope.lanjutkirimdatakesirs = function() {
				$scope.isRouteLoading = true;
                medifirstService.postNonMessage("bridging/kemenkes/tools/login").then(function (e) {
                    
                    if(e.data.status == false){
                        toastr.error(e.data.message)
                        return
                    }
                    if(e.status === 200) {
                        var json = {
                            "url": "laporancovid19versi3",
                            "method": "POST",
                            "token": e.data.data.access_token,
                            "data": {
                                "kewarganegaraanId": $scope.dataPasienSelected.kdnegarasirs,
                                "nik": $scope.dataPasienSelected.noidentitas,
                                "noPassport": $scope.dataPasienSelected.paspor,
                                "asalPasienId":$scope.item.asalpasien.id,
                                "noRM":  $scope.dataPasienSelected.nocm,
                                "namaLengkapPasien":  $scope.dataPasienSelected.namapasien,
                                "namaInisialPasien":  $scope.dataPasienSelected.namapasien,
                                "tanggalLahir":  $scope.dataPasienSelected.tgllahir,
                                "email":  $scope.dataPasienSelected.email === '-' ? null : $scope.dataPasienSelected.email,
                                "noTelp": $scope.dataPasienSelected.nohp,
                                "jenisKelaminId": $scope.dataPasienSelected.idjeniskelamin == 1 ? "L" : "P",
                                "domisiliKecamatanId": $scope.dataPasienSelected.kdkecamatansirs,
                                "domisiliKabKotaId": $scope.dataPasienSelected.kdkotakabupatensirs,
                                "domisiliProvinsiId": $scope.dataPasienSelected.kdpropinsisirs,
                                "pekerjaanId": $scope.item.pekerjaan.id,
                                "tanggalMasuk": $scope.dataPasienSelected.tglregistrasi,
                                "jenisPasienId": $scope.item.jenispasien.id,
                                "varianCovidId": $scope.item.variancovid === undefined ? 0 : 0,
                                "statusPasienId": $scope.item.statuspasien.id,
                                "statusCoInsidenId": $scope.item.coinsiden.id,
                                "statusRawatId": $scope.item.statusrawat === null ? 0 : $scope.item.statusrawat.id,
                                "alatOksigenId": $scope.item.alatoksigen === null ? null : $scope.item.alatoksigen.id,
                                "penyintasId": $scope.item.penyitas.id,
                                "tanggalOnsetGejala": moment($scope.item.tglonsetgejala).format("YYYY-MM-DD"),
                                "kelompokGejalaId": $scope.item.kelompokgejala.id,
                                "gejala": {
                                  "demamId": $scope.item.gejala[0] === true ? 1 : 0,    
                                  "napasCepatId": $scope.item.gejala[1] === true ? 1 : 0,
                                  "batukId": $scope.item.gejala[2] === true ? 1 : 0,
                                  "mualMuntahId": $scope.item.gejala[3] === true ? 1 : 0,
                                  "pilekId": $scope.item.gejala[4] === true ? 1 : 0,
                                  "diareId": $scope.item.gejala[5] === true ? 1 : 0,
                                  "sakitTenggorokanId": $scope.item.gejala[6] === true ? 1 : 0,
                                  "anosmiaId": $scope.item.gejala[7] === true ? 1 : 0,
                                  "nyeriOtotId": $scope.item.gejala[8] === true ? 1 : 0,
                                  "frekNapas30KaliPerMenitId": $scope.item.gejala[9] === true ? 1 : 0,
                                  "lemasId": $scope.item.gejala[10] === true ? 1 : 0,
                                  "distresPernapasanBeratId": $scope.item.gejala[11] === true ? 1 : 0,
                                  "sesakNapasId": $scope.item.gejala[12] === true ? 1 : 0,
                                  "lainnyaId": $scope.item.gejala[13] === true ? 1 : 0
                                }
                            }
                        }
                        var jsonupdate = json;
                        $scope.isRouteLoading = true;
                        medifirstService.postNonMessage("bridging/kemenkes/tools", json).then(function (e) {
                            if(e.data.status){
                                var json = {
                                    norec_pd: $scope.dataPasienSelected.norec,
                                    id: e.data.data.id
                                }
                                medifirstService.post("bridging/kemenkes/save-id-bridging", json).then(function (e) {
                                    $scope.isRouteLoading = false;
                                    loadData()
                                })
                                toastr.info(e.data.message)
                            } else {
                                jsonupdate.url = "laporancovid19versi3/" + $scope.dataPasienSelected.idupdatesirs;
                                jsonupdate.method = "PATCH";
                                medifirstService.postNonMessage("bridging/kemenkes/tools", jsonupdate).then(function (e) {
                                    if(e.data.status){
                                        toastr.success(e.data.message)
                                        $scope.isRouteLoading = false;
                                        loadData()
                                    } else {
                                        toastr.error(e.data.message)
                                        $scope.isRouteLoading = false;
                                    }
                                })
                            }
                            
                        })
                    }
                })
            }
            
            $scope.simpandiagnosadatakesirs = function () {
                if($scope.dataPasienSelected === undefined){
                    toastr.error("Data Pasien belum dipilih !")
                    return
                }
                if($scope.dataPasienSelected.idupdatesirs === null){
                    toastr.error("Data belum dikirim ke sirs online harap update terlebih dahulu !");
                    return
                }
                if($scope.item.diagnosa === undefined) {
                    toastr.error("Diagnosa belum diisi !")
                    return
                }
                if($scope.item.jenisdiagnosa === undefined) {
                    toastr.error("Jenis diagnosa belum diisi !")
                    return
                }

                $scope.isRouteLoading = true;
                medifirstService.postNonMessage("bridging/kemenkes/tools/login").then(function (e) {
                    if(e.data.status == false){
                        toastr.error(e.data.message)
                        return
                    }
                    if(e.status === 200) {
                        if ($scope.dataDiagnosaSelected === undefined) {
                            var json = {
                                "url": "laporancovid19versi3diagnosa",
                                "method": "POST",
                                "token": e.data.data.access_token,
                                "data": {
                                    "laporanCovid19Versi3Id": $scope.dataPasienSelected.idupdatesirs,
                                    "diagnosaLevelId": $scope.item.jenisdiagnosa.id,
                                    "diagnosaId": $scope.item.diagnosa.kdDiagnosa
                                }
                            }
                        } else {
                            var json = {
                                "url": "laporancovid19versi3diagnosa/" + $scope.dataDiagnosaSelected.id,
                                "method": "PATCH",
                                "token": e.data.data.access_token,
                                "data": {
                                    "diagnosaLevelId": $scope.item.jenisdiagnosa.id,
                                    "diagnosaId": $scope.item.diagnosa.kdDiagnosa
                                }
                            }
                        }
                        
                        medifirstService.postNonMessage("bridging/kemenkes/tools", json).then(function (e) {
                            $scope.isRouteLoading = false;
                            if(e.data.status){
                                toastr.success(e.data.message)
                            } else {
                                toastr.warning(e.data.message)
                            }
                            $scope.item.jenisdiagnosa = undefined;
                            $scope.item.diagnosa = undefined;
                            $scope.dataDiagnosaSelected = undefined;
                            loaddiagnosa()
                        })
                    }
                })
            }

            $scope.KlikDiagnosa = function(dataDiagnosaSelected) {
                $scope.dataDiagnosaSelected = dataDiagnosaSelected;

                var kode = $scope.dataDiagnosaSelected.icd
                var nama = $scope.dataDiagnosaSelected.icdDeskription
                $scope.listDiagnosa.add({kdDiagnosa: kode, kodeNama: kode + ' - ' + nama })
                $scope.item.jenisdiagnosa = { id: $scope.dataDiagnosaSelected.diagnosa.diagnosaLevelId, nama: $scope.dataDiagnosaSelected.diagnosa.diagnosaLevelNama }
                $scope.item.diagnosa = { kdDiagnosa: kode, kodeNama: kode + ' - ' + nama }
            }
            
            $scope.simpankomorbiddatakesirs = function() {
                if($scope.dataPasienSelected === undefined){
                    toastr.error("Data Pasien belum dipilih !")
                    return
                }
                if($scope.dataPasienSelected.idupdatesirs === null){
                    toastr.error("Data belum dikirim ke sirs online harap update terlebih dahulu !");
                    return
                }
                if($scope.item.komorbid === undefined) {
                    toastr.error("Komorbid belum diisi !")
                    return
                }

                $scope.isRouteLoading = true;
                medifirstService.postNonMessage("bridging/kemenkes/tools/login").then(function (e) {
                    if(e.data.status == false){
                        toastr.error(e.data.message)
                        return
                    }
                    if(e.status === 200) {
                        if ($scope.dataKomorbidSelected === undefined) {
                            var json = {
                                "url": "laporancovid19versi3komorbid",
                                "method": "POST",
                                "token": e.data.data.access_token,
                                "data": {
                                    "laporanCovid19Versi3Id": $scope.dataPasienSelected.idupdatesirs,
                                    "komorbidId": $scope.item.komorbid.id,
                                }
                            }
                        } else {
                            var json = {
                                "url": "laporancovid19versi3komorbid/" + $scope.dataKomorbidSelected.id,
                                "method": "PATCH",
                                "token": e.data.data.access_token,
                                "data": {
                                    "komorbidId": $scope.item.komorbid.id,
                                }
                            }
                        }

                        medifirstService.postNonMessage("bridging/kemenkes/tools", json).then(function (e) {
                            $scope.isRouteLoading = false;
                            if(e.data.status){
                                toastr.success(e.data.message)
                            } else {
                                toastr.warning(e.data.message)
                            }
                            $scope.item.komorbid = undefined;
                            $scope.dataKomorbidSelected = undefined;
                            loadkomorbid()
                        })
                    }
                })
            }

            $scope.KlikKomorbid = function(dataKomorbidSelected) {
                $scope.dataKomorbidSelected = dataKomorbidSelected;

                var kode = $scope.dataKomorbidSelected.icd
                var nama = $scope.dataKomorbidSelected.icd10Description
                $scope.item.komorbid = { id: kode, nama: kode + " - " + nama }
            }

            $scope.simpanterapidatakesirs = function() {
                if($scope.dataPasienSelected === undefined){
                    toastr.error("Data Pasien belum dipilih !")
                    return
                }
                if($scope.dataPasienSelected.idupdatesirs === null){
                    toastr.error("Data belum dikirim ke sirs online harap update terlebih dahulu !");
                    return
                }
                if($scope.item.terapi === undefined) {
                    toastr.error("Terapi belum diisi !")
                    return
                }
                if($scope.item.jumlahterapi === undefined) {
                    toastr.error("Jumlah terapi belum diisi !")
                    return
                }

                $scope.isRouteLoading = true;
                medifirstService.postNonMessage("bridging/kemenkes/tools/login").then(function (e) {
                    if(e.data.status == false){
                        toastr.error(e.data.message)
                        return
                    }
                    if(e.status === 200) {
                        if ($scope.dataTerapiSelected === undefined) {
                            var json = {
                                "url": "laporancovid19versi3terapi",
                                "method": "POST",
                                "token": e.data.data.access_token,
                                "data": {
                                    "laporanCovid19Versi3Id": $scope.dataPasienSelected.idupdatesirs,
                                    "terapiId": $scope.item.terapi.id,
                                    "jumlahTerapi": $scope.item.jumlahterapi
                                }
                            }
                        } else {
                            var json = {
                                "url": "laporancovid19versi3terapi/" + $scope.dataTerapiSelected.id,
                                "method": "PATCH",
                                "token": e.data.data.access_token,
                                "data": {
                                    "terapiId": $scope.item.terapi.id,
                                    "jumlahTerapi": $scope.item.jumlahterapi
                                }
                            }
                        }

                        medifirstService.postNonMessage("bridging/kemenkes/tools", json).then(function (e) {
                            $scope.isRouteLoading = false;
                            if(e.data.status){
                                toastr.success(e.data.message)
                            } else {
                                toastr.warning(e.data.message)
                            }
                            $scope.item.terapi = undefined;
                            $scope.item.jumlahterapi = undefined;
                            $scope.dataTerapiSelected = undefined;
                            loadterapi()
                        })
                    }
                })
            }

            $scope.KlikTerapi = function(dataTerapiSelected) {
                $scope.dataTerapiSelected = dataTerapiSelected;

                var kode = $scope.dataTerapiSelected.terapi.terapiId
                var nama = $scope.dataTerapiSelected.terapi.terapiNama
                $scope.item.terapi = { id: kode, nama: kode + " - " + nama }
                $scope.item.jumlahterapi = $scope.dataTerapiSelected.jumlah
            }

            $scope.simpanvaksindatakesirs = function() {
                if($scope.dataPasienSelected === undefined){
                    toastr.error("Data Pasien belum dipilih !")
                    return
                }
                if($scope.dataPasienSelected.idupdatesirs === null){
                    toastr.error("Data belum dikirim ke sirs online harap update terlebih dahulu !");
                    return
                }
                if($scope.item.dosisvaksin === undefined) {
                    toastr.error("Dosis Vaksin belum diisi !")
                    return
                }
                if($scope.item.namavaksin === undefined) {
                    toastr.error("Nama Vaksin belum diisi !")
                    return
                }

                $scope.isRouteLoading = true;
                medifirstService.postNonMessage("bridging/kemenkes/tools/login").then(function (e) {
                    if(e.data.status == false){
                        toastr.error(e.data.message)
                        return
                    }
                    if(e.status === 200) {
                        if ($scope.dataVaksinSelected === undefined) {
                            var json = {
                                "url": "laporancovid19versi3vaksinasi",
                                "method": "POST",
                                "token": e.data.data.access_token,
                                "data": {
                                    "laporanCovid19Versi3Id": $scope.dataPasienSelected.idupdatesirs,
                                    "dosisVaksinId": $scope.item.dosisvaksin.id,
                                    "jenisVaksinId": $scope.item.namavaksin.id
                                }
                            }
                        } else {
                            var json = {
                                "url": "laporancovid19versi3vaksinasi/" + $scope.dataVaksinSelected.id,
                                "method": "PATCH",
                                "token": e.data.data.access_token,
                                "data": {
                                    "dosisVaksinId": $scope.item.dosisvaksin.id,
                                    "jenisVaksinId": $scope.item.namavaksin.id
                                }
                            }
                        }

                        medifirstService.postNonMessage("bridging/kemenkes/tools", json).then(function (e) {
                            $scope.isRouteLoading = false;
                            if(e.data.status){
                                toastr.success(e.data.message)
                            } else {
                                toastr.warning(e.data.message)
                            }
                            $scope.item.dosisvaksin = undefined;
                            $scope.item.namavaksin = undefined;
                            $scope.dataVaksinSelected = undefined;
                            loadvaksin()
                        })
                    }
                })
            }

            $scope.KlikVaksin = function(dataVaksinSelected) {
                $scope.dataVaksinSelected = dataVaksinSelected;

                var kodedosis = $scope.dataVaksinSelected.dosisVaksin.id
                var namadosis = $scope.dataVaksinSelected.dosisVaksin.Nama
                var kodevaksin = $scope.dataVaksinSelected.jenisVaksin.id
                var namavaksin = $scope.dataVaksinSelected.jenisVaksin.nama
                $scope.item.dosisvaksin = { id: kodedosis, nama: namadosis }
                $scope.item.namavaksin = { id: kodevaksin, nama: namavaksin }
            }

            $scope.simpanlabdatakesirs = function() {
                if($scope.dataPasienSelected === undefined){
                    toastr.error("Data Pasien belum dipilih !")
                    return
                }
                if($scope.dataPasienSelected.idupdatesirs === null){
                    toastr.error("Data belum dikirim ke sirs online harap update terlebih dahulu !");
                    return
                }
                if($scope.item.jenispemeriksaan === undefined) {
                    toastr.error("Jenis Pemeriksaan belum diisi !")
                    return
                }
                if($scope.item.hasilpemeriksaan === undefined) {
                    toastr.error("Hasil Pemeriksaan belum diisi !")
                    return
                }
                if($scope.item.tglhasilpemeriksaan === undefined) {
                    toastr.error("Tanggal Hasil belum diisi !")
                    return
                }

                $scope.isRouteLoading = true;
                medifirstService.postNonMessage("bridging/kemenkes/tools/login").then(function (e) {
                    if(e.data.status == false){
                        toastr.error(e.data.message)
                        return
                    }
                    if(e.status === 200) {
                        if ($scope.dataLabSelected === undefined) {
                            var json = {
                                "url": "laporancovid19versi3pemeriksaanlab",
                                "method": "POST",
                                "token": e.data.data.access_token,
                                "data": {
                                    "laporanCovid19Versi3Id": $scope.dataPasienSelected.idupdatesirs,
                                    "jenisPemeriksaanLabId": $scope.item.jenispemeriksaan.id,
                                    "hasilPemeriksaanLabId": $scope.item.hasilpemeriksaan.id,
                                    "tanggalHasilPemeriksaanLab": moment($scope.item.tglhasilpemeriksaan).format("YYYY-MM-DD")
                                }
                            }
                        } else {
                            var json = {
                                "url": "laporancovid19versi3pemeriksaanlab/" + $scope.dataLabSelected.id,
                                "method": "PATCH",
                                "token": e.data.data.access_token,
                                "data": {
                                    "jenisPemeriksaanLabId": $scope.item.jenispemeriksaan.id,
                                    "hasilPemeriksaanLabId": $scope.item.hasilpemeriksaan.id,
                                    "tanggalHasilPemeriksaanLab": moment($scope.item.tglhasilpemeriksaan).format("YYYY-MM-DD")
                                }
                            }
                        }

                        medifirstService.postNonMessage("bridging/kemenkes/tools", json).then(function (e) {
                            $scope.isRouteLoading = false;
                            if(e.data.status){
                                toastr.success(e.data.message)
                            } else {
                                toastr.warning(e.data.message)
                            }
                            $scope.item.jenispemeriksaan = undefined;
                            $scope.item.hasilpemeriksaan = undefined;
                            $scope.item.tglhasilpemeriksaan = undefined;
                            $scope.dataLabSelected = undefined;
                            loadlab()
                        })
                    }
                })
            }

            $scope.KlikLab = function(dataLabSelected) {
                $scope.dataLabSelected = undefined;

                if($scope.dataLabSelected === undefined) return;

                var kode = $scope.dataLabSelected.jenisPemeriksaanLab.jenisPemeriksaanLabId
                var nama = $scope.dataLabSelected.jenisPemeriksaanLab.jenisPemeriksaanLabNama
                var kode2 = $scope.dataLabSelected.hasilPemeriksaanLab.hasilPemeriksaanLabId
                var nama2 = $scope.dataLabSelected.hasilPemeriksaanLab.hasilPemeriksaanLabNama
                $scope.item.jenispemeriksaan = { id: kode, nama: nama }
                $scope.item.hasilpemeriksaan = { id: kode2, nama: nama2 }
                $scope.item.tglhasilpemeriksaan = $scope.dataLabSelected.tanggalHasilPemeriksaanLab
            }

            $scope.simpankeluardatakesirs = function() {
                if($scope.dataPasienSelected === undefined){
                    toastr.error("Data Pasien belum dipilih !")
                    return
                }
                if($scope.dataPasienSelected.idupdatesirs === null){
                    toastr.error("Data belum dikirim ke sirs online harap update terlebih dahulu !");
                    return
                }
                if($scope.item.statuskeluar === undefined) {
                    toastr.error("Status Keluar belum diisi !")
                    return
                }

                $scope.isRouteLoading = true;
                medifirstService.postNonMessage("bridging/kemenkes/tools/login").then(function (e) {
                    if(e.data.status == false){
                        toastr.error(e.data.message)
                        return
                    }
                    if(e.status === 200) {
                        var json = {
                            "url": "laporancovid19versi3statuskeluar",
                            "method": "POST",
                            "token": e.data.data.access_token,
                            "data": {
                                "laporanCovid19Versi3Id": $scope.dataPasienSelected.idupdatesirs,
                                "tanggalKeluar": moment($scope.item.tglkeluar).format("YYYY-MM-DD"),
                                "statusKeluarId": $scope.item.statuskeluar === undefined ? null : $scope.item.statuskeluar.id,
                                "penyebabKematianId": $scope.item.penyebabkematian === undefined ? null : $scope.item.penyebabkematian.id,
                                "penyebabKematianLangsungId": $scope.item.penyebabkematianlangsung === undefined ? null : $scope.item.penyebabkematianlangsung.id,
                                "statusPasienSaatMeninggalId": $scope.item.statuspasienmeninggal === undefined ? null : $scope.item.statuspasienmeninggal.id,
                                "komorbidCoInsidenId": $scope.item.komorbidcoinsiden === undefined ? null : $scope.item.komorbidcoinsiden.id,
                            }
                        }
                        medifirstService.postNonMessage("bridging/kemenkes/tools", json).then(function (e) {
                            $scope.isRouteLoading = false;
                            if(e.data.status){
                                toastr.success(e.data.message)
                            } else {
                                toastr.warning(e.data.message)
                            }
                            clearinputkeluar();
                        })
                    }
                })
            }
        }
    ])
})
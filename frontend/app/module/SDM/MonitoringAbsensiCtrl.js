define(['initialize'], function (initialize) {
    'use strict';
    initialize.controller('MonitoringAbsensiCtrl', ['CacheHelper', '$scope', 'MedifirstService', 'DateHelper', 
        function (cacheHelper, $scope, medifirstService, DateHelper ) {
            //Inisial Variable             
            $scope.dataVOloaded = true;
            $scope.now = new Date();
            $scope.dataSelected = {};
            $scope.item = {};
            $scope.isRouteLoading = false;
            FormLoad ();
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

            function FormLoad (){

                $scope.tglPelayanan = $scope.item.pelayanan;
                $scope.dokter = $scope.item.namaPegawai;
                $scope.date = new Date();
                var tanggals = DateHelper.getDateTimeFormatted3($scope.date);

                //Tanggal Default
                $scope.item.tglawal = tanggals + " 00:00";
                $scope.item.tglakhir = tanggals + " 23:59";

                // Tanggal Inputan
                $scope.tglawal = $scope.item.tglawal;
                $scope.tglakhir = $scope.item.tglakhir;
                $scope.pegawai = medifirstService.getPegawai();

                medifirstService.get("sdm/get-data-combo-sdm", true).then(function (dat) {           
                    $scope.listDepartemen = dat.data.departemen;               
                    $scope.listPasien = dat.data.kelompokpasien;         
                });

                medifirstService.getPart("sysadmin/general/get-combo-pegawai", true, true, 20).then(function (data) {
                    $scope.listPegawai = data;                    
                });                    
            }                                  

            $scope.getIsiComboRuangan = function () {
                $scope.listRuangan = $scope.item.departement.ruangan
            }

            $scope.Search = function () {
                $scope.isLoadingData = true;
                LoadData();              
            }

            function LoadData() {
             
                $scope.isRouteLoading = true;
                var tglAwal = moment($scope.item.tglawal).format('YYYY-MM-DD HH:mm');
                var tglAkhir = moment($scope.item.tglakhir).format('YYYY-MM-DD HH:mm');
                //debugger;

                var tempDepartemenId = "";
                if ($scope.item.departement != undefined) {
                    tempDepartemenId = "&idDept=" + $scope.item.departement.id;
                }
                var tempRuanganId = "";
                if ($scope.item.ruangan != undefined) {
                    tempRuanganId = "&idRuangan=" + $scope.item.ruangan.id;
                }
            
                var tempKelPasienId = "";
                if ($scope.item.namaPegawai != undefined) {
                    tempKelPasienId = "&idPegawai=" + $scope.item.namaPegawai.id;
                }


                var chacePeriode = {
                    0: tglAwal,
                    1: tglAkhir
                }
                cacheHelper.set('MonitoringAbsensiCtrl', chacePeriode);

                medifirstService.get("sdm/get-log-presensi-pegawai-1").then(function (data) {});
                medifirstService.get("sdm/get-log-presensi-pegawai-2").then(function (data) {});
                medifirstService.get("sdm/get-log-presensi-pegawai-3").then(function (data) {});
                medifirstService.get("sdm/get-log-presensi-pegawai-4").then(function (data) {});
                medifirstService.get("sdm/get-log-presensi-pegawai-5").then(function (data) {});
                medifirstService.get("sdm/get-log-presensi-pegawai-6").then(function (data) {});
                
                medifirstService.get("sdm/get-monitoring-absensi-pegawai?"
                    + "tglAwal=" + tglAwal
                    + "&tglAkhir=" + tglAkhir
                    + tempDepartemenId
                    + tempRuanganId
                    + tempKelPasienId).then(function (data) {
                        $scope.isLoadingData = false;
                        var datas = data.data.data;
                        $scope.sourceLaporan = new kendo.data.DataSource({
                            data: datas,
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

                    $scope.dataExcel = data.data;
                })
            }                    

            $scope.Perbaharui = function () {
                $scope.ClearSearch();
            }
          
            $scope.ClearSearch = function () {
                $scope.item = {};
                $scope.item.tglawal = $scope.now;
                $scope.item.tglakhir = $scope.now;
                $scope.Search();
            }

            $scope.formatTanggal = function(tanggal){
                return moment(tanggal).format('DD-MMM-YYYY HH:mm');
            }

            $scope.formatJam = function(tanggal){
                return moment(tanggal).format('HH:mm');
            }

            $scope.columnLaporan = {

                toolbar:["excel"],
                excel: {
                    fileName:"DataMonitoringAbsensi"+moment($scope.now).format( 'DD/MMM/YYYY'),
                    allPages: true,
                },
                selectable: 'row',
                pageable: true,
                columns: [
                    {
                        "field": "namalengkap",
                        "title": "Nama Pegawai",
                        "width": "150px",
                        // "template": "<span class='style-left'>{{formatTanggal('#: tglsurveilans #')}}</span>"
                    },
                    {
                        "field": "tglhistori",
                        "title": "Tgl. Absen",
                        "width": "100px",
                        "template": "<span class='style-center'>{{formatTanggal('#: tglhistori #')}}</span>"
                    },                    
                    {
                        "field": "status",
                        "title": "Status",
                        "width": "80px",
                        //Status 0 : Masuk
                        //Status 1 : Pulang
                        "template": '# if( status==0) {# Masuk # } else {# Pulang #} #'
                        // "template": "<span class='style-center'>{{formatJam('#: jamkeluar #')}}</span>"

                    },
                    {
                        "field": "verified",
                        "title": "Verifikasi",
                        "width": "80px",
                        //verified 3 : Password
                        //verified 1 : SIdik Jari
                        //verified 15 : Wajah

                        "template": '# if( verified==3) {# Password # } else if( verified==1) {# Sidik Jari # } else if( verified==15) {# Wajah # } else {# Tidak ditemukan #} #'
                        // "template": "<span class='style-center'>{{formatJam('#: jamkeluar #')}}</span>"

                    },
                ]
            }; 

///////////////////////////////////////////////////////////////////////
        }
    ]);
});

define(['initialize', 'Configuration'], function (initialize, config) {
    'use strict';
    initialize.controller('HasilLaboratoriumRuanganCtrl', ['$scope', '$state', 'MedifirstService', 'CacheHelper',
        function ($scope, $state, medifirstService, cacheHelper) {
            //test 

            $scope.isRouteLoading = false;
            $scope.norecPD = $state.params.norecPd
            $scope.norecAPD = $state.params.norecApd
            $scope.norecPP = $state.params.norecPP
            $scope.norecOrder = undefined;
            $scope.dokter = "";
            // $scope.shows = 0;
            $scope.item = {};

            LoadCacheHelper();
            function LoadCacheHelper() {                
                $scope.KelompokUser = medifirstService.getKelompokUser(); 
                if ($scope.KelompokUser != "laborat") {
                    $scope.IsSave = false;
                } else{
                    $scope.IsSave = true;
                }              
                var chacePeriode = cacheHelper.get('chaceHasilLab2');
                if (chacePeriode != undefined) {
                    //var arrPeriode = chacePeriode.split(':');
                    $scope.item.noMr = chacePeriode[0]
                    $scope.item.namaPasien = chacePeriode[1]
                    $scope.item.jenisKelamin = chacePeriode[2]
                    $scope.item.noregistrasi = chacePeriode[3]
                    $scope.item.umur = chacePeriode[4]
                    $scope.item.kelompokPasien = chacePeriode[5]
                    $scope.item.tglRegistrasi = chacePeriode[6]
                    $scope.item.idKelas = chacePeriode[9]
                    $scope.item.kelas = chacePeriode[10]
                    $scope.item.idRuangan = chacePeriode[11]
                    $scope.item.namaRuangan = chacePeriode[12]
                    $scope.item.tgllahir = chacePeriode[13]
                    $scope.item.objectjeniskelaminfk = chacePeriode[14]
                    $scope.item.norecPP = chacePeriode[15]
                    $scope.norecOrder = chacePeriode[16]
                    const oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
                    const firstDate = new Date($scope.item.tgllahir);
                    const secondDate = new Date($scope.item.tglRegistrasi);
                    
                    $scope.item.umurDay = Math.round(Math.abs((firstDate - secondDate) / oneDay));
              
                }
                // init()
            }
            $scope.noRegistrasi = $state.params.noRegistrasi;
            $scope.noOrder = $state.params.noOrder;
           
            $scope.norecPP = $scope.item.norecPP;
            
            $scope.ColumnResult = {
                    toolbar: [
                        "excel",

                    ],
                    excel: {
                        fileName: "HasilLab.xlsx",
                        allPages: true,
                    },
                    selectable: 'row',
                    pageable: true,
                    excelExport: function (e) {

                        var sheet = e.workbook.sheets[0];
                        sheet.frozenRows = 2;
                        sheet.mergedCells = ["A1:H1"];
                        sheet.name = "Hasil";

                        var myHeaders = [

                            {
                                value: "Hasil Laboratorium",
                                fontSize: 15,
                                textAlign: "center",
                                background: "#c1d2d2",
                            }];

                        sheet.rows.splice(0, 0, { cells: myHeaders, type: "header", height: 50 });
                    },
                    columns: [{
                        field: "namaproduk",
                        title: "Nama Pemeriksaan",
                        width: "20%"
                    },
                    {
                        field: "detailpemeriksaan",
                        title: "Detail Pemeriksaan",
                        width: "20%"
                    }, {
                        field: "hasil",
                        title: "Hasil Pemeriksaan",
                        width: "15%",
                        attributes: {
                            class: "#=flag != 'N' ? 'red' : 'green' #"
                       },
                    }, 
                    // {
                    //     field: "nilaikritis",
                    //     title: "Nilai Kritis",
                    //     width: "15%"
                    // }, 
                    {
                        field: "nilaitext",
                        title: "Nilai Normal",
                        width: "15%"
                    },
                    // {
                    //     field: "tipedata",
                    //     title: "tipedata",
                    //     width: "0%"
                        
                    // },
                    {
                        field: "satuanstandar",
                        title: "Satuan Hasil",
                        width: "20%"
                    },
                    {
                        field: "Metode",
                        title: "Metode",
                        width: "20%"
                    },

                    {
                        hidden: true,
                        field: "detailjenisproduk",
                        title: "Jenis Pemeriksaan"
                    },

                    {
                        hidden: true,
                        field: "nourutdetail"

                    }]
                };

            $scope.result = function () {
                $scope.resultGrids = new kendo.data.DataSource({
                    data: []
                })
                
                $scope.isRouteLoading = true   
                console.log($scope);         
                // medifirstService.get("laboratorium/get-hasil-lab-manual?norec_apd=" + $state.params.norecApd +
                //     '&objectjeniskelaminfk=' + $scope.item.objectjeniskelaminfk + '&umur=' + $scope.item.umurDay + '&norec=' + $scope.item.norecPP + '&norecOrder=' + $scope.norecOrder ).then(function (data) {
                medifirstService.get("laboratorium/get-hasil-lab-manual-ruangan?norec_apd=" + $state.params.norecApd +
                    '&objectjeniskelaminfk=' + $scope.item.objectjeniskelaminfk + '&umur=' + $scope.item.umurDay + '&norec=' + $scope.item.norecPP + '&norm=' + $scope.item.noMr + '&noregistrasi=' + $scope.item.noregistrasi + '&norecOrder=' + $scope.norecOrder ).then(function (data) {
                        // var sourceGrid = []
                        $scope.norec_edt = data.data.edt.map(x => x.pelayananpasienfk);
                        $scope.norec_pa = data.data.pa.map(y => y.pelayananpasienfk);
                        $scope.isRouteLoading = false;
                        $scope.dokter = data.data.dokter.namalengkap
                        if (data.statResponse == true && data.data.data.length > 0) {
                            // sourceGrid = data.data.data                           
                            if( data.data.dokter.id!=null){
                               if($scope.ListDataPegawai==undefined){
                                   $scope.ListDataPegawai =[{id: data.data.dokter.id,namalengkap:  data.data.dokter.namalengkap} ]
                               } 
                               $scope.item.DataPegawai = {id: data.data.dokter.id,namalengkap:  data.data.dokter.namalengkap} 
                            }
                            
                            for (let i = 0; i < data.data.data.length; i++) {
                                const element = data.data.data[i];
                           
                               
                                if(element.keterangan)
                                    $scope.item.catatan = element.keterangan
                                if (element.hasil != null && element.hasil == element.nilaitext) {
                                    element.flag = 'N'
                                }
                                if (element.hasil != null &&  element.nilaitext.toLowerCase().indexOf(element.hasil.toLowerCase() ) > -1) {
                                    element.flag = 'N'
                                }

                            }
                            // $scope.isRouteLoading = false
                            $scope.resultGrids = new kendo.data.DataSource({
                                data: data.data.data,
                                group: [
                                    { field: "detailjenisproduk" },
                                    // { field: "namaproduk" }
                                ],
                                sort: { field: "nourutdetail", dir: "asc" },
                            });
                        } else {
                            toastr.info('Data Hasil tidak ada', 'Info')
                        }
                    });
            }

            $scope.result();
            $scope.kl = function(ttm){
                $scope.item.nilaimin = $scope.dataSelected.nilaimin
                $scope.item.nilaimax = $scope.dataSelected.nilaimax
                $scope.item.objectprodukfk = $scope.dataSelected.produkfk
                $scope.item.mpid = $scope.dataSelected.map_id
                $scope.item.nmPemeriksaan = $scope.dataSelected.namaproduk
                $scope.item.detPemeriksaan = $scope.dataSelected.detailpemeriksaan
                // alert("ASDASD")
            }

            
            $scope.kembali = function () {
                window.close();
                // window.history.back()
            }

            $scope.cetakhtml = function () {                
                var user = medifirstService.getPegawaiLogin();
                var catatan = $scope.item.catatan == undefined ? "" : $scope.item.catatan;
                // if ($scope.item.DataPegawai == undefined) {
                //     alert("Pilih terlebih dahulu dokter nya!!")
                //     return;
                // } else {
                //     dokter = $scope.item.DataPegawai
                // }                
                window.open(config.baseApiBackend + 'report/cetak-hasil-lab-manual?norec=&norec=' + $scope.norecAPD
                + '&objectjeniskelaminfk=' + $scope.item.objectjeniskelaminfk + '&umur=' + $scope.item.umurDay
                + '&strIdPegawai=' + user.namaLengkap + '&strNorecPP=' + $scope.item.norecPP + '&doketr=' + $scope.dokter + '&catatan=' + catatan,"_blank");
            }

            $scope.cetakEDT = function () {
                var local = JSON.parse(localStorage.getItem('profile'))
                var user = medifirstService.getPegawaiLogin().namaLengkap

                var profile = local.id;
                window.open(config.baseApiBackend + "report/cetak-hasil-lab-edt-all?norec=" + $scope.norec_edt + '&kdprofile=' + profile
                        + '&user=' + user + '&jenis=his', '_blank');
            }

            $scope.cetakPA = function () {
                var local = JSON.parse(localStorage.getItem('profile'))
                var user = medifirstService.getPegawaiLogin().namaLengkap

                var profile = local.id;
                window.open(config.baseApiBackend + "report/cetak-hasil-lab-pa-all?norec=" + $scope.norec_pa + '&kdprofile=' + profile
                        + '&user=' + user + '&jenis=his', '_blank');
            }

        }
    ]);

});
define(['initialize'], function (initialize) {
'use strict';
    initialize.controller('LaporanTop24DiagnosisCtrl', ['CacheHelper', '$scope', 'DateHelper', 'MedifirstService', 
        function (cacheHelper, $scope, dateHelper, medifirstService) {
            FormLoad();   
            function FormLoad(){
                $scope.isRouteLoading = false;
                $scope.now = new Date();
                $scope.date = new Date();
                $scope.dataSelected = {};
                $scope.item = {}; 
                LoadCombo();
                LoadDataGrid()
            }

            $scope.showAndHide = function () {
                $('#contentPencarian').fadeToggle("fast", "linear");
            }

            function LoadCombo(){
                $scope.item.tglawal =  moment($scope.now).format('YYYY-MM-DD 00:00');
                $scope.item.tglakhir = moment($scope.now).format('YYYY-MM-DD 23:59');
                medifirstService.get("tatarekening/get-data-combo-daftarregpasien", true).then(function (dat) {                                    
                    $scope.listDepartemen = dat.data.departemen; 
                    $scope.listJenisDiagnosa = dat.data.jenisdiagnosa;                                    
                });

                medifirstService.getPart("sysadmin/general/get-datacombo-icd10", true, true, 10).then(function(data) {
                     $scope.listDiagnosa = data;
                }); 
            }

            $scope.getIsiComboRuangan = function () {
                $scope.listRuangan = $scope.item.departement.ruangan                
            }
                              
            $scope.SearchData = function () {            
                LoadDataGrid()             
            }

            $scope.ClearData = function (){
                $scope.item.ruangan = undefined;
                $scope.item.departement = undefined
                $scope.item.tglawal =  moment($scope.now).format('YYYY-MM-DD 00:00');
                $scope.item.tglakhir = moment($scope.now).format('YYYY-MM-DD 23:59');
            }

            function LoadDataGrid() {                 
                $scope.isRouteLoading = true;
                var tglAwal = moment($scope.item.tglawal).format('YYYY-MM-DD HH:mm');
                var tglAkhir = moment($scope.item.tglakhir).format('YYYY-MM-DD HH:mm');;            

                var tempDepartemenId = "";              
                if ($scope.item.departement != undefined) {
                    tempDepartemenId = "&idDept=" + $scope.item.departement.id;
                }
                var tempRuanganId = "";
                if ($scope.item.ruangan != undefined) {
                    tempRuanganId = "&idRuangan=" + $scope.item.ruangan.id;
                }
                var tempJenisDiagnosa = ""
                if ($scope.item.JenisDiagnosa != undefined) {
                    tempJenisDiagnosa = "&idJenisDiagnosa=" + $scope.item.JenisDiagnosa.id;
                } 
                var tempDiagnosa = ""
                if ($scope.item.Diagnosa != undefined) {
                    tempDiagnosa = "&idDiagnosa=" + $scope.item.Diagnosa.id;
                }                                                        

                var chacePeriode = {
                    0: tglAwal,
                    1: tglAkhir,
                    2: '',
                    3: '',
                    4: '',
                    5: '',                        
                }
                cacheHelper.set('LaporanDiagnosaPasienCtrl', chacePeriode);
                medifirstService.get("registrasi/laporan/get-laporan-twentyfour-diagnosa?"
                    + "tglAwal=" + tglAwal
                    + "&tglAkhir=" + tglAkhir
                    + tempDepartemenId + tempRuanganId).then(function (data) {
                    $scope.isRouteLoading = false;                                    
                    var datas = data.data;
                    for (var i = 0; i < datas.length; i++) {
                        datas[i].no = i + 1;                       
                    }
                    $scope.sourceLaporan = new kendo.data.DataSource({                            
                        data: datas,
                        group: $scope.group,
                        pageSize: 10,                       
                        total: datas.length,
                        serverPaging: false,
                        schema: {
                            model: {                                
                            }
                        }
                    });
                })
            }

            $scope.formatRupiah = function(value, currency) {
                return currency + " " + parseFloat(value).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
            }

            $scope.formatTanggal = function (tanggal) {
                return moment(tanggal).format('DD-MM-YYYY');
            }

            $scope.columnLaporan = {
                toolbar: [
                    "excel",                    
                ],
                excel: { fileName: "LaporanDiagnosaPasien.xlsx", allPages: true, },
                // pdf: { fileName: "RekapPembayaranJasaPelayanan.pdf", allPages: true, },
                excelExport: function (e) {
                    var sheet = e.workbook.sheets[0];
                    sheet.frozenRows = 3;
                    sheet.mergedCells = ["A1:G1"];
                    sheet.name = "Orders";
                    
                    if($scope.item.departement == undefined){
                        toastr.warning('Department harus diisi!','Peringatan')
                    }

                    var de = $scope.item.departement.departemen.toUpperCase();

                    if(de == undefined){
                        de = '';
                    }

                    var myHeaders = [{
                        value: "10 BESAR KEADAAN MORBIDITAS PASIEN " + de + " RUMAH SAKIT",
                        fontSize: 14,
                        textAlign: "center",
                        background: "#ffffff",
                        // color:"#ffffff"
                    }];

                    sheet.rows.splice(0, 0, { cells: myHeaders, type: "header", height: 70 });
                },
                sortable: true,
                pageable: true,
                selectable: "row",
                columns: [  

                    { field: "no", title: "No", width: "25px" },
                    {
                        field: "namapasien",
                        title: "NAMA",
                        width: "100px",
                        textAlign: "left",
                    },
                    {
                        field: "jeniskelamin",
                        title: "JENIS KELAMIN",
                        width: "100px",
                        textAlign: "left",
                    },
                    
                    {
                        field: "tgllahir",
                        title: "TANGGAL LAHIR",
                        width: "100px",
                        textAlign: "left",
                    },
                    {
                        field: "noidentitas",
                        title: "NIK",
                        width: "100px",
                        textAlign: "left",
                    },
                    {
                        field: "namaayah",
                        title: "NAMA AYAH",
                        width: "100px",
                        textAlign: "left",
                    },                   
                    {
                        field: "namaibu",
                        title: "NAMA IBU",
                        width: "100px",
                        textAlign: "left",
                    },
                    {
                        field: "alamatlengkap",
                        title: "ALAMAT",
                        width: "100px",
                        textAlign: "left",
                    },
                    {
                        field: "diagnosis",
                        title: "DIAGNOSIS",
                        width: "100px",
                        textAlign: "left",
                    },
                    {
                        field: "hasillab",
                        title: "HASIL LAB",
                        width: "100px",
                        textAlign: "left",
                    },
                    {
                        field: "gejala",
                        title: "GEJALA",
                        width: "100px",
                        textAlign: "left",
                    },
                    {
                        field: "suhu",
                        title: "SUHU",
                        width: "100px",
                        textAlign: "left",
                    },
                    {
                        field: "tekanandarah",
                        title: "TEKANAN DARAH",
                        width: "100px",
                        textAlign: "left",
                    },
                    {
                        field: "beratbadan",
                        title: "BERAT BADAN",
                        width: "100px",
                        textAlign: "left",
                    },
                    {
                        field: "notelepon",
                        title: "NO.HANDPHONE",
                        width: "100px",
                        textAlign: "left",
                    },
                    {
                        field: "tglregistrasi",
                        title: "TANGGAL MASUK",
                        width: "100px",
                        textAlign: "left",
                    },
                    {
                        field: "tglpulang",
                        title: "TANGGAL KELUAR",
                        width: "100px",
                        textAlign: "left",
                    },
                    {
                        field: "kondisi",
                        title: "KONDISI",
                        width: "60px",
                        textAlign: "left",
                    },
                    
                ] 
            }
////////////////////////////////////////////////////////    END     ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        }
    ]);
});
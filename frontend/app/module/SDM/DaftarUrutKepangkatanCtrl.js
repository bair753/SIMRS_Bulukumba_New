define(['initialize'], function (initialize) {
    'use strict';
    initialize.controller('DaftarUrutKepangkatanCtrl', ['$scope', 'MedifirstService', 'DateHelper', 
        function ($scope, medifirstService, dateHelper) {
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
                var tanggals = dateHelper.getDateTimeFormatted3($scope.date);                
                $scope.pegawai = medifirstService.getPegawai();
              
                medifirstService.get("sdm/get-data-combo-sdm?", true).then(function(datas){    
                    var dat = datas.data                                
                    $scope.listjenisPegawai = dat.jenispegawai;               
                    $scope.listpangkatPegawai = dat.pangkatpegawai;
                    $scope.listGolongan = dat.golonganpegawai;         
                });

                medifirstService.getPart("sysadmin/general/get-combo-pegawai", true, true, 20).then(function (data) {
                    $scope.listPegawai= data;
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
                var idPangkatPe = "";
                if ($scope.item.pangkatPegawai != undefined) {
                    idPangkatPe = "&idPangkatPe=" + $scope.item.pangkatPegawai.id;
                }
                var idJenisPegawai = "";
                if ($scope.item.JenisPegawai != undefined) {
                    idJenisPegawai = "&idJenisPegawai=" + $scope.item.JenisPegawai.id;
                }
            
                var idPegawai = "";
                if ($scope.item.namaPegawai != undefined) {
                    idPegawai = "&idPegawai=" + $scope.item.namaPegawai.id;
                }
                
                medifirstService.get("sdm/get-data-urut-kepangakatan-pegawai?"                   
                    + idPangkatPe
                    + idJenisPegawai
                    + idPegawai).then(function (data) {
                    $scope.isLoadingData = false;
                    // debugger;       
                    var datas = data.data.data;             
                    for (var i = 0; i < datas.length; i++) {
                        datas[i].no = i+1;
                        var umur = dateHelper.CountAge(new Date(datas[i].tgllahir), new Date($scope.now));
                        var bln = umur.month,
                            thn = umur.year,
                            day = umur.day                      
                        umur = thn + 'thn ' + bln + 'bln ' + day + 'hr ';                     
                        datas[i].umur = umur;
                    }
                    
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
                return moment(tanggal).format('DD-MMM-YYYY');
            }

            $scope.formatJam = function(tanggal){
                return moment(tanggal).format('HH:mm');
            }

            $scope.columnLaporan = {

                toolbar:["excel"],
                excel: {
                    fileName:"DUK "+moment($scope.now).format( 'DD/MMM/YYYY'),
                    allPages: true,
                },
                excelExport: function (e) {
					var sheet = e.workbook.sheets[0];
					sheet.frozenRows = 2;
					sheet.mergedCells = ["A1:K1"];
					sheet.name = "DUK";

					var myHeaders = [{
						value: "DAFTAR URUT KEPANGKATAN PNS PEMERINTAH KABUPATEN BULUKUMBA",
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
                        "width" : "50px",
                    },
                    {
                        "field": "namalengkap",
                        "title": "NAMA PNS",
                        "width": "150px",                        
                    },      
                    {
                        "field": "nippns",
                        "title": "NIP",
                        "width": "100px"
                    }, 
                    {
                        "field": "tempatlahir",
                        "title": "TEMPAT LAHIR",
                        "width": "100px"
                    },   
                    {
                        "field": "jeniskelamin",
                        "title": "JENIS KELAMIN",
                        "width": "120px"
                    },      
                    {
                        "field": "tgllahir",
                        "title": "TGL LAHIR",
                        "width":"87px",
                        "template": "<span class='style-left'>{{formatTanggal('#: tgllahir #')}}</span>"
                    },    
                    {
                        "field": "golongan",
                        "title": "GOL",
                        "width": "80px"
                    },  
                    {
                        "field": "namapangkat",
                        "title": "TMT",
                        "width": "110px"
                    },
                    {
                        "title": "JABATAN", columns: [
                            { "field": "namajabatan", "title": "NAMA", "width": "80px" },
                            { "field": "namapangkat", "title": "TMT", "width": "80px" },
                        ]
                    },
                    {
                        "field": "eselon",
                        "title": "ESELON",
                        "width": "120px"
                    },
                    {
                        "title": "MK GOL", columns: [
                            { "field": "namajabatan", "title": "THN", "width": "80px" },
                            { "field": "namapangkat", "title": "BLN", "width": "80px" },
                        ]
                    },                
                    {
                        "title": "LATIHAN JABATAN", columns: [
                            { "field": "namajabatan", "title": "NAMA", "width": "80px" },
                            { "field": "namapangkat", "title": "THN", "width": "80px" },
                            { "field": "namapangkat", "title": "JML", "width": "80px" },
                        ]
                    },                
                    {
                        "title": "PENDIDIKAN", columns: [
                            { "field": "namajabatan", "title": "NAMA JURUSAN", "width": "80px" },
                            { "field": "namapangkat", "title": "TAHUN LULUS", "width": "80px" },
                            { "field": "namapangkat", "title": "TINGKAT IJAZAH", "width": "80px" },
                        ]
                    },    
                    {
                        "field": "umur",
                        "title": "USIA",
                        "width": "100px"
                    },           
                    {
                        "field": "tglpensiun",
                        "title": "PENSIUN",
                        "width": "120px",
                        "template": "<span class='style-left'>{{formatTanggal('#: tglpensiun #')}}</span>"
                    },
                    {
                        "field": "namajabatan",
                        "title": "JENIS KETENAGAAN",
                        "width": "120px"
                    },
                    {
                        "field": "namajabatan",
                        "title": "NAIK PANGKAT",
                        "width": "120px"
                    },
                    {
                        "field": "namajabatan",
                        "title": "TEMPAT TUGAS",
                        "width": "120px"
                    },
                    {
                        "title": "MASA KERJA", columns: [
                            { "field": "namajabatan", "title": "-", "width": "80px" },
                            { "field": "namapangkat", "title": "-", "width": "80px" },
                            { "field": "namapangkat", "title": "-", "width": "80px" },
                            { "field": "namapangkat", "title": "-", "width": "80px" },
                            { "field": "namapangkat", "title": "-", "width": "80px" },
                        ]
                    },  
                    {
                        "field": "noidentitas",
                        "title": "NIK",
                        "width": "120px"
                    },
                    {
                        "field": "nohandphone",
                        "title": "NO.HP",
                        "width": "120px"
                    },
                    {
                        "field": "email",
                        "title": "EMAIL",
                        "width": "120px"
                    },
                    {
                        "field": "alamat",
                        "title": "ALAMAT",
                        "width": "120px"
                    },
                    {
                        "field": "nostr",
                        "title": "NOMOR STR",
                        "width": "120px"
                    },
                    {
                        "field": "terbitstr",
                        "title": "TGL TERBIT",
                        "width": "120px"
                    },
                    {
                        "field": "berakhirstr",
                        "title": "TGL BERAKHIR",
                        "width": "120px"
                    },
                    {
                        "field": "nosip",
                        "title": "NOMOR SIP",
                        "width": "120px"
                    },
                    {
                        "field": "terbitsip",
                        "title": "TGL TERBIT",
                        "width": "120px"
                    },
                    {
                        "field": "namajabatan",
                        "title": "KAMPUS",
                        "width": "120px"
                    },
                    {
                        "field": "namajabatan",
                        "title": "NOMOR IJAZAH",
                        "width": "120px"
                    },
                    {
                        "field": "namajabatan",
                        "title": "TANGGAL/TAHUN LULUS",
                        "width": "120px"
                    },
                    {
                        "field": "namajabatan",
                        "title": "GOLONGAN DARAH",
                        "width": "120px"
                    },
                    
                ]
            }; 

        //* BATAS SUCI *//
        }
    ]);
});
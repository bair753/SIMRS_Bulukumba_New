define(['initialize', 'Configuration'], function (initialize, config) {
	'use strict';
	initialize.controller('DaftarPenelitianPegawaiCtrl', ['$scope', '$state', 'DateHelper', 'CacheHelper', 'MedifirstService',
    function($scope, $state, dateHelper, cacheHelper, medifirstService) {
        var baseTransaksi = config.baseApiBackend; 
			$scope.item = {};
			$scope.isRouteLoading=false;
			$scope.now = new Date();
			$scope.item.tglawal = new moment($scope.now).format('YYYY-MM-DD 00:00');
			$scope.item.tglakhir = new moment($scope.now).format('YYYY-MM-DD 23:59');
			var norec ="";
			LoadCombo();
			Load();
			
			function Load(){
				var chacePeriode = cacheHelper.get('DaftarPenelitianPegawaiCtrl');
				if(chacePeriode != undefined){
                   // var arrPeriode = chacePeriode.split('~');
                   $scope.item.tglawal= new Date(chacePeriode[0]);
                   $scope.item.tglakhir = new Date(chacePeriode[1]);

                }else{
                    $scope.item.tglawal = moment($scope.now).format('YYYY-MM-DD 00:00');
                    $scope.item.tglakhir = moment($scope.now).format('YYYY-MM-DD 23:59');          
                }
			}

			function LoadCombo(){
				medifirstService.get("sdm/penelitian/get-data-combo-penelitian?", true).then(function(datas){
                    var dat = datas.data;
	            	$scope.listDataInstitusiPendidikan=dat.institusi;
	            	$scope.listDataFakultas=dat.fakultas;
	            });
			}

			function GetData(){
				$scope.isRouteLoading=true;
                var tglAwal = moment($scope.item.tglawal).format('YYYY-MM-DD HH:mm');
                var tglAkhir = moment($scope.item.tglakhir).format('YYYY-MM-DD HH:mm');
                var NamaPeneliti="";
                if ($scope.item.NamaPeneliti !== undefined) {
                    NamaPeneliti ="&NamaPeneliti=" +$scope.item.NamaPeneliti
                }
                var JudulPenelitian="";
                if ($scope.item.JudulPenelitian !== undefined) {
                    JudulPenelitian = "&JudulPenelitians=" +$scope.item.JudulPenelitian;
                }
                var UnitKerja="";
                if ($scope.item.UnitKerja !== undefined) {
                    UnitKerja = "&UnitKerja=" +$scope.item.UnitKerja;
                }
                medifirstService.get("sdm/penelitian/get-daftar-penelitian-pegawai?"
                    +"tglAwal="+tglAwal+
                    "&tglAkhir="+tglAkhir
                    +NamaPeneliti+JudulPenelitian+UnitKerja, true).then(function(dat){
                    $scope.isRouteLoading=false;
                    var datas = dat.data.datas;
                    for (var i = 0; i < datas.length; i++) {
                        datas[i].no = i+1
                    }

                    $scope.DataPenelitian = new kendo.data.DataSource({
                        data: datas,
                        total: datas.length,
                        serverPaging: false,
                        schema: {
                            model: {
                                fields: {
                                }
                            }
                        }
                    });

                    var chacePeriode ={ 0 : tglAwal ,
	                    1 : tglAkhir,
	                    2 : '',
	                    3 : '', 
	                    4 : '',
	                    5 : '',
	                    6 : ''
	                }
                    cacheHelper.set('DaftarPenelitianPegawaiCtrl', chacePeriode);
                });
			}

			$scope.SearchData = function(e){
                GetData()
            }

            $scope.ClearData = function(){
            	$scope.item = {};
            }

			$scope.kl = function(current){
			 	toastr.info(current.namalengkap+" Terpilih");
				$scope.current = current;
				console.log(JSON.stringify($scope.current));
			}

			$scope.Ubah = function(current){

                if ($scope.current == undefined) {
                    toastr.error('Data Kegiatan Belum Dipilih','Info');
					return;
                }                
                
                var chacePeriode ={ 
                	0 : $scope.current.norec,
                    1 : 'EditPenelitianPegawai',
                    2 : '',
                    3 : '', 
                    4 : '',
                    5 : '',
                    6 : ''
                }

                cacheHelper.set('PenelitianPegawaCtrl', chacePeriode);
                $state.go('PenelitianPegawai', {
                    norec:  $scope.current.norec,
                    noOrder:'EditPenelitianPegawai'
                });
			}

			$scope.Hapus = function(current){
				if ($scope.current == undefined || $scope.current == '') {
					toastr.error('Data Kegiatan Belum Dipilih','Info');
					return;
				}

                var data = 
                {
                    // kpid:  $scope.current.kpid, 
                    norec: $scope.current.norec,                 
                    tglbatal : moment($scope.now).format('YYYY-MM-DD HH:mm:ss')
                }

                var objSave = {
                    data: data,
                }

                medifirstService.postLogging('Hapus Daftar Pelatihan Internal', 'norec emrpasien_t', $scope.current.nip_pns,
                        'Hapus Daftar Pelatihan Internal - ' + $scope.current.namalengkap + ' pada NIP  '
                        + $scope.current.nip_pns + ' - Peserta : ' + $scope.current.namalengkap).then(function (res) {
                        })

                medifirstService.post('sdm/penelitian/batal-kegiatan-penelitian-pegawai',objSave).then(function (e) {
                    GetData()
                })
            }

            $scope.uploadKelengkapan = function () {
				if ($scope.current == undefined) {
					toastr.error('Pilih data dulu')
					return
				}

				$scope.listBerkas =[]
				medifirstService.get('sdm/penelitian/berkas-kegiatan-penelitian-internal?penelitianeksternalfk=' + $scope.current.norec).then(function(e){
					$scope.listBerkas = e.data.data
					$scope.listUpload = e.data.upload
					$scope.item.berkas = $scope.listBerkas[0].id
					for (var i = 0; i < $scope.listBerkas.length; i++) {
						$scope.listBerkas[i].no =  i+1
						const elem = $scope.listBerkas[i]
						for (var x = 0; x < $scope.listUpload .length; x++) {
							const elem2 =$scope.listUpload [x]
							if(elem2.objectberkas == elem.id){
								elem.isupload =true
							}
						}
					}
					$scope.popupUpload.center().open();
				})
			}

            $scope.preview = function () {
                var dataItem = $scope.current;
                var str1 = baseTransaksi + 'public/berkas?penelitianeksternalfk=' + dataItem.norec +'&objectberkas='+$scope.item.berkas
                window.open(str1, '_blank');
                
            
			}

            

            $scope.saveKelengkapan = function () {
                const form = document.querySelector('form')
                const formData = new FormData()

                const fileSIP = document.querySelectorAll('.myStr')[0].files[0]
                if (fileSIP != "" && fileSIP != undefined) {
                    if (fileSIP.size > 10145728 || fileSIP.type != "application/pdf") { //dalam bytes
                        toastr.error('Maksimum Ukuran File adalah 10 MB dalam Format PDF')
                        return;
                    }
                }
                  
                formData.append('file', fileSIP)
                formData.append('penelitianeksternalfk', $scope.current.norec)
                formData.append('objectberkas', $scope.item.berkas)
                const url = baseTransaksi + 'sdm/penelitian/save-berkas-kegiatan-penelitian-eksternal'
                var arr = document.cookie.split(';')
                var authorization;
                for (var i = 0; i < arr.length; i++) {
                    var element = arr[i].split('=');
                    if (element[0].indexOf('authorization') > 0) {
                        authorization = element[1];
                    }
                }
                fetch(url, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-AUTH-TOKEN': authorization
                    }
                }).then(response => {
                    // console.log(response)
                    if (response.status == 201){
                        for (var i = 0; i < $scope.listBerkas.length; i++) {
                            const elem = $scope.listBerkas[i]
                            if(elem.id == $scope.item.berkas){
                                elem.isupload =true
                            }
                        }
                        toastr.success('Sukses');
                        document.getElementById("files").value = null;
                        $scope.popupUpload.close();
                    }
                    else
                        toastr.error('Simpan Gagal');
                    // $scope.loadDataSip();
                    // $scope.batalSip();
                })
    //             medifirstService.post('bridging/inacbg/save-berkas' ,formData).then(function(e){
                
                // })
              

        }

			$scope.columnPenelitian = {
                toolbar:["excel"],
                excel: {
                    fileName:"Data Penelitian Eksternal"+moment($scope.now).format( 'DD/MMM/YYYY'),
                    allPages: true,
                },
                selectable: 'row',
                pageable: true,
                columns: [
                 	{
						"field": "no",
						"title": "No",
						"width": "10%"
					},
	                {
						"field": "nip_pns",
						"title": "Nip",
						"width": "15%"
					},
					{
						"field": "namalengkap",
						"title": "Nama Peneliti",
						"width": "20%"
					},
					{
						"field": "unitkerja",
						"title": "Unit Kerja",
						"width": "20%"
					},
					{
						"field": "judulpenelitian",
						"title": "Judul Penelitian",
						"width": "20%"
					},
					{
						"field": "tanggalmulai",
						"title": "Tanggal Mulai",
						"width": "20%"
					},
					{
						"field": "tanggalselesai",
						"title": "Tanggal Selesai",
						"width": "20%"
					
					}
              	]
            }
		}
	]);
});
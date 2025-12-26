define(['initialize'], function(initialize) {
	'use strict';
	initialize.controller('PenelitianEksternalCtrl', ['$scope', '$state', 'DateHelper', 'CacheHelper', 'MedifirstService',
		function($scope, $state, dateHelper, cacheHelper, medifirstService) {
			$scope.dataVOloaded = true;
			$scope.isRouteLoading=false;
			$scope.now = new Date();
			$scope.item={};
			$scope.currentKeterangan=[];
			var noOrder='';
			var NorecKpe='';
			var norec_kpe ='';
			loadDataCombo();
			LoadCache();

			function LoadCache(){
                var chacePeriode = cacheHelper.get('PenelitianEksternalCtrl');
                if(chacePeriode != undefined){
                   NorecKpe = chacePeriode[0]
                   noOrder = chacePeriode[1]
                   init()
                   var chacePeriode ={ 0 : '' ,
                        1 : '',
                        2 : '',
                        3 : '', 
                        4 : '',
                        5 : '',
                        6 : ''
                    }
                    cacheHelper.set('PenelitianEksternalCtrl', chacePeriode);
               }else{
                    init()
               }
           }			

			function loadDataCombo(){			
	            medifirstService.get("sdm/penelitian/get-data-combo-penelitian?", true).then(function(datas){
                    var dat = datas.data
	            	$scope.ListInstitusiPendidikan=dat.institusi;
	            	$scope.ListjurusanPeminatan=dat.jurusanpeminatan;
	            	$scope.ListFakultas=dat.fakultas;
                    $scope.ListSebagai=dat.sebagai;
	            	$scope.ListKegiatan=dat.kegiatan;
	            	$scope.ListProfesi=dat.profesi;
	            });
		    }

			function init(){
			   	if (noOrder == 'EditPenelitianEksternal') {
                    $scope.isRouteLoading=true;
                    medifirstService.get("sdm/penelitian/get-detail-penelitian-eksternal?"
                    +"Norec="+NorecKpe, true).then(function(dat){
                        $scope.isRouteLoading=false;
                        var datas = dat.data.datas[0];
                        norec_kpe = datas.norec;
                        $scope.item.nim = datas.nim;
                        $scope.item.namaPeneliti = datas.namapeneliti;
                        $scope.item.tempatkegiatan = datas.tempatkegiatan;
                        $scope.item.periodePengajaran = datas.periodepengajaran;                           
                        $scope.item.institusiPendidikan = {id:datas.institusipendidikanfk,institusipendidikan:datas.institusipendidikan};
                        $scope.item.jurusanPeminatan = {id:datas.jurusanpeminatanfk,jurusanpeminatan:datas.jurusanpeminatan};
                        $scope.item.fakultas = {id:datas.fakultasfk,fakultas:datas.fakultas};
                        $scope.item.judulPenelitian = datas.judulpeneltian;
                        $scope.item.lokasiPenelitian = datas.lokasipenelitian;
                        $scope.item.tanggalMulai =moment(datas.tanggalmulai).format('YYYY-MM-DD HH:mm');     
                        $scope.item.namaPendamping = datas.namapendamping;
                        $scope.item.biayaPenelitian = datas.biayapenelitian;
                        $scope.item.tanggalPembayaran =moment(datas.tanggalpembayaran).format('YYYY-MM-DD HH:mm');   

                        $scope.item.nomorKwitansi = datas.nomorkwitansi;
                        $scope.item.tanggalSelesai = moment(datas.tanggalselesai).format('YYYY-MM-DD HH:mm');                     
                        $scope.item.tanggalPresentasi = moment(datas.tanggalpresentasi).format('YYYY-MM-DD HH:mm'); 
                        $scope.item.tanggalPresentasiProposal = moment($scope.now).format('YYYY-MM-DD HH:mm'); 
                        $scope.item.laporanPenelitian = datas.laporanpenelitian;
                        // $scope.item.publikasiJurnal = datas.periodepengajaran;   
                        // $scope.item.tindakLanjut = datas.periodepengajaran;  

                        if (datas.kelengkapanadministrasi !='' || datas.kelengkapanadministrasi != null){
                             var ListcurrentKeterangan= datas.kelengkapanadministrasi.split(',')
                             if(ListcurrentKeterangan.length > 0){
                             	for (var i = 0; i < ListcurrentKeterangan.length; i++) {
                             		for (var j = 0; j <  $scope.Listketerangan.length; j++) {
                             			if( $scope.Listketerangan[j].id == ListcurrentKeterangan[i]){
                             				$scope.Listketerangan[i].isChecked = true
                                            var dataid = {"id": $scope.Listketerangan[i].id,
                                            "keterangan":$scope.Listketerangan[i].keterangan,
                                            "value":$scope.Listketerangan[i].id,
                             			} 
                             			 $scope.currentKeterangan.push(dataid)

                             		}
                             	}
                             }

                            //  ListcurrentKeterangan.forEach(function(data){
                            //     $scope.Listketerangan.forEach(function(e){                                        
                            //         for (let i in e.detail){
                            //             if(e.detail[i].id ==data){
                            //                  e.detail[i].isChecked = true
                            //                 var dataid = {"id": e.detail[i].id,"keterangan": e.detail[i].keterangan,
                            //                 "value": e.detail[i].id,
                            //               }  
                            //                 $scope.currentKeterangan.push(dataid)
                            //             }
                            //         }
                            //     })
                            // })



                         }                            
                    }
	         	})
	        }
	    }

		    $scope.Listketerangan = [
			  	{
					"id": 1,
					"keterangan": "KTP"
				},
				{
					"id": 2,
					"keterangan": "Kartu Mahasiswa"
				},
				{
					"id": 3,
					"keterangan": "CV"
					
				},
				{
					"id": 4,
					"keterangan": "Ethical Clearance"
				},
				{
					"id": 4,
					"keterangan": "Proposal Penelitian"	
				},
				{
					"id": 5,
					"keterangan": "Kuesioner Penelitian"		
				}

			];

			$scope.addListKeterangan = function(bool,data) {
                var index = $scope.currentKeterangan.indexOf(data);
                if (_.filter($scope.currentKeterangan, {
                        id: data.id
                    }).length === 0)
                    $scope.currentKeterangan.push(data);
                else {
                    $scope.currentKeterangan.splice(index, 1);
                }
                
            }

			$scope.Batal = function(){
				$scope.item = {};
			}

			$scope.Save = function(){
				var listKeterangan=""
                var TglSelesai = moment($scope.item.tanggalSelesai).format('YYYY-MM-DD HH:mm');
                var a = ""
                var b = ""
                var c = ""

                if ($scope.item.namaPeneliti == undefined) {
                    toastr.warning("Nama Peserta Tidak Boleh Kosong!")
                    return;
                }  

                if ($scope.item.sebagai == undefined) {
                    toastr.warning("Sebagai Tidak Boleh Kosong!")
                    return;
                }

                if ($scope.item.tempatkegiatan == undefined) {
                    toastr.warning("Tempat Kegiatan Tidak Boleh Kosong!")
                    return;
                }  

                if ($scope.item.profesi == undefined) {
                    toastr.warning("Profesi Tidak Boleh Kosong!")
                    return;
                } 

                if ($scope.item.judulPenelitian == undefined) {
                    toastr.warning("Judul Kegiatan Tidak Boleh Kosong!")
                    return;
                }  

                if ($scope.item.kegiatan == undefined) {
                    toastr.warning("Jenis Kegiatan Tidak Boleh Kosong!")
                    return;
                } 

                if ($scope.item.biaya == undefined) {
                    toastr.warning("Biaya Tidak Boleh Kosong!")
                    return;
                } 

                if ($scope.item.jumlahBiaya == undefined) {
                    toastr.warning("Jumlah Biaya Tidak Boleh Kosong!")
                    return;
                }  

                if ($scope.item.tanggalMulai == undefined) {
                    toastr.warning("Tanggal Mulai Tidak Boleh Kosong!")
                    return;
                } 

                if ($scope.item.tanggalSelesai == undefined) {
                    toastr.warning("Tanggal Selesai Tidak Boleh Kosong!")
                    return;
                } 
				
                var biayaPenelitian = 0;
                if ($scope.item.biayaPenelitian != undefined) {
                	biayaPenelitian = $scope.item.biayaPenelitian;
                }

                var nim = null;
                if ($scope.item.nim != undefined) {
                	nim = $scope.item.nim;
                }

                var biaya = 0;
                if ($scope.item.biaya != undefined) {
                	biaya = $scope.item.biaya;
                }

                var jumlahBiaya = 0;
                if ($scope.item.jumlahBiaya != undefined) {
                	jumlahBiaya = $scope.item.jumlahBiaya;
                }

                var fakultas =null
                if ($scope.item.fakultas != undefined) {
                	fakultas = $scope.item.fakultas.id;
                }

                var jurusanPeminatan =null
                if ($scope.item.jurusanPeminatan != undefined) {
                	jurusanPeminatan = $scope.item.jurusanPeminatan.id;
                }

                var institusipendidikanfk =null
                if ($scope.item.institusipendidikanfk != undefined) {
                	institusipendidikanfk = $scope.item.institusiPendidikan.id;
                }

                var namapendamping =null
                if ($scope.item.namaPendamping != undefined) {
                	namapendamping = $scope.item.namaPendamping;
                }

                var laporanPenelitian =null
                if ($scope.item.laporanPenelitian != undefined) {
                	laporanPenelitian = $scope.item.laporanPenelitian;
                }

                var lokasiPenelitian =null
                if ($scope.item.lokasiPenelitian != undefined) {
                	lokasiPenelitian = $scope.item.lokasiPenelitian;
                }

                var nomorkwitansi ="-"
                if ($scope.item.nomorKwitansi != undefined) {
                	nomorkwitansi = $scope.item.nomorKwitansi;
                }

                var TahunAjaran =moment($scope.now).format('YYYY')
                if ($scope.item.periodePengajaran != undefined) {
                	TahunAjaran = $scope.item.periodePengajaran;
                }

                var tanggalPembayaran = null
                if ($scope.item.tanggalPembayaran != undefined) {
                	tanggalPembayaran = moment($scope.item.tanggalPembayaran).format('YYYY-MM-DD');
                }

                var tanggalPresentasi = null
                if ($scope.item.tanggalPresentasi != undefined) {
                	tanggalPresentasi = moment($scope.item.tanggalPresentasi).format('YYYY-MM-DD');
                }
                
                for (var i =  $scope.currentKeterangan.length - 1; i >= 0; i--) {
                    var c = $scope.currentKeterangan[i].id
                    b = ","+ c
                    a = a + b
                }

                listKeterangan= a.slice(1, a.length)

				var data = {
					"norec_kpe":norec_kpe,
					"namapendamping":namapendamping,
					"biayapenelitian":biayaPenelitian,
					"fakultasfk":fakultas,
					"biaya":biaya,
					"jumlahBiaya":jumlahBiaya,
                    "sebagai":$scope.item.sebagai.id,
					"institusipendidikanfk":institusipendidikanfk,
					"profesi":$scope.item.profesi.id,
                    "kegiatan":$scope.item.kegiatan.id,
					"judulpeneltian":$scope.item.judulPenelitian,
					"jurusanpeminatanfk":jurusanPeminatan,
					"laporanpenelitian":laporanPenelitian,
					"lokasipenelitian":lokasiPenelitian,
					"namapeneliti":$scope.item.namaPeneliti,
					"tempatkegiatan":$scope.item.tempatkegiatan,
					"nim":nim,
					"nomorkwitansi":nomorkwitansi,
					"periodepengajaran":TahunAjaran,
					"tanggalmulai":moment($scope.item.tanggalMulai).format('YYYY-MM-DD HH:mm'),
					"tanggalpembayaran":tanggalPembayaran,
					"tanggalpresentasi":tanggalPresentasi,
					"tanggalselesai":TglSelesai,
					"kelengkapanadministrasi":listKeterangan
				};	

				var objSave = {
                    data: data,
                }

                medifirstService.post('sdm/penelitian/save-kegiatan-penelitian-eksternal',objSave).then(function (e) {
                    $scope.item = {};  
                    $state.go('DaftarPenelitianEksternal')     
                })

			}
			
		}
	]);
});
define(['initialize'], function (initialize) {
	'use strict';
	initialize.controller('KonversiHargaCtrl', ['$state', '$q', '$scope', '$window', 'CacheHelper', 'MedifirstService',
		function ($state, $q, $scope, window, cacheHelper, medifirstService) {
			// debugger;
			$scope.now = new Date();
			$scope.dataVOloaded = true;

			$scope.dataParams = JSON.parse($state.params.dataPasien);
			// debugger;
			$scope.showBilling = false;
			//$scope.urlBilling = $sce.trustAsResourceUrl(manageTataRekening.openPageBilling($scope.dataParams.noRegistrasi));

			$scope.item = {};
			var dataLayanan = [];
			var dataResep = [];
			var strRUanganFilter = '';
			var ruangaan2 = {};

			$scope.isRouteLoading = false;

			LoadData();
			medifirstService.get("tatarekening/get-combo-detail-regis").then(function (e) { 
				$scope.listKelompokPasien = e.data.kelompokpasien;
			})
			// medifirstService.get("tatarekening/get-data-login?noRegistrasi=" + $scope.dataParams.noRegistrasi).then(function (e) {
			// 	$scope.listRuangAPD = e.data.listRuangan
			// });

			$scope.$watch('item.kelompokPasientujuan', function (e) {
                if (e === undefined) return;

                medifirstService.get("registrasi/get-penjaminbykelompokpasien?kdKelompokPasien=" + e.id).then(function (z) {
					$scope.listRekanan = z.data.rekanan;
				})
			})

			$scope.CariNoreg = function () {
				if ($scope.item.noRegistrasi == '') {
					return;
				}
				if ($scope.item.noRegistrasi == '0') {
					return;
				}
				if ($scope.item.noRegistrasi == undefined) {
					return;
				}

				cacheHelper.set('KonversiHargaNOREG', $scope.item.noRegistrasi)

				medifirstService.get("tatarekening/get-detail_apd?noregistrasi=" + $scope.item.noRegistrasi).then(function (e) { 
					if (e.statResponse) {
						$scope.item = e.data[0];
						$scope.item.tanggalPelAwal = moment($scope.item.tglMasuk).format('YYYY-MM-DD') + " 00:00";
						$scope.item.tanggalPelAkhir = moment($scope.item.tglMasuk).format('YYYY-MM-DD') + " 23:59";
						$scope.item.tglPulang = $scope.formatTanggal($scope.item.tglPulang);
						$scope.item.tglMasuk = $scope.formatTanggal($scope.item.tglMasuk);
						getdata($scope.item.noRegistrasi)
					}
				})				
			}

			function LoadData() {
				// debugger;
				var chacePeriode = ''
				chacePeriode = cacheHelper.get('KonversiHargaNOREG');
				if (chacePeriode == '') {
					return
				}
				if (chacePeriode == undefined) {
					return
				}

				medifirstService.get("tatarekening/get-detail_apd?noregistrasi=" + chacePeriode).then(function (e) { 
					if (e.statResponse) {
						$scope.item = e.data[0];
						$scope.item.tanggalPelAwal = moment($scope.item.tglMasuk).format('YYYY-MM-DD') + " 00:00";
						$scope.item.tanggalPelAkhir = moment($scope.item.tglMasuk).format('YYYY-MM-DD') + " 23:59";
						$scope.item.tglPulang = $scope.formatTanggal($scope.item.tglPulang);
						$scope.item.tglMasuk = $scope.formatTanggal($scope.item.tglMasuk);
						getdata(chacePeriode)
					}
				})
			}

			function getdata(noreg) {
				dataLayanan = [];
				dataResep = [];

				var tglawal = moment($scope.item.tanggalPelAwal).format('YYYY-MM-DD HH:mm');
        		var tglakhir = moment($scope.item.tanggalPelAkhir).format('YYYY-MM-DD HH:mm');

				$scope.isRouteLoading = true;
				$q.all([
					medifirstService.get("tatarekening/get-tagihan-konversi?noRegister=" + noreg + "&tglawal="+ tglawal +"&tglakhir="+tglakhir)
				])
				.then(function (data) {

					if (data[0].statResponse) {
						dataLayanan = [];
						dataResep = [];
						var nourutlayanan = 0
						var nourutresep = 0
						for (var i = data[0].data.details.length - 1; i >= 0; i--) {
							if (data[0].data.details[i].strukfk == " / ") {
								if (data[0].data.details[i].aturanpakai == null) {
									nourutlayanan = nourutlayanan + 1
									data[0].data.details[i].no = nourutlayanan
									data[0].data.details[i].hargakonversi = 0
									data[0].data.details[i].totalkonversi = 0
									dataLayanan.push(data[0].data.details[i])
								} else {
									nourutresep = nourutresep + nourutresep
									data[0].data.details[i].no = nourutresep
									data[0].data.details[i].hargakonversi = 0
									data[0].data.details[i].totalkonversi = 0
									dataResep.push(data[0].data.details[i])
								}
							}
						}

						$scope.dataRincianTagihan = new kendo.data.DataSource({
							data: dataLayanan,
							group: [
							],
							pageSize: 20,
							schema: {
								model: {
									fields: {
										totalkonversi: { type: "number" },
									}
								}
							},
							aggregate: [
								{ field: 'totalkonversi', aggregate: 'sum' },
							]
						});
						$scope.dataRincianTagihan1 = new kendo.data.DataSource({
							data: dataResep,
							group: [
							],
							pageSize: 20,
							schema: {
								model: {
									fields: {
										totalkonversi: { type: "number" },
									}
								}
							},
							aggregate: [
								{ field: 'totalkonversi', aggregate: 'sum' },
							]
						});
					}
					$scope.isRouteLoading = false;

				});
			}

			$scope.SearchData = function () {
				getdata($scope.item.noRegistrasi)
			}

			$scope.columnRincianTagihan = {
				selectable: "multiple",
				columns: [
					{
						"field": "tglpelayanan",
						"title": "Tanggal",
						"width": "100px",
						"template": "<span class='style-left'>{{formatTanggal('#: tglpelayanan #')}}</span>"
					},
					{
						"field": "namaproduk",
						"title": "Nama Pelayanan",
						"width": "200px",
					},
					{
						"field": "namaruangan",
						"title": "Ruangan",
						"width": "200px",
					},
					{
						"field": "jumlah",
						"title": "Qty",
						"width": "50px",
						"template": "<span class='style-right'>#: jumlah #</span>"
					},
					{
						"field": "harga",
						"title": "Harga",
						"width": "120px",
						"template": "<span class='style-right'>{{formatRupiah('#: harga #', '')}}</span>"
					},
					{
						"field": "diskon",
						"title": "Harga Diskon",
						"width": "120px",
						"template": "<span class='style-right'>{{formatRupiah('#: diskon #', '')}}</span>"
					},
					{
						"field": "jasa",
						"title": "Jasa",
						"width": "100px",
						"template": "<span class='style-right'>{{formatRupiah('#: jasa #', '')}}</span>"
					},
					{
						"field": "total",
						"title": "Total",
						"width": "120px",
						"template": "<span class='style-right'>{{formatRupiah('#: total #', '')}}</span>"
					},
					{
						"field": "hargakonversi",
						"title": "Harga Konversi",
						"width": "120px",
						attributes:{ 'class':"green" },
						"template": "<span class='style-right;'>{{formatRupiah('#: hargakonversi #', '')}}</span>",
						footerTemplate: "<span class='style-center'>Total Konversi </span>",
					},
					{
						"field": "totalkonversi",
						"title": "Total Konversi",
						"width": "120px",
						attributes:{ 'class':"green" },
						"template": "<span class='style-right;'>{{formatRupiah('#: totalkonversi #', '')}}</span>",
						aggregates: ["sum"],
						footerTemplate: "<span class='style-right'>{{formatRupiah('#: data.totalkonversi.sum #', '')}}</span>",
						footerAttributes: { style: "text-align: right;" }
					}
				],
				sortable: {
					mode: "single",
					allowUnsort: false,
				}
			}

			$scope.columnRincianTagihan1 = {
				columns: [
					{
						"field": "tglpelayanan",
						"title": "Tanggal",
						"width": "100px",
						"template": "<span class='style-left'>{{formatTanggal('#: tglpelayanan #')}}</span>"
					},
					{
						"field": "namaproduk",
						"title": "Nama Pelayanan",
						"width": "200px",
					},
					{
						"field": "namaruangan",
						"title": "Ruangan",
						"width": "200px",
					},
					{
						"field": "jumlah",
						"title": "Qty",
						"width": "50px",
						"template": "<span class='style-right'>#: jumlah #</span>"
					},
					{
						"field": "harga",
						"title": "Harga",
						"width": "120px",
						"template": "<span class='style-right'>{{formatRupiah('#: harga #', '')}}</span>"
					},
					{
						"field": "diskon",
						"title": "Harga Diskon",
						"width": "120px",
						"template": "<span class='style-right'>{{formatRupiah('#: diskon #', '')}}</span>"
					},
					{
						"field": "jasa",
						"title": "Jasa",
						"width": "100px",
						"template": "<span class='style-right'>{{formatRupiah('#: jasa #', '')}}</span>"
					},
					{
						"field": "total",
						"title": "Total",
						"width": "120px",
						"template": "<span class='style-right'>{{formatRupiah('#: total #', '')}}</span>"
					},
					{
						"field": "hargakonversi",
						"title": "Harga Konversi",
						"width": "120px",
						attributes:{ 'class':"green" },
						"template": "<span class='style-right;'>{{formatRupiah('#: hargakonversi #', '')}}</span>",
						footerTemplate: "<span class='style-center'>Total Konversi </span>",
					},
					{
						"field": "totalkonversi",
						"title": "Total Konversi",
						"width": "120px",
						attributes:{ 'class':"green" },
						"template": "<span class='style-right;'>{{formatRupiah('#: totalkonversi #', '')}}</span>",
						aggregates: ["sum"],
						footerTemplate: "<span class='style-right'>{{formatRupiah('#: data.totalkonversi.sum #', '')}}</span>",
						footerAttributes: { style: "text-align: right;" }
					}
				],
				sortable: {
					mode: "single",
					allowUnsort: false,
				}
			}

			$scope.formatRupiah = function (value, currency) {
				return currency + " " + parseFloat(value).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
			}

			$scope.formatTanggal = function (tanggal) {
				return moment(tanggal).format('DD-MMM-YYYY HH:mm');
			}

			$scope.klik = function (rowClick) {
				$scope.currentRowData = rowClick;
			}

			$scope.dbklikGrid = function (rowClick) {
				$scope.currentRowData = rowClick;

				loadKomponen();
				$scope.item.tglPelayanans = moment(new Date($scope.currentRowData.tglpelayanan)).format('DD-MM-YYYY HH:mm')
				$scope.item.namaPelayanans = $scope.currentRowData.namaproduk;
				$scope.popupKomponen.center().open();
				// Get current actions
				var actions = $scope.popupKomponen.options.actions;
				// Remove "Close" button
				actions.splice(actions.indexOf("Close"), 1);
				// Set the new options
				$scope.popupKomponen.setOptions({ actions: actions });
			}

			$scope.dbklikGrid1 = function (rowClick1) {
				$scope.currentRowData = rowClick1;

				loadKomponen();
				$scope.item.tglPelayanans = moment(new Date($scope.currentRowData.tglpelayanan)).format('DD-MM-YYYY HH:mm')
				$scope.item.namaPelayanans = $scope.currentRowData.namaproduk;
				$scope.popupKomponen.center().open();
				// Get current actions
				var actions = $scope.popupKomponen.options.actions;
				// Remove "Close" button
				actions.splice(actions.indexOf("Close"), 1);
				// Set the new options
				$scope.popupKomponen.setOptions({ actions: actions });
			}

			$scope.tutupkomponen = function () {
				$scope.popupKomponen.center().close();
			}

			function loadKomponen() {
				medifirstService.get("tatarekening/get-komponenharga-pelayanan?norec_pp=" + $scope.currentRowData.norec).
					then(function (data) {
						$scope.sourceKomponens = new kendo.data.DataSource({
							data: data.data.data,
							serverPaging: false,
							pageSize: 10,
							schema: {
								model: {
									fields: {
										komponenharga: { type: "string" },
										jumlah: { type: "number" },
										hargasatuan: { type: "number" },
										hargadiscount: { type: "number" },
										jasa: { type: "number" },
									}
								}
							}, aggregate: [
								{ field: 'hargasatuan', aggregate: 'sum' },
								{ field: 'hargadiscount', aggregate: 'sum' },
								{ field: 'jasa', aggregate: 'sum' },
							]

						});
					});
			}

			$scope.columnKomponens = {
				sortable: true,
				selectable: "row",
				columns: [
					{
						"field": "komponenharga",
						"title": "Komponen",
						"width": "100px",
					},
					{
						"field": "jumlah",
						"title": "Jumlah",
						"width": "50px"
					},
					{
						"field": "hargasatuan",
						"title": "Harga Satuan",
						"width": "80px",
						"template": "<span class='style-right'>{{formatRupiah('#: hargasatuan #', '')}}</span>",
						aggregates: ["sum"],
						footerTemplate: "<span class='style-right'> {{formatRupiah('#:data.hargasatuan.sum  #', '')}}</span>"
					},
					{
						"field": "hargadiscount",
						"title": "Diskon",
						"width": "80px",
						"template": "<span class='style-right'>{{formatRupiah('#: hargadiscount #', '')}}</span>",
						aggregates: ["sum"],
						footerTemplate: "<span class='style-right'> {{formatRupiah('#:data.hargadiscount.sum  #', '')}}</span>"
					},
					{
						"field": "jasa",
						"title": "Jasa",
						"width": "80px",
						"template": "<span class='style-right'>{{formatRupiah('#: jasa #', '')}}</span>",
						aggregates: ["sum"],
						footerTemplate: "<span class='style-right'>{{formatRupiah('#:data.jasa.sum  #', '')}}</span>"
					},
				],
				sortable: {
					mode: "single",
					allowUnsort: false,
				},
			};

			$scope.CariFilterRuanganLayanan = function () {
				$scope.isRouteLoading = true;

				strRUanganFilter = '';
				if ($scope.item.ruang2 != null) {
					strRUanganFilter = '&idruangan=' + $scope.item.ruang2.id
					ruangaan2 = { id: $scope.item.ruang2.id, namaruangan: $scope.item.ruang2.namaruangan }
				} else {
					ruangaan2 = {}
				}


				dataLayanan = [];
				dataResep = [];
				$q.all([
					medifirstService.get("tatarekening/get-tagihan-konversi?noRegister=" + $scope.item.noRegistrasi + strRUanganFilter)
				])
				.then(function (data) {

					if (data[0].statResponse) {
						dataLayanan = [];
						dataResep = [];
						var nourutlayanan = 0
						var nourutresep = 0
						for (var i = data[0].data.details.length - 1; i >= 0; i--) {
							if (data[0].data.details[i].strukfk == " / ") {
								if (data[0].data.details[i].aturanpakai == null) {
									nourutlayanan = nourutlayanan + 1
									data[0].data.details[i].no = nourutlayanan
									data[0].data.details[i].hargakonversi = 0
									data[0].data.details[i].totalkonversi = 0
									dataLayanan.push(data[0].data.details[i])
								} else {
									nourutresep = nourutresep + nourutresep
									data[0].data.details[i].no = nourutresep
									data[0].data.details[i].hargakonversi = 0
									data[0].data.details[i].totalkonversi = 0
									dataResep.push(data[0].data.details[i])
								}
							}
						}

						$scope.dataRincianTagihan = new kendo.data.DataSource({
							data: dataLayanan,
							group: [
							],
							pageSize: 20,
							schema: {
								model: {
									fields: {
										totalkonversi: { type: "number" },
									}
								}
							},
							aggregate: [
								{ field: 'totalkonversi', aggregate: 'sum' },
							]
						});
						$scope.dataRincianTagihan1 = new kendo.data.DataSource({
							data: dataResep,
							group: [
							],
							pageSize: 20,
							schema: {
								model: {
									fields: {
										totalkonversi: { type: "number" },
									}
								}
							},
							aggregate: [
								{ field: 'totalkonversi', aggregate: 'sum' },
							]
						});
						$scope.item.ruang2 = ruangaan2
					}
					$scope.isRouteLoading = false;

				});
			}

			$scope.konversiharga = function () {
				if ($scope.selectedTab == 0) {
					if ($scope.dataRincianTagihan._data.length == 0) {
						toastr.error('Tidak ada pelayanan yang akan dikonversi')
						return
					}
					if($scope.item.kelompokPasientujuan == undefined) {
						toastr.error('Pilih Kelompok Pasien Tujuan terlebih dahulu !')
						return
					}

					var jsonSave = {
						noregistrasi: $scope.item.noRegistrasi,
						idKelas: $scope.item.klsid2,
						idKelPasien: $scope.item.kelompokPasientujuan.id,
						idPenjamin: $scope.item.namaRekanantujuan == undefined ? null : $scope.item.namaRekanantujuan.id,
						tglawal: moment($scope.item.tanggalPelAwal).format('YYYY-MM-DD HH:mm'),
						tglakhir: moment($scope.item.tanggalPelAkhir).format('YYYY-MM-DD HH:mm'),
						data: $scope.dataRincianTagihan._data
					}
					$scope.isRouteLoading = true;
					medifirstService.post("tatarekening/update-harga-konversi",jsonSave).then(function (e) { 
						$scope.isRouteLoading = false;
						if (e.data.status == 201) {
							dataLayanan = [];
							var nourutlayanan = 0
							for (var i = e.data.details.length - 1; i >= 0; i--) {
								if (e.data.details[i].strukfk == " / ") {
									if (e.data.details[i].aturanpakai == null) {
										nourutlayanan = nourutlayanan + 1
										e.data.details[i].no = nourutlayanan
										dataLayanan.push(e.data.details[i])
									}
								}
							}
							$scope.dataRincianTagihan = new kendo.data.DataSource({
								data: dataLayanan,
								group: [
								],
								pageSize: 20,
								schema: {
									model: {
										fields: {
											totalkonversi: { type: "number" },
										}
									}
								},
								aggregate: [
									{ field: 'totalkonversi', aggregate: 'sum' },
								]
							});
						}
						// console.log(e)
					})
					
				} else {
					if ($scope.dataRincianTagihan1._data.length == 0) {
						toastr.error('Tidak ada obat yang akan dikonversi')
						return
					}
					if($scope.item.kelompokPasientujuan == undefined) {
						toastr.error('Pilih Kelompok Pasien Tujuan terlebih dahulu !')
						return
					}

					var jsonSave = {
						noregistrasi: $scope.item.noRegistrasi,
						idKelas: $scope.item.klsid2,
						idKelPasien: $scope.item.kelompokPasientujuan.id,
						idPenjamin: $scope.item.namaRekanantujuan == undefined ? null : $scope.item.namaRekanantujuan.id,
						tglawal: moment($scope.item.tanggalPelAwal).format('YYYY-MM-DD HH:mm'),
						tglakhir: moment($scope.item.tanggalPelAkhir).format('YYYY-MM-DD HH:mm'),
						data: $scope.dataRincianTagihan1._data
					}
					$scope.isRouteLoading = true;
					medifirstService.post("tatarekening/update-harga-konversi-obat",jsonSave).then(function (e) { 
						$scope.isRouteLoading = false;
						if (e.data.status == 201) {
							dataResep = [];
							var nourutresep = 0
							for (var i = e.data.details.length - 1; i >= 0; i--) {
								if (e.data.details[i].strukfk == " / ") {
									if (e.data.details[i].aturanpakai != null) {
										nourutresep = nourutresep + nourutresep
										e.data.details[i].no = nourutresep
										dataResep.push(e.data.details[i])
									}
								}
							}
							$scope.dataRincianTagihan1 = new kendo.data.DataSource({
								data: dataResep,
								group: [
								],
								pageSize: 20,
								schema: {
									model: {
										fields: {
											totalkonversi: { type: "number" },
										}
									}
								},
								aggregate: [
									{ field: 'totalkonversi', aggregate: 'sum' },
								]
							});
						}
						// console.log(e)

					})
				}
			}

			$scope.simpanharga = function () {
				if ($scope.selectedTab == 0) {
					if ($scope.dataRincianTagihan._data.length == 0) {
						toastr.error('Tidak ada obat yang akan dikonversi')
						return
					}
					if($scope.item.kelompokPasientujuan == undefined) {
						toastr.error('Pilih Kelompok Pasien Tujuan terlebih dahulu !')
						return
					}
					var jsonSave = {
						noregistrasi: $scope.item.noRegistrasi,
						idKelas: $scope.item.klsid2,
						idKelPasien: $scope.item.kelompokPasientujuan.id,
						idPenjamin: $scope.item.namaRekanantujuan == undefined ? null : $scope.item.namaRekanantujuan.id,
						tglawal: moment($scope.item.tanggalPelAwal).format('YYYY-MM-DD HH:mm'),
						tglakhir: moment($scope.item.tanggalPelAkhir).format('YYYY-MM-DD HH:mm'),
						data: $scope.dataRincianTagihan._data
					}
					$scope.isRouteLoading = true;
					medifirstService.post("tatarekening/simpan-harga-konversi",jsonSave).then(function (e) { 
						$scope.isRouteLoading = false;
						if (e.data.status == 201) {
							var updateDokter = {
								"norec_pd": $scope.dataRincianTagihan._data[0].norec_pd,
								"objectrekananfk": $scope.item.namaRekanantujuan == undefined ? null : $scope.item.namaRekanantujuan.id,
								"objectkelompokpasienlastfk": $scope.item.kelompokPasientujuan.id
							}
							medifirstService.post('tatarekening/save-update-rekanan_pd',updateDokter).then(function (e) {
								$scope.saveLogUbahRekanan($scope.dataRincianTagihan._data[0].norec_pd);
								LoadData()
							})
						}
					});
				} else {
					if ($scope.dataRincianTagihan1._data.length == 0) {
						toastr.error('Tidak ada obat yang akan dikonversi')
						return
					}
					if($scope.item.kelompokPasientujuan == undefined) {
						toastr.error('Pilih Kelompok Pasien Tujuan terlebih dahulu !')
						return
					}
					var jsonSave = {
						noregistrasi: $scope.item.noRegistrasi,
						idKelas: $scope.item.klsid2,
						idKelPasien: $scope.item.kelompokPasientujuan.id,
						idPenjamin: $scope.item.namaRekanantujuan == undefined ? null : $scope.item.namaRekanantujuan.id,
						tglawal: moment($scope.item.tanggalPelAwal).format('YYYY-MM-DD HH:mm'),
						tglakhir: moment($scope.item.tanggalPelAkhir).format('YYYY-MM-DD HH:mm'),
						data: $scope.dataRincianTagihan1._data
					}
					$scope.isRouteLoading = true;
					medifirstService.post("tatarekening/simpan-harga-konversi",jsonSave).then(function (e) { 
						$scope.isRouteLoading = false;
						if (e.data.status == 201) {
							var updateDokter = {
								"norec_pd": $scope.dataRincianTagihan1._data[0].norec_pd,
								"objectrekananfk": $scope.item.namaRekanantujuan == undefined ? null : $scope.item.namaRekanantujuan.id,
								"objectkelompokpasienlastfk": $scope.item.kelompokPasientujuan.id
							}
							medifirstService.post('tatarekening/save-update-rekanan_pd',updateDokter).then(function (e) {
								$scope.saveLogUbahRekanan($scope.dataRincianTagihan1._data[0].norec_pd);
								LoadData()
							})
						}
					});
				}
			}

			$scope.Detail = function () {
				var obj = {
					noRegistrasi: $scope.item.noRegistrasi
				}
				$state.go("RincianTagihan", {
					dataPasien: JSON.stringify(obj)
				});
			}

			$scope.saveLogUbahRekanan = function (norec_pd) {
				medifirstService.get("sysadmin/logging/save-log-ubah-rekanan?norec_pd="
					+ norec_pd
				).then(function (data) {
				})
			}
			//END
		}
	]);
});
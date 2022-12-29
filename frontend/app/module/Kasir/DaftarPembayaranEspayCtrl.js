define(['initialize', 'Configuration'], function (initialize, config) {
	'use strict';
	initialize.controller('DaftarPembayaranEspayCtrl', ['$state', '$mdDialog', '$q', '$scope', 'CacheHelper', 'MedifirstService',
		function ($state, $mdDialog, $q, $scope, cacheHelper, medifirstService) {
			$scope.now = new Date();
			$scope.item = {};
			$scope.btn_1 = false;
			$scope.btn_0 = true;
			var NRG = "";
			var dataLogin = {};
			var dataPegawai = [];
			$scope.pegawai = medifirstService.getPegawaiLogin();
			$scope.item.listKasirMulti = []
			$scope.listTipeEspay = [
				{ id: 1, nama: 'Virtual Account', code: 'VA' },
				{ id: 2, nama: 'QR Payment', code: 'QR' },
			]
			$scope.isRouteLoading = false;
			loadCombo();

			function loadData() {
				var tglAwal = moment($scope.item.periodeAwal).format('YYYY-MM-DD HH:mm:ss');
				var tglAkhir = moment($scope.item.periodeAkhir).format('YYYY-MM-DD HH:mm:ss');
				var chacePeriode = tglAwal + "~" + tglAkhir//+":"+$scope.item.noFaktur+":"+$scope.item.NamaSupplier;
				cacheHelper.set('DaftarPembayaranEspayCtrl', chacePeriode);
				var Skasir = "";
				if ($scope.item.kasir != undefined) {
					Skasir = $scope.item.kasir.id;
				}
				var Sins = "";
				if ($scope.item.ins != undefined) {
					Sins = $scope.item.ins.id;
				}
				var Stipe = "";
				if ($scope.item.tipeespay != undefined) {
					Stipe = $scope.item.tipeespay.code;
				}
				var SnoVa = "";
				if ($scope.item.nova != undefined) {
					SnoVa = $scope.item.nova;
				}
				var SnoCm = "";
				if ($scope.item.norm != undefined) {
					SnoCm = $scope.item.norm;
				}
				var Snama = "";
				if ($scope.item.nama != undefined) {
					Snama = $scope.item.nama;
				}
				var listKasir = ""
				if ($scope.item.listKasirMulti.length != 0) {
					var a = ""
					var b = ""
					for (var i = $scope.item.listKasirMulti.length - 1; i >= 0; i--) {

						var c = $scope.item.listKasirMulti[i].id
						b = "," + c
						a = a + b
					}
					listKasir = a.slice(1, a.length)
				}

				$scope.isRouteLoading = true;
				$q.all([
					medifirstService.get("kasir/data-pembayaran-espay?"
						+ "tglAwal=" + tglAwal
						+ "&tglAkhir=" + tglAkhir
						+ "&ins=" + Sins
						+ "&type=" + Stipe
						+ "&nova=" + SnoVa
						+ "&nocm=" + SnoCm
						+ "&nama=" + Snama
						+ "&KasirArr=" + listKasir
					)
				]).then(function (data) {
					$scope.isRouteLoading = false;
					if (data[0].statResponse) {
						var result = data[0].data//.data.result;
						for (var x = 0; x < result.length; x++) {
							var element = result[x];
							element.no = x + 1;
							switch (element.status) {
								case 'S': element.namastatus = 'Success'; break;
								case 'F': element.namastatus = 'Failed'; break;
								case 'SP': element.namastatus = 'Suspect'; break;
								case 'IP': element.namastatus = 'In Process'; break;
							}
						}
						$scope.dataDaftarPenerimaan = new kendo.data.DataSource({
							data: result,
							total: result.length,
							serverPaging: false,
							schema: {
								model: {
									fields: {
									}
								}
							}
						});
					}
				});
			}

			function loadCombo() {

				var chacePeriode = cacheHelper.get('DaftarPembayaranEspayCtrl');
				if (chacePeriode != undefined) {
					var arrPeriode = chacePeriode.split('~');
					$scope.item.periodeAwal = new Date(arrPeriode[0]);
					$scope.item.periodeAkhir = new Date(arrPeriode[1]);
				} else {
					$scope.item.periodeAwal = moment($scope.now).format('YYYY-MM-DD 00:00');//$scope.now;
					$scope.item.periodeAkhir = moment($scope.now).format('YYYY-MM-DD 23:59');//$scope.now;

				}

				$scope.isRouteLoading = true;
				medifirstService.get("kasir/get-data-combo-kasir").then(function (dat) {
					$scope.isRouteLoading = false;
					$scope.listKasir = dat.data.datakasir;
					$scope.selectOptionsKasir = {
						placeholder: "Pilih Kasir...",
						dataTextField: "namalengkap",
						dataValueField: "id",
						// dataSource:{
						//     data: $scope.listRuangan
						// },
						autoBind: false,

					};
					$scope.listInstalasi = dat.data.dataInstalasi;
					dataLogin = dat.data.datalogin;
					dataPegawai = dat.data.datapegawai;
					if (dataPegawai != undefined) {
						$scope.item.listKasirMulti = [
							{ id: dataPegawai.objectpegawaifk, namalengkap: dataPegawai.namalengkap }
						]
					}
					loadData();
				});
			}

			$scope.SearchEnter = function () {
				loadData()
			}

			$scope.aggregate = [
				{
					field: "totalPenerimaan",
					aggregate: "sum"
				}
			]
  			var onDataBound = function () {
                $('td').each(function () {
                    if ($(this).text() == 'Success') { $(this).addClass('green') }
                    if ($(this).text() == 'Failed') { $(this).addClass('red') }
                    if ($(this).text() == 'Suspect') { $(this).addClass('blue') }
                    if ($(this).text() == 'In Process') { $(this).addClass('koneng') }

                })
            }
			$scope.columnDaftarPenerimaan = {
				sortable: true,
				pageable: true,
				selectable: "row",
				dataBound: onDataBound,
                columns: [
					{
						"command": [
							{
								text: "Cetak Surat",
								click: cetakSurkon,
							},
						],
						title: "",
						width: "70px",
					},
					{
						"field": "no",
						"title": "No",
						"template": "<span class='style-center'>#: no #</span>",
						"width": "45px"
					},
					{
						"field": "tglstruk",
						"title": "Tanggal",
						"template": "<span class='style-center'>#: tglstruk #</span>",
						"width": "100px"
					},
					{
						"field": "nocm",
						"title": "No RM",
						"template": "<span class='style-left'>#: nocm #</span>",
						"width": "80px"
					},
					{
						"field": "noregistrasi",
						"title": "No Registrasi",
						"template": "<span class='style-left'>#: noregistrasi #</span>",
						"width": "80px"
					},
					{
						"field": "namapasien",
						"title": "Nama",
						"template": "<span class='style-left'>#: namapasien #</span>",
						"width": "100px"
					},
					{
						"field": "namaruangan",
						"title": "Ruangan",
						"template": "<span class='style-left'>#: namaruangan #</span>",
						"width": "100px"
					},
					{
						"field": "va_number",
						"title": "Virtual Account",
						"template": "<span class='style-center'>#: va_number #</span>",
						"width": "100px"
					},
					{
						"field": "espayproduct_name",
						"title": "Metode Pembayaran",
						"template": "<span class='style-center'>#: espayproduct_name #</span>",
						"width": "100px"
					},
					{
						"field": "expired",
						"title": "Tgl Expired",
						"template": "<span class='style-left'>#: expired #</span>",
						"width": "100px"
					},
					{
						"field": "tglsbm",
						"title": "Tgl Bayar",
						"template": '# if( tglsbm==null) {# - # } else {# #= tglsbm # #} #',
						"width": "100px"
					},
					{
						"field": "namastatus",
						"title": "Status",
						"template": "<span class='style-center'>#: namastatus #</span>",
						"width": "70px",
					},
					{
						"field": "amount",
						"title": "Total pembayaran",
						"template": "<span class='style-right'>{{formatRupiah('#: amount #', 'Rp.')}}</span>",
						"width": "85px",
					},
					{
						"field": "type",
						"title": "Tipe Pembayaran",
						"template": "<span class='style-center'>#: type #</span>",
						"width": "50px"
					},
					{
						"field": "nosbm",
						"title": "No SBM",
						"template": "<span class='style-center'>#: nosbm #</span>",
						"width": "100px"
					},
					{
						"field": "kasir",
						"title": "Kasir",
						"template": '# if( kasir==null) {# - # } else {# #= kasir # #} #',
						"width": "80px"
					},
					{
						"field": "trx_id",
						"title": "Trx Id",
						"template": "<span class='style-center'>#: trx_id #</span>",
						"width": "50px"
					}
				]
			}

			function cetakSurkon (e) {
				e.preventDefault();
				var profile = JSON.parse(localStorage.getItem('profile'))
				var nama = medifirstService.getPegawaiLogin().namaLengkap
                var dataItem = this.dataItem($(e.currentTarget).closest("tr"))
                let nostruk = dataItem.nostruk 
				if (profile != null) {
					window.open(config.baseApiBackend + "report/cetak-surat-perintah-bayar?nostruk=" + nostruk + '&kdprofile=' + profile.id
						+ '&nama=' + nama, '_blank');
				}
			}

			$scope.formatRupiah = function (value, currency) {
				return currency + " " + parseFloat(value).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
			}

			$scope.SearchData = function () {
				loadData();
			}

			$scope.cekStatus = function () {
				if($scope.dataSbnSelected == undefined) {
					toastr.error("Pilih data terlebih dahulu !");
					return
				}

				$mdDialog.show({
					locals:{parm: $scope.dataSbnSelected},
					controller: function ($scope, $mdDialog,parm) {
						$scope.nup = function () {
							var jsonSend = {
								'uuid': parm.norec,
								'order_id': parm.order_id,
								'is_paymentnotif': 'Y'
							}
							$mdDialog.hide();
							$scope.isRouteLoading = true;
							medifirstService.postNonMessage("espay/check-payment-status", jsonSend).then(function (res) {
								if(res.data.error_code === "0000") {
									toastr.success('Ok')
								} else {
									toastr.error(res.data.error_message)
								}
								loadData();
								$scope.isRouteLoading = false;
							})
						};
						$scope.ups = function () {
							var jsonSend = {
								'uuid': parm.norec,
								'order_id': parm.order_id,
								'is_paymentnotif': 'N'
							}
							$mdDialog.hide();
							$scope.isRouteLoading = true;
							medifirstService.postNonMessage("espay/check-payment-status", jsonSend).then(function (res) {
								if(res.data.error_code === "0000") {
									toastr.success('Ok')
								} else {
									toastr.error(res.data.error_message)
								}
								loadData();
								$scope.isRouteLoading = false;
							})
						};
						$scope.cp = function () {
							var jsonSend = {
								'uuid': parm.norec,
								'order_id': parm.order_id,
								'is_paymentnotif': ''
							}
							$mdDialog.hide();
							$scope.isRouteLoading = true;
							medifirstService.postNonMessage("espay/check-payment-status", jsonSend).then(function (res) {
								if(res.data.error_code === "0000") {
									toastr.success('Ok')
								} else {
									toastr.error(res.data.error_message)
								}
								loadData();
								$scope.isRouteLoading = false;
							})
						};
					},
					templateUrl: 'custom-confirm.html',
				});
			}

			$scope.batalkanTransaksi = function () {
				if($scope.dataSbnSelected == undefined) {
					toastr.error("Pilih data terlebih dahulu !");
					return
				}

				if($scope.dataSbnSelected.status != "IP") {
					toastr.error("Pembatalan hanya bisa dilakukan yang berstatus In Proses !");
					return
				}

				var confirm = $mdDialog.confirm()
				.title('Peringatan')
				.textContent('Yakin ingin membatalkan transaksi pasien '+ $scope.dataSbnSelected.namapasien +' ?')
				.ariaLabel('Lucky day')
				.cancel('Tidak')
				.ok('Ya')
                $mdDialog.show(confirm).then(function () {
					var nama = medifirstService.getPegawaiLogin().namaLengkap
					var jsonBatal = {
						'uuid': $scope.dataSbnSelected.norec,
						'order_id': $scope.dataSbnSelected.order_id,
						'tx_remark': `Batal pembayaran pasien ${$scope.dataSbnSelected.namapasien} oleh ${nama}`
					}
					$mdDialog.hide();
					$scope.isRouteLoading = true;
					medifirstService.postNonMessage("espay/update-expire-transaction", jsonBatal).then(function (res) {
						if(res.data.error_code === "0000") {
							toastr.success('Berhasil')
						} else {
							toastr.error(res.data.error_message)
						}
						loadData();
						$scope.isRouteLoading = false;
					})
				})
			}

			//** BATAS */
		}
	]);
});
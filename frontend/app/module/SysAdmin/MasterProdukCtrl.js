define(['initialize'], function (initialize) {
	'use strict';
	initialize.controller('MasterProdukCtrl', ['$scope', '$state', 'CacheHelper', 'MedifirstService',
		function ($scope, $state, cacheHelper, medifirstService) {
			$scope.item = {};
			$scope.now = new Date();
			$scope.item.jumlahRows = 50;

			var init = function () {
				var chacePeriode = cacheHelper.get('MasterProdukCtrl');
				if (chacePeriode != undefined) {
					var arrPeriode = chacePeriode.split('~');
					if (arrPeriode[0] != 'undefined') {
						$scope.item.kdProdukScr = arrPeriode[0];
					}
					if (arrPeriode[1] != 'undefined') {
						$scope.item.namaProdukScr = arrPeriode[1];
					}
					if (arrPeriode[2] != 'undefined') {
						$scope.item.kdProdukInternScr = arrPeriode[2];
					}
					if (arrPeriode[3] != 'undefined') {
						$scope.item.kdBarcodeScr = arrPeriode[3];
					}
					if (arrPeriode[4] != 'undefined') {
						$scope.item.kodeBmnScr = arrPeriode[4];
					}
					loadData()
				} else {
					loadData()
				}
			}

			init();

			$scope.cariFilter = function () {
				loadData()
			}

			function loadData() {
				var kode, kodeintern, kdBarcode, kdBmn, NamaProduk, jmlRows;
				if ($scope.item.kdProdukScr === undefined) {
					kode = "";
				} else {
					kode = $scope.item.kdProdukScr
				}
				if ($scope.item.kdProdukInternScr === undefined) {
					kodeintern = "";
				} else {
					kodeintern = $scope.item.kdProdukInternScr
				}
				if ($scope.item.kdBarcodeScr === undefined) {
					kdBarcode = "";
				} else {
					kdBarcode = $scope.item.kdBarcodeScr
				}
				if ($scope.item.kodeBmnScr === undefined) {
					kdBmn = "";
				} else {
					kdBmn = $scope.item.kodeBmnScr
				}
				if ($scope.item.namaProdukScr === undefined) {
					NamaProduk = "";
				} else {
					NamaProduk = $scope.item.namaProdukScr
				}
				if ($scope.item.jumlahRows === undefined) {
					jmlRows = "";
				} else {
					jmlRows = '&jmlRows=' + $scope.item.jumlahRows;
				}

				medifirstService.get('sysadmin/master/get-data-produk?kdProduk=' + kode
					+ '&kdInternal=' + kodeintern
					+ '&kdBarcode=' + kdBarcode
					+ '&kdBmn=' + kdBmn
					+ '&nmProduk=' + NamaProduk + jmlRows).then(function (e) {
						for (var i = 0; i < e.data.length; i++) {
							e.data[i].no = i + 1
						}
						$scope.dataSource = new kendo.data.DataSource({
							data: e.data,

							schema: {
								model: {
									id: "id",
									fields: {
										kdproduk: { editable: false, type: "number" },
										kdbarcode: { editable: false, type: "number" },
										deskripsiproduk: { editable: false, type: "string" },
										namaproduk: { editable: false, type: "string" }
									}
								}
							},
							pageSize: 20,
						});
					})
				var chacePeriode = $scope.item.kdProdukScr + "~" + $scope.item.namaProdukScr + "~" + $scope.item.kdProdukInternScr
					+ "~" + $scope.item.kdBarcodeScr + "~" + $scope.item.kodeBmnScr;
				cacheHelper.set('MasterProdukCtrl', chacePeriode);
			}

			$scope.klik = function (current) {
				current = $scope.current;
				$scope.item.idx = current.id;
			}

			function disableData(e) {
				e.preventDefault();
				var dataItem = this.dataItem($(e.currentTarget).closest("tr"))

				if (dataItem == undefined) {
					alert("Data Belum Dipilih!")
					return;
				};

				var objSave = {
					"id": dataItem.id,
					"status": 0//'f'
				}
				medifirstService.post('sysadmin/master/save-statusenabled-produk', objSave).then(function (e) {
					init();
				})
			};

			function enableData(e) {
				e.preventDefault();
				var dataItem = this.dataItem($(e.currentTarget).closest("tr"))

				if (dataItem == undefined) {
					alert("Data Belum Dipilih!")
					return;
				};

				var objSave = {
					"id": dataItem.id,
					"status": 1//'t'
				}
				medifirstService.post('sysadmin/master/save-statusenabled-produk', objSave).then(function (e) {
					init();
				})
			};

			$scope.edit = function () {
				if ($scope.dataSelected.id == undefined) {
					alert("Pilih 1 Data Untuk di edit!!")
				} else {
					$state.go("InputProduk", { idx: $scope.dataSelected.id })
				}
			}

			$scope.tambah = function () {
				$state.go("InputProduk")
			}		
			
			$scope.selectedData2 = [];
			$scope.onClick = function (e) {

                var element = $(e.currentTarget);
                var checked = element.is(':checked'),
                    row = element.closest('tr'),
                    grid = $("#kGrid").data("kendoGrid"),
                    // grid = $("#grid").data("kendoGrid"),
                    dataItem = grid.dataItem(row);

                // $scope.selectedData[dataItem.noRec] = checked;
                if (checked) {
                    var result = $.grep($scope.selectedData2, function (e) {
                        // return e.produkfk == dataItem.produkfk;
                    });
                    if (result.length == 0) {
                        $scope.selectedData2.push(dataItem);
                    } else {
                        for (var i = 0; i < $scope.selectedData2.length; i++)
                            // if ($scope.selectedData2[i].produkfk === dataItem.produkfk) {
                            //     $scope.selectedData2.splice(i, 1);
                            //     break;
                            // }
                        $scope.selectedData2.push(dataItem);
                    }
                    row.addClass("k-state-selected");
                } else {
                    for (var i = 0; i < $scope.selectedData2.length; i++)
                        // if ($scope.selectedData2[i].produkfk === dataItem.produkfk) {
                        //     $scope.selectedData2.splice(i, 1);
                        //     break;
                        // }
                    row.removeClass("k-state-selected");
                }
            }

			$scope.columnProduk = [
				{
                    "template": "<input type='checkbox' class='checkbox' ng-click='onClick($event)' />",
                    "width": 40
                },
				{
					"field": "no",
					"title": "<h3 align=center>No.<h3>",
					"width": "48px",
					"filterable": false,
					attributes: {
						"class": "table-cell",
						style: "text-align: center;"
					}                        					
				},
				{
					"field": "id",
					"title": "<h3 align=center>Id Produk<h3>",
					"width": "60px",
					"filterable": false,
					attributes: {
						"class": "table-cell",
						// style: "text-align: center;"
					}   
				},
				{
					"field": "statusenabled",
					"title": "<h3 align=center>Status Enabled<h3>",
					"width": "45px",
					"filterable": false,
					attributes: {
						"class": "table-cell",
						// style: "text-align: center;"
					}					
				},
				{
					"field": "namaproduk",
					"title": "<h3 align=center>Nama Produk<h3>",
					"width": "300px",
					"filterable": false,
					attributes: {
						"class": "table-cell",
						// style: "text-align: center;"
					}					
				},
				{
					"field": "kdproduk",
					"title": "<h3 align=center>Kd Produk<h3>",
					"width": "100px",
					"filterable": false,
					attributes: {
						"class": "table-cell",
						// style: "text-align: center;"
					}					
				},
				{
					"field": "kdbarcode",
					"title": "<h3 align=center>kd Barcode<h3>",
					"width": "100px",
					"filterable": false,
					attributes: {
						"class": "table-cell",
						// style: "text-align: center;"
					}				
				},
				{
					"field": "detailjenisproduk",
					"title": "<h3 align=center>Detail Jenis<h3>",
					"width": "150px",
					"filterable": false,
					attributes: {
						"class": "table-cell",
						// style: "text-align: center;"
					}					
				},
				{
					"command": [
						{ text: "Enable", click: enableData, imageClass: "k-icon k-i-pencil", className: "btn-enabled", },
						{ text: "Disable", click: disableData, imageClass: "k-icon k-delete", className: "btn-disabled", },
					],
					title: "<h3 align=center>Command<h3>",
					width: "180px",
				}				
			];
			$scope.mainGridOptions = {
				pageable: true,
				columns: $scope.columnProduk,
				editable: "popup",
				selectable: "row",
				scrollable: false,				
			};
			$scope.KelBPJS = function () {
				$state.go('KelompokProdukBPJS')
			}

			$scope.popUpKelompokBill = function () {
				// if ($scope.dataPasienSelected.noregistrasi == undefined) {
				// 	toastr.error('Pilih Pasien dulu', 'Info');
				// 	return
				// }
                medifirstService.get("farmasi/get-jenis-billing").then(function (data) {
                    $scope.listJenisBill = data.data.daftar;
                })
                $scope.popupkelbill.center().open();
			}

			$scope.simpanKelBill = function () {
                // var Produkfk = ''
                // for (var i = $scope.selectedData2.length - 1; i >= 0; i--) {
                //     Produkfk = Produkfk + ',' + $scope.selectedData2[i].id
                // }

				var objSave = {
					"selected": $scope.selectedData2,
					"jenisbilling": $scope.item.KelBilling.id					
				}

				medifirstService.post('sysadmin/master/save-kelbil-produk', objSave).then(function (e) {
					init();
				})
            }
		}
	]);
});

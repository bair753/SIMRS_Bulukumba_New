define(['initialize'], function (initialize) {
	'use strict';
	initialize.controller('InformasiMontoringAntrolTaskIDCtrl', ['$mdDialog', '$timeout', '$state', '$q', '$rootScope', '$scope', 'CacheHelper', 'DateHelper', 'MedifirstService',
		function ($mdDialog, $timeout, $state, $q, $rootScope, $scope, cacheHelper, dateHelper, medifirstService) {

			$scope.isRouteLoading = false;
			$scope.dataVOloaded = true;
			$scope.now = new Date();
			$scope.item = {};
			$scope.log = {};
			$scope.item.periodeAwal = moment($scope.now).format('YYYY-MM-DD 00:00');
			$scope.item.periodeAkhir = moment($scope.now).format('YYYY-MM-DD 23:59');
			$scope.totalAntrean = 0
			$scope.totalLengkap = 0
			$scope.totalQuality = 0
			$scope.totalRata = 0
			$scope.totalBelum = 0
			loadCombo()
			loadData()
			function loadCombo() {
				medifirstService.get("rawatjalan/get-antril-combo", false).then(function (data) {
                    $scope.listRuangan = data.data.ruanganRajal;
					$scope.listKelompokPasien = data.data.kelompokpasien;
                });
			}

			function loadData() {
				$scope.isRouteLoading = true;
				var tglAwal = moment($scope.item.periodeAwal).format('YYYY-MM-DD HH:mm:ss');
				var tglAkhir = moment($scope.item.periodeAkhir).format('YYYY-MM-DD HH:mm:ss');
				var kdBooking = ""
				if ($scope.item.kdBooking != undefined) {
					var kdBooking = "&kdBooking=" + $scope.item.kdBooking
				}
				var rm = ""
				if ($scope.item.noRm != undefined) {
					var rm = "&norm=" + $scope.item.noRm
				}
				var nm = ""
				if ($scope.item.nama != undefined) {
					var nm = "&nama=" + $scope.item.nama
				}
				var rg = ""
				if ($scope.item.ruangan != undefined) {
					var rg = "&ruangId=" + $scope.item.ruangan.id
				}

				var kelompok = ""
				if ($scope.item.kelompokpasien != undefined) {
					 kelompok = "&kelId=" + $scope.item.kelompokpasien.id
				}

				medifirstService.get("rawatjalan/get-informasi-monitoring-taskid-bpjs?" +
					"tglAwal=" + tglAwal +
					"&tglAkhir=" + tglAkhir +
					kdBooking + rm + nm + rg +kelompok
				).then(function (data) {
					$scope.dataMonitoring = data.data.monitoring;
                    console.log(data);
					$scope.totalAntrean = 0
					$scope.totalLengkap = 0
                    $scope.totalTask1 = 0
                    $scope.totalTask2 = 0
                    $scope.totalTask3 = 0
                    $scope.totalTask4 = 0
                    $scope.totalTask5 = 0
                    $scope.totalTask6 = 0
                    $scope.totalTask7 = 0
					$scope.totalQuality = 0
					$scope.totalRata = 0
					$scope.totalBelum = 0
					$scope.isRouteLoading = false;
					var rata1 = 0;
					var rata2 = 0;
					var rata3 = 0;
					var rata4 = 0;
					var rata5 = 0;
					var rata6 = 0;
					var rata7 = 0;
					var rata1_ = 0;
					var rata2_ = 0;
					var rata3_ = 0;
					var rata4_ = 0;
					var rata5_ = 0;
					var rata6_ = 0;
					var rata7_ = 0;
					for (let i = 0; i < data.data.data.length; i++) {
						data.data.data[i].no = i + 1;
						const element = data.data.data[i]
						element.jumlahdetik = 0
						if(element.status_1 == true || element.status_3 == true){
							$scope.totalAntrean = $scope.totalAntrean + 1
						}
						// else if(element.status_1 == false || element.status_1 == null){
						// 	$scope.totalBelum = $scope.totalBelum +1
						// }
						if((element.status_1 == true && element.status_2 == true && element.status_3 == true
							&& element.status_4 == true && element.status_5 == true) ||
							( element.status_3 == true
								&& element.status_4 == true && element.status_5 == true)
							){
							$scope.totalLengkap = $scope.totalLengkap + 1
						}else{
							$scope.totalBelum = $scope.totalBelum +1
						}

						// if(element.taksid_1 != '-'){
						// 	element.jumlahdetik =   Math.abs((new Date(element.taksid_1).getTime()/1000));
						// 	rata1 = rata1 + (new Date(element.taksid_1).getTime()/1000);
					
						// }
						
						// if(element.taksid_2 != '-'){
						// 	element.jumlahdetik =   Math.abs((new Date(element.taksid_2).getTime()/1000));
						// 	rata2 = rata2 + (new Date(element.taksid_2).getTime()/1000);
							
						// }
					
						// if(element.taksid_3 != '-'){
						// 	element.jumlahdetik =   Math.abs((new Date(element.taksid_3).getTime()/1000));
						// 	rata3 = rata3 + (new Date(element.taksid_3).getTime()/1000);
						// }
						
						// if(element.taksid_4 != '-'){
						// 	element.jumlahdetik =   Math.abs((new Date(element.taksid_4).getTime()/1000));
						// 	rata4 = rata4 + (new Date(element.taksid_4).getTime()/1000);
						// }
						
						// if(element.taksid_5 != '-'){
						// 	element.jumlahdetik =   Math.abs((new Date(element.taksid_5).getTime()/1000));
						// 	rata5 = rata5 + (new Date(element.taksid_5).getTime()/1000);
						// }
						
						// if(element.taksid_6 != '-'){
						// 	element.jumlahdetik =   Math.abs((new Date(element.taksid_6).getTime()/1000));
						// 	rata6 = rata6 + (new Date(element.taksid_6).getTime()/1000);
						// }
						
						// if(element.taksid_7 != '-'){
						// 	element.jumlahdetik =   Math.abs((new Date(element.taksid_7).getTime()/1000));
						// 	rata7 = rata7 + (new Date(element.taksid_7).getTime()/1000);
						// }
						// element.waktu = element.jumlahdetik 
						// rata1_ = rata1_ + element.waktu 
						
					}
					$scope.totalQuality = $scope.totalLengkap / data.data.data.length * 100
					$scope.totalQuality = $scope.totalQuality.toFixed(2)

					// // if ($scope.totalAntrean > 0) {
					// 	// if(rata1> 0)
					// 	// rata1 = rata1 /  $scope.totalAntrean;
					// 	// if(rata2> 0)
					// 	// rata2 = rata2 /  $scope.totalAntrean;
					// 	// if(rata3> 0)
					// 	// rata3 = rata3 /  $scope.totalAntrean;
					// 	// if(rata3> 0)
					// 	// rata4 = rata4 /  $scope.totalAntrean;
					// 	// if(rata5> 0)
					// 	// rata5 = rata5 /  $scope.totalAntrean;
					// 	// if(rata6> 0)
					// 	// rata6 = rata6 /  $scope.totalAntrean;
					// 	// if(rata7> 0)
					// 	// rata7 = rata7 /  $scope.totalAntrean;
					// 	// $scope.totalRata = (rata1+rata2+rata3+rata4+rata5+rata6+rata7)/7 ;
					// 	$scope.totalRata = rata1_/totalLengkap
					// 	$scope.totalRata = secondsToHms($scope.totalRata); 
					// // }
				
					$scope.dataDaftarPasien = new kendo.data.DataSource({
						data: data.data.data,
						pageSize: 15,
						total: data.data.data.length,
						serverPaging: false,
						schema: {
							model: {
								fields: {
								}
							}
						}
					});
						$scope.dataDaftarPasienRekapan = new kendo.data.DataSource({
						data: data.data.rekapan,
						pageSize: 15,
						total: data.data.rekapan.length,
						serverPaging: false,
						schema: {
							model: {
								fields: {
								}
							}
						}
					});

                    $scope.dataDaftarPasienTaskId = new kendo.data.DataSource({
                        data: [
                            {
                               "taskidNullCounts": data.data.taskid.taskidNullCounts,
                                "taskidNotNullCounts": data.data.taskid.taskidNotNullCounts,
                                "taskidNullPercentages": data.data.taskid.taskidNullPercentages,
                                "taskidNotNullPercentages": data.data.taskid.taskidNotNullPercentages
                            }
                        ],
                        pageSize: 15,
                        serverPaging: false,
                    });
				})

			}
			function secondsToHms(d) {
				d = Number(d);
				var h = Math.floor(d / 3600);
				var m = Math.floor(d % 3600 / 60);
				var s = Math.floor(d % 3600 % 60);
			
				var hDisplay = h > 0 ? h + (h == 1 ? " hour, " : " hours, ") : "";
				var mDisplay = m > 0 ? m + (m == 1 ? " minute, " : " minutes, ") : "";
				var sDisplay = s > 0 ? s + (s == 1 ? " second" : " seconds") : "";
				return hDisplay + mDisplay + sDisplay;
			  }
			function millisToMinutesAndSeconds(totalSeconds) {

                // 👇️ get number of full minutes
                var minutes = Math.floor(totalSeconds / 60);

                // 👇️ get remainder of seconds
                var seconds = totalSeconds % 60;

                function padTo2Digits(num) {
                  return num.toString().padStart(2, '0');
                }

                // ✅ format as MM:SS
                seconds = Math.floor(seconds)
                const result = `${padTo2Digits(minutes)}:${padTo2Digits(seconds)}`;
              //   console.log(result); // 👉️ "09:25"
              // var minutes = Math.floor(millis / 60000);
              // var seconds = ((millis % 60000) / 1000).toFixed(0);
              return result;//minutes + ":" + (seconds < 10 ? '0' : '') + seconds;
            }

			$scope.formatTanggal = function (tanggal) {
				if (tanggal == 'null')
					return '-'
				else
					return moment(tanggal).format('DD-MMM-YYYY HH:mm');
			}

			$scope.SearchData = function () {
				loadData()
			}

			$scope.columnDaftarPasien = {
				toolbar: [
					"excel",
				],
				excel: {
					fileName: "InformasiWaktuPelayananRawatJalan.xlsx",
					allPages: true,
				},
				excelExport: function (e) {
					var sheet = e.workbook.sheets[0];
					sheet.frozenRows = 2;
					sheet.mergedCells = ["A1:T1"];
					sheet.name = "Orders";

					var myHeaders = [{
						value: "Informasi Waktu Pelayanan Rawat Jalan",
						fontSize: 20,
						textAlign: "center",
						background: "#ffffff",
						// color:"#ffffff"
					}];

					sheet.rows.splice(0, 0, { cells: myHeaders, type: "header", height: 70 });
				},
				selectable: 'row',
				pageable: true,
				columns:
				[
					{
						"field": "no",
						"title": "No",
						"width": "50px",
						"template": "<span class='style-center'>#: no #</span>"
					},
					{
						"field": "tglregistrasi",
						"title": "Tgl Registrasi",
						"width": "150px",
						"template": "<span class='style-left'>{{formatTanggal('#: tglregistrasi #')}}</span>"
					},
					{
						"field": "kodebooking",
						"title": "Kode Booking",
						"width": "150px",
						"template": "<span class='style-center'>#: kodebooking #</span>"
					},
					{
						"field": "norm",
						"title": "No RM",
						"width": "100px",
						"template": "<span class='style-center'>#: norm #</span>"
					},
					{
						"field": "namapasien",
						"title": "Nama Pasien",
						"width": "200px",
						"template": "<span class='style-left'>#: namapasien #</span>"
					},
					{
						"field": "namaruangan",
						"title": "Nama Ruangan",
						"width": "250px",
					},
					{
						"field": "nosep",
						"title": "No Sep",
						"width": "250px",
					},
					{
						"title": "Waktu Tunggu Admisi",
						headerAttributes: { style: "text-align : center" },
						"columns":[
							{
								"field" : "waktutaskid1",
								"title" : "Waktu",
								"width": "150px",
								"template": "<span class='style-center'>#: waktutaskid1 #</span>"
							}, 
							{
								"field" : "statuskirim_1",
								"title" : "Kirim Antrol",
								"width": "100px",
								"template": "<span class='style-center'># if( statuskirim_1==true) {# ✔ # } else {# ✘ #} #</span>"
							},
							{
								"field": "",
								"title": "Log Antrol",
								"width":"100px",
								"template": "<span style='color:black;font-size:1.2em;cursor: pointer;' class='fa fa-file-text-o style-center' ng-click='ShowCatatan(\"#= kodebooking #\", 1)'></span>",
							}
						]
					},
					{
						"field": "taskid2",
						"title": "Waktu Layanan Admisi",
						headerAttributes: { style: "text-align : center" },
						"columns":[
							{
								"field" : "waktutaskid2",
								"title" : "Waktu",
								"width": "150px",
								"template": "<span class='style-center'>#: waktutaskid2 #</span>"
							}, 
							{
								"field" : "statuskirim_2",
								"title" : "Kirim Antrol",
								"width": "100px",
								"template": "<span class='style-center'># if( statuskirim_2==true) {# ✔ # } else {# ✘ #} #</span>"
							},
							{
								"field": "",
								"title": "Log Antrol",
								"width":"100px",
								"template": "<span style='color:black;font-size:1.2em;cursor: pointer;' class='fa fa-file-text-o style-center' ng-click='ShowCatatan(\"#= kodebooking #\", 2)'></span>",
							},
						]
					},
					{
						"field": "taskid3",
						"title": "Waktu Tunggu Poli",
						headerAttributes: { style: "text-align : center" },
						"columns":[
							{
								"field" : "waktutaskid3",
								"title" : "Waktu",
								"width": "150px",
								"template": "<span class='style-center'>#: waktutaskid3 #</span>"
							}, 
							{
								"field" : "statuskirim_3",
								"title" : "Kirim Antrol",
								"width": "100px",
								"template": "<span class='style-center'># if( statuskirim_3==true) {# ✔ # } else {# ✘ #} #</span>"
							},
							{
								"field": "",
								"title": "Log Antrol",
								"width":"100px",
								"template": "<span style='color:black;font-size:1.2em;cursor: pointer;' class='fa fa-file-text-o style-center' ng-click='ShowCatatan(\"#= kodebooking #\", 3)'></span>",
							},
						]
					},
					{
						"field": "taskid4",
						"title": "Waktu Layan Poli",
						headerAttributes: { style: "text-align : center" },
						"columns":[
							{
								"field" : "waktutaskid4",
								"title" : "Waktu",
								"width": "150px",
								"template": "<span class='style-center'>#: waktutaskid4 #</span>"
							}, 
							{
								"field" : "statuskirim_4",
								"title" : "Kirim Antrol",
								"width": "100px",
								"template": "<span class='style-center'># if( statuskirim_4==true) {# ✔ # } else {# ✘ #} #</span>"
							},
							{
								"field": "",
								"title": "Log Antrol",
								"width":"100px",
								"template": "<span style='color:black;font-size:1.2em;cursor: pointer;' class='fa fa-file-text-o style-center' ng-click='ShowCatatan(\"#= kodebooking #\", 4)'></span>",
							},
						]
					},
					{
						"field": "taskid5",
						"title": "Waktu Tunggu Farmasi/Selesai Layan Poli",
						headerAttributes: { style: "text-align : center" },
						"columns":[
							{
								"field" : "waktutaskid5",
								"title" : "Waktu",
								"width": "150px",
								"template": "<span class='style-center'>#: waktutaskid5 #</span>"
							}, 
							{
								"field" : "statuskirim_5",
								"title" : "Kirim Antrol",
								"width": "100px",
								"template": "<span class='style-center'># if( statuskirim_5==true) {# ✔ # } else {# ✘ #} #</span>"
							},
							{
						"field": "",
						"title": "Log Antrol",
						"width":"100px",
						"template": "<span style='color:black;font-size:1.2em;cursor: pointer;' class='fa fa-file-text-o style-center' ng-click='ShowCatatan(\"#= kodebooking #\", 5)'></span>",
					},
						]
					},
					{
						"field": "taskid6",
						"title": "Waktu Layan Farmasi",
						headerAttributes: { style: "text-align : center" },
						"columns":[
							{
								"field" : "waktutaskid6",
								"title" : "Waktu",
								"width": "150px",
								"template": "<span class='style-center'>#: waktutaskid6 #</span>"
							}, 
							{
								"field" : "statuskirim_6",
								"title" : "Kirim Antrol",
								"width": "100px",
								"template": "<span class='style-center'># if( statuskirim_6==true) {# ✔ # } else {# ✘ #} #</span>"
							},
							{
								"field": "",
								"title": "Log Antrol",
								"width":"100px",
								"template": "<span style='color:black;font-size:1.2em;cursor: pointer;' class='fa fa-file-text-o style-center' ng-click='ShowCatatan(\"#= kodebooking #\", 6)'></span>",
							},
						]
					},
					{
						"field": "taskid7",
						"title": "Waktu Obat Selesai",
						headerAttributes: { style: "text-align : center" },
						"columns":[
							{
								"field" : "waktutaskid7",
								"title" : "Waktu",
								"width": "150px",
								"template": "<span class='style-center'>#: waktutaskid7 #</span>"
							}, 
							{
								"field" : "statuskirim_7",
								"title" : "Kirim Antrol",
								"width": "100px",
								"template": "<span class='style-center'># if( statuskirim_7==true) {# ✔ # } else {# ✘ #} #</span>"
							},
							{
								"field": "",
								"title": "Log Antrol",
								"width":"100px",
								"template": "<span style='color:black;font-size:1.2em;cursor: pointer;' class='fa fa-file-text-o style-center' ng-click='ShowCatatan(\"#= kodebooking #\", 7)'></span>",
							},
						]
					},
					// {
					// 	"field": "",
					// 	"title": "Log Antrol",
					// 	"width":"100px",
					// 	"template": "<span style='color:black;font-size:1.2em;cursor: pointer;' class='fa fa-file-text-o style-center' ng-click='ShowCatatan(\"#= kodebooking #\")'></span>",
					// },
				]
			};

			$scope.columnDaftarPasienRekapan = {
				toolbar: [
					"excel",
				],
				excel: {
					fileName: "InformasiWaktuPelayananRawatJalan.xlsx",
					allPages: true,
				},
				excelExport: function (e) {
					var sheet = e.workbook.sheets[0];
					sheet.frozenRows = 2;
					sheet.mergedCells = ["A1:T1"];
					sheet.name = "Orders";

					var myHeaders = [{
						value: "Informasi Waktu Pelayanan Rawat Jalan",
						fontSize: 20,
						textAlign: "center",
						background: "#ffffff",
						// color:"#ffffff"
					}];

					sheet.rows.splice(0, 0, { cells: myHeaders, type: "header", height: 70 });
				},
				selectable: 'row',
				pageable: true,
				columns:
				[
					{
						"field": "namaruangan",
						"title": "Nama Ruangan",
						"width": "150px",
					},
					{
						"field": "total_pasien",
						"title": "Total Pasien",
						"width": "150px",
					},
					{
						"field": "jml_task1",
						"title": "Jumlah Taks Id 1",
						"width": "150px",
					},
					{
						"field": "jml_task2",
						"title": "Jumlah Taks Id 2",
						"width": "150px",
					},
					{
						"field": "jml_task3",
						"title": "Jumlah Taks Id 3",
						"width": "150px",
					},
					{
						"field": "jml_task4",
						"title": "Jumlah Taks Id 4",
						"width": "150px",
					},
					{
						"field": "jml_task5",
						"title": "Jumlah Taks Id 5",
						"width": "150px",
					},
					{
						"field": "jml_task6",
						"title": "Jumlah Taks Id 6",
						"width": "150px",
					},
					{
						"field": "jml_task7",
						"title": "Jumlah Taks Id 7",
						"width": "150px",
					},
					{
						"field": "avg_durasi_1_3",
						"title": "Durari Taks 1 Sampai 3",
						"width": "200px",
					},
					{
						"field": "avg_durasi_3_4",
						"title": "Durasi Taks 3 Sampai 4",
						"width": "200px",
					},
					{
						"field": "avg_durasi_4_5",
						"title": "Durasi taks 4 Sampai 5",
						"width": "200px",
					},
					{
						"field": "avg_durasi_5_6",
						"title": "Durasi Taks 5 Sampai 6",
						"width": "200px",
					},
					{
						"field": "avg_durasi_6_7",
						"title": "Durasi Taks 6 Sampai 7",
						"width": "200px",
					},
					{
						"field": "pasien_lengkap",
						"title": "Pasien Dengan Taks Id Lengkap 1 - 7",
						"width": "250px",
					},
					{
						"field": "persen_task1",
						"title": "Persentasi Taks Id 1",
						"width": "200px",
					},
					{
						"field": "persen_task2",
						"title": "Persentasi Taks Id 2",
						"width": "200px",
					},
					{
						"field": "persen_task3",
						"title": "Persentasi Taks Id 3",
						"width": "200px",
					},
					{
						"field": "persen_task4",
						"title": "Persentasi Taks Id 4",
						"width": "200px",
					},
					{
						"field": "persen_task5",
						"title": "Persentasi Taks Id 5",
						"width": "200px",
					},
					{
						"field": "persen_task6",
						"title": "Persentasi Taks Id 6",
						"width": "200px",
					},
					{
						"field": "persen_task7",
						"title": "Persentasi Taks Id 7",
						"width": "200px",
					},
					{
						"field": "pasien_tidak_lengkap",
						"title": "Total Pasien Dengan Taks Id Tidak Lengkap",
						"width": "200px",
					},
				]
			};

            function generateTaskColumns() {
                let columns = [];
                for (let i = 1; i <= 7; i++) {
                    columns.push({
                        "title": `Task ID ${i}`,
                        "columns": [
                            {
                                "field": `taskidNotNullCounts.taskid${i}`,
                                "title": "Berhasil",
                                "width": "50%",
                                "template": `<span class='style-center'>#: taskidNotNullCounts.taskid${i} || 0 #</span>`
                            },
                            {
                                "field": `taskidNullCounts.taskid${i}`,
                                "title": "Gagal",
                                "width": "50%",
                                "template": `<span class='style-center'>#: taskidNullCounts.taskid${i} || 0 #</span>`
                            },
                            {
                                "field": `taskidNotNullPercentages.taskid${i}`,
                                "title": "Persentase Berhasil (%)",
                                "width": "50%",
                                "template": `<span class='style-center'>#: taskidNotNullPercentages.taskid${i} || '0.00' #%</span>`
                            },
                            {
                                "field": `taskidNullPercentages.taskid${i}`,
                                "title": "Persentase Gagal (%)",
                                "width": "50%",
                                "template": `<span class='style-center'>#: taskidNullPercentages.taskid${i} || '0.00' #%</span>`
                            }
                        ]
                    });
                }
                return columns;
            }
            
            $scope.columnInformasi = {
                selectable: 'row',
                pageable: true,
                columns: generateTaskColumns()
            };

            // $scope.columnInformasi = {
            //     selectable: 'row',
            //     pageable: true,
            //     columns: [
            //         {
            //             "title": "Jumlah",
            //             "width": "87%",
            //             headerAttributes: { style: "text-align: center" },
            //             "columns": [
            //                 {
            //                     "title": "Task ID 1",
            //                     "columns": [
            //                         {
            //                             "field": "taskidNotNullCounts.taskid1",
            //                             "title": "Berhasil",
            //                             "width": "10%",
            //                             "template": "<span class='style-center'>#: taskidNotNullCounts.taskid1 #</span>"
            //                         },
            //                         {
            //                             "field": "taskidNullCounts.taskid1",
            //                             "title": "Gagal",
            //                             "width": "10%",
            //                             "template": "<span class='style-center'>#: taskidNullCounts.taskid1 #</span>"
            //                         },
            //                         {
            //                             "field": "status_1",
            //                             "title": "Status",
            //                             "width": "10%",
            //                             "template": "<span class='style-center'># if(status_1) {# ✔ # } else {# ✘ #} #</span>"
            //                         }
            //                     ]
            //                 },
            //                 {
            //                     "title": "Task ID 2",
            //                     "columns": [
            //                         {
            //                             "field": "taskidNotNullCounts.taskid2",
            //                             "title": "Berhasil",
            //                             "width": "10%",
            //                             "template": "<span class='style-center'>#: taskidNotNullCounts.taskid2 #</span>"
            //                         },
            //                         {
            //                             "field": "taskidNullCounts.taskid2",
            //                             "title": "Gagal",
            //                             "width": "10%",
            //                             "template": "<span class='style-center'>#: taskidNullCounts.taskid2 #</span>"
            //                         },
            //                         {
            //                             "field": "status_2",
            //                             "title": "Status",
            //                             "width": "10%",
            //                             "template": "<span class='style-center'># if(status_2) {# ✔ # } else {# ✘ #} #</span>"
            //                         }
            //                     ]
            //                 },
            //                 // Tambahkan Task ID 3 hingga Task ID 7 dengan format serupa
            //                 {
            //                     "title": "Task ID 3",
            //                     "columns": [
            //                         {
            //                             "field": "taskidNotNullCounts.taskid3",
            //                             "title": "Berhasil",
            //                             "width": "10%",
            //                             "template": "<span class='style-center'>#: taskidNotNullCounts.taskid3 #</span>"
            //                         },
            //                         {
            //                             "field": "taskidNullCounts.taskid3",
            //                             "title": "Gagal",
            //                             "width": "10%",
            //                             "template": "<span class='style-center'>#: taskidNullCounts.taskid3 #</span>"
            //                         },
            //                         {
            //                             "field": "status_3",
            //                             "title": "Status",
            //                             "width": "10%",
            //                             "template": "<span class='style-center'># if(status_3) {# ✔ # } else {# ✘ #} #</span>"
            //                         }
            //                     ]
            //                 },
            //                 {
            //                     "title": "Task ID 4",
            //                     "columns": [
            //                         {
            //                             "field": "taskidNotNullCounts.taskid4",
            //                             "title": "Berhasil",
            //                             "width": "10%",
            //                             "template": "<span class='style-center'>#: taskidNotNullCounts.taskid4 #</span>"
            //                         },
            //                         {
            //                             "field": "taskidNullCounts.taskid4",
            //                             "title": "Gagal",
            //                             "width": "10%",
            //                             "template": "<span class='style-center'>#: taskidNullCounts.taskid4 #</span>"
            //                         },
            //                         {
            //                             "field": "status_4",
            //                             "title": "Status",
            //                             "width": "10%",
            //                             "template": "<span class='style-center'># if(status_4) {# ✔ # } else {# ✘ #} #</span>"
            //                         }
            //                     ]
            //                 },
            //                 {
            //                     "title": "Task ID 5",
            //                     "columns": [
            //                         {
            //                             "field": "taskidNotNullCounts.taskid5",
            //                             "title": "Berhasil",
            //                             "width": "10%",
            //                             "template": "<span class='style-center'>#: taskidNotNullCounts.taskid5 #</span>"
            //                         },
            //                         {
            //                             "field": "taskidNullCounts.taskid5",
            //                             "title": "Gagal",
            //                             "width": "10%",
            //                             "template": "<span class='style-center'>#: taskidNullCounts.taskid5 #</span>"
            //                         },
            //                         {
            //                             "field": "status_5",
            //                             "title": "Status",
            //                             "width": "10%",
            //                             "template": "<span class='style-center'># if(status_5) {# ✔ # } else {# ✘ #} #</span>"
            //                         }
            //                     ]
            //                 },
            //                 {
            //                     "title": "Task ID 6",
            //                     "columns": [
            //                         {
            //                             "field": "taskidNotNullCounts.taskid6",
            //                             "title": "Berhasil",
            //                             "width": "10%",
            //                             "template": "<span class='style-center'>#: taskidNotNullCounts.taskid6 #</span>"
            //                         },
            //                         {
            //                             "field": "taskidNullCounts.taskid6",
            //                             "title": "Gagal",
            //                             "width": "10%",
            //                             "template": "<span class='style-center'>#: taskidNullCounts.taskid6 #</span>"
            //                         },
            //                         {
            //                             "field": "status_6",
            //                             "title": "Status",
            //                             "width": "10%",
            //                             "template": "<span class='style-center'># if(status_6) {# ✔ # } else {# ✘ #} #</span>"
            //                         }
            //                     ]
            //                 },
            //                 {
            //                     "title": "Task ID 7",
            //                     "columns": [
            //                         {
            //                             "field": "taskidNotNullCounts.taskid7",
            //                             "title": "Berhasil",
            //                             "width": "10%",
            //                             "template": "<span class='style-center'>#: taskidNotNullCounts.taskid7 #</span>"
            //                         },
            //                         {
            //                             "field": "taskidNullCounts.taskid7",
            //                             "title": "Gagal",
            //                             "width": "10%",
            //                             "template": "<span class='style-center'>#: taskidNullCounts.taskid7 #</span>"
            //                         },
            //                         {
            //                             "field": "status_7",
            //                             "title": "Status",
            //                             "width": "10%",
            //                             "template": "<span class='style-center'># if(status_7) {# ✔ # } else {# ✘ #} #</span>"
            //                         }
            //                     ]
            //                 }
            //             ]
            //         },
            //     ]
            // };

			$scope.ShowCatatan = function(e, jenis) {
                var tglAwal = moment($scope.item.periodeAwal).format('YYYY-MM-DD HH:mm:ss');
				var tglAkhir = moment($scope.item.periodeAkhir).format('YYYY-MM-DD HH:mm:ss');
                

				$scope.isRouteLoading = true;
                medifirstService.get("sysadmin/logging/Daftar-log-taskId?"
					+ "tglAwal=" + tglAwal
					+ "&tglAkhir=" + tglAkhir
					+ "&taskid=" + jenis
					+ "&kodebooking=" + e, true).then(function(dat) {
					
					$scope.isRouteLoading = false;
					var datas = dat.data.daftar;
					console.log(datas);
					
					// Sediakan array baru untuk menampung log yang sudah diformat
					$scope.daftarLogAntrol = [];
					
					for (let i = 0; i < datas.length; i++) {
						var item = datas[i];
						
						var formattedReq = item.reqlogging;
						var formattedRes = item.reslogging;
						
						// Bersihkan prefix "Request: " atau "Response: " jika ada di database
						if (typeof item.reqlogging === 'string' && item.reqlogging.indexOf("Request: ") === 0) {
							formattedReq = item.reqlogging.substring(9);
						}
						if (typeof item.reslogging === 'string' && item.reslogging.indexOf("Response: ") === 0) {
							formattedRes = item.reslogging.substring(10);
						}
						
						// Coba rapikan JSON-nya agar berlekuk/indentasi indah (indent 4 spasi)
						try {
							var objReq = JSON.parse(formattedReq);
							formattedReq = JSON.stringify(objReq, null, 4);
						} catch (err) {
							// Jika gagal parse (bukan valid json), biarkan teks aslinya
						}
						
						try {
							var objRes = JSON.parse(formattedRes);
							formattedRes = JSON.stringify(objRes, null, 4);
						} catch (err) {
							// Jika gagal parse
						}
						
						// Masukkan objek yang sudah siap pakai ke dalam array
						$scope.daftarLogAntrol.push({
							tanggal: item.tanggal,
							keterangan: item.keterangan,
							jsonReqFormatted: formattedReq,
							jsonResFormatted: formattedRes
						});
					}
					
					// Tampilkan modal window Kendo
					$scope.modalLogAntrol.open().center();                 
				});
				// medifirstService.get("sysadmin/logging/Daftar-log-user?noreff=" + e).then(function (e) {
				// 	$scope.isRouteLoading = false;
				// 	var data = e.data.data;
				// 	for (let i = 0; i < data.length; i++) {
				// 		const element = data[i].keterangan.split("|");
				// 		if(element[0].includes("Tambah Antrean Kode")) {
				// 			$scope.log.kirimantrean = $scope.log.kirimantrean + "* " + element[2] + "\r\n";
				// 		}
				// 	}
				// 	$scope.modalLogAntrol.open().center();
				// });
			}
			
			$scope.syncData = function(){
				if($scope.dataDaftarPasien._data.length == 0)return

				let pass = prompt("Masukan password", "");
				if (pass != null) {
					if(pass == 'antrol'){
						sendANTROL($scope.dataDaftarPasien._data )
					}else{
						toastr.error('Password Salah')
					}
				}
				
			}
			async function sendANTROL(dataSource){
				
				$scope.isRouteLoading = true
				for (let x = 0; x < dataSource.length; x++) {
					const element = dataSource[x];
					await repeatSendTaskId(element.noregistrasifk,7)
				}
				$scope.isRouteLoading = false
			}
			async function repeatSendTaskId(norec_pd, taskid) {
                await medifirstService.get('registrasi/get-data-antrean?norec_pd=' + norec_pd).then(async function (e) {
					// VALIDASI BARU
					e.data.nohp = e.data.nohp.substring(0,12)
					let ASALRUJUKAN = 1
					let jenisKunjungan = 1 // {1 (Rujukan FKTP), 2 (Rujukan Internal), 3 (Kontrol), 4 (Rujukan Antar RS)}
					if(e.data.jenispasien == 'JKN'){
                        var jsonRujukan = {
                            "url": `Rujukan/Peserta/${e.data.nomorkartu}`,
                            "method": "GET",
                            "data": null
                        }
                        let resRujukan = await medifirstService.postNonMessage('bridging/bpjs/tools', jsonRujukan)
                        if(resRujukan.data.metaData.code == 200){
                            ASALRUJUKAN = 1
                            e.data.nomorreferensi = resRujukan.data.response.rujukan.noKunjungan
                        }else{
                            var jsonRujukan = {
                                "url": `Rujukan/RS/Peserta/${e.data.nomorkartu}`,
                                "method": "GET",
                                "data": null
                            }
                            let resRujukan = await medifirstService.postNonMessage('bridging/bpjs/tools', jsonRujukan)
                            if(resRujukan.data.metaData.code == 200){
                                ASALRUJUKAN = 2
								e.data.nomorreferensi = resRujukan.data.response.rujukan.noKunjungan
                            }
                        }
                    }
                    //cek jml sep rujukan

                    var jsonJML = {
                        "url":`Rujukan/JumlahSEP/${ASALRUJUKAN}/${e.data.nomorreferensi}`,
                        "method": "GET",
                        "data": null
                    }
                    let resJML = await medifirstService.postNonMessage('bridging/bpjs/tools', jsonJML)
                    if(resJML.data.metaData.code == 200){
                      if(resJML.data.response.jumlahSEP > 0){
                        var jsonSURKON = {
                            "url": `RencanaKontrol/ListRencanaKontrol/Bulan/${moment(new Date()).format("MM")}/Tahun/${new Date().getFullYear()}/Nokartu/${e.data.nomorkartu}/filter/2`,
                            "method": "GET",
                            "data": null
                        }
                        let resSURKON = await medifirstService.postNonMessage('bridging/bpjs/tools', jsonSURKON)
                        if(resSURKON.data.metaData.code == 200){
                            e.data.nomorreferensi = resSURKON.data.response.list[0].noSuratKontrol
                            jenisKunjungan = 3
                            if(resSURKON.data.response.list[0].terbitSEP =='Sudah'){
								let NGASAL =  resSURKON.data.response.list[0].noSuratKontrol.replace('K','Z')
                                e.data.nomorreferensi = NGASAL
                            }
                        }else{
                            jenisKunjungan = 2
                            // e.data.nomorreferensi = e.data.kodebooking // pake no internal aja
                        }
                      }
                    }
					e.data.jeniskunjungan = jenisKunjungan
                    var data = {
                        "url": "antrean/add",
                        "jenis": "antrean",
                        "method": "POST",
                        "data": e.data
                    }
                    medifirstService.postNonMessage('bridging/bpjs/tools', data).then(function (x) {
                        // simpan log
                        if(x.data.metaData.code != 208) {
							medifirstService.postLogging('Antrol Task ID', 'norec Pasien Daftar',
							e.data.kodebooking, 'Tambah Antrean Kode ' + e.data.kodebooking +' | '+
							JSON.stringify(data) + ' | '+ JSON.stringify(x.data))
						}

						medifirstService.postLoggingAntrol(
							`Antrol Task ID - Dengan No Registrasi ${e.data.kodebooking}`,
							'norec Pasien Daftar',
							e.data.kodebooking,
							`Update Antrean Kode ${e.data.kodebooking}`,
							`Request: ${JSON.stringify(data)}`,
							`Response: ${JSON.stringify(x.data)}`,
							`${1}`
						);
                        // mengabil data catatan task id dari 1 - 4
                        medifirstService.get('rawatjalan/get-monitoring-taskid?taskid=' + taskid + '&norec_pd=' + norec_pd).then(function (res) {
							if(res.data.length == (taskid - 1 )){
                           		updateWaktuId(res, e.data.kodebooking, norec_pd)
							}else if(res.data.length == 7){
								updateWaktuId(res, e.data.kodebooking, norec_pd)
							}else{
								checkTaksId(e.data.kodebooking,norec_pd,e.data.estimasidilayani)
							}
                        })
                    })
                })
            }
			async function updateWaktuId(res, kodebooking, norec_pd) {
                for (let i = 0; i < res.data.length; i++) {
                    const element = res.data[i];
					if(kodebooking.length <10){
						if( element.taskid >=3){
							var data = {
								"url": "antrean/updatewaktu",
								"jenis": "antrean",
								"method": "POST",
								"data":
								{
									"kodebooking": kodebooking,
									"taskid": element.taskid,
									"waktu": parseInt(element.waktu)
								}
							}
							await medifirstService.postNonMessage('bridging/bpjs/tools', data).then(async function (e) {
								if(e.data.metaData.code == 200) {
									await saveMonitoringTaksId(kodebooking,norec_pd,  element.taskid, parseInt(element.waktu), true);
								}

								medifirstService.postLoggingAntrol(
									`Antrol Task ID - Dengan No Registrasi ${kodebooking}`,
									'norec Pasien Daftar',
									kodebooking,
									`Update Antrean Kode ${kodebooking}`,
									`Request: ${JSON.stringify(data)}`,
									`Response: ${JSON.stringify(e.data)}`,
									`${element.taskid}`
								);
							})
						}
					}else{
						var data = {
							"url": "antrean/updatewaktu",
							"jenis": "antrean",
							"method": "POST",
							"data":
							{
								"kodebooking": kodebooking,
								"taskid": element.taskid,
								"waktu": parseInt(element.waktu)
							}
						}
						await medifirstService.postNonMessage('bridging/bpjs/tools', data).then(async function (e) {
							if(e.data.metaData.code == 200) {
								await saveMonitoringTaksId(kodebooking,norec_pd,  element.taskid, parseInt(element.waktu), true);
							}

							medifirstService.postLoggingAntrol(
								`Antrol Task ID - Dengan No Registrasi ${kodebooking}`,
								'norec Pasien Daftar',
								kodebooking,
								`Update Antrean Kode ${kodebooking}`,
								`Request: ${JSON.stringify(data)}`,
								`Response: ${JSON.stringify(e.data)}`,
								`${element.taskid}`
							);
						})
					}
                   
                }
            }

           async function saveMonitoringTaksId(kodebooking,noregistrasifk, taskid, waktu, statuskirim) {
				if(statuskirim == true){
					// 071e25a
					var jsontask={
						"url":"antrean/getlisttask",
						"jenis":"antrean",
						"method":"POST",
						"data":{"kodebooking":kodebooking}
					}
					// debugger
					var response = await medifirstService.postNonMessage('bridging/bpjs/tools', jsontask)
					if(response.data.metaData.code == 200){
						for (let xx = 0; xx < response.data.response.length; xx++) {
							const element = response.data.response[xx];
							if(element.taskid ==  taskid ){
								if(element.wakturs != moment(new Date(waktu)).format('DD-MM-YYYY HH:mm:ss' ) + ' WIB'){
									let wak = moment(element.wakturs.replace(' WIB',''), "DD/MM/YYYY HH:mm")._d
									console.log('waktu BPJS : '+wak)
									console.log('waktu RS : ' + new Date(waktu))
									console.log('waktu TASK : ' +taskid)
									waktu = wak.getTime()
									break
								}
							}
						}
					}
				}
	
                var json = {
                    "noregistrasifk": noregistrasifk,
                    "taskid": taskid,
                    "waktu": waktu,
                    "statuskirim": statuskirim
                }
                await medifirstService.postNonMessage('rawatjalan/save-monitoring-taskid', json).then(async function (e) {
					await loadData()
				})
            }
			const random = (min, max) => Math.floor(Math.random() * (max - min)) + min;
			async function checkTaksId(param,norec_pd,tgl) {
				var taksId = [
					{ Id: 1, waktu: random(0, 0) }, // 
                    { Id: 2, waktu: random(300000, 500000) }, // 
                    { Id: 3, waktu: random(600000, 900000) },  // 5 ke 6 range waktu 10 - 15 menit
                    { Id: 4, waktu: random(1320000, 2100000) }, // 4 ke 5 range waktu 7 - 20 menit
                    { Id: 5, waktu: random(3000000, 3300000) }, // 3 ke 4 range waktu 15 - 20 menit 
                    { Id: 6, waktu: random(3600000, 3900000) }, // 2 ke 3 range waktu 5 - 10 menit 
                    { Id: 7, waktu: random(7500000, 9300000) }, // 1 ke 2 range waktu 60 - 90 menit 
                ]
                for (let i = 0; i < taksId.length; i++) {
                    var element = taksId[i]
					var waktuS = tgl + element.waktu // new Date(tgl).getTime() - element.waktu
					if(param.length <10){
						if( element.Id >=3){
							var json = {
								"url": "antrean/updatewaktu",
								"jenis": "antrean",
								"method": "POST",
								"data": {
								"kodebooking": param,
								"taskid": element.Id,
								"waktu":waktuS
								}
							}
						
							await medifirstService.postNonMessage('bridging/bpjs/tools', json).then(async function (e) {
								if(e.data.metaData.code == 200) {
									await saveMonitoringTaksId(param,norec_pd, element.Id, waktuS, true)
								}

								medifirstService.postLoggingAntrol(
									`Antrol Task ID - Dengan No Registrasi ${param}`,
									'norec Pasien Daftar',
									param,
									`Update Antrean Kode ${param}`,
									`Request: ${JSON.stringify(json)}`,
									`Response: ${JSON.stringify(e.data)}`,
									`${element.Id}`
								);
								if(e.data.metaData.code == 208) {
									if(e.data.metaData.message == "TaskId="+element.Id+" sudah ada") {
										await saveMonitoringTaksId(param,norec_pd, element.Id, waktuS, true)
									}
								}
							})
						}
					}else{
						var json = {
							"url": "antrean/updatewaktu",
							"jenis": "antrean",
							"method": "POST",
							"data": {
							"kodebooking": param,
							"taskid": element.Id,
							"waktu":waktuS
							}
						}
					
						await medifirstService.postNonMessage('bridging/bpjs/tools', json).then(async function (e) {
							if(e.data.metaData.code == 200) {
								await saveMonitoringTaksId(param,norec_pd, element.Id, waktuS, true)
							}

							medifirstService.postLoggingAntrol(
								`Antrol Task ID - Dengan No Registrasi ${param}`,
								'norec Pasien Daftar',
								param,
								`Update Antrean Kode ${param}`,
								`Request: ${JSON.stringify(json)}`,
								`Response: ${JSON.stringify(e.data)}`,
								`${element.Id}`
							);
							
							if(e.data.metaData.code == 208) {
								if(e.data.metaData.message == "TaskId="+element.Id+" sudah ada") {
									await saveMonitoringTaksId(param,norec_pd, element.Id, waktuS, true)
								}
							}
						})
					}
                }
            }
			$scope.validasiData = function(){
				cekValidDataDiBPJS($scope.dataDaftarPasien._data )
				
			}
			// async function cekValidDataDiBPJS(dataSource){
				
			// 	$scope.isRouteLoading = true
			// 	for (let x = 0; x < dataSource.length; x++) {
			// 		const element = dataSource[x];
			// 		var jsontask={
			// 			"url":"antrean/getlisttask",
			// 			"jenis":"antrean",
			// 			"method":"POST",
			// 			"data":{
			// 				"kodebooking":element.noregistrasi
			// 			}
			// 		}
			// 		var response =  await medifirstService.postNonMessage('bridging/bpjs/tools', jsontask)
			// 		if(response.data.metaData.code == 200){
			// 			for (let xx = 0; xx < response.data.response.length; xx++) {
			// 				const element2 = response.data.response[xx];
			// 				var wakturs =  element2.wakturs.substr(0,16) +' '+element2.wakturs.substr(20,3)
			// 				var taskid = element2.taskid
			// 				if(element2.taskid ==  1  ){
			// 					var waktu =	element.taksid_1
			// 					if(wakturs!= moment(new Date(waktu )).format('DD-MM-YYYY HH:mm' ) + ' WIB'){
			// 						let wak = moment(element2.wakturs.replace(' WIB',''), "DD/MM/YYYY HH:mm")._d
			// 						console.log('waktu BPJS : ' + wak)
			// 						console.log('waktu RS : ' + new Date(waktu ))
			// 						console.log('waktu TASK : ' +element2.taskid)
			// 						waktu = wak.getTime()
							
			// 					}

			// 					var json = {
			// 						"noregistrasifk":element.noregistrasifk,
			// 						"taskid": taskid,
			// 						"waktu": waktu,
			// 						"statuskirim": true
			// 					}
			// 					await medifirstService.postNonMessage('rawatjalan/save-monitoring-taskid', json)
			// 				}
			// 				if(element2.taskid ==  2  ){
			// 					var waktu =	element.taksid_2
			// 					if(wakturs!= moment(new Date(waktu )).format('DD-MM-YYYY HH:mm' ) + ' WIB'){
			// 						let wak = moment(element2.wakturs.replace(' WIB',''), "DD/MM/YYYY HH:mm")._d
			// 						console.log('waktu BPJS : ' + wak)
			// 						console.log('waktu RS : ' + new Date(waktu ))
			// 						console.log('waktu TASK : ' +element2.taskid)
			// 						waktu = wak.getTime()
			// 					}
			// 					var json = {
			// 						"noregistrasifk": element.noregistrasifk,
			// 						"taskid": taskid,
			// 						"waktu": waktu,
			// 						"statuskirim": true
			// 					}
			// 					await medifirstService.postNonMessage('rawatjalan/save-monitoring-taskid', json)
			// 				}
			// 				if(element2.taskid ==  3 ){
			// 					var waktu =	element.taksid_3
			// 					if(wakturs!= moment(new Date(waktu )).format('DD-MM-YYYY HH:mm' ) + ' WIB'){
			// 						let wak = moment(element2.wakturs.replace(' WIB',''), "DD/MM/YYYY HH:mm")._d
			// 						console.log('waktu BPJS : ' + wak)
			// 						console.log('waktu RS : ' + new Date(waktu ))
			// 						console.log('waktu TASK : ' +element2.taskid)
			// 						waktu = wak.getTime()
									
			// 					}
			// 					var json = {
			// 						"noregistrasifk": element.noregistrasifk,
			// 						"taskid": taskid,
			// 						"waktu": waktu,
			// 						"statuskirim": true
			// 					}
			// 					await medifirstService.postNonMessage('rawatjalan/save-monitoring-taskid', json)
								
			// 				}
			// 				if(element2.taskid ==  4 ){
			// 					var waktu =	element.taksid_4
			// 					if(wakturs!= moment(new Date(waktu )).format('DD-MM-YYYY HH:mm' ) + ' WIB'){
			// 						let wak = moment(element2.wakturs.replace(' WIB',''), "DD/MM/YYYY HH:mm")._d
			// 						console.log('waktu BPJS : ' + wak)
			// 						console.log('waktu RS : ' + new Date(waktu ))
			// 						console.log('waktu TASK : ' +element2.taskid)
			// 						waktu = wak.getTime()
			// 					}
			// 					var json = {
			// 						"noregistrasifk": element.noregistrasifk,
			// 						"taskid": taskid,
			// 						"waktu": waktu,
			// 						"statuskirim": true
			// 					}
			// 					await medifirstService.postNonMessage('rawatjalan/save-monitoring-taskid', json)
			// 				}
			// 				if(element2.taskid ==  5 ){
			// 					var waktu =	element.taksid_5
			// 					if(wakturs!= moment(new Date(waktu )).format('DD-MM-YYYY HH:mm' ) + ' WIB'){
			// 						let wak = moment(element2.wakturs.replace(' WIB',''), "DD/MM/YYYY HH:mm")._d
			// 						console.log('waktu BPJS : ' + wak)
			// 						console.log('waktu RS : ' + new Date(waktu ))
			// 						console.log('waktu TASK : ' +element2.taskid)
			// 						waktu = wak.getTime()
			// 					}
			// 					var json = {
			// 						"noregistrasifk": element.noregistrasifk,
			// 						"taskid": taskid,
			// 						"waktu": waktu,
			// 						"statuskirim": true
			// 					}
			// 					await medifirstService.postNonMessage('rawatjalan/save-monitoring-taskid', json)

							
			// 				}
			// 				if(element2.taskid ==  6  && waktu !='-'){
			// 					var waktu =	element.taksid_6
			// 					if(wakturs!= moment(new Date(waktu )).format('DD-MM-YYYY HH:mm' ) + ' WIB'){
			// 						let wak = moment(element2.wakturs.replace(' WIB',''), "DD/MM/YYYY HH:mm")._d
			// 						console.log('waktu BPJS : ' + wak)
			// 						console.log('waktu RS : ' + new Date(waktu ))
			// 						console.log('waktu TASK : ' +element2.taskid)
			// 						waktu = wak.getTime()
			// 					}
			// 					var json = {
			// 						"noregistrasifk": element.noregistrasifk,
			// 						"taskid": taskid,
			// 						"waktu": waktu,
			// 						"statuskirim": true
			// 					}
			// 					await medifirstService.postNonMessage('rawatjalan/save-monitoring-taskid', json)
			// 				}
			// 				if(element2.taskid ==  7  && waktu !='-'){
			// 					var waktu =	element.taksid_7
			// 					if(wakturs!= moment(new Date(waktu )).format('DD-MM-YYYY HH:mm' ) + ' WIB'){
			// 						let wak = moment(element2.wakturs.replace(' WIB',''), "DD/MM/YYYY HH:mm")._d
			// 						console.log('waktu BPJS : ' + wak)
			// 						console.log('waktu RS : ' + new Date(waktu ))
			// 						console.log('waktu TASK : ' +element2.taskid)
			// 						waktu = wak.getTime()
			// 					}
			// 					var json = {
			// 						"noregistrasifk": element.noregistrasifk,
			// 						"taskid": taskid,
			// 						"waktu": waktu,
			// 						"statuskirim": true
			// 					}
			// 					await medifirstService.postNonMessage('rawatjalan/save-monitoring-taskid', json)
			// 				}
			// 			}
			// 		}
			// 	}
			// 	await loadData()
			// 	$scope.isRouteLoading = false
			// }
		
			// $scope.validasiData = function(){
			// 	cekValidDataDiBPJS($scope.dataDaftarPasien._data )
				
			// }
			async function cekValidDataDiBPJS(dataSource){
				var listWaktu = [
                    { Id: 1, waktu: random(7500000, 9300000) }, // 1 ke 2 range waktu 60 - 90 menit 
                    { Id: 2, waktu: random(3600000, 3900000) }, // 2 ke 3 range waktu 5 - 10 menit 
                    { Id: 3, waktu: random(3000000, 3300000) }, // 3 ke 4 range waktu 15 - 20 menit 
                    { Id: 4, waktu: random(1320000, 2100000) }, // 4 ke 5 range waktu 7 - 20 menit
                    { Id: 5, waktu: random(600000, 900000) },  // 5 ke 6 range waktu 10 - 15 menit
                    { Id: 6, waktu: random(300000, 500000) }, // 
					{ Id: 7, waktu: random(0, 0) }, // 
                ]
				$scope.isRouteLoading = true
				for (let x = 0; x < dataSource.length; x++) {
					const element = dataSource[x];
					var jsontask={
						"url":"antrean/getlisttask",
						"jenis":"antrean",
						"method":"POST",
						"data":{
							"kodebooking":element.noregistrasi
						}
					}
					var response =  await medifirstService.postNonMessage('bridging/bpjs/tools', jsontask)
					if(response.data.metaData.code == 200){
						var satu = false,dua =false ,tiga=false,empat = false,lima=false,enam=false,tujuh=false
						for (let xx = 0; xx < response.data.response.length; xx++) {
							const element2 = response.data.response[xx];
							var wakturs =  element2.wakturs.substr(0,16) +' '+element2.wakturs.substr(20,3)
							var taskid = element2.taskid
							if(element2.taskid ==  1  ){
								satu = true
								var waktu =	element.taksid_1
								if(wakturs!= moment(new Date(waktu )).format('DD-MM-YYYY HH:mm' ) + ' WIB'){
									let wak = moment(element2.wakturs.replace(' WIB',''), "DD/MM/YYYY HH:mm")._d
									console.log('waktu BPJS : ' + wak)
									console.log('waktu RS : ' + new Date(waktu ))
									console.log('waktu TASK : ' +element2.taskid)
									waktu = wak.getTime()
							
								}

								var json = {
									"noregistrasifk":element.noregistrasifk,
									"taskid": taskid,
									"waktu": (typeof waktu === 'string' || waktu instanceof String)? new Date(waktu).getTime() : waktu,
									"statuskirim": true
								}
								await medifirstService.postNonMessage('rawatjalan/save-monitoring-taskid', json)
							}
							if(element2.taskid ==  2  ){
								dua = true
								var waktu =	element.taksid_2
								if(wakturs!= moment(new Date(waktu )).format('DD-MM-YYYY HH:mm' ) + ' WIB'){
									let wak = moment(element2.wakturs.replace(' WIB',''), "DD/MM/YYYY HH:mm")._d
									console.log('waktu BPJS : ' + wak)
									console.log('waktu RS : ' + new Date(waktu ))
									console.log('waktu TASK : ' +element2.taskid)
									waktu = wak.getTime()
								}
								var json = {
									"noregistrasifk": element.noregistrasifk,
									"taskid": taskid,
									"waktu": (typeof waktu === 'string' || waktu instanceof String)? new Date(waktu).getTime() : waktu,
									"statuskirim": true
								}
								await medifirstService.postNonMessage('rawatjalan/save-monitoring-taskid', json)
							}
							if(element2.taskid ==  3 ){
								tiga = true
								var waktu =	element.taksid_3
								if(wakturs!= moment(new Date(waktu )).format('DD-MM-YYYY HH:mm' ) + ' WIB'){
									let wak = moment(element2.wakturs.replace(' WIB',''), "DD/MM/YYYY HH:mm")._d
									console.log('waktu BPJS : ' + wak)
									console.log('waktu RS : ' + new Date(waktu ))
									console.log('waktu TASK : ' +element2.taskid)
									waktu = wak.getTime()
									
								}
								var json = {
									"noregistrasifk": element.noregistrasifk,
									"taskid": taskid,
									"waktu": (typeof waktu === 'string' || waktu instanceof String)? new Date(waktu).getTime() : waktu,
									"statuskirim": true
								}
								await medifirstService.postNonMessage('rawatjalan/save-monitoring-taskid', json)
								
							}
							if(element2.taskid ==  4 ){
								empat = true
								var waktu =	element.taksid_4
								if(wakturs!= moment(new Date(waktu )).format('DD-MM-YYYY HH:mm' ) + ' WIB'){
									let wak = moment(element2.wakturs.replace(' WIB',''), "DD/MM/YYYY HH:mm")._d
									console.log('waktu BPJS : ' + wak)
									console.log('waktu RS : ' + new Date(waktu ))
									console.log('waktu TASK : ' +element2.taskid)
									waktu = wak.getTime()
								}
								var json = {
									"noregistrasifk": element.noregistrasifk,
									"taskid": taskid,
									"waktu": (typeof waktu === 'string' || waktu instanceof String)? new Date(waktu).getTime() : waktu,
									"statuskirim": true
								}
								await medifirstService.postNonMessage('rawatjalan/save-monitoring-taskid', json)
							}
							if(element2.taskid ==  5 ){
								lima = true
								var waktu =	element.taksid_5
								if(wakturs!= moment(new Date(waktu )).format('DD-MM-YYYY HH:mm' ) + ' WIB'){
									let wak = moment(element2.wakturs.replace(' WIB',''), "DD/MM/YYYY HH:mm")._d
									console.log('waktu BPJS : ' + wak)
									console.log('waktu RS : ' + new Date(waktu ))
									console.log('waktu TASK : ' +element2.taskid)
									waktu = wak.getTime()
								}
								var json = {
									"noregistrasifk": element.noregistrasifk,
									"taskid": taskid,
									"waktu": (typeof waktu === 'string' || waktu instanceof String)? new Date(waktu).getTime() : waktu,
									"statuskirim": true
								}
								await medifirstService.postNonMessage('rawatjalan/save-monitoring-taskid', json)

							
							}
							if(element2.taskid ==  6  && waktu !='-'){
								enam = true
								var waktu =	element.taksid_6
								if(wakturs!= moment(new Date(waktu )).format('DD-MM-YYYY HH:mm' ) + ' WIB'){
									let wak = moment(element2.wakturs.replace(' WIB',''), "DD/MM/YYYY HH:mm")._d
									console.log('waktu BPJS : ' + wak)
									console.log('waktu RS : ' + new Date(waktu ))
									console.log('waktu TASK : ' +element2.taskid)
									waktu = wak.getTime()
								}
								var json = {
									"noregistrasifk": element.noregistrasifk,
									"taskid": taskid,
									"waktu": (typeof waktu === 'string' || waktu instanceof String)? new Date(waktu).getTime() : waktu,
									"statuskirim": true
								}
								await medifirstService.postNonMessage('rawatjalan/save-monitoring-taskid', json)
							}
							if(element2.taskid ==  7  && waktu !='-'){
								tujuh = true
								var waktu =	element.taksid_7
								if(wakturs!= moment(new Date(waktu )).format('DD-MM-YYYY HH:mm' ) + ' WIB'){
									let wak = moment(element2.wakturs.replace(' WIB',''), "DD/MM/YYYY HH:mm")._d
									console.log('waktu BPJS : ' + wak)
									console.log('waktu RS : ' + new Date(waktu ))
									console.log('waktu TASK : ' +element2.taskid)
									waktu = wak.getTime()
								}
								var json = {
									"noregistrasifk": element.noregistrasifk,
									"taskid": taskid,
									"waktu": (typeof waktu === 'string' || waktu instanceof String)? new Date(waktu).getTime() : waktu,
									"statuskirim": true
								}
								await medifirstService.postNonMessage('rawatjalan/save-monitoring-taskid', json)
							}
						}
						
						if(satu == false){await kirimTaskUlang(element.noregistrasi,1,element.noregistrasifk,(element.taksid_1!='-'?new Date(element.taksid_1).getTime(): new Date().getTime()))}
						if(dua == false){await kirimTaskUlang(element.noregistrasi,2,element.noregistrasifk,(element.taksid_2!='-'?new Date(element.taksid_2).getTime():
						
						new Date(element.taksid_1).setTime(new Date(element.taksid_1).getTime() + 1080000)//3mnt
						))}
						if(tiga == false){await kirimTaskUlang(element.noregistrasi,3,element.noregistrasifk,(element.taksid_3!='-'?new Date(element.taksid_3).getTime()
						:new Date(element.taksid_2).setTime(new Date(element.taksid_2).getTime() + 1080000)//3mnt
						))}
						if(empat == false){
							await kirimTaskUlang(element.noregistrasi,4,element.noregistrasifk,(element.taksid_4!='-'?new Date(element.taksid_4).getTime():
							new Date(element.taksid_3).setTime(new Date(element.taksid_3).getTime() + 1080000)//3mnt
							))}
						if(lima == false){await kirimTaskUlang(element.noregistrasi,5,element.noregistrasifk,(element.taksid_5!='-'?new Date(element.taksid_5).getTime():
							new Date(element.taksid_4).setTime(new Date(element.taksid_4).getTime() + 1080000)//3mnt
						))}
						if(enam == false){await kirimTaskUlang(element.noregistrasi,6,element.noregistrasifk,(element.taksid_6!='-'?new Date(element.taksid_6).getTime():
							new Date(element.taksid_5).setTime(new Date(element.taksid_5).getTime() + 1080000)//3mnt
						))}
						if(tujuh == false){await kirimTaskUlang(element.noregistrasi,7,element.noregistrasifk,(element.taksid_7!='-'?new Date(element.taksid_7).getTime():
						new Date(element.taksid_6).setTime(new Date(element.taksid_6).getTime() + 1080000)//3mnt
						))}
					
					}else{

						var jsonz = {
							"noregistrasifk":element.noregistrasifk,
						}
						// await medifirstService.postNonMessage('rawatjalan/disabled-monitoring-taskid', jsonz)
					}
				}
				await loadData()
				$scope.isRouteLoading = false
			}
			async function kirimTaskUlang(param,taskid,noregistrasifk,waktu){
				var jsons = {
					"url": "antrean/updatewaktu",
					"jenis": "antrean",
					"method": "POST",
					"data": {
						"kodebooking": param,
						"taskid": taskid,
						"waktu":waktu
					}
				}
			
				await medifirstService.postNonMessage('bridging/bpjs/tools', jsons).then(async function (e) {
					if(e.data.metaData.code == 200) {
						var json = {
							"noregistrasifk": noregistrasifk,
							"taskid": taskid,
							"waktu": waktu,
							"statuskirim": true
						}
						await medifirstService.postNonMessage('rawatjalan/save-monitoring-taskid', json)
					}
					if(e.data.metaData.code == 208) {
						if(e.data.metaData.message == "TaskId="+taskid+" sudah ada") {
							var json = {
								"noregistrasifk": noregistrasifk,
								"taskid": taskid,
								"waktu": waktu,
								"statuskirim": true
							}
							await medifirstService.postNonMessage('rawatjalan/save-monitoring-taskid', json)
						}
					}
				})
			}


			// END ################
		}
	]);
});
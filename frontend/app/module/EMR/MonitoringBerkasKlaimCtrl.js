define(['initialize', 'Configuration'], function (initialize, config) {
    'use strict';
    var baseTransaksi = config.baseApiBackend; 
    initialize.controller('MonitoringBerkasKlaimCtrl', ['$state', '$scope', 'MedifirstService', 'CacheHelper', '$mdDialog',
        function ($state, $scope, medifirstService, cacheHelper, $mdDialog) {
            $scope.isRouteLoading = false;
			$scope.dataVOloaded = true;
            $scope.now = new Date();
			$scope.item = {};

            $scope.item.periodeAwal = moment($scope.now).format("YYYY-MM-DD") + " 00:00"
			$scope.item.periodeAkhir = moment($scope.now).format("YYYY-MM-DD") + " 23:59";

            const defaultcolumns = [
                { "field": "no", "title": "No", "width": "50px" },
                { "field": "tglregistrasi", "title": "Tgl Registrasi", "width": "150px" },
                { "field": "nocm", "title": "No RM", "width": "80px" },
                { "field": "noregistrasi", "title": "No Registrasi", "width": "100px" },
                { "field": "namapasien", "title": "Nama Pasien", "width": "200px" },
                { "field": "namaruangan", "title": "Ruangan Terakhir", "width": "200px" },
                { "field": "#", "title": "Bundle", "width": "150px", "template": "<span class='style-center'><button class=\"btn2\" id=\"bundleDokumen\" data-noreg=\"#: data.noregistrasi #\"><i class=\"fa fa-file-archive-o\"></i> Lihat</button></span>" },
            ]

            loadCombo()
            function loadCombo() {
                $scope.isRouteLoading = true;
                medifirstService.get("sysadmin/master/get-departemen").then(function (data) {
                    $scope.isRouteLoading = false;
                    $scope.listDepartemen = data.data;
                })
            }

            $scope.getIsiComboRuangan = function (e) {
                if(e == undefined) return;

                $scope.listRuangan = []
                $scope.isRouteLoading = true;
                medifirstService.get(`sysadmin/master/get-ruanganbyidDepart/${e.id}`).then(function (data) {
                    $scope.isRouteLoading = false;
                    $scope.listRuangan = data.data
                })
			}

            $scope.SearchData = function () {
                var tglawal = moment($scope.item.periodeAwal).format("YYYY-MM-DD HH:mm")
                var tglakhir = moment($scope.item.periodeAkhir).format("YYYY-MM-DD HH:mm")

                var departId = ""
                if(!$scope.item.instalasi) {
                    toastr.error("Harap pilih instalasi terlebih dahulu !")
                    return
                } else { departId = $scope.item.instalasi.id }

                var ruanganId = ""
                if($scope.item.ruangan) { ruanganId = "&ruanganId=" + $scope.item.ruangan.id }
                var noReg = ""
                if($scope.item.noReg) { noReg = "&noregistrasi=" + $scope.item.noReg }
                var noRm = ""
                if($scope.item.noRm) { noRm = "&nocm=" + $scope.item.noRm }
                var nama = ""
                if($scope.item.nama) { nama = "&namapasien=" + $scope.item.nama }
                
                $scope.isRouteLoading = true;
                medifirstService.get("registrasi/dokumenrm/get-dokumen-monitoring-klaim?"
                + "tglawal=" + tglawal
                + "&tglakhir=" + tglakhir
                + "&departId=" + departId + ruanganId + noReg + noRm + nama).then(function (data) {
                    $scope.isRouteLoading = false;
                    var dataMaster = data.data.master
                    if(dataMaster.length == 0) {
                        toastr.error("Master data dokumen klaim belum disetting!");
                        return
                    }
                    
                    var dataRow = data.data.data
                    let coldimanis = defaultcolumns.slice()
                    for (let h = 0; h < dataRow.length; h++) {
                        dataRow[h].no = h + 1;
                    }
                    for (let i = 0; i < dataMaster.length; i++) {
                        const element = dataMaster[i];
                        var col = {
                            "field": element.kodeexternal,
                            "title": element.dokumen,
                            "width": "150px",
                            "template": "<span class='style-center'># if("+ element.kodeexternal +"==null) {# <div class=\"upload-btn-wrapper\"><button class=\"btn\"><i class=\"fa fa-upload\"></i> Upload</button> <input type=\"file\" id=\"filePasien\" accept=\"application/pdf\" data-id=\""+ element.id +"\" data-namafile=\""+ element.dokumen +"\" data-norec=\"#: data.norec #\" /></div> # } else {# <a href=\"javascript:void(0);\" id=\"LihatDokumenKlaim\" data-noreg=\"#: data.noregistrasi #\" data-namafile=\"#: data."+ element.kodeexternal + "#\" data-documentklaimfk=\""+ element.id +"\"><i class=\"fa fa-file-pdf-o hitam\" aria-hidden=\"true\"></i></a> #} #</span>",
                        }
                        coldimanis.push(col);
                    }
                    createGrid(dataRow, coldimanis)
                })
            }

            function createGrid (data, columns) {
                $('#kGrid').kendoGrid('destroy').empty();
                $("#kGrid").kendoGrid({
                    dataSource: {
                        data: data,
                        pageSize: 20
                    },
                    pageable: true,
                    scrollable: true,
                    selectable: "single",
                    columns: columns
                }).data("kendoGrid");
            }

            $scope.formatTanggal = function (tanggal) {
				if (tanggal == 'null')
					return '-'
				else
					return moment(tanggal).format('DD-MMM-YYYY HH:mm');
			}

            $scope.columnDaftarPasien = {
                selectable: 'row',
                pageable: true,
                columns: defaultcolumns
            };

            $('body ').on('click','#bundleDokumen',function(e){
                var noregistrasi = $(this).data("noreg");
                var strBACKEND = baseTransaksi.replace('service/medifirst2000/', '')
                window.open(strBACKEND + "service/storage/bundledokumenklaim?noregistrasi="+ noregistrasi);
            })
            
            $('body ').on('click','#LihatDokumenKlaim',function(e){
                var noregistrasi = $(this).data("noreg");
                var namafile = $(this).data("namafile");
                var documentklaimfk = $(this).data("documentklaimfk");

                var confirm = $mdDialog.confirm()
                    .title('Peringatan')
                    .textContent('Harap pilih aksi yang diinginkan !')
                    .ariaLabel('Lucky day')
                    .cancel('Hapus Dok.')
                    .ok('Lihat Dok.')
                $mdDialog.show(confirm).then(function () {
                    var strBACKEND = baseTransaksi.replace('service/medifirst2000/', '')
                    window.open(strBACKEND + "service/storage/dokumenklaim?noregistrasi="+ noregistrasi + "&filename=" + namafile);
                }, function() {
                    var jsondel = {
                        "noregistrasi": noregistrasi,
                        "documentklaimfk": documentklaimfk,
                    }
                    $scope.isRouteLoading = true;
                    medifirstService.post('registrasi/dokumenrm/delete-dokumen-monitoring-klaim', jsondel).then(function (data) {
                        $scope.isRouteLoading = false;
                        medifirstService.postLogging('Dokumen Klaim', 'noregistrasi pasiendaftar', noregistrasi, 
                        'Hapus Dokumen Klaim  pada No Registrasi ' + noregistrasi + ' dengan id dokumen klaim ' + documentklaimfk).then(function (res) {
                        })
                        $scope.SearchData();
                    })
                })

                
            })

            $('body ').on('change','#filePasien',function(e){
                var id = $(this).data("id");
                var norec = $(this).data("norec");
                var namafile = $(this).data("namafile");

                if (e.target.files[0]) {
                    $scope.isRouteLoading = true;
                    const url = baseTransaksi + 'registrasi/dokumenrm/post-dokumen-monitoring-klaim'
                    const formData = new FormData()
				    const file = e.target.files[0];
                    if(file.type != "application/pdf") {
                        toastr.error('File yang diizinkan dalam bentuk format PDF.')
                        return;
                    }

                    formData.append('fileBerkas', file)
                    formData.append('noregistrasifk', norec)
                    formData.append('documentklaimfk', id)
                    formData.append('namafile', namafile)
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
                    })
                    .then(response => response.json())
                    .then(result => {
                        $scope.isRouteLoading = false;
                        medifirstService.postLogging('Dokumen Klaim', 'Norec monitoringdokklaim_t', result.dokumen.norec, 
                        'Upload Dokumen Klaim '+ namafile +' pada norec pasiendaftar_t ' + norec).then(function (res) {})
                        toastr.success(" Berkas berhasil.");
                        $scope.SearchData();
                    })
                    .catch((error) => {
                        $scope.isRouteLoading = false;
                        toastr.error("Simpan Berkas gagal.");
                    });
                }
            });
        }
    ]);
});
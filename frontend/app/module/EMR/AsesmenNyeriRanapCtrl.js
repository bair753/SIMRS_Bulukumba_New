define(['initialize', 'Configuration'], function (initialize, config) {
    'use strict';
    initialize.controller('AsesmenNyeriRanapCtrl', ['$q', '$rootScope', '$scope', 'ModelItem', '$state', 'CacheHelper', 'DateHelper', 'MedifirstService',
        function ($q, $rootScope, $scope, ModelItem, $state, cacheHelper, dateHelper, medifirstService) {

            var paramsIndex = $state.params.index ? parseInt($state.params.index) : null
            $scope.noCM = $state.params.noCM;
            $scope.tombolSimpanVis = true
            $scope.noRecPap = cacheHelper.get('noRecPap');
            $scope.totalSkor = 0
            $scope.totalSkor2 = 0
            $scope.SkorSkalaFlacc = [];
            $scope.SkorJatuhAnak = [];
            $scope.cc = {}
            var nomorEMR = '-'
            $scope.cc.emrfk = 290102;
            var dataLoad = []
            var pegawaiInputDetail= ''
            $scope.isCetak = false
            $scope.isCetakV = true
            var norecEMR = ''
            var cacheNomorEMR = cacheHelper.get('cacheNomorEMR');
            var cacheNoREC = cacheHelper.get('cacheNOREC_EMR');
            if(cacheNoREC!= undefined){
                norecEMR = cacheNomorEMR[1]
            }
            if (cacheNomorEMR != undefined) {
                nomorEMR = cacheNomorEMR[0]
                norecEMR = cacheNomorEMR[1]
                $scope.cc.norec_emr = nomorEMR
            }
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
            $scope.cetakPdf = function () {
                if (norecEMR == '') return
                var client = new HttpClient();
                client.get('http://127.0.0.1:1237/printvb/e-rekammedis?cetak-emr-asesmen-awal-keperawatan-igd&id=' + $scope.cc.nocm + '&emr=' + norecEMR + '&view=true', function (response) {
                    // do something with response
                });
            }
            $scope.cetakBlade = function () {
                if (norecEMR == '') return

                var local = JSON.parse(localStorage.getItem('profile'));
                var nama = medifirstService.getPegawaiLogin().namalengkap;
                console.log(config.baseApiBackend);
                window.open(config.baseApiBackend + 'report/cetak-asesmen-awal-medis-ranap?nocm='
                    + $scope.cc.nocm + '&norec_apd=' + $scope.cc.norec + '&emr=' + norecEMR
                    + '&emrfk=' + $scope.cc.emrfk
                    + '&kdprofile=' + local.id
                    + '&nama=' + nama, '_blank');
            }

            medifirstService.getPart('emr/get-datacombo-part-dokter', true, true, 20).then(function (data) {
                $scope.listDokter = data
            })

            medifirstService.getPart('emr/get-datacombo-part-pegawai', true, true, 20).then(function (data) {
                $scope.listPegawai = data
            })

            medifirstService.getPart('emr/get-datacombo-part-ruangan-pelayanan', true, true, 20).then(function (data) {
                $scope.listRuangan = data
            })

            medifirstService.getPart('emr/get-datacombo-part-kelas', true, true, 20).then(function (data) {
                $scope.listKelas = data
            })

            medifirstService.getPart("sysadmin/general/get-datacombo-icd10", true, true, 10).then(function (data) {
                $scope.listDiagnosa = data;
            });

            medifirstService.getPart("sysadmin/general/get-datacombo-icd10-secondary", true, true, 10).then(function (data) {
                $scope.listDiagnosaSecondary = data;
            });

            medifirstService.getPart("emr/get-datacombo-part-bulan", true, true, 10).then(function (data) {
                $scope.listBulan = data;
            });

            var cacheNomorEMR = cacheHelper.get('cacheNomorEMR');
            if (cacheNomorEMR != undefined) {
                nomorEMR = cacheNomorEMR[0]
                $scope.cc.norec_emr = nomorEMR
            }

            $scope.listBioPsiko = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 422219, "nama": "", "caption": "Masalah psikologi", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 422220, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422221, "nama": "Ya, Sebutkan", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422222, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" },
                        { "id": 422223, "nama": "", "caption": "Masalah sosial", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 422224, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422225, "nama": "Ya, Sebutkan", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422226, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" },
                        { "id": 422227, "nama": "", "caption": "Masalah cultura/bahasa", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 422228, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422229, "nama": "Ya, Sebutkan", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422230, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" },
                        { "id": 422231, "nama": "", "caption": "Masalah spiritual", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 422232, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422233, "nama": "Ya, Sebutkan", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422234, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listEkonomi = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 422235, "nama": "PNS", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422236, "nama": "TNI/POLRI", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422237, "nama": "Pegawai Swasta", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422238, "nama": "Wiraswasta", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422239, "nama": "Petani/Nelayan", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422240, "nama": "Lain-lain", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422241, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listRiwayatKesehatanPasien = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 422242, "nama": "", "caption": "Riwayat Penyakit Sebelumnya", "type": "textarea", "dataList": "", "satuan": "" },
                        { "id": 422243, "nama": "", "caption": "", "type": "hr", "dataList": "", "satuan": "" },
                        { "id": 422244, "nama": "", "caption": "Riwayat Penyakit Sekarang", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listAlergi = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 422245, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422246, "nama": "Ya, Sebutkan :", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422247, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listRiwayatPenggunaanObat = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 422248, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422249, "nama": "Ya, sebutkan :", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422250, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listAsesmenNyeri = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 422251, "nama": "Tidak Nyeri", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422252, "nama": "Nyeri, menggunakan metode :", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422253, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listRisikoJatuh = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 422254, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422255, "nama": "Ya, menggunakan metode :", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422256, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listRisikoNutrional = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 422258, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422259, "nama": "Ya, Sebutkan :", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422260, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listRencanaAsuhan = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 422263, "nama": "", "caption": "Anjuran Pemeriksaan Penunjang", "type": "textarea", "dataList": "", "satuan": "" },
                        { "id": 422264, "nama": "", "caption": "", "type": "hr", "dataList": "", "satuan": "" },
                        { "id": 422265, "nama": "", "caption": "Terapi Tindakan", "type": "textarea", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listKebutuhanEdukasi = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 422267, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422268, "nama": "Ya, sebutkan :", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 422269, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            var chacePeriode = cacheHelper.get('cacheRekamMedis');
            if (chacePeriode != undefined) {
                $scope.cc.nocm = chacePeriode[0]
                $scope.cc.namapasien = chacePeriode[1]
                $scope.cc.jeniskelamin = chacePeriode[2]
                $scope.cc.noregistrasi = chacePeriode[3]
                $scope.cc.umur = chacePeriode[4]
                $scope.cc.kelompokpasien = chacePeriode[5]
                $scope.cc.tglregistrasi = chacePeriode[6]
                $scope.cc.norec = chacePeriode[7]
                $scope.cc.norec_pd = chacePeriode[8]
                $scope.cc.objectkelasfk = chacePeriode[9]
                $scope.cc.namakelas = chacePeriode[10]
                $scope.cc.objectruanganfk = chacePeriode[11]
                $scope.cc.namaruangan = chacePeriode[12]
                $scope.cc.DataNoregis = chacePeriode[12]
                $scope.cc.dokterdpjp = chacePeriode[16]
                $scope.cc.iddpjp = chacePeriode[17]
                if (nomorEMR == '-') {
                    $scope.cc.norec_emr = '-'
                } else {
                    $scope.cc.norec_emr = nomorEMR
                }
            }
            medifirstService.get("emr/get-rekam-medis-dynamic?emrid=" + $scope.cc.emrfk).then(function (e) {

                var datas = e.data.kolom4

                var detail = []
                var arrayShiftJaga= []
                var arrayShiftJaga2 = []
                var arrayShiftJaga3= []
                var sama = false
                for (let i = 0; i < datas.length; i++) {
                    const element = datas[i];
                    sama = false

                    // ARRAY GEJALA
                    if (element.kodeexternal == 'shiftjaga2') {
                        for (let z = 0; z < arrayShiftJaga.length; z++) {
                            const element2 = arrayShiftJaga[z];
                            if (element2.namaexternal == element.namaexternal) {
                                detail.push(element)
                                element2.details = detail
                                sama = true
                            }
                        }
                        if (sama == false) {
                            var datax = {
                                caption: element.caption,
                                cbotable: element.cbotable,
                                child: [],
                                emrfk: element.emrfk,
                                headfk: element.headfk,
                                id: element.id,
                                kdprofile: element.kdprofile,
                                kodeexternal: element.kodeexternal,
                                namaemr: element.namaemr,
                                namaexternal: element.namaexternal,
                                nourut: element.nourut,
                                reportdisplay: element.reportdisplay,
                                satuan: element.satuan,
                                statusenabled: element.statusenabled,
                                style: element.style,
                                type: element.type,

                            }
                            arrayShiftJaga.push(datax)
                        }
                    }
                }
                 // ARRAY GEJALA
                var gejalaKosongKeun = []
                for (let k = 0; k < arrayShiftJaga.length; k++) {
                    const element = arrayShiftJaga[k];
                    for (let l = 0; l < datas.length; l++) {
                        const element2 = datas[l];
                        if (element2.namaexternal == element.namaexternal) {
                            gejalaKosongKeun.push(element2)
                            element.details = gejalaKosongKeun
                        } else {
                            gejalaKosongKeun = []
                        }
                    }
                }
                $scope.listData1 = arrayShiftJaga
            })
            var chekedd = false
            $scope.totalSkorAses =0
            $scope.totalSkorAses2 =0
            $scope.totalSkor2=0

            medifirstService.get("emr/get-emr-transaksi-detail?noemr=" + nomorEMR + "&emrfk=" + $scope.cc.emrfk, true).then(function (dat) {
                $scope.item.obj = []
                $scope.item.obj2 = []
                $scope.item.obj[422271] = $scope.now
                dataLoad = dat.data.data
                console.log($scope.item.obj);

                // medifirstService.get("emr/get-vital-sign?noregistrasi=" + $scope.cc.noregistrasi + "&objectidawal=4241&objectidakhir=4246&idemr=147", true).then(function (datas) {
                //     $scope.item.obj[422204] = datas.data.data[1].value; // Tekanan Darah
                //     $scope.item.obj[422205] = datas.data.data[5].value; // Nadi
                //     $scope.item.obj[422206] = datas.data.data[4].value; // Suhu
                //     $scope.item.obj[422207] = datas.data.data[6].value; // Napas
                // })

                var noregistrasifk = $state.params.noRec;
                var status = "t";
                medifirstService.get("emr/get-antrian-pasien-norec/" + noregistrasifk).then(function (e) {
                    var antrianPasien = e.data.result;
                    $scope.item.obj[422202] = new Date(moment(antrianPasien.tglregistrasi).format('YYYY-MM-DD HH:mm'));
                    if (antrianPasien.iddpjp != null && antrianPasien.dokterdpjp != null) {
                        $scope.item.obj[421150] = {
                            value: antrianPasien.iddpjp,
                            text: antrianPasien.dokterdpjp
                        }
                    }
                })

                for (var i = 0; i <= dataLoad.length - 1; i++) {
                    if (parseFloat($scope.cc.emrfk) == dataLoad[i].emrfk && paramsIndex == dataLoad[i].index) {

                        if (dataLoad[i].type == "textbox") {
                            $scope.item.obj[dataLoad[i].emrdfk] = dataLoad[i].value
                        }
                        if (dataLoad[i].type == "checkbox") {
                            chekedd = false
                            if (dataLoad[i].value == '1') {
                                chekedd = true
                            }
                            $scope.item.obj[dataLoad[i].emrdfk] = chekedd
                        }

                        if (dataLoad[i].type == "datetime") {
                            $scope.item.obj[dataLoad[i].emrdfk] = new Date(dataLoad[i].value)
                        }
                        if (dataLoad[i].type == "time") {
                            $scope.item.obj[dataLoad[i].emrdfk] = new Date(dataLoad[i].value)
                        }
                        if (dataLoad[i].type == "date") {
                            $scope.item.obj[dataLoad[i].emrdfk] = new Date(dataLoad[i].value)
                        }

                        if (dataLoad[i].type == "checkboxtextbox") {
                            $scope.item.obj[dataLoad[i].emrdfk] = dataLoad[i].value
                            $scope.item.obj2[dataLoad[i].emrdfk] = true
                        }
                        if (dataLoad[i].type == "textarea") {
                            $scope.item.obj[dataLoad[i].emrdfk] = dataLoad[i].value
                        }
                        if (dataLoad[i].type == "combobox") {
                            var str = dataLoad[i].value
                            if(str != undefined){
                                var res = str.split("~");
                                // $scope.item.objcbo[dataLoad[i].emrdfk]= {value:res[0],text:res[1]}
                                $scope.item.obj[dataLoad[i].emrdfk] = { value: res[0], text: res[1] }        
                            }

                        }
                        pegawaiInputDetail = dataLoad[i].pegawaifk
                    }

                }
                //  if( $scope.cc.norec_emr !='-' && pegawaiInputDetail !='' && pegawaiInputDetail !=null){
                //     if(pegawaiInputDetail != medifirstService.getPegawaiLogin().id){
                //         $scope.allDisabled =true
                //         // toastr.warning('Hanya Bisa melihat data','Peringatan')
                //         // return
                //     }
                // }
            })

            $scope.kembali = function () {
                $rootScope.showRiwayat()
            }

            $scope.Save = function () {
                //  if( $scope.cc.norec_emr !='-' && pegawaiInputDetail !='' && pegawaiInputDetail !=null){
                //     if(pegawaiInputDetail != medifirstService.getPegawaiLogin().id){
                //         toastr.warning('Hanya Bisa melihat data','Peringatan')
                //         return
                //     }
                // }

                var arrobj = Object.keys($scope.item.obj)
                var arrSave = []
                for (var i = arrobj.length - 1; i >= 0; i--) {
                    if ($scope.item.obj[parseInt(arrobj[i])] instanceof Date)
                        $scope.item.obj[parseInt(arrobj[i])] = moment($scope.item.obj[parseInt(arrobj[i])]).format('YYYY-MM-DD HH:mm')
                    arrSave.push({ id: arrobj[i], values: $scope.item.obj[parseInt(arrobj[i])] })
                }
                $scope.cc.jenisemr = 'asesmen'
                $scope.cc.index = $state.params.index;
                var jsonSave = {
                    head: $scope.cc,
                    data: arrSave
                }
                medifirstService.post('emr/save-emr-dinamis', jsonSave).then(function (e) {
                    medifirstService.postLogging('EMR', 'norec emrpasien_t', e.data.data.norec,
                    'Asesmen Nyeri Rawat Inap '+ ' dengan No EMR - ' + e.data.data.noemr + ' pada No Registrasi '
                    + $scope.cc.noregistrasi).then(function (res) {
                    })
                    $rootScope.loadRiwayat()
                    var arrStr = {
                        0: e.data.data.noemr
                    }
                    cacheHelper.set('cacheNomorEMR', arrStr);

                });
            }

        }
    ]);
    initialize.directive('disableContents', function() {
        return {
            compile: function(tElem, tAttrs) {
                var inputs = tElem.find('input');
                var inputsArea = tElem.find('textarea');
                inputs.attr('ng-disabled', tAttrs['disableContents']);
                inputsArea.attr('ng-disabled', tAttrs['disableContents']);
                for (var i = 0; i < inputs.length; i++) {
                }
            }
        }
    });
});
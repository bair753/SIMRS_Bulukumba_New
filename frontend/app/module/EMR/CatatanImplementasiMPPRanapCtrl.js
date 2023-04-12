define(['initialize'], function (initialize) {
    'use strict';
    initialize.controller('CatatanImplementasiMPPRanapCtrl', ['$q', '$rootScope', '$scope', 'ModelItem', '$state', 'CacheHelper', 'DateHelper', 'MedifirstService',
        function ($q, $rootScope, $scope, ModelItem, $state, cacheHelper, dateHelper, medifirstService) {

            var paramsIndex = $state.params.index ? parseInt($state.params.index) : null
            $scope.noCM = $state.params.noCM;
            $scope.tombolSimpanVis = true
            $scope.noRecPap = cacheHelper.get('noRecPap');
            $scope.totalSkor = 0
            $scope.totalSkor2 = 0
            $scope.cc = {}
            var nomorEMR = '-'
            $scope.cc.emrfk = 290105;
            var dataLoad = []
            $scope.isCetak = true
            var norecEMR = ''
            var cacheNomorEMR = cacheHelper.get('cacheNomorEMR');
            var cacheNoREC = cacheHelper.get('cacheNOREC_EMR');
            if (cacheNoREC != undefined) {
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
                client.get('http://127.0.0.1:1237/printvb/e-rekammedis?cetak-emr-grafik-tanda-vital&id=' + $scope.cc.nocm + '&emr=' + norecEMR + '&view=true', function (response) {
                    // do something with response
                });
            }

            medifirstService.getPart('emr/get-datacombo-part-pegawai', true, true, 20).then(function (data) {
                $scope.listPegawai = data
            })
            medifirstService.getPart('emr/get-datacombo-part-kelas', true, true, 20).then(function (data) {
                $scope.listKelas = data

            })
            medifirstService.getPart('emr/get-datacombo-part-ruangan-pelayanan', true, true, 20).then(function (data) {
                $scope.listRuangan = data
            })

            $scope.listTglTable1 = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 428100, "type": "datetime" },
                        { "id": 428101, "type": "datetime" },
                        { "id": 428102, "type": "datetime" },
                        { "id": 428103, "type": "datetime" },
                        { "id": 428104, "type": "datetime" },
                        { "id": 428105, "type": "datetime" }
                    ]
                }
            ];

            $scope.listTotalSkor = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 428190, "type": "textbox" },
                        { "id": 428191, "type": "textbox" },
                        { "id": 428192, "type": "textbox" },
                        { "id": 428193, "type": "textbox" },
                        { "id": 428194, "type": "textbox" },
                        { "id": 428195, "type": "textbox" }
                    ]
                }
            ];

            $scope.listTglTable2 = [
                {
                    "id": 428200, "type": "datetime"
                },
                {
                    "id": 428201, "type": "datetime"
                },
                {
                    "id": 428202, "type": "datetime"
                },
                {
                    "id": 428203, "type": "datetime"
                },
                {
                    "id": 428204, "type": "datetime"
                },
                {
                    "id": 428205, "type": "datetime"
                }
            ];

            $scope.listRisikoRendahSedang = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 428206, "caption": "Melakukan orientasi ruangan pada pasien", "type": "label" },
                        { "id": 428207, "caption": "", "type": "checkbox" },
                        { "id": 428208, "caption": "", "type": "checkbox" },
                        { "id": 428209, "caption": "", "type": "checkbox" },
                        { "id": 428210, "caption": "", "type": "checkbox" },
                        { "id": 428211, "caption": "", "type": "checkbox" },
                        { "id": 428212, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 428213, "caption": "Keselamatan lingkungan: hindari ruangan yang kacau balau, dekatkan bel dan telepon, biarkan pintu terbuka, gunakan lampu malam hari serta pagar tempat tidur", "type": "label" },
                        { "id": 428214, "caption": "", "type": "checkbox" },
                        { "id": 428215, "caption": "", "type": "checkbox" },
                        { "id": 428216, "caption": "", "type": "checkbox" },
                        { "id": 428217, "caption": "", "type": "checkbox" },
                        { "id": 428218, "caption": "", "type": "checkbox" },
                        { "id": 428219, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 428220, "caption": "Pastikan roda tempat tidur tidak terkunci", "type": "label" },
                        { "id": 428221, "caption": "", "type": "checkbox" },
                        { "id": 428222, "caption": "", "type": "checkbox" },
                        { "id": 428223, "caption": "", "type": "checkbox" },
                        { "id": 428224, "caption": "", "type": "checkbox" },
                        { "id": 428225, "caption": "", "type": "checkbox" },
                        { "id": 428226, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 4,
                    "detail": [
                        { "id": 428227, "caption": "Posisikan tempat tidur pada posisi terendah", "type": "label" },
                        { "id": 428228, "caption": "", "type": "checkbox" },
                        { "id": 428229, "caption": "", "type": "checkbox" },
                        { "id": 428230, "caption": "", "type": "checkbox" },
                        { "id": 428231, "caption": "", "type": "checkbox" },
                        { "id": 428232, "caption": "", "type": "checkbox" },
                        { "id": 428233, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 5,
                    "detail": [
                        { "id": 428234, "caption": "Pagar pengaman tempat tidur dinaikkan", "type": "label" },
                        { "id": 428235, "caption": "", "type": "checkbox" },
                        { "id": 428236, "caption": "", "type": "checkbox" },
                        { "id": 428237, "caption": "", "type": "checkbox" },
                        { "id": 428238, "caption": "", "type": "checkbox" },
                        { "id": 428239, "caption": "", "type": "checkbox" },
                        { "id": 428240, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 6,
                    "detail": [
                        { "id": 428241, "caption": "Monitor kebutuhan pasien secara berkala (minimal 4 jam) tawarkan kebelakang (kamar kecil secara teratur)", "type": "label" },
                        { "id": 428242, "caption": "", "type": "checkbox" },
                        { "id": 428243, "caption": "", "type": "checkbox" },
                        { "id": 428244, "caption": "", "type": "checkbox" },
                        { "id": 428245, "caption": "", "type": "checkbox" },
                        { "id": 428246, "caption": "", "type": "checkbox" },
                        { "id": 428247, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 7,
                    "detail": [
                        { "id": 428248, "caption": "Memberikan bantuan saat pasien ambulansi", "type": "label" },
                        { "id": 428249, "caption": "", "type": "checkbox" },
                        { "id": 428250, "caption": "", "type": "checkbox" },
                        { "id": 428251, "caption": "", "type": "checkbox" },
                        { "id": 428252, "caption": "", "type": "checkbox" },
                        { "id": 428253, "caption": "", "type": "checkbox" },
                        { "id": 428254, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 8,
                    "detail": [
                        { "id": 428255, "caption": "Anjurkan pasien menggunakan kaus kaki atau sepatu yang tidak licin", "type": "label" },
                        { "id": 428256, "caption": "", "type": "checkbox" },
                        { "id": 428257, "caption": "", "type": "checkbox" },
                        { "id": 428258, "caption": "", "type": "checkbox" },
                        { "id": 428259, "caption": "", "type": "checkbox" },
                        { "id": 428260, "caption": "", "type": "checkbox" },
                        { "id": 428261, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 9,
                    "detail": [
                        { "id": 428262, "caption": "Meletakkan alat bantu pasien dalam jangkauan (kacamata, HP, tongkat dan penyannga)", "type": "label" },
                        { "id": 428263, "caption": "", "type": "checkbox" },
                        { "id": 428264, "caption": "", "type": "checkbox" },
                        { "id": 428265, "caption": "", "type": "checkbox" },
                        { "id": 428266, "caption": "", "type": "checkbox" },
                        { "id": 428267, "caption": "", "type": "checkbox" },
                        { "id": 428268, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 10,
                    "detail": [
                        { "id": 428269, "caption": "Gunakan alat bantu jalan (walker, handrail)", "type": "label" },
                        { "id": 428270, "caption": "", "type": "checkbox" },
                        { "id": 428271, "caption": "", "type": "checkbox" },
                        { "id": 428272, "caption": "", "type": "checkbox" },
                        { "id": 428273, "caption": "", "type": "checkbox" },
                        { "id": 428274, "caption": "", "type": "checkbox" },
                        { "id": 428275, "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listNamaPerawat = [
                {
                    "id": 428276, "type": "combobox"
                },
                {
                    "id": 428277, "type": "combobox"
                },
                {
                    "id": 428278, "type": "combobox"
                },
                {
                    "id": 428279, "type": "combobox"
                },
                {
                    "id": 428280, "type": "combobox"
                },
                {
                    "id": 428281, "type": "combobox"
                }
            ];

            $scope.listTglTable3 = [
                {
                    "id": 428282, "type": "datetime"
                },
                {
                    "id": 428283, "type": "datetime"
                },
                {
                    "id": 428284, "type": "datetime"
                },
                {
                    "id": 428285, "type": "datetime"
                },
                {
                    "id": 428286, "type": "datetime"
                },
                {
                    "id": 428287, "type": "datetime"
                }
            ];  

            $scope.listRisikoTinggi = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 428288, "caption": "Pakaikan stiker risiko jatuh berwarna kuning pada gelang pasien", "type": "label" },
                        { "id": 428289, "caption": "", "type": "checkbox" },
                        { "id": 428290, "caption": "", "type": "checkbox" },
                        { "id": 428291, "caption": "", "type": "checkbox" },
                        { "id": 428292, "caption": "", "type": "checkbox" },
                        { "id": 428293, "caption": "", "type": "checkbox" },
                        { "id": 428294, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 428295, "caption": "Pasangkan pada peringatan pasien jatuh diatas tempat tidur pasien / di dinding dekat pasien / digantung dekat pasien", "type": "label" },
                        { "id": 428296, "caption": "", "type": "checkbox" },
                        { "id": 428297, "caption": "", "type": "checkbox" },
                        { "id": 428298, "caption": "", "type": "checkbox" },
                        { "id": 428299, "caption": "", "type": "checkbox" },
                        { "id": 428300, "caption": "", "type": "checkbox" },
                        { "id": 428301, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 428302, "caption": "Pasien ditempelkan didekat nurse station", "type": "label" },
                        { "id": 428303, "caption": "", "type": "checkbox" },
                        { "id": 428304, "caption": "", "type": "checkbox" },
                        { "id": 428305, "caption": "", "type": "checkbox" },
                        { "id": 428306, "caption": "", "type": "checkbox" },
                        { "id": 428307, "caption": "", "type": "checkbox" },
                        { "id": 428308, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 4,
                    "detail": [
                        { "id": 428309, "caption": "Memasangkan haindrail tempat tidur bila meninggalkan pasien seorang diri", "type": "label" },
                        { "id": 428310, "caption": "", "type": "checkbox" },
                        { "id": 428311, "caption": "", "type": "checkbox" },
                        { "id": 428312, "caption": "", "type": "checkbox" },
                        { "id": 428313, "caption": "", "type": "checkbox" },
                        { "id": 428314, "caption": "", "type": "checkbox" },
                        { "id": 428315, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 5,
                    "detail": [
                        { "id": 428316, "caption": "Mendampingi pasien saat ke kamar mandi, jangan tinggalkan sendiri saat ke kamar mandi", "type": "label" },
                        { "id": 428317, "caption": "", "type": "checkbox" },
                        { "id": 428318, "caption": "", "type": "checkbox" },
                        { "id": 428319, "caption": "", "type": "checkbox" },
                        { "id": 428320, "caption": "", "type": "checkbox" },
                        { "id": 428321, "caption": "", "type": "checkbox" },
                        { "id": 428322, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 6,
                    "detail": [
                        { "id": 428323, "caption": "Monitor kebutuhan pasien secara berkala (minimal tiap 2 jam)", "type": "label" },
                        { "id": 428324, "caption": "", "type": "checkbox" },
                        { "id": 428325, "caption": "", "type": "checkbox" },
                        { "id": 428326, "caption": "", "type": "checkbox" },
                        { "id": 428327, "caption": "", "type": "checkbox" },
                        { "id": 428328, "caption": "", "type": "checkbox" },
                        { "id": 428329, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 7,
                    "detail": [
                        { "id": 428330, "caption": "Membantu kebutuhan eliminasi pasien saban 2 jam", "type": "label" },
                        { "id": 428331, "caption": "", "type": "checkbox" },
                        { "id": 428332, "caption": "", "type": "checkbox" },
                        { "id": 428333, "caption": "", "type": "checkbox" },
                        { "id": 428334, "caption": "", "type": "checkbox" },
                        { "id": 428335, "caption": "", "type": "checkbox" },
                        { "id": 428336, "caption": "", "type": "checkbox" }
                    ]
                },
                {
                    "id": 8,
                    "detail": [
                        { "id": 428337, "caption": "Lantai kamar mandi dengan karpetanti slip/tidak licin, serta anjuran menggunakan tempat duduk dikamar mandi saat pasien mandi", "type": "label" },
                        { "id": 428338, "caption": "", "type": "checkbox" },
                        { "id": 428339, "caption": "", "type": "checkbox" },
                        { "id": 428340, "caption": "", "type": "checkbox" },
                        { "id": 428341, "caption": "", "type": "checkbox" },
                        { "id": 428342, "caption": "", "type": "checkbox" },
                        { "id": 428343, "caption": "", "type": "checkbox" }
                    ]
                }
            ];

            $scope.listNamaPerawat2 = [
                {
                    "id": 428344, "type": "combobox"
                },
                {
                    "id": 428345, "type": "combobox"
                },
                {
                    "id": 428346, "type": "combobox"
                },
                {
                    "id": 428347, "type": "combobox"
                },
                {
                    "id": 428348, "type": "combobox"
                },
                {
                    "id": 428349, "type": "combobox"
                }
            ];

            var cacheNomorEMR = cacheHelper.get('cacheNomorEMR');
            if (cacheNomorEMR != undefined) {
                nomorEMR = cacheNomorEMR[0]
                $scope.cc.norec_emr = nomorEMR
            }

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
                if (nomorEMR == '-') {
                    $scope.cc.norec_emr = '-'
                } else {
                    $scope.cc.norec_emr = nomorEMR
                }
            }
            var chekedd = false

            
            $scope.item.obj = []
            $scope.item.obj2 = []

            if (nomorEMR == '-') {
                var nocmfk = null;
                var noregistrasifk = $state.params.noRec;
                var status = "t";
                // $scope.item.obj[423291] = $scope.now;
                medifirstService.get("emr/get-antrian-pasien-norec/" + noregistrasifk).then(function (e) {
                    var antrianPasien = e.data.result;
                    $scope.item.obj[425000] = new Date(moment(antrianPasien.tglregistrasi).format('YYYY-MM-DD HH:mm'));
                })
            }

            medifirstService.get("emr/get-emr-transaksi-detail?noemr=" + nomorEMR + "&emrfk=" + $scope.cc.emrfk, true).then(function (dat) {
                dataLoad = dat.data.data
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
                            if (dataLoad[i].emrdfk >= 7590 && dataLoad[i].emrdfk <= 7593 && chekedd) {
                                $scope.getSkalaNyeri(1, { descNilai: dataLoad[i].reportdisplay })
                            }



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
                            var res = str.split("~");
                            // $scope.item.objcbo[dataLoad[i].emrdfk]= {value:res[0],text:res[1]}
                            $scope.item.obj[dataLoad[i].emrdfk] = { value: res[0], text: res[1] }

                        }


                    }

                }
            })

            $scope.Batal = function () {
                $scope.item.obj = []
            }
            $scope.kembali = function () {
                $rootScope.showRiwayat()
            }

            $scope.Save = function () {

                var arrobj = Object.keys($scope.item.obj)
                var arrSave = []
                // for (var i = arrobj.length - 1; i >= 0; i--) {
                //     arrSave.push({ id: arrobj[i], values: $scope.item.obj[parseInt(arrobj[i])] })
                // }
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
                    // $state.go("RekamMedis.OrderJadwalBedah.ProsedurKeselamatan", {
                    //     namaEMR : $scope.cc.emrfk,
                    //     nomorEMR : e.data.data.noemr 
                    // });

                    medifirstService.postLogging('EMR', 'norec emrpasien_t', e.data.data.norec,
                        'Catatan Implementasi Manajemen Pelayanan Pasien Rawat Inap' + ' dengan No EMR - ' + e.data.data.noemr + ' pada No Registrasi '
                        + $scope.cc.noregistrasi).then(function (res) {
                        })

                    $rootScope.loadRiwayat()
                    var arrStr = {
                        0: e.data.data.noemr
                    }
                    cacheHelper.set('cacheNomorEMR', arrStr);
                });
            }

            $scope.skorParameter = 0;
            $scope.getSkorParameter = function(skor, id) {
                var arrobj = Object.keys($scope.item.obj);

                for (var i = arrobj.length - 1; i >= 0; i--) {
                    if (arrobj[i] == id) {
                        if ($scope.item.obj[parseFloat(arrobj[i])] == true) {
                            $scope.skorParameter = $scope.skorParameter + parseFloat(skor);
                            break;
                        } else {
                            $scope.skorParameter = $scope.skorParameter - parseFloat(skor);
                            break;
                        }
                    }
                }
                $scope.item.obj[428190] = $scope.skorParameter;
            }

            $scope.skorParameter2 = 0;
            $scope.getSkorParameter2 = function (skor, id) {
                var arrobj = Object.keys($scope.item.obj);

                for (var i = arrobj.length - 1; i >= 0; i--) {
                    if (arrobj[i] == id) {
                        if ($scope.item.obj[parseFloat(arrobj[i])] == true) {
                            $scope.skorParameter2 = $scope.skorParameter2 + parseFloat(skor);
                            break;
                        } else {
                            $scope.skorParameter2 = $scope.skorParameter2 - parseFloat(skor);
                            break;
                        }
                    }
                }
                $scope.item.obj[428191] = $scope.skorParameter2;
            }

            $scope.skorParameter3 = 0;
            $scope.getSkorParameter3 = function (skor, id) {
                var arrobj = Object.keys($scope.item.obj);

                for (var i = arrobj.length - 1; i >= 0; i--) {
                    if (arrobj[i] == id) {
                        if ($scope.item.obj[parseFloat(arrobj[i])] == true) {
                            $scope.skorParameter3 = $scope.skorParameter3 + parseFloat(skor);
                            break;
                        } else {
                            $scope.skorParameter3 = $scope.skorParameter3 - parseFloat(skor);
                            break;
                        }
                    }
                }
                $scope.item.obj[428192] = $scope.skorParameter3;
            }

            $scope.skorParameter4 = 0;
            $scope.getSkorParameter4 = function (skor, id) {
                var arrobj = Object.keys($scope.item.obj);

                for (var i = arrobj.length - 1; i >= 0; i--) {
                    if (arrobj[i] == id) {
                        if ($scope.item.obj[parseFloat(arrobj[i])] == true) {
                            $scope.skorParameter4 = $scope.skorParameter4 + parseFloat(skor);
                            break;
                        } else {
                            $scope.skorParameter4 = $scope.skorParameter4 - parseFloat(skor);
                            break;
                        }
                    }
                }
                $scope.item.obj[428193] = $scope.skorParameter4;
            }

            $scope.skorParameter5 = 0;
            $scope.getSkorParameter5 = function (skor, id) {
                var arrobj = Object.keys($scope.item.obj);

                for (var i = arrobj.length - 1; i >= 0; i--) {
                    if (arrobj[i] == id) {
                        if ($scope.item.obj[parseFloat(arrobj[i])] == true) {
                            $scope.skorParameter5 = $scope.skorParameter5 + parseFloat(skor);
                            break;
                        } else {
                            $scope.skorParameter5 = $scope.skorParameter5 - parseFloat(skor);
                            break;
                        }
                    }
                }
                $scope.item.obj[428194] = $scope.skorParameter5;
            }

            $scope.skorParameter6 = 0;
            $scope.getSkorParameter6 = function (skor, id) {
                var arrobj = Object.keys($scope.item.obj);

                for (var i = arrobj.length - 1; i >= 0; i--) {
                    if (arrobj[i] == id) {
                        if ($scope.item.obj[parseFloat(arrobj[i])] == true) {
                            $scope.skorParameter6 = $scope.skorParameter6 + parseFloat(skor);
                            break;
                        } else {
                            $scope.skorParameter6 = $scope.skorParameter6 - parseFloat(skor);
                            break;
                        }
                    }
                }
                $scope.item.obj[428195] = $scope.skorParameter6;
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

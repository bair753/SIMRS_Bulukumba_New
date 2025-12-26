define(['initialize'], function (initialize) {
    'use strict';
    initialize.controller('PersetujuanUmumRajalCtrl', ['$q', '$rootScope', '$scope', 'ModelItem', '$state', 'CacheHelper', 'DateHelper', 'MedifirstService',
        function ($q, $rootScope, $scope, ModelItem, $state, cacheHelper, dateHelper, medifirstService) {


            var isNotClick = true;
            $scope.noCM = $state.params.noCM;
            $scope.tombolSimpanVis = true;
            $scope.noRecPap = cacheHelper.get('noRecPap');
            $scope.totalSkor = 0;
            $scope.totalSkor2 = 0;
            $scope.item = {};
            $scope.cc = {};
            var nomorEMR = '-';
            var norecEMR = '';
            $scope.cc.emrfk = 290005;
            var dataLoad = [];
            $scope.isCetak = true;
            $scope.allDisabled = false;
            var pegawaiInputDetail  = '';
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

            $scope.listWaktuPendaftaran = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420394, "nama": "", "caption": "Tanggal/Jam", "type": "datetime", "dataList": "" },
                        { "id": 420395, "nama": "", "caption": "Ruangan Rawat/Poliklinik", "type": "combobox", "dataList": "listRuangan" },
                        { "id": 420396, "nama": "", "caption": "Kelas", "type": "combobox", "dataList": "listKelas" }
                    ]
                }
            ];

            $scope.listAtaUmumPasien = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420397, "nama": "", "caption": "No RM", "type": "textbox", "dataList": "" },
                        { "id": 420398, "nama": "", "caption": "Nama Pasien", "type": "textbox", "dataList": "" },
                        { "id": 420399, "nama": "", "caption": "Tanggal Lahir", "type": "date", "dataList": "" },
                        { "id": 420400, "nama": "", "caption": "Penanggung Jawab", "type": "label", "dataList": "" },
                        { "id": 420401, "nama": "", "caption": "Nama", "type": "textbox", "dataList": "" },
                        { "id": 420402, "nama": "", "caption": "Jenis Kelamin", "type": "label", "dataList": "" },
                        { "id": 420403, "nama": "Laki-laki", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420404, "nama": "Perempuan", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420405, "nama": "", "caption": "Tanggal Lahir", "type": "date", "dataList": "" },
                        { "id": 420406, "nama": "", "caption": "Hubungan dengan pasien", "type": "textbox", "dataList": "" },
                        { "id": 420407, "nama": "", "caption": "Alamat Tempat Tinggal", "type": "textarea", "dataList": "" },
                        { "id": 420408, "nama": "", "caption": "No Telepon/HP", "type": "textbox", "dataList": "" }
                    ]
                }
            ];

            $scope.listPersetujuanPengobatan = [
                {
                    "id": 1,
                    "detail": [
                        {
                            "id": 420409, "nama": "", "caption": "Saya mengetahui bahwa saya memiliki kondisi yang membutuhkan perawatan medis, saya mengizinkan dokter dan profesional lainnya untuk melakukan prosedur diagnostik dan untuk memberikan pengobatan medis seperti yang diperlukan dalam penilaian profesional mereka.Prosedur diagnostik dan perawatan medis, tidak terbatas pada electrocadiograms, x-ray, tes darah, terapi fisik, pemberian obat dan pemeriksaan lainnya. Prosedur yang saya berikan tidak termasuk persetujuan untuk prosedur / tindakan invasif(misalnya operasi) ataupun tindakan yang mempunyai resiko tinggi.", "type": "label", "dataList": "" }
                    ]
                }
            ];

            $scope.listHasilTidakDiharapkan = [
                {
                    "id": 1,
                    "detail": [
                        {
                            "id": 420410, "nama": "", "caption": "Saya sadar bahwa praktik kedokteran dan bedah bukanlah ilmu pasti dan saya mengakui bahwa tidak ada jaminan atas hasil apapun, terhadap perawatan prosedur atau pemeriksaan apapun yang dilakukan kepada saya.", "type": "label", "dataList": ""
                        }
                    ]
                }
            ];

            $scope.listPersetujuanPelepasanInformasi = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420411, "nama": "", "caption": "-", "type": "label1", "dataList": "" },
                        {
                            "id": 420412, "nama": "", "caption": "Saya memahami informasi yang ada di dalam diri saya, termasuk diagnostik, hasil laboratorium dan hasil tes diagnostik yang akan digunakan untuk perawatan medis, akan dijamin kerahasiannya oleh rumah sakit.", "type": "label", "dataList": "" },
                        { "id": 420413, "nama": "", "caption": "-", "type": "label1", "dataList": "" },
                        {
                            "id": 420414, "nama": "", "caption": "Saya memberi wewenang kepada rumah sakit untuk memberikan informasi tentang rahasia kedokteran saya bila diperlukan untuk memproses klaim asuransi namun tidak terbatas pada BPJS, asuransi kesehatan lainnya, perusahaan dan atau lembaga pemerintah lainnya.", "type": "label", "dataList": "" },
                        { "id": 420415, "nama": "", "caption": "-", "type": "label1", "dataList": "" },
                        {
                            "id": 420416, "nama": "", "caption": " Saya memberi wewenang kepada RSUD H. Andi Sulthan Daeng Radja untuk memberikan informasi tentang diagnosis, hasil pelayanan dan pengobatan saya kepada anggota keluarga saya dan kepada: ", "type": "label", "dataList": "" },
                        { "id": 420417, "nama": "", "caption": "1.", "type": "textbox", "dataList": "" },
                        { "id": 420418, "nama": "", "caption": "2.", "type": "textbox", "dataList": "" },
                        { "id": 420419, "nama": "", "caption": "3.", "type": "textbox", "dataList": "" }
                    ]
                }
            ];

            $scope.listKeinginanPrivasi = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420420, "nama": "", "caption": "-", "type": "label1", "dataList": "" },
                        {
                            "id": 420421, "nama": "", "caption": " Saya mengijinkan/tidak mengizinkan (coret yang tidak perlu) rumah sakit memberi akses bagi keluarga dan handai taulan serta orang-orang yang akan menengok/ menemui saya.", "type": "label", "dataList": ""
                        },
                        { "id": 420422, "nama": "", "caption": "-", "type": "label1", "dataList": "" },
                        {
                            "id": 420423, "nama": "", "caption": " Sebutkan nama/profesi bila ada permintaan khusus) ;", "type": "label", "dataList": ""
                        },
                        { "id": 420424, "nama": "", "caption": "1.", "type": "textbox", "dataList": "" },
                        { "id": 420425, "nama": "", "caption": "2.", "type": "textbox", "dataList": "" }
                    ]
                }
            ];

            $scope.listInformasiBiaya = [
                {
                    "id": 1,
                    "detail": [
                        {
                            "id": 420426, "nama": "", "caption": "Saya menyatakan setuju, baik sebagai wali atau sebagai pasien, bahwa sesuai pertimbangan yang diberikan kepada pasien, maka saya wajib untuk membayar total biaya perawatan.Biaya pelayanan berdasarkan acuan biaya dan ketentuan RSUD H.Andi Sulthan Daeng Radja, dengan perkiraan biaya sebesar", "type": "label", "dataList": ""
                        },
                        { "id": 420427, "nama": "", "caption": "Rp.", "type": "textbox", "dataList": "" },
                        { "id": 420428, "nama": "", "caption": "Terbilang", "type": "textbox", "dataList": "" }
                    ]
                }
            ];

            $scope.listTataTertib = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420429, "nama": "", "caption": "1.", "type": "label1", "dataList": "" },
                        {
                            "id": 420430, "nama": "", "caption": "Pasien dan keluarga harus mematuhi peraturan yang berlaku di rumah sakit.", "type": "label", "dataList": ""
                        },
                        { "id": 420431, "nama": "", "caption": "2.", "type": "label1", "dataList": "" },
                        {
                            "id": 420432, "nama": "", "caption": "Pasien dan keluarga dilarang merokok di lingkungan rumah sakit.", "type": "label", "dataList": ""
                        },
                        { "id": 420433, "nama": "", "caption": "3.", "type": "label1", "dataList": "" },
                        {
                            "id": 420434, "nama": "", "caption": "Dilarang mencuci dan menjemur pakaian memasak di ruang perawatan.", "type": "label", "dataList": ""
                        },
                        { "id": 420435, "nama": "", "caption": "4.", "type": "label1", "dataList": "" },
                        {
                            "id": 420436, "nama": "", "caption": "Tidak membawa alkohol, obat-obatan terlarang dan senjata tajam/api.", "type": "label", "dataList": ""
                        },
                        { "id": 420437, "nama": "", "caption": "5.", "type": "label1", "dataList": "" },
                        {
                            "id": 420438, "nama": "", "caption": "Memperlakukan staf rumah sakit dan pasien lain dengan bermartabat dan hormat serta tidak melakukan tindakan yang akan mengganggu ketertiban.", "type": "label", "dataList": ""
                        },
                        { "id": 420439, "nama": "", "caption": "6.", "type": "label1", "dataList": "" },
                        {
                            "id": 420440, "nama": "", "caption": " Anak-anak dibawah 12 tahun dilarang masuk ruang perawatan.", "type": "label", "dataList": ""
                        }
                    ]
                }
            ];

            $scope.listHakdanKewajiban = [
                {
                    "id": 1,
                    "detail": [
                        {
                            "id": 420441, "nama": "", "caption": "Saya telah mendapatkan penjelasan tentang tata tertib, hak dan kewajiban pasien dan keluarga di RSUD H.Andi Sulthan Daeng Radja melalui banner yang disediakan petugas.", "type": "label", "dataList": ""
                        }
                    ]
                }
            ];

            $scope.cetakPdf = function () {
                if (norecEMR == '') return
                var client = new HttpClient();
                client.get('http://127.0.0.1:1237/printvb/e-rekammedis?cetak-emr-asesmen-awal-medis-igd&id=' + $scope.cc.nocm + '&emr=' + norecEMR + '&view=true', function (response) {
                    // do something with response
                });
            }

            var cacheEMR_TRIASE_PRIMER = cacheHelper.get('cacheEMR_TRIASE_PRIMER');
            var cacheEMR_CTRS = cacheHelper.get('cacheEMR_CTRS');
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

            if (nomorEMR == '-') {
                $scope.item.obj = []
                var nocmfk = null;
                var noregistrasifk = $state.params.noRec;
                var status = "t";
                medifirstService.get("emr/get-antrian-pasien-norec/" + noregistrasifk).then(function (e) {
                    var antrianPasien = e.data.result;
                    $scope.item.obj[420394] = new Date(moment(antrianPasien.tglregistrasi).format('YYYY-MM-DD HH:mm'));
                    if (antrianPasien.objectruanganfk != null && antrianPasien.namaruangan) {
                        $scope.item.obj[420395] = {
                            value: antrianPasien.objectruanganfk,
                            text: antrianPasien.namaruangan
                        }
                    }
                    if (antrianPasien.objectkelasfk != null && antrianPasien.namakelas) {
                        $scope.item.obj[420396] = {
                            value: antrianPasien.objectkelasfk,
                            text: antrianPasien.namakelas
                        }
                    }
                    $scope.item.obj[420397] = antrianPasien.nocm;
                    $scope.item.obj[420398] = antrianPasien.namapasien;
                    $scope.item.obj[420399] = new Date(moment(antrianPasien.tgllahir).format('YYYY-MM-DD'));
                    $scope.item.obj[420442] = $scope.now;
                })
                
                medifirstService.get("emr/get-vital-sign?noregistrasi=" + $scope.cc.noregistrasi + "&objectidawal=4241&objectidakhir=4246&idemr=147", true).then(function (datas) {
                    if (datas.data.data.length>0){
                        // $scope.item.obj[4228]=datas.data.data[0].value
                        // $scope.item.obj[4229]=datas.data.data[3].value
                        // $scope.item.obj[4230]=datas.data.data[4].value
                        // $scope.item.obj[4231]=datas.data.data[5].value
                    }
                })
            } else {
                var chekedd = false
                //medifirstService.get("emr/get-emr-transaksi-detail?noemr="+$state.params.nomorEMR, true).then(function(dat){
                medifirstService.get("emr/get-rekam-medis-dynamic?emrid=" + $scope.cc.emrfk).then(function (e) {

                    for (var i = e.data.kolom2.length - 1; i >= 0; i--) {
                        if (e.data.kolom2[i].id == 4189 || e.data.kolom2[i].id == 4190 || e.data.kolom2[i].id == 4191 || e.data.kolom2[i].id == 4192)
                            e.data.kolom2.splice(i, 1)

                    }
                    $scope.listData = e.data
                    $scope.item.title = e.data.title
                    $scope.item.classgrid = e.data.classgrid

                    // $scope.cc.emrfk = 146

                    $scope.item.objcbo = []
                    for (var i = e.data.kolom1.length - 1; i >= 0; i--) {

                        if (e.data.kolom1[i].cbotable != null) {
                            medifirstService.getPart2(e.data.kolom1[i].id, e.data.kolom1[i].cbotable, true, true, 20).then(function (data) {
                                $scope.item.objcbo[data.options.idididid] = data
                            })
                        }
                        for (var ii = e.data.kolom1[i].child.length - 1; ii >= 0; ii--) {
                            if (e.data.kolom1[i].child[ii].cbotable != null) {
                                medifirstService.getPart2(e.data.kolom1[i].child[ii].id, e.data.kolom1[i].child[ii].cbotable, true, true, 20).then(function (data) {
                                    $scope.item.objcbo[data.options.idididid] = data
                                })
                            }
                        }
                    }
                    for (var i = e.data.kolom2.length - 1; i >= 0; i--) {
                        if (e.data.kolom2[i].cbotable != null) {
                            medifirstService.getPart2(e.data.kolom2[i].id, e.data.kolom2[i].cbotable, true, true, 20).then(function (data) {
                                $scope.item.objcbo[data.options.idididid] = data
                            })
                        }
                        for (var ii = e.data.kolom2[i].child.length - 1; ii >= 0; ii--) {
                            if (e.data.kolom2[i].child[ii].cbotable != null) {
                                medifirstService.getPart2(e.data.kolom2[i].child[ii].id, e.data.kolom2[i].child[ii].cbotable, true, true, 20).then(function (data) {
                                    $scope.item.objcbo[data.options.idididid] = data
                                })
                            }
                        }
                    }
                    for (var i = e.data.kolom3.length - 1; i >= 0; i--) {
                        if (e.data.kolom3[i].cbotable != null) {
                            medifirstService.getPart2(e.data.kolom3[i].id, e.data.kolom3[i].cbotable, true, true, 20).then(function (data) {
                                $scope.item.objcbo[data.options.idididid] = data
                            })
                        }
                        for (var ii = e.data.kolom3[i].child.length - 1; ii >= 0; ii--) {
                            if (e.data.kolom3[i].child[ii].cbotable != null) {
                                medifirstService.getPart2(e.data.kolom3[i].child[ii].id, e.data.kolom3[i].child[ii].cbotable, true, true, 20).then(function (data) {
                                    $scope.item.objcbo[data.options.idididid] = data
                                })
                            }
                        }
                    }
                    for (var i = e.data.kolom4.length - 1; i >= 0; i--) {
                        if (e.data.kolom4[i].cbotable != null) {
                            medifirstService.getPart2(e.data.kolom4[i].id, e.data.kolom4[i].cbotable, true, true, 20).then(function (data) {
                                $scope.item.objcbo[data.options.idididid] = data
                            })
                        }
                        for (var ii = e.data.kolom4[i].child.length - 1; ii >= 0; ii--) {
                            if (e.data.kolom4[i].child[ii].cbotable != null) {
                                medifirstService.getPart2(e.data.kolom4[i].child[ii].id, e.data.kolom4[i].child[ii].cbotable, true, true, 20).then(function (data) {
                                    $scope.item.objcbo[data.options.idididid] = data
                                })
                            }
                        }
                    }
                    if (cacheEMR_TRIASE_PRIMER != undefined) {
                        medifirstService.get("emr/get-emr-transaksi-detail?noemr=" + cacheEMR_TRIASE_PRIMER + "&emrfk=" + $scope.cc.emrfk, true).then(function (dat) {
                            var dataNA = dat.data.data
                            for (var i = 0; i <= dataNA.length - 1; i++) {
                                if (dataNA[i].emrdfk == '9044') {
                                    if (dataNA[i].value == '1') {
                                        $scope.activeTriaseStatus = 'merah'
                                    }
                                }
                                if (dataNA[i].emrdfk == '9050') {
                                    if (dataNA[i].value == '1') {
                                        $scope.activeTriaseStatus = 'kuning'
                                    }
                                }
                                if (dataNA[i].emrdfk == '9052') {
                                    if (dataNA[i].value == '1') {
                                        $scope.activeTriaseStatus = 'hijau'
                                    }
                                }
                                if (dataNA[i].emrdfk == '9055') {
                                    if (dataNA[i].value == '1') {
                                        $scope.activeTriaseStatus = 'hitam'
                                    }
                                }

                            }

                        })
                    }
                    if(nomorEMR!='-'){
                    cacheHelper.set('cacheEMR_igd', nomorEMR)
                }
                    
                    medifirstService.get("emr/get-emr-transaksi-detail?noemr=" + nomorEMR + "&emrfk=" + $scope.cc.emrfk, true).then(function (dat) {
                        $scope.item.obj = []
                        $scope.item.obj2 = []
                        if (cacheEMR_CTRS != undefined) {

                            // SET DARI SKOR CTRS
                            medifirstService.get("emr/get-emr-transaksi-detail?noemr=" + cacheEMR_CTRS + "&emrfk=" + $scope.cc.emrfk, true).then(function (datss) {
                                var dataNA = datss.data.data
                                var skorsss = 0
                                for (var i = 0; i <= dataNA.length - 1; i++) {
                                    if (dataNA[i].type == "checkbox" && dataNA[i].value == '1') {
                                        if (dataNA[i].reportdisplay != null) {
                                            skorsss = skorsss + parseFloat(dataNA[i].reportdisplay)
                                        }

                                    }

                                }
                                $scope.item.obj[4189] = skorsss
                                if (skorsss <= 10) {
                                    $scope.item.obj[4190] = true
                                }
                                if (skorsss > 10) {
                                    $scope.item.obj[4191] = true
                                }

                                   // *** disable Input *//
                                    setTimeout(function(){medifirstService.setDisableAllInputElement()  }, 3000);
                                    // *** disable Input *//

                            })
                        }
                        dataLoad = dat.data.data
                        medifirstService.get("emr/get-vital-sign?noregistrasi=" + $scope.cc.noregistrasi + "&objectidawal=4241&objectidakhir=4246&idemr=147", true).then(function (datas) {
                        if (datas.data.data.length>0){
                            // $scope.item.obj[4228]=datas.data.data[0].value
                            // $scope.item.obj[4229]=datas.data.data[3].value
                            // $scope.item.obj[4230]=datas.data.data[4].value
                            // $scope.item.obj[4231]=datas.data.data[5].value

                        }
                    })
                        
                        for (var i = 0; i <= dataLoad.length - 1; i++) {
                            if (parseFloat($scope.cc.emrfk) == dataLoad[i].emrfk) {

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
                                    var res = str.split("~");
                                    // $scope.item.objcbo[dataLoad[i].emrdfk]= {value:res[0],text:res[1]}
                                    $scope.item.obj[dataLoad[i].emrdfk] = { value: res[0], text: res[1] }

                                }
                                pegawaiInputDetail = dataLoad[i].pegawaifk
                            }

                        }
                        // *** disable Input *//
                        //setTimeout(function(){medifirstService.setDisableAllInputElement()  }, 2000);
                        // *** disable Input *//

                        //  if( $scope.cc.norec_emr !='-' && pegawaiInputDetail !='' && pegawaiInputDetail !=null){
                        //     if(pegawaiInputDetail != medifirstService.getPegawaiLogin().id){
                        //         $scope.allDisabled =true
                        //         toastr.warning('Hanya Bisa melihat data','Peringatan')
                        //         return
                        //     }
                        // }

                    
                   
                    
                    })
                })
            }

            $scope.kembali = function () {
                $rootScope.showRiwayat()
            }
              
            $scope.Save = function () {

                
                var arrobj = Object.keys($scope.item.obj)
                var arrSave = []
                for (var i = arrobj.length - 1; i >= 0; i--) {
                    if ($scope.item.obj[parseInt(arrobj[i])] instanceof Date)
                        $scope.item.obj[parseInt(arrobj[i])] = moment($scope.item.obj[parseInt(arrobj[i])]).format('YYYY-MM-DD HH:mm')
                     // $scope.item.obj[parseInt(arrobj[i])] = moment($scope.item.obj[parseInt(arrobj[i])]).format('HH:mm')
                    arrSave.push({ id: arrobj[i], values: $scope.item.obj[parseInt(arrobj[i])] })
                }
                $scope.cc.jenisemr = 'asesmen'

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
                        'Persetujuan Umum' + ' dengan No EMR - ' + e.data.data.noemr + ' pada No Registrasi '
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

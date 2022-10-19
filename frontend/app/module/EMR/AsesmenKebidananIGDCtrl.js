define(['initialize'], function (initialize) {
    'use strict';
    initialize.controller('AsesmenKebidananIGDCtrl', ['$q', '$rootScope', '$scope', 'ModelItem', '$state', 'CacheHelper', 'DateHelper', 'MedifirstService',
        function ($q, $rootScope, $scope, ModelItem, $state, cacheHelper, dateHelper, medifirstService) {

            $scope.myVar = true
            $scope.noCM = $state.params.noCM;
            $scope.tombolSimpanVis = true
            $scope.isCetak = false
            $scope.noRecPap = cacheHelper.get('noRecPap');
            $scope.totalSkor = 0
            $scope.skorNutrisi = 0
            $scope.SkorSkalaFlacc = [];
            $scope.totalSkor2 = 0
            $scope.totalSkor4 = 0
            $scope.cc = {}
            var nomorEMR = '-'
            $scope.cc.emrfk = 18009
            var dataLoad = []
            var pegawaiInputDetail= ''
            $scope.item.kasusbaru = true
            $scope.item.kasuslama = false

            medifirstService.getPart('emr/get-datacombo-part-pegawai', true, true, 20).then(function (data) {
                $scope.listPegawai = data
            })
            medifirstService.getPart('emr/get-datacombo-part-ruangan-pelayanan', true, true, 20).then(function (data) {
                $scope.listRuangan = data
            })
             medifirstService.get("emr/get-rekam-medis-dynamic?emrid=" + 18009).then(function (e) {

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
                    if (element.kodeexternal == 'nyeri') {
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
                    //END ARRAY GEJALA
                    // ARRAY GEJALA
                    if (element.kodeexternal == 'nyeri2') {
                        for (let z = 0; z < arrayShiftJaga2.length; z++) {
                            const element2 = arrayShiftJaga2[z];
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
                            arrayShiftJaga2.push(datax)
                        }
                    }
                    //END ARRAY GEJALA
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
                var gejalaKosongKeun = []
                for (let k = 0; k < arrayShiftJaga2.length; k++) {
                    const element = arrayShiftJaga2[k];
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
                $scope.listData2 = arrayShiftJaga2
            })
            
            $scope.listAnamnesis = [
                {
                    "id": 1, "nama": "Pemeriksaan ANC di RSUD",
                    "detail": [
                        { "id": 31100002, "nama": "Ya", "type": "checkbox" },
                        { "id": 31100003, "nama": "", "satuan": "kali", "type": "textbox" },
                        { "id": 31100004, "nama": "Tidak", "type": "checkbox" },
                        
                    ]
                },
                {
                    "id": 1, "nama": "Pemeriksaan ANC di Luar RSUD",
                    "detail": [
                        { "id": 31100005, "nama": "Ya", "type": "checkbox" },
                        { "id": 31100006, "nama": "", "satuan": "kali", "type": "textbox" },
                        { "id": 31100007, "nama": "Tidak", "type": "checkbox" },
                    ]
                },
                {
                    "id": 1, "nama": "Keluhan dan alasan masuk rumah sakit",
                    "detail": [
                        { "id": 31100008, "nama": "", "type": "textarea" },
                    ]
                },
                {
                    "id": 1, "nama": "",
                    "detail": [
                        { "id": 31100009, "nama": "Riwayat Haid siklus", "satuan": "hari", "type": "textbox2" },
                        { "id": 31100010, "nama": "Lama", "satuan": "hari", "type": "textbox2" },
                        { "id": 31100011, "nama": "HPHT","type": "textbox2" },
                        { "id": 31100012, "nama": "TP","type": "textbox2" },
                        { "id": 31100013, "nama": "UK", "satuan": "Minggu","type": "textbox2" },
                    ]
                },
                {
                    "id": 1, "nama": "",
                    "detail": [
                        { "id": 31100014, "nama": "Perkawinan", "satuan": "hari", "type": "textbox2" },
                        { "id": 31100015, "nama": "Kawin umur", "satuan": "tahun", "type": "textbox2" },
                        { "id": 31100016, "nama": "Suami", "satuan": "tahun","type": "textbox2" },
                        { "id": 31100017, "nama": "Lama", "satuan": "tahun","type": "textbox2" }, 
                    ]               
                },
            ]

            $scope.listRiwayatObstetri1 = [
                {
                    "id": 1, "nama": "Riwayat Obstetri",
                    "detail": [
                        { "id": 31100018, "nama": "G", "type": "textbox2" },
                        { "id": 31100019, "nama": "P", "type": "textbox2" },
                        { "id": 31100020, "nama": "A", "type": "textbox2" },
                        { "id": 31100021, "nama": "Ah", "type": "textbox2" }, 
                    ]
                },
            ]
            $scope.listRiwayatObstetri2 = [
                {
                    "id": 1, "nama": "1.",
                    "detail": [
                        { "id": 31100022, "nama": "", "type": "textbox" },
                        { "id": 31100023, "nama": "", "type": "date" },
                        { "id": 31100024, "nama": "", "type": "textbox" },
                        { "id": 31100025, "nama": "", "type": "textbox" }, 
                        { "id": 31100026, "nama": "", "type": "textbox" }, 
                        { "id": 31100027, "nama": "", "type": "textbox" }, 
                    ]
                },
                {
                    "id": 1, "nama": "2.",
                    "detail": [
                        { "id": 31100028, "nama": "", "type": "textbox" },
                        { "id": 31100029, "nama": "", "type": "date" },
                        { "id": 31100030, "nama": "", "type": "textbox" },
                        { "id": 31100031, "nama": "", "type": "textbox" }, 
                        { "id": 31100032, "nama": "", "type": "textbox" }, 
                        { "id": 31100033, "nama": "", "type": "textbox" }, 
                    ]
                },
                {
                    "id": 1, "nama": "3.",
                    "detail": [
                        { "id": 31100034, "nama": "", "type": "textbox" },
                        { "id": 31100035, "nama": "", "type": "date" },
                        { "id": 31100036, "nama": "", "type": "textbox" },
                        { "id": 31100037, "nama": "", "type": "textbox" }, 
                        { "id": 31100038, "nama": "", "type": "textbox" }, 
                        { "id": 31100039, "nama": "", "type": "textbox" }, 
                    ]
                },
                {
                    "id": 1, "nama": "4.",
                    "detail": [
                        { "id": 31100040, "nama": "", "type": "textbox" },
                        { "id": 31100041, "nama": "", "type": "date" },
                        { "id": 31100042, "nama": "", "type": "textbox" },
                        { "id": 31100043, "nama": "", "type": "textbox" }, 
                        { "id": 31100044, "nama": "", "type": "textbox" }, 
                        { "id": 31100045, "nama": "", "type": "textbox" }, 
                    ]
                },
                {
                    "id": 1, "nama": "5.",
                    "detail": [
                        { "id": 31100046, "nama": "", "type": "textbox" },
                        { "id": 31100047, "nama": "", "type": "date" },
                        { "id": 31100048, "nama": "", "type": "textbox" },
                        { "id": 31100049, "nama": "", "type": "textbox" }, 
                        { "id": 31100050, "nama": "", "type": "textbox" }, 
                        { "id": 31100051, "nama": "", "type": "textbox" }, 
                    ]
                },
                {
                    "id": 1, "nama": "6.",
                    "detail": [
                        { "id": 31100052, "nama": "", "type": "textbox" },
                        { "id": 31100053, "nama": "", "type": "date" },
                        { "id": 31100054, "nama": "", "type": "textbox" },
                        { "id": 31100055, "nama": "", "type": "textbox" }, 
                        { "id": 31100056, "nama": "", "type": "textbox" }, 
                        { "id": 31100057, "nama": "", "type": "textbox" }, 
                    ]
                },
                {
                    "id": 1, "nama": "7.",
                    "detail": [
                        { "id": 31100058, "nama": "", "type": "textbox" },
                        { "id": 31100059, "nama": "", "type": "date" },
                        { "id": 31100060, "nama": "", "type": "textbox" },
                        { "id": 31100061, "nama": "", "type": "textbox" }, 
                        { "id": 31100062, "nama": "", "type": "textbox" }, 
                        { "id": 31100063, "nama": "", "type": "textbox" }, 
                    ]
                },
            ]
            $scope.listRiwayatkb = [
                {
                    "id": 1, "nama": "1.",
                    "detail": [
                        { "id": 31100064, "nama": "", "type": "textbox" },
                        { "id": 31100065, "nama": "", "type": "textbox" },
                        { "id": 31100066, "nama": "", "type": "textbox" },
                        { "id": 31100067, "nama": "", "type": "textbox" }, 
                    ]
                },
                {
                    "id": 1, "nama": "2.",
                    "detail": [
                        { "id": 31100068, "nama": "", "type": "textbox" },
                        { "id": 31100069, "nama": "", "type": "textbox" },
                        { "id": 31100070, "nama": "", "type": "textbox" },
                        { "id": 31100071, "nama": "", "type": "textbox" }, 
                    ]
                },
                {
                    "id": 1, "nama": "3.",
                    "detail": [
                        { "id": 31100072, "nama": "", "type": "textbox" },
                        { "id": 31100073, "nama": "", "type": "textbox" },
                        { "id": 31100074, "nama": "", "type": "textbox" },
                        { "id": 31100075, "nama": "", "type": "textbox" }, 
                    ]
                },
            ]
            $scope.listRdulu = [
                {
                    "id": 1, "nama": "Riwayat penyakit dahulu termasuk operasi/opname",
                    "detail": [
                        { "id": 31100076, "nama": "", "type": "textarea" },
                    ]
                },
            ]
            $scope.listPenyerta = [
                {
                    "id": 1, "nama": "Penyakit penyerta kehamilan sekarang",
                    "detail": [
                        { "id": 31100077, "nama": "Pre eklampsia", "type": "checkbox2" },
                        { "id": 31100078, "nama": "Hipertensi", "type": "checkbox" },
                        { "id": 31100079, "nama": "mulai tahun", "type": "textbox2" },
                        { "id": 31100080, "nama": "dalam terapi", "type": "textbox2" },
                        { "id": 31100081, "nama": "Diabetes", "type": "checkbox" },
                        { "id": 31100082, "nama": "mulai tahun", "type": "textbox2" },
                        { "id": 31100083, "nama": "dalam terapi", "type": "textbox2" },
                        { "id": 31100084, "nama": "Penyakit Jantung", "type": "checkbox" },
                        { "id": 31100085, "nama": "mulai tahun", "type": "textbox2" },
                        { "id": 31100086, "nama": "dalam terapi", "type": "textbox2" },
                        { "id": 31100087, "nama": "Asma", "type": "checkbox" },
                        { "id": 31100088, "nama": "mulai tahun", "type": "textbox2" },
                        { "id": 31100089, "nama": "dalam terapi", "type": "textbox2" },
                        { "id": 31100090, "nama": "HIV/AIDS", "type": "checkbox" },
                        { "id": 31100091, "nama": "mulai tahun", "type": "textbox2" },
                        { "id": 31100092, "nama": "dalam terapi", "type": "textbox2" },
                        { "id": 31100093, "nama": "Lain-lain", "type": "checkbox2" },
                    ]
                },
            ]
            $scope.listKebiasaan = [
                {
                    "id": 1, "nama": "Kebiasaan Ibu sewaktu hamil",
                    "detail": [
                        { "id": 31100094, "nama": "Minum Jamu", "type": "checkbox" },
                        { "id": 31100095, "nama": "Merokok", "type": "checkbox" },
                        { "id": 31100096, "nama": "Minum Obat", "type": "checkbox" },
                        { "id": 31100097, "nama": "", "type": "checkbox" },
                        { "id": 31100098, "nama": "", "type": "textbox2" },
                    ]
                },
            ]
            $scope.listEliminasi = [
                {
                    "id": 1, "nama": "Eliminasi",
                    "detail": [
                        { "id": 31100099, "nama": "BAK","satuan": "x/hari", "type": "textbox2" },
                        { "id": 31100100, "nama": "BAK Terakhir", "type": "textbox2" },
                        { "id": 31100101, "nama": "BAB","satuan": "x/hari", "type": "textbox2" },
                        { "id": 31100102, "nama": "BAB Terakhir","type": "textbox2" },

                    ]
                },
            ]
            $scope.listPsiko = [
                {
                    "id": 1, "nama": "Data Psikososial",
                },
                {
                    "id": 1, "nama": "Kehamilan",
                    "detail": [
                        { "id": 31100103, "nama": "Di inginkan","type": "checkbox" },
                        { "id": 31100104, "nama": "Tidak Di inginkan","type": "checkbox" },
                    ]
                },
                {
                    "id": 1, "nama": "Penampingan",
                    "detail": [
                        { "id": 31100105, "nama": "Suami","type": "checkbox" },
                        { "id": 31100106, "nama": "Orang Tua","type": "checkbox" },
                        { "id": 31100107, "nama": "Keluarga","type": "checkbox" },
                    ]
                },
                {
                    "id": 1, "nama": "Dukungan Sosial",
                    "detail": [
                        { "id": 31100108, "nama": "Ya","type": "checkbox" },
                        { "id": 31100109, "nama": "Tidak","type": "checkbox" },
                    ]
                },
                {
                    "id": 1, "nama": "Pengambilan Keputusan",
                    "detail": [
                        { "id": 31100110, "nama": "Suami","type": "checkbox" },
                        { "id": 31100111, "nama": "Orang Tua","type": "checkbox" },
                        { "id": 31100112, "nama": "Keluarga","type": "checkbox" },
                    ]
                },
            ]
            $scope.listPF = [
                {
                    "id": 1, "nama": "Tanda Vital",
                    "detail": [
                        { "id": 31100113, "nama": "TD","satuan": "mmHg", "type": "textbox" },
                        { "id": 31100114, "nama": "Nadi","satuan": "x/m", "type": "textbox" },
                        { "id": 31100115, "nama": "Napas","satuan": "x/m", "type": "textbox" },
                        { "id": 31100116, "nama": "Suhu","satuan": "°C", "type": "textbox" },
                        { "id": 31100117, "nama": "Tinggi Badan","satuan": "cm", "type": "textbox" },
                        { "id": 31100118, "nama": "Berat Badan","satuan": "kg", "type": "textbox" },
                        { "id": 31100119, "nama": "Berat Badan Sebelum Hamil","satuan": "kg", "type": "textbox" },
                    ]
                },
                {
                    "id": 1, "nama": "Keadaan Umum",
                    "detail": [
                        { "id": 31100120, "nama": "Baik","type": "checkbox2" },
                        { "id": 31100121, "nama": "Cukup","type": "checkbox2" },
                        { "id": 31100122, "nama": "Kurang","type": "checkbox2" },
                    ]
                },
                {
                    "id": 1, "nama": "Kesadaran",
                    "detail": [
                        { "id": 31100123, "nama": "Compos Mentis","type": "checkbox" },
                        { "id": 31100124, "nama": "Somnolen","type": "checkbox" },
                        { "id": 31100125, "nama": "Apatis","type": "checkbox" },
                        { "id": 31100126, "nama": "Stupor","type": "checkbox" },
                        { "id": 31100127, "nama": "Koma","type": "checkbox" },
                    ]
                },
                {
                    "id": 1, "nama": "Gizi",
                    "detail": [
                        { "id": 31100128, "nama": "Baik","type": "checkbox2" },
                        { "id": 31100129, "nama": "Sedang","type": "checkbox2" },
                        { "id": 31100130, "nama": "Buruk","type": "checkbox2" },
                    ]
                },
                {
                    "id": 1, "nama": "Kepala",
                    "detail": [
                        { "id": 31100131, "nama": "Normal","type": "checkbox2" },
                        { "id": 31100132, "nama": "Kelainan","type": "checkbox2" },
                    ]
                },
                {
                    "id": 1, "nama": "Tenggorokan",
                    "detail": [
                        { "id": 31100133, "nama": "Normal","type": "checkbox2" },
                        { "id": 31100134, "nama": "Kelainan","type": "checkbox2" },
                    ]
                },
                {
                    "id": 1, "nama": "Hidung",
                    "detail": [
                        { "id": 31100135, "nama": "Normal","type": "checkbox2" },
                        { "id": 31100136, "nama": "Kelainan","type": "checkbox2" },
                    ]
                },
                {
                    "id": 1, "nama": "Mulut dan Gigi",
                    "detail": [
                        { "id": 31100137, "nama": "Normal","type": "checkbox2" },
                        { "id": 31100138, "nama": "Kelainan","type": "checkbox2" },
                    ]
                },
                {
                    "id": 1, "nama": "Mata",
                    "detail": [
                        { "id": 31100139, "nama": "Normal","type": "checkbox2" },
                        { "id": 31100140, "nama": "Kelainan","type": "checkbox2" },
                    ]
                },
                {
                    "id": 1, "nama": "Leher",
                    "detail": [
                        { "id": 31100141, "nama": "Normal","type": "checkbox2" },
                        { "id": 31100142, "nama": "Kelainan","type": "checkbox2" },
                    ]
                },
                {
                    "id": 1, "nama": "Dada",
                    "detail": [
                        { "id": 31100143, "nama": "Normal","type": "checkbox2" },
                        { "id": 31100144, "nama": "Kelainan","type": "checkbox2" },
                    ]
                },
                {
                    "id": 1, "nama": "Jantung",
                    "detail": [
                        { "id": 31100145, "nama": "Normal","type": "checkbox2" },
                        { "id": 31100146, "nama": "Kelainan","type": "checkbox2" },
                    ]
                },
                {
                    "id": 1, "nama": "Paru-paru",
                    "detail": [
                        { "id": 31100147, "nama": "Normal","type": "checkbox2" },
                        { "id": 31100148, "nama": "Kelainan","type": "checkbox2" },
                    ]
                },
                {
                    "id": 1, "nama": "Pembesaran hati",
                    "detail": [
                        { "id": 31100149, "nama": "Tidak ada","type": "checkbox2" },
                        { "id": 31100150, "nama": "Ada","type": "checkbox2" },
                    ]
                },
                {
                    "id": 1, "nama": "Pembesaran limpa",
                    "detail": [
                        { "id": 31100151, "nama": "Tidak ada","type": "checkbox2" },
                        { "id": 31100152, "nama": "Ada","type": "checkbox2" },
                    ]
                },
                {
                    "id": 1, "nama": "Anggota gerak atas",
                    "detail": [
                        { "id": 31100153, "nama": "Tidak ada edema","type": "checkbox2" },
                        { "id": 31100154, "nama": "Ada edema","type": "checkbox2" },
                    ]
                },
                {
                    "id": 1, "nama": "Anggota gerak bawah",
                    "detail": [
                        { "id": 31100155, "nama": "Tidak ada edema","type": "checkbox2" },
                        { "id": 31100156, "nama": "Ada edema","type": "checkbox2" },
                    ]
                },
                {
                    "id": 1, "nama": "Reflek patela",
                    "detail": [
                        { "id": 31100157, "nama": "Negatif","type": "checkbox2" },
                        { "id": 31100158, "nama": "Positif","type": "checkbox2" },
                    ]
                },
                {
                    "id": 1, "nama": "Status Obstetri",
                    "detail": [
                        { "id": 31100159, "nama": "TFU","satuan": "cm", "type": "textbox" },
                    ]
                },
                {
                    "id": 1, "nama": "Letak",
                    "detail": [
                        { "id": 31100160, "nama": "Memanjang","type": "checkbox2" },
                        { "id": 31100161, "nama": "Melintang","type": "checkbox2" },
                        { "id": 31100162, "nama": "Oblique","type": "checkbox2" },
                    ]
                },
                {
                    "id": 1, "nama": "Persentasi Janin",
                    "detail": [
                        { "id": 31100163, "nama": "Kepala","type": "checkbox2" },
                        { "id": 31100164, "nama": "Bokong","type": "checkbox2" },
                    ]
                },
                {
                    "id": 1, "nama": "Posisi Janin",
                    "detail": [
                        { "id": 31100165, "nama": "Puki","type": "checkbox2" },
                        { "id": 31100166, "nama": "Puka","type": "checkbox2" },
                    ]
                },
                {
                    "id": 1, "nama": "His",
                    "detail": [
                        { "id": 31100167, "nama": "Frekuensi","satuan": "x/m","type": "textbox" },
                        { "id": 31100168, "nama": "Durasi","satuan": "detik","type": "textbox" },
                        { "id": 31100169, "nama": "Kekuatan","type": "label" },
                        { "id": 31100170, "nama": "Kuat","type": "checkbox2" },
                        { "id": 31100171, "nama": "Sedang","type": "checkbox2" },
                        { "id": 31100172, "nama": "Lemah","type": "checkbox2" },
                        { "id": 31100173, "nama": "DJJ Frekuensi","satuan": "x/m","type": "textbox" },
                        { "id": 31100174, "nama": "Irama","type": "label" },
                        { "id": 31100175, "nama": "Teratur","type": "checkbox2" },
                        { "id": 31100176, "nama": "Tidak Teratur","type": "checkbox2" },
                    ]
                },
                {
                    "id": 1, "nama": "TBJ",
                    "detail": [
                        { "id": 31100177, "nama": "","satuan": "gram","type": "textbox" },
                    ]
                },
                {
                    "id": 1, "nama": "Pemeriksaan Dalam",
                },
                {
                    "id": 1, "nama": "Servix konsistensi",
                    "detail": [
                        { "id": 31100178, "nama": "Kaku","type": "checkbox" },
                        { "id": 31100179, "nama": "Lunak","type": "checkbox" },
                        { "id": 31100180, "nama": "Tipis","type": "checkbox" },
                        { "id": 31100181, "nama": "Tebal","type": "checkbox" },
                    ]
                },
                {
                    "id": 1, "nama": "Pendataran",
                    "detail": [
                        { "id": 31100182, "nama": "<50%","type": "checkbox2" },
                        { "id": 31100183, "nama": ">50%","type": "checkbox2" },
                        { "id": 31100184, "nama": "100%","type": "checkbox2" },
                    ]
                },
                {
                    "id": 1, "nama": "Posisi",
                    "detail": [
                        { "id": 31100185, "nama": "Belakang","type": "checkbox2" },
                        { "id": 31100186, "nama": "Tengah","type": "checkbox2" },
                        { "id": 31100187, "nama": "Depan","type": "checkbox2" },
                    ]
                },
                {
                    "id": 1, "nama": "Pembukaan",
                    "detail": [
                        { "id": 31100188, "nama": "","satuan": "cm","type": "textbox" },
                    ]
                },
                {
                    "id": 1, "nama": "Selaput Ketuban",
                    "detail": [
                        { "id": 31100189, "nama": "Utuh","type": "checkbox2" },
                        { "id": 31100190, "nama": "Pecah","type": "checkbox2" },
                        { "id": 31100191, "nama": "Rembes","type": "checkbox2" },
                    ]
                },
                {
                    "id": 1, "nama": "Air Ketuban",
                    "detail": [
                        { "id": 31100192, "nama": "Jernih","type": "checkbox2" },
                        { "id": 31100193, "nama": "Keruh","type": "checkbox2" },
                        { "id": 31100194, "nama": "Berbau","type": "checkbox2" },
                    ]
                },
                {
                    "id": 1, "nama": "Persentasi",
                    "detail": [
                        { "id": 31100195, "nama": "Belakang Kepala","type": "checkbox2" },
                        { "id": 31100196, "nama": "Puncak Kepala","type": "checkbox2" },
                        { "id": 31100197, "nama": "Dahi","type": "checkbox2" },
                        { "id": 31100198, "nama": "Muka","type": "checkbox2" },
                        { "id": 31100199, "nama": "Bokong","type": "checkbox2" },
                        { "id": 31100200, "nama": "Bahu","type": "checkbox2" },
                        { "id": 31100201, "nama": "Majemuk","type": "checkbox2" },
                        { "id": 31100202, "nama": "","type": "textbox2" },
                    ]
                },
                {
                    "id": 1, "nama": "Hodge",
                    "detail": [
                        { "id": 31100203, "nama": "1","type": "checkbox" },
                        { "id": 31100204, "nama": "2","type": "checkbox" },
                        { "id": 31100205, "nama": "3","type": "checkbox" },
                        { "id": 31100206, "nama": "4","type": "checkbox" },
                    ]
                },
                {
                    "id": 1, "nama": "Panggul",
                    "detail": [
                        { "id": 31100207, "nama": "Promontorium","type": "checkbox2" },
                        { "id": 31100208, "nama": "Linea terminalis","type": "checkbox2" },
                        { "id": 31100209, "nama": "Spina isiadika","type": "checkbox2" },
                        { "id": 31100210, "nama": "Arkus pubis","type": "checkbox2" },
                        { "id": 31100211, "nama": "Lengkung sacrum","type": "checkbox2" },
                        { "id": 31100212, "nama": "Dinding samping","type": "checkbox2" },
                    ]
                },
                {
                    "id": 1, "nama": "Pemeriksaan penunjang",
                    "detail": [
                        { "id": 31100213, "nama": "Darah hb","satuan": "gr%","type": "textbox" },
                        { "id": 31100214, "nama": "Angka Leukosit","satuan": "mmk%","type": "textbox" },
                        { "id": 31100215, "nama": "Hbs Ag","type": "textbox" },
                    ]
                },
                {
                    "id": 1, "nama": "Proteinuria",
                    "detail": [
                        { "id": 31100216, "nama": "-","type": "checkbox2" },
                        { "id": 31100217, "nama": "+","type": "checkbox2" },
                        { "id": 31100218, "nama": "++","type": "checkbox2" },
                        { "id": 31100219, "nama": "+++","type": "checkbox2" },
                        { "id": 31100220, "nama": "++++","type": "checkbox2" },
                    ]
                },
                {
                    "id": 1, "nama": "",
                    "detail": [
                        { "id": 31100221, "nama": "USG","type": "textbox" },
                        { "id": 31100222, "nama": "EKG","type": "textbox" },
                        { "id": 31100223, "nama": "CTG","type": "textbox" },
                        { "id": 31100224, "nama": "RO Thorax","type": "textbox" },
                    ]
                },
                {
                    "id": 1, "nama": "Pemeriksaan lain",
                    "detail": [
                        { "id": 31100225, "nama": "","type": "textarea" },
                    ]
                },
            ]

            var cacheNomorEMR = cacheHelper.get('cacheNomorEMR');
            if (cacheNomorEMR != undefined) {
                nomorEMR = cacheNomorEMR[0]
                $scope.cc.norec_emr = nomorEMR
                $scope.cc.tanggalEmrl = cacheNomorEMR[2]
            }

            // var chacePeriode = cacheHelper.get('cacheHeader');
            // if (chacePeriode != undefined) {

            //     chacePeriode.umur = dateHelper.CountAge(new Date(chacePeriode.tgllahir), new Date());
            //     var bln = chacePeriode.umur.month,
            //         thn = chacePeriode.umur.year,
            //         day = chacePeriode.umur.day


            //     chacePeriode.umur = thn + 'thn ' + bln + 'bln ' + day + 'hr '
            //     $scope.cc.nocm = chacePeriode.nocm
            //     $scope.cc.namapasien = chacePeriode.namapasien;
            //     $scope.cc.jeniskelamin = chacePeriode.jeniskelamin;
            //     $scope.cc.tgllahir = chacePeriode.tgllahir;
            //     $scope.cc.umur = chacePeriode.umur;
            //     $scope.cc.alamatlengkap = chacePeriode.alamatlengkap;
            //     $scope.cc.notelepon = chacePeriode.notelepon;

            // }
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
                $scope.cc.alamat = chacePeriode[15]
                $scope.cc.tglLahir = chacePeriode[18]
                if (nomorEMR == '-') {
                    $scope.cc.norec_emr = '-'
                } else {
                    $scope.cc.norec_emr = nomorEMR
                }
            }
            var chekedd = false

            // // RESEP OBAT
            // $scope.columnGrid = [
            //     {
            //         "field": "no",
            //         "title": "No",
            //         "width": "30px",
            //     },
            //     {
            //         "field": "namaruangandepo",
            //         "title": "Depo",
            //         "width": "100px",
            //     },
            //     {
            //         "field": "namaproduk",
            //         "title": "Deskripsi",
            //         "width": "200px",
            //     },
            //     {
            //         "field": "jumlah",
            //         "title": "Qty",
            //         "width": "40px",
            //     },
            //     {
            //         "field": "dosis",
            //         "title": "Dosis",
            //         "width": "40px",
            //     },
            //     // {
            //     //     "template": "<input type='checkbox' class='checkbox' ng-click='onClick($event)' />",
            //     //     "width": 40
            //     // },
            //     // {
            //     //     "field": "tglpelayanan",
            //     //     "title": "Tgl Pelayanan",
            //     //     "width": "90px",
            //     // },
            //     // {
            //     //     "field": "noregistrasi",
            //     //     "title": "No.Registrasi",
            //     //     "width": "100px",
            //     // },
            //     // {
            //     //     "field": "noresep",
            //     //     "title": "No.Resep",
            //     //     "width": "100px",
            //     // },
            //     // {
            //     //     "field": "rke",
            //     //     "title": "R/ke",
            //     //     "width": "30px",
            //     // },
            //     // {
            //     //     "field": "jeniskemasan",
            //     //     "title": "Kemasan",
            //     //     "width": "80px",
            //     // },
            //     // {
            //     //     "field": "satuanstandar",
            //     //     "title": "Satuan",
            //     //     "width": "80px",
            //     // },
            //     // {
            //     //     "field": "hargasatuan",
            //     //     "title": "Harga Satuan",
            //     //     "width": "100px",
            //     //     "template": "<span class='style-right'>{{formatRupiah('#: hargasatuan #', '')}}</span>"
            //     // },
            //     // {
            //     //     "field": "hargadiscount",
            //     //     "title": "Harga Discount",
            //     //     "width": "100px",
            //     //     "template": "<span class='style-right'>{{formatRupiah('#: hargadiscount #', '')}}</span>"
            //     // },
            //     // {
            //     //     "field": "jasa",
            //     //     "title": "Jasa",
            //     //     "width": "70px",
            //     //     "template": "<span class='style-right'>{{formatRupiah('#: jasa #', '')}}</span>"
            //     // },
            //     // {
            //     //     "field": "total",
            //     //     "title": "Total",
            //     //     "width": "100px",
            //     //     "template": "<span class='style-right'>{{formatRupiah('#: total #', '')}}</span>"
            //     // },
            //     // {
            //     //     "field": "nostruk",
            //     //     "title": "No Struk",
            //     //     "width": "100px"
            //     // }
            // ];

            // medifirstService.get("farmasi/get-transaksi-pelayanan?noReg=" + $scope.cc.noregistrasi).then(function (dat) {
            //     $scope.isRouteLoading = false;
            //     for (var i = 0; i < dat.data.length; i++) {
            //         dat.data[i].no = i + 1
            //         dat.data[i].total = parseFloat(dat.data[i].jumlah) * (parseFloat(dat.data[i].hargasatuan) - parseFloat(dat.data[i].hargadiscount))
            //         dat.data[i].total = parseFloat(dat.data[i].total) + parseFloat(dat.data[i].jasa)
            //     }
            //     $scope.dataGrid = dat.data;

            // });


            // // END RESEPOBAT


            // // DIAGNOSA
            // medifirstService.getPart("emr/get-combo-icd9", true, true, 10).then(function (data) {
            //     $scope.listDiagnosaTindakan = data;
            // });
            // medifirstService.getPart("emr/get-combo-icd10", true, true, 10).then(function (data) {
            //     $scope.listDiagnosa = data;
            // });
            // medifirstService.get('emr/get-combo-diagnosis').then(function (data) {
            //     $scope.listJenisDiagnosa = data.data.jenisdiagnosa;
            // });

            
            // // ICD 10
            // function validasiIcd10() {
            //     var listRawRequired = [
            //         "item.diagnosa|k-ng-model|kode / Nama Diagnosa",
            //         "item.jenisDiagnosis|k-ng-model|kode / Jenis Diagnosa"
            //     ]
            //     var isValid = ModelItem.setValidation($scope, listRawRequired);
            //     if (isValid.status) {
            //         var norec_diagnosapasien = "";
            //         var tglinput = "";
            //         if ($scope.dataIcd10Selected != undefined) {
            //             norec_diagnosapasien = $scope.dataIcd10Selected.norec_diagnosapasien
            //             tglinput = $scope.dataIcd10Selected.tglinputdiagnosa
            //         } else {
            //             tglinput = moment($scope.now).format('YYYY-MM-DD hh:mm:ss')
            //         }
            //         var keterangan = "";
            //         if ($scope.item.keterangan == undefined) {
            //             keterangan = "-"
            //         }
            //         else {
            //             keterangan = $scope.item.keterangan
            //         }

            //         $scope.now = new Date();
            //         var data = {
            //             norec_dp: norec_diagnosapasien,
            //             noregistrasifk: $scope.cc.norec,
            //             tglregistrasi: moment($scope.item.tglregistrasi).format('YYYY-MM-DD hh:mm:ss'),
            //             objectdiagnosafk: $scope.item.diagnosa.id,
            //             objectjenisdiagnosafk: $scope.item.jenisDiagnosis.id,
            //             tglinputdiagnosa: tglinput,
            //             keterangan: keterangan,
            //             kasusbaru: $scope.item.kasusbaru,
            //             kasuslama: $scope.item.kasuslama
            //         }
            //         $scope.objSave = {
            //             detaildiagnosapasien: data,
            //         }
            //     } else {
            //         ModelItem.showMessages(isValid.messages)
            //     }
            // }


            // $scope.saveIcd10 = function () {
            //     if(medifirstService.getPegawai().jenisPegawai != undefined && medifirstService.getPegawai().jenisPegawai.jenispegawai !='DOKTER'){
            //         toastr.error('Hanya Dokter yang bisa mengisi Diagnosis','Peringatan')
            //         return
            //     }
            //     validasiIcd10();
            //     console.log(JSON.stringify($scope.objSave));
            //     medifirstService.post('emr/save-diagnosa-pasien', $scope.objSave).then(function (e) {
            //         $scope.savePeriksaDokter()
            //         medifirstService.postLogging('Diagnosis', 'Norec DiagnosaPasien_T', e.data.data.norec,
            //             'Input Diagnosis ICD 10 ( ' + $scope.item.diagnosa.kdDiagnosa + '-' + $scope.item.diagnosa.namaDiagnosa + ' )' + ' No Registrasi ' + $scope.item.noregistrasi
            //             + '/ ' + $scope.item.noMr
            //         ).then(function (res) {
            //         })
            //         delete $scope.item.jenisDiagnosis;
            //         delete $scope.item.diagnosa;
            //         delete $scope.item.keterangan;
            //         delete $scope.dataIcd10Selected;
            //         loadDiagnosa()
            //     })
            // }


            // $scope.savePeriksaDokter=  function(){debugger
            //     var kelompokUser = medifirstService.getKelompokUser()
            //     // var chacePeriode = cacheHelper.get('InputTindakanPelayananDokterRevCtrl');
            //     if(kelompokUser== 'dokter' ){
            //         var data ={
            //             "norec_apd" :$scope.cc.norec,
            //             "kelompokUser" : kelompokUser
            //         }

            //         medifirstService.postNonMessage('rawatjalan/save-periksa',data)
            //         .then(function (res) {

            //         })
            //     }
            // }

            // $scope.deleteIcd10 = function () {
            //     if ($scope.item.diagnosa == undefined) {
            //         alert("Pilih data yang mau di hapus!!")
            //         return
            //     }
            //     debugger
            //     var diagnosa = {
            //         norec_dp: $scope.dataIcd10Selected.norec_diagnosapasien
            //     }
            //     debugger
            //     var objDelete =
            //     {
            //         diagnosa: diagnosa,
            //     }
            //     debugger
            //     medifirstService.post('emr/delete-diagnosa-pasien', objDelete).then(function (e) {
            //     debugger
            //         medifirstService.postLogging('Diagnosis', 'Norec DiagnosaPasien_T', '',
            //             'Hapus Diagnosis ICD 10 ( ' + $scope.dataIcd10Selected.kddiagnosa + '-' + $scope.dataIcd10Selected.namadiagnosa + ' )' + ' No Registrasi ' + $scope.item.noregistrasi
            //             + '/ ' + $scope.item.noMr

            //         ).then(function (res) {
            //         })
            //         delete $scope.item.jenisDiagnosis;
            //         delete $scope.item.diagnosa;
            //         delete $scope.item.keterangan;
            //         delete $scope.dataIcd10Selected
            //         loadDiagnosa()


            //     })
            // }

            // // ICD 9
            // function validasi() {
            //     var listRawRequired = [
            //         "item.diagnosaTindakan|k-ng-model|kode / Nama Diagnosa"
            //     ]
            //     var isValid = ModelItem.setValidation($scope, listRawRequired);
            //     if (isValid.status) {debugger
            //         var norec_diagnosapasien = "";
            //         if ($scope.dataIcd9Selected != undefined) {
            //             norec_diagnosapasien = $scope.dataIcd9Selected.norec_diagnosapasien
            //         }
            //         var ketTindakans = "";
            //         if ($scope.item.ketTindakan != undefined) {
            //             ketTindakans = $scope.item.ketTindakan
            //         }
            //         var data = {
            //             norec_dp: norec_diagnosapasien,
            //             objectpasienfk: $scope.cc.norec,
            //             tglpendaftaran: $scope.item.tglRegistrasi,
            //             objectdiagnosatindakanfk: $scope.item.diagnosaTindakan.id,
            //             keterangantindakan: ketTindakans
            //         }

            //         $scope.objSave =
            //             {
            //                 detaildiagnosatindakanpasien: data,
            //             }
            //     } else {debugger
            //         ModelItem.showMessages(isValid.messages)
            //     }
            // }
            // $scope.saveIcd9 = function () {
            //      if(medifirstService.getPegawai().jenisPegawai != undefined && medifirstService.getPegawai().jenisPegawai.jenispegawai !='DOKTER'){
            //         toastr.error('Hanya Dokter yang bisa mengisi Diagnosis','Peringatan')
            //         return
            //     }
            //     validasi();
            //     debugger
            //     console.log(JSON.stringify($scope.objSave));
            //     medifirstService.post('emr/save-diagnosa-tindakan-pasien', $scope.objSave).then(function (e) {

            //         medifirstService.postLogging('Diagnosis', 'Norec DiagnosaTindakanPasien_T', e.data.data.norec,
            //             'Input Diagnosis ICD 9 ( ' + $scope.item.diagnosaTindakan.kdDiagnosaTindakan + '-' + $scope.item.diagnosaTindakan.namaDiagnosaTindakan + ' )' + ' No Registrasi ' + $scope.item.noregistrasi
            //             + '/ ' + $scope.item.noMr

            //         ).then(function (res) {
            //         })
            //         delete $scope.item.diagnosaTindakan;
            //         delete $scope.item.ketTindakan;
            //         delete $scope.dataIcd9Selected;
            //         loadDiagnosa()
            //     })
            // }
            // $scope.deleteIcd9 = function () {
            //     if ($scope.item.diagnosaTindakan == undefined) {
            //         alert("Pilih data yang mau di hapus!!")
            //         return
            //     }
            //     var diagnosa = {
            //         norec_dp: $scope.dataIcd9Selected.norec_diagnosapasien
            //     }
            //     var objDelete =
            //     {
            //         diagnosa: diagnosa,
            //     }
            //     medifirstService.post('emr/delete-diagnosa-tindakan-pasien', objDelete).then(function (e) {
            //         medifirstService.postLogging('Diagnosis', 'Norec DiagnosaTindakanPasien_T', '',
            //             'Hapus Diagnosis ICD 9 ( ' + $scope.dataIcd9Selected.kddiagnosatindakan + '-' + $scope.dataIcd9Selected.namadiagnosatindakan + ' )' + ' No Registrasi ' + $scope.item.noregistrasi
            //             + '/ ' + $scope.item.noMr

            //         ).then(function (res) {
            //         })
            //         delete $scope.item.diagnosaTindakan;
            //         delete $scope.item.ketTindakan;
            //         delete $scope.dataIcd9Selected
            //         loadDiagnosa()

            //     })
            // }



            // $scope.batal = function () {
            //     delete $scope.item.diagnosaTindakan;
            //     delete $scope.item.ketTindakan;
            //     delete $scope.item.jenisDiagnosis;
            //     delete $scope.item.diagnosa;
            //     delete $scope.item.keterangan;
            // }

            // loadDiagnosa();
            // function loadDiagnosa() {
            //     $scope.isRouteLoading = true;
            //     var param =""
            //     if($scope.item.isNoRegis == true)
            //        param = "noReg=" + $scope.item.noregistrasi;
            //     else
            //       param = "noCm=" + $scope.item.noMr;
              
            //     medifirstService.get("emr/get-diagnosapasienbynoregicd9?"
            //         + param
            //     ).then(function (data) {
            //         $scope.isRouteLoading = false;
            //         var dataICD9 = data.data.datas;
            //         $scope.dataSourceDiagnosaIcd9 = new kendo.data.DataSource({
            //             data: dataICD9,
            //             pageSize: 10
            //         });
            //     });

            //     medifirstService.get("emr/get-diagnosapasienbynoreg?"
            //         + param
            //     ).then(function (data) {
            //         // $scope.isRouteLoading = false;
            //         var dataICD10 = data.data.datas;
            //         $scope.dataSourceDiagnosaIcd10 = new kendo.data.DataSource({
            //             data: dataICD10,
            //             pageSize: 10
            //         });
            //     });
            // }



            // $scope.columnDiagnosaIcd9 = [{
            //     "title": "No",
            //     "template": "{{dataSourceDiagnosaIcd9.indexOf(dataItem) + 1}}",
            //     // "width": "30px"
            // }, 
            // {
            //     "field": "noregistrasi",
            //     "title": "No Registrasi",
            //     // "width": "100px"
            // }, {
            //     "field": "kddiagnosatindakan",
            //     "title": "Kode ICD 9",
            //     // "width": "100px"
            // }, {
            //     "field": "namadiagnosatindakan",
            //     "title": "Nama ICD 9",
            //     // "width": "300px"
            // }, {
            //     "field": "keterangantindakan",
            //     "title": "Keterangan",
            //     // "width": "200px"
            // }, {
            //     "field": "namaruangan",
            //     "title": "Ruangan",
            //     // "width": "200px"
            // },
            // {
            //     "field": "namalengkap",
            //     "title": "Penginput",
            //     // "width": "200px"
            // },
            // {
            //     "field": "tglinputdiagnosa",
            //     "title": "Tgl Input",
            //     // "width": "200px"
            // }];
            // $scope.columnDiagnosaIcd10 = [{
            //     "title": "No",
            //     "template": "{{dataSourceDiagnosaIcd10.indexOf(dataItem) + 1}}",
            //     // "width": "30px"
            // }, 
            // {
            //     "field": "noregistrasi",
            //     "title": "No Registrasi",
            //     // "width": "100px"
            // },{
            //     "field": "jenisdiagnosa",
            //     "title": "Jenis Diagnosis",
            //     // "width": "150px"
            // }, {
            //     "field": "kddiagnosa",
            //     "title": "Kode ICD 10",
            //     // "width": "100px"
            // }, {
            //     "field": "namadiagnosa",
            //     "title": "Nama ICD 10",
            //     // "width": "300px"
            // }, {
            //     "field": "keterangan",
            //     "title": "Keterangan",
            //     // "width": "200px"
            // }, {
            //     "field": "namaruangan",
            //     "title": "Ruangan",
            //     // "width": "150px"
            // },
            // {
            //     "field": "namalengkap",
            //     "title": "Penginput",
            //     // "width": "200px"
            // },
            // {
            //     "field": "tglinputdiagnosa",
            //     "title": "Tgl Input",
            //     // "width": "200px"
            // }];

            // // END DIAGNOSA




            // // TINDAKAN

            // // getTindakan

            // medifirstService.get("rawatjalan/get-tindakan?noReg=" + $scope.cc.noregistrasi).then(function (res){

            //     for (var i = 0; i < res.data.length; i++) {
            //         res.data[i].no = i + 1
            //     }
            //     $scope.dataTindakan = res.data;

            // });

            // $scope.columnDataTindakan =
            //     [
            //         {
            //             "field": "no",
            //             "title": "No",
            //             "width": "40px",
            //         },
            //         {
            //             "field": "namaproduk",
            //             "title": "Nama Pelayanan",
            //             "width": "200px",
            //         },
            //         {
            //             "field": "jumlah",
            //             "title": "Jumlah",
            //             "width": "200px",
            //         },
            //         {
            //             "field": "harganetto",
            //             "title": "Harga",
            //             "width": "200px",
            //         },
            //     ];
            // // END TINDAKAN

            medifirstService.get("emr/get-emr-transaksi-detail?noemr=" + nomorEMR + "&emrfk=" + $scope.cc.emrfk, true).then(function (dat) {
                // $scope.item.obj = []
                // $scope.item.obj2 = []
                // $scope.item.obj[116062]=$scope.now
                // $scope.item.obj[116068]={text:$scope.cc.namaruangan,value: $scope.cc.objectruanganfk}

                // $scope.item.obj[116201] = true
                // $scope.item.obj[116204] = true
                // $scope.item.obj[116207] = true
                // $scope.item.obj[116210] = true
                // $scope.item.obj[116213] = true
                // $scope.item.obj[116216] = true
                // $scope.item.obj[116219] = true
                // $scope.item.obj[116222] = true

                // $scope.item.obj[111056]=$scope.now
                // $scope.item.obj[14563]={ value: $scope.cc.iddpjp, text: $scope.cc.dokterdpjp }
                dataLoad = dat.data.data
                // medifirstService.get("emr/get-vital-sign?noregistrasi=" + $scope.cc.noregistrasi + "&objectidawal=4241&objectidakhir=4246&idemr=147", true).then(function (datas) {
                //     if (datas.data.data.length>0){
                //         if ($scope.item.obj[111061]== undefined) {
                //             $scope.item.obj[111061]=datas.data.data[0].value
                //         }
                //         if ($scope.item.obj[111062]== undefined) {
                //             $scope.item.obj[111062]=datas.data.data[3].value
                //         }
                //         if ($scope.item.obj[111063]==undefined) {
                //             $scope.item.obj[111063]=datas.data.data[4].value
                //         }
                //         if ($scope.item.obj[111064]==undefined) {
                //             $scope.item.obj[111064]=datas.data.data[5].value
                //         }

                //     }
                // })
                for (var i = 0; i <= dataLoad.length - 1; i++) {
                    if (parseFloat($scope.cc.emrfk) == dataLoad[i].emrfk) {

                        if (dataLoad[i].type == "textbox") {
                            $scope.item.obj[dataLoad[i].emrdfk] = dataLoad[i].value
                            if(dataLoad[i].emrdfk == 115952)
                                $scope.totalSkor4 = parseFloat(dataLoad[i].value)
                              if(dataLoad[i].emrdfk == 3152)
                                $scope.totalSkor = parseFloat(dataLoad[i].value)
                              if(dataLoad[i].emrdfk == 115928)
                                $scope.skorGizi = parseFloat(dataLoad[i].value)
                               
                        }
                        if (dataLoad[i].type == "checkbox") {
                            chekedd = false
                            if (dataLoad[i].value == '1') {
                                chekedd = true
                            }
                            $scope.item.obj[dataLoad[i].emrdfk] = chekedd
                            // if (dataLoad[i].emrdfk >= 14464 && dataLoad[i].emrdfk <= 14469 && chekedd) {
                            //     $scope.getSkalaNyeri(1, { descNilai: dataLoad[i].reportdisplay })
                            // }
                            // if (dataLoad[i].emrdfk >= 5053 && dataLoad[i].emrdfk <= 5084 && dataLoad[i].reportdisplay != null) {
                            //     var datass = { id: dataLoad[i].emrdfk, descNilai: dataLoad[i].reportdisplay }
                            //     $scope.getSkor2(datass)
                            // }
                            // if (dataLoad[i].emrdfk >= 14424 && dataLoad[i].emrdfk <= 14431 && dataLoad[i].reportdisplay != null) {
                            //     var datass = { id: dataLoad[i].emrdfk, descNilai: dataLoad[i].reportdisplay }
                            //     $scope.getSkorGizi(datass)
                            // }


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
                        // pegawaiInputDetail = dataLoad[i].pegawaifk
                    }

                }
                // if( $scope.cc.norec_emr !='-' && pegawaiInputDetail !='' && pegawaiInputDetail !=null){
                //     if(pegawaiInputDetail != medifirstService.getPegawaiLogin().id){
                //         $scope.allDisabled =true
                //         // toastr.warning('Hanya Bisa melihat data','Peringatan')
                //         // return
                //     }
                // }

            })
            // checkboxtextbox otomatis
            $scope.$watch('item.obj[31100003]', function(newValue,oldValue){
                if(newValue!=oldValue){
            
                  if($scope.item.obj[31100003] !=null && $scope.item.obj[31100002]==undefined){
                      $scope.item.obj[31100002] = true
                  
                  }
                  if($scope.item.obj[31100003] !=null && $scope.item.obj[31100002]==null){
                    $scope.item.obj[31100002] = true
                  }
                  if($scope.item.obj[31100003] !=null && $scope.item.obj[31100002]==false){
                    $scope.item.obj[31100002] = true
                    }
                  if($scope.item.obj[31100003] =='' && $scope.item.obj[31100002]!=false){
                    $scope.item.obj[31100002] = false
                    }
                    
                   
                }
            })
            $scope.$watch('item.obj[31100006]', function(newValue,oldValue){
                if(newValue!=oldValue){
            
                  if($scope.item.obj[31100006] !=null && $scope.item.obj[31100005]==undefined){
                      $scope.item.obj[31100005] = true
                  
                  }
                  if($scope.item.obj[31100006] !=null && $scope.item.obj[31100005]==null){
                    $scope.item.obj[31100005] = true
                  }
                  if($scope.item.obj[31100006] !=null && $scope.item.obj[31100005]==false){
                    $scope.item.obj[31100005] = true
                    }
                  if($scope.item.obj[31100006] =='' && $scope.item.obj[31100005]!=false){
                    $scope.item.obj[31100005] = false
                    }
                    
                   
                }
            })
            $scope.$watch('item.obj[31100098]', function(newValue,oldValue){
                if(newValue!=oldValue){
            
                  if($scope.item.obj[31100098] !=null && $scope.item.obj[31100097]==undefined){
                      $scope.item.obj[31100097] = true
                  
                  }
                  if($scope.item.obj[31100098] !=null && $scope.item.obj[31100097]==null){
                    $scope.item.obj[31100097] = true
                  }
                  if($scope.item.obj[31100098] !=null && $scope.item.obj[31100097]==false){
                    $scope.item.obj[31100097] = true
                    }
                  if($scope.item.obj[31100098] =='' && $scope.item.obj[31100097]!=false){
                    $scope.item.obj[31100097] = false
                    }
                    
                   
                }
            })
            $scope.$watch('item.obj[31100202]', function(newValue,oldValue){
                if(newValue!=oldValue){
            
                  if($scope.item.obj[31100202] !=null && $scope.item.obj[31100201]==undefined){
                      $scope.item.obj[31100201] = true
                  
                  }
                  if($scope.item.obj[31100202] !=null && $scope.item.obj[31100201]==null){
                    $scope.item.obj[31100201] = true
                  }
                  if($scope.item.obj[31100202] !=null && $scope.item.obj[31100201]==false){
                    $scope.item.obj[31100201] = true
                    }
                  if($scope.item.obj[31100202] =='' && $scope.item.obj[31100201]!=false){
                    $scope.item.obj[31100201] = false
                    }
                    
                   
                }
            })
            // end checkboxtextbox otomatis
            $scope.$watch('item.obj[116131]', function (nilai) {

                if (nilai == undefined) return
                nilai = parseInt(nilai)


                if (nilai == 0) {
                    $scope.item.obj[116121] = true
                    $scope.item.obj[116122] = false
                    $scope.item.obj[116123] = false
                    $scope.item.obj[116124] = false
                }
               if (nilai >= 1 && nilai <= 3) {
                    $scope.item.obj[116121] = false
                    $scope.item.obj[116122] = true   
                    $scope.item.obj[116123] = false
                    $scope.item.obj[116124] = false
                }
                if (nilai >= 4 && nilai <= 6) {
                    $scope.item.obj[116121] = false
                    $scope.item.obj[116122] = false
                    $scope.item.obj[116123] = true
                    $scope.item.obj[116124] = false
                }
                if (nilai >= 7 && nilai <= 10) {
                    $scope.item.obj[116121] = false
                    $scope.item.obj[116122] = false
                    $scope.item.obj[116123] = false
                    $scope.item.obj[116124] = true
                }
            });
            $scope.$watch('item.obj[116103]', function(newValue,oldValue){
                    if(newValue!=oldValue){
                
                      if($scope.item.obj[116103] ==true && $scope.item.obj[116108]== true){
                          $scope.item.obj[116107] = true
                          $scope.item.obj[116106]= false
                      }else if ($scope.item.obj[116103] ==true || $scope.item.obj[116108] ==true  ) {
                        $scope.item.obj[116106]= true
                        $scope.item.obj[116107]= false
                        $scope.item.obj[116105]= false
                      }
                       
                    }

                })
            $scope.$watch('item.obj[116108]', function(newValue,oldValue){
                    if(newValue!=oldValue){
                
                      if($scope.item.obj[116103] ==true && $scope.item.obj[116108]== true){
                          $scope.item.obj[116107] = true
                          $scope.item.obj[116106]= false
                          $scope.item.obj[116105]= false
                      }else if ($scope.item.obj[116103] ==true || $scope.item.obj[116108] ==true  ) {
                        $scope.item.obj[116106]= true
                        $scope.item.obj[116107]= false
                        $scope.item.obj[116105]= false
                      }
                       
                    }

                })
            $scope.$watch('item.obj[116104]', function(newValue,oldValue){
                    if(newValue!=oldValue){
                
                      if($scope.item.obj[116104] ==true && $scope.item.obj[116109]== true){
                          $scope.item.obj[116105] = true
                          $scope.item.obj[116107]= false
                          $scope.item.obj[116106]= false
                      }
                       
                    }

                })
            $scope.$watch('item.obj[116109]', function(newValue,oldValue){
                    if(newValue!=oldValue){
                
                      if($scope.item.obj[116104] ==true && $scope.item.obj[116109]== true){
                          $scope.item.obj[116105] = true
                          $scope.item.obj[116107]= false
                          $scope.item.obj[116106]= false
                      }
                       
                    }

                })
            $scope.$watch('item.obj[116103]', function(newValue,oldValue){
                    if(newValue!=oldValue){
                
                      if($scope.item.obj[116103] ==true){
                          $scope.item.obj[116104] = false
                      }
                       
                    }

                })
            $scope.$watch('item.obj[116104]', function(newValue,oldValue){
                    if(newValue!=oldValue){
                
                      if($scope.item.obj[116104] ==true){
                          $scope.item.obj[116103] = false
                      }
                       
                    }

                })
            $scope.$watch('item.obj[116108]', function(newValue,oldValue){
                    if(newValue!=oldValue){
                
                      if($scope.item.obj[116108] ==true){
                          $scope.item.obj[116109] = false
                      }
                       
                    }

                })
            $scope.$watch('item.obj[116109]', function(newValue,oldValue){
                    if(newValue!=oldValue){
                
                      if($scope.item.obj[116109] ==true){
                          $scope.item.obj[116108] = false
                      }
                       
                    }

                })
            $scope.$watch('item.obj[116063]', function(newValue,oldValue){
                    if(newValue!=oldValue){
                
                      if($scope.item.obj[116063] !=null ){
                          $scope.item.obj[116065] = $scope.cc.namapasien
                          $scope.item.obj[116066] = 'PASIEN'
                          
                      }
                       
                    }

                })
            $scope.$watch('item.obj[116111]', function(newValue,oldValue){
                    if(newValue!=oldValue){
                
                      if($scope.item.obj[116111] !=null ){

                                  var txtFirstNumberValue =  $scope.item.obj[116110];
                                  var txtSecondNumberValue =  $scope.item.obj[116111];
                                  var result = parseFloat(txtFirstNumberValue) / (parseFloat(txtSecondNumberValue) * parseFloat(txtSecondNumberValue));

                            if (result <= 18.4) {
                                $scope.item.obj[116112] = false
                                $scope.item.obj[116113] = false
                                $scope.item.obj[116114] = true
                            }
                            if (result >= 18.5 && result <=24.9) {
                                $scope.item.obj[116112] = false
                                $scope.item.obj[116113] = true
                                $scope.item.obj[116114] = false
                            }
                            if (result > 25) {
                                $scope.item.obj[116112] = true
                                $scope.item.obj[116113] = false
                                $scope.item.obj[116114] = false
                            }
                          
                      }
                       
                    }

                })
            $scope.$watch('item.obj[116110]', function(newValue,oldValue){
                    if(newValue!=oldValue){
                
                      if($scope.item.obj[116110] !=null ){
                                  var txtFirstNumberValue =  $scope.item.obj[116110];
                                  var txtSecondNumberValue =  $scope.item.obj[116111];
                                  var result = parseFloat(txtFirstNumberValue) / (parseFloat(txtSecondNumberValue) * parseFloat(txtSecondNumberValue));
                                  if (!isNaN(result)) {
                                     $scope.item.obj[1] = result;
                            }
                             if (result <= 18.4) {
                                $scope.item.obj[116112] = false
                                $scope.item.obj[116113] = false
                                $scope.item.obj[116114] = true
                            }
                            if (result >= 18.5 && result <=24.9) {
                                $scope.item.obj[116112] = false
                                $scope.item.obj[116113] = true
                                $scope.item.obj[116114] = false
                            }
                            if (result > 25) {
                                $scope.item.obj[116112] = true
                                $scope.item.obj[116113] = false
                                $scope.item.obj[116114] = false
                            }
                          
                      }
                       
                    }

                })
                
            $scope.SkorSkalaFlacc[21002435] = 0;
            $scope.SkorSkalaFlacc[21002439] = 0;
            $scope.SkorSkalaFlacc[21002443] = 0;
            $scope.SkorSkalaFlacc[21002447] = 0;
            $scope.SkorSkalaFlacc[21002451] = 0;
            $scope.getSkorSkalaFlacc = function (jawab) {
                var arrobj = Object.keys($scope.item.obj);
                var arrSave = []
                
                for (var i = arrobj.length - 1; i >= 0; i--) {
                    if (arrobj[i] == jawab.id) {
                        if ($scope.item.obj[parseFloat(arrobj[i])] == true) {
                            $scope.SkorSkalaFlacc[jawab.target] = $scope.SkorSkalaFlacc[jawab.target] + parseFloat(jawab.descNilai)
                            break
                        } else {
                            $scope.SkorSkalaFlacc[jawab.target] = $scope.SkorSkalaFlacc[jawab.target] - parseFloat(jawab.descNilai)
                            break
                        }
                    } else {
                    }
                }

                $scope.item.obj[jawab.target] = $scope.SkorSkalaFlacc[jawab.target]
                setSkor();
            }


            function setSkor()
            {
                var nilai1 = $scope.SkorSkalaFlacc[21002435]
                var nilai2 = $scope.SkorSkalaFlacc[21002439]
                var nilai3 = $scope.SkorSkalaFlacc[21002443]
                var nilai4 = $scope.SkorSkalaFlacc[21002447]
                var nilai5 = $scope.SkorSkalaFlacc[21002451]
            
                var total = nilai1 + nilai2 + nilai3 + nilai4 + nilai5
                $scope.item.obj[21002452] = total;
                
            }
            

            $scope.getSkorNutrisi = function (jawab) {
                var arrobj = Object.keys($scope.item.obj);
                var arrSave = []
                for (var i = arrobj.length - 1; i >= 0; i--) {
                    if (arrobj[i] == jawab.id) {
                        if ($scope.item.obj[parseFloat(arrobj[i])] == true) {
                            $scope.skorNutrisi = $scope.skorNutrisi + parseFloat(jawab.descNilai)
                            break
                        } else {
                            $scope.skorNutrisi = $scope.skorNutrisi - parseFloat(jawab.descNilai)
                            break
                        }
                    } else {
                    }
                }

                $scope.item.obj[21002861] = $scope.skorNutrisi
            }
            $scope.$watch('item.obj[115952]', function (nilai) {

                if (nilai == undefined) return
                nilai = parseInt(nilai)


                if (nilai >=7 && nilai <=11 ) {
                    $scope.item.obj[115953] = true
                    $scope.item.obj[115954] = false
                   
                }
                if (nilai >= 12) {
                    $scope.item.obj[115953] = false
                    $scope.item.obj[115954] = true
                 
                }
                
            })


            
                

            $scope.getSkalaNyeri = function (data, stat) {
                $scope.activeStatus = stat.descNilai
                var nilai = stat.descNilai
                if (nilai >= 0 && nilai <= 1) {
                    $scope.item.obj[116125] = true
                    $scope.item.obj[116126] = false
                    $scope.item.obj[116127] = false
                    $scope.item.obj[116128] = false
                    $scope.item.obj[116129] = false
                    $scope.item.obj[116130] = false
                }
                if (nilai >= 2 && nilai <= 3) {
                    $scope.item.obj[116125] = false
                    $scope.item.obj[116126] = true
                    $scope.item.obj[116127] = false
                    $scope.item.obj[116128] = false
                    $scope.item.obj[116129] = false
                    $scope.item.obj[116130] = false
                }
                if (nilai >= 4 && nilai <= 5) {
                    $scope.item.obj[116125] = false
                    $scope.item.obj[116126] = false
                    $scope.item.obj[116127] = true
                    $scope.item.obj[116128] = false
                    $scope.item.obj[116129] = false
                    $scope.item.obj[116130] = false
                }
                if (nilai >= 6 && nilai <= 7) {
                    $scope.item.obj[116125] = false
                    $scope.item.obj[116126] = false
                    $scope.item.obj[116127] = false
                    $scope.item.obj[116128] = true
                    $scope.item.obj[116129] = false
                    $scope.item.obj[116130] = false
                }
                if (nilai >= 8 && nilai <= 9) {
                    $scope.item.obj[116125] = false
                    $scope.item.obj[116126] = false
                    $scope.item.obj[116127] = false
                    $scope.item.obj[116128] = false
                    $scope.item.obj[116129] = true
                    $scope.item.obj[116130] = false
                }

                if (nilai == 10) {
                    $scope.item.obj[116125] = false
                    $scope.item.obj[116126] = false
                    $scope.item.obj[116127] = false
                    $scope.item.obj[116128] = false
                    $scope.item.obj[116129] = false
                    $scope.item.obj[116130] = true
                }

            }

            $scope.getSkor = function (stat) {

                var arrobj = Object.keys($scope.item.obj)
                var arrSave = []
                for (var i = arrobj.length - 1; i >= 0; i--) {
                    if (arrobj[i] == stat.id) {
                        if ($scope.item.obj[parseFloat(arrobj[i])] == true) {
                            $scope.totalSkor = $scope.totalSkor + parseFloat(stat.descNilai)
                            break
                        } else {
                            $scope.totalSkor = $scope.totalSkor - parseFloat(stat.descNilai)
                            break
                        }


                    } else {

                    }
                }
                $scope.item.obj[3152] = $scope.totalSkor + $scope.totalSkor2
                setSkorAkhir($scope.item.obj[3152])
            }
            $scope.getSkoralegi = function (stat) {

                var arrobj = Object.keys($scope.item.obj)
                var arrSave = []
                for (var i = arrobj.length - 1; i >= 0; i--) {
                    if (arrobj[i] == stat.id) {
                        if ($scope.item.obj[parseFloat(arrobj[i])] == true) {
                            $scope.totalSkor = $scope.totalSkor + parseFloat(stat.reportdisplay)
                            break
                        } else {
                            $scope.totalSkor = $scope.totalSkor - parseFloat(stat.reportdisplay)
                            break
                        }


                    } 
                }
                $scope.item.obj[21000092] = $scope.totalSkor
            }
            $scope.$watch('item.obj[115855]', function(newValue,oldValue){
                    if(newValue!=oldValue){
                
                      if(parseInt($scope.item.obj[21000092]) == 0 ){
                          $scope.item.obj[21000093] ='Nyaman'
                      }
                      else if(parseInt($scope.item.obj[21000092]) >= 1 && parseInt($scope.item.obj[21000092]) <= 3){
                          $scope.item.obj[21000093] ='Kurang Nyaman' 
                      }
                      else if(parseInt($scope.item.obj[21000092]) >= 4 && parseInt($scope.item.obj[21000092]) <= 6){
                          $scope.item.obj[21000093] ='Nyeri Sedang' 
                      }
                      else if(parseInt($scope.item.obj[21000092]) >= 7 && parseInt($scope.item.obj[21000092]) <= 10){
                          $scope.item.obj[21000093] ='Nyeri Berat' 
                      }
                      else
                      $scope.item.obj[21000093] =''
                       
                    }
                })
            $scope.getSkor4 = function (stat) {

                var arrobj = Object.keys($scope.item.obj)
                var arrSave = []
                for (var i = arrobj.length - 1; i >= 0; i--) {
                    if (arrobj[i] == stat.id) {
                        if ($scope.item.obj[parseFloat(arrobj[i])] == true) {
                            $scope.totalSkor4 = $scope.totalSkor4 + parseFloat(stat.descNilai)
                            break
                        } else {
                            $scope.totalSkor4 = $scope.totalSkor4 - parseFloat(stat.descNilai)
                            break
                        }


                    } else {

                    }
                }
                $scope.item.obj[115952] = $scope.totalSkor4
            }
                // setSkorAkhir($scope.item.obj[3152])
            $scope.totalSkorAses = 0
            $scope.getSkorAsesmen = function (stat, skor) {
                var arrobj = Object.keys($scope.item.obj)
                var arrSave = []
                for (var i = arrobj.length - 1; i >= 0; i--) {
                    if (arrobj[i] == stat.id) {
                        if ($scope.item.obj[parseFloat(arrobj[i])] == true) {
                            $scope.totalSkorAses = $scope.totalSkorAses + parseFloat(skor.descNilai)
                            break
                        } else {
                            $scope.totalSkorAses = $scope.totalSkorAses - parseFloat(skor.descNilai)
                            break
                        }
                    } else {

                    }
                }
                $scope.item.obj[5194] = $scope.totalSkorAses
            }
            $scope.getSkor2 = function (stat) {

                var arrobj = Object.keys($scope.item.obj)
                var arrSave = []
                for (var i = arrobj.length - 1; i >= 0; i--) {
                    if (arrobj[i] == stat.id) {
                        if ($scope.item.obj[parseFloat(arrobj[i])] == true) {
                            $scope.totalSkor2 = $scope.totalSkor2 + parseFloat(stat.descNilai)
                            break
                        } else {
                            $scope.totalSkor2 = $scope.totalSkor2 - parseFloat(stat.descNilai)
                            break
                        }


                    } else {

                    }
                }
                $scope.item.obj[5084] = $scope.totalSkor + $scope.totalSkor2
                // setSkorAkhir($scope.item.obj[3152])
            }
            $scope.skorGizi = 0
            $scope.getSkorGizi= function (stat) {
                var arrobj = Object.keys($scope.item.obj)
                var arrSave = []
                for (var i = arrobj.length - 1; i >= 0; i--) {
                    if (arrobj[i] == stat.id) {
                        if ($scope.item.obj[parseFloat(arrobj[i])] == true) {
                            $scope.skorGizi = $scope.skorGizi + parseFloat(stat.descNilai)
                            break
                        } else {
                            $scope.skorGizi = $scope.skorGizi - parseFloat(stat.descNilai)
                            break
                        }
                    } else {
                    }
                }
                $scope.item.obj[115928] = $scope.skorGizi
            }

            function setSkorAkhir(total) {

                if (total < 7) {
                    $scope.item.obj[3149] = true
                    $scope.item.obj[3150] = false
                    $scope.item.obj[3151] = false
                }

                if (total >= 7 && total <= 14) {
                    $scope.item.obj[3149] = false
                    $scope.item.obj[3150] = true
                    $scope.item.obj[3151] = false
                }

                if (total > 14) {
                    $scope.item.obj[3149] = false
                    $scope.item.obj[3150] = false
                    $scope.item.obj[3151] = true
                }



            }
            $scope.$watch('item.obj[14432]', function (nilai) {

                if (nilai == undefined) return
                nilai = parseInt(nilai)


                if (nilai < 4 ) {
                    $scope.item.obj[14433] = true
                    $scope.item.obj[14434] = false
                   
                }
                if (nilai >= 4) {
                    $scope.item.obj[14433] = false
                    $scope.item.obj[14434] = true
                 
                }
            })
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
                    'Asesmen Kebidanan IGD ' + ' dengan No EMR - ' +e.data.data.noemr +  ' pada No Registrasi ' 
                    + $scope.cc.noregistrasi).then(function (res) {
                    })

                    var arrStr = {
                        0: e.data.data.noemr
                    }
                    cacheHelper.set('cacheNomorEMR', arrStr);
                });
            }

        }
    ]);
});
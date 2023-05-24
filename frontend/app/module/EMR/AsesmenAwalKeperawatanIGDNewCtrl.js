define(['initialize', 'Configuration'], function (initialize, config) {
    'use strict';
    initialize.controller('AsesmenAwalKeperawatanIGDNewCtrl', ['$q', '$rootScope', '$scope', 'ModelItem', '$state', 'CacheHelper', 'DateHelper', 'MedifirstService',
        function ($q, $rootScope, $scope, ModelItem, $state, cacheHelper, dateHelper, medifirstService) {


            $scope.noCM = $state.params.noCM;
            $scope.tombolSimpanVis = true
            $scope.noRecPap = cacheHelper.get('noRecPap');
            $scope.totalSkor = 0
            $scope.totalSkor2 = 0
            $scope.SkorSkalaFlacc = [];
            $scope.SkorJatuhAnak = [];
            $scope.cc = {}
            var nomorEMR = '-'
            $scope.cc.emrfk = 149
            var dataLoad = []
            var pegawaiInputDetail= ''
            $scope.isCetak = true
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
            $scope.cetakBlade = function () {

                // if($scope.item.obj[420634] == undefined){
                //     toastr.warning('Alamat Pengantar tidak boleh kosong','Peringatan')
                //     return
                // }

                // if($scope.item.obj[420864] == undefined){
                //     toastr.warning('Keluhan Saat Ini tidak boleh kosong','Peringatan')
                //     return
                // }

                // if($scope.item.obj[420800] == undefined){
                //     toastr.warning('Masalah Keperawatan tidak boleh kosong','Peringatan')
                //     return
                // }

                // if($scope.item.obj[420718] == undefined){
                //     toastr.warning('Riwayat Penyakit Sebelumnya tidak boleh kosong','Peringatan')
                //     return
                // }

                // if($scope.item.obj[420719] == undefined){
                //     toastr.warning('Riwayat Penyakit Sekarang tidak boleh kosong','Peringatan')
                //     return
                // }
                
                if (norecEMR == '') return

                var local = JSON.parse(localStorage.getItem('profile'));
                var nama = medifirstService.getPegawaiLogin().namalengkap;
                window.open(config.baseApiBackend + 'report/cetak-asesmen-awal-keperawatan-igd?nocm='
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

            $scope.listHendaya = [
                { id: 5006, nama: 'Tuna Rungu' },
                { id: 5007, nama: 'Tuna Wicara' },
                { id: 5008, nama: 'Tuna Netra' },
                { id: 5009, nama: 'Lainnya :' }
            ]
            $scope.listADL = [
                { id: 5011, nama: 'Mandiri' },
                { id: 5012, nama: 'Perlu Bantuan' },
                { id: 5013, nama: 'Bantuan Total' },

            ]
            $scope.listKeluhanFisik = [
                { id: 5014, nama: 'Tidak Ada' },
                { id: 5015, nama: 'Ada, jelaskan :' },
            ]

            var cacheNomorEMR = cacheHelper.get('cacheNomorEMR');
            if (cacheNomorEMR != undefined) {
                nomorEMR = cacheNomorEMR[0]
                $scope.cc.norec_emr = nomorEMR
            }

            $scope.listWaktuPengkajian = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420616, "nama": "", "caption": "Respon Time", "type": "textbox", "dataList": "" },
                        { "id": 420617, "nama": "", "caption": "Tanggal/Jam Masuk", "type": "datetime", "dataList": "" },
                        { "id": 420618, "nama": "", "caption": "Tanggal/Jam Periksa", "type": "datetime", "dataList": "" },
                        { "id": 420619, "nama": "", "caption": "Cara Pembayaran", "type": "label", "dataList": "" },
                        { "id": 420620, "nama": "Umum", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420621, "nama": "Asuransi", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420622, "nama": "BPJS, No :", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420623, "nama": "", "caption": "", "type": "textbox1", "dataList": "" }
                    ]
                }
            ];

            $scope.listJenisKasus = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420624, "nama": "Bedah", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420625, "nama": "Non Bedah", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420626, "nama": "Anak", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420627, "nama": "Kebidanan/Penyakit Kandungan", "caption": "", "type": "checkbox", "dataList": "" }
                    ]
                }
            ];

            $scope.listPengantar = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420628, "nama": "", "caption": "Nama", "type": "textbox", "dataList": "" },
                        { "id": 420629, "nama": "", "caption": "Jenis Kelamin", "type": "label", "dataList": "" },
                        { "id": 420630, "nama": "Laki-laki", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420631, "nama": "Perempuan", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420632, "nama": "", "caption": "No. Telp/HP", "type": "textbox", "dataList": "" },
                        { "id": 420633, "nama": "", "caption": "Hubungan dengan pasien", "type": "textbox", "dataList": "" },
                        { "id": 420634, "nama": "", "caption": "Alamat", "type": "textarea", "dataList": "" }
                    ]
                }
            ];

            $scope.listBioPsiko = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420680, "nama": "Rumah Sendiri", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420681, "nama": "Orang Tua", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420682, "nama": "Kontrak", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420683, "nama": "Kos", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420684, "nama": "Lainnya", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420685, "nama": "", "caption": "", "type": "textbox1", "dataList": "" },
                        { "id": 420686, "nama": "", "caption": "", "type": "label", "dataList": "" },
                        { "id": 420687, "nama": "Tenang", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420688, "nama": "Cemas", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420689, "nama": "Marah", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420690, "nama": "Lainnya", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420691, "nama": "", "caption": "", "type": "textbox1", "dataList": "" },
                        { "id": 420692, "nama": "", "caption": "Status Perkawinan", "type": "label", "dataList": "" },
                        { "id": 420693, "nama": "Kawin", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420694, "nama": "Belum Kawin", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420695, "nama": "", "caption": "Nilai dan keyakinan yang mempengaruhi kesehatan", "type": "label", "dataList": "" },
                        { "id": 420696, "nama": "Tidak ada", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420697, "nama": "Ada", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420698, "nama": "", "caption": "", "type": "textbox1", "dataList": "" },
                        { "id": 420699, "nama": "", "caption": "Agama", "type": "label", "dataList": "" },
                        { "id": 420700, "nama": "Islam", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420701, "nama": "Kristen Katolik", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420702, "nama": "Kristen Protestan", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420703, "nama": "Hindu", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420704, "nama": "Budha", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420705, "nama": "Konghucu", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420706, "nama": "Kepercayaan Terhadap Tuhan Yang Maha Esa", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420707, "nama": "", "caption": "Menjalankan Ibadah", "type": "label", "dataList": "" },
                        { "id": 420708, "nama": "Selalu", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420709, "nama": "Ada Hambatan", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420710, "nama": "", "caption": "", "type": "textbox1", "dataList": "" }
                    ]
                }
            ];

            $scope.listEkonomi = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420711, "nama": "PNS", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420712, "nama": "TNI/POLRI", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420713, "nama": "Pegawai Swasta", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420714, "nama": "Wiraswasta", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420715, "nama": "Petani/Nelayan", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420716, "nama": "Lain", "caption": "", "type": "checkbox", "dataList": "" },
                        { "id": 420717, "nama": "", "caption": "", "type": "textbox1", "dataList": "" }
                    ]
                }
            ];

            $scope.listRiwayatKesehatanPasien = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420718, "nama": "", "caption": "Riwayat Penyakit Sebelumnya", "type": "textarea", "dataList": "", "satuan": "" },
                        { "id": 420719, "nama": "", "caption": "Riwayat Penyakit Sekarang", "type": "textarea", "dataList": "", "satuan": "" },
                        { "id": 420720, "nama": "", "caption": "Anak Ke", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 420721, "nama": "", "caption": "Dari", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 420722, "nama": "", "caption": "Meninggal", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 420723, "nama": "", "caption": "Abortus", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 420724, "nama": "", "caption": "Lahir", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 420725, "nama": "", "caption": "Aterm/Premature/Spontan/Tindakan", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 420726, "nama": "", "caption": "Oleh", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 420727, "nama": "", "caption": "BB Lahir", "type": "textbox", "dataList": "", "satuan": "kg" },
                        { "id": 420728, "nama": "", "caption": "Panjang Badan Lahir", "type": "textbox", "dataList": "", "satuan": "cm" },
                        { "id": 420729, "nama": "", "caption": "Lingkar Kepala", "type": "textbox", "dataList": "", "satuan": "cm" },
                        { "id": 420730, "nama": "", "caption": "Imunisasi", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 420731, "nama": "BCG", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420732, "nama": "DPT", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420733, "nama": "Polio", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420734, "nama": "Campak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420735, "nama": "Hepatitis", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420736, "nama": "", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420737, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listRiwayatAlergi = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420738, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420739, "nama": "Ya, Sebutkan", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420740, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listRiwayatPenggunaanObat = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420741, "nama": "Tidak ada", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420742, "nama": "Ada :", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420743, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listAsesmenNyeri = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420744, "nama": "Tidak Nyeri", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420745, "nama": "Nyeri, Lanjut ke RM 36", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listRisikoJatuh = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420746, "nama": "", "caption": "Penilaian / pengkajian : ", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 420747, "nama": "", "caption": "1. Cara berjalan pasien (salah satu atau lebih)", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 420748, "nama": "", "caption": "a. Tidak seimbang / sempoyongan / limbung ", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 420749, "nama": "Ya", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420750, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420751, "nama": "", "caption": "b. Jalan dengan menggunakan alat bantu (kruk / tripot / kursi roda / orang lain)", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 420752, "nama": "Ya", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420753, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420754, "nama": "", "caption": "2. Menopang saat akan duduk : Tampak memegang pinggiran kursi atau meja / benda lain sebagai penopang saat akan duduk", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 420755, "nama": "Ya", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420756, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420757, "nama": "", "caption": "", "type": "hr", "dataList": "", "satuan": "" },
                        { "id": 420758, "nama": "", "caption": "Jika terdapat jawaban YA, pasang gelang penanda warna kuning dan lanjut ke RM 38.1, RM 38.2, RM 38.3, RM 38.4", "type": "label", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listAsesmenFungsional = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420759, "nama": "", "caption": "Alat Bantu", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 420760, "nama": "", "caption": "Prothesa", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 420761, "nama": "", "caption": "Cacat Tubuh", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 420762, "nama": "", "caption": "ADL", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 420763, "nama": "Mandiri", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420764, "nama": "Dibantu", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420765, "nama": "Tergantung Penuh", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listRisikoNutrisional = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420769, "nama": "", "caption": "IMT < 20,5 kg/m2 atau LILA <23,5 cm ", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 420770, "nama": "Ya", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420771, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 420772, "nama": "", "caption": "Berat badan berkurang dalam 3 bulan", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 420773, "nama": "Ya", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420774, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 420775, "nama": "", "caption": "Asupan makan menurun dalam 1 minggu terakhir", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 420776, "nama": "Ya", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420777, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 4,
                    "detail": [
                        { "id": 420778, "nama": "", "caption": "Menderita sakit berat, misalnya: kesadaran menurun dan terapi intensif", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 420779, "nama": "Ya", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420780, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 5,
                    "detail": [
                        { "id": 420781, "nama": "", "caption": "Ada gangguan metabolisme(DM, Penyakit Jantung, HT, CKD, TBC Keganasan) Lain-lain: ", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 420782, "nama": "Ya", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420783, "nama": "Tidak", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listKebutuhanEdukasi = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420784, "nama": "", "caption": "Edukasi awal disampaikan tentang penggunaan obat-obatan, penggunaan peralatan medis, potensi interaksi antara obat, diet dan nutrisi, manajemen nyeri, teknik rehabilitasi, dan cuci tangan yang benar kepada: ", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 420785, "nama": "Pasien", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420786, "nama": "Keluarga", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420787, "nama": "Tidak dapat memberikan edukasi kepada pasien atau keluarga,karena", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420789, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listPerencanaanPulang = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420790, "nama": "", "caption": "Pasien Disarankan Pulang", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 420791, "nama": "Berobat lanjut di FKTP", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420792, "nama": "Poli", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420793, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" },
                        { "id": 420794, "nama": "", "caption": "Pasien Rujuk", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 420795, "nama": "Rujuk balik di FKTP", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420796, "nama": "RS", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420797, "nama": "", "caption": "", "type": "textbox1", "dataList": "", "satuan": "" },
                        { "id": 420798, "nama": "", "caption": "Rawat Inap", "type": "label", "dataList": "", "satuan": "" },
                        { "id": 420799, "nama": "", "caption": "Bagian/Ruang", "type": "textbox", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listKriteriaEvaluasi = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420801, "nama": "Menurun", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420802, "nama": "Cukup Menurun", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420803, "nama": "Sedang", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420804, "nama": "Cukup Meningkat", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420805, "nama": "Meningkat", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 420806, "nama": "Meningkat", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420807, "nama": "Cukup Meningkat", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420808, "nama": "Sedang", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420809, "nama": "Cukup Menurun", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420810, "nama": "Menurun", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 420811, "nama": "Memburuk", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420812, "nama": "Cukup Memburuk", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420813, "nama": "Sedang", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420814, "nama": "Cukup Membaik", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" },
                        { "id": 420815, "nama": "Membaik", "caption": "", "type": "checkbox", "dataList": "", "satuan": "" }
                    ]
                }
            ];

            $scope.listImplementasi = [
                {
                    "id": 1,
                    "detail": [
                        { "id": 420816, "nama": "", "caption": "", "type": "datetime", "dataList": "", "satuan": "" },
                        { "id": 420817, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 420818, "nama": "", "caption": "", "type": "combobox", "dataList": "listPegawai", "satuan": "" }
                    ]
                },
                {
                    "id": 2,
                    "detail": [
                        { "id": 420819, "nama": "", "caption": "", "type": "datetime", "dataList": "", "satuan": "" },
                        { "id": 420820, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 420821, "nama": "", "caption": "", "type": "combobox", "dataList": "listPegawai", "satuan": "" }
                    ]
                },
                {
                    "id": 3,
                    "detail": [
                        { "id": 420822, "nama": "", "caption": "", "type": "datetime", "dataList": "", "satuan": "" },
                        { "id": 420823, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 420824, "nama": "", "caption": "", "type": "combobox", "dataList": "listPegawai", "satuan": "" }
                    ]
                },
                {
                    "id": 4,
                    "detail": [
                        { "id": 420825, "nama": "", "caption": "", "type": "datetime", "dataList": "", "satuan": "" },
                        { "id": 420826, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 420827, "nama": "", "caption": "", "type": "combobox", "dataList": "listPegawai", "satuan": "" }
                    ]
                },
                {
                    "id": 5,
                    "detail": [
                        { "id": 420828, "nama": "", "caption": "", "type": "datetime", "dataList": "", "satuan": "" },
                        { "id": 420829, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 420830, "nama": "", "caption": "", "type": "combobox", "dataList": "listPegawai", "satuan": "" }
                    ]
                },
                {
                    "id": 6,
                    "detail": [
                        { "id": 420831, "nama": "", "caption": "", "type": "datetime", "dataList": "", "satuan": "" },
                        { "id": 420832, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 420833, "nama": "", "caption": "", "type": "combobox", "dataList": "listPegawai", "satuan": "" }
                    ]
                },
                {
                    "id": 7,
                    "detail": [
                        { "id": 420834, "nama": "", "caption": "", "type": "datetime", "dataList": "", "satuan": "" },
                        { "id": 420835, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 420836, "nama": "", "caption": "", "type": "combobox", "dataList": "listPegawai", "satuan": "" }
                    ]
                },
                {
                    "id": 8,
                    "detail": [
                        { "id": 420837, "nama": "", "caption": "", "type": "datetime", "dataList": "", "satuan": "" },
                        { "id": 420838, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 420839, "nama": "", "caption": "", "type": "combobox", "dataList": "listPegawai", "satuan": "" }
                    ]
                },
                {
                    "id": 9,
                    "detail": [
                        { "id": 420840, "nama": "", "caption": "", "type": "datetime", "dataList": "", "satuan": "" },
                        { "id": 420841, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 420842, "nama": "", "caption": "", "type": "combobox", "dataList": "listPegawai", "satuan": "" }
                    ]
                },
                {
                    "id": 10,
                    "detail": [
                        { "id": 420843, "nama": "", "caption": "", "type": "datetime", "dataList": "", "satuan": "" },
                        { "id": 420844, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 420845, "nama": "", "caption": "", "type": "combobox", "dataList": "listPegawai", "satuan": "" }
                    ]
                },
                {
                    "id": 11,
                    "detail": [
                        { "id": 420846, "nama": "", "caption": "", "type": "datetime", "dataList": "", "satuan": "" },
                        { "id": 420847, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 420848, "nama": "", "caption": "", "type": "combobox", "dataList": "listPegawai", "satuan": "" }
                    ]
                },
                {
                    "id": 12,
                    "detail": [
                        { "id": 420849, "nama": "", "caption": "", "type": "datetime", "dataList": "", "satuan": "" },
                        { "id": 420850, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 420851, "nama": "", "caption": "", "type": "combobox", "dataList": "listPegawai", "satuan": "" }
                    ]
                },
                {
                    "id": 13,
                    "detail": [
                        { "id": 420852, "nama": "", "caption": "", "type": "datetime", "dataList": "", "satuan": "" },
                        { "id": 420853, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 420854, "nama": "", "caption": "", "type": "combobox", "dataList": "listPegawai", "satuan": "" }
                    ]
                },
                {
                    "id": 14,
                    "detail": [
                        { "id": 420855, "nama": "", "caption": "", "type": "datetime", "dataList": "", "satuan": "" },
                        { "id": 420856, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 420857, "nama": "", "caption": "", "type": "combobox", "dataList": "listPegawai", "satuan": "" }
                    ]
                },
                {
                    "id": 15,
                    "detail": [
                        { "id": 420858, "nama": "", "caption": "", "type": "datetime", "dataList": "", "satuan": "" },
                        { "id": 420859, "nama": "", "caption": "", "type": "textbox", "dataList": "", "satuan": "" },
                        { "id": 420860, "nama": "", "caption": "", "type": "combobox", "dataList": "listPegawai", "satuan": "" }
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
                $scope.item.obj[420618] = $scope.now
                $scope.item.obj[420861] = $scope.now
                dataLoad = dat.data.data
                
                // medifirstService.get("emr/get-vital-sign?noregistrasi=" + $scope.cc.noregistrasi + "&objectidawal=4241&objectidakhir=4246&idemr=147", true).then(function (datas) {
                    
                // })

                var noregistrasifk = $state.params.noRec;
                var status = "t";
                medifirstService.get("emr/get-antrian-pasien-norec/" + noregistrasifk).then(function (e) {
                    var antrianPasien = e.data.result;
                    $scope.item.obj[420617] = new Date(moment(antrianPasien.tglregistrasi).format('YYYY-MM-DD HH:mm'));
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
                var jsonSave = {
                    head: $scope.cc,
                    data: arrSave
                }
                medifirstService.post('emr/save-emr-dinamis', jsonSave).then(function (e) {
                    medifirstService.postLogging('EMR', 'norec emrpasien_t', e.data.data.norec,
                    'Asesmen Awal Keperawatan IGD'+ ' dengan No EMR - ' + e.data.data.noemr + ' pada No Registrasi '
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
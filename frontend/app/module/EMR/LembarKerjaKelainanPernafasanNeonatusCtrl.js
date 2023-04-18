define(['initialize'], function (initialize) {
    'use strict';
    initialize.controller('LembarKerjaKelainanPernafasanNeonatusCtrl', ['$q', '$rootScope', '$scope', 'ModelItem', '$state', 'CacheHelper', 'DateHelper', 'MedifirstService',
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
            $scope.cc.emrfk = 290123;
            var dataLoad = []
            var dataDump = [];
            $scope.isCetak = false;
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

            $scope.objCanvas = []
            var imgDefault ='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAKAAAACgCAYAAACLz2ctAAAAAXNSR0IArs4c6QAAAsxJREFUeF7t0jENAAAMw7CVP+nByOMSqBR5ZwqEBRZ+u1bgAIQgLQBgmt85gAykBQBM8zsHkIG0AIBpfucAMpAWADDN7xxABtICAKb5nQPIQFoAwDS/cwAZSAsAmOZ3DiADaQEA0/zOAWQgLQBgmt85gAykBQBM8zsHkIG0AIBpfucAMpAWADDN7xxABtICAKb5nQPIQFoAwDS/cwAZSAsAmOZ3DiADaQEA0/zOAWQgLQBgmt85gAykBQBM8zsHkIG0AIBpfucAMpAWADDN7xxABtICAKb5nQPIQFoAwDS/cwAZSAsAmOZ3DiADaQEA0/zOAWQgLQBgmt85gAykBQBM8zsHkIG0AIBpfucAMpAWADDN7xxABtICAKb5nQPIQFoAwDS/cwAZSAsAmOZ3DiADaQEA0/zOAWQgLQBgmt85gAykBQBM8zsHkIG0AIBpfucAMpAWADDN7xxABtICAKb5nQPIQFoAwDS/cwAZSAsAmOZ3DiADaQEA0/zOAWQgLQBgmt85gAykBQBM8zsHkIG0AIBpfucAMpAWADDN7xxABtICAKb5nQPIQFoAwDS/cwAZSAsAmOZ3DiADaQEA0/zOAWQgLQBgmt85gAykBQBM8zsHkIG0AIBpfucAMpAWADDN7xxABtICAKb5nQPIQFoAwDS/cwAZSAsAmOZ3DiADaQEA0/zOAWQgLQBgmt85gAykBQBM8zsHkIG0AIBpfucAMpAWADDN7xxABtICAKb5nQPIQFoAwDS/cwAZSAsAmOZ3DiADaQEA0/zOAWQgLQBgmt85gAykBQBM8zsHkIG0AIBpfucAMpAWADDN7xxABtICAKb5nQPIQFoAwDS/cwAZSAsAmOZ3DiADaQEA0/zOAWQgLQBgmt85gAykBQBM8zsHkIG0AIBpfucAMpAWADDN7xxABtICAKb5nQPIQFoAwDS/cwAZSAsAmOZ3/pJhAKGjqUGRAAAAAElFTkSuQmCC'

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

            $scope.cetakPdf = function () {
                if (norecEMR == '') return
                var client = new HttpClient();
                client.get('http://127.0.0.1:1237/printvb/e-rekammedis?cetak-emr-asesmen-awal-medis-igd&id=' + $scope.cc.nocm + '&emr=' + norecEMR + '&view=true', function (response) {
                    // do something with response
                });
            }

            medifirstService.get("emr/get-rekam-medis-dynamic?emrid=" + $scope.cc.emrfk).then(function (e) {

                var datas = e.data.kolom4
                dataDump = datas;
                var detail = []
                var arrayAskep=[]
                var arrayAskep2=[]
                var arrayAskep3=[]
                var arrayAskep4=[]
                var arrayAskep5=[]

                var sama = false
                for (let i = 0; i < datas.length; i++) {
                    const element = datas[i];
                    sama = false

                    // ARRAY GEJALA
                    if (element.kodeexternal == 'No') {
                        for (let z = 0; z < arrayAskep.length; z++) {
                            const element2 = arrayAskep[z];
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
                            arrayAskep.push(datax)
                        }
                    }
                    //END ARRAY GEJALA
                    // ARRAY GEJALA
                    if (element.kodeexternal == 'No2') {
                        for (let z = 0; z < arrayAskep2.length; z++) {
                            const element2 = arrayAskep2[z];
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
                            arrayAskep2.push(datax)
                        }
                    }
                    //END ARRAY GEJALA
                    // ARRAY GEJALA
                    if (element.kodeexternal == 'No3') {
                        for (let z = 0; z < arrayAskep3.length; z++) {
                            const element2 = arrayAskep3[z];
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
                            arrayAskep3.push(datax)
                        }
                    }
                    //END ARRAY GEJALA
                     // ARRAY GEJALA
                    if (element.kodeexternal == 'No4') {
                        for (let z = 0; z < arrayAskep4.length; z++) {
                            const element2 = arrayAskep4[z];
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
                            arrayAskep4.push(datax)
                        }
                    }
                    //END ARRAY GEJALA
                    // ARRAY GEJALA
                    if (element.kodeexternal == 'asesmen') {
                        for (let z = 0; z < arrayAskep5.length; z++) {
                            const element2 = arrayAskep5[z];
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
                            arrayAskep5.push(datax)
                        }
                    }

                }
                // ARRAY GEJALA
                var gejalaKosongKeun = []
                for (let k = 0; k < arrayAskep.length; k++) {
                    const element = arrayAskep[k];
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
                $scope.listData1 = arrayAskep
                var gejalaKosongKeun = []
                for (let k = 0; k < arrayAskep2.length; k++) {
                    const element = arrayAskep2[k];
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
                $scope.listData2 = arrayAskep2
                var gejalaKosongKeun = []
                for (let k = 0; k < arrayAskep3.length; k++) {
                    const element = arrayAskep3[k];
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
                $scope.listData3 = arrayAskep3
                var gejalaKosongKeun = []
                for (let k = 0; k < arrayAskep4.length; k++) {
                    const element = arrayAskep4[k];
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
                $scope.listData4 = arrayAskep4
                var gejalaKosongKeun = []
                for (let k = 0; k < arrayAskep5.length; k++) {
                    const element = arrayAskep5[k];
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
                $scope.listData5 = arrayAskep5
            })

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

            var chekedd = false
            medifirstService.get("emr/get-emr-transaksi-detail?noemr=" + nomorEMR + "&emrfk=" + $scope.cc.emrfk, true).then(function (dat) {                
                $scope.item.obj = []
                $scope.item.obj2 = []
                $scope.item.obj[2703705] = $scope.now
                // $scope.item.obj[2703233] = $scope.now
                // $scope.item.obj[2703206] = $scope.cc.namapasien
                // $scope.item.obj[2703221] = $scope.cc.namapasien
                // $scope.item.obj[2702105] = { value: $scope.cc.iddpjp , text:  $scope.cc.dokterdpjp }
                // $scope.item.obj[27000015] = { value:peagawaiLogin.id,text:peagawaiLogin.namaLengkap}
                // $scope.item.obj[13305] = { value: $scope.cc.objectruanganfk , text:  $scope.cc.namaruangan }
                // $scope.item.obj[13306] = { value: $scope.cc.objectkelasfk , text:  $scope.cc.namakelas }
                dataLoad = dat.data.data                                      

                for (var i = 0; i <= dataLoad.length - 1; i++) {
                    if (parseFloat($scope.cc.emrfk) == dataLoad[i].emrfk) {

                        if (dataLoad[i].type == "textbox") {
                            $scope.item.obj[dataLoad[i].emrdfk] = dataLoad[i].value
                        }
                        if (dataLoad[i].type == "textbox2") {
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
                        if (dataLoad[i].type == "checkbox2") {
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
                        if (dataLoad[i].type == "radio") {
                            $scope.item.obj[dataLoad[i].emrdfk] = dataLoad[i].value
                        }
                        if (dataLoad[i].type == "combobox") {
                            var str = dataLoad[i].value
                            if(str != undefined){
                                var res = str.split("~");
                                // $scope.item.objcbo[dataLoad[i].emrdfk]= {value:res[0],text:res[1]}
                                $scope.item.obj[dataLoad[i].emrdfk] = { value: res[0], text: res[1] }        
                            }   
                            // var res = str.split("~");
                            // // $scope.item.objcbo[dataLoad[i].emrdfk]= {value:res[0],text:res[1]}
                            // $scope.item.obj[dataLoad[i].emrdfk] = { value: res[0], text: res[1] }

                        }
                    }

                }

                // medifirstService.get("emr/get-emr-transaksi-detail-img?noemr=" + nomorEMR + "&emrfk=" + $scope.cc.emrfk, true).then(function (dat) {
                
                //     var dataImg = dat.data.data
                //     for (var i = 0; i <= dataImg.length - 1; i++) {
                //             if( dataImg[i].index==null){
                //             dataImg[i].index =1
                //             }
                //             if (parseFloat($scope.cc.emrfk) == dataImg[i].emrfk ) {
                //                 if(dataImg[i].emrdfk== 1){
                //                     var sigCanvas = document.getElementById('signature_1');
                //                     var context = sigCanvas.getContext("2d");
                //                     context.clearRect(0, 0, sigCanvas.width, sigCanvas.height);
                //                     var imagess =  dataImg[i].image
                //                     var background = new Image();
                //                     background.src = imagess
                //                     background.onload = function() {
                //                         context.drawImage(background, 0, 0, 850, 500);
                //                     }
                //                 }
                                // if(dataImg[i].emrdfk== 2){
                                //     var sigCanvas2 = document.getElementById('signature_2');
                                //     var context2 = sigCanvas2.getContext("2d");
                                //     context2.clearRect(0, 0, sigCanvas2.width, sigCanvas2.height);
                                //     var imagess2 =  dataImg[i].image
                                //     var background2 = new Image();
                                //     background2.src = imagess2
                                //     background2.onload = function() {
                                //         context2.drawImage(background2, 0, 0, 160, 160);
                                //     }
                                    
                                // }
                                // if(dataImg[i].emrdfk== 3){
                                //     var sigCanvas3 = document.getElementById('signature_3');
                                //     var context3 = sigCanvas3.getContext("2d");
                                //     context3.clearRect(0, 0, sigCanvas3.width, sigCanvas3.height);
                                //     var imagess3 =  dataImg[i].image
                                //     var background3 = new Image();
                                //     background3.src = imagess3
                                //     background3.onload = function() {
                                //         context3.drawImage(background3, 0, 0, 160, 160);
                                //     }
                                   
                                //  }
                                //  if(dataImg[i].emrdfk== 4){
                                //     var sigCanvas4 = document.getElementById('signature_4');
                                //     var context4 = sigCanvas4.getContext("2d");
                                //     context4.clearRect(0, 0, sigCanvas4.width, sigCanvas4.height);
                                //     var imagess4 =  dataImg[i].image
                                //     var background4 = new Image();
                                //     background4.src = imagess4
                                //     background4.onload = function() {
                                //         context4.drawImage(background4, 0, 0, 160, 160);
                                //     }
                                   
                                //  }
                                //  if(dataImg[i].emrdfk == 5){
                                //      var sigCanvas5 = document.getElementById('signature_5');
                                //      var context5 = sigCanvas5.getContext("2d");
                                //      context5.clearRect(0, 0, sigCanvas5.width, sigCanvas5.height);
                                //      var imagess5 =  dataImg[i].image
                                //      var background5 = new Image();
                                //      background5.src = imagess5
                                //      background5.onload = function() {
                                //          context5.drawImage(background5, 0, 0, 160, 160);
                                //      }
                                //  }
                                //  if(dataImg[i].emrdfk == 6){
                                //      var sigCanvas6 = document.getElementById('signature_6');
                                //      var context6 = sigCanvas6.getContext("2d");
                                //      context6.clearRect(0, 0, sigCanvas6.width, sigCanvas6.height);
                                //      var imagess6 =  dataImg[i].image
                                //      var background6 = new Image();
                                //      background6.src = imagess6
                                //      background6.onload = function() {
                                //          context6.drawImage(background6, 0, 0, 160, 160);
                                //      }
                                     
                                //  }
                            // }

                        //  }
                    //  }) 
            })

            $scope.kembali = function () {
                $rootScope.showRiwayat()
            }
            
            $scope.Save = function () {

                
                var arrobj = Object.keys($scope.item.obj)
                var arrSave = []
                // var arrSaveImg = []

                // var sigCanvas = document.getElementById("signature_1");
                //     var context = sigCanvas.getContext("2d");
                //     const dataURL = sigCanvas.toDataURL();
                //     if(imgDefault!=dataURL){
                //     arrSaveImg.push({ id: 1, values:dataURL })
                //     }

                // var sigCanvas = document.getElementById("signature_2");
                // var context = sigCanvas.getContext("2d");
                // const dataURL2 = sigCanvas.toDataURL();
                // if(imgDefault!=dataURL2){
                // arrSaveImg.push({ id: 2, values: dataURL2 })
                // }
            
                // var sigCanvas = document.getElementById("signature_3");
                // var context = sigCanvas.getContext("2d");
                // const dataURL3 = sigCanvas.toDataURL();
                // if(imgDefault!=dataURL3){
                // arrSaveImg.push({ id: 3, values: dataURL3 })
                // }
                // if($scope.showSign4){
                //     var sigCanvas = document.getElementById("signature_4");
                //     var context = sigCanvas.getContext("2d");
                //     const dataURL = sigCanvas.toDataURL();
                //     arrSaveImg.push({ id: 4, values: dataURL })
                // }
                // if($scope.showSign5){
                //     var sigCanvas = document.getElementById("signature_5");
                //     var context = sigCanvas.getContext("2d");
                //     const dataURL = sigCanvas.toDataURL();
                //     arrSaveImg.push({ id: 5, values:dataURL })
                // }
                // if($scope.showSign6){
                //     var sigCanvas = document.getElementById("signature_6");
                //     var context = sigCanvas.getContext("2d");
                //     const dataURL = sigCanvas.toDataURL();
                //     arrSaveImg.push({ id: 6, values: dataURL })
                // }

                for (var i = arrobj.length - 1; i >= 0; i--) {
                    if ($scope.item.obj[parseInt(arrobj[i])] instanceof Date)
                        $scope.item.obj[parseInt(arrobj[i])] = moment($scope.item.obj[parseInt(arrobj[i])]).format('YYYY-MM-DD HH:mm')
                     // $scope.item.obj[parseInt(arrobj[i])] = moment($scope.item.obj[parseInt(arrobj[i])]).format('HH:mm')
                    arrSave.push({ id: arrobj[i], values: $scope.item.obj[parseInt(arrobj[i])] })
                }
                $scope.cc.jenisemr = 'asesmen'

                var jsonSave = {
                    head: $scope.cc,
                    data: arrSave,
                    // dataimg: arrSaveImg
                }
                medifirstService.post('emr/save-emr-dinamis', jsonSave).then(function (e) {
                    // $state.go("RekamMedis.OrderJadwalBedah.ProsedurKeselamatan", {
                    //     namaEMR : $scope.cc.emrfk,
                    //     nomorEMR : e.data.data.noemr 
                    // });

                    medifirstService.postLogging('EMR', 'norec emrpasien_t', e.data.data.norec,
                        'Hiperbilirubin' + ' dengan No EMR - ' + e.data.data.noemr + ' pada No Registrasi '
                        + $scope.cc.noregistrasi).then(function (res) {
                        })

                    $rootScope.loadRiwayat()
                    var arrStr = {
                        0: e.data.data.noemr
                    }
                    cacheHelper.set('cacheNomorEMR', arrStr);
                });
            }

            $scope.batalTTd = function (canvas) {
                delete $scope.item.tdd1;
                delete $scope.item.tdd2;
                var sigCanvas = document.getElementById(canvas);
                var context = sigCanvas.getContext("2d");
                context.clearRect(0, 0, sigCanvas.width, sigCanvas.height);
            }

            function getPosition(mouseEvent, sigCanvas) {
                    var rect = sigCanvas.getBoundingClientRect();
                    return {
                        X: mouseEvent.clientX - rect.left,
                        Y: mouseEvent.clientY - rect.top
                    };
            }

            // initialize()
            // initialize2()
            // initialize3()
            // initialize4()
            // initialize5()
            // initialize6()
           function initialize() {
            // get references to the canvas element as well as the 2D drawing context
            var sigCanvas = document.getElementById("signature_1");
            var context = sigCanvas.getContext("2d");
            context.strokeStyle = "blue";
            context.lineJoin = "round";
            context.lineWidth = 2;

            // Add background image to canvas - remove for blank white canvas
            // var background = new Image();
           
            // background.onload = function() {
            //   context.drawImage(background, 0, 0);
            // }

            // This will be defined on a TOUCH device such as iPad or Android, etc.
            var is_touch_device = 'ontouchstart' in document.documentElement;

            if (is_touch_device) {
              // create a drawer which tracks touch movements
              var drawer = {
                isDrawing: false,
                touchstart: function(coors) {
                  context.beginPath();
                  context.moveTo(coors.x, coors.y);
                  this.isDrawing = true;
                },
                touchmove: function(coors) {
                  if (this.isDrawing) {
                    context.lineTo(coors.x, coors.y);
                    context.stroke();
                  }
                },
                touchend: function(coors) {
                  if (this.isDrawing) {
                    this.touchmove(coors);
                    this.isDrawing = false;
                  }
                }
              };

              // create a function to pass touch events and coordinates to drawer
              function draw(event) {

                // get the touch coordinates.  Using the first touch in case of multi-touch
                var coors = {
                  x: event.targetTouches[0].pageX,
                  y: event.targetTouches[0].pageY
                };

                // Now we need to get the offset of the canvas location
                var obj = sigCanvas;

                if (obj.offsetParent) {
                  // Every time we find a new object, we add its offsetLeft and offsetTop to curleft and curtop.
                  do {
                    coors.x -= obj.offsetLeft;
                    coors.y -= obj.offsetTop;
                  }
                  // The while loop can be "while (obj = obj.offsetParent)" only, which does return null
                  // when null is passed back, but that creates a warning in some editors (i.e. VS2010).
                  while ((obj = obj.offsetParent) != null);
                }

                // pass the coordinates to the appropriate handler
                drawer[event.type](coors);
              }

              // attach the touchstart, touchmove, touchend event listeners.
              sigCanvas.addEventListener('touchstart', draw, false);
              sigCanvas.addEventListener('touchmove', draw, false);
              sigCanvas.addEventListener('touchend', draw, false);

              // prevent elastic scrolling
              sigCanvas.addEventListener('touchmove', function(event) {
                event.preventDefault();
              }, false);
            } else {

              // start drawing when the mousedown event fires, and attach handlers to
              // draw a line to wherever the mouse moves to
              $("#signature_1").mousedown(function(mouseEvent) {
                var position = getPosition(mouseEvent, sigCanvas);
                context.moveTo(position.X, position.Y);
                context.beginPath();

                // attach event handlers
                $(this).mousemove(function(mouseEvent) {
                  drawLine(mouseEvent, sigCanvas, context);
                }).mouseup(function(mouseEvent) {
                  finishDrawing(mouseEvent, sigCanvas, context);
                }).mouseout(function(mouseEvent) {
                  finishDrawing(mouseEvent, sigCanvas, context);
                });
              });

            }
          }

          // draws a line to the x and y coordinates of the mouse event inside
          // the specified element using the specified context
          function drawLine(mouseEvent, sigCanvas, context) {

            var position = getPosition(mouseEvent, sigCanvas);

            context.lineTo(position.X, position.Y);
            context.stroke();
          }

          // draws a line from the last coordiantes in the path to the finishing
          // coordinates and unbind any event handlers which need to be preceded
          // by the mouse down event
          function finishDrawing(mouseEvent, sigCanvas, context) {
            // draw the line to the finishing coordinates
            drawLine(mouseEvent, sigCanvas, context);

            context.closePath();

            // unbind any events which could draw
            $(sigCanvas).unbind("mousemove")
              .unbind("mouseup")
              .unbind("mouseout");
          }

            function getPosition2(mouseEvent, sigCanvas) {
                var rect = sigCanvas.getBoundingClientRect();
                return {
                    X: mouseEvent.clientX - rect.left,
                    Y: mouseEvent.clientY - rect.top
                    };
            }

            $scope.listBarthel = [
                {
                    id: 1,
                    detail: [
                        { id: 1000832, caption: 'Frekuensi Napas', type: 'label', descNilai: '' },
                        { id: 1000833, caption: '< 60/menit', type: 'checkbox', descNilai: '0' },
                        { id: 1000834, caption: '60 - 80/menit', type: 'checkbox', descNilai: '1' },
                        { id: 1000835, caption: '> 80/menit', type: 'checkbox', descNilai: '2' },
                    ]
                },
                {
                    id: 2,
                    detail: [
                        { id: 1000836, caption: 'Retraksi', type: 'label', descNilai: '' },
                        { id: 1000837, caption: 'Tidak ada retraksi', type: 'checkbox', descNilai: '0' },
                        { id: 1000838, caption: 'Retraksi ringan', type: 'checkbox', descNilai: '1' },
                        { id: 1000839, caption: 'Retraksi berat', type: 'checkbox', descNilai: '2' },
                    ]
                },
                {
                    id: 3,
                    detail: [
                        { id: 1000840, caption: 'Sianosis', type: 'label', descNilai: '' },
                        { id: 1000841, caption: 'Tidak ada sianosis', type: 'checkbox', descNilai: '0' },
                        { id: 1000842, caption: 'Sianosis hilang dengan pemberian O2', type: 'checkbox', descNilai: '1' },
                        { id: 1000843, caption: 'Sianosis menetap walaupun diberi O2', type: 'checkbox', descNilai: '2' },
                    ]
                },
                {
                    id: 4,
                    detail: [
                        { id: 1000844, caption: 'Suara Napas', type: 'label', descNilai: '' },
                        { id: 1000845, caption: 'Suara napas dikedua paru baik', type: 'checkbox', descNilai: '0' },
                        { id: 1000846, caption: 'Suara napas dikedua paru menurun', type: 'checkbox', descNilai: '1' },
                        { id: 1000847, caption: 'Tidak ada suara napas dikedua paru', type: 'checkbox', descNilai: '2' },
                    ]
                },
                {
                    id: 5,
                    detail: [
                        { id: 1000848, caption: 'Merintih', type: 'label', descNilai: '' },
                        { id: 1000849, caption: 'Tidak merintih', type: 'checkbox', descNilai: '0' },
                        { id: 1000850, caption: 'Dapat didengar dengan stetoskop', type: 'checkbox', descNilai: '1' },
                        { id: 1000851, caption: 'Dapat didengar tanpa alat bantu', type: 'checkbox', descNilai: '2' },
                    ]
                },
            ]

            $scope.listBarthel4 = [
                {
                    id: 1,
                    detail: [
                        { id: 1000892, type: 'datetime' },
                        { id: 1000893, type: 'textarea' },
                    ]
                },
                {
                    id: 2,
                    detail: [
                        { id: 1000894, type: 'datetime' },
                        { id: 1000895, type: 'textarea' },
                    ]
                },
                {
                    id: 3,
                    detail: [
                        { id: 1000896, type: 'datetime' },
                        { id: 1000897, type: 'textarea' },
                    ]
                },
                {
                    id: 4,
                    detail: [
                        { id: 1000898, type: 'datetime' },
                        { id: 1000899, type: 'textarea' },
                    ]
                },
                {
                    id: 5,
                    detail: [
                        { id: 1000900, type: 'datetime' },
                        { id: 1000901, type: 'textarea' },
                    ]
                },
                {
                    id: 5,
                    detail: [
                        { id: 1000902, type: 'datetime' },
                        { id: 1000903, type: 'textarea' },
                    ]
                },
                {
                    id: 6,
                    detail: [
                        { id: 1000904, type: 'datetime' },
                        { id: 1000905, type: 'textarea' },
                    ]
                },
                {
                    id: 9,
                    detail: [
                        { id: 1000906, type: 'datetime' },
                        { id: 1000907, type: 'textarea' },
                    ]
                },
                {
                    id: 10,
                    detail: [
                        { id: 1000908, type: 'datetime' },
                        { id: 1000909, type: 'textarea' },
                    ]
                },
                {
                    id: 11,
                    detail: [
                        { id: 1000910, type: 'datetime' },
                        { id: 1000911, type: 'textarea' },
                    ]
                },
                {
                    id: 12,
                    detail: [
                        { id: 1000912, type: 'datetime' },
                        { id: 1000913, type: 'textarea' },
                    ]
                },
                {
                    id: 13,
                    detail: [
                        { id: 1000914, type: 'datetime' },
                        { id: 1000915, type: 'textarea' },
                    ]
                },
                {
                    id: 14,
                    detail: [
                        { id: 1000916, type: 'datetime' },
                        { id: 1000917, type: 'textarea' },
                    ]
                },
                {
                    id: 15,
                    detail: [
                        { id: 1000918, type: 'datetime' },
                        { id: 1000919, type: 'textarea' },
                    ]
                },
                {
                    id: 16,
                    detail: [
                        { id: 1000920, type: 'datetime' },
                        { id: 1000921, type: 'textarea' },
                    ]
                },
                {
                    id: 17,
                    detail: [
                        { id: 1000922, type: 'datetime' },
                        { id: 1000923, type: 'textarea' },
                    ]
                },
                {
                    id: 18,
                    detail: [
                        { id: 1000924, type: 'datetime' },
                        { id: 1000925, type: 'textarea' },
                    ]
                },
                {
                    id: 19,
                    detail: [
                        { id: 1000926, type: 'datetime' },
                        { id: 1000927, type: 'textarea' },
                    ]
                },
                {
                    id: 20,
                    detail: [
                        { id: 1000928, type: 'datetime' },
                        { id: 1000929, type: 'textarea' },
                    ]
                },
                {
                    id: 21,
                    detail: [
                        { id: 1000930, type: 'datetime' },
                        { id: 1000931, type: 'textarea' },
                    ]
                }
            ]

        }
    ]);
});

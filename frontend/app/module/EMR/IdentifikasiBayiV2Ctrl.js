define(['initialize', 'Configuration'], function (initialize, config) {
    'use strict';
    initialize.controller('IdentifikasiBayiV2Ctrl', ['$q', '$rootScope', '$scope', 'ModelItem', '$state', 'CacheHelper', 'DateHelper', 'MedifirstService',
        function ($q, $rootScope, $scope, ModelItem, $state, cacheHelper, dateHelper, medifirstService) {

            var paramsIndex = $state.params.index ? parseInt($state.params.index) : null
            $scope.noCM = $state.params.noCM;
            var baseTransaksi = config.baseApiBackend; 
            $scope.tombolSimpanVis = true
            $scope.noRecPap = cacheHelper.get('noRecPap');
            $scope.totalSkor = 0
            $scope.totalSkor2 = 0
            $scope.item.objImg =[]
            $scope.item.objImg[32110797] = "../app/images/svg/no-image.svg"
            $scope.item.objImg[32110798] = "../app/images/svg/no-image.svg"
            $scope.item.objImg[32110799] = "../app/images/svg/no-image.svg"
            $scope.item.objImg[32110800] = "../app/images/svg/no-image.svg"
         
            $scope.cc = {}
            var nomorEMR = '-'
            var emrfk_ = 290159;
            $scope.cc.emrfk = emrfk_
            var dataLoad = []
            $scope.isCetak = false
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
                var local = JSON.parse(localStorage.getItem('profile'));
                var nama = medifirstService.getPegawaiLogin().namalengkap;
                window.open(config.baseApiBackend + 'report/cetak-ekg?nocm='
                    + $scope.cc.nocm + '&norec_apd=' + $scope.cc.norec + '&emr=' + norecEMR
                    + '&emrfk=' + $scope.cc.emrfk
                    + '&kdprofile=' + local.id
                    + '&index=' + paramsIndex
                    + '&nama=' + nama, '_blank');
            }
             $scope.listDaily = [
                {
                    "id": 1, "nama": "Alergi",
                    "detail": [
                        { "id": 21023118, "nama": "Tidak Ada", "type": "checkbox" },
                        { "id": 21023119, "nama": "Ada, yaitu : ", "type": "checkbox" },
                        { "id": 21023120, "nama": "", "type": "textbox" },
                    ]
                },
                
            ]
            medifirstService.getPart('emr/get-datacombo-part-pegawai', true, true, 20).then(function (data) {
                $scope.listPegawai = data
             })
            medifirstService.getPart('emr/get-datacombo-part-dokter', true, true, 20).then(function (data) {
                $scope.listDokter = data

             })
            medifirstService.getPart('emr/get-datacombo-part-ruangan-pelayanan', true, true, 20).then(function (data) {
                $scope.listRuang = data
            
             })
  
           medifirstService.getPart('emr/get-datacombo-part-diagnosa', true, true, 20).then(function (data) {
                $scope.listDiagnosa = data
            
             })  
            medifirstService.getPart("sysadmin/general/get-datacombo-jenispegawai-cppt", true, true, 20).then(function (data) {
                    $scope.listJenisPegawai = data;
            });

            // medifirstService.get("emr/get-antrian-pasien-norec/" + noregistrasifk).then(function (e) {
            //     var antrianPasien = e.data.result;
            //     $scope.item.obj[32110786] = antrianPasien.namapasien;
            //     $scope.item.obj[32110788] = antrianPasien.nocm;
            //     $scope.item.obj[32110791] = new Date(moment(antrianPasien.tgllahir).format('YYYY-MM-DD'));
            //     $scope.item.obj[32110792] = antrianPasien.jeniskelamin;
            //     $scope.item.obj[422707] = antrianPasien.alamatlengkap;
            //     if (antrianPasien.jeniskelamin == 'PEREMPUAN') {
            //         $scope.item.obj[422702] = false;
            //         $scope.item.obj[422703] = true;
            //     } else {
            //         $scope.item.obj[422702] = true;
            //         $scope.item.obj[422703] = false;
            //     }
            //     $scope.item.obj[422724] = new Date(moment(antrianPasien.tglregistrasi).format('YYYY-MM-DD HH:mm'));
            //     if (antrianPasien.iddpjp != null && antrianPasien.dokterdpjp != null) {
            //         $scope.item.obj[422790] = {
            //             value: antrianPasien.iddpjp,
            //             text: antrianPasien.dokterdpjp
            //         }
            //     }
            //     if (antrianPasien.objectruanganfk != null && antrianPasien.namaruangan != null) {
            //         $scope.item.obj[422723] = {
            //             value: antrianPasien.objectruanganfk,
            //             text: antrianPasien.namaruangan
            //         }
            //     }
            //     $scope.item.obj[422788] = $scope.now;
            // })
            
    

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
            var chekedd = false

            medifirstService.get("emr/get-emr-transaksi-detail?noemr=" + nomorEMR + "&emrfk=" + $scope.cc.emrfk, true).then(function (dat) {
                $scope.item.obj = []
                $scope.item.obj2 = []
             
                dataLoad = dat.data.data
           
                // console.log(dataLoad)
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
                        if (dataLoad[i].type == "datetime2") {
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
                        if (dataLoad[i].type == "checkboxtextarea") {
                            $scope.item.obj[dataLoad[i].emrdfk] = dataLoad[i].value
                            $scope.item.obj2[dataLoad[i].emrdfk] = true
                        }
                        if (dataLoad[i].type == "textarea") {
                            $scope.item.obj[dataLoad[i].emrdfk] = dataLoad[i].value
                        }
                        if (dataLoad[i].type == "combobox2") {
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
                   
                        if (dataLoad[i].type == "combobox3") {
                            var str = dataLoad[i].value
                            if(str != undefined){
                                var res = str.split("~");
                                // $scope.item.objcbo[dataLoad[i].emrdfk]= {value:res[0],text:res[1]}
                                $scope.item.obj[dataLoad[i].emrdfk] = { value: res[0], text: res[1] }        
                            }   
                          

                        }

                    }

                }
            })

            medifirstService.get("emr/get-emr-transaksi-detail-img?noemr=" + nomorEMR + "&emrfk=" + $scope.cc.emrfk, true).then(function (dat) {
                // $scope.item.objImg =[]
                var dataImg = dat.data.data
                for (var i = 0; i <= dataImg.length - 1; i++) {
                    if (parseFloat($scope.cc.emrfk) == dataImg[i].emrfk && paramsIndex == dataImg[i].index) {
                        $scope.item.objImg[dataImg[i].emrdfk] = dataImg[i].image
                      }

                }
            })
        
           
            

            $scope.Batal =function(){
                document.getElementById("formFile").reset()
                $scope.item.obj=[]
                $scope.item.objImg =[]
            }
            $scope.kembali = function () {
                $rootScope.showRiwayat()
            }

            $scope.Save = function () {
                var arrobj = Object.keys($scope.item.obj);
                var arrobjImg = Object.keys($scope.item.objImg);
                var arrSaveImg = [];
                var arrSave = [];   
                
                if($scope.item.objImg[32110797].substring(17, 20) == 'pdf'){
                    toastr.warning('File harus jpg/jpeg/png/svg','Peringatan')
                    return
                }

                if($scope.item.objImg[32110798].substring(17, 20) == 'pdf'){
                    toastr.warning('File harus jpg/jpeg/png/svg','Peringatan')
                    return
                }

                if($scope.item.objImg[32110799].substring(17, 20) == 'pdf'){
                    toastr.warning('File harus jpg/jpeg/png/svg','Peringatan')
                    return
                }

                if($scope.item.objImg[32110800].substring(17, 20) == 'pdf'){
                    toastr.warning('File harus jpg/jpeg/png/svg','Peringatan')
                    return
                }
                
                // const url = medifirstService.post('emr/post-imageEKG');
                // const file = document.getElementById("fileEKG").files[0];
                // var formData = new FormData();
                // formData.append("fileEKG", file);
                // var authorization;
                var arrobjImg = Object.keys($scope.item.objImg)
                for (var i = arrobjImg.length - 1; i >= 0; i--) {
                    arrSaveImg.push({ id: arrobjImg[i], values: $scope.item.objImg[parseInt(arrobjImg[i])] })
                }

                // fetch(url, {
                //     method: 'POST',
                //     body: formData,
                //     headers: {
                //         'X-AUTH-TOKEN': authorization
                //     }
				// })
                // .then(response => {
                // response.json()
                // });

                for (var i = arrobj.length - 1; i >= 0; i--) {
                    if ($scope.item.obj[parseInt(arrobj[i])] instanceof Date)
                        $scope.item.obj[parseInt(arrobj[i])] = moment($scope.item.obj[parseInt(arrobj[i])]).format('YYYY-MM-DD HH:mm')
                     // $scope.item.obj[parseInt(arrobj[i])] = moment($scope.item.obj[parseInt(arrobj[i])]).format('HH:mm')
                    arrSave.push({ id: arrobj[i], values: $scope.item.obj[parseInt(arrobj[i])] })
                }
                $scope.cc.index = $state.params.index;
                $scope.cc.jenisemr = 'asesmen'
                var jsonSave = {
                    head: $scope.cc,
                    data: arrSave,
                    dataimg: arrSaveImg
                }
                medifirstService.post('emr/save-emr-dinamis', jsonSave).then(function (e) {

                    $rootScope.loadRiwayat()
                    medifirstService.postLogging('EMR', 'norec emrpasien_t', e.data.data.norec,  
                    'Identifikasi Bayi' + ' dengan No EMR - ' +e.data.data.noemr +  ' pada No Registrasi ' 
                    + $scope.cc.noregistrasi).then(function (res) {
                    })
                      $scope.cc.norec_emr = e.data.data.noemr
                 
                });
            }
           
             $scope.onSelect1 = function (e) {
                $("#preview1").empty();
                for (var i = 0; i < e.files.length; i++) {
                    var file = e.files[i].rawFile;
                    file
                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function (readerEvt) {
                       //     debugger;
                            var binaryString = readerEvt.target.result;
                    
                           $scope.item.objImg[32110797] = binaryString;
                         
                        }
                        reader.onloadend = function () {
                            $("<img img class=\"gambarAset \" style=\"min-width: 300px;\">").attr("src", this.result).appendTo($("#preview1"));
                        };

                        reader.readAsDataURL(file);
                    }
                }
            }
            $scope.onSelect2 = function (e) {
                $("#preview2").empty();
                for (var i = 0; i < e.files.length; i++) {
                    var file = e.files[i].rawFile;

                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function (readerEvt) {
                       //     debugger;
                            var binaryString = readerEvt.target.result;
                    
                             $scope.item.objImg[32110798] = binaryString;
                        }
                        reader.onloadend = function () {
                            $("<img img class=\"gambarAset \" style=\"min-width: 300px;\">").attr("src", this.result).appendTo($("#preview2"));
                        };

                        reader.readAsDataURL(file);
                    }
                }
            }
            $scope.onSelect3 = function (e) {
                $("#preview3").empty();
                for (var i = 0; i < e.files.length; i++) {
                    var file = e.files[i].rawFile;

                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function (readerEvt) {
                       //     debugger;
                            var binaryString = readerEvt.target.result;
                                $scope.item.objImg[32110799] = binaryString;
                        }
                        reader.onloadend = function () {
                            $("<img img class=\"gambarAset \" style=\"min-width: 300px;\">").attr("src", this.result).appendTo($("#preview3"));
                        };

                        reader.readAsDataURL(file);
                    }
                }
            }

            $scope.onSelect4 = function (e) {
                $("#preview4").empty();
                for (var i = 0; i < e.files.length; i++) {
                    var file = e.files[i].rawFile;

                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function (readerEvt) {
                       //     debugger;
                            var binaryString = readerEvt.target.result;
                                $scope.item.objImg[32110800] = binaryString;
                        }
                        reader.onloadend = function () {
                            $("<img img class=\"gambarAset \" style=\"min-width: 300px;\">").attr("src", this.result).appendTo($("#preview4"));
                        };

                        reader.readAsDataURL(file);
                    }
                }
            }

        }
    ]);
});
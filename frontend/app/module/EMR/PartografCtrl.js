define(['initialize', 'Configuration'], function (initialize, config) {
    'use strict';
    initialize.controller('PartografCtrl', ['$q', '$rootScope', '$scope', 'ModelItem', '$state', 'CacheHelper', 'DateHelper', 'MedifirstService',
        function ($q, $rootScope, $scope, ModelItem, $state, cacheHelper, dateHelper, medifirstService) {

            var paramsIndex = $state.params.index ? parseInt($state.params.index ): null
            $scope.noCM = $state.params.noCM;
            $scope.tombolSimpanVis = true
            $scope.noRecPap = cacheHelper.get('noRecPap');
            $scope.totalSkor = 0
            $scope.totalSkor2 = 0
            $scope.cc = {}
            var nomorEMR = '-'
            $scope.cc.emrfk = 290071
            var dataLoad = []
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
            $scope.cetakPdf = function () {
                if (norecEMR == '') return
                var local = JSON.parse(localStorage.getItem('profile'));
                var nama = medifirstService.getPegawaiLogin().namalengkap;
                window.open(config.baseApiBackend + 'report/cetak-partograf?nocm='
                    + $scope.cc.nocm + '&norec_apd=' + $scope.cc.norec + '&emr=' + norecEMR
                    + '&emrfk=' + $scope.cc.emrfk
                    + '&kdprofile=' + local.id
                    + '&index=' + paramsIndex
                    + '&nama=' + nama, '_blank');
            }
            medifirstService.getPart('emr/get-datacombo-part-pegawai', true, true, 20).then(function (data) {
                $scope.listPegawai = data
            })
            medifirstService.getPart('emr/get-datacombo-part-kelas', true, true, 20).then(function (data) {
                $scope.listKelas = data

            })
            medifirstService.getPart('emr/get-datacombo-part-ruangan-pelayanan', true, true, 20).then(function (data) {
                $scope.listRuang = data
            })
            medifirstService.getPart('emr/get-datacombo-part-dokter', true, true, 20).then(function (data) {
                $scope.listDokter = data
            })

            $scope.tekananDarah = [
                // {
                //     nilai: 10,
                //     nilai2: 30
                // }, {
                //     nilai: 10,
                //     nilai2: 30
                // },
            ]
            var seriesSuhu = []
            var seriesNadi = []
            var seriesTekananDarah = []
            var seriesJantung = []
            var seriesServiks = []
            var seriesKontraksi = []
            loadChart()
            function loadChart() {
                $("#chartNadi").kendoChart({
                    // title: {
                    //     text: "Tanda Tanda Vital"
                    // },
                    // legend: {
                    //     position: "top"
                    // },
                    // series: [
                    //     {
                    //         type: "line",
                    //         data: sesiesSuhu,
                    //         name: "Suhu",
                    //         color: "#ec5e0a",
                    //         // axis: "S"
                    //     }, {
                    //         type: "line",
                    //         data: seriesNadi,
                    //         name: "Nadi",
                    //         color: "#4e4141",
                    //         // axis: "N"
                    //     }

                    // ],
                    // valueAxes: [{
                    //     name: "Suhu",
                    //     title: { text: "S" },
                    //     min:     ,
                    //     max: 42
                    // }, {
                    //     name: "Nadi",
                    //     title: { text: "N" },
                    //     min: 40,
                    //     max: 180,
                    //     majorUnit: 20
                    // }],
                    title: {
                        text: "Grafik Denyut Jantung Bayi"
                    },
                    legend: {
                        position: "top"
                    },
                    series: [
                        //     {
                        //     type: "line",
                        //     data: sesiesSuhu,
                        //     name: "Suhu",
                        //     color: "#ec5e0a",

                        // }, 
                        {
                            type: "line",
                            data: seriesJantung,
                            name: "DENYUT JANTUNG",
                            color: "#fc0303",

                        }],
                    valueAxes: [{
                        title: { text: "DJ" },
                        min: 80,
                        max: 200,
                        majorUnit: 20
                    },
                        //  {
                        //     name: "S",
                        //     title: { text: "S" },
                        //     min: 35,
                        //     max: 42,

                        // }
                    ],
                    categoryAxis: {
                        // categories: ['P','S','M', 'P','S','M', 'P','S','M', 'P','S','M', 'P','S','M', 'P','S','M', 'P','S','M'],
                        categories: ['1','2','1', '2','1','2', '1','2','1', '2','1','2', '1','2','1', '2','1','2', '1','2','1','2','1','2','1','2','1','2','1','2','1','2'],
                        // categories: ["Mon", "Tue", "Wed", "Thu", "Fri"],

                        axisCrossingValues: [0, 35]
                    }
                });

                $("#chartSuhu").kendoChart({
                    // title: {
                    //     text: "Tanda Tanda Vital"
                    // },
                    // legend: {
                    //     position: "top"
                    // },
                    // series: [
                    //     {
                    //         type: "line",
                    //         data: sesiesSuhu,
                    //         name: "Suhu",
                    //         color: "#ec5e0a",
                    //         // axis: "S"
                    //     }, {
                    //         type: "line",
                    //         data: seriesNadi,
                    //         name: "Nadi",
                    //         color: "#4e4141",
                    //         // axis: "N"
                    //     }

                    // ],
                    // valueAxes: [{
                    //     name: "Suhu",
                    //     title: { text: "S" },
                    //     min:     ,
                    //     max: 42
                    // }, {
                    //     name: "Nadi",
                    //     title: { text: "N" },
                    //     min: 40,
                    //     max: 180,
                    //     majorUnit: 20
                    // }],
                    title: {
                        text: "Grafik"
                    },
                    legend: {
                        position: "top"
                    },
                    series: [{
                        type: "line",
                        data: seriesServiks,
                        name: "SERVIKS",
                        color: "#0328fc",

                    }
                    ,{
                        type: "line",
                        data: seriesKontraksi,
                        name: "KONTRAKSI",
                        color: "#4e4141",

                    }
                    ],
                    valueAxes: [
                        //     {
                        //     title: { text: "N" },
                        //     min: 40,
                        //     max: 180,
                        //     majorUnit: 20
                        // }, 
                        {
                            name: "S",
                            title: { text: "S" },
                            min: 0,
                            max: 10,
                            majorUnit: 1,
                        },
                        {
                            name: "K",
                            title: { text: "K" },
                            min: 0,
                            max: 10,
                            majorUnit: 1,
                        }
                    ],
                    categoryAxis: {
                        // categories: [ 'P','S','M', 'P','S','M', 'P','S','M', 'P','S','M', 'P','S','M', 'P','S','M', 'P','S','M'],
                        categories: ['1','2','1', '2','1','2', '1','2','1', '2','1','2', '1','2','1', '2','1','2', '1','2','1','2','1','2','1','2','1','2','1','2','1','2'],
                        // categories: ["Mon", "Tue", "Wed", "Thu", "Fri"],

                        axisCrossingValues: [0, 35]
                    }
                });

                $("#chartTekanan").kendoChart({
                    // title: {
                    //     text: "Tanda Tanda Vital"
                    // },
                    // legend: {
                    //     position: "top"
                    // },
                    // series: [
                    //     {
                    //         type: "line",
                    //         data: sesiesSuhu,
                    //         name: "Suhu",
                    //         color: "#ec5e0a",
                    //         // axis: "S"
                    //     }, {
                    //         type: "line",
                    //         data: seriesNadi,
                    //         name: "Nadi",
                    //         color: "#4e4141",
                    //         // axis: "N"
                    //     }

                    // ],
                    // valueAxes: [{
                    //     name: "Suhu",
                    //     title: { text: "S" },
                    //     min:     ,
                    //     max: 42
                    // }, {
                    //     name: "Nadi",
                    //     title: { text: "N" },
                    //     min: 40,
                    //     max: 180,
                    //     majorUnit: 20
                    // }],
                    title: {
                        text: "Grafik"
                    },
                    legend: {
                        position: "top"
                    },
                    series: [{
                        type: "line",
                        data: seriesNadi,
                        name: "NADI",
                        color: "#0328fc",

                    }
                    ,{
                        type: "line",
                        data: seriesTekananDarah,
                        name: "TEKANAN DARAH",
                        color: "#4e4141",

                    }
                    ],
                    valueAxes: [
                        //     {
                        //     title: { text: "N" },
                        //     min: 40,
                        //     max: 180,
                        //     majorUnit: 20
                        // }, 
                        {
                            name: "S",
                            title: { text: "S" },
                            min: 60,
                            max: 160,
                            majorUnit: 10,
                        },
                        {
                            name: "TD",
                            title: { text: "TD" },
                            min: 60,
                            max: 160,
                            majorUnit: 10,
                        }
                    ],
                    categoryAxis: {
                        // categories: [ 'P','S','M', 'P','S','M', 'P','S','M', 'P','S','M', 'P','S','M', 'P','S','M', 'P','S','M'],
                        categories: ['1','2','1', '2','1','2', '1','2','1', '2','1','2', '1','2','1', '2','1','2', '1','2','1','2','1','2','1','2','1','2','1','2','1','2'],
                        // categories: ["Mon", "Tue", "Wed", "Thu", "Fri"],

                        axisCrossingValues: [0, 35]
                    }
                });

                // $("#chartSuhu2").kendoChart({
                //     // title: {
                //     //     text: "Tanda Tanda Vital"
                //     // },
                //     // legend: {
                //     //     position: "top"
                //     // },
                //     // series: [
                //     //     {
                //     //         type: "line",
                //     //         data: sesiesSuhu,
                //     //         name: "Suhu",
                //     //         color: "#ec5e0a",
                //     //         // axis: "S"
                //     //     }, {
                //     //         type: "line",
                //     //         data: seriesNadi,
                //     //         name: "Nadi",
                //     //         color: "#4e4141",
                //     //         // axis: "N"
                //     //     }

                //     // ],
                //     // valueAxes: [{
                //     //     name: "Suhu",
                //     //     title: { text: "S" },
                //     //     min:     ,
                //     //     max: 42
                //     // }, {
                //     //     name: "Nadi",
                //     //     title: { text: "N" },
                //     //     min: 40,
                //     //     max: 180,
                //     //     majorUnit: 20
                //     // }],
                //     title: {
                //         text: "Grafik Suhu 2"
                //     },
                //     legend: {
                //         position: "top"
                //     },
                //     series: [{
                //         type: "line",
                //         data: sesiesSuhu,
                //         name: "Suhu",
                //         color: "#0328fc",

                //     }
                //         // , {
                //         //     type: "line",
                //         //     data: seriesNadi,
                //         //     name: "Nadi",
                //         //     color: "#4e4141",

                //         // }
                //     ],
                //     valueAxes: [
                //         //     {
                //         //     title: { text: "N" },
                //         //     min: 40,
                //         //     max: 180,
                //         //     majorUnit: 20
                //         // }, 
                //         {
                //             name: "S",
                //             title: { text: "S" },
                //             min: 32,
                //             max: 42,
                //             majorUnit:0.5 
                //         }
                //     ],
                //     categoryAxis: {
                //         categories: [ 'P','S','M', 'P','S','M', 'P','S','M', 'P','S','M', 'P','S','M', 'P','S','M', 'P','S','M'],
                //         // categories: ["Mon", "Tue", "Wed", "Thu", "Fri"],

                //         axisCrossingValues: [0, 35]
                //     }
                // });
            }
            $scope.listData1 = []
            $scope.listData2 = []
            $scope.listTanggal = []
            $scope.listTanggal2 = []
            $scope.listSuhu = []
            $scope.listNadi = []
            $scope.listTekananDarah = []
            $scope.listJantung = []
            $scope.listServiks = []
            $scope.listKontraksi = []
            medifirstService.get("emr/get-rekam-medis-dynamic?emrid=" + $scope.cc.emrfk).then(function (e) {

                var datas = e.data.kolom4

                var detail = []
                var arrayAskep = []
                var arrayAskep2 = []
                var arrayParenteral = []
                var arrayParenteral2 = []
                var arrayParenteral3 = []
                var sama = false
                for (let i = 0; i < datas.length; i++) {
                    const element = datas[i];
                    sama = false
                    if (element.kodeexternal == 'time') {
                        $scope.listTanggal.push({ id: element.id })
                    }
                    if (element.kodeexternal == 'time2') {
                        $scope.listTanggal2.push({ id: element.id })
                    }
                    if (element.kodeexternal == 'pernafasan' && element.namaexternal == 'Suhu') {
                        $scope.listSuhu.push({ id: element.id })
                    }
                    if (element.kodeexternal == 'pernafasan' && element.namaexternal == 'Nadi') {
                        $scope.listNadi.push({ id: element.id })
                    }
                    if (element.kodeexternal == 'pernafasan2' && element.namaexternal == 'Suhu2') {
                        $scope.listSuhu.push({ id: element.id })
                    }
                    if (element.kodeexternal == 'pernafasan2' && element.namaexternal == 'Nadi2') {
                        $scope.listNadi.push({ id: element.id })
                    }
                    if (element.kodeexternal == 'pernafasan' && element.namaexternal == 'Jantung') {
                        $scope.listJantung.push({ id: element.id })
                    }
                    if (element.kodeexternal == 'pernafasan' && element.namaexternal == 'Pembukaan Serviks') {
                        $scope.listServiks.push({ id: element.id })
                    }
                    if (element.kodeexternal == 'pernafasan2' && element.namaexternal == 'Jantung2') {
                        $scope.listJantung.push({ id: element.id })
                    }
                    if (element.kodeexternal == 'pernafasan2' && element.namaexternal == 'Pembukaan Serviks2') {
                        $scope.listServiks.push({ id: element.id })
                    }
                    if (element.kodeexternal == 'pernafasan' && element.namaexternal == 'Kontraksi') {
                        $scope.listKontraksi.push({ id: element.id });
                    }
                    if (element.kodeexternal == 'pernafasan2' && element.namaexternal == 'Kontraksi2') {
                        $scope.listKontraksi.push({ id: element.id });
                    }
                    if (element.kodeexternal == 'pernafasan' && element.namaexternal == 'Tekanan Darah') {
                        $scope.listTekananDarah.push({ id: element.id });
                    }
                    if (element.kodeexternal == 'pernafasan2' && element.namaexternal == 'Tekanan Darah2') {
                        $scope.listTekananDarah.push({ id: element.id });
                    }
                    // ARRAY GEJALA
                    if (element.kodeexternal == 'pernafasan') {
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
                    }// ARRAY GEJALA
                    if (element.kodeexternal == 'pernafasan2') {
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
                    if (element.kodeexternal == 'parenteral') {
                        for (let z = 0; z < arrayParenteral.length; z++) {
                            const element2 = arrayParenteral[z];
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
                            arrayParenteral.push(datax)
                        }
                    }
                    //END ARRAY GEJALA
                    // ARRAY GEJALA
                    if (element.kodeexternal == 'asesmen') {
                        for (let z = 0; z < arrayParenteral3.length; z++) {
                            const element2 = arrayParenteral3[z];
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
                            arrayParenteral3.push(datax)
                        }
                    }
                    //END ARRAY GEJALA


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

                var gejalaKosong1 = []
                for (let k = 0; k < arrayParenteral.length; k++) {
                    const element = arrayParenteral[k];
                    for (let l = 0; l < datas.length; l++) {
                        const element2 = datas[l];
                        if (element2.namaexternal == element.namaexternal) {
                            gejalaKosong1.push(element2)
                            element.details = gejalaKosong1
                        } else {
                            gejalaKosong1 = []
                        }
                    }
                }
                $scope.listData2 = arrayParenteral
                // ARRAY GEJALA
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
                $scope.listData3 = arrayAskep2

                var gejalaKosong1 = []
                for (let k = 0; k < arrayParenteral2.length; k++) {
                    const element = arrayParenteral2[k];
                    for (let l = 0; l < datas.length; l++) {
                        const element2 = datas[l];
                        if (element2.namaexternal == element.namaexternal) {
                            gejalaKosong1.push(element2)
                            element.details = gejalaKosong1
                        } else {
                            gejalaKosong1 = []
                        }
                    }
                }
                $scope.listData4 = arrayParenteral2

                var gejalaKosong1 = []
                for (let k = 0; k < arrayParenteral3.length; k++) {
                    const element = arrayParenteral3[k];
                    for (let l = 0; l < datas.length; l++) {
                        const element2 = datas[l];
                        if (element2.namaexternal == element.namaexternal) {
                            gejalaKosong1.push(element2)
                            element.details = gejalaKosong1
                        } else {
                            gejalaKosong1 = []
                        }
                    }
                }
                $scope.listData5 = arrayParenteral3
                onloadchart()
            })

            var cacheNomorEMR = cacheHelper.get('cacheNomorEMR');
            if (cacheNomorEMR != undefined) {
                nomorEMR = cacheNomorEMR[0]
                $scope.cc.norec_emr = nomorEMR
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
                for (var i = 0; i <= dataLoad.length - 1; i++) {
                    if (parseFloat($scope.cc.emrfk) == dataLoad[i].emrfk && paramsIndex== dataLoad[i].index) {

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
                onloadchart()
            })
            function onloadchart(){
                // Chart Jantung
                for (let z = 0; z < 16; z++) {
                    var item = $scope.listJantung[z]['id'];
                    seriesJantung[z] = $scope.item.obj[parseFloat(item)]
                }

                // Chart Serviks
                for (let y = 0; y < 16; y++) {
                    var item = $scope.listServiks[y]['id'];
                    seriesServiks[y] = $scope.item.obj[parseFloat(item)]
                }

                // Chart Kontraksi
                for (let a = 0; a < 16; a++) {
                    var item = $scope.listKontraksi[a]['id'];
                    seriesKontraksi[a] = $scope.item.obj[parseFloat(item)]
                }

                // Chart Nadi
                for (let a = 0; a < 16; a++) {
                    var item = $scope.listNadi[a]['id'];
                    seriesNadi[a] = $scope.item.obj[parseFloat(item)]
                }

                // Chart TekananDarah
                for (let a = 0; a < 16; a++) {
                    var item = $scope.listTekananDarah[a]['id'];
                    seriesTekananDarah[a] = $scope.item.obj[parseFloat(item)]
                }

                for (let x = 0; x < seriesJantung.length; x++) {

                    if (!isNaN(parseFloat(seriesJantung[x])))
                        seriesJantung[x] = parseFloat(seriesJantung[x])
                    else
                        seriesJantung[x] = null
                }
                for (let x = 0; x < seriesServiks.length; x++) {
                    if (!isNaN(parseInt(seriesServiks[x])))
                        seriesServiks[x] = parseInt(seriesServiks[x])
                    else
                        seriesServiks[x] = null
                }
                for (let x = 0; x < seriesKontraksi.length; x++) {
                    if (!isNaN(parseInt(seriesKontraksi[x])))
                        seriesKontraksi[x] = parseFloat(seriesKontraksi[x])
                    else
                        seriesKontraksi[x] = null
                }
                for (let x = 0; x < seriesNadi.length; x++) {
                    if (!isNaN(parseInt(seriesNadi[x])))
                        seriesNadi[x] = parseFloat(seriesNadi[x])
                    else
                        seriesNadi[x] = null
                }
                for (let x = 0; x < seriesTekananDarah.length; x++) {
                    if (!isNaN(parseInt(seriesTekananDarah[x])))
                        seriesTekananDarah[x] = parseFloat(seriesTekananDarah[x])
                    else
                        seriesTekananDarah[x] = null
                }
                loadChart()
                console.log(seriesNadi);
                console.log(seriesTekananDarah);
            }

            $scope.Batal = function () {
                $scope.item.obj = []
            }
            $scope.kembali = function () {
                $rootScope.showRiwayat()
            }

            $scope.Save = function () {

                var arrobj = Object.keys($scope.item.obj)
                var arrSave = []
                for (var i = arrobj.length - 1; i >= 0; i--) {
                    arrSave.push({ id: arrobj[i], values: $scope.item.obj[parseInt(arrobj[i])] })
                }
                $scope.cc.index = $state.params.index
                $scope.cc.jenisemr = 'asesmen'
                var jsonSave = {
                    head: $scope.cc,
                    data: arrSave
                }
                medifirstService.post('emr/save-emr-dinamis', jsonSave).then(function (e) {

                    medifirstService.postLogging('EMR', 'norec emrpasien_t', e.data.data.norec,  
                    'Catatan Grafik Tanda - Tanda Vital ' + ' dengan No EMR - ' +e.data.data.noemr +  ' pada No Registrasi ' 
                    + $scope.cc.noregistrasi).then(function (res) {
                    })
                    var arrobj = Object.keys($scope.item.obj)

                    for (let z = 0; z < 16; z++) {
                        var item = $scope.listJantung[z]['id'];
                        seriesJantung[z] = $scope.item.obj[parseFloat(item)]
                    }
                    for (let z = 0; z < 16; z++) {
                        var item = $scope.listServiks[z]['id'];
                        seriesServiks[z] = $scope.item.obj[parseFloat(item)]
                    }
                    for (let a = 0; a < 16; a++) {
                        var item = $scope.listKontraksi[a]['id'];
                        seriesKontraksi[a] = $scope.item.obj[parseFloat(item)]
                    }
                    for (let a = 0; a < 16; a++) {
                        var item = $scope.listNadi[a]['id'];
                        seriesNadi[a] = $scope.item.obj[parseFloat(item)]
                    }
                    for (let a = 0; a < 16; a++) {
                        var item = $scope.listTekananDarah[a]['id'];
                        seriesTekananDarah[a] = $scope.item.obj[parseFloat(item)]
                    }

                    for (let x = 0; x < seriesJantung.length; x++) {
                        if (!isNaN(parseFloat(seriesJantung[x])))
                            seriesJantung[x] = parseFloat(seriesJantung[x])
                        else
                            seriesJantung[x] = null
                    }
                    for (let x = 0; x < seriesServiks.length; x++) {
                        if (!isNaN(parseInt(seriesServiks[x])))
                            seriesServiks[x] = parseInt(seriesServiks[x])
                        else    
                            seriesServiks[x] = null
                    }
                    for (let x = 0; x < seriesKontraksi.length; x++) {
                        if (!isNaN(parseInt(seriesKontraksi[x])))
                            seriesKontraksi[x] = parseFloat(seriesKontraksi[x])
                        else
                            seriesKontraksi[x] = null
                    }
                    for (let x = 0; x < seriesNadi.length; x++) {
                        if (!isNaN(parseInt(seriesNadi[x])))
                            seriesNadi[x] = parseFloat(seriesNadi[x])
                        else
                            seriesNadi[x] = null
                    }
                    for (let x = 0; x < seriesTekananDarah.length; x++) {
                        if (!isNaN(parseInt(seriesTekananDarah[x])))
                            seriesTekananDarah[x] = parseFloat(seriesTekananDarah[x])
                        else
                            seriesTekananDarah[x] = null
                    }
                    loadChart()
                    medifirstService.postLogging('EMR', 'norec emrpasien_t', e.data.data.norec,
                    'Kurva Harian' + ' dengan No EMR - ' + e.data.data.noemr + ' pada No Registrasi '
                    + $scope.cc.noregistrasi).then(function (res) {
                    })
                    $rootScope.loadRiwayat()
                    var arrStr = {
                        0: e.data.data.noemr
                    }
                    cacheHelper.set('cacheNomorEMR', arrStr);
                });
            }

            $scope.listBarthel = [
                {
                    id: 1,
                    detail: [
                        { id: 1000555, type: 'textbox' },
                        { id: 1000556, type: 'textarea' },
                        { id: 1000557, type: 'textarea' },
                        { id: 1000558, type: 'textarea' },
                        { id: 1000559, type: 'textarea' },
                        { id: 1000560, type: 'textarea' },
                        { id: 1000561, type: 'textarea' },
                        { id: 1000562, type: 'textarea' },
                        { id: 1000563, type: 'textarea' },
                    ]
                },
                {
                    id: 2,
                    detail: [
                        { id: 1000564, type: 'textbox' },
                        { id: 1000565, type: 'textarea' },
                        { id: 1000566, type: 'textarea' },
                        { id: 1000567, type: 'textarea' },
                        { id: 1000568, type: 'textarea' },
                        { id: 1000569, type: 'textarea' },
                        { id: 1000570, type: 'textarea' },
                        { id: 1000571, type: 'textarea' },
                        { id: 1000572, type: 'textarea' },
                    ]
                },
                {
                    id: 3,
                    detail: [
                        { id: 1000573, type: 'textbox' },
                        { id: 1000574, type: 'textarea' },
                        { id: 1000575, type: 'textarea' },
                        { id: 1000576, type: 'textarea' },
                        { id: 1000577, type: 'textarea' },
                        { id: 1000578, type: 'textarea' },
                        { id: 1000579, type: 'textarea' },
                        { id: 1000580, type: 'textarea' },
                        { id: 1000581, type: 'textarea' },
                    ]
                },
                {
                    id: 4,
                    detail: [
                        { id: 1000582, type: 'textbox' },
                        { id: 1000583, type: 'textarea' },
                        { id: 1000584, type: 'textarea' },
                        { id: 1000585, type: 'textarea' },
                        { id: 1000586, type: 'textarea' },
                        { id: 1000587, type: 'textarea' },
                        { id: 1000588, type: 'textarea' },
                        { id: 1000589, type: 'textarea' },
                        { id: 1000590, type: 'textarea' },
                    ]
                },
                {
                    id: 5,
                    detail: [
                        { id: 1000591, type: 'textbox' },
                        { id: 1000592, type: 'textarea' },
                        { id: 1000593, type: 'textarea' },
                        { id: 1000594, type: 'textarea' },
                        { id: 1000595, type: 'textarea' },
                        { id: 1000596, type: 'textarea' },
                        { id: 1000597, type: 'textarea' },
                        { id: 1000598, type: 'textarea' },
                        { id: 1000599, type: 'textarea' },
                    ]
                },
                {
                    id: 6,
                    detail: [
                        { id: 1000600, type: 'textbox' },
                        { id: 1000601, type: 'textarea' },
                        { id: 1000602, type: 'textarea' },
                        { id: 1000603, type: 'textarea' },
                        { id: 1000604, type: 'textarea' },
                        { id: 1000605, type: 'textarea' },
                        { id: 1000606, type: 'textarea' },
                        { id: 1000607, type: 'textarea' },
                        { id: 1000608, type: 'textarea' },
                    ]
                }
            ]
        }
    ]);
});
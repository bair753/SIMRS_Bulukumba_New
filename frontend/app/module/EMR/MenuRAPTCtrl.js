define(['initialize'], function (initialize) {
  'use strict';
  initialize.controller('MenuRAPTCtrl', ['$rootScope', '$scope', '$state', 'CacheHelper', 'MedifirstService',
    function ($rootScope, $scope, $state, cacheHelper, medifirstService) {
      $state.params.index = $state.params.index != '' ? $state.params.index : 1;
      $state.params.idEMR = $state.params.idEMR != '' ? $state.params.idEMR : 290019;
      $scope.activeMenuTransfer = $state.current.name + $state.params.index;
      $scope.dataVOloaded = true;
      $rootScope.showMenu = true;
      $rootScope.showMenuDetail = false;
      let incrementIdx = 1
      $scope.lisIndex = [{
        index: incrementIdx,
        url: $state.current.name
      }]
      var nomorEMR = '-'
      var EMRFK = $state.params.idEMR;
      $scope.URLFORM = $state.current.name;
      var chacePeriode = cacheHelper.get('cacheNomorEMR');
      if (chacePeriode != undefined) {
        nomorEMR = chacePeriode[0]
        medifirstService.get("emr/get-emr-transaksi-detail-index?noemr=" + nomorEMR + "&emrfk=" + EMRFK, true).then(function (dat) {
          if (dat.data.data.length > 0) {
            $scope.lisIndex = []
            // let incrementIdx = 1
            for (let x = 0; x < dat.data.data.length; x++) {
              const element = dat.data.data[x];
              if (element.index == null) {
                element.index = 1
              }
              // incrementIdx = incrementIdx+ parseInt(element.index) 
              $scope.lisIndex.push({ index: parseInt(element.index), url: $state.current.name })
            }
          }
        })
      }

      $scope.nav = function (state, index) {
        $scope.activeMenuTransfer = state + index.toString();
        localStorage.setItem('activeMenuTransfer', state);
        $state.go(state, {
          index: index,
          idEMR: EMRFK
        });
      }
      $scope.tabIndex = function (tipe) {
        if (tipe == '+') {
          // incrementIdx = incrementIdx + 1
          $scope.lisIndex.push({ index: $scope.lisIndex.length + 1, url: $state.current.name })
        } else {
          // incrementIdx = incrementIdx - 1
          $scope.lisIndex.splice($scope.lisIndex.length - 1, 1)
        }

      }
    }
  ]);
});
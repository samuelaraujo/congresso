angular.module('app').service('loteService', ['$rootScope', '$http', function($rootScope, $http) {

  var self = this;

  this.load = function(){
    $http.get('/controller/guest/lote/get')
    .then(function(response){
        $rootScope.$broadcast("lotes", response.data.results);
    });
  };

}]);

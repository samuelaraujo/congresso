angular.module('app').service('deficienciaService', ['$rootScope', '$http', function($rootScope, $http) {

  var self = this;

  this.load = function(){
    $http.get('/controller/guest/deficiencia/get')
    .then(function(response){
        $rootScope.$broadcast("deficiencias", response.data.results);
    });
  };

}]);

angular.module('app').service('usuarioService', ['$rootScope', '$timeout', '$http' , function ($rootScope, $timeout, $http) {
  var self = this

  this.set = function (usuario) {
    self.usuario = usuario
    $rootScope.$broadcast('usuario', usuario)
  }

  this.checkEmail = function(email){
    $rootScope.$broadcast("usuario:email", "loading");
    $http.post('/controller/guest/usuario/checkemail', {email: email})
      .then(function(response){
          $rootScope.$broadcast("usuario:email", "found");
      },
      function(response){
        if(response && response.data.error){
          $rootScope.$broadcast("usuario:email", "notfound");
        }
      });
  };

  this.checkcpf = function(cpf){
    if(!cpf || cpf.length < 11){
      return;
    }
    $rootScope.$broadcast("usuario:cpf", "loading");
    $http.post('/controller/guest/usuario/checkcpf', {cpf: cpf})
    .then(function(response){
      $rootScope.$broadcast("usuario:cpf", "found");
    },function(response){
      if(response.data.error){
        $rootScope.$broadcast("usuario:cpf", "notfound");
      }
    });
  };

  this.save = function(){
    $http.post('/controller/guest/usuario/create', self.usuario)
    .then(function(response){
      $rootScope.$broadcast("usuario:save", response.data);
    }, function(response){
      $rootScope.$broadcast("usuario:save", response.data);
    });
  };

  this.session = function(){
    $http.post('/controller/guest/pagamento/getsession')
    .then(function(response){
      $rootScope.$broadcast("usuario:session", response.data);
    }, function(response){
      $rootScope.$broadcast("usuario:session", response.data);
    });
  };

}]);

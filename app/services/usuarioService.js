angular.module('app').service('usuarioService', ['$rootScope', '$timeout', '$http' , function ($rootScope, $timeout, $http) {
  var self = this

  this.set = function (usuario) {
    self.usuario = usuario
    $rootScope.$broadcast('usuario', usuario)
  }

  // this.checkEmail = function(email){
  //   $rootScope.$broadcast("usuario:email", "loading");
  //   $http.post('/controller/guest/usuario/checkemail', {email: email})
  //     .then(function(response){
  //         $rootScope.$broadcast("usuario:email", "found");
  //     },
  //     function(response){
  //       if(response && response.data.error){
  //         $rootScope.$broadcast("usuario:email", "notfound");
  //       }
  //     });
  // };

  // this.checkcpfcnpj = function(cpfcnpj){
  //   if(!cpfcnpj || cpfcnpj.length < 11){
  //     return;
  //   }
  //   $rootScope.$broadcast("estabelecimento:cpfcnpj", "loading");
  //   $http.post('/controller/guest/estabelecimento/checkcpfcnpj', {cpfcnpj: cpfcnpj})
  //   .then(function(response){
  //     $rootScope.$broadcast("estabelecimento:cpfcnpj", "found");
  //   },function(response){
  //     if(response.data.error){
  //       $rootScope.$broadcast("estabelecimento:cpfcnpj", "notfound");
  //     }
  //   });
  // };

  // this.save = function(){
  //   $http.post('/controller/guest/estabelecimento/create', self.estabelecimento)
  //   .then(function(response){
  //     $rootScope.$broadcast("estabelecimento:save", response.data);
  //   }, function(response){
  //     $rootScope.$broadcast("estabelecimento:save", response.data);
  //   });
  // };

}]);

'use strict';

window.app = angular.module('app', [
  'ng',
  'ngResource',
  'ngRoute',
  'ui.bootstrap',
  'oc.lazyLoad',
  'ui.utils.masks',
  'idf.br-filters'
]);

/* configuration and routs */
angular.module('app').config(['$routeProvider','$locationProvider',  function($routeProvider,$locationProvider) {
  
  //remove the # in URLs
  $locationProvider.html5Mode(true);

  $routeProvider
    .when('/', {
      templateUrl: 'views/home.html',
      title: 'home',
      resolve: {
        lazyTestCtrl: ['$ocLazyLoad', function($ocLazyLoad) {
          return $ocLazyLoad.load({
            name: 'app',
            files: [
            ]
          });
        }]
      }
    })

    .when('/id/:tab', {
      templateUrl: 'views/login.html',
      title: 'login',
      controller: 'adicionarUsuarioController',
      resolve: {
        lazyTestCtrl: ['$ocLazyLoad', function($ocLazyLoad) {
          return $ocLazyLoad.load({
            name: 'app',
            /*name module(YourModuleApp)*/
            files: [
              'app/services/usuarioService.js', 
              'app/services/estadocidadeService.js', 
              'app/services/deficienciaService.js', 
              'app/services/loteService.js', 
              'app/controllers/usuario/adicionarUsuarioController.js',
              'app/controllers/usuario/pagamentoIngressoController.js',
              'assets/css/bootstrap.css',
              'assets/css/bootstrap-select.css',
              'assets/css/login.css'
            ]
          });
        }]
      }
    })

    .when('/id/:tab/:inscription', {
      templateUrl: 'views/login.html',
      title: 'login',
      controller: 'adicionarUsuarioController',
      resolve: {
        lazyTestCtrl: ['$ocLazyLoad', function($ocLazyLoad) {
          return $ocLazyLoad.load({
            name: 'app',
            /*name module(YourModuleApp)*/
            files: [
              'app/services/usuarioService.js', 
              'app/services/estadocidadeService.js', 
              'app/services/deficienciaService.js', 
              'app/services/loteService.js', 
              'app/controllers/usuario/adicionarUsuarioController.js',
              'app/controllers/usuario/pagamentoIngressoController.js',
              'assets/css/bootstrap.css',
              'assets/css/bootstrap-select.css',
              'assets/css/login.css'
            ]
          });
        }]
      }
    })

  // .when('/cliente/:tab', {
  //   templateUrl: 'views/cliente.html',
  //   title: 'cliente',
  //   controller: 'perfilController',
  //   resolve: {
  //     lazyTestCtrl: ['$ocLazyLoad', function($ocLazyLoad) {
  //       return $ocLazyLoad.load({
  //         name: 'app',
  //         /*name module(YourModuleApp)*/
  //         files: [
  //           'app/services/clienteService.js', 
  //           'app/services/agendamentoService.js',
  //           'app/controllers/cliente/perfilController.js',
  //           'app/controllers/aplicacao/buscaHomeController.js',
  //           'app/controllers/aplicacao/headerController.js',
  //           'assets/css/principal.css'
  //         ]
  //       });
  //     }]
  //   }
  // })

  // .when('/termos-de-uso', {
  //   templateUrl: 'views/termos-de-uso.html',
  //   title: 'termos de uso',
  //   resolve: {
  //     lazyTestCtrl: ['$ocLazyLoad', function($ocLazyLoad) {
  //       return $ocLazyLoad.load({
  //         name: 'app',
  //         name module(YourModuleApp)
  //         files: [
  //           'app/services/clienteService.js',
  //           'assets/css/principal.css', 
  //           'app/controllers/aplicacao/buscaHomeController.js'
  //         ]
  //       });
  //     }]
  //   }
  // })

  // .when('/politica-de-privacidade', {
  //   templateUrl: 'views/politica-de-privacidade.html',
  //   title: 'politica de privacidade',
  //   resolve: {
  //     lazyTestCtrl: ['$ocLazyLoad', function($ocLazyLoad) {
  //       return $ocLazyLoad.load({
  //         name: 'app',
  //         /*name module(YourModuleApp)*/
  //         files: [
  //           'app/services/clienteService.js',
  //           'assets/css/principal.css', 
  //           'app/controllers/aplicacao/buscaHomeController.js'
  //         ]
  //       });
  //     }]
  //   }
  // })

  // .when('/sobre', {
  //   templateUrl: 'views/sobre.html',
  //   title: 'sobre',
  //   resolve: {
  //     lazyTestCtrl: ['$ocLazyLoad', function($ocLazyLoad) {
  //       return $ocLazyLoad.load({
  //         name: 'app',
  //         /*name module(YourModuleApp)*/
  //         files: [
  //           'app/services/clienteService.js', 
  //           'assets/css/principal.css', 
  //           'app/controllers/aplicacao/buscaHomeController.js'
  //         ]
  //       });
  //     }]
  //   }
  // })

  // .when('/faq', {
  //   templateUrl: 'views/faq.html',
  //   title: 'faq',
  //   // controller: 'passwordchangeUserCtrl',
  //   resolve: {
  //     lazyTestCtrl: ['$ocLazyLoad', function($ocLazyLoad) {
  //       return $ocLazyLoad.load({
  //         name: 'app',
  //         /*name module(YourModuleApp)*/
  //         files: [
  //           'app/services/clienteService.js',
  //           'assets/css/principal.css', 
  //           'app/controllers/aplicacao/buscaHomeController.js'
  //         ]
  //       });
  //     }]
  //   }
  // })

  .when('/404', {
      templateUrl: '404.html',
      title: 'error application'
  })

  .otherwise({
      redirectTo: '/404'
  });

}]);

angular.module('app').controller('adicionarUsuarioController', 
['$rootScope', '$scope', '$uibModal', '$location', 'usuarioService', 'estadocidadeService', 'deficienciaService', 'loteService',
function($rootScope, $scope, $uibModal, $location, usuarioService, estadocidadeService, deficienciaService, loteService){

	$scope.usuario = $scope.email = $scope.cpf = {};

	$rootScope.$on('usuario:save', function(event, status) {
    	$scope.status = {
	      loading: (status == 'loading'),
	      success: (status == 'success'),
	      error: (status == 'error')
	    };
	    if(status.error)
	    	$scope.error = status.error;
		if(status.success){
			// document.location = '/plataforma/dashboard';
			console.log('cadastro efetuado com sucesso.');
		}
  	});

  	$rootScope.$on('usuario:session', function(event, status) {
    	console.log(status);
  	});

	$rootScope.$on('usuario:cpf', function(event, status) {
	    $scope.cpf = {
	      	found: (status == "found"),
	      	notfound: (status == "notfound"),
			loading: (status === "loading")
	    };
	});

	$rootScope.$on('usuario:email', function(event, status) {
	    $scope.email = {
	      	found: (status == "found"),
	      	notfound: (status == "notfound"),
			loading: (status === "loading")
	    };
	});

	$rootScope.$on('lotes', function(event, lotes) {
    	$scope.lotes = lotes;
    	if($scope.lotes)
    		$scope.usuario.idingresso = lotes[0].ingresso[0].id;
  	});
	
	$rootScope.$on('paises', function(event, paises) {
    	$scope.paises = paises;
		$scope.usuario.idpais = paises[0].id;
  	});

	$rootScope.$on('estados', function(event, estados) {
    	$scope.estados = estados;
		$scope.usuario.idestado = estados[0].id;
		if($scope.usuario.idestado)
			estadocidadeService.loadCidades($scope.usuario.idestado);
  	});

	$rootScope.$on('cidades', function(event, cidades) {
    	$scope.cidades = cidades;
  	});

  	$rootScope.$on('deficiencias', function(event, deficiencias) {
    	$scope.deficiencias = deficiencias;
    	$scope.usuario.iddeficiencia = deficiencias[0].id;
  	});

	$scope.save = function(){
		usuarioService.session();

		// usuarioService.set($scope.usuario);
		// usuarioService.save();
		// var modalInstance = $uibModal.open({
		// 	templateUrl: 'views/pagamento.html',
		// 	controller: 'pagamentoIngressoController',
		// 	backdrop: 'static',
		// 	size: 'modal-sm',
		// 	keyboard: false,
		// 	resolve: {
		// 		usuario: function(){
		// 			return $scope.usuario;
		// 		}
		// 	}
		// });
	};

 	$scope.loadLote = function(){
		loteService.load();
	};

 	$scope.loadDeficiencia = function(){
		deficienciaService.load();
	};

 	$scope.loadPais = function(){
		estadocidadeService.loadPais();
	};
	
	$scope.loadCidades = function(){
		estadocidadeService.loadCidades($scope.usuario.idestado);
	};

	$scope.loadEstados = function(){
		estadocidadeService.loadEstados();
	};

	$scope.checkEmail = function() {
		usuarioService.checkEmail($scope.usuario.email);
	};

	$scope.checkCpf = function() {
		usuarioService.checkcpf($scope.usuario.cpf);
	};

}]);

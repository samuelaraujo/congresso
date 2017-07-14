$(document).ready(function(){
	var senderHash = undefined;
	var usuarios =	{
		ingresso: clientes.idingresso,
		nome: clientes.nome,
		sobrenome: clientes.sobrenome,
		cpf: clientes.cpf,
		email: clientes.email
	};

	//get session checkout transparent
    app.util.getjson({
        url : "/controller/guest/checkout/getsession",
        method : 'POST',
        contentType : "application/json",
        success: function(response){
          if(response.results.id){
            session = response.results.id;
            PagSeguroDirectPayment.setSessionId(session);
            senderHash = PagSeguroDirectPayment.getSenderHash();
            //billet
            billet();
          }
        },
        error : onError
    });

    function billet(){
    	//params
        var params = {
          senderhash: senderHash,
          usuario: usuarios
        };

        params = JSON.stringify(params);
        app.util.getjson({
			url : "/controller/guest/checkout/billet",
			method : 'POST',
			contentType : "application/json",
			data: params,
			success: function(response){
				if(response.results.codigo){
					//set pagamentos
					pagamentos = {
						codigo: response.results.codigo,
						status: response.results.status,
						descricao: response.results.descricao,
						metodo: response.results.metodo,
						valor: response.results.valor,
						link: response.results.link
					};

					//params
					var params = {
						pagamento: pagamentos, //utilizando variavel global(dashboard.js)
						usuario: usuarios 
					};
					params = JSON.stringify(params);

					//update
					app.util.getjson({
						url : "/controller/office/pagamento/update",
						method : 'POST',
						contentType : "application/json",
						data: params,
						success: function(response){
							if(response.success){
							    
							}
						},
						error(response){
							$('#errorModal').find('.alert').append('<p>'+ response.error +'</p>');
	            			$('#errorModal').removeClass('hidden');
						}
					});

					console.log(params);
				}
			},
			error: function(response){
				$('#errorModal').find('.alert').append('<p>Ocorreu um erro ao gerar o boleto, tente novamente</p>');
            	$('#errorModal').removeClass('hidden');
			}
		});
    }

    function onError(response) {
      console.log(response);
    }

});
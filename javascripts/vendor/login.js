$(document).ready(function(){
	
	$('ul.tabs a').livequery( "click", function(event){
		var tabnavs = $(this).attr('href');
        $(this).parent().parent().find('li').removeClass('active');
        $(this).parent('li').addClass('active');
        $('.flat-form .form-action').addClass('hide');
        $('.flat-form .form-action').removeClass('show');
        $('.flat-form '+tabnavs).addClass('show');
        return false;
	});

	//pais de origem
	app.util.getjson({
        url : "/controller/guest/estadocidade/getpais",
        method : 'POST',
        contentType : "application/json",
        success: function(response){
        	var options = '<option value="" disabled selected>Pais</option>';
	        for (var i=0;i<response.results.length;i++) {
		        options += '<option value="'+response.results[i].id+'">'+ response.results[i].nome+'</option>';
	    	}
	    	$("#pais").html(options);
        },
        error : onError
    });

    //estado
    app.util.getjson({
        url : "/controller/guest/estadocidade/getestado",
        method : 'POST',
        contentType : "application/json",
        success: function(response){
        	var options = '<option value="" disabled selected>Estado</option>';
	        for (var i=0;i<response.results.length;i++) {
		        options += '<option value="'+response.results[i].id+'">'+ response.results[i].nome+'</option>';
	    	}
	    	$("#estado").html(options);
        },
        error : onError
    });

    //cidade
    $('select#estado').change(function(){
    	var params = {estado: $(this).val()};
    	params = JSON.stringify(params);
    	var options = '<option value="" disabled selected>Carregando...</option>';
    	$("#cidade").html(options);
    	app.util.getjson({
	        url : "/controller/guest/estadocidade/getcidade",
	        method : 'POST',
	        contentType : "application/json",
	        data : params,
	        success: function(response){
	        	options = undefined;
		        for (var i=0;i<response.results.length;i++) {
			        options += '<option value="'+response.results[i].id+'">'+ response.results[i].nome+'</option>';
		    	}
		    	$("#cidade").html(options);
	        },
	        error : onError
	    });
    });

	//lote
    app.util.getjson({
        url : "/controller/guest/lote/get",
        method : 'POST',
        contentType : "application/json",
        success: function(response){
        	var options = '<option value="" disabled selected>Lote</option>';
	        for (var i=0;i<response.results.length;i++) {
	        	options += '<optgroup label="'+response.results[i].nome+'">'
	        	for(var j=0;j<response.results[i].ingresso.length;j++){
        			options += '<option value="'+response.results[i].ingresso[j].id+'">'+ 
	        					response.results[i].ingresso[j].nome + ' - ' + 'R$' + response.results[i].ingresso[j].valor
	        				+'</option>';
	        	}
	        	options += '</optgroup>';
	    	}
	    	$("#ingresso").html(options);
        },
        error : onError
    });

    $('a#setPagamento').livequery('click',function(event){
    	var option = $(this).attr('data-rel');
    	if(option==1){
    		$('#pagamento').addClass('hidden');
    		$('#cartaoCredito').removeClass('hidden');
    		$('#pagar').removeClass('hidden');;
    	}
    	return false;
    });

    //save
    $('button#registro').livequery('click',function(event){
	    $("#modal-pagamento").modal({
	    	show: true,
            keyboard: false,
            backdrop: 'static',
            remote: '/views/pagamento.php',
        });
		return false;
	});

	function onError(response) {
      console.log(response);
    }

});
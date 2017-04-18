$(document).ready(function(){
	
	$('ul.tabs a').livequery( "click", function(){
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
        method : 'GET',
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
        method : 'GET',
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
    	var estado = $(this).val();
    	app.util.getjson({
	        url : "/controller/guest/estadocidade/getcidade",
	        method : 'GET',
	        contentType : "application/json",
	        data : { 
	        	estado:estado
	        },
	        dataType: 'json',
	        async: false,
	        success: function(response){
	        	var options = '<option value="" disabled selected>Cidade</option>';
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
        method : 'GET',
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

	function onError(args) {
	  console.log( 'onError: ' + args );
	}

});
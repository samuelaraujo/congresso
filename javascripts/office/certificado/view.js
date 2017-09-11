$(document).ready(function(){

	var usuarios =	{
		ingresso: clientes.idingresso,
		nome: clientes.nome,
		sobrenome: clientes.sobrenome,
		status: clientes.status
	};

	//set nome
	$('.certificado .name').html(usuarios.nome + ' ' + usuarios.sobrenome);

	$('.modal-loading').addClass('hidden');
	$('.modal-header').removeClass('hidden');
	$('.modal-body').removeClass('hidden');
	$('.modal-footer').removeClass('hidden');

    $('button#btn-pdf').livequery('click',function(event){
    	if(parseInt(usuarios.status) == 3){
    		var d = new Date();
			var n = d.getTime();
	    	var doc = new jsPDF('landscape', 'pt', 'a4');
				doc.addHTML($('div#certificado'), function() {
			    doc.save("certificado-pdf-"+n+".pdf");
			});
    	}
    	return false;
    });

    function onError(response) {
      console.log(response);
    }

});
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
	var elem = $('.modal-body');
	

    $('button#btn-pdf').livequery('click',function(event){
    	pdf();
    	return false;
    });

     $('button#btn-pdfImp').livequery('click',function(event){
      

     return false;
    });

    function onError(response) {
      console.log(response);
    }


    function pdf() {
     if(parseInt(usuarios.status) == 3){
            var d = new Date();
            var n = d.getTime();
            var doc = new jsPDF('landscape', 'pt', [768, 595]);
                doc.addHTML($('div#certificado'), function() {

                doc.save("certificado-pdf-"+n+".pdf");
            });
        }
        return doc;
    }
    

function printElem(elem){
    var mywindow = window.open();
    console.log(elem);
    mywindow.document.write('<html><head><title>' + document.title  + '</title>');
    mywindow.document.write('</head><body >');
    mywindow.document.write(elem);
    console.log(mywindow.document);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    mywindow.close();

    return true;
}


});
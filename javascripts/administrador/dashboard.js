$(document).ready(function(){

    function list(){
        //list
        app.util.getjson({
            url : "/controller/administrador/dashboard/list",
            method : 'POST',
            contentType : "application/json",
            success: function(response){
                if(response.count && response.results){
                    $('#countPagamento h4').html(response.count.pagamentos);   
                    $('#countCliente h4').html(response.count.clientes); 
                    $('#countLote h4').html(response.count.lotes);          
                    $('#countIngresso h4').html(response.count.ingressos);    
                    var html = '';
                    for (var i=0;i<response.results.length;i++) {
                        var status = undefined;
                        switch(parseInt(response.results[i].status)){
                            case 1:
                                status = 'Paga';
                                labelStatus = 'label-success';
                            break;
                            case 2:
                                status = 'Pendente';
                                labelStatus = 'label-warning';
                            break;
                            case 3:
                                status = 'Cancelado';
                                labelStatus = 'label-danger';
                            break;
                            case 4:
                                status = 'Estornado';
                                labelStatus = 'label-warning';
                            break;
                        }
                        html += '<tr>'+
                                    '<td>'+ (i+1) + '</td>'+
                                    '<td>'+ response.results[i].codigo + '</td>'+
                                    '<td>'+ response.results[i].cliente + '</td>'+
                                    '<td>'+ response.results[i].cpf + '</td>'+
                                    '<td>'+ response.results[i].ingresso + '</td>'+
                                    '<td>'+ floatToMoney(response.results[i].valor, 'R$') + '</td>'+
                                    '<td><span class="label '+labelStatus+'">'+status+'</span></td>'+
                                '</tr>';
                    }
                    $("table#table-pagamentos > tbody").html(html);
                }
            },
            error : onError
        });
    }

    function onError(response) {
      console.log(response);
    }

    //init
    list();

});
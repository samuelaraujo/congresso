$(document).ready(function(){

    function list(){
        //list
        app.util.getjson({
            url : "/controller/office/dashboard/list",
            method : 'POST',
            contentType : "application/json",
            success: function(response){
                if(response.id){
                    var sexo = undefined;
                    if (response.sexo == 'M') {
                        sexo = 'Masculino';
                    }else{
                        sexo = 'Feminino';
                    }

                    switch(parseInt(response.status)){
                        case 1:
                            status = 'Aguardando pgto';
                            labelStatus = 'label-warning';
                        break;
                        case 2:
                            status = 'Em análise';
                            labelStatus = 'label-info';
                        break;
                        case 3:
                            status = 'Paga';
                            labelStatus = 'label-success';
                        break;
                        case 7:
                            status = 'Cancelada';
                            labelStatus = 'label-danger';
                        break;
                    }

                    $('p#cliente').html(response.cliente);   
                    $('p#cracha').html(response.cracha);
                    $('p#sexo').html(sexo);
                    $('p#cpf').html(response.cpf);
                    $('p#email').html(response.email);
                    $('p#cidade').html(response.cidade);
                    $('p#pais').html(response.pais);
                    $('p#created_at').html(response.created_at);
                    $('p#login_at').html(response.login_at);
                    $('h5#lote').html(response.lote);
                    $('p#matricula').html(response.id);
                    $('p#transacao').html(response.codigo);
                    $('p#status').html('<span class="label '+labelStatus+'">'+status+'</span>');
                    

                    // var html = '';
                    // for (var i=0;i<response.results.length;i++) {
                    //     var status = undefined;
                    //     switch(parseInt(response.results[i].status)){
                    //         case 1:
                    //             status = 'Aguardando pgto';
                    //             labelStatus = 'label-warning';
                    //         break;
                    //         case 2:
                    //             status = 'Em análise';
                    //             labelStatus = 'label-info';
                    //         break;
                    //         case 3:
                    //             status = 'Paga';
                    //             labelStatus = 'label-success';
                    //         break;
                    //         case 7:
                    //             status = 'Cancelada';
                    //             labelStatus = 'label-danger';
                    //         break;
                    //     }
                    //     html += '<tr>'+
                    //                 '<td>'+ (i+1) + '</td>'+
                    //                 '<td>'+ response.results[i].codigo + '</td>'+
                    //                 '<td>'+ response.results[i].cliente + '</td>'+
                    //                 '<td>'+ response.results[i].cpf + '</td>'+
                    //                 '<td>'+ response.results[i].ingresso + '</td>'+
                    //                 '<td>'+ floatToMoney(response.results[i].valor, 'R$') + '</td>'+
                    //                 '<td><span class="label '+labelStatus+'">'+status+'</span></td>'+
                    //             '</tr>';
                    // }
                    // $("table#table-pagamentos > tbody").html(html);
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
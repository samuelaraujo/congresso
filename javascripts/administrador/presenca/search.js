$(document).ready(function(){

    function list(reload = false, search = undefined, status = 1){
        var params = (search == undefined) ? 
                        {offset: offset, limit: limit, status: status} : 
                        {offset: offset, limit: limit, status: status, search: search};
        params = JSON.stringify(params);

        //list
        app.util.getjson({
            url : "/controller/administrador/cliente/search",
            method : 'POST',
            contentType : "application/json",
            data: params,
            success: function(response){
                var html = '';
                for (var i=0;i<response.results.length;i++) {
                    var status,labelStatus = undefined;
                    switch(parseInt(response.results[i].status)){
                        case 1:
                            status = 'Aguardando pgto';
                            labelStatus = 'label-warning';
                        break;
                        case 2:
                            status = 'Em análise';
                            labelStatus = 'label-warning';
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

                    html += '<tr>'+
                                '<td>'+ response.results[i].id + '</td>'+
                                '<td>'+ response.results[i].nome + ' ' + response.results[i].sobrenome + '</td>'+
                                '<td>'+ response.results[i].cpf + '</td>'+
                                '<td>'+ response.results[i].ingresso + '</td>'+
                                '<td>'+ floatToMoney(response.results[i].valor, 'R$') + '</td>'+
                                '<td><span class="label '+labelStatus+'">'+status+'</span></td>'+
                                '<td class="text-center">'+
                                    '<a href="javascript:;" id="credenciar" data-id="'+response.results[i].id+'" class="m-r-10"><i class="icon-user-following"></i></a>'+
                                '</td>'+
                            '</tr>';
                }
                if(parseInt(response.count.results) == 0){
                    $('#notfound').removeClass('hidden');
                    $('#notfound').html('Nenhum registro encontrado');
                    $('#table-results').addClass('hidden');
                }else{
                    $('#notfound').addClass('hidden');
                    $('#table-results').removeClass('hidden');
                    $("#table-results > tbody").html(html);
                }
                //hidden
                $('#table-loading').addClass('hidden');
                $('.modal-loading').addClass('hidden');
                $('.modal-header').removeClass('hidden');
                $('.modal-body').removeClass('hidden');
                $('.modal-footer').removeClass('hidden');
            },
            error : onError
        });
    }

    //set
    $('a#credenciar').livequery('click',function(event){
        id = $(this).data('id'); 
        var params = {
            id: id //utilizando variavel global(list.js)
        };
        params = JSON.stringify(params);

        app.util.getjson({
            url : "/controller/administrador/presenca/get",
            method : 'POST',
            contentType : "application/json",
            data: params,
            success: function(response){
                if(response.count.results){

                    if(response.count.results == 1){
                        $('form#formCliente input#entrada').prop("disabled",true);
                    }else{
                        $('form#formCliente input#saida').prop("disabled",true);
                    }

                    //get cliente
                    app.util.getjson({
                        url : "/controller/administrador/cliente/get",
                        method : 'POST',
                        contentType : "application/json",
                        data: params,
                        success: function(response){
                            if(response.id){
                                //set
                                $('form#formCliente input#id').val(response.id);
                                $('form#formCliente input#nome').val(response.cliente);
                                $('form#formCliente input#cracha').val(response.cracha);
                                $('form#formCliente input#cpf').val(response.cpf);

                                //hidden
                                $("div#modal").modal('hide');

                                //show
                                $('#form-row').removeClass('hidden');
                            }
                        },
                        error : onError
                    });

                }
            },
            error : onError
        });
    });

    function onError(response) {
      console.log(response);
    }

    //init
    list(false,search,status);

});
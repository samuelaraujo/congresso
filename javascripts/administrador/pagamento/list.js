//variable global
var search = undefined;
var page = 1;
var offset = 0;
var limit = 10;
var status = 1;

$(document).ready(function(){

    function checkSuccess(){
        //success
        if(getSession('success')){
            $('#success').removeClass('hidden');
            $('#success').find('p').html(getSession('success'));
        }
        setTimeout(function() {
            $('#success').addClass('hidden');
            destroySession('success');
        }, 5000);
    }

    function list(reload = false, search = undefined, status = 1){
        var params = (search == undefined) ? 
                        {offset: offset, limit: limit, status: status} : 
                        {offset: offset, limit: limit, status: status, search: search};
        params = JSON.stringify(params);

        if(reload)
            $('#col-reload').removeClass('hidden');

        //remove all itens active
        $('.nav .nav-item a').removeClass('active');
        switch(parseInt(status)){
            case 1: 
                $('a#paga').addClass('active');
            break;
            case 2: 
                $('a#pendente').addClass('active');
            break;
            case 3: 
                $('a#cancelado').addClass('active');
            break;
            case 4: 
                $('a#estornado').addClass('active');
            break;
        }

        //list
        app.util.getjson({
            url : "/controller/administrador/pagamento/list",
            method : 'POST',
            contentType : "application/json",
            data: params,
            success: function(response){
                var html = '';
                for (var i=0;i<response.results.length;i++) {
                    var metodo, link = undefined;
                    switch(parseInt(response.results[i].metodo)){
                        case 1:
                            metodo = '<i class="fa fa-credit-card"></i> <span>(Crédito)</span>';
                        break;
                        case 2:
                            metodo = '<i class="fa fa-barcode"></i> <span>(Boleto)</span>';
                        break;
                        case 3:
                            metodo = '<i class="fa fa-credit-card-alt"></i> <span>(Débito)</span>';
                        break;
                        default:
                            metodo = '-';
                        break;
                    }
                    if(response.results[i].link != undefined){
                        link = '<a href="'+ response.results[i].link +'" target="_blank">Link</a>';
                    }else{
                        link = '-';
                    }

                    html += '<tr>'+
                                '<td>'+ response.results[i].id + '</td>'+
                                '<td>'+ response.results[i].cliente + '</td>'+
                                '<td>'+ response.results[i].cpf + '</td>'+
                                '<td>'+ response.results[i].ingresso + '</td>'+
                                '<td>'+ floatToMoney(response.results[i].valor, 'R$') + '</td>'+
                                '<td class="text-center">'+ metodo +'</td>'+
                                '<td class="text-center">'+ link +'</td>'+
                            '</tr>';
                }
                if(parseInt(response.count.results) >= 1){

                    $('#col-total').removeClass('hidden');
                    $('#col-search').removeClass('hidden');
                    $('#col-action').addClass('hidden');
                    $('#pagination-length').html('Exibindo ' + response.results.length + ' de ' + response.count.results + ' registros');
                    
                    var pagination = paginator(limit,page,response.count.results);
                    $('#pagination').html(pagination);

                }
                if(parseInt(response.count.results) == 0){
                    $('#notfound').removeClass('hidden');
                    $('#notfound').html('Nenhum registro encontrado');
                    $('#table-results').addClass('hidden');
                    $('#col-total').addClass('hidden');
                    $('#col-search').addClass('hidden');
                    $('#col-action').addClass('hidden');
                }else{
                    $('#notfound').addClass('hidden');
                    $('#table-results').removeClass('hidden');
                    $("#table-results > tbody").html(html);
                }
                $('#table-loading').addClass('hidden');
                $('#add').removeClass('hidden');
                $('ul.customtab').removeClass('hidden');
                $('#count-paga').html(response.count.pagas);
                $('#count-pendente').html(response.count.pendentes);
                $('#count-cancelado').html(response.count.cancelados);
                 $('#count-estornado').html(response.count.estornados);
                if(reload)
                    $('#col-reload').addClass('hidden');
            },
            error : onError
        });
    }

    //paginator
    $('#pagination li a').livequery('click',function(event){
        if(!$(this).parent().hasClass('disabled')){
            page = parseInt($(this).data('page'));
            offset = Math.ceil((page-1) * limit);
            if(search != undefined && search.length >= 3){
                list(true, search);
            }else{
                list(true);
            }
        }
        return false;
    });

    //search
    $('input#search').livequery('keyup',function(event){
        search = $(this).val();
        if(search == undefined){
          return;
        }else{
            list(true, search, status);
        }
    });

    //set list tab item
    $('a#paga,a#pendente,a#cancelado,a#estornado').livequery('click',function(event){
        status = $(this).data('status');
        list(true, search, status);
    });

    //add form
    $('button.btn-add').livequery('click',function(event){
        window.location.href = "/administrador/pagamento/add";
    });

    function onError(response) {
      console.log(response);
    }

    //init
    list();
    checkSuccess();

});
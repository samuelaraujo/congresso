//variable global
var search = undefined;
var page = 1;
var offset = 0;
var limit = 10;
var status = 3; //status (3) = paga

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

    function list(reload = false, search = undefined, status = 3){
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
                $('a#aguardando').addClass('active');
            break;
            case 2: 
                $('a#analise').addClass('active');
            break;
            case 3: 
                $('a#paga').addClass('active');
            break;
            case 7: 
                $('a#cancelada').addClass('active');
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
                            metodo = '<i class="fa fa-credit-card"></i>';
                        break;
                        case 2:
                            metodo = '<i class="fa fa-barcode"></i>';
                        break;
                        case 3:
                            metodo = '<i class="fa fa-credit-card-alt"></i>';
                        break;
                        default:
                            metodo = '-';
                        break;
                    }
                    if(response.results[i].link != undefined && response.results[i].status != 3){
                        link = '<a href="'+ response.results[i].link +'" target="_blank"><i class="ti-link"></a>';
                    }else{
                        link = '';
                    }

                    html += '<tr>'+
                                '<td>'+ response.results[i].id + '</td>'+
                                '<td>'+ response.results[i].created_at + '</td>'+
                                '<td>'+ response.results[i].cliente + '</td>'+
                                '<td>'+ response.results[i].cpf + '</td>'+
                                '<td>'+ response.results[i].ingresso + '</td>'+
                                '<td>'+ floatToMoney(response.results[i].valor, 'R$') + '</td>'+
                                '<td class="text-center">'+ metodo +'</td>'+
                                '<td class="text-center">'+ link +'</td>'+
                                '<td class="text-center"><a href="javascript:;" id="detalhar" data-id="'+ response.results[i].id + '"><i class="fa fa-search"></i></a></td>'+
                            '</tr>';
                }
                if(parseInt(response.count.results) >= 1){

                    $('#col-total').removeClass('hidden');
                    $('#col-search').removeClass('hidden');
                    $('#col-legenda').removeClass('hidden');
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
                    $('#col-legenda').addClass('hidden');
                }else{
                    $('#notfound').addClass('hidden');
                    $('#table-results').removeClass('hidden');
                    $("#table-results > tbody").html(html);
                }
                $('#table-loading').addClass('hidden');
                $('#add').removeClass('hidden');
                $('ul.customtab').removeClass('hidden');
                $('#count-aguardando').html(response.count.aguardando);
                $('#count-analise').html(response.count.analise);
                $('#count-paga').html(response.count.paga);
                $('#count-cancelada').html(response.count.cancelada);
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
                list(true, search, status);
            }else{
                list(true, undefined, status);
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
    $('a#paga,a#aguardando,a#analise,a#cancelada').livequery('click',function(event){
        status = $(this).data('status');
        list(true, search, status);
    });

    //add form
    $('button.btn-add').livequery('click',function(event){
        window.location.href = "/administrador/pagamento/add";
    });

    //get
    $('a#detalhar').livequery('click',function(event){
        var params = {
            id: $(this).data('id')
        };
        params = JSON.stringify(params);

        var options = {
            cache:false,
            show: true,
            keyboard: false,
            backdrop: 'static'
        }
        $("div#modal").modal(options);

        $('div#modal .modal-content').load('views/administrador/pagamento/view.php',function(result){
            //get
            app.util.getjson({
                url : "/controller/administrador/pagamento/get",
                method : 'POST',
                contentType : "application/json",
                data: params,
                success: function(response){
                    console.log(response.codigo);
                    console.log(response.id);
                    if(response.id){
                        //set
                        $('form#formPagamento #codigo').val(response.codigo);
                        $('form#formPagamento span#sobrenome').val(response.sobrenome);
                        $('form#formPagamento span#email').val(response.email);
                        $('form#formPagamento span#desde').val(response.created_at);
                    }
                },
                error : onError
            });
        });
        return false;
    });

    function onError(response) {
      console.log(response);
    }

    //init
    list();
    checkSuccess();

});
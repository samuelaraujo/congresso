//variable global
var clientes = {};
var search = undefined;
var offset = 0;
var limit = 10;
var status = 1;
var id = undefined;

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

    //validate
    $('form#formCliente').validate({
        onfocusout: false,
        onkeyup: false,
        rules: {
            entrada: { 
                required: true
            },
            saida: {
                required: true
            }
        },
        messages: {
            entrada: { 
                required: 'É obrigatório a confirmação de um dia no evento'
            },
            saida: { 
                required: 'É obrigatório a confirmação de um dia no evento'
            }
        },
        highlight: function (element, errorClass, validClass) {
            if (element.type === "radio" ) {
                this.findByName(element.name).addClass(errorClass).removeClass(validClass);
                $(element).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            } else {
                $(element).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                $(element).closest('.form-group').find('i.fa').remove();
                $(element).closest('.form-group').append('<i class="fa fa-times fa-validate form-control-feedback fa-absolute"></i>');
            }
        },
        unhighlight: function (element, errorClass, validClass) {
            if (element.type === "radio") {
                this.findByName(element.name).removeClass(errorClass).addClass(validClass);
            } else {
                $(element).closest('.form-group').removeClass('has-error has-feedback').addClass('has-success has-feedback');
                $(element).closest('.form-group').find('i.fa').remove();
                $(element).closest('.form-group').append('<i class="fa fa-check fa-validate form-control-feedback fa-absolute"></i>');
            }
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else if (element.attr("type") == "radio") {
                error.insertAfter(element.parent().parent());
            }else if (element.attr("type") == "checkbox") {
                error.insertAfter(element.parent().parent());
                error.addClass('text-danger');
            }else{
                error.insertAfter(element.parent().parent());
            }
        }
    });

    $('form#formClienteBusca').validate({
        rules: {
            pesquisa: {
                required: true,
                minlength: 3
            }
        },
        messages: {
            pesquisa: { 
                required: 'Preencha sua pesquisa',
                minlength: 'Pesquisa mínimo de 3 caracteres'
            }
        },
        highlight: function (element, errorClass, validClass) {
            if (element.type === "radio") {
                this.findByName(element.name).addClass(errorClass).removeClass(validClass);
                $(element).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            } else {
                $(element).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                $(element).closest('.form-group').find('i.fa').remove();
                $(element).closest('.form-group').append('<i class="fa fa-times fa-validate form-control-feedback fa-absolute"></i>');
            }
        },
        unhighlight: function (element, errorClass, validClass) {
            if (element.type === "radio") {
                this.findByName(element.name).removeClass(errorClass).addClass(validClass);
            } else {
                $(element).closest('.form-group').removeClass('has-error has-feedback').addClass('has-success has-feedback');
                $(element).closest('.form-group').find('i.fa').remove();
                $(element).closest('.form-group').append('<i class="fa fa-check fa-validate form-control-feedback fa-absolute"></i>');
            }
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else if (element.attr("type") == "radio") {
                error.insertAfter(element.parent().parent());
            }else{
                error.insertAfter(element);
            }
        }
    });

    //search
    $('button#procurar').livequery('click',function(event){
        if($("form#formClienteBusca").valid()){
            //set search
            search = $('form#formClienteBusca #pesquisa').val();

            var options = {
                cache:false,
                show: true,
                keyboard: false,
                backdrop: 'static'
            }
            $("div#modal").modal(options);

            //modal-lg
            $('div#modal .modal-dialog').addClass('modal-lg');

            //clear
            $('div#modal .modal-content').html('');

            $('div#modal .modal-content').load('views/administrador/presenca/search.php');
        }else{
            $("form#formClienteBusca").valid();
        }
        return false;
    });

    //save
    $('button#salvar').livequery('click',function(event){
        if($("form#formCliente").valid()){

            $('button#salvar').html('Processando...');
            $('button#salvar').prop("disabled",true);
            $('button#cancelar').prop("disabled",true);

            app.util.getjson({
                url : "/controller/administrador/presenca/add",
                method : 'POST',
                data: $("form#formCliente").serialize(),
                success: function(response){
                    if(response.success){
                        setSession('success', response.success);
                        window.location.href = "/administrador/presenca/add";
                    }
                },
                error : function(response){
                    response = JSON.parse(response.responseText);
                    $('#error').removeClass('hidden');
                    $('#error').find('.alert p').html(response.error);
                    $('button#salvar').html('Salvar');
                    $('button#salvar').prop("disabled",false);
                    $('button#cancelar').prop("disabled",false);
                }
            });
        }else{
            $("form#formCliente").valid();
        }
        return false;
    });

    //cancel
    $('button#cancelar').livequery('click',function(event){
        window.location.href = "/administrador/presenca/";
        return false;
    });

	function onError(response) {
      console.log(response);
    }

    //init
    checkSuccess();

});
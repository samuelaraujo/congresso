//variable global
var clientes = {};
var search = undefined;
var offset = 0;
var limit = 10;
var status = 1;
var id = undefined;

$(document).ready(function(){

    //validate
    $('form#formCliente').validate({
        onfocusout: false,
        onkeyup: false,
        rules: {
            'presenca[]': { 
                required: true
            },
            material: {
                required: true
            }
        },
        messages: {
            'presenca[]': { 
                required: 'É obrigatório a confirmação de um dia no evento'
            },
            material: { 
                required: 'Falta pouco, o cliente recebeu o material?'
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

    //marcar todos
    $('#todos').click(function(){
        $('input[name="presenca[]"]').prop('checked',this.checked);
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

            $('div#modal .modal-content').load('views/administrador/credenciamento/search.php');
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
                url : "/controller/administrador/credenciamento/add",
                method : 'POST',
                data: $("form#formCliente").serialize(),
                success: function(response){
                    if(response.success){
                        setSession('success', response.success);
                        window.location.href = "/administrador/credenciamento";
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
        window.location.href = "/administrador/credenciamento/";
        return false;
    });

	function onError(response) {
      console.log(response);
    }

});
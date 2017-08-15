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
    $('form#formCredenciamento').validate({
        onfocusout: false,
        onkeyup: false,
        rules: {
            presenca: { 
                required: true
            }
        },
        messages: {
            presenca: { 
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

    //save
    $('button#confirmar').livequery('click',function(event){
        if($("form#formCredenciamento").valid()){
            var params = {
                presenca: $('#presenca').val(),
                material: ($('#material').is(':checked') ? 1 : 0)
            };
            params = JSON.stringify(params);

            $('button#confirmar').html('Processando...');
            $('button#confirmar').prop("disabled",true);

            app.util.getjson({
                url : "/controller/office/credenciamento/add",
                method : 'POST',
                contentType : "application/json",
                data: params,
                success: function(response){
                    if(response.success){
                        setSession('success', response.success);
                        window.location.href = "/office/credenciamento/add";
                    }
                },
                error : function(response){
                    response = JSON.parse(response.responseText);
                    $('#error').removeClass('hidden');
                    $('#error').find('.alert p').html(response.error);
                    $('button#confirmar').html('Salvar');
                    $('button#confirmar').prop("disabled",false);
                }
            });
        }else{
            $("form#formCredenciamento").valid();
        }
        return false;
    });

	function onError(response) {
      console.log(response);
    }

    //init
    checkSuccess();

});
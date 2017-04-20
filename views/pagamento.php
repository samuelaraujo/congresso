<div class="modal-header"><!--.modal-header-->
    <h4 class="modal-title text-uppercase">Pagamento</h4>
</div><!--/.modal-header-->

<div class="modal-body"><!--.modal-body-->

  <div id="mensagem" class="mensagem hidden"><!--.mensagem-->
    <p>Mensagem de retorno da transação</p>
  </div><!--/.mensagem-->

  <div id="pagamento" class="pagamento"><!--.pagamento-->
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center">Como deseja efetuar o pagamento do seu ingresso?</h1>
      </div>
      <div class="col-md-6">
        <a id="setPagamento" 
          class="block forma-pagamento text-center" href="javascript:;" data-rel="1">
          <div class="block-content block-content-full">
            <i class="fa fa-credit-card fa-4x"></i>
            <p>Cartão de crédito</p>
          </div>
        </a>
      </div>
      <div class="col-md-6">
        <a id="setPagamento" 
          class="block forma-pagamento text-center" href="javascript:;" data-rel="2">
          <div class="block-content block-content-full bg-modern">
            <i class="fa fa-barcode fa-4x"></i>
            <p>Boleto bancário</p>
          </div>
        </a>
      </div>
    </div><!--/.row-->
  </div><!--/.pagamento-->

  <div id="cartaoCredito" class="hidden">
    <form id="formCartaoCredito" name="formCartaoCredito" class="formCartaoCredito">

      <div id="errorCartaoCredito" class="row hidden">
        <div class="col-md-12">
          <div class="alert alert-warning">
            <p></p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-8">
          <div class="form-group">
            <label for="portador">Nome<small>(como está no cartão)</small></label>
            <input type="text" class="form-control" id="portador" name="portador">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="cvc">CVC<small>(código de segurança)</small></label>
            <input type="text" class="form-control" id="cvc" name="cvc">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="numerocartao">Número do Cartão</label>
            <input type="text" class="form-control" id="numerocartao" name="numerocartao">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label>Mês</label>
            <select class="form-control" id="mes" name="mes">
                <option value="01">Janeiro</option>
                <option value="02">Fevereiro</option>
                <option value="03">Março</option>
                <option value="04">Abril</option>
                <option value="05">Maio</option>
                <option value="06">Junho</option>
                <option value="07">Julho</option>
                <option value="08">Agosto</option>
                <option value="09">Setembro</option>
                <option value="10">Outubro</option>
                <option value="11">Novembro</option>
                <option value="12">Dezembro</option>
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Ano</label>
            <select class="form-control" id="ano" name="ano">
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group bandeira">
            <img src="assets/images/common/visa.png" id="visa">
            <img src="assets/images/common/mastercard.png" id="mastercard">
            <img src="assets/images/common/amex.png" id="amex">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="cpfportador">CPF<small>(portador do cartão)</small></label>
            <input type="text" class="form-control" id="cpfportador" name="cpfportador" maxLength="11">
          </div>
        </div>
      </div>

    </form>
  </div><!--/.row-->

</div><!--/.modal-body-->

<div class="modal-footer"><!--.modal-footer-->
  <div class="ambiente-seguro pull-left">
    <i class="fa fa-lock"></i>
    <span>Ambiente seguro</span>
  </div>
  <button id="pagar" class="btn btn-success hidden" type="button">PAGAR</button>
</div><!--/.modal-footer-->


<!-- Javascripts -->
<script type="text/javascript" src="javascripts/vendor/functions.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

    var portador =  $('input#portador');
    var cpfportador =  $('input#cpfportador');
    var numerocartao =  $('input#numerocartao');
    var cvc =  $('input#cvc');
    var mes =  $('select#mes');
    var ano =  $('select#ano');
    var visa =  $('#visa');
    var mastercard =  $('#mastercard');
    var amex =  $('#amex');
    var brand = undefined;
    var session = undefined;
    var senderHash = undefined;
    var cardToken = undefined;

    //use format
    numerocartao.payform('formatCardNumber');
    cvc.payform('formatCardCVC');

    //set flag
    numerocartao.keyup(function() {
      amex.removeClass('transparent');
      visa.removeClass('transparent');
      mastercard.removeClass('transparent');
      if($.payform.validateCardNumber(numerocartao.val()) == false){
        numerocartao.removeClass('has-success');
        numerocartao.addClass('has-error');
      }else{
        numerocartao.removeClass('has-error');
        numerocartao.addClass('has-success');
      }
      if($.payform.parseCardType(numerocartao.val()) == 'visa'){
        brand = 'visa';
        mastercard.addClass('transparent');
        amex.addClass('transparent');
      }else if($.payform.parseCardType(numerocartao.val()) == 'amex'){
        brand = 'amex';
        mastercard.addClass('transparent');
        visa.addClass('transparent');
      }else if($.payform.parseCardType(numerocartao.val()) == 'mastercard'){
        brand = 'mastercard';
        amex.addClass('transparent');
        visa.addClass('transparent');
      }
    });

    //validate
    $('form#formCartaoCredito').validate({
      rules: {
        portador: { 
          required: true
        },
        numerocartao: { 
          required: true
        },
        cvc: { 
          required: true,
          minlength: 3
        },
        mes: { 
          required: true
        },
        ano: { 
          required: true
        },
        cpfportador: { 
          required: true,
          cpfBR: true
        }
      },
      messages: {
        portador: { 
          required: 'Qual o nome do portador do cartão?'
        },
        numerocartao: { 
          required: 'Preencha os números do cartão'
        },
        cvc: { 
          required: 'Qual o código de segurança?',
          minlength: 'Um cartão de crédito tem 3 ou 4 digitos de segurança, nos informe'
        },
        mes: { 
          required: 'Qual o mês de validade?'
        },
        ano: { 
          required: 'Qual o mês de validade?'
        },
        cpfportador: { 
          required: 'CPF portador do cartão',
          cpfBR: 'Este número de CPF é inválido'
        }
      },
      highlight: function (element, errorClass, validClass) {
        $(element).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $(element).closest('.form-group').find('i.fa').remove();
        $(element).closest('.form-group').append('<i class="fa fa-times fa-validate form-control-feedback"></i>');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).closest('.form-group').removeClass('has-error has-feedback').addClass('has-success has-feedback');
        $(element).closest('.form-group').find('i.fa').remove();
        $(element).closest('.form-group').append('<i class="fa fa-check fa-validate form-control-feedback"></i>');
      },
      errorElement: 'span',
      errorClass: 'help-block',
      errorPlacement: function(error, element) {
        error.insertAfter(element);
      }
    });

    //get session checkout transparent
    app.util.getjson({
        url : "/controller/guest/pagamento/getsession",
        method : 'POST',
        contentType : "application/json",
        success: function(response){
          if(response.results.id){
            session = response.results.id;
            PagSeguroDirectPayment.setSessionId(session);
            senderHash = PagSeguroDirectPayment.getSenderHash();
          }
        },
        error : onError
    });


    //pay
    $('button#pagar').livequery('click',function(event){
      if($("form#formCartaoCredito").valid()){
        var isCardValid = $.payform.validateCardNumber(numerocartao.val());
        var isCvcValid = $.payform.validateCardCVC(cvc.val());
        var isExpiryValid = $.payform.validateCardExpiry(mes.val(),ano.val());
        var errors = 0;

        $('#errorCartaoCredito').find('.alert').html('');
        if(portador.val().length < 5){
          errors++;
          $('#errorCartaoCredito').find('.alert').append('<p>Verifique o nome do portador do cartão</p>');
        }else if(!isCardValid){
          errors++;
          $('#errorCartaoCredito').find('.alert').append('<p>Verifique o número do seu cartão</p>');
        }else if(!isCvcValid){
          errors++;
          $('#errorCartaoCredito').find('.alert').append('<p>Verifique o código de segurança do seu cartão</p>');
        }else if(!isExpiryValid){
          errors++;
          $('#errorCartaoCredito').find('.alert').append('<p>Verifique a validade do seu cartão</p>');
        }else if(!session && !senderHash){
          errors++;
          $('#errorCartaoCredito').find('.alert').append('<p>Ocorreu um erro ao tentar fazer uma requisição de pagamento, tente novamente mais tarde!</p>');
        }else{
          $('#errorCartaoCredito').addClass('hidden');
          $('button#pagar').html('PROCESSANDO...');
          $('button#pagar').prop("disabled",true);
          PagSeguroDirectPayment.createCardToken({
            cardNumber: numerocartao.val(),
            brand: brand,
            cvv: cvc.val(),
            expirationMonth: mes.val(),
            expirationYear: ano.val(),
            success: function(response){
              cardToken = response.card.token;
              //params
              var params = {
                senderhash: senderHash,
                cardtoken: cardToken,
                portador: portador.val(),
                cpfportador: cpfportador.val(),
                usuario: usuarios //utilizando variavel global(login.js)
              };
              params = JSON.stringify(params);
              //transactions
              app.util.getjson({
                  url : "/controller/guest/pagamento/creditcard",
                  method : 'POST',
                  contentType : "application/json",
                  data: params,
                  success: function(response){
                    console.log(response);
                    console.log(response.results.codigo);
                    console.log(response.results.descricao);
                    console.log(response.results.status);
                    if(response.results.codigo){
                      $('button#pagar').addClass('hidden');
                      $('#cartaoCredito').addClass('hidden');
                      $('#mensagem').removeClass('hidden');
                    }
                  },
                  error : onError
              });
            },
            error: function(response){
              var html = '<ul>';
              $.map(response.errors, function(error){
                html += '<li>'+error+'</li>';
              });
              html += '</ul>';
              $('#errorCartaoCredito').find('.alert').append(html);
              $('#errorCartaoCredito').removeClass('hidden');
            },
            complete: function(response){}
          });
        }
        if(errors)
          $('#errorCartaoCredito').removeClass('hidden');
      }else{
        $("form#formCartaoCredito").valid();
      }
      return false;
    });

    function onError(response) {
      console.log(response);
    }

  });
</script>
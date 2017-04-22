<div class="modal-header"><!--.modal-header-->
    <h4 class="modal-title text-uppercase">Pagamento</h4>
    <div id="carrinho" class="carrinho">
      <i class="fa fa-shopping-cart"></i>
      <p class="descricao">Sua compra:</p>
      <p class="valor">R$0,00</p>
    </div>
</div><!--/.modal-header-->

<div class="modal-body"><!--.modal-body-->

  <div id="mensagem" class="mensagem hidden"><!--.mensagem-->
    <div class="row">
      <div id="pagamento-pago" class="col-md-12 text-center hidden">
        <h1>Parabéns</h1>
        <h3>Sua compra foi realizada com sucesso</h3>
        <p id="pagamento-codigo"></p>
        <p id="pagamento-status"></p>
        <img src="assets/images/common/icon_success.svg" width="128">
      </div>
      <div id="pagamento-aguardando" class="col-md-12 text-center hidden">
        <h1>O pagamento está em processamento</h1>
        <h3>Estamos aguardando a confirmação do pagamento</h3>
        <h4>Você será notificado em breve, aguarde</h4>
        <p id="pagamento-codigo"></p>
        <p id="pagamento-status"></p>
        <img src="assets/images/common/icon_timer.svg" width="128">
      </div>
      <div id="pagamento-devolvido" class="col-md-12 text-center hidden">
        <h1>O pagamento foi devolvido</h1>
        <h3>Por favor, aguarde o valor ser devolvido ou retorne e refaça o pagamento</h3>
        <p id="pagamento-codigo"></p>
        <p id="pagamento-status"></p>
        <img src="assets/images/common/icon_warning.svg" width="128">
      </div>
      <div id="pagamento-cancelado" class="col-md-12 text-center hidden">
        <h1>O pagamento foi cancelado</h1>
        <h3>Por favor, retorne e refaça o pagamento</h3>
        <p id="pagamento-codigo"></p>
        <p id="pagamento-status"></p>
        <img src="assets/images/common/icon_cancel.svg" width="128">
      </div>
    </div>
  </div><!--/.mensagem-->

  <div id="pagamento" class="pagamento"><!--.pagamento-->
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center">Como deseja efetuar o pagamento do seu ingresso?</h1>
      </div>
      <div class="col-md-4">
        <a id="setPagamento" 
          class="block forma-pagamento text-center" href="javascript:;" data-rel="1">
          <div class="block-content block-content-full">
            <i class="fa fa-credit-card fa-4x"></i>
            <p>Cartão de crédito</p>
          </div>
        </a>
      </div>
      <div class="col-md-4">
        <a id="setPagamento" 
          class="block forma-pagamento text-center" href="javascript:;" data-rel="2">
          <div class="block-content block-content-full bg-modern">
            <i class="fa fa-credit-card-alt fa-4x"></i>
            <p>Débito online</p>
          </div>
        </a>
      </div>
      <div class="col-md-4">
        <a id="setPagamento" 
          class="block forma-pagamento text-center" href="javascript:;" data-rel="3">
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
              <option value=""></option>
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
              <option value=""></option>
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
              <option value="2027">2027</option>
              <option value="2028">2028</option>
              <option value="2029">2029</option>
              <option value="2030">2030</option>
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
    </form>
  </div><!--/.row-->

  <div id="cartaoDebito" class="hidden">
    <form id="formCartaoDebito" name="formCartaoDebito" class="formCartaoDebito">
      <div class="col-md-3">
        <a id="setBanco" 
          class="block banco text-center" href="javascript:;" data-rel="1">
          <div class="block-content block-content-full">
            <img src="assets/images/common/bancobradesco.png">
            <p>Banco do Bradesco</p>
          </div>
        </a>
      </div>
      <div class="col-md-3">
        <a id="setBanco" 
          class="block banco text-center" href="javascript:;" data-rel="2">
          <div class="block-content block-content-full">
            <img src="assets/images/common/bancoitau.png">
            <p>Itaú</p>
          </div>
        </a>
      </div>
      <div class="col-md-3">
        <a id="setBanco" 
          class="block banco text-center" href="javascript:;" data-rel="3">
          <div class="block-content block-content-full">
            <img src="assets/images/common/bancodobrasil.png">
            <p>Banco de brasil</p>
          </div>
        </a>
      </div>
      <div class="col-md-3">
        <a id="setBanco" 
          class="block banco text-center" href="javascript:;" data-rel="4">
          <div class="block-content block-content-full">
            <img src="assets/images/common/bancohsbc.png">
            <p>HSBC</p>
          </div>
        </a>
      </div>
    </form>
  </div><!--/.row-->

</div><!--/.modal-body-->

<div class="modal-footer"><!--.modal-footer-->
  <div class="ambiente-seguro">
    <i class="fa fa-lock"></i>
    <span>Ambiente seguro</span>
    <p>Pagamento processado pelo <img src="assets/images/common/logo-pagseguro.png" width="60"></p>
  </div>
  <button id="alterar" class="btn btn-warning" type="button">ALTERAR INGRESSO</button>
  <button id="voltar" class="btn btn-warning hidden" type="button">VOLTAR</button>
  <button id="pagar" class="btn btn-success hidden" type="button">PAGAR</button>
  <button id="retornar" class="btn btn-warning hidden" type="button">RETORNAR</button>
  <button id="continuar" class="btn btn-success hidden" type="button">CONTINUAR</button>
  <button id="finalizar" class="btn btn-success hidden" type="button">FINALIZAR</button>
</div><!--/.modal-footer-->


<!-- Javascripts -->
<script type="text/javascript">
  $(document).ready(function(){
    var portador =  $('input#portador');
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
    var pay = false;

    //set value cart
    $('#carrinho .valor').html(floatToMoney(usuarios.valor,'R$'));

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
          required: 'Qual o ano de validade?'
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

    $('a#setPagamento').livequery('click',function(event){
      var option = $(this).attr('data-rel');
      if(option==1){
        $('#pagamento').addClass('hidden');
        $('button#alterar').addClass('hidden');
        $('button#voltar').removeClass('hidden');
        $('#cartaoCredito').removeClass('hidden');
        $('button#pagar').removeClass('hidden');
      }else if(option==2){
        $('#pagamento').addClass('hidden');
        $('button#alterar').addClass('hidden');
        $('button#voltar').removeClass('hidden');
        $('#cartaoDebito').removeClass('hidden');
      }
      return false;
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
          $('button#voltar').prop("disabled",true);

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
                    if(response.results.codigo){
                      $('#mensagem').removeClass('hidden');
                        $('#mensagem #pagamento-pago').addClass('hidden');
                        $('#mensagem #pagamento-aguardando').addClass('hidden');
                        $('#mensagem #pagamento-cancelado').addClass('hidden');
                        $('#mensagem #pagamento-devolvido').addClass('hidden');
                      switch(parseInt(response.results.status)){
                        case 1:
                        case 2:
                          $('#carrinho').addClass('hidden');
                          $('button#pagar').addClass('hidden');
                          $('button#voltar').addClass('hidden');
                          $('#cartaoCredito').addClass('hidden');
                          $('button#finalizar').removeClass('hidden');
                          $('#mensagem #pagamento-aguardando').removeClass('hidden');
                          $('#mensagem #pagamento-aguardando #pagamento-codigo').html('Código: '+response.results.codigo);
                          $('#mensagem #pagamento-aguardando #pagamento-status').html('Status: '+response.results.descricao);
                        break;
                        case 3:
                          //set transaction pay approved
                          pay = true;
                          $('#carrinho').addClass('hidden');
                          $('button#pagar').addClass('hidden');
                          $('button#voltar').addClass('hidden');
                          $('#cartaoCredito').addClass('hidden');
                          $('button#continuar').removeClass('hidden');
                          $('#mensagem #pagamento-pago').removeClass('hidden');
                          $('#mensagem #pagamento-pago #pagamento-codigo').html('Código: '+response.results.codigo);
                          $('#mensagem #pagamento-pago #pagamento-status').html('Status: '+response.results.descricao);
                        break;
                        case 6:
                          $('#carrinho').addClass('hidden');
                          $('button#pagar').addClass('hidden');
                          $('button#voltar').addClass('hidden');
                          $('#cartaoCredito').addClass('hidden');
                          $('button#retornar').removeClass('hidden');
                          $('#mensagem #pagamento-devolvido').removeClass('hidden');
                          $('#mensagem #pagamento-devolvido #pagamento-codigo').html('Código: '+response.results.codigo);
                          $('#mensagem #pagamento-devolvido #pagamento-status').html('Status: '+response.results.descricao);
                        break;
                        case 7:
                          $('#carrinho').addClass('hidden');
                          $('button#pagar').addClass('hidden');
                          $('button#voltar').addClass('hidden');
                          $('#cartaoCredito').addClass('hidden');
                          $('button#retornar').removeClass('hidden');
                          $('#mensagem #pagamento-cancelado').removeClass('hidden');
                          $('#mensagem #pagamento-cancelado #pagamento-codigo').html('Código: '+response.results.codigo);
                          $('#mensagem #pagamento-cancelado #pagamento-status').html('Status: '+response.results.descricao);
                        break;
                      }
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
              $('button#pagar').html('PAGAR');
              $('button#pagar').prop("disabled",false);
              $('button#voltar').prop("disabled",true);
            },
            complete: function(response){}
          });
        }
        if(errors){
          $('#errorCartaoCredito').removeClass('hidden');
          $('button#voltar').prop("disabled",true);
        }
      }else{
        $("form#formCartaoCredito").valid();
      }
      return false;
    });

    //continuar
    $('button#continuar').livequery('click',function(event){
      if(pay) window.location.href = "/dashboard"
    });

    //finalizar
    $('button#finalizar').livequery('click',function(event){
      if(!pay) window.location.href = "/"
    });

    //retornar
    $('button#retornar').livequery('click',function(event){
      if(!pay){
        $('button#voltar').addClass('hidden');
        $('#pagamento').removeClass('hidden');
        $('#mensagem').addClass('hidden');
        $('#mensagem #pagamento-devolvido').addClass('hidden');
        $('#cartaoCredito').addClass('hidden');
        $('button#retornar').addClass('hidden');
        $('button#pagar').addClass('hidden');
        $('button#pagar').html('PAGAR');
        $('button#pagar').prop("disabled",false);
        $('button#alterar').removeClass('hidden');
      }
    });

    //voltar
    $('button#voltar').livequery('click',function(event){
      $('button#pagar').addClass('hidden');
      $('button#voltar').addClass('hidden');
      $('#mensagem').addClass('hidden');
      $('#cartaoCredito').addClass('hidden');
        $('#mensagem #pagamento-pago').addClass('hidden');
        $('#mensagem #pagamento-aguardando').addClass('hidden');
        $('#mensagem #pagamento-cancelado').addClass('hidden');
        $('#mensagem #pagamento-devolvido').addClass('hidden');
      $('#pagamento').removeClass('hidden');
      $('button#alterar').removeClass('hidden');
    });

    //alterar ingresso
    $('button#alterar').livequery('click',function(event){
      $("#modal-pagamento").modal('hide').data('bs.modal',null);
    });

    function onError(response) {
      console.log(response);
    }

  });
</script>
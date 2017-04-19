<div class="modal-header"><!--.modal-header-->
    <h4 class="modal-title text-uppercase">Pagamento</h4>
</div><!--/.modal-header-->

<div class="modal-body"><!--.modal-body-->

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

  <div id="cartaoCredito" class="row hidden">
    <form class="formCartaoCredito" name="formCartaoCredito" role="form" novalidate>
      <div id="errorCartaoCredito" class="alert alert-warning hidden">
        <p>Verifique o código de segurança do seu cartão</p>
      </div>
      <div class="form-group">
        <div class="col-md-8">
          <label for="portador">Nome<small>(como está no cartão)</small></label>
          <input type="text" class="form-control" id="portador">
        </div>
        <div class="col-md-4">
          <label for="cvv">CVV<small>(código de segurança)</small></label>
          <input type="text" class="form-control" id="cvv">
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-12">
          <label for="numerocartao">Número do Cartão</label>
          <input type="text" class="form-control" id="numerocartao">
        </div>
      </div>
      <div class="form-group" id="validade">
        <div class="col-md-3">
          <label>Mês</label>
          <select class="form-control">
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
        <div class="col-md-3">
          <label>Ano</label>
          <select class="form-control">
              <option value="17">2017</option>
              <option value="18">2018</option>
              <option value="19">2019</option>
              <option value="20">2020</option>
              <option value="21">2021</option>
              <option value="22">2022</option>
              <option value="23">2023</option>
              <option value="24">2024</option>
              <option value="25">2025</option>
              <option value="26">2026</option>
          </select>
        </div>
        <div class="col-md-6">
          <div class="form-group bandeira" id="bandeira">
            <img src="assets/images/common/visa.png" id="visa">
            <img src="assets/images/common/mastercard.png" id="mastercard">
            <img src="assets/images/common/amex.png" id="amex">
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
<div class="modal-loading">
  	<div class="col-md-12 text-center">
	    <div class="loading">
	        <img src="assets/images/common/loading.gif" width="38">
	        <p>Aguarde, processando...</p>
	    </div>
  	</div>
</div><!-- /.modal-loading -->

<div class="modal-header hidden">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    	<span aria-hidden="true">×</span>
    </button>
    <h4 class="modal-title">Sorteio</h4> 
</div>
<div class="modal-body hidden">
    <div class="row">
    	<div class="col-md-12 col-xs-12 col-sm-16">
            <div class="white-box text-center bg-success">
                <h1 id="id" class="text-white counter">0000000</h1>
                <h3 id="cliente" class="text-white">??????</h3>
                <p class="text-white text-uppercase">Número premiado</p>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer hidden">
    <button type="button" id="girar" class="btn btn-sm btn-success">Novo sorteio</button>
    <button type="button" id="fechar" class="btn btn-sm btn-default" data-dismiss="modal">Fechar</button>
</div>

<!-- javascripts -->
<script type="text/javascript" src="javascripts/administrador/sorteio/add.js"></script>
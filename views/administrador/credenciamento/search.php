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
    <h4 class="modal-title">Lista de cliente</h4> 
</div>
<div class="modal-body hidden">
    
	<div class="table-responsive">
        <table id="table-results" class="table hidden">
            <thead>
              <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>CPF</th>
                <th>Ingresso</th>
                <th>Valor</th>
                <th>Status</th>
                <th class="text-center"></th>
              </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <p id="notfound" class="hidden"></p>
    </div>

</div>
<div class="modal-footer hidden">
    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Fechar</button>
</div>

<!-- javascripts -->
<script type="text/javascript" src="javascripts/administrador/credenciamento/search.js"></script>
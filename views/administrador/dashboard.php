<?php
    // if (!isset(
    //     $_SESSION['avaliacao_uid'],
    //     $_SESSION['avaliacao_nome'],
    //     $_SESSION['avaliacao_sobrenome'],
    //     $_SESSION['avaliacao_email'],
    //     $_SESSION['avaliacao_perfil'],
    //     $_SESSION['avaliacao_gestor'],
    //     $_SESSION['avaliacao_estabelecimento']
    // ) || $_SESSION['avaliacao_gestor'] == 0) {
    //     header('Location: /login');
    // }
?>
<!-- Bootstrap Core CSS -->
<link href="assets/template/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/template/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
<!-- animation CSS -->
<link href="assets/template/css/animate.css" rel="stylesheet">
<!-- Menu CSS -->
<link href="assets/template/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="assets/template/css/style.min.css" rel="stylesheet">
<!-- color CSS -->
<link href="assets/template/css/colors/red.css" id="theme" rel="stylesheet">

<?php require_once 'views/template/header.php'; ?>
<?php require_once 'views/template/left.php'; ?>
    
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Dashboard</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Home</li>
                </ol>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="white-box">
                    <div class="r-icon-stats"> <i class="ti-money bg-megna"></i>
                        <div id="countPagamento" class="bodystate">
                            <h4>0</h4> 
                            <span class="text-muted">Pagamentos</span> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="white-box">
                    <div class="r-icon-stats"> <i class="icon-people bg-info"></i>
                        <div id="countCliente" class="bodystate">
                            <h4>0</h4> 
                            <span class="text-muted">Clientes</span> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="white-box">
                    <div class="r-icon-stats"> <i class="icon-layers bg-success"></i>
                        <div id="countLote" class="bodystate">
                            <h4>0</h4> 
                            <span class="text-muted">Lotes</span> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="white-box">
                    <div class="r-icon-stats"> <i class="ti-ticket bg-inverse"></i>
                        <div id="countIngresso" class="bodystate">
                            <h4>0</h4> 
                            <span class="text-muted">Ingressos</span> 
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.row -->

        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Pagamentos</h3>
                    <p class="text-muted">Últimos registros</p>
                    <div class="table-responsive">
                        <table id="table-pagamentos" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Código</th>
                                    <th>Cliente</th>
                                    <th>CPF</th>
                                    <th>Ingresso</th>
                                    <th>Valor</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="5">Nenhum registro encontrado</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- /.row -->

    </div><!-- end col -->
</div><!-- /.row -->

<?php require_once 'views/template/footer.php'; ?>

<!-- javascripts -->
<script type="text/javascript" src="javascripts/functions.js"></script>
<script type="text/javascript" src="javascripts/administrador/dashboard.js"></script>
<script type="text/javascript" src="javascripts/administrador/global.js"></script>

<?php
    if (!isset(
        $_SESSION['congresso_uid'],
        $_SESSION['congresso_nome'],
        $_SESSION['congresso_sobrenome'],
        $_SESSION['congresso_email'],
        $_SESSION['congresso_gestor']
    ) || $_SESSION['congresso_gestor'] == 0) {
        header('Location: /login');
    }
?>
<!-- Bootstrap Core CSS -->
<link href="assets/template/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/template/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
<!-- animation CSS -->
<link href="assets/template/css/animate.css" rel="stylesheet">
<!-- Menu CSS -->
<link href="assets/template/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
<!-- morris CSS -->
<link href="assets/template/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
<link href="assets/template/plugins/bower_components/css-chart/css-chart.css" rel="stylesheet">
<!--Owl carousel CSS -->
<link href="assets/template/plugins/bower_components/owl.carousel/owl.carousel.min.css" rel="stylesheet" type="text/css" />
<link href="assets/template/plugins/bower_components/owl.carousel/owl.theme.default.css" rel="stylesheet" type="text/css" />
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
                <h4 class="page-title">Presença</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="/administrador/dashboard">Dashboard</a></li>
                    <li><a href="/administrador/presenca">Presença</a></li>
                    <li class="active">Novo</li>
                </ol>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">Busca</div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <form id="formClienteBusca" name="formClienteBusca">

                                <div id="success" class="row hidden">
                                    <div class="col-md-12">
                                        <div class="alert alert-success">
                                            <p></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nome">Nome, CPF ou E-mail<abbr>*</abbr></label>
                                            <input type="text" class="form-control" id="pesquisa" name="pesquisa"> 
                                        </div>                                
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" id="procurar" 
                                            class="btn btn-success waves-effect waves-light m-r-10">Procurar</button>
                                        <button type="button" id="cancelar" 
                                            class="btn btn-inverse waves-effect waves-light">Voltar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

        <div id="form-row" class="row hidden">
            <div class="col-md-12">                
                <div class="white-box">

                    <div class="row">

                        <div class="col-sm-12 col-xs-12">
                            <h3 class="box-title m-b-0">Presença</h3>
                            <p class="text-muted m-b-30 font-13"> Preencha o formulário </p>
                        </div>

                        <div class="col-sm-12 col-xs-12">
                            <form id="formCliente" name="formCliente">

                                <div id="error" class="row hidden">
                                    <div class="col-md-12">
                                        <div class="alert alert-warning">
                                            <p></p>
                                        </div>
                                    </div>
                                </div>

                                <!-- hidden input -->
                                <input type="hidden" id="id" name="id">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nome">Nome</label>
                                            <input type="text" class="form-control" id="nome" name="nome" disabled="disabled"> 
                                        </div>                                
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="cracha">Crachá</label>
                                            <input type="text" class="form-control" id="cracha" name="cracha" disabled="disabled"> 
                                        </div>                                
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="cpf">CPF</label>
                                            <input type="text" class="form-control" id="cpf" name="cpf" disabled="disabled"> 
                                        </div>                                
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="sexo">Presença<abbr>*</abbr></label>
                                            <div class="radio radio-success">
                                                <input id="entrada" 
                                                    name="entrada"
                                                    type="radio"
                                                    value="3">
                                                <label for="entrada">3° dia - Entrada</label>
                                            </div>
                                            <div class="radio radio-success">
                                                <input id="saida" 
                                                    name="saida"
                                                    type="radio"
                                                    value="3">
                                                <label for="saida">3° dia - Saída</label>
                                            </div>
                                        </div>                                
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="pais">Recebeu o material didático do evento?<abbr>*</abbr></label>
                                             <div class="checkbox checkbox-success">
                                                <input id="material" name="material" type="checkbox" value="1">
                                                <label for="material">Sim</label>
                                            </div>
                                        </div>                                
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" id="salvar" 
                                            class="btn btn-success waves-effect waves-light m-r-10">Salvar</button>
                                    </div>
                                </div>

                            </form><!--/form-->
                        </div><!-- /.col-sm-12 -->

                    </div><!-- /.row -->

                </div><!--/.white-box-->
            </div>
        </div><!--/.row -->


    </div><!-- end col -->
</div><!-- /.row -->

<?php require_once 'views/template/footer.php'; ?>

<!-- javascripts -->
<script type="text/javascript" src="assets/javascript/jquery.validate.min.js"></script>
<script type="text/javascript" src="javascripts/functions.js"></script>
<script type="text/javascript" src="javascripts/administrador/presenca/add.js"></script>
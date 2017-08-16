<?php
    if (!isset(
        $_SESSION['congresso_uid'],
        $_SESSION['congresso_nome'],
        $_SESSION['congresso_sobrenome'],
        $_SESSION['congresso_cpf'],
        $_SESSION['congresso_email'],
        $_SESSION['congresso_gestor']
    )) {
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
                    <li><a href="/office/dashboard">Dashboard</a></li>
                    <li><a href="/office/credenciamento/add">Presença</a></li>
                    <li class="active">Confirmar</li>
                </ol>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

        <div id="form-row" class="row">
            <div class="col-md-12">                
                <div class="white-box">

                    <div class="row">

                        <div class="col-sm-12 col-xs-12">
                            <form id="formCredenciamento" name="formCredenciamento">

                                <div id="success" class="row hidden">
                                    <div class="col-md-12">
                                        <div class="alert alert-success">
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div id="error" class="row hidden">
                                    <div class="col-md-12">
                                        <div class="alert alert-warning">
                                            <p></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="sexo">Presença<abbr>*</abbr></label>
                                            <div class="form-group hidden">
                                                <div class="checkbox checkbox-success">
                                                    <input id="todos" type="checkbox">
                                                    <label for="todos">Marcar todos</label>
                                                </div>
                                            </div>
                                            <div class="checkbox checkbox-success hidden">
                                                <input id="primeiro" 
                                                    name="presenca[]" 
                                                    type="checkbox" 
                                                    value="1" disabled="disabled">
                                                <label for="primeiro">1° dia</label>
                                            </div>
                                            <div class="checkbox checkbox-success">
                                                <input id="segundo" 
                                                    name="presenca[]"
                                                    type="checkbox"
                                                    value="3" disabled="disabled">
                                                <label for="segundo">3° dia - Entrada</label>
                                            </div>
                                            <div class="checkbox checkbox-success">
                                                <input id="presenca" 
                                                    name="presenca"
                                                    type="checkbox"
                                                    value="3">
                                                <label for="presenca">3° dia - Saída</label>
                                            </div>
                                            <div class="checkbox checkbox-success hidden">
                                                <input id="terceiro" 
                                                    name="presenca[]"
                                                    type="checkbox"
                                                    value="3" disabled="disabled">
                                                <label for="presenca">3° dia</label>
                                            </div>
                                            <div class="checkbox checkbox-success hidden">
                                                <input id="quarto" 
                                                    name="presenca[]"
                                                    type="checkbox"
                                                    value="4">
                                                <label for="presenca[]">4° dia</label>
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
                                        <button type="submit" id="confirmar" 
                                            class="btn btn-success waves-effect waves-light m-r-10">Confirmar</button>
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
<script type="text/javascript" src="javascripts/office/global.js"></script>
<script type="text/javascript" src="javascripts/office/credenciamento/add.js"></script>
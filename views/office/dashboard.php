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
                    <li class="active">Meu painel</li>
                </ol>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="white-box">
                
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="box-title m-b-30"><?=$_SESSION['congresso_nome'].' '.$_SESSION['congresso_sobrenome']?></h3>
                            <!-- Nav tabs -->
                            <ul class="nav nav-custom nav-tabs" role="tablist">
                                <li role="presentation" class="nav-item">
                                    <a href="#info" class="nav-link active" aria-controls="home" role="tab" 
                                        data-toggle="tab" aria-expanded="true">
                                        <span class="visible-xs"><i class="ti-home"></i></span>
                                        <span class="hidden-xs"> Informações básicas</span>
                                    </a>
                                </li>
                                <li role="presentation" class="nav-item">
                                    <a href="#registration" class="nav-link" aria-controls="profile" role="tab" 
                                    data-toggle="tab" aria-expanded="false">
                                    <span class="visible-xs"><i class="ti-user"></i></span> 
                                    <span class="hidden-xs">Matrículas</span>
                                    </a>
                                </li>
                                <li role="presentation" class="nav-item">
                                    <a href="#certificate" class="nav-link" aria-controls="messages" role="tab" 
                                    data-toggle="tab" aria-expanded="false">
                                    <span class="visible-xs"><i class="ti-email"></i></span> 
                                    <span class="hidden-xs">Certificados</span>
                                    </a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="info">
                                    <div class="col-md-3">
                                        <b>Nome completo:</b>
                                    </div>
                                    <div class="col-md-9">
                                        <p>Mark doe</p>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Crachá:</b>
                                    </div>
                                    <div class="col-md-9">
                                        <p>Mark</p>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Sexo:</b>
                                    </div>
                                    <div class="col-md-9">
                                        <p>Masculino</p>
                                    </div>
                                    <div class="col-md-3">
                                        <b>CPF:</b>
                                    </div>
                                    <div class="col-md-9">
                                        <p>007.489.920-10</p>
                                    </div>
                                    <div class="col-md-3">
                                        <b>E-mail:</b>
                                    </div>
                                    <div class="col-md-9">
                                        <p>markdoe@gmail.com</p>
                                    </div>
                                    <div class="col-md-3">
                                        <b>País de origem:</b>
                                    </div>
                                    <div class="col-md-9">
                                        <p>Brasil</p>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Cidade:</b>
                                    </div>
                                    <div class="col-md-9">
                                        <p>Rio branco</p>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Desde de:</b>
                                    </div>
                                    <div class="col-md-9">
                                        <p>19/01/2017 10h41</p>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Último acesso:</b>
                                    </div>
                                    <div class="col-md-9">
                                        <p>24/05/2017 08h39</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="registration">
                                    <div class="well">
                                        <div class="row row-registration">
                                            <div class="col-md-6">
                                                <h5>1º Lote</h5>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <button class="btn btn-outline btn-success"> 
                                                    <i class="icon-doc m-r-5"></i> <span>Emitir certificado</span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <b>Matrícula:</b>
                                            </div>
                                            <div class="col-md-9">
                                                <p>Advocacia (R$120,00)</p>
                                            </div>
                                            <div class="col-md-3">
                                                <b>Transação:</b>
                                            </div>
                                            <div class="col-md-9">
                                                <p>6821EBDE-E36E-4376-9093-219A793D4467</p>
                                            </div>
                                            <div class="col-md-3">
                                                <b>Status:</b>
                                            </div>
                                            <div class="col-md-9">
                                                <p>Paga</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="certificate">
                                    <div class="col-md-6">
                                        <h3>Come on you have a lot message</h3>
                                        <h4>you can use it with the small code</h4>
                                    </div>
                                    <div class="col-md-5 pull-right">
                                        <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a.</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.row -->

                </div>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

    </div><!-- end col -->
</div><!-- /.row -->

<?php require_once 'views/template/rigth.php'; ?>
<?php require_once 'views/template/footer.php'; ?>

<!-- javascripts -->
<!-- <script type="text/javascript" src="javascripts/vendor/login.js"></script> -->

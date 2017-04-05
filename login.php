<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR"><!--<![endif]-->
<head>
<!-- Basic Page Needs -->
<meta charset="utf-8">
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
<title>Iº CONGRESSO JURÍDICO :: UNINORTE ACRE</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" type="text/css" href="stylesheets/bootstrap.css">
<link rel="stylesheet" type="text/css" href="stylesheets/bootstrap-select.css">
<link rel="stylesheet" type="text/css" href="stylesheets/login.css">
<link href='https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="fontes/stylesheet.css">
<link href="images/common/favicon.png" rel="shortcut icon">
<!--[if lt IE 9]>
	<script src="javascript/html5shiv.js"></script>
	<script src="javascript/respond.min.js"></script>
<![endif]-->
</head>

<body>
	<div class="transparencia"></div>
	<div class="container">
		<div class="title">
			<div class="separador"></div>
			<h1>Identificação</h1>
			<h2>Faça o seu login ou inscreva-se</h2>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

		        <div class="flat-form">
		            <ul class="tabs">
		                <li>
		                    <a href="#login" class="active">Login</a>
		                </li>
		                <li>
		                    <a href="#register" >Inscreva-se</a>
		                </li>
		                <li>
		                    <a href="#reset">Resetar Senha</a>
		                </li>
		            </ul>
		            <div id="login" class="form-action show">
		                <h1>Login</h1>
		                <form method="post" action="">
		                	<div class="row">
		                		<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
		                			<div class="row">
				                		<div class="col-md-12">
				                			<div class="form-group">
		                                        <label>E-mail</label>
		                                        <input placeholder="E-mail" class="form-control" type="email">
		                                    </div>
				                		</div>
				                	</div>
				                	<div class="row">
				                		<div class="col-md-12">
				                			<div class="form-group">
		                                        <label>Senha</label>
		                                        <input placeholder="Senha" class="form-control" type="password">
		                                    </div>
				                		</div>
				                	</div>
				                	<div class="row">
				                		<div class="col-md-12 text-center">
				                			<button type="sumit" class="btn btn-success btn-fill btn-wd">Acessar</button>
				                		</div>
				                	</div>
		                		</div>
		                	</div>
		                </form>
		            </div>
		            <!--/#login.form-action-->
		         
			            <div id="register" class="form-action hide">
		                <h1>Dados Pessoais</h1>
		                <form method="post" action="">
                			<div class="row">
		                		<div class="col-md-12">
		                			<div class="form-group">
                                        <label>Nome</label>
                                        <input placeholder="Nome completo" class="form-control" type="text">
                                    </div>
		                		</div>
		                	</div>
		                	<div class="row">
		                		<div class="col-md-6">
		                			<div class="form-group">
                                        <label>Nome no Crachá</label>
                                        <input placeholder="Nome no crachá" class="form-control" type="text">
                                    </div>
		                		</div>
		                		<div class="col-md-6">
		                			<div class="form-group">
                                        <label>E-mail</label>
                                        <input placeholder="E-mail" class="form-control" type="email">
                                    </div>
		                		</div>
		                	</div>
		                	<div class="row">
		                		<div class="col-md-6">
		                			<div class="form-group">
                                        <label>Categoria</label>
										<select class="form-control">
											<option>Estudantes - R$ 80,00</option>
											<option>Advocacia (Oferta) - R$ 150,00</option>
											<option>Outros Profissionais - R$ 200,00</option>
										</select>
                                    </div>
		                		</div>
		                		<div class="form-group col-lg-6">
                                    <label>Sexo</label>
                                    <div class="row">
                                    	<div class="col-md-6">
                                    		<div class="radio">
                                        		<label><input id="" name="" value="M" type="radio"> Masculino</label>
                                        	</div>
                                    	</div>
                                    	<div class="col-md-6">
                                    		<div class="radio">
		                                        <label><input id="" name="" value="F" type="radio"> Feminino</label>
		                                    </div>
                                    	</div>
                                    </div>
                                </div>
		                	</div>
		                	<div class="row">
		                		<div class="col-md-6">
		                			<div class="form-group">
                                        <label>CPF</label>
                                        <input placeholder="CPF" class="form-control" type="text">
                                    </div>
		                		</div>
		                		<div class="col-md-6">
		                			<div class="form-group">
                                        <label>Possui algum tipo de deficiência?</label>
										<select class="form-control">
											<option>Coordenação motora</option>
											<option>Auditiva</option>
											<option>Física</option>
											<option>Intelectual</option>
										</select>
                                    </div>
		                		</div>
		                	</div>
		                	<div class="row">
		                		<div class="col-md-4">
		                			<div class="form-group">
                                        <label>País de Origem</label>
										<select class="form-control">
											<option>Brasil</option>
											<option>Bolívia</option>
											<option>Perú</option>
											<option>Paraguai</option>
										</select>
                                    </div>
		                		</div>
		                		<div class="col-md-4">
		                			<div class="form-group">
                                        <label>Estado</label>
										<select class="form-control">
											<option>Acre</option>
											<option>Alagoas</option>
											<option>Rondônia</option>
										</select>
                                    </div>
		                		</div>
		                		<div class="col-md-4">
		                			<div class="form-group">
                                        <label>Cidade</label>
										<select class="form-control">
											<option>Rio Branco</option>
											<option>Marechal Thaumaturgo</option>
											<option>Sena Madureira</option>
											<option>Cruzeiro do Sul</option>
										</select>
                                    </div>
		                		</div>
		                	</div>
		                	<div class="row">
		                		<div class="col-md-6">
		                			<div class="form-group">
                                        <label>Senha</label>
                                        <input placeholder="Senha" class="form-control" type="password">
                                    </div>
		                		</div>
		                		<div class="col-md-6">
		                			<div class="form-group">
                                        <label>Confirmar Senha</label>
                                        <input placeholder="Confirmar Senha" class="form-control" type="password">
                                    </div>
		                		</div>
		                	</div>
		                	<div class="row">
		                		<div class="col-md-12 text-center">
		                			<button type="sumit" class="btn btn-success btn-fill btn-wd">Acessar</button>
		                		</div>
		                	</div>
		                </form>
			            </div>
			  
		            <!--/#register.form-action-->
		            <div id="reset" class="form-action hide">
		                <h1>Nova Senha</h1>
		                <form method="post" action="">
		                	<div class="row">
		                		<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
		                			<div class="form-group">
	                                    <label>E-mail</label>
	                                    <input placeholder="E-mail" class="form-control" type="email">
	                                </div>
		                		</div>
		                	</div>
		                	<div class="row">
		                		<div class="col-md-12 text-center">
		                			<button type="sumit" class="btn btn-success btn-fill btn-wd">Enviar</button>
		                		</div>
		                	</div>
		                </form>
		            </div>
		            <!--/#register.form-action-->
		        </div>

			</div>
		</div>
    </div>
    <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script class="cssdeck" src="javascript/bootstrap.js"></script>
    <script class="cssdeck" src="javascript/bootstrap-select.js"></script>
    <script class="cssdeck" src="javascript/tabs.js"></script>
</body>
</html>
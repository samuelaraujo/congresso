<!-- CSS Login -->
<link rel="stylesheet" type="text/css" href="<?=URL_APP?>/assets/css/login.css">

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
                        <a href="#login">Login</a>
                    </li>
                    <li>
                        <a href="#register" class="active">Inscreva-se</a>
                    </li>
                    <li>
                        <a href="#reset">Resetar Senha</a>
                    </li>
                </ul>
                <div id="login" class="form-action hide">
                    <h1>Login</h1>
                    <form name="formLogin" role="form" novalidate>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input name="email" placeholder="E-mail" class="form-control" type="email" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Senha</label>
                                            <input name="senha" placeholder="Senha" class="form-control" type="password" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <button type="sumit" class="btn btn-success btn-fill btn-wd">ACESSAR</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!--/#login.form-action-->
             
                <div id="register" class="form-action show">
                    <h1>Dados Pessoais</h1>
                    <form name="formRegister" role="form" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input name="nome" placeholder="Seu nome" class="form-control" type="text" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sobrenome</label>
                                    <input name="sobrenome" placeholder="Sobrenome" class="form-control" type="text" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nome no Crachá</label>
                                    <input name="cracha" placeholder="Nome no crachá" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input name="email" placeholder="E-mail" class="form-control" name="email" type="email" required>
                                    <div class="loading-check">
                                        <img src="assets/images/common/loading.gif" width="28">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ingresso</label>
                                    <select id="ingresso" class="form-control" name="ingresso" required>
                                        <!-- <optgroup ng-repeat="lote in lotes"
                                            label="{{lote.nome}}">
                                            <option ng-repeat="ingresso in lote.ingresso"
                                                ng-disabled="{{ingresso.qtd<=0}}"
                                                value="{{ingresso.id}}">
                                                {{ingresso.nome + ' - ' + (ingresso.valor|finance:true:2) }}
                                            </option>
                                       </optgroup> -->
                                       <option value="" disabled selected>Lote</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Sexo</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="radio">
                                            <label><input name="sexo" value="M" type="radio"> Masculino</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="radio">
                                            <label><input name="sexo" value="F" type="radio"> Feminino</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>CPF</label>
                                    <input placeholder="CPF" name="cpf" class="form-control" type="text" required>
                                    <div class="loading-check">
                                        <img src="assets/images/common/loading.gif" width="28">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Possui algum tipo de deficiência?</label>
                                    <select name="deficiencia" class="form-control" required>
                                        <option value="" disabled selected>Deficiência</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>País de Origem</label>
                                    <select id="pais" name="pais" class="form-control" required>
                                        <option value="" disabled selected>Pais</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Estado</label>
                                    <select id="estado" name="estado" class="form-control" required>
                                        <option value="" disabled selected>Estado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Cidade</label>
                                    <select id="cidade" name="cidade" class="form-control" required>
                                        <option value="" disabled selected>Cidade</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Senha</label>
                                    <input name="senha" placeholder="Senha" class="form-control" type="password" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Confirmar Senha</label>
                                    <input placeholder="Confirmar Senha" name="confirmasenha" class="form-control" type="password" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <!-- <button ng-click="save()" 
                                ng-disabled="formRegister.$invalid || status.loading || usuario.senha != usuario.confirmasenha || cpf.found || email.found" 
                                type="sumit" 
                                class="btn btn-success btn-fill btn-wd"
                                ng-switch="status.loading">
                                    <span ng-switch-default>CADASTRAR</span>
                                    <span ng-switch-when="true">AGUARDE...</span>
                                </button> -->
                                <button type="sumit" 
                                class="btn btn-success btn-fill btn-wd">
                                    <span>CADASTRAR</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--/#register.form-action-->

                <div id="reset" class="form-action hide">
                    <h1>Nova Senha</h1>
                    <form name="formReset" role="form" novalidate>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input name="email" placeholder="E-mail" class="form-control" type="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button class="btn btn-success btn-fill btn-wd" type="sumit">ENVIAR</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--/#register.form-action-->
            </div>

        </div>
    </div>
</div>


<!-- javascripts -->
<script type="text/javascript" src="javascripts/vendor/login.js"></script>

<!-- Javascript Pagseguro -->
<script type="text/javascript"  
    src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
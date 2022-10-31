<?php
    include_once "funcionarioCRUD.php";
        $nome = "";
        $idFuncionario = 0;
        $cpf = "";
        $rg = "";
        $sexo = "";
        $idade = "";
        $posto = "";
        $horario = "";
        $dataContratacao = "";

        if(isset($_GET['idFuncionario'])){
            $idFuncionario = $_GET['idFuncionario'];
            
            $registro = recuperarFuncionarioPorId($id);          
            $nome = $registro['nome'];
            $cpf = $registro['cpf'];
            $rg = $registro['rg'];
            $sexo = $registro['sexo'];
            $idade = $registro['idade'];
            $posto = $registro['posto'];
            $horario = $registro['horario'];
            $dataContratacao = $registro['dataContratacao'];
        }
    ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulário de Funcionários</title>
        <link rel="stylesheet" href="css/bootstrap.css"> 

    </head>
    <body>
    <?php
        include_once "navegar.php";
    ?>
        <style>
            fieldset {
                padding: 25px;
                margin-top: 5%;
                margin-left: 5%;
                margin-right: 5%;
                border: 2px solid black;
            }
            body {
                margin-top: 5%;
                margin-left: 5%;
                margin-right: 5%;
            }
            h1 {
                text-align: center;
            }
            .error {
                color: red;
                font-size: 14px;
            }
            .menu {
                margin-right: 15%;
            }
            a {
                margin-right: 10%;
            }
        </style>
        <div class="row">
            <div class="col-md-12">
                <a href="tabela-funcionario_alma.php" class="btn btn-primary float-right mb-2 mt-5">Consultar ></a>
            </div>
        </div>
        <form id="formulario-funcionario" action="salvar-funcionario_alma.php" method="POST">
            <fieldset>
            <h1>Formulário de Funcionários</h1>
                <div class="row form-group">
                    <input type="hidden" id="idFuncionario" name="idFuncionario" value="<?php echo $idFuncionario; ?>"> 
                    <div class="col-md-12">
                        <label>Nome</label>
                        <input class="form-control" id="nome" name="nome" value="<?php echo $nome; ?>" type="text" placeholder="Informe o seu nome.">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <label>RG</label>
                        <input class="form-control" id="rg" name="rg" value="<?php echo $rg; ?>" type="text" placeholderr="00.000.000-00">
                    </div>
                    <div class="col-md-6">
                        <label>CPF</label>
                        <input class="form-control" id="cpf" name="cpf" value="<?php echo $cpf; ?>" type="text" placeholderr="000.000.000-00">
                    </div>
                    <div class="col-md-6">
                        <label>Idade</label>
                        <input class="form-control" id="idade" name="idade" value="<?php echo $idade; ?>" type="text" placeholderr="'25'">
                    </div>
                    <div class="col-md-6">
                        <label>Sexo</label>
                        <br>
                        <select class="form-control col-md-12 text-center" name="sexo" id="sexo">
                        <option selected disable value="">Selecione o Sexo</option>
                        <option value="F">Feminino</option>
                        <option value="M">Masculino</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
    	            <div class="col-md-6">
                        <label>Posto de Trabalho</label>
                        <br>
                        <select class="form-control col-md-12 text-center" name="posto" id="posto">
                            <option selected disable value="">Selecione o Posto</option>
                            <option value="Gerente">Gerente</option>
                            <option value="Secretária">Secretária</option>
                            <option value="Apicultor">Apicultor</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Horário de Trabalho</label>
                        <br>
                        <select class="form-control col-md-12 text-center" name="horario" id="horario">
                            <option selected disable value="">Selecione o seu horário</option>
                            <option value="Matutino">Matutino</option>
                            <option value="Vespertino">Vespertino</option>
                            <option value="Integral">Intregal</option>
                            <option value="Noturno">Noturno</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Data da contratação</label>
                        <input class="form-control" id="dataContratacao" name="dataContratacao" value="<?php echo $dataContratacao; ?>" type="date" placeholder="DD/MM/AAAA">
                    </div>
                </div>
                <div class="row form-group">		
					<div class="col-md-6"> 
							<a href="menu_alma.php" class="btn btn-primary float-left">Voltar <</a>	
						</div>																							
						<div class="col-md-6"> 
							<button type="submit" class="btn btn-success float-right">Salvar > </button>	
						</div>											
				</div>	  
            </fieldset>
        </form>
        <div class="menu">
            <a href="form_funcionario_alma.php" class="btn btn-primary float-right mb-2 mt-5">Manter Funcionário - CRUD</a>
            <a href="form-colmeia_alma.php" class="btn btn-primary float-right mb-2 mt-5">Manter Colmeia - CRUD</a>
            <a href="form-apiario_alma.php" class="btn btn-primary float-right mb-2 mt-5">Manter Apiário - CRUD</a>
        </div>
    </body>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery.validate.js"></script>
    <script type="text/javascript" src="js/jquery.mask.js"></script>
    <script type="text/javascript" src="js/form-funcionario_alma.js"></script>
</html>
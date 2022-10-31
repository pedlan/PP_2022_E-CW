<?php
    include_once "colmeiaCRUD.php";
    include_once "abelhaCRUD.php";
    include_once "apiarioCRUD.php";


    $id = 0;
    $idabelha = "";
    $idapiario = "";
    $identificacaoApiario = "";
    $condicao = "";


    

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        $registro = recuperarColmeiaPorId($id);

        $idabelha = $registro['idabelha'];
        $idapiario = $registro['idapiario'];
        $identificacaoApiario = $registro['identificacao'];
        $condicao = $registro['condicao'];
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulário de Abelhas</title>
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
            #condicao {
                padding: 20px 26px;
                color: rgb(0, 0, 0);
                font-weight: 400;
                resize: vertical;
                min-height: 15rem;
                max-height: 15rem;
                box-sizing: border-box;
                width: 100%;
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
                <a href="tabela-colmeia_alma.php" class="btn btn-primary float-right mb-2 mt-5">Consultar ></a>
            </div>
        </div>
        <form id="formulario-colmeia" action="salvar-colmeia_alma.php" method="POST">
            <fieldset>
                <h1>Formulário para Colméias</h1>
                <div class="row form-group">
                    <input type="hidden" id="id" name="id" value="<?php echo $id; ?>"> 
                    <div class="col-md-12">
                        <label>Abelha Rainha</label>
                        <select class="form-control col-md-12 text-center" name="idabelha" id="idabelha">
                            <?php
                                $abelhas =  listarAbelha();
                                if($id == 0) {
                                    echo "<option value='' selected disabled> Selecione uma colmeia</option>";
                                    foreach($abelhas as $abelha) {
                                        echo "<option value='{$abelha['idabelha']}'>{$abelha['identificacao']}</option>";
                                    }
                                }
                                else {
                                    foreach($abelhas as $abelha) {
                                        if($abelha['idabelha'] != $idabelha) {
                                            echo "<option value='{$abelha['idabelha']}'>{$abelha['identificacao']}</option>";
                                        }
                                        else {
                                            echo "<option selected value='{$abelha['idabelha']}'>{$abelha['identificacao']}</option>";


                                        }
                                    }
                                }
                            ?>
                        </select>                        
                    </div>
                </div>
                <div class="row form-group">
                    <input type="hidden" id="id" name="id" value="<?php echo $id; ?>"> 
                    <div class="col-md-12">
                        <label>Apiario</label>

                        <select class="form-control col-md-12 text-center" name="idapiario" id="idapiario">
                            <?php
                               $apiarios = listarApiario();
                                if($id == 0) {
                                    echo "<option value='' selected disabled> Selecione uma colmeia</option>";
                                    foreach($apiarios as $apiario) {
                                        echo "<option value='{$apiario['idapiario']}'>{$apiario['condicao']}</option>";
                                    }
                                }
                                else {
                                    foreach($apiarios as $apiario) {
                                        if($abelha['idabelha'] != $idabelha) {
                                            echo "<option value='{$apiario['idapiario']}'>{$apiario['condicao']}</option>";
                                        }
                                        else {
                                            echo "<option selected value='{$apiario['idapiario']}'>{$apiario['condicao']}</option>";


                                        }
                                    }
                                }
                            ?>
                        </select>                                      
                        
                    </div>
                </div>                
                <div class="row form-group">
                    <div class="col-md-6">
                        <label>Identificação da Colmeia</label>
                        <input class="form-control" id="colmeiaApiario" name="colmeiaApiario" value="<?php echo $identificacaoApiario; ?>" readonly type="text" placeholderr="Insira o nome do apiário">
                    </div>
                    <div class="col-md-6">
                        <label>Condição da colmeia</label>
                        <input class="form-control" id="condicaoColmeia" name="condicaoColmeia" value="<?php echo $condicao; ?>" type="text" placeholderr="Insira as observações aqui...">
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
    <script type="text/javascript" src="js/form-colmeia_alma.js"></script>
</html>
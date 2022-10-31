<?php
    include_once "apiarioCRUD.php";
    include_once "colmeiaCRUD.php";
    $nomeApiario = "";
    $id = 0;
    $colmeiaLocalizacao = "";
    $colmeiaApiario =  "";
    $condicaoApiario =  "";
    $produtividadeApiario  = "";

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        $registro = recuperarApiarioPorId($id);
        $nomeApiario = $registro['nomeApiario'];
        $colmeiaLocalizacao = $registro['colmeiaLocalizacao'];
        $colmeiaApiario = $registro['colmeiaApiario'];
        $condicaoApiario = $registro['condicaoApiario'];
        $produtividadeApiario = $registro['produtividadeApiario'];
        
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulário de Apicultores</title>
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
            a {
                margin-right: 12%;
            }
        </style>
        <div class="row">
            <div class="col-md-12">
                <a href="tabela-apiario_alma.php" class="btn btn-primary float-right mb-2 mt-5 font-weight-bold">Consultar ></a>
            </div>
        </div>
        <form id="formulario-apiario" action="salvar-apiario_alma.php" method="POST">
            <fieldset>
                <h1>Formulário de Apiários</h1>
                <div class="row form-group">
                    <input type="hidden" id="id" name="id" value="<?php echo $id; ?>"> 
                    <div class="col-md-12">
                        <label>Nome</label>
                        <input class="form-control" id="nomeApiario" name="nomeApiario" value="<?php echo $nomeApiario; ?>" type="text" placeholder="Ex: 'Zarik2Morgan'.">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <label>Colméia</label>
                        <select class="form-control col-md-12 text-center" name="FK_COLMEIA" id="FK_COLMEIA">
                            <?php
                                $tipos = listarColmeia();
                                if($id == 0) {
                                    echo "<option value='' selected disabled> Selecione uma colmeia</option>";
                                    foreach($tipos as $tipo) {
                                        echo "<option value='{$tipo['idColmeia']}'>{$tipo['colmeiaApiario']}</option>";
                                    }
                                }
                                else {
                                    foreach($tipos as $tipo) {
                                        if($tipo['idColmeia'] != $id) {
                                            echo "<option value='{$tipo['idColmeia']}'>{$tipo['colmeiaApiario']}</option>";
                                        }
                                        else {
                                            echo "<option selected value='{$tipo['idColmeia']}'>{$tipo['colmeiaApiario']}</option>";
                                        }
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Varil de localização</label>
                        <input class="form-control" id="colmeiaLocalizacao" name="colmeiaLocalizacao" value="<?php echo $colmeiaLocalizacao; ?>" type="text" placeholderr="Avenida Ana Moura">
                    </div>
                    <div class="col-md-6">
                        <label>Produtividade do apiário</label>
                        <br>
                        <select class="form-control col-md-12 text-center" name="produtividadeApiario" id="produtividadeApiario">
                            <option selected disabled value="<?php echo $produtividadeApiario; ?>">Selecione a produtividade</option>
                            <option value="excelente">Excelente</option>
                            <option value="boa">Boa</option>
                            <option value="normal">Normal</option>
                            <option value="ruim">Ruim</option>
                            <option value="pessimo">Pessimo</option>
                        </select>
                    </div>                
                    <div class="col-md-6">
                        <label>Condição do Apiário</label>
                        <input class="form-control" id="condicaoApiario" name="condicaoApiario" value="<?php echo $condicaoApiario; ?>" type="text" placeholderr="Ex: Ambiente sujo.">
                    </div>                       
                </div>
                <div class="row form-group">		
					<div class="col-md-6"> 
							<a href="menu_alma.php" class="btn btn-primary float-left font-weight-bold">Voltar <</a>	
						</div>																							
						<div class="col-md-6"> 
							<button type="submit" class="btn btn-success float-right font-weight-bold">Salvar > </button>	
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
    <script type="text/javascript" src="js/form-apiario_alma.js"></script>
</html>
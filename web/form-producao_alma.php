<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulário de Produção</title>
        <link rel="stylesheet" href="css/bootstrap.css"> 
    </head>
    <body>
    <div class="row">
        <div class="col-md-12">
            <a href="tabela-funcionario_alma.php" class="btn btn-primary float-right mb-2 mt-5 font-weight-bold">Consultar ></a>
        </div>
    </div>
    <form id="formulario-apiario" action="salvar-apiario_alma.php" method="POST">
        <fieldset>
            <h1>Formulário de Produção</h1>
            <div class="row from-group">
                <input type="hidden" id="id" name="id" value="<?php echo $id; ?>"> 
                <div class="col-md-3">
                    <select class="form-control col-md-12 text-center" name="nomeApiario" id="nomeApiario">
                        <?php
                            foreach()
                        ?>
                    </select>
                </div>
            </div>
        </fieldset>
    </form>
    </body>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery.validate.js"></script>
    <script type="text/javascript" src="js/jquery.mask.js"></script>
</html>
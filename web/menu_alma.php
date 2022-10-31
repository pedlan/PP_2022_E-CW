<html>
    <head>
        <title>Menu - A.L.M.A.</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/bootstrap.css">  
    </head>
    <body>
        <?php
            include_once "navegar.php";
        ?>
        <style>
            body {
                margin-top: 10%;
                margin-left: 20%;
                margin-right: 20%;
                padding: 20px;
            }
            a {
                margin-right: 10%;
            }
        </style>
        <h1>Pedro Coelho & Pedro Moraes</h1>
        <a href="form_funcionario_alma.php" class="btn btn-primary float-right mb-2 mt-5">Login</a>
        <a href="form-colmeia_alma.php" class="btn btn-primary float-right mb-2 mt-5">Cadastrar</a>
        <a href="form-apiario_alma.php" class="btn btn-primary float-right mb-2 mt-5">Manter Apiário - CRUD</a>
        <a class="btn btn-outline-danger my-2 my-sm-0" href="loginSair.php">Sair</a>
    </body>
</html>
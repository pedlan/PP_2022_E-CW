<?php      
    include_once "colmeiaCRUD.php";
        $conexao = new PDO('mysql:host=localhost; dbname=bd_alma', 'root', '');
        
        $sql = "SELECT * FROM apiario;";
        
        $sentenca = $conexao->prepare($sql);
        $sentenca->execute(); 

        $conexao = null;
        $jairBolsonaro = $_GET['FK_COLMEIA'];
        $id = recuperarColmeiaPorId($jairBolsonaro);
    ?>

    <html>

        <head>
            <meta charset="utf-8" />
            <title> Tabela - Apiário </title>
            <link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
            <link type="text/css" rel="stylesheet" href="css/datatables.css"/>
        </head>

        <body>
            
        <?php
            include_once "navegar.php";
        ?>
            <div class="container">
                <h1>Consulta de Apiários</h1>
                <hr/>
            <a href="form-apiario_alma.php" class="btn btn-primary float-right mb-2">Cadastrar</a>
            <table id="tabelaapiario" class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Localização</th>
                        <th>Código Colmeia</th>
                        <th>Condição</th>
                        <th>Produtividade</th>
                        <th></th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php    
                        $registros = $sentenca->fetchAll();
                        foreach($registros as $registro){
                            echo "<tr>"; 
                            echo "<td> {$registro['idApiario']} </td>";
                            echo "<td> {$registro['nomeApiario']} </td>";
                            echo "<td> {$registro['colmeiaLocalizacao']} </td>";
                            echo "<td> {$registro['FK_COLMEIA']} </td>";
                            echo "<td> {$registro['condicaoApiario']} </td>";
                            echo "<td> {$registro['produtividadeApiario']} </td>";
                            echo "<td> <a href='excluir-apiario_alma.php?id={$registro['idApiario']}' class='btn btn-danger float-right'> Excluir</a>";
                            echo "<a href='form-apiario_alma.php?id={$registro['idApiario']}' class='btn btn-warning float-right mr-1'> Editar</a> </td>";
                            echo "</tr>"; 
                        } 
                    ?>
                </tbody>
            </table>
        </div>

        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/tabela-apiario_alma.js"></script>
    </body>

    </html>
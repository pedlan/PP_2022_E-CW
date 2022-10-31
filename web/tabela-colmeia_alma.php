<?php		
		$conexao = new PDO('mysql:host=localhost; dbname=bd_alma', 'root', '');
		
		$sql = "SELECT * FROM colmeia;";
		
		$sentenca = $conexao->prepare($sql);
		$sentenca->execute(); 

		$conexao = null;
	?>
	<html>
		<head>
	    	<meta charset="utf-8" />
	    	<title> Tabela - Funcionário </title>
	    	<link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
			<link type="text/css" rel="stylesheet" href="css/datatables.css"/>
		</head>

		<body>
        <?php
            include_once "navegar.php";
        ?>
	    	<div class="container">
				<h1>Consulta de Colméias</h1>
				<hr/>
	        <a href="form-colmeia_alma.php" class="btn btn-primary float-right mb-2">Cadastrar</a>
			<table id="tabelacolmeia"class="table">
	            <thead class="thead-dark">
	                <tr>
						<th>Codigo</th>
						<th>Nome</th>
						<th>Abelha rainha</th>
                        <th>Condição</th>
	                	<th></th>
					</tr>
	            </thead>
				<tbody>
	                <?php	
						$registros = $sentenca->fetchAll();
						foreach($registros as $registro){
							echo "<tr>"; 
							echo "<td> {$registro['idColmeia']} </td>";
							echo "<td> {$registro['colmeiaApiario']} </td>";
							echo "<td> {$registro['nomeAbelha']} </td>";
							echo "<td> {$registro['condicaoColmeia']} </td>";
							echo "<td> <a href='excluir-colmeia_alma.php?id={$registro['idColmeia']}' class='btn btn-danger float-right'> Excluir</a>";
							echo "<a href='form-colmeia_alma.php?id={$registro['idColmeia']}' class='btn btn-warning float-right mr-1'> Editar</a> </td>";
							echo "</tr>"; 
						} 
					?>
	            </tbody>
	        </table>
	    </div>
	    <script type="text/javascript" src="js/jquery.js"></script>
	    <script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/tabela-colmeia_alma.js"></script>
	</body>

	</html>
<?php		
		session_start();

		include_once "usuarioCRUD.php";

		if(!isset($_SESSION['DADOS_USUARIO'])){		
			echo "<script>alert('Acesso negado!'); location.href='index.php';</script>"; 
		}		
		
		$registros = listarUsuario();
	?>

	<html>

	<head>
	    <meta charset="utf-8" />
	    <title> Usuário </title>
	    <link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
	    <link type="text/css" rel="stylesheet" href="css/estilos.css" />
		<link type="text/css" rel="stylesheet" href="css/datatables.css" />
	</head>

	<body>
	    <div class="container">
			<h1>Consulta de Usuários</h1>
			<hr/>
	        <a href="usuarioFormulario.php" class="btn btn-primary float-right mb-2">Cadastrar</a>
	        <table id="tabela" class="table">
	            <thead class="thead-dark">
	                <tr>
	                    <th>Nome</th>
						<th>Login</th>
						<th></th>
	                </tr>
	            </thead>
	            <tbody>
	                <?php	
						foreach($registros as $registro){							;
							echo "<tr>"; 
							echo "<td> {$registro['nomeUsuario']} </td>";
							echo "<td> {$registro['login']} </td>"; 							
							echo "<td> <button type='button' onclick='confirmarExclusao({$registro['idUsuario']})' class='btn btn-danger float-right'>Excluir</button>";
							echo "<a href='usuarioFormulario.php?id={$registro['idUsuario']}' class='btn btn-warning float-right mr-1'> Editar</a> </td>";
							echo "</tr>"; 
						} 
					?>
	            </tbody>
	        </table>
	    </div>
	    <script type="text/javascript" src="js/jquery.js"></script>
	    <script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/datatables.js"></script>
		<script type="text/javascript" src="js/jquery.mask.js"></script>		
		<script type="text/javascript" src="js/usuarioTabela.js"></script>
	</body>

	</html>
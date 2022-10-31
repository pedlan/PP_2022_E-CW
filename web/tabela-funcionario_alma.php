<?php		
		$conexao = new PDO('mysql:host=localhost; dbname=bd_alma', 'root', '');
		
		$sql = "SELECT * FROM funcionario;";
		
		$sentenca = $conexao->prepare($sql);
		$sentenca->execute(); 

		$conexao = null;
	?>

	<html>

	<head>
	    <meta charset="utf-8" />
	    <title> Usuário </title>
	    <link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
		<link type="text/css" rel="stylesheet" href="css/datatables.css" />
	</head>

	<body>

		<?php		
			include_once "navegar.php";
		?>

	    <div class="container">
			<h1>Consulta - Funcionários</h1>
			<hr/>
	        <a href="form_funcionario_alma.php" class="btn btn-primary float-right mb-2">Cadastrar</a>
	        <table id="tabela" class="table">
	            <thead class="thead-dark">
	                <tr>
                        <th>ID</th>
	                    <th>Nome</th>
						<th>Posto</th>
						<th>Horário</th>
						<th></th>
	                </tr>
	            </thead>
	            <tbody>
	                <?php	
						$registros = $sentenca->fetchAll();
                        foreach($registros as $registro){
							echo "<tr>"; 
							echo "<td> {$registro['idFuncionario']} </td>";
							echo "<td> {$registro['nome']} </td>";
							echo "<td> {$registro['posto']} </td>";
							echo "<td> {$registro['horario']} </td>";
							echo "<td> <a href='excluir-funcionario_alma.php?id={$registro['idFuncionario']}' class='btn btn-danger float-right'> Excluir</a>";
							echo "<a href='form_funcionario_alma.php?id={$registro['idFuncionario']}' class='btn btn-warning float-right mr-1'> Editar</a> </td>";
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
		<script type="text/javascript" src="js/tabela-funcionario_alma.js"></script>
	</body>

	</html>
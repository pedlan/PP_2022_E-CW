<?php			
	include_once "funcionarioCRUD.php";
	
    $nome = $_POST['nome'];
    $idFuncionario = $_POST['idFuncionario'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $sexo = $_POST['sexo'];
    $idade = $_POST['idade'];
    $posto = $_POST['posto'];
    $horario = $_POST['horario'];
    $dataContratacao = $_POST['dataContratacao'];
    

	$quantidade = salvarFuncionario($idFuncionario, $nome, $cpf, $rg, $sexo, $idade, $posto, $horario, $dataContratacao);

	if($quantidade > 0){
		echo  "<script>alert('Registro salvo com sucesso!');</script>";
		echo  "<script>window.location.replace('tabela-funcionario_alma.php');</script>";
	}else{
		echo  "<script>alert('Erro ao salvar o registro');</script>";
		echo  "<script>window.location.replace('form-funcionario_alma.php');</script>";		
	}
?>	
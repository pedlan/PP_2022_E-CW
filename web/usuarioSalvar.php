<?php			
	include_once "usuarioCRUD.php";
	
	$id = $_POST['id'];
    $nomeUsuario = $_POST['nomeUsuario'];
	$login = $_POST['login'];
	$senha = $_POST['senha'];

	$quantidade = salvarUsuario($id, $nomeUsuario, $login, $senha);

	if($quantidade > 0){
		echo  "<script>alert('Registro salvo com sucesso!');</script>";
		echo  "<script>window.location.replace('usuarioTabela.php');</script>";
	}else{
        echo  "<script>alert('Erro ao salvar o registro');</script>";
		echo  "<script>window.location.replace('usuarioFormulario.php');</script>";		
	    }
?>	
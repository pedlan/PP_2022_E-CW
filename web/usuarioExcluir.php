<?php			
	include_once "usuarioCRUD.php";

	$id = $_GET['id'];
	$quantidade = excluirUsuario($id);
	
	echo $quantidade;
?>
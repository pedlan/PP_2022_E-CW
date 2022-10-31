<?php	
	session_start();		
	include_once "usuarioCRUD.php";
	
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $registro = autenticarUsuario($login, $senha);
    
    if($registro != null){	

		$_SESSION['DADOS_USUARIO'] = $registro;		

		echo "<script>location.href='menu_alma.php';</script>"; 
	}else{
		echo "<script>alert('Login ou senha inválido!'); location.href='index.php';</script>"; 			
	}
?>	
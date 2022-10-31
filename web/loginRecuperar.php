<?php	
	include_once "usuarioCRUD.php";
	 
    $email = $_POST['email']; 

    $usuario = recuperarUsuarioPorLogin($login);
 
    if($usuario != null){	

		$novaSenha = gerarSenha(10);

		$destinatario  =  $email;
		$assunto  = "Apiário - Recuperação de senha";
		$mensagem  = "Sua senha é: {$novaSenha}"; 
	
		$headers = "From: pedro1905050@gmail.com"; 
	
		$envio = mail($destinatario, $assunto, $mensagem, $headers); 
	
		if($envio){
			salvarUsuario($usuario['idUsuario'], $usuario['login'], $novaSenha);
			echo "<script>alert('E-mail enviado.'); location.href='index.php';</script>"; 
		}else{
			echo "<script>alert('Erro ao enviar e-mail.');</script>";
		}	
		 
	}else{
		echo "<script>alert('Login inválido!'); location.href='index.php';</script>"; 			
	}
?>	
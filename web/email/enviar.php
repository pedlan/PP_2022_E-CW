<?php
	$destinatario  = $_POST['destinatario'];
	$assunto  = $_POST['assunto'];
	$mensagem  = $_POST['mensagem']; 

	$headers = "From: pedro1905050@gmail.com"; 

	$envio = mail($destinatario, $assunto, $mensagem, $headers); 

	if($envio){
		echo "<script>alert('E-mail enviado.');</script>"; 
	}else{
		echo "<script>alert('Erro ao enviar e-mail.');</script>";
	}

	echo "<script>location.href='index.php';</script>"; 
?>
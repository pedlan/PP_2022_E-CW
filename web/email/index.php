<html>
<head>
    <meta charset="utf-8">
    <title>Exemplo: Enviar e-mail</title>
	<link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
	<link type="text/css" rel="stylesheet" href="css/estilos.css"/>
</head>
	<body>
		<div class="container mt-4">
			<h1 id="titulo">Recuperação de Senha</h1>
			<form id="formulario" class="mt-4" action="enviar.php" method="post">
				<fieldset>
					<div class="row form-group">
						<div class="col-md-12">
							<label for="destinatario">Destinatário</label>  
							<input class="form-control" id="destinatario" name="destinatario" value="" type="text">
						</div>							
					</div>
					<div class="row form-group">
						<div class="col-md-12">
							<label for="assunto">Assunto</label>  
							<input class="form-control" id="assunto" name="assunto" value="" type="text">
						</div>							
					</div>				
					<div class="row form-group">
						<div class="col-md-12">
							<label for="mensagem">Mensagem</label>  
							<textarea class="form-control" id="mensagem" name="mensagem" rows="4"></textarea>
						</div>							
					</div>
					<div class="row form-group">
						<div class="col-md-12">
							<button type="submit" class="btn btn-success float-right">Enviar</button>	
						</div>											
					</div>					
				</fieldset>
			</form>  
		</div>	
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/jquery.validate.js"></script>				
		<script type="text/javascript" src="js/index.js"></script>			
	</body>
</html>



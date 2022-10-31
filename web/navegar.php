<?php
    session_start();
    $identificacao = "Visitante";

    if(isset($_SESSION['DADOS_PESSOA'])){		
        $dados = $_SESSION['DADOS_PESSOA'];
        $identificacao = $dados['login'];
    }
    
    
?>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="menu_alma.php">SGA</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="form_funcionario_alma.php">Manter Funcionario</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="form-colmeia_alma.php">Manter Colmeia</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="form-apiario_alma.php">Manter Apiário</a>
          </li>              
        </ul>
      </div>
        <div class="form-inline my-2 my-lg-0">
				  <a class="btn btn-outline-danger my-2 my-sm-0" href="loginSair.php">Sair</a>
			  </div>

    </div>
  </nav>
  <br>
  <br>
  <br>
  
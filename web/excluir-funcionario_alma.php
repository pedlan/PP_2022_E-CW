<?php			
    $id = $_GET['id'];
    $sql = "DELETE FROM funcionario WHERE idFuncionario = :id;";
    $conexao = new PDO('mysql:host=localhost; dbname=bd_alma', 'root', '');

    $sentenca = $conexao->prepare($sql);
    $sentenca->bindValue(':id', $id);
    $sentenca->execute();

    $conexao = null;

    echo  "<script>window.location.replace('tabela-funcionario_alma.php');</script>";
?>
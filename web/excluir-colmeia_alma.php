<?php		

    $idColmeia = $_GET['id'];
    $sql = "DELETE FROM colmeia WHERE idColmeia = :idColmeia;";
    $conexao = new PDO('mysql:host=localhost; dbname=bd_alma', 'root', '');

    $sentenca = $conexao->prepare($sql);
    $sentenca->bindValue(':idColmeia', $idColmeia);
    $sentenca->execute();

    $conexao = null;

    echo  "<script>window.location.replace('tabela-colmeia_alma.php');</script>";
?>
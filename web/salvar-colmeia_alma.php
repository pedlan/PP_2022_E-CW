<?php
include_once "colmeiaCRUD.php";

$id = $_POST['id'];

$idapiario = $_POST['idapiario'];
$idabelha = $_POST['idabelha'];
$identificacaoColmeia = $_POST['colmeiaApiario'];
$condicao = $_POST['condicaoColmeia'];

$quantidade = salvarColmeia($id, $idapiario, $idabelha, $identificacaoColmeia, $condicao);

if($quantidade > 0){
    echo  "<script>alert('Colmeia salva com sucesso!');</script>";
    echo  "<script>window.location.replace('tabela-colmeia_alma.php');</script>";
}else{
    echo  "<script>alert('Erro ao salvar a colmeia');</script>";
    echo  "<script>window.location.replace('form-colmeia_alma.php');</script>";		
}
?>
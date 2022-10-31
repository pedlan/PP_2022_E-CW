<?php
include_once "apiarioCRUD.php";
$nomeApiario = $_POST['nomeApiario'];
$id = $_POST['id'];
$colmeiaLocalizacao = $_POST['colmeiaLocalizacao'];
$FK_COLMEIA = $_POST['FK_COLMEIA'];
$condicaoApiario = $_POST['condicaoApiario'];
$produtividadeApiario = $_POST['produtividadeApiario'];

$quantidade = salvarApiario($id, $nomeApiario, $colmeiaLocalizacao, $FK_COLMEIA, $condicaoApiario, $produtividadeApiario);

if($quantidade > 0){
    echo  "<script>alert('Apiario salva com sucesso!');</script>";
    echo  "<script>window.location.replace('tabela-apiario_alma.php');</script>";
}else{
    echo  "<script>alert('Erro ao salvar o Apiario');</script>";
    echo  "<script>window.location.replace('form-apiario_alma.php');</script>";		
}
?>
?>

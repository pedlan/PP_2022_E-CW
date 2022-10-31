<?php
    function criarConexao(){        
        $conexao = null;
        try{	        
            $conexao = new PDO('mysql:host=localhost; dbname=bd_alma', 'root', '');
            $conexao->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		}catch (PDOException $erro){
            criarArquivoErro($erro);
            die();
        }	        
        return $conexao;
    }

    function criarArquivoErro($erro){
        echo "<script>alert('Foi gerada uma exceção.');</script>"; 
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('d/m/Y H:i:s');
        $nomeArquivo = "erro-". date('d_m_Y-H_i_s').".txt";
        $arquivo = fopen($nomeArquivo,'a+');
        $texto = "Data: {$data} \n";
        $texto = $texto . "\t Arquivo: {$erro->getFile()} - Linha: {$erro->getLine()} \n"; 
        $texto = $texto . "\t Erro: {$erro->getMessage()} \n";
        fwrite($arquivo, $texto);
        fclose($arquivo);
    } 
?>    
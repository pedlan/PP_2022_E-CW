<?php
    include_once "bancodedadosCRUD.php";

    function salvarAbelha($id, $identificacao, $idade){
        try{
            $conexao = criarConexao();

            if($id == 0){
                $sql = "INSERT INTO abelha(identificacao, idade) VALUES(:identificacao, :idade);";
                $sentenca = $conexao->prepare($sql);
                $sentenca->bindValue(':identificacao', $login);
                $sentenca->bindValue(':idade', $nomeUsuario);  
            }else{
                $sql = "UPDATE abelha SET identificacao = :identificacao, idade = :idade WHERE idabelha = :id;";
                $sentenca = $conexao->prepare($sql);
                $sentenca->bindValue(':identificacao', $nomeUsuario); 
                $sentenca->bindValue(':idade', $login); 
                $sentenca->bindValue(':id', $id); 
            }
        
            $sentenca->execute();     
            $conexao = null;    
            return $sentenca->rowCount();
        }catch (PDOException $erro){
            criarArquivoErro($erro);
            die();
        }        
    }

    function excluirAbelha($id){
        try{
            $sql = "DELETE FROM abelha WHERE idabelha = :id;";

            $conexao = criarConexao();

            $sentenca = $conexao->prepare($sql);
            $sentenca->bindValue(':id', $id); 
        
            $sentenca->execute(); 
            $conexao = null;
            return $sentenca->rowCount();
        }catch (PDOException $erro){
            criarArquivoErro($erro);
            die();
        }
    }    

    function listarAbelha(){
        try{
            $sql = "SELECT * FROM abelha;";

            $conexao = criarConexao();        
            $sentenca = $conexao->prepare($sql);
        
            $sentenca->execute();     
            $conexao = null;
            return $sentenca->fetchAll();
        }catch (PDOException $erro){
            criarArquivoErro($erro);
            die();
        }
    }  

    function recuperarAbelhaPorId($id){
        try{
            $sql = "SELECT * FROM abelha WHERE idabelha = :id;";

            $conexao = criarConexao();        
            $sentenca = $conexao->prepare($sql);
            $sentenca->bindValue(':id', $id); 
        
            $sentenca->execute();     
            $conexao = null;
            return $sentenca->fetch();
        }catch (PDOException $erro){
            criarArquivoErro($erro);
            die();
        }
    }    

   
       
?>



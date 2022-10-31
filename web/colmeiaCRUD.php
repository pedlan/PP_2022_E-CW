<?php
    include_once "bancodedadosCRUD.php";

    function salvarColmeia($id, $idapiario, $idabelha, $identificacao, $condicao){

        try{
            $conexao = criarConexao();

            if($id == 0){

                $identificacao = "Colmeia";

                $sql = "INSERT INTO colmeia(idapiario, idabelha, identificacao, condicao) VALUES (:idapiario, :idabelha, :identificacao, :condicao);";

                $sentenca = $conexao->prepare($sql);
                $sentenca->bindValue(':idapiario', $idapiario);
                $sentenca->bindValue(':idabelha', $idabelha);
                $sentenca->bindValue(':identificacao', $identificacao);
                $sentenca->bindValue(':condicao', $condicao);

                $sentenca->execute();
                

                $id = $conexao->lastInsertId();
                $identificacao = $identificacao .' - '.  $id; 
                $sql = "UPDATE colmeia SET identificacao = :identificacaoo WHERE idcolmeia = :id;";
                $sentenca->bindValue(':identificacao', $identificacao);
                $sentenca->bindValue(':id', $id);


            } else {
                $sql = "UPDATE colmeia SET idapiario = :idapiario, idabelha = :idabelha, identificacao = :identificacao, condicao = :condicao WHERE idcolmeia = :id;";
            
                $sentenca = $conexao->prepare($sql);
                $sentenca->bindValue(':id', $id);
                $sentenca->bindValue(':idapiario', $idapiario);
                $sentenca->bindValue(':idabelha', $idabelha);
                $sentenca->bindValue(':identificacao', $identificacao);
                $sentenca->bindValue(':condicao', $condicao);

                $sentenca->execute();
                $conexao = null; 
            
            }

            return $sentenca->rowCount();

            }catch (PDOException $erro){
                criarArquivoErro($erro);
                die();
            }	     
        }

    function excluirColmeia($id){
        try{
            $sql = "DELETE FROM colmeia WHERE idcolmeia = :id;";

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

    function listarColmeia(){
        try{
            $sql = "SELECT * FROM colmeia;";

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

    function recuperarColmeiaPorId($id){
        try{
            $sql = "SELECT * FROM colmeia WHERE idcolmeia = :id;";

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



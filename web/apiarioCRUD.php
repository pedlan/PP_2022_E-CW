<?php
    include_once "bancodedadosCRUD.php";

    function salvarApiario($id, $nomeApiario, $colmeiaLocalizacao, $FK_COLMEIA, $condicaoApiario, $produtividadeApiario){
        try{
            $conexao = criarConexao();

            if($id == 0){
                $sql = "INSERT INTO apiario(nomeApiario, colmeiaLocalizacao, FK_COLMEIA, condicaoApiario, produtividadeApiario) VALUES (:nomeApiario, :colmeiaLocalizacao, :FK_COLMEIA, :condicaoApiario, :produtividadeApiario);";

                $sentenca = $conexao->prepare($sql);
                $sentenca->bindValue(':nomeApiario', $nomeApiario);
                $sentenca->bindValue(':colmeiaLocalizacao', $colmeiaLocalizacao);
                $sentenca->bindValue(':FK_COLMEIA', $FK_COLMEIA);
                $sentenca->bindValue(':condicaoApiario', $condicaoApiario);
                $sentenca->bindValue(':produtividadeApiario', $produtividadeApiario);
            } else {
                $sql = "UPDATE apiario SET nomeApiario = :nomeApiario, colmeiaLocalizacao = :colmeiaLocalizacao, FK_COLMEIA = :FK_COLMEIA, condicaoApiario = :condicaoApiario, produtividadeApiario = :produtividadeApiario WHERE idApiario = :id;";

                $sentenca = $conexao->prepare($sql);
                $sentenca->bindValue(':id', $id);
                $sentenca->bindValue(':nomeApiario', $nomeApiario);
                $sentenca->bindValue(':colmeiaLocalizacao', $colmeiaLocalizacao);
                $sentenca->bindValue(':FK_COLMEIA', $FK_COLMEIA);
                $sentenca->bindValue(':condicaoApiario', $condicaoApiario);
                $sentenca->bindValue(':produtividadeApiario', $produtividadeApiario);

            }
            $sentenca->execute();
            $conexao = null; 
            return $sentenca->rowCount();

            }catch (PDOException $erro){
                criarArquivoErro($erro);
                die();
            }	     
        }

    function excluirApiario($id){
        try{
            $sql = "DELETE FROM apiario WHERE idApiario = :id;";

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

    function listarApiario(){
        try{
            $sql = "SELECT * FROM apiario;";

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

    function recuperarApiarioPorId($id){
        try{
            $sql = "SELECT * FROM apiario WHERE idApiario = :id;";

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



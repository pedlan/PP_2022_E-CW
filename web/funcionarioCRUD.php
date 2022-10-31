<?php
    include_once "bancodedadosCRUD.php";

    function salvarFuncionario($idFuncionario, $nome, $cpf, $rg, $sexo, $idade, $posto, $horario, $dataContratacao){
        try{
            $conexao = criarConexao();

            if($idFuncionario == 0){
                $sql = "INSERT INTO funcionario(nome, cpf, rg, sexo, idade, posto, horario, dataContratacao) VALUES (:nome, :cpf, :rg, :sexo, :idade, :posto, :horario, :dataContratacao);";

                $sentenca = $conexao->prepare($sql);
                $sentenca->bindValue(':nome', $nome);
                $sentenca->bindValue(':cpf', $cpf);
                $sentenca->bindValue(':rg', $rg);
                $sentenca->bindValue(':sexo', $sexo);
                $sentenca->bindValue(':idade', $idade);
                $sentenca->bindValue(':posto', $posto);
                $sentenca->bindValue(':horario', $horario);
                $sentenca->bindValue(':dataContratacao', $dataContratacao);
            }else{
                $sql = "UPDATE funcionario SET nome = :nome, rg = :rg, cpf = :cpf, sexo = :sexo, idade = :idade, posto = :posto, horario = :horario, dataContratacao = :dataContratacao WHERE idFuncionario = :idFuncionario;";

                $sentenca = $conexao->prepare($sql);
                $sentenca->bindValue(':idFuncionario', $idFuncionario);
                $sentenca->bindValue(':nome', $nome);
                $sentenca->bindValue(':cpf', $cpf);
                $sentenca->bindValue(':rg', $rg);
                $sentenca->bindValue(':sexo', $sexo);
                $sentenca->bindValue(':idade', $idade);
                $sentenca->bindValue(':posto', $posto);
                $sentenca->bindValue(':horario', $horario);
                $sentenca->bindValue(':dataContratacao', $dataContratacao);
                }
        
                $sentenca->execute();     
                $conexao = null;    
                return $sentenca->rowCount();

            }catch (PDOException $erro){
                criarArquivoErro($erro);
                die();
            }	     
        }

    function excluirFuncionario($id){
        try{
            $sql = "DELETE FROM funcionario WHERE idFuncionario = :idFuncionario;";

            $conexao = criarConexao();

            $sentenca = $conexao->prepare($sql);
            $sentenca->bindValue(':idFuncionario', $idFuncionario); 
        
            $sentenca->execute(); 
            $conexao = null;
            return $sentenca->rowCount();
        }catch (PDOException $erro){
            criarArquivoErro($erro);
            die();
        }
    }    

    function listarFuncionario(){
        try{
            $sql = "SELECT * FROM funcionario;";

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

    function recuperarFuncionarioPorId($idFuncionario){
        try{
            $sql = "SELECT * FROM funcionario WHERE idFuncionario = :idFuncionario;";

            $conexao = criarConexao();        
            $sentenca = $conexao->prepare($sql);
            $sentenca->bindValue(':idFuncionario', $idFuncionario); 
        
            $sentenca->execute();     
            $conexao = null;
            return $sentenca->fetch();
        }catch (PDOException $erro){
            criarArquivoErro($erro);
            die();
        }
    }  
?>



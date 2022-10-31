<?php
    include_once "bancodedadosCRUD.php";

    function salvarUsuario($id, $nomeUsuario, $login, $senha){
        try{
            $conexao = criarConexao();

            if($id == 0){
                $sql = "INSERT INTO usuario(login, nomeUsuario,  senha) VALUES(:login, :nomeUsuario,  :senha);";
                $sentenca = $conexao->prepare($sql);
                $sentenca->bindValue(':login', $login);
                $sentenca->bindValue(':nomeUsuario', $nomeUsuario);  
                $sentenca->bindValue(':senha', $senha);  
            }else{
                $sql = "UPDATE usuario SET login = :login, senha = :senha, nomeUsuario = :nomeUsuario WHERE idUsuario = :id;";
                $sentenca = $conexao->prepare($sql);
                $sentenca->bindValue(':nomeUsuario', $nomeUsuario); 
                $sentenca->bindValue(':login', $login); 
                $sentenca->bindValue(':senha', $senha);  
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

    function excluirUsuario($id){
        try{
            $sql = "DELETE FROM usuario WHERE idUsuario = :id;";

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

    function listarUsuario(){
        try{
            $sql = "SELECT * FROM usuario;";

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

    function recuperarUsuarioPorId($id){
        try{
            $sql = "SELECT * FROM usuario WHERE idUsuario = :id;";

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

    function verificarUsuarioPorLogin($id, $login){
        try{   
            $sql = "SELECT * FROM usuario WHERE login = :login AND idUsuario <> :id;";

            $conexao = criarConexao();
            $sentenca = $conexao->prepare($sql);	
            $sentenca->bindValue(':login', $login); 		
            $sentenca->bindValue(':id', $id); 				

            $sentenca->execute(); 
            $conexao = null;

            return $sentenca->rowCount();
        }catch (PDOException $erro){
            criarArquivoErro($erro);
            die();
        }
    } 

    function autenticarUsuario($login, $senha){
        try{   
            $sql = "SELECT * FROM usuario WHERE login = :login AND senha = :senha;";

            $conexao = criarConexao();
            $sentenca = $conexao->prepare($sql);	
            $sentenca->bindValue(':login', $login); 		
            $sentenca->bindValue(':senha', $senha); 				

            $sentenca->execute();             
            $conexao = null;

            return $sentenca->fetch();
        }catch (PDOException $erro){
            criarArquivoErro($erro);
            die();
        }
    }  

    function recuperarUsuarioPorLogin($login){
        try{
            $sql = "SELECT * FROM usuario WHERE login = :login;";

            $conexao = criarConexao();        
            $sentenca = $conexao->prepare($sql);
            $sentenca->bindValue(':login', $login); 
        
            $sentenca->execute();     
            $conexao = null;
            return $sentenca->fetch();
        }catch (PDOException $erro){
            criarArquivoErro($erro);
            die();
        }
    }
    
    function gerarSenha($tamanho){
        $ma = "ABCDEFGHIJKLMNOPQRSTUVYXWZ";
        $mi = "abcdefghijklmnopqrstuvyxwz"; 
        $nu = "0123456789"; 
        $si = "!@#$%¨&*()_+="; 
  
        $maiusculas = true;
        $minusculas = true;
        $numeros = true;
        $simbolos = true;
        $senha = "";
      
        if ($maiusculas){
              $senha .= str_shuffle($ma);
        }
      
          if ($minusculas){
              $senha .= str_shuffle($mi);
          }
      
          if ($numeros){
              $senha .= str_shuffle($nu);
          }
      
          if ($simbolos){
              $senha .= str_shuffle($si);
          }
          return substr(str_shuffle($senha),0,$tamanho);
      }
       
?>



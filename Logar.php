<?php 
        echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	/**
	 * Classe para login
	 * Execultar na mesma pagina que contem o form de login e senha
	 */

	class Logar
	{
	    //email/registro/cadastro/matricula/etc
	    private $login;
	    private $senha;
	    //armazena os dados do select
	    private $dados;

	    //função principal
	    public function validar($login, $senha){
	        //verificar se $login e senha são validos
	        if($this->setLogin($login) && $this->setSenha($senha)){
	        	$this->creatSession();
	        }else{
	        	$this->alerta("Login ou senha não são válidos!");
	        }
	    }

	    /*pode criar um validador dependendo do tipo de login
	    	Ex. email, validador de email
	    */
	    private function setLogin($login){
	    	$this->login = $login;
	    	return true;
	    }

	    private function setSenha($senha){
	        $this->senha = $senha;
	        return true;
	    }

	    public function alerta($msg){
	    	echo "<script> alert('".$msg."'); </script>";
	    }

	    /*
			Faz o select na table de usuario usando o login e senha,
	    */
	    private function consultaBanco(){
	    	//importando class conexao
		include "Database.php";
	    	//instancia conexão pela classe conexao
	        $conexao = Database::conexao();
	        //prepara query para consulta
	    	$query = $conexao->prepare("SELECT * FROM `usuario` WHERE `cpf` = :cpf AND `senha` = :senha");
	    	//faz ligação das variaveis
	    	$query->bindValue(":cpf",$this->login);
	    	$query->bindValue(":senha",$this->senha);
                //$query->bindValue(":nome",$this->nome);

	    	//execucao e tratamento de erros
	    	try {
	    		$query->execute();

	    		if($query->rowCount() > 0){
	    			//armazena na var dados o retorno da consulta se achar algo
	    			$this->dados = $query->fetch(PDO::FETCH_OBJ);
	    			return true;
	    		}else{
	    			//se não encontrar nada
	    			$this->alerta("Não foi possivel logar no sistema, verifique seu login e senha.");
	    			return false;
	    		}

	    	} catch (Exception $e) {
	    		$this->alerta("Erro ao execultar consulta \\n".$e);
	    		return false;
	    	}
	    }

	    //redireciona a pagina atual
	    //$pg recebe a pagina para onde quer ir
	    public function redireciona($pg){
	    	echo "<script> window.location.replace('".$pg."'); </script>";
	    }

	    //cria a sessão
	    private function creatSession(){
	    	if($this->consultaBanco()){
	    		session_start();
	    		//seta a var de sessão conforme os dados do banco de dados
	    		//retornados na consulta ao banco
	    		$_SESSION['status'] = true; // para validar session;
	    		$_SESSION['idUsuario'] = $this->dados->idUsuario;
	    		$_SESSION['usuario'] = $this->dados->nome;
                        $_SESSION['permissao'] = $this->dados->permissao;

	    		$this->redireciona("home.php");
	    	}
	    }

	    public function validaSession(){//verifica se a sessão esta ativa
	    	session_start();
	    	if(empty($_SESSION['status'])){
	    		$this->logOut();
	    		$this->alerta("É preciso esta logado para acessar o sistema!");
	    		$this->redireciona("index.php");
	    		return false;
	    	}else{
	    		return true;
	    	}

	    }
            public function validaSession2(){//verifica se a sessão esta ativa
	    	session_start();
	    	if(empty($_SESSION['status'])){
	    		$this->logOut();
	    		$this->alerta("É preciso esta logado para acessar o sistema!");
	    		$this->redireciona("../index.php");
	    		return false;
	    	}else{
	    		return true;
	    	}

	    }
    	    public function logOut(){
	    		session_destroy(); //mata a session
	    }

	}

 ?>
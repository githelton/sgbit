<?php

//require_once 'Database.php';
require_once 'Aluno.php';
//require_once 'Usuario.php';

abstract class Pessoa {
    protected $idPessoa;
    protected $cpf;
    protected $nome;
    protected $nascimento;
    protected $sexo;
    protected $endereco;
    protected $fone;
    protected $email;
    protected static $pdo;
    protected $con;
    
    //protected $dado;
            
function cadastrar(){
    //$pdo = Database::conexao();
    /*try{
        //$this->idPessoa = $dado['idPessoa'];
       // $this->cpf = $dado['cpf'];
        $this->nome = $dado['nome'];
        //$this->nascimento = $dado['nascimento'];
       // $this->sexo = $dado['sexo'];
        //$this->endereco = $dado['endereco'];
        $this->serie = $dado['serie'];
        $this->turma = $dado['turma'];
        //
        $con = $pdo->exec("INSERT INTO `teste`.`aluno` (`id`, `nome`,  `sexo`, `serie`,"
           . " `turma` VALUES (:id, :nome, :serie, :turma);");
        //$con->bindParam(":idPessoa", $this->idPessoa, PDO::PARAM_INT);
        //$con->bindParam("cpf", $this->cpf, PDO::PARAM_STR);
        $con->bindParam("nome", $this->nome, PDO::PARAM_STR);
       // $con->bindParam("nascimeto", $this->nascimento, PDO::PARAM_STR);
        //$con->bindParam("sexo", $this->sexo, PDO::PARAM_STR);
        //$con->bindParam("endereco", $this->endereco, PDO::PARAM_STR);
        $con->bindParam("serie", $this->serie, PDO::PARAM_STR);
        $con->bindParam("turma", $this->turma, PDO::PARAM_STR);
        if($con->exec()){
            return 'ok';
        }  else {
            return 'erro!';
        }
        
    } catch (Exception $ex) {
        return 'erro' .$ex->getMessage();
    }*/
}
function alterar($dado){
    try{
        $this->idPessoa = $dado['idPessoa'];
        $this->cpf = $dado['cpf'];
        $this->nome = $dado['nome'];
        $this->nascimento = $dado['nascimento'];
        $this->sexo = $dado['sexo'];
        $this->endereco = $dado['endereco'];
        $this->fone = $dado['fone'];
        $this->email = $dado['email'];
        //
        $con = $pdo->exec("INSERT INTO `sgbit`.`aluno` (`idAluno`, `cpf`, `nome`, `nascimento`, `sexo`, `endereco`,"
           . " `fone`, `email`VALUES (:idAluno, :cpf, :nome, :nascimento, :sexo, :endereco, :fone,"
           . " :email);");
        $con->bindParam(":idPessoa", $this->idPessoa, PDO::PARAM_INT);
        $con->bindParam("cpf", $this->cpf, PDO::PARAM_STR);
        $con->bindParam("nome", $this->nome, PDO::PARAM_STR);
        $con->bindParam("nascimeto", $this->nascimento, PDO::PARAM_STR);
        $con->bindParam("sexo", $this->sexo, PDO::PARAM_STR);
        $con->bindParam("endereco", $this->endereco, PDO::PARAM_STR);
        $con->bindParam("fone", $this->fone, PDO::PARAM_STR);
        $con->bindParam("email", $this->email, PDO::PARAM_STR);
        
        $con->execute();
        
    } catch (Exception $ex) {
        return 'erro' .$ex->getMessage();
    }
}
function consultar(){
    
}
function remover(){
    
}  
function listar(){
     $pdo = Database::conexao();
     $banco = $pdo->prepare("SELECT * FROM `aluno`");
     $banco->execute();
     $result = $banco->fetchAll(PDO::FETCH_OBJ);
     foreach ($result as $value) {
        printf("aluno $value->nome <br/>");
     }
}

//metodo construct
//public function __construct() {
    //$this->con = new Database(); 
    
//}
//metodods especiais getter e setters
    public function getIdPessoa() {
        return $this->idPessoa;
    }

    public function setIdPessoa($idPessoa) {
        $this->idPessoa = $idPessoa;
    }

        function getCpf() {
        return $this->cpf;
    }

    function getNome() {
        return $this->nome;
    }

    function getNascimento() {
        return $this->nascimento;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getFone() {
        return $this->fone;
    }
    function getEmail(){
        return $this->email;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setNascimento($nascimento) {
        $this->idade = $nascimento;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setFone($fone) {
        $this->fone = $fone;
    }
    function setEmail($email){
        $this->email = $email;
    }
}
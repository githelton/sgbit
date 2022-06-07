<?php
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
require_once 'Database.php';

class Aluno {
//atributos 
    public $idAluno;
    public $cpf;
    public $nome;
    public $nascimento;
    public $sexo;
    public $endereco;
    public $fone;
    public $email;
    public $serie;
    public $turma;
    public $turno;
    public $situacao;
    public $pgProximo;
    public $pgAnterior;


//metodos   

//metodos herdados de pessoa CRUD;
public function verificarCPF(){
        $pdo = Database::conexao();
        $con = $pdo->prepare("SELECT * FROM aluno WHERE cpf = :cpf");
        $con->bindValue(":cpf", $this->cpf);
        if($con->execute()){
            if($con->rowCount() > 0){
                echo "<script>"
                . " alert('CPF ja Cadastrado!');"
                . " window.location.href='interface/aluno.php?opcao=2'; </script>";
            }else{
                Aluno::cadastrar();
            }
}else{
            echo "<script>"
                . " alert('Erro, informe o Adm!');"
                . " window.location.href='interface/aluno.php?opcao=2'; </script>";
        }
}
    public function cadastrar() {
        
    try{
        $pdo = Database::conexao();
        $con = $pdo->prepare("INSERT INTO `aluno` (`idAluno`, `cpf`, `nome`, `nascimento`,`sexo`, `endereco`, `fone`, `email`, `serie`, `turma`, `turno`, `situacao`) VALUES (NULL, :cpf, :nome, :nascimento, :sexo, :endereco, :fone, :email, :serie, :turma, :turno, :situacao);");   
        
        $con->bindValue(":cpf", $this->cpf);
        $con->bindValue(":nome", $this->nome);
        $con->bindValue(":nascimento", $this->nascimento);
        $con->bindValue(":sexo", $this->sexo);
        $con->bindValue(":endereco", $this->endereco);
        $con->bindValue(":fone", $this->fone);
        $con->bindValue(":email", $this->email);
        $con->bindValue(":serie", $this->serie);
        $con->bindValue(":turma", $this->turma);
        $con->bindValue(":turno", $this->turno);
        $con->bindValue(":situacao", $this->situacao);
        
        if ($con->execute()){
            if($con->rowCount() > 0){
                echo "<script>"
                . " alert('Aluno Cadastrado com sucesso!');"
                . " window.location.href='interface/aluno.php?opcao=2'; </script>";
            }else{
                echo "<script>"
                . " alert('Aluno não pode ser Cadastradoo!');"
                . " window.location.href='interface/aluno.php?opcao=2'; </script>";
            }
        }else{
            return false;
        }
        
    } catch (Exception $ex) {
        return 'erro' .$ex->getMessage();
    }
    }
//metodos especiais
public function alterar(){
    
try{
$pdo=Database::conexao();
$con = $pdo->prepare("UPDATE `aluno` SET `cpf`=:cpf, `nome`=:nome, `nascimento`=:nascimento,`sexo`=:sexo, `endereco`=:endereco, `fone`=:fone, `email`=:email, `serie`=:serie, `turma`=:turma, `turno`=:turno WHERE `idAluno` = :idAluno");
    $con->bindValue(":idAluno", $this->idAluno);    
    $con->bindValue(":cpf", $this->cpf);
    $con->bindValue(":nome", $this->nome);
    $con->bindValue(":nascimento", $this->nascimento);
    $con->bindValue(":sexo", $this->sexo);
    $con->bindValue(":endereco", $this->endereco);
    $con->bindValue(":fone", $this->fone);
    $con->bindValue(":email", $this->email);
    $con->bindValue(":serie", $this->serie);
    $con->bindValue(":turma", $this->turma);
    $con->bindValue(":turno", $this->turno);
    //$con->bindValue(":situacao", $this->situacao);
if($con->execute()){
    if($con->rowCount() > 0){                      
                echo "<script>"
                . " alert('Aluno Atualizado com sucesso!');"
                . " window.location.href='view/alunoview.php?opcao=2'; </script>";        
        }else{
                echo "<script>"
                . " alert('Nada foi Atualizado!');"
                . " window.location.href='view/alunoview.php?opcao=2'; </script>";
    }
}
   }catch (Exception $ex) {
    echo 'erroEXECUTE';
    return 'erro' .$ex->getMessage();
}
}


public function delete(){
    $pdo = Database::conexao();
    $con = $pdo->prepare("SELECT * FROM `locado` WHERE aluno = :idAluno");
    $con->bindValue(":idAluno", $this->idAluno);
    if($con->execute()){
        if($con->rowCount() == 0){
            $this->remover();
        }else{
           echo "<script>"
            . " alert('Não é possivel deletar, Aluno com pendencia(s)!');"
            . " window.location.href='view/alunoview.php?opcao=2'; </script>";
        }
    }            
}
function remover(){
    $pdo = Database::conexao();
    $con = $pdo->prepare("DELETE FROM `aluno` WHERE `idAluno` = :idAluno");
    $con->bindValue(":idAluno", $this->idAluno);
    if($con->execute()){
        if($con->rowCount() > 0){
                echo "<script>"
                   . " alert('Aluno deletado com sucesso!');"
                   . " window.location.href='view/alunoview.php?opcao=2'; </script>";
        }else{
            echo "<script>"
            . " alert('Não é possivel deletar!');"
            . " window.location.href='view/alunoview.php?opcao=2'; </script>";
        }
    }
}
public function convertData($data){
    $data = explode("-", $data);
    return $data[2]."/".$data[1]."/".$data[0];
}
function consultar(){
    
//        $pdo = Database::conexao();
//        
//        $banco = $pdo->prepare("SELECT `idEditora` FROM `editora` WHERE `nome` = `idEditora`");
//        $banco->execute();
//        $result = $banco->fech(PDO::FETCH_OBJ);
//        foreach ($result as $value) {
//            printf( "$value->nome <br/>");
//            echo '<br/>';
//        }
}
function listar(){
    $pdo = Database::conexao();
    $con = $pdo->prepare("SELECT * FROM `aluno` ORDER BY nome");
    $con->execute();
    return $con->fetchAll(PDO::FETCH_OBJ);
}

public function paginacao($pagina = 1){
    $total_reg = 10;
    $inicio = $pagina - 1;
    $inicio = $inicio * $total_reg;
    $pdo = Database::conexao();
    //$con = $pdo->prepare("SELECT livro.idLivro, livro.titulo, livro.ano, livro.situacao, livro.resumo, livro.observacao, livro.edicao, livro.volume, livro.numExemplar, prateleira.setor, prateleira.fileira,classificacaoLivro.classificacao,( autor.nome)as autor, (editora.nome)as editora FROM livro join autor join editora join classificacaolivro join prateleira on livro.autor = autor.idAutor and livro.editora = editora.idEditora and livro.classificacaoLivro = classificacaolivro.idClassificacaoLivro and livro.prateleira = prateleira.idPrateleira ORDER BY livro.titulo");
    $query = "SELECT * FROM `aluno` ORDER BY nome";
    $con = $pdo->prepare($query);
    $con->execute();
    $tr = $con->rowCount(); //numero total de registros

    $con = $pdo->prepare($query." limit ".$inicio.",".$total_reg."");
    $con->execute();
    $limite = $con->fetchAll(PDO::FETCH_OBJ);
    $tp = $tr / $total_reg; // verifica o número total de páginas
    $this->linkPaginacao($pagina,$tp);
    return $limite;
}

public function linkPaginacao($pagina,$tp){
    // agora vamos criar os botões "Anterior e próximo"
    $anterior = $pagina -1;
    $proximo = $pagina +1;
    if ($pagina>1) {
    $this->pgAnterior = "pagina=$anterior";
    }
    if ($pagina<$tp) {
    $this->pgProximo = "pagina=$proximo";
    }
}
//GET e SET acesso e envio
function getIdAluno(){
    return $this->idAluno;
}
function getSerie(){
    return $this->serie;
}
function getTurma(){
    return $this->turma;
}
function getTurno(){
    return $this->turno;
}
function getSituacao(){
    return $this->situacao;
}
public function getCpf() {
    return $this->cpf;
}

public function getNome() {
    return $this->nome;
}

public function getNascimento() {
    return $this->nascimento;
}

public function getSexo() {
    return $this->sexo;
}

public function getEndereco() {
    return $this->endereco;
}

public function getFone() {
    return $this->fone;
}

public function getEmail() {
    return $this->email;
}

    //SET - envia
function setidAluno($idAluno){
    $this->idAluno = $idAluno;
}

function setSerie($serie){
    $this->serie = $serie;
}
function setTurma($turma){
    $this->turma = $turma;
}
function setTurno($turno){
    $this->turno = $turno;
}
function setSituacao($situacao){
    $this->situacao = $situacao;
}
public function setCpf($cpf) {
    $this->cpf = $cpf;
}

public function setNome($nome) {
    $this->nome = $nome;
}

public function setNascimento($nascimento) {
    $this->nascimento = $nascimento;
}

public function setSexo($sexo) {
    $this->sexo = $sexo;
}

public function setEndereco($endereco) {
    $this->endereco = $endereco;
}

public function setFone($fone) {
    $this->fone = $fone;
}

public function setEmail($email) {
    $this->email = $email;
}


}
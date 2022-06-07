<?php
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
require_once 'Database.php';

class Usuario{
    public  $idUsuario;
    public  $cpf;
    public  $nome;
    public  $nascimento;
    public  $sexo;
    public  $endereco;
    public  $fone;
    public  $email;
    public  $senha;
    public  $cargo;
    public  $permissao;    
    public $pgAnterior;
    public $pgProximo;

//metodos herdados de pessoa CRUD;
//metodos personalizados
public function cadastrar(){
    try{
        $pdo = Database::conexao();
        $con = $pdo->prepare("INSERT INTO `usuario` (`idUsuario`, `cpf`, `nome`, `senha`, `nascimento`,`sexo`, `endereco`, `fone`, `email`, `cargo`, `permissao`) VALUES (NULL, :cpf, :nome, :senha, :nascimento, :sexo, :endereco, :fone, :email, :cargo, :permissao);");   
        
        $con->bindValue(":cpf", $this->cpf);
        $con->bindValue(":nome", $this->nome);
        $con->bindValue(":senha", $this->senha);
        $con->bindValue(":nascimento", $this->nascimento);
        $con->bindValue(":sexo", $this->sexo);
        $con->bindValue(":endereco", $this->endereco);
        $con->bindValue(":fone", $this->fone);
        $con->bindValue(":email", $this->email);
        $con->bindValue(":cargo", $this->cargo);
        $con->bindValue(":permissao", $this->permissao);
        
        if ($con->execute()){
            if($con->rowCount() > 0){
                echo "<script>"
                . " alert('Usuário Cadastrado com sucesso!');"
                . " window.location.href='interface/usuario.php?opcao=0'; </script>";
            }else{
                return false;
            }
        }else{
            return false;
        }
        
    } catch (Exception $ex) {
        return 'erro' .$ex->getMessage();
    }
}

public function alterar(){
    try{
        $pdo = Database::conexao();
        $con = $pdo->prepare("UPDATE `usuario` SET `cpf`=:cpf, `nome`=:nome, `senha`=:senha,`nascimento`=:nascimento,`sexo`=:sexo, `endereco`=:endereco, `fone`=:fone, `email`=:email, `cargo`=:cargo, `permissao`=:permissao WHERE `idUsuario`=:idUsuario;");   
        $con->bindValue(":idUsuario",$this->idUsuario);
        $con->bindValue(":cpf", $this->cpf);
        $con->bindValue(":nome", $this->nome);
        $con->bindValue(":senha", $this->senha);
        $con->bindValue(":nascimento", $this->nascimento);
        $con->bindValue(":sexo", $this->sexo);
        $con->bindValue(":endereco", $this->endereco);
        $con->bindValue(":fone", $this->fone);
        $con->bindValue(":email", $this->email);
        $con->bindValue(":cargo", $this->cargo);
        $con->bindValue(":permissao", $this->permissao);

if($con->execute()){
       
    if($con->rowCount() > 0){                      
        echo "<script>"
        . " alert('Usuário Atualizado!');"
        . " window.location.href='view/usuarioview.php?opcao=0'; </script>";        
    }else{
        echo "<script>"
        . " alert('Nada foi Atualizado!');"
        . " window.location.href='view/usuarioview.php?opcao=0'; </script>";
    }            
}else{
    echo "<script>"
    . " alert('Erro, informe o Adm!');"
    . " window.location.href='view/usuarioview.php?opcao=0'; </script>";
}
        
    } catch (Exception $ex) {
        return 'erro' .$ex->getMessage();
    }
}

public function logar(){
        
}
public function alterarSenha(){
        
}
public function delete(){
    //$id=$_GET['idAutor'];
    $pdo = Database::conexao();
    $con = $pdo->prepare("SELECT idUsuario FROM `usuario` WHERE `idUsuario` = :idUsuario");
    $con->bindValue(':idUsuario',$this->idUsuario);
    if($con->execute()){
        if($con->rowCount() == 0){
            $this->remover();
        }else{
           echo "<script>"
            . " alert('Não é possível deletar!');"
            . " window.location.href='view/usuarioview.php?opcao=0'; </script>";
        }
    }         
}
function remover(){
    $pdo = Database::conexao();
    
    $con = $pdo->prepare("DELETE FROM `usuario` WHERE `idUsuario` = :idUsuario");
    $con->bindValue(':idUsuario',$this->idUsuario);
    if($con->execute()){
        if($con->rowCount() > 0){
                echo "<script>"
                   . " alert('Usuário deletado com sucesso!');"
                   . " window.location.href='view/usuarioview.php?opcao=0'; </script>";
        }else{
            echo "<script>"
            . " alert('Não é possível deletar!');"
            . " window.location.href='view/usuarioview.php?opcao=0'; </script>";
        }
    }
}

public function paginacao($pagina = 1){
    $total_reg = 10;
    $inicio = $pagina - 1;
    $inicio = $inicio * $total_reg;
    $pdo = Database::conexao();
    //$con = $pdo->prepare("SELECT livro.idLivro, livro.titulo, livro.ano, livro.situacao, livro.resumo, livro.observacao, livro.edicao, livro.volume, livro.numExemplar, prateleira.setor, prateleira.fileira,classificacaoLivro.classificacao,( autor.nome)as autor, (editora.nome)as editora FROM livro join autor join editora join classificacaolivro join prateleira on livro.autor = autor.idAutor and livro.editora = editora.idEditora and livro.classificacaoLivro = classificacaolivro.idClassificacaoLivro and livro.prateleira = prateleira.idPrateleira ORDER BY livro.titulo");
    $query = "SELECT * FROM `usuario` ORDER BY nome";
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
//metodos especiais

public  function getIdUsuario() {
    return $this->idUsuario;
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

public function getSenha(){
    return $this->senha;
}
public function getCargo(){
    return $this->cargo;
}
public function getPermissao(){
    return $this->permissao;
}

public function setIdUsuario($idUsuario) {
    $this->idUsuario = $idUsuario;
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

public function setSenha($senha){
    $this->senha = $senha;
}
public function setCargo($cargo){
    $this->cargo = $cargo;
}
public function setPermissao($permissao){
    $this->permissao = $permissao;
}
}
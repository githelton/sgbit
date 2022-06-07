<?php
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
require_once 'Database.php';

class Editora {
    public $idEditora;
    public $nome;
    public $cidade;
    public $endereco;
    public $fone;
    public $email;
    public $pgAnterior;
    public $pgProximo;

public function cadastrar(){
    try{
  
    $pdo = Database::conexao();
    $con = $pdo->prepare("INSERT INTO `editora` (`idEditora`, `nome`, `cidade`, `endereco`, `fone`, `email`) VALUES (NULL, :nome, :cidade, :endereco, :fone, :email)");
    $con->bindValue(":nome", $this->nome);
    $con->bindValue(":cidade", $this->cidade);
    $con->bindValue(":endereco", $this->endereco);
    $con->bindValue(":fone", $this->fone);
    $con->bindValue(":email", $this->email);
    if ($con->execute()){
            if($con->rowCount() > 0){
                echo "<script>"
                . " alert('Editora Cadastrada com sucesso!');"
                . " window.location.href='interface/editora.php?opcao=4'; </script>";
            }else{
                echo "<script>"
                . " alert('Editora não pode ser Cadastrada!');"
                . " window.location.href='interface/editora.php?opcao=4'; </script>";
            }
        }else{
            return false;
        }    
    } catch (Exception $ex) {
        return 'erro' .$ex->getMessage();
    }
}
function alterar(){
try{
$pdo=Database::conexao();

$con = $pdo->prepare("UPDATE `editora` SET `nome` = :nome, `cidade` = :cidade,`endereco` = :endereco, `fone` = :fone, `email` = :email WHERE `idEditora` = :idEditora");
$con->bindValue(":idEditora",$this->idEditora);
$con->bindValue(":nome",$this->nome);
$con->bindValue(":cidade",$this->cidade);
$con->bindValue(":endereco",$this->endereco);
$con->bindValue(":fone",$this->fone);
$con->bindValue(":email",$this->email);
if($con->execute()){
    if($con->rowCount() > 0){   
        echo "<script>"
            . " alert('Editora atualizada com sucesso!');"
            . " window.location.href='view/editoraview.php?opcao=4'; </script>";        
    }else{
         echo "<script>"
            . " alert('Nada foi Atualizado!');"
            . " window.location.href='view/editoraview.php?opcao=4'; </script>";
    }
}
    }catch (Exception $ex) {
        echo "<script>"
        . " alert('Não pode atualiza a reserva!');"
        . " window.location.href='view/editoraview.php?opcao=4'; </script>";
    }
}

function consultar(){
    
        $pdo = Database::conexao();
        
        $banco = $pdo->prepare("SELECT `idEditora` FROM `editora` WHERE `nome` = `idEditora`");
        $banco->execute();
        $result = $banco->fech(PDO::FETCH_OBJ);
        foreach ($result as $value) {
            printf( "$value->nome <br/>");
            echo '<br/>';
        }
}
function delete(){
    $pdo = Database::conexao();
    $con = $pdo->prepare("SELECT idLivro FROM `livro` WHERE editora = :idEditora");
    $con->bindValue(':idEditora',$this->idEditora);
    if($con->execute()){
        if($con->rowCount() == 0){
            $this->remover();
        }else{
           echo "<script>"
            . " alert('Nao é possivel deletar, Editora em uso!');"
            . " window.location.href='view/Editoraview.php?opcao=4'; </script>";
        }
    }            
}
function remover(){
    $pdo = Database::conexao();
    $con = $pdo->prepare("DELETE FROM `editora` WHERE `idEditora` = :idEditora");
    $con->bindValue(':idEditora',$this->idEditora);
    if($con->execute()){
        if($con->rowCount() > 0){
            echo "<script>"
                   . " alert('Editora deletada com sucesso!');"
                   . " window.location.href='view/editoraview.php?opcao=4'; </script>";
        }else{
            echo "<script>"
                   . " alert('Editora não pode ser deletada!');"
                   . " window.location.href='view/editoraview.php?opcao=4'; </script>";

        }
    }
}
function listar(){
    $pdo = Database::conexao();
    $con = $pdo->prepare("SELECT * FROM `editora` ORDER BY nome");
    $con->execute();
    return $con->fetchAll(PDO::FETCH_OBJ);
}
public function paginacao($pagina = 1){
    $total_reg = 10;
    $inicio = $pagina - 1;
    $inicio = $inicio * $total_reg;
    $pdo = Database::conexao();
    //$con = $pdo->prepare("SELECT livro.idLivro, livro.titulo, livro.ano, livro.situacao, livro.resumo, livro.observacao, livro.edicao, livro.volume, livro.numExemplar, prateleira.setor, prateleira.fileira,classificacaoLivro.classificacao,( autor.nome)as autor, (editora.nome)as editora FROM livro join autor join editora join classificacaolivro join prateleira on livro.autor = autor.idAutor and livro.editora = editora.idEditora and livro.classificacaoLivro = classificacaolivro.idClassificacaoLivro and livro.prateleira = prateleira.idPrateleira ORDER BY livro.titulo");
    $query = "SELECT * FROM `editora` ORDER BY nome";
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
//
function __construct(){
    
}
//registro,nome,cidade,end, fone,email
function getIdEditora(){
    return $this->registro;
}
function getNome(){
    return $this->nome;
}
function getCidade(){
    return $this->cidade;
}
function getEndereco(){
    return $this->endereco;
}
function getFone(){
    return $this->fone;
}
function getEmail(){
    return $this->email;
}
//registro,nome,cidade,end, fone,email
function setIdEditora($idEditora){
    $this->registro = $idEditora;
}
function setNome($nome){
    $this->nome = $nome;
}
function setCidade($cidade){
    $this->cidade = $cidade;
}
function setEndereco($endereco){
    $this->endereco = $endereco;
}
function setFone($fone){
    $this->fone = $fone;
}
function setEmail($email){
    $this->email = $email;
}
}
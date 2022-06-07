<?php
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
require_once 'Database.php';

class Autor {
    public $idAutor;
    public $nome;
    public $pgAnterior;
    public $pgProximo;
            function cadastrar(){
    try{
    $pdo = Database::conexao();
    $con = $pdo->prepare("INSERT INTO `autor` (`idAutor`, `nome`) VALUES (NULL, :nome)");
    $con->bindValue(":nome", $this->nome);
    if ($con->execute()){
            if($con->rowCount() > 0){
                echo   "<script>"
                . " alert('Autor Cadastrado com sucesso!');"
                . " window.location.href='interface/autor.php?opcao=3'; </script>";
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
function alterar(){
    
try{
$pdo=Database::conexao();

$con = $pdo->prepare("UPDATE `autor` SET `nome` = :nome WHERE `idAutor` = :idAutor");
$con->bindValue(':idAutor',$this->idAutor);
$con->bindValue(':nome',$this->nome);

if($con->execute()){
    if($con->rowCount() > 0){                      
                echo "<script>"
                . " alert('Autor Atualizado com sucesso!');"
                . " window.location.href='view/autorview.php?opcao=3'; </script>";        
    }else{
                echo "<script>"
                . " alert('Nada foi Atualizado!');"
                . " window.location.href='view/autorview.php?opcao=3'; </script>";
    }
}
   }catch (Exception $ex) {
    echo 'erroEXECUTE';
    return 'erro' .$ex->getMessage();
}

}

function consultar(){
    
}
public function delete(){
    //$id=$_GET['idAutor'];
    $pdo = Database::conexao();
    
    $con = $pdo->prepare("SELECT `autor` FROM `livro` WHERE `autor` = :idAutor ");
    $con->bindValue(':idAutor',$this->idAutor);
    if($con->execute()){
        if($con->rowCount() > 0){
            echo "<script>"
            . " alert('Não é possível deletar, Autor está em uso!');"
            . " window.location.href='view/autorview.php?opcao=3'; </script>";
        }else{
           $this->remover();
        }
    }         
}
function remover(){
    $pdo = Database::conexao();
    
    $con = $pdo->prepare("DELETE FROM `autor` WHERE `idAutor` = :idAutor");
    $con->bindValue(':idAutor',$this->idAutor);
    if($con->execute()){
        if($con->rowCount() > 0){
                echo "<script>"
                   . " alert('Autor Removido com sucesso!');"
                   . " window.location.href='view/autorview.php?opcao=3'; </script>";
        }else{
            echo 'erroROWCOUNT';
            //return 'erro' .$ex->getMessage();
        }
    }
}
function listar(){
    $pdo = Database::conexao();
    $con = $pdo->prepare("SELECT * FROM `autor` ORDER BY nome ASC");
    $con->execute();
    return $con->fetchAll(PDO::FETCH_OBJ);
}
public function paginacao($pagina = 1){
    $total_reg = 10;
    $inicio = $pagina - 1;
    $inicio = $inicio * $total_reg;
    $pdo = Database::conexao();
    //$con = $pdo->prepare("SELECT livro.idLivro, livro.titulo, livro.ano, livro.situacao, livro.resumo, livro.observacao, livro.edicao, livro.volume, livro.numExemplar, prateleira.setor, prateleira.fileira,classificacaoLivro.classificacao,( autor.nome)as autor, (editora.nome)as editora FROM livro join autor join editora join classificacaolivro join prateleira on livro.autor = autor.idAutor and livro.editora = editora.idEditora and livro.classificacaoLivro = classificacaolivro.idClassificacaoLivro and livro.prateleira = prateleira.idPrateleira ORDER BY livro.titulo");
    $query = "SELECT * FROM `autor` ORDER BY nome ASC";
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
function __construct() {
        
}
function getIdAutor() {
    return $this->idAutor;
}

function getNome() {
    return $this->nome;
}

function setIdAutor($idAutor) {
    $this->idAutor = $idAutor;
}

function setNome($nome) {
    $this->nome = $nome;
}


}
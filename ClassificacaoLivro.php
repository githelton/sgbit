<?php
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
require_once 'Database.php';

class ClassificacaoLivro {
    public $idClassificacaoLivro;
    public $classificacao;
    public $faixaEtaria;
    public $genero;
    public $pgAnterior;
    public $pgProximo;
    
   
public function cadastrar(){
    try{
    $pdo = Database::conexao();
    $con = $pdo->prepare("INSERT INTO `classificacaolivro` (`idClassificacaoLivro`, `classificacao`, `faixaEtaria`, `genero`) VALUES (NULL, :classificacao, :faixaEtaria, :genero)");
    $con->bindValue(":classificacao", $this->classificacao);
    $con->bindValue(":faixaEtaria", $this->faixaEtaria);
    $con->bindValue(":genero", $this->genero);
   
    if ($con->execute()){
            if($con->rowCount() > 0){
            echo  
                "<script>"
                . " alert('Classificacao Cadastrada com sucesso!');"
                . " window.location.href='interface/classificacaoLivro.php?opcao=5'; </script>";
            }else{
            echo  
                "<script>"
                . " alert('Classificacao não pode ser cadastrada!');"
                . " window.location.href='interface/classificacaoLivro.php?opcao=5'; </script>";
            }
        }else{
            echo  
                "<script>"
                . " alert('Erro informe ao Adm!');"
                . " window.location.href='interface/classificacaoLivro.php?opcao=5'; </script>";
        }
        
    } catch (Exception $ex) {
        return 'erro' .$ex->getMessage();
    }
}
public function alterar(){
try{
$pdo=Database::conexao();

$con = $pdo->prepare("UPDATE `classificacaoLivro` SET `classificacao` = :class, `faixaEtaria` = :faix, `genero` = :genero WHERE `idClassificacaoLivro` = :id");
$con->bindValue(':class',$this->classificacao);
$con->bindValue(':genero',$this->genero);
$con->bindValue(':faix',$this->faixaEtaria);
$con->bindValue(':id',$this->idClassificacaoLivro);
$con->bindValue(":genero", $this->genero);
if($con->execute()){
    if($con->rowCount()>0){                      
        echo "<script>"
            . " alert('Classificacão atualizada com sucesso!');"
            . " window.location.href='view/classificacaolivroview.php?opcao=5'; </script>";        
    }else{
        echo "<script>"
            . " alert('Nada foi Atualizado!');"
            . " window.location.href='view/classificacaolivroview.php?opcao=5'; </script>";
    }
}
}catch (Exception $ex) {
        return 'erro' .$ex->getMessage();
}
}
public function Consultar(){
    
}
public function delete(){
    $pdo = Database::conexao();
    $con = $pdo->prepare("SELECT idLivro FROM `livro` WHERE classificacaolivro = :id");
    $con->bindValue(':id',$this->idClassificacaoLivro);
    if($con->execute()){
        if($con->rowCount() == 0){
            $this->remover();
        }else{
           echo "<script>"
            . " alert('Classificacao nao pode ser deletada, esta em uso!');"
            . " window.location.href='view/classificacaolivroview.php?opcao=5'; </script>";
        }
    }            
}

public function remover(){
    $pdo = Database::conexao();
    $con = $pdo->prepare("DELETE FROM `classificacaolivro` WHERE `idClassificacaoLivro` = :id");
    $con->bindValue(':id',$this->idClassificacaoLivro);
    if($con->execute()){
        if($con->rowCount() > 0){
                echo "<script>"
                   . " alert('Classificacao deletada com sucesso!');"
                   . " window.location.href='view/classificacaoLivroview.php?opcao=5'; </script>";
        }else{
            echo "<script>"
                   . " alert('Erro informe ao Adm!');"
                   . " window.location.href='view/classificacaoLivroview.php?opcao=5'; </script>";
        }
    }
}  
function listar(){
    //require_once '../Database.php';
    $pdo = Database::conexao();
    $con = $pdo->prepare("SELECT * FROM `classificacaolivro` ORDER BY faixaEtaria ASC");
    $con->execute();
    return $con->fetchAll(PDO::FETCH_OBJ);
}
public function paginacao($pagina = 1){
    $total_reg = 10;
    $inicio = $pagina - 1;
    $inicio = $inicio * $total_reg;
    $pdo = Database::conexao();
    //$con = $pdo->prepare("SELECT livro.idLivro, livro.titulo, livro.ano, livro.situacao, livro.resumo, livro.observacao, livro.edicao, livro.volume, livro.numExemplar, prateleira.setor, prateleira.fileira,classificacaoLivro.classificacao,( autor.nome)as autor, (editora.nome)as editora FROM livro join autor join editora join classificacaolivro join prateleira on livro.autor = autor.idAutor and livro.editora = editora.idEditora and livro.classificacaoLivro = classificacaolivro.idClassificacaoLivro and livro.prateleira = prateleira.idPrateleira ORDER BY livro.titulo");
    $query = "SELECT * FROM `classificacaolivro` ORDER BY faixaEtaria ASC";
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

}

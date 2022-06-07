<?php
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
require_once 'Database.php';

class Prateleira {
    public $idPrateleira;
    public $setor;
    public $fileira;
    public $capacidade;
    public $situacao; 
    public $pgAnterior;
    public $pgProximo;
    //metodos
    
function cadastrar(){
    try{
    $pdo = Database::conexao();
    $con = $pdo->prepare("INSERT INTO `prateleira` (`idPrateleira`, `setor`, `fileira`, `capacidade`, `situacao`) VALUES (NULL, :setor, :fileira, :capacidade, :situacao)");
    
    $con->bindValue(":setor", $this->setor);
    $con->bindValue(":fileira", $this->fileira);
    $con->bindValue(":capacidade", $this->capacidade);
    $con->bindValue(":situacao", $this->situacao);
    if ($con->execute()){
            if($con->rowCount() > 0){
                echo "<script>"
                . " alert('Prateleira Cadastrada com sucesso!');"
                . " window.location.href='interface/prateleira.php?opcao=6'; </script>";
            }else{
                echo "<script>"
                . " alert('Prateleira não pode ser cadastrada!');"
                . " window.location.href='interface/prateleira.php?opcao=6'; </script>";
            }
        }else{
            echo "<script>"
                . " alert('Erro, informe o Adm!');"
                . " window.location.href='interface/prateleira.php?opcao=6'; </script>";
        }
        
    } catch (Exception $ex) {
        return 'erro' .$ex->getMessage();
    }
}
function alterar(){
try{
$pdo=Database::conexao();

$con = $pdo->prepare("UPDATE `prateleira` SET `setor` = :setor, `fileira` = :fileira, `capacidade` = :capacidade, `situacao` = :situacao WHERE `idPrateleira` = :idPrateleira");
$con->bindValue(':idPrateleira',$this->idPrateleira);
$con->bindValue(':setor',$this->setor);
$con->bindValue(':fileira',$this->fileira);
$con->bindValue(':capacidade',$this->capacidade);
$con->bindValue(':situacao',$this->situacao);
if($con->execute()){
    if($con->rowCount() > 0){                      
            echo "<script>"
            . " alert('Prateleira atualizada com sucesso!');"
            . " window.location.href='view/prateleiraview.php?opcao=6'; </script>";        
    }else{
            echo "<script>"
            . " alert('Nada foi Atualizado!');"
            . " window.location.href='view/prateleiraview.php?opcao=6'; </script>";
    }

}
   }catch (Exception $ex) {
    return 'erro' .$ex->getMessage();
}
}
function Consultar(){
    
}
public function delete(){
    $pdo = Database::conexao();
    $con = $pdo->prepare("SELECT `idLivro` FROM `livro` WHERE prateleira = :idPrateleira");
    $con->bindValue(':idPrateleira',$this->idPrateleira);
    if($con->execute()){
        if($con->rowCount() == 0){
            $this->remover();
        }else{
           echo "<script>"
            . " alert('Prateleira nãoo pode ser deletada, está em uso!');"
            . " window.location.href='view/prateleiraview.php?opcao=6'; </script>";
        }
    }            
}
function remover(){
    $pdo = Database::conexao();
    $con = $pdo->prepare("DELETE FROM `prateleira` WHERE `idPrateleira` = :idPrateleira");
    $con->bindValue(':idPrateleira',$this->idPrateleira);
    if($con->execute()){
        if($con->rowCount() > 0){
                echo "<script>"
                   . " alert('Prateleira deletada com sucesso!');"
                   . " window.location.href='view/prateleiraview.php?opcao=6'; </script>";
        }else{
            echo 'erroROWCOUNT';
            //return 'erro' .$ex->getMessage();
        }
    }
} 
public function listar(){
    $pdo = Database::conexao();
    $con = $pdo->prepare("SELECT * FROM `prateleira` ORDER BY setor");
    $con->execute();
    return $con->fetchAll(PDO::FETCH_OBJ);
}
public function paginacao($pagina = 1){
    $total_reg = 10;
    $inicio = $pagina - 1;
    $inicio = $inicio * $total_reg;
    $pdo = Database::conexao();
    //$con = $pdo->prepare("SELECT livro.idLivro, livro.titulo, livro.ano, livro.situacao, livro.resumo, livro.observacao, livro.edicao, livro.volume, livro.numExemplar, prateleira.setor, prateleira.fileira,classificacaoLivro.classificacao,( autor.nome)as autor, (editora.nome)as editora FROM livro join autor join editora join classificacaolivro join prateleira on livro.autor = autor.idAutor and livro.editora = editora.idEditora and livro.classificacaoLivro = classificacaolivro.idClassificacaoLivro and livro.prateleira = prateleira.idPrateleira ORDER BY livro.titulo");
    $query = "SELECT * FROM `prateleira` ORDER BY setor";
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
function __construct() {
    
}

//metodods especiais getter e setters
    function getIdPrateleira() {
        return $this->registro;
    }

    function getSetor() {
        return $this->ordem;
    }

    function getFileira() {
        return $this->fileira;
    }

    function getCapacidade() {
        return $this->capacidade;
    }
    public function getSituacao() {
        return $this->situacao;
    }

    public function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

    
    function setIdPrateleira($idPrateleira) {
        $this->registro = $idPrateleira;
    }

    function setSetor($setor) {
        $this->setor = $setor;
    }

    function setFileira($fileira) {
        $this->fileira = $fileira;
    }

    function setCapacidade($capacidade) {
        $this->capacidade = $capacidade;
    }


}
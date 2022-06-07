<?php
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
require_once 'Database.php';

class Livro {
    public  $idLivro;
    public  $titulo;
    public  $ano;
    public  $situacao;
    public  $resumo;
    public  $observacao;
    public  $edicao;
    public  $volume;
    public  $numExemplar;
    public  $prateleira;
    public  $classificacaoLivro;
    public  $autor;
    public  $editora;
    //paginação
    public $pgAnterior = null;
    public $pgProximo = null;

   //metodods especiais 
function verificar(){ 
    $pdo = Database::conexao();
    $con = $pdo->prepare("SELECT * FROM livro WHERE titulo=:titulo and edicao=:edicao and volume=:volume");
    $con->bindValue(":titulo", $this->titulo);
    $con->bindValue(":edicao", $this->edicao);
    $con->bindValue(":volume", $this->volume);
    $con->execute();
    if ($con->execute()){
            if($con->rowCount() > 0){
               $titulo=$this->titulo;
               $edicao=$this->edicao;               
               $volume=$this->volume;             
                echo "<script>"." alert('Livro Ja Cadastrado!')</script>";      
               Livro::atualizar();
            }else{
               Livro::cadastrar();
            }
        }else{
            echo "<script>"
                . " alert('Erro, informe o Adm!');"
                . " window.location.href='interface/livro.php?opcao=8'; </script>";
        }
}    
public function cadastrar(){  
//$num=$this->numExemplar;   
try{

    $pdo = Database::conexao();
    $con = $pdo->prepare("INSERT INTO `livro` (`idLivro`, `titulo`, `ano`, `resumo`, `observacao`, `edicao`, `volume`, `numExemplar`, `prateleira`, `classificacaoLivro`, `autor`, `editora`) VALUES (NULL, :titulo, :ano, :resumo, :observacao, :edicao, :volume, :numExemplar, :prateleira, :classificacaoLivro, :autor, :editora)");
    $con->bindValue(":titulo", $this->titulo);
    $con->bindValue(":ano", $this->ano);
//    $con->bindValue(":situacao", $this->situacao);
    $con->bindValue(":resumo", $this->resumo);
    $con->bindValue(":observacao", $this->observacao);
    $con->bindValue(":edicao", $this->edicao);
    $con->bindValue(":volume", $this->volume);
    $con->bindValue(":numExemplar", $this->numExemplar);
    $con->bindValue(":prateleira", $this->prateleira);
    $con->bindValue(":classificacaoLivro", $this->classificacaoLivro);
    $con->bindValue(":autor", $this->autor);
    $con->bindValue(":editora", $this->editora);
   
    if ($con->execute()){
        
            if($con->rowCount() > 0){                      
               echo "<script>"
                . " alert('Livro Cadastrado com sucesso!');"
                . " window.location.href='interface/livro.php?opcao=8'; </script>";       
            }else{
                echo "<script>"
                . " alert('Livro não pode ser cadastrado!');"
                . " window.location.href='interface/livro.php?opcao=8'; </script>";
            }
        }else{
            echo "<script>"
                . " alert('Erro, informe o Adm!');"
                . " window.location.href='interface/livro.php?opcao=8'; </script>";
        }
        
} catch (Exception $ex) {
        return 'erro' .$ex->getMessage();
    }
}
function atualizar(){ 
    
   $pdo = Database::conexao();
   $titulo=$this->titulo;
   $edicao=$this->edicao;
   $volume=$this->volume;
   $con=$pdo->prepare("SELECT `idLivro` FROM `livro` WHERE `titulo`='$titulo' and `edicao`='$edicao' and `volume`='$volume'");
   $con->execute();
   $result=$con->fetchAll(PDO::FETCH_OBJ);
                foreach ($result as $bk) {
                  $id=$bk->idLivro; 
                }
   echo "<script>"
               . " alert('Atualizar Livro!');"
               . " window.location.href='edit/livroedit.php?opcao=8&idLivro=$id'; </script>";             
   return;
}    
public function alterar(){
    try{
        $pdo = Database::conexao();
        $con = $pdo->prepare("UPDATE `livro` SET `titulo`=:titulo, `ano`=:ano, `situacao`=:situacao,`resumo`=:resumo,`observacao`=:observacao, `edicao`=:edicao, `volume`=:volume, `numExemplar`=:numExemplar, `prateleira`=:prateleira, `classificacaoLivro`=:classificacaoLivro, `autor`=:autor, `editora`=:editora WHERE `idLivro`=:idLivro;");   
        $con->bindValue(":idLivro",$this->idLivro);
        $con->bindValue(":titulo", $this->titulo);
        $con->bindValue(":ano", $this->ano);
        $con->bindValue(":situacao", $this->situacao);
        $con->bindValue(":resumo", $this->resumo);
        $con->bindValue(":observacao", $this->observacao);
        $con->bindValue(":edicao", $this->edicao);
        $con->bindValue(":volume", $this->volume);
        $con->bindValue(":numExemplar", $this->numExemplar);
        $con->bindValue(":prateleira", $this->prateleira);
        $con->bindValue(":classificacaoLivro", $this->classificacaoLivro);
        $con->bindValue(":autor", $this->autor);
        $con->bindValue(":editora", $this->editora);
        
        $ex=$con->execute();
        if($ex){
            if($con->rowCount()>0){ 
                echo "<script>"
                . " alert('Livro Alterado com sucesso!');"
                . " window.location.href='view/livroview.php?opcao=8'; </script>";
            }else{
                echo "<script>"
                . " alert('Nada foi Alterado!');"
                . " window.location.href='view/livroview.php?opcao=8'; </script>";
            }
        }else{
            echo "<script>"
                . " alert('Erro, informe o Adm!');"
                . " window.location.href='view/livroview.php?opcao=8'; </script>";
        }
        
    } catch (Exception $ex) {
        return 'erro' .$ex->getMessage();
    }
}
public function listar($livro = null){
    $pdo = Database::conexao();
    //$con = $pdo->prepare("SELECT livro.idLivro, livro.titulo, livro.ano, livro.situacao, livro.resumo, livro.observacao, livro.edicao, livro.volume, livro.numExemplar, prateleira.setor, prateleira.fileira,classificacaoLivro.classificacao,( autor.nome)as autor, (editora.nome)as editora FROM livro join autor join editora join classificacaolivro join prateleira on livro.autor = autor.idAutor and livro.editora = editora.idEditora and livro.classificacaoLivro = classificacaolivro.idClassificacaoLivro and livro.prateleira = prateleira.idPrateleira ORDER BY livro.titulo");
    $con = $pdo->prepare("SELECT livro.idLivro, livro.titulo, livro.ano, livro.situacao, livro.resumo, livro.observacao, livro.edicao, livro.volume, livro.numExemplar, prateleira.setor, prateleira.fileira,classificacaoLivro.classificacao,( autor.nome)as autor, (editora.nome)as editora FROM livro join autor join editora join classificacaolivro join prateleira on livro.autor = autor.idAutor and livro.editora = editora.idEditora and livro.classificacaoLivro = classificacaolivro.idClassificacaoLivro and livro.prateleira = prateleira.idPrateleira AND livro.titulo like :nomeLivro ORDER BY livro.titulo limit 0,30");
    $con->bindValue(":nomeLivro", "%".$livro."%");
    //$con->bindValue(":i", $i);
    //$con->bindValue(":p", $p);
    $con->execute();
    return $con->fetchAll(PDO::FETCH_OBJ);
}

public function paginacao($pagina = 1){
    $total_reg = 10;
    $inicio = $pagina - 1;
    $inicio = $inicio * $total_reg;
    $pdo = Database::conexao();
    //$con = $pdo->prepare("SELECT livro.idLivro, livro.titulo, livro.ano, livro.situacao, livro.resumo, livro.observacao, livro.edicao, livro.volume, livro.numExemplar, prateleira.setor, prateleira.fileira,classificacaoLivro.classificacao,( autor.nome)as autor, (editora.nome)as editora FROM livro join autor join editora join classificacaolivro join prateleira on livro.autor = autor.idAutor and livro.editora = editora.idEditora and livro.classificacaoLivro = classificacaolivro.idClassificacaoLivro and livro.prateleira = prateleira.idPrateleira ORDER BY livro.titulo");
    $query = "SELECT livro.idLivro, livro.titulo, livro.ano, livro.situacao, livro.resumo, livro.observacao, livro.edicao, livro.volume, livro.numExemplar, prateleira.setor, prateleira.fileira,classificacaoLivro.classificacao,( autor.nome)as autor, (editora.nome)as editora FROM livro join autor join editora join classificacaolivro join prateleira on livro.autor = autor.idAutor and livro.editora = editora.idEditora and livro.classificacaoLivro = classificacaolivro.idClassificacaoLivro and livro.prateleira = prateleira.idPrateleira ORDER BY livro.titulo";
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

public function procurarLivro(){
   $pdo = Database::conexao();
   $con = $pdo->prepare("SELECT livro.titulo, prateleira.setor, prateleira.fileira FROM livro join  prateleira on livro.prateleira = prateleira.idPrateleira ORDER BY prateleira");
   $con->execute();
   return $con->fetchAll(PDO::FETCH_OBJ);
}
public function delete(){
    $pdo = Database::conexao();
    $con = $pdo->prepare("SELECT livro FROM `locado` WHERE livro = :idLivro");
    $con2 = $pdo->prepare("SELECT livro FROM `reserva` WHERE livro = :idLivro");
    $con->bindValue(':idLivro',$this->idLivro);
    $con2->bindValue(':idLivro',$this->idLivro);
    if($con->execute() || $con2->execute()){
        if($con->rowCount() == 0 && $con2->rowCount() == 0){
            $this->remover();
        }else{
           echo "<script>"
            . " alert('Nao e possivel deletar, o livro esta locado ou reservado!');"
            . " window.location.href='view/livroview.php?opcao=8'; </script>";
        }
    }            
}
//public function contador() {
//    $contmenos=Locacao::locarLivro();   
//    $contmais=Locacao::devolverLocacao();
//    $totContMenos=1;
//    $numExemplar=$this->numExemplar;
//    if($contmenos){
//       $menos=-$numExemplar;
//       $totContMenos=+1;
//       if($totContMenos <= 0){
//           echo "<script>"
//            . " alert('Não é possivel Realizar Esta Locacao, Exemplar 1!');"
//            . " window.location.href='interface/Locacao.php'; </script>";
//       }
//    }else if($contmais){
//       return $mais=+$numExemplar;
//    }
//        
//}
function remover(){
    $pdo = Database::conexao();
    $con = $pdo->prepare("DELETE FROM `livro` WHERE `idLivro` = :idLivro");
    $con->bindValue(':idLivro',$this->idLivro);
    if($con->execute()){
        if($con->rowCount() > 0){
                echo "<script>"
                   . " alert('Livro deletado com sucesso!');"
                   . " window.location.href='view/livroview.php?opcao=8'; </script>";
        }else{
            echo "<script>"
                   . " alert('Erro, informe o Adm!');"
                   . " window.location.href='view/livroview.php?opcao=8'; </script>";
        }
    }
}

//function Consultar(){
//    
//}
       
//

//
//
//function __construct() {
//    
//}
////get e set
//
//    
    function getIdLivro() {
        return $this->idLivro;
    }

    function getAutor() {
        return $this->autor;
    }

    function getEditora() {
        return $this->editora;
    }

    function getClassificacaoLivro() {
        return $this->classificacaoLivro;
    }
    public function getEdicao() {
        return $this->edicao;
    }

    public function setEdicao($edicao) {
        $this->edicao = $edicao;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getAno() {
        return $this->ano;
    }

    function getResumo() {
        return $this->resumo;
    }

    function getObservacao() {
        return $this->observacao;
    }
    public function getSituacao() {
        return $this->situacao;
    }

    public function getVolume() {
        return $this->volume;
    }

    public function getNumExemplar() {
        return $this->numExemplar;
    }

    public function getPrateleira() {
        return $this->prateleira;
    }

    public function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

    public function setVolume($volume) {
        $this->volume = $volume;
    }

    public function setPrateleira($prateleira) {
        $this->prateleira = $prateleira;
        
    }

        function setIdLivro($idLivro) {
        $this->idLivro = $idLivro;
    }

    function setAutor($autor) {
        $this->autor = $autor;
    }

    function setEditora($editora) {
        $this->editora = $editora;
    }

    function setClassificacaoLivro($classificacaoLivro) {
        $this->classificacaoLivro = $classificacaoLivro;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setAno($ano) {
        $this->ano = $ano;
    }

    function setResumo($resumo) {
        $this->resumo = $resumo;
    }

    function setObservacao($observacao) {
        $this->observacao = $observacao;
    }
}

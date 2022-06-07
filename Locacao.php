<?php
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
require_once 'Database.php';
require_once 'Reserva.php';

class Locacao {
    public $idLocacao;
    public $usuario;
    public $aluno;
    public $livro;
    public $reservado;
    public $dataHoraLocacao;
    public $dataHoraDevolucao;
    public $observacao;
    public $pendencia;
    public $pgAnterior;
    public $pgProximo;
    public $rank;
                
function contar() {
    $pdo = Database::conexao();
       $con = $pdo->prepare("SELECT livro.numExemplar FROM livro WHERE livro.idLivro = :livro");//linhas com livros cadastrados
       $con->bindValue(":livro", $this->livro);
       $con->execute();      
       $countEx=$con->fetch(PDO::FETCH_OBJ);
        $numExemplar=$countEx->numExemplar;
//      
    if($con->execute()){
        $con2 = $pdo->prepare("SELECT COUNT(*) as totalLoc FROM locado WHERE livro = :livro");//linhas com livros alocados
        $con2->bindValue(":livro", $this->livro);
        $con2->execute();
        $countLocado=$con2->fetch(PDO::FETCH_OBJ);
        $numLocado=$countLocado->totalLoc;
//
    if($con2->execute()){
        $con3 = $pdo->prepare("SELECT COUNT(*) as totalRes FROM reserva WHERE livro = :livro");//linhas com livros reservados
        $con3->bindValue(":livro", $this->livro);
        $con3->execute();
        $countReserva=$con3->fetch(PDO::FETCH_OBJ);
        $numReservado=$countReserva->totalRes;
    }
//      
    $totLocERes=($numExemplar-$numLocado-$numReservado);
    if($totLocERes > 1){ // && if(pendencia == 0)
        Locacao::locarLivro();
    }else {//      if($totLocERes > 1){ // && if(pendencia == 0)
         echo "<script>"
                . " alert('Livro nao pode ser Reservado, muitas reservas e locações!');"
                . " window.location.href='view/locacaoview.php?opcao=1'; </script>";
    }
    }  
}
function removerReserva($idRes){
    //echo $idRes;
    $pdo = Database::conexao();
    $con = $pdo->prepare("DELETE FROM `reserva` WHERE `idReserva` = :id");
           $con->bindValue(":id",$idRes);
           $con->execute();
}
function locarLivro(){
   
    $pdo = Database::conexao();
    $con2=$pdo->prepare("SELECT situacao FROM aluno WHERE idAluno = :aluno");
    $con2->bindValue(":aluno", $this->aluno);
    $con2->execute();
    $result=$con2->fetch(PDO::FETCH_OBJ); 
    $res=$result->situacao;
if($res!='pendente'){
    try{      
    $con = $pdo->prepare("INSERT INTO `locado` (`idLocacao`,`livro`, `aluno`, `usuario`, `dataHoraLocacao`, `dataHoraDevolucao`, `observacao`) VALUES (NULL,:livro,:aluno,:usuario, :dataHoraLocacao,:dataHoraDevolucao,:observacao )");
//    $con->bindValue(":reservado", $this->reservado);
    $con->bindValue(":livro", $this->livro);
    $con->bindValue(":aluno", $this->aluno);
    $con->bindValue(":usuario", $this->usuario);
    $con->bindValue(":dataHoraLocacao", $this->dataHoraLocacao);
    $con->bindValue(":dataHoraDevolucao", $this->dataHoraDevolucao);
    $con->bindValue(":observacao", $this->observacao);
//    $con->bindValue(":pendencia", $this->pendencia);   
$con3=$pdo->prepare("SELECT idReserva FROM reserva WHERE idReserva = :reservado");
$con3->bindValue(":reservado", $this->reservado);
$con3->execute();
$result3=$con3->fetch(PDO::FETCH_OBJ); 
//
    if ($con->execute()){    
        if($con->rowCount() > 0){                    
            if(!empty($result3)){
                $this->removerReserva($result3->idReserva);                   
            }
                echo "<script>"
                . " alert('Livro Locado com sucesso!');"
                . " window.location.href='interface/locacao.php?opcao=1'; </script>";        
        }else{
                 echo "<script>"
                . " alert('Livro não pode ser locado!');"
                . " window.location.href='interface/locacao.php?opcao=1'; </script>";
        }
    
    
    
}    
    } catch (Exception $ex) {
        return 'erro' .$ex->getMessage();
    }
        
}else{
        echo "<script>"
                . " alert('Aluno pendente! não pode locar');"
                . " window.location.href='interface/locacao.php?opcao=1'; </script>";
}
}
function alterar(){
    try{
    $pdo = Database::conexao();
    $con = $pdo->prepare("UPDATE `locado` SET `livro`=:livro, `aluno`=:aluno, `usuario`=:usuario,`dataHoraLocacao`=:dataHoraLocacao, `dataHoraDevolucao`=:dataHoraDevolucao WHERE `idLocacao` = :idLocacao");
    $con->bindValue(":idLocacao", $this->idLocacao);
    $con->bindValue(":livro", $this->livro);
    $con->bindValue(":aluno", $this->aluno);
    $con->bindValue(":usuario", $this->usuario);
    $con->bindValue(":dataHoraLocacao", $this->dataHoraLocacao);
    $con->bindValue(":dataHoraDevolucao", $this->dataHoraDevolucao);
    //$con->bindValue(":observacao", $this->observacao);
    //$con->bindValue(":pendencia", $this->pendencia);
    
    if ($con->execute()){
        
            if($con->rowCount() > 0){                      
                echo "<script>"
                . " alert('Locação Atualizada com sucesso!');"
                . " window.location.href='view/locacaoview.php?opcao=1'; </script>";        
            }else{
                echo "<script>"
                . " alert('Nada foi Atualizado!');"
                . " window.location.href='view/locacaoview.php?opcao=1'; </script>";
            }
    }else{
            echo "<script>"
                . " alert('Erro, informe o Adm!');"
                . " window.location.href='view/locacaoview.php?opcao=1'; </script>";
            }
        
    } catch (Exception $ex) {
        return 'erro' .$ex->getMessage();
    } 
}
//function consultarLocacao(){
//    
//}
function devolver(){
    $pdo = Database::conexao();
    Locacao::situacaoAluno();
    $con = $pdo->prepare("DELETE FROM `locado` WHERE `idLocacao` = :idLocacao");
    $con->bindValue(':idLocacao',$this->idLocacao);    
    if($con->execute()){
        if($con->rowCount() > 0){
            echo "<script>"
                . " alert('Locacao devolvida com sucesso!');"
                . " window.location.href='view/locacaoview.php?opcao=1'; </script>";
        }else{
            echo "<script>"
                   . " alert('Erro na devolução,informe o Adm!');"
                   . " window.location.href='view/locacaoview.php?opcao=1'; </script>";
        }
    }
}
function situacaoAluno(){
    $pdo = Database::conexao();
    $id=$_GET['idLocacao'];
                $banco = $pdo->prepare("SELECT * FROM `locado` WHERE `idLocacao`='$id'");
                $banco->execute();
                $result = $banco->fetchAll(PDO::FETCH_OBJ);
                foreach ($result as $bk) {
                    $idLocacao=$bk->idLocacao; 
                    $livro=$bk->livro; 
                    $aluno=$bk->aluno; 
                    $usuario=$bk->usuario;
                    $dataHoraLocacao=$bk->dataHoraLocacao;
                    $dataHoraDevolucao=$bk->dataHoraDevolucao;
                    $observacao=$bk->observacao;
                    $pendencia=$bk->pendencia;
                }
        $con = $pdo->prepare("UPDATE `aluno` SET `situacao` = 'Em dia' WHERE `idAluno` = '$aluno'");
        $con->execute();
}

public function verificaExcluir(){
    $pdo = Database::conexao();
    $con = $pdo->prepare("SELECT * FROM `locado` WHERE idLocacao =:idLocacao");
    $con->bindValue(':idLocacao',$this->idLocacao);
    $con->execute();
    $result=$con->fetchAll(PDO::FETCH_OBJ); 
    foreach ($result as $bk){
        $pend=$bk->pendencia;
        $dt=$bk->dataDeDevolucao;
    }
    if($pend == 'pendente'){
        echo "<script>"
            . " alert('Não é possivel deletar, aluno possui pendencia(s)!');"
            . " window.location.href='view/Locacaoview.php?opcao=1'; </script>";
    }  else {
        Locacao::delete();
    }
}
public function delete(){
    $pdo = Database::conexao();
    $con = $pdo->prepare("SELECT idLocacao FROM `locado` WHERE idLocacao =:idLocacao");
    $con->bindValue(':idLocacao',$this->idLocacao);
    if($con->execute()){
        if($con->rowCount() > 0){
            $this->remover();
        }else{
           echo "<script>"
            . " alert('Não é possivel deletar, esta em uso!');"
            . " window.location.href='view/Locacaoview.php?opcao=1'; </script>";
        }
    }            
}
function remover(){
    $pdo = Database::conexao();
    $con = $pdo->prepare("DELETE FROM `locado` WHERE `idLocacao` = :idLocacao");
    $con->bindValue(':idLocacao',$this->idLocacao);
    if($con->execute()){
        if($con->rowCount() > 0){
                echo "<script>"
                   . " alert('Locacao deletado com sucesso!');"
                   . " window.location.href='view/Locacaoview.php?opcao=1'; </script>";
        }else{
            echo 'Nao pode ser removido!';
            //return 'erro' .$ex->getMessage();
        }
    }
}
function listar(){
   $pdo = Database::conexao();
   $con = $pdo->prepare("SELECT locado.idLocacao, livro.titulo, (aluno.nome)as aluno, (usuario.nome)as usuario, locado.dataHoraLocacao, locado.dataHoraDevolucao, locado.observacao, locado.pendencia FROM locado join livro join aluno join usuario on locado.livro = livro.idLivro and locado.aluno = aluno.idAluno and locado.usuario = usuario.idUsuario ORDER BY dataHoraLocacao DESC");
   $con->execute();
   return $con->fetchAll(PDO::FETCH_OBJ); 
}

public function paginacao($pagina = 1){
    $total_reg = 10;
    $inicio = $pagina - 1;
    $inicio = $inicio * $total_reg;
    $pdo = Database::conexao();
    //$con = $pdo->prepare("SELECT livro.idLivro, livro.titulo, livro.ano, livro.situacao, livro.resumo, livro.observacao, livro.edicao, livro.volume, livro.numExemplar, prateleira.setor, prateleira.fileira,classificacaoLivro.classificacao,( autor.nome)as autor, (editora.nome)as editora FROM livro join autor join editora join classificacaolivro join prateleira on livro.autor = autor.idAutor and livro.editora = editora.idEditora and livro.classificacaoLivro = classificacaolivro.idClassificacaoLivro and livro.prateleira = prateleira.idPrateleira ORDER BY livro.titulo");
    $query = "SELECT locado.idLocacao, livro.titulo, (aluno.nome)as aluno, (usuario.nome)as usuario, locado.dataHoraLocacao, locado.dataHoraDevolucao, locado.observacao, locado.pendencia FROM locado join livro join aluno join usuario on locado.livro = livro.idLivro and locado.aluno = aluno.idAluno and locado.usuario = usuario.idUsuario ORDER BY dataHoraLocacao DESC";
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

function date(){
    date_default_timezone_set("America/Manaus");
    return date("Y-m-d"); 
}
function dateRenovada($id,$dt){
    $pdo = Database::conexao();
     
    $date = $pdo->prepare("SELECT DATE_ADD( '$dt', INTERVAL 5 DAY)as DataDeDevolucao FROM locado WHERE idLocacao = '$id'");   
        $date->execute();
        $date2=$date->fetch(PDO::FETCH_OBJ);
        return $date2->DataDeDevolucao;
}
public function convertData($data){
    $data = explode("-", $data);
    return $data[2]."/".$data[1]."/".$data[0];
}
function ranking($pagina = 1){
    $total_reg = 10;
    $inicio = $pagina - 1;
    $inicio = $inicio * $total_reg;
    $this->rank = $inicio;
    $pdo = Database::conexao();
       $query="SELECT aluno.nome,aluno.serie,aluno.turno, COUNT(*)as Ranking FROM locado, aluno WHERE idAluno=aluno GROUP BY aluno ORDER BY Ranking DESC";
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

function renovar(){
    $dt = Locacao::date();
    $pdo = Database::conexao();
    $id=$_GET['idLocacao'];
                $banco = $pdo->prepare("SELECT * FROM `locado` WHERE `idLocacao`='$id'");
                $banco->execute();
                $result = $banco->fetchAll(PDO::FETCH_OBJ);
                foreach ($result as $bk) {
                    $idLocacao=$bk->idLocacao; 
                    $livro=$bk->livro; 
                    $aluno=$bk->aluno; 
                    $usuario=$bk->usuario;
                    $dataHoraLocacao=$bk->dataHoraLocacao;
                    $dataHoraDevolucao=$bk->dataHoraDevolucao;
                    $observacao=$bk->observacao;
                    $pendencia=$bk->pendencia;
                }

                $dateresult=Locacao::dateRenovada($idLocacao,$dataHoraDevolucao);
                
if($observacao == 'renovado' && $dt < $dataHoraDevolucao  ){
                   echo "<script>"
                . " alert('O Livro ja foi renovado e esta em dia!');"
                . " window.location.href='view/locacaoview.php?opcao=1'; </script>";
}else{          
    if($dataHoraDevolucao == $dt){ // && $pendencia == 0 se a data for igual ou maior a mesma e se o aluno não estiver pendente                  
        $con = $pdo->prepare("UPDATE `locado` SET `dataHoraDevolucao`='$dateresult', `observacao`='renovado' WHERE `idLocacao` = '$idLocacao'");
        if ($con->execute()){    
            if($con->rowCount() > 0){                      
                echo "<script>"
                . " alert('Locacao Renovada com sucesso!');"
                . " window.location.href='view/locacaoview.php?opcao=1'; </script>";        
            }else{
                echo "<script>"
                . " alert('Erro ao Renovar1!');"
                . " window.location.href='view/locacaoview.php?opcao=1'; </script>";
            }
        }
    }else if($dataHoraDevolucao < $dt){
        $con = $pdo->prepare("UPDATE `locado` SET `pendencia`='pendente', `observacao`='nao entregue' WHERE `idLocacao` = '$idLocacao'");
        $con2 = $pdo->prepare("UPDATE `aluno` SET `situacao`='pendente' WHERE `idAluno` = '$aluno'");
        $con2->execute();
        $con->execute();
        echo "<script>"
                . " alert('Pendente de Entrega!');"
                . " window.location.href='view/locacaoview.php?opcao=1'; </script>";
    }else if($dataHoraDevolucao > $dt){
        $con = $pdo->prepare("UPDATE `locado` SET `pendencia`='', `observacao`='Em dia' WHERE `idLocacao` = '$idLocacao'");   
        $con->execute();       
        echo "<script>"
                . " alert('Tempo de Locacao em Aberto!');"
                . " window.location.href='view/locacaoview.php?opcao=1'; </script>";
    }

  }


}    


//function listarDevolucao(){
//    
//}
function __construct() {
    
}
//set e get
    function getIdLocacao() {
        return $this->registro;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getAluno() {
        return $this->aluno;
    }

    function getLivro() {
        return $this->livro;
    }

    function getReservado() {
        return $this->reservado;
    }

    function getDataHoraLocacao() {
        return $this->dataHoraLocacao;
    }

    function getDataHoraDevolucao() {
        return $this->dataHoraDevolucao;
    }

    function getObservacao() {
        return $this->observacao;
    }

    function getPendencia() {
        return $this->pendencia;
    }

    function setIdLocacao($idLocacao) {
        $this->idLocacao = $idLocacao;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setAluno($aluno) {
        $this->aluno = $aluno;
    }

    function setLivro($livro) {
        $this->livro = $livro;
    }

    function setReservado($reservado) {
        $this->reservado = $reservado;
    }

    function setDataHoraLocacao($dataHoraLocacao) {
        $this->dataHoraLocacao = $dataHoraLocacao;
    }

    function setDataHoraDevolucao($dataHoraDevolucao) {
        $this->dataHoraDevolucao = $dataHoraDevolucao;
    }

    function setObservacao($observacao) {
        $this->observacao = $observacao;
    }

    function setPendencia($pendencia) {
        $this->pendencia = $pendencia;
        
    }
}
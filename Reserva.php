<?php
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
require_once 'Database.php';

class Reserva {
    public $idReserva;
    public $usuario;
    public $aluno;
    public $livro;
    public $locado;
    public $dataHoraReserva;
    public $pgAnterior;
    public $pgProximo;

function contar() {
    $pdo = Database::conexao();
       $con = $pdo->prepare("SELECT livro.numExemplar FROM livro WHERE livro.idLivro = :livro");
       $con->bindValue(":livro", $this->livro);
       $con->execute();      
       $countEx=$con->fetch(PDO::FETCH_OBJ);
         $numExemplar=$countEx->numExemplar;
      
    if($con->execute()){
       $con2 = $pdo->prepare("SELECT COUNT(*) as totalLoc FROM locado WHERE livro = :livro");
       $con2->bindValue(":livro", $this->livro);
       $con2->execute();
       $countLocado=$con2->fetch(PDO::FETCH_OBJ);
         $numLocado=$countLocado->totalLoc;
//
        if($con2->execute()){
            $con3 = $pdo->prepare("SELECT COUNT(*) as totalRes FROM reserva WHERE livro = :livro");
            $con3->bindValue(":livro", $this->livro);
            $con3->execute();
            $countReserva=$con3->fetch(PDO::FETCH_OBJ);
              $numReservado=$countReserva->totalRes;
        }
//      
        $totLocERes=($numExemplar+$numLocado+$numReservado);
        if($numExemplar*2 >= $totLocERes){
            Reserva::reservar();
        }else{
            echo "<script>"
                . " alert('Livro não pode ser Reservado, muitas reservas e locações!');"
                . " window.location.href='interface/reserva.php?opcao=7'; </script>";
        }
    }
}
    
    
public function reservar(){
    $pdo = Database::conexao();
    $con2=$pdo->prepare("SELECT situacao FROM aluno WHERE idAluno = :aluno");
    $con2->bindValue(":aluno", $this->aluno);
    $con2->execute();
    $result=$con2->fetch(PDO::FETCH_OBJ); 
    $res=$result->situacao;
if($res!='pendente'){    
    try{
    $pdo = Database::conexao();
    $con = $pdo->prepare("INSERT INTO `reserva`(`idReserva`, `livro`, `aluno`, `usuario`,`dataHoraReserva`) VALUES (NULL, :livro, :aluno,:usuario,:dataHoraReserva)");
    $con->bindValue(":livro", $this->livro);
    $con->bindValue(":aluno", $this->aluno);
    $con->bindValue(":usuario", $this->usuario);
    $con->bindValue(":dataHoraReserva", $this->dataHoraReserva);
   
    if ($con->execute()){
        
            if($con->rowCount() > 0){                      
                echo "<script>"
                . " alert('Livro  Reservado com sucesso!');"
                . " window.location.href='interface/reserva.php?opcao=7'; </script>";        
            }else{
                echo "<script>"
                . " alert('Livro não pode ser reservado!');"
                . " window.location.href='interface/reserva.php?opcao=7'; </script>";
            }
        }else{
            echo "<script>"
                . " alert('Erro, informe o Adm!');"
                . " window.location.href='interface/reserva.php?opcao=7'; </script>";
        }
        
    } catch (Exception $ex) {
        return 'erro' .$ex->getMessage();
    }
    }else{
        echo "<script>"
                . " alert('Aluno pendente! não pode reservar');"
                . " window.location.href='interface/reserva.php?opcao=7'; </script>";
}
}
public function alterar(){
try{
$pdo=Database::conexao();
$con = $pdo->prepare("UPDATE `reserva` SET `livro`=:livro, `aluno`=:aluno,`usuario`=:usuario, `dataHoraReserva`=:dataHoraReserva WHERE `idReserva` = :idReserva");
    $con->bindValue(":idReserva", $this->idReserva);    
    $con->bindValue(":livro", $this->livro);
    $con->bindValue(":aluno", $this->aluno);
    $con->bindValue(":usuario", $this->usuario);
    $con->bindValue(":dataHoraReserva", $this->dataHoraReserva);
    if($con->execute()){
        if($con->rowCount() > 0){                      
                echo "<script>"
                . " alert('Reserva Atualizada com sucesso!');"
                . " window.location.href='view/reservaview.php?opcao=7'; </script>";        
        }else{
                echo "<script>"
                . " alert('Nada foi Atualizado!');"
                . " window.location.href='view/reservaview.php?opcao=7'; </script>";
        }
    }
    }catch (Exception $ex) {
        echo "<script>"
        . " alert('Não pode atualiza a reserva!');"
        . " window.location.href='view/reservaview.php?opcao=7'; </script>";
        return 'erro' .$ex->getMessage();
    }    
}
//public function consultarReserva(){
//    
//}
public function verificar(){
    $pdo = Database::conexao();
    $locado=$this->locado;
       $con = $pdo->prepare("SELECT `locado` FROM `reserva`, `locado` WHERE '$locado' = `idLocacao`");
        if($con->execute()){
            echo "<script>"
            . " alert('Reserva não pode ser Cancelada!');"
            . " window.location.href='view/reservaview.php?opcao=7'; </script>";
        }else{
            Reserva::remover();
        }
}
public function remover(){
$pdo = Database::conexao();   
    $con = $pdo->prepare("SELECT idReserva FROM `reserva` WHERE `idReserva` = :idReserva");
    $con->bindValue(":idReserva", $this->idReserva);
    $con->execute();   
            echo "<script>"
            . " alert('Reserva Cancelada com sucesso!');"
            . " window.location.href='view/reservaview.php?opcao=7'; </script>"; 
}
public function listar(){
    $pdo = Database::conexao();
        $con = $pdo->prepare("SELECT reserva.idReserva, livro.titulo, (aluno.nome)as aluno, (usuario.nome)as usuario, reserva.dataHoraReserva FROM reserva join livro join aluno join usuario on reserva.livro = livro.idLivro and reserva.aluno = aluno.idAluno and reserva.usuario = usuario.idUsuario ORDER BY dataHoraReserva DESC");
        $con->execute();
        return $con->fetchAll(PDO::FETCH_OBJ);
}

public function paginacao($pagina = 1){
    $total_reg = 10;
    $inicio = $pagina - 1;
    $inicio = $inicio * $total_reg;
    $pdo = Database::conexao();
    //$con = $pdo->prepare("SELECT livro.idLivro, livro.titulo, livro.ano, livro.situacao, livro.resumo, livro.observacao, livro.edicao, livro.volume, livro.numExemplar, prateleira.setor, prateleira.fileira,classificacaoLivro.classificacao,( autor.nome)as autor, (editora.nome)as editora FROM livro join autor join editora join classificacaolivro join prateleira on livro.autor = autor.idAutor and livro.editora = editora.idEditora and livro.classificacaoLivro = classificacaolivro.idClassificacaoLivro and livro.prateleira = prateleira.idPrateleira ORDER BY livro.titulo");
    $query = "SELECT reserva.idReserva, livro.titulo, (aluno.nome)as aluno, (usuario.nome)as usuario, reserva.dataHoraReserva FROM reserva join livro join aluno join usuario on reserva.livro = livro.idLivro and reserva.aluno = aluno.idAluno and reserva.usuario = usuario.idUsuario ORDER BY dataHoraReserva DESC";
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
public function convertData($data){
    $data = explode("-", $data);
    return $data[2]."/".$data[1]."/".$data[0];
}
public function cancelarReserva(){
    
}
        function __construct() {
    
}
//set e get
    function getUsuario() {
        return $this->usuario;
    }

    function getAluno() {
        return $this->aluno;
    }

    function getLivro() {
        return $this->livro;
    }
    public function getIdReserva() {
        return $this->idReserva;
    }

    public function getLocado() {
        return $this->locado;
    }

        function getDataHoraReserva() {
        return $this->dataHoraReserva;
    }

    function getStatus() {
        return $this->status;
    }
    public function setIdReserva($idReserva) {
        $this->idReserva = $idReserva;
    }

    public function setLocado($locado) {
        $this->locado = $locado;
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
    function setDataHoraReserva($dataHoraReserva) {
        $this->dataHoraReserva = $dataHoraReserva;
    }
    function setStatus($status) {
        $this->status = $status;
    }


}
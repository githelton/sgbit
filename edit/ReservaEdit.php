<?php
        include "../Logar.php";
	$obj = New Logar();
	$obj->validaSession2();
        
        $idUsuario=$_SESSION['idUsuario'];
        $usuarioNome=$_SESSION['usuario'];
        
require_once '../Database.php';
require_once '../Reserva.php';
$pdo=Database::conexao();
$res1 = new Reserva();
$id=$_GET['idReserva']; 

                $banco = $pdo->prepare("SELECT * FROM `reserva` WHERE `idReserva`='$id'");
                $banco->execute();
                $result = $banco->fetchAll(PDO::FETCH_OBJ);
                foreach ($result as $bk) {
                    $idReserva=$bk->idReserva; 
                    $livro=$bk->livro; 
                    $aluno=$bk->aluno; 
                    $usuario=$bk->usuario;
                    $dataHoraReserva=$bk->dataHoraReserva;
                } 
?>
<?php
include_once ("../include/header_2.php");
include_once ("../include/header1.php");
?>

<div class="art-sheet clearfix">
<div class="art-layout-wrapper">
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell art-content">
<article class="art-post art-article">  
    <center><h2 style="margin-right:6px;font-size:20px;font-weight: bold;">ALTERAÇÃO DA RESERVA</h2></center>
    <div class="formularioReserva">
        <form name="formCadastro" action="../ReservaGerenciador.php?opcao=2&idReserva" method="post">
            
            <input type="hidden" name="idReserva" value="<?php echo "$idReserva"; ?>"><br>        
            <input type="hidden" name="usuario" value="<?php echo "$idUsuario"; ?>"><br>         
            <span style="margin-right:4px;margin-left: 250px;font-size:18px;font-weight: bold;">Usuário: </span><input value="<?php echo "$usuarioNome"; ?>" readonly class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:400px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            
            <span style="margin-right:28px;margin-left: 250px;font-size:18px;font-weight: bold;">Livro*</span>  <select name="livro" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:400px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
                <option value="livro" >Escolha</option>
                <?php
                $banco = $pdo->prepare("SELECT * FROM `livro`");
                $banco->execute();
                $result = $banco->fetchAll(PDO::FETCH_OBJ);
                foreach ($result as $back) {
                    if($livro == $back->idLivro){
                        echo "<option  value =  $back->idLivro selected>$back->titulo </option>"; 
                    }else{
                        echo "<option  value =  $back->idLivro>$back->titulo </option>";
                    }    
                }                
                ?>
            </select><br> <br> 
            
            <span style="margin-right:22px;margin-left: 250px;font-size:18px;font-weight: bold;">Aluno*</span> <select name="aluno" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:400px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
                <option value="aluno">Escolha</option>
                <?php
                $banco = $pdo->prepare("SELECT * FROM `aluno`");
                $banco->execute();
                $result = $banco->fetchAll(PDO::FETCH_OBJ);
                foreach ($result as $back) {
                    if($aluno == $back->idAluno){
                        echo "<option  value = '$back->idAluno' selected>$back->nome </option>";
                    }else{
                        echo "<option  value = '$back->idAluno'>$back->nome </option>";
                    }    
                } 
                ?>
            </select><br> <br> 
            <span style="margin-right:6px;margin-left: 250px;font-size:18px;font-weight: bold;">Data da Reserva*:</span><input type="date" name="dataHoraReserva" value="<?php echo "$dataHoraReserva"; ?>"required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:170px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            <br><br><br><br><br> <center>
            <input type="submit" name="btAtualizar" value="Atualizar" class="art-button" style="margin-right:16px;">
            <a href="../view/ReservaView.php?opcao=7"><input type="button" name="btVoltar" value="Voltar" class="art-button" style="margin-right:16px;"></a>
            </center>
        </form>    
            
    </div>
</article>
</div>
</div>
</div>
</div>
</div>  
<?php
include_once("../include/footer.php");      
?>

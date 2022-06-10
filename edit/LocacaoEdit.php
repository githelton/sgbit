<?php
        include "../Logar.php";
	$obj = New Logar();
	$obj->validaSession2();
        $idUsuario=$_SESSION['idUsuario']; 
        $usuarioNome=$_SESSION['usuario'];
        
require_once '../Database.php';
$pdo=Database::conexao();
$op=$_GET['opcao'];
        if($op == 1){
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
              
            }else{
                $idRes=$_GET['idReserva'];
                
                    $banco = $pdo->prepare("SELECT * FROM `reserva` WHERE `idReserva`='$idRes'");
                    $banco->execute();
                    $result = $banco->fetchAll(PDO::FETCH_OBJ);
                    foreach ($result as $bk) {
                        $idReserva=$bk->idReserva; 
                        $livro=$bk->livro; 
                        $aluno=$bk->aluno; 
                        $usuario=$bk->usuario;
                        $dataHoraReserva=$bk->dataHoraReserva;
                }
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
    </br><center><h2 style="margin-right:6px;font-size:20px;font-weight: bold;">ALTERAÇÃO DO LIVRO LOCADO</h2></center>
    <div class="formularioLocacao">
        <?php if($op==1){ ?>
            <form name="formCadastro" action="../LocacaoGerenciador.php?opcao=2&idLocacao" method="post">
        <?php }else { ?>    
            <form name="formCadastro" action="../LocacaoGerenciador.php?opcao=3&idReserva" method="post">
                <?php } ?>
            <?php if($op==1){ ?>
            <input type="hidden" name="idLocacao"  value="<?php echo "$idLocacao"; ?>"><br>       
            <?php } ?>
               <input type="hidden" name="usuario" value="<?php echo "$idUsuario"; ?>"><br>         
               <span style="margin-right:6px;margin-left: 250px;font-size:18px;font-weight: bold;">Usuario: </span><input value="<?php echo $usuarioNome; ?>" readonly class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:400px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br> 
            
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
            </select><br><br> 
            
            <span style="margin-right:28px;margin-left: 250px;font-size:18px;font-weight: bold;">Livro*</span> <select name="livro" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:400px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
                <option value="livro">Escolha</option>
                <?php
                $banco = $pdo->prepare("SELECT `idLivro`, `titulo` FROM `livro`");
                $banco->execute();
                $result = $banco->fetchAll(PDO::FETCH_OBJ);
                foreach ($result as $back) {
                    if($livro == $back->idLivro){
                        echo "<option  value = '$back->idLivro' selected>$back->titulo</option>";
                    }else{
                        echo "<option  value = '$back->idLivro'>$back->titulo</option>";
                    }
                }               
                ?>
            </select> <br><br>    
        <?php if($op==1){ ?>
            <span style="margin-right:26px;margin-left: 250px;font-size:18px;font-weight: bold;">Data da Locação*:</span><input type="date" name="dataHoraLocacao" readonly value="<?php echo "$dataHoraLocacao"; ?>" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:170px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            <span style="margin-right:6px;margin-left: 250px;font-size:18px;font-weight: bold;">Data da Devolução*:</span><input type="date" name="dataHoraDevolucao" readonly value="<?php echo "$dataHoraDevolucao"; ?>" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:170px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            <span style="margin-right:6px;margin-left: 250px;font-size:18px;font-weight: bold;">Observação:</span><input type="text"  name="observacao" value="<?php echo "$observacao"; ?>" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:370px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br> 
            <span style="margin-right:34px;margin-left: 250px;font-size:18px;font-weight: bold;">Situação:</span><input type="text" readonly name="pendencia" required value="<?php echo "$pendencia"; ?>" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:370px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>  
        <?php } else { ?> 
            <span style="margin-right:26px;margin-left: 250px;font-size:18px;font-weight: bold;">Data da Locação*:</span><input type="date" name="dataHoraLocacao"  value="<?php echo "$dataHoraReserva"; ?>" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:170px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br> 
            <span style="margin-right:6px;margin-left: 250px;font-size:18px;font-weight: bold;">Data da Devolução*:</span><input type="date" name="dataHoraDevolucao" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:170px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            <span style="margin-right:6px;margin-left: 250px;font-size:18px;font-weight: bold;">Observação:</span><input type="text"  name="observacao" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:400px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            <span style="margin-right:34px;margin-left: 250px;font-size:18px;font-weight: bold;">Situação:</span><input type="text" readonly name="pendencia" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:400px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>  
        <?php } ?>  
            <center>
            <input type="submit" name="btAtualizar" value="Atualizar" class="art-button" style="margin-right:16px;">
            <a href="../view/LocacaoView.php?opcao=1"><input type="button" name="btVoltar" value="Voltar" class="art-button" style="margin-right:16px;"></a> 
            </center>
 </article>                 
 </div>

</div>
</div>
</div>
</div>
 
<?php
include_once("../include/footer.php");      
?>
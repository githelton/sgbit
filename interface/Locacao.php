<?php
        include "../Logar.php";
	$obj = New Logar();
	$obj->validaSession2();
        $idUsuario=$_SESSION['idUsuario']; 
        $usuarioNome=$_SESSION['usuario'];
        require_once '../Database.php';        
        $pdo = Database::conexao();
        $op=$_GET['opcao'];
        
        if($op==2){             
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
<div class="art-sheet clearfix" style="margin-bottom: 0px;">
<div class="art-layout-wrapper">
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell art-content">
<article class="art-post art-article"> 
     <div class="formularioLocacao">
     <center><h2 style="margin-right:6px;font-size:20px;font-weight: bold;">CADASTRO DA LOCAÇÃO</h2></center></br>    
        <?php if($op==1){ ?>
            <form name="formCadastro" action="../LocacaoGerenciador.php?opcao=3" method="post">
        <?php }else if($op==2){ ?>    
            <form name="formCadastro" action="../LocacaoGerenciador.php?opcao=4&idReserva" method="post">
        <?php } ?>
        <?php if($op==2){ ?>
                <input type="hidden" name="idReserva" value="<?php echo "$idReserva"; ?>">
        <?php } ?>
               <input type="hidden" name="usuario" value="<?php echo "$idUsuario"; ?>"><br>         
               <span style="margin-right:6px;margin-left: 250px;font-size:18px;font-weight: bold;">Usuario: </span><input value="<?php echo $usuarioNome; ?>" readonly class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:350px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            
               <span style="margin-right:24px;margin-left: 250px;font-size:18px;font-weight: bold;">Aluno*</span> <select name="aluno" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:350px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
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
            
            <span style="margin-right:30px;margin-left: 250px;font-size:18px;font-weight: bold;">Livro*</span> <select name="livro" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:350px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
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
            </select><br><br>    
        <?php if($op==1){ ?>
            <span style="margin-right:26px;margin-left: 250px;font-size:18px;font-weight: bold;">Data da Locação*:</span><input type="date" name="dataHoraLocacao" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:170px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            <span style="margin-right:6px;margin-left: 250px;font-size:18px;font-weight: bold;">Data da Devolução*:</span><input type="date" name="dataHoraDevolucao" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:170px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            <span style="margin-right:6px;margin-left: 250px;font-size:18px;font-weight: bold;">Observação:</span><input type="text" name="observacao" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:315px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            
        <?php } else if($op==2){ ?> 
            <span style="margin-right:26px;margin-left: 250px;font-size:18px;font-weight: bold;">Data da Locação*:</span><input type="date" name="dataHoraLocacao"  value="<?php echo "$dataHoraReserva"; ?>" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:170px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            <span style="margin-right:6px;margin-left: 250px;font-size:18px;font-weight: bold;">Data da Devolução*:</span><input type="date" name="dataHoraDevolucao" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:170px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            <span style="margin-right:6px;margin-left: 250px;font-size:18px;font-weight: bold;">Observação:</span><input type="text" name="observacao" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:220px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            
        <?php } ?>
            <center><br>
            <input type="submit" name="btCadastrar" value="Cadastrar" class="art-button" style="margin-right:16px;">
            <a href="../view/locacaoview.php?opcao=1"><input type="button" name="btGerenciar" value="Gerenciar" class="art-button" style="margin-right:16px;"></a>
            <input type="reset" name="btResetar" value="Resetar" class="art-button" style="margin-right:16px;">
            <a href="../view/RankingView.php?opcao=1"><input type="button" name="btRanking" value="Ranking" class="art-button" style="margin-right:16px;"></a>
            <a href="../home.php?opcao=1"><input type="button" name="btVoltar" value="Voltar" class="art-button" style="margin-right:16px;"></a>
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
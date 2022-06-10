<?php
        include "../Logar.php";
	$obj = New Logar();
	$obj->validaSession2();
        
require_once '../Database.php';
$pdo=Database::conexao();
$id=$_GET['idAutor']; 

                $banco = $pdo->prepare("SELECT * FROM `autor` WHERE `idAutor`='$id'");
                $banco->execute();
                $result = $banco->fetchAll(PDO::FETCH_OBJ);
                foreach ($result as $bk) {
                    $idAutor=$bk->idAutor; 
                    $nome=$bk->nome; 
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
    <center><h2 style="margin-right:6px;font-size:20px;font-weight: bold;">ALTERAÇÃO DO AUTOR</h2></center><br><br><br><br><br>
    <div class="formularioClassificacaoLivro">
        <form name="formCadastro" action="../AutorGerenciador.php?opcao=2&idAutor" method="post">    
            <?php foreach ($result as $bk) {?>
            <input type="hidden" name="idAutor" value="<?php echo "$idAutor";?>" readonly>
            <span style="margin-right:6px; font-size:18px; font-weight: bold; margin-left: 250px;">Autor*:</span><input  type="text" name="nome" value="<?php echo "$nome";?>" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:350px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br> </br>     
            <center><br><br><br><br><br><br><br><br><br>
            <input type="submit" name="btAtualizar" value="Atualizar" class="art-button" style="margin-right:16px;">
            <a href="../view/autorview.php?opcao=3"><input type="button" name="btVoltar" value="Voltar" class="art-button" style="margin-right:16px;"></a>
            </center>
            <?php } ?>
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

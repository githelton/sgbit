<?php
        include "../Logar.php";
	$obj = New Logar();
	$obj->validaSession2();
        
require_once '../Database.php';
$pdo=Database::conexao();

$id=$_GET['idEditora']; 

                $banco = $pdo->prepare("SELECT * FROM `editora` WHERE `idEditora`='$id'");
                $banco->execute();
                $result = $banco->fetchAll(PDO::FETCH_OBJ);
                foreach ($result as $bk) {
                    $idEditora=$bk->idEditora; 
                    $nome=$bk->nome; 
                    $cidade=$bk->cidade; 
                    $endereco=$bk->endereco;
                    $fone=$bk->fone;
                    $email=$bk->email;
                }                
?>
<?php
include_once ("../include/header_2.php");
include_once ("../include/header1.php");
//include_once ("../include/header_5.php");
?>
<div class="art-sheet clearfix">
<div class="art-layout-wrapper">
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell art-content">
<article class="art-post art-article">
<center><h2 style="margin-right:6px;font-size:20px;font-weight: bold;">ALTERAÇÃO DA EDITORA</h2></center>
    <div class="formularioClassificacaoLivro">
        <form name="formCadastro" action="../EditoraGerenciador.php?opcao=2&idEditora" method="post">
            
            <?php foreach ($result as $bk) {?>
            <input type="hidden" name="idEditora" value="<?=$idEditora?>" readonly><br>
            <span style="margin-right:28px; margin-left:150px; font-size:18px;font-weight: bold;">Nome*: </span><input type="text" name="nome" value="<?php echo "$nome";?>" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:565px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br> 
            <span style="margin-right:20px;margin-left:150px;font-size:18px;font-weight: bold;">Cidade*: </span><input type="text" name="cidade" value="<?php echo "$cidade";?>" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:565px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            <span style="margin-right:4px;margin-left:150px;font-size:18px;font-weight: bold;">Endereco: </span><input type="text" name="endereco" value="<?php echo "$endereco";?>" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:565px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            <span style="margin-right:46px;margin-left:150px;font-size:18px;font-weight: bold;">Fone: </span><input type="text" name="fone" value="<?php echo "$fone";?>" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:200px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            <span style="margin-right:36px;margin-left:150px;font-size:18px;font-weight: bold;">Email: </span><input type="email" name="email" value="<?php echo "$email";?>" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:565px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            <center><br>
            <input type="submit" name="btAtualizar" value="Atualizar" class="art-button" style="margin-right:16px;">
            <a href="../view/editoraview.php?opcao=4"><input type="button" name="btVoltar" value="Voltar" class="art-button" style="margin-right:16px;"></a>  
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
<?php
        include "../Logar.php";
	$obj = New Logar();
	$obj->validaSession2();
        
require_once '../Database.php';
$pdo=Database::conexao();

$id=$_GET['idPrateleira']; 

                $banco = $pdo->prepare("SELECT * FROM `prateleira` WHERE `idPrateleira`='$id'");
                $banco->execute();
                $result = $banco->fetchAll(PDO::FETCH_OBJ);
                foreach ($result as $bk) {
                    $idPrateleira=$bk->idPrateleira; 
                    $setor=$bk->setor; 
                    $fileira=$bk->fileira; 
                    $capacidade=$bk->capacidade;
                    $situacao=$bk->situacao;
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
    <div class="formularioPrateleiraEdit">
        <center><h2 style="margin-right:6px;font-size:20px;font-weight: bold;">ALTERAÇÃO DA PRATELEIRA</h2></center><br>    
        <form name="formCadastro" action="../PrateleiraGerenciador.php?opcao=2&idPrateleira" method="post">
            
            <?php foreach ($result as $bk) {?>
            <input type="hidden" name="idPrateleira" value="<?php echo "$idPrateleira";?>" readonly><br>
            <span style="margin-right:58px;margin-left: 300px;font-size:18px;font-weight: bold;">Setor*:</span><input type="text" name="setor" value="<?php echo "$setor";?>" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:150px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            <span style="margin-right:45px;margin-left: 300px;font-size:18px;font-weight: bold;">Fileira*:</span><input type="text" name="fileira" value="<?php echo "$fileira";?>" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:150px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            <span style="margin-right:8px;margin-left: 300px;font-size:18px;font-weight: bold;">Capacidade:</span><input type="text" name="capacidade" value="<?php echo "$capacidade";?>" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:150px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            <span style="margin-right:35px;margin-left: 300px;font-size:18px;font-weight: bold;">Situacao:</span><input type="text" name="situacao" value="<?php echo "$situacao";?>" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:390px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br> 
            <br><br><br><center>
            <input type="submit" name="btAtualizar" value="Atualizar" class="art-button" style="margin-right:16px;"> 
            <a href="../view/prateleiraview.php?opcao=6"><input type="button" name="btVoltar" value="Voltar" class="art-button" style="margin-right:16px;"></a>
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
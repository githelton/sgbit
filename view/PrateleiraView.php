        <?php
        include "../Logar.php";
	$obj = New Logar();
	$obj->validaSession2();
        
            require_once '../Prateleira.php';
            $pr1 = new Prateleira();
            $pr1->listar();
        include_once ("../include/header_2.php");
        include_once ("../include/header1.php");
        
        //para a paginação 
        $pagina = 1;
        if(!empty($_GET['pagina'])){
            $pagina = $_GET['pagina'];
        }
        ?>    
   
<div class="art-sheet clearfix">
<div class="art-layout-wrapper">
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell art-content">
<article class="art-post art-article"> 
    <center><h2 style="margin-right:6px;font-size:20px;font-weight: bold;">GERENCIADOR DE PRATELEIRAS</h2></center>
 
        <div id="gerprateleira" name="gerprateleira" style="width:100%">
        <table style="width: 100%; border-right: 1px solid #2B572C; border-left: 1px solid #2B572C;" class="ms-simple1-main"> 
            <thead>
            <tr> 
                <td style="text-align:center;font-weight: bold;">Setor</td>
                <td style="text-align:center;font-weight: bold;">Fileira</td>
                <td style="text-align:center;font-weight: bold;">Capacidade</td>
                <td style="text-align:center;font-weight: bold;">Situação</td>
                <td style="text-align:center;font-weight: bold;">Editar</td>
                <td style="text-align:center;font-weight: bold;">Excluir</td>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($pr1->paginacao($pagina) as $bk) {
                     echo "<tr class=\"content\" style=\"margin-top:-1px; padding-bottom:10px;\">";
                ?>
                      
                <td style="text-align:center;font-weight: bold;"> <?php echo $bk->setor;?>  </td>
                <td style="text-align:center;font-weight: bold;"> <?php echo $bk->fileira;?>  </td>
                <td style="text-align:center;font-weight: bold;"> <?php echo $bk->capacidade;?>  </td>
                <td style="text-align:center;font-weight: bold;"> <?php echo $bk->situacao;?>  </td>
                <td style="text-align:center;font-weight: bold;"> <a href="../edit/PrateleiraEdit.php?opcao=6&idPrateleira=<?php echo $bk->idPrateleira; ?> "><input type="button" name="btEditar" value="Editar" class="art-button" style="margin-right:12px;"></a> </td>
                <td style="text-align:center;font-weight: bold;"> <a href="../PrateleiraGerenciador.php?opcao=0&idPrateleira=<?php echo $bk->idPrateleira; ?>" onclick="return confirm('Tem certeza dessa Exclusão?')"><input type="button" name="btExcluir" value="Excluir" class="art-button" style="margin-right:12px;"></a></td>
               
                <?php echo "</tr>"; } ?>
            </tbody>
          </table>
          
                  <br>
         <?php 
            if($pr1->pgAnterior != null){
         ?>
                  <span class="art-button-wrapper"><span class="l"> </span><span class="r"></span>
        <a href="?opcao=6&<?= $pr1->pgAnterior ?>" class="art-button" style="margin-right: 12px; zoom: 1; top: 5px;"><< Anterior</a> </span>
        <?php
            }
            if($pr1->pgProximo != null){ ?>
                  <span class="art-button-wrapper"><span class="l"> </span><span class="r"></span>
        <a href="?opcao=6&<?=$pr1->pgProximo?>" class="art-button" style="margin-right: 12px; zoom: 1; top: 5px;">Proximo >></a> </span>
        <?php } ?>
        </div>
        </br>
        <a href="../interface/prateleira.php?opcao=6"><input type="button" name="btVoltar" value="Voltar" class="art-button" style="margin-right:16px; margin-top:20px;"></a>
    <!-- -->   
         
</article>
</div>
</div>
</div>
</div>
</div>  
<?php
include_once("../include/footer.php");      
?>

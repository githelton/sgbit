    <?php
        include "../Logar.php";
	$obj = New Logar();
	$obj->validaSession2();
        
        include_once '../ClassificacaoLivro.php';
        $classLivro = new ClassificacaoLivro();
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
    <center><h2 style="margin-right:6px;font-size:20px;font-weight: bold;">GERENCIADOR DA CLASSIFICAÇÃO DOS LIVROS</h2></center>
        <div id="gerclassificacao" name="gerclassificacao" style="width:100%">
        <table style="width: 100%; border-right: 1px solid #2B572C; border-left: 1px solid #2B572C;" class="ms-simple1-main"> 
            <thead>
            <tr> 
                <td style="text-align:center;font-weight: bold;">Classificação do Livro</td>
                <td style="text-align:center;font-weight: bold;">Faixa Etária</td>
                <td style="text-align:center;font-weight: bold;">Genero</td> 
                <td style="text-align:center;font-weight: bold;">Editar</td> 
                <td style="text-align:center;font-weight: bold;">Excluir</td> 
            </tr>
            </thead>
            <tbody>    
                 <?php foreach ($classLivro->paginacao($pagina) as $bk) {
                     echo "<tr class=\"content\" style=\"margin-top:-1px; padding-bottom:10px;\">";
                 ?>
            
                <td style="text-align:justify;font-weight: bold;"> <?php echo $bk->classificacao;?>  </td>
                <td style="text-align:center;font-weight: bold;"> <?php echo $bk->faixaEtaria;?>  </td>
                <td style="text-align:justify;font-weight: bold;"> <?php echo $bk->genero;?>  </td>
                <td style="text-align:center;font-weight: bold;"> <a href="../edit/ClassificacaoLivroEdit.php?opcao=5&idClassificacaoLivro=<?php echo $bk->idClassificacaoLivro; ?> "><input type="button" name="btEditar" value="Editar" class="art-button" style="margin-right:12px;"></a> </td>
                <td style="text-align:center;font-weight: bold;"> <a href="../ClassificacaoLivroGerenciador.php?opcao=0&idClassificacaoLivro=<?php echo $bk->idClassificacaoLivro; ?>" onclick="return confirm('Tem certeza dessa Exclusão?')"><input type="button" name="btExcluir" value="Excluir" class="art-button" style="margin-right:12px;"></a></td>
               
                 <?php echo "</tr>"; } ?>
            </tbody>
          </table>
        <br>
         <?php 
            if($classLivro->pgAnterior != null){
         ?>
                  <span class="art-button-wrapper"><span class="l"> </span><span class="r"></span>
        <a href="?opcao=5&<?= $classLivro->pgAnterior ?>" class="art-button" style="margin-right: 12px; zoom: 1; top: 5px;"><< Anterior</a> </span>
        <?php
            }
            if($classLivro->pgProximo != null){ ?>
                  <span class="art-button-wrapper"><span class="l"> </span><span class="r"></span>
        <a href="?opcao=5&<?=$classLivro->pgProximo?>" class="art-button" style="margin-right: 12px; zoom: 1; top: 5px;">Proximo >></a> </span>
        <?php } ?>
        </div>
        </br>
        <a href="../interface/classificacaolivro.php?opcao=5"><input type="button" name="btVoltar" value="Voltar" class="art-button" style="margin-right:16px;"></a>
</article>
</div>
</div>
</div>
</div>
</div>  
<?php
include_once("../include/footer.php");      
?>
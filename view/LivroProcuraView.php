<?php
        include "../Logar.php";
	$obj = New Logar();
	$obj->validaSession2();
        
        require_once '../Livro.php';
        $liv1 = new Livro();
    include_once ("../include/header_2.php");
    include_once ("../include/header1.php");    
?> 
        <header><center>
        <h2>PROCURA DE LIVROS</h2>
        </center></header>
<div class="art-sheet clearfix">
<div class="art-layout-wrapper">
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell art-content">
<article class="art-post art-article">
        <table border="1"> 
            <tr>
                <td>Título</td>
                <td>Prateleira</td>
            </tr>
                 <?php foreach ($liv1->procurarLivro() as $bk) {?>                
            <tr>
                <td> <?= $bk->titulo;?>  </td>
                <td> <?= $bk->setor."-".$bk->fileira;?> </td>                            
            </tr> 
                <?php } ?>  
        </table> 
        <a href="../interface/livro.php?opcao=8"><input type="button" name="btVoltar" value="Voltar" class="art-button" style="margin-right:16px;"></a>
</article>
</div>
</div>
</div>
</div>
</div>  
<?php
include_once("../include/footer.php");      
?>       
                
        
        
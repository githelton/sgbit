        <?php
        include "../Logar.php";
	$obj = New Logar();
	$obj->validaSession2();
        
            require_once '../Livro.php';
            $liv1 = new Livro();
            
        include_once ("../include/header_2.php");
        include_once ("../include/header1.php");  
        //$pg = new paginacao();
        ?> 
<div class="art-sheet clearfix">
<div class="art-layout-wrapper">
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell art-content">
<article class="art-post art-article"> 
    <div class="formularioLocacao"> 
        <center><h2>GERENCIADOR DE LIVROS</h2></center>

    <form method="get" action="LivroView.php">
	    <div class="busca">
             </br> </br>
             <span style="margin-right:12px;font-size:18px;font-weight: bold;">Buscar Livro:</span><input type="text" name="busca" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:670px; border-color: #2B572C; border-style:solid; font-size:18px; margin-right:12px;" value=""/><input class="art-button" style="margin-right:16px; margin-top:20px;" value="Busca" name="button" type="submit"/>
             </br> </br>
		<!-- -->  

        <div id="gerlivros" name="gerlivros" style="width:100%">
            <table style="width: 100%; border-right: 1px solid #2B572C; border-left: 1px solid #2B572C;" class="ms-simple1-main"> 
            <tr>
                <td style="text-align:center;">Título</td>
                <td style="text-align:center;">Ano</td>
                <td style="text-align:center;">Resumo</td>
                <!--<td style="text-align:center;">Observação</td>-->
                <td style="text-align:center;">Edição</td>
                <td style="text-align:center;">Volume</td>
                <td style="text-align:center;">Exemplares</td>
                <td style="text-align:center;">Prateleira</td>
                <td style="text-align:center;">Classificação</td>
                <td style="text-align:center;">Autor</td>
                <td style="text-align:center;">Editora</td>
                <td style="text-align:center;">Editar</td>
                <td style="text-align:center;">Excluir</td>
            </tr>
            <?php
            foreach ($liv1->listar() as $bk){  
                echo "<tr class=\"content\" style=\"margin-top:-1px; padding-bottom:10px;\">";
            ?>  
                  <td> <?= $bk->titulo;?>  </td>
                  <td> <?= $bk->ano;?>  </td>
                  <td> <?= $bk->resumo;?>  </td>
                  <!--<td> <?// $bk->observacao;?>  </td>-->
                  <td> <?= $bk->edicao;?>  </td>
                  <td> <?= $bk->volume;?>  </td>
                  <td> <?= $bk->numExemplar;?>  </td>
                  <td> <?= $bk->setor.$bk->fileira;?> </td>             
                  <td> <?= $bk->classificacao;?>  </td>
                  <td> <?= $bk->autor;?>  </td>
                  <td> <?= $bk->editora;?>  </td>
                  <td> <a href="../edit/LivroEdit.php?opcao=8&idLivro=<?php echo $bk->idLivro; ?> "><input type="submit" name="btEditar" value="Editar" class="art-button" style="margin-right:12px;"></a> </td>
                  <td> <a href="../LivroGerenciador.php?opcao=0&idLivro=<?php echo $bk->idLivro; ?>" onclick="return confirm('Tem certeza dessa Exclusão?')"><input type="submit" name="btExcluir" value="Excluir" class="art-button" style="margin-right:12px;"></a></td>
          <?php 
            echo "</tr>";  
            } 
          echo "</table>";
          echo "<div class=\"page_navigation\" style=\"margin-top:-15px;\"></div>";
          ?>        
        </div>
        </br>
        <a href="../interface/livro.php?opcao=8"><input type="button" name="btVoltar" value="Voltar" class="art-button" style="margin-right:16px; margin-top:20px;"></a>
    <!-- -->   
    </div>	
</form>  
         
</article>
</div>
</div>
</div>
</div>
</div>  
<?php
include_once("../include/footer.php");      
?>

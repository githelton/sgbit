        <?php
        include "../Logar.php";
	$obj = New Logar();
	$obj->validaSession2();
        
            require_once '../Livro.php';
            $liv1 = new Livro();
            
        include_once ("../include/header_2.php");
        include_once ("../include/header1.php");  
        
        //para a paginação
        $pagina = 1;
        if(!empty($_GET['pagina'])){
            $pagina = $_GET['pagina'];
        }
        ?> 
<div class="art-sheet clearfix" style="width: 1150px;">
<div class="art-layout-wrapper">
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell art-content">
<article class="art-post art-article"> 
    <div class="formularioLocacao"> 
        <center><h2 style="margin-right:6px;font-size:20px;font-weight: bold;">GERENCIADOR DE LIVROS</h2></center>
<script>
    $(function(){
       $("#campo-busca").keyup(function(){
        //pegando todas as linhas atuais na table   
        var linhas = $("tbody tr");
        var campos = $(".titulo");
        var texto = $(this).val().toUpperCase();
        linhas.show();
        campos.each(function(index){
            if($(campos[index]).text().toUpperCase().indexOf(texto) < 0){
                $(linhas[index]).hide();
            }
        });           
       });
    });
</script>
    <form method="get" action="LivroView.php">
	    <div class="busca">
             </br>
             <span style="margin-right:30px;margin-left: 100px;font-size:18px;font-weight: bold;">Procurar Livro:</span><input type="text" placeholder=" Digite aqui para Encontrar o Livro" name="busca" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:670px; border-color: #2B572C; border-style:solid; font-size:18px; margin-right:12px;" id="campo-busca"/>
             </br> </br>
        <div id="gerlivros" name="gerlivros" style="width:100%">
            <table style="width: 100%; border-right: 1px solid #2B572C; border-left: 1px solid #2B572C;" class="ms-simple1-main"> 
                <thead>
                    <tr>
                        <td style="text-align:center;font-weight: bold;">Título</td>
                        <td style="text-align:center;font-weight: bold;">Ano</td>
                        <td style="text-align:center;font-weight: bold;">Resumo</td>
                        <td style="text-align:center;font-weight: bold;">Edição</td>
                        <td style="text-align:center;font-weight: bold;">Volume</td>
                        <td style="text-align:center;font-weight: bold;">Exemplares</td>
                        <td style="text-align:center;font-weight: bold;">Prateleira</td>
                        <td style="text-align:center;font-weight: bold;">Classificação</td>
                        <td style="text-align:center;font-weight: bold;">Autor</td>
                        <td style="text-align:center;font-weight: bold;">Editora</td>
                        <td style="text-align:center;font-weight: bold;">Editar</td>
                        <td style="text-align:center;font-weight: bold;">Excluir</td>
                    </tr>
                </thead>
                <tbody>
            <?php
            foreach ($liv1->paginacao($pagina) as $bk){  
                echo "<tr class=\"content\" style=\"margin-top:-1px; padding-bottom:10px;\">";
            ?>  
                  <td style="text-align:justify;font-weight: bold;" class="titulo"> <?= $bk->titulo;?>  </td>
                  <td style="text-align:center;font-weight: bold;"> <?= $bk->ano;?>  </td>
                  <td style="text-align:center;font-weight: bold;"> <?= $bk->resumo;?>  </td>
                  <td style="text-align:center;font-weight: bold;"> <?= $bk->edicao;?>  </td>
                  <td style="text-align:center;font-weight: bold;"> <?= $bk->volume;?>  </td>
                  <td style="text-align:center;font-weight: bold;"> <?= $bk->numExemplar;?>  </td>
                  <td style="text-align:center;font-weight: bold;"> <?= $bk->setor.$bk->fileira;?> </td>             
                  <td style="text-align:center;font-weight: bold;"> <?= $bk->classificacao;?>  </td>
                  <td style="text-align:center;font-weight: bold;"> <?= $bk->autor;?>  </td>
                  <td style="text-align:center;font-weight: bold;"> <?= $bk->editora;?>  </td>
                  <td> <a href="../edit/LivroEdit.php?opcao=8&idLivro=<?php echo $bk->idLivro; ?> "><input type="button" name="btEditar" value="Editar" class="art-button" style="margin-right:12px;"></a> </td>
                  <td> <a href="../LivroGerenciador.php?opcao=0&idLivro=<?php echo $bk->idLivro; ?>" onclick="return confirm('Tem certeza dessa Exclusão?')"><input type="button" name="btExcluir" value="Excluir" class="art-button" style="margin-right:12px;"></a></td>
            <?php 
            echo "</tr>";  
            }?>
            </tbody>
          </table>
          
                  <br>
         <?php 
            if($liv1->pgAnterior != null){
         ?> 
                <span class="art-button-wrapper"><span class="l"> </span><span class="r"></span>
                <a href="?opcao=8&<?=$liv1->pgAnterior?>" class="art-button" style="margin-right: 12px; zoom: 1; top: 5px;"><< Anterior</a> </span>
        <?php
            }
            if($liv1->pgProximo != null){ ?>
                  <span class="art-button-wrapper"><span class="l"> </span><span class="r"></span>
        <a href="?opcao=8&<?=$liv1->pgProximo?>" class="art-button" style="margin-right: 12px; zoom: 1; top: 5px;">Proximo >></a> </span>
        <?php } ?>
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

 <?php
        include "../Logar.php";
	$obj = New Logar();
	$obj->validaSession2();
        
            require_once '../Locacao.php';
            $loc1 = new Locacao();
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
    <center><h2 style="margin-right:6px;font-size:20px;font-weight: bold;">GERENCIADOR DE LIVROS EMPRESTADOS</h2></center>
    
    <script>
    $(function(){
       $("#campo-busca").keyup(function(){
        //pegando todas as linhas atuais na table   
        var linhas = $("tbody tr");
        var campos = $(".aluno");
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
    
    <form method="get" action="LocacaoView.php">
	    <div class="busca">
             </br> </br>
             <span style="margin-right:12px;margin-left: 100px;font-size:18px;font-weight: bold;">Procurar Aluno:</span><input type="text" placeholder=" Digite aqui para Encontrar a locação do Aluno" name="busca" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:670px; border-color: #2B572C; border-style:solid; font-size:18px; margin-right:12px;" id="campo-busca"/>
             </br> </br>
    <div id="gerlivros" name="gerlivros" style="width:100%">
        <table style="width: 100%; border-right: 1px solid #2B572C; border-left: 1px solid #2B572C;" class="ms-simple1-main">
            <thead>
                <tr>
                    <td style="text-align:center;font-weight: bold;">Livro</td>
                    <td style="text-align:center;font-weight: bold;">Aluno</td>
                    <td style="text-align:center;font-weight: bold;">Usuário</td>
                    <td style="text-align:center;font-weight: bold;">Data de Locação</td>
                    <td style="text-align:center;font-weight: bold;">Data de Devolução</td>
<!--                    <td style="text-align:center;">Observação</td>-->
                    <td style="text-align:center;font-weight: bold;">Situação</td>
                    <td style="text-align:center;font-weight: bold;">Editar</td>
                    <td style="text-align:center;font-weight: bold;">Devolver</td>
                    <td style="text-align:center;font-weight: bold;">Renovar</td>
    <!--                <td>Excluir</td>-->
                </tr>
            </thead>
        <tbody>    
            <?php
            foreach ($loc1->paginacao($pagina) as $bk){  
                echo "<tr class=\"content\" style=\"margin-top:-1px; padding-bottom:10px;\">";
            ?>  
                <td style="text-align:justify;font-weight: bold;"> <?= $bk->titulo;?>  </td>
                <td style="text-align:justify;font-weight: bold;" class="aluno"> <?= $bk->aluno; ?>  </td>
                <td style="text-align:center;font-weight: bold;"> <?= $bk->usuario;?>  </td>
                <td style="text-align:center;font-weight: bold;"> <?= $loc1->convertData($bk->dataHoraLocacao); ?>  </td>
                <td style="text-align:center;font-weight: bold;"> <?= $loc1->convertData($bk->dataHoraDevolucao); ?>  </td>
<!--                <td> <? $bk->observacao;?>  </td>-->
                <td style="text-align:center;font-weight: bold;"> <?= $bk->pendencia;?>  </td>          
                <td> <a href="../edit/LocacaoEdit.php?opcao=1&idLocacao=<?php echo $bk->idLocacao; ?> "><input type="button" name="btEditar" value="Editar" class="art-button" style="margin-right:12px;"></a> </td>
                <td> <a href="../LocacaoGerenciador.php?opcao=5&idLocacao=<?php echo $bk->idLocacao; ?> "><input type="button" name="btDevolver" value="Devolver" class="art-button" style="margin-right:12px;"></a> </td>
                <td> <a href="../LocacaoGerenciador.php?opcao=6&idLocacao=<?php echo $bk->idLocacao; ?>&aluno=<?php echo $bk->aluno; ?> "><input type="button" name="btRenovar" value="Renovar" class="art-button" style="margin-right:12px;"></a> </td>
<!--                <td> <a href="../LocacaoGerenciador.php?opcao=0&idLocacao=<?ph echo $bk->idLocacao; ?>" onclick="return confirm('Tem certeza dessa Exclusão?')"><input type="submit" name="btExcluir" value="Excluir"></a></td>-->
            <?php 
            echo "</tr>";  
            }?>
            <tbody>
          </table>
          
    <br>
         <?php 
            if($loc1->pgAnterior != null){
         ?>
                  <span class="art-button-wrapper"><span class="l"> </span><span class="r"></span>
        <a href="?opcao=1&<?=$loc1->pgAnterior?>" class="art-button" style="margin-right: 12px; zoom: 1; top: 5px;"><< Anterior</a> </span>
        <?php
            }
            if($loc1->pgProximo != null){ ?>
                  <span class="art-button-wrapper"><span class="l"> </span><span class="r"></span>
        <a href="?opcao=1&<?=$loc1->pgProximo?>" class="art-button" style="margin-right: 12px; zoom: 1; top: 5px;">Proximo >></a> </span>
        <?php } ?>
        </div>
        </br>
        <a href="../interface/locacao.php?opcao=1"><input type="button" name="btVoltar" value="Voltar" class="art-button" style="margin-right:16px; margin-top:20px;"></a>
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

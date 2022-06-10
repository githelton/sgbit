<?php
        include "../Logar.php";
	$obj = New Logar();
	$obj->validaSession2();
        
        require_once '../Locacao.php';
        $loc2 = new Locacao();
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
<center><h2 style="margin-right:6px;font-size:20px;font-weight: bold;"> RAKING DE ALUNOS QUE MAIS EMPRESTAM LIVROS</h2></center>
    
<script>
    $(function(){
       $("#campo-busca").keyup(function(){
        //pegando todas as linhas atuais na table   
        var linhas = $("tbody tr");
        var campos = $(".nome");
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
    <form method="get" action="RankingView.php">
	    <div class="busca">
            </br>
            <span style="margin-right:4px; margin-left: 40px;font-size:18px;font-weight: bold;">Procurar Aluno:</span><input type="text" name="busca" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:670px; border-color: #2B572C; border-style:solid; font-size:18px; margin-right:12px;" id="campo-busca"/>
            </br> </br>
        <div id="geralunos" name="gerranking" style="width:100%">
        <table style="width: 100%; border-right: 1px solid #2B572C; border-left: 1px solid #2B572C;" class="ms-simple1-main"> 
            <thead>
            <tr>
                <td style="text-align:center;font-weight: bold;">Ranking</td>
                <td style="text-align:center;font-weight: bold;">Aluno</td>
                <td style="text-align:center;font-weight: bold;">Serie</td>
                <td style="text-align:center;font-weight: bold;">Turno</td>
                <td style="text-align:center;font-weight: bold;">Pontuação</td>
            </tr>
            <tbody>
                <?php foreach ($loc2->ranking($pagina) as $key=>$bk2){ 
                    echo "<tr class=\"content\" style=\"margin-top:-1px; padding-bottom:10px;\">";
                ?>                
                <td style="text-align:center;font-weight: bold;"> <?=$key + 1 + $loc2->rank;?>º</td>
                <td style="text-align:justify;font-weight: bold;" class="nome"> <?=$bk2->nome;?>  </td>
                <td style="text-align:center;font-weight: bold;"> <?=$bk2->serie;?>  </td>
                <td style="text-align:center;font-weight: bold;"> <?=$bk2->turno;?>  </td>
                <td style="text-align:center;font-weight: bold;"> <?=$bk2->Ranking;?>  </td>
   
                <?php echo "</tr>"; } ?>
            </tbody>
        </table>
            <br>
         <?php 
            if($loc2->pgAnterior != null){
         ?>
                  <span class="art-button-wrapper"><span class="l"> </span><span class="r"></span>
        <a href="?opcao=1<?= $loc2->pgAnterior ?>" class="art-button" style="margin-right: 12px; zoom: 1; top: 5px;"><< Anterior</a> </span>
        <?php
            }
            if($loc2->pgProximo != null){ ?>
                  <span class="art-button-wrapper"><span class="l"> </span><span class="r"></span>
        <a href="?opcao=1&<?=$loc2->pgProximo?>" class="art-button" style="margin-right: 12px; zoom: 1; top: 5px;">Proximo >></a> </span>
        <?php } ?>
        </br>
        <a href="../interface/Locacao.php?opcao=1"><input type="button" name="btVoltar" value="Voltar" class="art-button" style="margin-right:16px;"></a>
       
</article>
</div>
</div>
</div>
</div>
</div>  
<?php
include_once("../include/footer.php");      
?>
    <?php
        include "../Logar.php";
	$obj = New Logar();
	$obj->validaSession2();
        
            require_once '../Autor.php';           
            $au1 = new Autor();
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
    <center><h2 style="margin-right:6px;font-size:20px;font-weight: bold;">GERENCIADOR DE AUTORES</h2></center>
    
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
</script>
    <form method="get" action="LivroView.php">
	    <div class="busca">
             </br> </br>
             <span style="margin-right:12px;margin-left: 60px; font-size:18px;font-weight: bold;">Procurar Autor:</span><input placeholder=" Digite aqui para Encontrar o Autor" type="text" name="busca" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:670px; border-color: #2B572C; border-style:solid; font-size:18px; margin-right:12px;" id="campo-busca"/>
             </br> </br>           
        <div id="gerautor" name="gerautor" style="width:100%">
        <table style="width: 100%; border-right: 1px solid #2B572C; border-left: 1px solid #2B572C; border-radius: 10px 10px;" class="ms-simple1-main"> 
            <thead>
            <tr>
                <td style="text-align:center;font-weight: bold;">Nome</td>
                <td style="text-align:center;font-weight: bold;">Editar</td>
                <td style="text-align:center;font-weight: bold;">Excluir</td>
            </tr>
            </thead>
            <tbody style="border-radius: 10px;">
                <?php foreach ($au1->paginacao($pagina) as $bk) {
                    echo "<tr class=\"content\" style=\"margin-top:-1px; padding-bottom:10px;\">";
                ?>
            
            <td style="font-weight: bold;" class="nome"> <?php echo $bk->nome;?>  </td>
                <td style="text-align:center;"> <a href="../edit/AutorEdit.php?opcao=3&idAutor=<?php echo $bk->idAutor; ?> "><input type="button" name="btEditar" value="Editar" class="art-button" style="margin-right:12px;"></a> </td>
                <td style="text-align:center;"> <a href="../AutorGerenciador.php?opcao=0&idAutor=<?php echo $bk->idAutor; ?>" onclick="return confirm('Tem certeza dessa Exclusão?')"><input type="button" name="btExcluir" value="Excluir" class="art-button" style="margin-right:12px;"></a></td>
                
                 <?php echo "</tr>"; } ?>
        </tbody>
        </table>
          
                  <br>
         <?php 
            if($au1->pgAnterior != null){
         ?>
                  <span class="art-button-wrapper"><span class="l"> </span><span class="r"></span>
        <a href="?opcao=3&<?= $au1->pgAnterior ?>" class="art-button" style="margin-right: 12px; zoom: 1; top: 5px;"><< Anterior</a> </span>
        <?php
            }
            if($au1->pgProximo != null){ ?>
                  <span class="art-button-wrapper"><span class="l"> </span><span class="r"></span>
        <a href="?opcao=3&<?=$au1->pgProximo?>" class="art-button" style="margin-right: 12px; zoom: 1; top: 5px;">Proximo >></a> </span>
        <?php } ?>
        </div>
        </br>
             <a href="../interface/autor.php?opcao=3"><input type="button" name="btVoltar" value="Voltar" class="art-button" style="margin-right:16px;"></a> 
</article>
</div>
</div>
</div>
</div>
</div>  
<?php
include_once("../include/footer.php");      
?>

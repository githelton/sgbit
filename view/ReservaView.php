        <?php
        include "../Logar.php";
	$obj = New Logar();
	$obj->validaSession2();
        
            require_once '../Reserva.php';
            $res1 = new Reserva(); 
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
<div class="art-sheet clearfix">
<div class="art-layout-wrapper">
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell art-content">
<article class="art-post art-article"> 
    
    <center><h2 style="margin-right:6px;font-size:20px;font-weight: bold;">GERENCIADOR DE LIVROS RESERVADOS</h2></center>
    
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
    
    <form method="get" action="ReservaView.php">
	    <div class="busca">
             </br> </br>
             <span style="margin-right:12px;margin-left: 60px;font-size:18px;font-weight: bold;">Procurar Aluno:</span><input type="text" placeholder=" Digite aqui para Encontrar a Reserva do Aluno" name="busca" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:670px; border-color: #2B572C; border-style:solid; font-size:18px; margin-right:12px;" id="campo-busca"/>
             </br> </br>
        <div id="gereserva" name="gereserva" style="width:100%">
        <table style="width: 100%; border-right: 1px solid #2B572C; border-left: 1px solid #2B572C;" class="ms-simple1-main">
            <thead>
            <tr>
                <td style="text-align:center;font-weight: bold;">Livro</td>
                <td style="text-align:center;font-weight: bold;">Aluno</td>
                <td style="text-align:center;font-weight: bold;">Usuário</td>
                <td style="text-align:center;font-weight: bold;">Data da Reserva</td>
                <td style="text-align:center;font-weight: bold;">Editar</td>
                <td style="text-align:center;font-weight: bold;">Locar</td>
                <td style="text-align:center;font-weight: bold;">Cancelar</td>
            </tr>
            </thead>
        <tbody>
            <?php
            foreach ($res1->paginacao($pagina) as $bk){  
                echo "<tr class=\"content\" style=\"margin-top:-1px; padding-bottom:10px;\">";
            ?>
                <td style="text-align:justify;font-weight: bold;" > <?=$bk->titulo;?>  </td>
                <td style="text-align:justify;font-weight: bold;" class="aluno"> <?= $bk->aluno; ?>  </td>
                <td style="text-align:center;font-weight: bold;"> <?=$bk->usuario;?>  </td>
                <td style="text-align:center;font-weight: bold;"> <?= $res1->convertData($bk->dataHoraReserva);?>  </td>
                <td style="text-align:center;font-weight: bold;"> <a href="../edit/ReservaEdit.php?opcao=7&idReserva=<?php echo $bk->idReserva; ?> "><input type="button" name="btEditar" value="Editar" class="art-button" style="margin-right:12px;"></a> </td>
                <td style="text-align:center;font-weight: bold;"> <a href="../interface/Locacao.php?opcao=2&idReserva=<?php echo $bk->idReserva; ?> "><input type="button" name="btLocar" value="Locar" class="art-button" style="margin-right:12px;"></a> </td>
                <td style="text-align:center;font-weight: bold;"> <a href="../ReservaGerenciador.php?opcao=0&idReserva=<?php echo $bk->idReserva; ?>" onclick="return confirm('Tem certeza dessa Exclusão?')"><input type="button" name="btCancelar" value="Cancelar" class="art-button" style="margin-right:12px;"></a></td>
            <?php 
            echo "</tr>";  
            }?>
            <tbody>
          </table>
        <?php 
            if($res1->pgAnterior != null){
         ?>
                  <span class="art-button-wrapper"><span class="l"> </span><span class="r"></span>
        <a href="?opcao=7&<?=$res1->pgAnterior?>" class="art-button" style="margin-right: 12px; zoom: 1; top: 5px;"><< Anterior</a> </span>
        <?php
            }
            if($res1->pgProximo != null){ ?>
                  <span class="art-button-wrapper"><span class="l"> </span><span class="r"></span>
        <a href="?opcao=7&<?=$res1->pgProximo?>" class="art-button" style="margin-right: 12px; zoom: 1; top: 5px;">Proximo >></a> </span>
        <?php } ?>
        </div>
        </br>
  
    <!-- -->   
        </div>
        </br>    
        <a href="../interface/reserva.php?opcao=7"><input type="button" name="btVoltar" value="Voltar" class="art-button" style="margin-right:16px;"></a>	
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
<?php
        include "../Logar.php";
	$obj = New Logar();
	$obj->validaSession2();
        
            require_once '../Aluno.php';
            $al1 = new Aluno();
            $al1->listar();
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
    <center><h2 style="margin-right:6px;font-size:20px;font-weight: bold;">GERENCIADOR DE ALUNOS</h2></center>
    
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
    <form method="get" action="AlunoView.php">
	    <div class="busca">
             </br> </br>
             <span style="margin-right:12px;margin-left: 60px;font-size:18px;font-weight: bold;">Procurar Aluno:</span><input type="text" placeholder=" Digite aqui para Encontrar o Aluno" name="busca" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:670px; border-color: #2B572C; border-style:solid; font-size:18px; margin-right:12px;" id="campo-busca"/>
             </br> </br>
        <div id="geralunos" name="geralunos" style="width:100%">
        <table style="width: 100%; border-right: 1px solid #2B572C; border-left: 1px solid #2B572C;" class="ms-simple1-main"> 
            <thead>
            <tr> 
<!--                <td style="text-align:center;">CPF</td>-->
                <td style="text-align:center;font-weight: bold;">Nome</td>
                <td style="text-align:center;font-weight: bold;">Nascimento</td>
<!--                <td style="text-align:center;font-weight: bold;">Sexo</td>-->
                <td style="text-align:center;font-weight: bold;">Endereco</td>
                <td style="text-align:center;font-weight: bold;">Fone</td>
<!--                <td>Email</td>-->
                <td style="text-align:center;font-weight: bold;">Serie</td>
                <td style="text-align:center;font-weight: bold;">Turma</td>
                <td style="text-align:center;font-weight: bold;">Turno</td>
                <td style="text-align:center;font-weight: bold;">Situacao</td>
                <td style="text-align:center;font-weight: bold;">Editar</td>
                <td style="text-align:center;font-weight: bold;">Excluir</td>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($al1->paginacao($pagina) as $bk) {
                   echo "<tr class=\"content\" style=\"margin-top:-1px; padding-bottom:10px;\">";  
                ?>
<!--                <td style="text-align:center;"> <?ph echo $bk->cpf;?>  </td>-->
                <td style="text-align:justify;font-weight: bold;" class="nome"> <?php echo $bk->nome;?>  </td>
                <td style="text-align:center;font-weight: bold;"> <?php echo $al1->convertData($bk->nascimento);?>  </td>
<!--                <td style="text-align:center;"> <?ph echo $bk->sexo;?>  </td>-->
                <td style="text-align:justify;font-weight: bold;"> <?php echo $bk->endereco;?>  </td>
                <td style="text-align:center;font-weight: bold;"> <?php echo $bk->fone;?>  </td>
<!--                <td> <?ph echo $bk->email;?>  </td>-->
                <td style="text-align:center;font-weight: bold;"> <?php echo $bk->serie;?>  </td>
                <td style="text-align:center;font-weight: bold;"> <?php echo $bk->turma;?>  </td>
                <td style="text-align:center;font-weight: bold;"> <?php echo $bk->turno;?>  </td>
                <td style="text-align:center;font-weight: bold;"> <?php echo $bk->situacao;?>  </td>
                <td style="text-align:center;font-weight: bold;"> <a href="../edit/AlunoEdit.php?opcao=2&idAluno=<?php echo $bk->idAluno; ?> "><input type="button" name="btEditar" value="Editar" class="art-button" style="margin-right:12px;"></a> </td>
                <td style="text-align:center;font-weight: bold;"> <a href="../AlunoGerenciador.php?opcao=0&idAluno=<?php echo $bk->idAluno; ?>" onclick="return confirm('Tem certeza dessa Exclusão?')"><input type="button" name="btExcluir" value="Excluir" class="art-button" style="margin-right:12px;"></a></td>           
                 <?php echo "</tr>";} ?>
            </tbody>
        </table>
            <br>
         <?php 
            if($al1->pgAnterior != null){
         ?>
                  <span class="art-button-wrapper"><span class="l"> </span><span class="r"></span>
        <a href="?opcao=2<?= $al1->pgAnterior ?>" class="art-button" style="margin-right: 12px; zoom: 1; top: 5px;"><< Anterior</a> </span>
        <?php
            }
            if($al1->pgProximo != null){ ?>
                  <span class="art-button-wrapper"><span class="l"> </span><span class="r"></span>
        <a href="?opcao=2&<?=$al1->pgProximo?>" class="art-button" style="margin-right: 12px; zoom: 1; top: 5px;">Proximo >></a> </span>
        <?php } ?>
        </br>
        <a href="../interface/aluno.php?opcao=2"><input type="button" name="btVoltar" value="Voltar" class="art-button" style="margin-right:16px;"></a>
</div>
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
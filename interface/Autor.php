<?php
        include "../Logar.php";
	$obj = New Logar();
	$obj->validaSession2();
        
include_once ("../include/header_2.php");
include_once ("../include/header1.php");
?>
<div class="art-sheet clearfix" style="width: 1000px; margin-bottom: 100px;">
<div class="art-layout-wrapper">
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell art-content">
<article class="art-post art-article"> 
    <center><h2 style="margin-right:6px;font-size:20px;font-weight: bold;">CADASTRO DO AUTOR(ES)</h2></center><br>
    <div class="formularioAutor">
        <form name="formCadastro" action="../AutorGerenciador.php?opcao=3" method="post">
            <br><br><br><br><br>
            <span style="margin-left:230px;font-size:18px;font-weight: bold;">Nome(s)*:</span><input type="text" name="nome" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:400px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br> </br> 
            <center><br><br><br><br><br><br><br><br>
            <input type="submit" name="btCadastrar" value="Cadastrar" class="art-button" style="margin-right:16px;">     
            <a href="../view/autorview.php?opcao=3"><input type="button" name="btListar" value="Gerenciar" class="art-button" style="margin-right:16px;"></a>
            <a href="../home.php"><input type="button" name="btVoltar" value="Voltar" class="art-button" style="margin-right:16px;"></a>  
            </center>    
        </form>    
    </div>  
     
</article>
</div>
</div>
</div>
</div>
</div>  
<?php
include_once("../include/footer.php");      
?>


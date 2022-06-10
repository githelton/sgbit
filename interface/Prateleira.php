<?php
        include "../Logar.php";
	$obj = New Logar();
	$obj->validaSession2();
        
include_once ("../include/header_2.php");
include_once ("../include/header1.php");
?>
<div class="art-sheet clearfix">
<div class="art-layout-wrapper">
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell art-content">
<article class="art-post art-article">  
    <center><h2 style="margin-right:6px;font-size:20px;font-weight: bold;">CADASTRO DA PRATELEIRA</h2></center><br><br>
    <div class="formularioPrateleira">
        <form name="formCadastro" action="../PrateleiraGerenciador.php?opcao=3" method="post">         
            <span style="margin-right:36px;margin-left: 300px;font-size:18px;font-weight: bold;">Setor:</span><input type="text" name="setor" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:150px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            <span style="margin-right:26px;margin-left: 300px;font-size:18px;font-weight: bold;">Fileira:</span><input type="text" name="fileira" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:150px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>         
            <span style="margin-right:26px;margin-left: 300px;font-size:18px;font-weight: bold;">Capacidade:</span><input type="number" min="1" name="capacidade" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:105px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            <span style="margin-right:6px;margin-left: 300px;font-size:18px;font-weight: bold;">Situacao:</span><input type="text" name="situacao" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:290px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>          
            <br><br><center>
            <input type="submit" name="btCadastrar" value="Cadastrar" class="art-button" style="margin-right:16px;">
            <a href="../view/prateleiraview.php?opcao=6"><input type="button" name="btGerenciar" value="Gerenciar" class="art-button" style="margin-right:16px;"></a>
            <input type="reset" name="btResetar" value="Resetar" class="art-button" style="margin-right:16px;">   
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
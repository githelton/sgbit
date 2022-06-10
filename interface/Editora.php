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
    <center><h2 style="margin-right:6px;font-size:20px;font-weight: bold;">CADASTRO DA EDITORA</h2></center><br>
    <div class="formularioEditora">
        <form name="formCadastro" action="../EditoraGerenciador.php?opcao=3" method="post">  
            <center>
            <span style="margin-right:28px;font-size:18px;font-weight: bold;">Nome*: </span><input type="text" name="nome" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:565px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            <span style="margin-right:20px;font-size:18px;font-weight: bold;">Cidade*: </span><input type="text" name="cidade" required  class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:565px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            <span style="margin-right:4px;font-size:18px;font-weight: bold;">Endereco: </span><input type="text" name="endereco" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:565px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            </center>
            <span style="margin-left:150px;font-size:18px;font-weight: bold;">Fone: </span><input type="text" id="fone" name="fone" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:180px; border-color: #2B572C; border-style:solid; font-size: 18px; margin-left: 46px;"></br></br>
            <center>
            <span style="margin-right:36px;font-size:18px;font-weight: bold;">Email: </span><input type="email" name="email" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:565px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            <br><br>
            <input type="submit" name="btCadastrar" value="Cadastrar" class="art-button" style="margin-right:16px;">
            <a href="../view/editoraview.php?opcao=4"><input type="button" name="btListar" value="Gerenciar" class="art-button" style="margin-right:16px;"></a>
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

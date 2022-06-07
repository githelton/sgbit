<?php
    if($_POST){
        include "Logar.php";
        $ob = New Logar();
        $ob->validar($_POST['cpf'],$_POST['senha']);
    }
    include_once ("include/header.php");
 ?>
<nav class="art-nav">
    <div class="art-nav-inner">
        <ul class="art-hmenu"></ul> </div>
</nav>
<div class="art-sheet clearfix">
<div class="art-layout-wrapper">
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell art-content">
<article class="art-post art-article">
       <br><br><center><h2 style="margin-right:6px;font-size:26px;font-weight: bold;">LOGIN DE ACESSO</h2></center> <br><br><br><br><br>                                 
<div class="formularioUsuario"> <center>  

        <form name="formCadastro" action="" method="post">
            
            <span style="margin-right:6px;font-size:20px;font-weight: bold;">LOGIN: </span><input type="text" maxlength="11" name="cpf" placeholder="Digite o CPF" required   onblur="Verifica_CPF('cpf')" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="border-radius: 10px; width:220px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>  
            <span style="margin-right:2px;font-size:20px;font-weight: bold;">SENHA: </span><input type="password" placeholder="Digite a Senha" name="senha" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:220px; border-color: #2B572C; border-radius: 10px; border-style:solid; font-size: 18px;"></br></br>
            <br><br> 
            <input type="submit" name="btLogar" value="Logar" class="art-button" style="margin-right:16px;">
        </form>  </center>  
            
    </div>

</article>
</div>
</div>
</div>
</div>
</div>   
<?php
include_once("include/footer.php");      
?>

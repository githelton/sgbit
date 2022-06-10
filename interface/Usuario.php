<?php
        include "../Logar.php";
	$obj = New Logar();
	$obj->validaSession2();
        
        require_once '../Usuario.php';       
        $us1 = new Usuario();
         
?>
<?php
include_once ("../include/header_2.php");
include_once ("../include/header1.php");
//include_once ("../include/header_12.php");
?>
<div class="art-sheet clearfix">
<div class="art-layout-wrapper">
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell art-content">
<article class="art-post art-article">  
    <center><h2 style="margin-right:6px;font-size:20px;font-weight: bold;">CADASTRO DO USUÁRIO</h2></center><br>
    <div class="formularioUsuario">
        <form name="formCadastro" action="../UsuarioGerenciador.php?opcao=3" method="post">
            <span style="margin-right:49px; margin-left: 150px;font-size:18px;font-weight: bold;">CPF*:</span><input type="text" id="cpf" required name="cpf" onblur="Verifica_CPF('cpf')"  class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:220px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            <span style="margin-right:31px;margin-left: 150px;font-size:18px;font-weight: bold;">Nome*:</span><input type="text" name="nome" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:525px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>  
            <span style="margin-right:26px;margin-left: 150px;font-size:18px;font-weight: bold;">Senha*:</span><input type="password" name="senha" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:220px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br> 
            <span style="margin-right:16px;margin-left: 150px;font-size:18px;font-weight: bold;">Data de Nasc.:*</span><input type="date" name="nascimento" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:167px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>   
<!--            <div class="sexo">
             <span style="margin-right:6px;font-size:18px;font-weight: bold;">Sexo</span><br><br> 
                <input type="radio" name="sexo" value="M" checked><label for="M" style="font-size:18px;">Masculino</label>
                <input type="radio" name="sexo" value="F"><label for="F" style="font-size:18px;">Feminino</label>
            </div><br> -->
            <fieldset id="sexo" style="margin-right: 195px; margin-left: 150px; border-color: white; "><legend style="margin-right:6px;font-size:20px;font-weight: bold;">Sexo</legend>
                <input style="margin-left: 10px;" value="M" type="radio" name="sexo" id="sexo" checked/> <label for="M" style="margin-right:10px;font-size:18px;font-weight: bold;"> Masculino</label><br/>
                <input style="margin-left: 10px;" value="F" type="radio" name="sexo" id="sexo" /><label for="F" style="margin-right:10px; font-size:18px;font-weight: bold;"> Feminino</label>
            </fieldset>	<br>
            <span style="margin-right:5px;margin-left: 150px;font-size:18px;font-weight: bold;">Endereço:</span><input type="text" name="endereco" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:530px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            <span style="margin-right:36px;margin-left: 150px;font-size:18px;font-weight: bold;">Fone*:</span><input type="text" id="fone" name="fone" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:225px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            <span style="margin-right:36px;margin-left: 150px;font-size:18px;font-weight: bold;">Email:</span><input type="email" name="email" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:530px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            <span style="margin-right:28px;margin-left: 150px;font-size:18px;font-weight: bold;">Cargo*:</span><input type="text" name="cargo" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:225px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            <span style="margin-right:6px;margin-left: 150px;font-size:18px;font-weight: bold;">Permissao*: </span>
            <select name="permissao" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:200px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
                <option value="" selected>Selecione</option>
                <option value="2">Usuario</option>
                <option value="1">Administrador</option>           
            </select></br></br></br>
            <center>
            <input type="submit" name="btCadastrar" value="Cadastrar" class="art-button" style="margin-right:16px;">
            <a href="../view/usuarioview.php?opcao=0"><input type="button" name="btGerenciar" value="Gerenciar" class="art-button" style="margin-right:16px;"></a>
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


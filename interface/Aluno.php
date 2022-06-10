<?php
        include "../Logar.php";
	$obj = New Logar();
	$obj->validaSession2();

include_once ("../include/header_2.php");
include_once ("../include/header1.php");
//include_once ("../include/header_3.php");         
?>
<div class="art-sheet clearfix">
<div class="art-layout-wrapper">
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell art-content">
<article class="art-post art-article">    
    <center><h2 style="margin-right:6px;font-size:20px;font-weight: bold;">CADASTRO DO ALUNO</h2></center><br>
    <div class="formularioAluno">
        <form name="formCadastro" action="../AlunoGerenciador.php?opcao=3" method="post">
            
            <span style="margin-right:54px; margin-left: 150px;font-size:18px;font-weight: bold;">CPF*:</span><input type="text" required id="cpf" name="cpf" onblur="Verifica_CPF('cpf')" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:190px; border-color: #2B572C; border-style:solid; font-size:18px;"></br></br> 
            <span style="margin-right:36px;margin-left: 150px;font-size:18px;font-weight: bold;">Nome*:</span><input type="text" required name="nome" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:554px; border-color: #2B572C; border-style:solid; font-size:18px;"></br> </br>
            <span style="margin-right:4px;margin-left: 150px;font-size:18px;font-weight: bold;">Data de Nasc.: </span><input type="date" name="nascimento" id="nascimento" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:150px; border-color: #2B572C; border-style:solid; font-size:18px;"></br></br> 
<!--            <div class="sexo">
            <fieldset id="sexo"><legend>Sexo</legend>   
            <span style="margin-right:6px;font-size:18px;font-weight: bold;">Sexo:</span><br><br>
            <input style="margin-left: 50px;" type="radio" id="sexo" name="sexo" value="M" checked><label for="M" style="font-size:18px;margin-left: 20px;">Masculino</label>
            <input style="margin-left: 50px;" type="radio" id="sexo" name="sexo" value="F"><label for="F" style="font-size:18px;margin-left: 20px;">Feminino</label>
            </fieldset>
            </div></br>-->
            <fieldset id="sexo" style="margin-right: 160px; margin-left: 150px; border-color: white; "><legend style="margin-right:6px;font-size:20px;font-weight: bold;">Sexo</legend>
                <input style="margin-left: 10px;" type="radio" name="sexo" id="sexo" checked/> <label for="M" style="margin-right:10px;font-size:18px;font-weight: bold;"> Masculino</label><br/>
                <input style="margin-left: 10px;" type="radio" name="sexo" id="sexo" /><label for="F" style="margin-right:10px; font-size:18px;font-weight: bold;"> Feminino</label>
            </fieldset>	<br>
            <span style="margin-left: 150px; margin-right: 8px;font-size:18px;font-weight: bold;">Endereço:</span><input type="text" name="endereco" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:560px; border-color: #2B572C; border-style:solid; font-size:18px;"><br> </br>
            <span style="margin-right:50px;margin-left: 150px;font-size:18px;font-weight: bold;">Fone:</span><input type="text" name="fone" id="fone" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:190px; border-color: #2B572C; border-style:solid; font-size:18px;"><br></br>
            <span style="margin-right:40px;margin-left: 150px;font-size:18px;font-weight: bold;">Email:</span><input type="email" name="email" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:560px; border-color: #2B572C; border-style:solid; font-size:18px;"><br></br>
            <span style="margin-right:40px;margin-left: 150px;font-size:18px;font-weight: bold;">Serie*:</span><input type="text" name="serie" required  class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:125px; border-color: #2B572C; border-style:solid; font-size:18px;"><br> </br>
            <span style="margin-right:25px;margin-left: 150px;font-size:18px;font-weight: bold;">Turma*:</span><input type="text" name="turma" required  class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:125px; border-color: #2B572C; border-style:solid; font-size:18px;"><br> </br>
            <span style="margin-right:25px;margin-left: 150px;font-size:18px;font-weight: bold; width:120px;">Turno*: </span>
            <select name="turno" style="font-size: 18px;" id="turno" required>
                <option value="" selected style="font-size:18px;">Selecione</option>
                <option value="Matutino" style="font-size:18px;">Matutino</option>
                <option value="Vespertino" style="font-size:18px;">Vespertino</option>
                <option value="Noturno" style="font-size:18px;">Noturno</option>              
            </select></br></br>
            <span style="margin-right:14px;margin-left: 150px;font-size:18px;font-weight: bold;">Situação:</span><input type="text" readonly name="situacao" value="Em dia" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:128px; border-color: #2B572C; border-style:solid; font-size:18px;"><br></br>
            <center>
            <input type="submit" name="btCadastrar" value="Cadastrar" class="art-button" style="margin-right:16px;">
            <a href="../view/alunoview.php?opcao=2"><input type="button" name="btGerenciar" value="Gerenciar" class="art-button" style="margin-right:16px;" ></a>
            <input type="reset" name="btResetar" value="Resetar" class="art-button" style="margin-right:16px;" >
            <a href="../home.php"><input type="button" name="btVoltar" value="Voltar" class="art-button" style="margin-right:16px;" ></a>
            </center>
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



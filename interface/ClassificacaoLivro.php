<?php
        include "../Logar.php";
	$obj = New Logar();
	$obj->validaSession2();

include_once ("../include/header_2.php");
include_once ("../include/header1.php");
?>
<div class="art-sheet clearfix" style="margin-bottom: 70px; margin-top: 20px;">
<div class="art-layout-wrapper">
<div class="art-content-layout">
<div class="art-content-layout-row">
    <div class="art-layout-cell art-content">
<article class="art-post art-article">  
    <center><h2 style="margin-right:6px;font-size:20px;font-weight: bold;">CADASTRO DA CLASSIFICAÇÃO DO LIVRO</h2></center><br><br><br>
    <div class="formularioClassificacaoLivro">
        <form name="formCadastro" action="../ClassificacaoLivroGerenciador.php?opcao=3" method="post">           
<!--            <label>Classificacao do Livro:</label><input type="text" name="classificacao" required value=""><br><br>  -->
<!--            <label>Faixa Etaria:</label><input type="text" name="faixaEtaria" required value=""><br><br>    -->
            <span style="margin-right:6px;margin-left: 250px;font-size:18px;font-weight: bold;">Classificacao do Livro: </span>
            <select name="classificacao" required style="font-size: 18px;" class="ui-widget ui-widget-content ui-corner-left ui-corner-right">
                <option value="" selected>Selecione</option>
                <option value="Jardim de Infancia">Jardim de Infancia</option>
                <option value="Alfabetizacao">Alfabetizacao</option>
                <option value="Ensino Fundamental I">Ensino Fundamental I</option>
                <option value="Ensino Fundamental II">Ensino Fundamental II</option>
                <option value="Ensino Medio">Ensino Medio</option>
                <option value="adulto">Adulto</option> 
            </select></br></br>

            <span style="margin-right:6px; margin-left: 250px;font-size:18px;font-weight: bold;">Faixa Etária: </span>
            <select name="faixaEtaria" required style="font-size: 18px;" class="ui-widget ui-widget-content ui-corner-left ui-corner-right">
                <option value="" selected>Selecione</option>
                <option value="4 a 5">4 a 5 anos</option>
                <option value="6 a 7">6 a 7 anos</option>
                <option value="8 a 11">8 a 11 anos</option>
                <option value="12 a 15">12 a 15 anos</option>
                <option value="16 a 18">16 a 18 anos</option>
                <option value="> 18">maiores 18 anos</option> 
            </select></br></br>
            
            <span style="margin-right:6px;margin-left: 250px;font-size:18px;font-weight: bold;">Gênero: </span>
            <select name="genero" required style="font-size: 18px;" class="ui-widget ui-widget-content ui-corner-left ui-corner-right">
                <option value="" selected>Selecione</option>
                <option value="0">Obras de Referencia</option>
                <option value="100">Filosofia</option>
                <option value="200">Religiao</option>
                <option value="500">Ciencias Puras</option>
                <option value="600">Ciencias Aplicadas,Tecnologia</option>
                <option value="700">Artes</option> 
                <option value="800">Literatura Brasileira,Antologia</option>          
            </select><br><br><br>
            <center>
            <input type="submit" name="btCadastrar" value="Cadastrar" class="art-button" style="margin-right:16px;"> 
            <a href="../view/classificacaolivroview.php?opcao=5"><input type="button" name="btGerenciar" value="Gerenciar" class="art-button" style="margin-right:16px;"></a>
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

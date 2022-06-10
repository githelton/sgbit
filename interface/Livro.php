<?php
        include "../Logar.php";
	$obj = New Logar();
	$obj->validaSession2();
        
       require_once '../Livro.php';
       require_once '../Database.php';
       
        $pdo = Database::conexao();
        $liv1 = new Livro();
?>
<?php
include_once ("../include/header_2.php");
include_once ("../include/header1.php");
?>
<div class="art-sheet clearfix">
<div class="art-layout-wrapper">
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell art-content">
<article class="art-post art-article">
    <div class="formularioLivro">
        <center><h2 style="margin-right:6px;font-size:20px;font-weight: bold;">CADASTRO DO LIVRO</h2></center></br>    
        <form name="formCadastro" action="../LivroGerenciador.php?opcao=3" method="post">
            
            <span style="margin-right:50px;margin-left: 200px;font-size:18px;font-weight: bold;">Titulo*:</span><input type="text" name="titulo" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:450px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br> 
            <span style="margin-right:70px;margin-left: 200px;font-size:18px;font-weight: bold;">Ano*:</span><input type="number"  name="ano" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:100px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>         
<!--            <label>Situacao*:</label><input type="text" name="situacao"><br> -->
            <span style="margin-right:43px;margin-left: 200px;font-size:18px;font-weight: bold;">Resumo:</span><input type="text" name="resumo" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:450px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            <span style="margin-right:10px;margin-left: 200px;font-size:18px;font-weight: bold;">Observacao:</span><input type="text" name="observacao" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:450px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            <span style="margin-right:44px;margin-left: 200px;font-size:18px;font-weight: bold;">Edicao*:</span><input type="text" min="1" name="edicao" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:100px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br> 
            <span style="margin-right:36px;margin-left: 200px;font-size:18px;font-weight: bold;">Volume*:</span><input type="number" name="volume" min="1" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:100px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>            
            <span style="margin-right:6px;margin-left: 200px;font-size:18px;font-weight: bold;">Nº de Exemplares*:</span><input type="number" min="1" name="numExemplar" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:100px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            
            <span style="margin-right:28px;margin-left: 200px;font-size:18px;font-weight: bold;">Prateleira*:</span>  <select name="prateleira" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:100px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
                <option value="prateleira">Escolha</option>
                <?php
                $banco = $pdo->prepare("SELECT `idPrateleira`, `setor` , `fileira` FROM `prateleira` ");
                $banco->execute();
                $result = $banco->fetchAll(PDO::FETCH_OBJ);
                foreach ($result as $back) {
                   echo "<option  value =  $back->idPrateleira > $back->setor - $back->fileira </option>"; 
                }                
                ?>
            </select><br> <br> 
            
            <span style="margin-right:0px;margin-left: 200px;font-size:18px;font-weight: bold;">Classificacao*:</span> <select name="classificacaoLivro" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:435px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
                <option value="classificacaoLivro">Escolha</option>
                <?php
                $banco = $pdo->prepare("SELECT * FROM `classificacaoLivro` ");
                $banco->execute();
                $result = $banco->fetchAll(PDO::FETCH_OBJ);
                foreach ($result as $back) {
                    echo "<option  value = '$back->idClassificacaoLivro'>$back->genero </option>";//sua classificação está buscando o genero do livro
                } 
                ?>
            </select><br> <br> 
            
            <span style="margin-right:67px;margin-left: 200px;font-size:18px;font-weight: bold;">Autor*:</span> <select name="autor" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:435px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
                <option value="autor">Escolha</option>
                <?php
                $banco = $pdo->prepare("SELECT * FROM `autor`");
                $banco->execute();
                $result = $banco->fetchAll(PDO::FETCH_OBJ);
                foreach ($result as $back) {
                    echo "<option  value = '$back->idAutor'>$back->nome</option>";
                }               
                ?>
            </select><br> <br> 
            
            <span style="margin-right:50px;margin-left: 200px;font-size:18px;font-weight: bold;">Editora*:</span> <select name="editora" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:435px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
                <option value="editora">Escolha</option>
                <?php
                $banco = $pdo->prepare("SELECT * FROM `editora`");
                $banco->execute();
                $result = $banco->fetchAll(PDO::FETCH_OBJ);
                foreach ($result as $back) {
                    echo "<option  value = '$back->idEditora'>$back->nome</option>";             
                }
                ?>
            </select><br> <br> <br> 
            <center>
            <input type="submit" name="btCadastrar" value="Cadastrar" class="art-button" style="margin-right:16px;">
            <a href="../view/livroview.php?opcao=8"><input type="button" name="btGerenciar" value="Gerenciar" class="art-button" style="margin-right:16px;"></a>
<!--            <a href="../view/livroprocuraview.php?opcao=8"><input type="button" name="btProcurar" value="Procurar" class="art-button" style="margin-right:16px;"></a>-->
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
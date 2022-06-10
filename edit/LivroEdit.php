<?php
        include "../Logar.php";
	$obj = New Logar();
	$obj->validaSession2();
        
require_once '../Database.php';
$pdo=Database::conexao();
$id=$_GET['idLivro']; 
                $banco = $pdo->prepare("SELECT * FROM `livro` WHERE `idLivro`='$id'");
                $banco->execute();
                $result = $banco->fetchAll(PDO::FETCH_OBJ);
                foreach ($result as $bk) {
                    $idLivro=$bk->idLivro; 
                    $titulo=$bk->titulo; 
                    $ano=$bk->ano; 
                    $situacao=$bk->situacao;
                    $resumo=$bk->resumo;
                    $observacao=$bk->observacao;
                    $edicao=$bk->edicao;
                    $volume=$bk->volume;
                    $numExemplar=$bk->numExemplar;
                    $prateleira=$bk->prateleira;
                    $classificacao=$bk->classificacaoLivro;
                    $autor=$bk->autor;
                    $editora=$bk->editora;
                }   
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
    <center><h2 style="margin-right:6px;font-size:20px;font-weight: bold;">ALTERAÇÃO DO LIVRO</h2></center>
    <div class="formularioLivro">
        <form name="formCadastro" action="../LivroGerenciador.php?opcao=2&idLivro" method="post">   
            <input type="hidden" name="idLivro" value="<?php echo "$idLivro";?>" required><br>
            <span style="margin-right:55px;margin-left: 200px;font-size:18px;font-weight: bold;">Titulo:</span><input type="text" name="titulo" value="<?php echo "$titulo";?>" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:490px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br> 
            <span style="margin-right:75px;margin-left: 200px;font-size:18px;font-weight: bold;">Ano:</span><input type="number" name="ano"  value="<?php echo "$ano";?>" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:100px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>         
<!--            <label>Situacao:</label><input type="text" name="situacao"  value="<?ph echo "$situacao";?>"><br><br> -->
            <span style="margin-right:36px;margin-left: 200px;font-size:18px;font-weight: bold;">Resumo:</span><input type="text" name="resumo" value="<?php echo "$resumo";?>" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:490px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            <span style="margin-right:6px;margin-left: 200px;font-size:18px;font-weight: bold;">Observacao:</span><input type="text" name="observacao" value="<?php echo "$observacao";?>" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:490px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            <span style="margin-right:51px;margin-left: 200px;font-size:18px;font-weight: bold;">Edicao:</span><input type="text" name="edicao" value="<?php echo "$edicao";?>" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:100px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br> 
            <span style="margin-right:41px;margin-left: 200px;font-size:18px;font-weight: bold;">Volume:</span><input type="number" name="volume"  value="<?php echo "$volume";?>" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:100px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>         
            <span style="margin-right:6px;margin-left: 200px;font-size:18px;font-weight: bold;">Nº de Exemplares:</span><input type="number" name="numExemplar"  value="<?php echo "$numExemplar";?>" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:100px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>         
           
            <span style="margin-right:32px;margin-left: 200px;font-size:18px;font-weight: bold;">Prateleira</span>  <select name="prateleira" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:100px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br> 
                <option value="prateleira"> Escolha</option>
                <?php
                $banco = $pdo->prepare("SELECT * FROM `prateleira`");
                $banco->execute();
                $result = $banco->fetchAll(PDO::FETCH_OBJ);
                foreach ($result as $back) {                  
                   if ($prateleira == $back->idPrateleira){
                       echo "<option  value='$back->idPrateleira' selected> $back->setor  $back->fileira </option>"; 
                   } else {
                       echo "<option  value='$back->idPrateleira'> $back->setor $back->fileira </option>"; 
                   }
                }            
                ?>
            </select><br><br>
            
            <span style="margin-right:0px;margin-left: 200px;font-size:18px;font-weight: bold;">Classificacao:</span> <select name="classificacaoLivro" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:490px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>           
                <option value="classificacaoLivro">Escolha</option>
                <?php
                $banco = $pdo->prepare("SELECT * FROM `classificacaoLivro` ");
                $banco->execute();
                $result = $banco->fetchAll(PDO::FETCH_OBJ);
                foreach ($result as $back) {                
                    if ($classificacao == $back->idClassificacaoLivro){
                        //echo 'v';
                       echo "<option  value='$back->idClassificacaoLivro' selected> $back->classificacao</option>"; 
                   } else {
                       //echo 'f';
                       echo "<option  value = '$back->idClassificacaoLivro'>$back->classificacao </option>";
                   }
                } 
                ?>
            </select><br><br>
            
            <span style="margin-right:67px;margin-left: 200px;font-size:18px;font-weight: bold;">Autor:</span> <select name="autor" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:490px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
                <option value="autor">Escolha</option>
                <?php
                $banco = $pdo->prepare("SELECT * FROM `autor`");
                $banco->execute();
                $result = $banco->fetchAll(PDO::FETCH_OBJ);
                foreach ($result as $back) {
                    if($autor == $back->idAutor){
                    echo "<option  value = '$back->idAutor' selected>$back->nome</option>";
                    }else{
                    echo "<option  value = '$back->idAutor'>$back->nome</option>";    
                    }
                }               
                ?>
            </select><br><br>
            
            <span style="margin-right:51px;margin-left: 200px;font-size:18px;font-weight: bold;">Editora:</span> <select name="editora" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:490px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
                <option value="editora">Escolha</option>
                <?php
                $banco = $pdo->prepare("SELECT * FROM `editora`");
                $banco->execute();
                $result = $banco->fetchAll(PDO::FETCH_OBJ);
                foreach ($result as $back) {
                    if($editora == $back->idEditora){
                    echo "<option  value = '$back->idEditora' selected>$back->nome</option>";             
                    }else{
                    echo "<option  value = '$back->idEditora'>$back->nome</option>";     
                    }
                }
                ?>
            </select><br><br><br>
            <center>
            <input type="submit" name="btAtualizar" value="Atualizar" class="art-button" style="margin-right:16px;">
            <a href="../view/livroview.php?opcao=8"><input type="button" name="btVoltar" value="Voltar" class="art-button" style="margin-right:16px;"></a>
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
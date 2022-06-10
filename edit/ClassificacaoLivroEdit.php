<?php
        include "../Logar.php";
	$obj = New Logar();
	$obj->validaSession2();
        
require_once '../Database.php';
$pdo=Database::conexao();

$id=$_GET['idClassificacaoLivro']; 

                $banco = $pdo->prepare("SELECT * FROM `classificacaolivro` WHERE `idClassificacaoLivro`='$id'");
                $banco->execute();
                $result = $banco->fetchAll(PDO::FETCH_OBJ);
                foreach ($result as $bk) {
                    $idClassificacaoLivro=$bk->idClassificacaoLivro; 
                    $classificacao=$bk->classificacao; 
                    $faixaEtaria=$bk->faixaEtaria;
                    $genero=$bk->genero;
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
    <div class="formularioClassificacaoLivro">
    <center><h2 style="margin-right:6px;font-size:20px;font-weight: bold;">ALTERAÇÃO DA CLASSIFICAÇÃO DO LIVRO</h2></center><br>    
        <form name="formCadastro" action="../ClassificacaoLivroGerenciador.php?opcao=2&idClassificacaoLivro" method="post">           
            
            <input type="hidden" name="idClassificacaoLivro" value="<?php echo "$idClassificacaoLivro"; ?>"><br>         
            
            <span style="margin-right:6px;margin-left: 250px;font-size:18px;font-weight: bold;">Classificacao do Livro: </span> <select name="classificacao" required style="font-size: 18px;">
                <option value="classificacao">Escolha</option>
                <?php
                $banco = $pdo->prepare("SELECT * FROM `classificacaoLivro`");
                $banco->execute();
                $result = $banco->fetchAll(PDO::FETCH_OBJ);
                foreach ($result as $back) {
                    if($id == $back->idClassificacaoLivro){
                        echo "<option  value = '$back->classificacao' selected>$back->classificacao </option>";
                    }else{
                        echo "<option  value = '$back->classificacao'>$back->classificacao </option>";
                    }
                } 
                ?>
            </select><br><br> 
            
            <span style="margin-right:6px;margin-left: 250px;font-size:18px;font-weight: bold;">Faixa Etária: </span> <select name="faixaEtaria" required style="font-size: 18px;">
                <option value="faixaEtaria">Escolha</option>
                <?php
                $banco = $pdo->prepare("SELECT * FROM `classificacaoLivro`");
                $banco->execute();
                $result = $banco->fetchAll(PDO::FETCH_OBJ);
                foreach ($result as $back) {
                    if($id == $back->idClassificacaoLivro){
                        echo "<option  value = '$back->faixaEtaria' selected>$back->faixaEtaria </option>";
                    }else{
                        echo "<option  value = '$back->faixaEtaria'>$back->faixaEtaria </option>";
                    }
                } 
                ?>
            </select><br><br>
            
            <span style="margin-right:6px;margin-left: 250px;font-size:18px;font-weight: bold;">Gênero: </span> <select name="genero" required style="font-size: 18px;">
                <option value="genero">Escolha</option>
                <?php
                $banco = $pdo->prepare("SELECT * FROM `classificacaoLivro`");
                $banco->execute();
                $result = $banco->fetchAll(PDO::FETCH_OBJ);
                foreach ($result as $back) {
                    if($id == $back->idClassificacaoLivro){
                        echo "<option  value = '$back->genero' selected>$back->genero </option>";
                    }else{
                        echo "<option  value = '$back->genero'>$back->genero </option>";
                        }
                    }
                ?>
            </select><br><br><br><br><br><br><br><br><br><br>
            <center>
            <input type="submit" name="btAtualizar" value="Atualizar" class="art-button" style="margin-right:16px;">   
            <a href="../view/classificacaolivroview.php?opcao=5"><input type="button" name="btVoltar" value="Voltar" class="art-button" style="margin-right:16px;"></a>
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
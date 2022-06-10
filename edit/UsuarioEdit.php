<?php
        include "../Logar.php";
	$obj = New Logar();
	$obj->validaSession2();
        
require_once '../Database.php';
$pdo=Database::conexao();
$id=$_GET['idUsuario']; 

                $banco = $pdo->prepare("SELECT * FROM `usuario` WHERE `idUsuario`='$id'");
                $banco->execute();
                $result = $banco->fetchAll(PDO::FETCH_OBJ);
                foreach ($result as $bk) {
                    $idUsuario=$bk->idUsuario; 
                    $cpf=$bk->cpf; 
                    $nome=$bk->nome; 
                    $senha=$bk->senha; 
                    $nascimento=$bk->nascimento;
                    $sexo=$bk->sexo;
                    $endereco=$bk->endereco;
                    $fone=$bk->fone;
                    $email=$bk->email;
                    $cargo=$bk->cargo;
                    $permissao=$bk->permissao;
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
    <center><h2 style="margin-right:6px;font-size:20px;font-weight: bold;">ALTERAÇÃO DO USUÁRIO</h2></center><br>
    <div class="formularioUsuario">
        <form name="formCadastro" action="../UsuarioGerenciador.php?opcao=2" method="post">
            <input type="hidden" name="idUsuario" required value="<?php echo "$idUsuario"; ?>"><br>
            <span style="margin-right:51px;margin-left: 150px;font-size:18px;font-weight: bold;">CPF:</span><input type="text" name="cpf" required value="<?php echo "$cpf"; ?>" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:220px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            <span style="margin-right:32px;margin-left: 150px;font-size:18px;font-weight: bold;">Nome:</span><input type="text" name="nome"  value="<?php echo "$nome"; ?>" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:565px; border-color: #2B572C; border-style:solid;font-size: 18px;" ></br></br>
            <span style="margin-right:31px;margin-left: 150px;font-size:18px;font-weight: bold;">Senha:</span><input type="password" name="senha"  value="<?php echo "$senha"; ?>" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:220px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            <span style="margin-right:6px;margin-left: 150px;font-size:18px;font-weight: bold;">Data de Nasc.:</span><input type="date" name="nascimento"  value="<?php echo "$nascimento"; ?>" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:175px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>  
            <div class="sexo">
                <?php if ($sexo == "M"){ ?>
                <fieldset id="sexo" style="margin-right: 160px; margin-left: 150px; border-color: white; "><legend style="margin-right:6px;font-size:20px;font-weight: bold;">Sexo</legend>
                    <input style="margin-left: 10px;" type="radio" value="M" name="sexo" id="sexo" checked/> <label for="M" style="margin-right:10px;font-size:18px;font-weight: bold;"> Masculino</label><br/>
                    <input style="margin-left: 10px;" type="radio"  value="F" name="sexo" id="sexo" /><label for="F" style="margin-right:10px; font-size:18px;font-weight: bold;"> Feminino</label>
                </fieldset>	<br>
                <?php } else { ?>
                <fieldset id="sexo" style="margin-right: 160px; margin-left: 150px; border-color: white; "><legend style="margin-right:6px;font-size:20px;font-weight: bold;">Sexo</legend>
                <input style="margin-left: 10px;" type="radio" value="M" name="sexo" id="sexo" /> <label for="M" style="margin-right:10px;font-size:18px;font-weight: bold;"> Masculino</label><br/>
                <input style="margin-left: 10px;" type="radio" value="F" name="sexo" id="sexo" checked/><label for="F" style="margin-right:10px; font-size:18px;font-weight: bold;"> Feminino</label>
            </fieldset>	<br>
                <?php } ?>
            </div><br> <br> 
            <span style="margin-right:5px;margin-left: 150px;font-size:18px;font-weight: bold;">Endereço:</span><input type="text" name="endereco" value="<?php echo "$endereco"; ?>" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:565px; border-color: #2B572C; border-style:solid; font-size: 18px;" ></br></br> 
            <span style="margin-right:46px;margin-left: 150px;font-size:18px;font-weight: bold;">Fone:</span><input type="text" name="fone"  value="<?php echo "$fone"; ?>" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:200px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            <span style="margin-right:38px;margin-left: 150px;font-size:18px;font-weight: bold;">Email:</span><input type="email" name="email" value="<?php echo "$email"; ?>" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:300px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br> 
            <span style="margin-right:38px;margin-left: 150px;font-size:18px;font-weight: bold;">Cargo:</span><input type="text" name="cargo"  value="<?php echo "$cargo"; ?>" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:200px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
<!--    <span style="margin-right:6px;font-size:18px;font-weight: bold;">Permissao:</span><input type="text" name="permissao"  value="<?ph echo "$permissao"; ?>" required><br> <br> -->
            <?php if($permissao == 1){ ?>
            <span style="margin-right:6px;margin-left: 150px;font-size:18px;font-weight: bold;">Permissao*: </span>
                <select name="permissao" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:175px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
                <option value="">Selecione</option>
                <option value="2">Usuario</option>
                <option value="1" selected>Administrador</option>           
            </select></br></br>
            <?php }else{ ?>
            <span style="margin-right:6px;margin-left: 150px;font-size:18px;font-weight: bold;">Permissao*: </span>
                <select name="permissao" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:180px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
                <option value="">Selecione</option>
                <option value="2" selected>Usuario</option>
                <option value="1">Administrador</option>           
            </select></br></br>
            <?php } ?> 
            <center>
            <input type="submit" name="btAtualizar" value="Atualizar" class="art-button" style="margin-right:16px;">
            <a href="../view/usuarioview.php?opcao=2"><input type="button" name="btVoltar" value="Voltar" class="art-button" style="margin-right:16px;"></a>
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
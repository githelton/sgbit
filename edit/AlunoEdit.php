<?php
        include "../Logar.php";
	$obj = New Logar();
	$obj->validaSession2();
        
require_once '../Database.php';
require_once '../Aluno.php';
$al = new Aluno();
$pdo=Database::conexao();
$id=$_GET['idAluno']; 

                $banco = $pdo->prepare("SELECT * FROM `aluno` WHERE `idAluno`='$id'");
                $banco->execute();
                $result = $banco->fetchAll(PDO::FETCH_OBJ);
                foreach ($result as $bk) {
                    $idAluno=$bk->idAluno; 
                    $cpf=$bk->cpf; 
                    $nome=$bk->nome; 
                    $nascimento=$bk->nascimento;
                    $sexo=$bk->sexo;
                    $endereco=$bk->endereco;
                    $fone=$bk->fone;
                    $email=$bk->email;
                    $serie=$bk->serie;
                    $turma=$bk->turma;
                    $turno=$bk->turno;
                    $situacao=$bk->situacao;
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
    <center><h2 style="margin-right:6px;font-size:20px;font-weight: bold;">ALTERAÇÃO DO ALUNO</h2></center><br>
    <div class="formularioAlunoEdit">
        <form name="formCadastro" action="../AlunoGerenciador.php?opcao=2&idAluno" method="post">
            <?php foreach ($result as $bk) {?>
            <input type="hidden" name="idAluno" value="<?php echo "$idAluno";?>"><br>
            <span style="margin-right:54px; margin-left: 150px;font-size:18px;font-weight: bold;">CPF*:</span><input type="text" name="cpf" value="<?php echo "$cpf";?>" onblur="Verifica_CPF('cpf')" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:182px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br> </br>
            <span style="margin-right:36px;margin-left: 150px;font-size:18px;font-weight: bold;">Nome*:</span><input type="text" name="nome" required value="<?php echo "$nome";?>" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:555px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br> </br>
            <span style="margin-right:2px;margin-left: 150px;font-size:18px;font-weight: bold;">Data de Nasc.: </span><input type="date" name="nascimento" value="<?php echo "$nascimento";?>" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:152px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br> </br>

            <div class="sexo">
                <?php if ($sexo == "M"){ ?>
                <fieldset id="sexo" style="margin-right: 160px; margin-left: 150px; border-color: white; "><legend style="margin-right:6px;font-size:20px;font-weight: bold;">Sexo</legend>
                    <input style="margin-left: 10px;" value="M" type="radio" name="sexo" id="sexo" checked/> <label for="M" style="margin-right:10px;font-size:18px;font-weight: bold;"> Masculino</label><br/>
                    <input style="margin-left: 10px;" value="F" type="radio" name="sexo" id="sexo" /><label for="F" style="margin-right:10px; font-size:18px;font-weight: bold;"> Feminino</label>
                </fieldset>	<br>
                <?php } else { ?>
                <fieldset id="sexo" style="margin-right: 160px; margin-left: 150px; border-color: white; "><legend style="margin-right:6px;font-size:20px;font-weight: bold;">Sexo</legend>
                    <input style="margin-left: 10px;" type="radio" name="sexo" value="M" id="sexo" /> <label for="M" style="margin-right:10px;font-size:18px;font-weight: bold;"> Masculino</label><br/>
                    <input style="margin-left: 10px;" type="radio" name="sexo" value="F" id="sexo" checked/><label for="F" style="margin-right:10px; font-size:18px;font-weight: bold;"> Feminino</label>
                </fieldset>	<br>
                <?php } ?>
            </div>
            
            <span style="margin-left: 150px; margin-right: 8px;font-size:18px;font-weight: bold;">Endereço:</span><input type="text" name="endereco" value="<?php echo "$endereco";?>" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:560px; border-color: #2B572C; border-style:solid; font-size: 18px;"><br> </br>
            <span style="margin-right:50px;margin-left: 150px;font-size:18px;font-weight: bold;">Fone:</span><input type="text" name="fone" value="<?php echo "$fone";?>" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:185px; border-color: #2B572C; border-style:solid; font-size: 18px;"><br></br>
            <span style="margin-right:40px;margin-left: 150px;font-size:18px;font-weight: bold;">Email:</span><input type="email" name="email" value="<?php echo "$email";?>" class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:565px; border-color: #2B572C; border-style:solid; font-size: 18px;"><br></br>
            <span style="margin-right:45px;margin-left: 150px;font-size:18px;font-weight: bold;">Serie:</span><input type="text" name="serie" value="<?php echo "$serie";?>" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:125px; border-color: #2B572C; border-style:solid; font-size: 18px;"><br> </br>
            <span style="margin-right:30px;margin-left: 150px;font-size:18px;font-weight: bold;">Turma:</span><input type="text" name="turma" value="<?php echo "$turma";?>" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:125px; border-color: #2B572C; border-style:solid; font-size: 18px;"><br> </br> 
            <span style="margin-right:30px;margin-left: 150px;font-size:18px;font-weight: bold;">Turno: </span>
            <select name="turno" style="font-size: 18px;" required>
                <option value="" style="font-size: 18px;">Selecione</option>
                <?php if($turno=="Matutino"){?>
                    <option value="Matutino" style="font-size: 18px;" selected>Matutino</option>
                    <option value="Vespertino" style="font-size: 18px;">Vespertino</option>
                    <option value="Noturno" style="font-size: 18px;">Noturno</option>
                <?php }else if($turno=="Vespertino"){ ?>
                    <option value="Matutino" style="font-size: 18px;">Matutino</option>
                    <option value="Vespertino" style="font-size: 18px;" selected>Vespertino</option>
                    <option value="Noturno" style="font-size: 18px;">Noturno</option>
                <?php }else if($turno=="Noturno"){ ?>
                    <option value="Matutino" style="font-size: 18px;" >Matutino</option>
                    <option value="Vespertino" style="font-size: 18px;">Vespertino</option>
                    <option value="Noturno" style="font-size: 18px;" selected>Noturno</option> 
                <?php }else{ ?>
                    <option value="Matutino" style="font-size: 18px;">Matutino</option>
                    <option value="Vespertino" style="font-size: 18px;">Vespertino</option>
                    <option value="Noturno" style="font-size: 18px;">Noturno</option>              
                <?php }?>    
            </select></br></br>
            <span style="margin-right:12px;margin-left: 150px;font-size:18px;font-weight: bold;">Situação:</span><input type="text" readonly name="situacao" value="<?php echo "$situacao";?>" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:125px; border-color: #2B572C; border-style:solid; font-size: 18px;"><br></br>
            <center>
            <input type="submit" name="btAtualizar" value="Atualizar" class="art-button" style="margin-right:16px;">
            <a href="../view/alunoview.php?opcao=2"><input type="button" name="btVoltar" value="Voltar" class="art-button" style="margin-right:16px;"></a>    
            </center>
        <?php } ?>
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
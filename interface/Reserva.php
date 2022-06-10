<?php
        include "../Logar.php";
	$obj = New Logar();
	$obj->validaSession2();
        $idUsuario=$_SESSION['idUsuario'];
        $usuario=$_SESSION['usuario'];
        require_once '../Database.php'; 
        include_once ("../include/header_2.php");
        include_once ("../include/header1.php");
        $pdo = Database::conexao();
?>
<div class="art-sheet clearfix" style="margin-bottom: 100px;">
<div class="art-layout-wrapper">
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell art-content">
<article class="art-post art-article">  
    <center><h2 style="margin-right:6px;font-size:20px;font-weight: bold;">CADASTRO DA RESERVA DE LIVROS</h2></center><br>
    <div class="formularioReserva">
        <form name="formCadastro" action="../ReservaGerenciador.php?opcao=3" method="post">
             
            <input type="hidden" name="usuario" value="<?php echo "$idUsuario"; ?>"><br>         
            <span style="margin-right:4px;margin-left: 250px;font-size:18px;font-weight: bold;">Usuário: </span><input value="<?php echo $usuario; ?>" readonly class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:400px; border-color: #2B5725C; border-style:solid; font-size: 18px;"></br></br>
            
            <span style="margin-right:27px;margin-left: 250px;font-size:18px;font-weight: bold;">Livro*</span>  <select name="livro" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:400px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
                <option value="livro">Escolha</option>
                <?php
                $banco = $pdo->prepare("SELECT * FROM `livro`");
                $banco->execute();
                $result = $banco->fetchAll(PDO::FETCH_OBJ);
                foreach ($result as $back) {
                   echo "<option  value =  $back->idLivro >$back->titulo </option>"; 
                }                
                ?>
            </select><br><br>
            
            <span style="margin-right:20px;margin-left: 250px;font-size:18px;font-weight: bold;">Aluno*</span> <select name="aluno" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:400px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
                <option value="aluno" >Escolha</option>
                <?php
                $banco = $pdo->prepare("SELECT * FROM `aluno`");
                $banco->execute();
                $result = $banco->fetchAll(PDO::FETCH_OBJ);
                foreach ($result as $back) {
                    echo "<option  value = '$back->idAluno'>$back->nome </option>";
                } 
                ?>
            </select><br><br> 
            <span style="margin-right:6px;margin-left: 250px;font-size:18px;font-weight: bold;">Data da Reserva*:</span><input type="date"  name="dataHoraReserva" required class="ui-widget ui-widget-content ui-corner-left ui-corner-right" style="width:170px; border-color: #2B572C; border-style:solid; font-size: 18px;"></br></br>
            <br><center>
            <input type="submit" name="btCadastrar" value="Cadastrar" class="art-button" style="margin-right:16px;">
            <a href="../view/reservaview.php?opcao=7"><input type="button" name="btGerenciar" value="Gerenciar" class="art-button" style="margin-right:16px;"></a>
            <input type="reset" name="btResetar" value="Resetar" class="art-button" style="margin-right:16px;">
            <a href="../home.php?opcao=7"><input type="button" name="btVoltar" value="Voltar" class="art-button" style="margin-right:16px;"></a>
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

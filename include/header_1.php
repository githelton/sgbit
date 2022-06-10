<div class="user-system" style="font-weight: bold;">Bem Vindo(a), <?php echo $_SESSION['usuario'];?></div> 
<nav class="art-nav">
    <div class="art-nav-inner" style="margin-left: 0px;">
        <ul class="art-hmenu" style="font-size:18px;font-weight: bold;">
            
            <li><a href="home.php" class="active">Home</a></li>
                   <?php if($_SESSION['permissao'] == 1){ ?>
                   <li><a href="interface/Usuario.php?opcao=0">Usuário</a></li>
                   <?php } ?>
		   <li><a href="interface/Aluno.php?opcao=2">Aluno</a></li>
		   <li> <a href="interface/Autor.php?opcao=3">Autor</a></li>
		   <li><a href="interface/Editora.php?opcao=4">Editora</a></li>
		   <li><a href="interface/ClassificacaoLivro.php?opcao=5">Classificação do Livro</a></li>
		   <li><a href="interface/Prateleira.php?opcao=6">Prateleira</a></li>
		   <li><a href="interface/Reserva.php?opcao=7">Reserva</a></li>
		   <li><a href="interface/Locacao.php?opcao=1">Empréstimo</a></li>
		   <li><a href="interface/Livro.php?opcao=8">Livros</a></li>
<!--                   <li><a href="view/RakingView.php?opcao=9">Ranking</a></li>-->
                   <li><a href="Logout.php">Sair</a></li>
	</ul> 
    </div>
</nav>
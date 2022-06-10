<nav class="art-nav">
    <div class="art-nav-inner" style="margin-left: 0px;">
        <ul class="art-hmenu" style="font-size:18px;font-weight: bold;">
            <?php $opcao=$_GET['opcao']; ?>
                   <li><a href="../home.php">Home</a></li>
                   
                   <?php if($opcao == 0){ ?>                       
                        <?php if($_SESSION['permissao'] == 1){ ?>   
                        <li><a href="../interface/Usuario.php?opcao=0" class="active">Usuário</a></li>
                        <?php } ?>
                        <li><a href="../interface/Aluno.php?opcao=2">Aluno</a></li>
                        <li><a href="../interface/Autor.php?opcao=3">Autor</a></li>
                        <li><a href="../interface/Editora.php?opcao=4" >Editora</a></li>
                        <li><a href="../interface/ClassificacaoLivro.php?opcao=5">Classificação do Livro</a></li>
                        <li><a href="../interface/Prateleira.php?opcao=6">Prateleira</a></li>
                        <li><a href="../interface/Reserva.php?opcao=7">Reserva</a></li>
                        <li><a href="../interface/Locacao.php?opcao=1">Empréstimo</a></li>
                        <li><a href="../interface/Livro.php?opcao=8">Livros</a></li>
<!--                        <li><a href="../view/RakingView.php?opcao=9">Ranking</a></li>-->
                   <?php  }else if($opcao == 2){ ?>            
                        <?php if($_SESSION['permissao'] == 1){ ?>   
                        <li><a href="../interface/Usuario.php?opcao=0">Usuário</a></li>
                        <?php } ?>
                        <li><a href="../interface/Aluno.php?opcao=2" class="active">Aluno</a></li>
                        <li><a href="../interface/Autor.php?opcao=3">Autor</a></li>
                        <li><a href="../interface/Editora.php?opcao=4" >Editora</a></li>
                        <li><a href="../interface/ClassificacaoLivro.php?opcao=5">Classificação do Livro</a></li>
                        <li><a href="../interface/Prateleira.php?opcao=6">Prateleira</a></li>
                        <li><a href="../interface/Reserva.php?opcao=7">Reserva</a></li>
                        <li><a href="../interface/Locacao.php?opcao=1">Empréstimo</a></li>
                        <li><a href="../interface/Livro.php?opcao=8">Livros</a></li>
<!--                        <li><a href="../view/RakingView.php?opcao=9">Ranking</a></li>-->
                   <?php }else if($opcao == 3){?>     
                        <?php if($_SESSION['permissao'] == 1){ ?>   
                        <li><a href="../interface/Usuario.php?opcao=0">Usuário</a></li>
                        <?php } ?>
                        <li><a href="../interface/Aluno.php?opcao=2" >Aluno</a></li>
                        <li><a href="../interface/Autor.php?opcao=3" class="active">Autor</a></li>
                        <li><a href="../interface/Editora.php?opcao=4" >Editora</a></li>
                        <li><a href="../interface/ClassificacaoLivro.php?opcao=5">Classificação do Livro</a></li>
                        <li><a href="../interface/Prateleira.php?opcao=6">Prateleira</a></li>
                        <li><a href="../interface/Reserva.php?opcao=7">Reserva</a></li>
                        <li><a href="../interface/Locacao.php?opcao=1">Empréstimo</a></li>
                        <li><a href="../interface/Livro.php?opcao=8">Livros</a></li>
<!--                        <li><a href="../view/RakingView.php?opcao=9">Ranking</a></li>-->
                   <?php }else if($opcao == 4){?>        
                        <?php if($_SESSION['permissao'] == 1){ ?>   
                        <li><a href="../interface/Usuario.php?opcao=0">Usuário</a></li>
                        <?php } ?>
                        <li><a href="../interface/Aluno.php?opcao=2">Aluno</a></li>
                        <li><a href="../interface/Autor.php?opcao=3">Autor</a></li>
                        <li><a href="../interface/Editora.php?opcao=4" class="active">Editora</a></li>
                        <li><a href="../interface/ClassificacaoLivro.php?opcao=5">Classificação do Livro</a></li>
                        <li><a href="../interface/Prateleira.php?opcao=6">Prateleira</a></li>
                        <li><a href="../interface/Reserva.php?opcao=7">Reserva</a></li>
                        <li><a href="../interface/Locacao.php?opcao=1">Empréstimo</a></li>
                        <li><a href="../interface/Livro.php?opcao=8">Livros</a></li>
<!--                        <li><a href="../view/RakingView.php?opcao=9">Ranking</a></li>-->
                   <?php }else if($opcao == 5){?>      
                        <?php if($_SESSION['permissao'] == 1){ ?>   
                        <li><a href="../interface/Usuario.php?opcao=0">Usuário</a></li>
                        <?php } ?>
                        <li><a href="../interface/Aluno.php?opcao=2" >Aluno</a></li>
                        <li><a href="../interface/Autor.php?opcao=3">Autor</a></li>
                        <li><a href="../interface/Editora.php?opcao=4" >Editora</a></li>
                        <li><a href="../interface/ClassificacaoLivro.php?opcao=5" class="active">Classificação do Livro</a></li>
                        <li><a href="../interface/Prateleira.php?opcao=6">Prateleira</a></li>
                        <li><a href="../interface/Reserva.php?opcao=7">Reserva</a></li>
                        <li><a href="../interface/Locacao.php?opcao=1">Empréstimo</a></li>
                        <li><a href="../interface/Livro.php?opcao=8">Livros</a></li>
<!--                        <li><a href="../view/RakingView.php?opcao=9">Ranking</a></li>-->
                   <?php }else if($opcao == 6){?> 
                        <?php if($_SESSION['permissao'] == 1){ ?>   
                        <li><a href="../interface/Usuario.php?opcao=0">Usuário</a></li>
                        <?php } ?>
                        <li><a href="../interface/Aluno.php?opcao=2" >Aluno</a></li>
                        <li><a href="../interface/Autor.php?opcao=3">Autor</a></li>
                        <li><a href="../interface/Editora.php?opcao=4" >Editora</a></li>
                        <li><a href="../interface/ClassificacaoLivro.php?opcao=5">Classificação do Livro</a></li>
                        <li><a href="../interface/Prateleira.php?opcao=6" class="active">Prateleira</a></li>
                        <li><a href="../interface/Reserva.php?opcao=7">Reserva</a></li>
                        <li><a href="../interface/Locacao.php?opcao=1">Empréstimo</a></li>
                        <li><a href="../interface/Livro.php?opcao=8">Livros</a></li>
<!--                        <li><a href="../view/RakingView.php?opcao=9">Ranking</a></li>-->
                   <?php }else if($opcao == 7){?> 
                        <?php if($_SESSION['permissao'] == 1){ ?>   
                        <li><a href="../interface/Usuario.php?opcao=0">Usuário</a></li>
                        <?php } ?>
                        <li><a href="../interface/Aluno.php?opcao=2" >Aluno</a></li>
                        <li><a href="../interface/Autor.php?opcao=3">Autor</a></li>
                        <li><a href="../interface/Editora.php?opcao=4" >Editora</a></li>
                        <li><a href="../interface/ClassificacaoLivro.php?opcao=5">Classificação do Livro</a></li>
                        <li><a href="../interface/Prateleira.php?opcao=6">Prateleira</a></li>
                        <li><a href="../interface/Reserva.php?opcao=7" class="active">Reserva</a></li>
                        <li><a href="../interface/Locacao.php?opcao=1">Empréstimo</a></li>
                        <li><a href="../interface/Livro.php?opcao=8">Livros</a></li>
<!--                        <li><a href="../view/RakingView.php?opcao=9">Ranking</a></li>-->
                   <?php }else if($opcao == 1){?> 
                        <?php if($_SESSION['permissao'] == 1){ ?>   
                        <li><a href="../interface/Usuario.php?opcao=0">Usuário</a></li>
                        <?php } ?>
                        <li><a href="../interface/Aluno.php?opcao=2" >Aluno</a></li>
                        <li><a href="../interface/Autor.php?opcao=3">Autor</a></li>
                        <li><a href="../interface/Editora.php?opcao=4" >Editora</a></li>
                        <li><a href="../interface/ClassificacaoLivro.php?opcao=5">Classificação do Livro</a></li>
                        <li><a href="../interface/Prateleira.php?opcao=6">Prateleira</a></li>
                        <li><a href="../interface/Reserva.php?opcao=7">Reserva</a></li>
                        <li><a href="../interface/Locacao.php?opcao=1" class="active">Empréstimo</a></li>
                        <li><a href="../interface/Livro.php?opcao=8">Livros</a></li>
<!--                        <li><a href="../view/RakingView.php?opcao=9">Ranking</a></li>-->
                   <?php }else if($opcao == 8){?>      
                        <?php if($_SESSION['permissao'] == 1){ ?>   
                        <li><a href="../interface/Usuario.php?opcao=0">Usuário</a></li>
                        <?php } ?>
                        <li><a href="../interface/Aluno.php?opcao=2" >Aluno</a></li>
                        <li><a href="../interface/Autor.php?opcao=3">Autor</a></li>
                        <li><a href="../interface/Editora.php?opcao=4" >Editora</a></li>
                        <li><a href="../interface/ClassificacaoLivro.php?opcao=5">Classificação do Livro</a></li>
                        <li><a href="../interface/Prateleira.php?opcao=6">Prateleira</a></li>
                        <li><a href="../interface/Reserva.php?opcao=7">Reserva</a></li>
                        <li><a href="../interface/Locacao.php?opcao=1">Empréstimo</a></li>
                        <li><a href="../interface/Livro.php?opcao=8" class="active">Livros</a></li>
<!--                        <li><a href="../view/RakingView.php?opcao=9">Ranking</a></li>-->
                   <?php }else if($opcao == 9){?> 
                        <?php if($_SESSION['permissao'] == 1){ ?>   
                        <li><a href="../interface/Usuario.php?opcao=0">Usuário</a></li>
                        <?php } ?>
                        <li><a href="../interface/Aluno.php?opcao=2" >Aluno</a></li>
                        <li><a href="../interface/Autor.php?opcao=3">Autor</a></li>
                        <li><a href="../interface/Editora.php?opcao=4" >Editora</a></li>
                        <li><a href="../interface/ClassificacaoLivro.php?opcao=5">Classificação do Livro</a></li>
                        <li><a href="../interface/Prateleira.php?opcao=6">Prateleira</a></li>
                        <li><a href="../interface/Reserva.php?opcao=7">Reserva</a></li>
                        <li><a href="../interface/Locacao.php?opcao=1">Empréstimo</a></li>
                        <li><a href="../interface/Livro.php?opcao=8">Livros</a></li>
<!--                        <li><a href="../view/RakingView.php?opcao=9" class="active">Ranking</a></li>-->
                   <?php }?>      
                   <li><a href="../Logout.php" >Sair</a></li>
		</ul> 
    </div>
</nav>
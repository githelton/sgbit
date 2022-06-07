<?php 
        echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	include "Logar.php";
	$obj = New Logar();
	$obj->validaSession();	
      
 ?>
<?php
include_once ("include/header.php");
include_once ("include/header_1.php");     
?>
<!-- <a href="logout.php">Sair</a>-->
<div class="art-sheet clearfix">
<div class="art-layout-wrapper">
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell art-content">
<article class="art-post art-article">
 
<section id="galeria" style="width: 500px; text-align: center; left:50%; margin-left:225px;">
        <div class="conteudo">
            <ul id="imagens">
                <li class="fade ativa">
                    <span class="numero">1 / 5</span>
                    <img src="imagens/escola/6.jpeg" alt="imagem 1" class="imagem-responsiva">
                    <span class="texto">Biblioteca da Escola Mirtis Rosas</span>
                </li>
                <li class="fade">
                    <span class="numero">2 / 5</span>
                    <img src="imagens/escola/9.jpeg" alt="imagem 2" class="imagem-responsiva">
                    <span class="texto">Biblioteca da Escola Coronel Cruz</span>
                </li>
                <li class="fade">
                    <span class="numero">3 / 5</span>
                    <img src="imagens/escola/10.jpeg" alt="imagem 3" class="imagem-responsiva">
                    <span class="texto">Incentivo a Leitura com as Crianças</span>
                </li>
                <li class="fade">
                    <span class="numero">4 / 5</span>
                    <img src="imagens/escola/11.jpeg" alt="imagem 4" class="imagem-responsiva">
                    <span class="texto">Atividades na Biblioteca</span>
                </li>
                <li class="fade">
                    <span class="numero">5 / 5</span>
                    <img src="imagens/escola/4.jpeg" alt="imagem 5" class="imagem-responsiva">
                    <span class="texto">Palestra sobre a biblioteca no colégio Carlos Mestinho</span>
                </li>
            </ul>
            <div id="botoes">
                <a href="" id="seguinte">&#10095;</a>
                <a href="" id="anterior">&#10094;</a>
            </div>
        </div>
        <div id="dots">
            <span class="dot ativo"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>

</section>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/main.js"></script>

 
</article>
</div>
</div>
</div>
</div>
</div>   
<?php
include_once("include/footer.php");      
?>

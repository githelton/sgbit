<?php
include "../Livro.php";
$liv1 = new Livro();
$string = empty($_GET['string']) ? "" : $_GET['string'];
$livros = $liv1->listar($string);

if($livros !== null){
    foreach ($livros as $bk){  
        echo "<tr class='content' style='margin-top:-1px; padding-bottom:10px;'>";
 ?>
    <td> <?= $bk->titulo;?>  </td>
    <td> <?= $bk->ano;?>  </td>
    <td> <?= $bk->resumo;?>  </td>
    <!--<td> <?// $bk->observacao;?>  </td>-->
    <td> <?= $bk->edicao;?>  </td>
    <td> <?= $bk->volume;?>  </td>
    <td> <?= $bk->numExemplar;?>  </td>
    <td> <?= $bk->setor.$bk->fileira;?> </td>             
    <td> <?= $bk->classificacao;?>  </td>
    <td> <?= $bk->autor;?>  </td>
    <td> <?= $bk->editora;?>  </td>
    <td> 
        <span class="art-button-wrapper"><span class="l"> </span><span class="r"></span>
        <a href="../edit/LivroEdit.php?opcao=8&idLivro=<?php echo $bk->idLivro; ?> " class="art-button" style="margin-right: 12px; zoom: 1; top: 5px;">Editar</a> </span></td>
    <td>
        <span class="art-button-wrapper"><span class="l"> </span><span class="r"></span>
        <a href="../LivroGerenciador.php?opcao=0&idLivro=<?php echo $bk->idLivro; ?>" type="button" class="art-button" style="margin-right: 12px; zoom: 1; top: 5px;" onclick="return confirm('Tem certeza dessa Exclusão?')">Excluir</a></span></td>
 <?php 
  
    }//fim do foreach
}else{ ?>
    <td colspan="12"> Nenhum livro encontrado! </td>
<?php 

}   
 ?>
<hr>
<?php
    $pagina = 1;
    if($_GET){
        $pagina = $_GET['pagina'];
    }
    $liv1->paginacao($pagina);   

?>
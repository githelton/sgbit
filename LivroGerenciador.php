<?php
    $opcao=$_GET['opcao'];

    include "Livro.php";
//    $pdo=Database::conexao();
    $lv1 = new Livro();
 
    if($opcao == 2){//atualizar
        
        $lv1->idLivro=$_POST['idLivro'];
        $lv1->titulo=$_POST['titulo'];
        $lv1->ano=$_POST['ano'];
        //$lv1->situacao=$_POST['situacao'];
        $lv1->resumo=$_POST['resumo'];
        $lv1->observacao=$_POST['observacao'];
        $lv1->edicao=$_POST['edicao'];
        $lv1->volume=$_POST['volume'];
        $lv1->numExemplar=$_POST['numExemplar'];
        $lv1->prateleira=$_POST['prateleira'];
        $lv1->classificacaoLivro=$_POST['classificacaoLivro'];
        $lv1->autor=$_POST['autor'];
        $lv1->editora=$_POST['editora'];
        $lv1->alterar(); 
     
    }else if($opcao == 0){//deletar
        $lv1->idLivro=$_GET['idLivro'];
        $lv1->delete();
    }else if($opcao == 3){//inserir

        $lv1->titulo=$_POST['titulo'];
        $lv1->ano=$_POST['ano'];
        //$lv1->situacao=$_POST['situacao'];
        $lv1->resumo=$_POST['resumo'];
        $lv1->observacao=$_POST['observacao'];
        $lv1->edicao=$_POST['edicao'];
        $lv1->volume=$_POST['volume'];
        $lv1->numExemplar=$_POST['numExemplar'];
        $lv1->prateleira=$_POST['prateleira'];
        $lv1->classificacaoLivro=$_POST['classificacaoLivro'];
        $lv1->autor=$_POST['autor'];
        $lv1->editora=$_POST['editora'];
        $lv1->verificar();          
    }
   
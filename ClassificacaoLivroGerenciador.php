<?php
    $opcao=$_GET['opcao'];
    include "ClassificacaoLivro.php";
    $class = new ClassificacaoLivro();
    
    if($opcao == 2){//atualizar
        $class->idClassificacaoLivro = $_POST['idClassificacaoLivro'];
        $class->classificacao = $_POST['classificacao'];
        $class->faixaEtaria = $_POST['faixaEtaria'];
        $class->genero = $_POST['genero'];
        $class->alterar();
        //echo "atualizar";
    }else if($opcao == 0){//deletar
        $class->idClassificacaoLivro = $_GET['idClassificacaoLivro'];
        $class->delete();
    }else if($opcao == 3){//inserir
//      $class->idClassificacaoLivro = $_POST[''];
        $class->classificacao=$_POST['classificacao'];
        $class->faixaEtaria=$_POST['faixaEtaria'];
        $class->genero = $_POST['genero'];
        $class->cadastrar();
       //header("location:view/classificacaoLivroView.php");
    }
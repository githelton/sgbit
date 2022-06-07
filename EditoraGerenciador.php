<?php
    $opcao=$_GET['opcao'];
    include "Editora.php";
    $ed1 = new Editora();
    
    if($opcao == 2){//atualizar
        $ed1->idEditora=$_POST['idEditora'];
        $ed1->nome=$_POST['nome'];
        $ed1->cidade=$_POST['cidade'];
        $ed1->endereco=$_POST['endereco'];
        $ed1->fone=$_POST['fone'];
        $ed1->email=$_POST['email'];
        $ed1->alterar();
        //echo "atualizar";
    }else if($opcao == 0){//deletar
        $ed1->idEditora=$_GET['idEditora'];
        $ed1->delete();
    }else if($opcao == 3){//inserir
        $ed1->nome=$_POST['nome'];
        $ed1->cidade=$_POST['cidade'];
        $ed1->endereco=$_POST['endereco'];
        $ed1->fone=$_POST['fone'];
        $ed1->email=$_POST['email'];
        $ed1->cadastrar();
       //header("location:view/classificacaoLivroView.php");
    }
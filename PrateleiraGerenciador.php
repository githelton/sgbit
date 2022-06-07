<?php
    $opcao=$_GET['opcao'];
    include "Prateleira.php";
    $pr1 = new Prateleira();
    
    if($opcao == 2){//atualizar
        $pr1->idPrateleira=$_POST['idPrateleira'];
        $pr1->setor=$_POST['setor'];
        $pr1->fileira=$_POST['fileira'];
        $pr1->capacidade=$_POST['capacidade'];
        $pr1->situacao=$_POST['situacao']; 
            $pr1->alterar();
        //echo "atualizar";
    }else if($opcao == 0){//deletar
            $pr1->idPrateleira=$_GET['idPrateleira'];
            $pr1->delete();
    }else if($opcao == 3){//inserir
        $pr1->setor=$_POST['setor'];
        $pr1->fileira=$_POST['fileira'];
        $pr1->capacidade=$_POST['capacidade'];
        $pr1->situacao=$_POST['situacao'];
             $pr1->cadastrar();
    }
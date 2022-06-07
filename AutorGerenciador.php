<?php
    $opcao=$_GET['opcao'];
    include "Autor.php";
    $au1= new Autor();
    
    if($opcao == 2){//atualizar
        //echo $opcao;
        echo $au1->idAutor;
        $au1->idAutor = $_POST['idAutor'];
        $au1->nome = $_POST['nome'];     
        $au1->alterar();
        
    }else if($opcao == 0){//deletar
        $au1->idAutor = $_GET['idAutor'];
        $au1->delete();
        //echo $autor->idAutor;            
    }else if($opcao == 3){//inserir
        //echo $opcao;
        $au1->nome = $_POST['nome'];
        $au1->cadastrar();
    }
<?php
    $opcao=$_GET['opcao'];
    include "Reserva.php";
    include_once 'Locacao.php';
    $loc1 = new Locacao();
    $res1 = new Reserva();
    
    if($opcao == 2){//atualizar
        $res1->idReserva=$_POST['idReserva'];
        $res1->livro=$_POST['livro'];
        $res1->aluno=$_POST['aluno'];
        $res1->usuario=$_POST['usuario'];
        $res1->dataHoraReserva=$_POST['dataHoraReserva'];
        $res1->alterar();
        //echo "atualizar";
    }else if($opcao == 0){//deletar
        $res1->idReserva=$_GET['idReserva'];
        $res1->remover();
    }else if($opcao == 3){//inserir reserva
        //echo $opcao;
        $res1->livro=$_POST['livro'];
        $res1->aluno=$_POST['aluno'];
        $res1->usuario=$_POST['usuario'];        
        $res1->dataHoraReserva=$_POST['dataHoraReserva'];
        $res1->contar();
    }else if($opcao == 4){//locar
        //echo $opcao;
        $loc1->idReserva=$_GET['idLocacao'];
        $loc1->livro=$_POST['livro'];
        $loc1->aluno=$_POST['aluno'];
        $loc1->usuario=$_POST['usuario'];
        $loc1->dataHoraReserva=$_POST['dataHoraReserva'];
        
    }
    
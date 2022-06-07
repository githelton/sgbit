<?php
    $opcao=$_GET['opcao'];   
    include_once 'Locacao.php';
    include_once 'Reserva.php';
    $loc1 = new Locacao();
    $res1 = new Reserva();
    
    if($opcao == 2){//atualizar
        $loc1->idLocacao=$_POST['idLocacao'];
        $loc1->usuario=($_POST['usuario']);
        $loc1->aluno=$_POST['aluno'];
        $loc1->livro=$_POST['livro'];
        $loc1->dataHoraLocacao=$_POST['dataHoraLocacao'];
        $loc1->dataHoraDevolucao=$_POST['dataHoraDevolucao'];
        //$loc1->pendencia=$_POST['pendencia'];
        //$loc1->observacao=$_POST['observacao'];
        $loc1->alterar();
        
    }else if($opcao == 0){//cancelar
        $loc1->idLocacao=$_GET['idLocacao'];
        $loc1->verificaExcluir();
        
    }else if($opcao == 3){//inserir  
            $loc1->usuario=($_POST['usuario']);
            $loc1->aluno=$_POST['aluno'];
            $loc1->livro=$_POST['livro'];
            $loc1->dataHoraLocacao=$_POST['dataHoraLocacao'];
            $loc1->dataHoraDevolucao=$_POST['dataHoraDevolucao'];
            //$loc1->pendencia=$_POST['pendencia'];
            $loc1->observacao=$_POST['observacao'];
            $loc1->contar() ;     
       
    }else if($opcao == 4){//inserir da reserva    
            $loc1->reservado=$_POST['idReserva'];
            $loc1->usuario=($_POST['usuario']);
            $loc1->aluno=$_POST['aluno'];
            $loc1->livro=$_POST['livro'];
            $loc1->dataHoraLocacao=$_POST['dataHoraLocacao'];
            $loc1->dataHoraDevolucao=$_POST['dataHoraDevolucao'];
            //$loc1->pendencia=$_POST['pendencia'];
            $loc1->observacao=$_POST['observacao'];
            $loc1->contar();          

    }else if($opcao == 5){//devolver
            $loc1->idLocacao=$_GET['idLocacao'];
            $loc1->devolver();
            
    }else if($opcao == 6){//renovar
            $loc1->idLocacao=$_GET['idLocacao'];
            $loc1->renovar();
    }
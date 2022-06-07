<?php
    $opcao=$_GET['opcao'];
    include "Aluno.php";
    $al1 = new Aluno();
    
    if($opcao == 2){//atualizar
        $al1->idAluno=$_POST['idAluno'];
        $al1->cpf=$_POST['cpf'];
        $al1->nome=$_POST['nome'];
        $al1->nascimento=$_POST['nascimento'];
        $al1->sexo=$_POST['sexo'];
        $al1->endereco=$_POST['endereco'];
        $al1->fone=$_POST['fone'];
        $al1->email=$_POST['email'];
        $al1->serie=$_POST['serie'];
        $al1->turma=$_POST['turma'];
        $al1->turno=$_POST['turno'];
        //$al1->situacao=$_POST['situacao'];
        $al1->alterar();
        //echo "atualizar";
    }else if($opcao == 0){//deletar
        $al1->idAluno=$_GET['idAluno'];
        $al1->delete();
    }else if($opcao == 3){//inserir
        //echo $opcao;
        $al1->cpf=$_POST['cpf'];
        $al1->nome=$_POST['nome'];
        $al1->nascimento=$_POST['nascimento'];
        $al1->sexo=$_POST['sexo'];
        $al1->endereco=$_POST['endereco'];
        $al1->fone=$_POST['fone'];
        $al1->email=$_POST['email'];
        $al1->serie=$_POST['serie'];
        $al1->turma=$_POST['turma'];
        $al1->turno=$_POST['turno'];
        $al1->situacao=$_POST['situacao'];
        //$al1->cadastrar();
        $al1->verificarCPF();

    }
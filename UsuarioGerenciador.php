<?php
        require_once 'Usuario.php';       
        $us2 = new Usuario();
        $opcao=$_GET['opcao'];
    
    if($opcao == 2){//atualizar
       //echo $opcao;     
          $us2->idUsuario=$_POST['idUsuario'];
          $us2->cpf=$_POST['cpf'];
          $us2->nome=$_POST['nome'];
          $us2->senha=$_POST['senha'];
          $us2->nascimento=$_POST['nascimento'];
          $us2->sexo=$_POST['sexo'];
          $us2->endereco=$_POST['endereco'];
          $us2->fone=$_POST['fone'];
          $us2->email=$_POST['email'];
          $us2->cargo=$_POST['cargo'];
          $us2->permissao=$_POST['permissao'];
          $us2->alterar();  
         
     }else if($opcao == 0){//deletar
        $us2->idUsuario=$_GET['idUsuario'];
        $us2->delete();
    }else if($opcao == 3){//inserir
        //echo $opcao;
          $us2->cpf=$_POST['cpf'];
          $us2->nome=$_POST['nome'];
          $us2->senha=$_POST['senha'];
          $us2->nascimento=$_POST['nascimento'];
          $us2->sexo=$_POST['sexo'];
          $us2->endereco=$_POST['endereco'];
          $us2->fone=$_POST['fone'];
          $us2->email=$_POST['email'];
          $us2->cargo=$_POST['cargo'];
          $us2->permissao=$_POST['permissao'];
          $us2->cadastrar();

    }   
?>
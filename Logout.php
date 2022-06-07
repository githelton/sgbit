<?php
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
include "Logar.php";
	$obj = New Logar();
	$obj->validaSession();
	$obj->logOut();
	$obj->alerta("Você saiu do sistema e será redirecionado para o login");
	$obj->redireciona("index.php");

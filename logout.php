<?php
	session_start();
	unset($_SESSION['variavelSessaoNome']);
	unset($_SESSION['variavelSessaoSobrenome']);
	unset($_SESSION['variavelSessaoId']);
	unset($_SESSION['logado']);
	session_destroy();

	setcookie('cookieSiscoest', '', time() - 3600);
	
	header('Location: login.php');
?>
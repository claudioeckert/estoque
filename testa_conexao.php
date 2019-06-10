<?php
include_once 'MySQLiConnection.class.php';

//abre a conexão com o MySQL
$conn = new MySQLiConnection();

if($conn)
	echo "Conectado!";

?>
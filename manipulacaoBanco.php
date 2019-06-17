<?php
include_once 'MySQLiConnection.class.php';

function consulta($sql){
    //abre a conexão com o MySQL
    $conexao = new MySQLiConnection();
    $resultado = $conexao->query($sql);
    return $resultado;
}

?>
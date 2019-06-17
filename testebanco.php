<?php

include_once "manipulacaoBanco.php";
$sql = "select * from  usuario where email = 'claudioeckert@gmail.com' and senha = '123'";
    $resultado = consulta($sql);
    $linha =  $resultado->fetch_array();
    echo "numero reg: " . $resultado->num_rows;
    echo $linha['nome'];
    print_r($resultado);
?>
<?php

// Constantes para conexão com o banco de dados:
define ("DB_SERVIDOR", "localhost");
define ("DB_USUARIO", "root");
define ("DB_SENHA", "");
define ("DB_NOME", "estoque");

class MySQLiConnection extends mysqli
{
    public function __construct()
    {
        try
        {            
            parent::__construct (DB_SERVIDOR, DB_USUARIO, DB_SENHA, DB_NOME);
            if (mysqli_connect_errno() != 0)
                throw new Exception (mysqli_connect_errno() . " - " . mysqli_connect_error());
        }
        catch (Exception $db_error)
        {           
            echo 'Erro ao conectar ao banco de dados MySQL: ' . $db_error->getMessage();
            exit;
            
        }
    }
        
    public function __destruct()
    {
        if (mysqli_connect_errno() == 0)
            $this->close();
    }
    
}

?>
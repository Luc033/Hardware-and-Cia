<!-- Conexação com o bando de datos -->
<?php
 
Class ConnectBD{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "ecommerce";

    public function connection()
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        return $conn;
    }
 
}

?> 

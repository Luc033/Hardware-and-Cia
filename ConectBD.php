<?php
// Conexão com o banco de dados (exemplo usando MySQLi)
    $servername = "localhost"; // Altere com o nome do servidor do seu banco de dados
    $username = "root"; // Altere com o nome de usuário do seu banco de dados
    $password = ""; // Altere com a senha do seu banco de dados
    $database = "ecommerce"; // Altere com o nome do seu banco de dados

    // Cria a conexão
    $conn = new mysqli($servername, $username, $password, $database);

    // Verifica se houve algum erro na conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }
    ?>
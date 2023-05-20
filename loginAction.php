<?php

// Inicie a sessão
session_start();

// Verifique se a requisição foi feita usando o método POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recupere os dados do formulário
    $email = $_POST["email"];
    $senha = $_POST["pws"];

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

    // Consulte o banco de dados para verificar o email e a senha
    $consulta = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $resultado = $conn->query($consulta);

    // Verifique se a consulta retornou algum resultado
    if ($resultado-> num_rows = 1) {
        // Email e senha válidos

        // Inicie a sessão e armazene o email do usuário
        $_SESSION["email"] = $email;

        // Redirecione para a página de index logado
        header("Location: index-logado.html");
        exit(); // Certifique-se de sair do script após o redirecionamento
    } else {
        // Email ou senha inválidos, exiba uma mensagem de erro ou redirecione para uma página de erro, se desejar
        echo "Email ou senha inválidos";
    }

    // Feche a conexão com o banco de dados
    $conexao->close();
}
?>

<?php

// Configuração do banco de dados
$servername = "localhost";
$username = "usuario"; //usuario bd
$password = "senha"; // senha do bd
$dbname = "ecommerce"; // nome do bd

// Cria a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão ocorreu sem problemas
if ($conn->connect_error) {
  die("Erro na conexão: " . $conn->connect_error);
}

$username = mysqli_real_escape_string($conexao, $_POST['email']);
$query = "SELECT * FROM cliente WHERE email = '$email'";
$resultado = mysqli_query($conexao, $query);

if ($row = mysqli_fetch_array($resultado)) {
    if (password_verify($_POST['pws'], $row['senha'])) {
      // Login bem-sucedido, redireciona o usuário para a página inicial
      header("Location: index-logado.html");
    } else {
      // Senha incorreta, exibe uma mensagem de erro
      echo "Senha incorreta";
    }
  } else {
    // Nome de usuário não encontrado, exibe uma mensagem de erro
    echo "Usuário não encontrado";
  }
?>
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

// deixa escapar os caracteres especiais presentes em uma string permitindo consulta segura
$email = mysqli_real_escape_string($conn, $_POST['email']);

// prepared statements para separar as instruções SQL da entrada do usuário ( evita SQL injection)
$stmt = $conn->prepare("SELECT * FROM cliente WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$resultado = $stmt->get_result();

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
// fechar as conexões para evitar vazamento de memória
$stmt->close();
$conn->close();

?>

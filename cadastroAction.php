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

// Obtém os dados do formulário e aplica as devidas validações
$nome = mysqli_real_escape_string($conn, $_POST['name']);
$sobrenome = mysqli_real_escape_string($conn, $_POST['secName']);
$rua = mysqli_real_escape_string($conn, $_POST['rua']);
$numero = mysqli_real_escape_string($conn, $_POST['numero']);
$complemento = mysqli_real_escape_string($conn, $_POST['complement']);
$bairro = mysqli_real_escape_string($conn, $_POST['bairro']);
$cidade = mysqli_real_escape_string($conn, $_POST['cidade']);
$estado = mysqli_real_escape_string($conn, $_POST['Estado']);
$cep = mysqli_real_escape_string($conn, $_POST['cep']);
$cpfCnpj = mysqli_real_escape_string($conn, $_POST['cpfCnpj']);
$telefone = mysqli_real_escape_string($conn, $_POST['tel']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = password_hash($_POST['pws'], PASSWORD_DEFAULT);

// Cria a query SQL de inserção com prepared statements
$stmt = $conn->prepare("INSERT INTO cliente (primeiroNome, sobrenome, rua, numero, complemento, bairro, cidade, estado, cep, cpf_cnpj, telefone, email, senha) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssssss", $nome, $sobrenome, $rua, $numero, $complemento, $bairro, $cidade, $estado, $cep, $cpfCnpj, $telefone, $email, $password);
$stmt->execute();

// Verifica se a inserção foi bem sucedida
if ($stmt->affected_rows > 0) {
  echo "Dados salvos com sucesso!";
} else {
  echo "Erro ao salvar dados: " . $conn->error;
}

// Fecha a conexão com o banco de dados
$stmt->close();
$conn->close();
?>
?>
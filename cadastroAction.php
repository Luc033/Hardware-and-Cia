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

// Obtém os dados do formulário
$nome = $_POST['name'];
$sobrenome = $_POST['secName'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$complemento = $_POST['complement'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['Estado'];
$cep = $_POST['cep'];
$cpfCnpj = $_POST['cpfCnpj'];
$telefone = $_POST['tel'];
$email = $_POST['email'];
$password = $_POST['pws'];


// Cria a query SQL de inserção
$sql = "INSERT INTO cliente (primeiroNome, sobrenome, rua, numero, complemento, bairro, cidade, estado, cep, cpf_cnpj, telefone, email, senha ) VALUES ('$nome', 'sobrenome', '$rua', '$numero', '$complemento', $bairro', $cidade', '$estado', '$cep', '$cpfCnpj', '$telefone', '$email', '$password')";

// Executa a query SQL de inserção
if ($conn->query($sql) === TRUE) {
  echo "Dados salvos sucesso";
} else {
  echo "Erro ao salvar dados: " . $conn->error;
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
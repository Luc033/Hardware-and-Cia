<?php


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recupera os dados do formulário
    $name = $_POST["name"];
    $secName = $_POST["secName"];
    $dn = $_POST["dn"];
    $cpfCNPJ = $_POST["cpfCNPJ"];
    $telefone = $_POST["telefone"];
    $rua = $_POST["rua"];
    $numero = $_POST["numero"];
    $complemento = $_POST["complemento"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $cep = $_POST["cep"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    //requisita conexão com BD
    Require 'ConectBD.php';

    // Prepara a consulta SQL para inserir os dados na tabela
    $sql = "INSERT INTO cliente (nome, sobrenome, dataNascimento, cpf_cnpj, telefone, rua, numero, complemento, bairro, cidade, estado, cep, email, senha)
            VALUES ('$name', '$secName', '$dn', '$cpfCNPJ', '$telefone', '$rua', '$numero', '$complemento', '$bairro', '$cidade', '$estado', '$cep', '$email', '$senha')";

    // Executa a consulta
    if ($conn->query($sql) === TRUE) {
        // Redireciona para a página de login
        header("Location: login.html");
        exit(); // Certifique-se de sair do script após o redirecionamento
    } else {
        echo "Erro ao cadastrar os dados: " . $conn->error;
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}

?>

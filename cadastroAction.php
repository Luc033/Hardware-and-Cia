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

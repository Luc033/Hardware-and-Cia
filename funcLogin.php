<?php

// Inicie a sessão
session_start();

// Verifique se a requisição foi feita usando o método POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recupere os dados do formulário
    $id = $_POST["idFunc"];
    $senha = $_POST["senha"];

    //requisita conexão com o BD
    Require 'ConectBD.php';

    // Consulte o banco de dados para verificar o email e a senha
    $funcionario = "SELECT * FROM funcionario WHERE idFuncionario = '$id' AND senhaFunc = '$senha'";
    $resultado = $conn->query($funcionario);

    // Verifica se a consulta retornou algum resultado
    if ($resultado->num_rows === 1) {
        // Email e senha válidos

        // Inicie a sessão e armazene o id do funcionario
        $_SESSION["idFuncionario"] = $id;

        // Redireciona para a página de logado
        header("Location: func-logado.php");
        exit(); // Certifique-se de sair do script após o redirecionamento
    } else {
        // Email ou senha inválidos
        echo "Email e/ou Senha inválidos";
    }

    // Feche a conexão com o banco de dados
    $conn->close();
}

?>
<?php

// Inicie a sessão
session_start();

// Verifique se a requisição foi feita usando o método POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recupere os dados do formulário
    $idFuncionario = $_POST["number"];
    $senha = $_POST["senha"];

    
    //requisita conexão com BD
    Require 'ConectBD.php';

    // Consulte o banco de dados para verificar o id e a senha
    $funcionario = "SELECT * FROM funcionario WHERE idFuncionario = '$idFuncionario' AND senhaFunc = '$senha'";
    $resultado = $conn->query($funcionario);

    if ($resultado->num_rows === 1) {
        $row = $resultado->fetch_assoc();
        $idFuncionario = $row['idFuncionario'];
        
        // Inicie a sessão
        $_SESSION["idFuncionario"] = $idFuncionario;

        // Redireciona para a página de logado
        header("Location: func-logado.php");
        exit(); // Certifique-se de sair do script após o redirecionamento
    } else {
        // Email ou senha inválidos
        echo "Id e/ou Senha inválidos";
    }

    // Feche a conexão com o banco de dados
    $conn->close();
    }

?>
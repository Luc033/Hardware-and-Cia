<?php

// incluir a classe cliente
require_once 'Cliente.php';

    // Cria um novo objeto Cliente
    $cliente = new Cliente();
    
    // Define os valores dos campos usando os dados do formulário
    $cliente->setNome($_POST["nome"]);
    $cliente->setSobrenome($_POST["sobrenome"]);
    $cliente->setDatanascimento($_POST["dataNascimento"]);
    $cliente->setCpf_cnpj($_POST["cpf_cnpj"]);
    $cliente->setTelefone($_POST["tel"]);
    $cliente->setRua($_POST["rua"]);
    $cliente->setNumero($_POST["numero"]);
    $cliente->setComplemento($_POST["complemento"]);
    $cliente->setBairro($_POST["bairro"]);
    $cliente->setCidade($_POST["cidade"]);
    $cliente->setEstado($_POST["estado"]);
    $cliente->setCep($_POST["cep"]);
    $cliente->setEmail($_POST["email"]);
    $cliente->setSenha($_POST["senha"]);
    
    // Insere o novo cliente no banco de dados
    if ($cliente->insertBD()) {
        // Redireciona o usuário para a página de sucesso
        header("Location: login.html");
        exit;
    } else {
        // Exibe uma mensagem de erro
        echo "Ocorreu um erro ao cadastrar o cliente.";
    }

?>

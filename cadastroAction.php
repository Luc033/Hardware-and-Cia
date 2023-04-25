<?php
/*
// Configuração do banco de dados
require_once 'Connect.php';

//Insere os dados na tabela cliente

$sql = "INSERT INTO cliente (nome, sobrenome, dataNascimento, rua, numero, complemento, bairro, cidade, estado, cep, cpf_cnpj, telefone, email, senha) VALUES
('".$_POST['name']."','"
.$_POST['sobrenome']."', '".$_POST['rua']."', '".$_POST['dataNasc']."', '".$_POST['numero']."', '".$_POST['complemento']."', '".$_POST['bairro']."', '".$_POST['cidade']."', '".$_POST['estado']."', '".$_POST['cep']."', '".$_POST['cpf_cnpj']."', '".$_POST['tel']."', '".$_POST['email']."', '".$_POST['pws']."')";

// se cadastrado com sucesso envia para a pagina de login
if ($connection->query($sql) === TRUE) {
    echo '
    <a href="login.html">
        <h1 class="w3-button w3-teal">Dados cadastrados com sucesso! </h1><br>
        <h1> Faça login para continuar</h1>

    </a> 
    ';

    // se der erro, avisa para refazer o cadastro mantendo na tela de cadastro
} else {
    echo '
    <a href="cadastro.html">
        <h1 class="w3-button w3-teal">ERRO! </h1>
    </a> 
    ';
    echo $connection->error;
}

$connection->close();*/

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

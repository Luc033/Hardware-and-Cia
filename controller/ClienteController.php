<!--Controller de dados do cliente-->
<?php
if(!isset($_SESSION))
{
session_start();
}
class ClienteController{
    
    //inserir cliente session
    public function inserir($nome, $sobrenome, $dataNascimento, $cpf_cnpj, $telefone, $rua, $numero, $complemento, $bairro, $cidade, $estado, $cep,  $email, $senha) {
    require_once '..\Model\Cliente.php';
    $cliente = new Cliente();
    $cliente->setNome($nome);
    $cliente->setSobrenome($sobrenome);
    $cliente->setDatanascimento($dataNascimento);
    $cliente->setCpf_cnpj($cpf_cnpj);
    $cliente->setTelefone($telefone);
    $cliente->setRua($rua);
    $cliente->setNumero($numero);
    $cliente->setComplemento($complemento);
    $cliente->setBairro($bairro);
    $cliente->setCidade($cidade);
    $cliente->setEstado($estado);
    $cliente->setCep($cep);
    $cliente->setEmail($email);
    $cliente->setSenha($senha);
    $r = $cliente->insertBD();
    $_SESSION['Cliente'] = serialize($cliente);
    return $r;
    }

    //atualizar dados session
    public function atualizar($id,$nome, $sobrenome, $dataNascimento, $cpf_cnpj, $telefone, $rua, $numero, $complemento, $bairro, $cidade, $estado, $cep,  $email, $senha) {
        require_once '..\Model\Cliente.php';
        $cliente = new Cliente();
        $cliente->setID($idCliente);
        $cliente->setNome($nome);
        $cliente->setSobrenome($sobrenome);
        $cliente->setDatanascimento($dataNascimento);
        $cliente->setCpf_cnpj($cpf_cnpj);
        $cliente->setTelefone($telefone);
        $cliente->setRua($rua);
        $cliente->setNumero($numero);
        $cliente->setComplemento($complemento);
        $cliente->setBairro($bairro);
        $cliente->setCidade($cidade);
        $cliente->setEstado($estado);
        $cliente->setCep($cep);
        $cliente->setEmail($email);
        $cliente->setSenha($senha);
        $r = $cliente->updateBD();
        $_SESSION['Cliente'] = serialize($cliente);
        return $r;
    }

    //login cliente
    public function login($email, $senha)
    {
        require_once '..\model\Cliente.php';
        $cliente = new Cliente();
        $cliente->selectBD($email);
        $verSenha=$cliente->getSenha();
        if($senha==$verSenha)
        {
            $_SESSION['Cliente'] = serialize($cliente);
            return true;
        }
        else
        {
            return false;
        }
    }
}
?>
<!--Classe cliente -->
<?php

Class cliente{
    private $idCliente;
    private $nome;
    private $sobrenome;
    private $dataNascimento;
    private $rua;
    private $numero;
    private $bairro;
    private $complemento;
    private $cidade;
    private $estado;
    private $cep;
    private $cpf_cnpj;
    private $telefone;
    private $email;
    private $senha;

    //ID do cliente
    public function setID($idCliente)
    {
        $this->idCliente = $idCliente;
    }
    public function getID()
    {
        return $this->idCliente;
    }

    //Dados pessoais do cliente (nome,sobrenome,data de nascimento,cpf_cnpj e telefone)
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function getNome()
    {
        return $this->nome;
    }

    public function setSobrenome($sobrenome)
    {
        $this->sobrenome = $sobrenome;
    }
    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    public function setDatanascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
    }
    public function getDatanascimento()
    {
        return $this->dataNascimento;
    }

    public function setCpf_cnpj($cpf_cnpj)
    {
        $this->cpf_cnpj = $cpf_cnpj;
    }
    public function getCpf_cnpj()
    {
        return $this->cpf_cnpj;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }
    public function getTelefone()
    {
        return $this->telefone;
    }

    //Endereço do cliente
    public function setRua($rua)
    {
        $this->rua = $rua;
    }
    public function getRua()
    {
        return $this->rua;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
    }
    public function getNumero()
    {
        return $this->numero;
    }

    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
    }
    public function getComplemento()
    {
        return $this->complemento;
    }

    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }
    public function getBairro()
    {
        return $this->bairro;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }
    public function getCidade()
    {
        return $this->cidade;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
    public function getEstado()
    {
        return $this->estado;
    }

    public function setCep($cep)
    {
        $this->cep = $cep;
    }
    public function getCep()
    {
        return $this->cep;
    }

    //Dados de login (email e senha)
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }
    public function getSenha()
    {
        return $this->senha;
    }

    //Inserir dados no banco de dados (cadastro)
    //Inserir dados no banco de dados (cadastro)
    public function insertBD()
    {
        require_once 'ConnectBD.php';

        $con = new ConnectBD();
        $conn = $con->connection();
        if ($conn->connect_error){
            die("Connection Failed: ".$conn->connect_error);
        }

        $sql = "INSERT INTO cliente (nome, sobrenome, dataNascimento, rua, numero, complemento, bairro, cidade, estado, cep, cpf_cnpj, telefone, email, senha) VALUES ('".$this->nome."','".$this->sobrenome."','".$this->dataNascimento."','".$this->rua."','".$this->numero."','".$this->complemento."','".$this->bairro."','".$this->cidade."','".$this->estado."','".$this->cep."','".$this->cpf_cnpj."','".$this->telefone."','".$this->email."', '".$this->senha."')";

        if($conn->query($sql) === TRUE){
            $this->idCliente = mysqli_insert_id($conn);
            $conn->close();
            return TRUE;
       
        }else {
            $conn->close();
            return FALSE;
        }
    }


    /*Fazer login (?????)
    public function login();
    {
        require_once 'ConnectBD.php';

        $con = new ConnectBD();
        $conn = $con->connection();
        if ($conn->connect_error){
            die("Connection Failed: ".$conn->connect_error);
        }

        $sql = "SELECT FROM cliente WHERE email = ".$email;
        $re = $conn->query($sql);
        $r = $re->fetch_object();
        if ($r != NULL){
            (verificar senha, olhar documentação para fazer isso)
    }
    */

    //Consultar os dados do banco de dados (perfil do usuário)
    public function selectBD()
    {
        require_once 'ConnectBD.php';

        $con = new ConnectBD();
        $conn = $con->connection();
        if ($conn->connect_error){
            die("Connection Failed: ".$conn->connect_error);
        }

        $sql = "SELECT * FROM cliente WHERE idCliente = ".$idCliente;
        $re = $conn->query($sql);
        $r = $re->fetch_object();
        if ($r != NULL){

            $this->idCliente = $r->idCliente;
            $this->nome = $r->nome;
            $this->sobrenome = $r->sobrenome;
            $this->dataNascimento = $r->dataNascimento;
            $this->cpf_cnpj = $r->cpf_cnpj;
            $this->telefone = $r->telefone;
            $this->rua = $r->rua;
            $this->numero = $r->numero;
            $this->complemento = $r->complemento;
            $this->bairro = $r->bairro;
            $this->cidade = $r->cidade;
            $this->estado = $r->estado;
            $this->cep = $r->cep;
            $this->email = $r->email;
            $this->senha = $r->senha;
            $conn->close();
            return TRUE;

        } else {
            $conn->close();
            return FALSE;
        }

    }

    //Atualizar os dados do banco de dados (atualizar dados)
    public function updateBD()
    {
        require_once 'ConnectBD.php';

        $con = new ConnectBD();
        $conn = $con->connection();
        if ($conn->connect_error){
            die("Connection Failed: ".$conn->connect_error);
        }

        $sql = "UPDATE cliente SET nome ='".$this->nome."', sobrenome = '".$this->sobrenome."', dataNascimento = '".$this->dataNascimento."' , rua = '".$this->rua."', numero = '".$this->numero."', complemento = '".$this->complemento."', bairro = '".$this->bairro."', cidade = '".$this->cidade."', estado = '".$this->estado."', cep = '".$this->cep."', cpf_cnpj = '".$this->cpf_cnpj."', telefone = '".$this->telefone."', email = '".$this->email."', senha = '".$this->senha."' WHERE idCliente = '".$this->idCliente."'";
        
        if($conn->query($sql) === TRUE){
            $conn->close();
            return TRUE;
       
        }else {
            $conn->close();
            return FALSE;
        }

    }

    //Deletar os dados do banco de dados (deletar conta)
    public function deleteBD()
    {
        require_once 'ConnectBD.php';

        $con = new ConnectBD();
        $conn = $con->connection();
        if ($conn->connect_error){
            die("Connection Failed: ".$conn->connect_error);
        }

        $sql = "DELETE * FROM cliente WHERE idCliente = '".$idCliente."'";

        if($conn->query($sql) === TRUE){
            $conn->close();
            return TRUE;
       
        }else {
            $conn->close();
            return FALSE;
        }

    }

}
?>
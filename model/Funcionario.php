<!--  Classe Funcionario-->
<?php

Class Funcionario{
    private $idFuncionario;
    private $emailFunc;
    private $senhaFunc;

    //metodos setters e getters
    public function setIdfuncionario($idFuncionario)
    {
        $this->idFuncionario = $idFuncionario;
    }
    public function getIdfuncionario()
    {
        return $this->idFuncionario;
    }

    public function setEmail($emailFunc)
    {
        $this->email = $emailFunc;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setSenha($senhaFunc)
    {
        $this->senha = $senhaFunc;
    }
    public function getSenha()
    {
        return $this->senha;
    }

    //Metodo seleciona procedure para relátorio venda
    public function relatorioVenda()
    {
        require_once 'ConnectBD.php';

        $con = new ConnectBD();
        $conn = $con->connection();
        if ($conn->connect_error){
            die("Connection Failed: ".$conn->connect_error);
        }

        $sql = "CALL gerar_relatorio_semanal(id_pedido, data_pedido, statusPedido, nomeProduto, categoria, valor, qtdprodutopedido)";
        $result = $conn->query($sql);
        echo "<table>\n";
        echo "<tr>
            <th>ID Pedido</th>
            <th>Data Pedido</th>
            <th>Status</th>
            <th>Nome do Produto</th>
            <th>Categoria</th>
            <th>Valor</th>
            <th>Quantidade</th>
            </tr>\n";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                  <td>".$row['id_pedido']."</td>
                  <td>".$row['data_pedido']."</td>
                  <td>".$row['statusPedido']."</td>
                  <td>".$row['nomeProduto']."</td>
                  <td>".$row['categoria']."</td>
                  <td>".$row['valor']."</td>
                  <td>".$row['qtdprodutopedido']."</td>
                  </tr>\n";
        }
        echo "</table>\n";
        /*$rows = $result->fetch_all(MYSQLI_ASSOC);
        foreach ($rows as $row) {
            echo $row['id_pedido'] . "<br>\n" .
            $row['data_pedido'] . "<br>\n" .
            $row['statusPedido'] . "<br>\n" .
            $row['nomeProduto'] . "<br>\n" .
            $row['categoria'] . "<br>\n" .
            $row['valor'] . "<br>\n" .
            $row['qtdprodutopedido'] . "<br>\n";
        }*/

    }

    public function relatorioEstoque()
    {
        require_once 'ConnectBD.php';

        $con = new ConnectBD();
        $conn = $con->connection();
        if ($conn->connect_error){
            die("Connection Failed: ".$conn->connect_error);
        }

        $sql = "SELECT * FROM relatorio_estoque WHERE funcionario_idFuncionario = ".$idFuncionario;
        $result = $conn->query($sql);
        echo "<table>\n";
        echo "<tr>
            <th>ID Estoque</th>
            <th>ID Funcionario</th>
            <th>ID Produto</th>
            <th>Nome Produto</th>
            <th>Quantidade em estoque</th>
            </tr>\n";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                  <td>".$row['idEstoque']."</td>
                  <td>".$row['funcionario_idFuncionario']."</td>
                  <td>".$row['produto_idProduto']."</td>
                  <td>".$row['nomeProduto']."</td>
                  <td>".$row['quantidadeEstoque']."</td>
                  </tr>\n";
        }
        echo "</table>\n";
    
    }

    public function selectBD($emailFunc)
    {
        require_once 'ConnectBD.php';

        $con = new ConnectBD();
        $conn = $con->connection();
        if ($conn->connect_error){
            die("Connection Failed: ".$conn->connect_error);
        }

        $sql = "SELECT * FROM funcionario WHERE idFuncionario = ".$idFuncionario;
        $re = $conn->query($sql);
        $r = $re->fetch_object();
        if ($r != NULL){
            
            $this->idFuncionario = $r->idFncionario;
            $this->nome = $r->nomeFunc;
            $this->sobrenome = $r->sobrenomeFunc;
            $this->email = $r->emailFunc;
            $this->senha = $r->senhaFunc;
            $conn->close();
            return TRUE;

        } else {
            $conn->close();
            return FALSE;
        }
    }
}

?>
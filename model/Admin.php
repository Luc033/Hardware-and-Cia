<!--  Classe Admin-->
<?php

Class Admin{
    private $idAdmin;
    private $email;
    private $senha;

    //metodos setters e getters
    public function setIdAdmin($idAdmin)
    {
        $this->idAdmin = $idAdmin;
    }
    public function getIdAdmin()
    {
        return $this->idAdmin;
    }

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

    //Metodo seleciona procedure para relátorio estoque
    public function relatorioEstoque()
    {
        require_once 'ConnectBD.php';

        $con = new ConnectBD();
        $conn = $con->connection();
        if ($conn->connect_error){
            die("Connection Failed: ".$conn->connect_error);
        }

        
    }

    //Metodo seleciona procedure para relátorio adm
    public function relatorioAdmin()
    {
        require_once 'ConnectBD.php';

        $con = new ConnectBD();
        $conn = $con->connection();
        if ($conn->connect_error){
            die("Connection Failed: ".$conn->connect_error);
        }

        
    }
}

?>
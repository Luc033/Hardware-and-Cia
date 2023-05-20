<!-- controller funcionario -->
<?php
if(!isset($_SESSION))
{
session_start();
}
class FuncioController{
    
    //login funcionario
    public function login($idFuncionario, $senha)
    {
        require_once '..\model\Funcionario.php';
        $funcionario = new Funcionario();
        $funcionario->selectBD($idFuncionario);
        $verSenha=$funcionario->getSenha();
        if($senha==$verSenha)
        {
            $_SESSION['Funcionario'] = serialize($funcionario);
            return true;
        }
        else
        {
            return false;
        }
    }

    //relatorio de vendas
    public function relatoriovenda()
    {
        require_once '..\model\Funcionario.php';
        $funcionario = new Funcionario();

    
    }

    //relatorio de estoque
    public function relatorioestoque()
    {
        require_once '..\model\Funcionario.php';
        $funcionario = new Funcionario();

    
    }
}
?>
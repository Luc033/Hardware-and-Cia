<!-- controller Admin -->
<?php
if(!isset($_SESSION))
{
session_start();
}
class AdminController{
    
    //login Admin
    public function login($idAdm, $senha)
    {
        require_once 'model\Admin.php';
        $admin = new Admin();
        $admin->selectBD($idAdm);
        $verSenha=$admin->getSenha();
        if($senha==$verSenha)
        {
            $_SESSION['Admin'] = serialize($admin);
            return true;
        }
        else
        {
            return false;
        }
    }

    // relatorio de vendas
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

    //relatorio administrativo
    public function relatorioADM()
    {
        require_once '..\model\Funcionario.php';
        $funcionario = new Funcionario();

    
    }

     
}
?>
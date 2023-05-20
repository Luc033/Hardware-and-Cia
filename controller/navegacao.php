<!--Navegação--falta terminar-->
<?php

switch ($_POST) {
    //Caso a variavel seja nula mostra a pagina principal
    case isset($_POST[null]):
    include_once 'view/index.php';
    break;

    //---LoginCliente--//
    case isset($_POST["btn-loginCliente"]):
        require_once '..\controller\ClienteController.php';

        $cController = new ClienteController();

        if($cController->login($_POST['email'], $_POST['senha']))
        {
            include_once '..\view\index-logado.php';
        }
        else
        {
            //mostrar mensagem de erro (criar mensagem) 
            include_once '..\view\login.php';
        }
        break;

    //---CadastroCliente--//
    case isset($_POST["btn-cadastro"]):
    require_once '..\controller\ClienteController.php';

    $cController = new ClienteController();

    if($cController->insert($_POST["name"],$_POST["secName"],$_POST["dn"],$_POST['cpfCnpj'],$_POST['tel'],$_POST['rua'],$_POST['numero'],$_POST['complemento'],$_POST['bairro'],$_POST['cidade'],$_POST['Estado'],$_POST['cep'],$_POST['email'],$_POST['pws']))
    {
        include_once '..\view\login.php';
    }
    else
    {
        //mostrar mensagem de erro (criar mensagem) 
        include_once '..\view\cadastro.php';
    }
    break;

    //--Perfil Cliente--//
    case isset($_POST['Btn-PerfilCliente']);
    require_once '..\controller\ClienteController.php';

    $cController = new ClienteController();
    
    include_once '..\view\userProfile.php';
    break;
    


    //---LoginFuncionario--//
    case isset($_POST["btn-loginFunc"]):
        require_once '..\controller\FuncioController.php';

        $fController = new FuncioController();

        if($fController->login($_POST['id'], $_POST['senha']))
        {
            include_once '..\view\func-logado.php';
        }
        else
        {
            //mostrar mensagem de erro (criar mensagem) 
            include_once '..\view\loginFunc.php';
        }
        break;

    //---RelatorioFuncio--//
    case isset($_POST["btn-relatorioFunc"]):
        include_once '..\view\relatorios-func.php';
            

    //---LoginAdm--//
    case isset($_POST["btn-loginAdm"]):
        require_once '..\controller\AdmController.php';

        $aController = new AdmController();

        if($aController->login($_POST['id'], $_POST['senha']))
        {
            include_once '..\view\adm-logado.php';
        }
        else
        {
            //mostrar mensagem de erro (criar mensagem) 
            include_once '..\view\loginAdm.php';
        }
        break;
    
    //---RelatorioADM--//
    case isset($_POST["btn-relatorioAdm"]):
        include_once '..\view\relatorios-adm.php';



}
?>
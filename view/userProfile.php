<!--include do css-->
<?php 
include_once 'view\estilos\reset.css';
include_once 'view\estilos\estilos.css';
include_once 'view\estilos\userProfile.css';
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfil</title>
    <!-- reset incluído-->
    <link rel="stylesheet" href="estilos/reset.css" />

    <!-- css -->
    <link rel="stylesheet" href="estilos/userProfile.css" />

    <!-- BootStrap Css -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />

    <!-- Bootstrap js -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"
    ></script>

    <!-- Bootstrap Icons -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"
    />

    <!-- FONT-FAMILY-->
    <!-- Poppins -->
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:wght@100&display=swap"
      rel="stylesheet"
    />

    <!-- Roboto -->
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    
    <!--Sessão php-->
    <?php
        include_once 'model\Cliente.php';
        if(!isset($_SESSION))
        {
            session_start();
        }
    ?>
    <main>
      <div class="content-profile">
        <h1>Informações de Usuário</h1>
        <form action="controller\ClienteController.php">
          <div class="row">

            <div class="IdUser form-group col-12 col-md-6">
              <label>Nome: <input type="hidden" value ="<?php echo unserialize($_SESSION['Cliente'])->getId();?>"></input></label>
            </div>

            <div class="nameUser form-group col-12 col-md-6">
              <label>Nome: <input disabled value ="<?php echo unserialize($_SESSION['Cliente'])->getNome();?>"></input></label>
            </div>

            <div class="lastNameUser form-group col-12 col-md-6">
              <label>Sobrenome: <input disabled value ="<?php echo unserialize($_SESSION['Cliente'])->getSobrenome();?>"></inp></label>
            </div>

            <div class="dataUser form-group col-12 col-md-6">
              <label>Data de Nascimento: <input type="date" disabled value ="<?php echo unserialize($_SESSION['Cliente'])->getDatanascimento();?>"></inp></label>
            </div>
            
            <div class="telUser form-group col-12 col-md-6">
              <label>Telefone: <input disabled value ="<?php echo unserialize($_SESSION['Cliente'])->getTelefone();?>"></inp></label>
            </div>
      
            <div class="cpfUser form-group col-md-6 col-12">
              <label>CPF/CNPJ: <input disabled value ="<?php echo unserialize($_SESSION['Cliente'])->getCpf_cnpj();?>"></inp></label>
            </div>
            
            <div class="emailUser form-group col-md-6 col-12">
              <label>Email: <input disabled value ="<?php echo unserialize($_SESSION['Cliente'])->getEmail();?>"></inp></label>
            </div>

            <div class="ruaUser form-group col-md-6 col-12">
              <label>Rua: <input disabled value ="<?php echo unserialize($_SESSION['Cliente'])->getRua();?>"></inp></label>
            </div>

            <div class="numeroCasaUser form-group col-md-6 col-12">
              <label>N°: <input disabled value ="<?php echo unserialize($_SESSION['Cliente'])->getNumero();?>"></inp></label>
            </div>

            <div class="bairroUser form-group col-md-6 col-12">
              <label>Bairro: <input disabled value ="<?php echo unserialize($_SESSION['Cliente'])->getBairro();?>"></inp></label>
            </div>
            
            <div class="cidadeUser form-group col-md-6 col-12">
              <label>Cidade: <input disabled value ="<?php echo unserialize($_SESSION['Cliente'])->getCidade();?>"></inp></label>
            </div>

            <div class="estadoUser form-group col-md-6 col-12">
              <label>Estado: <input disabled value ="<?php echo unserialize($_SESSION['Cliente'])->getEstado();?>"></inp></label>
            </div>

            <div class="cepUser form-group col-md-6 col-12">
              <label>CEP: <input disabled value ="<?php echo unserialize($_SESSION['Cliente'])->getCep();?>"></inp></label>
            </div>

            <div class="buttons">
              <button class="editUser">Editar Perfil</button>
              <button class="leaveUser">Sair</button>
              <button class="removeUser">Excluir</button>
            </div>
            </div>
        </form>
      </div>
    </main>
  </body>
</html>

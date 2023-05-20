<!--include do css-->
<?php 
include_once 'view\estilos\reset.css';
include_once 'view\estilos\estilos.css';
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tela de login - Funcionário</title>
    <!-- reset incluído-->
    <link rel="stylesheet" href="estilos/reset.css" />

    <!-- css -->
    <link rel="stylesheet" href="estilos/style.css" />

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
    <!-- Favicon -->
    <link rel="shortcut icon" href="imagens/favicon.png" type="image/x-icon" />
  </head>
  <body class="login-body">
    <div class="form-login form-cadastro form-func">
      <form action="controller\FuncioController.php" method="post">
        <div class="row">
          <h1 class="h1-login text-center">FUNCIONÁRIO!</h1>
          <h1 class="text-center">Bem vindo de volta ao nosso E-commerce</h1>
          <h2 class="text-center">
            Preencha os campos abaixo para prosseguir com sua conta
          </h2>
          <div class="form-group number">
            <label for="number">ID</label>
            <input
              type="number"
              name="number"
              class="form-control"
              id="number"
              placeholder="Informe seu ID"
            />
          </div>
          <div class="form-group">
            <label for="password">Senha </label>
            <div class="senha-view">
              <input
                type="password"
                class="form-control"
                id="pws"
                placeholder="Entre com sua senha"
              />
              <i id="olho-aberto" class="olho bi bi-eye-fill"></i>
              <i id="olho-fechado" class="olho bi bi-eye-slash-fill"></i>
            </div>
          </div>
          <a href="#">
            <button type="submit">Continuar</button>
          </a>
          <a class="link-esqueceu-senha" href="#">
            <p class="text-center">Esqueceu a senha? <u>Clique aqui</u></p>
          </a>
        </div>
      </form>
    </div>

    <script src="js/login.js"></script>
  </body>
</html>

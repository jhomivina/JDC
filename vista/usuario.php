<!DOCTYPE html>
<html>

<head><br>
    <meta charset="utf-8">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/solid.css" integrity="sha384-QokYePQSOwpBDuhlHOsX0ymF6R/vLk/UQVz3WHa6wygxI5oGTmDTv8wahFOSspdm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/fontawesome.css" integrity="sha384-vd1e11sR28tEK9YANUtpIOdjGW14pS87bUBuOIoBILVWLFnS+MCX9T6MMf0VdPGq" crossorigin="anonymous">
</head>

<body class="text-white"><br>
    <div class="row text-center">
      <div class="col-md-2"> <a href="../index.html" class="btn text-white btn-xs btn-success" role="button"><strong>Volver al Inicio</strong></a></div>
      <div class="col-md-8" style="display-inline: block;"><h1>Biblioteca Juan de Cabrera</h1></div>
      <div class="col-md-2"></div>
    </div><br><br>
    <div class="login-box text-center">
      <img src="../resources/logo1.jpg" class="avatar" alt="Avatar Image">
      <h1 class="text text-success"><strong>¡BIENVENIDO!</strong></h1>
      <form name="usuario.html" action="../controlador/usuario/registrar.usuario.php" method="POST">
        <!-- USERNAME INPUT -->
        <label for="username">Nombre de Usuario</label>
        <input type="text" id="user" name="user" placeholder="Ingrese Nombre de Usuario" required>
        <label for="email">Correo Electronico</label>
        <input type="email" id="email" name="email" placeholder="Ingrese Correo Electronico" required>
        <!-- PASSWORD INPUT -->
        <label for="password">Contraseña</label>
        <input type="password" id="pass" name="pass" placeholder="Ingrese Contraseña" required />
        <label for="passwordconfirm">Confirmar Contraseña</label>
        <input type="password" id="confirm_pass" name="confirm_pass" placeholder="Confirme Contraseña" required />
        <input type="submit" value="Crear Cuenta">
      </form>
      <?php
      if($_GET){
        echo "<script>alert('" . $_GET["mensaje"] . "');</script>";
      }
    ?>
    </div>
    
        <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

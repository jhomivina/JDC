<?php
    require_once dirname(__DIR__, 2) . '/modelo/usuario/registrar.usuario.php';

    if($_POST){
        // HAcemos validacion y enviamos
        $nombreUsuario = $_POST["user"];
        $correo = $_POST["email"];
        $contrasenia = $_POST["pass"];
        $confirmarContrasenia = $_POST["confirm_pass"];

        // Validamos que la información suministrada sea correcta
        if($nombreUsuario == ""){
            echo "<script>window.location = '../../vista/usuario.php?mensaje=Debe%20llenar%20el%20campo%20Usuario'</script>";
            return;
        }

        if($correo == ""){
            echo "<script>window.location = '../../vista/usuario.php?mensaje=Debe%20llenar%20el%20campo%20del%20correo'</script>";
            return;
        }

        if($contrasenia == "") {
            echo "<script>window.location = '../../vista/usuario.php?mensaje=Debe%20llenar%20el%20campo%20contraseña'</script>";
            return;
        }

        if($confirmarContrasenia == "") {
            echo "<script>window.location = '../../vista/usuario.php?mensaje=Debe%20llenar%20el%20campo%20de%20confirmar%20contraseña'</script>";
            return;
        }

        if($contrasenia != $confirmarContrasenia){
            echo "<script>window.location = '../../vista/usuario.php?mensaje=Las%20contraseñas%20deben%20coincidir'</script>";
            return;
        }

        $registro = new Registro();
        $respuesta = $registro->RegistrarUsuario($nombreUsuario, $correo, $contrasenia);
        echo "<script>window.location = '../../vista/usuario.php?mensaje=$respuesta'</script>";
        return;

    }else{
        die("No han enviado datos");
    }


?>
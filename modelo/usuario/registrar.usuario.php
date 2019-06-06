<?php
    require_once  dirname(__DIR__, 2) . '/modelo/conexion.php';
    class Registro{

        function RegistrarUsuario($nombre, $email, $contrasenia){
            $conexion = new Conexion();
            $stmt = $conexion->prepare("SELECT * FROM usuario WHERE email = :email");
            $stmt->bindValue(":email", $email, PDO::PARAM_STR);
            $stmt->execute();
            $dato = $stmt->fetch(PDO::FETCH_OBJ);
            if($dato){
                // No se puede crear el usuario
                return "El usuario ya existe";
            }else{
                // creacion del nuevo usuario
                $stmt = $conexion->prepare("INSERT INTO `usuario`(`usuario`, `contrasenia`, `email`) 
                                        VALUES (:usuario, :contrasenia, :email)");
                $stmt->bindValue(":usuario", $nombre, PDO::PARAM_STR);
                $stmt->bindValue(":contrasenia", $contrasenia, PDO::PARAM_STR);
                $stmt->bindValue(":email", $email, PDO::PARAM_STR);
                if($stmt->execute()){
                    return "El usuario se ha creado con éxito";
                }else{
                    return "Se ha generado un error al guardar la información";
                }
            }
        }
        
    }

?>
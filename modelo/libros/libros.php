<?php

    require_once  dirname(__DIR__, 2) . '/modelo/conexion.php';

    class ModeloLibros{

        function ConsultarTodoLibros(){
            $conexion = new Conexion();

            $stmt = $conexion->prepare("SELECT l.*, e.nombreEditorial FROM libros AS l INNER JOIN editorial e ON e.idEditorial = l.Id_editorial");
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }

        function GuardarLibros($Titulo, $Edicion, $Anio_publicacion, $Asunto, $Ejemplares, $Id_editorial){
            $conexion = new Conexion();

            $stmt = $conexion->prepare("INSERT INTO `libros`
                                                     ( 
                                                     `Titulo`, 
                                                     `Id_editorial`, 
                                                     `Edicion`, 
                                                     `Anio_publicacion`, 
                                                     `Asunto`, `Ejemplares`)
                                        VALUES (:Titulo, 
                                                :Id_editorial, 
                                                :Edicion, 
                                                :Anio_publicacion, 
                                                :Asunto, 
                                                :Ejemplares);");
            $stmt->bindParam(':Titulo', $Titulo, PDO::PARAM_STR);
            $stmt->bindParam(':Id_editorial', $Id_editorial, PDO::PARAM_INT);
            $stmt->bindParam(':Edicion', $Edicion, PDO::PARAM_STR);
            $stmt->bindParam(':Anio_publicacion', $Anio_publicacion, PDO::PARAM_STR);
            $stmt->bindParam(':Asunto', $Asunto, PDO::PARAM_STR);
            $stmt->bindParam(':Ejemplares', $Ejemplares, PDO::PARAM_STR);

            if($stmt->execute()){
                return "OK";
            }else{
                return "ERROR AL GUARDAR EL LIBRO";
            }
        }

        function ModificarLibros($Id_libros, $Titulo, $Edicion, $Anio_publicacion, $Asunto, $Ejemplares){
            $conexion = new Conexion();

            $stmt = $conexion->prepare("UPDATE `libros` 
                                        SET `Titulo`= :Titulo,
                                            `Edicion`= :Edicion,
                                            `Anio_publicacion`= :Anio_publicacion,
                                            `Asunto`= :Asunto,
                                            `Ejemplares`= :Ejemplares
                                        WHERE Id_libros = :Id_libros");
            $stmt->bindParam(':Titulo', $Titulo, PDO::PARAM_STR);
            $stmt->bindParam(':Edicion', $Edicion, PDO::PARAM_STR);
            $stmt->bindParam(':Anio_publicacion', $Anio_publicacion, PDO::PARAM_STR);
            $stmt->bindParam(':Asunto', $Asunto, PDO::PARAM_STR);
            $stmt->bindParam(':Ejemplares', $Ejemplares, PDO::PARAM_STR);
            $stmt->bindParam(':Id_libros', $Id_libros, PDO::PARAM_INT);
            

            if($stmt->execute()){
                return "OK";
            }else{
                return "ERROR AL MODIFICAR EL LIBRO";
            }
        }

         function EliminarLibros($Id_libros){
            $conexion = new Conexion();

            $stmt = $conexion->prepare("DELETE FROM `libros`
                                        WHERE Id_libros = :Id_libros");
            $stmt->bindParam(':Id_libros', $Id_libros, PDO::PARAM_INT);

            if($stmt->execute()){
                return "OK";
            }else{
                return "ERROR AL ELIMINAR EL LIBRO";
            }
        }
    }
?>

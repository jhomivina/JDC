<?php

    require_once  dirname(__DIR__, 2) . '/modelo/conexion.php';

    class ModeloAutores{

        function ConsultarTodoAutores(){
            $conexion = new Conexion();

            $stmt = $conexion->prepare("SELECT a.*, l.Titulo as 'nombre_libro' FROM autores a INNER JOIN libros l  ON a.id_libro = l.Id_libros");
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }

        function GuardarAutores($nombre_autor, $libro){
            $conexion = new Conexion();

            $stmt = $conexion->prepare("INSERT INTO `autores`
                                            (id_libro,
                                            nombre_autor)
                                VALUES (:id_libro,
                                        :nombre_autor);");
            $stmt->bindParam(':nombre_autor', $nombre_autor, PDO::PARAM_STR);
            $stmt->bindParam(':id_libro', $libro, PDO::PARAM_STR);

            if($stmt->execute()){
                return "OK";
            }else{
                return "ERROR AL GUARDAR EL AUTOR";
            }
        }
        
        function ModificarAutores($id_autor, $nombre_autor, $libro){
            $conexion = new Conexion();

            $stmt = $conexion->prepare("UPDATE `autores`
                                        SET nombre_autor = :nombre_autor
                                        WHERE id_autor = :id_autor");
            $stmt->bindParam(':nombre_autor', $nombre_autor, PDO::PARAM_STR);
            $stmt->bindParam(':id_autor', $id_autor, PDO::PARAM_INT);

            if($stmt->execute()){
                return "OK";
            }else{
                return "ERROR AL MODIFICAR EL AUTOR";
            }
        }

        function EliminarAutores($id_autor){
            $conexion = new Conexion();

            $stmt = $conexion->prepare("DELETE FROM `autores`
                                        WHERE id_autor = :id_autor");
            $stmt->bindParam(':id_autor', $id_autor, PDO::PARAM_INT);

            if($stmt->execute()){
                return "OK";
            }else{
                return "ERROR AL ELIMINAR EL AUTOR";
            }
        }

    }


?>
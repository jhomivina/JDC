<?php

    require_once  dirname(__DIR__, 2) . '/modelo/conexion.php';

    class ModeloEditorial{

        function ConsultarTodoEditorial(){
            $conexion = new Conexion();

            $stmt = $conexion->prepare("SELECT * FROM editorial");
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }

        function GuardarEditorial($nombreEditorial){
            $conexion = new Conexion();

            $stmt = $conexion->prepare("INSERT INTO `editorial`
                                            (`nombreEditorial`)
                                VALUES (:nombreEditorial);");
            $stmt->bindParam(':nombreEditorial', $nombreEditorial, PDO::PARAM_STR);

            if($stmt->execute()){
                return "OK";
            }else{
                return "ERROR AL GUARDAR LA EDITORIAL";
            }
        }
        
        function ModificarEditorial($idEditorial, $nombreEditorial){
            $conexion = new Conexion();

            $stmt = $conexion->prepare("UPDATE `editorial`
                                        SET nombreEditorial = :nombreEditorial
                                        WHERE idEditorial = :idEditorial");
            $stmt->bindParam(':nombreEditorial', $nombreEditorial, PDO::PARAM_STR);
            $stmt->bindParam(':idEditorial', $idEditorial, PDO::PARAM_INT);

            if($stmt->execute()){
                return "OK";
            }else{
                return "ERROR AL MODIFICAR LA EDITORIAL";
            }
        }

        function EliminarEditorial($idEditorial){
            $conexion = new Conexion();

            $stmt = $conexion->prepare("DELETE FROM `editorial`
                                        WHERE idEditorial = :idEditorial");
            $stmt->bindParam(':idEditorial', $idEditorial, PDO::PARAM_INT);

            if($stmt->execute()){
                return "OK";
            }else{
                return "ERROR AL ELIMINAR LA EDITORIAL";
            }
        }

    }


?>
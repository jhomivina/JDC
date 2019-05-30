<?php 
    class Conexion extends PDO{

        public function __construct() {
            try{
                parent::__construct("mysql:host=localhost;dbname=biblioteca16", "root", "");
                parent::exec("set names utf8");
            }catch(PDOException $e){
                echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
                exit;
            }
        }
        
    }
?>
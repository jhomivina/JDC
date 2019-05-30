<?php
    require_once dirname(__DIR__, 2) . '/modelo/libros/libros.php';

    $respuesta = array(
        "Respuesta" => "",
        "error" => ""
    );

    if(isset($_POST)){
        $Id_libros = $_POST["Id_libros"];

        $modeloLibros = new ModeloLibros();
        $respuesta["Respuesta"] = $modeloLibros->EliminarLibros($Id_libros);
        echo json_encode($respuesta);
    }

?>
<?php
    require_once dirname(__DIR__, 2) . '/modelo/editorial/guardar.editorial.php';

    $respuesta = array(
        "Respuesta" => "",
        "error" => ""
    );

    if(isset($_POST)){
        $idEditorial = $_POST["idEditorial"];

        $modeloEditorial = new ModeloEditorial();
        $respuesta["Respuesta"] = $modeloEditorial->EliminarEditorial($idEditorial);
        echo json_encode($respuesta);
    }

?>
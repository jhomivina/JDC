<?php
    require_once dirname(__DIR__, 2) . '/modelo/editorial/guardar.editorial.php';

    $respuesta = array(
        "Respuesta" => "",
        "error" => ""
    );

    if(isset($_POST)){
        $editorial = $_POST["NombreEditorial"];
        $id = $_POST["idEditorial"];

        if($editorial == ""){
            $respuesta["Respuesta"] = "MAL";
            $respuesta["error"] = "El nombre de la editorial viene vacío";

            echo json_encode($respuesta);

            return;
        }

        $modeloEditorial = new ModeloEditorial();
        $respuesta["Respuesta"] = $modeloEditorial->ModificarEditorial($id, $editorial);
        echo json_encode($respuesta);
    }

?>
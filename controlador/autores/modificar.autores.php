<?php
    require_once dirname(__DIR__, 2) . '/modelo/autores/guardar.autores.php';

    $respuesta = array(
        "Respuesta" => "",
        "error" => ""
    );

    if(isset($_POST)){
        $autores = $_POST["nombre_autor"];
        $id = $_POST["id_autor"];

        if($autores == ""){
            $respuesta["Respuesta"] = "MAL";
            $respuesta["error"] = "El nombre del autor viene vacío";

            echo json_encode($respuesta);

            return;
        }

        $modeloAutores = new ModeloAutores();
        $respuesta["Respuesta"] = $modeloAutores->ModificarAutores($id, $autores);
        echo json_encode($respuesta);
    }

?>
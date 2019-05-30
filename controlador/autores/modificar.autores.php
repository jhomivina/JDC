<?php
    require_once dirname(__DIR__, 2) . '/modelo/autores/autores.php';

    $respuesta = array(
        "Respuesta" => "",
        "error" => ""
    );

    if(isset($_POST)){
        $autores = $_POST["Autor"];
        //$libro = $_POST['Libro'];
        $id = $_POST["id_autor"];

        if($autores == ""){
            $respuesta["Respuesta"] = "MAL";
            $respuesta["error"] = "El nombre del autor viene vacío";

            echo json_encode($respuesta);

            return;
        }

        $modeloAutores = new ModeloAutores();
        $respuesta["Respuesta"] = $modeloAutores->ModificarAutores($id, $autores, "aasd");
        echo json_encode($respuesta);
    }

?>
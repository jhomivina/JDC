<?php
    require_once dirname(__DIR__, 2) . '/modelo/autores/autores.php';

    $respuesta = array(
        "Respuesta" => "",
        "error" => ""
    );

    if(isset($_POST)){
        $autores = $_POST["Autor"];
        $libros = $_POST["Libro"];


        if($autores == ""){
            $respuesta["Respuesta"] = "MAL";
            $respuesta["error"] = "El nombre de los autores viene vacío";

            echo json_encode($respuesta);

            return;
        }

        $modeloAutores = new ModeloAutores();
        $respuesta["Respuesta"] = $modeloAutores->GuardarAutores($autores, $libros);
        echo json_encode($respuesta);
    }

?>
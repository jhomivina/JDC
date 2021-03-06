<?php
    require_once str_replace('\\', '/', dirname(__DIR__, 2)) . '/modelo/libros/libros.php';

    $respuesta = array(
        "Respuesta" => "",
        "error" => ""
    );

    if(isset($_POST)){
        $titulo = $_POST["Titulo"];
        $edicion = $_POST["Edicion"];
        $publicacion = $_POST["Anio_publicacion"];
        $asunto = $_POST["Asunto"];
        $ejemplares = $_POST["Ejemplares"];
        $editorial = $_POST["Editorial"];
        

        if($titulo == ""){
            $respuesta["Respuesta"] = "MAL";
            $respuesta["error"] = "El titulo del libro viene vacío";

            echo json_encode($respuesta);

            return;
        }        

        if($edicion == ""){
            $respuesta["Respuesta"] = "MAL";
            $respuesta["error"] = "La edición del libro viene vacía";

            echo json_encode($respuesta);

            return;
        }
    
        if($publicacion == ""){
            $respuesta["Respuesta"] = "MAL";
            $respuesta["error"] = "El año de publicación del libro viene vacío";

            echo json_encode($respuesta);

            return;
        }

        if($asunto == ""){
            $respuesta["Respuesta"] = "MAL";
            $respuesta["error"] = "El asunto del libro viene vacío";

            echo json_encode($respuesta);

            return;
        }

        if($ejemplares == ""){
            $respuesta["Respuesta"] = "MAL";
            $respuesta["error"] = "El N° de ejemplares del libro viene vacío";
            echo json_encode($respuesta);
            return;
        }

        $modeloLibros = new ModeloLibros();
        $respuesta["Respuesta"] = $modeloLibros->GuardarLibros($titulo,$edicion,$publicacion,$asunto,$ejemplares, $editorial);
        echo json_encode($respuesta);
    }

?>
<?php
    require_once dirname(__DIR__, 2) . '/modelo/autores/guardar.autores.php';

    $respuesta = array(
        "Respuesta" => "",
        "error" => ""
    );

    if(isset($_POST)){
        $id_autor = $_POST["id_autor"];

        $modeloAutores = new ModeloAutores();
        $respuesta["Respuesta"] = $modeloAutores->EliminarAutores($id_autor);
        echo json_encode($respuesta);
    }

?>
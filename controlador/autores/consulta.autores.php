<?php
    require_once dirname(__DIR__, 2) . '/modelo/autores/autores.php';

    $modeloAutores = new ModeloAutores();
    echo json_encode($modeloAutores->ConsultarTodoAutores());
?>
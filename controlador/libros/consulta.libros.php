<?php
    require_once dirname(__DIR__, 2) . '/modelo/libros/libros.php';

    $modeloLibros = new ModeloLibros();
    echo json_encode($modeloLibros->ConsultarTodoLibros());
?>
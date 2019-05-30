<?php
    require_once dirname(__DIR__, 2) . '/modelo/editorial/guardar.editorial.php';

    $modeloEditorial = new ModeloEditorial();
    echo json_encode($modeloEditorial->ConsultarTodoEditorial());
?>
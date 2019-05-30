<!DOCTYPE html>
<html>

<head>
    <style type="text/css">
        body{ 
            margin: 0;
            padding: 0; 
            background: url(../../resources/biblio.jpg) no-repeat center;
            background-size:cover;               
            height: 100vh;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head><br>

<body>
    <?php
        //echo str_replace('\\', '/', dirname(__DIR__, 2)) . '/modelo/conexion.php';
        //die();

        require_once str_replace('\\', '/', dirname(__DIR__, 2)) . '/modelo/conexion.php';

        $conexion = new Conexion();

        $stmt = $conexion->prepare("SELECT idEditorial, nombreEditorial FROM editorial");
        $stmt->execute();
        $editoriales = $stmt->fetchAll(\PDO::FETCH_OBJ);

    ?>

    <nav class="navbar navbar-light navbar-expand-md">
        <div class="container-fluid"><a class="navbar-brand text-white" href="#"><strong>BIBLIOTECA</strong></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown text-white"><a class="dropdown-toggle nav-link text-white" data-toggle="dropdown" aria-expanded="false" href="#"><strong>Libros</strong></a>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" role="presentation" href="crear.php">Crear</a>
                            <a class="dropdown-item" role="presentation" href="consultar.php">Consultar</a>
                        </div>
                    </li>
                </ul>

                <ul class="nav navbar-nav">
                     <div class="">
                        <a href="../../inicio.html" class="btn btn-light" role="button">Volver Al Inicio</a>
                     </div>
                </ul>
            </div>
        </div>
    </nav><br>
    <div class="container">
        <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <button class="btn btn-success" onclick="guardar();" name="guardar" id="guardar" type="button">Guardar</button>&nbsp;
                        <button class="btn btn-dark" type="reset">Limpiar</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h1 class="card-title"><strong>Creación de Libros</strong></h1><br>
                <h6 class="text-muted card-subtitle mb-2" style="color: rgb(125,109,108);">Todos los campos marcados con * son obligatorios</h6><br>

                <div class="row">
                    <div class="col"><label class="label-control">Titulo del Libro *</label><input type="text" id="Titulo" placeholder="Titulo del Libro" class="form-control" style="width: 302px;" required></div>
                    <div class="col"><label class="label-control">Edición del Libro *</label><input type="text" id="Edicion" placeholder="Edición del Libro" class="form-control" style="width: 302px;" required></div>
                </div><br>

                <div class="row">
                     <div class="col"><label class="label-control">Año de publicación *</label><input type="text" id="Anio_publicacion" placeholder="Año publicación del libro" class="form-control" style="width: 302px;" required></div>
                    <div class="col"><label class="label-control">Asunto del Libro *</label>
                        <select name="Asunto" id="Asunto" class="form-control" style="width: 302px;" required>
                          <option value="Cuentos">Cuentos</option>
                          <option value="Novelas">Novelas</option>
                          <option value="Obras">Obras</option>
                        </select>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col"><label class="label-control">Ejemplares del Libro *</label><input type="number" id="Ejemplares" placeholder="N° de libros que tiene la Biblioteca" class="form-control" style="width: 302px;" required></div>
                    <div class="col">
                        <label class="label-control">Editorial</label>
                        <select class="form-control" id="Editorial">
                            <?php 
                                foreach ($editoriales as $editorial) {
                                    echo "<option value='" . $editorial->idEditorial . "'>" . $editorial->nombreEditorial . "</option>";
  
  
                                }
                            ?>
                        </select>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </div>
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../js/libros.js"></script>
</body>

</html>
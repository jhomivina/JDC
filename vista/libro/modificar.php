<!DOCTYPE html>
<html>

<head>
    <style type="text/css">       
        body {
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
    <nav class="navbar navbar-light navbar-expand-md">
        <div class="container-fluid"><a class="navbar-brand text-white" href="#"><strong>BIBLIOTECA</strong></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link text-white" data-toggle="dropdown" aria-expanded="false" href="#"><strong>Libros</strong></a>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="libros.html">Crear</a><a class="dropdown-item" role="presentation" href="libros-consulta.html">Consultar</a></div>
                    </li>
                </ul>

                <ul class="nav navbar-nav">
                     <div class="">
                        <a href="../inicio.html" class="btn btn-light" role="button">Volver Al Inicio</a>
                     </div>
                </ul>
            </div>
        </div>
    </nav><br>
    <div class="container">

        <?php
            require_once  dirname(__DIR__,2) . '/modelo/conexion.php';

            $id = $_GET["id"];
            $conexion = new Conexion();
            $stmt = $conexion->prepare("SELECT * FROM libros WHERE Id_libros = :Id_libros");
            $stmt->bindValue(":Id_libros", $id, PDO::PARAM_INT);
            $stmt->execute();
            $registro = $stmt->fetch(\PDO::FETCH_OBJ);
            

        ?>

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <button class="btn btn-success" onclick="ModificarRegistro(<?php echo $registro->Id_libros; ?>);" name="modificar" id="modificar" type="button">Modificar</button>
                        <button class="btn btn-dark" type="reset">Limpiar</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h1 class="card-title"><strong>Modificar Libros</strong></h1><br>
                <h6 class="text-muted card-subtitle mb-2" style="color: rgb(125,109,108);">Todos los campos marcados con * son obligatorios</h6><br>

                <div class="row">
                    <div class="col"><label class="label-control">Titulo del Libro *</label><input type="text" id="Titulo" placeholder="Titulo del Libro *" class="form-control" style="width: 302px;" value="<?php echo $registro->Titulo; ?>"></div>
                    <div class="col"><label class="label-control">Edición del Libro *</label><input type="text" id="Edicion" placeholder="Edición del Libro" class="form-control" style="width: 302px;" value="<?php echo $registro->Edicion; ?>"></div>
                </div><br>

                <div class="row">
                     <div class="col"><label class="label-control">Año de publicación *</label><input type="text" id="Anio_publicacion" placeholder="Año publicación del libro" class="form-control" style="width: 302px;" value="<?php echo $registro->Anio_publicacion; ?>"></div>
                    <div class="col"><label class="label-control">Asunto del Libro *</label><input type="text" id="Asunto" placeholder="Categoria del Libro" class="form-control" style="width: 302px;" value="<?php echo $registro->Asunto; ?>"></div>
                </div><br>

                <div class="row">
                    <div class="col"><label class="label-control">Ejemplares del Libro *</label><input type="text" id="Ejemplares" placeholder="N° de libros que tiene la Biblioteca" class="form-control" style="width: 302px;" value="<?php echo $registro->Ejemplares; ?>"></div>
                </div><br><br>
            </div>
        </div>
    </div>
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../js/libros.js"></script>
</body>

</html>
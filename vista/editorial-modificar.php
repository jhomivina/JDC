<!DOCTYPE html>
<html>

<head>
    <style type="text/css">
        body{ 
            margin: 0;
            padding: 0; 
            background: url(../resources/biblio.jpg) no-repeat center;
            background-size:cover;               
            height: 100vh;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head><br>

<body>
    <nav class="navbar navbar-light navbar-expand-md">
        <div class="container-fluid"><a class="navbar-brand text-white" href="#"><strong>BIBLIOTECA</strong></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown text-white"><a class="dropdown-toggle nav-link text-white" data-toggle="dropdown" aria-expanded="false" href="#"><strong>Editorial</strong></a>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" role="presentation" href="editorial.html">Crear</a>
                            <a class="dropdown-item" role="presentation" href="editorial-consulta.html">Consultar</a>
                        </div>
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
        <div class="row justify-content-center">

        <?php
            require_once  dirname(__DIR__) . '/modelo/conexion.php';

            $id = $_GET["id"];
            $conexion = new Conexion();
            $stmt = $conexion->prepare("SELECT * FROM editorial WHERE idEditorial = :idEditorial");
            $stmt->bindValue(":idEditorial", $id, PDO::PARAM_INT);
            $stmt->execute();
            $registro = $stmt->fetch(\PDO::FETCH_OBJ);
            

        ?>

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <button class="btn btn-success" onclick="ModificarRegistro(<?php echo $registro->idEditorial; ?>);" name="modificar" id="modificar" type="button">Modificar</button>
                        <button class="btn btn-dark" type="reset">Limpiar</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h1 class="card-title"><strong>Modificar Editorial</strong></h1><br>
                <h6 class="text-muted card-subtitle mb-2" style="color: rgb(125,109,108);">Todos los campos marcados con * son obligatorios</h6><br>
                <div class="row">
                    <div class="col"><label class="label-control">Nombre de la editorial *</label><input type="text" id="editorial" placeholder="Nombre de la editorial" class="form-control" style="width: 302px;" value="<?php echo $registro->nombreEditorial; ?>"></div>
                </div><br><br><br>
            </div>
        </div>
    </div>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/editorial.js"></script>
</body>

</html>
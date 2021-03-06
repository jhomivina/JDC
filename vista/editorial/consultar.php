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
    <nav class="navbar navbar-light navbar-expand-md">
        <div class="container-fluid"><a class="navbar-brand text-white" href="#"><strong>BIBLIOTECA</strong></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown text-white"><a class="dropdown-toggle nav-link text-white" data-toggle="dropdown" aria-expanded="false" href="#"><strong>Editorial</strong></a>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" role="presentation" href="crear.php">Crear</a>
                            <a class="dropdown-item" role="presentation" href="consultar.php">Consultar</a>
                        </div>
                    </li>
                </ul>&nbsp;

                <ul class="nav navbar-nav">
                     <div class="">
                         <a href="../../inicio.html" class="btn btn-light" role="button">Volver Al Inicio</a>
                     </div>
                </ul>
            </div>
        </div>
    </nav><br>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h4>Listado de Editoriales</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Editorial</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tabla">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../js/editorial.js"></script>
</body>

</html>
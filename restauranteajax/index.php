<?php
require 'require/comun.php';
$bd = new BaseDatos();
$modelo = new ModeloPlato($bd);
$modeloFoto = new ModeloFoto($bd);
$platos = $modelo->getListPagina();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Le Restauran-Index</title>
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/estilos.css" type="text/css" />
        <link rel="stylesheet" href="js/toast/toastr.css">
        <script src="js/toast/toastr.js"></script>
        <link rel="stylesheet" href="css/slimbox.css" type="text/css" media="screen" />
        <script src="js/mootools.js"></script>
        <script src="js/slimbox.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Le restaurant</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#about">Sobre Nosotros</a></li>
                        <li><a href="#contact">Contacto</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <div class="container"> 
            <div class="jumbotron">
                <h1>Menu del día</h1>
                <p>Podras consultar nuestro menú a diario</p>
            </div>            
            <!--fila principal-->
            <?php foreach ($platos as $inidice => $objeto) { ?>
                <div class="row">
                    <?php $fotos = $modeloFoto->getRutaId($objeto->getId()); ?>
                    <div class="col-md-4">
                        <a href="fotos/<?php echo $fotos[0]; ?>" class="image-link" rel="lightbox-grupo" title="Foto del plato">
                            <img class="img-thumbnail" src="fotos/<?php echo $fotos[0]; ?>">
                        </a>
                        <a href="fotos/<?php echo $fotos[0]; ?>" class="image-link" rel="lightbox-grupo" title="Foto del plato">
                            <img class="oculto" src="fotos/<?php echo $fotos[1]; ?>">
                            <img class="oculto" src="fotos/<?php echo $fotos[2]; ?>">
                        </a>
                    </div>
                    <div class="col-md-4">
                        <p><h4><?php $objeto->getNombre(); ?></h4>
                        <?php echo $objeto->getDescripcion() ?>
                        </p>
                        <footer><?php echo $objeto->getNombre(); ?></footer>
                    </div>
                </div>
            <?php } ?>    

        </div><!-- /.container -->
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>
</html>
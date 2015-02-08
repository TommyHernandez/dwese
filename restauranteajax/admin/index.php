<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin-Panel</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/estilos.css" type="text/css">
        <link rel="stylesheet" href="../js/toast/toastr.css">
        <link rel="stylesheet" href="../css/slimbox.css" type="text/css" media="screen" />
        <script type="text/javascript" src="js/mootools.js"></script>
        <script type="text/javascript" src="js/slimbox.js"></script>
    </head>

    <body>
        <!-- Fin del login -->
        <div id="master">
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
                            <li class="active"><a href="#">Home</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gestionar platos <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a id="p-listar" href="#">Listar</a>
                                    </li>
                                    <li><a id="p-add"  href="#">Añadir Plato</a>
                                    </li>
                                </ul>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gestionar menus <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Listar</a>
                                    </li>
                                    <li><a href="#">Crear Menu</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </nav>

            <div class="container">
                <div class="jumbotron">
                    <h1>Menú Activo</h1>
                    <p id="M-activo"></p>
                </div>
                <div id="add-plato" class="col-md-12 oculto">
                    <form>
                        <div class="form-group"> 
                            <label>Nombre</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" value="" placeholder="Inserte el nombre del plato" />                 
                            <textarea class="form-control" id="descp" placeholder="Decripcion del palto">                            
                            </textarea>
                            <label>Precio</label>
                            <input type="number" id="precio" value="" class="form-control" placeholder="Precio del plato" />
                            <input type="file" id="files" name="files[]" multiple />
                            <output id="list"></output>
                        </div>
                        <input type="button" id="enviar-plato" class="btn btn-default" value="Enviar" name="send" />  
                    </form>
                </div>
                <div class="col-md-12">
                    <table id="lista-platos" class="table table-bordered">

                    </table>
                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /.maestro -->
        <!-- Bootstrap core JavaScript
            ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-1.11.2.js"></script>
        <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/sha1.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/toast/toastr.js"></script>
        <script src="js/main.js"></script>

    </body>

</html>
<?php
require_once '../require/comun.php';
$bd = new BaseDatos();
$modelo = new ModeloProducto($bd);
$id=  Leer::request("id");
$producto = $modelo->get($id);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Der kaufladen-Edit</title>
        <!-- Modernizr -->
        <script src="../js/libs/modernizr-2.6.2.min.js"></script>
        <!-- framework css -->
        <link type="text/css" rel="stylesheet" href="../css/groundwork.css">
        <link type="text/css" rel="stylesheet" href="../css/estilos.css">
        <script type="text/javascript" src="../js/libs/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="../js/groundwork.all.js"></script>
    </head>
    <body>
        <div class="container">
            <h1>Der Kaufladen</h1>
            <hr>
            <div class="row">
                <form name="edit" method="post" action="phpeditar.php">
                    <input type="hidden" name="id" value="<?php echo $producto->getId(); ?>" />
                    <label>   
                        Nombre:
                    </label>
                    <input type="text" name="nombre" value="<?php echo $producto->getNombre(); ?>" />
                    <br>
                    <label>   
                        Nombre:
                    </label>
                    <input type="number" name="precio" value="<?php echo $producto->getPrecio(); ?>" />
                    <br>
                    <label>   
                        Nombre:
                    </label>
                    <input type="number" name="iva" value="<?php echo $producto->getIva(); ?>"/>
                    <textarea name="descripcion"><?php echo $producto->getDescripcion(); ?></textarea>
                    <input type="submit" value="enviar" />
                </form>
            </div>
    </body>
</html>

<?php
require_once '../require/comun.php';
$bd = new BaseDatos();
$modelo =  new ModeloProducto($bd);
$productos = $modelo->getListPagina();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Das Panel</title>
        <!-- Modernizr -->
        <script src="../js/libs/modernizr-2.6.2.min.js"></script>
        <!-- framework css -->
        <link type="text/css" rel="stylesheet" href="../css/groundwork.css">
        <link type="text/css" rel="stylesheet" href="../css/estilos.css">
        <script type="text/javascript" src="../js/libs/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="../js/groundwork.all.js"></script>
    </head>
    <body>
        <h1>Panel de control</h1>
        <div class="container">
            <h4>Productos en la tienda</h4>
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Precio <i class="icon-euro icon-1x"></i></th>
                        <th>IVA %</th>
                        <th>¿Desactivar?</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $key => $objeto) { ?>
                    <tr>
                        <td><?php echo $objeto->getNombre(); ?></td>
                        <td><?php echo $objeto->getDescripcion(); ?></td>
                        <td><?php echo $objeto->getPrecio(); ?></td>
                        <td><?php echo $objeto->getIva(); ?></td>
                        <td><a href="../producto/phpdelete.php?id=<?php echo $objeto->getId(); ?>">Desactivar</a></td>
                        
                    </tr>
                  <?php  } ?>
                </tbody>
            </table>
        </div>
    </body>
</html>

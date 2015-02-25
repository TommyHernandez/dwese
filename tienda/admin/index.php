<?php
require_once '../require/comun.php';
$pagina = 0;
if (Leer::get("pagina") != null) {
    $pagina = Leer::get("pagina");
}
$bd = new BaseDatos();
$modelo = new ModeloProducto($bd);
$modeloventa = new ModeloVenta($bd);
$productos = $modelo->getListPagina($pagina);
$ventas = $modeloventa->getListPagina(0,10);
$enlaces = Paginacion::getEnlacesPaginacion($pagina, $modelo->count(), Configuracion::RPP);
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
            <div class="row">
                <h4>Productos en la tienda</h4>
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Precio <i class="icon-euro icon-1x"></i></th>
                            <th>IVA %</th>
                            <th>Editar</th>
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
                                <td><a href="../producto/viewedit.php?id=<?php echo $objeto->getId(); ?>">Editar</a></td>
                                <td><a href="../producto/phpdelete.php?id=<?php echo $objeto->getId(); ?>">Desactivar</a></td>

                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>
                                <?php echo $enlaces["inicio"]; ?>
                                <?php echo $enlaces["anterior"]; ?>
                                <?php echo $enlaces["primero"]; ?>
                                <?php echo $enlaces["segundo"]; ?>
                                <?php echo $enlaces["actual"]; ?><!-- normalmente -->
                                <?php echo $enlaces["cuarto"]; ?>
                                <?php echo $enlaces["quinto"]; ?>
                                <?php echo $enlaces["siguiente"]; ?>
                                <?php echo $enlaces["ultimo"]; ?>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="row">
                <div class="one half">
                    <h5> Ultimas ventas</h5>
                    <table>
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>fecha</th>
                                <th>Hora</th>
                                <th>pago</th>
                                <th>dienvio</th>
                                <th>nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ventas as $key => $venta) { ?>                          
                                <tr>
                                    <td><?php echo $venta->getId(); ?></td>
                                    <td><?php echo $venta->getFecha(); ?></td>
                                    <td><?php echo $venta->getHora(); ?></td>
                                    <td><?php echo $venta->getPago()?></td>
                                    <td><?php echo $venta->getDirenvio(); ?></td>
                                    <td><?php echo $venta->getNombre(); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="one half">
                </div>
            </div>
            <div class="row">
            </div>

        </div>
    </body>
</html>

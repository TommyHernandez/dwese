<?php
require_once './require/comun.php';
$bd = new BaseDatos();
$modelo = new ModeloProducto($bd);
$productos = $modelo->getListPagina(0, 6);
session_start();
if (isset($_SESSION["__cesta"])) {
    $cesta = $_SESSION["__cesta"];
} else {
    $cesta = array();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Der kaufladen</title>
        <!-- Modernizr -->
        <script src="js/libs/modernizr-2.6.2.min.js"></script>
        <!-- framework css -->
        <link type="text/css" rel="stylesheet" href="css/groundwork.css">
        <link type="text/css" rel="stylesheet" href="css/estilos.css">
        <script type="text/javascript" src="/js/libs/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="/js/groundwork.all.js"></script>
    </head>
    <body>
        <div class="container">
            <h1>Der Kaufladen</h1>
            <hr>
            <div class="row">
                <div class="align-right padded">
                    <?php if (sizeof($cesta) != 0) { ?>
                        <a href="do/?accion=ver" class="gap-right">Ver Carrito <i class="icon-shopping-cart">&nbsp;<?php echo sizeof($_SESSION["__cesta"]); ?></i></a>
                    <?php } ?>
                </div>
                <article class="four fifths">
                    <!--div class="row"-->
                    <?php foreach ($productos as $key => $objeto) { ?>

                        <?php if ($key % 2 != 0) { ?>
                            <div class="one fourth three-up-small-tablet two-up-mobile padded bounceInDown animated">
                                <div class="box">
                                    <h4 data-compression="7" data-max="20" class="responsive align-center zero" style="font-size: 20px;">
                                        <span class="responsiveText-wrapper"><?php echo $objeto->getNombre(); ?></span></h4>
                                    <img src="http://placehold.it/300x300/2ecc71/ffffff/&amp;text=Product+<?php echo $key; ?>">
                                    <p class="truncate"><?php echo $objeto->getDescripcion(); ?></p>
                                    <p><strong><?php echo $objeto->getPrecio(); ?> € </strong>
                                        <a href="do/?id=<?php echo $objeto->getId(); ?>&accion=insert">
                                            <i class="icon-shopping-cart pull-right large"></i>
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <?php
                        }
                        if ($key % 2 == 0) {
                            ?>
                            <div class="one fourth three-up-small-tablet two-up-mobile padded bounceInUp animated">
                                <div class="box">
                                    <h4 data-compression="7" data-max="20" class="responsive align-center zero" style="font-size: 20px;">
                                        <span class="responsiveText-wrapper"><?php echo $objeto->getNombre(); ?></span></h4>
                                    <img src="http://placehold.it/300x300/3498db/ffffff/&amp;text=Product+<?php echo $key; ?>">
                                    <p class="truncate"><?php echo $objeto->getDescripcion(); ?></p>
                                    <p><?php echo $objeto->getPrecio(); ?> €
                                        <a href="do/?id=<?php echo $objeto->getId(); ?>&accion=insert">
                                            <i class="icon-shopping-cart pull-right large"></i>
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </article>
            </div>
        </div>
        <?php
        if (isset($cesta)) {
            ?> 
            <table>
                <tbody>
                    <?php
                    foreach ($cesta as $key => $lineacesta) {
                        ?>
                        <tr>
                            <td><?php echo $lineacesta->getProducto()->getNombre(); ?></td>
                            <td><?php echo $lineacesta->getProducto()->getPrecio(); ?></td>
                            <td><?php echo $lineacesta->getCantidad(); ?></td>
                            <td> <a href="do/?id=<?php echo $lineacesta->getProducto()->getId(); ?>&accion=resta">Restar Uno</a>
                                <a href="do/?id=<?php echo $lineacesta->getProducto()->getId(); ?>&accion=insert"> Añadir Uno</a>
                                <a href="do/?id=<?php echo $lineacesta->getProducto()->getId(); ?>&accion=del">Borrar</a>
                            </td>
                        </tr>
                        <?php
                        //cerramos el bucle
                    }
                    ?>
                </tbody>
            </table>
            <?php
        }
        ?>
    </body>
</html>

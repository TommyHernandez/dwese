<?php
require_once '../require/comun.php';
$bd = new BaseDatos();
$modeloventa = new ModeloVenta($bd);
$modelodetalle = new ModeloDetalleVenta($bd);
$nombre = Leer::post("nombre");
$direnvio = Leer::post("direnvio");
$total = Leer::post("total");
session_start();
if (isset($_SESSION["__cesta"])) {
    $cesta = $_SESSION["__cesta"];
}
$vent = new Venta(null, "", "", "no", $direnvio, $nombre);
$id = $modeloventa->add($vent);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Der kaufladen</title>
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
                <div class="one third padded">
                    <?php
                    if ($cesta != null) {
                        foreach ($cesta as $key => $lineacesta) {
                            $detalleventa = new DetalleVenta(null, $id, $lineacesta->getProducto()->getId(), $lineacesta->getCantidad(), $lineacesta->getProducto()->getPrecio());
                            $modelodetalle->add($detalleventa);
                        }
                    }
                    ?>
                </div>
                <div class="one third padded">
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
                    <form name="_xclick" method="POST" action="https://www.sandbox.paypal.com/cgi-bin/webscr" >
                        <input type="hidden" name="cmd" value="_xclick">
                        <input type="hidden" name="business" value="pedrothdc-facilitator@gmail.com">
                        <input type="hidden" name="currency_code" value="EUR">
                        <input type="hidden" name="item_name" value="Compra en der Kaufladen_<?php echo $id; ?>">
                        <input type="hidden" name="amount" value="<?php echo $total; ?>">
                        <input type="hidden" name="return" value="http://.../gracias.php">
                        <input type="hidden" name="notify_url" value="http://tienda.pixelariumstudio.es/getpago.php">
                        <input type="image" border="0"  name="submit"   src="https://www.paypal.com/es_ES/i/btn/btn_buynow_LG.gif" >
                    </form>
                </div>
                <div class="one third padded">
                  
                </div>  
            </div>


    </body>
</html>

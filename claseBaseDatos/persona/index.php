<!DOCTYPE html>
<?php
require_once '../clases/comun.php';
$bd = new BaseDatos();
$modelo = new ModeloPersona($bd);
$pagina = 0;
if (Leer::get("p") != null) {
    $pagina = Leer::get("p");
}
$enlace = "index.php";
$filas = $modelo->getList($pagina);
$totales = $modelo->getCount();

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Index-BD</title>
        <script src="../js/main.js"></script>
    </head>
    <body>
        <div>
            <h2>Seccion 0</h2>
            <span>Ultima operación realizada: <?php// echo Leer::get('op') ?> </span><br>
            <span>Numero de filas insertadas:  <?php //echo Leer::get('filas') ?> </span>
            <br/>
        </div>
        <h2>Seccion 2</h2>
       <?php
       foreach  ($filas as $indice => $objeto){
           echo $objeto->getNombre()." ";
           echo $objeto->getApellido(). "<br/>";
       }
        $enlaces = Util::getEnlaces($pagina, $totales, $enlace);
        for ($a = 0; $a < sizeof($enlaces); $a++) {
            echo $enlaces[$a] . "  ";
        }
        ?>
        <form action="phpinsert.php" method="POST" >
            <label for="nombre">nombre</label>
            <input type="text"   name="nombre" value=""/> 
            <br>
            <label for="apellido">apellido</label>
            <input type="text" name="apellidos" value="" />
            <input type="submit" name="Registrar" value="Registrar"/>
        </form>

    </body>
</html>
<?php
?>
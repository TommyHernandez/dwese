<?php

require_once '../require/comun.php';
header('Content-Type: application/json');
$tipo = Leer::request("tipo"); /* tipo 1 = plato ; tipo 2 = menu; */
$bd = new BaseDatos();
if ($tipo == 1) {
    $nombre = Leer::request("nombre");
    $descripcion = Leer::request("descripcion");
    $precio = Leer::request("precio");
    $plato = new Plato(null, $nombre, $descripcion, $precio);
    $modelo = new ModeloPlato($bd);
    $modeloforo = new ModeloFoto($bd);
    $r = $modelo->add($plato);
    /* Subimos los archivos */
  
    /* FIN */
    if ($r) {
        echo '{"status": true}';
    } else {
        echo '{"status": false}';
    }
}

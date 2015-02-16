<?php
require '../require/comun.php';
header('Content-Type: application/json');
$id = Leer::request("id");
$bd = new BaseDatos();
$modelo = new ModeloPlato($bd);
$modeloFoto = new ModeloFoto($bd);
echo "{\n";
echo '"rutas":'.$modeloFoto->getRutaJSON($id).','; 
echo '"platos":'.$modelo->getJSON($id).'}';
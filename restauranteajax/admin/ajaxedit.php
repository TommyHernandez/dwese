<?php
header('Content-Type: application/json');
require '../require/comun.php';
$bd = new BaseDatos();
$modelo = new ModeloPlato($bd);
$id = Leer::request("id");
$idpk = $id;
$nombre = Leer::request("name");
$descripcion = Leer::request("descripcion");
$precio = Leer::request("priece");
$objeto = new Plato($id, $nombre, $descripcion, $precio);
$r = $modelo->edit($objeto, $idpk);
if ($r) {
    echo "{";
    echo '"estado":true}';
    
}else{
    echo "{";
    echo '"estado":false}';
}
$bd->closeConexion();

<?php
header('Content-Type: application/json');
require '../require/comun.php';
$id = Leer::get("id");
$pagina = Leer::get("pagina");
$bd = new BaseDatos();
$modelo = new ModeloPlato($bd);
$objeto = new Plato();
$objeto->setId($id);
$modeloFoto = new ModeloFoto($bd);
$r=$modelo->delete($objeto);
if ($r){
    echo "{";
    echo '"estado":true, "pagina":'.$pagina."}";
} else{
   
}
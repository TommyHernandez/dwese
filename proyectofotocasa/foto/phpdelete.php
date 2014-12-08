<?php
require '../clases/comun.php';
//este metodo comprueba que estas atuentificado en la sesion como ROOT en caso negativo te manda al index
$sesion->administrador("../index.php");
$id= LEER::post("id");
$bd = new BaseDatos();
$modelo = new ModeloFoto($bd);
$r = $modelo->delete($id);
header("Location: viewfoto.php?result=$r");
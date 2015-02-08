<?php
require_once '../require/comun.php';
header('Content-Type: application/json');
$login = Leer::get("user");
$clave = Leer::get("pass");
$bd = new BaseDatos();
$modelo = new ModeloUsuario($bd);
$r = $modelo->autentifica($login, sha1($clave));
//echo '{ "log": true}';
if ($r) {
    echo '{ "log": true}';
} else {
   echo '{ "log": false}';
}
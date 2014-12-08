<?php
require '../clases/comun.php';
$sesion->autentificado("login.php");
//

$bd = new BaseDatos();
$modelo = new ModeloUsuario($bd);

if ($cambiarmail) {
    
}else{
    $r = $modelo->editSinClave($objeto, $usuario->getLogin());
}

if ($r > 0 && $cambiarmail) {
    $r = $modelo->desactivar($usuario->getLogin());
}
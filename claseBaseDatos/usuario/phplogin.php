<?php

require '../clases/comun.php';
$login = Leer::post("user");
$clave = sha1(Leer::post("passwd"));
$bd = new BaseDatos();
$modelo = new ModeloUsuario($bd);
$objeto = $modelo->login($login, $clave);
if ($objeto) {
    $sesion->setUsuario($objeto);
    header("Location: secreta.php");
} else {
    echo -1;
    $sesion->cerrar();
    header("Location: login.php?er=1");
}
<?php

require '../clases/require/comun.php';
$login = Leer::post("login");
$clave = sha1(Leer::post("key"));
$bd = new BaseDatos();
$modelo = new ModeloUsuario($bd);
$objeto = $modelo->login($login, $clave);
if ($objeto) {
    $sesion->setUsuario($objeto);
    if ($objeto->getIsRoot() == 1) {
        $modelo->setFecha($login);
        $modelolog = new ModeloLog($bd);
        $tipo = "login";
        $log = new Log($login,$tipo);
        $modelolog->add($log);
        header("Location: ../admin/panel.php");
    } else {
        $modelo->setFecha($login);
        header("Location: ../usuario/userpanel.php");
    }
} else {

    header("Location: ../viewalta.php?er=-1");
    $sesion->cerrar();
}
 
 
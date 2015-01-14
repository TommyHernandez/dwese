<?php
require '../clases/require/comun.php';
$login = Leer::get("login");
$tipo = "logout";
        $log = new Log($login,$tipo);
        $modelolog->add($log);
$sesion->cerrar();
header("Location: ../");
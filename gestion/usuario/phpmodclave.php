<?php
require '../clases/require/comun.php';
$bd = new BaseDatos();
$modelo = new ModeloUsuario($bd);
$login = Leer::post("login");

if (Leer::post("new1") != Leer::post("new2")) {
    header("Location: ../index.php?error=-9");
} else {
    $usuario = $modelo->get($login);  
    $usuario->setClave(sha1(Leer::post("new1")));
    $modelo->edit($usuario, $login);
}
<?php
require '../clases/require/comun.php';
$sesion->administrador("../");
$bd = new BaseDatos();
$modelo = new ModeloUsuario($bd);
$objeto = new Usuario();
$loginpk = Leer::post("loginpk");
$objeto->setLogin(Leer::post("login"));
$objeto->setClave(Leer::post("clave"));
$objeto->setNombre(Leer::post("nombre"));
$objeto->setApellidos(Leer::post("apellidos"));
$objeto->setEmail(Leer::post("email"));
$objeto->setRol(Leer::post("rol"));
$objeto->setIsroot(Leer::post("root"));
$objeto->setIsActive(Leer::post("activo"));
$objeto->setFechaalta(Leer::post("fechaalta"));
//$objeto->setFechalogin(Leer::post("fechalogin"));
$r = $modelo->edit($objeto, $loginpk);
$bd->closeConexion();
header("Location: ../admin/panel.php?update=$r");
<?php
require '../clases/comun.php';
//este metodo comprueba que estas atuentificado en la sesion como ROOT
$sesion->administrador("../usuario/viewalta.php");
$bd = new BaseDatos();
//creamos el usuario y su modelo
$objeto = new Usuario();
$modelo = new ModeloUsuario($bd);
//
$loginpk = Leer::post("loginpk");
$login = Leer::post("login");
$clave = Leer::post("clave");
$objeto->setLogin($login);
$objeto->setClave($clave);
//
$objeto->setNombre(Leer::post("nombre"));
$objeto->setApellidos(Leer::post("apellidos"));
$objeto->setEmail(Leer::post("email"));
$objeto->setIsActive(Leer::post("activo"));
$objeto->setIsRoot(Leer::post("root"));
$objeto->setFechaAlta(Leer::post("falta"));
$objeto->setRol(Leer::post("rol"));

$r = $modelo->edit($loginpk, $objeto);
header("Location: index.php?operation=Update&$r");

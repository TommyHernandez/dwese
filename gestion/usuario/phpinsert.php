<?php
require '../clases/comun.php';
//este metodo comprueba que estas atuentificado en la sesion como ROOT
$sesion->administrador("../usuario/viewalta.php");
//Creamos la base de datos
$bd = new BaseDatos();
//creamos el usuario y su modelo
$objeto = new Usuario();
$modelo = new ModeloUsuario($bd);
//
$login = Leer::post("login");
$clave = Leer::post("clave");
$objeto->setLogin($login);
$objeto->setClave($clave);
$objeto->setNombre(Leer::post("nombre"));
$objeto->setApellidos(Leer::post("apellidos"));
$objeto->setEmail(Leer::post("email"));


$r = $modelo->add($objeto);
header("Location: index.php?operation=insert&$r");

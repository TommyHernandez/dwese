<?php
require '../clases/comun.php';
//este metodo comprueba que estas atuentificado en la sesion como ROOT
$sesion->administrador("../usuario/viewalta.php");
//Creamos la base de datos
$bd = new BaseDatos();
//creamos el usuario y su modelo
$modelo = new ModeloUsuario($bd);
$objeto = new Usuario();
$objeto->setLogin(Leer::get("login"));
//
$r = $modelo->delete($objeto);

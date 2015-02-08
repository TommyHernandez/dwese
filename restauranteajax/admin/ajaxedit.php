<?php
header('Content-Type: application/json');
require '../require/comun.php';
$bd = new BaseDatos();
$modelo = new ModeloUsuario($bd);
$objeto = new Usuario();
$loginpk = Leer::get("loginpk");
$objeto->setLogin(Leer::get("login"));
$objeto->setClave(Leer::get("clave"));
$objeto->setNombre(Leer::get("nombre"));
$objeto->setApellidos(Leer::get("apellidos"));
$objeto->setEmail(Leer::get("email"));
$objeto->setRol(Leer::get("rol"));
$objeto->setIsroot(Leer::get("isroot"));
$objeto->setIsactivo(Leer::get("isactivo"));
//$objeto->setFechaalta(Leer::get("fechaalta"));
//$objeto->setFechalogin(Leer::get("fechalogin"));
$r = $modelo->edit($objeto, $loginpk);
if ($r) {
    echo "{";
    echo '"estado":true}';
    
}else{
    echo "{";
    echo '"estado":false}';
}
$bd->closeConexion();

<?php

require '../clases/require/comun.php';

$login = Leer::post("login");
$clave = sha1(Leer::post("clave"));
$nombre = Leer::post("nombre");
$apellidos = Leer::post("apellidos");
$claveconfirmada = Leer::post("clave2");
$email = Leer::post("email");
//Creamos la base de datos
$bd = new BaseDatos();
//creamos el usuario y su modelo
$modelo = new ModeloUsuario($bd);
$objeto = new Usuario($login, $clave, $nombre, $apellidos, $email);
$r = $modelo->add($objeto);
if ($r = 1) {
    $id = md5($email . Configuracion::PEZARANIA . $login);
    $enlace = Entorno::getEnlaceCarpeta("phpconfirmar.php?id=" . $id);
    $mensaje = "Hola y Bienvenido a esta subscripcion mensual de linux para todos los publicos <a href='" . $enlace . "'> Click aqui para confirmar</a>";
    //$r = correo::enviarGmail("pedrothdc@gmail.com", $email, "Tomson6111992", "Bienvenido!", $mensaje);
    echo $enlace;
    
    exit();
}
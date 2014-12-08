<?php

require '../clases/comun.php';
echo "entra";
$origen = Leer::post("origen");
$destino = Leer::post("destino");
$asunto = Leer::post("asunto");
$mensaje = Leer::post("mensaje");
$clave = Leer::post("clave");
$r = correo::enviarGmail($origen, $destino, $clave, $asunto, $mensaje);
echo $r;
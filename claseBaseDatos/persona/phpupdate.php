<?php

require '../clases/comun.php';
$id = Leer::post('id');
$nombre = Leer::post("nombre");
$apellido = Leer::post('apellido');
$parametros['id'] = $id;
$parametros['nombre'] = $nombre;
$parametros['apellido'] = $apellido;
$consulta = "update persona set nombre=:nombre, apellido=:apellido WHERE id=:id";
$bd = new BaseDatos();
$bd->setConsulta($consulta, $parametros);
$filas = $bd->getNumeroFilas();
$bd->closeConsulta();
header("Location: index.php?op=update&filas=$filas");

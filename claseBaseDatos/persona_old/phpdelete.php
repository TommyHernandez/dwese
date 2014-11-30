<?php
require '../clases/comun.php';
$id=  Leer::request("id");
$parametros['id'] = $id;
//para borrar hay que pasar todos los campos que forman la clave principal.
$consulta = "delete FROM persona WHERE id=:id";
$bd = new BaseDatos();
$bd->setConsulta($consulta, $parametros);
header("Location: index.php?op=delete&id=$id");

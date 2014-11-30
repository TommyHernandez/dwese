<?php
require '../clases/comun.php';
$id=  Leer::request("id");
$parametros['id'] = $id;
//para borrar hay que pasar todos los campos que forman la clave principal.
$objeto = new Persona();
$bd = new BaseDatos();
$modelo = new ModeloPersona($bd);
$r = $modelo->delete($objeto);
header("Location: index.php?op=delete&id=$id");

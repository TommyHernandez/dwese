<?php

require'../clases/comun.php';
$n = Leer::post("nombre");
$a = Leer::post("apellidos");

$bd = new BaseDatos();
$persona = new Persona(null,$n,$a);
$modelo = new ModeloPersona($bd);
$modelo->addPersona($persona);
header("Location: index.php?op=insert");

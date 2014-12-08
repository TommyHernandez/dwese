<?php
require '../clases/comun.php';
$id = Leer::get("id");
$bd =  new BaseDatos();
$modelo = new ModeloUsuario($bd);
$r = $modelo->activa($id);
if ($r == 1) {
  header ("Location: login.php");
}else{
    // header("Location: viewcorrecto.php");
}
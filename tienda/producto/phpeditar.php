<?php
require_once '../require/comun.php';
$bd = new BaseDatos();
$modelo = new ModeloProducto($bd);
$nombre = Leer::post("nombre");
$descipcion = Leer::post("descripcion");
$precio = Leer::post("precio");
$iva = Leer::post("iva");
$id = Leer::post("id");
$producto = new Producto($id, $nombre, $precio, $iva, $descripcion);
$r = $modelo->edit($producto);
<?php

require '../clases/comun.php';
//este metodo comprueba que estas atuentificado en la sesion como ROOT en caso negativo te manda al index
$sesion->administrador("../index.php");
/* Primeros validamos si alguna cosa no esta en su sitio no abrimos la base de dato ni creamos el modelo.
 * 
 */
$objeto = new Inmueble();
$titulo = LEER::post("titulo");
$descripcion = LEER::post("descripcion");
$estado = strtolower(LEER::post("estado"));
$precio = (double) LEER::post("precio");
$localidad = LEER::post("localidad");
$provincia = LEER::post("provincia");
$tipo = strtolower(LEER::post("tipo"));
$calle = LEER::post("superficie");
$superficie = (int) LEER::post("superficie");
$cp = (int) LEER::post("cp");
$objetivo = strtolower(LEER::post("objetivo"));
//validamos y añadimos
$objeto->setEstado($estado);
$objeto->setObjetivo($objetivo);
$objeto->setTipo($tipo);
$objeto->setDescripcion($descripcion);
$objeto->setCalle($calle);
$objeto->setCp($cp);
$objeto->setPrecio($precio);
$objeto->setProvincia($provincia);
$objeto->setSuperficie($superficie);
$objeto->setLocalidad($localidad);
$objeto->setTitulo($titulo);
/*
  if (!Validar::isLongitudMinima($titulo, 6)) {
  exit();
  }else{
  $objeto->setTitulo($titulo);

  }
  if (!Validar::isLongitudMinima($localidad, 6)) {
  exit();
  }else{
  $objeto->setLocalidad($localidad);
  }
  if (!Validar::isLongitudMinima($provincia, 6)) {
  exit();
  }else{
  $objeto->setProvincia($provincia);
  }
  if (!Validar::isNumero($precio)) {
  exit();
  }else{
  $objeto->setPrecio($precio);
  }

  if (!Validar::isEntero($superficie)) {
  exit();
  }else{
  $objeto->setSuperficie($superficie);
  }
  if (!Validar::isCP($cp)) {

  }else{
  $objeto->setCp($cp);
  }
 */
//Creamos la base de datos y el modelo
$bd = new BaseDatos();
$modelo = new modeloInmueble($bd);
//
$r = $modelo->add($objeto);
if ($r != -1) {
    //subimos las fotos
    $subida = new Subir("fotos");
    $subida->setDestino("../fotos");
    $subida->setAccion(Subir::RENOMBRAR);
    $subida->addExtension("pdf");
    $subida->subir();
//creamos el objeto foto
    $foto = new Foto();
    $destino = $subida->getDestinos();
    $modeloFoto = new modeloFoto($bd);
    for ($a = 0; $a < sizeof($destino); $a++) {
        $foto->setRuta($destino[$a]);
        $foto->setIdinmueble($r);
        $r1 = $modeloFoto->add($foto);
    }
}
header("Location: ../adminpanel.php?operation=$r$r1");

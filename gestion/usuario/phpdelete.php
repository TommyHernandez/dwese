<?php
require '../clases/require/comun.php';
//este metodo comprueba que estas atuentificado en la sesion como ROOT
$sesion->administrador("../index.php");
//Creamos la base de datos
$bd = new BaseDatos();
//creamos el usuario y su modelo
$modelo = new ModeloUsuario($bd);
$objeto = new Usuario();
$login = Leer::get("login");
//
$modeloFoto = new modeloFoto($bd);
$fotillo = $modeloFoto->get("login=".$login);
if($fotillo){
    unlink($fotillo->getRuta());
}else{
    
}
$r = $modelo->delete($login);
if (!$r) {
   header("Location: ../admin/panel.php?delete=-1"); 
}
header("Location: ../admin/panel.php?delete=0");

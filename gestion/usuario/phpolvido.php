<?php
require '../clases/require/comun.php';
$bd = new BaseDatos();
$modelo = new ModeloUsuario($bd);
if (Leer::post("login") != "") {
    $login = Leer::post("login");
    $objeto = $modelo->get($login);
    if ($objeto->getLogin() == $login) {
        $id = md5($objeto->getLogin() . Configuracion::PEZARANIA . $objeto->getEmail());
    $enlace = Entorno::getEnlaceCarpeta("viewrecupera.php?login=$login&id=" . $id);
    $mensaje = "Hola $login has solicitado cambiar tu contraseña <a href='" . $enlace . "'> Click aqui para Cambiarla</a> PD: si no eres tu se Buena gente y no le des anda ;)";
    //$r = correo::enviarGmail("pedrothdc@gmail.com", $email, Configuracion::clavemail, "Bienvenido!", $mensaje);
   
    echo $mensaje;    
    } else {
        header("Location: ../login.php?err=-11");
    }
}
?>

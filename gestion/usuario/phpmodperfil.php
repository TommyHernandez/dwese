<?php

require '../clases/require/comun.php';
$usuario = $sesion->getUsuario();
$bd = new BaseDatos();
$modelo = new ModeloUsuario($bd);
$login = $usuario->getLogin();

$elec = Leer::post("elec");
switch ($elec) {
    case 0:
        $nombre = Leer::post('nombre');
        $apellidos = Leer::post('apellidos');
        $usuario->setNombre($nombre);
        $usuario->setApellidos($apellidos);
        $r = $modelo->edit($usuario, $login);
        if (!$r) {
            header("Location: userpanel.php?error=-10");
        }
        break;
    case 1:
        $usuario->setEmail(Leer::post("mail"));
        $r = $modelo->edit($usuario, $login);
        if ($r) {
            header("Location: userpanel.php?error=0");
        } else {
            header("Location: userpanel.php?error=-3");
        }
        break;
    case 2:
        if (sha1(Leer::post("old")) != $usuario->getClave()) {
            header("Location: userpanel.php?error=-1");
        } else {
            if (Leer::post("new1") != Leer::post("new2")) {
                header("Location: userpanel.php?error=-2");
            } else {
                $usuario->setClave(sha1(Leer::post("new1")));
                $modelo->edit($usuario, $login);
            }
        }
        break;
    case 3:
        $modeloFoto = new modeloFoto($bd);
        $condicion = "login=$login";
        $foto = $modeloFoto->get($condicion);

        if ($foto) {
            $ruta = $foto->getRuta();
            unlink($ruta);
             //subimos las foto
        $subida = new Subir("foto");
        $subida->setDestino("../fotos");
        $subida->setAccion(Subir::RENOMBRAR);
        $subida->addExtension("pdf");
        $subida->subir();
        } else {
            $foto = new Foto();
             //subimos las foto
        $subida = new Subir("foto");
        $subida->setDestino("../fotos");
        $subida->setAccion(Subir::RENOMBRAR);
        $subida->addExtension("pdf");
        $subida->subir();
        var_dump($subida->getDestinos());
        //creamos el objeto foto
        $foto->setLogin($login);
        $foto->setRuta($subida->getDestinos()[0]);
        var_dump($foto);
        $r = $modeloFoto->add($foto);
        }
        
     
//creamos el objeto foto
        
        if (!$r) {
            echo "fallo";
        }
        break;
}
$sesion->setUsuario($usuario);
//header("Location: userpanel.php?error=0");

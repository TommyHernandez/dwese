<?php

require_once '../require/comun.php';
header('Content-Type: application/json');
$tipo = Leer::request("tipo"); /* tipo 1 = plato ; tipo 2 = menu; */
$bd = new BaseDatos();
if ($tipo == 1) {
    $nombre = Leer::request("nombre");
    $descripcion = Leer::request("descripcion");
    $precio = Leer::request("precio");
    $plato = new Plato(null, $nombre, $descripcion, $precio);
    $modelo = new ModeloPlato($bd);
    $modeloforo = new ModeloFoto($bd);
    $r = $modelo->add($plato);
    /* Subimos los archivos */
    if (isset($_FILES["archivo"])) {
        $numerodearchivos = $_POST["numerodearchivos"];
        if ($_FILES["archivo"]["error"] > 0) {
            foreach ($_FILES["archivo"]["error"] as $indice => $valor) {
                if ($valor == UPLOAD_ERR_OK) {
                    $tmp = $_FILES["archivo"]["tmp_name"][$indice];
                    $name = $_FILES["archivo"]["name"][$indice];
                    move_uploaded_file($tmp, "../fotos/" . $name);
                    $objetoFoto = new foto(NULL, $pid, "fotos/" . $name);
                    $modeloFoto->add($objetoFoto);
                } else {
                    
                }
            }
        }
    }
    /* FIN */
    if ($r) {
        echo '{"status": true}';
    } else {
        echo '{"status": false}';
    }
}

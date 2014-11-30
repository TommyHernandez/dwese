<?php
/**
 * Description of Persona
 *
 * @author Pedrothdc
 */
class Persona {
            private$id, $nombre, $apellido;

    function __construct($id = NULL, $nombre = NULL, $apellido = NULL) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    function set($datos, $inicio=0){
        $this->id = $datos[0+$inicio];
        $this->nombre = $datos[1+$inicio];
        $this->apellidos = $datos[2+$inicio];
    
}
public function getId() {
    return $this->id;
}

public function getNombre() {
    return $this->nombre;
}

public function getApellido() {
    return $this->apellido;
}

public function setId($id) {
    $this->id = $id;
}

public function setNombre($nombre) {
    $this->nombre = $nombre;
}

public function setApellido($apellido) {
    $this->apellido = $apellido;
}



}

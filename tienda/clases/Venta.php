<?php
/**
 * Description of Venta
 *
 * @author Tomas
 */
class Venta {

    private $id,$fecha,$hora,$pago,$direnvio,$nombre;
    function __construct($id= null, $fecha = null, $hora = null, $pago = "no", $direnvio="", $nombre="") {
        $this->id = $id;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->pago = $pago;
        $this->direnvio = $direnvio;
        $this->nombre = $nombre;
    }
 function set($datos, $inicio = 0) {
        $this->id = $datos[0 + $inicio];
        $this->nombre = $datos[1 + $inicio];
        $this->precio = $datos[2 + $inicio];
        $this->iva = $datos[3 + $inicio];
        $this->descripcion = $datos[4 + $inicio];
    }
    function getId() {
        return $this->id;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getHora() {
        return $this->hora;
    }

    function getPago() {
        return $this->pago;
    }

    function getDirenvio() {
        return $this->direnvio;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    function setPago($pago) {
        $this->pago = $pago;
    }

    function setDirenvio($direnvio) {
        $this->direnvio = $direnvio;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }


    
    
}

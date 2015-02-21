<?php

class Producto {

    private $id;
    private $nombre;
    private $iva;
    private $precio;
    private $descripcion;

    function __construct($id = null, $nombre = "null", $precio = "nan", $iva = 21, $descripcion = "null") {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->iva = $iva;
        $this->precio = $precio;
        $this->descripcion = $descripcion;
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

    function getNombre() {
        return $this->nombre;
    }

    function getIva() {
        return $this->iva;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setIva($iva) {
        $this->iva = $iva;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getJSON() {
        $prop = get_object_vars($this);
        $resp = '{ ';
        foreach ($prop as $key => $value) {
            $resp.='"' . $key . '":' . json_encode(htmlspecialchars_decode($value)) . ',';
        }
        $resp = substr($resp, 0, -1) . "}";
        return $resp;
    }

}

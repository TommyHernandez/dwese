<?php

/**
 * Description of Menu
 *
 * @author Tomas
 */
class Menu {

    private $id, $nombre, $p1, $p2, $p3, $activo;

    function __construct($id = NULL, $nombre = "", $p1 = 0, $p2 = 0, $p3 = 0, $activo = false) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->p1 = $p1;
        $this->p2 = $p2;
        $this->p3 = $p3;
        $this->activo = $activo;
    }

    function set($datos, $inicio = 0) {
        $this->id = $datos[0 + $inicio];
        $this->nombre = $datos[1 + $inicio];
        $this->p1 = $datos[2 + $inicio];
        $this->p2 = $datos[3 + $inicio];
        $this->p3 = $datos[4 + $inicio];
        $this->activo = $datos[5 + $inicio];
    }

    function getId() {
        return $this->id;
    }

    function getP1() {
        return $this->p1;
    }

    function getP2() {
        return $this->p2;
    }

    function getP3() {
        return $this->p3;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setP1($p1) {
        $this->p1 = $p1;
    }

    function setP2($p2) {
        $this->p2 = $p2;
    }

    function setP3($p3) {
        $this->p3 = $p3;
    }

    function getActivo() {
        return $this->activo;
    }

    function setActivo($activo) {
        $this->activo = $activo;
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

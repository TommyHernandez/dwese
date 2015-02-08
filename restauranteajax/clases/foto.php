<?php
/**
 * Description of foto
 *
 * @author Tomas
 */
class foto {

    private $id, $pid, $ruta;

    function __construct($id = NULL, $pid = 0, $ruta = "") {
        $this->id = $id;
        $this->pid = $pid;
        $this->ruta = $ruta;
    }

    function set($datos, $inicio = 0) {
        $this->id = $datos[0 + $inicio];
        $this->pid = $datos[1 + $inicio];
        $this->ruta = $datos[2 + $inicio];
    }

    function getId() {
        return $this->id;
    }

    function getPid() {
        return $this->pid;
    }

    function getRuta() {
        return $this->ruta;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPid($pid) {
        $this->pid = $pid;
    }

    function setRuta($ruta) {
        $this->ruta = $ruta;
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

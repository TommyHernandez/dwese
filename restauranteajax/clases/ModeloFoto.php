<?php
/**
 * Description of ModeloFoto
 *
 * @author Tomas
 */
class ModeloFoto {

    private $bd = null;
    private $tabla = "fotos";

    function __construct($bd) {
        $this->bd = $bd;
    }

    function add(foto $objeto) {
        $sql = "insert into " . $this->tabla . " values( :id, :pid,"
                . ":ruta)";
        $parametros["id"] = $objeto->getId();
        $parametros["pid"] = $objeto->getPid();
        $parametros["ruta"] = $objeto->getRuta();
        $r = $this->bd->setConsulta($sql, $parametros);
        if (!$r) {
            return -1;
        }
        return $r;
    }

    function count($condicion = "1=1", $parametros = array()) {
        $sql = "select count(*) from $this->tabla where $condicion";
        $r = $this->bd->setConsulta($sql, $parametros);
        if ($r) {
            $f = $this->bd->getFila();
            return $f[0];
        }
        return -1;
    }

    function delete(foto $objeto) {
        $sql = "delete from $this->tabla where id = :id";
        $parametros["id"] = $objeto->getId();
        $r = $this->bd->setConsulta($sql, $parametros);
        if (!$r) {
            return -1;
        }
        return $this->bd->getNumeroFilas();
    }

    function get($id) {
        $condicion = "id = :id";
        $parametros["id"] = $id;
        $r = $this->getConsulta($condicion, $parametros);
        if (sizeof($r) >= 1) {
            return $r[0];
        }
        return null;
    }

    function getJSON($id) {
        return $this->get($id)->getJSON();
    }

    function getListJSON($pagina = 0, $rpp = 3, $condicion = "1=1", $parametros = array(), $orderby = "1") {
        $pos = $pagina * $rpp;
        $sql = "select * from "
                . $this->tabla .
                " where $condicion order by $orderby limit $pos, $rpp";
        $this->bd->setConsulta($sql, $parametros);
        $r = "[ ";
        while ($fila = $this->bd->getFila()) {
            $objeto = new foto();
            $objeto->set($fila);
            $r .= $objeto->getJSON() . ",";
        }
        $r = substr($r, 0, -1) . "]";
        return $r;
    }
    
      function getRutaJSON($id) {
        $sql = "select * from "
                . $this->tabla .
                " where idp=$id";
        $parametros = array();
        $this->bd->setConsulta($sql, $parametros);
        $r = "[ ";
        while ($fila = $this->bd->getFila()) {
            $objeto = new foto();
            $objeto->set($fila);
            $r .= $objeto->getRutaJSON() . ",";
        }
        $r = substr($r, 0, -1) . "]";
        return $r;
    }

    function getConsulta($condicion = "1=1", $parametros = array(), $orderby = "1") {
        $list = array();
        $sql = "select * from $this->tabla where $condicion order by $orderby";
        $r = $this->bd->setConsulta($sql, $parametros);
        if ($r) {
            while ($fila = $this->bd->getFila()) {
                $foto = new foto();
                $foto->set($fila);
                $list[] = $foto;
            }
        }
        return $list;
    }

    function getRutaId($id) {
        $sql = "select * from  $this->tabla where id=$id";
        $parametros =array();
        $rutas = array();
        $r = $this->bd->setConsulta($sql, $parametros);
        if ($r) {
            while ($fila = $this->bd->getFila()) {
                $foto = new foto();
                $foto->set($fila);
                $rutas[] = $foto->getRuta();
            }
        }
        return $rutas;
    }

}

<?php
/**
 * Description of ModeloDetalleVenta
 *
 * @author Tomas
 */
class ModeloDetalleVenta {
    
    private $bd = null;
    private $tabla = "detalleventa";

    function __construct($bd) {
        $this->bd = $bd;
    }

    function add(DetalleVenta $objeto) {
        $sql = "insert into " . $this->tabla . " values( null, :idventa, "
                . ":idproducto, :cantidad, :precio, :iva)";
        $parametros["idventa"] = $objeto->getIdventa();
        $parametros["idproducto"] = $objeto->getIdproducto();
        $parametros["cantidad"] = $objeto->getCantidad();
        $parametros["precio"] = $objeto->getPrecio();
        $parametros["iva"] = $objeto->getIva();        
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

    function getConsulta($condicion = "1=1", $parametros = array(), $orderby = "1") {
        $list = array();
        $sql = "select * from $this->tabla where $condicion order by $orderby";
        $r = $this->bd->setConsulta($sql, $parametros);
        if ($r) {
            while ($fila = $this->bd->getFila()) {
                $objeto = new DetalleVenta();
                $objeto->set($fila);
                $list[] = $objeto;
            }
        }
        return $list;
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

    function delete(DetalleVenta $objeto) {
        $sql = "delete from $this->tabla where login = :login";
        $parametros["login"] = $objeto->getLogin();
        $r = $this->bd->setConsulta($sql, $parametros);
        if (!$r) {
            return -1;
        }
        return $this->bd->getNumeroFilas();
    }

    function getListPagina($pagina = 0, $rpp = 4, $condicion = "1=1", $parametros = array(), $orderby = "1") {
        $pos = $pagina * $rpp;
        $sql = "select * from "
                . $this->tabla .
                " where $condicion order by $orderby limit $pos, $rpp";
        $r = $this->bd->setConsulta($sql, $parametros);
        $respuesta = array();
        while ($fila = $this->bd->getFila()) {
            $objeto = new DetalleVenta();
            $objeto->set($fila);
            $respuesta[] = $objeto;
        }
        return $respuesta;
    }
}

<?php
/**
 * Description of ModeloPaypal
 *
 * @author Tomas
 */
class ModeloPaypal {
    private $bd = null;
    private $tabla = "paypal";

    function __construct($bd) {
        $this->bd = $bd;
    }

    function add(Paypal $objeto) {
        $sql = "insert into " . $this->tabla . " values( null, :itemname, :verificado, :gross, :txnid, :payer, :resto)";
        $parametros["id"] = $objeto->getId();
        $parametros["itemname"] = $objeto->getItemname();
        $parametros["verificado"] = $objeto->getVerificado();
        $parametros["gross"] = $objeto->getGross();
        $parametros["txnid"] = $objeto->getTxnid();
        $parametros["payer"] = $objeto->getPayer();
        $parametros["resto"] = $objeto->getResto();      
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
                $usuario = new Paypal();
                $usuario->set($fila);
                $list[] = $usuario;
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

    function delete(Paypal $objeto) {
        $sql = "delete from $this->tabla where login = :id";
        $parametros["id"] = $objeto->getId();
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
            $objeto = new Paypal();
            $objeto->set($fila);
            $respuesta[] = $objeto;
        }
        return $respuesta;
    }
}

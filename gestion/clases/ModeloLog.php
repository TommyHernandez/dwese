<?php

/**
 * Description of ModeloLog
 *
 * @author Tomas
 */
class ModeloLog {

    private $bd = null;
    private $tabla = "log";

    function __construct(BaseDatos $bd) {
        $this->bd = $bd;
    }
/**
 * 
 * @param Log $objeto
 * @return type
 */
    function add(Log $objeto) {
        $parametros['login'] = $objeto->getLogin();
        $parametros['tipo'] = $objeto->getTipo();

        //
        $sql = "insert INTO $this->tabla values(null, :login, CURDATE(), :tipo)";
        $r = $this->bd->setConsulta($sql, $parametros);
        if (!$r) {
            return -1;
        } else {
            return $r;
        }
    }
/**
 * 
 * @param type $principio
 * @param type $rpp
 * @param type $condicion
 * @param type $orderby
 * @param type $parametros
 * @return \log
 */
    function getList($principio = 0, $rpp = 5, $condicion = "1=1", $orderby = 1, $parametros = array()) {
        $list = array();
        $sql = "select * from $this->tabla WHERE $condicion order by $orderby limit $principio, $rpp";
        $r = $this->bd->setConsulta($sql, $parametros);
        if (!$r) {
            return null;
        } else {
            while ($fila = $this->bd->getFila()) {
                $log = new log();
                $log->set($fila);
                $list[] = $log;
            }
            return $list;
        }
    }
/**
 * 
 * @param type $condicion
 * @param type $parametros
 * @return type
 */
    function getCount($condicion = "1=1", $parametros = array()) {
        $sql = "select count(*) from $this->tabla WHERE $condicion ";
        $r = $this->bd->setConsulta($sql, $parametros);
        $tuplas = $this->bd->getFila();
        return $tuplas[0];
    }

}

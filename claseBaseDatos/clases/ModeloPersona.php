<?php
/**
 * Description of ModeloPersona
 * @version 0.9
 *
 * @author PedroTHDC
 */
class ModeloPersona {

    private $bd;
    private $tabla = "persona";

    function __construct(BaseDatos $bd) {
        $this->bd = $bd;
    }

    /**
     * 
     * @param Persona $objeto
     */
    function addPersona(Persona $objeto) {
        $parametros['nombre'] = $objeto->getNombre();
        $parametros['apellido'] = $objeto->getApellido();
        $sql = "insert INTO $this->tabla values(null, :nombre , :apellido)";
        $bd = new BaseDatos();
        $r = $this->bd->setConsulta($sql, $parametros);
        if (!$r) {
            return -1;
        } else {
            return $this->bd->getAutonumerico();
        }
    }

    function delete(Persona $objeto) {
        $parametros['id'] = $objeto->getId();
        $sql = "delete FROM $this->tabla WHERE id=:id";
        $bd = new BaseDatos();
        $r = $this->bd->setConsulta($sql, $parametros);
        if (!$r) {
            return -1;
        } else {
            return $this->bd->getNumeroFilas();
        }
    }

    /**
     * 
     * @param Persona $objeto
     * @return type
     */
    function edit(Persona $objeto) {

        $parametros['id'] = $objeto->getId();
        $parametros['nombre'] = $objeto->getNombre();
        $parametros['apellido'] = $objeto->getApellido();
        $consulta = "update $this->tabla set nombre=:nombre, apellido=:apellido WHERE id=:id";
        $bd->setConsulta($consulta, $parametros);
        if (!$r) {
            return -1;
        } else {
            return $this->bd->getNumeroFilas();
        }
        $bd->closeConsulta();
    }

    /**
     * 
     * @param Persona $objetoOriginal
     * @param Persona $objetoNuevo
     * @return type
     */
    function editPk(Persona $objetoOriginal, Persona $objetoNuevo) {

        $parametros['id'] = $objetoNuevo->getId();
        $paramettros['idpk'] = $objeto->getId();
        $parametros['nombre'] = $objetoNuevo->getNombre();
        $parametros['apellido'] = $objetoNuevo->getApellido();
        $consulta = "update $this->tabla set id=:id, nombre=:nombre, apellido=:apellido WHERE id=:idpk";
        $bd->setConsulta($consulta, $parametros);
        if (!$r) {
            return -1;
        } else {
            return $this->bd->getNumeroFilas();
        }
        $bd->closeConsulta();
    }

    /**
     * 
     */
    function get() {
        $sql = "Select * FROM $this->tabla";
        if (!$r) {
            return null;
        } else {
            $fila = new $this->bd->getFila();
            $persona = new Persona();
            $persona->set($fila);
            return $persona;
        }
    }

    /**
     * 
     * @param type $condicion
     * @param type $parametros
     * @return type
     * 
     */
    function getCount($condicion = "1=1", $parametros = array()) {
        $sql = "select count(*) from $this->tabla WHERE $condicion ";
        $r = $this->bd->setConsulta($sql, $parametros);
        $tuplas = $this->bd->getFila();
        return $tuplas[0];
    }

    /**
     * 
     * @param type $condicion
     * @param type $parametros
     * @param type $orderby
     * @return type
     */
    function getList($pagina = 0, $rpp = 10, $condicion = "1=1", $parametros = array(), $orderby = 1) {
        $list = array();
        $principio = $rpp*$pagina;
        $sql = "select * from $this->tabla WHERE $condicion order by $orderby limit $principio, $rpp";
        $r = $this->bd->setConsulta($sql, $parametros);
        if (!$r) {
            return null;
        } else {
            while ($fila = $this->bd->getFila()) {
                $persona = new Persona();
                $persona->set($fila);
                $list[] = $persona;
                
            }
            return $list;
        }
    }

    function selectHTML($id, $name, $condicion, $parametros, $paramentroBlanco = true) {
        
    }

}

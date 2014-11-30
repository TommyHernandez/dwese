<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModeloPersona
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
        $sql = "select count(*) from $this->tabla WHERE $condion ";
        $r = $this->bd->setConsulta($sql, $parametros);
        return $this->bd->getFila();
    }
/**
 * 
 * @param type $condicion
 * @param type $parametros
 * @param type $orderby
 * @return type
 */
    function getList($condicion = "1=1", $parametros = array(), $orderby = 1) {
        $list = array();
        $sql = "select * from $this->tabla WHERE $condicion order by $orderby";
        $r = $this->bd->setConsulta($sql,$parametros);
        if (!$r) {
            return null;
        }else{
        while($fila = $this->bd->getFila()){
            $persona = new Persona();
            $persona->set($fila);
            $list[] = $persona;
        }
            
        }
    }
    function selectHTML($id,$name,$condicion,$parametros, $paramentroBlanco = true){
        
    }
}

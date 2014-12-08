<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of modeloInmueble
 *
 * @author Tomas
 */
class modeloInmueble {

    private $bd = null;
    private $tabla = "inmueble";

    function __construct(BaseDatos $bd) {
        $this->bd = $bd;
    }

    /**
     * Añade un inmueble en la base de datos
     * @param Inmueble $objeto
     * @return int
     */
    function add(Inmueble $objeto) {
        $hoy = date("Y-m-d H:i:s"); 
        $parametros["titulo"] = $objeto->getTitulo();
        $parametros["descripcion"] = $objeto->getDescripcion();
        $parametros["estado"] = $objeto->getEstado();
        $parametros["precio"] = $objeto->getPrecio();
        $parametros["provincia"] = $objeto->getProvincia();
        $parametros["localidad"] = $objeto->getLocalidad();
        $parametros["tipo"] = $objeto->getTipo();
        $parametros["calle"] = $objeto->getCalle();
        $parametros["superficie"] = $objeto->getSuperficie();
        $parametros["cp"] = $objeto->getCp();
        $parametros["objetivo"] = $objeto->getObjetivo();
        $parametros["fecha"] = $hoy;
        //
        $sql = "INSERT INTO $this->tabla (`id`, `titulo`, `descripcion`, `estado`, `precio`, `localidad`, `provincia`, `tipo`, `calle`, `superficie`, `cp`, `objetivo`, `fecha`)"
                . " VALUES (NULL, :titulo, :descripcion, :estado, :precio, :localidad, :provincia, :tipo, :calle, :superficie, :cp, :objetivo, :fecha) "; 
        $r = $this->bd->setConsulta($sql, $parametros);
        if (!$r) {
            return -1;
        } else {
            return $this->bd->getAutonumerico();
        }
    }
    function addApelo(){
        $sql = "INSERT INTO $this->tabla (`id`, `titulo`, `descripcion`, `estado`, `precio`, `localidad`, `provincia`, `tipo`, `calle`, `superficie`, `cp`, `objetivo`, `fecha`) VALUES (NULL, 'dfsd', 'fsdfsdf', 'nuevo', '123456', 'Granda', 'Baza', 'casa', 'gased', '123', '18650', 'venta', '2014-12-08')";
        $this->bd->setConsultaSQL($sql);
    }

    function delete($id) {
        $parametros['id'] = $id;
        $sql = "delete FROM $this->tabla WHERE id=:id";
        $r = $this->bd->setConsulta($sql, $parametros);
        if (!$r) {
            return -1;
        } else {
            return $this->bd->getNumeroFilas();
        }
    }

    /**
     * En el nuevo objeto tendremos la id a modificar.
     * @param Inmueble $objeto
     * @return type
     */
    function edit(Inmueble $objeto) {

        $parametros['id'] = $objeto->getId();
        $parametros['titulo'] = $objeto->getTitulo();
        $parametros["descripcion"] = $objeto->getDescripcion();
        $parametros["estado"] = $objeto->getEstado();
        $parametros["precio"] = $objeto->getPrecio();
        $parametros["provincia"] = $objeto->getProvincia();
        $parametros["localidad"] = $objeto->getLocalidad();
        $parametros["tipo"] = $objeto->getTipo();
        $parametros["calle"] = $objeto->getCalle();
        $parametros["superficie"] = $objeto->getSuperficie();
        $parametros["cp"] = $objeto->getCp();
        $parametros["objetivo"] = $objeto->getObjetivo();
        //Preparamos la consulta
        $sql = "update $this->tabla set titulo=:titulo,descripcion=:descripcion, estado=:estado, precio=:precio, localidad=:localidad, provincia=:provincia,calle=:calle, superficie=:superficie,cp=:cp, objetivo=:objetivo, fecha=CURDATE()  WHERE id=:id";
        $r = $this->bd->setConsulta($sql, $parametros);
        if (!$r) {
            return $this->bd->getError();
        } else {
            return $this->bd->getNumeroFilas();
            
        }
        $bd->closeConsulta();
    }

    function editConsulta($asignacion, $condicion = "1=1", $parametros = array()) {
        $consulta = "update $this->tabla set $asignacion WHERE $condicion";
        $r = $this->bd->setConsulta($consulta, $parametros);
        if (!$r) {
            return -1;
        }
        return $this->bd->getNumeroFilas();
    }

    /**
     * Te da el numero total de tuplas en la tabla
     * @param type $condicion
     * @param type $parametros
     * @return int
     */
    function getCount($condicion = "1=1", $parametros = array()) {
        $sql = "select count(*) from $this->tabla WHERE $condion ";
        $r = $this->bd->setConsulta($sql, $parametros);
        $tuplas = $this->bd->getFila();
        return $tuplas[0];
    }

    /**
     * 
     * @param type $principio
     * @param type $rpp
     * @param type $condicion
     * @param type $orderby
     * @param type $parametros
     * @return \Inmueble
     */
    function getList($principio = 0, $rpp = 5, $condicion = "1=1", $orderby = 1, $parametros = array()) {
        $list = array();
        $sql = "select * from $this->tabla WHERE $condicion order by $orderby limit $principio, $rpp";
        $r = $this->bd->setConsulta($sql, $parametros);
        if (!$r) {
            return null;
        } else {
            while ($fila = $this->bd->getFila()) {
                $inmueble = new Inmueble();
                $inmueble->set($fila);
                $list[] = $inmueble;
            }
            return $list;
        }
    }

    function selectHTML($id, $name, $condicion, $parametros, $paramentroBlanco = true) {
        
    }

}

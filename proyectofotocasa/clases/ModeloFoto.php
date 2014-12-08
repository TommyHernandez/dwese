<?php

/**
 * Description of modeloFoto
 *
 * @author Tomas
 */
class modeloFoto {

    private $bd;
    private $tabla = "imagenes";

    function __construct(BaseDatos $bd) {
        $this->bd = $bd;
    }

    /**
     * Añade una foto a la tabla fotos, su ruta en realidad
     * @param Foto $objeto
     */
    function add(Foto $objeto) {
        $parametros['idinmueble'] = $objeto->getIdinmueble();
        $parametros['ruta'] = $objeto->getRuta();
        $sql = "insert INTO $this->tabla values(null, :idinmueble , :ruta)";
        $r = $this->bd->setConsulta($sql, $parametros);
        if (!$r) {
            return -1;
        } else {
            return $this->bd->getAutonumerico();
        }
    }

    function delete(Foto $id) {
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
     * El nuevo objeto tendra en id la id que ya tenia
     * @param Foto $objeto
     * @return type
     */
    function edit(Foto $objeto) {
        $parametros['id'] = $objeto->getId();
        $parametros['idinmueble'] = $objeto->getNombre();
        $parametros['ruta'] = $objeto->getApellido();
        $consulta = "update $this->tabla set idinmueble=:idinmueble, ruta=:ruta WHERE id=:id";
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

    /**
     * 
     * @return Foto
     */
    function get() {
        $sql = "Select * FROM $this->tabla";
        if (!$r) {
            return null;
        } else {
            $fila = new $this->bd->getFila();
            $foto = new Foto();
            $foto->set($fila);
            return $persona;
        }
    }

    /**
     * Devuelve un array de fotos
     * @param type $condicion
     * @param type $parametros
     * @param type $orderby
     * @return \Foto
     */
    function getList($principio = 0, $rpp = 5, $condicion = "1=1", $parametros = array(), $orderby = 1) {
        $list = array();
        $sql = "select * from $this->tabla WHERE $condicion order by $orderby limit $principio, $rpp";
        $r = $this->bd->setConsulta($sql, $parametros);
        if (!$r) {
            return null;
        } else {
            while ($fila = $this->bd->getFila()) {
                $foto = new Foto();
                $foto->set($fila);
                $list[] = $foto;
            }
            return $list;
        }
    }

}

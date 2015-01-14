<?php

/**
 * Description of modeloFoto
 *
 * @author Tomas
 */
class modeloFoto {

    private $bd;
    private $tabla = "imgperfil";

    function __construct(BaseDatos $bd) {
        $this->bd = $bd;
    }

    /**
     * Añade una foto a la tabla fotos, su ruta en realidad
     * @param Foto $objeto
     */
    function add(Foto $objeto) {
        $parametros['login'] = $objeto->getId();
        $parametros['ruta'] = $objeto->getRuta();
        $sql = "insert INTO $this->tabla values(null, :idinmueble , :ruta)";
        $r = $this->bd->setConsulta($sql, $parametros);
        if (!$r) {
            return -1;
        } else {
            return $this->bd->getAutonumerico();
        }
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
     * El nuevo objeto tendra en id la id que ya tenia
     * @param Foto $objeto
     * @return type
     */
    function edit(Foto $objeto) {
        $parametros['id'] = $objeto->getId();
        $parametros['login'] = $objeto->getLogin();
        $parametros['ruta'] = $objeto->getRuta();
        $consulta = "update $this->tabla set login=:login, ruta=:ruta WHERE id=:id";
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
    function get($condicion = "1=1") {
        $sql = "Select * FROM $this->tabla WHERE $condicion";
        $r = $this->bd->setConsulta($sql);
        if (!$r) {
            return null;
        } else {
            $fila = $this->bd->getFila();
            $foto = new Foto();
            $foto->set($fila);
            return $foto;
        }
    }

    /**
     * Devuelve un array de fotos
     * @param type $condicion
     * @param type $parametros
     * @param type $orderby
     * @return \Foto
     */
    function getList($principio = 0, $rpp = 5, $condicion = "1=1", $orderby = 1, $parametros = array()) {
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

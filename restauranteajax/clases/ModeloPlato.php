<?php

/**
 * Description of ModeloPlato
 *
 * @author Tomas
 */
class ModeloPlato {

    private $bd = null;
    private $tabla = "platos";

    function __construct($bd) {
        $this->bd = $bd;
    }

    function add(Plato $objeto) {
        $sql = "insert into " . $this->tabla . " values( :id, :nombre,"
                . ":descripcion, :precio)";
        $parametros["id"] = $objeto->getId();
        $parametros["nombre"] = $objeto->getNombre();
        $parametros["descripcion"] = $objeto->getDescripcion();
        $parametros["precio"] = $objeto->getPrecio();
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

    function edit(Plato $objeto, $idpk) {
        $asignacion = "id = :id, nombre = :nombre,descripcion = :descripcion,precio = :precio";
        $condicion = "id = $idpk";
        $parametros["id"] = $objeto->getId();
         $parametros["nombre"] = $objeto->getNombre();
          $parametros["descripcion"] = $objeto->getDescripcion();
           $parametros["precio"] = $objeto->getPrecio();

        return $this->editConsulta($asignacion, $condicion, $parametros);
    }

    function editConsulta($asignacion, $condicion = "1=1", $parametros = array()) {
        $sql = "update $this->tabla set $asignacion where $condicion";
        $r = $this->bd->setConsulta($sql, $parametros);
        if (!$r) {
            return -1;
        }
        return $this->bd->getNumeroFilas();
    }

    function getListPagina($pagina = 0, $rpp = 3, $condicion = "1=1", $parametros = array(), $orderby = "1") {
        $pos = $pagina * $rpp;
        $sql = "select * from "
                . $this->tabla .
                " where $condicion order by $orderby limit $pos, $rpp";
        $r = $this->bd->setConsulta($sql, $parametros);
        $respuesta = array();
        while ($fila = $this->bd->getFila()) {
            $objeto = new Plato();
            $objeto->set($fila);
            $respuesta[] = $objeto;
        }
        return $respuesta;
    }

    function delete(Plato $objeto) {
        $sql = "delete from $this->tabla where id = :id";
        $parametros["id"] = $objeto->getId();
        $r = $this->bd->setConsulta($sql, $parametros);
        if (!$r) {
            return -1;
        }
        return $this->bd->getNumeroFilas();
    }

    function getConsulta($condicion = "1=1", $parametros = array(), $orderby = "1") {
        $list = array();
        $sql = "select * from $this->tabla where $condicion order by $orderby";
        $r = $this->bd->setConsulta($sql, $parametros);
        if ($r) {
            while ($fila = $this->bd->getFila()) {
                $usuario = new Plato();
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
            $objeto = new Plato();
            $objeto->set($fila);
            $r .= $objeto->getJSON() . ",";
        }
        $r = substr($r, 0, -1) . "]";
        return $r;
    }

    function selectHtml($id, $name, $valorSeleccionado = "", $blanco = true, $condicion = "1=1", $parametros = array(), $orderby = "1", $textoBlanco = "&nbsp;") {
        $select = "<select name='$name' id='$id'>";
        if ($blanco) {
            $select .= "<option value=''>$textoBlanco</option>";
        }
        $lista = $this->getConsulta($condicion, $parametros, $orderby);
        foreach ($lista as $objeto) {
            $selected = "";
            if ($objeto->getLogin() == $valorSeleccionado) {
                $selected = "selected";
            }
            $select .= "<option $selected value='" . $objeto->getLogin() . "'>" . $objeto->getApellidos() . ", " . $objeto->getNombre() . "</option>";
        }
        $select .= "</select>";
        return $select;
    }

}

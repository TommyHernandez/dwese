<?php

/**
 * Description of ModeloUsuario
 *
 * @author PedroTHDC
 */
class ModeloUsuario {

    private $bd = null;
    private $tabla = "usuario";

    function __construct(BaseDatos $bd) {
        $this->bd = $bd;
    }

    /**
     * Añade un usuario en la base de datos
     * @param Usuario $objeto
     * @return int
     */
    function add(Usuario $objeto) {
        $parametros['login'] = $objeto->getLogin();
        $parametros['clave'] = $objeto->getClave();
        $parametros['nombre'] = $objeto->getNombre();
        $parametros['apellidos'] = $objeto->getApellidos();
        $parametros['email'] = $objeto->getEmail();
        $parametros['isActive'] = $objeto->getIsActive();
        $parametros['isRoot'] = $objeto->getIsRoot();
        $parametros['rol'] = $objeto->getRol();
        //
        $sql = "insert INTO $this->tabla values(:login, :clave, :nombre, :apellidos, :email, curdate(), :isActive, :isRoot, :rol, null)";
        $r = $this->bd->setConsulta($sql, $parametros);
        if (!$r) {
            return -1;
        } else {
            return $r;
        }
    }

    function delete(Usuario $objeto) {
        $parametros['login'] = $objeto->getLogin();
        $sql = "delete FROM $this->tabla WHERE login=:login";
        $r = $this->bd->setConsulta($sql, $parametros);
        if (!$r) {
            return -1;
        } else {
            return $this->bd->getNumeroFilas();
        }
    }

  /*  function edit(Usuario $objeto) {

        $parametros['login'] = $objeto->getId();
        $parametros['nombre'] = $objeto->getNombre();
        $parametros['apellido'] = $objeto->getApellido();
        $consulta = "update $this->tabla set :login, :clave, :nombre, :apellidos, :email, :fechaalta, :isactive, :isroot, :rol, :fechalogino WHERE login=:loginpk";
        $bd->setConsulta($consulta, $parametros);
        if (!$r) {
            return -1;
        } else {
            return $this->bd->getNumeroFilas();
        }
        $bd->closeConsulta();
    }*/
    function edit(Usuario $loginpk, Usuario $objetoNuevo) {

        $parametros['login'] = $objetoNuevo->getLogin();
        $parametros['clave'] = $objetoNuevo->getClave();
        $parametros['nombre'] = $objetoNuevo->getNombre();
        $parametros['apellidos'] = $objeto->getApellidos();
        $parametros['email'] = $objetoNuevo->getEmail();
       //$parametros['fechaAlta'] = $objetoOriginal->getFechaAlta();
        $parametros['isActive'] = $objetoNuevo->getIsActive();
        $parametros['isRoot'] = $objetoNuevo->getIsRoot();
        $parametros['rol'] = $objetoNuevo->getRol();
        $parametros['fechaLogin'] = $objetoNuevo->getFechaLogin();
        $parametros['loginpk'] = $loginpk;
        //Preparamos la consulta
        $consulta = "update $this->tabla set login=:login, clave=:clave, nombre=:nombre, apellidos=:apellidos, email=:email, isactive = :isActive, isroot=:isRoot, rol=:rol,fechalogin = :fechaLogin WHERE login=:loginpk";
        $bd->setConsulta($consulta, $parametros);
        if (!$r) {
            return -1;
        } else {
            return $this->bd->getNumeroFilas();
        }
        $bd->closeConsulta();
    }
/**
 * Le pasa el login del usuario a recuperar y te devuelve un objeto usuario
 * @param type $login
 * @return \Persona
 */
    function get($login) {
        $parametros['login'] = $login;
        $sql = "Select * FROM $this->tabla where login = :login";
        $r = $this->bd->setConsulta($sql, $parametros);
        if (!$r) {
            return null;
        } else {
            $fila = new $this->bd->getFila();
            $persona = new Persona();
            $persona->set($fila);
            return $persona;
        }
    }

    function getCount($condicion = "1=1", $parametros = array()) {
        $sql = "select count(*) from $this->tabla WHERE $condion ";
        $r = $this->bd->setConsulta($sql, $parametros);
        return $this->bd->getFila();
    }
/**
 * 
 */
    function getList($condicion = "1=1", $parametros = array(), $orderby = 1) {
        $list = array();
        $sql = "select * from $this->tabla WHERE $condicion order by $orderby";
        $r = $this->bd->setConsulta($sql, $parametros);
        if (!$r) {
            return null;
        } else {
            while ($fila = $this->bd->getFila()) {
                $usuario = new Usuario();
                $usuario->set($fila);
                $list[] = $usuario;
            }
            return $list;
        }
    }

    function selectHTML($id, $name, $condicion, $parametros, $paramentroBlanco = true) {
        
    }

}

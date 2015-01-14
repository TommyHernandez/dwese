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
        $sql = "insert INTO $this->tabla values(:login, :clave, :nombre, :apellidos, :email, CURDATE(), :isActive, :isRoot, :rol, null)";
        $r = $this->bd->setConsulta($sql, $parametros);
        if (!$r) {
            return -1;
        } else {
            return $r;
        }
    }

    function delete($login) {
        $parametros['login'] = $login;
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
      } */

    function edit(Usuario $objetoNuevo, $loginpk) {

        $parametros['login'] = $objetoNuevo->getLogin();
        $parametros['clave'] = $objetoNuevo->getClave();
        $parametros['nombre'] = $objetoNuevo->getNombre();
        $parametros['apellidos'] = $objetoNuevo->getApellidos();
        $parametros['email'] = $objetoNuevo->getEmail();
        //$parametros['fechaAlta'] = $objetoOriginal->getFechaAlta();
        $parametros['isActive'] = $objetoNuevo->getIsActive();
        $parametros['isRoot'] = $objetoNuevo->getIsRoot();
        $parametros['rol'] = $objetoNuevo->getRol();
        $parametros['fechaLogin'] = $objetoNuevo->getFechaLogin();
        $parametros['loginpk'] = $loginpk;
        //Preparamos la consulta
        $consulta = "update $this->tabla set login=:login, clave=:clave, nombre=:nombre, apellidos=:apellidos, email=:email, isactive = :isActive, isroot=:isRoot, rol=:rol,fechalogin = :fechaLogin WHERE login=:loginpk";
        $r= $this->bd->setConsulta($consulta, $parametros);
        if (!$r) {
            return -1;
        } else {
            return $this->bd->getNumeroFilas();
        }
        $bd->closeConsulta();
    }

    function editConClave(Usuario $objeto, $loginpk, $clavevieja) {
        $asignacion = "login= :login,nombre = :nombre, apellidos=:apellidos,email = : email";
        $condicion = "login = :loginpk adn clave = :clavevieja";
        $parametros["login"] = $objeto->getLogin();
        $parametros["nombre"] = $objeto->getNombre();
        $parametros["apellidos"] = $objeto->geApellidos();
        $parametros["email"] = $objeto->getEmail();
        $parametros["loginpk"] = $loginpk;
        $parametros["clavevieja"] = $clavevieja;
        return $this->editConsulta($asignacion,$condicion,$parametros);
    }
    
    
    function editConsulta($asignacion, $condicion = "1=1", $parametros = array()) {
        $consulta = "update $this->tabla set $asignacion WHERE $condicion";
        $r =  $this->bd->setConsulta($consulta, $parametros);
        if (!$r) {
            return -1;
            
        }
        return $this->bd->getNumeroFilas();
    }
    
    function editSinClave(Usuario $objeto, $loginpk) {
        $asignacion = "login= :login,nombre = :nombre, apellidos=:apellidos,email = : email";
        $condicion = "login = :loginpk";
        $parametros["login"] = $objeto->getLogin();
        $parametros["nombre"] = $objeto->getNombre();
        $parametros["apellidos"] = $objeto->geApellidos();
        $parametros["email"] = $objeto->getEmail();
 
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
            $fila = $this->bd->getFila();
            $usuario = new Usuario();
            $usuario->set($fila);
            return $usuario;
        }
    }

    function getCount($condicion = "1=1", $parametros = array()) {
        $sql = "select count(*) from $this->tabla WHERE $condicion ";
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
 * @return Array
 */
     function getList($principio = 0, $rpp = 5, $condicion = "1=1", $orderby = 1, $parametros = array()) {
        $list = array();
        $sql = "select * from $this->tabla WHERE $condicion order by $orderby limit $principio, $rpp";
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

    function activa($id) {
        //Preparamos la consulta
        $consulta = 'update usuario set isactive = 1 where md5(concat(email,"' . Configuracion::PEZARANIA . '",login)) =:id';
        //parametros para la misma
        $parametros['id'] = $id;
        $r = $this->bd->setConsulta($consulta, $parametros);
        if (!$r) {
            return -1;
        } else {
            return $this->bd->getNumeroFilas();
        }
        $bd->closeConsulta();
    }

    /**
     * Le pasas el login y la clave y te devuelve  si el usuario se conecta o no.
     * La clave debe de estar ya encriptada en SHA1.
     * @param string $login
     * @param string $clave
     * @return Usuario 
     */
    function login($login, $clave) {
        $sql = "select * from $this->tabla WHERE login=:login and isactive = 1";
        $parametros["login"] = $login;
        $r = $this->bd->setConsulta($sql, $parametros);
        $fila = $this->bd->getFila();
        $usuario = new Usuario();
        $usuario->set($fila);
        if ($usuario->getIsActive() != 1) {
            return -1;
        } else if ($usuario->getClave() != $clave) {
            return FALSE;
        } else {
            return $usuario;
        }
    }
    
    function desactivar($login){
        
    }
    function setFecha($login){
        $sql = "UPDATE `usuario` SET fechalogin = CURDATE() where login = :login";
        $parametros["login"] = $login;
        $r = $this->bd->setConsulta($sql, $parametros);
        if ($r) {
            return true;
        }else{
            return $r;
        }
    }

}

<?php

class Sesion {

    static $sesionIniciada = false;

    function __construct($nombre = "") {
        //ini_set("session.cookie_lifetime","3600");
        if (!self::$sesionIniciada) {
            if ($nombre !== "") {
                session_name($nombre);
            }
            session_start();
        }
    }

    function destruir() {
        session_unset();
        session_destroy();
    }

    function cerrar() {
        unset($_SESSION["__usuario"]);
    }
    
    function set($variable, $valor) {
        $_SESSION[$variable] = $valor;
    }

    function delete($variable = "") {
        if ($variable !== "") {
            unset($_SESSION);
        } else {
            unset($_SESSION[$variable]);
        }
    }

    function get($variable) {
        if (isset($_SESSION[$variable]))
            return $_SESSION[$variable];
        return null;
    }

    function getNombres() {
        $array = array();
        foreach ($_SESSION as $key => $value) {
            $array[] = $key;
        }
        return $array;
    }

    function isSesion() {
        return count($_SESSION) > 0;
    }

    function isAutentificado() {
        return isset($_SESSION["__usuario"]);
    }

    function setUsuario($usuario) {
        if ($usuario instanceof Usuario) {
            $this->set("__usuario", $usuario);
        }
    }

    function getUsuario() {
        if ($this->get("__usuario") != null)
            return $this->get("__usuario");
        return null;
    }

    function redirigir($destino = "index.php") {
        header("Location:" . $destino);
        exit;
    }

}

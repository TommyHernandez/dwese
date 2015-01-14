<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Log
 *
 * @author Tomas
 */
class Log {

    private $id, $login, $fecha, $tipo;

    function __construct($id = null, $login = null, $tipo = "login", $fecha = null) {
        $this->id = $id;
        $this->login = $login;
        $this->fecha = $fecha;
        $this->tipo = $tipo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function getId() {
        return $this->id;
    }

    function getLogin() {
        return $this->login;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getTipo() {
        return $this->tipo;
    }

    function set($datos, $inicio = 0) {;
        $this->id = $datos[0 + $inicio];
        $this->login = $datos[2 + $inicio];
        $this->fecha = $datos[3 + $inicio];
        $this->tipo = $datos[4 + $inicio];
    }

}

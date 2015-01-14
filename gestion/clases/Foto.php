<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Foto
 *
 * @author Tomas
 */
class Foto {

    private $id, $login, $ruta;

    function __construct($id = null, $login = null, $ruta = null) {
        $this->id = $id;
        $this->login = $login;
        $this->ruta = $ruta;
    }
function set($datos, $inicio = 0) {       
        $this->id = $datos[0 + $inicio];
        $this->login = $datos[1 + $inicio];
         $this->ruta = $datos[2 + $inicio];
    }
    function getId() {
        return $this->id;
    }

    function getLogin() {
        return $this->login;
    }

    function getRuta() {
        return $this->ruta;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setRuta($ruta) {
        $this->ruta = $ruta;
    }
    function deleteArchivo(){
        return unlink($this->ruta);
    }
}

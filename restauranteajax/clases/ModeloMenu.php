<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModeloMenu
 *
 * @author Tomas
 */
class ModeloMenu {
      private $bd = null;
    private $tabla = "menu";

    function __construct($bd) {
        $this->bd = $bd;
    }

}

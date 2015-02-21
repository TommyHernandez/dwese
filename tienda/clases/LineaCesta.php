<?php
/**
 * Description of LineaCesta
 *
 * @author Usuario
 */
class LineaCesta {
    
    private $producto;
    private $cantidad;
    
    function __construct(Producto $producto = NULL, $cantidad = NULL) {
        $this->producto = $producto;
        $this->cantidad = $cantidad;
    }
    function getProducto() {
        return $this->producto;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function setProducto($producto) {
        $this->producto = $producto;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }


}

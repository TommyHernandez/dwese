<?php

/**
 * Description of Cesta
 *
 * @author Usuario
 */
class Cesta implements Iterator {

    private $cesta;
    private $posicion = 0;

    function __construct($cesta = null) {
        if ($cesta == null) {
            $this->cesta = array();
        }
        $this->cesta = $cesta;
    }

    public function getCesta() {
        return $this->cesta;
    }

    public function set($cesta) {
        $this->cesta = $cesta;
    }

    public function delLinea($id) {
        unset($this->cesta[$id]);
    }

    public function addLinea(Producto $producto) {
        $id = $producto->getId();
        if (isset($this->cesta[$id])) {
            $lineacesta = $this->getLinea($id);
            $lineacesta->setCantidad($lineacesta->getCantidad() + 1);
        } else {
            $lineacesta = new LineaCesta($producto, 1);
            $this->cesta[$id] = $lineacesta;
        }
    }

    public function supLinea($id) {
        if (isset($this->cesta[$id])) {
            $lineacesta = $this->getLinea($id);
            $lineacesta->setCantidad($lineacesta->getCantidad() - 1);
            if ($lineacesta->getCantidad() < 1) {
                $this->delLinea($id);
            }
        }
    }

    public function getLinea($id) {
        return $this->cesta[$id];
    }

    public function current() {
        $claves = array_keys($this->cesta);
        return $this->cesta[$this->key()];
    }

    public function key() {
        $claves = array_keys($this->cesta);
        return $claves[$this->posicion];
    }

    public function next() {
        $this->posicion++;
    }

    public function rewind() {
        $this->posicion = 0;
    }

    public function valid() {
        $claves = array_keys($this->cesta);
        if (isset($claves[$this->posicion])) {
            return isset($this->cesta[$this->key()]);
        }
        return false;
    }

}

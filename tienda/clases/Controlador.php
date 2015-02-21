<?php

/**
 * Description of Controlador
 *
 * @author PedroTHDC
 */
class Controlador {

    function viewCesta() {
        $bd = new BaseDatos();
        session_start();
        $filas = "";
        $total = 0;
        $cesta = $_SESSION["__cesta"];
        foreach ($cesta as $key => $value) {
            $total += $value->getProducto()->getPrecio() * $value->getCantidad();
            $datos = array(
            "nombre" => $value->getProducto()->getNombre(),
            "descripcion" => $value->getProducto()->getdescripcion(),
            "preciound" => $value->getProducto()->getPrecio(),
            "cantidad" => $value->getCantidad(),
            "aniadir" => '<a href="../do/?id='.$value->getProducto()->getId().'&accion=insert"> Añadir Uno</a>',
            "borrar" => '<a href="../do/?id='.$value->getProducto()->getId().'&accion=resta">Restar Uno</a>',
            "eliminar" =>'<a href="../do/?id='.$value->getProducto()->getId().'&accion=del">Borrar</a>'
            );
            $v = new Vista("plantillaCestaDetalle", $datos);
            $filas.= $v->renderData();
        }
        $datos = array(
            "datos" => $filas
        );
        $v = new Vista("plantillaCesta", $datos);
        $tabla = $v->renderData();

        $datos = array(
            "contenido" => $tabla,
            "enlace" => Entorno::getEnlaceCarpeta(),
            "total" => $total
        );
        $v = new Vista("plantilla", $datos);
        $v->render();
        exit();
    }

    function restaProducto() {
        $id = Leer::request("id");
        // añadir el producto a la cesta
        session_start();
        if (!isset($_SESSION["__cesta"])) {
            header("Location: ../index.html");
            exit();
        }
        $cesta = $_SESSION['__cesta'];
        $cesta->supLinea($id);
        $_SESSION["__cesta"] = $cesta;

        header("Location: ../index.php");
    }

    function insertProducto() {
        $id = Leer::get("id");
        // añadir el producto a la cesta
        session_start();
        if (!isset($_SESSION["__cesta"])) {
            $_SESSION["__cesta"] = new Cesta();
        }
        echo $id;
        $cesta = $_SESSION["__cesta"];
        $modelo = new ModeloProducto(new BaseDatos());
        $producto = $modelo->get($id);

        $cesta->addLinea($producto);
        $_SESSION["__cesta"] = $cesta;

        header("Location: ../index.php");
    }

    function delProducto() {
        $id = Leer::request("id");
// añadir el producto a la cesta
        session_start();
        if (!isset($_SESSION["__cesta"])) {
            header("Location: ../index.html");
            exit();
        }
        $cesta = $_SESSION["__cesta"];
        $cesta->delLinea($id);
        $_SESSION["__cesta"] = $cesta;
        header("Location: ../index.php");
    }

    function handle() {
        /* $op = Leer::request("op");
          $action = Leer::request("action");
          $target = Leer::request("target");
          $metodo = $op . ucfirst($action) . ucfirst($target); */

        $metodo = Leer::request("accion");

        if ($metodo == "insert") {
            $this->insertProducto();
        } else if ($metodo == "resta") {
            echo $metodo;
            $this->restaProducto();
        } else if ($metodo == "ver") {
            $this->viewCesta();
        } else if ($metodo = "del") {
            $this->delProducto();
        }
        /* if (method_exists($this, $metodo)) {
          echo $metodo;
          $this->$metodo();
          } else {
          echo "No se ha encontrado";
          } */
        exit();
    }

}

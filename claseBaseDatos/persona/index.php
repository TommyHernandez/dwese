<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require_once '../clases/comun.php';
 $consulta = "select * from persona";
        $bd = new BaseDatos();
        $modelo = new ModeloPersona($bd);
        $filas = $modelo->getList();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Index-BD</title>
        <script src="../js/main.js"></script>
    </head>
    <body>
        <div>
            <h2>Seccion 0</h2>
            <span>Ultima operación realizada: <?php echo Leer::get('op')?> </span><br>
            <span>Numero de filas insertadas:  <?php echo Leer::get('filas')?> </span>
            <br/>
        </div>
        <h2>Seccion 2</h2>
        <?php       
        foreach ($filas as $indice => $objeto){
            echo $objeto->getApellidos(). " ". $objeto->getId();
        }
        
        /*if ($bd->isConectado() || $bd->isConectado() == 1) {
            echo"<span>Conected</span> <br/>";
            $bd->setConsulta($consulta);
           while ($fila = $bd->getFila()) {                
                echo $fila[0]." ";
                echo "<a href='ver.php?id=$fila[0]' data-id='$fila[0]] class='editar' >".$fila[1]." ".$fila[2]."</a>  ";                
                echo " <a data-nombre='$fila[1]' class='delete' href='phpdelete.php?id=$fila[0]' >Borrar</a>";
                echo "<br/>";
            }
        }else{
            echo "<span>Algo va mal no te conectas</span>";
        }*/
        
        ?>
        <form action="phpinsert.php" method="POST" >
            <label for="nombre">nombre</label>
            <input type="text"   name="nombre" value=""/> 
            <br>
            <label for="apellido">apellido</label>
            <input type="text" name="apellidos" value="" />
            <input type="submit" name="Registrar" value="Registrar"/>
        </form>
        
    </body>
</html>
<?php

?>
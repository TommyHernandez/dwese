<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ataque a-BD</title>
    </head>
    <body>
        <h1>PDO-ClaseBaseDatos</h1>
        <?php
        require_once 'clases/BaseDatos.php';
        
        $objetoBD = new BaseDatos();
     
        $objetoBD->closeConexion();
        ?>

        <form action="phpinsert.php" method="POST">
            <fieldset>
                <input type = "text" name = "nombre" value = "" placeholder="nombre"  required=""/>
                <input type = "number" name = "precio" value = "" placeholder="`recio" required="" />
            </fieldset>
            <input type="submit" value="insertar"/>
        </form >
    </body>
</html>
